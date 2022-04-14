<template>
	 <div id="asset_maps" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px;">
        <div id="map" style="width:100%; height:365px;"></div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
	components: {  },
	props: { 
         tipo: String,
         array_contenedor: Object,
    },
	data() {
		return {
            mapa: null,
            ubicacion: new google.maps.LatLng(-12.98, -78.12), 
          
		};
	},
	watch: {
        array_contenedor(){
            this.fijarUbicacion(); 
        },
	},
    mounted() {
    this.iniciarMap(); 
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
                marcador.setPosition( self.ubicacion);
                
            });
        },
        fijarUbicacion() {
            let self = this;
            console.log(self.tipo);
            console.log(self.array_contenedor);
            return 0; 
            if (self.tipo == "reefer") {
            let mayor_id = self.array_contenedor.map(function(e) { return e.id; }).sort().reverse()[0];
            axios
                .post(route('contenedores.get_lat_log'), {id: mayor_id,tipo:self.tipo})
                .then(response => {
                console.log(response.data.latitud, '---',response.data.longitud);
                    self.ubicacion =  new google.maps.LatLng(response.data.latitud, response.data.longitud);
                }).then(()=>{
                    self.iniciarMap();
                });  
            }
            if (self.tipo == "genset") {
                let mayor_id = self.array_contenedor.map(function(e) { return e.id; }).sort().reverse()[0];
                axios
                .post(route('contenedores.get_lat_log'), {id: mayor_id,tipo:self.tipo})
                .then(response => {
                    console.log(response.data.latitud, '---',response.data.longitud);
                    self.ubicacion =  new google.maps.LatLng(response.data.latitud, response.data.longitud);
                }).then(()=>{
                    self.iniciarMap();
                });           
            }
        },
	},
};

</script>