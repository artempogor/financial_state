require('./bootstrap');
require('alpinejs');
import Handsontable from 'handsontable';
import 'handsontable/dist/handsontable.full.css';
import './button/print';
const container = document.querySelector('#example1');
const infoConsole = document.querySelector('#console');
const button_download = document.querySelector('#download');
const button_save = document.querySelector('#save');
const button_verify = document.querySelector('#verify');
const button_clear = document.querySelector('#clear');
const button_print = document.querySelector('#print');
const hot = new Handsontable(container, {
    autoRowSize: true,
    licenseKey: 'non-commercial-and-evaluation',
    colHeaders:['<b>Актив</b>', '<b>Код строки</b>', '<b>На начало отчетного периода</b>', '<b>На конец отчётного периода</b>' ],
    data:
        [
            {name_column:'Нематериальные активы (остаточная стоимость)', S:'1000', S1:'', S2:''},
            {name_column:'первоначальная стоимость', S:'1001', S1:'', S2:''},
            {name_column:'накопленая амортизация', S:'1002', S1:'', S2:''},
            {name_column:'Незавершенные капитальные инвестиции', S:'1005', S1:'', S2:''},
            {name_column:'Основные средства (остаточная стоимость)', S:'1010', S1:'', S2:''},
            {name_column:'первоначальная стоимость', S:'1011', S1:'', S2:''},
            {name_column:'износ', S:'1012', S1:'', S2:''},
            {name_column:'Инвестиционная недвижимость (остаточная стоимость)', S:'1015', S1:'', S2:''},
            {name_column:'первоначальная стоимость инвестиционной недвижимости', S:'1016', S1:'', S2:''},
            {name_column:'износ инвестиционной недвижимости', S:'1017', S1:'', S2:''},
            {name_column:'Долгосрочные биологические активы (остаточная стоимость)', S:'1020', S1:'', S2:''},
            {name_column:'первоначальная стоимость долгосрочных биологических активов', S:'1021', S1:'', S2:''},
            {name_column:'накопленная амортизация долгосрочных биологических активов', S:'1022', S1:'', S2:''},
            {name_column:'Долгосрочные финансовые инвестиции:\nучитываемые по методу участия в капитале других предприятий', S:'1030', S1:'', S2:''},
            {name_column:'Прочие финансовые инвестиции', S:'1035', S1:'', S2:''},
            {name_column:'Долгосрочная дебиторская задолженность', S:'1040', S1:'', S2:''},
            {name_column:'Отсроченные налоговые активы', S:'1045', S1:'', S2:''},
            {name_column:'Гудвилл', S:'1050', S1:'', S2:''},
            {name_column:'Отсроченные аквизационные затраты', S:'1060', S1:'', S2:''},
            {name_column:'Остаток средств в централизованных страховых резервных фондах', S:'1065', S1:'', S2:''},
            {name_column:'Прочие необоротные активы', S:'1090', S1:'', S2:''},
            {name_column:'Всего по разделу I', S:'1095', S1:'', S2:''},
            {name_column:'II. Оборотные активы\n Запасы', S:'1100', S1:'', S2:''},
            {name_column:'производственные запасы', S:'1101', S1:'', S2:''},
            {name_column:'незавершенное производство', S:'1102', S1:'', S2:''},
            {name_column:'готовая продукция', S:'1103', S1:'', S2:''},
            {name_column:'товары', S:'1104', S1:'', S2:''},
            {name_column:'Текущие биологические активы', S:'1110', S1:'', S2:''},
            {name_column:'Депозиты перестрахования', S:'1115', S1:'', S2:''},
            {name_column:'Векселя полученные', S:'1120', S1:'', S2:''},
            {name_column:'Дебиторская задолженность за продукцию, товары,\n работы, услуги', S:'1125', S1:'', S2:''},
            {name_column:'Дебиторская задолженность по расчетам:\nПо выданным авансам', S:'1130', S1:'', S2:''},
            {name_column:'С бюджетом', S:'1135', S1:'', S2:''},
            {name_column:'в том числе из налога на прибыль', S:'1136', S1:'', S2:''},
            {name_column:'Дебиторская задолженность по расчетам по начисленным доходам', S:'1140', S1:'', S2:''},
            {name_column:'Дебиторская задолженность по расчетам по внутренним расчетам', S:'1145', S1:'', S2:''},
            {name_column:'Прочая текущая дебиторская задолженность', S:'1155', S1:'', S2:''},
            {name_column:'Текущие финансовые инвестиции', S:'1160', S1:'', S2:''},
            {name_column:'Денежные средства и их эквиваленты', S:'1165', S1:'', S2:''},
            {name_column:'наличные', S:'1166', S1:'', S2:''},
            {name_column:'счета в банках', S:'1167', S1:'', S2:''},
            {name_column:'Расходы будущих периодов', S:'1170', S1:'', S2:''},
            {name_column:'Доля перестраховщика в страховых резервах', S:'1180', S1:'', S2:''},
            {name_column:'в том числе в:\n резервах долгосрочных обязательств', S:'1181', S1:'', S2:''},
            {name_column:'резервах убытков или резервах надлежащих выплат', S:'1182', S1:'', S2:''},
            {name_column:'резервах незаработанных премий ', S:'1183', S1:'', S2:''},
            {name_column:'прочих страховых резервах ', S:'1184', S1:'', S2:''},
            {name_column:'Прочие оборотные активы ', S:'1190', S1:'', S2:''},
            {name_column:'Всего по разделу II', S:'1195', S1:'', S2:''},
            {name_column:'III. Необоротные активы, удерживаемые для продажи, и группы выбытия', S:'1120', S1:'', S2:''},
            {name_column:'Баланс', S:'1300', S1:'', S2:''},
        ],
        columns: [
        {
            data: 'name_column',
            readOnly: true
        },
        {
            data: 'S',
            readOnly: true
        },
        {
            data: 'S1',
            type: 'numeric'
        },
        {
            data: 'S2',
            type: 'numeric'
        }
    ],
    hiddenColumns: {
        columns: [1],
        indicators: false
    },
});
button_save.addEventListener('click', () => {
    postData('/api/save_reports',{ answer: 42 })
        .then(infoConsole.innerText = 'Данные отправленны')
});
button_verify.addEventListener('click', () => {
    postData('/api/export_reports',converToJson())
        .then(infoConsole.innerText = 'Данные отправленны')

});
button_clear.addEventListener('click', () => {
    hot.clear();
    infoConsole.innerText = 'Данные очищенны'
});
button_download.addEventListener('click', () => {
    infoConsole.innerText = 'Файл загружен';
    downloadAsFile(converToJson());
})
button_print.addEventListener('click', () => {
    const iframe = document.createElement('iframe');
    iframe.style.cssText = 'display: none';
    document.body.appendChild(iframe);
    const doc = iframe.contentDocument;
    doc.open('text/html', 'replace');
    doc.write(`<!doctype html><html><head>
  <style>
    @media print {
      table {
        border-collapse: collapse;
      }
      th, td {
        border: 1px solid #ccc;
        min-width: 50px;
        padding: 2px 4px;
      }
      th {
        background-color: #f0f0f0;
        text-align: center;
        font-weight: 400;
        white-space: nowrap;
        -webkit-print-color-adjust: exact;
      }
    }
  </style>
  </head><body>${hot.toHTML()}</body></html>`);
    doc.close();
    doc.defaultView.print();
    setTimeout(() => {
        iframe.parentElement.removeChild(iframe);
    }, 10);
},)
function converToJson()
{
    let name_user = window.globalVariables.a;
    let data = hot.getSourceData().map(e => (delete e.name_column, e));
    var info = {name : name_user,  color: "resd",};
    data.unshift(info);
    // let json = JSON.stringify(data,null,'\t');
    let json = JSON.stringify(data,null,'\t');
    return(json);
}
function downloadAsFile(data) {
    let d = new Date();
    let dformat = `${d.getFullYear()}-${d.getDate()}-${d.getHours()}-${d.getMinutes()}`;
    let a = document.createElement("a");
    let file = new Blob([data], {type: 'application/json'});
    a.href = URL.createObjectURL(file);
    a.download = "form_balance-"+dformat+" .json";
    a.click();
}
async function postData(url = '', data = {}) {
    const data_api = JSON.stringify(hot.getSourceData());

    const response = await fetch(url, {
            method: 'POST',
            body:data_api, // body data type must match "Content-Type" header
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            referrerPolicy: 'no-referrer', // no-referrer, *client
        }
    );

    const responseText = await response.text();
    const new_data = JSON.parse(responseText);
    console.log(new_data);
}