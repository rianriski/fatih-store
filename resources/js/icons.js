import Vue from "vue";

// Font Awesome Configuration
import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import {
    faShoppingCart,
    faUser,
    faSearch,
    faLocationArrow,
    faPhone,
    faEnvelope,
    faArrowCircleRight,
    faMinus,
    faPlus,
    faTrash,
    faAngleDoubleLeft,
    faAngleDoubleRight,
    faArrowDown
} from "@fortawesome/free-solid-svg-icons";

library.add(
    faShoppingCart,
    faUser,
    faSearch,
    faLocationArrow,
    faPhone,
    faEnvelope,
    faArrowCircleRight,
    faMinus,
    faPlus,
    faTrash,
    faAngleDoubleLeft,
    faAngleDoubleRight,
    faArrowDown
);

Vue.component("fa-icon", FontAwesomeIcon);
