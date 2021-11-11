require('./bootstrap');
import Alpine from "alpinejs"
import Handsontable from 'handsontable';
import 'handsontable/dist/handsontable.full.css';
import {chooseForm} from "./forms_js/choose_form";
import {print} from "./button/print";
import {getData} from './button/load';
import {clear} from './button/clear';
import {verify} from './button/verify';
import {convertToJson} from "./button/convertJSON";
import {downloadAsFile} from "./button/download";
import {postData} from "./button/post";
window.Alpine = Alpine
Alpine.start()
const infoConsole = document.querySelector('#console');
const button_load = document.querySelector('#download');
const button_download = document.querySelector('#send');
const button_save = document.querySelector('#save');
const button_verify = document.querySelector('#verify');
const button_clear = document.querySelector('#clear');
const button_print = document.querySelector('#print');

button_save.addEventListener('click', () => {
    postData('/api/save_reports',infoConsole,hot1,hot2)
});
button_verify.addEventListener('click', () => {
    verify(convertToJson(hot1,hot2),'/api/export_reports',infoConsole)
});
button_clear.addEventListener('click', () => {
    clear(hot1,hot2)
});
button_load.addEventListener('click', () => {
    getData('/api/load_reports',infoConsole,hot1,hot2)
});
button_download.addEventListener('click', () => {
    downloadAsFile(convertToJson(hot1,hot2));
    infoConsole.innerText = 'Файл загружен';
})
button_print.addEventListener('click', () => {
    print(hot1,hot2);
});
// ВЫБОРКА ФОРМ
chooseForm();