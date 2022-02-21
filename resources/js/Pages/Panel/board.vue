<template>
  <layoutprincipal ref="layoutprincipal">  <!-- *** cargando layoutprincipal  **** -->
    <div
      class="slot_body slot_enviar_dinero"
      slot="component-view"
    >
      <div class="content" style="display: block" id="cuerpo">
        <!-- ---------------------- -->
        <div class="content" >
          <div class="row" style=" margin: 0 0 0 0px;">
            <div id='lado_izquierdo' style="margin: 10px 0 0 -5px;">
              <div id="asset-search" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                Asset search
                <input type="text" class="form-control" placeholder="Saved seaches" aria-label="Username" aria-describedby="basic-addon1" style="margin:5px">
                <div class="form-floating" style="margin:5px">
                  <textarea class="form-control" placeholder="Asset ID" id="floatingTextarea"></textarea>
                </div>
                <div class="form-floating" style="margin:5px">
                  <textarea class="form-control" placeholder="Booking Number" id="floatingTextarea"></textarea>
                </div>
                <input type="text" class="form-control" placeholder="Geofence Status" aria-label="Username" aria-describedby="basic-addon1" style="margin:5px">
                <div class="btn-group">
                  <a href="#" class="btn btn-primary active" aria-current="page">Search</a>
                  <a href="#" class="btn btn-primary">Clear</a>
                </div>
              </div>
              <div id="micro-alarms" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                Micro alarms
                <canvas id="myChart_alarms"></canvas>
              </div>
              <div id="cargo-care" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                Cargo care
                <canvas id="myChart_cargo"></canvas>
              </div>
              <div id="pti-result" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                PTI result
                <canvas id="myChart_pti"></canvas>
              </div>
              <div id="reefers-fleet" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                Reefers fleet 
                 <canvas id="myChart_fleet"></canvas>
              </div>
            </div>
            <div id='lado_derecho' style="">
                <div id="total_reefers" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: 10px 15px 0px 15px;">
                  <div>Total Reefers: {{contenedores_todos.length}}</div>
                  <div class="row" style="margin: 0 10px;">
                    <button type="button" class="col-3 btn btn-success"  @click="contenedores_prendidos">
                      <i class="bi bi-power"></i> 
                      <b style="font-size:1.2em;">{{contenedores_encendidos.length}}</b>
                      &nbsp;
                      Running
                    </button>
                    <button type="button" class="col-3 btn btn-secondary" >
                      <i class="bi bi-power"></i> 
                      <b style="font-size:1.2em;">0</b>
                      &nbsp;
                      Standby
                    </button>
                    <button type="button" class="col-3 btn btn-danger" >
                      <i class="bi bi-power"></i> 
                      <b style="font-size:1.2em;">0</b>
                      &nbsp;
                      Shutdown
                    </button>
                    <button type="button" class="col-3 btn btn-dark" >
                      <i class="bi bi-power"></i> 
                      <b style="font-size:1.2em;">0</b>
                      &nbsp;
                      Powerd Down
                    </button>
                  </div>
                </div>             
                <div id="asset_maps" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px;">
                   <div id="map" style="width:100%; height:365px;"></div>
                </div>            
                <div id="reefers_grid_history" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px; " >
                  <!-- dates -->
                  <!-- /// -->
                  <table class="table" id="tblContenedores" style="margin: 0 auto !important;">
                    <thead >
                      <tr class="bg-primary" style="color:white !important;">
                        <th scope="col" width='50px'>Ver</th>
                        <th scope="col" width='150px'>Contenedor</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col" width='250px'>Booking</th>
                        <th scope="col" width='50px'>Temp_contratada</th>
                        <th scope="col">Empresa</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr 
                        v-for="(contenedor, index) in contenedores_seleccionados" :key="index"
                      >
                        <td>
                         <!-- <i class="bi bi-power"></i> -->
                          <button :id="contenedor.tipo+'_'+contenedor.contenedores_id" type="button" class="btn btn-outline-primary" @click="select_contenedor(contenedor)"  >
                            <i class="bi bi-check-lg"></i>                    
                          </button>
                        </td>
                        <td>{{contenedor.nombre_contenedor}}</td>
                        <td>{{contenedor.tipo}}</td>
                        <td>{{contenedor.encendido}}</td>
                        <td>{{contenedor.descripcion_booking}}</td>
                        <td class="text-center">{{contenedor.temp_contratada}}C°</td>
                        <td>{{(contenedor.nombre_empresa).toUpperCase()}}</td>
                      </tr>
                      
                      
                    </tbody>
                  </table>
                </div>
                <div id="generador_grid" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px; display:none;">
                  <table  class="table display nowrap" id="tblDetalleContenedores_generadores">
                    <thead>
                      <tr class="bg-info" style="color:white !important;">
                        <th scope="col">N°</th>
                        <th scope="col">Generador</th>
                        <th scope="col">Set_point</th>
                        <th scope="col">Temp_supply</th>
                        <th scope="col">Temp_return</th>
                        <th scope="col">Re_hume</th>
                        <th scope="col">Re_co2</th>
                        <th scope="col">Re_o2</th>
                        <th scope="col">Alv</th>
                        <th scope="col">Latitud</th>
                        <th scope="col">Longitud</th>
                        <th scope="col">Status</th>
                        <th scope="col">Modelo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr 
                        v-for="(generador, index) in datos_tabla_generador" :key="index"
                      >
                        <td>{{index+1}}</td>
                        <td>{{generador.nombre_contenedor}}</td>
                        <td>{{generador.set_point}}</td>
                        <td>{{generador.temp_supply}}</td>
                        <td>{{generador.temp_return}}</td>
                        <td>{{generador.re_hume}}</td>
                        <td>{{generador.re_c_o2}}</td>
                        <td>{{generador.re_o2}}</td>
                        <td>{{generador.alv}}</td>
                        <td>{{generador.latitud}}</td>
                        <td>{{generador.longitud}}</td>
                        <td>{{generador.status}}</td>
                        <td>{{generador.modelo}}</td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                <div id="reefers_grid" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px; display:block;">
                  <table  class="table display nowrap" id="tblDetalleContenedores_reefers">
                    <thead>
                      <tr class="bg-info" style="color:white !important;">
                        <th scope="col">N°</th>
                        <th scope="col">Reefer</th>
                        <th scope="col">Set_point</th>
                        <th scope="col">Temp_supply</th>
                        <th scope="col">Tem_return</th>
                        <th scope="col">Re_hume</th>
                        <th scope="col">Fuel_level</th>
                        <th scope="col">Vdc</th>
                        <th scope="col">Rpm</th>
                        <th scope="col">Freq</th>
                        <th scope="col">Vac</th>
                        <th scope="col">Latitud</th>
                        <th scope="col">Longitud</th>
                        <th scope="col">Temp_motor</th>
                        <th scope="col">Status</th>
                        <th scope="col">Speed</th>
                        <th scope="col">Ecopower</th>
                        <th scope="col">Horometro</th>
                        <th scope="col">Alarma</th>
                        <th scope="col">Evento</th>
                        <th scope="col">Modelo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(reefer, index) in datos_tabla_reefer" :key="index">
                        <td>{{index+1}}</td>
                        <td>nombre_reefer</td>
                        <td>{{reefer.set_point}}</td>
                        <td>{{reefer.temp_supply}}</td>
                        <td>{{reefer.temp_return}}</td>
                        <td>{{reefer.re_hume}}</td>
                        <td>{{reefer.fuel_level}}</td>
                        <td>{{reefer.vdc}}</td>
                        <td>{{reefer.rpm}}</td>
                        <td>{{reefer.freq}}</td>
                        <td>{{reefer.vac}}</td>
                        <td>{{reefer.latitud}}</td>
                        <td>{{reefer.longitud}}</td>
                        <td>{{reefer.temp_motor}}</td>
                        <td>{{reefer.status}}</td>
                        <td>{{reefer.speed}}</td>
                        <td>{{reefer.ecopower}}</td>
                        <td>{{reefer.horometro}}</td>
                        <td>{{reefer.alarma_id}}</td>
                        <td>{{reefer.evento_id}}</td>
                        <td>{{reefer.modelo}}</td>
                    
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div id="generadores_grid" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px; display:block;">
                    <p>Generadores</p>
                   <canvas id="myChart_generadores"  style="width:100%; height:400px"></canvas>
                </div>
                <div id="reefers_grid" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px; display:block;">
                    <p>Reefers</p>
                    <canvas id="myChart_reefers"  style="width:100%; height:400px"></canvas>
                </div>
              
            </div>
          </div>
            <!-- <div class="row">
            <div class="col shadow-sm p-3 mb-5 bg-white rounded">col</div>
            <div class="col">col</div> -->
          </div>
        </div>
          
        
        <!-- ---------------------- -->
      
    </div>
    
  </layoutprincipal>
</template>

<script>
import layoutprincipal from "../layout.vue";
export default {
  components: { 
    layoutprincipal, 
  },
  props: {
    // tu_cuenta:Array,
    usuario_logeado: Array,
    empresa_logeado: Array,
    contenedores_todos : Array,
    contenedores_encendidos: Array,   
  },
  data() {
    return {
      // submited: false, 
      contenedores_seleccionados:[],
      datos_tabla_reefer:[],
      datos_tabla_generador: [],
      myChart_derecha_label_g: [],
      myChart_derecha_label_r: [],
      Chart_datos_g: {
        set_point: [],
        temp_supply: [],
        temp_return: [],
        re_hume: [],
        re_c_o2: [],
        re_o2: [],
        alv: [],
      },
      Chart_datos_r:{
        set_point: [],
        temp_supply: [],
        temp_return: [],
        re_hume: [],
        fuel_level: [],
        vdc: [],
        rpm: [],
        freq: [],
        vac: [],
        temp_motor: [],
        speed: [],
        horometro: [],

      },
    };
  },
  watch: {
    contenedores_seleccionados(){
      $("#tblContenedores").DataTable().destroy();
      this.TablaContenedores();
    },
    datos_tabla_generador(){
      // console.log(screen.width);      
      $("#tblDetalleContenedores_generadores").DataTable().destroy();
      this.TablaDetalleContenedores_g();
      // this.iniciarGraficos();
    },
    datos_tabla_reefer(){
      $("#tblDetalleContenedores_reefers").DataTable().destroy();
      this.TablaDetalleContenedores_r();
      // this.iniciarGraficos();
    },
  },
 
  mounted() {
    this.iniciarMap();
    // this.iniciarGraficos();
    this.Circular_iniciarGraficosAlarms();
    this.Circular_iniciarGraficosCargo();
    this.Circular_iniciarGraficosPTI();
    this.Circular_iniciarGraficosFleet();
    this.TablaContenedores();
    this.TablaDetalleContenedores_g();
    this.TablaDetalleContenedores_r();
    this.usuarioLogeado();
    this.bienvenida();
  },

  methods: {
    
    bienvenida() {
     Swal.fire({
        title: 'Bienvenido!',
        icon: 'success',
        text: (this.usuario_logeado[0].nombres + " "+ this.usuario_logeado[0].apellidos ).toUpperCase(),
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK!'
      })
    
    },
    TablaContenedores() {
      let self = this;
      this.$nextTick(() => {
        var table = $('#tblContenedores').DataTable({
           
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
    TablaDetalleContenedores_r() {
     let self = this;
      this.$nextTick(() => {
        var table2 = $('#tblDetalleContenedores_reefers').DataTable({
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
      // this.abrirGrafico('reefer');    
    },
    TablaDetalleContenedores_g() {
     let self = this;
      this.$nextTick(() => {
        var table = $('#tblDetalleContenedores_generadores').DataTable({
           scrollX: "100%",
           responsive: true,
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
              
          },       
        });
        if (screen.width <= 1024) {
          console.log(table.scrollX);
          // table.scrollX = true;
        }
      });
      // this.abrirGrafico('generador');        
    },
    iniciarMap() {
      // var map = L.map('map').setView([51.505, -0.09], 13);
     let map;
     map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -12.0464, lng: -77.0428 },
        zoom: 12,
      });
    },
    Generadores_iniciarGraficos(){
      let self = this;
      var ctx = document.getElementById('myChart_generadores').getContext('2d');
           
      var myChart_derecha = new Chart(ctx, {
           animationEnabled: true,
           theme: "light2",
          type: 'line',
          data: {
              labels: self.myChart_derecha_label_g,
              datasets: [
                {
                  label: 'SetPoint',
                  data: self.Chart_datos_g.set_point,
                  borderColor: '#db0404',
                  backgroundColor: '#db0404',
                  borderWidth: 1,
                },
                {
                  label: 'TempSupply',
                  data:self.Chart_datos_g.temp_supply,
                  borderColor: '#3498db',
                  backgroundColor: '#3498db',
                  borderWidth: 1,               
                },
                {
                  label: 'TempReturn',
                  data: self.Chart_datos_g.temp_return,
                  borderColor: '#9b59b6',
                  backgroundColor: '#9b59b6',
                  borderWidth: 1,               
                },
                {
                  label: 'ReHume',
                  data:self.Chart_datos_g.re_hume,
                  borderColor: '#e67e22',
                  backgroundColor: '#e67e22',
                  borderWidth: 1,               
                },
                {
                  label: 'ReCo2',
                  data:self.Chart_datos_g.re_c_o2,
                  borderColor: '#1abc9c',
                  backgroundColor: '#1abc9c',
                  borderWidth: 1,               
                },
                {
                  label: 'ReO2',
                  data:self.Chart_datos_g.re_o2,
                  borderColor: '#2c3e50',
                  backgroundColor: '#2c3e50',
                  borderWidth: 1,               
                },
                {
                  label: 'Alv',
                  data: self.Chart_datos_g.alv,
                  borderColor: '#f39c12',
                  backgroundColor: '#f39c12',
                  borderWidth: 1,               
                },
              ]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
     
    },
    Reefers_iniciarGraficos(){
      let self = this;
      var ctxr = document.getElementById('myChart_reefers').getContext('2d');
           
      var myChart_derecha_r = new Chart(ctxr, {
           animationEnabled: true,
           theme: "light2",
          type: 'line',
          data: {
              labels: self.myChart_derecha_label_r,
              datasets: [
                {
                  label: 'SetPoint',
                  data: self.Chart_datos_r.set_point,
                  borderColor: '#FFC312',
                  backgroundColor: '#FFC312',
                  borderWidth: 1,
                },
                {
                  label: 'Temp_supply',
                  data: self.Chart_datos_r.temp_supply,
                  borderColor: '#C4E538',
                  backgroundColor: '#C4E538',
                  borderWidth: 1,
                },
                {
                  label: 'Temp_return',
                  data: self.Chart_datos_r.temp_return,
                  borderColor: '#12CBC4',
                  backgroundColor: '#12CBC4',
                  borderWidth: 1,
                },
                {
                  label: 'Re_hume',
                  data: self.Chart_datos_r.re_hume,
                  borderColor: '#FDA7DF',
                  backgroundColor: '#FDA7DF',
                  borderWidth: 1,
                },
                {
                  label: 'Fuel_level',
                  data: self.Chart_datos_r.fuel_level,
                  borderColor: '#ED4C67',
                  backgroundColor: '#ED4C67',
                  borderWidth: 1,
                },
                {
                  label: 'Vdc',
                  data: self.Chart_datos_r.vdc,
                  borderColor: '#db0404',
                  backgroundColor: '#db0404',
                  borderWidth: 1,
                },
                {
                  label: 'Rpm',
                  data: self.Chart_datos_r.rpm,
                  borderColor: '#009432',
                  backgroundColor: '#009432',
                  borderWidth: 1,
                },
                {
                  label: 'Freq',
                  data: self.Chart_datos_r.freq,
                  borderColor: '#0652DD',
                  backgroundColor: '#0652DD',
                  borderWidth: 1,
                },
                {
                  label: 'Vac',
                  data: self.Chart_datos_r.vac,
                  borderColor: '#9980FA',
                  backgroundColor: '#9980FA',
                  borderWidth: 1,
                },
                {
                  label: 'Temp_motor',
                  data: self.Chart_datos_r.temp_motor,
                  borderColor: '#1B1464',
                  backgroundColor: '#1B1464',
                  borderWidth: 1,
                },
                {
                  label: 'Speed',
                  data: self.Chart_datos_r.speed,
                  borderColor: '#EE5A24',
                  backgroundColor: '#EE5A24',
                  borderWidth: 1,
                },
                {
                  label: 'Horometro',
                  data: self.Chart_datos_r.horometro,
                  borderColor: '#6F1E51',
                  backgroundColor: '#6F1E51',
                  borderWidth: 1,
                },
                
              ]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
    },
    Circular_iniciarGraficosAlarms(){
      var ctx_alarms = document.getElementById('myChart_alarms').getContext('2d');
      var myChart_alarms = new Chart(ctx_alarms, {
          type: 'doughnut',
          data: {
              labels: [
                'Red',
                'Blue',
                'Yellow'
              ],
              datasets: [{
                label: 'My First Dataset',
                data: [30, 500, 100],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
    },
    Circular_iniciarGraficosCargo(){
      var ctx_cargo = document.getElementById('myChart_cargo').getContext('2d');
      var myChart_cargo = new Chart(ctx_cargo, {
          type: 'doughnut',
          data: {
              labels: [
                'Red',
                'Blue',
                'Yellow'
              ],
              datasets: [{
                label: 'My First Dataset',
                data: [30, 90, 100],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
    },
    Circular_iniciarGraficosPTI(){
      var ctx_pti = document.getElementById('myChart_pti').getContext('2d');
      var myChart_pti = new Chart(ctx_pti, {
          type: 'doughnut',
          data: {
              labels: [
                'Red',
                'Blue',
                'Yellow'
              ],
              datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
    },
    Circular_iniciarGraficosFleet(){
      var ctx_fleet = document.getElementById('myChart_fleet').getContext('2d');
      var myChart_fleet = new Chart(ctx_fleet, {
          type: 'line',
          data: {
              labels: [
                
              ],
              datasets: [{
                label: 'Reefers fleet',
                data: [300, 50, 100],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
    },
    usuarioLogeado(){
      // this.$refs.layoutprincipal.usuario = (this.usuario_logeado[0].nombres + " " + this.usuario_logeado[0].apellidos).toUpperCase() ;
      this.$refs.layoutprincipal.usuario = (this.usuario_logeado[0].nombres ).toUpperCase() ;
     
    },
    contenedores_prendidos(){
      this.contenedores_seleccionados = this.contenedores_encendidos;
    },
    select_contenedor(contenedor){
      let self = this;
      // console.log(contenedor.tipo);
      self.datos_tabla_reefer = [];
      self.datos_tabla_generador  = [];
      if (contenedor.tipo == "Reefer") {
        $('#reefers_grid').css('display', 'block');
        $('#generador_grid').css('display', 'none');
       
      }
      if (contenedor.tipo == "Generador") {
       $('#reefers_grid').css('display', 'none');
       $('#generador_grid').css('display', 'block');
       
      }

      axios.post(route('contenedores.get_datos'), {
        id: contenedor.contenedores_id,
        tipo: contenedor.tipo
      }).then(response => {   
        // console.log(response.data);     
        if (contenedor.tipo == "Reefer") {
          self.datos_tabla_reefer = response.data;
          response.data.map(function(datos_r, index){
            // self.myChart_derecha_label_r.push(fecha.created_at);
            let date = new Date(datos_r.created_at);
            let day = date.getDate()
            let month = date.getMonth() + 1
            let year = date.getFullYear()

            // -- horas ----
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let seconds = date.getSeconds();
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
              
            if (seconds < 10) {
                seconds = "0" + seconds;
            }
            
            if(month < 10){
              self.myChart_derecha_label_r.push(`${day}-0${month}-${year} ${hours}:${minutes}:${seconds}`);
            }else{
              self.myChart_derecha_label_r.push(`${day}-${month}-${year}  ${hours}:${minutes}:${seconds}`);
            }

            
            self.Chart_datos_r.set_point.push(datos_r.set_point);
            self.Chart_datos_r.temp_supply.push(datos_r.temp_supply);
            self.Chart_datos_r.temp_return.push(datos_r.temp_return);
            self.Chart_datos_r.re_hume.push(datos_r.re_hume);
            self.Chart_datos_r.fuel_level.push(datos_r.fuel_level);
            self.Chart_datos_r.vdc.push(datos_r.vdc);
            self.Chart_datos_r.rpm.push(datos_r.rpm);
            self.Chart_datos_r.freq.push(datos_r.freq);
            self.Chart_datos_r.vac.push(datos_r.vac);
            self.Chart_datos_r.temp_motor.push(datos_r.temp_motor);
            self.Chart_datos_r.speed.push(datos_r.speed);
            self.Chart_datos_r.horometro.push(datos_r.horometro);
           
          });
        }
        if (contenedor.tipo == "Generador") {
          self.datos_tabla_generador = response.data;
          response.data.map(function(datos_g, index){
            let date = new Date(datos_g.created_at);
            let day = date.getDate()
            let month = date.getMonth() + 1
            let year = date.getFullYear()

            // -- horas ----
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let seconds = date.getSeconds();
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
              
            if (seconds < 10) {
                seconds = "0" + seconds;
            }

            if(month < 10){
              self.myChart_derecha_label_g.push(`${day}-0${month}-${year} ${hours}:${minutes}:${seconds}`);
            }else{
              self.myChart_derecha_label_g.push(`${day}-${month}-${year}  ${hours}:${minutes}:${seconds}`);
            }

            
            self.Chart_datos_g.set_point.push(datos_g.set_point);
            self.Chart_datos_g.temp_supply.push(datos_g.temp_supply);
            self.Chart_datos_g.temp_return.push(datos_g.temp_return);
            self.Chart_datos_g.re_hume.push(datos_g.re_hume);
            self.Chart_datos_g.re_c_o2.push(datos_g.re_c_o2);
            self.Chart_datos_g.re_o2.push(datos_g.re_o2);
            self.Chart_datos_g.alv.push(datos_g.alv);
          });
        }
      }).then(()=>{
        if (self.datos_tabla_generador.length > 0) {
            self.Generadores_iniciarGraficos();        
        }
        if (self.datos_tabla_reefer.length > 0) {
           
            self.Reefers_iniciarGraficos();            
        }
       
      });
     
      
    // myChart_derecha_label_g
    },
    abrirGrafico(tipo){
      if (this.datos_tabla_reefer.length > 0) {
         console.log('reefer_g'); 
        // $('#reefers_grid').css('display', 'block');
        // $('#generador_grid').css('display', 'none');
        // this.Reefers_iniciarGraficos();        
      }
      if (this.datos_tabla_generador.length > 0) {
        console.log('generador_g');  
        // $('#reefers_grid').css('display', 'none');
        // $('#generador_grid').css('display', 'block');
        // this.Generadores_iniciarGraficos();                
      }

    },
  },  
};
</script>

<style lang="css">
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



