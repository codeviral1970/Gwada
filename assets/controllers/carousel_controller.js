import { Controller } from "stimulus";
import { Carousel, initTE } from "tw-elements";

export default class extends Controller {
  connect() {
    setTimeout(() => {
      const carouselElement = this.element.querySelector(".carousel");
      const options = {
        interval: 1000,
        ride: true,
        touch: true,
      };

      initTE({ Carousel }, carouselElement, options);
    }, 100);
  }
}
