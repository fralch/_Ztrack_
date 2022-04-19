<template >
  <div v-if="tipo == 'genset' && datos_tabla_generador.length > 0">
    
    <div
      id="generador_grid"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      style="margin: -30px 15px 10px 15px"
    >
    <div class="row">
      <div class="col-3">
        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Desde</span>
          </div>
          <input type="date" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
      </div>
      <div class="col-3">
         <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Hasta</span>
          </div>
          <input type="date" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
      </div>
      <div class="col">
         <button id="buscar_detalle_genset" type="button" onclick="alert('Hello world!')">Buscar</button>
      </div>
    </div>
      
      <table
        class="display nowrap"
        style="width:100%"
        id="tblDetalleContenedores_generadores"
      >
        <thead>
          <tr class="bg-info" style="color: white !important">
            <th scope="col">N°</th>
            <th scope="col" width="50px" class="text-center">
              Battery_voltage
            </th>
            <th scope="col" width="50px" class="text-center">Water_temp</th>
            <th scope="col" width="50px" class="text-center">
              Running_frequency
            </th>
            <th scope="col" width="50px" class="text-center">Fuel_level</th>
            <th scope="col" width="50px" class="text-center">
              Voltage_measure
            </th>
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
            <th scope="col" width="50px" class="text-center">
              REEFER_CONECTED
            </th>
            <th scope="col" width="50px" class="text-center">SET_POINT</th>
            <th scope="col" width="50px" class="text-center">TEMP_SUPPLY</th>
            <th scope="col" width="50px" class="text-center">RETURN_AIR</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(generador, index) in datos_tabla_generador"
            :key="index"
            class="tr_resumen_gen"
          >
            <!-- <td>{{index+1}}</td> -->
            <td class="text-center">{{ generador.id }}</td>
            <td class="text-center">{{ generador.battery_voltage }}</td>
            <td class="text-center">{{ generador.water_temp }}</td>
            <td class="text-center">{{ generador.running_frequency }}</td>
            <td class="text-center">{{ generador.fuel_level }}</td>
            <td class="text-center">{{ generador.voltage_measure }}</td>
            <td class="text-center">{{ generador.rotor_current }}</td>
            <td class="text-center">{{ generador.fiel_current }}</td>
            <td class="text-center">{{ generador.speed }}</td>
            <td class="text-center">{{ generador.eco_power }}</td>
            <td class="text-center">{{ generador.rpm }}</td>
            <td class="text-center">{{ generador.unit_mode }}</td>
            <td class="text-center">{{ generador.horometro }}</td>
            <td class="text-center">{{ generador.modelo }}</td>
            <td class="text-center">{{ generador.latitud }}</td>
            <td class="text-center">{{ generador.longitud }}</td>
            <td class="text-center">{{ generador.alarma_id }}</td>
            <td class="text-center">{{ generador.evento_id }}</td>
            <td class="text-center">{{ generador.reefer_conected }}</td>
            <td class="text-center">{{ generador.set_point }}</td>
            <td class="text-center">{{ generador.temp_supply_1 }}</td>
            <td class="text-center">{{ generador.return_air }}</td>
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
      datos_tabla_generador: [],
      ubicacion: null,
    };
  },
  watch: {
    contenedor() {
      this.select_contenedor();
    },
    datos_tabla_generador() {
      $("#tblDetalleContenedores_generadores").DataTable().destroy();
      this.TablaDetalleContenedores_g();
    },
  },
  mounted() {
    this.TablaDetalleContenedores_g();
  },
  methods: {
    TablaDetalleContenedores_g() {
      let self = this;
      this.$nextTick(() => {
        var table = $("#tblDetalleContenedores_generadores").DataTable({
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
      self.datos_tabla_generador = [];
      axios
        .post(route("contenedores.get_datos"), {
          id: this.contenedor,
          tipo: "genset",
        })
        .then((response) => {
          // console.log("select_contenedor desde detalle ");
          // console.log(response.data);
          self.datos_tabla_generador = response.data;
        })
        .then(() => {
          let mayor_id = self.datos_tabla_generador
            .map(function (e) {
              return e.id;
            })
            .sort()
            .reverse()[0];
          axios
            .post(route("contenedores.get_lat_log"), {
              id: mayor_id,
              tipo: "genset",
            })
            .then((response) => {
            
              if (response.data.length > 0) {
                self.ubicacion = [response.data[0].latitud,response.data[0].longitud];
              }else{
                self.ubicacion = null;
              }              
            })
            .then(() => {
              self.$emit("set_ubicacion_g", self.ubicacion);
              // self.iniciarMap();
            });
        });
    },
  },
};
</script>
<style>
#buscar_detalle_genset {
  min-width: 190px;
  height: 30px;
  color: #fff;
  padding: 2px 10px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
  outline: none;
  border-radius: 5px;
  border: none;
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5), 7px 7px 20px 0px rgba(0,0,0,.1), 4px 4px 5px 0px rgba(0,0,0,.1);
  background: #17A2B8;
 z-index: 1;
}
#buscar_detalle_genset:hover:after {
  width: 100%;
  left: 0;
}
#buscar_detalle_genset:after {
  border-radius: 5px;
  position: absolute;
  content: "";
  width: 0;
  height: 100%;
  top: 0;
  z-index: -1;
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5), 7px 7px 20px 0px rgba(0,0,0,.1), 4px 4px 5px 0px rgba(0,0,0,.1);
  transition: all 0.3s ease;
  background-color: #096574;
  right: 0;
}
.css-button-shadow-border-sliding--blue:active {
  top: 2px;
}
</style>