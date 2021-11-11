export function downloadAsFile(data) {
    let d = new Date();
    let dformat = `${d.getFullYear()}-${d.getDate()}-${d.getHours()}-${d.getMinutes()}`;
    let a = document.createElement("a");
    let file = new Blob([data], {type: 'application/json'});
    a.href = URL.createObjectURL(file);
    a.download = "form_balance-"+dformat+" .json";
    a.click();
}