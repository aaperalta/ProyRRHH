<?php require_once('../Connections/conexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE users SET loginUsers=%s, passUsers=%s, idprofile=%s, emailUser=%s WHERE idUsers=%s",
                       GetSQLValueString($_POST['loginUsers'], "text"),
                       GetSQLValueString($_POST['passUsers'], "text"),
                       GetSQLValueString($_POST['idprofile'], "int"),
                       GetSQLValueString($_POST['emailUser'], "text"),
                       GetSQLValueString($_POST['idUsers'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

  $updateGoTo = "ListadoUsuarios.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['idUsers'])) {
  $colname_Recordset1 = $_GET['idUsers'];
}
mysql_select_db($database_conexion, $conexion);
$query_Recordset1 = sprintf("SELECT * FROM users WHERE idUsers = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
  
  
<?php include("includes/cabecera.php"); ?>
    <div class ="clearfloat"></div>
    <?php include("includes/menu.html"); ?>
  <!-- InstanceEndEditable --></div>
  <div class="sidebar1"><!-- InstanceBeginEditable name="Contenido_izq" -->
  
  <h5><strong>LISTADO DE USUARIOS</strong><h5>
    
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"></td>
          <td><?php echo $row_Recordset1['idUsers']; ?></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">USUARIO</td>
          <td><input class="form-control" type="text" name="loginUsers" value="<?php echo htmlentities($row_Recordset1['loginUsers'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">CONTRASE&NtildeA</td>
          <td><input class="form-control" type="text" name="passUsers" value="<?php echo htmlentities($row_Recordset1['passUsers'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
        
        <td nowrap="nowrap" align="right">PERFIL</td>
          <td> <select class="form-control" type="text" class="" name="idprofile" id="option"> 
          <option value="<?php echo htmlentities($row_Recordset1['idprofile'], ENT_COMPAT, 'iso-8859-1'); ?>"> 1 </option>
          <option value="<?php echo htmlentities($row_Recordset1['idprofile'], ENT_COMPAT, 'iso-8859-1'); ?>"> 2 </option>
          <option value="<?php echo htmlentities($row_Recordset1['idprofile'], ENT_COMPAT, 'iso-8859-1'); ?>"> 3 </option>
          <option value="<?php echo htmlentities($row_Recordset1['idprofile'], ENT_COMPAT, 'iso-8859-1'); ?>"> 4 </option>     
          </select></td>       
        </tr>
             
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">CORREO:</td>
          <td><input class="form-control" type="text" name="emailUser" value="<?php echo htmlentities($row_Recordset1['emailUser'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input class="btn btn-sm btn-primary btn-block" type="submit" value="ACTUALIZAR" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form1" />
      <input type="hidden" name="idUsers" value="<?php echo $row_Recordset1['idUsers']; ?>" />
    </form>
    <p>&nbsp;</p>
<p>&nbsp;</p>
  <!-- InstanceEndEditable -->
    <!-- end .sidebar1 --></div>
  <!-- InstanceBeginEditable name="Parte_Superior" --><!-- InstanceEndEditable -->
  <div class="content"><!-- InstanceBeginEditable name="Contenido_der" -->
  <!-- end .content -->
  <!-- InstanceEndEditable --></div>
  <div class="footer">
  <?php include("includes/pie.php"); ?></div>
  <!-- end .container --></div>
  <script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);
?>
