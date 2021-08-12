function validarModulo() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    var descripcion = document.getElementById("txtDescripcion").value;
    if (descripcion.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El campo módulo no debe estar vacío *";
        return;
    } else if (descripcion.length < 3) {   
        divMensajeError.innerHTML = "El campo módulo debe tener al menos 3 carácteres *";
        return;
    } else if (descripcion.length > 15) {   
        divMensajeError.innerHTML = "El campo módulo no debe tener más de 15 carácteres *";
    return;

    } else if(/^([0-9])*$/.test(descripcion)) {
        divMensajeError.innerHTML = "Error, el campo módulo sólo se admite letras *";
        return false;
    }

    var directorio = document.getElementById("txtDirectorio").value;
    if (directorio.trim() == "") {
        divMensajeError.innerHTML = "El campo directorio no debe estar vacío *";
        return;
    } else if (directorio.length < 3) {   
        divMensajeError.innerHTML = "El campo directorio debe tener al menos 3 carácteres *";
        return;
    } else if (directorio.length > 15) {   
        divMensajeError.innerHTML = "El campo directorio no debe tener más de 15 carácteres *";
    return;

    } else if(/^([0-9])*$/.test(directorio)) {
        divMensajeError.innerHTML = "Error, el campo directorio sólo se admite letras *";
        return false;
    }

    var form = document.getElementById("frmDatos");
    form.submit();

}