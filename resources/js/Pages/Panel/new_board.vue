<template>
  <layoutprincipal ref="layoutprincipal">
    <!-- *** cargando layoutprincipal  **** -->
    <div class="slot_body slot_board" slot="component-view">
      <div class="content" style="display: block" id="cuerpo">
        <!-- ---------------------- -->
        <div class="content">
          <div class="row" style="margin: 0 0 0 0px">
            <div id="lado_izquierdo" style="margin: 10px 0 0 -5px">
              <ladoIzquierdo ref="ladoIzquierdo" 
                :contenedor_id="contenedor_selecionado_id"
                :tipo="tipo"
                :admin_madurador="usuario_admin_mad">
              </ladoIzquierdo>
            </div>
            <div id="lado_derecho" style="">
              <div
                id="total_reefers"
               
                style="margin: 10px 15px 10px 15px"
              >
                <div>Total Reefers: {{ contenedores_todos_length }}</div>
                <div id="botones_principal_mobil" style=" display: none;">
                  <button
                    type="button"
                    id="select_gen"
                    class="btn btn-primary"
                    @click="tipo = 'genset'"
                    :disabled="contenedores_encendidos_gen.length == 0"
                  >
                    <b >{{
                      contenedores_encendidos_gen.length
                    }}</b>
                  </button>
                  <button
                    type="button"
                    id="select_reef"
                    class="btn btn-success"
                    @click="tipo = 'reefer'"
                    :disabled="contenedores_encendidos_reefer.length == 0"
                  >
                    <b >{{
                      contenedores_encendidos_reefer.length
                    }}</b>
                  
                  </button>
                  <button
                    type="button"
                    id="select_mad"
                    class="btn btn-danger"
                    @click="tipo = 'madurador'"
                    :disabled="contenedores_encendidos_mad.length == 0"
                  >
                    <b >{{
                      contenedores_encendidos_mad.length
                    }}</b>
                  </button>
                  <button type="button" class="btn btn-dark">
                    <b  >0</b>
                  </button>
                </div>
                <div id="botones_principal" class="row" style="margin: 0 10px">
                  <button
                    type="button"
                    id="select_gen"
                    class="col-3 btn btn-primary"
                    @click="tipo = 'genset'"
                    :disabled="contenedores_encendidos_gen.length == 0"
                  >
                    <i id="mobil" class="bi bi-power"></i>
                    <b id="mobil" style="font-size: 1.2em">{{
                      contenedores_encendidos_gen.length
                    }}</b>
                    &nbsp; Gen Running
                  </button>
                  <button
                    type="button"
                    id="select_reef"
                    class="col-3 btn btn-success"
                    @click="tipo = 'reefer'"
                    :disabled="contenedores_encendidos_reefer.length == 0"
                  >
                    <i id="mobil" class="bi bi-power"></i>
                    <b id="mobil" style="font-size: 1.2em">{{
                      contenedores_encendidos_reefer.length
                    }}</b>
                    &nbsp; Reefers Running
                  </button>
                  <button
                    type="button"
                    id="select_mad"
                    class="col-3 btn btn-danger"
                    @click="tipo = 'madurador'"
                    :disabled="contenedores_encendidos_mad.length == 0"
                  >
                    <i id="mobil" class="bi bi-power"></i>
                    <b id="mobil" style="font-size: 1.2em">{{
                      contenedores_encendidos_mad.length
                    }}</b>
                    &nbsp; Madurador
                  </button>
                  <button type="button" class="col-3 btn btn-dark">
                    <i id="mobil" class="bi bi-power"></i>
                    <b id="mobil"  style="font-size: 1.2em">0</b>
                    &nbsp; Shutdown
                  </button>
                </div>
              </div>
              <!-- ********** CANVAS MAPA **********-->
              <canvasMapa ref="canvasMapa" 
                :punto="ubicacion_final"
                :contenedor="contenedor_selecionado_id"
                :tipo="tipo"
                :makers="makers"
                >
              </canvasMapa>
              <!-- ********* TABLA RESUMEN CONTENEDORES  *********-->
              <tablaResumenGen
                ref="tablaResumenGen"
                :tipo="tipo"
                :empresa = "empresa_logeado"
                @select_contenedor="obteniendo_contendor"
              >
              </tablaResumenGen>
              <tablaResumenReef
                ref="tablaResumenReef"
                :tipo="tipo"
                :empresa = "empresa_logeado"
                @select_contenedor="obteniendo_contendor"
              >
              </tablaResumenReef>
              <tablaResumenMadurador
                ref="tablaResumenMadurador"
                :tipo="tipo"
                :empresa = "empresa_logeado"
                @select_contenedor="obteniendo_contendor"
                @retornar_points="obteniendo_points"
                @retornar_estado ="obteniendo_estado"
              >
              </tablaResumenMadurador>
              <!-- *********** TABLA DETALLE CONTENEDORES *********** -->
              <tablaDetalleGenset
                ref="tablaDetalleGenset"
                :contenedor="contenedor_selecionado_id"
                :tipo="tipo"
                @set_ubicacion_g="set_ubicacion_g"
              >
              </tablaDetalleGenset>
              <tablaDetalleReefer
                ref="tablaDetalleReefer"
                :contenedor="contenedor_selecionado_id"
                :tipo="tipo"
                @set_ubicacion_r="set_ubicacion_r"
              >
              </tablaDetalleReefer>
              <tablaDetalleMadurador
                ref="tablaDetalleMadurador"
                :contenedor="contenedor_selecionado_id"
                :tipo="tipo"
                @set_ubicacion_m="set_ubicacion_m"
              >
              </tablaDetalleMadurador>

              <!-- *********** GRAFICOS PRINCIPAL *********** -->
              <!-- <div>
                <button
                  class="btn btn-secondary btn-sm"
                  type="button"
                  @click="imprimir()"
                >
                  Imprimir
                </button>
              </div> -->
              <graficosPrincial
                ref="tablaDetalleReefer"
                :contenedor="contenedor_selecionado_id"
                :tipo="tipo"
              >
              </graficosPrincial>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layoutprincipal>
</template>

<script>
import axios from "axios";
import layoutprincipal from "../layout.vue";
import canvasMapa from "./componentes/mapa.vue";

import tablaResumenGen from "./componentes/tabla_resumen_genset.vue";
import tablaResumenReef from "./componentes/tabla_resumen_reefer.vue";
import tablaResumenMadurador from "./componentes/tabla_resumen_madurador.vue";

import tablaDetalleGenset from "./componentes/tabla_detalle_genset.vue";
import tablaDetalleReefer from "./componentes/tabla_detalle_reefer.vue";
import tablaDetalleMadurador from "./componentes/tabla_detalle_madurador.vue";

import graficosPrincial from "./componentes/grafico_principal.vue";
import ladoIzquierdo from "./componentes/izquierda.vue";
export default {
  components: {
    layoutprincipal,
    canvasMapa,
    tablaResumenGen,
    tablaResumenReef,
    tablaResumenMadurador,
    tablaDetalleGenset,
    tablaDetalleReefer,
    tablaDetalleMadurador,
    graficosPrincial, 
    ladoIzquierdo, 
  },
  props: {
    // tu_cuenta:Array,
    usuario_logeado: Array,
    empresa_logeado: Array,
    contenedores_todos_length: Number,
    contenedores_encendidos_reefer: Array,
    contenedores_encendidos_gen: Array,
    contenedores_encendidos_mad: Array,
  },
  data() {
    return {
      makers: [],
      // submited: false,
      contenedor_selected: null,
      contenedor_selecionado_id: null,
      tipo: "",
      get_ubicacion_g: null,
      get_ubicacion_r: null,
      get_ubicacion_m: null,
      ubicacion_final: null,
      usuario_admin_mad: this.usuario_logeado[0].admin_madurador == 1 ? true : false,

      puntos: null, 
      estado_mad: null, 
    };
  },
  watch: {
    get_ubicacion_g(valor) {
      this.ubicacion_final = valor;
    },
    get_ubicacion_r(valor) {
      this.ubicacion_final = valor;
    },
    get_ubicacion_m(valor) {
      this.ubicacion_final = valor;
    },
    tipo(valor){
      if (valor=="genset") {
        this.makers=this.$refs.tablaResumenGen.contenedores_encendidos_gen
      }else if(valor=="reefer"){
        this.makers=this.$refs.tablaResumenReef.contenedores_encendidos_reefer
      }else if(valor=="madurador"){
        this.makers=this.$refs.tablaResumenMadurador.contenedores_encendidos_madurador
      }
    },
    puntos(valor){
      this.$refs.ladoIzquierdo.points = valor; 
    },
    estado_mad(valor){
      this.$refs.ladoIzquierdo.estado_madurador = valor; 
    }
  },
  mounted() {
    this.usuarioLogeado();
    this.bienvenida();
  },

  methods: {    
    
    bienvenida() {
      let self = this;
      Swal.fire({
        title: "Bienvenido!",
        icon: "success",
        text: (
          this.usuario_logeado[0].nombres +
          " " +
          this.usuario_logeado[0].apellidos
        ).toUpperCase(),
        confirmButtonColor: "#3085d6",
        confirmButtonText: "OK!",
        allowOutsideClick: false,
      }).then((result) => {
        if (result.isConfirmed) {
          let clicke = document.getElementById("select_gen");
          clicke.click();
        }
      }).then(() => {
        // self.makers=self.$refs.tablaResumenGen.contenedores_encendidos_gen
        // console.log(self.makers); 
      });

    },

    usuarioLogeado() {
      /* AQUI ES DONDE SE PONE EL NOMBRE DEL USUARIO EN EL NAV  */
      this.$refs.layoutprincipal.usuario =
        this.usuario_logeado[0].nombres.toUpperCase();
      this.$refs.layoutprincipal.admin = this.usuario_logeado[0].admin;
    },

    obteniendo_contendor(contenedor) {
      this.contenedor_selected = contenedor;
      this.contenedor_selecionado_id = contenedor.id;
      this.$refs.canvasMapa.contenedor = contenedor.id;
    },
    set_ubicacion_g(ubicacion) {
      this.get_ubicacion_g = ubicacion;
    },
    set_ubicacion_r(u) {
      this.get_ubicacion_r = u;
    },
    set_ubicacion_m(um) {
      this.get_ubicacion_m = um;
    },
    obteniendo_points(puntos) {
      this.puntos = puntos;
    },
    obteniendo_estado(estado_mad) {
      this.estado_mad = estado_mad;
    },
  },
};
</script>

<style lang="css">
.selected {
  background-color: #a2aec7 !important;
  color: black;
}

#lado_derecho {
  width: 75%;
}
#lado_izquierdo {
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
  #lado_derecho {
    width: 80%;
  }
  #lado_izquierdo {
    width: 20%;
  }
}
</style>
<style>
 
.dt-buttons button  {
  min-width: 100px  !important;
  height: 30px  !important;
  color: #fff  !important;
  padding: 2px 10px  !important;
  font-weight: bold  !important;
  cursor: pointer  !important;
  transition: all 0.3s ease  !important;
  position: relative  !important;
  display: inline-block  !important;
  outline: none  !important;
  border-radius: 5px  !important;
  z-index: 0 !important;
  background: #fff !important;
  overflow: hidden;
  border: 2px solid #777c83  !important;
  color: #777c83 !important;
}
.dt-buttons button :hover {
  color: #fff;
}
.dt-buttons button :hover:after {
  width: 100%;
}
.dt-buttons button :after {
  content: "";
  position: absolute;
  z-index: -1;
  transition: all 0.3s ease;
  left: 0;
  top: 0;
  width: 0;
  height: 100%;
  background: #777c83;
}

/* -------------------------- */
#buscar_detalle {
  min-width: 190px;
  height: 30px;
  color: #fff;
  padding: 2px 10px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
  outline: none;
  border-radius: 5px;
  border: none;
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5), 7px 7px 20px 0px rgba(0,0,0,.1), 4px 4px 5px 0px rgba(0,0,0,.1);
  background: #17A2B8;
 z-index: 1;
}
#buscar_detalle:hover:after {
  width: 100%;
  left: 0;
}
#buscar_detalle:after {
  border-radius: 5px;
  position: absolute;
  content: "";
  width: 0;
  height: 100%;
  top: 0;
  z-index: -1;
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5), 7px 7px 20px 0px rgba(0,0,0,.1), 4px 4px 5px 0px rgba(0,0,0,.1);
  transition: all 0.3s ease;
  background-color: #096574;
  right: 0;
}
.css-button-shadow-border-sliding--blue:active {
  top: 2px;
}
.escoger_columnas span{
  cursor: pointer;
}
.escoger_columnas span:hover {
  text-decoration: underline;
}
 
@media screen and (max-width: 450px) {
  .container-fluid{
        padding: 0;
        margin: 0;
      }

  #lado_izquierdo {
   display: none;
  }  
  #lado_derecho {
   
    width: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
  }  
  #total_reefers {
    width: 100% !important;
    margin: 10px  0 !important;
  }
  #botones_principal {
    display: none !important;
     margin: 0 !important;
  }
  #botones_principal_mobil{
    width: 100% !important;
    display: block !important;
     margin: 0 !important;
  
  }
  #botones_principal_mobil button{
    width: 24% !important;  
    margin: 0 !important;
  }
  
}
</style>


