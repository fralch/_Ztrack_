<template>
	  <div>
                <div 
                  id="generador_grid" 
                  class="col shadow-sm p-3 mb-5 bg-white rounded " 
                  style="margin: -30px 15px 10px 15px; " 
                  v-if="tipo == 'Generador'"
                  >
                  <table  class="table display nowrap" id="tblDetalleContenedores_generadores">
                    <thead>
                      <tr class="bg-info" style="color:white !important;">
                        <th scope="col">N°</th>            
                        <th scope="col" width='50px' class="text-center">Battery_voltage</th>
                        <th scope="col" width='50px' class="text-center">Water_temp</th>
                        <th scope="col" width='50px' class="text-center">Running_frequency</th>
                        <th scope="col" width='50px' class="text-center">Fuel_level</th>
                        <th scope="col" width='50px' class="text-center">Voltage_measure</th>
                        <th scope="col" width='50px' class="text-center">Rotor_current</th>
                        <th scope="col" width='50px' class="text-center">fiel_current</th>
                        <th scope="col" width='50px' class="text-center">Speed</th>
                        <th scope="col" width='50px' class="text-center">Eco_power</th>
                        <th scope="col" width='50px' class="text-center">RPM</th>
                        <th scope="col" width='50px' class="text-center">Unit_mode</th>
                        <th scope="col" width='50px' class="text-center">Horometro</th>
                        <th scope="col" width='50px' class="text-center">Modelo</th>
                        <th scope="col" width='50px' class="text-center">Latitud</th>
                        <th scope="col" width='50px' class="text-center">Longitud</th>
                        <th scope="col" width='50px' class="text-center">Alarma</th>
                        <th scope="col" width='50px' class="text-center">Evento</th>
                        <th scope="col" width='50px' class="text-center">REEFER_CONECTED</th>
                        <th scope="col" width='50px' class="text-center">SET_POINT</th>
                        <th scope="col" width='50px' class="text-center">TEMP_SUPPLY</th>
                        <th scope="col" width='50px' class="text-center">RETURN_AIR</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr 
                        v-for="(generador, index) in datos_tabla_generador" :key="index"
                        class="tr_resumen_gen"
                      >
                        <!-- <td>{{index+1}}</td> -->
                        <td class="text-center">{{generador.id}}</td>
                        <td class="text-center">{{generador.battery_voltage}}</td>
                        <td class="text-center">{{generador.water_temp}}</td>
                        <td class="text-center">{{generador.running_frequency}}</td>
                        <td class="text-center">{{generador.fuel_level}}</td>
                        <td class="text-center">{{generador.voltage_measure}}</td>
                        <td class="text-center">{{generador.rotor_current}}</td>
                        <td class="text-center">{{generador.fiel_current}}</td>
                        <td class="text-center">{{generador.speed}}</td>
                        <td class="text-center">{{generador.eco_power}}</td>
                        <td class="text-center">{{generador.rpm}}</td>
                        <td class="text-center">{{generador.unit_mode}}</td>
                        <td class="text-center">{{generador.horometro}}</td>
                        <td class="text-center">{{generador.modelo}}</td>
                        <td class="text-center">{{generador.latitud}}</td>
                        <td class="text-center">{{generador.longitud}}</td>
                        <td class="text-center">{{generador.alarma_id}}</td>
                        <td class="text-center">{{generador.evento_id}}</td>
                        <td class="text-center">{{generador.reefer_conected}}</td>
                        <td class="text-center">{{generador.set_point}}</td>
                        <td class="text-center">{{generador.temp_supply_1}}</td>
                        <td class="text-center">{{generador.return_air}}</td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                <div 
                  id="reefers_grid" 
                  class="col shadow-sm p-3 mb-5 bg-white rounded "
                  style="margin: -30px 15px 10px 15px;"
                  v-if="tipo == 'Reefer'"
                  >
                  
                  <table  class="table display nowrap" id="tblDetalleContenedores_reefers">
                    <thead>
                      <tr class="bg-info" style="color:white !important;">
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
                        <td class="text-center">{{reefer.id}}</td>
                        <td class="text-center">{{reefer.set_point}}C°</td>
                        <td class="text-center">{{reefer.temp_supply_1}}</td>
                        <td class="text-center">{{reefer.temp_supply_2}}</td>
                        <td class="text-center">{{reefer.return_air}}</td>
                        <td class="text-center">{{reefer.evaporation_coil}}</td>
                        <td class="text-center">{{reefer.condensation_coil}}</td>
                        <td class="text-center">{{reefer.compress_coil_1}}</td>
                        <td class="text-center">{{reefer.compress_coil_2}}</td>
                        <td class="text-center">{{reefer.ambient_air}}</td>
                        <td class="text-center">{{reefer.cargo_1_temp}}</td>
                        <td class="text-center">{{reefer.cargo_2_temp}}</td>
                        <td class="text-center">{{reefer.cargo_3_temp}}</td>
                        <td class="text-center">{{reefer.cargo_4_temp}}</td>
                        <td class="text-center">{{reefer.relative_humidity}}</td>
                        <td class="text-center">{{reefer.avl}}</td>
                        <td class="text-center">{{reefer.suction_pressure}}</td>
                        <td class="text-center">{{reefer.discharge_pressure}}</td>
                        <td class="text-center">{{reefer.line_voltage}}</td>
                        <td class="text-center">{{reefer.line_frequency}}</td>
                        <td class="text-center">{{reefer.consumption_ph_1}}</td>
                        <td class="text-center">{{reefer.consumption_ph_2}}</td>
                        <td class="text-center">{{reefer.consumption_ph_3}}</td>
                        <td class="text-center">{{reefer.co2_reading}}</td>
                        <td class="text-center">{{reefer.o2_reading}}</td>
                        <td class="text-center">{{reefer.evaporator_speed}}</td>
                        <td class="text-center">{{reefer.condenser_speed}}</td>
                        <td class="text-center">{{reefer.battery_voltage}}</td>
                        <td class="text-center">{{reefer.power_kwh}}</td>
                        <td class="text-center">{{reefer.power_trip_reading}}</td>
                        <td class="text-center">{{reefer.power_trip_duration}}</td>
                        <td class="text-center">{{reefer.suction_temp}}</td>
                        <td class="text-center">{{reefer.discharge_temp}}</td>
                        <td class="text-center">{{reefer.supply_air_temp}}</td>
                        <td class="text-center">{{reefer.return_air_temp}}</td>
                        <td class="text-center">{{reefer.dl_battery_temp}}</td>
                        <td class="text-center">{{reefer.dl_battery_charge}}</td>
                        <td class="text-center">{{reefer.power_consumption}}</td>
                        <td class="text-center">{{reefer.power_consumption_avg}}</td>
                        <td class="text-center">{{reefer.alarm_present}}</td>
                        <td class="text-center">{{reefer.capacity_load}}</td>
                        <td class="text-center">{{reefer.power_state}}</td>
                        <td class="text-center">{{reefer.controlling_mode}}</td>
                        <td class="text-center">{{reefer.humidity_control}}</td>
                        <td class="text-center">{{reefer.humidity_set_point}}</td>
                        <td class="text-center">{{reefer.fresh_air_ex_mode}}</td>
                        <td class="text-center">{{reefer.fresh_air_ex_rate}}</td>
                        <td class="text-center">{{reefer.fresh_air_ex_delay}}</td>
                        <td class="text-center">{{reefer.set_point_o2}}</td>
                        <td class="text-center">{{reefer.set_point_co2}}</td>
                        <td class="text-center">{{reefer.defrost_term_temp}}</td>
                        <td class="text-center">{{reefer.defrost_interval}}</td>
                        <td class="text-center">{{reefer.water_cooled_conde}}</td>
                        <td class="text-center">{{reefer.usda_trip}}</td>
                        <td class="text-center">{{reefer.evaporator_exp_valve}}</td>
                        <td class="text-center">{{reefer.suction_mod_valve}}</td>
                        <td class="text-center">{{reefer.hot_gas_valve}}</td>
                        <td class="text-center">{{reefer.economizer_valve}}</td>
                        <td class="text-center">{{reefer.modelo}}</td>
                        <td class="text-center">{{reefer.latitud}}</td>
                        <td class="text-center">{{reefer.longitud}}</td>
                    
                      </tr>
                    </tbody>
                  </table>
                </div>    
    </div>
</template>
<script>
import axios from 'axios';
export default {
	components: {  },
	props: { 
         contenedor: Number
    },
	data() {
		return {
      datos_tabla_reefer:[],
      datos_tabla_generador: [],
		};
	},
	watch: {
	
	},
	methods: {	
   select_contenedor(contenedor){
      let self = this;
      self.datos_tabla_reefer = [];
      self.datos_tabla_generador  = [];
     
      // console.log(contenedor); 

      axios.post(route('contenedores.get_datos'), {
        id: contenedor.contenedor_id,
        tipo: contenedor.tipo
      }).then(response => {   
        console.log(response.data);     
        if (contenedor.tipo == "Reefer") {
          self.datos_tabla_reefer = response.data;
        }
        if (contenedor.tipo == "Generador") {
          self.datos_tabla_generador = response.data;
        }
      }).then(()=>{
          if (contenedor.tipo == "Reefer") {
            let mayor_id = self.datos_tabla_reefer.map(function(e) { return e.id; }).sort().reverse()[0];
           axios
             .post(route('contenedores.get_lat_log'), {id: mayor_id,tipo: contenedor.tipo})
             .then(response => {
               console.log(response.data.latitud, '---',response.data.longitud);
                self.ubicacion =  new google.maps.LatLng(response.data.latitud, response.data.longitud);
             }).then(()=>{
                self.iniciarMap();
              });  
          }
          if (contenedor.tipo == "Generador") {
              let mayor_id = self.datos_tabla_generador.map(function(e) { return e.id; }).sort().reverse()[0];
              axios
              .post(route('contenedores.get_lat_log'), {id: mayor_id,tipo: contenedor.tipo})
              .then(response => {
                console.log(response.data.latitud, '---',response.data.longitud);
                self.ubicacion =  new google.maps.LatLng(response.data.latitud, response.data.longitud);
              }).then(()=>{
                self.iniciarMap();
              });           
          }
      })
      .then(()=>{
        self.setLabelsMyChartPrincipal();
      });
     
      
    
    },
	},
};

