const tl = gsap.timeline();
tl.add(TweenMax.to("#logo", 1, { scaleX:1.5, scaleY:1.5, yoyo:true, repeat:3}));
tl.to("#logo",{opacity:0, duration:1});
tl.to("#rocket", {y:"-1000", duration:3});
tl.add(gsap.to("#bg", {y:"-100%", duration:3}),"<0.5");

