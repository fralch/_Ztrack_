<template>
  <div
    id="myChart_principal_id"
    class="col shadow-sm p-3 mb-5 bg-white rounded"
    style="margin: -30px 15px 10px 15px"
    v-if="tipo != ''"
  >
    <canvas id="myChart_principal" style="height: 600px"></canvas>
  </div>
</template>
<script>
import axios from "axios";
var myChart_principal;
export default {
  components: {},
  props: {
    contenedor: Number,
    tipo: String,
  },
  data() {
    return {
      datos_tabla_reefer: null,
      datos_tabla_generador: null,
      //  ---- myChart_principal -----
      my_Chart_principal_dataset_reefer: [
        {
          label: "set_point",
          data: [],
          borderColor: "#FFC312",
          backgroundColor: "#FFC312",
          borderWidth: 4,
        },
        {
          label: "temp_supply_1",
          data: [],
          borderColor: "#C4E538",
          backgroundColor: "#C4E538",
          borderWidth: 4,
        },
        {
          label: "temp_supply_2",
          data: [],
          borderColor: "#FF1E51",
          backgroundColor: "#FF1E51",
          borderWidth: 4,
        },
        {
          label: "return_air",
          data: [],
          borderColor: "#12CBC4",
          backgroundColor: "#12CBC4",
          borderWidth: 4,
        },

        {
          label: "ambient_air", //------------
          data: [],
          borderColor: "#9980FA",
          backgroundColor: "#9980FA",
          borderWidth: 4,
        },

        {
          label: "relative_humidity", //-------------
          data: [],
          borderColor: "#FDA7DF",
          backgroundColor: "#FDA7DF",
          borderWidth: 4,
        },

        {
          label: "co2_reading", //--------------
          data: [],
          borderColor: "#AAE51",
          backgroundColor: "#AA1E51",
          borderWidth: 4,
        },
        {
          label: "o2_reading", //-----------------
          data: [],
          borderColor: "#BA1A51",
          backgroundColor: "#BA1A51",
          borderWidth: 4,
        },
        {
          label: "evaporator_speed",
          data: [],
          borderColor: "#CA1A51",
          backgroundColor: "#CA1A51",
          borderWidth: 4,
        },
      ],
      my_Chart_principal_dataset_generador: [
        {
          label: "battery_voltage",
          data: [],
          borderColor: "#db0404",
          backgroundColor: "#db0404",
          borderWidth: 4,
        },
        {
          label: "water_temp",
          data: [],
          borderColor: "#3498db",
          backgroundColor: "#3498db",
          borderWidth: 4,
        },
        {
          label: "running_frequency",
          data: [],
          borderColor: "#9b59b6",
          backgroundColor: "#9b59b6",
          borderWidth: 4,
        },
        {
          label: "fuel_level",
          data: [],
          borderColor: "#e67e22",
          backgroundColor: "#e67e22",
          borderWidth: 4,
        },
        {
          label: "voltage_measure",
          data: [],
          borderColor: "#1abc9c",
          backgroundColor: "#1abc9c",
          borderWidth: 4,
        },
        {
          label: "rotor_current",
          data: [],
          borderColor: "#2c3e50",
          backgroundColor: "#2c3e50",
          borderWidth: 4,
        },
        {
          label: "fiel_current",
          data: [],
          borderColor: "#f39c12",
          backgroundColor: "#f39c12",
          borderWidth: 4,
        },
        {
          label: "rpm",
          data: [],
          borderColor: "#f39c12",
          backgroundColor: "#f39c12",
          borderWidth: 4,
        },
        {
          label: "horometro",
          data: [],
          borderColor: "#f39c12",
          backgroundColor: "#f39c12",
          borderWidth: 4,
        },
      ],
      my_Chart_principal_labels: [],
      my_Chart_principal_dataSetable: [],
    };
  },
  watch: {
    contenedor(){
      this.getContenedor();
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
              duration: 3000,
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
              max: 15, // eje y
              min: -15, // eje y
            },
          },
        },
      });
    },
    setLabelsMyChartPrincipal() {
      let self = this;
      async function set_labels() {
        self.my_Chart_principal_labels = [];
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
             console.log(self.my_Chart_principal_labels);
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
          console.log(self.my_Chart_principal_labels);
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
              })
              .then(() => {
                console.log("actualizando el chart circular ");
                // Chart_alarmas.update();
                Chart_alarmas.destroy();
                self.Circular_iniciarGraficosAlarms();
              })
              .then(() => {
                // Chart_eventos.update();
                Chart_eventos.destroy();
                self.Circular_iniciarGraficosEventos();
              });
          }
          if (self.tipo == "Reefer") {
            axios
              .post(route("contenedores.get_alarma_evento"), {
                id: self.datos_tabla_reefer[0].contenedor_id,
                tipo: self.tipo,
              })
              .then((response) => {});
          }
        })
        .then(() => {
          // self.autoRefresh();
        });
    },
    setDatosGraficoPrincipal() {
      /* 😑 CUANDO QUIERAS AGREGAR O QUITAR VARIABLES PARA EL GRAFICO PRINCIPAL PRIMERO TIENES AGREGARLOS EN LOS DATA QUE ESTAN ABAJO DE LOS PROPS LUEGO ACTUALIZARLOS AQUI  */
      let self = this;
      async function set_data() {
        self.my_Chart_principal_dataset = [];
        if (self.tipo == "reefer") {
          self.my_Chart_principal_dataset_reefer[0].data = [];
          self.my_Chart_principal_dataset_reefer[1].data = [];
          self.my_Chart_principal_dataset_reefer[2].data = [];
          self.my_Chart_principal_dataset_reefer[3].data = [];
          self.my_Chart_principal_dataset_reefer[4].data = [];
          self.my_Chart_principal_dataset_reefer[5].data = [];
          self.my_Chart_principal_dataset_reefer[6].data = [];
          self.my_Chart_principal_dataset_reefer[7].data = [];
          self.my_Chart_principal_dataset_reefer[8].data = [];

          let datos_reefer =
            self.datos_tabla_reefer.length != 0
              ? self.datos_tabla_reefer.reverse()
              : [];
          datos_reefer.map(function (datos_r, index) {
            self.my_Chart_principal_dataset_reefer[0].data.push(
              datos_r.set_point
            );
            self.my_Chart_principal_dataset_reefer[1].data.push(
              datos_r.temp_supply_1
            );
            self.my_Chart_principal_dataset_reefer[2].data.push(
              datos_r.temp_supply_2
            );
            self.my_Chart_principal_dataset_reefer[3].data.push(
              datos_r.return_air
            );
            self.my_Chart_principal_dataset_reefer[4].data.push(
              datos_r.ambient_air
            );
            self.my_Chart_principal_dataset_reefer[5].data.push(
              datos_r.relative_humidity
            );
            self.my_Chart_principal_dataset_reefer[6].data.push(
              datos_r.co2_reading
            );
            self.my_Chart_principal_dataset_reefer[7].data.push(
              datos_r.o2_reading
            );
            self.my_Chart_principal_dataset_reefer[8].data.push(
              datos_r.evaporator_speed
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
          self.my_Chart_principal_dataset_generador[8].data = [];

          let datos_genset =
            self.datos_tabla_generador.length != 0
              ? self.datos_tabla_generador.reverse()
              : [];
          datos_genset.map(function (datos_g, index) {
            self.my_Chart_principal_dataset_generador[0].data.push(
              datos_g.battery_voltage
            );
            self.my_Chart_principal_dataset_generador[1].data.push(
              datos_g.water_temp
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
              datos_g.rotor_current
            );
            self.my_Chart_principal_dataset_generador[6].data.push(
              datos_g.fiel_current
            );
            self.my_Chart_principal_dataset_generador[7].data.push(datos_g.rpm);
            self.my_Chart_principal_dataset_generador[8].data.push(
              datos_g.horometro
            );
            // -----------------
          });
        }
        // console.log('my_Chart_principal_dataset');
      }

      set_data().then(() => {
        if (self.tipo == "reefer") {
          self.my_Chart_principal_dataSetable =
            self.my_Chart_principal_dataset_reefer;
        }
        if (self.tipo == "genset") {
          self.my_Chart_principal_dataSetable =
            self.my_Chart_principal_dataset_generador;
        }
      });
    },
  },
};
</script>
