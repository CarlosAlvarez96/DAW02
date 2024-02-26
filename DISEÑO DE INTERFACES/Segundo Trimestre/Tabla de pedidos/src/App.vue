
<script>
import ServiciosTabla from './components/ServiciosTabla.vue';
import GestionServicios from './components/GestionServicios.vue';
import EncabezadoComponente from './components/EncabezadoComponente.vue';

export default {
  data() {
  return {
    servicios: this.obtenerServiciosLocalStorage() || [],
    precioTotal: localStorage.getItem('total') ? parseFloat(localStorage.getItem('total')) : 0
  };
  },
  methods: {
    actualizarPrecio(precio) {
      this.precioTotal = precio;
      localStorage.setItem('total', precio);
    },
    actualizarServicios(servicios) {
      this.servicios = servicios;
    },
    obtenerServiciosLocalStorage() {
      const servicios = localStorage.getItem('servicios');
      return servicios ? JSON.parse(servicios) : null;
    }
  },
  components: {
    ServiciosTabla,
    GestionServicios,
    EncabezadoComponente
}
};
</script>

<template>
  <EncabezadoComponente/>
  <main>
    <GestionServicios @actualizarServicios="actualizarServicios" />
    <ServiciosTabla :servicios="servicios" @seleccionado="actualizarPrecio" />
    <div class="total">Total: {{ precioTotal.toFixed(2) }} €</div>
  </main>
  <PieComponente/>
</template>

