<?php require_once('Connections/conex.php'); ?>
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

$maxRows_listaUsuarios = 10;
$pageNum_listaUsuarios = 0;
if (isset($_GET['pageNum_listaUsuarios'])) {
  $pageNum_listaUsuarios = $_GET['pageNum_listaUsuarios'];
}
$startRow_listaUsuarios = $pageNum_listaUsuarios * $maxRows_listaUsuarios;

mysql_select_db($database_conex, $conex);
$query_listaUsuarios = "SELECT * FROM usuario";
$query_limit_listaUsuarios = sprintf("%s LIMIT %d, %d", $query_listaUsuarios, $startRow_listaUsuarios, $maxRows_listaUsuarios);
$listaUsuarios = mysql_query($query_limit_listaUsuarios, $conex) or die(mysql_error());
$row_listaUsuarios = mysql_fetch_assoc($listaUsuarios);

if (isset($_GET['totalRows_listaUsuarios'])) {
  $totalRows_listaUsuarios = $_GET['totalRows_listaUsuarios'];
} else {
  $all_listaUsuarios = mysql_query($query_listaUsuarios);
  $totalRows_listaUsuarios = mysql_num_rows($all_listaUsuarios);
}
$totalPages_listaUsuarios = ceil($totalRows_listaUsuarios/$maxRows_listaUsuarios)-1;

$queryString_listaUsuarios = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_listaUsuarios") == false && 
        stristr($param, "totalRows_listaUsuarios") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_listaUsuarios = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_listaUsuarios = sprintf("&totalRows_listaUsuarios=%d%s", $totalRows_listaUsuarios, $queryString_listaUsuarios);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_base.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title></title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="css/estilopal.css" rel="stylesheet" type="text/css" />
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
    <?php include("includes/menu.php"); ?>
  <!-- InstanceEndEditable --></div>
  <div class="sidebar1"><!-- InstanceBeginEditable name="Contenido_izq" -->
  
  
    <h1>LISTADO DE USUARIOS</h1>
    
    <p>&nbsp;</p>
    <table width="315" border="1">
      <tr>
        <td width="100"><a href="<?php printf("%s?pageNum_listaUsuarios=%d%s", $currentPage, max(0, $pageNum_listaUsuarios - 1), $queryString_listaUsuarios); ?>">Anterior</a></td>
        <td width="88">&nbsp;
Records <?php echo ($startRow_listaUsuarios + 1) ?> to <?php echo min($startRow_listaUsuarios + $maxRows_listaUsuarios, $totalRows_listaUsuarios) ?> of <?php echo $totalRows_listaUsuarios ?></td>
        <td width="105"><a href="<?php printf("%s?pageNum_listaUsuarios=%d%s", $currentPage, min($totalPages_listaUsuarios, $pageNum_listaUsuarios + 1), $queryString_listaUsuarios); ?>">Siguiente</a></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table border="1">
      <tr>
        <td>id_usuario</td>
        <td>clave</td>
        <td>estado</td>
        <td>rol</td>
        <td>fecha_creacion</td>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_listaUsuarios['id_usuario']; ?></td>
          <td><?php echo $row_listaUsuarios['clave']; ?></td>
          <td><?php echo $row_listaUsuarios['estado']; ?></td>
          <td><?php echo $row_listaUsuarios['rol']; ?></td>
          <td><?php echo $row_listaUsuarios['fecha_creacion']; ?></td>
        </tr>
        <?php } while ($row_listaUsuarios = mysql_fetch_assoc($listaUsuarios)); ?>
    </table>
  <!-- InstanceEndEditable -->
    <!-- end .sidebar1 --></div>
  <!-- InstanceBeginEditable name="Parte_Superior" -->Parte_Superior<!-- InstanceEndEditable -->
  <div class="content"><!-- InstanceBeginEditable name="Contenido_der" -->
  <h1>Parte derecha</h1>
  <p>A completar</p>
  <!-- end .content -->
  <!-- InstanceEndEditable --></div>
  <div class="footer">
  <?php include("includes/pie.php"); ?></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($listaUsuarios);
?>
