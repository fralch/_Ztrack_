<template>
  <layoutprincipal ref="layoutprincipal">
    <!-- *** cargando layoutprincipal  **** -->
    <div class="slot_body slot_board" slot="component-view">
      <div class="content" style="display: block" id="cuerpo">
        <!-- ---------------------- -->
        <div class="content">
          <div class="row" style="margin: 0 0 0 0px">
            <div id="lado_izquierdo" style="margin: 10px 0 0 -5px"></div>
            <div id="lado_derecho" style="">
              <div
                id="total_reefers"
                class="col shadow-sm p-3 mb-5 bg-white rounded"
                style="margin: 10px 15px 0px 15px"
              >
                <div>Total Reefers: {{ contenedores_todos_length }}</div>
                <div class="row" style="margin: 0 10px">
                  <button
                    type="button"
                    id="select_gen"
                    class="col-3 btn btn-primary"
                    @click="tipo = 'genset'"
                  >
                    <i class="bi bi-power"></i>
                    <b style="font-size: 1.2em">{{
                      contenedores_encendidos_gen
                    }}</b>
                    &nbsp; Gen Running
                  </button>
                  <button
                    type="button"
                    id="select_reef"
                    class="col-3 btn btn-success"
                    @click="tipo='reefer'"
                  >
                    <i class="bi bi-power"></i>
                    <b style="font-size: 1.2em">{{
                      contenedores_encendidos_reefer
                    }}</b>
                    &nbsp; Reefers Running
                  </button>
                  <button
                    type="button"
                    id="select_mad"
                    class="col-3 btn btn-danger"
                    @click="tipo = 'mad'"
                  >
                    <i class="bi bi-power"></i>
                    <b style="font-size: 1.2em">0</b>
                    &nbsp; Madurador
                  </button>
                  <button type="button" class="col-3 btn btn-dark">
                    <i class="bi bi-power"></i>
                    <b style="font-size: 1.2em">0</b>
                    &nbsp; Shutdown
                  </button>
                </div>
              </div>
              <!-- ********** CANVAS MAPA **********-->
              <canvasMapa ref="canvasMapa"  
              :tipo="tipo"
              :array_contenedor="contenedor_selected"
              > </canvasMapa>
              <!-- ********* TABLA RESUMEN CONTENEDORES  *********-->
                  <tablaResumenGen ref="tablaResumenGen" 
                    :tipo="tipo" 
                    @select_contenedor="obteniendo_contendor"
                    >
                  </tablaResumenGen>
                  <tablaResumenReef 
                    ref="tablaResumenReef" 
                    :tipo="tipo"
                    @select_contenedor="obteniendo_contendor"
                    >
                  </tablaResumenReef>
              <!-- *********** TABLA DETALLE CONTENEDORES *********** -->
              <tablaDetalleGenset
                ref="tablaDetalleGenset"
                :contenedor="contenedor_selecionado_id"
                :tipo="tipo"
              >
              </tablaDetalleGenset>
              <tablaDetalleReefer
                ref="tablaDetalleReefer"
                :contenedor="contenedor_selecionado_id"
                :tipo="tipo"
              >
              </tablaDetalleReefer>

              <!-- *********** GRAFICOS PRINCIPAL *********** -->
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
import tablaDetalleGenset from "./componentes/tabla_detalle_genset.vue";
import tablaDetalleReefer from "./componentes/tabla_detalle_reefer.vue";
export default {
  components: {
    layoutprincipal,
    canvasMapa,
    tablaResumenGen,
    tablaResumenReef,
    tablaDetalleGenset,
    tablaDetalleReefer,
  },
  props: {
    // tu_cuenta:Array,
    usuario_logeado: Array,
    empresa_logeado: Array,
    contenedores_todos_length: Number,
    contenedores_encendidos_reefer: Number,
    contenedores_encendidos_gen: Number,
  },
  data() {
    return {
      // submited: false,
      contenedor_selected: null, 
      contenedor_selecionado_id: null,
      tipo: "",
    };
  },
  watch: {
   
  },
  mounted() {
    this.usuarioLogeado();
    this.bienvenida();
    
  },

  methods: {
    bienvenida() {
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
        }).then((result) => {
          if (result.isConfirmed) {
            
          }
        });
    },

    usuarioLogeado() {
      /* AQUI ES DONDE SE PONE EL NOMBRE DEL USUARIO EN EL NAV  */
      this.$refs.layoutprincipal.usuario =
        this.usuario_logeado[0].nombres.toUpperCase();
      this.$refs.layoutprincipal.admin = this.usuario_logeado[0].admin;
    },

  
    obteniendo_contendor(contenedor) {
      // console.log(contenedor);
      this.contenedor_selected = contenedor;
      this.contenedor_selecionado_id = contenedor.id;  
    },
    cargarMapa() {},
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


