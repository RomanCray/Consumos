function validarSoloNum(numero) {
    if ((numero != null || numero != "") && numero.length > 0) {
        if (!isNaN(numero)) {
            return true;
        } else {
            return false;
        }
    }
    return false;
}

function validarEmail(mail) {
    if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(mail)) {
        return true;
    } else {
        return false;
    }
}

function validarVacios(campo) {
    if (campo != null) {
        if (campo.length > 0 && campo != "" && campo != 0) {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}




