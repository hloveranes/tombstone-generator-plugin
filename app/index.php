
<!-- Grid Container -->
<div class="ts-grid-container">

  <!-- Body Area -->
  <div class="ts-child-grid-container">
    <!-- Editor -->
    <div>
      <button class="tablink" onclick="openPage('ts-cmpnts', this, 'yellowgreen')">Comps</button>
      <button class="tablink" onclick="openPage('ts-styles', this, 'lightgreen')" id="defaultOpen">Styles</button>
      <button class="tablink" onclick="openPage('ts-advance', this, 'lightblue')">Advanced</button>

      <div id="ts-cmpnts" class="tabcontent">
          <div id="text-list">
            <span onclick="getCanvasEl(this)" style="cursor: pointer">Hello RWorld</span>
            <img onclick="getCanvasEl(this)" src="<?php echo plugin_dir_url(__FILE__).'imgs/bird-1.jpg';?>"
              style="cursor: pointer"/>
          </div>
          <button id="createEl">Add</button>
      </div>

      <div id="ts-styles" class="tabcontent">
        <h3>Styles</h3> 
          <ul id="ts-style">
            <li>
              <label for="ts-inpt-El-1">Text 1</label
              ><input id="ts-inpt-El-1" type="text" placeholder="value 1"/>
            </li>
            <li>
              <label for="ts-inpt-El-2">Text 2</label
              ><input id="ts-inpt-El-2" type="text" placeholder="value 2"/>
            </li>
            <li>
              <label for="ts-inpt-El-3">Text 3</label
              ><input id="ts-inpt-El-3" type="text" placeholder="value 3"/>
            </li>
              <button id="ts-capture">Capture Canvas</button>
            </li>
          </ul>
      </div>

      <div id="ts-advance" class="tabcontent">
        <h3>Advanced</h3>
        <p>Get in touch, or swing by for a cup of coffee.</p>
      </div>
    </div>
    <!-- End Of Editor -->

    <!-- Body -->
    <div class="ts-template">
      <div id="ts-stone" class="ts-template-child" style="padding: 0.1px">
      
        <span class="ddable" draggable="true">Hello RWorld</span>
        <img
          class="ddable" draggable="true"
          src="<?php echo plugin_dir_url(__FILE__).'imgs/bird-2.jpg';?>"
          style="width: 100px; height: 100px"/>
      </div>
      
      <a id="download-link" download="tombstone.png"></a>
    </div>
    <!-- End Of Body  -->
  </div>
  <!-- End Of Body Area -->

<!-- End Of Grid Container -->

<script>
    function openPage(pageName,elmnt,color) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
      }
      document.getElementById(pageName).style.display = "block";
      elmnt.style.backgroundColor = color;
    }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();


// set global variable for passing data
var selCanvasEl = null;

    function getCanvasEl(canvasEl){
      // canvasEl.classList.add('is-selected');

      // get the selected element
      selCanvasEl = canvasEl;
    }

    document.getElementById('createEl').addEventListener('click', () => {
      if(selCanvasEl != null){
        // create a copy of the selected element
        var newEl = selCanvasEl.cloneNode(true);
          // configure the created element
          newEl.removeAttribute('style');
          newEl.removeAttribute('onclick');
          newEl.classList.add('ddable');
          newEl.setAttribute('draggable', true)
        // add the element to canvas
        document.getElementById('ts-stone').appendChild(newEl);
        // re-initialized the list of draggable elements
        dragAllElement(document.querySelectorAll(".ddable"));
      }
      // reset selected elements
      selCanvasEl = null;
    });


    // for downloading the canvas
    document.getElementById('ts-capture').addEventListener('click', () => {
      html2canvas(document.querySelector("#ts-stone")).then(canvas => {
        var tstone = canvas.toDataURL("image/png")
        var elmDownload = document.getElementById("download-link");
        var todate = new Date();
        elmDownload.download = `tombstone-${todate.getDate()}${todate.getMonth()}${todate.getFullYear()}${todate.getHours()}${todate.getMinutes()}${todate.getMilliseconds()}.png`;
        elmDownload.href = tstone;
        elmDownload.click();
        });
    });
</script>