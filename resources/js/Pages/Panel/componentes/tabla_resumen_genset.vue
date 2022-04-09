<template>
  <div v-if="tipo == 'genset'">
    <div
      id="grid_resumen_generadores"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      style="margin: -30px 15px 10px 15px"
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
            <th scope="col" width="100px" class="text-center">
              Reefer_conected
            </th>
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
      contenedores_encendidos_gen: [],
      datos_resumen_gen: [],
    };
  },
  watch: {
    // datos_resumen_gen() {
    //   $("#tblContenedor_generador").DataTable().destroy();
    //   this.TablaContenedores_gen();
    // },
  },
  mounted() {
    this.actualizarTabla();
    
    // this.TablaContenedores_gen();
  },
  methods: {
    TablaContenedores_gen() {
      let self = this;
      this.$nextTick(() => {
        var table2 = $("#tblContenedor_generador").DataTable({
          scrollX: "100%",
          scrollCollapse: true,
          language: {
            url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json",
          },
        });
        /* Esta es la funcion que selecciona una fila  yla colorea  */
        $("#tblContenedor_generador tbody").on("click", "tr", function () {
          table2.$("tr.selected").removeClass("selected");
          $(this).addClass("selected");
        });
      });
    },
    actualizarTabla() {
      let self = this;

      axios
        .post(route("contenedores.obtener_contendor"), {
          tipo: "genset",
        })
        .then((res) => {
          self.contenedores_encendidos_gen = res.data;
          // self.resumenContenedor(res.data);
        }).then(() => {
          this.resumenContenedor(); 
        });
       
    },
    
    select_contenedor(contenedor) {
      console.log(contenedor);
    },
    resumenContenedor() {
      let self = this;
      this.$nextTick(() => {
        function rellenar_resumen() {
          self.contenedores_encendidos_gen.map(function (contenedor) {
            axios
              .post(route("contenedores.resumen"), {
                id_contenedor: contenedor.id,
                tipo_contenedor: 'genset',
              })
              .then((response) => {
                contenedor = Object.assign(contenedor, response.data); // aqui unimos el objeto con los ultimos datos del registro diario
              });
            self.datos_resumen_gen.push(contenedor);
          });
          
        }
         rellenar_resumen().then(()=>{
           console.log('fD')
          // $("#tblContenedor_generador").DataTable().destroy();
          self.TablaContenedores_gen();
        });
      });
    },
  },
};
</script>
