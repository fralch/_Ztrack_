<template>
  <div>
    <div
      id="grid_resumen_reefer"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      style="margin: -30px 15px 10px 15px"
      v-if="tipo == 'reefer'"
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
            v-for="(reef, index) in datos_resumen_reefer"
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
    <!-- ///////////// -->
    <div
      id="grid_resumen_generadores"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      style="margin: -30px 15px 10px 15px"
      v-if="tipo == 'genset'"
    >
      <table
        class="display nowrap"
        id="tblContenedor_generador"
        style="margin: 0 auto !important"
      >
        <thead>
          <tr class="bg-primary" style="color: white !important">
            <!-- <th scope="col" width='50px'>Ver</th> -->
            <th scope="col" width="150px" class="text-center">Generador</th>
            <th scope="col" class="text-center">Tipo</th>
            <th scope="col" class="text-center">Estado</th>
            <th scope="col" width="150px" class="text-center">Booking</th>
            <th scope="col" width="50px" class="text-center">Booking_temp</th>
            <th scope="col" width="50px" class="text-center">Battery_voltage</th>
            <th scope="col" width="50px" class="text-center">Water_temp</th>
            <th scope="col" width="50px" class="text-center">Running_frequency</th>
            <th scope="col" width="50px" class="text-center">Fuel_level</th>
            <th scope="col" width="50px" class="text-center">Voltage_measure</th>
            <th scope="col" width="50px" class="text-center">Rotor_current</th>
            <th scope="col" width="50px" class="text-center">fiel_current</th>
            <th scope="col" width="50px" class="text-center">Speed</th>
            <th scope="col" width="50px" class="text-center">Eco_power</th>
            <th scope="col" width="50px" class="text-center">RPM</th>
            <th scope="col" width="50px" class="text-center">Unit_mode</th>
            <th scope="col" width="50px" class="text-center">Horometro</th>
            <th scope="col" width="50px" class="text-center">Modelo</th>
            <th scope="col" width="50px" class="text-center">Latitud</th>
            <th scope="col" width="50px" class="text-center">Longitud</th>
            <th scope="col" width="50px" class="text-center">Alarma</th>
            <th scope="col" width="50px" class="text-center">Evento</th>
            <th scope="col" width="100px" class="text-center">Reefer_conected</th>
            <th scope="col" width="50px" class="text-center">Set_point</th>
            <th scope="col" width="50px" class="text-center">Temp_supply_1</th>
            <th scope="col" width="50px" class="text-center">Return_air</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(gen, index) in datos_resumen_gen"
            :key="index"
            class="tr_resumen_reef"
            @click="select_contenedor(gen)"
          >
            <!-- <td>
                          <button :id="gen.tipo+'_'+gen.contenedores_id" type="button" class="btn btn-outline-primary" @click="select_contenedor(gen)"  >
                            <i class="bi bi-check-lg"></i>                    
                          </button>
                        </td> -->
            <td class="text-center">{{ gen.nombre_contenedor }}</td>
            <td class="text-center">{{ gen.tipo }}</td>
            <td class="text-center">{{ gen.encendido == 1 ? "SI" : "NO" }}</td>
            <td class="text-center">{{ gen.booking }}</td>
            <td class="text-center">{{ gen.booking_temp }}C°</td>
            <td class="text-center">{{ gen.battery_voltage }}</td>
            <td class="text-center">{{ gen.water_temp }}</td>
            <td class="text-center">{{ gen.running_frequency }}</td>
            <td class="text-center">{{ gen.fuel_level }}</td>
            <td class="text-center">{{ gen.voltage_measure }}</td>
            <td class="text-center">{{ gen.rotor_current }}</td>
            <td class="text-center">{{ gen.fiel_current }}</td>
            <td class="text-center">{{ gen.speed }}</td>
            <td class="text-center">{{ gen.eco_power }}</td>
            <td class="text-center">{{ gen.rpm }}</td>
            <td class="text-center">{{ gen.unit_mode }}</td>
            <td class="text-center">{{ gen.horometro }}</td>
            <td class="text-center">{{ gen.modelo }}</td>
            <td class="text-center">{{ gen.latitud }}</td>
            <td class="text-center">{{ gen.longitud }}</td>
            <td class="text-center">{{ gen.nombre_alarma }}</td>
            <td class="text-center">{{ gen.nombre_evento }}</td>
            <td class="text-center">{{ gen.reefer_conected }}</td>
            <td class="text-center">{{ gen.set_point }}</td>
            <td class="text-center">{{ gen.temp_supply_1 }}</td>
            <td class="text-center">{{ gen.return_air }}</td>
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
      contenedores_encendidos_reefer: [],
      contenedores_encendidos_gen: [],
      datos_resumen_gen: [],
      datos_resumen_reefer: [],
    };
  },
  watch: {
    tipo() {
      this.actualizarTabla();
    },
  },
  methods: {
    TablaContenedores() {
      // console.log('cargar tabla de contenedores'); 
      let self = this;
      this.$nextTick(() => {
        var table = $('#tblContenedor_reefers').DataTable({
          "scrollX": "100%",
          "scrollCollapse": true,
           "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
           "responsive": true,
        });
        /* Esta es la funcion que selecciona una fila  yla colorea  */
          $('#tblContenedor_reefers tbody').on( 'click', 'tr', function () {
              table.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
            }
          );
          
         
      });
     
      
    },
    TablaContenedores_gen(){
      let self = this;
      this.$nextTick(() => {
        var table2 = $('#tblContenedor_generador').DataTable({
          "scrollX": "100%",
          "scrollCollapse": true,
          "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            }
        });
        /* Esta es la funcion que selecciona una fila  yla colorea  */
          $('#tblContenedor_generador tbody').on( 'click', 'tr', function () {
              table2.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
          } );
          
      });
    },
    actualizarTabla(){
      let self = this;

      function obteniendoDatos() {
        console.log('funciono')
        //  if (self.datos_resumen_gen == [] || self.datos_resumen_gen == []) {
        //   axios
        //   .post(route('contenedores.obtener_contendor'), {
        //     tipo: self.tipo
        //   })
        //   .then((res) => {
        //     console.log(res.data);
        //     if (self.tipo =='reefer') {
        //       self.contenedores_encendidos_reefer = res.data;  
        //     }
        //     if (self.tipo =='genset') {
        //       self.contenedores_encendidos_gen = res.data;
        //     }
            
        //   })
        //   .catch((err) => {
        //     console.log(err);
        //   });  
        // }
      }
      async function actualizando() {
        await obteniendoDatos();
        
        if (self.tipo == "reefer") {
          console.log(self.tipo);
            $("#tblContenedor_generador").DataTable().destroy();
            $("#tblContenedor_reefers").DataTable().destroy();
            self.TablaContenedores();      
        } 
        if(self.tipo =='genset') {
          console.log(self.tipo);
          $("#tblContenedor_reefers").DataTable().destroy();
          $("#tblContenedor_generador").DataTable().destroy();
          self.TablaContenedores_gen();   
        }
      }
      actualizando();
      
    },
    resumenContenedor() {
      let self = this;
      this.$nextTick(() => {
        async function rellenar_resumen() {
          self.contenedores_encendidos_gen.map(function (contenedor) {
            axios
              .post(route("contenedores.resumen"), {
                id_contenedor: contenedor.id,
                tipo_contenedor: contenedor.tipo,
              })
              .then((response) => {
                contenedor = Object.assign(contenedor, response.data); // aqui unimos el objeto con los ultimos datos del registro diario
              });
            self.datos_resumen_gen.push(contenedor);
          });
          self.contenedores_encendidos_reefer.map(function (cont) {
            axios
              .post(route("contenedores.resumen"), {
                id_contenedor: cont.id,
                tipo_contenedor: cont.tipo,
              })
              .then((rp) => {
                cont = Object.assign(cont, rp.data); // aqui unimos el objeto con los ultimos datos del registro diario
              });
            self.datos_resumen_reefer.push(cont);
          });
        }
      });
    },
  },
};
</script>
