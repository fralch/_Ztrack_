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
  </div>
</template>
<script>
import axios from "axios";
let Chart_alarmas;
let Chart_eventos;
let Chart_set_point;
let Chart_return_air;
let Chart_temp_supply;
export default {
  components: {},
  props: {
    contenedor_id: Number,
    tipo: String,
  },
  data() {
    return {
      //  -------- chart alarma -------
      chart_alarma_labels: [],
      chart_alarma_dataset_data: [],
      //  -------- chart eventos -------
      chart_eventos_labels: [],
      chart_eventos_dataset_data: [],
    };
  },
  watch: {
    contenedor_id(val, oldVal) {
      // console.log(val, oldVal);
      this.setLabel();
    },
  },
  mounted() {
  },
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
            console.log("actualizando el chart circular ");
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