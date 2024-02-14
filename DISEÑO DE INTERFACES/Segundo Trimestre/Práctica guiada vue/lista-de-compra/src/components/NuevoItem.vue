<script setup>
    import {ref} from 'vue';
    const emit = defineEmits(['agregarItem'])

    const item = ref('');
    const priority=ref('');
    const handleClick = () => {
        const nuevoProducto={
            producto:item.value,
            prioridad:priority.value
        }
        emit('agregarItem', nuevoProducto);
        item.value = '';
        priority.value='';
    }
</script>

<template>
    <section>
        <h4>Nuevo Item</h4>
        <input type=text placeholder=Agua vmodel=Item autofocus>
        <select name=priority v-model="priority">
            <option value="" disabled>prioridad</option>
            <option value="baja" disabled>🟢 - baja</option>
            <option value="media" disabled>🟡 - media</option>
            <option value="alta" disabled>🔴 - alta</option>
        </select>
    </section>
    <button v-show="item && priority">
        <font-awesome-icon icon="fa-plus"/>
    </button>
</template>

<style scoped>
    input,select{
        font-family: 'Genos', sans-serif;
        font-family: 'Gloria Hallelujah', cursive;
        background-color:black;
        border-radius:4px;
        font-size:1.4rem;
        color:white;
        width:40%;
        margin-right:10px;
    }
</style>
