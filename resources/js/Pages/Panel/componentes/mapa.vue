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
export default {
  components: {},
  props: {
    punto: Array,
  },
  data() {
    return {
      mapa: null,
      ubicacion: new google.maps.LatLng(-12.98, -78.12),
    };
  },
  watch: {
    punto(valor) {
      if (valor) {
        this.ubicacion = new google.maps.LatLng(valor[0], valor[1]);
        this.initMap();
      }
    },
  },
  mounted() {
    this.initMap();
  },
  methods: {
    iniciarMap() {
      let self = this;
      this.$nextTick(() => {
        self.mapa = new google.maps.Map(document.getElementById("map"), {
          center: self.ubicacion,
          zoom: 15,
        });

        let marcador = new google.maps.Marker({
          position: self.ubicacion,
          map: self.mapa,
        });
        marcador.setPosition(self.ubicacion);
      });
    },
    initMap() {
        let self = this;
        // creamos mapa 
        self.mapa = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: self.ubicacion,
        });
        // creamos marcador y lo posicionamos en ubicacion
        let marcador = new google.maps.Marker({
            position: self.ubicacion,
            map: self.mapa,
        });
        marcador.setPosition(self.ubicacion);

        // creamos objeto conf de DirectionsService
        let objConfDirectionsRenderer = {
            map: self.mapa,
            suppressMarkers: true,
        };

        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer(objConfDirectionsRenderer);

        self.calculateAndDisplayRoute(directionsService, directionsRenderer);
    },
    calculateAndDisplayRoute(directionsService, directionsRenderer) {
        let self = this;	    
        // los waypts son los puntos medios con los cuales se traza la ruta entre los dos puntos
        let waypts = [
            {
            location: new google.maps.LatLng(
                -12.070100623078728,
                -75.21495848894119
            ),
            stopover: true,
            },
            {
            location: new google.maps.LatLng(
                -12.071475025471134,
                -75.21365493535995
            ),
            },
            {
            location: new google.maps.LatLng(
                -12.067752581966475,
                -75.2076481282711
            ),
            stopover: true,
            },
            {
            location: new google.maps.LatLng(
                -12.069696169742405,
                -75.20637944340706
            ),
            },
            {
            location: new google.maps.LatLng(
                -12.067692254453785,
                -75.20296767354012
            ),
            },
            {
            location: new google.maps.LatLng(
                -12.062834533488468,
                -75.20554259419441
            ),
            },
            {
            location: new google.maps.LatLng(
                -12.06155608806243,
                -75.20387828350067
            ),
            },
            {
            location: new google.maps.LatLng(
                -12.058691761493174,
                -75.20386755466461
            ),
            },
        ];
       
      // seteabdi kis waypts  y renderisando en el mapa 
      directionsService
        .route({
          origin: { lat: -12.078405682575637, lng: -75.2301424741745 },
          destination: { lat: -12.056876622960312, lng: -75.2032881975174 },
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: google.maps.TravelMode.WALKING,
        })
        .then((response) => {
          directionsRenderer.setDirections(response);
        })
        .catch((e) =>
          console.log("Directions request failed due to " + status)
        );
    },
  },
};
</script>