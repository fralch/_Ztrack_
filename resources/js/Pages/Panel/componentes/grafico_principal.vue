<template>
  
  <div
    id="myChart_principal_id"
    class="col shadow-sm p-3 mb-5 bg-white rounded"
    style="margin: -30px 15px 10px 15px"
    v-if="tipo != ''"
  >
     <div class="row"   v-if="datos_tabla_reefer != null || datos_tabla_madurador != null || datos_tabla_generador != null ">
        <div class="col-3">
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm"
                >Desde</span
              >
            </div>
            <input
              type="date"
              class="form-control"
              aria-label="Small"
              aria-describedby="inputGroup-sizing-sm"
             v-model="desde"
            />
          </div>
        </div>
        <div class="col-3">
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Hasta</span>
            </div>
            <input
              type="date"
              class="form-control"
              aria-label="Small"
              aria-describedby="inputGroup-sizing-sm"
              v-model="hasta"
            />
          </div>
        </div>
        <div class="col">
          <button
            class="btn btn-secondary btn-sm"
            type="button"
            @click="getContenedorFechas()"
          >
            Buscar
          </button>
        </div>
      </div>
    <div>
      <canvas id="myChart_principal" style="height: 600px"></canvas>
    </div>
    
  </div>
</template>
<script>
import axios from "axios";
let myChart_principal;
export default {
  components: {},
  props: {
    contenedor: Number,
    tipo: String,
  },
  data() {
    return {
      datos_tabla_reefer: null,
      datos_tabla_madurador: null,
      datos_tabla_generador: null,
      //  ---- myChart_principal -----
      my_Chart_principal_dataset_reefer: [
        {
          label: "set_point C°",
          data: [],
          borderColor: "#FFC312",
          backgroundColor: "#FFC312",
          borderWidth: 4,
          yAxisID: 'y1', //---- yAxisID: 'y1' asignando en el eje derecho del grafico
        },
        
        {
          label: "co2 - %",
          data: [],
          borderColor: "#12CBC4",
          backgroundColor: "#12CBC4",
          borderWidth: 4,
          yAxisID: 'y1',
        },

        {
          label: "humidity - %", //------------
          data: [],
          borderColor: "#9980FA",
          backgroundColor: "#9980FA",
          borderWidth: 4,
          yAxisID: 'y',
        },
        
        {
          label: "AVL - mch",
          data: [],
          borderColor: "#CA1A51",
          backgroundColor: "#CA1A51",
          borderWidth: 4,
          yAxisID: 'y',
        },
      ],
       my_Chart_principal_dataset_madurador: [
        {
          label: "set_point C°",
          data: [],
          borderColor: "#FFC312",
          backgroundColor: "#FFC312",
          borderWidth: 4,
          yAxisID: 'y1', //---- yAxisID: 'y1' asignando en el eje derecho del grafico
        },
        
        {
          label: "co2 - %",
          data: [],
          borderColor: "#12CBC4",
          backgroundColor: "#12CBC4",
          borderWidth: 4,
          yAxisID: 'y1',
        },

        {
          label: "humidity - %", //------------
          data: [],
          borderColor: "#9980FA",
          backgroundColor: "#9980FA",
          borderWidth: 4,
          yAxisID: 'y',
        },

        {
          label: "ethylene - ppm", //-------------
          data: [],
          borderColor: "#FDA7DF",
          backgroundColor: "#FDA7DF",
          borderWidth: 4,
          yAxisID: 'y',
        },

        
        {
          label: "AVL - mch",
          data: [],
          borderColor: "#CA1A51",
          backgroundColor: "#CA1A51",
          borderWidth: 4,
          yAxisID: 'y',
        },
      ],
      my_Chart_principal_dataset_generador: [
        {
          label: "set_point",
          data: [],
          borderColor: "#3498db",
          backgroundColor: "#3498db",
          borderWidth: 4,
           yAxisID: 'y1',
        },
        {
          label: "battery_voltage",
          data: [],
          borderColor: "#db0404",
          backgroundColor: "#db0404",
          borderWidth: 4,
           yAxisID: 'y1',
        },
        {
          label: "running_frequency",
          data: [],
          borderColor: "#9b59b6",
          backgroundColor: "#9b59b6",
          borderWidth: 4,
           yAxisID: 'y1',
        },
        {
          label: "fuel_level",
          data: [],
          borderColor: "#e67e22",
          backgroundColor: "#e67e22",
          borderWidth: 4,
           yAxisID: 'y',
        },
        {
          label: "voltage_measure",
          data: [],
          borderColor: "#1abc9c",
          backgroundColor: "#1abc9c",
          borderWidth: 4,
           yAxisID: 'y',
        },
        
        {
          label: "rpm",
          data: [],
          borderColor: "#f39c12",
          backgroundColor: "#f39c12",
          borderWidth: 4,
           yAxisID: 'y',
        },
        {
          label: "temp_supply",
          data: [],
          borderColor: "#33FFD7",
          backgroundColor: "#33FFD7",
          borderWidth: 4,
           yAxisID: 'y',
        },
        {
          label: "return_air_temp",
          data: [],
          borderColor: "#FF33EC",
          backgroundColor: "#FF33EC",
          borderWidth: 4,
           yAxisID: 'y',
        },
       
      ],
      my_Chart_principal_labels: [],
      my_Chart_principal_dataSetable: [],
      desde: new Date().getFullYear() + '-' + ('0' + (new Date().getMonth() + 1)).slice(-2) +'-' + ('0' + new Date().getDate()).slice(-2), 
      hasta: new Date().getFullYear() + '-' + ('0' + (new Date().getMonth() + 1)).slice(-2) +'-' + ('0' + new Date().getDate()).slice(-2), 
    };
  },
  watch: {
    contenedor(){
      this.getContenedor();
    },
    tipo(){
      this.my_Chart_principal_dataSetable = [];
      if (myChart_principal) {
          myChart_principal.destroy();
          this.myChartPrincipal();
      }
    },
  },
  methods: {
    getContenedor() {
      let self = this;
      
      if (this.tipo == "reefer") {
        axios
          .post(route("contenedores.get_datos"), {
            id: this.contenedor,
            tipo: "reefer",
          })
          .then((response) => {
            self.datos_tabla_reefer = response.data;
          }).then(() => {
            self.setLabelsMyChartPrincipal();
          }); 
          
      }
      if (this.tipo == "genset") {
        axios
          .post(route("contenedores.get_datos"), {
            id: this.contenedor,
            tipo: "genset",
          })
          .then((response) => {
            self.datos_tabla_generador = response.data;            
          }).then(() => {
            self.setLabelsMyChartPrincipal();
          }); 
      }
      if (this.tipo == "madurador") {
        axios
          .post(route("contenedores.get_datos"), {
            id: this.contenedor,
            tipo: "madurador",
          })
          .then((response) => {
            self.datos_tabla_madurador = response.data;            
          }).then(() => {
            self.setLabelsMyChartPrincipal();
          }); 
      }
    },
    myChartPrincipal() {
      let self = this;
     
      const ctx_principal = document
        .getElementById("myChart_principal")
        .getContext("2d");
      myChart_principal = new Chart(ctx_principal, {
        type: "line",
        data: {
          labels: self.my_Chart_principal_labels,
          datasets: self.my_Chart_principal_dataSetable,
        },
        options: {
          animations: {
            tension: {
              duration: 6000,
              easing: "linear",
              from: 0.2,
              to: 0,
              loop: true,
            },
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              type: 'linear',
              display: true,
              title: {
                display: true,
                // text: 'Valores del 0 al 350  - Ethylene, AVL, Humidity'
              },
              position: 'left',
              // max: 350, // eje y
              // min: 0, // eje y
            },
            y1: { // *** CREANDO EJE Y DERECHO ***
              type: 'linear',
              display: true,
              title: {
                display: true,
                // text: 'Valores del 0 al 40 - Setpoint°, Co2'
              },
              position: 'right',
              // max: 50, // eje y
              // min: 0, // eje y
              // grid line settings 
              grid: {
                drawOnChartArea: false, // only want the grid lines for one axis to show up
              },
            },
          },
        },
      });
    },
    setLabelsMyChartPrincipal() {
      let self = this;
      async function set_labels() {
        self.my_Chart_principal_labels = [];
        if (self.tipo == "madurador") {
          let datos_m =
            self.datos_tabla_madurador.length != 0
              ? self.datos_tabla_madurador.reverse()
              : [];
          datos_m.map(function (datos_m, index) {
            let date = new Date(datos_m.created_at);
            let day = date.getDate()+ 0;
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let seconds = date.getSeconds();
            if (minutes < 10) {
              minutes = "0" + minutes;
            }

            if (seconds < 10) {
              seconds = "0" + seconds;
            }

            if (month < 10) {
              self.my_Chart_principal_labels.push(
                `${day}-0${month}-${year} ${hours}:${minutes}:${seconds}`
              );
            } else {
              self.my_Chart_principal_labels.push(
                `${day}-${month}-${year}  ${hours}:${minutes}:${seconds}`
              );
            }
            //  console.log("label madurado ",self.my_Chart_principal_labels);
          });
        }
        if (self.tipo == "reefer") {
          let datos_r =
            self.datos_tabla_reefer.length != 0
              ? self.datos_tabla_reefer.reverse()
              : [];
          datos_r.map(function (datos_r, index) {
            let date = new Date(datos_r.created_at);
            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let seconds = date.getSeconds();
            if (minutes < 10) {
              minutes = "0" + minutes;
            }

            if (seconds < 10) {
              seconds = "0" + seconds;
            }

            if (month < 10) {
              self.my_Chart_principal_labels.push(
                `${day}-0${month}-${year} ${hours}:${minutes}:${seconds}`
              );
            } else {
              self.my_Chart_principal_labels.push(
                `${day}-${month}-${year}  ${hours}:${minutes}:${seconds}`
              );
            }
            //  console.log(self.my_Chart_principal_labels);
          });
        }
        if (self.tipo == "genset") {
          let datos_g =
            self.datos_tabla_generador != null
              ? self.datos_tabla_generador.reverse()
              : [];
          datos_g.map(function (datos_g, index) {
            let date = new Date(datos_g.created_at);
            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let seconds = date.getSeconds();
            if (minutes < 10) {
              minutes = "0" + minutes;
            }

            if (seconds < 10) {
              seconds = "0" + seconds;
            }

            if (month < 10) {
              self.my_Chart_principal_labels.push(
                `${day}-0${month}-${year} ${hours}:${minutes}:${seconds}`
              );
            } else {
              self.my_Chart_principal_labels.push(
                `${day}-${month}-${year}  ${hours}:${minutes}:${seconds}`
              );
            }
          });
          // console.log(self.my_Chart_principal_labels);
        }
      }

      set_labels()
        .then(() => {
          self.setDatosGraficoPrincipal();
        })
        .then(() => {
          if (myChart_principal) {
            myChart_principal.update();
            myChart_principal.destroy();
            self.myChartPrincipal();
          } else {
            self.myChartPrincipal();
          }
        })
        .then(() => {
          if (self.tipo == "Generador") {
            // console.log(self.datos_tabla_generador[0].contenedor_id);
            axios
              .post(route("contenedores.get_alarma_evento"), {
                id: self.datos_tabla_generador[0].contenedor_id,
                tipo: self.tipo,
              })
              .then((response) => {
                if (
                  response.data != 0 &&
                  self.chart_alarma_labels.length == 0
                ) {
                  self.chart_alarma_labels = [];
                  self.chart_alarma_dataset_data = [];
                  response.data["alarma"].forEach((element) => {
                    self.chart_alarma_labels.push(element.nombre_alarma);
                    self.chart_alarma_dataset_data.push(
                      element.cantidad_alarma
                    );
                  });
                  self.chart_eventos_labels = [];
                  self.chart_eventos_dataset_data = [];
                  response.data["evento"].forEach((element) => {
                    self.chart_eventos_labels.push(element.nombre_evento);
                    self.chart_eventos_dataset_data.push(
                      element.cantidad_evento
                    );
                  });
                }
              }); 
              
          }
          
        }); 
    },
    setDatosGraficoPrincipal() {
      /* 😑 CUANDO QUIERAS AGREGAR O QUITAR VARIABLES PARA EL GRAFICO PRINCIPAL PRIMERO TIENES AGREGARLOS EN LOS DATA QUE ESTAN ABAJO DE LOS PROPS LUEGO ACTUALIZARLOS AQUI  */
      let self = this;
      async function set_data() {
        self.my_Chart_principal_dataset = [];
        if (self.tipo == "madurador") {
          self.my_Chart_principal_dataset_madurador[0].data = [];
          self.my_Chart_principal_dataset_madurador[1].data = [];
          self.my_Chart_principal_dataset_madurador[2].data = [];
          self.my_Chart_principal_dataset_madurador[3].data = [];
          self.my_Chart_principal_dataset_madurador[4].data = [];

          
 
          let datos_madurador =
            self.datos_tabla_madurador.length != 0
              ? self.datos_tabla_madurador
              : [];
          datos_madurador.map(function (datos_m, index) {
            self.my_Chart_principal_dataset_madurador[0].data.push(
              datos_m.set_point
            );
            self.my_Chart_principal_dataset_madurador[1].data.push(
              datos_m.co2_reading
            );
            self.my_Chart_principal_dataset_madurador[2].data.push(
              datos_m.relative_humidity
            );
            self.my_Chart_principal_dataset_madurador[3].data.push(
              datos_m.ethylene
            );
            self.my_Chart_principal_dataset_madurador[4].data.push(
              datos_m.avl
            );
          });
        }
        if (self.tipo == "reefer") {
          self.my_Chart_principal_dataset_reefer[0].data = [];
          self.my_Chart_principal_dataset_reefer[1].data = [];
          self.my_Chart_principal_dataset_reefer[2].data = [];
          self.my_Chart_principal_dataset_reefer[3].data = [];

          let datos_reefer =
            self.datos_tabla_reefer.length != 0
              ? self.datos_tabla_reefer
              : [];
          datos_reefer.map(function (datos_r, index) {
            self.my_Chart_principal_dataset_reefer[0].data.push(
              datos_r.set_point
            );
            self.my_Chart_principal_dataset_reefer[1].data.push(
              datos_r.co2_reading
            );
            self.my_Chart_principal_dataset_reefer[2].data.push(
              datos_r.relative_humidity
            );
            self.my_Chart_principal_dataset_reefer[3].data.push(
              datos_r.avl
            );
            
          });
        }
        if (self.tipo == "genset") {
          self.my_Chart_principal_dataset_generador[0].data = [];
          self.my_Chart_principal_dataset_generador[1].data = [];
          self.my_Chart_principal_dataset_generador[2].data = [];
          self.my_Chart_principal_dataset_generador[3].data = [];
          self.my_Chart_principal_dataset_generador[4].data = [];
          self.my_Chart_principal_dataset_generador[5].data = [];
          self.my_Chart_principal_dataset_generador[6].data = [];
          self.my_Chart_principal_dataset_generador[7].data = [];


          let datos_genset =
            self.datos_tabla_generador.length != 0
              ? self.datos_tabla_generador
              : [];
          datos_genset.map(function (datos_g, index) {
            self.my_Chart_principal_dataset_generador[0].data.push(
              datos_g.set_point
            );
            self.my_Chart_principal_dataset_generador[1].data.push(
              datos_g.battery_voltage
            );
            self.my_Chart_principal_dataset_generador[2].data.push(
              datos_g.running_frequency
            );
            self.my_Chart_principal_dataset_generador[3].data.push(
              datos_g.fuel_level
            );
            self.my_Chart_principal_dataset_generador[4].data.push(
              datos_g.voltage_measure
            );
            self.my_Chart_principal_dataset_generador[5].data.push(
              datos_g.rpm
            );
            self.my_Chart_principal_dataset_generador[6].data.push(
              datos_g.temp_supply_1
            );
            self.my_Chart_principal_dataset_generador[7].data.push(
              datos_g.return_air
            );
           
            // -----------------
          });
        }
        // console.log('my_Chart_principal_dataset');
      }

      set_data().then(() => {
        if (self.tipo == "reefer") {

          self.my_Chart_principal_dataSetable = self.my_Chart_principal_dataset_reefer;
        }
        if (self.tipo == "genset") {
          self.my_Chart_principal_dataSetable = self.my_Chart_principal_dataset_generador;
        }
        if (self.tipo == "madurador") {
          self.my_Chart_principal_dataSetable = self.my_Chart_principal_dataset_madurador;
        }
      });
    },
    getContenedorFechas() {
      let self = this;
      
      if (this.tipo == "reefer") {
        axios
          .post(route("contenedores.get_datos_graficos"), {
            id: this.contenedor,
            tipo: "reefer",
            desde: self.desde,
            hasta: self.hasta,
          })
          .then((response) => {
            self.datos_tabla_reefer = response.data.reverse();
          }).then(() => {
            self.setLabelsMyChartPrincipal();
          }); 
          
      }
      if (this.tipo == "genset") {
        axios
          .post(route("contenedores.get_datos_graficos"), {
            id: this.contenedor,
            tipo: "genset",
            desde: self.desde,
            hasta: self.hasta,
          })
          .then((response) => {
            self.datos_tabla_generador = response.data.reverse();            
          }).then(() => {
            self.setLabelsMyChartPrincipal();
          }); 
      }
      if (this.tipo == "madurador") {
        axios
          .post(route("contenedores.get_datos_graficos"), {
            id: this.contenedor,
            tipo: "madurador",
            desde: self.desde,
            hasta: self.hasta,
          })
          .then((response) => {
            self.datos_tabla_madurador = response.data.reverse();            
          }).then(() => {
            self.setLabelsMyChartPrincipal();
          }); 
      }
    },
  },
};
</script>
