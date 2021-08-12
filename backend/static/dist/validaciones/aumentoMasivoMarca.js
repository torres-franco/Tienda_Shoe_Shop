function guardar() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    var marca = document.getElementById("cboMarca").value;
    if (marca.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "Seleccione una Marca *";
        return;
    }

    var form = document.getElementById("frmDatos");
    form.submit();

}