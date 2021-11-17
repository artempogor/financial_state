require('./bootstrap');
import Alpine from "alpinejs"
import 'handsontable/dist/handsontable.full.css';
import {clearNew} from './button/clear';
import {downloadAsFile} from "./button/download";
import {chooseForm} from "./forms_js/forms.js";
import {getData} from './button/load';
import {verify} from './button/verify';
import {convertToJson} from "./button/convertJSON";
import {postData} from "./button/post";
window.Alpine = Alpine
Alpine.start()
//  кнопки
    //вызов её
var infoConsole = document.querySelector('#console');
var button_load = document.querySelector('#download');
var button_download = document.querySelector('#send');
var button_save = document.querySelector('#save');
var button_verify = document.querySelector('#verify');
var button_clear = document.querySelector('#clear');
var button_print = document.querySelector('#print');

// button_print.addEventListener('click', () => {
//     print(chooseForm());
// });

button_save.addEventListener('click', () => {
    postData('/api/save_reports',infoConsole,hot1,hot2)
});
button_verify.addEventListener('click', () => {
    verify(hot1,hot2,'/api/export_reports',infoConsole,hot1,hot2)
});
button_load.addEventListener('click', () => {
    getData('/api/load_reports',infoConsole,hot1,hot2)
});
button_download.addEventListener('click', () => {
    downloadAsFile(convertToJson(chooseForm()));
    infoConsole.innerText = 'Файл загружен';
})
button_clear.addEventListener('click', () => {
    clearNew(chooseForm());
    infoConsole.innerText = 'Данные очищенны';
});
chooseForm();