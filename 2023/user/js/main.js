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

//enable disable scroll
function disableScroll() {
  console.log("REEEEEEEEE");
  // Get the current page scroll position
  scrollTop = window.scrollX || window.pageYOffset || document.documentElement.scrollTop;
  scrollLeft = window.scrollY || window.pageXOffset || document.documentElement.scrollLeft,

    document.body.style.position = 'fixed';
  document.body.style.top = -scrollLeft + 'px';
  document.body.style.left = -scrollX + 'px';
  // if any scroll is attempted, set this to the previous value
  // window.onscroll = function () {
  //   window.scrollTo(scrollLeft, scrollTop);
  // };
}

function enableScroll() {
  document.body.style.position = '';
  document.body.style.top = '';
  document.body.style.left = '';

  console.log("REEEEEEEEE2222222");
  window.onscroll = function () { };
}

function myFunction() {
  // $("#loading").remove();
  console.log("REEEEEEEEE33333332");

  $("#loading").prop("hidden", true);
}

function swal() {
  Swal.fire({
    title: 'Regist In',
    text: "Bagi yang belum regist in, silakan regist in terlebih dahulu.",
    icon: 'warning',
    showCloseButton: true,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Link Regist In'
  }).then((result) => {
    if (result.isConfirmed) {
      window.open('https://petra.id/PreTestOpenHouse2023', '_blank');
    }
  });
}

// animation
gsap.registerPlugin(ScrollTrigger, TextPlugin);

// gsap.set("#header", { opacity: 0 });

const tl_awal = gsap.timeline();
// tl_awal.call(disableScroll);
// tl_awal.add(TweenMax.to("#logo", 1, { scaleX: 1.3, scaleY: 1.3, yoyo: true, repeat: 3 }));
// tl_awal.to("#logo", { opacity: 0, duration: 1 });
// tl_awal.add(gsap.to("#loading", { y: "-100%", duration: 2 }), "<0.5");
// tl_awal.call(myFunction);
// tl_awal.call(enableScroll);
// tl_awal.call(swal);
// tl_awal.to("#header", { opacity: 1, duration: 0.5 });

tl_awal.from("#title", { duration: 1, opacity: 0, ease: Power1.easeOut });
tl_awal.add(gsap.to("#title", { duration: 2, text: "Lead with Passion and Do with Purpose", delay: 1 }));

gsap.set('#logo-muter', { xPercent: 0 });

var rotate = gsap.timeline({
  scrollTrigger: {
    trigger: ".header",
    scrub: 0.5,
    start: 'top top',
    end: '+=1000',
  }
})
  .to('#logo-muter', {
    rotation: 360,
    duration: 1, ease: 'none',
  })

gsap.from("#desc", {
  scrollTrigger: {
    trigger: "#whatis",
    start: "top center",
    end: "desc"
  }, duration: 1, opacity: 0, y: 150
});

gsap.from("#ukm", {
  scrollTrigger: {
    trigger: "#desc",
    scrub: 1,
    start: "top center",
    end: "contact"
  }, duration: 1, x: -1000
});

gsap.from("#lk", {
  scrollTrigger: {
    trigger: "#ukmlk",
    scrub: 1,
    start: "top center",
    end: "contact"
  }, duration: 1, x: 1000
});

gsap.from("#contact_title", {
  scrollTrigger: {
    trigger: "#contact",
    start: "top center",
    end: "contact_title"
  }, duration: 1, opacity: 0, y: -150
});

gsap.from("#contact_link", {
  scrollTrigger: {
    trigger: "#contact",
    start: "top center",
    end: "contact_link"
  }, duration: 1, opacity: 0, y: 150
});


