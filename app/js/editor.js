// create id for elements

function edit(elm) {
  console.log(elm.target);
  // console.log(this);
}

// getCurrentInput(document.querySelectorAll("div #ts-style li input"));

function getCurrentInput(elInpts) {
  //   var currentInput = document.querySelectorAll("div #ts-style");
  // console.log(elInpts);

  elInpts.forEach((elmnt) => {
    elmnt.addEventListener("input", updateValue);
    // change html style
    function updateValue(e) {
      console.log(e.target.value);
      // elm.style.padding = e.target.value;
    }
  });
}

// set global variable for passing data
var selCanvasEl = null;

function getCanvasEl(canvasEl){
  // canvasEl.classList.add('is-selected');

  // get the selected element
  selCanvasEl = canvasEl;
}

// To be added elements settings
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
    document.getElementById('ts-canvas-tmplt').appendChild(newEl);
    // re-initialized the list of draggable elements
    dragAllElement(document.querySelectorAll(".ddable"));
  }
  // reset selected elements
  selCanvasEl = null;
});


// Change template background
document.querySelectorAll('.tmplt').forEach((elm, index) => {
  elm.addEventListener('click', (e) => {
    var template = document.getElementById('ts-canvas-tmplt');

    template.style.backgroundImage = `url(http://localhost/wptest/wp-content/plugins/tombstone-generator/app/imgs/bg-${index}.jpeg)`;
  })
})

// For downloading the canvas
document.getElementById('cptr').addEventListener('click', () => {
  // scroll to top before capture event
  // document.getElementById('page').scrollIntoView(true);

  html2canvas(document.querySelector("#ts-canvas-tmplt")).then(canvas => {
    var tstone = canvas.toDataURL("image/png")
    var elmDownload = document.getElementById("download-link");
    var todate = new Date();
    elmDownload.download = `tombstone-${todate.getDate()}${todate.getMonth()}${todate.getFullYear()}${todate.getHours()}${todate.getMinutes()}${todate.getMilliseconds()}.png`;
    elmDownload.href = tstone;
    elmDownload.click();
  });
});