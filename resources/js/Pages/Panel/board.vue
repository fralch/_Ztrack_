<template>
  <layoutprincipal ref="principal">
    <div
      class="slot_body slot_enviar_dinero"
      slot="component-view"
    >
      <div class="content" style="display: block" id="cuerpo">
        <!-- ---------------------- -->
        <div class="content" >
          <div class="row" style="margin: 0 0 0 20px;">
            <div class="col-3">
              <div id="asset-search" class="col shadow-sm p-3 mb-5 bg-white rounded" style="margin: 10px 15px;">
                asset search
              </div>
              <div id="micro-alarms" class="col shadow-sm p-3 mb-5 bg-white rounded" style="margin: 10px 15px;">
                micro alarms
              </div>
              <div id="cargo-care" class="col shadow-sm p-3 mb-5 bg-white rounded" style="margin: 10px 15px;">
                cargo care
              </div>
              <div id="pti-result" class="col shadow-sm p-3 mb-5 bg-white rounded" style="margin: 10px 15px;">
                pti result
              </div>
              <div id="reefers-fleet" class="col shadow-sm p-3 mb-5 bg-white rounded" style="margin: 10px 15px;">
                reefers fleet 
              </div>
            </div>
            <div class="col-8">
                <div id="total_reefers" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: 10px 15px 0px 15px;">
                  <div>Total Reefers: 192</div>
                  <button type="button" class="btn btn-outline-success" >Success</button>
                </div>             
                <div id="asset_maps" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px;">
                  map
                </div>            
                <div id="reefers_grid_history" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px;">
                  Reefer grid history
                </div>
                <div id="reefers_grid" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px;">
                  Reefer grid 
                </div>
                <div id="reefers_grid" class="col shadow-sm p-3 mb-5 bg-white rounded " style="margin: -30px 15px 10px 15px;">
                  Reference monitoring
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

  },

  methods: {
    
    
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



