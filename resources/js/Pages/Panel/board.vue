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
                Alarmas 
                <canvas id="myChart_alarms"></canvas>
              </div>
              <div id="cargo-care" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                Eventos
                <canvas id="myChart_cargo"></canvas>
              </div>
              <div id="pti-result" class="col shadow-sm p-3 mb-5 bg-white rounded" style='display:none; ' >
                PTI result
                <canvas id="myChart_pti"></canvas>
              </div>
              <div id="reefers-fleet" class="col shadow-sm p-3 mb-5 bg-white rounded" style='display:none; ' >
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
                <div 
                  id="generador_grid" 
                  class="col shadow-sm p-3 mb-5 bg-white rounded " 
                  style="margin: -30px 15px 10px 15px; " 
                  v-if="tipo == 'Generador'"
                  >
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
                <div 
                  id="reefers_grid" 
                  class="col shadow-sm p-3 mb-5 bg-white rounded "
                  style="margin: -30px 15px 10px 15px;"
                  v-if="tipo == 'Reefer'"
                  >
                  
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
                        <td>{{reefer.nombre_contenedor}}</td>
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
                        <td>{{reefer.nombre_alarma}}</td>
                        <td>{{reefer.nombre_evento}}</td>
                        <td>{{reefer.modelo}}</td>
                    
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div 
                  id="myChart_principal_id" 
                  class="col shadow-sm p-3 mb-5 bg-white rounded " 
                  style="margin: -30px 15px 10px 15px; "
                   v-if="tipo != ''"
                  >
                   <canvas id="myChart_principal"  style="height:600px"></canvas>
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
var myChart_principal; 
var Chart_alarmas; 
var Chart_eventos; 
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
      tipo: "",
      mapa: null,
      ubicacion: new google.maps.LatLng(-12.0434112, -75.2178798), 
      contenedores_seleccionados:[],
      datos_tabla_reefer:[],
      datos_tabla_generador: [],
      //  ---- myChart_principal -----
      my_Chart_principal_dataset_reefer: [
                {
                  label: 'SetPoint',
                  data: [],
                  borderColor: '#FFC312',
                  backgroundColor: '#FFC312',
                  borderWidth: 1,
                },
                {
                  label: 'Temp_supply',
                  data: [],
                  borderColor: '#C4E538',
                  backgroundColor: '#C4E538',
                  borderWidth: 1,
                },
                {
                  label: 'Temp_return',
                  data: [],
                  borderColor: '#12CBC4',
                  backgroundColor: '#12CBC4',
                  borderWidth: 1,
                },
                {
                  label: 'Re_hume',
                  data: [],
                  borderColor: '#FDA7DF',
                  backgroundColor: '#FDA7DF',
                  borderWidth: 1,
                },
                {
                  label: 'Fuel_level',
                  data: [],
                  borderColor: '#ED4C67',
                  backgroundColor: '#ED4C67',
                  borderWidth: 1,
                },
                {
                  label: 'Vdc',
                  data: [],
                  borderColor: '#db0404',
                  backgroundColor: '#db0404',
                  borderWidth: 1,
                },
                {
                  label: 'Rpm',
                  data: [],
                  borderColor: '#009432',
                  backgroundColor: '#009432',
                  borderWidth: 1,
                },
                {
                  label: 'Freq',
                  data: [],
                  borderColor: '#0652DD',
                  backgroundColor: '#0652DD',
                  borderWidth: 1,
                },
                {
                  label: 'Vac',
                  data: [],
                  borderColor: '#9980FA',
                  backgroundColor: '#9980FA',
                  borderWidth: 1,
                },
                {
                  label: 'Temp_motor',
                  data: [],
                  borderColor: '#1B1464',
                  backgroundColor: '#1B1464',
                  borderWidth: 1,
                },
                {
                  label: 'Speed',
                  data: [],
                  borderColor: '#EE5A24',
                  backgroundColor: '#EE5A24',
                  borderWidth: 1,
                },
                {
                  label: 'Horometro',
                  data: [],
                  borderColor: '#6F1E51',
                  backgroundColor: '#6F1E51',
                  borderWidth: 1,
                },
                
              ],
      my_Chart_principal_dataset_generador: [
                {
                  label: 'SetPoint',
                  data: [],
                  borderColor: '#db0404',
                  backgroundColor: '#db0404',
                  borderWidth: 1,
                },
                {
                  label: 'TempSupply',
                  data: [],
                  borderColor: '#3498db',
                  backgroundColor: '#3498db',
                  borderWidth: 1,               
                },
                {
                  label: 'TempReturn',
                  data: [],
                  borderColor: '#9b59b6',
                  backgroundColor: '#9b59b6',
                  borderWidth: 1,               
                },
                {
                  label: 'ReHume',
                  data: [],
                  borderColor: '#e67e22',
                  backgroundColor: '#e67e22',
                  borderWidth: 1,               
                },
                {
                  label: 'ReCo2',
                  data: [],
                  borderColor: '#1abc9c',
                  backgroundColor: '#1abc9c',
                  borderWidth: 1,               
                },
                {
                  label: 'ReO2',
                  data: [],
                  borderColor: '#2c3e50',
                  backgroundColor: '#2c3e50',
                  borderWidth: 1,               
                },
                {
                  label: 'Alv',
                  data: [],
                  borderColor: '#f39c12',
                  backgroundColor: '#f39c12',
                  borderWidth: 1,               
                },
              ],
      my_Chart_principal_labels: [],
      my_Chart_principal_dataSetable: [],
      // --------- chart alarmas ------
      chart_alarma_labels : [],
      chart_alarma_dataset_data : [],
      //  -------- chart eventos -------
      chart_eventos_labels : [],
      chart_eventos_dataset_data : [],
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
    this.usuarioLogeado();
    this.bienvenida();
    this.iniciarMap();    
    this.TablaContenedores();
    // -- graficos circulares --
    this.Circular_iniciarGraficosAlarms();
    this.Circular_iniciarGraficosEventos();
    this.Circular_iniciarGraficosPTI();
    this.Circular_iniciarGraficosFleet();

    // this.myChartPrincipal();
  },

  methods: {
    autoRefresh(){
      let self = this;
      this.$nextTick(() => {
          
         async function f() {
          let promise = new Promise((resolve, reject) => {
            setTimeout(() => resolve(true), 120000)
          });
          let result = await promise; 
           if(self.tipo == 'Reefer'){
            let contenedor = self.contenedores_seleccionados.filter(element => element.tipo == 'Reefer');
            console.log(contenedor[0])
            self.select_contenedor(contenedor[0]); 
          }else if(self.tipo == 'Generador'){
            let contenedor = self.contenedores_seleccionados.filter(element => element.tipo == 'Generador');
            self.select_contenedor(contenedor[0]); 
            console.log(contenedor[0])
          }
        }

        f();
      });
    
    },
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
        
      });
   
    },
    iniciarMap() {
      let self = this;
      this.$nextTick(() => {
         self.mapa = new google.maps.Map(document.getElementById("map"), {
            center: self.ubicacion,
            zoom: 15,
          });

          let marcador = new google.maps.Marker({
            position: self.ubicacion,
            map: self.mapa,
          });
          marcador.setPosition( self.ubicacion);
          
      });
    },
   
    Circular_iniciarGraficosAlarms(){
      let self = this;
      var ctx_alarms = document.getElementById('myChart_alarms').getContext('2d');
      Chart_alarmas = new Chart(ctx_alarms, {
          type: 'doughnut',
          data: {
              labels: self.chart_alarma_labels,
              datasets: [{
                data: self.chart_alarma_dataset_data,
                backgroundColor: [
                  '#9c88ff',
                  '#fbc531',
                  '#e84118',
                  '#00a8ff',
                  '#718093',
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
    Circular_iniciarGraficosEventos(){
      let self = this;
      var ctx_cargo = document.getElementById('myChart_cargo').getContext('2d');
      Chart_eventos = new Chart(ctx_cargo, {
          type: 'doughnut',
          data: {
              labels:self.chart_eventos_labels ,
              datasets: [{
                label: 'My First Dataset',
                data: self.chart_eventos_dataset_data,
                backgroundColor: [
                  '#fc5c65', 
                  '#fd9644',
                  '#fed330',  
                  '#26de81',
                  '#a55eea',
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
      /* AQUI ES DONDE SE PONE EL NOMBRE DEL USUARIO EN EL NAV  */
      // this.$refs.layoutprincipal.usuario = (this.usuario_logeado[0].nombres + " " + this.usuario_logeado[0].apellidos).toUpperCase() ;
      this.$refs.layoutprincipal.usuario = (this.usuario_logeado[0].nombres ).toUpperCase() ;
     this.$refs.layoutprincipal.admin = this.usuario_logeado[0].admin; 
     
    },
    contenedores_prendidos(){
      this.contenedores_seleccionados = this.contenedores_encendidos;
    },
    select_contenedor(contenedor){
      let self = this;
      // console.log(contenedor.tipo);
      self.datos_tabla_reefer = [];
      self.datos_tabla_generador  = [];
      if (contenedor.tipo =='Reefer') {
           self.tipo= "Reefer";
      }
      if (contenedor.tipo =='Generador') {
           self.tipo= "Generador";
      }

      axios.post(route('contenedores.get_datos'), {
        id: contenedor.contenedores_id,
        tipo: contenedor.tipo
      }).then(response => {   
        // console.log(response.data);     
        if (contenedor.tipo == "Reefer") {
          self.datos_tabla_reefer = response.data;
        }
        if (contenedor.tipo == "Generador") {
          self.datos_tabla_generador = response.data;
        }
      }).then(()=>{
          if (contenedor.tipo == "Reefer") {
            let lat = self.datos_tabla_reefer[self.datos_tabla_reefer.length -1].latitud;
            let lon = self.datos_tabla_reefer[self.datos_tabla_reefer.length -1].longitud;
            // self.ubicacion = {lat: lat, lng: lon};
            self.ubicacion =  new google.maps.LatLng(lat, lon);
          }
          if (contenedor.tipo == "Generador") {
            let lat = self.datos_tabla_generador[self.datos_tabla_generador.length -1].latitud;
            let lon = self.datos_tabla_generador[self.datos_tabla_generador.length -1].longitud;
           self.ubicacion =  new google.maps.LatLng(lat, lon);
          }
      }).then(()=>{
        self.iniciarMap();
      }).then(()=>{
        self.setLabelsMyChartPrincipal();
      });
     
      
    // myChart_derecha_label_g
    },
    myChartPrincipal(){
      let self = this;
      
      const ctx_principal = document.getElementById('myChart_principal').getContext('2d');
      myChart_principal = new Chart(ctx_principal, {
        type: 'line',
        data: {
        labels: self.my_Chart_principal_labels,
        datasets: self.my_Chart_principal_dataSetable,
        },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              y: { 
                min: 0
                }
              },
          }
      });   
    //  console.log('myChart_principal');
      // myChart_principal.resize();
     
    },
    setLabelsMyChartPrincipal(){
      let self = this;
     async function set_labels(){ 
        self.my_Chart_principal_labels = [];
        if (self.tipo == "Reefer") {
        self.datos_tabla_reefer.map(function(datos_r, index){
              let date = new Date(datos_r.created_at);
              let day = date.getDate()
              let month = date.getMonth() + 1
              let year = date.getFullYear()
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
                self.my_Chart_principal_labels.push(`${day}-0${month}-${year} ${hours}:${minutes}:${seconds}`);
              }else{
                self.my_Chart_principal_labels.push(`${day}-${month}-${year}  ${hours}:${minutes}:${seconds}`);
              }
         });
        }
        if (self.tipo == "Generador") {
          self.datos_tabla_generador.map(function(datos_g, index){
              let date = new Date(datos_g.created_at);
              let day = date.getDate()
              let month = date.getMonth() + 1
              let year = date.getFullYear()
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
                self.my_Chart_principal_labels.push(`${day}-0${month}-${year} ${hours}:${minutes}:${seconds}`);
              }else{
                self.my_Chart_principal_labels.push(`${day}-${month}-${year}  ${hours}:${minutes}:${seconds}`);
              }
          });
        }
     }

      set_labels()
      .then(()=>{
        self.setDatosGraficoPrincipal();
      })
      .then(()=>{
        if (myChart_principal) {
          // myChart_principal.update();
          myChart_principal.destroy();
          self.myChartPrincipal();
        }else{
          self.myChartPrincipal();
        }
      })
      .then(()=>{
          // self.$nextTick(() => {
          //   console.log(self.datos_tabla_generador[0].contenedor_id); 
          // });
            // self.chart_alarma_labels = [];
            // self.chart_alarma_dataset_data = [];
            // self.chart_eventos_labels = [];
            // self.chart_eventos_dataset_data = [];

        if (self.tipo == "Reefer") {
          axios
          .post(route('contenedores.get_alarma_evento'), {
            id: self.datos_tabla_reefer[0].contenedor_id,
            tipo: self.tipo
          })
          .then(response => {
            
            if (response.data != 0 && self.chart_alarma_labels.length == 0) {
              response.data['alarma'].forEach(element => {
                self.chart_alarma_labels.push(element.nombre_alarma);
                self.chart_alarma_dataset_data.push(element.cantidad_alarma);
              });
              response.data['evento'].forEach(element => {
                self.chart_eventos_labels.push(element.nombre_evento);
                self.chart_eventos_dataset_data.push(element.cantidad_evento);
              });
            }
          }).then(()=>{
            Chart_alarmas.update(); 
          }).then(()=>{
            Chart_eventos.update(); 
          });
        }
        if (self.tipo == "Generador") {
          
          axios
          .post(route('contenedores.get_alarma_evento'), {
            id: self.datos_tabla_generador[0].contenedor_id,
            tipo: self.tipo
          })
          .then(response => {            
          });
        }
       
      }).then(()=>{
        self.autoRefresh();
      });
    },
    setDatosGraficoPrincipal(){
      let self = this;
      async function set_data(){ 
      self.my_Chart_principal_dataset = [];
       if (self.tipo == "Reefer") {
        self.datos_tabla_reefer.map(function(datos_r, index){
            self.my_Chart_principal_dataset_generador[0].data = [];
            self.my_Chart_principal_dataset_generador[1].data = [];
            self.my_Chart_principal_dataset_generador[2].data = [];
            self.my_Chart_principal_dataset_generador[3].data = [];
            self.my_Chart_principal_dataset_generador[4].data = [];
            self.my_Chart_principal_dataset_generador[5].data = [];
            self.my_Chart_principal_dataset_generador[6].data = [];

            self.my_Chart_principal_dataset_reefer[0].data.push(datos_r.set_point);
            self.my_Chart_principal_dataset_reefer[1].data.push(datos_r.temp_supply);
            self.my_Chart_principal_dataset_reefer[2].data.push(datos_r.temp_return);
            self.my_Chart_principal_dataset_reefer[3].data.push(datos_r.re_hume);
            self.my_Chart_principal_dataset_reefer[4].data.push(datos_r.fuel_level);
            self.my_Chart_principal_dataset_reefer[5].data.push(datos_r.vdc);
            self.my_Chart_principal_dataset_reefer[6].data.push(datos_r.rpm);
            self.my_Chart_principal_dataset_reefer[7].data.push(datos_r.freq);
            self.my_Chart_principal_dataset_reefer[8].data.push(datos_r.vac);
            self.my_Chart_principal_dataset_reefer[9].data.push(datos_r.temp_motor);
            self.my_Chart_principal_dataset_reefer[10].data.push(datos_r.speed);
            self.my_Chart_principal_dataset_reefer[11].data.push(datos_r.horometro);
        });
       }
       if (self.tipo == "Generador") {
          self.datos_tabla_generador.map(function(datos_g, index){
            self.my_Chart_principal_dataset_reefer[0].data = [];
            self.my_Chart_principal_dataset_reefer[1].data = [];
            self.my_Chart_principal_dataset_reefer[2].data = [];
            self.my_Chart_principal_dataset_reefer[3].data = [];
            self.my_Chart_principal_dataset_reefer[4].data = [];
            self.my_Chart_principal_dataset_reefer[5].data = [];
            self.my_Chart_principal_dataset_reefer[6].data = [];
            self.my_Chart_principal_dataset_reefer[7].data = [];
            self.my_Chart_principal_dataset_reefer[8].data = [];
            self.my_Chart_principal_dataset_reefer[9].data = [];
            self.my_Chart_principal_dataset_reefer[10].data = [];
            self.my_Chart_principal_dataset_reefer[11].data = [];
            
            self.my_Chart_principal_dataset_generador[0].data.push(datos_g.set_point);
            self.my_Chart_principal_dataset_generador[1].data.push(datos_g.temp_supply);
            self.my_Chart_principal_dataset_generador[2].data.push(datos_g.temp_return);
            self.my_Chart_principal_dataset_generador[3].data.push(datos_g.re_hume);
            self.my_Chart_principal_dataset_generador[4].data.push(datos_g.re_c_o2);
            self.my_Chart_principal_dataset_generador[5].data.push(datos_g.re_o2);
            self.my_Chart_principal_dataset_generador[6].data.push(datos_g.alv);
          });
        }
        // console.log('my_Chart_principal_dataset');
       }

       set_data().then(()=>{
          // if (myChart_principal) {
          //   myChart_principal.update();
          // }else{
          //   self.myChartPrincipal();
          // }
          if (self.tipo == "Reefer") {
          self.my_Chart_principal_dataSetable = self.my_Chart_principal_dataset_reefer;
          }
          if (self.tipo == "Generador") {
            self.my_Chart_principal_dataSetable = self.my_Chart_principal_dataset_generador;
          }
       });
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



