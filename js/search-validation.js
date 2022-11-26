function searchValidation() {
    var input = document.forms['szoKereses']['keresett'];
    input.value = input.value.trim();
    input.errorMsg = input.nextElementSibling;
    if (input.value === '') {
        input.errorMsg.innerHTML = 'Ezt a mezőt ki kell tölteni!';
        hiba = true;
    } else
    if (input.value.length < 2) {
        input.errorMsg.innerHTML = 'A szó túl rövid!';
        hiba = true;
    } else {
        input.errorMsg.innerHTML = '';
    }
    
    return !hiba;
}