<template>
  <div class="row">
    <!-- <div class="col-6">
     <img src="http://162.248.55.24/resources/images/wallpaper02.jpg" alt="">
    </div>
    <div class="col-6">
      One of three columns
    </div> -->
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form class="login100-form validate-form">
            <span class="login100-form-title p-b-34">
              Zgroup
            </span>
            
            <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
              <input id="first-name" class="input100" type="text" name="username" placeholder="Usuario">
              <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
              <input class="input100" type="password" name="pass" placeholder="Contraseña">
              <span class="focus-input100"></span>
            </div>
            
            <div class="container-login100-form-btn">
               <!-- se usa link para mandar a ver un componente -->
             <Link class="login100-form-btn" :href="$route('paneles.board')">Inicia sesión</Link>
            </div>

            <div class="w-full text-center p-t-27 p-b-239">
              <span class="txt1">
                ¿Olvidaste
              </span>

              <a href="#" class="txt2">
                Nombre de usuario / contraseña?
              </a>
            </div>

            <div class="w-full text-center">
              <!-- <a href="#" class="txt3">
                Sign Up
              </a> -->
               <img src="http://162.248.55.24/resources/images/zgroup_logo.png" alt="Logo" height="50px" style="margin-top: -20px" /> 
            </div>
          </form>

          <div class="login100-more" style="background-image: url('http://162.248.55.24/resources/images/wallpaper02.jpg');"></div>
        </div>
      </div>
    </div>
   <div id="dropDownSelect1"></div>
  </div>
    
</template>
<!--===============================================================================================-->
	<script src="{{asset('recursos_login/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{asset('recursos_login/bootstrap/js/popper.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{asset('recursos_login/select2/select2.min.js') }}"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset('recursos_login/daterangepicker/moment.min.js') }}"></script>
	<script src="{{asset('recursos_login/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{asset('recursos_login/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/main.js') }}"></script>
<!--===============================================================================================-->
<script>
import { Link } from '@inertiajs/inertia-vue';
export default {
  components: { 
  Link,
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

  },

  methods: {
    
    
  },
};
</script>

<style lang="css">

</style>



