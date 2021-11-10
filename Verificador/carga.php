<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cargaStyles.css">

    <script type="text/javascript">
        setTimeout(function(){
            var codigo = "<?php echo $_GET["codigo"]; ?>";
            window.location = "mostrar_producto.php?codigo=" + codigo; 
        }, 3000);
    </script>

</head>
<body>
    
    <div class='img'>
        <img src="img/loading-56.gif" alt="" width="20%" height=auto>
    </div>
    
    <h1 style="text-align: center;">Cargando información del producto</h1>
</body>
</html>