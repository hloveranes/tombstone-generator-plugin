<div>
  <!-- Body -->
  <div id="canvas-parent">
    <div id="cptr-contr">
      <button id="cptr">Capture Canvas</button>
    </div>


      <div id="tmplt-limit">
        <!-- element id must not be changed-->
        <div id="ts-canvas-tmplt">
        
          <span class="ddable" draggable="true">Hello RWorld</span>
          <img
            class="ddable" draggable="true"
            src="<?php echo plugin_dir_url(__FILE__).'imgs/bird-2.jpg';?>"
            style="width: 100px; height: 100px"/>

        </div>
        
        <a id="download-link" download="tombstone.png"></a>
      </div>
      

      <!-- Components and Settings -->
      <div id="tmplt-cmpnts">
          <div>
            
              <div id="ts-cmpnts">

                <h2>Choose Background</h2>
                <div class="cmpnts">
                  <?php
                    // will be used when images is saved in the database
                    $templ_background = array('imgs/bg-0.jpeg','imgs/bg-1.jpeg','imgs/bg-2.jpeg','imgs/bg-3.jpeg','imgs/bg-4.jpeg');

                    $bg_cnt = 0;
                    foreach($templ_background as $t_bg){
                 
                        echo '<div>
                                <img id="bg-tmplt-'.$bg_cnt.'" class="tmplt" src="'.plugin_dir_url(__FILE__).$t_bg.'" style="cursor: pointer"/>
                              </div>';
                      $bg_cnt++;
                    }
                  ?>
                </div>


                <h2>Select Design</h2>
                <div class="cmpnts">
                  <?php
                    // will be used when images is saved in the database
                    $temp_design = array('imgs/bg-0.jpeg','imgs/bg-1.jpeg','imgs/bg-2.jpeg','imgs/bg-3.jpeg','imgs/bg-4.jpeg');

                    $design_cnt = 0;
                    foreach($temp_design as $t_dn){

                        echo '<div>
                                <img id="tmplt-'.$design_cnt.'" src="'.plugin_dir_url(__FILE__).$t_dn.'" style="cursor: pointer"/>
                              </div>';
                      $design_cnt++;
                    }
                  ?>
                </div>


                <h2>Insert Text</h2>
                <div class="cmpnts">
                    <div>
                      <span onclick="getCanvasEl(this)" style="cursor: pointer">Sample Text</span>
                    </div>
                    <div>
                      <span onclick="getCanvasEl(this)" style="cursor: pointer">Sample Text</span>
                    </div>
                    <div>
                      <span onclick="getCanvasEl(this)" style="cursor: pointer">Sample Text</span>
                    </div>
                    <div>
                      <span onclick="getCanvasEl(this)" style="cursor: pointer">Sample Text</span>
                    </div>
                </div>

                <div id="add-elm">
                  <button id="createEl">Add</button>
                </div>
              </div>

          </div>
      </div>

    <!-- End of Components and Settigns -->
  </div>
</div>