<template>
  <layoutprincipal ref="layoutprincipal">  <!-- *** cargando layoutprincipal  **** -->
    <div
      class="slot_body slot_board"
      slot="component-view"
    >
      <div class="content" style="display: block" id="cuerpo">
        <!-- ---------------------- -->
        <div class="content" >
            <div class="row" style=" margin: 0 0 0 0px;">
              <div id='lado_izquierdo' style="margin: 10px 0 0 -5px;">
              
              </div>
              <div id='lado_derecho' style="">
                  <div id="total_reefers" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: 10px 15px 0px 15px;">
                    <div>Total Reefers: {{contenedores_todos_length}}</div>
                    <div class="row" style="margin: 0 10px;">
                      <button type="button" id="select_gen" class="col-3 btn btn-primary" @click="contenedores_prendidos('Generador')" >
                        <i class="bi bi-power"></i> 
                        <b style="font-size:1.2em;">{{contenedores_encendidos_gen_length}}</b>
                        &nbsp;
                        Gen Running 
                      </button>
                      <button type="button" id="select_reef" class="col-3 btn btn-success"  @click="contenedores_prendidos('Reefer')">
                        <i class="bi bi-power"></i> 
                        <b style="font-size:1.2em;">{{contenedores_encendidos_reefer_length}}</b>
                        &nbsp;
                        Reefers Running 
                      </button>
                      <button type="button" class="col-3 btn btn-danger" >
                        <i class="bi bi-power"></i> 
                        <b style="font-size:1.2em;">0</b>
                        &nbsp;
                        Madurador
                      </button>
                      <button type="button" class="col-3 btn btn-dark" >
                        <i class="bi bi-power"></i> 
                        <b style="font-size:1.2em;">0</b>
                        &nbsp;
                        Shutdown
                      </button>
                    </div>
                  </div>      
                  <!-- ********** CANVAS MAPA **********-->
                    <canvasMapa ref="canvasMapa" :id_contenedor="1" :probando="'texto prueba'" >
			              </canvasMapa>
                  <!-- ********* TABLA RESUMEN CONTENEDORES  *********-->
                                

                  <!-- *********** TABLA DETALLE CONTENEDORES *********** -->
                              
                  <!-- *********** GRAFICOS PRINCIPAL *********** -->
                
              </div>
            </div>
          </div>
        </div>      
    </div>    
  </layoutprincipal>
</template>

<script>
import axios from 'axios';
import canvasMapa from "./mapa.vue";
import layoutprincipal from "../layout.vue";
export default {
  components: { 
    canvasMapa, 
    layoutprincipal,
  },
  props: {
    // tu_cuenta:Array,
    usuario_logeado: Array,
    empresa_logeado: Array,
    contenedores_todos_length : Number,
    contenedores_encendidos_reefer_length : Number,   
    contenedores_encendidos_gen_length : Number,   
  },
  data() {
    return {
      // submited: false, 
      contenedor_selecionado: null, 
      tipo: "",
    };
  },
  watch: {

  },
  mounted() {
    this.usuarioLogeado();
    this.bienvenida();
    this.cargarMapa(); 
  },

  methods: {
    cargarMapa(){

      let mapa = this.$refs.canvasMapa;
      console.log(mapa.probando);
    },
    autoRefresh(){
      // let self = this;
      // this.$nextTick(() => {
      //    async function f() {
      //     let promise = new Promise((resolve, reject) => {
      //       setTimeout(() => resolve(true), 600000)
      //     });
      //     let result = await promise; 
      //      if(self.tipo == 'Reefer'){
      //       let contenedor = self.contenedores_seleccionados.filter(element => element.tipo == 'Reefer');
      //       console.log(contenedor[0])
      //       self.select_contenedor(contenedor[0]); 
      //     }else if(self.tipo == 'Generador'){
      //       let contenedor = self.contenedores_seleccionados.filter(element => element.tipo == 'Generador');
      //       self.select_contenedor(contenedor[0]); 
      //       console.log(contenedor[0])
      //     }
      //   }
      //   f();
      // });
    },
    bienvenida() {
     Swal.fire({
        title: 'Bienvenido!',
        icon: 'success',
        text: (this.usuario_logeado[0].nombres + " "+ this.usuario_logeado[0].apellidos ).toUpperCase(),
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK!'
      })
    },
  
    usuarioLogeado(){
      /* AQUI ES DONDE SE PONE EL NOMBRE DEL USUARIO EN EL NAV  */
      this.$refs.layoutprincipal.usuario = (this.usuario_logeado[0].nombres ).toUpperCase() ;
     this.$refs.layoutprincipal.admin = this.usuario_logeado[0].admin; 
    },
 
  },  
};
</script>

<style lang="css">
.selected {
  background-color: #A2AEC7 !important;
  color: black;
  }

 #lado_derecho{
    width: 75%;
  }
  #lado_izquierdo{
    width: 25%;
  }
#asset-search {
  padding: 10px;
  height: 320px;
  overflow-y: scroll;
}
/* #tblContenedor_reefers{
  width: 100%;
  overflow-y: scroll;
} */
#total_reefers {
  padding: 10px;
  height: 100px;
}
#asset_maps {
  padding: 10px;
  height: 400px;
  /* overflow-y: scroll; */
}


@media (max-width: 1024px) {
  #lado_derecho{
    width: 80%;
  }
  #lado_izquierdo{
    width: 20%;
  }
}
</style>


