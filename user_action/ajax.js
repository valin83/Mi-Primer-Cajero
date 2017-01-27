function Ajax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function OrdenarPor(campo, orden) {
    //especificamos en div donde se mostrar� el resultado
    divListado = document.getElementById('listado');

    ajax = Ajax();
    //especificamos el archivo que realizar� el listado
    //y enviamos las dos variables: campo y orden
    ajax.open("GET", "movement.php?campo=" + campo + "&orden=" + orden);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            divListado.innerHTML = ajax.responseText
        }
    }
    ajax.send(null)
}