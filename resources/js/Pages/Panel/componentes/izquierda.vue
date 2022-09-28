<template>
  <div>
    <div id="asset-search" class="col shadow-sm p-3 mb-5 bg-white rounded">
      Asset search
      <input
        type="text"
        class="form-control"
        placeholder="Saved seaches"
        aria-label="Username"
        aria-describedby="basic-addon1"
        style="margin: 5px"
      />
      <div class="form-floating" style="margin: 5px">
        <textarea
          class="form-control"
          placeholder="Asset ID"
          id="floatingTextarea"
        ></textarea>
      </div>
      <div class="form-floating" style="margin: 5px">
        <textarea
          class="form-control"
          placeholder="Booking Number"
          id="floatingTextarea"
        ></textarea>
      </div>
      <input
        type="text"
        class="form-control"
        placeholder="Geofence Status"
        aria-label="Username"
        aria-describedby="basic-addon1"
        style="margin: 5px"
      />
      <div class="btn-group">
        <a href="#" class="btn btn-primary active" aria-current="page"
          >Search</a
        >
        <a href="#" class="btn btn-primary">Clear</a>
      </div>
    </div>
    <div
      id="micro-alarms"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      v-if="tipo == 'genset'"
    >
      Alarmas
      <canvas id="myChart_alarms"></canvas>
    </div>
    <div
      id="cargo-care"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      v-if="tipo == 'genset'"
    >
      Eventos
      <canvas id="myChart_cargo"></canvas>
    </div>
    <div
      id="cargo-care"
      class="col shadow-sm p-3 mb-5 bg-white rounded"
      v-if="tipo == 'madurador'"
    >
      <div class="row">
        <p class="col-5">TEMPERATURE</p>
        <input 
          type="number" 
          class="form-control col-6" 
          v-model="temperatura" 
          :disabled="true" 
        />
      </div>
      <br />
      <div class="row">
        <p class="col-5">CO2</p>
        <input 
          type="number" 
          class="form-control col-6" 
          v-model="co2" 
          :disabled="true" 
        />
      </div>
      <br />
      <div class="row">
        <p class="col-5">HUMIDITY</p>
        <input 
          type="number" 
          class="form-control col-6" 
          v-model="humedad" 
          :disabled="true" 
        />
      </div>
      <br />
      <div class="row">
        <p class="col-5">ETHYLENE</p>
        <input 
          type="number" 
          class="form-control col-6" 
          v-model="etileno" 
          :disabled="true" 
        />
      </div>
      <br />
      <div class="row">
        <p class="col-5">PROCESS TIME</p>
        <input
          type="number"
          class="form-control col-6"
          v-model="tiempo_proceso"
          :disabled="true" 
        />
      </div>
      <br />
      <div class="row">
        <p class="col-5">ETHYLENE MINIMUM</p>
        <input
          type="number"
          class="form-control col-6"
          v-model="etileno_minimo"
          :disabled="true" 
        />
      </div>
      <br />
      <div class="row">
        <p class="col-5">INJECTION TIME</p>
        <input
          type="number"
          class="form-control col-6"
          v-model="tiempo_inyeccion"
          :disabled="true" 
        />
      </div>
      <br />
      <div class="row">
        <div class="col-4">
          <input type="radio" id="inicio" value="Q" v-model="estado" :disabled="true"  />
          <label for="uno">START</label>
        </div>
        <br />
        <div class="col-4">
          <input type="radio" id="pausa" value="P" v-model="estado" :disabled="true" />
          <label for="uno">STOP</label>
        </div>
        <br />
        <div class="col-4">
          <input type="radio" id="reinicio" value="R" v-model="estado" :disabled="true" />
          <label for="uno">RESET</label>
        </div>
      </div>
      <br />
      <!-- <button
        type="submit"
        class="btn btn-secondary col-12"
        @click="SetPoint()"
        :disabled="admin_madurador!=true" 
      >
        GUARDAR DATOS
      </button> -->
    </div>
  </div>
</template>
<script>
import axios from "axios";
var Chart_alarmas;
var Chart_eventos;
var Chart_set_point;
var Chart_return_air;
var Chart_temp_supply;
export default {
  components: {},
  props: {
    contenedor_id: Number,
    tipo: String,
    admin_madurador: Boolean,
  },
  data() {
    return {
      //  -------- chart alarma -------
      chart_alarma_labels: [],
      chart_alarma_dataset_data: [],
      //  -------- chart eventos -------
      chart_eventos_labels: [],
      chart_eventos_dataset_data: [],

      // --- points madurador ---
      temperatura: 0,
      co2: 0,
      humedad: 0,
      etileno: 0,
      tiempo_proceso: 0,
      etileno_minimo: 0,
      tiempo_inyeccion: 0,
      estado: "", // start, stop, reset

      // --- points  ---
      points : {},
      estado_madurador: "",

    };
  },
  watch: {
    contenedor_id(val, oldVal) {
      // console.log(val, oldVal);
      // console.log(this.tipo);
      if (this.tipo == "genset") {
        this.setLabel();
      }
      if (this.tipo == "madurador" && val != null) {
        this.GetPointsMadurador();
      }
    },
    points(val, oldVal) {
      // console.log('valores de point', val, oldVal);
        this.temperatura = val.temperatura;
        this.co2 = val.co2;
        this.humedad = val.humedad;
        this.etileno = val.etileno;
        this.tiempo_proceso = val.tiempo_proceso;
        this.etileno_minimo = val.etileno_minimo;
        this.tiempo_inyeccion = val.tiempo_inyeccion;
      console.log(val); 
      
    },
    estado_madurador(val, oldVal) {
      console.log('desde izquierda',val.estado);
      this.estado = val.estado;
     
    },
  },
  mounted() {},
  methods: {
    Circular_iniciarGraficosAlarms() {
      let self = this;
      var ctx_alarms = document
        .getElementById("myChart_alarms")
        .getContext("2d");
      Chart_alarmas = new Chart(ctx_alarms, {
        type: "doughnut",
        data: {
          labels: self.chart_alarma_labels,
          datasets: [
            {
              data: self.chart_alarma_dataset_data,
              backgroundColor: [
                "#9c88ff",
                "#fbc531",
                "#e84118",
                "#00a8ff",
                "#718093",
              ],
              hoverOffset: 4,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    },
    Circular_iniciarGraficosEventos() {
      let self = this;
      var ctx_cargo = document.getElementById("myChart_cargo").getContext("2d");
      Chart_eventos = new Chart(ctx_cargo, {
        type: "doughnut",
        data: {
          labels: self.chart_eventos_labels,
          datasets: [
            {
              label: "My First Dataset",
              data: self.chart_eventos_dataset_data,
              backgroundColor: [
                "#fc5c65",
                "#fd9644",
                "#fed330",
                "#26de81",
                "#a55eea",
              ],
              hoverOffset: 4,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    },
    setLabel() {
      let self = this;
      if (self.tipo == "genset") {
        axios
          .post(route("contenedores.get_alarma_evento"), {
            id: self.contenedor_id,
          })
          .then((response) => {
            if (response.data != 0 && self.chart_alarma_labels.length == 0) {
              self.chart_alarma_labels = [];
              self.chart_alarma_dataset_data = [];
              response.data["alarma"].forEach((element) => {
                self.chart_alarma_labels.push(element.nombre_alarma);
                self.chart_alarma_dataset_data.push(element.cantidad_alarma);
              });
              self.chart_eventos_labels = [];
              self.chart_eventos_dataset_data = [];
              response.data["evento"].forEach((element) => {
                self.chart_eventos_labels.push(element.nombre_evento);
                self.chart_eventos_dataset_data.push(element.cantidad_evento);
              });
            }
          })
          .then(() => {
            // console.log("actualizando el chart circular ");
            // Chart_alarmas.update();
            if (Chart_alarmas) {
              // Chart_alarmas.data.labels = self.chart_alarma_labels;
              // Chart_alarmas.data.datasets[0].data = self.chart_alarma_dataset_data;
              // Chart_alarmas.update();                    //
              Chart_alarmas.destroy();
            }
            self.Circular_iniciarGraficosAlarms();
          })
          .then(() => {
            // Chart_eventos.update();
            if (Chart_eventos) {
              Chart_eventos.destroy();
            }
            self.Circular_iniciarGraficosEventos();
          });
      }
    },
    async GetPointsMadurador() {
      let self = this;

      await axios
        .post(route("madurador.points.get"), {
          id_contenedor: self.contenedor_id,
        })
        .then((response) => {
          // console.log("file: izquierda.vue ~ line 155 ~ .then ~ response", response.data[0])
          // return 0;
          self.temperatura = response.data[0].temperatura;
          self.co2 = response.data[0].co2;
          self.humedad = response.data[0].humedad;
          self.etileno = response.data[0].etileno;
          self.tiempo_proceso = response.data[0].tiempo_proceso;
          self.etileno_minimo = response.data[0].etileno_minimo;
          self.tiempo_inyeccion = response.data[0].tiempo_inyeccion;
          self.estado = response.data[0].estado;
        })
        .then(() => {
          Swal.close();
        });
    },
    SetPoint() {
      let self = this;
      Swal.fire({
        title: "Espere por favor",
        html: '<i class="fa fa-spinner fa-spin" style="font-size:15px"></i>',
        allowOutsideClick: false,
        showConfirmButton: false,
      });
      let data = new FormData();

      data.append("id_contenedor", self.contenedor_id);
      data.append("temperatura", self.temperatura);
      data.append("co2", self.co2);
      data.append("humedad", self.humedad);
      data.append("etileno", self.etileno);
      data.append("tiempo_proceso", self.tiempo_proceso);
      data.append("etileno_minimo", self.etileno_minimo);
      data.append("tiempo_inyeccion", self.tiempo_inyeccion);
      data.append("estado", self.estado);

      axios
        .post(route("madurador.points.set"), data)
        .then((response) => {
          console.log(
            "file: izquierda.vue ~ line 155 ~ .then ~ response",
            response.data
          );
        })
        .then(() => {
          self.GetPointsMadurador();
        });
    },
  },
};

// 			<rptCanastaFotos ref="rptCanastaFotos" :agencia_id="agencia_id">
// 			</rptCanastaFotos>
// 		</div>
// 	</layout>
// </template>

// <script>
// import layout from "./../Components/layout_creditos";
// import { required } from "vuelidate/lib/validators";
// import headerClose from "./../Components/header_close";
// import headerCloseModal from "./../Components/header_close_modal";
// import rptCanastaFotos from "./Reports/rptCanastaFotos";
// const noZero = (value) => value != 0;
// export default {
// 	props: {
// 		agencia_id: Number,
// 		categorias: Array,
// 		datos_cliente: Object,
// 		fotos_cliente: Array,
// 	},
// 	components: {
// 		layout,
// 		headerClose,
// 		headerCloseModal,
// 		rptCanastaFotos,
// 	},

// 	data() {
// 		return {
// 			submited: false,
</script>