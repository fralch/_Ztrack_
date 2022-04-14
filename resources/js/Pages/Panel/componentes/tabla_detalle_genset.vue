<template >
  <div v-if="tipo == 'genset' && datos_tabla_generador.length > 0" >
    <div
      id="generador_grid"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      style="margin: -30px 15px 10px 15px"
      
    >
      <table
        class="table display nowrap"
        id="tblDetalleContenedores_generadores"
      >
        <thead>
          <tr class="bg-info" style="color: white !important">
            <th scope="col">N°</th>
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
            <th scope="col" width="50px" class="text-center">REEFER_CONECTED</th>
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
    };
  },
  watch: {
    contenedor(){
      this.select_contenedor() ;
    },
    datos_tabla_generador(){
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
        var table = $('#tblDetalleContenedores_generadores').DataTable({
           "scrollX": "100%",
           "responsive": true,
            "order": [ 0, "desc" ],
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            }
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

          // let mayor_id = self.datos_tabla_generador
          //     .map(function (e) {
          //       return e.id;
          //     })
          //     .sort()
          //     .reverse()[0];
          //   axios
          //     .post(route("contenedores.get_lat_log"), {
          //       id: mayor_id,
          //       tipo: contenedor.tipo,
          //     })
          //     .then((response) => {
          //       console.log(
          //         response.data.latitud,
          //         "---",
          //         response.data.longitud
          //       );
          //       self.ubicacion = new google.maps.LatLng(
          //         response.data.latitud,
          //         response.data.longitud
          //       );
          //     })
          //     .then(() => {
          //       self.iniciarMap();
          //     });
        })
    },
  },
};
</script>