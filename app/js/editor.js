// Hide tabs
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("editor-tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("editor-tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
  hideAdd();
}

// Get element with id="defaultOpen" and trigger
document.getElementById("defaultOpen").click();

// Hide Add Button if designated tabs is not selected
function hideAdd(){
  var addElm = document.getElementById("add-elm");
  if((document.getElementById("tab-decoration").style.display == "block") || (document.getElementById("tab-scripture").style.display == "block")){
    addElm.style.display = "block";
  }else{
    addElm.style.display = "none";
  }

}

// identify whether to create inputs
var firstCreated = "";

// create inputs for selected draggable elements
function generateInputs(elm) {
  var elmSelected = elm.target.tagName == "SPAN" ? "txtElmt" : "imgElmt";

  if(elm.target.tagName != firstCreated){
    firstCreated = elm.target.tagName;

    var container = document.getElementById("components-inputs");
    container.innerHTML = "";

    // Create input elements for the selected element
    dataEl.forEach((elmList) => {
      
      var elmTypeKeys = Object.keys(elmList)
      elmTypeKeys.forEach((elmType) => {

          // console.log(elm)
          if(elmSelected == elmType){

            var elmKeys = Object.keys(elmList[elmSelected])
              elmKeys.forEach((elm, index) => {
                // console.log(elm, index)

                // create INPUT
                newInput = document.createElement("INPUT");
                newInput.setAttribute("type", "text");
                newInput.setAttribute("id", `${elm}-${index}`);
                newInput.setAttribute("name", `${elm}Field`);
                newInput.classList.add("canvas-style");
                
                // create LABEL
                newLabel = document.createElement("LABEL");
                newLabel.setAttribute("for",`${elm}-${index}`);
                newLabel.innerText = `${elm}`;

                // create DIV
                newDiv = document.createElement("DIV");

                // append created elements
                newDiv.appendChild(newLabel);
                newDiv.appendChild(newInput);

                // append div elements
                container.appendChild(newDiv);      
              })
          }
      });
    });
    getAllInputs(document.querySelectorAll(".canvas-style"), elm);
  }
  getAllInputs(document.querySelectorAll(".canvas-style"), elm);
}


function getAllInputs(elInpts, elm){
  elInpts.forEach((elInpt) => {
    // console.log(elInpts)
    elInpt.addEventListener("input", (e)=>{
      console.log(e.target.value);
      console.log(elm.target);
    });
  })
}




// set global variable for passing element
var selCanvasEl = null;


// Change template frame
document.querySelectorAll(".canvas-frame").forEach((elm) => {
  elm.addEventListener("click", (e) => {
    var template = document.getElementById("ts-canvas-frame");
    template.style.backgroundImage = `url(${e.target.src})`;
  })
})

// Change template material
document.querySelectorAll(".tmplt").forEach((elm) => {
  elm.addEventListener("click", (e) => {
    var template = document.getElementById("ts-canvas-tmplt");
    template.style.backgroundImage = `url(${e.target.src})`;
  })
})


// Get the selected element
document.querySelectorAll(".frm-cmpnts").forEach((elm) => {
  elm.addEventListener("click", (e) => {
    // get the selected element
      selCanvasEl = e.target;
  })
});


// Clone the selected element
document.getElementById("create-elm").addEventListener("click", () => {
  if(selCanvasEl != null){
    // create a copy of the selected element
    var newEl = selCanvasEl.cloneNode(true);
      // configure the created element
      newEl.classList.remove("frm-cmpnts");
      newEl.classList.add("ddable");
      newEl.setAttribute("draggable", true)
    // add the element to canvas
    document.getElementById("ts-canvas-frame").appendChild(newEl);
    // re-initialized the list of draggable elements
    dragAllElement(document.querySelectorAll(".ddable"));
  }
  // reset selected elements
  selCanvasEl = null;
});


// Download the current canvas
document.getElementById("cptr").addEventListener("click", () => {
  setTimeout(() => { 
    html2canvas(document.querySelector("#ts-canvas-frame")).then(canvas => {
      var tstone = canvas.toDataURL("image/png")
      var elmDownload = document.getElementById("download-link");
      var todate = new Date();
      elmDownload.download = `tombstone-${todate.getDate()}${todate.getMonth()}${todate.getFullYear()}${todate.getHours()}${todate.getMinutes()}${todate.getMilliseconds()}.png`;
      elmDownload.href = tstone;
      elmDownload.click();
    });
  }, 2000);
  // scroll to top before event capture  
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
});
