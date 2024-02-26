<script setup>
    const props = defineProps({
        item:Object,
        index:Number
    })
    const prioridades= {
        baja:'🟢',
        media:'🟡',
        alta:'🔴'
    }
</script>

<template>
    <article class="nombre"><p>{{props.index +1}} - {{props.item.productos}}</p></article>
    <article class="resto"><p>{{ prioridades[props.item.prioridad]}}</p></article>
    <article class="resto">
        <button>
            <font-awesome-icon icon="trash-can"/>
        </button>
        <button>
            <font-awesome-icon icon="user-pen"/>
        </button>
    </article>
</template>

<style scoped>
    article {
        width:auto;
        display:flex;
    }
    .nombre{
        width:60%;
    }
    .resto{
        width:20%;
    }
</style>
