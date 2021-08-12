function validarDatosPerfil() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    var descripcion = document.getElementById("txtDescripcion").value;
    if (descripcion.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El campo perfil no debe estar vacío *";
        return;
    } else if (descripcion.length < 2) {   
        divMensajeError.innerHTML = "El campo perfil debe tener al menos 2 carácteres *";
        return;
    } else if (descripcion.length > 15) {   
        divMensajeError.innerHTML = "El campo perfil no debe tener más de 15 carácteres *";
    return;

    } else if(/^([0-9])*$/.test(descripcion)) {
        divMensajeError.innerHTML = "Error, el campo descripcion sólo se admite letras *";
        return false;
    }

    var modulo = document.getElementById("cboModulos").value;
    if (modulo.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "Debe seleccionar algún módulo *";
        return;
    }

    var form = document.getElementById("frmDatos");
    form.submit();

}