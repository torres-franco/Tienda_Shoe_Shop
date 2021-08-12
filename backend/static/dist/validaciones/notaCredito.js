function validarDatosNotaCredito() {

    var divMensajeError = document.getElementById("mensajeError"); 
    var motivo = document.getElementById("cboMotivo").value;
    if (motivo.trim() == 0) {
        divMensajeError.innerHTML = "Debe seleccionar un motivo *";
        return;
    }


    var form = document.getElementById("frmDatos");
    form.submit();
}
