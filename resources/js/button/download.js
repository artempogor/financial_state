const button_download = document.querySelector('#download');
button_download.addEventListener('click', () => {
    let name_user = window.globalVariables.a;
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
    infoConsole.innerText = 'Файл загружен';
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