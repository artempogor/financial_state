export async function postData(url = '',infoConsole,hot1,hot2) {
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
