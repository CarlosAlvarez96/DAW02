<script setup>
import { ref, defineEmits } from 'vue'

const emit = defineEmits(['agregarItem'])

const item = ref('')
const priority = ref('')

const handleClick = () => {
  const nuevoProducto = {
    producto: item.value,
    prioridad: priority.value
  }
  console.log('Clic en Agregar Nuevo Item:', nuevoProducto)
  emit('agregarItem', nuevoProducto)
  item.value = ''
  priority.value = ''
}

const isValid = () => {
  return item.value.length > 2 && isNaN(item.value)
}
</script>

<template>
  <section>
    <h4>Añadir tarea</h4>
    <input type="text" placeholder="Nombre" v-model="item" autofocus />
    <select name="priority" v-model="priority">
      <option value="" disabled>prioridad</option>
      <option value="baja">🟢 - baja</option>
      <option value="media">🟡 - media</option>
      <option value="alta">🔴 - alta</option>
    </select>
    <button @click="handleClick" :disabled="!item || !priority || !isValid">
      <font-awesome-icon icon="fa-plus" />
    </button>
  </section>
</template>

<style scoped>
h4 {
  font-family: 'Cascadia Code', monospace;
  font-size: 1.6rem;
  color: white;
  margin-bottom: 10px;
}

input,
select {
  font-family: 'Cascadia Code', monospace;
  background-color: #212121;
  border: 1px solid white;
  border-radius: 4px;
  color: white;
  font-size: 1.4rem;
  padding: 8px;
  margin-bottom: 10px;
}

button {
  background-color: #212121;
  color: white;
  border: none;
  border-radius: 4px;
  padding: 8px 16px;
  cursor: pointer;
  :disabled {
    background-color: #616161;
    cursor: not-allowed;
  }
}
</style>
