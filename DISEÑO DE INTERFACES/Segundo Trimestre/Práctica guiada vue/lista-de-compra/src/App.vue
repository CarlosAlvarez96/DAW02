<script setup>
import {ref} from 'vue';
import EncabezadoComponente from './components/EncabezadoComponente.vue'
import PieComponente from './components/PieComponente.vue'
import ListaItems from './components/ListaItems.vue'
import NuevoItem from './components/NuevoItem.vue'

let listado = ref([
  {
    productos:"Pan",
    prioridad:"baja"
  },
  {
    productos:"Leche",
    prioridad:"media"
  },
  {
    productos:"Manzanas",
    prioridad:"alta"
  }
])
</script>



<template>
  <EncabezadoComponente/>
  <ListaItems :misCompras='listado'/>
  <NuevoItem/>
  <PieComponente/>
</template>

<style scoped>

</style>
