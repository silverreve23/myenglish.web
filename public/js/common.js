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
$(document).ready(function(){
    $('form').on('keyup keypress', function(e) {
      var keyCode = e.keyCode || e.which;
      if (keyCode === 13) { 
        e.preventDefault();
        return false;
      }
    });
});