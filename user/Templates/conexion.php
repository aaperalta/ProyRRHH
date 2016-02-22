
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Id_usuario:</td>
      <td><?php echo $row_modUsuario['id_usuario']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Clave:</td>
      <td><input type="text" name="clave" value="<?php echo htmlentities($row_modUsuario['clave'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Estado:</td>
      <td><input type="text" name="estado" value="<?php echo htmlentities($row_modUsuario['estado'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Rol:</td>
      <td><input type="text" name="rol" value="<?php echo htmlentities($row_modUsuario['rol'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Fecha_creacion:</td>
      <td><input type="text" name="fecha_creacion" value="<?php echo htmlentities($row_modUsuario['fecha_creacion'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Update record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id_usuario" value="<?php echo $row_modUsuario['id_usuario']; ?>">
</form>
<p>&nbsp;</p>
<?php require_once('../Connections/conex.php'); ?>
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
  $updateSQL = sprintf("UPDATE usuario SET clave=%s, estado=%s, rol=%s, fecha_creacion=%s WHERE id_usuario=%s",
                       GetSQLValueString($_POST['clave'], "text"),
                       GetSQLValueString($_POST['estado'], "text"),
                       GetSQLValueString($_POST['rol'], "text"),
                       GetSQLValueString($_POST['fecha_creacion'], "date"),
                       GetSQLValueString($_POST['id_usuario'], "int"));

  mysql_select_db($database_conex, $conex);
  $Result1 = mysql_query($updateSQL, $conex) or die(mysql_error());

  $updateGoTo = "../index2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_modUsuario = "-1";
if (isset($_GET['id_usuario'])) {
  $colname_modUsuario = $_GET['id_usuario'];
}
mysql_select_db($database_conex, $conex);
$query_modUsuario = sprintf("SELECT * FROM usuario WHERE id_usuario = %s", GetSQLValueString($colname_modUsuario, "text"));
$modUsuario = mysql_query($query_modUsuario, $conex) or die(mysql_error());
$row_modUsuario = mysql_fetch_assoc($modUsuario);
$totalRows_modUsuario = mysql_num_rows($modUsuario);

mysql_free_result($modUsuario);
?>
