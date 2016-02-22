<link rel="stylesheet" type="text/css" href="css/estiloslider.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 7000, true);
	});
</script>

<div id="featured" >
		  <ul class="ui-tabs-nav">
	        <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1"><a href="#fragment-1"><img src="imagenes/slider/image111-small.jpg" alt="" />UTILIDADES, FORMULARIO DE GASTOS, SRI, ROLES DE PAGO, ETC.</a></li>
	        <li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment-2"><img src="imagenes/slider/image222-small.jpg" alt="" />RECUERDE ACUMULAR SUS DECIMOS</a></li>
	        <li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment-3"><img src="imagenes/slider/image33-small.jpg" alt="" />SUS UTILIDADES SERAN ACREDITADAS HASTA ABRIL 30</a></li>
	        <li class="ui-tabs-nav-item" id="nav-fragment-4"><a href="#fragment-4"><img src="imagenes/slider/image44-small.jpg" alt="" />VACACIONES DE FEBRERO A ABRIL</a></li>
	      </ul>

	    <!-- First Content -->
	    <div id="fragment-1" class="ui-tabs-panel" style="">
			<img src="imagenes/slider/image111.jpg" alt="" />
			 <div class="info" >
				<h2>UTILIDADES, FORMULARIO DE GASTOS, SRI, ROLES DE PAGO, ETC.</h2>
				<p>Este Web esta dise&ntildeada para optimizar tramites de los empleados.</p>
			 </div>
	    </div>

	    <!-- Second Content -->
	    <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide" style="">
			<img src="imagenes/slider/image22.jpg" alt="" />
			 <div class="info" >
				<h2>RECUERDE ACUMULAR SUS DECIMOS</h2>
				<p>En la seccion de formularios podra llenar el formulario de decimos, cuartos y terceros.</p>
			 </div>
	    </div>

	    <!-- Third Content -->
	    <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide" style="">
			<img src="imagenes/slider/image33.jpg" alt="" />
			 <div class="info" >
				<h2>SUS UTILIDADES SERAN ACREDITADAS HASTA ABRIL 30</h2>
				<p>Mas informaci&oacuten de seguimiento de tramites, se encuentra en la secci&oacuten de tramites.</p>
	         </div>
	    </div>

	    <!-- Fourth Content -->
	    <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide" style="">
			<img src="imagenes/slider/image44.jpg" alt="" />
			 <div class="info" >
				<h2>VACACIONES DE FEBRERO A ABRIL</h2>
				<p>Los dias de faltas seran recuperados en este lapso de tiempo.</p>
	         </div>
	    </div>
		</div>