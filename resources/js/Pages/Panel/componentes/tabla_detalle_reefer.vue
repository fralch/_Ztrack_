<template>
  <div v-if="tipo == 'reefer' && datos_tabla_reefer.length > 0">
    <div
      id="reefers_grid"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      style="margin: -30px 15px 10px 15px"
    >
      <div id='buscador' class="row">
        <div class="col-3">
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm"
                >Desde</span
              >
            </div>
            <input
              type="date"
              class="form-control"
              aria-label="Small"
              aria-describedby="inputGroup-sizing-sm"
             v-model="desde"
            />
          </div>
        </div>
        <div class="col-3">
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Hasta</span>
            </div>
            <input
              type="date"
              class="form-control"
              aria-label="Small"
              aria-describedby="inputGroup-sizing-sm"
              v-model="hasta"
            />
          </div>
        </div>
        <div class="col">
          <button
            id="buscar_detalle"
            type="button"
            @click="buscar_detalle"
          >
            Buscar
          </button>
        </div>
      </div>
      <table class="table display nowrap" id="tblDetalleContenedores_reefers">
        <thead>
          <tr class="bg-info" style="color: white !important">
            <th scope="col">ID</th>
            <th scope="col">FECHA</th>
            <th scope="col" class="text-center" @click="ocultar(2)">Set_point</th>
            <th scope="col" class="text-center" @click="ocultar(3)">Temp_supply_1</th>
            <th scope="col" class="text-center" @click="ocultar(4)">Return_air</th>
            <th scope="col" class="text-center" @click="ocultar(5)">Evaporation_coil</th>
            <th scope="col" class="text-center" @click="ocultar(6)">Ambient_air</th>
            <th scope="col" class="text-center" @click="ocultar(7)">Cargo_1_temp</th>
            <th scope="col" class="text-center" @click="ocultar(8)">Cargo_2_temp</th>
            <th scope="col" class="text-center" @click="ocultar(9)">Cargo_3_temp</th>
            <th scope="col" class="text-center" @click="ocultar(10)">Cargo_4_temp</th>
            <th scope="col" class="text-center" @click="ocultar(11)">Relative_humidity</th>
            <th scope="col" class="text-center" @click="ocultar(12)">Alarm_present</th>
            <th scope="col" class="text-center" @click="ocultar(13)">Controlling_mode</th>
            <th scope="col" class="text-center" @click="ocultar(14)">Power_state</th>
            <th scope="col" class="text-center" @click="ocultar(15)">Defrost_term_temp</th>
            <th scope="col" class="text-center" @click="ocultar(16)">Defrost_interval</th>
            <th scope="col" class="text-center" @click="ocultar(17)">Latitud</th>
            <th scope="col" class="text-center" @click="ocultar(18)">Longitud</th>
            
          </tr>
        </thead>
        <tbody>
          <tr v-for="(reefer, index) in datos_tabla_reefer" :key="index">
            <!-- <td>{{index+1}}</td> -->
            <td class="text-center">{{ reefer.id }}</td>
            <td class="text-center">{{ formatoFecha(reefer.created_at) }}</td>
            <td class="text-center">{{ reefer.set_point }}C°</td>
            <td class="text-center">{{ reefer.temp_supply_1 }}</td>
            <td class="text-center">{{ reefer.return_air }}</td>
            <td class="text-center">{{ reefer.evaporation_coil }}</td>
            <td class="text-center">{{ reefer.ambient_air }}</td>
            <td class="text-center">{{ reefer.cargo_1_temp }}</td>
            <td class="text-center">{{ reefer.cargo_2_temp }}</td>
            <td class="text-center">{{ reefer.cargo_3_temp }}</td>
            <td class="text-center">{{ reefer.cargo_4_temp }}</td>
            <td class="text-center">{{ reefer.relative_humidity }}</td>
            <td class="text-center">{{ reefer.alarm_present }}</td>
            <td class="text-center">{{ reefer.controlling_mode }}</td>
            <td class="text-center">{{ reefer.power_state }}</td>
            <td class="text-center">{{ reefer.defrost_term_temp }}</td>
            <td class="text-center">{{ reefer.defrost_interval }}</td>
            <td class="text-center">{{ reefer.latitud }}</td>
            <td class="text-center">{{ reefer.longitud }}</td>
          </tr>
        </tbody>
      </table>
      <div class="escoger_columnas">
        Cargar todas columnas: <span  @click="resetTabla()">Resetear tabla</span> 
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  components: {},
  props: {
    contenedor: Number,
    tipo: String,
  },
  data() {
    return {
      tabla: null, 
      datos_tabla_reefer: [],
      ubicacion: null,
       desde: new Date().getFullYear() + '-' + ('0' + (new Date().getMonth() + 1)).slice(-2) +'-' + ('0' + new Date().getDate()).slice(-2), 
      hasta: new Date().getFullYear() + '-' + ('0' + (new Date().getMonth() + 1)).slice(-2) +'-' + ('0' + new Date().getDate()).slice(-2), 
    };
  },
  watch: {
    contenedor() {
      this.select_contenedor();
    },
    datos_tabla_reefer() {
      $("#tblDetalleContenedores_reefers").DataTable().destroy();
      this.TablaDetalleContenedores_r();
    },
    tipo() {
      this.datos_tabla_reefer = [];
    },
  },
  mounted() {
    this.TablaDetalleContenedores_r();
  },
  methods: {
    TablaDetalleContenedores_r() {
      let self = this;
      this.$nextTick(() => {
        self.tabla = $("#tblDetalleContenedores_reefers").DataTable({
           scrollX: "100%",
          responsive: true,
          buttons: true,
          dom: 'Bfrtip',
          buttons: [
              // 'copy', 'csv', 'excel', 'pdf','print'
               'copy', 'csv', 'excel'
          ],
          order: [0, "desc"],
          language: {
            url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json",
          },
        });
      });
    },
    select_contenedor() {
      let self = this;
      self.datos_tabla_reefer = [];

      axios
        .post(route("contenedores.get_datos"), {
          id: this.contenedor,
          tipo: "reefer",
        })
        .then((response) => {
          self.datos_tabla_reefer = response.data;
        })
        .then(() => {
          let mayor_id = self.datos_tabla_reefer
            .map(function (e) {
              return e.id;
            })
            .sort()
            .reverse()[0];
          axios
            .post(route("contenedores.get_lat_log"), {
              id: mayor_id,
              tipo: "reefer",
            })
            .then((response) => {
              if (response.data.length > 0) {
                self.ubicacion = [response.data[0].latitud,response.data[0].longitud];
              } else {
                self.ubicacion = null;
              }
            })
            .then(() => {
              self.$emit("set_ubicacion_r", self.ubicacion);
            });
        })
        .then(() => {
          // self.setLabelsMyChartPrincipal();
        });
    },
     buscar_detalle(){
       let self = this;
          Swal.fire({
            title: 'Espere por favor',
            html: '<i class="fa fa-spinner fa-spin" style="font-size:15px"></i>',
            allowOutsideClick: false,
            showConfirmButton: false
          });
          axios
          .post(route("contenedores.get_datos.fecha"), {
            id: this.contenedor,
            desde: self.desde,
            hasta: self.hasta,
            tipo: "reefer",
          })
          .then((response) => {
           
             if (response.data.length > 0) {
              self.datos_tabla_reefer = [];
              self.datos_tabla_reefer = response.data;
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No se encontraron datos!',
              })
            }
          })
            .then(() => {
              Swal.close();
            });
    },
    formatoFecha(fecha){
       let date = new Date(fecha);
            let day = date.getDate()+ 0;
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let seconds = date.getSeconds();
            if (minutes < 10) {
              minutes = "0" + minutes;
            }

            if (seconds < 10) {
              seconds = "0" + seconds;
            }

            if (month < 10) {
              return `${day}-0${month}-${year} ${hours}:${minutes}:${seconds}`; 
            } else {
              return `${day}-${month}-${year}  ${hours}:${minutes}:${seconds}`; 
            }
    },
     ocultar(val){
       var column = this.tabla.column(val);
        column.visible(!column.visible());
    },
    resetTabla(){
      $("#tblDetalleContenedores_reefers").DataTable().destroy();
      this.TablaDetalleContenedores_r();
    },
  },
};
</script>
<style>
@media screen and (max-width: 450px) {
  #reefers_grid {
     margin: 0 !important;
     padding: 0 !important;
  }
  #buscador{
    display: none !important;
  }
}
</style>