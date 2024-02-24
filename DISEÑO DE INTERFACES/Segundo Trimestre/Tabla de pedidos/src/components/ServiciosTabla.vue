<template>
  <div>
    <h2>Tabla de pedidos</h2>
    <table>
      <thead>
        <tr>
          <th>Servicio</th>
          <th>Precio</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="servicio in servicios" :key="servicio.id" @click="seleccionarServicio(servicio)">
          <td :class="{ 'selected': servicio.seleccionado }">{{ servicio.nombre }}</td>
          <td :class="{ 'selected': servicio.seleccionado }">{{ servicio.precio.toFixed(2) }} €</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ['servicios'],
  methods: {
    seleccionarServicio(servicio) {
      servicio.seleccionado = !servicio.seleccionado;
      this.$emit('seleccionado', this.calcularSubtotal());
    },
    calcularSubtotal() {
      return this.servicios
        .filter(servicio => servicio.seleccionado)
        .reduce((total, servicio) => total + servicio.precio, 0);
    }
  }
};
</script>

