import {convertToJson} from "./convertJSON";
export async function verify(hot1,hot2,url = '',infoConsole,){
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
            body: convertToJson(hot1,hot2)// body data type must match "Content-Type" header
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