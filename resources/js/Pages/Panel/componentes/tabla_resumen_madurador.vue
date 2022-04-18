<template>
  <div v-if="tipo == 'madurador' && contenedores_encendidos_madurador.length > 0">
    <div
      id="grid_resumen_madurador"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      style="margin: -30px 15px 10px 15px"
    >
      <table
        class="display nowrap"
        id="tblContenedor_madurador"
        style="margin: 0 auto !important"
      >
        <thead>
          <tr class="bg-danger" style="color: white !important">
            <!-- <th scope="col" width='50px' class="text-center">Ver</th> -->
            <th scope="col" width="150px" class="text-center">Madurador</th>
          
            <th scope="col" class="text-center">Ethylene</th>
            <th scope="col" class="text-center">StateProcess</th>
            <th scope="col" class="text-center">StateInyection</th>
            <th scope="col" class="text-center">TimerOfProcess</th>

            <th scope="col" class="text-center">Tipo</th>
            <th scope="col" class="text-center">Estado</th>
            <th scope="col" width="150px" class="text-center">Booking</th>
            <th scope="col" width="50px" class="text-center">booking_temp</th>
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
          <tr
            v-for="(madurador, index) in contenedores_encendidos_madurador"
            :key="index"
            @click="select_contenedor(madurador)"
          >
            <!-- <td>
            <button :id="madurador.tipo+'_'+madurador.contenedores_id" type="button" class="btn btn-outline-success" @click="select_contenedor(madurador)"  >
            <i class="bi bi-check-lg"></i>                    
            </button>
          </td> -->
            <td class="text-center">{{ madurador.nombre_contenedor }}</td>

            <td class="text-center">{{ madurador.ethylene }}</td>
            <td class="text-center">{{ madurador.stateProcess }}</td>
            <td class="text-center">{{ madurador.stateInyection }}</td>
            <td class="text-center">{{ madurador.timerOfProcess }}</td>

            <td class="text-center">{{ madurador.tipo }}</td>
            <td class="text-center">{{ madurador.encendido == 1 ? "SI" : "NO" }}</td>
            <td class="text-center">{{ madurador.booking }}</td>
            <td class="text-center">{{ madurador.booking_temp }}C°</td>
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
    tipo: String,
  },
  data() {
    return {
      contenedores_encendidos_madurador: [],
      datos_resumen_madurador: [],
    };
  },
  watch: {
     tipo(val) {
      $("#tblContenedor_madurador").DataTable().destroy();
      this.TablaContenedores_madurador();
    },
  },
  mounted() {
    this.actualizarTabla();
  },
  methods: {
    TablaContenedores_madurador() {
      // console.log("armando tabla");
      let self = this;
      this.$nextTick(() => {
        var table = $("#tblContenedor_madurador").DataTable({
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
        /* Esta es la funcion que selecciona una fila  yla colorea  */
        $("#tblContenedor_madurador tbody").on("click", "tr", function () {
          table.$("tr.selected").removeClass("selected");
          $(this).addClass("selected");
        });
      });
    },
    actualizarTabla() {
      let self = this;
      
      axios
        .post(route("contenedores.obtener_contendor"), {
          tipo: "madurador",
        })
        .then((res) => {
          self.contenedores_encendidos_madurador = res.data;
        }); 
       
    },
    
    select_contenedor(contenedor) {
        this.$emit("select_contenedor", contenedor); // emite el evento a contedor padre 
    },
    
  },
};
</script>
