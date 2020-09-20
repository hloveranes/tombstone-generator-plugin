// create id for elements

function edit(elm) {
  console.log(elm.target);
}

getCurrentInput(document.querySelectorAll("div #ts-style li input"));

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
