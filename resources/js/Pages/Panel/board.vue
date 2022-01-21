<template>
  <layoutprincipal ref="principal">
    <div
      class="slot_body slot_enviar_dinero"
      slot="component-view"
    >
      <div class="content" style="display: block" id="cuerpo">
        <!-- ---------------------- -->
          <h1>vista de board</h1>
        <!-- ---------------------- -->
      
      </div>
    </div>
  </layoutprincipal>
</template>

<script>

import layoutprincipal from "./../principal.vue";

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

  },

  methods: {
    
    
  },
};
</script>

<style lang="css">

</style>



