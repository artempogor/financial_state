export async function getData(url = '',infoConsole,hot1,hot2) {
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