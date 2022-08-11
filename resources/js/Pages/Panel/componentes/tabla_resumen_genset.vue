<template>
  <div v-if="tipo == 'genset' && contenedores_encendidos_gen.length > 0">
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
            <th scope="col" width="50px" class="text-center">N°</th>
            <th scope="col" width="150px" class="text-center">Generador</th>
            <th scope="col" class="text-center" @click="ocultar(2)">Tipo</th>
            <th scope="col" class="text-center" @click="ocultar(3)">Estado</th>
            <th scope="col" width="150px" class="text-center" @click="ocultar(4)">Booking</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(5)">Booking_temp</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(6)">
              Battery_voltage
            </th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(7)">Water_temp</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(8)">
              Running_frequency
            </th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(9)">Fuel_level</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(10)">
              Voltage_measure
            </th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(11)">Rotor_current</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(12)">fiel_current</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(13)">Speed</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(14)">Eco_power</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(15)">RPM</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(16)">Unit_mode</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(17)">Horometro</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(18)">Modelo</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(19)">Latitud</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(20)">Longitud</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(21)">Alarma</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(22)">Evento</th>
            <th scope="col" width="100px" class="text-center" @click="ocultar(23)">
              Reefer_conected
            </th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(24)">Set_point</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(25)">Temp_supply_1</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(26)">Return_air</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(gen, index) in contenedores_encendidos_gen"
            :key="index"
            class="tr_resumen_reef"
            @click="select_contenedor(gen)"
          >
            <!-- <td>
                          <button :id="gen.tipo+'_'+gen.contenedores_id" type="button" class="btn btn-outline-primary" @click="select_contenedor(gen)"  >
                            <i class="bi bi-check-lg"></i>                    
                          </button>
                        </td> -->
            <td class="text-center">{{ gen.id }}</td>
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
import tablaResumenGenDetalle from "./tabla_detalle_genset.vue";
export default {
  components: {},
  props: {
     tipo: String,
     empresa:Array,
  },
  data() {
    return {
      tabla: null, 
      contenedores_encendidos_gen: [],
      datos_resumen_gen: [],
    };
  },
  watch: {
    tipo() {
      
      $("#tblContenedor_generador").DataTable().destroy();
      this.TablaContenedores_gen();
    },
  },
  mounted() {
    this.actualizarTabla();
  },
  methods: {
    TablaContenedores_gen() {
      // console.log("armando tabla");
      let self = this;
      this.$nextTick(() => {
        self.tabla = $("#tblContenedor_generador").DataTable({
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
          if (self.empresa.length > 0 ) {
            self.contenedores_encendidos_gen = res.data.filter(contenedor => contenedor.empresa_id == self.empresa[0].empresa_id)
          }else{
            self.contenedores_encendidos_gen = res.data;
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
<style>
  /* .dt-button {
    background-color: #3f1485 !important;
  } */
</style>
