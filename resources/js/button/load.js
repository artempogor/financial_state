export async function getData(url = '',infoConsole,hotsarray) {
    const $ikul = window.globalVariables.ikul;
    const $name_report = window.globalVariables.name_report;
    const response = await fetch(url+'/'+$ikul+'/'+$name_report, {
            method: 'GET',
        }
    );
    const responseText = await response.text();
    const data = JSON.parse(responseText);
    console.log(data);
    for (var i=0; i<hotsarray.length; i++) {
        hotsarray[i].loadData(data[0][`data${i}`]);
    }
    // if (typeof hotsarray[1] != "undefined")
    // {
    //     console.log(typeof(data[0].data0));
    //     console.log(data[0].data1);
    //     hotsarray[0].loadData(data[0].data0);
    //     hotsarray[1].loadData((data[0].data1));
    // }
    // else
    // {
    //     hotsarray[0].loadData([data1].data);
    // }

    if (response.ok)
    {
        infoConsole.innerText = "Данные загруженны из БД ";
    }
    else
    {
        infoConsole.innerText = "Ошибка HTTP: " + response.status;
    }
}