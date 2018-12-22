function setPeriod(e){
    var request = new XMLHttpRequest();
    request.open('GET', '/change-period/' + e.value);
    request.send();
}
function setAutoChangeKeyLang(e){
    var request = new XMLHttpRequest();
    request.open('GET', '/change-autochangekeylang/' + e.checked);
    request.send();
}