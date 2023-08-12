import './bootstrap';
import AOS from 'aos';
import Alpine from 'alpinejs';
import {initTE, Input} from "tw-elements";
// let Turbolinks = require("turbolinks");
// Turbolinks.start();

AOS.init();

window.Alpine = Alpine;
Alpine.start();

initTE({Input});

