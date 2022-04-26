<template>
  <div
    id="asset_maps"
    class="col shadow-sm p-3 mb-5 bg-white rounded"
    style="margin: -30px 15px 10px 15px"
  >
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
    contenedor: Number,
    tipo: String,
  },
  data() {
    return {
      datos_tabla_generador: [],
      mapa: null,
      origen: {},
      waypoints: [],
      polylinePoints: [],
    };
  },
  watch: {
    punto(valor) {
     
      if (valor) {
        map.off();
        map.remove();
        this.polylinePoints = [];
        // this.iniciando_leflet(valor[0], valor[1]);
        this.iniciando_leflet();
      }
    },
  },
  mounted() {
    this.iniciando_leflet();
  },
  methods: {
    iniciando_leflet(lt = -12.058691761493174, ln = -75.20386755466461) {
      let self = this;

      if (!self.contenedor) {

        map = L.map("map", {
          center: [lt, ln],
          zoom: 13,
        });
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
          attribution: "FrankCairampoma",
        }).addTo(map);

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
                // agregamos el marcador
                L.marker([self.polylinePoints[0].lat, self.polylinePoints[0].lng])
                  .addTo(map)
                  .bindPopup("Ultima ubicacion<br> del contenedor.")
                  .openPopup();

                // usamos polylinePoints para trazar la ruta
                L.polyline(self.polylinePoints).addTo(map);
                // console.log(self.polylinePoints);
              //FIN DE LA CONFIGURACION DEL MAPA
            });
        });
      }
    },
   
  },
};
</script>