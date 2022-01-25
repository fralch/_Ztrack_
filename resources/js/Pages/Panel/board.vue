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
              </div>
              <div id="micro-alarms" class="col shadow-sm p-3 mb-5 bg-white rounded" >
                micro alarms
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
                  Reefer grid history
                </div>
                <div id="reefers_grid" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px;">
                  Reefer grid 
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
  },

  methods: {
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
    
  },
};
</script>

<style lang="css">
#asset-search {
  padding: 10px;
  height: 300px;
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



