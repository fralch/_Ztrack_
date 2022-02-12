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
            <div style="width: 25%; margin: 10px 0 0 -5px;">
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
            <div style="width: 75%;">
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
                        <th scope="col" >Ver</th>
                        <th scope="col" width='150px'>Contenedor</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col" width='250px'>Booking</th>
                        <th scope="col" width='50px'>Temperatura_contratada</th>
                        <th scope="col">Empresa</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr 
                        v-for="(contenedor, index) in contenedores_seleccionados" :key="index"
                        @click="select_contenedor(contenedor)" 
                      >
                        <td>
                         <!-- <i class="bi bi-power"></i> -->
                          <button type="button" class="btn btn-outline-primary" >
                            <i class="bi bi-check-lg"></i>                    
                          </button>
                        </td>
                        <td>{{contenedor.nombre_contenedor}}</td>
                        <td>{{contenedor.tipo}}</td>
                        <td>{{contenedor.encendido}}</td>
                        <td>{{contenedor.descripcion_booking}}</td>
                        <td class="text-center">{{contenedor.temp_contratada}}C°</td>
                        <td>{{contenedor.nombre_empresa}}</td>
                      </tr>
                      
                      
                    </tbody>
                  </table>
                </div>
                <div id="generador_grid" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px; display:block;">
                  <table  class="table display nowrap" id="tblDetalleContenedores_generadores">
                    <thead>
                      <tr class="bg-info" style="color:white !important;">
                        <th scope="col">N°</th>
                        <th scope="col">Generador</th>
                        <th scope="col">Set_point</th>
                        <th scope="col">Temp_supply</th>
                        <th scope="col">Tem_return</th>
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
                      
                      
                    </tbody>
                  </table>
                </div>
                <div id="reefers_grid" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px; display:none;">
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
                      
                      
                    </tbody>
                  </table>
                </div>
                <div id="reefers_grid" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px;">
                   <canvas id="myChart"  style="width:100%; height:400px"></canvas>
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
      
    };
  },
  watch: {
    contenedores_seleccionados(){
      $("#tblContenedores").DataTable().destroy();
      this.TablaContenedores();
    },
  },
 
  mounted() {
    this.iniciarMap();
    this.iniciarGraficos();
    this.iniciarGraficosAlarms();
    this.iniciarGraficosCargo();
    this.iniciarGraficosPTI();
    this.iniciarGraficosFleet();
    this.TablaContenedores();
    this.TablaDetalleContenedores();
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
    TablaDetalleContenedores() {
     let self = this;
      this.$nextTick(() => {
        var table = $('#tblDetalleContenedores_generadores').DataTable({
           scrollX: true,
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
        var table2 = $('#tblDetalleContenedores_reefers').DataTable({
           scrollX: true,
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
    iniciarMap() {
      // var map = L.map('map').setView([51.505, -0.09], 13);
     let map;
     map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -12.0464, lng: -77.0428 },
        zoom: 12,
      });
    },
    iniciarGraficos(){
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
              datasets: [{
                  label: '# SetPoint',
                  data: [12, 19, 3, 5, 2, 3],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
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
    iniciarGraficosAlarms(){
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
    iniciarGraficosCargo(){
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
    iniciarGraficosPTI(){
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
    iniciarGraficosFleet(){
      var ctx_fleet = document.getElementById('myChart_fleet').getContext('2d');
      var myChart_fleet = new Chart(ctx_fleet, {
          type: 'line',
          data: {
              labels: [
                'Red',
                'Blue',
                'Yellow'
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
    select_contenedor(x){
      console.log(x.tipo);
      if (x.tipo == "Reefer") {
       $('#reefers_grid').css('display', 'block');
       $('#generador_grid').css('display', 'none');
      }
      if (x.tipo == "Generador") {
       $('#reefers_grid').css('display', 'none');
       $('#generador_grid').css('display', 'block');
      }

    },
  },
};
</script>

<style lang="css">
#asset-search {
  padding: 10px;
  height: 320px;
  overflow-y: scroll;
}
#reefers_grid_history{
  /* overflow-x: scroll; */
  overflow-y: scroll;
}
#reefers_grid{
  /* overflow-x: scroll; */
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
 
</style>



