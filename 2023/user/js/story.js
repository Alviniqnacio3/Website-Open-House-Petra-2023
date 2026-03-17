gsap.registerPlugin(TextPlugin);


const tl = gsap.timeline();

tl.add(gsap.from('#i1', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#h1', {
    text: 'WGG-ers:',
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.from('#c1', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#p1', {
    text: '"Wow... Ini luar biasa! Perhentian kita kali ini begitu megah dan misterius... Suasana ramainya menciptakan ketegangan di udara. Aku tak sabar untuk mengungkap setiap rahasia yang tersimpan di tempat ini!"',
    duration: 6,
    ease: 'power0.in',
}));

tl.add(gsap.from('#i2', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#h2', {
    text: 'OpenHouse:',
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.from('#c2', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#p2', {
    text: '"Halo, WGG-ers! Selamat datang di stasiun OpenHouse yang penuh misteri! Aku adalah pemandu kalian, dan kalian berada dalam petualangan yang penuh intrik dan teka-teki. Apakah kalian siap untuk mengeksplorasi stasiun ini lebih dalam?"',
    duration: 7,
    ease: 'power0.in',
}));



tl.add(gsap.from('#i3', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#h3', {
    text: 'WGG-ers:',
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.from('#c3', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#p3', {
    text: '"Tentu saja! Sejujurnya, kami merasa tertarik namun juga penuh rasa penasaran tentang stasiun ini."',
    duration: 4,
    ease: 'power0.in',
}));


tl.add(gsap.from('#i4', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#h4', {
    text: 'OpenHouse:',
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.from('#c4', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#p4', {
    text: '"Sangat menggembirakan! Di stasiun ini, kalian akan mengenal dunia gelap dan misterius Unit Kegiatan Mahasiswa (UKM) dan Lembaga Kemahasiswaan (LK). Ada banyak informasi tersembunyi dan pilihan menarik yang bisa kalian temukan, jika kalian berani menghadapinya."',
    duration: 8,
    ease: 'power0.in',
}));

tl.add(gsap.from('#planet1', {opacity:0, duration:1, ease:"bounce"}))
gsap.from('#planet1', {rotation: 360, transformOrigin: "center", ease: "none", repeat: -1, duration:10})
tl.add(gsap.from('#planet2-1', {opacity:0, duration:1, ease:"bounce"}))
gsap.from('#planet2-1', {rotation: 360, transformOrigin: "center", ease: "none", repeat: -1, duration:10})


tl.add(gsap.from('#i5', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#h5', {
    text: 'WGG-ers:',
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.from('#c5', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#p5', {
    text: '"Hm.... Lalu bagaimana caranya agar kami bisa melihat list UKM dan LK yang ada?"',
    duration: 4,
    ease: 'power0.in',
}));


tl.add(gsap.from('#i6', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#h6', {
    text: 'OpenHouse:',
    duration:0.5,
    ease: 'power0.in',
}));
tl.add(gsap.from('#c6', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#p6', {
    text: '"Kalian harus berani berkeliling ke berbagai planet yang ada di stasiun ini. Di sana terdapat banyak sekali UKM dan LK yang dipenuhi dengan teka-teki dan ujian. Hanya para penjelajah pemberani yang bisa menghadapinya."',
    duration: 7,
    ease: 'power0.in',
}));


tl.add(gsap.from('#i7', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#h7', {
    text: 'WGG-ers:',
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.from('#c7', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#p7', {
    text: '"Wow, terima kasih banyak untuk informasinya! Kami siap untuk memulai petualangan mendebarkan di stasiun ini!"',
    duration: 4,
    ease: 'power0.in',
}));


tl.add(gsap.from('#i8', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#h8', {
    text: 'OpenHouse:',
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.from('#c8', {
    opacity:0,
    duration: 0.5,
    ease: 'power0.in',
}));
tl.add(gsap.to('#p8', {
    text: 'Tidak masalah, semoga perjalanan kalian penuh petualangan dan kegembiraan, WGG-ers! Ingat, di balik setiap pintu terbuka rahasia yang menunggu untuk diungkap."',
    duration: 6,
    ease: 'power0.in',
}));

tl.add(gsap.from('#planet2-2', {opacity:0, duration:1, ease:"bounce"}))
gsap.from('#planet2-2', {rotation: 360, transformOrigin: "center", ease: "none", repeat: -1, duration:10})

tl.add(gsap.from('#btnn', {opacity:0, duration:2}))