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
         id_contenedor: Number,
    },
	data() {
		return {
            mapa: null,
            ubicacion: new google.maps.LatLng(-11.98, -77.12), 
          
		};
	},
	watch: {
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
            if (contenedor.tipo == "Reefer") {
                let mayor_id = self.datos_tabla_reefer.map(function(e) { return e.id; }).sort().reverse()[0];
            axios
                .post(route('contenedores.get_lat_log'), {id: mayor_id,tipo: contenedor.tipo})
                .then(response => {
                console.log(response.data.latitud, '---',response.data.longitud);
                    self.ubicacion =  new google.maps.LatLng(response.data.latitud, response.data.longitud);
                }).then(()=>{
                    self.iniciarMap();
                });  
            }
            if (contenedor.tipo == "Generador") {
                let mayor_id = self.datos_tabla_generador.map(function(e) { return e.id; }).sort().reverse()[0];
                axios
                .post(route('contenedores.get_lat_log'), {id: mayor_id,tipo: contenedor.tipo})
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