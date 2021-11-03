async function getData(url = '') {
    const $ikul = window.globalVariables.ikul;
    const $name_report = window.globalVariables.name_report;
    const response = await fetch(url+'/'+$ikul+'/'+$name_report, {
            method: 'GET',
        }
    );
    const responseText = await response.text();
    const data = JSON.parse(responseText);
    hot.loadData(data);
    if (response.ok) {
        infoConsole.innerText = "Данные загруженны из БД ";
    } else {
        infoConsole.innerText = "Ошибка HTTP: " + response.status;
    }
}