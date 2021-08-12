function validarDatosFactura() {

    var divMensajeError = document.getElementById("mensajeError");  
    var numero = document.getElementById("txtNumero").value;
    if (numero.trim() == "") {
        divMensajeError.innerHTML = "Debe ingresar un número de factura *";
        return;
    }else if(numero.length < 4){
        divMensajeError.innerHTML = "El número de factura debe contener más de 4 dígitos";
        return;
    }else if(numero.length > 25){
        divMensajeError.innerHTML = "El número de factura no debe contener más de 25 dígitos";
        return;
    }else if(numero <= 0){
        divMensajeError.innerHTML = "El número de factura no debe contener números negativo o nulo";
        return;
    }

    var numero = document.getElementById("cboTipoPago").value;
    if (numero.trim() == 0) {
        divMensajeError.innerHTML = "Debe seleccionar un tipo de pago *";
        return;
    }

    var numero = document.getElementById("cboTipoFactura").value;
    if (numero.trim() == 0) {
        divMensajeError.innerHTML = "Debe seleccionar el tipo de factura *";
        return;
    }


    var form = document.getElementById("frmDatos");
    form.submit();
}
