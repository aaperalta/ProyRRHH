<!--INGRESO DE NOMINA -->
<?php require_once('Connections/conexion.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO nomina (id_empl, sueldo_nominal, total_horas_extra, beneficio_horas_extra, comisiones) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_empl'], "int"),
                       GetSQLValueString($_POST['sueldo_nominal'], "double"),
                       GetSQLValueString($_POST['total_horas_extra'], "int"),
                       GetSQLValueString($_POST['beneficio_horas_extra'], "double"),
                       GetSQLValueString($_POST['comisiones'], "double"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());

  $insertGoTo = "ListadoNominas.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id_empl'])) {
  $colname_Recordset1 = $_GET['id_empl'];
}
mysql_select_db($database_conexion, $conexion);
$query_Recordset1 = sprintf("SELECT * FROM empleado WHERE id_empl = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!--INGRESO DE NOMINA -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_base.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
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
 
  
<h1>INGRESAR NOMINA</h1>



<!--INGRESO DE NOMINA -->

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
  
  <!--  ESTE CODIGO COPIAR HASTA ABAJO  --> 
  
   <tr valign="baseline">
          <td nowrap="nowrap" align="right">Cedula:</td>
          <td><?php echo $row_Recordset1['cedula']; ?></td>
        </tr>
        
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Nombres:</td>
          <td><?php echo $row_Recordset1['nombres']; ?></td>
        </tr>
        
  <tr valign="baseline">
          <td nowrap="nowrap" align="right">Apellidos:</td>
          <td><?php echo $row_Recordset1['apellidos']; ?></td>
        </tr>
        
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_empl:</td>
      <td><input type="text" name="id_empl" value="<?php echo $row_Recordset1['id_empl']; ?>" size="32" /></td>
    </tr>
<!--  ESTE CODIGO COPIAR HASTA ARRIBA  --> 
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sueldo_nominal:</td>
      <td><input type="text" name="sueldo_nominal" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Total_horas_extra:</td>
      <td><input type="text" name="total_horas_extra" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Beneficio_horas_extra:</td>
      <td><input type="text" name="beneficio_horas_extra" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Comisiones:</td>
      <td><input type="text" name="comisiones" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<!--INGRESO DE NOMINA -->

  <!-- InstanceEndEditable -->
    <!-- end .sidebar1 --></div>
  <!-- InstanceBeginEditable name="Parte_Superior" --><!-- InstanceEndEditable -->
  <div class="content"><!-- InstanceBeginEditable name="Contenido_der" -->
  
  <!-- end .content -->
  <!-- InstanceEndEditable --></div>
  <div class="footer">
  <?php include("includes/pie.php"); ?></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);
?>
