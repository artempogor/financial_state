export function convertToJson(hot1,hot2)
{
    let name_user = window.globalVariables.ikul;
    let name_report  = window.globalVariables.name_report;
    let date = new Date();
    var data = new Object();
    data["info"] = [{INN : name_user,  PERIOD: date.getFullYear(), FORM: name_report}];
    data["data1"]=hot1.getSourceData()
    data["data2"]=hot2.getSourceData()
    let json = JSON.stringify(data,null,'\t');
    return(json);
}