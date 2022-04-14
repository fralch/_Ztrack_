<template>
  <div v-if="tipo == 'reefer' && datos_tabla_reefer.length > 0">
    <div
      id="reefers_grid"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      style="margin: -30px 15px 10px 15px"
    >
      <table class="table display nowrap" id="tblDetalleContenedores_reefers">
        <thead>
          <tr class="bg-info" style="color: white !important">
            <th scope="col">N°</th>
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
          <tr v-for="(reefer, index) in datos_tabla_reefer" :key="index">
            <!-- <td>{{index+1}}</td> -->
            <td class="text-center">{{ reefer.id }}</td>
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
      datos_tabla_reefer: [],
      ubicacion: null,
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
        var table2 = $("#tblDetalleContenedores_reefers").DataTable({
          scrollX: "100%",
          responsive: true,
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
  },
};
</script>