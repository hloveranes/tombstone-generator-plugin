
<?php
  global $wpdb;
  $table_name = $wpdb->prefix . "tombstone"; 

?>
<div>
  <!-- Body -->
  <div id="canvas-parent">
    <div id="cptr-contr">
      <button id="cptr">Capture Canvas</button>
    </div>


      <div id="tmplt-limit">
        <!-- element id must not be changed-->
        <!-- added elements will go here -->
        <div id="ts-canvas-frame">
          <div id="ts-canvas-tmplt">


          </div>
        </div>
        <a id="download-link" download="tombstone.png"></a>
      </div>
      

      <!-- Components and Settings -->
      <div id="tmplt-cmpnts">
          <div>
            
              <div id="ts-cmpnts">
                <button class="editor-tablink" onclick="openPage('tab-frame', this, 'black')">Frame</button>
                <button class="editor-tablink" onclick="openPage('tab-material', this, 'black')" id="defaultOpen">Material</button>
                <button class="editor-tablink" onclick="openPage('tab-decoration', this, 'black')">Decoration</button>
                <button class="editor-tablink" onclick="openPage('tab-scripture', this, 'black')">Scripture</button>
                <button class="editor-tablink" onclick="openPage('tab-style', this, 'black')">Style</button>


                <div id="tab-frame" class="editor-tabcontent">
                  <h2>Choose Frame</h2>
                  <div class="cmpnts">
                    <?php
                      $col_name = 'frame_link';
                      $frames = $wpdb->get_results("SELECT $col_name FROM $table_name");
                      foreach ($frames as $frame) {
                          echo '<div>
                                  <img class="canvas-frame" src="'.$frame->frame_link.'"/>
                                </div>';
              
                      }
                    ?>
                  </div>
                </div>

                <div id="tab-material" class="editor-tabcontent">
                  <h2>Choose Material</h2>
                  <div class="cmpnts">
                    <?php
                      $col_name = 'material_link';
                      $materials = $wpdb->get_results("SELECT $col_name FROM $table_name");
                      foreach ($materials as $material) {
                        echo '<div>
                                <img class="tmplt" src="'.$material->material_link.'"/>
                              </div>';
              
                      }
                    ?>
                  </div>
                </div>


                <div id="tab-decoration" class="editor-tabcontent">
                  <h2>Select Decoration</h2>
                  <div class="cmpnts">
                    <?php
                      $col_name = 'decoration_link';
                      $decorations = $wpdb->get_results("SELECT $col_name FROM $table_name");
                      foreach ($decorations as $decor) {
                        echo '<div>
                                <img class="frm-cmpnts" src="'.$decor->decoration_link.'"/>
                              </div>';
                      }
                    ?>
                  </div>
                </div>

                <div id="tab-scripture" class="editor-tabcontent">
                  <h2>Insert Text</h2>
                  <div class="cmpnts">
                    <?php
                        $col_name = 'scripture';
                        $scriptures = $wpdb->get_results("SELECT $col_name FROM $table_name");
                        foreach ($scriptures as $scrpt) {
                          echo '<div>
                                  <span class="frm-cmpnts" style="'.$scrpt->scripture.'">
                                    Sample Scripture
                                  </span>
                                </div>';
                        }
                      ?>
                  </div>
                </div>

                <div id="tab-style" class="editor-tabcontent">
                  <h2>Insert Text</h2>
                  <div id="components-inputs">

                  </div>
                </div>


                <div id="add-elm">
                  <button id="create-elm">Add</button>
                </div>
              </div>

          </div>
      </div>

    <!-- End of Components and Settigns -->
  </div>
</div>
