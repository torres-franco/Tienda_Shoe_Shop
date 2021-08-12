function validarDatosTalle() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    var descripcion = document.getElementById("txtDescripcion").value;
    if (descripcion.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El talle no debe estar vacío *";
        return;

    } else if (descripcion.length > 2) {   
        divMensajeError.innerHTML = "El talle no debe tener más de 2 carácteres *";
    return;
    
    } else if (descripcion <= 0) {   
        divMensajeError.innerHTML = "Error, no se admiten números negativos o nulo";
    return;
    
    }


    var form = document.getElementById("frmDatos");
    form.submit();

}