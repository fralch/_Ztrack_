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
            <th scope="col" width="150px" class="text-center">Alias</th>
            <th scope="col" class="text-center" @click="ocultar(1)">Tipo</th>
            <th scope="col" class="text-center" @click="ocultar(2)">Estado</th>
            <th scope="col" width="150px" class="text-center" @click="ocultar(3)">Booking</th>
            <th scope="col" width="50px" class="text-center" @click="ocultar(4)">booking_temp</th>
            <th scope="col" class="text-center" @click="ocultar(5)">Set_point</th>
            <th scope="col" class="text-center" @click="ocultar(6)">Temp_supply_1</th>
            <th scope="col" class="text-center" @click="ocultar(8)">Return_air</th>
            <th scope="col" class="text-center" @click="ocultar(9)">Evaporation_coil</th>
            <th scope="col" class="text-center" @click="ocultar(13)">Ambient_air</th>
            <th scope="col" class="text-center" @click="ocultar(14)">Cargo_1_temp</th>
            <th scope="col" class="text-center" @click="ocultar(15)">Cargo_2_temp</th>
            <th scope="col" class="text-center" @click="ocultar(16)">Cargo_3_temp</th>
            <th scope="col" class="text-center" @click="ocultar(17)">Cargo_4_temp</th>
            <th scope="col" class="text-center" @click="ocultar(18)">Relative_humidity</th>
            <th scope="col" class="text-center" @click="ocultar(43)">Alarm_present</th>
            <th scope="col" class="text-center" @click="ocultar(46)">Controlling_mode</th>
            <th scope="col" class="text-center" @click="ocultar(45)">Power_state</th>
            <th scope="col" class="text-center" @click="ocultar(54)">Defrost_term_temp</th>
            <th scope="col" class="text-center" @click="ocultar(55)">Defrost_interval</th>
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
            <td class="text-center">{{ reef.alias ? reef.alias : "Sin alias" }}</td>
            <td class="text-center">{{ reef.tipo }}</td>
            <td class="text-center">{{ reef.encendido == 1 ? "SI" : "NO" }}</td>
            <td class="text-center">{{ reef.booking }}</td>
            <td class="text-center">{{ reef.booking_temp }}C°</td>
            <td class="text-center">{{ reef.set_point }}C°</td>
            <td class="text-center">{{ reef.temp_supply_1 }}</td>
            <td class="text-center">{{ reef.return_air }}</td>
            <td class="text-center">{{ reef.evaporation_coil }}</td>
            <td class="text-center">{{ reef.ambient_air }}</td>
            <td class="text-center">{{ reef.cargo_1_temp }}</td>
            <td class="text-center">{{ reef.cargo_2_temp }}</td>
            <td class="text-center">{{ reef.cargo_3_temp }}</td>
            <td class="text-center">{{ reef.cargo_4_temp }}</td>
            <td class="text-center">{{ reef.relative_humidity }}</td>
            <td class="text-center">{{ reef.alarm_present }}</td>
            <td class="text-center">{{ reef.controlling_mode }}</td>
            <td class="text-center">{{ reef.power_state }}</td>
            <td class="text-center">{{ reef.defrost_term_temp }}</td>
            <td class="text-center">{{ reef.defrost_interval }}</td>
            <td class="text-center">{{ reef.latitud }}</td>
            <td class="text-center">{{ reef.longitud }}</td>
            /td>
          </tr>
        </tbody>
      </table>
      <div class="escoger_columnas">
        Cargar todas columnas: <span  @click="resetTabla()">Resetear tabla</span> 
      </div>
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
          self.tabla.$("tr.selected").removeClass("selected");
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
    resetTabla(){
      $("#tblContenedor_reefers").DataTable().destroy();
      this.TablaContenedores_reef();
    },
  },
};
</script>
<style>

  @media screen and (max-width: 450px) {
 
  #grid_resumen_reefer {
    width: 100% !important;
     margin: 0 !important;
     padding: 0 !important;
  }
 
}
</style>
