<template>
  <div v-if="tipo == 'reefer' && datos_tabla_reefer.length > 0">
    <div
      id="reefers_grid"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      style="margin: -30px 15px 10px 15px"
    >
      <div class="row">
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
            <th scope="col" class="text-center" @click="ocultar(4)">Temp_supply_2</th>
            <th scope="col" class="text-center" @click="ocultar(5)">Return_air</th>
            <th scope="col" class="text-center" @click="ocultar(6)">Evaporation_coil</th>
            <th scope="col" class="text-center" @click="ocultar(7)">Condensation_coil</th>
            <th scope="col" class="text-center" @click="ocultar(8)">Compress_coil_1</th>
            <th scope="col" class="text-center" @click="ocultar(9)">Compress_coil_2</th>
            <th scope="col" class="text-center" @click="ocultar(10)">Ambient_air</th>
            <th scope="col" class="text-center" @click="ocultar(11)">Cargo_1_temp</th>
            <th scope="col" class="text-center" @click="ocultar(12)">Cargo_2_temp</th>
            <th scope="col" class="text-center" @click="ocultar(13)">Cargo_3_temp</th>
            <th scope="col" class="text-center" @click="ocultar(14)">Cargo_4_temp</th>
            <th scope="col" class="text-center" @click="ocultar(15)">Relative_humidity</th>
            <th scope="col" class="text-center" @click="ocultar(16)">AVL</th>
            <th scope="col" class="text-center" @click="ocultar(17)">Suction_pressure</th>
            <th scope="col" class="text-center" @click="ocultar(18)">Discharge_pressure</th>
            <th scope="col" class="text-center" @click="ocultar(19)">Line_voltage</th>
            <th scope="col" class="text-center" @click="ocultar(20)">Line_frequency</th>
            <th scope="col" class="text-center" @click="ocultar(21)">Consumption_ph_1</th>
            <th scope="col" class="text-center" @click="ocultar(22)">Consumption_ph_2</th>
            <th scope="col" class="text-center" @click="ocultar(23)">Consumption_ph_3</th>
            <th scope="col" class="text-center" @click="ocultar(24)">Co2_reading</th>
            <th scope="col" class="text-center" @click="ocultar(25)">O2_reading</th>
            <th scope="col" class="text-center" @click="ocultar(26)">Evaporator_speed</th>
            <th scope="col" class="text-center" @click="ocultar(27)">Condenser_speed</th>
            <th scope="col" class="text-center" @click="ocultar(28)">Battery_voltage</th>
            <th scope="col" class="text-center" @click="ocultar(29)">Power_kwh</th>
            <th scope="col" class="text-center" @click="ocultar(30)">Power_trip_reading</th>
            <th scope="col" class="text-center" @click="ocultar(31)">Power_trip_duration</th>
            <th scope="col" class="text-center" @click="ocultar(32)">Suction_temp</th>
            <th scope="col" class="text-center" @click="ocultar(33)">Discharge_temp</th>
            <th scope="col" class="text-center" @click="ocultar(34)">Supply_air_temp</th>
            <th scope="col" class="text-center" @click="ocultar(35)">Return_air_temp</th>
            <th scope="col" class="text-center" @click="ocultar(36)">Dl_battery_temp</th>
            <th scope="col" class="text-center" @click="ocultar(37)">Dl_battery_charge</th>
            <th scope="col" class="text-center" @click="ocultar(38)">Power_consumption</th>
            <th scope="col" class="text-center" @click="ocultar(39)">Power_consumption_avg</th>
            <th scope="col" class="text-center" @click="ocultar(40)">Alarm_present</th>
            <th scope="col" class="text-center" @click="ocultar(41)">Capacity_load</th>
            <th scope="col" class="text-center" @click="ocultar(42)">Power_state</th>
            <th scope="col" class="text-center" @click="ocultar(43)">Controlling_mode</th>
            <th scope="col" class="text-center" @click="ocultar(44)">Humidity_control</th>
            <th scope="col" class="text-center" @click="ocultar(45)">Humidity_set_point</th>
            <th scope="col" class="text-center" @click="ocultar(46)">Fresh_air_ex_mode</th>
            <th scope="col" class="text-center" @click="ocultar(47)">Fresh_air_ex_rate</th>
            <th scope="col" class="text-center" @click="ocultar(48)">Fresh_air_ex_delay</th>
            <th scope="col" class="text-center" @click="ocultar(49)">Set_point_o2</th>
            <th scope="col" class="text-center" @click="ocultar(50)">Set_point_co2</th>
            <th scope="col" class="text-center" @click="ocultar(51)">Defrost_term_temp</th>
            <th scope="col" class="text-center" @click="ocultar(52)">Defrost_interval</th>
            <th scope="col" class="text-center" @click="ocultar(53)">Water_cooled_conde</th>
            <th scope="col" class="text-center" @click="ocultar(54)">USDA_trip</th>
            <th scope="col" class="text-center" @click="ocultar(55)">Evaporator_exp_valve</th>
            <th scope="col" class="text-center" @click="ocultar(56)">Suction_mod_valve</th>
            <th scope="col" class="text-center" @click="ocultar(57)">Hot_gas_valve</th>
            <th scope="col" class="text-center" @click="ocultar(58)">Economizer_valve</th>
            <th scope="col" class="text-center" @click="ocultar(59)">Modelo</th>
            <th scope="col" class="text-center" @click="ocultar(60)">Latitud</th>
            <th scope="col" class="text-center" @click="ocultar(61)">Longitud</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(reefer, index) in datos_tabla_reefer" :key="index">
            <!-- <td>{{index+1}}</td> -->
            <td class="text-center">{{ reefer.id }}C°</td>
            <td class="text-center">{{ formatoFecha(reefer.created_at) }}</td>
            <td class="text-center">{{ reefer.set_point }}C°</td>
            <td class="text-center">{{ reefer.temp_supply_1 }}</td>
            <td class="text-center">{{ reefer.temp_supply_2 }}</td>
            <td class="text-center">{{ reefer.return_air }}</td>
            <td class="text-center">{{ reefer.evaporation_coil }}</td>
            <td class="text-center">{{ reefer.condensation_coil }}</td>
            <td class="text-center">{{ reefer.compress_coil_1 }}</td>
            <td class="text-center">{{ reefer.compress_coil_2 }}</td>
            <td class="text-center">{{ reefer.ambient_air }}</td>
            <td class="text-center">{{ reefer.cargo_1_temp }}</td>
            <td class="text-center">{{ reefer.cargo_2_temp }}</td>
            <td class="text-center">{{ reefer.cargo_3_temp }}</td>
            <td class="text-center">{{ reefer.cargo_4_temp }}</td>
            <td class="text-center">{{ reefer.relative_humidity }}</td>
            <td class="text-center">{{ reefer.avl }}</td>
            <td class="text-center">{{ reefer.suction_pressure }}</td>
            <td class="text-center">{{ reefer.discharge_pressure }}</td>
            <td class="text-center">{{ reefer.line_voltage }}</td>
            <td class="text-center">{{ reefer.line_frequency }}</td>
            <td class="text-center">{{ reefer.consumption_ph_1 }}</td>
            <td class="text-center">{{ reefer.consumption_ph_2 }}</td>
            <td class="text-center">{{ reefer.consumption_ph_3 }}</td>
            <td class="text-center">{{ reefer.co2_reading }}</td>
            <td class="text-center">{{ reefer.o2_reading }}</td>
            <td class="text-center">{{ reefer.evaporator_speed }}</td>
            <td class="text-center">{{ reefer.condenser_speed }}</td>
            <td class="text-center">{{ reefer.battery_voltage }}</td>
            <td class="text-center">{{ reefer.power_kwh }}</td>
            <td class="text-center">{{ reefer.power_trip_reading }}</td>
            <td class="text-center">{{ reefer.power_trip_duration }}</td>
            <td class="text-center">{{ reefer.suction_temp }}</td>
            <td class="text-center">{{ reefer.discharge_temp }}</td>
            <td class="text-center">{{ reefer.supply_air_temp }}</td>
            <td class="text-center">{{ reefer.return_air_temp }}</td>
            <td class="text-center">{{ reefer.dl_battery_temp }}</td>
            <td class="text-center">{{ reefer.dl_battery_charge }}</td>
            <td class="text-center">{{ reefer.power_consumption }}</td>
            <td class="text-center">{{ reefer.power_consumption_avg }}</td>
            <td class="text-center">{{ reefer.alarm_present }}</td>
            <td class="text-center">{{ reefer.capacity_load }}</td>
            <td class="text-center">{{ reefer.power_state }}</td>
            <td class="text-center">{{ reefer.controlling_mode }}</td>
            <td class="text-center">{{ reefer.humidity_control }}</td>
            <td class="text-center">{{ reefer.humidity_set_point }}</td>
            <td class="text-center">{{ reefer.fresh_air_ex_mode }}</td>
            <td class="text-center">{{ reefer.fresh_air_ex_rate }}</td>
            <td class="text-center">{{ reefer.fresh_air_ex_delay }}</td>
            <td class="text-center">{{ reefer.set_point_o2 }}</td>
            <td class="text-center">{{ reefer.set_point_co2 }}</td>
            <td class="text-center">{{ reefer.defrost_term_temp }}</td>
            <td class="text-center">{{ reefer.defrost_interval }}</td>
            <td class="text-center">{{ reefer.water_cooled_conde }}</td>
            <td class="text-center">{{ reefer.usda_trip }}</td>
            <td class="text-center">{{ reefer.evaporator_exp_valve }}</td>
            <td class="text-center">{{ reefer.suction_mod_valve }}</td>
            <td class="text-center">{{ reefer.hot_gas_valve }}</td>
            <td class="text-center">{{ reefer.economizer_valve }}</td>
            <td class="text-center">{{ reefer.modelo }}</td>
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