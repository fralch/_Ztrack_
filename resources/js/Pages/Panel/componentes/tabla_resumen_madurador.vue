<template>
  <div
    v-if="tipo == 'madurador' && contenedores_encendidos_madurador.length > 0"
  >
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

            <th scope="col" class="text-center" @click="ocultar(1)">
              Ethylene
            </th>
            <th scope="col" class="text-center" @click="ocultar(2)">
              StateProcess
            </th>
            <th scope="col" class="text-center" @click="ocultar(3)">
              StateInyection
            </th>
            <th scope="col" class="text-center" @click="ocultar(4)">
              TimerOfProcess
            </th>

            <th scope="col" class="text-center" @click="ocultar(5)">Tipo</th>
            <th scope="col" class="text-center" @click="ocultar(6)">Estado</th>
            <th
              scope="col"
              width="150px"
              class="text-center"
              @click="ocultar(7)"
            >
              Booking
            </th>
            <th
              scope="col"
              width="50px"
              class="text-center"
              @click="ocultar(8)"
            >
              booking_temp
            </th>
            <th scope="col" class="text-center" @click="ocultar(9)">
              Set_point
            </th>
            <th scope="col" class="text-center" @click="ocultar(10)">
              Temp_supply_1
            </th>
            <th scope="col" class="text-center" @click="ocultar(11)">
              Temp_supply_2
            </th>
            <th scope="col" class="text-center" @click="ocultar(12)">
              Return_air
            </th>
            <th scope="col" class="text-center" @click="ocultar(13)">
              Evaporation_coil
            </th>
            <th scope="col" class="text-center" @click="ocultar(14)">
              Condensation_coil
            </th>
            <th scope="col" class="text-center" @click="ocultar(15)">
              Compress_coil_1
            </th>
            <th scope="col" class="text-center" @click="ocultar(16)">
              Compress_coil_2
            </th>
            <th scope="col" class="text-center" @click="ocultar(17)">
              Ambient_air
            </th>
            <th scope="col" class="text-center" @click="ocultar(18)">
              Cargo_1_temp
            </th>
            <th scope="col" class="text-center" @click="ocultar(19)">
              Cargo_2_temp
            </th>
            <th scope="col" class="text-center" @click="ocultar(20)">
              Cargo_3_temp
            </th>
            <th scope="col" class="text-center" @click="ocultar(21)">
              Cargo_4_temp
            </th>
            <th scope="col" class="text-center" @click="ocultar(22)">
              Relative_humidity
            </th>
            <th scope="col" class="text-center" @click="ocultar(23)">AVL</th>
            <th scope="col" class="text-center" @click="ocultar(24)">
              Suction_pressure
            </th>
            <th scope="col" class="text-center" @click="ocultar(25)">
              Discharge_pressure
            </th>
            <th scope="col" class="text-center" @click="ocultar(26)">
              Line_voltage
            </th>
            <th scope="col" class="text-center" @click="ocultar(27)">
              Line_frequency
            </th>
            <th scope="col" class="text-center" @click="ocultar(28)">
              Consumption_ph_1
            </th>
            <th scope="col" class="text-center" @click="ocultar(29)">
              Consumption_ph_2
            </th>
            <th scope="col" class="text-center" @click="ocultar(30)">
              Consumption_ph_3
            </th>
            <th scope="col" class="text-center" @click="ocultar(31)">
              Co2_reading
            </th>
            <th scope="col" class="text-center" @click="ocultar(32)">
              O2_reading
            </th>
            <th scope="col" class="text-center" @click="ocultar(33)">
              Evaporator_speed
            </th>
            <th scope="col" class="text-center" @click="ocultar(34)">
              Condenser_speed
            </th>
            <th scope="col" class="text-center" @click="ocultar(35)">
              Battery_voltage
            </th>
            <th scope="col" class="text-center" @click="ocultar(36)">
              Power_kwh
            </th>
            <th scope="col" class="text-center" @click="ocultar(37)">
              Power_trip_reading
            </th>
            <th scope="col" class="text-center" @click="ocultar(38)">
              Power_trip_duration
            </th>
            <th scope="col" class="text-center" @click="ocultar(39)">
              Suction_temp
            </th>
            <th scope="col" class="text-center" @click="ocultar(40)">
              Discharge_temp
            </th>
            <th scope="col" class="text-center" @click="ocultar(41)">
              Supply_air_temp
            </th>
            <th scope="col" class="text-center" @click="ocultar(42)">
              Return_air_temp
            </th>
            <th scope="col" class="text-center" @click="ocultar(43)">
              Dl_battery_temp
            </th>
            <th scope="col" class="text-center" @click="ocultar(44)">
              Dl_battery_charge
            </th>
            <th scope="col" class="text-center" @click="ocultar(45)">
              Power_consumption
            </th>
            <th scope="col" class="text-center" @click="ocultar(46)">
              Power_consumption_avg
            </th>
            <th scope="col" class="text-center" @click="ocultar(47)">
              Alarm_present
            </th>
            <th scope="col" class="text-center" @click="ocultar(48)">
              Capacity_load
            </th>
            <th scope="col" class="text-center" @click="ocultar(49)">
              Power_state
            </th>
            <th scope="col" class="text-center" @click="ocultar(50)">
              Controlling_mode
            </th>
            <th scope="col" class="text-center" @click="ocultar(51)">
              Humidity_control
            </th>
            <th scope="col" class="text-center" @click="ocultar(52)">
              Humidity_set_point
            </th>
            <th scope="col" class="text-center" @click="ocultar(53)">
              Fresh_air_ex_mode
            </th>
            <th scope="col" class="text-center" @click="ocultar(54)">
              Fresh_air_ex_rate
            </th>
            <th scope="col" class="text-center" @click="ocultar(55)">
              Fresh_air_ex_delay
            </th>
            <th scope="col" class="text-center" @click="ocultar(56)">
              Set_point_o2
            </th>
            <th scope="col" class="text-center" @click="ocultar(57)">
              Set_point_co2
            </th>
            <th scope="col" class="text-center" @click="ocultar(58)">
              Defrost_term_temp
            </th>
            <th scope="col" class="text-center" @click="ocultar(59)">
              Defrost_interval
            </th>
            <th scope="col" class="text-center" @click="ocultar(60)">
              Water_cooled_conde
            </th>
            <th scope="col" class="text-center" @click="ocultar(61)">
              USDA_trip
            </th>
            <th scope="col" class="text-center" @click="ocultar(62)">
              Evaporator_exp_valve
            </th>
            <th scope="col" class="text-center" @click="ocultar(63)">
              Suction_mod_valve
            </th>
            <th scope="col" class="text-center" @click="ocultar(64)">
              Hot_gas_valve
            </th>
            <th scope="col" class="text-center" @click="ocultar(65)">
              Economizer_valve
            </th>
            <th scope="col" class="text-center" @click="ocultar(66)">Modelo</th>
            <th scope="col" class="text-center" @click="ocultar(67)">
              Latitud
            </th>
            <th scope="col" class="text-center" @click="ocultar(68)">
              Longitud
            </th>
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
            <td
              class="context-menu-one text-center"
              @contextmenu="click_derecho($event, madurador)"
            >
              {{ madurador.nombre_contenedor }}
            </td>

            <td class="text-center">{{ madurador.ethylene }}</td>
            <td class="text-center">{{ madurador.stateProcess }}</td>
            <td class="text-center">{{ madurador.stateInyection }}</td>
            <td class="text-center">{{ madurador.timerOfProcess }}</td>

            <td class="text-center">{{ madurador.tipo }}</td>
            <td class="text-center">
              {{ madurador.encendido == 1 ? "SI" : "NO" }}
            </td>
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
      <div class="escoger_columnas">
        Cargar todas columnas: <span @click="resetTabla()">Resetear tabla</span>
      </div>
      <!-- <ul
        id="right-click-menu"
        class="contextmenu"
        tabindex="-1"
        v-if="viewMenu"
        v-bind:style="{ top: top, left: left }"
      >
        <li>First list item</li>
        <li>Second list item</li>
      </ul> -->
      <!--  edutar usuarios  -->
      <div class="modal fade" id="clickDerechoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{titulo_range}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="row" style="margin:0 10px">
                  <input type="number" style="margin:0 5px" class="form-control col" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="valor_range">
                  <input type="range" style="margin:0 5px"  class="form-control col"  name="points" min="1" max="100" step="0.1" v-model="valor_range" />               
               </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" @click="actualizar_points">Guardar Cambios</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>



      <div class="modal fade" id="estadoDerechoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Estado del Madurador</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-4">
                  <input type="radio" id="inicio" value="Q" v-model="estado"   />
                  <label for="uno">START</label>
                </div>
                <br />
                <div class="col-4">
                  <input type="radio" id="pausa" value="P" v-model="estado"  />
                  <label for="uno">STOP</label>
                </div>
                <br />
                <div class="col-4">
                  <input type="radio" id="reinicio" value="R" v-model="estado"  />
                  <label for="uno">RESET</label>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" @click="actualizar_estado">Guardar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
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
    empresa: Array,
  },
  data() {
    return {
      contenedores_encendidos_madurador: [],
      datos_resumen_madurador: [],
      tabla: null,

      valor_range: 0,
      titulo_range: "Titulo",
      tipo_range: "",
      id_madurador: 0, 

      points: null, 
      estado: "",

    };
  },
  watch: {
    tipo(val) {
      $("#tblContenedor_madurador").DataTable().destroy();
      this.TablaContenedores_madurador();
    }
  },
  mounted() {
    this.actualizarTabla();
  },
  methods: {
    click_derecho(e, madurador) {
      let self = this;
      e.preventDefault();
      $("#tblContenedor_madurador tbody").on("contextmenu", "tr", function () {
          self.tabla.$("tr.selected").removeClass("selected");
          $(this).click(); 
        });
      // $("#clickDerechoModal").modal("show");
      $.contextMenu('destroy', '.context-menu-one');
      $.contextMenu({
            selector: '.context-menu-one', 
            callback: function(key, options) {              
                if (key =="copy") {
                  navigator.clipboard.writeText(madurador.nombre_contenedor)
                  console.log(madurador.nombre_contenedor); 
                  return 0;
                }
                if (key =="estado") {
                  self.id_madurador = madurador.id;
                   axios
                  .post(route("madurador.points.get_m"), {tipo: key,  id_contenedor: madurador.id})
                  .then((response) => {
                    self.estado = response.data[0].estado;
                    console.log( self.estado);
                  }).then(()=>{
                    $("#estadoDerechoModal").modal("show");
                  });

                  return 0;

                }
                self.titulo_range = key + " / " + madurador.nombre_contenedor;
                self.tipo_range = key;
                self.id_madurador = madurador.id;
                axios
                  .post(route("madurador.points.get_m"), {tipo: self.tipo_range,  id_contenedor: self.id_madurador})
                  .then((response) => {
                    // console.log( response.data[0].point);
                    self.valor_range = parseFloat(response.data[0].point);
                  }).then(()=>{
                    if (key != "nombre" && key != "quit") {
                      $("#clickDerechoModal").modal("show");
                    }
                  });

                
            },
            items: {
              "nombre": {"name": madurador.nombre_contenedor},
               copy: {name: "Copy", icon: "copy"},
                
                "Setpoints": {
                            name: "Change Setpoints",
                            items: {
                                "Temperature": { name: "Temperature"},
                                "Co2": { name: "Co2"},
                                "Humidity": { name: "Humidity" },
                                "Ethylene": { name: "Ethylene" },
                                "Process_time": { name: "Process time" },
                                "Ethylene_minimum": { name: "Ethylene minimum" },
                                "Injection_time": { name: "Injection time" },
                            }
                        },
                estado: {name: "Estado", icon: "edit"},
                "sep1": "---------",
                "quit": {name: "Quit", icon: function(){
                    return 'context-menu-icon context-menu-icon-quit';
                }}
            }
        });
        
        // $('.context-menu-one').on('click', function(e){
        //     console.log('clicked', this);
             
        // })    
    },
    
    actualizar_points() {
      let self = this;
      axios
        .post(route("madurador.points.set"), {tipo: self.tipo_range, valor : self.valor_range, id_contenedor: self.id_madurador})
        .then((response) => {
          // console.log(response.data);
          // self.points = response.data;
          self.retornar_points(response.data[0]);
          Swal.fire(
            "Editado!",
            "El dato ha sido editado.",
            "success"
          );
          $("#clickDerechoModal").modal("hide");
        })
    },
    actualizar_estado(){
      // Q->start  P -> stop  R->reset
      let self = this;
      // console.log(self.estado, self.id_madurador);
       axios
        .post(route("madurador.estado.set"), {estado: self.estado,  id_contenedor: self.id_madurador})
        .then((response) => {
          console.log(response.data);
          self.retornar_estado(response.data[0]);
          Swal.fire(
            "Editado!",
            "El dato ha sido editado.",
            "success"
          );
          $("#estadoDerechoModal").modal("hide");
        })
    },
    TablaContenedores_madurador() {
      // console.log("armando tabla");
      let self = this;
      this.$nextTick(() => {
        self.tabla = $("#tblContenedor_madurador").DataTable({
          scrollX: "100%",
          responsive: true,
          buttons: true,
          dom: "Bfrtip",
          buttons: [
            // 'copy', 'csv', 'excel', 'pdf','print'
            "copy",
            "csv",
            "excel",
          ],
          order: [0, "desc"],
          language: {
            url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json",
          },
        });
        /* Esta es la funcion que selecciona una fila  yla colorea  */
        $("#tblContenedor_madurador tbody").on("click", "tr", function () {
          self.tabla.$("tr.selected").removeClass("selected");
          $(this).addClass("selected");
        });

       

        // column.visible(!column.visible());
        // console.log("columnas ",column);
      });
    },
    actualizarTabla() {
      let self = this;

      axios
        .post(route("contenedores.obtener_contendor"), {
          tipo: "madurador",
        })
        .then((res) => {
          if (self.empresa.length > 0) {
            self.contenedores_encendidos_madurador = res.data.filter(
              (contenedor) =>
                contenedor.empresa_id == self.empresa[0].empresa_id
            );
          } else {
            self.contenedores_encendidos_madurador = res.data;
          }
        });
    },

    select_contenedor(contenedor) {
      this.$emit("select_contenedor", contenedor); // emite el evento a contedor padre
    },
    retornar_points(puntos){
      // console.log(puntos);
      this.$emit("retornar_points", puntos); // emite el evento a contedor padre
    },
    retornar_estado(estado){
      console.log('desde resumen', estado);
      this.$emit("retornar_estado", estado); // emite el evento a contedor padre
    },

    ocultar(val) {
      // this.tabla.column(val).visible(false);
      var column = this.tabla.column(val);

      // Toggle the visibility
      column.visible(!column.visible());
    },
    resetTabla() {
      $("#tblContenedor_madurador").DataTable().destroy();
      this.TablaContenedores_madurador();
    },
  },
};
</script>
<style>
:root {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 15px;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
#menu, #menu ul /* Liste */     
{
        padding : 0; /* pas de marge intérieure */
        margin : 0; /* ni extérieure */
        list-style : none; /* on supprime le style par défaut de la liste */
        line-height : 21px; /* on définit une hauteur pour chaque élément */
        text-align : center; /* on centre le texte qui se trouve dans la liste */
}

#menu /* Ensemble du menu */
{
        font-family : Arial; /* on utilise Arial, c'est plus beau ^^ */
        font-size : 12px; /* hauteur du texte : 12 pixels */
}

#menu a /* Contenu des listes */
{
        display : block; /* on change le type d'élément, les liens deviennent des balises de type block */
        padding : 0; /* aucune marge intérieure */
        background : rgb(255, 255, 255); /* couleur de fond */        
        color : rgb(90, 90, 90); /* couleur du texte */
        text-decoration : none; /* on supprime le style par défaut des liens (la plupart du temps = souligné) */
        width : 144px; /* largeur */
}

#menu li /* Elements des listes */      
{ 
        /* pour IE qui ne reconnaît pas "transparent" */
        border-right : 1px solid #fff; /* on met une bordure blanche à droite de chaque élément */
        position: relative;
}

#menu li.un
{
  width: 144px;
}

#menu li ul /* Sous-listes */
{ 
        position: absolute; /* Position absolue */
        width: 144px; /* Largeur des sous-listes */
        display: none; /* On cache */
}


#menu li ul li /* Éléments de sous-listes */
{
        /* pour IE qui ne reconnaît pas "transparent" (comme précédemment) */
        border-top : 1px solid #fff; /* on met une bordure blanche en haut de chaque élément d'une sous liste */
}

/* IE ne reconnaissant pas le sélecteur ">" */
#menu li ul li                
{
        border-top : 1px solid transparent; /* on met une bordure transparente en haut de chaque élément */
}

#menu li ul ul 
{
        margin    : -22px 0 0 144px ; /* On décale les sous-sous-listes pour qu'elles ne soient pas au dessus des sous-listes */ 
        /* pour IE qui ne reconnaît pas "transparent" (comme précédemment) */
        border-left     : 1px solid #fff ; /* Petite bordure à gauche pour ne pas coller ... */      
}

/* IE ne reconnaissant pas le sélecteur ">" ... je me répète ;-) */
#menu li ul ul                
{
        border-left     : 1px solid transparent ; /* on met une bordure transparente sur la gauche de chaque élément */
}

#menu a:hover /* Lorsque la souris passe sur un des liens */    
{
        color: rgb(43, 43, 43); /* On passe le texte en noir... */
        background: rgb(216, 216, 216); /* ... et au contraire, le fond en blanc */
}

#menu li:hover ul ul, #menu li.sfhover ul ul /* Sous-sous-listes lorsque la souris passe sur un élément de liste */
{
        display: block; /* On expédie les sous-sous-listes hors du champ de vision */
}

#menu li:hover ul, #menu li li:hover ul, #menu li.sfhover ul, #menu li li.sfhover ul  /* Sous-listes lorsque la souris passe sur un élément de liste ET sous-sous-lites lorsque la souris passe sur un élément de sous-liste */
{
        display: block; /* Repositionnement normal */
        min-height: 0; /* Corrige un bug sous IE */
        left : 144px; /* décale vers la droite */
        top:0;
}
</style>