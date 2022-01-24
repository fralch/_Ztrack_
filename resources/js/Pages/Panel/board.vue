<template>
  <layoutprincipal ref="principal">
    <div
      class="slot_body slot_enviar_dinero"
      slot="component-view"
    >
      <div class="content" style="display: block" id="cuerpo">
        <!-- ---------------------- -->
          <div class="shadow-sm p-3 mb-5 bg-white rounded">Small shadow</div>
        <!-- ---------------------- -->
      
      </div>
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

  },

  methods: {
    
    
  },
};
</script>

<style lang="css">

</style>



