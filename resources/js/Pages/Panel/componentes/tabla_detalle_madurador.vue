<template>
  <div v-if="tipo == 'madurador' && datos_tabla_madurador.length > 0">
    <div
      id="madurador_grid"
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
      <table class="table display nowrap" id="tblDetalleContenedores_madurador">
        <thead>
          <tr class="bg-info" style="color: white !important">
            <th scope="col">ID</th>
            <th scope="col">Fecha</th>

            <th scope="col" class="text-center">Ethylene</th>
            <th scope="col" class="text-center">StateProcess</th>
            <th scope="col" class="text-center">StateInyection</th>
            <th scope="col" class="text-center">TimerOfProcess</th>


            <th scope="col" class="text-center">Set_point</th>
            <th scope="col" class="text-center">Temp_supply_1</th>
            <th scope="col" class="text-center">Temp_supply_2</th>
            <th scope="col" class="text-center">Return_air</th>
            <th scope="col" class="text-center">Evaporation_coil</th>
            <th scope="col" class="text-center">Condensation_coil</th>
            <th scope="col" class="text-center">Compress_coil_1</th>
            <th scope="col" class="text-center">Compress_coil_2</th>
            <th scope="col" class="text-center">Ambient_air</th>
            <th scope="col" class="text-center">Cargo_1_temp</th>
            <th scope="col" class="text-center">Cargo_2_temp</th>
            <th scope="col" class="text-center">Cargo_3_temp</th>
            <th scope="col" class="text-center">Cargo_4_temp</th>
            <th scope="col" class="text-center">Relative_humidity</th>
            <th scope="col" class="text-center">AVL</th>
            <th scope="col" class="text-center">Suction_pressure</th>
            <th scope="col" class="text-center">Discharge_pressure</th>
            <th scope="col" class="text-center">Line_voltage</th>
            <th scope="col" class="text-center">Line_frequency</th>
            <th scope="col" class="text-center">Consumption_ph_1</th>
            <th scope="col" class="text-center">Consumption_ph_2</th>
            <th scope="col" class="text-center">Consumption_ph_3</th>
            <th scope="col" class="text-center">Co2_reading</th>
            <th scope="col" class="text-center">O2_reading</th>
            <th scope="col" class="text-center">Evaporator_speed</th>
            <th scope="col" class="text-center">Condenser_speed</th>
            <th scope="col" class="text-center">Battery_voltage</th>
            <th scope="col" class="text-center">Power_kwh</th>
            <th scope="col" class="text-center">Power_trip_reading</th>
            <th scope="col" class="text-center">Power_trip_duration</th>
            <th scope="col" class="text-center">Suction_temp</th>
            <th scope="col" class="text-center">Discharge_temp</th>
            <th scope="col" class="text-center">Supply_air_temp</th>
            <th scope="col" class="text-center">Return_air_temp</th>
            <th scope="col" class="text-center">Dl_battery_temp</th>
            <th scope="col" class="text-center">Dl_battery_charge</th>
            <th scope="col" class="text-center">Power_consumption</th>
            <th scope="col" class="text-center">Power_consumption_avg</th>
            <th scope="col" class="text-center">Alarm_present</th>
            <th scope="col" class="text-center">Capacity_load</th>
            <th scope="col" class="text-center">Power_state</th>
            <th scope="col" class="text-center">Controlling_mode</th>
            <th scope="col" class="text-center">Humidity_control</th>
            <th scope="col" class="text-center">Humidity_set_point</th>
            <th scope="col" class="text-center">Fresh_air_ex_mode</th>
            <th scope="col" class="text-center">Fresh_air_ex_rate</th>
            <th scope="col" class="text-center">Fresh_air_ex_delay</th>
            <th scope="col" class="text-center">Set_point_o2</th>
            <th scope="col" class="text-center">Set_point_co2</th>
            <th scope="col" class="text-center">Defrost_term_temp</th>
            <th scope="col" class="text-center">Defrost_interval</th>
            <th scope="col" class="text-center">Water_cooled_conde</th>
            <th scope="col" class="text-center">USDA_trip</th>
            <th scope="col" class="text-center">Evaporator_exp_valve</th>
            <th scope="col" class="text-center">Suction_mod_valve</th>
            <th scope="col" class="text-center">Hot_gas_valve</th>
            <th scope="col" class="text-center">Economizer_valve</th>
            <th scope="col" class="text-center">Modelo</th>
            <th scope="col" class="text-center">Latitud</th>
            <th scope="col" class="text-center">Longitud</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(madurador, index) in datos_tabla_madurador" :key="index">
            <!-- <td>{{index+1}}</td> -->
            <td class="text-center">{{ madurador.id }}</td>
            <td class="text-center">{{ formatoFecha(madurador.created_at) }}</td>

            <td class="text-center">{{ madurador.ethylene }}</td>
            <td class="text-center">{{ madurador.stateProcess }}</td>
            <td class="text-center">{{ madurador.stateInyection }}</td>
            <td class="text-center">{{ madurador.timerOfProcess }}</td>

            <td class="text-center">{{ madurador.set_point }}C°</td>
            <td class="text-center">{{ madurador.temp_supply_1 }}</td>
            <td class="text-center">{{ madurador.temp_supply_2 }}</td>
            <td class="text-center">{{ madurador.return_air }}</td>
            <td class="text-center">{{ madurador.evaporation_coil }}</td>
            <td class="text-center">{{ madurador.condensation_coil }}</td>
            <td class="text-center">{{ madurador.compress_coil_1 }}</td>
            <td class="text-center">{{ madurador.compress_coil_2 }}</td>
            <td class="text-center">{{ madurador.ambient_air }}</td>
            <td class="text-center">{{ madurador.cargo_1_temp }}</td>
            <td class="text-center">{{ madurador.cargo_2_temp }}</td>
            <td class="text-center">{{ madurador.cargo_3_temp }}</td>
            <td class="text-center">{{ madurador.cargo_4_temp }}</td>
            <td class="text-center">{{ madurador.relative_humidity }}</td>
            <td class="text-center">{{ madurador.avl }}</td>
            <td class="text-center">{{ madurador.suction_pressure }}</td>
            <td class="text-center">{{ madurador.discharge_pressure }}</td>
            <td class="text-center">{{ madurador.line_voltage }}</td>
            <td class="text-center">{{ madurador.line_frequency }}</td>
            <td class="text-center">{{ madurador.consumption_ph_1 }}</td>
            <td class="text-center">{{ madurador.consumption_ph_2 }}</td>
            <td class="text-center">{{ madurador.consumption_ph_3 }}</td>
            <td class="text-center">{{ madurador.co2_reading }}</td>
            <td class="text-center">{{ madurador.o2_reading }}</td>
            <td class="text-center">{{ madurador.evaporator_speed }}</td>
            <td class="text-center">{{ madurador.condenser_speed }}</td>
            <td class="text-center">{{ madurador.battery_voltage }}</td>
            <td class="text-center">{{ madurador.power_kwh }}</td>
            <td class="text-center">{{ madurador.power_trip_reading }}</td>
            <td class="text-center">{{ madurador.power_trip_duration }}</td>
            <td class="text-center">{{ madurador.suction_temp }}</td>
            <td class="text-center">{{ madurador.discharge_temp }}</td>
            <td class="text-center">{{ madurador.supply_air_temp }}</td>
            <td class="text-center">{{ madurador.return_air_temp }}</td>
            <td class="text-center">{{ madurador.dl_battery_temp }}</td>
            <td class="text-center">{{ madurador.dl_battery_charge }}</td>
            <td class="text-center">{{ madurador.power_consumption }}</td>
            <td class="text-center">{{ madurador.power_consumption_avg }}</td>
            <td class="text-center">{{ madurador.alarm_present }}</td>
            <td class="text-center">{{ madurador.capacity_load }}</td>
            <td class="text-center">{{ madurador.power_state }}</td>
            <td class="text-center">{{ madurador.controlling_mode }}</td>
            <td class="text-center">{{ madurador.humidity_control }}</td>
            <td class="text-center">{{ madurador.humidity_set_point }}</td>
            <td class="text-center">{{ madurador.fresh_air_ex_mode }}</td>
            <td class="text-center">{{ madurador.fresh_air_ex_rate }}</td>
            <td class="text-center">{{ madurador.fresh_air_ex_delay }}</td>
            <td class="text-center">{{ madurador.set_point_o2 }}</td>
            <td class="text-center">{{ madurador.set_point_co2 }}</td>
            <td class="text-center">{{ madurador.defrost_term_temp }}</td>
            <td class="text-center">{{ madurador.defrost_interval }}</td>
            <td class="text-center">{{ madurador.water_cooled_conde }}</td>
            <td class="text-center">{{ madurador.usda_trip }}</td>
            <td class="text-center">{{ madurador.evaporator_exp_valve }}</td>
            <td class="text-center">{{ madurador.suction_mod_valve }}</td>
            <td class="text-center">{{ madurador.hot_gas_valve }}</td>
            <td class="text-center">{{ madurador.economizer_valve }}</td>
            <td class="text-center">{{ madurador.modelo }}</td>
            <td class="text-center">{{ madurador.latitud }}</td>
            <td class="text-center">{{ madurador.longitud }}</td>
          </tr>
        </tbody>
      </table>
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
      datos_tabla_madurador: [],
      ubicacion: null,
       desde: new Date().getFullYear() + '-' + ('0' + (new Date().getMonth() + 1)).slice(-2) +'-' + ('0' + new Date().getDate()).slice(-2), 
      hasta: new Date().getFullYear() + '-' + ('0' + (new Date().getMonth() + 1)).slice(-2) +'-' + ('0' + new Date().getDate()).slice(-2), 
    };
  },
  watch: {
    contenedor() {
      this.select_contenedor();
    },
    datos_tabla_madurador() {
      $("#tblDetalleContenedores_madurador").DataTable().destroy();
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
        var table2 = $("#tblDetalleContenedores_madurador").DataTable({
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
      self.datos_tabla_madurador = [];

      axios
        .post(route("contenedores.get_datos"), {
          id: this.contenedor,
          tipo: "madurador",
        })
        .then((response) => {
          self.datos_tabla_madurador = response.data;
        })
        .then(() => {
          let mayor_id = self.datos_tabla_madurador
            .map(function (e) {
              return e.id;
            })
            .sort()
            .reverse()[0];
          axios
            .post(route("contenedores.get_lat_log"), {
              id: mayor_id,
              tipo: "madurador",
            })
            .then((response) => {
              
              if (response.data.length > 0) {
                self.ubicacion = [response.data[0].latitud,response.data[0].longitud];
                
              } else {
                self.ubicacion = null;
              }
            })
            .then(() => {
              self.$emit("set_ubicacion_m", self.ubicacion);
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
            tipo: "madurador",
          })
          .then((response) => {
            
             if (response.data.length > 0) {
              self.datos_tabla_madurador = [];
              self.datos_tabla_madurador = response.data;
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
  },
};
</script>