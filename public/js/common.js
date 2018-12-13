function setPeriod(e){
    var request = new XMLHttpRequest();
    request.open('GET', '/change-period/' + e.value);
    request.send();
}