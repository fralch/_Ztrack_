<template >
  <layoutprincipal ref="layoutprincipal">
    <!-- *** cargando layoutprincipal  **** -->
    <div class="slot_body slot_empresas" slot="component-view">
      <div
        class="content"
        style="display: block; width: 100% !important"
        id="cuerpo"
      >
        <!-- ----------------------- -->
        <div class="content">
          <div class="row" style="margin: 0 0 0 0px">
            <div id="lado_izquierdo" class="rounded border border-5">
              <div class="card-body shadow p-3 mb-5 bg-white rounded border border-1">
                <h5 class="card-title p-3 mb-2 bg-primary text-white">
                  USUARIOS
                </h5>
                <div
                  class="
                    card
                    bg-light
                    mb-3
                    shadow-none
                    p-3
                    mb-5
                    bg-light
                    rounded
                  "
                >
                  <div class="card-body">
                    <div class="row align-items-start">
                      <div class="col">
                        <label>Nuevo Usuario</label>
                        <input
                          class="form-control mr-sm-2"
                          type="text"
                          placeholder="nombre de usuario"
                          aria-label="Usuario"
                          v-model="nuevo_usuario"
                        />
                      </div>
                      <div class="col">
                        <label>Apellidos</label>
                        <input
                          class="form-control mr-sm-2"
                          type="text"
                          placeholder="apellidos"
                          aria-label="Apellidos"
                          v-model="nuevo_apellidos"
                        />
                      </div>
                      <div class="col">
                        <label style="margin-right: 10px">Nombres</label>
                        <input
                          class="form-control mr-sm-2"
                          type="text"
                          placeholder="nombres"
                          aria-label="Nombres"
                          v-model="nuevo_nombres"
                        />
                      </div>
                      <div class="col">
                        <label style="margin-right: 10px">Correo</label>
                        <input
                          class="form-control mr-sm-2"
                          type="email"
                          placeholder="correo"
                          aria-label="Correo"
                          v-model="nuevo_correo"
                        />
                      </div>
                      <div class="col">
                        <label style="margin-right: 10px">Contraseña</label>
                        <input
                          class="form-control mr-sm-2"
                          type="password"
                          placeholder="Contraseña"
                          aria-label="Correo"
                          v-model="nuevo_pass"
                        />
                      </div>
                      <div class="col">
                        <label style="margin-right: 10px"
                          >Confirmar contraseña</label
                        >
                        <input
                          class="form-control mr-sm-2"
                          type="password"
                          placeholder="Confirmar contraseña"
                          aria-label="Correo"
                          v-model="confirmar_pass"
                        />
                      </div>

                      <div class="col">
                        <input
                          type="checkbox"
                          id="admin"
                          name="admin"
                          v-model="check_admin"
                          style="margin-top: 15px"
                        />
                        <label for="admin"> Admin</label><br />
                        <input
                          type="checkbox"
                          id="admin_mad"
                          name="admin_mad"
                          v-model="check_admin_mad"
                          style="margin-top: 0px"
                        />
                        <label for="admin"> Admin_mad</label><br />
                      </div>
                      <div class="col">
                        <button
                          type="button"
                          style="margin-top: 30px"
                          class="btn btn-primary"
                          @click="guardarUsuario"
                        >
                          <i class="fas fa-save"></i>
                          Agregar usuario
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <table
                  id="tblUsuarios"
                  class="
                    table table-striped table-bordered
                    dt-responsive
                    nowrap
                  "
                  style="width: 100%"
                >
                  <thead>
                    <tr>
                      <th scope="col" width="50px">N°</th>
                      <th scope="col" width="150px">Usuario</th>
                      <th scope="col">Apellidos</th>
                      <th scope="col">Nombres</th>
                      <th scope="col" width="50px">Activo</th>
                      <th scope="col">Administrador</th>
                      <th scope="col">Admin_Mad</th>
                      <th scope="col">Correo</th>
                      <th scope="col">Ultimo_acceso</th>
                      <th scope="col">Editar</th>
                      <th scope="col">Borrar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(usuario, index) in usuario_all" :key="index">
                      <td class="text-center">{{usuario.id }}</td>

                      <td>{{ usuario.usuario.toUpperCase() }}</td>
                      <td>{{ usuario.apellidos }}</td>
                      <td>{{ usuario.nombres }}</td>
                      <td class="text-center">
                        {{ usuario.activo == 1 ? "SI" : "NO" }}
                      </td>
                      <td class="text-center">
                        {{ usuario.admin == 1 ? "SI" : "NO" }}
                      </td>
                      <td class="text-center">
                        {{ usuario.admin_madurador == 1 ? "SI" : "NO" }}
                      </td>
                      <td>{{ usuario.correo }}</td>
                      <td>{{ usuario.ultimo_acceso }}</td>
                      <td class="text-center">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-toggle="modal"
                          data-target="#editarUsuarioModal"
                          @click="editarUsuario(usuario)"
                        >
                          <i class="bi bi-pencil-fill"></i>
                        </button>
                      </td>
                      <td class="text-center">
                        <button
                          type="button"
                          class="btn btn-primary"
                          @click="borrarUsuario(usuario.id)"
                        >
                          <i class="bi bi-trash-fill"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div id="lado_derecho">
              <div
                class="card-body shadow p-3 mb-5 bg-white rounded border border-1"
              >
                <h5 class="card-title p-3 mb-2 bg-primary text-white">
                  EMPRESAS
                </h5>
                <div class="card bg-light mb-3">
                  <div class="card-body">
                    <div class="row align-items-start">
                      <div class="col">
                        <label style="margin-right: 10px">Empresa</label>
                        <input
                          class="form-control mr-sm-2"
                          placeholder="nombre de empresa"
                          v-model="nueva_empresa"
                        />
                      </div>
                      <div class="col">
                        <label style="margin-right: 10px">Booking</label>
                        <textarea
                          class="form-control mr-sm-2"
                          v-model="nuevo_booking"
                        ></textarea>
                      </div>
                      <div class="col">
                        <label style="margin-right: 10px">Booking_temp</label>
                        <input
                          class="form-control mr-sm-2"
                          placeholder="Booking Temperature"
                          v-model="nuevo_booking_temp"
                        />
                      </div>

                      <div class="col">
                        <button
                          type="button"
                          style="margin-top: 30px"
                          class="btn btn-primary"
                          @click="guardarEmpresa"
                        >
                          <i class="fas fa-save"></i>
                          Agregar empresa
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <table
                  id="tblEmpresas"
                  class="
                    table table-striped table-bordered
                    dt-responsive
                    nowrap
                  "
                  style="width: 100%"
                >
                  <thead>
                    <tr>
                      <th width="20px">N°</th>
                      <th width="50px" class="text-center">Ver</th>
                      <th>Empresa</th>
                      <th>Booking</th>
                      <th>Booking_temp</th>
                      <th class="text-center">Asignar_contenedor</th>
                      <th class="text-center">Asignar_usuario</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(empresa, index) in tabla_datos_empresas"
                      :key="index"
                    >
                      <td>{{ empresa.id }}</td>
                      <td class="text-center">
                        <input
                          type="radio"
                          :value="empresa.id"
                          v-model="radio_empresa"
                        />
                      </td>
                      <td>{{ empresa.nombre_empresa.toUpperCase() }}</td>
                      <td>{{ empresa.descripcion_booking }}</td>
                      <td>{{ empresa.temp_contratada }}</td>
                      <td class="text-center">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-toggle="modal"
                          data-target="#asignarModal"
                          @click="asignar_id_empresa = empresa.id"
                        >
                          <i class="bi bi-check-lg"></i>
                        </button>
                      </td>
                      <td class="text-center">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-toggle="modal"
                          data-target="#asignarUsuarioModal"
                          @click="obtenerUsuarioEmpresa(empresa.id)"
                        >
                          <i class="bi bi-check-lg"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- //////////// -->
            <div
              class="card-body shadow p-3 mb-5 bg-white rounded border border-1"
            >
              <h5 class="card-title p-3 mb-2 bg-primary text-white">
                CONTENEDORES
              </h5>
              <div class="card bg-light mb-3">
                <div class="card-body">
                  <div class="row align-items-start">
                    <div class="col">
                      <label style="margin-right: 10px"
                        >Nombre contenedor</label
                      >
                      <input
                        class="form-control mr-sm-2"
                        placeholder="nombre de contenedor"
                        v-model="nuevo_contenedor"
                      />
                    </div>
                    <div class="col">
                      <label style="margin-right: 10px">Tipo</label>
                      <select
                        class="form-control mr-sm-2"
                        v-model="nuevo_tipo_contenedor"
                      >
                        <option value="0" disabled>Seleccione tipo</option>
                        <option value="Reefer">Reefer</option>
                        <option value="Generador">Generador</option>
                        <option value="Madurador">Madurador</option>
                      </select>
                    </div>
                    <div class="col">
                      <label style="margin-right: 10px">Booking</label>
                      <textarea
                        class="form-control mr-sm-2"
                        v-model="nuevo_booking_contenedor"
                      ></textarea>
                    </div>
                    <div class="col">
                      <label style="margin-right: 10px">Booking_temp</label>
                      <input
                        class="form-control mr-sm-2"
                        placeholder="Booking Temperature"
                        v-model="nuevo_booking_temp_contenedor"
                      />
                    </div>

                    <div class="col">
                      <button
                        type="button"
                        style="margin-top: 30px"
                        class="btn btn-primary"
                        @click="guardarContenedor"
                      >
                        <i class="fas fa-save"></i>
                        Agregar contenedor
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <table
                id="tblContenedores"
                class="table table-striped table-bordered dt-responsive nowrap"
                style="width: 100%"
              >
                <thead>
                  <tr>
                    <th width="20px">N°</th>
                    <th>Contenedor</th>
                    <th>Alias</th>
                    <th>Tipo</th>
                    <th>Booking</th>
                    <th class="text-center">Booking_temp</th>
                    <th class="text-center">Activo</th>
                    <th class="text-center">Editar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(contenedor, index) in tabla_contenedores_filtrados"
                    :key="index"
                  >
                    <td>{{ index + 1 }}</td>
                    <td>{{ contenedor.nombre_contenedor.toUpperCase() }}</td>
                    <td>{{ contenedor.alias ? contenedor.alias : "Sin alias" }}</td>
                    <td>{{ contenedor.tipo }}</td>
                    <td>{{ contenedor.booking }}</td>
                    <td class="text-center">{{ contenedor.booking_temp }}</td>
                    <td class="text-center">
                      <label class="switch">
                        <input
                          type="checkbox"
                          :value="contenedor.id"
                          :checked="contenedor.encendido == 1"
                          @change="cambiarEstadoContenedor(contenedor.id)"
                        />
                        <span class="slider round"></span>
                      </label>
                    </td>
                     <td class="text-center">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-toggle="modal"
                          data-target="#editarContenedorModal"
                          @click="obtenerContenedor(contenedor)"
                        >
                          <i class="bi bi-pencil-fill"></i>
                        </button>
                      </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- //////////// -->
          </div>
        </div>
      </div>
      <!-- ---------------------- -->
      <!-- Modal asignar contenedor a empresa -->
      <div
        class="modal fade"
        id="asignarModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="asignarModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Asignar contenedor
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-check">
                <input
                  class="form-check-input"
                  value="G"
                  type="radio"
                  name="flexRadioDefault"
                  id="flexRadioDefault1"
                  v-model="asignar_tipo"
                />
                <label class="form-check-label" for="flexRadioDefault1">
                  GenSet
                </label>
              </div>
              <br />
              <div class="form-check">
                <input
                  class="form-check-input"
                  value="R"
                  type="radio"
                  name="flexRadioDefault"
                  id="flexRadioDefault2"
                  v-model="asignar_tipo"
                />
                <label class="form-check-label" for="flexRadioDefault2">
                  Reefer
                </label>
              </div>
              <br />
              <div class="form-check">
                <input
                  class="form-check-input"
                  value="M"
                  type="radio"
                  name="flexRadioDefault"
                  id="flexRadioDefault2"
                  v-model="asignar_tipo"
                />
                <label class="form-check-label" for="flexRadioDefault2">
                  Madurador
                </label>
              </div>
              <br />
              <div class="form-inline">
                <select
                  class="form-control mr-sm-2"
                  v-model="asignar_id_contenedor"
                >
                  <option value="0" disabled>Seleccione un contenedor</option>
                  <option
                    v-for="(contenedor, index) in tabla_contenedores"
                    :key="index"
                    :value="contenedor.id"
                  >
                    {{ contenedor.nombre_contenedor }}
                  </option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-dark"
                @click="asignar_contenedor_guardar"
              >
                <i class="fas fa-save"></i>
                Guardar
              </button>
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal asignar usuario-empresa -->
      <div
        class="modal fade"
        id="asignarUsuarioModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="asignarUsuarioModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Asignar Usuario
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form">
                <p class="font-weight-bold">Usuarios ya asignados:</p>
                <ul>
                  <li v-for="(u, i) in usuarios_empresa" :key="i">
                    <p class="font-weight-light">{{ u.usuario }}</p>
                  </li>
                </ul>
              </div>
              <br />
              <div class="form-inline">
                <select
                  class="form-control mr-sm-2"
                  v-model="asignar_id_usuario"
                >
                  <option value="0" disabled>Seleccione un usuario</option>
                  <option
                    v-for="(usuario, index) in usuario_all"
                    :key="index"
                    :value="usuario.id"
                  >
                    {{ usuario.usuario }}
                  </option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-dark"
                @click="usuarioEmpresaAsignar"
              >
                <i class="fas fa-save"></i>
                Guardar
              </button>
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--  editar usuarios  -->
      <div
        class="modal fade"
        id="editarUsuarioModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="editarUsuarioModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                {{"Editar a " + " " + (editar_usuario.apellidos).toUpperCase()  }}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <div >
                <span class="font-weight-bold">Usuario activo:</span>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio1"
                    value="1"
                    v-model="editar_usuario.activo"
                  />
                  <label class="form-check-label" for="inlineRadio1">Si</label>
                  
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio2"
                    value="0"
                    v-model="editar_usuario.activo"
                  />
                  <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
              </div>

              <div >
                <span class="font-weight-bold">Admin total:</span>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptionsAdmin"
                    id="inlineRadio1"
                    value="1"
                    v-model="editar_usuario.admin"
                  />
                  <label class="form-check-label" for="inlineRadio1">Si</label>
                  
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptionsAdmin"
                    id="inlineRadio2"
                    value="0"
                    v-model="editar_usuario.admin"
                  />
                  <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
             </div>
              <div >
                <span class="font-weight-bold">Admin madurador:</span>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptionsAdminMadurador"
                    id="inlineRadio1"
                    value="1"
                    v-model="editar_usuario.admin_madurador"
                  />
                  <label class="form-check-label" for="inlineRadio1">Si</label>
                  
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptionsAdminMadurador"
                    id="inlineRadio2"
                    value="0"
                    v-model="editar_usuario.admin_madurador"
                  />
                  <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
             </div>
              
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-dark"
                @click="guardarEditarUsuario"
              >
                <i class="fas fa-save"></i>
                Guardar
              </button>
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--  editar contenedores  -->
      <div
        class="modal fade"
        id="editarContenedorModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="editarContenedorModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                {{"Editar a " + " " + (editar_contenedor.nombre_contenedor).toUpperCase()  }}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group
              ">
                <label for="nombre_contenedor">Nombre del contenedor</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nombre_contenedor"
                    disabled
                    v-model="editar_contenedor.nombre_contenedor"
                  />
                  <br>
                  <input
                    type="text"
                    class="form-control"
                    id="alias"
                    v-model="editar_contenedor.alias"
                  />
                  <br>
                  <select
                    class="form-control"
                    v-model="editar_contenedor.tipo"
                  >
                    <option value="Reefer">Reefer</option>
                    <option value="Generador">Generador</option>
                  </select>
                  <br>
                  <input
                    type="text"
                    class="form-control"
                    id="booking"
                    v-model="editar_contenedor.booking"
                  />
                  <br>
                  <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    id="booking_temp"
                    v-model="editar_contenedor.booking_temp"
                  />
                 

              </div>

              
              
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-dark"
                @click="guardarEditarContenedor"
              >
                <i class="fas fa-save"></i>
                Guardar
              </button>
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cerrar
              </button>
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
      usuario_all: this.usuario_todos,
      // submited: false,
      tabla_datos_empresas: this.empresas,
      radio_user: null,
      radio_empresa: null,
      tabla_contenedores_filtrados: this.contenedores,
      tabla_contenedores: [],

      // -- usuarios datos ---
      nuevo_usuario: "",
      nuevo_apellidos: "",
      nuevo_nombres: "",
      nuevo_correo: "",
      nuevo_pass: "",
      confirmar_pass: "",
      check_admin: false,
      check_admin_mad: false,
      // -- empresas datos ---
      nueva_empresa: "",
      nuevo_booking: "",
      nuevo_booking_temp: "",
      nuevo_usuario_asignado: 0,
      //--- asignar contenedor ---
      asignar_id_empresa: null,
      asignar_tipo: "G",
      asignar_id_contenedor: 0,
      //*Asignar usuarios - empresas*/
      empresa_seleccionada: 0,
      asignar_id_usuario: 0,
      usuarios_empresa: [],
      // --- nuevo contenedor ---
      nuevo_contenedor: null,
      nuevo_tipo_contenedor: "0",
      nuevo_booking_contenedor: null,
      nuevo_booking_temp_contenedor: null,

      // editar usuario
      editar_usuario: {
        id: 0,
        usuario: "",
        apellidos: "",
        nombres: "",
        correo: "",
        activo: 0,
        admin: 0,
        admin_mad: 0,
      },
      // editar contenedor 
      editar_contenedor: {
        id: 0,
        nombre_contenedor: "",
        alias: "",
        tipo: "",
        booking: "",
        booking_temp: "",
      },
    };
  },
  watch: {
    radio_empresa(value) {
      console.log(value);
      axios
        .post(route("filtrar_contenedoresXempresas"), {
          id_empresa: value,
        })
        .then((response) => {
          // console.log(response.data);
          this.tabla_contenedores_filtrados = response.data;
        });
    },
    radio_user() {
      this.filtrarEmpresa();
    },
    asignar_tipo() {
      this.filtrarContenedores();
    },
    usuario_all() {
      $("#tblUsuarios").DataTable().destroy();
      this.TablaUsuarios();
    },
    tabla_contenedores_filtrados() {
      $("#tblContenedores").DataTable().destroy();
      this.TablaContenedores();
    },
    tabla_datos_empresas() {
      $("#tblEmpresas").DataTable().destroy();
      this.TablaEmpresas();
    },
  },

  mounted() {
    this.usuarioLogeado();
    this.TablaUsuarios();
    this.TablaEmpresas();
    this.TablaContenedores();
    this.filtrarContenedores();
  },

  methods: {
    filtrarContenedores() {
      if (this.asignar_tipo == "G") {
        this.tabla_contenedores = this.contenedores.filter(
          (contenedor) => contenedor.tipo == "Generador"
        );
      }
      if (this.asignar_tipo == "R") {
        this.tabla_contenedores = this.contenedores.filter(
          (contenedor) => contenedor.tipo == "Reefer"
        );
      }
      if (this.asignar_tipo == "M") {
        this.tabla_contenedores = this.contenedores.filter(
          (contenedor) => contenedor.tipo == "Madurador"
        );
      }
    },
    filtrarEmpresa() {
      this.tabla_datos_empresas = this.empresas.filter(
        (item) => item.usuario_id == this.radio_user
      );
    },
    TablaEmpresas() {
      let self = this;
      this.$nextTick(() => {
        $("#tblEmpresas").DataTable({
          scrollX: "100%",
          responsive: true,
          language: {
            url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json",
          },
        });
      });
    },
    TablaUsuarios() {
      let self = this;
      this.$nextTick(() => {
        $("#tblUsuarios").DataTable({
          scrollX: "100%",
          responsive: true,
          language: {
            url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json",
          },
        });
      });
    },
    TablaContenedores() {
      let self = this;
      this.$nextTick(() => {
        $("#tblContenedores").DataTable({
          scrollX: "100%",
          responsive: true,
          language: {
            url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json",
          },
        });
      });
    },
    usuarioLogeado() {
      /* AQUI ES DONDE SE PONE EL NOMBRE DEL USUARIO EN EL NAV  */
      // this.$refs.layoutprincipal.usuario = (this.usuario_logeado[0].nombres + " " + this.usuario_logeado[0].apellidos).toUpperCase() ;
      this.$refs.layoutprincipal.usuario =
        this.usuario_logeado[0].nombres.toUpperCase();
      this.$refs.layoutprincipal.admin = this.usuario_logeado[0].admin;
    },
    guardarUsuario() {
      let self = this;
      let data = {
        nombres: self.nuevo_nombres,
        apellidos: self.nuevo_apellidos,
        correo: self.nuevo_correo,
        usuario: self.nuevo_usuario,
        pass: self.nuevo_pass,
        confirmar_pass: self.confirmar_pass,
        admin: self.check_admin ? 1 : 0,
        admin_mad: self.check_admin_mad ? 1 : 0,
      };
      if (
        self.nuevo_nombres == "" ||
        self.nuevo_apellidos == "" ||
        self.nuevo_correo == "" ||
        self.nuevo_usuario == "" ||
        self.nuevo_pass == "" ||
        self.confirmar_pass == ""
      ) {
        // self.mensaje_error("Debe llenar todos los campos");
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Debe llenar todos los campos!",
        });
        return 0;
      }
      if (self.nuevo_pass != self.confirmar_pass) {
        Swal.fire({
          icon: "error",
          title: "Upps...",
          text: "Las contraseñas no coinciden!",
        });
        return 0;
      }

      axios
        .post(route("nuevo_usuario"), data)
        .then(function (response) {
          if (response.data == "usuario_existe") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "El usuario ya existe!",
            });
          }
          if (response.data.length > 0) {
            console.log(response.data);
            self.usuario_all = response.data;
            Swal.fire({
              title: "Usuario Creado!",
              icon: "success",
              confirmButtonColor: "#e58e26",
              confirmButtonText: "OK!",
            });
          }
          console.log(self.usuario_all);
        })
        .then(() => {
          self.nuevo_nombres = "";
          self.nuevo_apellidos = "";
          self.nuevo_correo = "";
          self.nuevo_usuario = "";
        });
    },
    guardarContenedor() {
      let self = this;
      let data = {
        nuevo_contenedor: self.nuevo_contenedor,
        nuevo_tipo_contenedor: self.nuevo_tipo_contenedor,
        nuevo_booking_contenedor: self.nuevo_booking_contenedor,
        nuevo_booking_temp_contenedor: self.nuevo_booking_temp_contenedor,
      };
      console.log(
        "🚀 ~ file: setting.vue ~ line 425 ~ guardarContenedor ~ data",
        data
      );
      if (self.nuevo_contenedor == null || self.nuevo_tipo_contenedor == null) {
        // self.mensaje_error("Debe llenar todos los campos");
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Debe llenar todos los campos!",
        });
      }
      axios
        .post(route("nuevo_contenedor"), data)
        .then(function (response) {
          console.log(response.data);
          if (response.data == "contenedor_existe") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "El contenedor ya existe!",
            });
          }
          if (response.data.length > 0) {
            self.tabla_contenedores_filtrados = response.data;
            Swal.fire({
              title: "Contenedor Creado!",
              icon: "success",
              confirmButtonColor: "#e58e26",
              confirmButtonText: "OK!",
            });
          }
        })
        .then(() => {
          self.nuevo_contenedor = "";
          self.nuevo_tipo_contenedor = "";
          self.nuevo_booking_contenedor = "";
          self.nuevo_booking_temp_contenedor = "";
        });
    },
    guardarEmpresa() {
      let self = this;
      let data = {
        nombre_empresa: self.nueva_empresa,
        booking: self.nuevo_booking,
        booking_temp: self.nuevo_booking_temp,
      };
      if (
        self.nueva_empresa == "" ||
        self.nuevo_booking == "" ||
        self.nuevo_booking_temp == ""
      ) {
        // self.mensaje_error("Debe llenar todos los campos");
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Debe llenar todos los campos!",
        });
      }
      axios
        .post(route("nueva_empresa"), data)
        .then(function (response) {
          console.log(response.data);

          if (response.data == "empresa_existe") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "La empresa ya existe!",
            });
          }
          if (response.data.length > 0) {
            self.tabla_datos_empresas = response.data;
            Swal.fire({
              title: "Empresa Creada!",
              icon: "success",
              confirmButtonColor: "#e58e26",
              confirmButtonText: "OK!",
            });
          }
        })
        .then(() => {
          self.nuevo_nombres = "";
          self.nuevo_apellidos = "";
          self.nuevo_correo = "";
          self.nuevo_usuario = "";
        });
    },
    asignar_contenedor_guardar() {
      let self = this;
      let data = {
        asig_contenedor: self.asignar_id_contenedor,
        asig_empresa: self.asignar_id_empresa,
        asig_tipo: self.asignar_tipo,
      };
      if (
        self.asignar_id_contenedor == "0" ||
        self.asignar_id_empresa == null
      ) {
        console.log(self.asignar_id_empresa);
        console.log(self.asignar_id_contenedor);

        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Debe llenar todos los campos!",
        });
      }
      axios
        .post(route("asignar_contenedor"), data)
        .then(function (response) {
          console.log(response.data);

          if (response.data == "asignacion_existe") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "El contenedor ya esta asignado!",
            });
          }
          if (response.data > 0) {
            console.log(
              "file: setting.vue ~ line 830 ~ response.data",
              response.data
            );

            Swal.fire({
              title: "Asignacion realizada!",
              icon: "success",
              confirmButtonColor: "#e58e26",
              confirmButtonText: "OK!",
            });
          }
        })
        .then(() => {
          $("#asignarModal").modal("hide");
        });
    },
    cambiarEstadoContenedor(id) {
      let self = this;
      let data = {
        id_contenedor: id,
      };

      axios
        .post(route("cambiar_estado_contenedor"), data)
        .then(function (response) {
          self.tabla_contenedores_filtrados = response.data;
        });
    },
    obtenerUsuarioEmpresa(id) {
      let self = this;
      self.empresa_seleccionada = id;
      self.usuarios_empresa = [];
      let data = {
        id_empresa: id,
      };
      axios
        .post(route("obtener_usuario_empresa"), data)
        .then(function (response) {
          if (response.data.length > 0) {
            self.usuarios_empresa = response.data;
          }
        });
    },
    usuarioEmpresaAsignar() {
      let self = this;
      let data = {
        id_empresa: self.empresa_seleccionada,
        id_usuario: self.asignar_id_usuario,
      };
      self.usuarios_empresa.forEach((usuario) => {
        if (usuario.id == self.asignar_id_usuario) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "El usuario ya esta asignado a la empresa!",
          });
          return 0;
        }
      });

      axios
        .post(route("asignar_usuario_empresa"), data)
        .then(function (response) {
          // console.log(response.data);
          if (response.data.length > 0) {
            Swal.fire({
              title: "Asignacion realizada!",
              icon: "success",
              confirmButtonColor: "#e58e26",
              confirmButtonText: "OK!",
            });
          }
        })
        .then(() => {
          $("#asignarUsuarioModal").modal("hide");
        });
    },
    borrarUsuario(id) {
      let self = this;

      Swal.fire(
        {
          title: "¿Estas seguro de eliminar el usuario?",
          text: "Una vez eliminado no podras recuperarlo!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#0e5976",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si, eliminar!",
          cancelButtonText: "No, cancelar!",
        }
      ).then((result) => {
        if (result.value) {
          let data = {
            id_usuario: id,
          };
          axios
            .post(route("borrar_usuario"), data)
            .then(function (response) {
              self.usuario_all = response.data;
            });
          Swal.fire(
            "Eliminado!",
            "El usuario ha sido eliminado.",
            "success"
          );
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire(
            "Cancelado",
            "El usuario no ha sido eliminado.",
            "error"
          );
        }
      });
    },
    editarUsuario(usuario){
      let self = this;
      self.editar_usuario = usuario;
    },
    guardarEditarUsuario(){
      let self = this;
      let data = self.editar_usuario
      axios
        .post(route("editar_usuario"), data)
        .then(function (response) {
          console.log(response.data); 
          self.usuario_all = response.data;
        });
      Swal.fire(
        "Editado!",
        "El usuario ha sido editado.",
        "success"
      );
      $("#editarUsuarioModal").modal("hide");
    },
    obtenerContenedor(contenedor){
      console.log(contenedor);
      this.editar_contenedor = {
        id: contenedor.id,
        nombre_contenedor:  contenedor.nombre_contenedor ,
        alias: contenedor.alias? contenedor.alias : 'Sin alias',
        tipo: contenedor.tipo,
        booking: contenedor.booking,
        booking_temp: contenedor.booking_temp,
      };
    },
    guardarEditarContenedor(){
      let self = this;
      let data = self.editar_contenedor
      axios
        .post(route("editar_contenedor"), data)
        .then(function (response) {
          console.log(response.data); 
          self.tabla_contenedores_filtrados = response.data;
        });
      Swal.fire(
        "Editado!",
        "El contenedor ha sido editado.",
        "success"
      );
      $("#editarContenedorModal").modal("hide");
    },
  },
};
</script>

<style lang="css">
#lado_derecho {
  width: 100% !important;
}
#lado_izquierdo {
  width: 100% !important;
}

.bg-primary {
  background-color: #0e5976 !important;
}
.btn-primary {
  background-color: #0e5976 !important;
}
/* estilos de switch */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: 0.4s;
  transition: 0.4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: 0.4s;
  transition: 0.4s;
}

input:checked + .slider {
  background-color: #0e5976;
}

input:focus + .slider {
  box-shadow: 0 0 1px #0e5976;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>



