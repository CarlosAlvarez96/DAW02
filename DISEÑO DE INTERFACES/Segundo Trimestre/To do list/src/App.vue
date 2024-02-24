<script setup>
import { ref, onMounted } from 'vue'
import EncabezadoComponente from './components/EncabezadoComponente.vue'
import PieComponente from './components/PieComponente.vue'
import ListaItems from './components/ListaItems.vue'
import NuevoItem from './components/NuevoItem.vue'
import ItemsCompletados from './components/ItemsCompletados.vue'

let listado = ref([])
let completadas = ref([])

const pushear = (nuevo) => {
  console.log('Añadiendo nuevo item:', nuevo)
  listado.value.push(nuevo)
  actualizarStorage('listado', listado.value)
}

const eliminar = (index) => {
  const itemEliminado = listado.value.splice(index, 1)[0]
  completadas.value.push(itemEliminado)
  actualizarStorage('listado', listado.value)
  actualizarStorage('completadas', completadas.value)
}

const eliminarCompletado = (index) => {
  completadas.value.splice(index, 1)
  actualizarStorage('completadas', completadas.value)
}

const editar = (index, edited) => {
  listado.value[index] = edited
  actualizarStorage('listado', listado.value)
}

const actualizarStorage = (key, value) => {
  localStorage.setItem(key, JSON.stringify(value))
}

onMounted(() => {
  listado.value = JSON.parse(localStorage.getItem('listado')) || listado.value
  completadas.value = JSON.parse(localStorage.getItem('completadas')) || completadas.value
})
</script>

<template>
  <EncabezadoComponente />
  <NuevoItem @agregar-item="pushear" />
  <ListaItems :mis-compras="listado" @eliminar-item="eliminar" @editar-item="editar" />
  <ItemsCompletados :completadas="completadas" @eliminar-item="eliminarCompletado" @editar-item="editar" />
  <PieComponente />
</template>

<style scoped></style>
