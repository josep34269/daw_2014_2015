<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link href="./css/styles.css" rel="stylesheet">
<title>Documento sin título</title>
</head>

<body>
	<div class="container">

      <form class="form-signin" role="form" action="up.php" method="post" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Fichero que deseas subir</h2>
        <label for="inputFile" class="sr-only">Fichero</label>
        <input class="file" type="file" name="archivo" id="archivo"></input>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
      </form>

    </div>
	<!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>