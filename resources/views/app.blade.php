<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" type="image/png" href="images/icons/copos-de-nieve.png"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Zgroup</title>

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
	<!-- mapas leaflet estilos-->
	  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    @routes
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
  </head>
  <body>
    @inertia
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!-- mapas leaflet js-->
	<!-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script> -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBm29s27MlvC9J4LkHW5gftm8QC-Pim48I&libraries=geometry"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
	<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	
  </body>
  	<script></script>
   	<style lang="css">
       body { background-color: #7CBEF8; }
      html {
        scrollbar-face-color: #fafbfd;
        scrollbar-base-color: #fafbfd;
        scrollbar-3dlight-color: #fafbfd;
        scrollbar-highlight-color: #fafbfd;
        scrollbar-track-color: #000;
        scrollbar-arrow-color: #000;
        scrollbar-shadow-color: #fafbfd;
      }
      
      ::-webkit-scrollbar { width: 8px; height: 8px;}
      ::-webkit-scrollbar-button {  background-color: #bfbfbf; }
      ::-webkit-scrollbar-track {  background-color: #fafbfd;}
      ::-webkit-scrollbar-track-piece { background-color: #fafbfd;}
      ::-webkit-scrollbar-thumb { height: 50px; background-color: #bfbfbf; border-radius: 3px;}
      ::-webkit-scrollbar-corner { background-color: #fafbfd;}
      ::-webkit-resizer { background-color: #bfbfbf;}
	</style>
</html>