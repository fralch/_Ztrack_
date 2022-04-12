<template>
  <layoutprincipal ref="layoutprincipal">
    <!-- *** cargando layoutprincipal  **** -->
    <div class="slot_body slot_board" slot="component-view">
      <div class="content" style="display: block" id="cuerpo">
        <!-- ---------------------- -->
        <div class="content">
          <div class="row" style="margin: 0 0 0 0px">
            <div id="lado_izquierdo" style="margin: 10px 0 0 -5px"></div>
            <div id="lado_derecho" style="">
              <div
                id="total_reefers"
                class="col shadow-sm p-3 mb-5 bg-white rounded"
                style="margin: 10px 15px 0px 15px"
              >
                <div>Total Reefers: {{ contenedores_todos_length }}</div>
                <div class="row" style="margin: 0 10px">
                  <button
                    type="button"
                    id="select_gen"
                    class="col-3 btn btn-primary"
                    @click="seleccionarTipo('genset')"
                  >
                    <i class="bi bi-power"></i>
                    <b style="font-size: 1.2em">{{
                      contenedores_encendidos_gen.length
                    }}</b>
                    &nbsp; Gen Running
                  </button>
                  <button
                    type="button"
                    id="select_reef"
                    class="col-3 btn btn-success"
                    @click="seleccionarTipo('reefer')"
                  >
                    <i class="bi bi-power"></i>
                    <b style="font-size: 1.2em">{{
                      contenedores_encendidos_reefer.length
                    }}</b>
                    &nbsp; Reefers Running
                  </button>
                  <button
                    type="button"
                    id="select_mad"
                    class="col-3 btn btn-danger"
                    @click="tipo = 'mad'"
                  >
                    <i class="bi bi-power"></i>
                    <b style="font-size: 1.2em">0</b>
                    &nbsp; Madurador
                  </button>
                  <button type="button" class="col-3 btn btn-dark">
                    <i class="bi bi-power"></i>
                    <b style="font-size: 1.2em">0</b>
                    &nbsp; Shutdown
                  </button>
                </div>
              </div>
              <!-- ********** CANVAS MAPA **********-->
              <canvasMapa ref="canvasMapa" :id_contenedor="1"> </canvasMapa>
              <!-- ********* TABLA RESUMEN CONTENEDORES  *********-->
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
                      <th scope="col" width="150px" class="text-center">
                        Reefers
                      </th>
                      <th scope="col" class="text-center">Tipo</th>
                      <th scope="col" class="text-center">Estado</th>
                      <th scope="col" width="150px" class="text-center">
                        Booking
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        booking_temp
                      </th>
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
                      <th scope="col" class="text-center">
                        Discharge_pressure
                      </th>
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
                      <th scope="col" class="text-center">
                        Power_trip_reading
                      </th>
                      <th scope="col" class="text-center">
                        Power_trip_duration
                      </th>
                      <th scope="col" class="text-center">Suction_temp</th>
                      <th scope="col" class="text-center">Discharge_temp</th>
                      <th scope="col" class="text-center">Supply_air_temp</th>
                      <th scope="col" class="text-center">Return_air_temp</th>
                      <th scope="col" class="text-center">Dl_battery_temp</th>
                      <th scope="col" class="text-center">Dl_battery_charge</th>
                      <th scope="col" class="text-center">Power_consumption</th>
                      <th scope="col" class="text-center">
                        Power_consumption_avg
                      </th>
                      <th scope="col" class="text-center">Alarm_present</th>
                      <th scope="col" class="text-center">Capacity_load</th>
                      <th scope="col" class="text-center">Power_state</th>
                      <th scope="col" class="text-center">Controlling_mode</th>
                      <th scope="col" class="text-center">Humidity_control</th>
                      <th scope="col" class="text-center">
                        Humidity_set_point
                      </th>
                      <th scope="col" class="text-center">Fresh_air_ex_mode</th>
                      <th scope="col" class="text-center">Fresh_air_ex_rate</th>
                      <th scope="col" class="text-center">
                        Fresh_air_ex_delay
                      </th>
                      <th scope="col" class="text-center">Set_point_o2</th>
                      <th scope="col" class="text-center">Set_point_co2</th>
                      <th scope="col" class="text-center">Defrost_term_temp</th>
                      <th scope="col" class="text-center">Defrost_interval</th>
                      <th scope="col" class="text-center">
                        Water_cooled_conde
                      </th>
                      <th scope="col" class="text-center">USDA_trip</th>
                      <th scope="col" class="text-center">
                        Evaporator_exp_valve
                      </th>
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
                      @click="obteniendo_contendor(reef)"
                    >
                      <!-- <td>
                            
                              <button :id="reef.tipo+'_'+reef.contenedores_id" type="button" class="btn btn-outline-success" @click="select_contenedor(reef)"  >
                                <i class="bi bi-check-lg"></i>                    
                              </button>
                            </td> -->
                      <td class="text-center">{{ reef.nombre_contenedor }}</td>
                      <td class="text-center">{{ reef.tipo }}</td>
                      <td class="text-center">
                        {{ reef.encendido == 1 ? "SI" : "NO" }}
                      </td>
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
                      <td class="text-center">
                        {{ reef.power_trip_duration }}
                      </td>
                      <td class="text-center">{{ reef.suction_temp }}</td>
                      <td class="text-center">{{ reef.discharge_temp }}</td>
                      <td class="text-center">{{ reef.supply_air_temp }}</td>
                      <td class="text-center">{{ reef.return_air_temp }}</td>
                      <td class="text-center">{{ reef.dl_battery_temp }}</td>
                      <td class="text-center">{{ reef.dl_battery_charge }}</td>
                      <td class="text-center">{{ reef.power_consumption }}</td>
                      <td class="text-center">
                        {{ reef.power_consumption_avg }}
                      </td>
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
                      <td class="text-center">
                        {{ reef.evaporator_exp_valve }}
                      </td>
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
                      <th scope="col" width="150px" class="text-center">
                        Generador
                      </th>
                      <th scope="col" class="text-center">Tipo</th>
                      <th scope="col" class="text-center">Estado</th>
                      <th scope="col" width="150px" class="text-center">
                        Booking
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Booking_temp
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Battery_voltage
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Water_temp
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Running_frequency
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Fuel_level
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Voltage_measure
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Rotor_current
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        fiel_current
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Speed
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Eco_power
                      </th>
                      <th scope="col" width="50px" class="text-center">RPM</th>
                      <th scope="col" width="50px" class="text-center">
                        Unit_mode
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Horometro
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Modelo
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Latitud
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Longitud
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Alarma
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Evento
                      </th>
                      <th scope="col" width="100px" class="text-center">
                        Reefer_conected
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Set_point
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Temp_supply_1
                      </th>
                      <th scope="col" width="50px" class="text-center">
                        Return_air
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(gen, index) in datos_resumen_gen"
                      :key="index"
                      class="tr_resumen_reef"
                      @click="obteniendo_contendor(gen)"
                    >
                      <!-- <td>
                              <button :id="gen.tipo+'_'+gen.contenedores_id" type="button" class="btn btn-outline-primary" @click="select_contenedor(gen)"  >
                                <i class="bi bi-check-lg"></i>                    
                              </button>
                            </td> -->
                      <td class="text-center">{{ gen.nombre_contenedor }}</td>
                      <td class="text-center">{{ gen.tipo }}</td>
                      <td class="text-center">
                        {{ gen.encendido == 1 ? "SI" : "NO" }}
                      </td>
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
              <!-- *********** TABLA DETALLE CONTENEDORES *********** -->
              <tablaDetalleGenset
                ref="tablaDetalleGenset"
                :contenedor="contenedor_selecionado"
                :tipo="tipo"
              >
              </tablaDetalleGenset>
              <tablaDetalleReefer
                ref="tablaDetalleReefer"
                :contenedor="contenedor_selecionado"
                :tipo="tipo"
              >
              </tablaDetalleReefer>

              <!-- *********** GRAFICOS PRINCIPAL *********** -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </layoutprincipal>
</template>

<script>
import axios from "axios";
import layoutprincipal from "../layout.vue";
import canvasMapa from "./componentes/mapa.vue";

import tablaDetalleGenset from "./componentes/tabla_detalle_genset.vue";
import tablaDetalleReefer from "./componentes/tabla_detalle_reefer.vue";
export default {
  components: {
    layoutprincipal,
    canvasMapa,

    tablaDetalleGenset,
    tablaDetalleReefer,
  },
  props: {
    // tu_cuenta:Array,
    usuario_logeado: Array,
    empresa_logeado: Array,
    contenedores_todos_length: Number,
    contenedores_encendidos_reefer: Array,
    contenedores_encendidos_gen: Array,
  },
  data() {
    return {
      // submited: false,
      contenedor_selecionado: null,
      tipo: "",
      datos_resumen_gen: [],
      datos_resumen_reefer: [],
    };
  },
  watch: {
    tipo(val) {
      // console.log(val);
      if (val == "reefer") {
        $("#tblContenedor_generador").DataTable().destroy();
        $("#tblContenedor_reefers").DataTable().destroy();
        this.TablaContenedores();
      }
      if (val == "genset") {
        $("#tblContenedor_reefers").DataTable().destroy();
        $("#tblContenedor_generador").DataTable().destroy();
        this.TablaContenedores_gen();
      }
    },
  },
  mounted() {
    this.usuarioLogeado();
    this.bienvenida();
    this.resumenContenedor();
  },

  methods: {
    TablaContenedores() {
      // console.log('cargar tabla de contenedores');
      let self = this;
      this.$nextTick(() => {
        var table = $("#tblContenedor_reefers").DataTable({
          scrollX: "100%",
          scrollCollapse: true,
          language: {
            url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json",
          },
          responsive: true,
        });
        /* Esta es la funcion que selecciona una fila  yla colorea  */
        $("#tblContenedor_reefers tbody").on("click", "tr", function () {
          table.$("tr.selected").removeClass("selected");
          $(this).addClass("selected");
        });
      });
    },
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

    seleccionarTipo(tipo) {
      this.tipo = tipo;
    },
    cargarMapa() {},
    autoRefresh() {
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
      let self = this;
      let timerInterval;
      Swal.fire({
        title: "Loading Connect!",
        html: "I will close in <b></b> milliseconds.",
        timer: 3000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading();
          const b = Swal.getHtmlContainer().querySelector("b");
          timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft();
          }, 100);
        },
        willClose: () => {
          clearInterval(timerInterval);
        },
      }).then((result) => {
        // Swal.fire({
        //   title: "Bienvenido!",
        //   icon: "success",
        //   text: (
        //     this.usuario_logeado[0].nombres +
        //     " " +
        //     this.usuario_logeado[0].apellidos
        //   ).toUpperCase(),
        //   confirmButtonColor: "#3085d6",
        //   confirmButtonText: "OK!",
        // });
        Swal.fire({
          title: "Bienvenido!",
          icon: "success",
          text: (
            this.usuario_logeado[0].nombres +
            " " +
            this.usuario_logeado[0].apellidos
          ).toUpperCase(),
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK!",
        }).then((result) => {
          if (result.isConfirmed) {
            self.tipo = "genset";
          }
        });
      });
    },

    usuarioLogeado() {
      /* AQUI ES DONDE SE PONE EL NOMBRE DEL USUARIO EN EL NAV  */
      this.$refs.layoutprincipal.usuario =
        this.usuario_logeado[0].nombres.toUpperCase();
      this.$refs.layoutprincipal.admin = this.usuario_logeado[0].admin;
    },

    obteniendo_contendor(contenedor) {
      // console.log(contenedor.id);
      this.contenedor_selecionado = contenedor.id;
    },
    resumenContenedor() {
      let self = this;
      this.$nextTick(() => {
        async function rellenar_resumen() {
          self.contenedores_encendidos_gen.map(function (contenedor) {
            axios
              .post(route("contenedores.resumen"), {
                id_contenedor: contenedor.id,
                tipo_contenedor: "genset",
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
                tipo_contenedor: "reefer",
              })
              .then((rp) => {
                cont = Object.assign(cont, rp.data); // aqui unimos el objeto con los ultimos datos del registro diario
              });
            self.datos_resumen_reefer.push(cont);
          });
        }
        rellenar_resumen().then(() => {});
      });
    },
  },
};
</script>

<style lang="css">
.selected {
  background-color: #a2aec7 !important;
  color: black;
}

#lado_derecho {
  width: 75%;
}
#lado_izquierdo {
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
  #lado_derecho {
    width: 80%;
  }
  #lado_izquierdo {
    width: 20%;
  }
}
</style>


