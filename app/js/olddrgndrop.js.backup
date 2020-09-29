// initialized all draggable elements
dragAllElement(document.querySelectorAll(".ddable"));

function dragAllElement(elmnts) {
  console.log(elmnts);
  var pos1 = 0,
    pos2 = 0,
    pos3 = 0,
    pos4 = 0;

  elmnts.forEach((elm) => {
    elm.addEventListener("mousedown", dragSingleElement);

    // element.onmousedown = dragSingleElement;

    // Focus on single draggable element
    function dragSingleElement(e) {
      // console.log(e);
      e.preventDefault();

      // select element to list out available properties for edit
      edit(e);

      // get the mouse cursor position at startup:
      pos3 = e.clientX;
      pos4 = e.clientY;
      document.onmouseup = closeDragElement;

      // call a function whenever the cursor moves:
      document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
      e.preventDefault();

      // calculate the new cursor position:
      pos1 = pos3 - e.clientX;
      pos2 = pos4 - e.clientY;
      pos3 = e.clientX;
      pos4 = e.clientY;

      // set the element's new position:
      elm.style.top = elm.offsetTop - pos2 + "px";
      elm.style.left = elm.offsetLeft - pos1 + "px";

      // restrict child position
      // restrictChildElmnt();
    }

    function closeDragElement() {
      // stop moving when mouse button is released:
      document.onmouseup = null;
      document.onmousemove = null;
    }

    function restrictChildElmnt() {
      if (
        elm.offsetLeft > elm.parentElement.offsetLeft &&
        elm.offsetTop > elm.parentElement.offsetTop &&
        elm.offsetLeft + elm.offsetWidth <
          elm.parentElement.offsetWidth + elm.parentElement.offsetLeft &&
        elm.offsetTop + elm.offsetHeight <
          elm.parentElement.offsetHeight + elm.parentElement.offsetTop
      ) {
        // console.log(
        //   elm.parentElement.offsetLeft,
        //   elm.parentElement.offsetTop,
        //   elm.offsetLeft,
        //   elm.offsetTop
        // );
        console.log("+++++++++++++++++++++++++++++++");
        console.log(
          `widthChild: ${elm.offsetWidth} widthParent: ${elm.parentElement.offsetWidth}`,
          `heightChild: ${elm.offsetHeight} heightParent: ${elm.parentElement.offsetHeight}`
        );

        console.log("---------------------------");
        console.log(`left: ${elm.offsetLeft}`, `top: ${elm.offsetTop}`);
        console.log(
          `childMaxWidth: ${
            elm.parentElement.offsetWidth +
            elm.parentElement.offsetLeft -
            elm.offsetWidth
          }`,
          `childMaxHeight: ${
            elm.parentElement.offsetHeight +
            elm.parentElement.offsetTop -
            elm.offsetHeight
          }`
        );
      } else {
        return false;
      }
    }
  });
}
