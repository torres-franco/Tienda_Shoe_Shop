function validarDatosColores() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    var descripcion = document.getElementById("txtDescripcion").value;
    if (descripcion.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El color no debe estar vacío *";
        return;
    } else if (descripcion.length < 3) {   
        divMensajeError.innerHTML = "El color debe tener al menos 3 carácteres *";
        return;
    } else if (descripcion.length > 15) {   
        divMensajeError.innerHTML = "El color no debe tener más de 15 carácteres *";
    return;

    } else if(/^([0-9])*$/.test(descripcion)) {
        divMensajeError.innerHTML = "Error, sólo se admiten letras *";
        return false;
    }

    var form = document.getElementById("frmDatos");
    form.submit();

}