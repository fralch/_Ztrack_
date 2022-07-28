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
            center: [-12.058691761493174,  -75.20386755466461],
            zoom: valor.length > 0 ? 8 : 0,
          });
          L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "FrankCairampoma",
          }).addTo(map);
          // hacer foreach de los makers
          valor.forEach((marker) => {
            L.marker([marker.latitud, marker.longitud]).addTo(map).bindPopup(marker.nombre_contenedor, {closeOnClick: false, autoClose: false}).openPopup();
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
                console.log("detalleMapa",response.data[0]); 
                let txtMarcador ="";
                if (self.tipo == 'genset') {
                  txtMarcador = "<b>Generador: " + response.data[0].nombre_contenedor + "</b> <br> " + 
                                "SetPoint: " + response.data[0].set_point + " <br> " +
                                "BatteryVoltage: " + response.data[0].battery_voltage + " <br> " +
                                "RunningFrequency: " + response.data[0].running_frequency + " <br> " +
                                "FuelLevel: " + response.data[0].fuel_level + " <br> " +
                                "VoltageMeasure: " + response.data[0].voltage_measure + " <br> " +
                                "Rpm: " + response.data[0].rpm + " <br> " +
                                "TempSupply: " + response.data[0].temp_supply_1 + " <br> " +
                                "ReturnAir: " + response.data[0].return_air + " <br> " 
                };
                if (self.tipo == "reefer") {
                   txtMarcador =  "<b>Refeer: " + response.data[0].nombre_contenedor + "</b> <br> " +
                                  "SetPoint: " + response.data[0].set_point + " <br> " +
                                  "Co2: " + response.data[0].co2_reading + " <br> " +
                                  "RelativeHumidity: " + response.data[0].relative_humidity + " <br> " +
                                  "Avl: " + response.data[0].avl + " <br> " +
                                  "TempSupply: " + response.data[0].temp_supply_1 + " <br> " +
                                  "ReturnAir: " + response.data[0].return_air_temp + " <br> " 
                }; 
                if (self.tipo == "madurador") {
                   txtMarcador =  "<b>Madurador: " + response.data[0].nombre_contenedor + "</b> <br> " +
                                  "SetPoint: " + response.data[0].set_point + " <br> " +
                                  "Co2: " + response.data[0].co2_reading + " <br> " +
                                  "RelativeHumidity: " + response.data[0].relative_humidity + " <br> " +
                                  "Ethylene: " + response.data[0].ethylene + " <br> " +
                                  "Avl: " + response.data[0].avl + " <br> " 
                }; 

                 // agregamos el marcador
                L.marker([self.polylinePoints[0].lat, self.polylinePoints[0].lng])
                  .addTo(map)
                  .bindPopup(txtMarcador)
                  .openPopup();

                // usamos polylinePoints para trazar la ruta
                L.polyline(self.polylinePoints).addTo(map);
              })

            }); 
        });
      }
    },
   
  },
};
</script>