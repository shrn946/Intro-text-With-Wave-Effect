const circleEls = document.querySelectorAll('.js-circle')
const circleTl = gsap.timeline({repeat: -1, yoyo: true});

let circleSize = 1;
circleEls.forEach(circle => {
  gsap.set(circle, {scale: circleSize});
  circleSize+=.5
})

circleTl.from(circleEls, {scale: 1, stagger: .175, duration: .6, ease: Power3.inOut})