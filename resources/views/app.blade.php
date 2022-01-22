<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<!-- mapas leaflet estilos-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    @routes
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
  </head>
  <body>
    @inertia
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<!-- mapas leaflet js-->
	<!-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script> -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBm29s27MlvC9J4LkHW5gftm8QC-Pim48I&libraries=geometry"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
  </body>
  <script>
    // ---------Responsive-navbar-active-animation-----------
    function test(){
      var tabsNewAnim = $('#navbarSupportedContent');
      var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
      var activeItemNewAnim = tabsNewAnim.find('.active');
      var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
      var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
      var itemPosNewAnimTop = activeItemNewAnim.position();
      var itemPosNewAnimLeft = activeItemNewAnim.position();
      $(".hori-selector").css({
        "top":itemPosNewAnimTop.top + "px", 
        "left":itemPosNewAnimLeft.left + "px",
        "height": activeWidthNewAnimHeight + "px",
        "width": activeWidthNewAnimWidth + "px"
      });
      $("#navbarSupportedContent").on("click","li",function(e){
        $('#navbarSupportedContent ul li').removeClass("active");
        $(this).addClass('active');
        var activeWidthNewAnimHeight = $(this).innerHeight();
        var activeWidthNewAnimWidth = $(this).innerWidth();
        var itemPosNewAnimTop = $(this).position();
        var itemPosNewAnimLeft = $(this).position();
        $(".hori-selector").css({
          "top":itemPosNewAnimTop.top + "px", 
          "left":itemPosNewAnimLeft.left + "px",
          "height": activeWidthNewAnimHeight + "px",
          "width": activeWidthNewAnimWidth + "px"
        });
      });
    }
    $(document).ready(function(){
      setTimeout(function(){ test(); });
    });
    $(window).on('resize', function(){
      setTimeout(function(){ test(); }, 500);
    });
    $(".navbar-toggler").click(function(){
      $(".navbar-collapse").slideToggle(300);
      setTimeout(function(){ test(); });
    });



      // --------------add active class-on another-page move----------
      jQuery(document).ready(function($){
        // Get current path and find target link
        var path = window.location.pathname.split("/").pop();

        // Account for home page with empty path
        if ( path == '' ) {
          path = 'index.html';
        }

        var target = $('#navbarSupportedContent ul li a[href="'+path+'"]');
        // Add active class to target link
        target.parent().addClass('active');
      });
    </script>
   <style lang="css">
	@import url('https://fonts.googleapis.com/css?family=Roboto');
	
    
    
	body{
		font-family: 'Roboto', sans-serif;
	}
	* {
		margin: 0;
		padding: 0;
	}
	i {
		margin-right: 10px;
	}
	a{
	text-decoration: none;
	color: #fff;
	}
	a:link,
	a:visited,
	a:active {
	text-decoration: none;
	}
	a:hover {
	color: white;
	text-decoration: none;
	}
	/*----------bootstrap-navbar-css------------*/
	.navbar-logo{
		padding: 15px;
		color: #fff;
	}
	.navbar-mainbg{
		background-color: #232C4C;
		padding: 0px;
	}
	#navbarSupportedContent{
		overflow: hidden;
		position: relative;
	}
	#navbarSupportedContent ul{
		padding: 0px;
		margin: 0px;
	}
	#navbarSupportedContent ul li a i{
		margin-right: 10px;
	}
	#navbarSupportedContent li {
		list-style-type: none;
		float: left;
	}
	#navbarSupportedContent ul li a{
		color: rgba(255,255,255,0.5);
		text-decoration: none;
		font-size: 15px;
		display: block;
		padding: 20px 20px;
		transition-duration:0.6s;
		transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
		position: relative;
	}
	#navbarSupportedContent>ul>li.active>a{
		color: #232C4C;
		background-color: transparent;
		transition: all 0.7s;
	}
	#navbarSupportedContent a:not(:only-child):after {
		content: "\f105";
		position: absolute;
		right: 20px;
		top: 10px;
		font-size: 14px;
		font-family: "Font Awesome 5 Free";
		display: inline-block;
		padding-right: 3px;
		vertical-align: middle;
		font-weight: 900;
		transition: 0.5s;
	}
	#navbarSupportedContent .active>a:not(:only-child):after {
		transform: rotate(90deg);
	}
	.hori-selector{
		
		display:inline-block;
		position:absolute;
		height: 100%;
		top: 0px;
		left: 0px;
		transition-duration:0.6s;
		transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
		background-color: #fff;
		border-top-left-radius: 15px;
		border-top-right-radius: 15px;
		margin-top: 10px;
	}
	.hori-selector .right,
	.hori-selector .left{
		position: absolute;
		width: 25px;
		height: 25px;
		background-color: #fff;
		bottom: 10px;
	}
	.hori-selector .right{
		right: -25px;
	}
	.hori-selector .left{
		left: -25px;
	}
	.hori-selector .right:before,
	.hori-selector .left:before{
		content: '';
		position: absolute;
		width: 50px;
		height: 50px;
		border-radius: 50%;
		background-color: #232C4C;
	}
	.hori-selector .right:before{
		bottom: 0;
		right: -25px;
	}
	.hori-selector .left:before{
		bottom: 0;
		left: -25px;
	}
	@media(min-width: 992px){
		.navbar-expand-custom {
			-ms-flex-flow: row nowrap;
			flex-flow: row nowrap;
			-ms-flex-pack: start;
			justify-content: flex-start;
		}
		.navbar-expand-custom .navbar-nav {
			-ms-flex-direction: row;
			flex-direction: row;
		}
		.navbar-expand-custom .navbar-toggler {
			display: none;
		}
		.navbar-expand-custom .navbar-collapse {
			display: -ms-flexbox!important;
			display: flex!important;
			-ms-flex-preferred-size: auto;
			flex-basis: auto;
		}
	}
	@media (max-width: 991px){
		#navbarSupportedContent ul li a{
			padding: 12px 30px;
		}
		.hori-selector{
			margin-top: 0px;
			margin-left: 10px;
			border-radius: 0;
			border-top-left-radius: 25px;
			border-bottom-left-radius: 25px;
		}
		.hori-selector .left,
		.hori-selector .right{
			right: 10px;
		}
		.hori-selector .left{
			top: -25px;
			left: auto;
		}
		.hori-selector .right{
			bottom: -25px;
		}
		.hori-selector .left:before{
			left: -25px;
			top: -25px;
		}
		.hori-selector .right:before{
			bottom: -25px;
			left: -25px;
		}
	}
</style>
</html>