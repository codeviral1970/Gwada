// assets/controllers/carousel_controller.js
import { Controller } from "stimulus";
import { Carousel, initTE } from "tw-elements";

export default class extends Controller {
  connect() {
    // this.carousel = new tw.Carousel(this.element);

    this.carousel = new tw.Carousel(this.element, {
      interval: parseInt(this.element.getAttribute("data-te-interval")) || 1000,
    });
  }
}

initTE({ Carousel });
