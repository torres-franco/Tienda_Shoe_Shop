<!DOCTYPE html>
<html>
<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>Proceso de datos</title>

</head>
<body>

<div class="container">
  <div class="row justify-content-center mt-3 pt-3">
      <p class="navbar-brand">
        <img src="../img/logo.png" width="50" height="40" alt="">
          <h1>Ejercicios</h1>
      </p>
  </div>

	<div>
	   <a href="../menu_principal.html" class="btn btn-secondary mt-3" role="button">< Menu</a>
  </div>

  <div class="card border-secondary mt-3">
          
    <div class="card-header">
      <h5 class="text-center">
        <?php echo $_POST['txtNombre'];?> <?php echo $_POST['txtApellido']; ?>
      </h5>
      <h6 class="card-subtitle mb-2 text-center text-muted">
        <?php echo $_POST['txtCorreoElectronico']; ?>
      </h6>
    </div>
          
    <div class="card-body">

      <p class="card-text">
        <cite title="Source Title" class="text-muted">Mensaje:</cite>
      <br>
        <?php echo $_POST['txtMensaje']; ?>
      </p>
            
        <a href="../archivo4.html" class="card-link">Nuevo mensaje</a>
    </div>

  </div>

</div>

</body>
</html>