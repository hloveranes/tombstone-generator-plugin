// initialized all draggable elements
dragAllElement(document.querySelectorAll(".ddable"));
var parent = document.getElementById("ts-stone");
var rect = parent.getBoundingClientRect();
console.log(parent.offsetTop);


function dragAllElement(elmnts) {
    // console.log(elmnts);
    var initX,
        initY,
        firstX,
        firstY;

    elmnts.forEach((elm) => {
        elm.addEventListener("mousedown", function(e) {

            e.preventDefault();
            initX = this.offsetLeft;
            initY = this.offsetTop;
            firstX = e.pageX;
            firstY = e.pageY;

            // console.log(initX, initY)
            // console.log(firstX, firstY)

            this.addEventListener("mousemove", dragY, false);
            this.addEventListener("mousemove", dragX, false);

            window.addEventListener(
                "mouseup",
                function() {
                    elm.removeEventListener("mousemove", dragY, false);
                    elm.removeEventListener("mousemove", dragX, false);
                },
                false
            );

            function dragY(e) {
                var objRect = elm.getBoundingClientRect();
                // console.log(objRect.bottom)
                if (elm.offsetTop < parent.offsetTop + 5) {
                    elm.removeEventListener("mousemove", dragY, false);
                    elm.style.top = `${parent.offsetTop+5}px`;
                } else {
                    elm.style.top = initY + e.pageY - firstY + "px";
                }

                if (objRect.bottom > rect.bottom) {
                    elm.removeEventListener("mousemove", dragY, false);
                    elm.style.top = `${parent.offsetHeight + parent.offsetTop - elm.offsetHeight - 5}px`;
                }
            }

            function dragX(e) {
                var objRect = elm.getBoundingClientRect();
                // if (elm.offsetLeft < 18) {
                if (elm.offsetLeft < parent.offsetLeft + 5) {
                    elm.removeEventListener("mousemove", dragX, false);
                    elm.style.left = `${parent.offsetLeft + 5}px`;
                } else {
                    elm.style.left = initX + e.pageX - firstX + "px";
                }

                if (objRect.right > rect.right) {
                    elm.style.left = `${parent.offsetWidth + parent.offsetLeft - elm.offsetWidth - 5}px`;
                    elm.removeEventListener("mousemove", dragX, false);
                }
            }

        }, false);
    });
}