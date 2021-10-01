require('./bootstrap');
require('alpinejs');
import Handsontable from 'handsontable';
import 'handsontable/dist/handsontable.full.css';
const container = document.querySelector('#example1');
const button = document.querySelector('#export-file');
const hot = new Handsontable(container, {
    fixedColumnsLeft: 1,
    width: 'auto',
    height: 'auto',
    manualColumnFreeze: true,
    manualRowMove: true,
    data:
    [
        {Activ:'первоначальная стоимость', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Незавершенные капитальные инвестиции', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Основные средства (остаточная стоимость)', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'первоначальная стоимость', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'износ', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Инвестиционная недвижимость', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Инвестиционная недвижимость (остаточная стоимость)', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'первоначальная стоимость инвестиционной недвижимости', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'износ инвестиционной недвижимости', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'первоначальная стоимость долгосрочных биологических активов', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'накопленная амортизация долгосрочных биологических активов', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Долгосрочные финансовые инвестиции:\nучитываемые по методу участия в капитале других предприятий', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Прочие финансовые инвестиции', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Долгосрочная дебиторская задолженность', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Отсроченные налоговые активы', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Гудвилл', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Отсроченные аквизационные затраты', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Остаток средств в централизованных страховых резервных фондах', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Прочие необоротные активы', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Всего по разделу I', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'II. Оборотные активы\n Запасы', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'производственные запасы', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'незавершенное производство', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'готовая продукция', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'товары', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Текущие биологические активы', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Депозиты перестрахования', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Векселя полученные', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Дебиторская задолженность за продукцию, товары,\n работы, услуги', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Дебиторская задолженность по расчетам:\nПо выданным авансам', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'С бюджетом', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'в том числе из налога на прибыль', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Дебиторская задолженность по расчетам по начисленным доходам', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Дебиторская задолженность по расчетам по внутренним расчетам', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Прочая текущая дебиторская задолженность', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Текущие финансовые инвестиции', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Денежные средства и их эквиваленты', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'наличные', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'счета в банках', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Расходы будущих периодов', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Доля перестраховщика в страховых резервах', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'в том числе в:\n резервах долгосрочных обязательств', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'резервах убытков или резервах надлежащих выплат', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'резервах незаработанных премий ', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'прочих страховых резервах ', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Прочие оборотные активы ', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Всего по разделу II', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'III. Необоротные активы, удерживаемые для продажи, и группы выбытия', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Баланс', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},

    ],
    colHeaders:['<b>Актив</b>', '<b>Код строки</b>', '<b>На начало отчетного периода</b>', '<b>На конец отчётного периода</b>' ],
    licenseKey: 'non-commercial-and-evaluation',
    columns: [
    {
        data: 'Activ',
        readOnly: true
    },
    {
        data: 'Kod_stroki'
    },
    {
        data: 'Na_nachalo_otchetnogo_perioda'
    },
    {
        data: 'Na_konec_otchetnogo_perioda'
    }
]
});
button.addEventListener('click', () => {
    let name_user = window.globalVariables.a;
    // console.log(hot.getSourceData());
    let data = hot.getSourceData();
    let newData = data.map((item,index) => {
        let newItem = {
            [`S1_${index}`]: item["Activ"],
            [`S2_${index}`]: item["Kod_stroki"],
            [`S3_${index}`]: item["Na_nachalo_otchetnogo_perioda"],
            [`S4_${index}`]: item["Na_konec_otchetnogo_perioda"],
        }
        delete newItem["Activ","Kod_stroki","Na_nachalo_otchetnogo_perioda","Na_konec_otchetnogo_perioda"]
        return newItem
    })
    let json = JSON.stringify(newData,null,'\t');
    console.log(json);
    downloadAsFile(json,name_user);
})
function downloadAsFile(data,name) {
    let d = new Date();
    let dformat = `${d.getFullYear()}-${d.getDate()}-${d.getHours()}-${d.getMinutes()}`;
    let a = document.createElement("a");
    let file = new Blob([data], {type: 'application/json'});
    a.href = URL.createObjectURL(file);
    a.download = "form_balance-"+dformat+"-"+name+".json";
    a.click();
}
document.getElementById('print').addEventListener('click', () => {
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
});