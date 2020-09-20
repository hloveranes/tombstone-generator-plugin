<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tombstone Generator</title>
    <link rel="stylesheet" href="./css/baseStyle.css" />
    <link rel="stylesheet" href="./css/bs-4.5.2.css" crossorigin="anonymous" />
  </head>
  <body>
    <!-- Grid Container -->
    <div class="ts-grid-container">
      <!-- Header Area -->
      <div class="ts-header">Header</div>
      <!-- End Of Header Area -->

      <!-- Body Area -->
      <div class="ts-template-body ts-child-grid-container">
        <!-- Editor -->
        <div>
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
            <li>
              <label for="ts-inpt-El-4">Text 4</label
              ><input id="ts-inpt-El-4" type="text" placeholder="value 4"/>
            </li>
            <li>
              <label for="ts-inpt-El-5">Text 5</label
              ><input id="ts-inpt-El-5" type="text" placeholder="value 5"/>
            </li>
            <li>
              <label for="ts-inpt-El-6">Text 6</label
              ><input id="ts-inpt-El-6" type="text" placeholder="value 6"/>
            </li>
            <li>
              <label for="ts-inpt-El-7">Text 7</label
              ><input id="ts-inpt-El-7" type="text" placeholder="value 7"/>
            </li>
          </ul>
        </div>
        <!-- End Of Editor -->

        <!-- Body -->
        <div id="ts-stone" class="ts-template" style="padding: 0.1px">
          <span id="test" class="ddable" draggable="true">Hello RWorld</span>
          <img
            class="ddable"
            draggable="true"
            src="./imgs/bird-2.jpg"
            alt="bird"
            style="width: 100px; height: 100px"
          />
          <img
            id="mydiv"
            class="ddable"
            draggable="true"
            src="./imgs/bird-1.jpg"
            alt="bird"
            style="width: 100px; height: 100px"
          />
        </div>
        <!-- End Of Body  -->
      </div>
      <!-- End Of Body Area -->

      <!-- Footer -->
      <div>Footer</div>
      <!-- End Of Footer -->
    </div>
    <!-- End Of Grid Container -->

    <script src="./js/contextJSON.js" defer></script>
    <script src="./js/dragndrop.js" defer></script>
    <script src="./js/editor.js" defer></script>
  </body>
  <!-- https://www.w3schools.com/howto/howto_js_draggable.asp -->
  <!-- https://www.w3schools.com/html/html5_draganddrop.asp -->
</html>
