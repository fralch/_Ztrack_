<template>
  <div style="height: 100% !important">
    <div class="container-fluid">
        <nav class="col-12 navbar navbar-expand-lg navbar-light bg-light" style="height:40px ; background-color: #0E5976 !important; box-shadow: 0px 0px 13px 2px rgba(0,0,0,0.15) !important;">
          <img :src="'/images/logos/copos-de-nieve.png'" alt="Logo" width="20px" /> 
          <!-- <img src="http://162.248.55.24/resources/images/zgroup_logo.png" alt="Logo" width="30px" />  -->
          &nbsp;
          <a class="navbar-brand" href="/board" style="font-family: Poppins-Regular; text-transform: uppercase;color: white;">Zgroup</a>
          <button id="opcionesnav" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <button id="logoutnav" style="display:none; color: white; " class="navbar-toggler" type="button" @click="cerrarSesion()" >
            <span class="bi bi-x"></span>
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
            <form class="form-inline my-2 my-lg-0" id="fromnav">
             <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <a  class="nav-link dropdown-toggle" 
                    href="#" 
                    id="navbarDropdown" 
                    role="button" 
                    data-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="false" 
                    style="color:white !important;" >
                  {{usuario}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style='margin-left: -80px;'>
                  <a class="dropdown-item" href="javascript:void(0)">Mi Perfil</a>
                  <a class="dropdown-item" href="#" @click="cerrarSesion()">Cerrar Sesión</a>
                </div>
              </li>
              <li class="nav-item dropdown" v-if="admin == true"> 
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white !important;" >
                  <i class="bi bi-gear-fill"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style='margin-left: -80px;'>
                  <!-- <a class="dropdown-item" href="javascript:void(0)">EMPRESAS</a> -->
                  <Link  class="dropdown-item" href="setting">Setting</Link>
                  <!-- <a class="dropdown-item" href="javascript:void(0)">USUARIOS</a> -->
                </div>
              </li>
              
            </ul>
            </form>
          </div>
        </nav>
      
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
        usuario: 'nologeado',
        admin: false,
    };
  },
  mounted() {
    this.usuarios(); 
  },
  methods: {
    usuarios(){
      // console.log(sessionStorage());
    },
    cerrarSesion(){
      Swal.fire({
        title: 'Cerrar sesion?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!'
      }).then((result) => {
        if (result.isConfirmed) {
          axios.post(route('cerrar.sesion')).then(response => {
            // this.$inertia.get(route('/'));
            location.reload();
          });
        }
      })
      
    },
  },
  
};
</script>
<style scoped>
  .slot-content {
    height: calc(100% - 40px);
  }
  .container-fluid{
        width: 100% !important;
        margin: 0px !important;
        padding: 0px !important;
  }
  @media screen and (max-width: 450px) {
    nav{
     width: 100% !important;
     height: 60px !important;
    }
    nav #opcionesnav{
       display: none !important;
    }
    
    nav #logoutnav{
       display: block !important;
    }
  }

</style>

