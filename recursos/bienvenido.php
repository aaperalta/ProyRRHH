<?php

require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null ;

if($user == ''){
	header('Location: http://localhost:8888/designprojects/users/index.php?error=2');
}

?>
<!DOCTYPE html>

<html lang="esp">

    <head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<link rel="stylesheet" href="css1/bootstrap.min.css" />
            <title>INGRESO SATISFACTORIO</title>
    </head>
        
    <body>
        
        <?php echo "Bienvenido, " . $_SESSION['user'];?>
        
       
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script> 
    </body>
    
</html>