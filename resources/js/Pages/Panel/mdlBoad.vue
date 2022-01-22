<template>
  <div id="mdlBoard" class="modal" style="margin-top:60px;  ">
    <!-- Modal content -->
    <div class="modal-content" style="">
      <div class="content " style="display: block;">
         <div class="row" style="height: 100% !important,  overflow-y: scroll">
            <div class="col-2" style="">
              <div id="tablaContenedor" style="">
                <table class="table table-striped">
                  <thead >
                    <tr>          
                      <th scope="col">CONTENEDORES</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Contenedor 1 - 0.00° <span class="text-right" style='font-size:10px; color:#BBBBBB; '> &nbsp; &nbsp; Hace 35 segundos</span>  </td>
                    </tr>
                    <tr>
                      <td>Contenedor 2 - 0.00° <span style='font-size:10px; color:#BBBBBB; '> &nbsp; &nbsp;  Hace 35 segundos </span> </td>
                    </tr>
                    <tr>
                      <td>Contenedor 3 - 0.00° <span style='font-size:10px; color:#BBBBBB; '> &nbsp; &nbsp; Hace 35 segundos </span> </td>
                    </tr>
                    <tr>
                      <td>Contenedor 4 - 0.00° <span style='font-size:10px; color:#BBBBBB; '> &nbsp; &nbsp; Hace 35 segundos </span> </td>
                    </tr>
                    <tr>
                      <td>Contenedor 5 - 0.00° <span style='font-size:10px; color:#BBBBBB; '> &nbsp; &nbsp; Hace 35 segundos </span> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div id="info">
                  <table class="table">
                    <thead  class="thead-dark">
                      <tr>
                        <th scope="col">INFORMACIÓN</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                                Identificador
                              </div>
                              <div class="col-6">
                                ZGUU204854-3
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                                Última actualización
                              </div>
                              <div class="col-6">
                                Hace 53 segundos
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                                Fecha y Hora
                              </div>
                              <div class="col-6">
                                2022-01-21 12:00:00
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                                Modelo
                              </div>
                              <div class="col-6">
                                GenSet
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                                Booking Client
                              </div>
                              <div class="col-6">
                                CH345
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               SetPoint
                              </div>
                              <div class="col-6">
                                0.00 ℃
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Estado
                              </div>
                              <div class="col-6">
                                Desconectado
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Fecha de Apagado
                              </div>
                              <div class="col-6">
                                2022-01-21 12:00:00
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Fecha de Encendido
                              </div>
                              <div class="col-6">
                                2022-01-21 12:00:00
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Latitud
                              </div>
                              <div class="col-6">
                                -11.703915
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Longitud
                              </div>
                              <div class="col-6">
                                -77.187972
                              </div>
                          </div>      
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
              </div>
            </div>
            <div class="col-7">
              <div class="row">
                <div class="col-12">
                  <div id="map" style="width:100%; height:400px;"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <canvas id="myChart"  height="width:100%; height:400px"></canvas>
                </div>
              </div>
            </div>
            <div class="col-3" style="">
               <div id="reefer">
                  <table class="table">
                    <thead  class="thead-dark">
                      <tr>
                        <th scope="col">REEFER</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                                Identificador
                              </div>
                              <div class="col-6">
                                ZGUU204854-3
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                                Última actualización
                              </div>
                              <div class="col-6">
                                Hace 53 segundos
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                                Fecha y Hora
                              </div>
                              <div class="col-6">
                                2022-01-21 12:00:00
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                                Modelo
                              </div>
                              <div class="col-6">
                                GenSet
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                                Booking Client
                              </div>
                              <div class="col-6">
                                CH345
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               SetPoint
                              </div>
                              <div class="col-6">
                                0.00 ℃
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Estado
                              </div>
                              <div class="col-6">
                                Desconectado
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Fecha de Apagado
                              </div>
                              <div class="col-6">
                                2022-01-21 12:00:00
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Fecha de Encendido
                              </div>
                              <div class="col-6">
                                2022-01-21 12:00:00
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Latitud
                              </div>
                              <div class="col-6">
                                -11.703915
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Longitud
                              </div>
                              <div class="col-6">
                                -77.187972
                              </div>
                          </div>      
                        </td>
                      </tr>
                    </tbody>
                  </table>
              </div>
               <div id="generador">
                  <table class="table" style=" height: 100%; overflow-y: scroll;">
                    <thead  class="thead-dark">
                      <tr>
                        <th scope="col">GENERADOR</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                                Combustible
                              </div>
                              <div class="col-6">
                                0.00
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               RPM
                              </div>
                              <div class="col-6">
                                0
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Voltaje de Salida
                              </div>
                              <div class="col-6">
                                0.00 V
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Voltaje de batería
                              </div>
                              <div class="col-6">
                                0.00 V
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Frecuencia
                              </div>
                              <div class="col-6">
                                0.00000 
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Temp. Motor
                              </div>
                              <div class="col-6">
                                0.00000 
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Velocidad  
                              </div>
                              <div class="col-6">
                                high
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Ecopower  
                              </div>
                              <div class="col-6">
                                on
                              </div>
                          </div>      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row" style='font-size:0.8em; '>
                              <div class="col-6">
                               Horometro  
                              </div>
                              <div class="col-6">
                                2 316.000000
                              </div>
                          </div>      
                        </td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
         </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  components: { 
    
   },
  props: {

  },
  data() {
    return {
      // clave_ale: null,
    };
  },

  mounted() {
    this.iniciarMap();
    this.iniciarGraficos();
  },
  methods: {
    iniciarMap() {
      var map = L.map('map').setView([51.505, -0.09], 13);
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

</style>

