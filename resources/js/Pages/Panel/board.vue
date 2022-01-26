<template>
  <layoutprincipal ref="principal">
    <div
      class="slot_body slot_enviar_dinero"
      slot="component-view"
    >
      <div class="content" style="display: block" id="cuerpo">
        <!-- ---------------------- -->
        <div class="content" >
          <div class="row" style=" margin: 0 0 0 0px;">
            <div style="width: 30%; margin: 10px 0 0 0;">
              <div id="asset-search" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                asset search
                <input type="text" class="form-control" placeholder="Saved seaches" aria-label="Username" aria-describedby="basic-addon1" style="margin:5px">
                <div class="form-floating" style="margin:5px">
                  <textarea class="form-control" placeholder="Asset ID" id="floatingTextarea"></textarea>
                </div>
                <div class="form-floating" style="margin:5px">
                  <textarea class="form-control" placeholder="Booking Number" id="floatingTextarea"></textarea>
                </div>
                <input type="text" class="form-control" placeholder="Geofence Status" aria-label="Username" aria-describedby="basic-addon1" style="margin:5px">
                <input type="text" class="form-control" placeholder="Geofence ID" aria-label="Username" aria-describedby="basic-addon1" style="margin:5px">
                <input type="text" class="form-control" placeholder="OEM Type" aria-label="Username" aria-describedby="basic-addon1" style="margin:5px">
                <input type="text" class="form-control" placeholder="Country" aria-label="Username" aria-describedby="basic-addon1" style="margin:5px">
                <input type="text" class="form-control" placeholder="Reporting (min)" aria-label="Username" aria-describedby="basic-addon1" style="margin:5px">
                <div class="btn-group">
                  <a href="#" class="btn btn-primary active" aria-current="page">Search</a>
                  <a href="#" class="btn btn-primary">Clear</a>
                </div>
              </div>
              <div id="micro-alarms" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                micro alarms
                <canvas id="myChart_alarms"  height="width:100%; height:300px"></canvas>
              </div>
              <div id="cargo-care" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                cargo care
              </div>
              <div id="pti-result" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                pti result
              </div>
              <div id="reefers-fleet" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                reefers fleet 
              </div>
            </div>
            <div style="width: 70%;">
                <div id="total_reefers" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: 10px 15px 0px 15px;">
                  <div>Total Reefers: 192</div>
                  <div class="row" style="margin: 0 10px;">
                    <button type="button" class="col-3 btn btn-outline-success" >
                      <i class="bi bi-power"></i> 
                      <b style="font-size:1.2em;">91</b>
                      &nbsp;
                      Running
                    </button>
                    <button type="button" class="col-3 btn btn-outline-secondary" >
                      <i class="bi bi-power"></i> 
                      <b style="font-size:1.2em;">0</b>
                      &nbsp;
                      Standby
                    </button>
                    <button type="button" class="col-3 btn btn-outline-danger" >
                      <i class="bi bi-power"></i> 
                      <b style="font-size:1.2em;">0</b>
                      &nbsp;
                      Shutdown
                    </button>
                    <button type="button" class="col-3 btn btn-outline-dark" >
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
                <div id="reefers_grid_history" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px;">
                  <!-- dates -->
                  <!-- /// -->
                  <table id="reefer_table_history" class="table display nowrap">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Run</th>
                        <th scope="col">PWR</th>
                        <th scope="col">OEM</th>
                        <th scope="col">Reefer ID</th>
                        <th scope="col">Booking</th>
                        <th scope="col">Event</th>
                        <th scope="col">BLQRB</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Country</th>
                        <th scope="col">Alarm</th>
                        <th scope="col">Opr mode</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       
                        <td>   <i class="bi bi-power"></i> </td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                       
                        <td>   <i class="bi bi-power"></i> </td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                      </tr>
                      <tr> 
                        <td>   <i class="bi bi-power"></i> </td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div id="reefers_grid" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px;">
                  <table id="reefer_table" class="table display nowrap">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Run</th>
                        <th scope="col">PWR</th>
                        <th scope="col">OEM</th>
                        <th scope="col">Reefer ID</th>
                        <th scope="col">Booking</th>
                        <th scope="col">Event</th>
                        <th scope="col">BLQRB</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Country</th>
                        <th scope="col">Alarm</th>
                        <th scope="col">Opr mode</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       
                        <td>   <i class="bi bi-power"></i> </td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                       
                        <td>   <i class="bi bi-power"></i> </td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                      </tr>
                      <tr> 
                        <td>   <i class="bi bi-power"></i> </td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div id="reefers_grid" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px;">
                   <canvas id="myChart"  height="width:100%; height:400px"></canvas>
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
   
  },
  data() {
    return {
      // submited: false, 
      
    };
  },
 
 
  mounted() {
    this.iniciarMap();
    this.iniciarGraficos();
    this.datatabl();
  },

  methods: {
    datatabl() {
      // $('#reefer_table_history').DataTable();
       
        $("#reefer_table_history").DataTable({
          scrollX: true,
          paging: false,
          fixedColumns: {
            leftColumns: 0,
          },
        
          fixedHeader: true,
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
            aria: {
              sortAscending: ": activar para ordenar de forma ascendente",
              sortDescending: ": activar para ordenar de forma descendente",
            },
          },
          responsive: true,})
        $("#reefer_table").DataTable({
          scrollX: true,
          paging: false,
          fixedColumns: {
            leftColumns: 0,
          },
        
          fixedHeader: true,
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
            aria: {
              sortAscending: ": activar para ordenar de forma ascendente",
              sortDescending: ": activar para ordenar de forma descendente",
            },
          },
          responsive: true,})
        
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
    
  },
};
</script>

<style lang="css">
#asset-search {
  padding: 10px;
  height: 300px;
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



