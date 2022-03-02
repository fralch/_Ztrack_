<template >
  <layoutprincipal ref="layoutprincipal">  <!-- *** cargando layoutprincipal  **** -->
    <div
      class="slot_body slot_empresas"
      slot="component-view"
    >
      <div class="content" style="display: block" id="cuerpo" >
        <!-- ---------------------- -->
        <div class="content" >
          <div class="row" style=" margin: 0 0 0 0px;">
            <div id='lado_izquierdo' style="margin: 10px 0 0 -5px;">
              <div id="asset-empresas" class="col shadow-sm p-3 mb-5 bg-white rounded "  >
                 <div class="text-center"  style="background-color: #353b48; " >
                   <label for="buscar" style="color:white; font-size:20px;  margin-top: 10px; ">USUARIOS </label>
                    <!-- <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button> -->
                  </div>
                  <br>
                  <!-- ****** table empreas ******* -->
                  <div id="grid_usuarios">
                      <table class="table" id="tblUsuarios">
                         <thead class="bg-warning">
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
                  <div class="row" style="margin: 0 10px;">
                    <button type="button" class="col-3 btn btn-warning"  data-toggle="modal" data-target="#usuarioModal" >
                     <i class="bi bi-check-lg"></i>
                      <b style="font-size:1.2em;"></b>
                      &nbsp;
                      Nueva Usuario
                    </button>
                  </div>
              </div>
             
            </div>
            <div id='lado_derecho' style="">
                <!-- <div id="total_reefers" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: 10px 15px 0px 15px;height: 90vh; "> -->
               <div id="asset-empresas" class="col shadow-sm p-3 mb-5 bg-white rounded "  style=" margin: 10px 15px 0px 15px;" >
                  <div class="text-center"  style="background-color: #353b48; " >
                   <label for="buscar" style="color:white; font-size:20px;  margin-top: 10px; ">EMPRESAS </label>
                    <!-- <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button> -->
                  </div>
                  <br>
                  <!-- ****** table empreas ******* -->
                  <div id="grid_empresas">
                      <table class="table" id="tblEmpresas">
                         <thead class="bg-success" style="color:white; ">
                          <tr >
                            <th scope="col" width='50px'>N°</th>
                            <th scope="col" width='150px'>Empresa</th>
                            <th scope="col">Descripcion_booking</th>
                            <th scope="col">Temp_contratada</th>
                            <th scope="col" width='250px'> Otros_datos_contratados </th>
                            <th scope="col">Usuario_asigando</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(empresa, index) in tabla_datos_empresas" :key="index">
                            <td>{{index+1}}</td>
                            <td>{{(empresa.nombre_empresa).toUpperCase()}}</td>
                            <td>{{empresa.descripcion_booking}}</td>
                            <td>{{empresa.temp_contratada}}</td>
                            <td class="text-center"> 0 C°</td>
                            <td>{{(empresa.usuario).toUpperCase()}}</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                  <div class="row" style="margin: 0 10px;">
                    <button type="button" class="col-3 btn btn-success"  >
                     <i class="bi bi-check-lg"></i>
                      <b style="font-size:1.2em;"></b>
                      &nbsp;
                      Nueva Empresa
                    </button>
                  </div>
              </div>     
            </div>
          
          </div>
          
          </div>
        </div>
        <!-- ---------------------- -->
        <!-- Modal usuario -->
          <div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="usuarioModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-inline">
                      <label style="margin-right: 10px; ">Usuario</label>
                      <input class="form-control mr-sm-2" type="usuario" placeholder="nombre de usuario" aria-label="Usuario" v-model="nuevo_usuario">
                    </div>
                    <br>
                    <div class="form-inline">
                      <label style="margin-right: 10px; ">Apellidos</label>
                      <input class="form-control mr-sm-2" type="apellidos" placeholder="apellidos" aria-label="Apellidos" v-model="nuevo_apellidos">
                    </div>
                    <br>
                    <div class="form-inline">
                      <label style="margin-right: 10px; ">Nombres</label>
                      <input class="form-control mr-sm-2" type="nombres" placeholder="nombres" aria-label="Nombres" v-model="nuevo_nombres">
                    </div>
                    <br>
                    <div class="form-inline">
                      <label style="margin-right: 10px; ">Correo</label>
                      <input class="form-control mr-sm-2" type="correo" placeholder="correo" aria-label="Correo" v-model="nuevo_correo">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" @click="guardarUsuario">
                     <i class="fas fa-save"></i>
                    Guardar
                  </button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        <!-- Modal usuario -->
          <div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="usuarioModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-inline">
                      <label style="margin-right: 10px; ">Usuario</label>
                      <input class="form-control mr-sm-2" type="usuario" placeholder="nombre de usuario" aria-label="Usuario" v-model="nuevo_usuario">
                    </div>
                    <br>
                    <div class="form-inline">
                      <label style="margin-right: 10px; ">Apellidos</label>
                      <input class="form-control mr-sm-2" type="apellidos" placeholder="apellidos" aria-label="Apellidos" v-model="nuevo_apellidos">
                    </div>
                    <br>
                    <div class="form-inline">
                      <label style="margin-right: 10px; ">Nombres</label>
                      <input class="form-control mr-sm-2" type="nombres" placeholder="nombres" aria-label="Nombres" v-model="nuevo_nombres">
                    </div>
                    <br>
                    <div class="form-inline">
                      <label style="margin-right: 10px; ">Correo</label>
                      <input class="form-control mr-sm-2" type="correo" placeholder="correo" aria-label="Correo" v-model="nuevo_correo">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" @click="guardarUsuario">
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
      // -- usuarios datos ---
      nuevo_usuario: "",
      nuevo_apellidos: "",
      nuevo_nombres: "",
      nuevo_correo: "",

    };
  },
  watch: {
    radio_user(){
      this.filtrarEmpresa();
    },
    
  },
 
  mounted() {
      this.usuarioLogeado(); 
      this.TablaUsuarios();
      this.TablaEmpresas()  
  },

  methods: {
    filtrarEmpresa(){
      this.tabla_datos_empresas = this.empresas.filter(item => item.usuario_id == this.radio_user);
    },
   TablaEmpresas() {
      let self = this;
      this.$nextTick(() => {
        var table = $('#tblEmpresas').DataTable({
            scrollX: "100%",
          language: {
              retrieve: true,
              decimal: "",
              emptyTable: "No hay datos disponibles en la tabla",
              info: "Mostrando del _START_ al _END_ de _TOTAL_ registros",
              infoEmpty: "No se encontraron registros",
              infoFiltered: "(filtrado de _MAX_ registros)",
              infoPostFix: "",
              thousands: ",",
              lengthMenu: "Agrupar por _MENU_ filas",
              loadingRecords: "Cargando...",
              processing: "Procesando...",
              search: "Buscar:",
              zeroRecords: "No se encontraron registros",
              paginate: {
                first: "Primera",
                last: "Ultima",
                next: '<i class="fas fa-chevron-circle-right" style="font-size:20px;"></i>',
                previous:
                  '<i class="fas fa-chevron-circle-left" style="font-size:20px;"></i>',
              },
              responsive: true,
          },
        });
      });
    },
   TablaUsuarios() {
      let self = this;
      this.$nextTick(() => {
        var table = $('#tblUsuarios').DataTable({
            scrollX: "100%",
          language: {
              retrieve: true,
              decimal: "",
              emptyTable: "No hay datos disponibles en la tabla",
              info: "Mostrando del _START_ al _END_ de _TOTAL_ registros",
              infoEmpty: "No se encontraron registros",
              infoFiltered: "(filtrado de _MAX_ registros)",
              infoPostFix: "",
              thousands: ",",
              lengthMenu: "Agrupar por _MENU_ filas",
              loadingRecords: "Cargando...",
              processing: "Procesando...",
              search: "Buscar:",
              zeroRecords: "No se encontraron registros",
              paginate: {
                first: "Primera",
                last: "Ultima",
                next: '<i class="fas fa-chevron-circle-right" style="font-size:20px;"></i>',
                previous:
                  '<i class="fas fa-chevron-circle-left" style="font-size:20px;"></i>',
              },
              responsive: true,
          },
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
      
  },
};
</script>

<style lang="css">
 #lado_derecho{
    width: 50%;
  }
  #lado_izquierdo{
    width: 50%;
  }



@media (max-width: 1024px) {
  #lado_derecho{
    width: 50%;
  }
  #lado_izquierdo{
    width: 50%;
  }
}
</style>



