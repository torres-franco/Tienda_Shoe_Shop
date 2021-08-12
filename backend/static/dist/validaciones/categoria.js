function validarDatosCategoria() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    var descripcion = document.getElementById("txtDescripcion").value;
    if (descripcion.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El campo Categoría no debe estar vacío *";
        return;
    } else if (descripcion.length < 2) {   
        divMensajeError.innerHTML = "La categoría debe tener al menos 2 caracteres *";
        return;
    } else if (descripcion.length > 20) {   
        divMensajeError.innerHTML = "La categoría no debe tener más de 20 caracteres *";
    return;

    } else if(/^([0-9])*$/.test(descripcion)) {
        divMensajeError.innerHTML = "Error, sólo se admiten letras";
        return false;
    }

    var form = document.getElementById("frmDatos");
    form.submit();

}