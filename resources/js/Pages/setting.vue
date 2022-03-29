<template >
  <layoutprincipal ref="layoutprincipal">  <!-- *** cargando layoutprincipal  **** -->
    <div
      class="slot_body slot_empresas "
      slot="component-view"
    >
      <div class="content " style="display: block" id="cuerpo" >
        <!-- ---------------------- -->
        <div class="content" >
          <div class="row" style=" margin: 0 0 0 0px;">
            <div id='lado_izquierdo' class="rounded border border-5">
                 <div class="card-body shadow p-3 mb-5 bg-white ">
                    <h5 class="card-title p-3 mb-2 bg-primary text-white" >USUARIOS</h5>
                      <div class="card bg-light mb-3 shadow-none p-3 mb-5 bg-light rounded">
                        <div class="card-body">
                          <div class="row align-items-start" >
                            <div class="col">
                                  <label>Nuevo Usuario</label>
                                  <input class="form-control mr-sm-2" type="usuario" placeholder="nombre de usuario" aria-label="Usuario" v-model="nuevo_usuario">
                            </div>
                            <div class="col">
                                  <label >Apellidos</label>
                                  <input class="form-control mr-sm-2" type="apellidos" placeholder="apellidos" aria-label="Apellidos" v-model="nuevo_apellidos">
                            </div>
                            <div class="col">
                                <label style="margin-right: 10px; ">Nombres</label>
                                <input class="form-control mr-sm-2" type="nombres" placeholder="nombres" aria-label="Nombres" v-model="nuevo_nombres">
                            </div>
                            <div class="col">
                                <label style="margin-right: 10px; ">Correo</label>
                                <input class="form-control mr-sm-2" type="correo" placeholder="correo" aria-label="Correo" v-model="nuevo_correo">
                            </div>
                            <div class="col">
                              <button type="button" style="margin-top:30px; " class="btn btn-primary" @click="guardarUsuario">
                                <i class="fas fa-save"></i>
                                Agregar usuario
                              </button>
                            </div>
                          </div>
                        </div>
                      </div> 
                    <table  id="tblUsuarios">
                         <thead>
                          <tr >
                            <th scope="col" width='50px'>N°</th>
                            <th scope="col" width='50px'>Ver</th>
                            <th scope="col" width='150px'>Usuario</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Nombres</th>
                            <th scope="col" width='50px'>Activo </th>  
                            <th scope="col">Administrador</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Ultimo_acceso</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(usuario, index) in usuario_todos" :key="index">
                            <td class="text-center">{{index+1}}</td>
                            <td class="text-center"><input type="radio" :value="usuario.id" v-model="radio_user"></td>
                            <td>{{(usuario.usuario).toUpperCase()}}</td>
                            <td>{{usuario.apellidos}}</td>
                            <td>{{usuario.nombres}}</td>
                            <td class="text-center">{{usuario.activo == 1 ? 'SI':'NO'}}</td>
                            <td class="text-center">{{usuario.admin == 1 ? 'SI': 'NO'}}</td>
                            <td>{{usuario.correo}}</td>
                            <td>{{usuario.ultimo_acceso}}</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
            </div>
            <div id='lado_derecho' >
              <div class="card-body shadow p-3 mb-5 bg-white rounded border border-1">
                    <h5 class="card-title p-3 mb-2 bg-primary text-white">EMPRESAS</h5>
                      <div class="card bg-light mb-3 ">
                        <div class="card-body">
                          <div class="row align-items-start" >
                            <div class="col">
                                 <label style="margin-right: 10px; ">Empresa</label>
                                <input class="form-control mr-sm-2"  placeholder="nombre de empresa" v-model="nueva_empresa">
                            </div>
                            <div class="col">
                                   <label style="margin-right: 10px; ">Booking</label>
                                  <textarea class="form-control mr-sm-2"  v-model="nuevo_booking"></textarea>
                            </div>
                            <div class="col">
                                <label style="margin-right: 10px; ">Booking_temp</label>
                                <input class="form-control mr-sm-2"  placeholder="Booking Temperature" v-model="nuevo_booking_temp">  
                            </div>
                            <div class="col">
                                <label style="margin-right: 10px; ">Usuario Asignado</label>
                                <select class="form-control mr-sm-2" v-model="nuevo_usuario_asignado">
                                  <option value='0' disabled>Seleccione un usuario</option>
                                  <option v-for="(usuario, index) in usuario_todos"  :key="index" :value="usuario.id">{{usuario.nombres}}</option>
                                </select>
                            </div>
                            <div class="col">
                                <button type="button" style="margin-top:30px; " class="btn btn-primary" @click="guardarEmpresa">
                                  <i class="fas fa-save"></i>
                                  Agregar empresa
                                </button>
                            </div>
                          </div>
                        </div>
                      </div> 
                      <table  id="tblEmpresas">
                            <thead >
                              <tr >
                                <th  width='20px' >N°</th>
                                <th width='50px' class="text-center">Ver</th>
                                <th  >Empresa</th>
                                <th >Booking</th>
                                <th >Booking_temp</th>
                                <th >Usuario_asigando</th>
                                <th >Asignar_empresa</th>                          
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(empresa, index) in tabla_datos_empresas" :key="index">
                                <td>{{index+1}}</td>
                                <td class="text-center"><input type="radio" :value="empresa.id" v-model="radio_empresa"></td>
                                <td>{{(empresa.nombre_empresa).toUpperCase()}}</td>
                                <td>{{empresa.descripcion_booking}}</td>
                                <td>{{empresa.temp_contratada}}</td>
                                <td>{{(empresa.usuario).toUpperCase()}}</td>
                                <td>
                                  <button type="button" class="col-3 btn btn-primary"  data-toggle="modal" data-target="#asignarModal" @click="asignar_id_empresa=empresa.id">
                                    <i class="bi bi-check-lg"></i>
                                  </button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                  </div>  
            </div>
          </div>
          
          </div>
        </div>
        <!-- ---------------------- -->
      
        <!-- Modal empresas -->
          <div class="modal fade" id="empresasModal" tabindex="-1" role="dialog" aria-labelledby="empresasoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Crear Empresa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-inline">
                      
                    </div>
                    <br>
                    <div class="form-inline">
                     
                    </div>
                    <br>
                    <div class="form-inline">
                      
                    </div>
                    <br>
                    <div class="form-inline">
                     
                    </div>
                </div>
                <div class="modal-footer">
                
                </div>
              </div>
            </div>
          </div>
          <!-- Modal asignar contenedor a empresa -->
          <div class="modal fade" id="asignarModal" tabindex="-1" role="dialog" aria-labelledby="asignarModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Asignar contenedor</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <div class="form-check">
                        <input class="form-check-input" value="G" type="radio" name="flexRadioDefault" id="flexRadioDefault1"  v-model="asignar_tipo">
                        <label class="form-check-label" for="flexRadioDefault1">
                          GenSet
                        </label>
                      </div>
                      <br>
                      <div class="form-check">
                        <input class="form-check-input" value="R" type="radio" name="flexRadioDefault" id="flexRadioDefault2" v-model="asignar_tipo">
                        <label class="form-check-label" for="flexRadioDefault2">
                          Reefer
                        </label>
                      </div>
                      <br>
                    <div class="form-inline">                     
                      <select class="form-control mr-sm-2" v-model="asignar_id_contenedor">
                        <option value='0' disabled>Seleccione un usuario</option>
                        <option v-for="(contenedor, index) in contentenedores_filtros"  :key="index" :value="contenedor.id">{{contenedor.nombre_contenedor}}</option>
                      </select>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" @click="asignar_contenedor_guardar">
                     <i class="fas fa-save"></i>
                    Guardar
                  </button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
      
    </div>
    
  </layoutprincipal>
</template>

<script>
import layoutprincipal from "./layout";

export default {
  components: { 
    layoutprincipal, 
  },
  props: {
    // tu_cuenta:Array,
      usuario_logeado: Array,
      empresas: Array,
      contenedores: Array,
      usuario_todos: Array, 
  },

  data() {
    return {
      // submited: false, 
      tabla_datos_empresas: this.empresas, 
      radio_user: null,
      radio_empresa: null,
      contentenedores_filtros:[],
      // -- usuarios datos ---
      nuevo_usuario: "",
      nuevo_apellidos: "",
      nuevo_nombres: "",
      nuevo_correo: "",
      // -- empresas datos ---
      nueva_empresa: "",
      nuevo_booking: "",
      nuevo_booking_temp: "",
      nuevo_usuario_asignado: 0,
      //--- asignar contenedor ---
      asignar_id_empresa:null,
      asignar_tipo: "G",
      asignar_id_contenedor: 0,

    };
  },
  watch: {
    radio_user(){
      this.filtrarEmpresa();
    },
    asignar_tipo(){
      this.filtrarContenedores();
    },
  },
 
  mounted() {
      this.usuarioLogeado(); 
      this.TablaUsuarios();
      this.TablaEmpresas()  
      this.filtrarContenedores();
  },

  methods: {
    filtrarContenedores(){
      if (this.asignar_tipo == "G") {
        this.contentenedores_filtros = this.contenedores.filter(contenedor => contenedor.tipo == "Generador");   
      }
      if (this.asignar_tipo == "R") {
        this.contentenedores_filtros = this.contenedores.filter(contenedor => contenedor.tipo == "Reefer");   
      }
     
    },
    filtrarEmpresa(){
        this.tabla_datos_empresas = this.empresas.filter(item => item.usuario_id == this.radio_user);
    },
    TablaEmpresas() {
      let self = this;
      this.$nextTick(() => {
          $('#tblEmpresas').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            }
          });
      });
    },
    TablaUsuarios() {
      let self = this;
      this.$nextTick(() => {
         $('#tblUsuarios').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            }
          });
       
      });
    },
    usuarioLogeado(){
      /* AQUI ES DONDE SE PONE EL NOMBRE DEL USUARIO EN EL NAV  */
      // this.$refs.layoutprincipal.usuario = (this.usuario_logeado[0].nombres + " " + this.usuario_logeado[0].apellidos).toUpperCase() ;
      this.$refs.layoutprincipal.usuario = (this.usuario_logeado[0].nombres ).toUpperCase() ;
     this.$refs.layoutprincipal.admin = this.usuario_logeado[0].admin; 
     
    },
    guardarUsuario(){
      let self = this;
      let data = {
        nombres: self.nuevo_nombres,
        apellidos: self.nuevo_apellidos,
        correo: self.nuevo_correo,
        usuario: self.nuevo_usuario,
      };
      if (self.nuevo_nombres =="" || self.nuevo_apellidos =="" || self.nuevo_correo =="" || self.nuevo_usuario =="") {
        // self.mensaje_error("Debe llenar todos los campos");
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Debe llenar todos los campos!',
        })
        
      }
      axios.post(route('nuevo_usuario'), data)
      .then(function(response){
        console.log(response.data);
        if (response.data == 'usuario_existe') {
           Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'El usuario ya existe!',
            })
        }
        if (response.data > 0) {
           Swal.fire({
              title: 'Usuario Creado!',
              icon: 'success',
              confirmButtonColor: '#e58e26',
              confirmButtonText: 'OK!'
            })
        }
       
      }).then(()=>{
        $('#usuarioModal').modal('hide')
        self.nuevo_nombres = "";
        self.nuevo_apellidos = "";
        self.nuevo_correo = "";
        self.nuevo_usuario = "";
        $("#tblUsuarios").DataTable().destroy();
        self.TablaUsuarios();
      });
    
    },
    guardarEmpresa(){
      let self = this;
      let data = {
        nombre_empresa: self.nueva_empresa,
        booking: self.nuevo_booking,
        booking_temp: self.nuevo_booking_temp,
        usuario_asigando: self.nuevo_usuario_asignado,
      };
      if (self.nueva_empresa =="" || self.nuevo_booking =="" || self.nuevo_booking_temp =="" || self.nuevo_usuario_asignado == 0) {
        // self.mensaje_error("Debe llenar todos los campos");
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Debe llenar todos los campos!',
        })
      }
      axios.post(route('nueva_empresa'), data)
      .then(function(response){
        console.log(response.data);
        
        if (response.data == 'empresa_existe') {
           Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'La empresa ya existe!',
            })
        }
        if (response.data > 0) {
           Swal.fire({
              title: 'Empresa Creada!',
              icon: 'success',
              confirmButtonColor: '#e58e26',
              confirmButtonText: 'OK!'
            })
        }
      }).then(()=>{
        $('#empresasModal').modal('hide')
        self.nuevo_nombres = "";
        self.nuevo_apellidos = "";
        self.nuevo_correo = "";
        self.nuevo_usuario = "";
        $("#tblEmpresas").DataTable().destroy();
        self.TablaEmpresas();
      });
    },
    asignar_contenedor_guardar(){
      let self = this;
      let data = {
        asig_contenedor: self.asignar_id_contenedor,
        asig_empresa: self.asignar_id_empresa,
        asig_tipo: self.asignar_tipo,
      };
      if (self.asignar_id_contenedor =="0" || self.asignar_id_empresa == null ) {
        console.log(self.asignar_id_empresa);
        console.log(self.asignar_id_contenedor);

        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Debe llenar todos los campos!',
        })
      }
      axios.post(route('asignar_contenedor'), data)
      .then(function(response){
        console.log(response.data);
        
        if (response.data == 'asignacion_existe') {
           Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'El contenedor ya esta asignado!',
            })
        }
        if (response.data > 0) {
           Swal.fire({
              title: 'Asignacion realizada!',
              icon: 'success',
              confirmButtonColor: '#e58e26',
              confirmButtonText: 'OK!'
            })
        }
      }).then(()=>{
        $('#asignarModalLabel').modal('hide')
      
      });
    },
      
  },
};
</script>

<style lang="css">
 #lado_derecho{
    width: 100%;
  }
  #lado_izquierdo{
    width: 100%;
  }



@media (max-width: 1024px) {
  #lado_derecho{
    width: 100%;
  }
  #lado_izquierdo{
    width: 100%;
  }
}
.bg-primary {
  background-color: #0E5976 !important;
}
.btn-primary {
  background-color: #0E5976 !important;
}
</style>



