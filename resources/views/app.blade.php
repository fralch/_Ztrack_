<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" type="image/png" href="images/icons/copos-de-nieve.png"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Zgroup</title>
    <link rel="stylesheet" href="//@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="recursos_login/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="recursos_login/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="recursos_login/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="recursos_login/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="recursos_login/daterangepicker/daterangepicker.css">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
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
	<script src="http://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  </body>
  	<script></script>
   	<style lang="css">
       body { background-color: #f5f5f5; }
      html {
        scrollbar-face-color: #646464;
        scrollbar-base-color: #646464;
        scrollbar-3dlight-color: #646464;
        scrollbar-highlight-color: #646464;
        scrollbar-track-color: #000;
        scrollbar-arrow-color: #000;
        scrollbar-shadow-color: #646464;
      }

      ::-webkit-scrollbar { width: 8px; height: 8px;}
      ::-webkit-scrollbar-button {  background-color: #fafbfd; }
      ::-webkit-scrollbar-track {  background-color: #646464;}
      ::-webkit-scrollbar-track-piece { background-color: #a3a3a3;}
      ::-webkit-scrollbar-thumb { height: 50px; background-color: #fafbfd; border-radius: 3px;}
      ::-webkit-scrollbar-corner { background-color: #646464;}
      ::-webkit-resizer { background-color: #fafbfd;}
	</style>
</html>