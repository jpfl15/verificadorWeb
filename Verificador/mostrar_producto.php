<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link rel="stylesheet" href="css/productStyles.css">

    
    <script type="text/javascript">
        setTimeout(function(){
            window.location.href = "index.html"; 
        }, 5000);
    </script>
    
    <script>
       if (window.addEventListener){
            var codigo = "";
            window.addEventListener("keydown", function (e) {
                codigo += String.fromCharCode(e.keyCode);
                if (e.keyCode == 13){
                    window.location = "mostrar_producto.php?codigo=" + codigo;
                    codigo = "";
                }
            }, true);
        }
    </script>
    <div>
        <center>
        <img src='img/Icon-Placeholder-1.png' alt='' width='10%' height=auto>
        </center>
    </div>
</head>
<body>
    
        <?php
            //print_r($_GET);
            include ("./inc/settings.php");
            
            try{
                $conn = new PDO("mysql:host=".$host.";dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $codigo = $_GET["codigo"];
                if (!ctype_digit($codigo)) {
                    $codigo = "-1";
                }
                
                $stmt = $conn->prepare("SELECT * FROM productos WHERE producto_codigo = ".$codigo.";");
                $stmt->execute();
                
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $renglones=$stmt->rowCount();

                if ($renglones==1){
                    
                    echo "
                    
                    <div class='father'>
                        <div class='img'>
                        <img src={$result['producto_imagen']} width='350px' height='350px'>
                        </div>

                        <div class='info'>
                        <h1> 
                            {$result['producto_nombre']}<br><br>
                            $ {$result['producto_precio']}<br><br>
                            Stock: {$result['producto_cantidad_disponible']}<br><br>
                            <img src='img/barcode.png' width='30%' height=auto><br>
                            {$codigo}
                        </h1>
                        
                        </div>
                    </div>
                    ";

                }
                else{
                    echo "<h1>No se encuentra el producto <br>";
                    echo "<img class='error' src='img/error.png' alt='' width='25%' height='25%'></h1>";
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
    
</body>
</html>