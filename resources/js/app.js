require('./bootstrap');
import Alpine from "alpinejs"
import Handsontable from 'handsontable';
import 'handsontable/dist/handsontable.full.css';
window.Alpine = Alpine
Alpine.start()
const container1 = document.querySelector('#report1');
const container2 = document.querySelector('#report2');
const infoConsole = document.querySelector('#console');
const button_load = document.querySelector('#download');
const button_download = document.querySelector('#send');
const button_save = document.querySelector('#save');
const button_verify = document.querySelector('#verify');
const button_clear = document.querySelector('#clear');
const button_print = document.querySelector('#print');
const hot1 = new Handsontable(container1, {
    colWidths: [500,200,300,300],
    licenseKey: 'non-commercial-and-evaluation',
    colHeaders:['<b>Актив</b>', '<b>Код строки</b>', '<b>На начало отчетного периода</b>', '<b>На конец отчётного периода</b>' ],
    data:
        [
            {name_column:'I. Необоротные активы\n'+'Нематериальные активы (остаточная стоимость)\n', S:'1000', S1:'', S2:''},
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
            {name_column:'Долгосрочные финансовые инвестиции:\n учитываемые по методу участия в капитале других предприятий', S:'1030', S1:'', S2:''},
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
});
const hot2 = new Handsontable(container2, {
    colWidths: [500,200,300,300],
    licenseKey: 'non-commercial-and-evaluation',
    colHeaders:['<b>Пассив</b>', '<b>Код строки</b>', '<b>На начало отчетного периода</b>', '<b>На конец отчётного периода</b>' ],
    data:
        [
            {name_column:'I. Собственный капитал\n' + 'Зарегистрированный (паевой) капитал\n', S:'1400', S1:'', S2:''},
            {name_column:'Взносы в незарегистрированный уставный капитал', S:'1401', S1:'', S2:''},
            {name_column:'Капитал в дооценках', S:'1405', S1:'', S2:''},
            {name_column:'Дополнительный капитал', S:'1410', S1:'', S2:''},
            {name_column:'эмиссионный доход', S:'1411', S1:'', S2:''},
            {name_column:'накопленные курсовые разницы', S:'1412', S1:'', S2:''},
            {name_column:'Резервный капитал', S:'1415', S1:'', S2:''},
            {name_column:'Нераспределенная прибыль (непокрытый убыток)', S:'1420', S1:'', S2:''},
            {name_column:'Неоплаченный капитал', S:'1425', S1:'', S2:''},
            {name_column:'Изъятый капитал', S:'1430', S1:'', S2:''},
            {name_column:'Прочие резервы', S:'1435', S1:'', S2:''},
            {name_column:'Всего по разделу I', S:'1495', S1:'', S2:''},
            {name_column:'II. Долгосрочные обязательства и обеспечения\n'+'Отсроченные налоговые обязательства\n', S:'1500', S1:'', S2:''},
            {name_column:'Пенсионные обязательства', S:'1505', S1:'', S2:''},
            {name_column:'Долгосрочные кредиты банков', S:'1510', S1:'', S2:''},
            {name_column:'Прочие долгосрочные обязательства', S:'1515', S1:'', S2:''},
            {name_column:'Долгосрочные обеспечения', S:'1520', S1:'', S2:''},
            {name_column:'долгосрочные обеспечения затрат персонала', S:'1521', S1:'', S2:''},
            {name_column:'Целевое финансирование', S:'1525', S1:'', S2:''},
            {name_column:'благотворительная помощь', S:'1526', S1:'', S2:''},
            {name_column:'Страховые резервы', S:'1530', S1:'', S2:''},
            {name_column:'в том числе:\n'+'резерв долгосрочных обязательств \n', S:'1531', S1:'', S2:''},
            {name_column:'резерв убытков или резерв необходимых выплат', S:'1532', S1:'', S2:''},
            {name_column:'резерв незаработанных премий', S:'1533', S1:'', S2:''},
            {name_column:'прочие страховые резервы ', S:'1534', S1:'', S2:''},
            {name_column:'Инвестиционные контракты ', S:'1535', S1:'', S2:''},
            {name_column:'Призовой фонд', S:'1540', S1:'', S2:''},
            {name_column:'Резерв на выплату джек-пота', S:'1545', S1:'', S2:''},
            {name_column:'Всего по разделу II', S:'1595', S1:'', S2:''},
            {name_column:'IІІ. Текущие обязательства и обеспечения\n'+'Краткосрочные кредиты банков\n', S:'1600', S1:'', S2:''},
            {name_column:'Векселя выданные', S:'1605', S1:'', S2:''},
            {name_column:'Текущая кредиторская задолженность:\n'+'по долгосрочным обязательствам\n', S:'1610', S1:'', S2:''},
            {name_column:'за товары, работы, услуги', S:'1615', S1:'', S2:''},
            {name_column:'по расчетам с бюджетом', S:'1620', S1:'', S2:''},
            {name_column:'в том числе из налога на прибыль', S:'1621', S1:'', S2:''},
            {name_column:'по расчетам по страхованию', S:'1625', S1:'', S2:''},
            {name_column:'по расчетам по оплате труда', S:'1630', S1:'', S2:''},
            {name_column:'Текущая кредиторская задолженность по полученным авансам', S:'1635', S1:'', S2:''},
            {name_column:'Текущая кредиторская задолженность по расчетам с участниками', S:'1640', S1:'', S2:''},
            {name_column:'Текущая кредиторская задолженность по внутренним расчетам', S:'1645', S1:'', S2:''},
            {name_column:'Текущая кредиторская задолженность по страховой деятельности ', S:'1650', S1:'', S2:''},
            {name_column:'Текущие обеспечения', S:'1660', S1:'', S2:''},
            {name_column:'Доходы будущих периодов', S:'1665', S1:'', S2:''},
            {name_column:'Отсроченные комиссионные доходы от перестраховщиков', S:'1670', S1:'', S2:''},
            {name_column:'Прочие текущие обязательства', S:'1690', S1:'', S2:''},
            {name_column:'Всего по разделу IІІ', S:'1695', S1:'', S2:''},
            {name_column:'ІV. Обязательства, связанные с необоротными активами, удерживаемыми для продажи, и группами выбытия', S:'1700', S1:'', S2:''},
            {name_column:'V. Чистая стоимость активов негосударственного пенсионного фонда', S:'1800', S1:'', S2:''},
            {name_column:'Баланс', S:'1900', S1:'', S2:''},
        ],
    columns: [{data: 'name_column', readOnly: true}, {data: 'S', readOnly: true}, {data: 'S1', type: 'numeric'}, {data: 'S2', type: 'numeric'}
    ],

});
button_save.addEventListener('click', () => {
    postData('/api/save_reports')
});
button_verify.addEventListener('click', () => {
    verifiApi('/api/export_reports')
        .then(infoConsole.innerText = 'Данные отправленны')
});
button_clear.addEventListener('click', () => {
    if (typeof hot2 != "undefined")
    {
        hot1.clear();
        hot2.clear();
    }
    else
    {
        hot1.clear();
    }
    infoConsole.innerText = 'Данные очищенны'
});
button_load.addEventListener('click', () => {
    getData('/api/load_reports')
});
button_download.addEventListener('click', () => {
    infoConsole.innerText = 'Файл загружен';
    downloadAsFile(convertToJson());
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
  </head><body><div>${hot1.toHTML()}${hot2.toHTML()}</div></body></html>`);
    doc.close();
    doc.defaultView.print();
    setTimeout(() => {
        iframe.parentElement.removeChild(iframe);
    }, 20);
},)
function convertToJson()
{
    let name_user = window.globalVariables.ikul;
    let name_report  = window.globalVariables.name_report;
    let date = new Date();
    var data = new Object();
    data["info"] = [{INN : name_user,  PERIOD: date.getFullYear(), FORM: name_report}];
    data["data1"]=hot1.getSourceData()
    data["data2"]=hot2.getSourceData()
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
async function verifiApi(url = ''){
    const response = await fetch(url, {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json'
            },
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *client
            body: convertToJson()// body data type must match "Content-Type" header
        }
    );
    const responseText = await response.text();
    const data = JSON.parse(responseText);
    if (typeof hot2 != "undefined") {
        hot1.loadData(data.data1);
        hot2.loadData(data.data2);
    }
    else
    {
        hot1.loadData(data.data1);
    }
    if (response.ok) {
        infoConsole.innerText = "Данные провалидированны  ";
    } else {
        infoConsole.innerText = "Ошибка HTTP: " + response.status;
    }
}
async function getData(url = '') {
    const $ikul = window.globalVariables.ikul;
    const $name_report = window.globalVariables.name_report;
    const response = await fetch(url+'/'+$ikul+'/'+$name_report, {
            method: 'GET',
        }
    );
    const responseText = await response.text();
    const data = JSON.parse(responseText);
    if (typeof hot2 != "undefined") {
        hot1.loadData(data[0].data1);
        hot2.loadData(data[0].data2);
    }
    else
    {
        hot1.loadData(data[0].data1);
    }
    if (response.ok) {
        infoConsole.innerText = "Данные загруженны из БД ";
    } else {
        infoConsole.innerText = "Ошибка HTTP: " + response.status;
    }
}
async function postData(url = '') {
    let name_user = window.globalVariables.ikul;
    let name_report  = window.globalVariables.name_report;
    let date = new Date();
    var data = new Object();
    data["info"] = [{INN : name_user,  PERIOD: date.getFullYear(), FORM: name_report}];
    data["data1"]=hot1.getSourceData()
    data["data2"]=hot2.getSourceData()
    const response = await fetch(url, {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json'
        },
        redirect: 'follow', // manual, *follow, error
        referrerPolicy: 'no-referrer', // no-referrer, *client
        body: JSON.stringify(data)// body data type must match "Content-Type" header
    }
    );
    if (response.ok) {
        infoConsole.innerText = "Данные сохранены в БД ";
    } else {
        infoConsole.innerText = "Ошибка HTTP: " + response.status;
    }
}