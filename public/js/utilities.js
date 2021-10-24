/* Covertir Mayusculas*/

function toUpperCaseField(e) {
    e.value = e.value.toUpperCase();
}

/** Mascaras de campos */
function n_dui_mask(e) {
    var maskOptions = {
        mask: "00000000-0"
    };
    var mask = IMask(e, maskOptions);
}

function n_nit_mask(e) {
    var maskOptions = {
        mask: "0000-000000-000-0"
    };
    var mask = IMask(e, maskOptions);
}

function local_tel_mask(e) {
    var maskOptions = {
        mask: "0000-0000"
    };
    var mask = IMask(e, maskOptions);
}

function n_placa_mask(e) {
    var maskOptions = {
    mask: /^[a-z]{1}[0-9a-f]{0,6}$/i
    };
    var mask = IMask(e, maskOptions);
}

function money_mask(e){
    
    var numberMask = IMask(e, {
        mask:'$num',
        blocks:{
            num:{
                // other options are optional with defaults below
        scale: 2,  // digits after point, 0 for integers
        signed: false,  // disallow negative
        thousandsSeparator: '',  // any single char
        padFractionalZeros: false,  // if true, then pads zeros at end to the length of scale
        normalizeZeros: true,  // appends or removes zeros at ends
        radix: '.',  // fractional delimiter
        mapToRadix: ['.'],  // symbols to process as radix
        max: 1000000
            }
        }
        
      });
    
}

/* Otras Funciones */