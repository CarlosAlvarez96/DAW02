
<script>
  export default {
      data() {
          return {
        nuevoNombre: '',
        nuevoPrecio: '',
        servicios: this.obtenerServiciosLocalStorage() || []
      };
    },
    methods: {
      agregarServicio() {
        if (this.nuevoNombre && this.nuevoPrecio) {
          const nuevoServicio = {
              nombre: this.nuevoNombre,
            precio: parseFloat(this.nuevoPrecio),
            seleccionado: false
        };
          this.servicios.push(nuevoServicio);
          this.guardarServiciosLocalStorage();
          this.nuevoNombre = '';
          this.nuevoPrecio = '';
          this.$emit('actualizarServicios', this.servicios);
        }
    },
    editarServicio(index) {
        // Puedes implementar la lógica de edición según tus necesidades
        // En este ejemplo, simplemente marcamos el servicio como seleccionado
        this.servicios[index].seleccionado = true;
        this.$emit('actualizarServicios', this.servicios);
    },
    eliminarServicio(index) {
        this.servicios.splice(index, 1);
        this.guardarServiciosLocalStorage();
        this.$emit('actualizarServicios', this.servicios);
    },
      obtenerServiciosLocalStorage() {
          const servicios = localStorage.getItem('servicios');
        return servicios ? JSON.parse(servicios) : null;
    },
    guardarServiciosLocalStorage() {
        localStorage.setItem('servicios', JSON.stringify(this.servicios));
    }
}
};
</script>

<template>
    <div>
      <h2>Gestionar pedidos</h2>
      <div>
        <label for="nuevoNombre">Nombre:</label>
        <input type="text" id="nuevoNombre" v-model="nuevoNombre" />
      </div>
      <div>
        <label for="nuevoPrecio">Precio:</label>
        <input type="number" id="nuevoPrecio" v-model="nuevoPrecio" />
      </div>
      <button @click="agregarServicio">Agregar producto</button>
      <ul>
        <li v-for="(servicio, index) in servicios" :key="index">
          {{ servicio.nombre }} - {{ servicio.precio.toFixed(2) }} €
          <button @click="eliminarServicio(index)">Eliminar</button>
        </li>
      </ul>
    </div>
  </template>

