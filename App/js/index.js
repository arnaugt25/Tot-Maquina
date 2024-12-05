import $ from "jquery";

import hola from "./hola.js";
import "./map.js";
import "./slider.js";
import "./search.js";
import "./nav.js";
import "./menuButton.js";

import {Example, obj} from "./example.ts";

$(function() {
    console.log('Hello World');
    hola();
    console.log("Example", obj);
});