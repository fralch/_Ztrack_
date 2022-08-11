<template>
  <div v-if="tipo == 'reefer' && contenedores_encendidos_reefer.length > 0">
    <div
      id="grid_resumen_reefer"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      style="margin: -30px 15px 10px 15px"
    >
      <table
        class="display nowrap"
        id="tblContenedor_reefers"
        style="margin: 0 auto !important"
      >
        <thead>
          <tr class="bg-success" style="color: white !important">
            <!-- <th scope="col" width='50px' class="text-center">Ver</th> -->
            <th scope="col" width="150px" class="text-center">Reefers</th>
            <th scope="col" class="text-center" @click="ocultar(1)">Tipo</th>
            <th scope="col" class="text-center" @click="ocultar(2)">Estado</th>
            <th scope="col" width="150px" class="text-center" @click="ocultar(3)">Booking</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(4)">booking_temp</th>
            <th scope="col" class="text-center" @click="ocultar(5)">Set_point</th>
            <th scope="col" class="text-center" @click="ocultar(6)">Temp_supply_1</th>
            <th scope="col" class="text-center" @click="ocultar(7)">Temp_supply_2</th>
            <th scope="col" class="text-center" @click="ocultar(8)">Return_air</th>
            <th scope="col" class="text-center" @click="ocultar(9)">Evaporation_coil</th>
            <th scope="col" class="text-center" @click="ocultar(10)">Condensation_coil</th>
            <th scope="col" class="text-center" @click="ocultar(11)">Compress_coil_1</th>
            <th scope="col" class="text-center" @click="ocultar(12)">Compress_coil_2</th>
            <th scope="col" class="text-center" @click="ocultar(13)">Ambient_air</th>
            <th scope="col" class="text-center" @click="ocultar(14)">Cargo_1_temp</th>
            <th scope="col" class="text-center" @click="ocultar(15)">Cargo_2_temp</th>
            <th scope="col" class="text-center" @click="ocultar(16)">Cargo_3_temp</th>
            <th scope="col" class="text-center" @click="ocultar(17)">Cargo_4_temp</th>
            <th scope="col" class="text-center" @click="ocultar(18)">Relative_humidity</th>
            <th scope="col" class="text-center" @click="ocultar(19)">AVL</th>
            <th scope="col" class="text-center" @click="ocultar(20)">Suction_pressure</th>
            <th scope="col" class="text-center" @click="ocultar(21)">Discharge_pressure</th>
            <th scope="col" class="text-center" @click="ocultar(22)">Line_voltage</th>
            <th scope="col" class="text-center" @click="ocultar(23)">Line_frequency</th>
            <th scope="col" class="text-center" @click="ocultar(24)">Consumption_ph_1</th>
            <th scope="col" class="text-center" @click="ocultar(25)">Consumption_ph_2</th>
            <th scope="col" class="text-center" @click="ocultar(26)">Consumption_ph_3</th>
            <th scope="col" class="text-center" @click="ocultar(27)">Co2_reading</th>
            <th scope="col" class="text-center" @click="ocultar(28)">O2_reading</th>
            <th scope="col" class="text-center" @click="ocultar(29)">Evaporator_speed</th>
            <th scope="col" class="text-center" @click="ocultar(30)">Condenser_speed</th>
            <th scope="col" class="text-center" @click="ocultar(31)">Battery_voltage</th>
            <th scope="col" class="text-center" @click="ocultar(32)">Power_kwh</th>
            <th scope="col" class="text-center" @click="ocultar(33)">Power_trip_reading</th>
            <th scope="col" class="text-center" @click="ocultar(34)">Power_trip_duration</th>
            <th scope="col" class="text-center" @click="ocultar(35)">Suction_temp</th>
            <th scope="col" class="text-center" @click="ocultar(36)">Discharge_temp</th>
            <th scope="col" class="text-center" @click="ocultar(37)">Supply_air_temp</th>
            <th scope="col" class="text-center" @click="ocultar(38)">Return_air_temp</th>
            <th scope="col" class="text-center" @click="ocultar(39)">Dl_battery_temp</th>
            <th scope="col" class="text-center" @click="ocultar(40)">Dl_battery_charge</th>
            <th scope="col" class="text-center" @click="ocultar(41)">Power_consumption</th>
            <th scope="col" class="text-center" @click="ocultar(42)">Power_consumption_avg</th>
            <th scope="col" class="text-center" @click="ocultar(43)">Alarm_present</th>
            <th scope="col" class="text-center" @click="ocultar(44)">Capacity_load</th>
            <th scope="col" class="text-center" @click="ocultar(45)">Power_state</th>
            <th scope="col" class="text-center" @click="ocultar(46)">Controlling_mode</th>
            <th scope="col" class="text-center" @click="ocultar(47)">Humidity_control</th>
            <th scope="col" class="text-center" @click="ocultar(48)">Humidity_set_point</th>
            <th scope="col" class="text-center" @click="ocultar(49)">Fresh_air_ex_mode</th>
            <th scope="col" class="text-center" @click="ocultar(50)">Fresh_air_ex_rate</th>
            <th scope="col" class="text-center" @click="ocultar(51)">Fresh_air_ex_delay</th>
            <th scope="col" class="text-center" @click="ocultar(52)">Set_point_o2</th>
            <th scope="col" class="text-center" @click="ocultar(53)">Set_point_co2</th>
            <th scope="col" class="text-center" @click="ocultar(54)">Defrost_term_temp</th>
            <th scope="col" class="text-center" @click="ocultar(55)">Defrost_interval</th>
            <th scope="col" class="text-center" @click="ocultar(56)">Water_cooled_conde</th>
            <th scope="col" class="text-center" @click="ocultar(57)">USDA_trip</th>
            <th scope="col" class="text-center" @click="ocultar(58)">Evaporator_exp_valve</th>
            <th scope="col" class="text-center" @click="ocultar(60)">Suction_mod_valve</th>
            <th scope="col" class="text-center" @click="ocultar(61)">Hot_gas_valve</th>
            <th scope="col" class="text-center" @click="ocultar(62)">Economizer_valve</th>
            <th scope="col" class="text-center" @click="ocultar(63)">Modelo</th>
            <th scope="col" class="text-center" @click="ocultar(64)">Latitud</th>
            <th scope="col" class="text-center" @click="ocultar(65)">Longitud</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(reef, index) in contenedores_encendidos_reefer"
            :key="index"
            @click="select_contenedor(reef)"
          >
            <!-- <td>
            <button :id="reef.tipo+'_'+reef.contenedores_id" type="button" class="btn btn-outline-success" @click="select_contenedor(reef)"  >
            <i class="bi bi-check-lg"></i>                    
            </button>
          </td> -->
            <td class="text-center">{{ reef.nombre_contenedor }}</td>
            <td class="text-center">{{ reef.tipo }}</td>
            <td class="text-center">{{ reef.encendido == 1 ? "SI" : "NO" }}</td>
            <td class="text-center">{{ reef.booking }}</td>
            <td class="text-center">{{ reef.booking_temp }}C°</td>
            <td class="text-center">{{ reef.set_point }}C°</td>
            <td class="text-center">{{ reef.temp_supply_1 }}</td>
            <td class="text-center">{{ reef.temp_supply_2 }}</td>
            <td class="text-center">{{ reef.return_air }}</td>
            <td class="text-center">{{ reef.evaporation_coil }}</td>
            <td class="text-center">{{ reef.condensation_coil }}</td>
            <td class="text-center">{{ reef.compress_coil_1 }}</td>
            <td class="text-center">{{ reef.compress_coil_2 }}</td>
            <td class="text-center">{{ reef.ambient_air }}</td>
            <td class="text-center">{{ reef.cargo_1_temp }}</td>
            <td class="text-center">{{ reef.cargo_2_temp }}</td>
            <td class="text-center">{{ reef.cargo_3_temp }}</td>
            <td class="text-center">{{ reef.cargo_4_temp }}</td>
            <td class="text-center">{{ reef.relative_humidity }}</td>
            <td class="text-center">{{ reef.avl }}</td>
            <td class="text-center">{{ reef.suction_pressure }}</td>
            <td class="text-center">{{ reef.discharge_pressure }}</td>
            <td class="text-center">{{ reef.line_voltage }}</td>
            <td class="text-center">{{ reef.line_frequency }}</td>
            <td class="text-center">{{ reef.consumption_ph_1 }}</td>
            <td class="text-center">{{ reef.consumption_ph_2 }}</td>
            <td class="text-center">{{ reef.consumption_ph_3 }}</td>
            <td class="text-center">{{ reef.co2_reading }}</td>
            <td class="text-center">{{ reef.o2_reading }}</td>
            <td class="text-center">{{ reef.evaporator_speed }}</td>
            <td class="text-center">{{ reef.condenser_speed }}</td>
            <td class="text-center">{{ reef.battery_voltage }}</td>
            <td class="text-center">{{ reef.power_kwh }}</td>
            <td class="text-center">{{ reef.power_trip_reading }}</td>
            <td class="text-center">{{ reef.power_trip_duration }}</td>
            <td class="text-center">{{ reef.suction_temp }}</td>
            <td class="text-center">{{ reef.discharge_temp }}</td>
            <td class="text-center">{{ reef.supply_air_temp }}</td>
            <td class="text-center">{{ reef.return_air_temp }}</td>
            <td class="text-center">{{ reef.dl_battery_temp }}</td>
            <td class="text-center">{{ reef.dl_battery_charge }}</td>
            <td class="text-center">{{ reef.power_consumption }}</td>
            <td class="text-center">{{ reef.power_consumption_avg }}</td>
            <td class="text-center">{{ reef.alarm_present }}</td>
            <td class="text-center">{{ reef.capacity_load }}</td>
            <td class="text-center">{{ reef.power_state }}</td>
            <td class="text-center">{{ reef.controlling_mode }}</td>
            <td class="text-center">{{ reef.humidity_control }}</td>
            <td class="text-center">{{ reef.humidity_set_point }}</td>
            <td class="text-center">{{ reef.fresh_air_ex_mode }}</td>
            <td class="text-center">{{ reef.fresh_air_ex_rate }}</td>
            <td class="text-center">{{ reef.fresh_air_ex_delay }}</td>
            <td class="text-center">{{ reef.set_point_o2 }}</td>
            <td class="text-center">{{ reef.set_point_co2 }}</td>
            <td class="text-center">{{ reef.defrost_term_temp }}</td>
            <td class="text-center">{{ reef.defrost_interval }}</td>
            <td class="text-center">{{ reef.water_cooled_conde }}</td>
            <td class="text-center">{{ reef.usda_trip }}</td>
            <td class="text-center">{{ reef.evaporator_exp_valve }}</td>
            <td class="text-center">{{ reef.suction_mod_valve }}</td>
            <td class="text-center">{{ reef.hot_gas_valve }}</td>
            <td class="text-center">{{ reef.economizer_valve }}</td>
            <td class="text-center">{{ reef.modelo }}</td>
            <td class="text-center">{{ reef.latitud }}</td>
            <td class="text-center">{{ reef.longitud }}</td>
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
     empresa:Array,
  },
  data() {
    return {
      tabla:null, 
      contenedores_encendidos_reefer: [],
      datos_resumen_reefer: [],
    };
  },
  watch: {
     tipo() {
      $("#tblContenedor_reefers").DataTable().destroy();
      this.TablaContenedores_reef();
    },
  },
  mounted() {
    this.actualizarTabla();
  },
  methods: {
    TablaContenedores_reef() {
      // console.log("armando tabla");
      let self = this;
      this.$nextTick(() => {
        self.tabla = $("#tblContenedor_reefers").DataTable({
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
        $("#tblContenedor_reefers tbody").on("click", "tr", function () {
          table.$("tr.selected").removeClass("selected");
          $(this).addClass("selected");
        });
      });
    },
    actualizarTabla() {
      let self = this;

      axios
        .post(route("contenedores.obtener_contendor"), {
          tipo: "reefer",
        })
        .then((res) => {
          if (self.empresa.length > 0 ) {
            self.contenedores_encendidos_reefer = res.data.filter(contenedor => contenedor.empresa_id == self.empresa[0].empresa_id)
          }else{
            self.contenedores_encendidos_reefer = res.data;
          }
        }); 
       
    },
    
    select_contenedor(contenedor) {
        this.$emit("select_contenedor", contenedor); // emite el evento a contedor padre 
    },
     ocultar(val){
       var column = this.tabla.column(val);
        column.visible(!column.visible());
    },
  },
};
</script>
