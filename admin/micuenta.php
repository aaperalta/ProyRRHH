<?php
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null ;

if($user == ''){
	header('Location: http://localhost:8080/proyecto_rrhh/user/index.php?error=2');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_base.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<link rel="stylesheet" href="css1/bootstrap.min.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title></title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="css/estilopal2.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Josefin+Slab:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dosis:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<?php include("includes/google.php"); ?>
</head>

<body>

<div class="container">
  <div class="header"><!-- InstanceBeginEditable name="ParteSuperior_1" -->
  
  <p>&nbsp;</p>
<?php include("includes/cabecera.php"); ?>
    <div class ="clearfloat"></div>
    <?php include("includes/menu.html"); ?>
  <!-- InstanceEndEditable --></div>
  <div class="sidebar1"><!-- InstanceBeginEditable name="Contenido_izq" -->
  
  
  <h5><strong>MI CUENTA</strong><h5>
    

	<div class="">
	<div class="table-responsive">
	
	<?php $foto_1= $_SESSION['foto_u'];?>
	<img width="11%" src=" data:image/jpg; base64 , <?php echo base64_encode ($foto_1);?>" /> 
	
    <table class="table"  border="2" >
      <tr >
        <td>Usuario:</td>
        <td><?php echo " " . $_SESSION['user'];?> </td>
      </tr>
	  <tr>
        <td>Tipo de Cuenta:</td>
        <td><?php echo " " . $_SESSION['perfil'];?></td>
      </tr>
      <tr>
    </table>
    </div>
    </div>
   


  
    

   
  <!-- InstanceEndEditable -->
    <!-- end .sidebar1 --></div>

  <div class="content"><!-- InstanceBeginEditable name="Contenido_der" -->
  <!-- end .content -->
  <!-- InstanceEndEditable --></div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
  <div class="footer">
  <?php include("includes/pie.php"); ?></div>
  <!-- end .container --></div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
<!-- InstanceEnd --></html>

