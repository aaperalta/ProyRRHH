<?php
// Evitar los warnings the variables no definidas!!!
$err = isset($_GET['error']) ? $_GET['error'] : null ;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<link rel="stylesheet" href="css1/bootstrap.min.css" />
<link rel="stylesheet" href="css/estilos.css" />
<title>WEB DE RECURSOS HUMANOS - Flor de Primavera S.A</title>
<style type="text/css">
.add {
	text-align: center;
	font-weight: bold;
}
.a {min-height:1px; padding-right:15px; padding-left:15px; font-size: 14px; position: relative;}
</style>
</head>


	
	
    <body>
	
	<header>
		<div class="container">
		<?php include("includes/cabecera.php"); ?>
		</div>
	</header>
	
		<br>
		<br/>
	
	<table class="tabele table-striped table-condensed" align="center"width="352" height="218" >

	  <tr class="table-striped table-bordered">
		<td bordercolor="#000000" bgcolor="#337ab7" width="344" height="53" class="add">Iniciar Sesi&oacuten</td>
	  </tr>
  
    <tr>
	<td  bordercolor="#000000"  height="157">
	
    	<form id="form1" name="user" action="session_init.php" method="post">
        
		<?php if($err==1){
				echo "Usuario o Contrase&ntildea Err&oacuteneos <br />";
			}
			if($err==2){
				echo "Debe iniciar sesion para poder acceder el sitio. <br />";
			}
			?>
		
	       <div class="form-group" >
		        <label for="txt_usuario" class="control-label col-md-4"> Usuario:</label>
			        <div class="col-md-7">
			        	<input class="form-control" type="text" name="usern" id="usern" />
			        </div>
	        </div>
<br>
<br>
 			<div class="form-group">
		        <label for="txt_contrasena" class="control-label col-md-4">Contrase&ntildea:</label>
			        <div class="col-md-7">
			        	<input class="form-control" type="password" name="passwd" id="passwd" />
			        </div>
		    </div>
<br>
<br>   
       <div align="center"> 

       <button  class="btn btn-primary " type="submit" name="submit" data-toggle="modal" >Iniciar Sesion</button> 

	     
       </div>





<br>
<br>
<div align="center" class="form-group" class="containers" >
	<label>
		<input type="checkbox" name="" id="">Recordar contrase&ntildea
	</label>
</div>

<div align="center" class="form-group" class="containers" >
	<button  class="btn btn-link">&iquest;Olvido su Contrase&ntildea?</button>
</div>
					</form>
				</td>
			</tr>
	</table>
		
		
	
<br>
<br>  
<br>
<br>  
<br>
<br>  
<br>	
		
		
		<div class="form-group" >
		<footer>
				<div  class="container-fluid"align="center" class="container">
					<?php include("includes/pie.php"); ?>			
				</div>	
		</footer>
		</div>	
		
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
    </body>

</html>