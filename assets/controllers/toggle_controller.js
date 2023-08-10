import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
  static targets = ["menu", "menuButtonClose", "menuButtonOpen"];
  static values = { isOpen: { type: Boolean, default: false } };

  menu() {
    this.isOpenValue ? this.hide() : this.show();

    this.isOpenValue = !this.isOpenValue;
  }

  show() {
    this.menuTarget.style.display = "block";
    this.menuButtonCloseTarget.style.display = "block";
    this.menuButtonOpenTarget.style.display = "none";
  }

  hide() {
    this.menuTarget.style.display = "none";
    this.menuButtonCloseTarget.style.display = "none";
    this.menuButtonOpenTarget.style.display = "block";
  }
}
