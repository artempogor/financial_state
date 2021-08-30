
require('./bootstrap');

require('alpinejs');

import Handsontable from 'handsontable';
import 'handsontable/dist/handsontable.full.css';

const container = document.querySelector('#example1');
const exampleConsole = document.querySelector('#example1console');
const autosave = document.querySelector('#autosave');
const load = document.querySelector('#load');
const save = document.querySelector('#save');

let autosaveNotification;

const hot = new Handsontable(container, {
    startRows: 8,
    startCols: 6,
    rowHeaders: true,
    colHeaders: true,
    width:'200',
    height: '200',
    licenseKey: 'non-commercial-and-evaluation',
    afterChange: function (change, source) {
        if (source === 'loadData') {
            return; //don't save this change
        }

        if (!autosave.checked) {
            return;
        }

        clearTimeout(autosaveNotification);

        ajax('https://handsontable.com/docs/9.0/scripts/json/save.json', 'GET', JSON.stringify({ data: change }), data => {
            exampleConsole.innerText = 'Autosaved (' + change.length + ' ' + 'cell' + (change.length > 1 ? 's' : '') + ')';
            autosaveNotification = setTimeout(() => {
                exampleConsole.innerText ='Changes will be autosaved';
            }, 1000);
        });
    }
});

Handsontable.dom.addEvent(load, 'click', () => {
    ajax('https://handsontable.com/docs/9.0/scripts/json/load.json', 'GET', '', res => {
        const data = JSON.parse(res.response);

        hot.loadData(data.data);

        exampleConsole.innerText = 'Data loaded';
    });
});
Handsontable.dom.addEvent(save, 'click', () => {
    // save all cell's data
    ajax('https://handsontable.com/docs/9.0/scripts/json/save.json', 'GET', JSON.stringify({ data: hot.getData() }), res => {
        const response = JSON.parse(res.response);

        if (response.result === 'ok') {
            exampleConsole.innerText = 'Data saved';
        } else {
            exampleConsole.innerText = 'Save error';
        }
    });
});

Handsontable.dom.addEvent(autosave, 'click', () => {
    if (autosave.checked) {
        exampleConsole.innerText = 'Changes will be autosaved';
    } else {
        exampleConsole.innerText ='Changes will not be autosaved';
    }
});

function ajax(url, method, params, callback) {
    let obj;

    try {
        obj = new XMLHttpRequest();
    } catch (e) {
        try {
            obj = new ActiveXObject('Msxml2.XMLHTTP');
        } catch (e) {
            try {
                obj = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e) {
                alert('Your browser does not support Ajax.');
                return false;
            }
        }
    }
    obj.onreadystatechange = () => {
        if (obj.readyState == 4) {
            callback(obj);
        }
    };
    obj.open(method, url, true);
    obj.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    obj.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    obj.send(params);

    return obj;
}
function setup() {
    return {
        activeTab: 0,
        tabs: [
            "Форма 0101",
            "Форма 0102",
        ]
    };
};