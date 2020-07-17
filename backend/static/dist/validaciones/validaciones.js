function validarDatos() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    var nombre = document.getElementById("txtNombre").value;
    if (nombre.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El nombre no debe estar vacio</font>";
        return;
    }

    if (nombre.length < 3) {
        //alert("El nombre debe contener al menos 3 caracteres");
        divMensajeError.innerHTML = "El nombre debe contener al menos 3 caracteres</font>";
        return;
    }

    var form = document.getElementById("frmDatos");
    form.submit();
}