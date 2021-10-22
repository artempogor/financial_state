const button_save = document.querySelector('#verify');
button_save.addEventListener('click', () => {
    let json_api = JSON.stringify(hot.getSourceData(),null,'\t');
    postData('/api/export')
        .then(infoConsole.innerText = 'Данные отправленны')
});
async function postData(url = '') {
    const data_api = JSON.stringify(hot.getSourceData());
    const response = await fetch(url, {
            method: 'POST',
            body:data_api, // body data type must match "Content-Type" header
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            referrerPolicy: 'no-referrer', // no-referrer, *client
        }
    );
    console.log(data_api);
    const responseText = await response.text();
    const data = JSON.parse(responseText);
    hot.loadData(data);
}