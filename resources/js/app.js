require('./bootstrap');
import Alpine from "alpinejs"
import {clearNew} from './button/clear';
import {downloadAsFile} from "./button/download";
import {chooseForm} from "./forms_js/forms.js";
import {getData} from './button/load';
import {verify} from './button/verify';
import {convertToJson} from "./button/convertJSON";
import {postData} from "./button/post";
import {print} from "./button/print";
window.Alpine = Alpine
Alpine.start()
const hotsarray = chooseForm();
var infoConsole = document.querySelector('#console');
var button_load = document.querySelector('#download');
var button_download = document.querySelector('#send');
var button_save = document.querySelector('#save');
var button_verify = document.querySelector('#verify');
var button_clear = document.querySelector('#clear');
var button_print = document.querySelector('#print');

var button_send_subscribe = document.getElementById('send_subscribe');
var closebutton = document.getElementById('closebutton');
var modal = document.getElementById('modal');

button_send_subscribe.addEventListener('click',()=>modal.classList.add('scale-100'));
closebutton.addEventListener('click',()=>modal.classList.remove('scale-100'));
button_print.addEventListener('click', () => {
    print(hotsarray);
});
button_save.addEventListener('click', () => {
    postData('/api/save_reports',infoConsole,hotsarray)
});
button_verify.addEventListener('click', () => {
    verify('/api/verify_reports',infoConsole,hotsarray)
});
button_load.addEventListener('click', () => {
    getData('/api/load_reports',infoConsole,hotsarray)
});
button_download.addEventListener('click', () => {
    downloadAsFile(convertToJson(hotsarray));
    infoConsole.innerText = 'Файл загружен';
})
button_clear.addEventListener('click', () => {
    clearNew(hotsarray);
    infoConsole.innerText = 'Данные очищенны';
});