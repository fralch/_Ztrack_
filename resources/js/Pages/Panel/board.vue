<template>
  <layoutprincipal ref="layoutprincipal">  <!-- *** cargando layoutprincipal  **** -->
    <div
      class="slot_body slot_board"
      slot="component-view"
    >
      <div class="content" style="display: block" id="cuerpo">
        <!-- ---------------------- -->
        <div class="content" >
          <div class="row" style=" margin: 0 0 0 0px;">
            <div id='lado_izquierdo' style="margin: 10px 0 0 -5px;">
              <div id="asset-search" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                Asset search
                <input type="text" class="form-control" placeholder="Saved seaches" aria-label="Username" aria-describedby="basic-addon1" style="margin:5px">
                <div class="form-floating" style="margin:5px">
                  <textarea class="form-control" placeholder="Asset ID" id="floatingTextarea"></textarea>
                </div>
                <div class="form-floating" style="margin:5px">
                  <textarea class="form-control" placeholder="Booking Number" id="floatingTextarea"></textarea>
                </div>
                <input type="text" class="form-control" placeholder="Geofence Status" aria-label="Username" aria-describedby="basic-addon1" style="margin:5px">
                <div class="btn-group">
                  <a href="#" class="btn btn-primary active" aria-current="page">Search</a>
                  <a href="#" class="btn btn-primary">Clear</a>
                </div>
              </div>
              <div id="micro-alarms" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                Alarmas 
                <canvas id="myChart_alarms"></canvas>
              </div>
              <div id="cargo-care" class="col shadow-sm p-3 mb-5 bg-white rounded"  >
                Eventos
                <canvas id="myChart_cargo"></canvas>
              </div>
              <div id="pti-result" class="col shadow-sm p-3 mb-5 bg-white rounded" style='display:none; ' >
                PTI result
                <canvas id="myChart_pti"></canvas>
              </div>
              <div id="reefers-fleet" class="col shadow-sm p-3 mb-5 bg-white rounded" style='display:none; ' >
                Reefers fleet 
                 <canvas id="myChart_fleet"></canvas>
              </div>
            </div>
            <div id='lado_derecho' style="">
                <div id="total_reefers" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: 10px 15px 0px 15px;">
                  <div>Total Reefers: {{contenedores_todos.length}}</div>
                  <div class="row" style="margin: 0 10px;">
                    <button type="button" id="select_gen" class="col-3 btn btn-primary" @click="contenedores_prendidos('Generador')" >
                      <i class="bi bi-power"></i> 
                      <b style="font-size:1.2em;">{{contenedores_encendidos_gen.length}}</b>
                      &nbsp;
                      Gen Running 
                    </button>
                    <button type="button" id="select_reef" class="col-3 btn btn-success"  @click="contenedores_prendidos('Reefer')">
                      <i class="bi bi-power"></i> 
                      <b style="font-size:1.2em;">{{contenedores_encendidos_reefer.length}}</b>
                      &nbsp;
                      Reefers Running 
                    </button>
                    <button type="button" class="col-3 btn btn-danger" >
                      <i class="bi bi-power"></i> 
                      <b style="font-size:1.2em;">0</b>
                      &nbsp;
                      Standby
                    </button>
                    <button type="button" class="col-3 btn btn-dark" >
                      <i class="bi bi-power"></i> 
                      <b style="font-size:1.2em;">0</b>
                      &nbsp;
                      Shutdown
                    </button>
                  </div>
                </div>      
<!-- ********** CANVAS MAPA **********-->
                <div id="asset_maps" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px;">
                   <div id="map" style="width:100%; height:365px;"></div>
                </div>
<!-- ********* TABLA RESUMEN CONTENEDORES  *********-->
                <div id="grid_resumen_reefer" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px; "   v-if="tipo == 'Reefer'" >
                  <table class="display nowrap" id="tblContenedor_reefers" style="margin: 0 auto !important;">
                    <thead >
                      <tr class="bg-success" style="color:white !important;">
                        <!-- <th scope="col" width='50px' class="text-center">Ver</th> -->
                        <th scope="col" width='150px' class="text-center">Reefers</th>
                        <th scope="col" class="text-center">Tipo</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" width='150px' class="text-center">Booking</th>
                        <th scope="col" width='50px' class="text-center">booking_temp</th>
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
                        <td class="text-center">{{reef.nombre_contenedor}}</td>
                        <td class="text-center">{{reef.tipo}}</td>
                        <td class="text-center">{{reef.encendido == 1 ? 'SI': 'NO'}}</td>
                        <td class="text-center">{{reef.booking}}</td>
                        <td class="text-center">{{reef.booking_temp}}C°</td>
                        <td class="text-center">{{reef.set_point}}C°</td>
                        <td class="text-center">{{reef.temp_supply_1}}</td>
                        <td class="text-center">{{reef.temp_supply_2}}</td>
                        <td class="text-center">{{reef.return_air}}</td>
                        <td class="text-center">{{reef.evaporation_coil}}</td>
                        <td class="text-center">{{reef.condensation_coil}}</td>
                        <td class="text-center">{{reef.compress_coil_1}}</td>
                        <td class="text-center">{{reef.compress_coil_2}}</td>
                        <td class="text-center">{{reef.ambient_air}}</td>
                        <td class="text-center">{{reef.cargo_1_temp}}</td>
                        <td class="text-center">{{reef.cargo_2_temp}}</td>
                        <td class="text-center">{{reef.cargo_3_temp}}</td>
                        <td class="text-center">{{reef.cargo_4_temp}}</td>
                        <td class="text-center">{{reef.relative_humidity}}</td>
                        <td class="text-center">{{reef.avl}}</td>
                        <td class="text-center">{{reef.suction_pressure}}</td>
                        <td class="text-center">{{reef.discharge_pressure}}</td>
                        <td class="text-center">{{reef.line_voltage}}</td>
                        <td class="text-center">{{reef.line_frequency}}</td>
                        <td class="text-center">{{reef.consumption_ph_1}}</td>
                        <td class="text-center">{{reef.consumption_ph_2}}</td>
                        <td class="text-center">{{reef.consumption_ph_3}}</td>
                        <td class="text-center">{{reef.co2_reading}}</td>
                        <td class="text-center">{{reef.o2_reading}}</td>
                        <td class="text-center">{{reef.evaporator_speed}}</td>
                        <td class="text-center">{{reef.condenser_speed}}</td>
                        <td class="text-center">{{reef.battery_voltage}}</td>
                        <td class="text-center">{{reef.power_kwh}}</td>
                        <td class="text-center">{{reef.power_trip_reading}}</td>
                        <td class="text-center">{{reef.power_trip_duration}}</td>
                        <td class="text-center">{{reef.suction_temp}}</td>
                        <td class="text-center">{{reef.discharge_temp}}</td>
                        <td class="text-center">{{reef.supply_air_temp}}</td>
                        <td class="text-center">{{reef.return_air_temp}}</td>
                        <td class="text-center">{{reef.dl_battery_temp}}</td>
                        <td class="text-center">{{reef.dl_battery_charge}}</td>
                        <td class="text-center">{{reef.power_consumption}}</td>
                        <td class="text-center">{{reef.power_consumption_avg}}</td>
                        <td class="text-center">{{reef.alarm_present}}</td>
                        <td class="text-center">{{reef.capacity_load}}</td>
                        <td class="text-center">{{reef.power_state}}</td>
                        <td class="text-center">{{reef.controlling_mode}}</td>
                        <td class="text-center">{{reef.humidity_control}}</td>
                        <td class="text-center">{{reef.humidity_set_point}}</td>
                        <td class="text-center">{{reef.fresh_air_ex_mode}}</td>
                        <td class="text-center">{{reef.fresh_air_ex_rate}}</td>
                        <td class="text-center">{{reef.fresh_air_ex_delay}}</td>
                        <td class="text-center">{{reef.set_point_o2}}</td>
                        <td class="text-center">{{reef.set_point_co2}}</td>
                        <td class="text-center">{{reef.defrost_term_temp}}</td>
                        <td class="text-center">{{reef.defrost_interval}}</td>
                        <td class="text-center">{{reef.water_cooled_conde}}</td>
                        <td class="text-center">{{reef.usda_trip}}</td>
                        <td class="text-center">{{reef.evaporator_exp_valve}}</td>
                        <td class="text-center">{{reef.suction_mod_valve}}</td>
                        <td class="text-center">{{reef.hot_gas_valve}}</td>
                        <td class="text-center">{{reef.economizer_valve}}</td>
                        <td class="text-center">{{reef.modelo}}</td>
                        <td class="text-center">{{reef.latitud}}</td>
                        <td class="text-center">{{reef.longitud}}</td>
                      
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- ///////////// -->
                <div id="grid_resumen_generadores" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px; "   v-if="tipo == 'Generador'">
                  <table class="display nowrap" id="tblContenedor_generador" style="margin: 0 auto !important;">
                    <thead >
                      <tr class="bg-primary" style="color:white !important;" >
                        <!-- <th scope="col" width='50px'>Ver</th> -->
                        <th scope="col" width='150px' class="text-center">Generador</th>
                        <th scope="col" class="text-center">Tipo</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" width='150px' class="text-center">Booking</th>
                        <th scope="col" width='50px' class="text-center">Booking_temp</th>                      
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
                      </tr>
                    </thead>
                    <tbody>
                      <tr 
                        v-for="(gen, index) in datos_resumen_gen" :key="index"
                        class="tr_resumen_reef"
                        @click="select_contenedor(gen)"
                      >
                        <!-- <td>
                          <button :id="gen.tipo+'_'+gen.contenedores_id" type="button" class="btn btn-outline-primary" @click="select_contenedor(gen)"  >
                            <i class="bi bi-check-lg"></i>                    
                          </button>
                        </td> -->
                        <td class="text-center">{{gen.nombre_contenedor}}</td>
                        <td class="text-center">{{gen.tipo}}</td>
                        <td class="text-center">{{gen.encendido == 1 ? 'SI': 'NO'}}</td>
                        <td class="text-center">{{gen.booking}}</td>
                        <td class="text-center">{{gen.booking_temp}}C°</td>
                        <td class="text-center">{{gen.battery_voltage}}</td>
                        <td class="text-center">{{gen.water_temp}}</td>
                        <td class="text-center">{{gen.running_frequency}}</td>
                        <td class="text-center">{{gen.fuel_level}}</td>
                        <td class="text-center">{{gen.voltage_measure}}</td>
                        <td class="text-center">{{gen.rotor_current}}</td>
                        <td class="text-center">{{gen.fiel_current}}</td>
                        <td class="text-center">{{gen.speed}}</td>
                        <td class="text-center">{{gen.eco_power}}</td>
                        <td class="text-center">{{gen.rpm}}</td>
                        <td class="text-center">{{gen.unit_mode}}</td>
                        <td class="text-center">{{gen.horometro}}</td>
                        <td class="text-center">{{gen.modelo}}</td>
                        <td class="text-center">{{gen.latitud}}</td>
                        <td class="text-center">{{gen.longitud}}</td>
                        <td class="text-center">{{gen.nombre_alarma}}</td>
                        <td class="text-center">{{gen.nombre_evento}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

  <!-- *********** TABLA DETALLE CONTENEDORES *********** -->
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
<!-- *********** GRAFICOS PRINCIPAL *********** -->
                <div 
                  id="myChart_principal_id" 
                  class="col shadow-sm p-3 mb-5 bg-white rounded " 
                  style="margin: -30px 15px 10px 15px; "
                   v-if="tipo != ''"
                  >
                   <canvas id="myChart_principal"  style="height:600px"></canvas>
                </div>
            </div>
          </div>
            <!-- <div class="row">
            <div class="col shadow-sm p-3 mb-5 bg-white rounded">col</div>
            <div class="col">col</div> -->
          </div>
        </div>      
    </div>    
  </layoutprincipal>
</template>

<script>
import layoutprincipal from "../layout.vue";
var myChart_principal; 
var Chart_alarmas; 
var Chart_eventos; 
export default {
  components: { 
    layoutprincipal, 
  },
  props: {
    // tu_cuenta:Array,
    usuario_logeado: Array,
    empresa_logeado: Array,
    contenedores_todos : Array,
    contenedores_encendidos_reefer: Array,   
    contenedores_encendidos_gen: Array,   
  },
  data() {
    return {
      // submited: false, 
      contenedor_selecionado: null, 
      tipo: "",
      mapa: null,
      ubicacion: new google.maps.LatLng(-12.0434112, -75.2178798), 
      contenedores_seleccionados:[],
      datos_tabla_reefer:[],
      datos_tabla_generador: [],
      datos_resumen_gen: [],
      datos_resumen_reefer: [],
      // tipo_contenedor_seleccionado: null, 
      //  ---- myChart_principal -----
      my_Chart_principal_dataset_reefer: [
                {
                  label: 'set_point',
                  data: [],
                  borderColor: '#FFC312',
                  backgroundColor: '#FFC312',
                  borderWidth: 1,
                },
                {
                  label: 'temp_supply_1',
                  data: [],
                  borderColor: '#C4E538',
                  backgroundColor: '#C4E538',
                  borderWidth: 1,
                },
                {
                  label: 'temp_supply_2',
                  data: [],
                  borderColor: '#12CBC4',
                  backgroundColor: '#12CBC4',
                  borderWidth: 1,
                },
                {
                  label: 'return_air',
                  data: [],
                  borderColor: '#FDA7DF',
                  backgroundColor: '#FDA7DF',
                  borderWidth: 1,
                },
                {
                  label: 'evaporation_coil',
                  data: [],
                  borderColor: '#ED4C67',
                  backgroundColor: '#ED4C67',
                  borderWidth: 1,
                },
                {
                  label: 'condensation_coil',
                  data: [],
                  borderColor: '#db0404',
                  backgroundColor: '#db0404',
                  borderWidth: 1,
                },
                {
                  label: 'compress_coil_1',
                  data: [],
                  borderColor: '#009432',
                  backgroundColor: '#009432',
                  borderWidth: 1,
                },
                {
                  label: 'compress_coil_2',
                  data: [],
                  borderColor: '#0652DD',
                  backgroundColor: '#0652DD',
                  borderWidth: 1,
                },
                {
                  label: 'ambient_air',
                  data: [],
                  borderColor: '#9980FA',
                  backgroundColor: '#9980FA',
                  borderWidth: 1,
                },
                {
                  label: 'cargo_1_temp',
                  data: [],
                  borderColor: '#1B1464',
                  backgroundColor: '#1B1464',
                  borderWidth: 1,
                },
                {
                  label: 'cargo_2_temp',
                  data: [],
                  borderColor: '#EE5A24',
                  backgroundColor: '#EE5A24',
                  borderWidth: 1,
                },
                {
                  label: 'cargo_3_temp',
                  data: [],
                  borderColor: '#6F1E51',
                  backgroundColor: '#6F1E51',
                  borderWidth: 1,
                },
                {
                  label: 'cargo_4_temp',
                  data: [],
                  borderColor: '#1F1E51',
                  backgroundColor: '#1F1E51',
                  borderWidth: 1,
                },
                {
                  label: 'relative_humidity',
                  data: [],
                  borderColor: '#FF1E51',
                  backgroundColor: '#FF1E51',
                  borderWidth: 1,
                },
                {
                  label: 'avl',
                  data: [],
                  borderColor: '#F61E51',
                  backgroundColor: '#F61E51',
                  borderWidth: 1,
                },
                {
                  label: 'suction_pressure',
                  data: [],
                  borderColor: '#AF1E51',
                  backgroundColor: '#AF1E51',
                  borderWidth: 1,
                },
                {
                  label: 'discharge_pressure',
                  data: [],
                  borderColor: '#BF1E51',
                  backgroundColor: '#BF1E51',
                  borderWidth: 1,
                },
                {
                  label: 'line_voltage',
                  data: [],
                  borderColor: '#CF1E51',
                  backgroundColor: '#CF1E51',
                  borderWidth: 1,
                },
                {
                  label: 'line_frequency',
                  data: [],
                  borderColor: '#DF1E51',
                  backgroundColor: '#DF1E51',
                  borderWidth: 1,
                },
                {
                  label: 'consumption_ph_1',
                  data: [],
                  borderColor: '#EF1E51',
                  backgroundColor: '#EF1E51',
                  borderWidth: 1,
                },
                {
                  label: 'consumption_ph_2',
                  data: [],
                  borderColor: '#FFFE51',
                  backgroundColor: '#FFFE51',
                  borderWidth: 1,
                },
                {
                  label: 'consumption_ph_3',
                  data: [],
                  borderColor: '#FAE51',
                  backgroundColor: '#FA1E51',
                  borderWidth: 1,
                },
                {
                  label: 'co2_reading',
                  data: [],
                  borderColor: '#AAE51',
                  backgroundColor: '#AA1E51',
                  borderWidth: 1,
                },
                {
                  label: 'o2_reading',
                  data: [],
                  borderColor: '#BA1A51',
                  backgroundColor: '#BA1A51',
                  borderWidth: 1,
                },
                {
                  label: 'evaporator_speed',
                  data: [],
                  borderColor: '#CA1A51',
                  backgroundColor: '#CA1A51',
                  borderWidth: 1,
                },
                {
                  label: 'condenser_speed',
                  data: [],
                  borderColor: '#DA1A51',
                  backgroundColor: '#DA1A51',
                  borderWidth: 1,
                },
                {
                  label: 'battery_voltage',
                  data: [],
                  borderColor: '#EA1A51',
                  backgroundColor: '#EA1A51',
                  borderWidth: 1,
                },
                {
                  label: 'power_kwh',
                  data: [],
                  borderColor: '#FA1A51',
                  backgroundColor: '#FA1A51',
                  borderWidth: 1,
                },
                {
                  label: 'power_trip_reading',
                  data: [],
                  borderColor: '#AB1A51',
                  backgroundColor: '#AB1A51',
                  borderWidth: 1,
                },
                {
                  label: 'power_trip_duration',
                  data: [],
                  borderColor: '#AB1A51',
                  backgroundColor: '#AB1A51',
                  borderWidth: 1,
                },
                {
                  label: 'suction_temp',
                  data: [],
                  borderColor: '#BB1A51',
                  backgroundColor: '#BB1A51',
                  borderWidth: 1,
                },
                {
                  label: 'discharge_temp',
                  data: [],
                  borderColor: '#CB1A51',
                  backgroundColor: '#CB1A51',
                  borderWidth: 1,
                },
                {
                  label: 'supply_air_temp',
                  data: [],
                  borderColor: '#DB1A51',
                  backgroundColor: '#DB1A51',
                  borderWidth: 1,
                },
                {
                  label: 'return_air_temp',
                  data: [],
                  borderColor: '#EB1A51',
                  backgroundColor: '#EB1A51',
                  borderWidth: 1,
                },
                {
                  label: 'dl_battery_temp',
                  data: [],
                  borderColor: '#FB1A51',
                  backgroundColor: '#FB1A51',
                  borderWidth: 1,
                },
                {
                  label: 'dl_battery_charge',
                  data: [],
                  borderColor: '#FB1A51',
                  backgroundColor: '#FB1A51',
                  borderWidth: 1,
                },
                {
                  label: 'power_consumption',
                  data: [],
                  borderColor: '#FC1A51',
                  backgroundColor: '#FC1A51',
                  borderWidth: 1,
                },
                {
                  label: 'power_consumption_avg',
                  data: [],
                  borderColor: '#AC1A51',
                  backgroundColor: '#AC1A51',
                  borderWidth: 1,
                },
                {
                  label: 'capacity_load',
                  data: [],
                  borderColor: '#CC1A51',
                  backgroundColor: '#CC1A51',
                  borderWidth: 1,
                },
                {
                  label: 'humidity_set_point',
                  data: [],
                  borderColor: '#AD1A51',
                  backgroundColor: '#AD1A51',
                  borderWidth: 1,
                },
                {
                  label: 'fresh_air_ex_mode',
                  data: [],
                  borderColor: '#AD1A51',
                  backgroundColor: '#AD1A51',
                  borderWidth: 1,
                },
                {
                  label: 'fresh_air_ex_rate',
                  data: [],
                  borderColor: '#BD1A51',
                  backgroundColor: '#BD1A51',
                  borderWidth: 1,
                },
                {
                  label: 'fresh_air_ex_delay',
                  data: [],
                  borderColor: '#CD1A51',
                  backgroundColor: '#CD1A51',
                  borderWidth: 1,
                },
                {
                  label: 'set_point_o2',
                  data: [],
                  borderColor: '#DD1A51',
                  backgroundColor: '#DD1A51',
                  borderWidth: 1,
                },
                {
                  label: 'set_point_co2',
                  data: [],
                  borderColor: '#ED1A51',
                  backgroundColor: '#ED1A51',
                  borderWidth: 1,
                },
                {
                  label: 'defrost_term_temp',
                  data: [],
                  borderColor: '#FD1A51',
                  backgroundColor: '#FD1A51',
                  borderWidth: 1,
                },
                {
                  label: 'defrost_interval',
                  data: [],
                  borderColor: '#AE1A51',
                  backgroundColor: '#AE1A51',
                  borderWidth: 1,
                },
                {
                  label: 'evaporator_exp_valve',
                  data: [],
                  borderColor: '#DE1A51',
                  backgroundColor: '#DE1A51',
                  borderWidth: 1,
                },
                {
                  label: 'suction_mod_valve',
                  data: [],
                  borderColor: '#EE1A51',
                  backgroundColor: '#EE1A51',
                  borderWidth: 1,
                },
                {
                  label: 'hot_gas_valve',
                  data: [],
                  borderColor: '#FE1A51',
                  backgroundColor: '#FE1A51',
                  borderWidth: 1,
                },
                {
                  label: 'economizer_valve',
                  data: [],
                  borderColor: '#AF1A51',
                  backgroundColor: '#AF1A51',
                  borderWidth: 1,
                },
               
                
              ],
      my_Chart_principal_dataset_generador: [
                {
                  label: 'SetPoint',
                  data: [],
                  borderColor: '#db0404',
                  backgroundColor: '#db0404',
                  borderWidth: 1,
                },
                {
                  label: 'TempSupply',
                  data: [],
                  borderColor: '#3498db',
                  backgroundColor: '#3498db',
                  borderWidth: 1,               
                },
                {
                  label: 'TempReturn',
                  data: [],
                  borderColor: '#9b59b6',
                  backgroundColor: '#9b59b6',
                  borderWidth: 1,               
                },
                {
                  label: 'ReHume',
                  data: [],
                  borderColor: '#e67e22',
                  backgroundColor: '#e67e22',
                  borderWidth: 1,               
                },
                {
                  label: 'ReCo2',
                  data: [],
                  borderColor: '#1abc9c',
                  backgroundColor: '#1abc9c',
                  borderWidth: 1,               
                },
                {
                  label: 'ReO2',
                  data: [],
                  borderColor: '#2c3e50',
                  backgroundColor: '#2c3e50',
                  borderWidth: 1,               
                },
                {
                  label: 'Alv',
                  data: [],
                  borderColor: '#f39c12',
                  backgroundColor: '#f39c12',
                  borderWidth: 1,               
                },
              ],
      my_Chart_principal_labels: [],
      my_Chart_principal_dataSetable: [],
      // --------- chart alarmas ------
      chart_alarma_labels : [],
      chart_alarma_dataset_data : [],
      //  -------- chart eventos -------
      chart_eventos_labels : [],
      chart_eventos_dataset_data : [],
    };
  },
  watch: {
    tipo(val){
      // console.log(val);
      if (val == "Reefer") {
         this.datos_tabla_reefer=[]; 
         this.datos_tabla_generador =[] ;
        // console.log("reefer");
        $("#tblDetalleContenedores_reefers").DataTable().destroy();
        $("#tblContenedor_generador").DataTable().destroy();
        $("#tblContenedor_reefers").DataTable().destroy();
        this.TablaContenedores();        
      }
      if (val == "Generador") {
        // console.log("Generador");
        $("#tblDetalleContenedores_generadores").DataTable().destroy();
        $("#tblContenedor_reefers").DataTable().destroy();
        $("#tblContenedor_generador").DataTable().destroy();
        this.TablaContenedores_gen();   
      }
    },
    datos_tabla_generador(){
      // console.log(screen.width); 
      if (this.tipo == "Generador") {
        $("#tblDetalleContenedores_reefers").DataTable().destroy();
        $("#tblDetalleContenedores_generadores").DataTable().destroy();
          this.TablaDetalleContenedores_g();
          this.TablaDetalleContenedores_r();
      }     
      
      // this.iniciarGraficos();
    },
    datos_tabla_reefer(){
      if (this.tipo == "Reefer") {
        $("#tblDetalleContenedores_generadores").DataTable().destroy();
        $("#tblDetalleContenedores_reefers").DataTable().destroy();
        this.TablaDetalleContenedores_r();
        this.TablaDetalleContenedores_g();
       }
      
      // this.iniciarGraficos();
    },
  },
 
  mounted() {
    this.usuarioLogeado();
    this.bienvenida();
    this.iniciarMap();    
   
    // -- graficos circulares --
    this.Circular_iniciarGraficosAlarms();
    this.Circular_iniciarGraficosEventos();
    this.Circular_iniciarGraficosPTI();
    this.Circular_iniciarGraficosFleet();

    // this.myChartPrincipal();}
    this.resumenContenedor(); 
    // this.TablaContenedores_gen(); 
    // this.TablaContenedores();
  },

  methods: {
    autoRefresh(){
      // let self = this;
      // this.$nextTick(() => {
      //    async function f() {
      //     let promise = new Promise((resolve, reject) => {
      //       setTimeout(() => resolve(true), 600000)
      //     });
      //     let result = await promise; 
      //      if(self.tipo == 'Reefer'){
      //       let contenedor = self.contenedores_seleccionados.filter(element => element.tipo == 'Reefer');
      //       console.log(contenedor[0])
      //       self.select_contenedor(contenedor[0]); 
      //     }else if(self.tipo == 'Generador'){
      //       let contenedor = self.contenedores_seleccionados.filter(element => element.tipo == 'Generador');
      //       self.select_contenedor(contenedor[0]); 
      //       console.log(contenedor[0])
      //     }
      //   }
      //   f();
      // });
    },
    bienvenida() {
     Swal.fire({
        title: 'Bienvenido!',
        icon: 'success',
        text: (this.usuario_logeado[0].nombres + " "+ this.usuario_logeado[0].apellidos ).toUpperCase(),
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK!'
      })
    },
    TablaContenedores() {
      // console.log('cargar tabla de contenedores'); 
      let self = this;
      this.$nextTick(() => {
        var table = $('#tblContenedor_reefers').DataTable({
          scrollX: "100%",
          scrollCollapse: true,
          select: 'single',
          	select: {
						style: "single",
						info: false,
					},
          language: {
              retrieve: true,
              decimal: "",
              emptyTable: "No hay datos disponibles en la tabla",
              info: "Mostrando del _START_ al _END_ de _TOTAL_ registros",
              infoEmpty: "No se encontraron registros",
              infoFiltered: "(filtrado de _MAX_ registros)",
              infoPostFix: "",
              thousands: ",",
              lengthMenu: "Agrupar por _MENU_ filas",
              loadingRecords: "Cargando...",
              processing: "Procesando...",
              search: "Buscar:",
              zeroRecords: "No se encontraron registros",
              paginate: {
                first: "Primera",
                last: "Ultima",
                next: '<i class="fas fa-chevron-circle-right" style="font-size:20px;"></i>',
                previous:
                  '<i class="fas fa-chevron-circle-left" style="font-size:20px;"></i>',
              },
          },
           responsive: true,
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
          scrollX: "100%",
          scrollCollapse: true,
          language: {
              retrieve: true,
              decimal: "",
              emptyTable: "No hay datos disponibles en la tabla",
              info: "Mostrando del _START_ al _END_ de _TOTAL_ registros",
              infoEmpty: "No se encontraron registros",
              infoFiltered: "(filtrado de _MAX_ registros)",
              infoPostFix: "",
              thousands: ",",
              lengthMenu: "Agrupar por _MENU_ filas",
              loadingRecords: "Cargando...",
              processing: "Procesando...",
              search: "Buscar:",
              zeroRecords: "No se encontraron registros",
              paginate: {
                first: "Primera",
                last: "Ultima",
                next: '<i class="fas fa-chevron-circle-right" style="font-size:20px;"></i>',
                previous:
                  '<i class="fas fa-chevron-circle-left" style="font-size:20px;"></i>',
              },
              responsive: true,
          },
        });
        /* Esta es la funcion que selecciona una fila  yla colorea  */
          $('#tblContenedor_generador tbody').on( 'click', 'tr', function () {
              table2.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
          } );
          
      });
    },
    TablaDetalleContenedores_r() {
     let self = this;
      this.$nextTick(() => {
        var table2 = $('#tblDetalleContenedores_reefers').DataTable({
           scrollX: "100%",
           order: [ 0, "desc" ],
          language: {
              retrieve: true,
              decimal: "",
              emptyTable: "No hay datos disponibles en la tabla",
              info: "Mostrando del _START_ al _END_ de _TOTAL_ registros",
              infoEmpty: "No se encontraron registros",
              infoFiltered: "(filtrado de _MAX_ registros)",
              infoPostFix: "",
              thousands: ",",
              lengthMenu: "Agrupar por _MENU_ filas",
              loadingRecords: "Cargando...",
              processing: "Procesando...",
              search: "Buscar:",
              zeroRecords: "No se encontraron registros",
              paginate: {
                first: "Primera",
                last: "Ultima",
                next: '<i class="fas fa-chevron-circle-right" style="font-size:20px;"></i>',
                previous:
                  '<i class="fas fa-chevron-circle-left" style="font-size:20px;"></i>',
              },
              responsive: true,
          },       
        });
      });
      
    },
    TablaDetalleContenedores_g() {
     let self = this;
      this.$nextTick(() => {
        var table = $('#tblDetalleContenedores_generadores').DataTable({
           scrollX: "100%",
           responsive: true,
            order: [ 0, "desc" ],
          language: {
              retrieve: true,
              decimal: "",
              emptyTable: "No hay datos disponibles en la tabla",
              info: "Mostrando del _START_ al _END_ de _TOTAL_ registros",
              infoEmpty: "No se encontraron registros",
              infoFiltered: "(filtrado de _MAX_ registros)",
              infoPostFix: "",
              thousands: ",",
              lengthMenu: "Agrupar por _MENU_ filas",
              loadingRecords: "Cargando...",
              processing: "Procesando...",
              search: "Buscar:",
              zeroRecords: "No se encontraron registros",
              paginate: {
                first: "Primera",
                last: "Ultima",
                next: '<i class="fas fa-chevron-circle-right" style="font-size:20px;"></i>',
                previous:
                  '<i class="fas fa-chevron-circle-left" style="font-size:20px;"></i>',
              },
              
          },       
        });
        
      });
   
    },
    iniciarMap() {
      let self = this;
      this.$nextTick(() => {
         self.mapa = new google.maps.Map(document.getElementById("map"), {
            center: self.ubicacion,
            zoom: 15,
          });

          let marcador = new google.maps.Marker({
            position: self.ubicacion,
            map: self.mapa,
          });
          marcador.setPosition( self.ubicacion);
          
      });
    },
   
    Circular_iniciarGraficosAlarms(){
      let self = this;
      var ctx_alarms = document.getElementById('myChart_alarms').getContext('2d');
      Chart_alarmas = new Chart(ctx_alarms, {
          type: 'doughnut',
          data: {
              labels: self.chart_alarma_labels,
              datasets: [{
                data: self.chart_alarma_dataset_data,
                backgroundColor: [
                  '#9c88ff',
                  '#fbc531',
                  '#e84118',
                  '#00a8ff',
                  '#718093',
                ],
                hoverOffset: 4
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
    },
    Circular_iniciarGraficosEventos(){
      let self = this;
      var ctx_cargo = document.getElementById('myChart_cargo').getContext('2d');
      Chart_eventos = new Chart(ctx_cargo, {
          type: 'doughnut',
          data: {
              labels:self.chart_eventos_labels ,
              datasets: [{
                label: 'My First Dataset',
                data: self.chart_eventos_dataset_data,
                backgroundColor: [
                  '#fc5c65', 
                  '#fd9644',
                  '#fed330',  
                  '#26de81',
                  '#a55eea',
                ],
                hoverOffset: 4
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
    },
    Circular_iniciarGraficosPTI(){
      var ctx_pti = document.getElementById('myChart_pti').getContext('2d');
      var myChart_pti = new Chart(ctx_pti, {
          type: 'doughnut',
          data: {
              labels: [
                'Red',
                'Blue',
                'Yellow'
              ],
              datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
    },
    Circular_iniciarGraficosFleet(){
      var ctx_fleet = document.getElementById('myChart_fleet').getContext('2d');
      var myChart_fleet = new Chart(ctx_fleet, {
          type: 'line',
          data: {
              labels: [
                
              ],
              datasets: [{
                label: 'Reefers fleet',
                data: [300, 50, 100],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
    },
    usuarioLogeado(){
      /* AQUI ES DONDE SE PONE EL NOMBRE DEL USUARIO EN EL NAV  */
      // this.$refs.layoutprincipal.usuario = (this.usuario_logeado[0].nombres + " " + this.usuario_logeado[0].apellidos).toUpperCase() ;
      this.$refs.layoutprincipal.usuario = (this.usuario_logeado[0].nombres ).toUpperCase() ;
     this.$refs.layoutprincipal.admin = this.usuario_logeado[0].admin; 
     
    },
    contenedores_prendidos(variable){
      // this.contenedores_seleccionados = this.contenedores_encendidos;
      
      this.tipo = variable; 
    },
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
            let lat = self.datos_tabla_reefer[self.datos_tabla_reefer.length -1].latitud;
            let lon = self.datos_tabla_reefer[self.datos_tabla_reefer.length -1].longitud;
            // self.ubicacion = {lat: lat, lng: lon};
            // console.log(lat + " " + lon);
            self.ubicacion =  new google.maps.LatLng(lat, lon);
          }
          if (contenedor.tipo == "Generador") {
            let lat = self.datos_tabla_generador[self.datos_tabla_generador.length -1].latitud;
            let lon = self.datos_tabla_generador[self.datos_tabla_generador.length -1].longitud;
            // console.log(lat + " " + lon);
           self.ubicacion =  new google.maps.LatLng(lat, lon);
          }
      }).then(()=>{
        self.iniciarMap();
      }).then(()=>{
        self.setLabelsMyChartPrincipal();
      });
     
      
    
    },
    myChartPrincipal(){
      let self = this;
      
      const ctx_principal = document.getElementById('myChart_principal').getContext('2d');
      myChart_principal = new Chart(ctx_principal, {
        type: 'line',
        data: {
        labels: self.my_Chart_principal_labels,
        datasets: self.my_Chart_principal_dataSetable,
        },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              y: { 
                min: 0
                }
              },
          }
      });   
    //  console.log('myChart_principal');
      // myChart_principal.resize();
     
    },
    setLabelsMyChartPrincipal(){
      let self = this;
     async function set_labels(){ 
        self.my_Chart_principal_labels = [];
        if (self.tipo == "Reefer") {
        self.datos_tabla_reefer.map(function(datos_r, index){
              let date = new Date(datos_r.created_at);
              let day = date.getDate()
              let month = date.getMonth() + 1
              let year = date.getFullYear()
              let hours = date.getHours();
              let minutes = date.getMinutes();
              let seconds = date.getSeconds();
              if (minutes < 10) {
                  minutes = "0" + minutes;
              }
                
              if (seconds < 10) {
                  seconds = "0" + seconds;
              }
              
              if(month < 10){
                self.my_Chart_principal_labels.push(`${day}-0${month}-${year} ${hours}:${minutes}:${seconds}`);
              }else{
                self.my_Chart_principal_labels.push(`${day}-${month}-${year}  ${hours}:${minutes}:${seconds}`);
              }
              //  console.log(self.my_Chart_principal_labels);
         });
        }
        if (self.tipo == "Generador") {
          self.datos_tabla_generador.map(function(datos_g, index){
              let date = new Date(datos_g.created_at);
              let day = date.getDate()
              let month = date.getMonth() + 1
              let year = date.getFullYear()
              let hours = date.getHours();
              let minutes = date.getMinutes();
              let seconds = date.getSeconds();
              if (minutes < 10) {
                  minutes = "0" + minutes;
              }
                
              if (seconds < 10) {
                  seconds = "0" + seconds;
              }
              
              if(month < 10){
                self.my_Chart_principal_labels.push(`${day}-0${month}-${year} ${hours}:${minutes}:${seconds}`);
              }else{
                self.my_Chart_principal_labels.push(`${day}-${month}-${year}  ${hours}:${minutes}:${seconds}`);
              }
          });
          // console.log(self.my_Chart_principal_labels);
        }
     }

      set_labels()
      .then(()=>{
        self.setDatosGraficoPrincipal();
      })
      .then(()=>{
        // if (myChart_principal) {
        //   myChart_principal.update();
        //   myChart_principal.destroy();
        //   self.myChartPrincipal();
        // }else{
        //   self.myChartPrincipal();
        // }
      })
      .then(()=>{
          // self.$nextTick(() => {
          //   console.log(self.datos_tabla_generador[0].contenedor_id); 
          // });
            // self.chart_alarma_labels = [];
            // self.chart_alarma_dataset_data = [];
            // self.chart_eventos_labels = [];
            // self.chart_eventos_dataset_data = [];

        // // // if (self.tipo == "Reefer") {
        // // //   axios
        // // //   .post(route('contenedores.get_alarma_evento'), {
        // // //     id: self.datos_tabla_generador[0].contenedor_id,
        // // //     tipo: self.tipo
        // // //   })
        // // //   .then(response => {
            
        // // //     if (response.data != 0 && self.chart_alarma_labels.length == 0) {
        // // //       response.data['alarma'].forEach(element => {
        // // //         self.chart_alarma_labels.push(element.nombre_alarma);
        // // //         self.chart_alarma_dataset_data.push(element.cantidad_alarma);
        // // //       });
        // // //       response.data['evento'].forEach(element => {
        // // //         self.chart_eventos_labels.push(element.nombre_evento);
        // // //         self.chart_eventos_dataset_data.push(element.cantidad_evento);
        // // //       });
        // // //     }
        // // //   }).then(()=>{
        // // //     Chart_alarmas.update(); 
        // // //   }).then(()=>{
        // // //     Chart_eventos.update(); 
        // // //   });
        // // // }
        // // // if (self.tipo == "Generador") {
          
        // // //   axios
        // // //   .post(route('contenedores.get_alarma_evento'), {
        // // //     id: self.datos_tabla_reefer[0].contenedor_id,
        // // //     tipo: self.tipo
        // // //   })
        // // //   .then(response => {            
        // // //   });
        // // // }
       
      }).then(()=>{
        // self.autoRefresh();
      });
    },
    setDatosGraficoPrincipal(){
      /* CUANDO QUIERAS AGREGAR O QUITAR VARIABLES PARA EL GRAFICO PRINCIPAL PRIMERO TIENES AGREGARLOS EN LOS DATA QUE ESTAN ABAJO DE LOS PROPS LUEGO ACTUALIZARLOS AQUI  */
      let self = this;
      async function set_data(){ 
      self.my_Chart_principal_dataset = [];
       if (self.tipo == "Reefer") {
         self.my_Chart_principal_dataset_reefer[0].data = [];
            self.my_Chart_principal_dataset_reefer[1].data = [];
            self.my_Chart_principal_dataset_reefer[2].data = [];
            self.my_Chart_principal_dataset_reefer[3].data = [];
            self.my_Chart_principal_dataset_reefer[4].data = [];
            self.my_Chart_principal_dataset_reefer[5].data = [];
            self.my_Chart_principal_dataset_reefer[6].data = [];
            self.my_Chart_principal_dataset_reefer[7].data = [];
            self.my_Chart_principal_dataset_reefer[8].data = [];
            self.my_Chart_principal_dataset_reefer[9].data = [];
            self.my_Chart_principal_dataset_reefer[10].data = [];
            self.my_Chart_principal_dataset_reefer[11].data = [];
            self.my_Chart_principal_dataset_reefer[12].data = [];
            self.my_Chart_principal_dataset_reefer[13].data = [];
            self.my_Chart_principal_dataset_reefer[14].data = [];
            self.my_Chart_principal_dataset_reefer[15].data = [];
            self.my_Chart_principal_dataset_reefer[16].data = [];
            self.my_Chart_principal_dataset_reefer[17].data = [];
            self.my_Chart_principal_dataset_reefer[18].data = [];
            self.my_Chart_principal_dataset_reefer[19].data = [];
            self.my_Chart_principal_dataset_reefer[20].data = [];
            self.my_Chart_principal_dataset_reefer[21].data = [];
            self.my_Chart_principal_dataset_reefer[22].data = [];
            self.my_Chart_principal_dataset_reefer[23].data = [];
            self.my_Chart_principal_dataset_reefer[24].data = [];
            self.my_Chart_principal_dataset_reefer[25].data = [];
            self.my_Chart_principal_dataset_reefer[26].data = [];
            self.my_Chart_principal_dataset_reefer[27].data = [];
            self.my_Chart_principal_dataset_reefer[28].data = [];
            self.my_Chart_principal_dataset_reefer[29].data = [];
            self.my_Chart_principal_dataset_reefer[30].data = [];
            self.my_Chart_principal_dataset_reefer[31].data = [];
            self.my_Chart_principal_dataset_reefer[32].data = [];
            self.my_Chart_principal_dataset_reefer[33].data = [];
            self.my_Chart_principal_dataset_reefer[34].data = [];
            self.my_Chart_principal_dataset_reefer[35].data = [];
            self.my_Chart_principal_dataset_reefer[36].data = [];
            self.my_Chart_principal_dataset_reefer[37].data = [];
            self.my_Chart_principal_dataset_reefer[38].data = [];
            self.my_Chart_principal_dataset_reefer[39].data = [];
            self.my_Chart_principal_dataset_reefer[40].data = [];
            self.my_Chart_principal_dataset_reefer[41].data = [];
            self.my_Chart_principal_dataset_reefer[42].data = [];
            self.my_Chart_principal_dataset_reefer[43].data = [];
            self.my_Chart_principal_dataset_reefer[44].data = [];
            self.my_Chart_principal_dataset_reefer[45].data = [];
            self.my_Chart_principal_dataset_reefer[46].data = [];
            self.my_Chart_principal_dataset_reefer[47].data = [];
            self.my_Chart_principal_dataset_reefer[48].data = [];
            self.my_Chart_principal_dataset_reefer[49].data = [];
            self.my_Chart_principal_dataset_reefer[50].data = [];

        self.datos_tabla_reefer.map(function(datos_r, index){
            self.my_Chart_principal_dataset_reefer[0].data.push(datos_r.set_point);
            self.my_Chart_principal_dataset_reefer[1].data.push(datos_r.temp_supply_1);
            self.my_Chart_principal_dataset_reefer[2].data.push(datos_r.temp_supply_2);
            self.my_Chart_principal_dataset_reefer[3].data.push(datos_r.return_air);
            self.my_Chart_principal_dataset_reefer[4].data.push(datos_r.evaporation_coil);
            self.my_Chart_principal_dataset_reefer[5].data.push(datos_r.condensation_coil);
            self.my_Chart_principal_dataset_reefer[6].data.push(datos_r.compress_coil_1);
            self.my_Chart_principal_dataset_reefer[7].data.push(datos_r.compress_coil_2);
            self.my_Chart_principal_dataset_reefer[8].data.push(datos_r.ambient_air);
            self.my_Chart_principal_dataset_reefer[9].data.push(datos_r.cargo_1_temp);
            self.my_Chart_principal_dataset_reefer[10].data.push(datos_r.cargo_2_temp);
            self.my_Chart_principal_dataset_reefer[11].data.push(datos_r.cargo_3_temp);
            self.my_Chart_principal_dataset_reefer[12].data.push(datos_r.cargo_4_temp);
            self.my_Chart_principal_dataset_reefer[13].data.push(datos_r.relative_humidity);
            self.my_Chart_principal_dataset_reefer[14].data.push(datos_r.avl);
            self.my_Chart_principal_dataset_reefer[15].data.push(datos_r.suction_pressure);
            self.my_Chart_principal_dataset_reefer[16].data.push(datos_r.discharge_pressure);
            self.my_Chart_principal_dataset_reefer[17].data.push(datos_r.line_voltage);
            self.my_Chart_principal_dataset_reefer[18].data.push(datos_r.line_frequency);
            self.my_Chart_principal_dataset_reefer[19].data.push(datos_r.consumption_ph_1);
            self.my_Chart_principal_dataset_reefer[20].data.push(datos_r.consumption_ph_2);
            self.my_Chart_principal_dataset_reefer[21].data.push(datos_r.consumption_ph_3);
            self.my_Chart_principal_dataset_reefer[22].data.push(datos_r.co2_reading);
            self.my_Chart_principal_dataset_reefer[23].data.push(datos_r.o2_reading);
            self.my_Chart_principal_dataset_reefer[24].data.push(datos_r.evaporator_speed);
            self.my_Chart_principal_dataset_reefer[25].data.push(datos_r.condenser_speed);
            self.my_Chart_principal_dataset_reefer[26].data.push(datos_r.battery_voltage);
            self.my_Chart_principal_dataset_reefer[27].data.push(datos_r.power_kwh);
            self.my_Chart_principal_dataset_reefer[28].data.push(datos_r.power_trip_reading);
            self.my_Chart_principal_dataset_reefer[29].data.push(datos_r.power_trip_duration);
            self.my_Chart_principal_dataset_reefer[30].data.push(datos_r.suction_temp);
            self.my_Chart_principal_dataset_reefer[31].data.push(datos_r.discharge_temp);
            self.my_Chart_principal_dataset_reefer[32].data.push(datos_r.supply_air_temp);
            self.my_Chart_principal_dataset_reefer[33].data.push(datos_r.return_air_temp);
            self.my_Chart_principal_dataset_reefer[34].data.push(datos_r.dl_battery_temp);
            self.my_Chart_principal_dataset_reefer[35].data.push(datos_r.dl_battery_charge);
            self.my_Chart_principal_dataset_reefer[36].data.push(datos_r.power_consumption);
            self.my_Chart_principal_dataset_reefer[37].data.push(datos_r.power_consumption_avg);
            self.my_Chart_principal_dataset_reefer[38].data.push(datos_r.capacity_load);
            self.my_Chart_principal_dataset_reefer[39].data.push(datos_r.humidity_set_point);
            self.my_Chart_principal_dataset_reefer[40].data.push(datos_r.fresh_air_ex_mode);
            self.my_Chart_principal_dataset_reefer[41].data.push(datos_r.fresh_air_ex_rate);
            self.my_Chart_principal_dataset_reefer[42].data.push(datos_r.fresh_air_ex_delay);
            self.my_Chart_principal_dataset_reefer[43].data.push(datos_r.set_point_o2);
            self.my_Chart_principal_dataset_reefer[44].data.push(datos_r.set_point_co2);
            self.my_Chart_principal_dataset_reefer[45].data.push(datos_r.defrost_term_temp);
            self.my_Chart_principal_dataset_reefer[46].data.push(datos_r.defrost_interval);
            self.my_Chart_principal_dataset_reefer[47].data.push(datos_r.evaporator_exp_valve);
            self.my_Chart_principal_dataset_reefer[48].data.push(datos_r.suction_mod_valve);
            self.my_Chart_principal_dataset_reefer[49].data.push(datos_r.hot_gas_valve);
            self.my_Chart_principal_dataset_reefer[50].data.push(datos_r.economizer_valve);
        });
       }
      //  if (self.tipo == "Generador") {
      //     self.datos_tabla_generador.map(function(datos_g, index){
      //       self.my_Chart_principal_dataset_generador[0].data = [];
      //       self.my_Chart_principal_dataset_generador[1].data = [];
      //       self.my_Chart_principal_dataset_generador[2].data = [];
      //       self.my_Chart_principal_dataset_generador[3].data = [];
      //       self.my_Chart_principal_dataset_generador[4].data = [];
      //       self.my_Chart_principal_dataset_generador[5].data = [];
      //       self.my_Chart_principal_dataset_generador[6].data = [];
      //       self.my_Chart_principal_dataset_generador[7].data = [];
      //       self.my_Chart_principal_dataset_generador[8].data = [];
      //       self.my_Chart_principal_dataset_generador[9].data = [];
      //       self.my_Chart_principal_dataset_generador[10].data = [];

      //       self.my_Chart_principal_dataset_reefer[0].data.push(datos_r.battery_voltage);
      //       self.my_Chart_principal_dataset_reefer[1].data.push(datos_r.water_temp);
      //       self.my_Chart_principal_dataset_reefer[2].data.push(datos_r.running_frequency);
      //       self.my_Chart_principal_dataset_reefer[3].data.push(datos_r.fuel_level);
      //       self.my_Chart_principal_dataset_reefer[4].data.push(datos_r.voltage_measure);
      //       self.my_Chart_principal_dataset_reefer[5].data.push(datos_r.rotor_current);
      //       self.my_Chart_principal_dataset_reefer[6].data.push(datos_r.fiel_current);
      //       self.my_Chart_principal_dataset_reefer[7].data.push(datos_r.speed);
      //       self.my_Chart_principal_dataset_reefer[8].data.push(datos_r.eco_power);
      //       self.my_Chart_principal_dataset_reefer[9].data.push(datos_r.rpm);
      //       self.my_Chart_principal_dataset_reefer[10].data.push(datos_r.horometro);
      //       // -----------------
           
      //     });
      //   }
      //   console.log('my_Chart_principal_dataset');
       }

       set_data().then(()=>{
          // if (myChart_principal) {
          //   myChart_principal.update();
          // }else{
          //   self.myChartPrincipal();
          // }
          // if (self.tipo == "Reefer") {
          // self.my_Chart_principal_dataSetable = self.my_Chart_principal_dataset_reefer;
          // }
          // if (self.tipo == "Generador") {
          //   self.my_Chart_principal_dataSetable = self.my_Chart_principal_dataset_generador;
          // }
       });
    },
    resumenContenedor(){
      let self = this;
      this.$nextTick(() => {
         async function rellenar_resumen() {
           self.contenedores_encendidos_gen.map(function(contenedor){
                axios
                    .post(route('contenedores.resumen'), {
                      id_contenedor: contenedor.id,
                      tipo_contenedor: contenedor.tipo,
                    })
                    .then(response => {  
                      contenedor = Object.assign(contenedor, response.data);      // aqui unimos el objeto con los ultimos datos del registro diario
                    });
              self.datos_resumen_gen.push(contenedor);
            });
            self.contenedores_encendidos_reefer.map(function(cont){
                axios
                    .post(route('contenedores.resumen'), {
                      id_contenedor: cont.id,
                      tipo_contenedor: cont.tipo,
                    })
                    .then(rp => {  
                      cont = Object.assign(cont, rp.data);      // aqui unimos el objeto con los ultimos datos del registro diario
                    });
              self.datos_resumen_reefer.push(cont);
            });
        }
        rellenar_resumen().then(()=>{
          // console.log( self.datos_resumen_gen);
          // console.log( self.datos_resumen_reefer);
          // self.TablaContenedores();
        });
      });


     
     
       
    },
  },  
};
</script>

<style lang="css">
.selected {
  background-color: #A2AEC7 !important;
  color: black;
  }

 #lado_derecho{
    width: 75%;
  }
  #lado_izquierdo{
    width: 25%;
  }
#asset-search {
  padding: 10px;
  height: 320px;
  overflow-y: scroll;
}
/* #tblContenedor_reefers{
  width: 100%;
  overflow-y: scroll;
} */
#total_reefers {
  padding: 10px;
  height: 100px;
}
#asset_maps {
  padding: 10px;
  height: 400px;
  /* overflow-y: scroll; */
}


@media (max-width: 1024px) {
  #lado_derecho{
    width: 80%;
  }
  #lado_izquierdo{
    width: 20%;
  }
}
</style>



