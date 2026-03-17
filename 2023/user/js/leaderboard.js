//NAVBAR
//sticky navbar jika di scroll
window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})

//navbar
const menuBtn = document.querySelector(".menu-btn");
const menuItems = document.querySelector(".menu-items");
const menuItem = document.querySelectorAll(".menu-item");

// main toggle
menuBtn.addEventListener("click", () => {
    toggle();
});

// toggle on item click if open
menuItem.forEach((item) => {
    item.addEventListener("click", () => {
        if (menuBtn.classList.contains("open")) {
            toggle();
        }
    });
});

function toggle() {
    menuBtn.classList.toggle("open");
    menuItems.classList.toggle("open");
}


gsap.registerPlugin(Flip);

const list = document.querySelector("#list");
const list2 = document.querySelector("#list2");
const listItems = document.querySelectorAll("#item");
const button = document.querySelector("#button");

// button.addEventListener("click", (e) => {
//     // grab the current position of all the list items
//     const state = Flip.getState(listItems);
   
//     // shuffle shuffle
//     list.shuffleChildren();
   
//     // transform them 'back' to the old position and then animate the removal of the transforms - like magic ✨
//     Flip.from(state, {
//      duration: 0.3,
//      ease: "sine.out"
//     });
// });
   
   // shuffle
   Element.prototype.shuffleChildren = function () {
    for (var i = this.children.length; i >= 0; i--) {
     this.appendChild(this.children[(Math.random() * i) | 0]);
    }
   };


