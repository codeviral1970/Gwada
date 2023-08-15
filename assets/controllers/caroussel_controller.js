import { Controller } from "stimulus";
import { Carousel, initTE } from "tw-elements";

export default class extends Controller {
  connect() {
    const options = {
      interval: "1000",
      ride: true,
      wrap: true,
      touch: true,
    };

    this.carousel = new Carousel(this.element, options);
  }
}
initTE({ Carousel });
