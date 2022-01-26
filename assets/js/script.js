let keyboardElements = document.querySelectorAll('.keyboard-element');
let actualKey;
for(let keyIndex = 0; keyIndex < keyboardElements.length; keyIndex++){
    keyboardElements[keyIndex].addEventListener('click', getButtonValue);
}

function getButtonValue(){
    let buttonValue = this.innerText;
    console.log(buttonValue);
    if(!isNaN(buttonValue)){
        buttonValue = parseInt(buttonValue);
        console.log(typeof(buttonValue));
    }
    return buttonValue;
}
actualKey = getButtonValue();

    function filterme(value) {
        value = parseInt(value, 10); // Convert to an integer
        if (value === 1) {
            $('#RangeFilter').removeClass('rangeAll', 'rangePassive').addClass('rangeActive');
            $('body').removeClass('theme-2 theme-3').addClass('theme-1');
        } else if (value === 2) {
            $('#RangeFilter').removeClass('rangeActive', 'rangePassive').addClass('rangeAll');
            $('body').removeClass('theme-1 theme-3').addClass('theme-2');
        } else if (value === 3) {
            $('#RangeFilter').removeClass('rangeAll', 'rangeActive').addClass('rangePassive');
            $('body').removeClass('theme-1 theme-2').addClass('theme-3');
        }
    }









