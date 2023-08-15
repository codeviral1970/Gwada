import { Carousel, initTE } from "tw-elements";

// const myCarousel = document.getElementById("gwada-slider");
// myCarousel.addEventListener("slide.te.carousel", () => {
//
// });

// const myCarousel = new Carousel(
//   document.getElementById("gwada-slider"),
//   (interval = "1000")
// );

const options = {
  interval: 1000, // Set the interval to 3000 milliseconds
  ride: true,
  wrap: true,
  touch: true,
};

document.addEventListener("DOMContentLoaded", () => {
  const myCarouselElement = document.getElementById("gwada-slider");
  const myCarousel = new Carousel(myCarouselElement, options);
});

initTE({ Carousel });
