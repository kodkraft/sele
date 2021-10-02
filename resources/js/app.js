require('./bootstrap');

import Alpine from 'alpinejs';

import Swal from 'sweetalert2';

import $ from 'jquery';
window.$ = window.jQuery = $;

window.Swal =Swal;

window.Alpine = Alpine;

Alpine.start();
