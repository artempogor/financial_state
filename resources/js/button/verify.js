import {convertToJson} from "./convertJSON";
export async function verify(url = '',infoConsole,hotsarray){
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
            body: convertToJson(hotsarray)// body data type must match "Content-Type" header
        }
    );
    const responseText = await response.text();
    const data = JSON.parse(responseText);
    console.log(data);
    for (var i=0; i<hotsarray.length; i++)
    {
        hotsarray[i].loadData(data[`data${i}`]);
    }

    // if (typeof hot2 != "undefined") {
    //     hot1.loadData(data.data1);
    //     hot2.loadData(data.data2);
    // }
    // else
    // {
    //     hot1.loadData(data.data1);
    // }
    if (response.ok) {
        infoConsole.innerText = "Данные провалидированны  ";
    } else {
        infoConsole.innerText = "Ошибка HTTP: " + response.status;
    }
}