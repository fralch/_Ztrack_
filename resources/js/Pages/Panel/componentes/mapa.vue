<template>
  <div
    id="asset_maps"
    class="col shadow-sm p-3 mb-5 bg-white rounded"
    style="margin: -30px 15px 10px 15px"
  >
    <!-- div del loading -->
    <div class="loading" style="display: none">Loading&#8230;</div>
    <!-- div del mapa  -->
    <div id="map" style="width: 100%; height: 365px"></div>
  </div>
</template>
<script>
import axios from "axios";
var map;
export default {
  components: {},
  props: {
    punto: Array,
    tipo: String,
    makers: Array,
  },
  data() {
    return {
      datos_tabla_generador: [],
      mapa: null,
      origen: {},
      waypoints: [],
      polylinePoints: [],
      contenedor: null,
    };
  },
  watch: {
    contenedor(valor) {
      if (valor) {
        map.off();
        map.remove();
        this.polylinePoints = [];
        // this.iniciando_leflet(valor[0], valor[1]);
        this.iniciando_leflet();
      }
    },
    makers(valor) {
      if (valor) {
        console.log(valor);
        map.off();
        map.remove();
        const mapa = () => {
          map = L.map("map", {
            center: [-12.058691761493174, -75.20386755466461],
            zoom: valor.length > 0 ? 8 : 0,
          });
          L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "FrankCairampoma",
          }).addTo(map);
          // hacer foreach de los makers
          valor.forEach((marker) => {
            L.marker([marker.latitud, marker.longitud])
              .addTo(map)
              .bindPopup(marker.nombre_contenedor, {
                closeOnClick: false,
                autoClose: false,
              })
              .openPopup();
            // console.log(marker.nombre_contenedor);
          });

          // L.marker([-12.058691761493174,  -75.20386755466461])
          //           .addTo(map)
          //           .bindPopup("Uwefwef")
          //           .openPopup();
        };
        mapa();
      }
    },
  },
  mounted() {
    this.iniciando_leflet();
  },
  methods: {
    iniciando_leflet(lt = -12.058691761493174, ln = -75.20386755466461) {
      let self = this;
      $(".loading").css("display", "block"); // mostrar el loading
      if (!self.contenedor) {
        map = L.map("map", {
          center: [lt, ln],
          zoom: 13,
        });
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
          attribution: "FrankCairampoma",
        }).addTo(map);
        //AGREGAR MARKER AL INICIO DEL MAPA
        // L.marker([-12.058691761493174,  -75.20386755466461])
        //           .addTo(map)
        //           .bindPopup("Uwefwef")
        //           .openPopup();
        $(".loading").css("display", "none"); // ocultar el loading
      } else {
        this.$nextTick(() => {
          axios
            .post(route("contenedores.get_datos"), {
              id: self.contenedor,
              tipo: self.tipo,
            })
            .then((response) => {
              self.datos_tabla_generador = response.data.reverse();
            })
            .then((response) => {
              self.datos_tabla_generador.forEach((element) => {
                self.polylinePoints.push({
                  lat: element.latitud,
                  lng: element.longitud,
                });
          
              });
            })
            .then((response) => {
              //DESDE AQUI COMIENZA LA CONFIGURACION DEL MAPA
              map = L.map("map", {
                center: [
                  self.polylinePoints[0].lat,
                  self.polylinePoints[0].lng,
                ],
                zoom: 13,
              });

              //  ***MUY IMPORTANTE *** si no agregas su autoria el mapa sale en blanco 👇
              L.tileLayer(
                "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
                {
                  attribution: "FrankCairampoma",
                }
              ).addTo(map);

              //FIN DE LA CONFIGURACION DEL MAPA

              axios
                .post(route("contenedores.datos_contenedor_mapa"), {
                  id: self.contenedor,
                  tipo: self.tipo,
                })
                .then((response) => {
                  console.log("detalleMapa", response.data[0]);
                  let txtMarcador = "";
                  if (self.tipo == "genset") {
                    txtMarcador =
                      "<b>Generador: " +
                      response.data[0].nombre_contenedor +
                      "</b> <br> " +
                      "SetPoint: " +
                      response.data[0].set_point +
                      " <br> " +
                      "BatteryVoltage: " +
                      response.data[0].battery_voltage +
                      " <br> " +
                      "RunningFrequency: " +
                      response.data[0].running_frequency +
                      " <br> " +
                      "FuelLevel: " +
                      response.data[0].fuel_level +
                      " <br> " +
                      "VoltageMeasure: " +
                      response.data[0].voltage_measure +
                      " <br> " +
                      "Rpm: " +
                      response.data[0].rpm +
                      " <br> " +
                      "TempSupply: " +
                      response.data[0].temp_supply_1 +
                      " <br> " +
                      "ReturnAir: " +
                      response.data[0].return_air +
                      " <br> ";
                  }
                  if (self.tipo == "reefer") {
                    txtMarcador =
                      "<b>Refeer: " +
                      response.data[0].nombre_contenedor +
                      "</b> <br> " +
                      "SetPoint: " +
                      response.data[0].set_point +
                      " <br> " +
                      "Co2: " +
                      response.data[0].co2_reading +
                      " <br> " +
                      "RelativeHumidity: " +
                      response.data[0].relative_humidity +
                      " <br> " +
                      "Avl: " +
                      response.data[0].avl +
                      " <br> " +
                      "TempSupply: " +
                      response.data[0].temp_supply_1 +
                      " <br> " +
                      "ReturnAir: " +
                      response.data[0].return_air_temp +
                      " <br> ";
                  }
                  if (self.tipo == "madurador") {
                    txtMarcador =
                      "<b>Madurador: " +
                      response.data[0].nombre_contenedor +
                      "</b> <br> " +
                      "SetPoint: " +
                      response.data[0].set_point +
                      " <br> " +
                      "Co2: " +
                      response.data[0].co2_reading +
                      " <br> " +
                      "RelativeHumidity: " +
                      response.data[0].relative_humidity +
                      " <br> " +
                      "Ethylene: " +
                      response.data[0].ethylene +
                      " <br> " +
                      "Avl: " +
                      response.data[0].avl +
                      " <br> ";
                  }

                  self.polylinePoints.map((element) => {
                    L.marker([element.lat, element.lng]).addTo(map);
                  });
                  // agregamos el marcador
                  L.marker([
                    self.polylinePoints[0].lat,
                    self.polylinePoints[0].lng,
                  ])
                    .addTo(map)
                    .bindPopup(txtMarcador)
                    .openPopup();

                  // usamos polylinePoints para trazar la ruta
                  L.polyline(self.polylinePoints).addTo(map);
                })
                .then((response) => {
                  $(".loading").css("display", "none"); // ocultar el loading
                });
            });
        });
      }
    },
  },
};
</script>
<style scoped>
/* CSS DEL LOADING */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: "";
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: radial-gradient(rgba(20, 20, 20, 0.8), rgba(0, 0, 0, 0.8));

  background: -webkit-radial-gradient(
    rgba(20, 20, 20, 0.8),
    rgba(0, 0, 0, 0.8)
  );
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: "";
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 150ms infinite linear;
  -moz-animation: spinner 150ms infinite linear;
  -ms-animation: spinner 150ms infinite linear;
  -o-animation: spinner 150ms infinite linear;
  animation: spinner 150ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0,
    rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0,
    rgba(255, 255, 255, 0.75) 0 1.5em 0 0,
    rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0,
    rgba(255, 255, 255, 0.75) -1.5em 0 0 0,
    rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0,
    rgba(255, 255, 255, 0.75) 0 -1.5em 0 0,
    rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0,
    rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0,
    rgba(255, 255, 255, 0.75) 0 1.5em 0 0,
    rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0,
    rgba(255, 255, 255, 0.75) -1.5em 0 0 0,
    rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0,
    rgba(255, 255, 255, 0.75) 0 -1.5em 0 0,
    rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>