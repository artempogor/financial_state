require('./bootstrap');
require('alpinejs');
import Handsontable from 'handsontable';
import 'handsontable/dist/handsontable.full.css';
const container = document.querySelector('#example1');
const button = document.querySelector('#export-file');
const hot = new Handsontable(container, {
    fixedColumnsLeft: 1,
    fixedRowsTop: 1,
    width: 'auto',
    height: 'auto',
    manualColumnFreeze: true,
    manualRowMove: true,

    data:
    [
     //{Activ:'1',Kod_stroki:'2',Na_nachalo_otchetnogo_perioda:'3',Na_konec_otchetnogo_perioda:'4' },
      {Activ:'Нематериальные активы (остаточная стоимость)', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
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
        {Activ:'Долгосрочные финансовые инвестиции:учитываемые по методу участия в капитале других предприятий', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Прочие финансовые инвестиции', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Долгосрочная дебиторская задолженность', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Отсроченные налоговые активы', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Гудвилл', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Отсроченные аквизационные затраты', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Остаток средств в централизованных страховых резервных фондах', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Прочие необоротные активы', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Всего по разделу I', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
        {Activ:'Долгосрочные биологические активы (остаточная стоимость)', Kod_stroki:'', Na_nachalo_otchetnogo_perioda:'', Na_konec_otchetnogo_perioda:''},
    ],
    colHeaders:['Актив', 'Код строки', 'На начало отчетного периода', 'На конец отчётного периода' ],
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
    console.log(name_user);
    let json = JSON.stringify({ data: hot.getData() });
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
};