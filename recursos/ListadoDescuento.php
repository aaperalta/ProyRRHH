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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conexion, $conexion);
$query_Recordset1 = "SELECT descuento.id_descu, descuento.id_nom, descuento.tipo_descuento, descuento.valor_descuento, nomina.id_empl, nomina.sueldo_nominal, empleado.cedula, empleado.nombres, empleado.apellidos FROM descuento, nomina, empleado WHERE descuento.id_nom = nomina.id_nom AND nomina.id_empl = empleado.id_empl";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
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
  
  <h5><strong>LISTADO DE DESCUENTOS</strong><h5>
   
    <div class="container">
	<div class="table-responsive">
    <table class="table"  table-striped table-bordered border="0" table-hover>
      <tr class="success">
        <td>cedula</td>
        <td>nombres</td>
        <td>apellidos</td>
        <td>tipo_descuento</td>
        <td>valor_descuento</td>
        <td>id_empl</td>
        <td>sueldo_nominal</td>
       
      </tr>
      <?php do { ?>
        <tr>
     <!--     <td><?php echo $row_Recordset1['id_descu']; ?></td>
          <td><?php echo $row_Recordset1['id_nom']; ?></td> -->
          <td><?php echo $row_Recordset1['cedula']; ?></td>
          <td><?php echo $row_Recordset1['nombres']; ?></td>
          <td><?php echo $row_Recordset1['apellidos']; ?></td>
          <td><?php echo $row_Recordset1['tipo_descuento']; ?></td>
          <td>$<?php echo $row_Recordset1['valor_descuento']; ?></td>
          <td><?php echo $row_Recordset1['id_empl']; ?></td>
          <td>$<?php echo $row_Recordset1['sueldo_nominal']; ?></td>
          
           <td><a class="btn btn-success btn-sm" href="ModificarDescuento.php?id_descu=<?php echo $row_Recordset1['id_descu']; ?>">Modificar</a></td>
          
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table>
    </div>
    </div>
    <table width="406" border="0">
  <tr>
    <td width="34"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">Atras</a></td>
    <td align="center" width="283">&nbsp;
Registros <?php echo ($startRow_Recordset1 + 1) ?> - <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?>  de  <?php echo $totalRows_Recordset1 ?></td>
    <td width="67"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">Siguiente</a></td>
  </tr>
</table>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
    
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
