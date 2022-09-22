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
              class="text-center"
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
      <ul
        id="right-click-menu"
        class="contextmenu"
        tabindex="-1"
        v-if="viewMenu"
        v-bind:style="{ top: top, left: left }"
      >
        <li>First list item</li>
        <li>Second list item</li>
      </ul>
      <!--  edutar usuarios  -->
      <div
        class="modal fade"
        id="clickDerechoModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="clickDerechoModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="width:0; color: white;  ">
                  <div class="menu">
                    <li class="item" id="mn1">
                        <a style="color: white;" class="btn" href="#mn1">Kullanclar</a>
                        <div class="submenu">
                            <a href="#">KuListesi</a>
                            <a href="#">Kull Ekle</a>
                            <a href="#">Kulla Sil</a>
                        </div>
                    </li>
                    <li class="item" id="mn2">
                        <a class="btn" href="#mn2">Dosyalar</a>
                        <div class="submenu">
                            <a href="#">Dosya Listesi</a>
                            <a href="#">Dosya Ekle</a>
                            <a href="#">Dosya Sil</a>
                        </div>
                    </li>
                    <li class="item" id="mn3">
                        <a class="btn" href="#mn3">Ayarlar</a>
                        <div class="submenu">
                            <a href="#">Kulla Ayarla</a>
                            <a href="#">Dosya Ayarlar</a>
                            <a href="#">Şifre</a>
                        </div>
                    </li>
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

      viewMenu: false,
      top: "0px",
      left: "0px",
    };
  },
  watch: {
    tipo(val) {
      $("#tblContenedor_madurador").DataTable().destroy();
      this.TablaContenedores_madurador();
    },
  },
  mounted() {
    this.actualizarTabla();
  },
  methods: {
    async click_derecho(e, madurador) {
      let self = this;
      e.preventDefault();
      $("#clickDerechoModal").modal("show");

      // // //     var winWidth = $(document).width();
      // // //     var winHeight = $(document).height();
      // // //     //Get pointer position:
      // // //     var posX = e.x;
      // // //     var posY = e.y;
      // // //     //Get contextmenu size:
      // // //     // var menuWidth = $("#right-click-menu").width();
      // // //     // var menuHeight = $("#right-click-menu").height();
      // // //     var menuWidth = 248;
      // // //     var menuHeight = 100;

      // // //     //Security margin:
      // // //     var secMargin = 100;
      // // //     //Prevent page overflow:
      // // //     // // if(posX + menuWidth + secMargin >= winWidth
      // // //     // // && posY + menuHeight + secMargin >= winHeight){
      // // //     // //   //Case 1: right-bottom overflow:
      // // //     // //   self.left = posX - menuWidth - secMargin + "px";
      // // //     // //   self.top = posY - menuHeight - secMargin + "px";
      // // //     // //   console.log("Case 1 derecha");
      // // //     // // }
      // // //     // // else if(posX + menuWidth + secMargin >= winWidth){
      // // //     // //   //Case 2: right overflow:
      // // //     // //   self.left = posX - menuWidth - secMargin + "px";
      // // //     // //   self.top = posY + secMargin + "px";
      // // //     // //   console.log("Case 2 derecha");
      // // //     // // }
      // // //     // // else if(posY + menuHeight + secMargin >= winHeight){
      // // //     // //   //Case 3: bottom overflow:
      // // //     // //   self.left = posX + secMargin + "px";
      // // //     // //   self.top = posY - menuHeight - secMargin + "px";
      // // //     // //   console.log("Case 3 abajo");
      // // //     // // }
      // // //     // // else {
      // // //     // //   //Case 4: default values:
      // // //     // //   self.left = posX + secMargin + "px";
      // // //     // //   self.top = posY + secMargin + "px";
      // // //     // //   console.log("Case 4 abajo");
      // // //     // // };
      // // //     if (menuWidth != undefined && menuHeight != undefined) {
      // // //       self.left = posX - menuWidth - secMargin + "px";
      // // //       self.top = posY - menuHeight - secMargin + "px";
      // // //     }else{
      // // //      self.left = posX - 248 - secMargin + "px";
      // // //       self.top = posY - 70 - secMargin + "px";
      // // //     }
      // // //     console.log(winWidth, winHeight, posX, posY, menuWidth, menuHeight);
      // // //     // $(".contextmenu").css({
      // // //     //   "left": posLeft,
      // // //     //   "top": posTop
      // // //     // }).show();
      // // //     //Prevent browser default contextmenu.

      // // //   // $(document).click(function(){
      // // //   //   $(".contextmenu").hide();
      // // //   // });

      // // // // alert('right click!');
      // // // // // console.log("madurador", madurador);
      // // // // self.top = (e.y -500 )+"px";
      // // // // // self.left = (e.y - 100) +"px";
      // // // console.log("click derecsddho",self.top, self.left);
      // // // self.viewMenu = true;
      // // // // console.log("click derecsddho",e.y, e.x);
    },
    cerrarMenu() {
      console.log("cerrar menu");
      this.viewMenu = false;
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
:root{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}




.menu{
    width: 300px;
    height: auto;
    background: #d15536;
    border-radius: 8px;
    overflow: hidden;
}

.menu .btn{
    display:block;
    padding: 1rem;
    border-bottom: solid 1px #ffffff;
    border-top: solid 1px #804444;
    position: relative;
}

.menu .submenu {
    background: #1b1b2f;
    overflow: hidden;
    max-height: 0;
    transition: max-height .8s ease-out;
}

.menu .submenu a{
    display:block;
    padding: 1rem;
    position: relative;
}

.menu .submenu a::before{
    content:'';
    display:block;
    position: absolute;
    top:0;
    left:0;
    height: 100%;
    width: 5px;
    background: #e43f5a;
    opacity: 0;
    transition: all .5s;
}

.menu .submenu a:hover{
    padding-left: calc(1rem + 5px);
}

.menu .submenu a:hover::before{
    opacity: 1;
}

.item:target .submenu{
    max-height: 20rem;
}
</style>