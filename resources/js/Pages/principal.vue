<template>
  <div style="height: 100% !important">
    <div class="container-fluid">
      <div class="row">
        <nav class="col-12 navbar navbar-expand-custom navbar-mainbg" >
            <a class="navbar-brand navbar-logo" href="#">Ztrack</a>
            <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="width: 100% !important; margin:0px; ">
                <ul class="navbar-nav ml-auto">
                    <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                    <li class="nav-item active ">
                        <a class="nav-link " href="javascript:void(0);" id="nav_panel"><i class="fas fa-tachometer-alt"></i>Panel</a>
						            <!-- <Link :href="$route('paneles.board')">Panel</Link> -->
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);"><i class="far fa-clone"></i>Contenedores</a>
                    </li>
                    <li class="nav-item " >
                        <a class="nav-link" href="javascript:void(0);"><i class="far fa-calendar-alt"></i>Calendarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);"><i class="far fa-chart-bar"></i>Estadisticas</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);"><i class="far fa-copy"></i>Documents</a>
                    </li> -->
                    <li class="nav-item ">
                        <a class="nav-link" href="javascript:void(0);"><i class="far fa-address-book"></i>Mis Datos</a>
                    </li>
                </ul>
            </div>
        </nav> 
      </div>
      <!-- <div class="slot-content">
        <slot name="component-view"></slot>
      </div> -->
      <mdlBoard ref="mdlBoard"></mdlBoard>
    </div>
  </div>
</template>


<script>
import { Link } from '@inertiajs/inertia-vue';
import mdlBoard from "./Panel/mdlBoad";
export default {
  
  components: {
    Link,
    mdlBoard,    
  },
  props: { 
    //   agencias: Array 
  },
  data() {
    return { 
        // fecha_actual: null, 
    };
  },
  mounted() {
    this.irPanel();
  },
  methods: {
    irPanel(){
      $("#mdlBoard" ).css("display", "block");
    },
  },
};
</script>

