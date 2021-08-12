function validarDatosProductos() {

    var divMensajeError = document.getElementById("mensajeError");  
    var marca = document.getElementById("cboMarca").value;
    if (marca.trim() == 0) {
        divMensajeError.innerHTML = "Debe seleccionar una marca *";
        return;
    }

    var descripcion = document.getElementById("txtDescripcion").value;
    if (descripcion.trim() == "") {
        divMensajeError.innerHTML = "La descripción no debe estar vacía *";
        return;
    } else if (descripcion.length < 2) {
        divMensajeError.innerHTML = "La descripción debe tener al menos 2 caracteres *";
        return;
    } else if (descripcion.length > 20) {
        divMensajeError.innerHTML = "La descripción no debe contener más de 20 caracteres *";
        return;
    }

    var precio = document.getElementById("txtPrecio").value;
    if (precio.trim() == 0) {
        divMensajeError.innerHTML = "El precio no debe estar vacío *";
        return;
    } else if (precio.length < 3) {  
        divMensajeError.innerHTML = "El precio debe contener al menos 3 dígitos *";
        return;
    } else if (precio.length > 10) {  
        divMensajeError.innerHTML = "El precio no debe contener más de 10 dígitos *";
        return;
    } else if (precio < 0) {  
        divMensajeError.innerHTML = "El campo precio, no admite números negativos.";
        return;
    }

    var stockActual = document.getElementById("txtStockActual").value;
    if (stockActual.trim() == 0) {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "Ingrese el stock actual *";
        return;
    } else if (stockActual < 0) {  
        divMensajeError.innerHTML = "El campo Stock actual, no admite números negativos.";
        return;
    }

    var stockMinimo = document.getElementById("txtStockMinimo").value;
    if (stockMinimo.trim() == 0) {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "Ingrese el stock minimo *";
        return;
    } else if (stockMinimo < 0) {  
        divMensajeError.innerHTML = "El campo Stock mínimo, no admite números negativos.";
        return;
    }

    var divMensajeError = document.getElementById("mensajeError");  
    var categoria = document.getElementById("cboCategoria").value;
    if (categoria.trim() == 0) {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "Debe seleccionar una categoría *";
        return;
    }

    var divMensajeError = document.getElementById("mensajeError");  
    var color = document.getElementById("cboColor").value;
    if (color.trim() == 0) {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "Debe seleccionar un color *";
        return;
    }

    var divMensajeError = document.getElementById("mensajeError");  
    var talle = document.getElementById("cboTalle").value;
    if (talle.trim() == 0) {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "Debe seleccionar un talle *";
        return;
    }


    var form = document.getElementById("frmDatos");
    form.submit();

}