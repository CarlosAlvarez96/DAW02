<script setup>
import { ref, onMounted } from 'vue'
import EncabezadoComponente from './components/EncabezadoComponente.vue'
import PieComponente from './components/PieComponente.vue'
import ListaItems from './components/ListaItems.vue'
import NuevoItem from './components/NuevoItem.vue'

let listado = ref([])
const pushear = (nuevo) => {
  console.log('Añadiendo nuevo item:', nuevo)
  listado.value.push(nuevo)
  actualizarStorage()
}

const eliminar = (index) => {
  listado.value.splice(index, 1)
  actualizarStorage()
}
const editar = (index, edited) => {
  listado.value[index] = edited
  actualizarStorage()
}
const actualizarStorage = () => {
  localStorage.setItem('listado', JSON.stringify(listado.value))
}

onMounted(() => {
  listado.value = JSON.parse(localStorage.getItem('listado')) || listado.value
})
</script>

<template>
  <EncabezadoComponente />
  <ListaItems :mis-compras="listado" @eliminar-item="eliminar" @editar-item="editar" />
  <NuevoItem @agregar-item="pushear" />
  <PieComponente />
</template>

<style scoped></style>
