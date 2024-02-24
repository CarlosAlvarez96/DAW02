<script setup>
import ItemCompletado from './ItemCompletado.vue'

const props = defineProps({
  completadas: Array
})
const emit = defineEmits(['eliminarItem', 'editarItem'])

const eliminar = (index) => {
  emit('eliminarItem', index)
}

</script>

<template>
  <h1>Tareas completadas</h1>
  <section class="items">
    <ItemCompletado
      v-for="(item, index) of props.completadas"
      :key="index"
      :item="item"
      :index="index"
      @eliminar-item="eliminar"
    />
  </section>
</template>

<style scoped>
.items {
  width: 480px;
  max-width: 100%;
  padding: 0;
  margin: 0;
}
</style>
