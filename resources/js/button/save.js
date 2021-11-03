 function post(url = '',data) {
    const response = fetch(url, {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json'
            },
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *client
            body: JSON.stringify({'data':data,'ikul':window.globalVariables.ikul,'name_report':window.globalVariables.name_report} )// body data type must match "Content-Type" header
        }
    );
    if (response.ok) {
        infoConsole.innerText = "Данные сохранены в БД ";
    } else {
        infoConsole.innerText = "Ошибка HTTP: " + response.status;
    }
}