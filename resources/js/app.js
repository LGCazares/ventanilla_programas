import './bootstrap';
import 'bootstrap';

// Global
var token = document.head.querySelector('meta[name="csrf-token"]');
var timercito;

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/dist/jquery-ui.min.js';
require('../../node_modules/bootstrap-select/dist/js/bootstrap-select.js')
// JS Arquetipo
require('./engine');
require("./input-validator-imask");