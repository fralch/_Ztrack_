<template>
  <div style="height: 100% !important">
    <div class="container-fluid">
      <div class="row">
        <nav class="col-12 navbar navbar-expand-lg navbar-light bg-light" style="height:40px !important; background-color: #232C4C !important; box-shadow: 0px 0px 13px 2px rgba(0,0,0,0.15) !important;">
          <img :src="'/images/logos/copos-de-nieve.png'" alt="Logo" width="20px" /> 
          <!-- <img src="http://162.248.55.24/resources/images/zgroup_logo.png" alt="Logo" width="30px" />  -->
          &nbsp;
          <a class="navbar-brand" href="#" style="font-family: Poppins-Regular; text-transform: uppercase;color: white;">Zgroup</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="">
              <!-- <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li> -->
            </ul>
            <form class="form-inline my-2 my-lg-0">
             <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white !important;" >
                  Ivineños
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Mi Perfil</a>
                  <a class="dropdown-item" href="#">Cerrar Sesión</a>
                </div>
              </li>
              
            </ul>
            </form>
          </div>
        </nav>
      
      </div>
      <div class="slot-content">
        <slot name="component-view"></slot>
      </div>
     
      
    </div>
  </div>
</template>


<script>
import { Link } from '@inertiajs/inertia-vue';

export default {
  
  components: {
    Link,

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

  },
  methods: {
   
  
  },
};
</script>

