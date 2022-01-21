<template>
  <div style="height: 100% !important">
    <div class="container mw-100">
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin:0; width: 100% !important; " >
      <a class="navbar-brand" href="javascript:void(0)">Ztrack</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="javascript:void(0)">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">Mis contenedores</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="javascript:void(0)">Ayuda</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
          <a class="nav-link" href="javascript:void(0)" disabled style="color:grey"> Frank Cairampoma </a>
          <a href="javascript:void(0)"><span style="color: white"><i class="bi bi-gear"></i></span></a>
          <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
        </form>
      </div>
    </nav>
     
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue';
export default {
  
  components: {
    Link,
    // mdlClaveRegistro,    
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
    document.body.style.backgroundPosition = "center center";
    document.body.style.backgroundRepeat = "repeat-yt";
    document.body.style.backgroundAttachment = "fixed";
    document.body.style.backgroundSize = "cover";
    document.body.style.fontFamily = "Roboto, sans-serif";
  },
  methods: {
    
  },
};
</script>

<style lang="css">
a{
  text-decoration: none;
  color: #fff;
}
a:link,
a:visited,
a:active {
  text-decoration: none;
}
a:hover {
  color: white;
}
.container {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
}

</style>