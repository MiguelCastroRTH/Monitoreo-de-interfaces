<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> -->
<html>
<head>
<title>Monitoreo de interfaces</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta http-equiv="Refresh" content="180;url = http://localhost/mda/MON_interfaces_VMS_General.php">
	<link href="./css/estilos.css" rel="stylesheet" type="text/css">
	<link href="./frameworks/ui2/css/uikit.gradient.css" rel="stylesheet">
	<link href="./frameworks/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="./frameworks/bootstrap/js/jquery.min.js"></script>
	<script src="./frameworks/jquery/jquery.js"></script>
	<script src="./frameworks/ui2/js/uikit.js"></script>
	<script src="./frameworks/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="./FusionChart/js/fusioncharts.js"></script>
    <script type="text/javascript" src="./FusionChart/js/themes/fusioncharts.theme.fint.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="calendar-win2k-cold-1.css" title="win2k-cold-1" />
    <script type="text/javascript" src="calendar.js"></script>
    <script type="text/javascript" src="calendar-es.js"></script>
    <script type="text/javascript" src="calendar-setup.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
	<link rel="icon" type="image/png" href="./IMAGES/favicon.ico" />
	<link rel="stylesheet" type="text/css" media="all" href="calendar-win2k-cold-1.css" title="win2k-cold-1" />
    <script type="text/javascript" src="calendar.js"></script>
    <script type="text/javascript" src="calendar-es.js"></script>
    <script type="text/javascript" src="calendar-setup.js"></script>
<script>
  	function cargable(Descargar){
  		  	$(document).on("ready", function() {
	    	 $("#images").fileinput({
		       uploadAsync: false,
		        uploadUrl: "./INCLUDES/upload.php" // your upload server url
		         uploadExtraData: function() {
		             return {
		                userid: $("#userid").val(),
		                username: $("#username").val()
		            };
		        }
		     });
		 });
   	}
  // ---------------------------------------------------------------------------SE CREA SENTENCIA PARA EL BOTON DEL MODAL PARA EDITAR RUTAS
// -----------------------------------------------------------------------EL .btn ES EL "IDENTIFICADOR" DE CUAL BOTÓN SE ESTA PRECIONANDO
  	function resalta(id, color, grosor)
		{
			  var tds = document.getElementById(id).getElementsByTagName('td');
			  var total = tds.length;     
			  
			  tds[0].style.borderLeft = '1px solid '+ color;    
			  tds[total - 1].style.borderRight = '1px solid ' + color;     
			  for (var i = 0; i < total; i++)    
			  {    
			  	if (tds[i].id == "resalta" )
			  		{
			  		tds[i].style.borderTop = grosor + ' solid ' + color;        
			  		tds[i].style.borderBottom = grosor + ' solid ' + color;    
			  	}
			  }
		}	
	function descarga(id)
		{
			  //var descargar = document.getElementById("descargable");
			  //getElementsByTagName('input');
			  
			  var descargar = document.Form1['archivo[]'];
			  var total = descargar.length;     
			  var seleccionados = 0;
			  
			 if (total == undefined)
			 {				
					if (descargar.checked)
					{
						seleccionados++;
					}
			}
			else
			{
  
			  for (var i = 0; i < total; i++)    
			  {    
			  	if (descargar[i].checked)
			  	{
						seleccionados++;					
			  	}
			  }
			}
			
			if (seleccionados > 0)
			{
				document.Form1.action = "./smart/php/hed_descarga_interfaz_3.php";
			  document.Form1.target = "estatus";
				document.Form1.submit();
				
				//alert("Ejecutando");
			}
			else
			{
					alert("No se ha seleccionado ninguna interfaz");
			}
	}
	
	function ejecuta(ipForm)	
	{
			eval(ipForm).action = "MON_interfaces_VMS_General.php";
			eval(ipForm).target = "_self";
			eval(ipForm).submit();
	}
	
	function elimina(ipForm)	
	{
			var descargar = document.Form1['archivo[]'];
			var total = descargar.length;     
			var seleccionados = 0;
			  
			if (total == undefined)
			{				
				if (descargar.checked)
				{
					seleccionados++;
				}
			}
			else
			{
			  for (var i = 0; i < total; i++)    
			  {    
			  	if (descargar[i].checked)
			  	{
						seleccionados++;					
			  	}
			  }
			}
		
		if (seleccionados > 0)
		{
			if (confirm("Desea eliminar las interfaces seleccionadas ("+seleccionados+")"))
			{
				eval(ipForm).action = "./smart/php/hed_elimina_interfaz_3.php";
				eval(ipForm).target = "estatus";
				eval(ipForm).submit();
				alert("Se eliminaron las interfaces");
				eval(ipForm).action = "MON_interfaces_VMS_General.php";
				eval(ipForm).target = "_self";
				eval(ipForm).submit();
			}
		}
		else
		{
			alert("No se ha seleccionado ninguna interfaz");
		}
	}

	function seleccionar(objeto)
	{
		var seleccionados = document.Form1['archivo[]'];
		var total = seleccionados.length;  
		
		var boton = objeto
		
		 if (total != undefined)
		 {
		 		if (boton.value == "Todas")
		 		{
		 			checado = true;
		 			boton.value = "Ninguna";
		 		}
		 		else
		 		{
		 			checado = false;
		 			boton.value = "Todas";
		 		}
		 		
		 		for (var i = 0; i < total; i++)    
			  {    
			  	seleccionados[i].checked = checado;
			  	
			  }   
		 }
		return true;
	}
	
	function seleccionar_dia(objeto)
	{
		var dia = objeto;
		var seleccionados_dia = document.Form1['archivo[]'];
		var total = seleccionados_dia.length;  
				
		 if (total != undefined)
		 {
		 		for (var i = 0; i < total; i++)    
			  {
			  	if (seleccionados_dia[i].id == dia.name )
			  	{
			  		seleccionados_dia[i].checked = dia.checked;
			  	}
			  }   
		 }
		return true;
	}

	function actualiza(objeto, datos)
	{
		var palomita = objeto;
		//var celda = document.getElementById(id);
		
		if (palomita.checked)
		{
			//celda.style.backgroundColor="#33FF99";
			document.Form1.action = "./smart/php/hed_descarga_interfaz.php?"+datos;
				
		}
		else
		{
			//celda.style.backgroundColor="#E8E8E8";
			document.Form1.action = "./smart/php/smart_hed_monitoreo_cierre2013_actualiza.php?"+datos+"&valor=F";
		}
		
		document.Form1.target = "estatus";
		document.Form1.submit();
		
		return true;
	}

  function situacion(bodega)
	{
		window.open("./modal/MON_Modal_info.php?bode="+bodega);
	}
</script>
</head>
<body>
<?php
	$_faltantesGL = 0;
	$_faltantesDWH = 0;
	$_faltantesFAC = 0;
	$_faltantesFAL = 0;
	$_faltantesAR = 0;
	$_faltantesOPM = 0;		

$date = date("d/m/Y", strtotime(date("Y-m-d")));
$hour = getdate ();

$minu = "";
if ($hour[minutes] < 10 ) {$minu = 0;}
else{$minu = '';}

$HORAS = "";
if ($hour[hours] < 10 ) {$HORAS = 0;}
else{$HORAS = '';}

$_selecciona_region  = 1;
$selregion = $_REQUEST['selregion'];
$_selecciona_interfaz  = 1;
$seltipo = $_REQUEST['seltipo'];

if($seltipo == "" || $seltipo == "TODAS" || $seltipo == "0") {
	$_selecciona_interfaz = "TIPO in ('AR','PO','MV','DW','FA','FL')";
}else if ($seltipo == "AR"){
	$_selecciona_interfaz = "TIPO in ('AR','FA')";
}else{
	$_selecciona_interfaz = "TIPO = '".$seltipo."'";
}

if($selregion == 'TODAS') {
	$_filtro_region = '0';
}else{
	$_filtro_region = " AND IDREGION = '".$selregion."'";	
}
$_condicion_region = "";	
		if (!$selregion == 'TODAS')	
			$selregion = '0';
		else
			$_condicion_region = " and cat_bds.idregion = '".$selregion."'";	
	
		$SesUsuario = $_REQUEST["SesUsuario"];
		$selregion = $_REQUEST["selregion"];
		$_desde = $_REQUEST["desde"];
		$_hasta = $_REQUEST["hasta"];
		$_pendientes = $_REQUEST["pendientes"];
		$_buscar = strtoupper($_REQUEST["buscar"]);
		$_seleccion = $_REQUEST["seleccion"];
		$_filtrar_faltantes = $_REQUEST["filtrar_faltantes"];
		$_incluye = "0";
		$_cuantos = count($_seleccion);
		
		if (!$_seleccion)
		{
			$_incluye .= ",1";	
			$_seleccionados[1] = "CHECKED";	
		}
		else
				for($i=0;$i < $_cuantos; $i++)
				{
					$_incluye .= ",".$_seleccion[$i];	
					$_seleccionados[$_seleccion[$i]] = "CHECKED";	
				}
	
	
		if (!$_desde)
			$_desde = date("d/m/Y", strtotime(date("Y-m-d"))-(60*60*24*1));
			#$_desde = "01".date("/m/Y");
			
		if (!$_hasta)	
			$_hasta = date("d/m/Y", strtotime(date("Y-m-d"))-(60*60*24*1));
			#$_hasta = date("d/m/Y");

		$fecha_actual = date("d-m-Y");
		$fecha_actual = date("d/m/Y",strtotime($fecha_actual."- 1 days")); 

		$Labora = "AND calendario_labora.LABORABLE = 1";
		$Labora_fecha = "LEFT OUTER JOIN  calendario_labora ON calendario_labora.IDBODEGA = interfaces_valida.idbodega and calendario_labora.FECHA = to_date('$_desde','DD/MM/YY')";

		$_condicion_region = "";	
		if (!$selregion)
		{	
			$selregion = " and cat_bds.idregion = '9'";
			#$selregion = "9";
			#$_condicion_region = " and cat_bds.idregion = '9'";	
		}
		else
			$_condicion_region = " and cat_bds.idregion = '".$selregion."'";	
			
		if (!$_pendientes)
		{
			$_checado = "";
			$_condicion_pendientes = "";
		}
		else
		{
			$_condicion_pendientes = " and estatus is null ";
			$_checado = "CHECKED";
		}
  
  	$_condicion_mostrar = " and cat_bds.tipobd in ($_incluye)";
  
  	$_condicion_buscar="";
  	if ($_buscar)
  		$_condicion_buscar = " and (cat_bds.bodega like '%".$_buscar."%' or cat_bds.bd like '%".$_buscar."%' or cat_bds.localidad like '%".$_buscar."%' or cat_bds.uopnew like '%".$_buscar."%' or cat_bds.uop_opm like '%".$_buscar."%' or interfaces_prefijo.carpeta_gl like '%".$_buscar."%')";

	if (!$_filtrar_faltantes)
		$_filtrar_faltantes = 2;
		
	$_faltan[1] = "Todas ...";	
	$_faltan[2] = "Solo Faltantes";
	
	
	#echo "[".$_filtrar_faltantes."]";
	#---------------------------------------------------------  RANGO DE FECHAS
			$_inferior = explode("/",$_desde);
			$_superior = explode("/",$_hasta);
				
			$_diferencia = round((strtotime($_superior[1]."/".$_superior[0]."/".$_superior[2]) - strtotime($_inferior[1]."/".$_inferior[0]."/".$_inferior[2])) / (60*60*24),0);
			
			for($i=0; $i<=$_diferencia; $i++)
			{
				$_fecha = date("Y-m-d", strtotime($_inferior[1]."/".$_inferior[0]."/".$_inferior[2]) + (60*60*24*$i));
				#echo $_fecha."<br>";
				$_periodo[$_fecha] = date("d/m/Y", strtotime($_inferior[1]."/".$_inferior[0]."/".$_inferior[2]) + (60*60*24*$i));
				
			}
			
			if (sizeof($_periodo) > 0)
				ksort($_periodo);

			// echo $_periodo[$_fecha];


		$_extra = 0;	
				
		#--------------------------------------------------------------------------- TOTAL DE COLUMNAS		
		#$_columnas = 8 + (($_diferencia+1) * 3) + ($_extra * 3);
		$_columnas = 8 + (($_diferencia+1) * 5) + ($_extra * 5);
		#echo $SesUsuario;
  	
  
		#---------------------------------------------------------------------------  CONEXION BD
		include('./INCLUDES/crea_coneccion_orcl_smart_prod.php');
		#--------------------------------------------------------------------------- OBTENEMOS x CON BITACORA 61 (Descartar interfaces AR)
		$sqltxt = "SELECT bitacoras_log.idbitacora, bitacoras_log.fechaaplica, monitoreo_basedatos.uopnew, monitoreo_basedatos.bodega FROM bitacoras_log, monitoreo_basedatos WHERE bitacoras_log.idbodega = monitoreo_basedatos.bodega and bitacoras_log.idbitacora = 562 ";
		
		$stid = oci_parse($conn, $sqltxt);
		oci_execute($stid);
		
		$_bodegas_ar = "-1";
			
		while ($row = oci_fetch_assoc($stid))
		{
			$_bitacora[61][$row["UOPNEW"]] = $row["FECHAAPLICA"];
			$_bodegas_ar .= ", ".$row["BODEGA"];
		}

	  #---------------------------------------------------------------------------  OBTENEMOS ESTATUS DESDE MSIO
	  #---------------------------------------------------------------------------  CONEXION BD
	  include("./INCLUDES/crea_coneccion_msioop.php");
	  
	  #echo "Conexion [".$conn_msio."]";
	  
	  if ($conn_msio)
	  {
	  	#echo "Obteniendo informacion de MSIO";
	  	
	  $sqltxt = "SELECT estatus, descripcion, tipo_estatus FROM  estatus_interfaz_fac ";
		
	  $stid = oci_parse($conn_msio, $sqltxt);
	  oci_execute($stid);
	  
	  $_cuenta = 0; 
	  while ($row = oci_fetch_assoc($stid))
	  {
	  		$_estatus_interfaz[$row["ESTATUS"]]["DESCRIPCION"] = $row["DESCRIPCION"];
	  		$_estatus_interfaz[$row["ESTATUS"]]["TIPO"] = $row["TIPO_ESTATUS"];
	  		
	  		$_estatus_interfaz[$row["ESTATUS"]]["COLOR"] = "#777777";
	  		if ($row["TIPO_ESTATUS"] == "ERR_CARGA")
	  					$_estatus_interfaz[$row["ESTATUS"]]["COLOR"] = "#CC777777";
	  	}
	  
	  reset($_periodo);
	  while (list ($key, $val) = each ($_periodo))
	  {
	  	#---------------------------------------------------------------------------  CARGADA EN MSIO
	  	$sqltxt = "SELECT ID_BODEGA, ESTATUS FROM FACTURACION_CONSOLIDADO WHERE FECHA_FACTURA = to_date('$val','DD/MM/YYYY') AND ID_BODEGA in ($_bodegas_ar) AND FACTURACION_AR = 0 AND ID_COMPANIA IN (41,23) HAVING ESTATUS > 0
				GROUP BY ID_BODEGA, ESTATUS";
		
		#echo $sqltxt ."<br>";
		
	  	$stid = oci_parse($conn_msio, $sqltxt);
	  	oci_execute($stid);
	   
	  	while ($row = oci_fetch_assoc($stid))
	  		$_cargadas_msio[$row["ID_BODEGA"]][$key] = $row["ESTATUS"];

	  	#---------------------------------------------------------------------------  ENVIADO A EBS
	  	 $sqltxt = "SELECT ID_BODEGA,COUNT(DISTINCT TRX_NUMBER)FACTURAS,FH_ENVIO_DBLINK FH_ENVIO_EBS, COUNT(*) LINEAS_INTERFACE,SUM(AMOUNT)AMOUNT FROM AR_INTERFACE WHERE ID_BODEGA in ($_bodegas_ar) AND FECHA = to_date('$val','DD/MM/YYYY') AND FH_ENVIO_DBLINK IS NOT NULL GROUP BY ID_BODEGA,FH_ENVIO_DBLINK";
		 $stid = oci_parse($conn_msio, $sqltxt);
	  	 oci_execute($stid);
	  
	  	while ($row = oci_fetch_assoc($stid))
	  		$_enviadas_ebs[$row["ID_BODEGA"]][$key] = "Facturas: ".$row["FACTURAS"].",  Lineas : ".$row["LINEAS_INTERFACE"].",  Importe : $ ".number_format($row["AMOUNT"], 2);
	  	
	  }
	}
	  #echo $_cuenta ."<br>";
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">      
      <a class="navbar-brand" class="col-md-1" href="#"><strong> Monitoreo Interfaces AR, GL, OPM, DWH, FAC y FAL</strong></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      	
      	<li><p class="navbar-text"><strong> &Uacuteltima actualizaci&oacuten:</strong></p></li>
      	<li><p class="navbar-text"><strong><?php echo $date?> - <?php echo $hour[hours] ?> : <?php echo $minu;  ?><?php echo $hour[minutes];  ?></strong></p></li>
        <li></li>
   </div>
 </nav>

<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="MON_interfaces_VMS_General.php">Monitor General</a></li>
  <li role="presentation"><a href="MON_interfaces_VMS_OPM.php">Monitor OPM</a></li>
  <li role="presentation"><a href="./modal/MON_interfaces_VMS_carga_manual_interfaz.php">Carga de interfaz</a></li>
  <li role="presentation"><a href="MON_interfaces_VMS_Calendario.php">Laborable</a></li>
</ul>

</br>

<div class="form-group" >
  <form name="form1" action="" method="POST" class="form-inline">
	<div class="form-group">
	  <label class="" for=""><small>&nbsp;&nbsp;Region:</small></label>
	    <select name="selregion" class="form-control input-sm" onchange="javascript:CargaBodegas()">
	      <option value='0'>TODAS</option>
	    	<?php
	    	if ($_selecciona_region) {
	    		$sqltxt = "SELECT DISTINCT IDREGION, REGION FROM cat_cedis WHERE idtipolocalidad IN (1,2,4,11) ORDER BY REGION";
				$st = oci_parse($conn, $sqltxt);
				oci_execute($st);
				while ($row = oci_fetch_assoc($st)) {
					$_seleccionado = "";
					if ($row['IDREGION'] == $selregion) {
						$_seleccionado = "SELECTED";
					}
					echo "<option value = '".$row['IDREGION']."' $_seleccionado>".$row['REGION']."</option>";
				}
	    	}
			?>
	  	</select>		
	</div>
	<div class="form-group">
	  <label class="" for=""><small>&nbsp;&nbsp;Buscar:</small></label>
	  <input type="text" name="buscar" value="<?php echo $_buscar; ?>" class="form-control input-sm" onchange="javascript:CargaBodegas()">
	</div>
	<div class="form-group">	
	  <label class="" for=""><small>&nbsp;&nbsp;Desde:</small></label>
	    <div class='input-group date' >
	      <input type='text' id="datepicker"  class="form-control input-sm" name="desde" value="<?php echo $_desde; ?>" size="20" onchange="javascript:CargaBodegas()"/>
	        <span class="input-group-addon">
	            <span class="glyphicon glyphicon-calendar"  valign="bottom"></span>
	        </span>
	    </div>
	</div>
	<div class="form-group">
	  <label class="" for=""><small>&nbsp;&nbsp;Hasta:</small></label>
		<div class='input-group date' >
		  <input type='text' id="datepicker1"  class="form-control input-sm" name="hasta" value="<?php echo $_hasta; ?>" size="20" onchange="javascript:CargaBodegas()"/>
		    <span class="input-group-addon">
		        <span class="glyphicon glyphicon-calendar"  valign="bottom"></span>
		    </span>
		</div>
	</div>

<div class="form-group" >
 <label class="" for=""><small>&nbsp;&nbsp;Mostrar:</small></label>
    <select name="filtrar_faltantes" class="form-control input-sm" onchange="javascript:CargaBodegas()">

    		<?php
    		while (list ($key, $val) = each ($_faltan))
			{
					$_filtra_faltante = "";
					if ($_filtrar_faltantes == $key){
						$_filtra_faltante = "SELECTED";
					}
						
					echo "<option value='$key' $_filtra_faltante>$val</option>";
			}
			?>
  	</select>
  </div>
	<div class="form-group">
	    <label class="checkbox-inline">
	      &nbsp;&nbsp;<input type="checkbox" name="seleccion[]" onclick="javascript:CargaBodegas()" value="1" <?php echo $_seleccionados[1]; ?> >GEPP
	    </label>
	    <label class="checkbox-inline">
	     <input type="checkbox" name="seleccion[]" onclick="javascript:CargaBodegas()" value="2" <?php echo $_seleccionados[2]; ?> >DA's GEPP
	    </label>
	    <label class="checkbox-inline">
	    <input type="checkbox" name="seleccion[]" onclick="javascript:CargaBodegas()" value="11" <?php echo $_seleccionados[11]; ?> >DA's&nbsp;&nbsp;
	    </label>
	</div>
</div>

<!-- <div class="form-group">
    	<label class="" for=""><small>&nbsp;&nbsp;Interfaz:</small></label>
    	<select name="seltipo" class="form-control input-sm" onchange="javascript:CargaBodegas()">
    		<option value='0'>TODAS</option>
    		<?php
    		if ($_selecciona_interfaz) {
    			$sqltxt = "SELECT DISTINCT TIPO FROM INTERFACES";
				$st = oci_parse($conn, $sqltxt);
				oci_execute($st);
				while ($row = oci_fetch_assoc($st)) {
					$_seleccionado = "";
					if ($row['TIPO'] == $seltipo) {
						$_seleccionado = "SELECTED";
					}
					$tipos[AR] = 'AR';
					$tipos[PO] = 'GL';
					$tipos[MV] = 'OPM';
					$tipos[DW] = 'DWH';
					$tipos[FA] = 'FAC';
					$tipos[FL] = 'FAL';

					echo "<option value = '".$row['TIPO']."' $_seleccionado>".$tipos[$row['TIPO']]."</option>";
				}
    		}
			?>
  		</select>		
</div>
 -->

<!-- <label><small>&nbsp;&nbsp;&nbsp;</small></label>
 <input type="button" name="selecci" value="Descargar" class="btn btn-primary" onclick="descarga('descargable');"> -->	

</form>


<!-- <tr>
  <td colspan="<?php echo $_columnas; ?>"></td>
</tr>
</table> -->
<table class="table table-hover table-bordered table-condensed">
	<thead>
		<tr>		
			<th rowspan = "2" class="text-center" bgcolor ="#005fa9"><small><font color="#FFFFFF">REGION</font></small></th>
			<th rowspan = "2" class="text-center" bgcolor ="#005fa9"><small><font color="#FFFFFF">ZONA</font></small></th>
			<th rowspan = "2" class="text-center" bgcolor ="#005fa9"><small><font color="#FFFFFF">IDBODEGA</font></small></th>
			<th rowspan = "2" class="text-center" bgcolor ="#005fa9"><small><font color="#FFFFFF">BODEGA</font></small></th>
			<th rowspan = "2" class="text-center" bgcolor ="#005fa9"><small><font color="#FFFFFF">TIPO</font></small></th>
			<th rowspan = "2" class="text-center" bgcolor ="#005fa9"><small><font color="#FFFFFF">OPM</font></small></th>
			<th rowspan = "2" class="text-center" bgcolor ="#005fa9"><small><font color="#FFFFFF">UOP</font></small></th>
<?php		
reset($_periodo);

if($seltipo == "" || $seltipo == "TODAS" || $seltipo == "0") {

		while (list ($key, $val) = each ($_periodo))
		{
			echo "<th colspan=\"6\"  width=\"2%\" class=\"text-center\" bgcolor =\"#005fa9\"><small><font color=\"#FFFFFF\">".$val."</font></small></th>";
		}

	}else{
		while (list ($key, $val) = each ($_periodo))
		{
			echo "<th colspan=\"1\"  width=\"2%\" class=\"text-center\" bgcolor =\"#005fa9\"><small><font color=\"#FFFFFF\">".$val."</font></small></th>";
		}
	}

?>		
	</tr>	
<?php		
reset($_periodo);
	// if($seltipo == "" || $seltipo == "TODAS" || $seltipo == "0") {

		while (list ($key, $val) = each ($_periodo))
		{
			echo "<th width=\"4%\" class=\"text-center\"><table border='0' cellspacing='1' cellpadding='1'><tr><th colspan='2' class=\"text-center\"><input type='checkbox' name='ar_$val' OnClick=\"seleccionar_dia(this);\"><small>&nbsp;AR</small></th></tr><tr><th width='30' class=\"text-center\"><small>C</small></th><th width='30' class=\"text-center\"><small>E</small></th></tr></table></th>";
			echo "<th width=\"4%\" class=\"text-center\"><input type='checkbox' name='gl_$val' OnClick=\"seleccionar_dia(this);\"><small><br/>GL</small></th>";
			echo "<th width=\"4%\" class=\"text-center\"><input type='checkbox' name='opm_$val' OnClick=\"seleccionar_dia(this);\"><small><br/>OPM</small></th>";
			echo "<th width=\"4%\" class=\"text-center\"><input type='checkbox' name='dwh_$val' OnClick=\"seleccionar_dia(this);\"><small><br/>DWH</small></th>";
			echo "<th width=\"4%\" class=\"text-center\"><input type='checkbox' name='fac_$val' OnClick=\"seleccionar_dia(this);\"><small><br/>FAC</small></th>";
			echo "<th width=\"4%\" class=\"text-center\"><input type='checkbox' name='fal_$val' OnClick=\"seleccionar_dia(this);\"><small><br/>FAL</small></th>";
		}
	// }else if ($seltipo == "AR"){
	// 	while (list ($key, $val) = each ($_periodo)){
	// 		echo "<th width=\"4%\" class=\"text-center\"><table border='0' cellspacing='1' cellpadding='1'><tr><th colspan='2' class=\"text-center\"><input type='checkbox' name='ar_$val' OnClick=\"seleccionar_dia(this);\"><small>&nbsp;AR</small></th></tr><tr><th width='30' class=\"text-center\"><small>C</small></th><th width='30' class=\"text-center\"><small>E</small></th></tr></table></th>";
	// 	}					
	// }else if ($seltipo == "PO"){
	// 	while (list ($key, $val) = each ($_periodo)){
	// 		echo "<th width=\"4%\" class=\"text-center\"><input type='checkbox' name='gl_$val' OnClick=\"seleccionar_dia(this);\"><small><br/>GL</small></th>";
	// 	}
	// }else if ($seltipo == "MV"){
	// 	while (list ($key, $val) = each ($_periodo)){
	// 		echo "<th width=\"4%\" class=\"text-center\"><input type='checkbox' name='opm_$val' OnClick=\"seleccionar_dia(this);\"><small><br/>OPM</small></th>";
	// 	}
	// }else if ($seltipo == "DW"){
	// 	while (list ($key, $val) = each ($_periodo)){
	// 		echo "<th width=\"4%\" class=\"text-center\"><input type='checkbox' name='dwh_$val' OnClick=\"seleccionar_dia(this);\"><small><br/>DWH</small></th>";
	// 	}
	// }else if ($seltipo == "FA"){
	// 	while (list ($key, $val) = each ($_periodo)){
	// 		echo "<th width=\"4%\" class=\"text-center\"><input type='checkbox' name='fac_$val' OnClick=\"seleccionar_dia(this);\"><small><br/>FAC</small></th>";
	// 	}
	// }else if ($seltipo == "FL"){
	// 	while (list ($key, $val) = each ($_periodo)){
	// 		echo "<th width=\"4%\" class=\"text-center\"><input type='checkbox' name='fal_$val' OnClick=\"seleccionar_dia(this);\"><small><br/>FAL</small></th>";
	// 	}
	// }	

?>		
	</tr>			  
<?php	
			#---------------------------------------------------------------------------------------------------------------
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.202 Safari/535.1");
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_NOBODY, false);
			curl_setopt($ch, CURLOPT_FORBID_REUSE, false); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);;
			#---------------------------------------------------------------------------------------------------------------
			$_total = 0;
			$_errores = 0;
			$_alertas = 0;
			$_pendientes = 0;
			$_realizados = 0;

			$fecha = explode("/",$_desde);
			$_fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
			
			#--------------------------------------------------------------------  OBTENEMOS LAS INTERFACES GENERADAS
			$sqltxt = "SELECT interfaces.*, to_char(interfaces.fecha,'YYYY-MM-DD') dia FROM interfaces WHERE $_selecciona_interfaz and fecha >= to_date('$_desde','DD/MM/YY')";
		
			$stid = oci_parse($conn, $sqltxt);
			oci_execute($stid);
								
			while ($row = oci_fetch_assoc($stid))		
					$_confirmaciones[$row["UOPNEW"]][$row["DIA"]][$row["IDBODEGA"]][$row["TIPO"]] = $row["ARCHIVO"];
						
			#------------------------------------------------  probando solo localidades
			$sqltxt = "SELECT calendario_labora.LABORABLE, cat_bds.*, to_char(cat_bds.iniciarespaldos,'YYYY-MM-DD') as inicia, interfaces_prefijo.prefijo, interfaces_prefijo.carpeta_gl, interfaces_valida.piloto FROM interfaces_prefijo, cat_bds LEFT OUTER JOIN interfaces_valida ON cat_bds.bodega = interfaces_valida.idbodega ".$Labora_fecha." WHERE cat_bds.estatus = 'T' ".$_condicion_mostrar.$_condicion_region.$_condicion_buscar." and cat_bds.bodega = interfaces_prefijo.idbodega ".$Labora." ORDER BY cat_bds.bodega";

			
			#echo $sqltxt."<br>";
						
			$stid = oci_parse($conn, $sqltxt);
			oci_execute($stid);

			#echo "4";
			
			#$_filtrar_faltantes = 1;

			while ($row = oci_fetch_assoc($stid))
			{
				$_color ="#E8E8E8" ;
				$_color_cierre ="#E8E8E8" ;
				$_color_bitacora ="#E8E8E8" ;
				$_todos=0;

				
				$_estatus = "";
				$_estatus_cierre = "&nbsp;";
				$_estatus_bitacora = "&nbsp;";
				
				if ( strtotime($_fecha) >= strtotime($row["INICIA"]))
				{
					if ($_interfaz[$row["BODEGA"]])
					{
						$_estatus_cierre = $_interfaz[$row["BODEGA"]];
						$_color_cierre = "#33FF99";
						$_cierre_realizados++;
						$_todos++;
					}
					
					
					$_cuando = explode("/", $_hasta);
					
					$_dia = $_cuando[2]."-".$_cuando[1]."-".$_cuando[0];
					
					$_color_completo = "#E8E8E8";
					if ($row["PILOTO"]=="T")
							$_color_completo = "#CCCCCC";


					if ($_filtrar_faltantes > 1)
					{
						$_reg = $row["REGION"];
						#---------------------------------------------------	  Se asigna a variable para imprimir al final del ciclo
						$_imprime_renglon = "<tr height=\"17\" id=\"ren$_total\" onmouseover=\"resalta('ren$_total','#5555FF','2px');\" onmouseout=\"resalta('ren$_total','#FFFFFF','0px');\" >";
						$_imprime_renglon .= "<td bgcolor='$_color_completo' id='resalta'><small>".$row["REGION"]."</small></td>";
						$_imprime_renglon .= "<td bgcolor='$_color_completo' id='resalta'><small>".$row["ZONA"]."</small></td>";
						$_imprime_renglon .=  "<td bgcolor='$_color_completo' class = 'text-center'><button name = 'dato' type='submit' data-id=".$row["BODEGA"]." title='Directorio' data-toggle = 'modal' class='open-AddBookDialog edit btn btn-xs btn-primary' href='#addBookDialog'><small><font></font></small>".$row["BODEGA"]."</button>&nbsp;";
						$_imprime_renglon .= "<td bgcolor='$_color_completo' id='resalta'><small>".$row["LOCALIDAD"]."</small></td>";
						$_imprime_renglon .= "<td bgcolor='$_color_completo' id='resalta'><small>".$row["BD"]."</small></td>";
						$_imprime_renglon .= "<td bgcolor='$_color_completo' id='resalta' class='text-center'><small>".$row["UOP_OPM"]."</small></td>";
						$_imprime_renglon .= "<td bgcolor='$_color_completo' id='resalta' class='text-center'><small>".$row["UOPNEW"]."</small></td>";
					}
					else
					{
						#---------------------------------------------------  Se imprime directamente
						echo "<tr height=\"17\" id=\"ren$_total\" onmouseover=\"resalta('ren$_total','#5555FF','2px');\" onmouseout=\"resalta('ren$_total','#FFFFFF','0px');\" >";
						echo "<td bgcolor='$_color_completo' id='resalta'><small>".$row["REGION"]."</small></td>";
						echo "<td bgcolor='$_color_completo' id='resalta'><small>".$row["ZONA"]."</small></td>";
						echo "<td bgcolor='$_color_completo' class = 'text-center'><button name = 'dato' type='submit' data-id=".$row["BODEGA"]." title='Directorio' data-toggle = 'modal' class='open-AddBookDialog edit btn btn-xs btn-primary' href='#addBookDialog'><small><font></font></small>".$row["BODEGA"]."</button>&nbsp;";
						echo "<td bgcolor='$_color_completo' id='resalta'><small>".$row["LOCALIDAD"]."</small></td>";
						echo "<td bgcolor='$_color_completo' id='resalta'><small>".$row["BD"]."</small></td>";
						echo "<td bgcolor='$_color_completo' id='resalta' class='text-center'><small>".$row["UOP_OPM"]."</small></td>";
						echo "<td bgcolor='$_color_completo' id='resalta' class='text-center'><small>".$row["UOPNEW"]."</small></td>";
					}

					$_faltantes = 0;
					
					reset($_periodo);
					while (list ($key, $val) = each ($_periodo))
					{
						if (date("D",strtotime($key))== "Sun" && $row["LABORABLE"] == 0)
						{
							$_color_ar = "#CCCCCC";
							$_color_gl = "#CCCCCC";
							$_color_opm = "#CCCCCC";
							$_color_dwh = "#CCCCCC";
							$_color_fac = "#CCCCCC";
							$_color_fal = "#CCCCCC";
						}
						else
						{
							$_color_ar = "#E8E8E8";
							$_color_gl = "#E8E8E8";
							$_color_opm = "#E8E8E8";
							$_color_dwh = "#E8E8E8";
							$_color_fac = "#E8E8E8";
							$_color_fal = "#E8E8E8";
						}	
						
						#-----------------------------------------------------------------------------  AR
						$_leyenda_ar = "&nbsp;";

						if ($_confirmaciones[$row["UOPNEW"]][$key][$row["PREFIJO"]]["AR"])
						{
							$_archivo = $_confirmaciones[$row["UOPNEW"]][$key][$row["PREFIJO"]]["AR"];
							$_color_ar = "#33FF99";
		
							$_leyenda_ar = "<input type='checkbox' name='archivo[]' value='$_archivo' id='ar_$val'><font color='#888888' size='1'>&nbsp;SIO&nbsp;</font>";
							$_suma++;
							$_sumaAR++;

						}
						else
						{
							
							if ($_bitacora[61][$row["UOPNEW"]])
							{
								
								$_color_msio = "";
								$_color_ebs = "";
								if ($_confirmaciones[$row["BODEGA"]][$key][$row["IDBODEGA"]]["FA"])
								{
									// $_color_ar = "#BBFFBB"; #Indica que ya cargo la interface FAC. Pero aun debe de estar coo pendiente AR.
									
									if ($_cargadas_msio[$row["BODEGA"]][$key])
									{
										$_color_ar = "#BBFFBB";
										$_color_msio = "#BBFFBB";
										$_suma++;
										$_sumaAR++;										
										$_title_msio = "";

										if ($_estatus_interfaz[$_cargadas_msio[$row["BODEGA"]][$key]]["TIPO"] == "ERR_CARGA"){
											$_title_msio = "title='".$_estatus_interfaz[$_cargadas_msio[$row["BODEGA"]][$key]]["DESCRIPCION"]."'";
											$_color_msio = "";
											$_color_ebs = "";
											$_color_ar = "#CCCCCC";
											
											// $_title_msio = "title='".$_estatus_interfaz[$_cargadas_msio[$row["BODEGA"]][$key]]["DESCRIPCION"]."'";

										}
										
										if ($_enviadas_ebs[$row["BODEGA"]][$key])
										{		
											$_color_ebs = "#BBFFBB";
											$_interfaz_ar_color = "#777777";
											#$_leyenda_ar = "<table boder='0' width='100%' cellspacing='1' cellpadding='1'><tr><td bgcolor='$_color_msio' width='30' align='center' title='".$_estatus_interfaz[$_cargadas_msio[$row["BODEGA"]][$key]]["DESCRIPCION"]."'><font color='".$_estatus_interfaz[$_cargadas_msio[$row["BODEGA"]][$key]]["COLOR"]."' size='1'>MSIO</font></td><td bgcolor='$_color_ebs' width='30' align='center' title='".$_enviadas_ebs[$row["BODEGA"]][$key]."'><font color='".$_interfaz_ar_color."' size='1'>&nbsp;AR&nbsp;</font></td></tr></table>";
											$_leyenda_ar = "<table boder='0' width='100%' cellspacing='1' cellpadding='1'><tr><td bgcolor='$_color_msio' width='30' align='center' $_title_msio><font color='".$_estatus_interfaz[$_cargadas_msio[$row["BODEGA"]][$key]]["COLOR"]."' size='1'>MSIO</font></td><td bgcolor='$_color_ebs' width='30' align='center' title='".$_enviadas_ebs[$row["BODEGA"]][$key]."'><font color='".$_interfaz_ar_color."' size='1'>&nbsp;AR&nbsp;</font></td></tr></table>";
										}
										else
										{
											$_interfaz_ar_texto = "";
											$_interfaz_ar_title = "";
											$_interfaz_ar_color = "";
											
											if ($_estatus_interfaz[$_cargadas_msio[$row["BODEGA"]][$key]]["TIPO"] == "PROCESADA")
											{
												$_interfaz_ar_texto = "AR";
												$_interfaz_ar_title = "Sin datos a enviar";
												$_interfaz_ar_color = "#BBBBBB";
											}
											
											#$_leyenda_ar = "<table boder='0' width='100%' cellspacing='1' cellpadding='1'><tr><td bgcolor='$_color_msio' width='30' align='center' title='".$_estatus_interfaz[$_cargadas_msio[$row["BODEGA"]][$key]]["DESCRIPCION"]."'><font color='".$_estatus_interfaz[$_cargadas_msio[$row["BODEGA"]][$key]]["COLOR"]."' size='1'>&nbsp;MSIO&nbsp;</font></td><td bgcolor='$_color_ebs' width='30' align='center' title='".$_interfaz_ar_title."'><font color='".$_interfaz_ar_color."' size='1'>".$_interfaz_ar_texto."</font></td></tr></table>";
											$_leyenda_ar = "<table boder='0' width='100%' cellspacing='1' cellpadding='1'><tr><td bgcolor='$_color_msio' width='30' align='center' $_title_msio><font color='".$_estatus_interfaz[$_cargadas_msio[$row["BODEGA"]][$key]]["COLOR"]."' size='1'>&nbsp;MSIO&nbsp;</font></td><td bgcolor='$_color_ebs' width='30' align='center' title='".$_interfaz_ar_title."'><font color='".$_interfaz_ar_color."' size='1'>".$_interfaz_ar_texto."</font></td></tr></table>";
											
										}
									}
									else
									{
										$_leyenda_ar = "<div align='center'><font color='#888888'><small><small>&nbsp;</small></small></font></div>";
										$_faltantes++;
										$_faltantesAR++;
									}
								}
								else
								{
									$_faltantes++;
									$_faltantesAR++;
								}
							}
							if($_color_ar == "#CCCCCC"){
								$_faltantesAR = $_faltantesAR - 1;
							}	
						}

						#-----------------------------------------------------------------------------  GL
						$_leyenda_gl = "&nbsp;";
						if ($_confirmaciones[$row["UOPNEW"]][$key][$row["PREFIJO"]]["PO"])
						{
							$_archivo = $_confirmaciones[$row["UOPNEW"]][$key][$row["PREFIJO"]]["PO"];
							
							if ($row["PILOTO"]=="T")
								$_color_gl = "#3399FF";
							else
								$_color_gl = "#33FF99";
								
							if ($key >= '2014-01-21')
								$_color_gl = "#3399FF";
								
							#----------------------------------------------------------  IDENTIFICAR REGENERADAS	
							if ($_depura_ef[$row["UOPNEW"]][$key][$row["PREFIJO"]]["PO"])
								$_color_gl = "#FFFF66";
							
							$_leyenda_gl = "<input type='checkbox' name='archivo[]' value='$_archivo' id='gl_$val'>";
							$_suma++;
							$_sumaGL++;
						}
						else
						{
							if ($_cargadas_msio[$row["BODEGA"]][$key] == 6){
								$_color_gl = "#3399FF";
								$_leyenda_gl = "<font face='Arial' size='1' font color ='#ffffff'>Solo AR</font>";
								$_suma++;
								$_sumaGL++;
							}
							else
							{
								$_faltantes++;
								$_faltantesGL++;
							        if($_color_gl == "#CCCCCC"){
								        $_faltantesGL= $_faltantesGL - 1;
                                     }
                            }

						}
						#----------------------------------------------------------------------------------------------  OPM
						$_leyenda_opm = "&nbsp;";
						if ($_confirmaciones[$row["UOP_OPM"]][$key][$row["PREFIJO"]]["MV"])
						{
							$_archivo = $_confirmaciones[$row["UOP_OPM"]][$key][$row["PREFIJO"]]["MV"];
							$_color_opm = "#FF7777";
		
							$_leyenda_opm = "<input type='checkbox' name='archivo[]' value='$_archivo' id='opm_$val'>";
							$_suma++;
							$_sumaOPM++;
						}
						else
						{
							#-------------------------------------------------------------- Validamos si se recibio la interfaz DWH antes de conectar con SIO
							if ($_confirmaciones[$row["BODEGA"]][$key][$row["IDBODEGA"]]["DW"])
							{
								#--------------------------------------------------------------  parametros para ejecutar pagina externa
								$url = "http://29.0.3.32/smart/php/smart_hed_consulta_sio_resultado.php?ip=".$row["IP"]."&puerto=".$row["PUERTOSQL"]."&query=".urlencode("SELECT cierrebod, cierreliq FROM calendario WHERE fecha='".$_dia."' and idbodega=".$row["IDBODEGA"]);
								curl_setopt($ch, CURLOPT_URL, $url); 
								$_regresa = curl_exec ($ch);
							
								$_valores = explode("|", $_regresa);
							
								#----------------- validamos por algun error al ejecutar la consulta
								if (strpos($_valores[0], "Error"))
								{
										$_leyenda_opm = "<font face='Arial' size='1'>".$_valores[1]."</font>";
										$_faltantes++;
										$_faltantesOPM++;
								}
								else
								{ 
									#----------------- validamos si ya se relizo el cierre de liquidaciones
									if ($_valores[1] == 1)  
									{
										#----------------- validamos si ya se relizo el cierre de bodega y se muestra la leyenda correspondiente
										if ($_valores[0] == 1)
										{
											$_leyenda_opm = "<font face='Arial' size='1'>Cerrado</font>";
											$_faltantes++;
											$_faltantesOPM++;
										}
										else
										{
											$_leyenda_opm = "<font face='Arial' size='1'>Sin Cerrar</font>";
											$_faltantes++;
											$_faltantesOPM++;
										}
									}
									else
									{
										$_faltantes++;
										$_faltantesOPM++;
									}
								}
								#$_leyenda_opm = $url;
							}
							else
							{
								$_faltantes++;
								$_faltantesOPM++;
							}
							if($_color_opm == "#CCCCCC"){
								$_faltantesOPM = $_faltantesOPM - 1;              
							}
						}
						
						#----------------------------------------------------------------------------------------------  DWH
						$_leyenda_dwh = "&nbsp;";
						if ($_confirmaciones[$row["BODEGA"]][$key][$row["IDBODEGA"]]["DW"])
						{
							$_archivo = $_confirmaciones[$row["BODEGA"]][$key][$row["IDBODEGA"]]["DW"];
							$_color_dwh = "#F5DA81";
		
							$_leyenda_dwh = "<input type='checkbox' name='archivo[]' value='$_archivo' id='dwh_$val'>";
							$_suma++;
							$_sumaDWH++;
						}
						else
						{
							$_faltantes++;
							$_faltantesDWH++;                        

							if($_color_dwh == "#CCCCCC"){
								$_faltantesDWH = $_faltantesDWH - 1;
							}
						}
						#----------------------------------------------------------------------------------------------  FAC
						$_leyenda_fac = "&nbsp;";
						if ($_confirmaciones[$row["BODEGA"]][$key][$row["IDBODEGA"]]["FA"])
						{
							$_archivo = $_confirmaciones[$row["BODEGA"]][$key][$row["IDBODEGA"]]["FA"];
							$_color_fac = "#9A2EFE";
		
							$_leyenda_fac = "<input type='checkbox' name='archivo[]' value='$_archivo' id='fac_$val'>";
							$_suma++;
							$_sumaFAC++;
						}
						else
						{
							$_faltantes++;
							$_faltantesFAC++;

							if($_color_fac == "#CCCCCC"){
								$_faltantesFAC = $_faltantesFAC - 1;
							}
						}
						#----------------------------------------------------------------------------------------------  FAL
						$_leyenda_fal = "&nbsp;";
						if ($_confirmaciones[$row["BODEGA"]][$key][$row["IDBODEGA"]]["FL"])
						{
							$_archivo = $_confirmaciones[$row["BODEGA"]][$key][$row["IDBODEGA"]]["FL"];
							#$_color_fal = "#BD69FB";
							$_color_fal = "#DF8BFD";
		
							$_leyenda_fal = "<input type='checkbox' name='archivo[]' value='$_archivo' id='fal_$val'>";
							$_suma++;
							$_sumaFAL++;
						}
						else
						{
							$_faltantes++;
							$_faltantesFAL++;

							if($_color_fal == "#CCCCCC"){
								$_faltantesFAL = $_faltantesFAL - 1;
							}

						}	

						if($seltipo == "" || $seltipo == "TODAS" || $seltipo == "0") {
							if ($_filtrar_faltantes > 1)
							{
								#--------------------------------------------------------------------------- se asigna a variable para imprimir al final del cliclo
								$_imprime_renglon .= "<td align='left' bgcolor='$_color_ar' class='LetraChicaNegra' id='resalta'>".$_leyenda_ar."</td>";
								$_imprime_renglon .= "<td align='left' bgcolor='$_color_gl' class='LetraChicaNegra' id='resalta'>".$_leyenda_gl."</td>";
								$_imprime_renglon .= "<td align='left' bgcolor='$_color_opm' class='LetraChicaNegra' id='resalta'>".$_leyenda_opm."</td>";
								$_imprime_renglon .= "<td align='left' bgcolor='$_color_dwh' class='LetraChicaNegra' id='resalta'>".$_leyenda_dwh."</td>";
								$_imprime_renglon .= "<td align='left' bgcolor='$_color_fac' class='LetraChicaNegra' id='resalta'>".$_leyenda_fac."</td>";
								$_imprime_renglon .= "<td align='left' bgcolor='$_color_fal' class='LetraChicaNegra' id='resalta'>".$_leyenda_fal."</td>";
							}
							else
							{
								#---------------------------------------------------------------------------------------------------  Se imprime directamente
								echo "<td align='left' bgcolor='$_color_ar' class='LetraChicaNegra' id='resalta'>".$_leyenda_ar."</td>";
								echo "<td align='left' bgcolor='$_color_gl' class='LetraChicaNegra' id='resalta'>".$_leyenda_gl."</td>";
								echo "<td align='left' bgcolor='$_color_opm' class='LetraChicaNegra' id='resalta'>".$_leyenda_opm."</td>";
								echo "<td align='left' bgcolor='$_color_dwh' class='LetraChicaNegra' id='resalta'>".$_leyenda_dwh."</td>";
								echo "<td align='left' bgcolor='$_color_fac' class='LetraChicaNegra' id='resalta'>".$_leyenda_fac."</td>";
								echo "<td align='left' bgcolor='$_color_fal' class='LetraChicaNegra' id='resalta'>".$_leyenda_fal."</td>";
							}
						}else if ($seltipo == "AR"){
							if ($_filtrar_faltantes > 1){
								$_imprime_renglon .= "<td align='left' bgcolor='$_color_ar' class='LetraChicaNegra' id='resalta'>".$_leyenda_ar."</td>";
							}else{
								echo "<td align='left' bgcolor='$_color_ar' class='LetraChicaNegra' id='resalta'>".$_leyenda_ar."</td>";
							}
						}else if ($seltipo == "PO"){
							if ($_filtrar_faltantes > 1){
								$_imprime_renglon .= "<td align='left' bgcolor='$_color_gl' class='LetraChicaNegra' id='resalta'>".$_leyenda_gl."</td>";
							}else{
								echo "<td align='left' bgcolor='$_color_gl' class='LetraChicaNegra' id='resalta'>".$_leyenda_gl."</td>";
							}
						}else if ($seltipo == "MV"){
							if ($_filtrar_faltantes > 1){
								$_imprime_renglon .= "<td align='left' bgcolor='$_color_opm' class='LetraChicaNegra' id='resalta'>".$_leyenda_opm."</td>";
							}else{
								echo "<td align='left' bgcolor='$_color_opm' class='LetraChicaNegra' id='resalta'>".$_leyenda_opm."</td>";
							}
						}else if ($seltipo == "DW"){
							if ($_filtrar_faltantes > 1){
								$_imprime_renglon .= "<td align='left' bgcolor='$_color_dwh' class='LetraChicaNegra' id='resalta'>".$_leyenda_dwh."</td>";
							}else{
								echo "<td align='left' bgcolor='$_color_dwh' class='LetraChicaNegra' id='resalta'>".$_leyenda_dwh."</td>";
							}
						}else if ($seltipo == "FA"){
							if ($_filtrar_faltantes > 1){
								$_imprime_renglon .= "<td align='left' bgcolor='$_color_fac' class='LetraChicaNegra' id='resalta'>".$_leyenda_fac."</td>";
							}else{
								echo "<td align='left' bgcolor='$_color_fac' class='LetraChicaNegra' id='resalta'>".$_leyenda_fac."</td>";
							}
						}else if ($seltipo == "FL"){
							if ($_filtrar_faltantes > 1){
								$_imprime_renglon .= "<td align='left' bgcolor='$_color_fal' class='LetraChicaNegra' id='resalta'>".$_leyenda_fal."</td>";
							}else{
								echo "<td align='left' bgcolor='$_color_fal' class='LetraChicaNegra' id='resalta'>".$_leyenda_fal."</td>";
							}
						}	
					}
					
					if ($_filtrar_faltantes > 1){
						$_imprime_renglon .= "</tr>";
						if ($_faltantes > 0){
							echo $_imprime_renglon;
						}
					}
					else{
						echo "</tr>";
					}

					$_total += 1;
			}	
		}
?>				  
	
</table>	
<form>



<?php
$_total_AR = $_sumaAR + $_faltantesAR;
$_total_GL = $_sumaGL + $_faltantesGL;
$_total_OPM = $_sumaOPM + $_faltantesOPM;
$_total_DWH = $_sumaDWH + $_faltantesDWH;
$_total_FAC = $_sumaFAC + $_faltantesFAC;
$_total_FAL = $_sumaFAL + $_faltantesFAL; 

$_pinturitasAR = "";
$_porcientoAR = number_format(($_sumaAR/$_total_AR)*100,2);

if ( $_porcientoAR == 100 ){
	$_pinturitasAR = "progress-bar-success progress-bar-striped";
} elseif ($_porcientoAR > 50.00 && $_porcientoAR < 99.99) {
	 $_pinturitasAR = "progress-bar-warning progress-bar-striped";
}elseif ($_porcientoAR < 50.00) {
	 $_pinturitasAR= "progress-bar-danger progress-bar-striped";
}else
{
	$_pinturitas = "progress-bar-danger progress-bar-striped";
}
?>

<?php 
$_pinturitasGL = "";
$_porcientoGL = number_format(($_sumaGL/$_total_GL)*100,2);

if ( $_porcientoGL == 100 ){
	$_pinturitasGL = "progress-bar-success progress-bar-striped";
} elseif ($_porcientoGL > 50.00 && $_porcientoGL < 99.99) {
	 $_pinturitasGL = "progress-bar-warning progress-bar-striped";
}elseif ($_porcientoGL < 50.00) {
	 $_pinturitasGL = "progress-bar-danger progress-bar-striped";
}else
{
	$_pinturitasGL = "progress-bar-danger progress-bar-striped";
}
?>

<?php 
$_pinturitasOPM = "";
$_porcientoOPM = number_format(($_sumaOPM/$_total_OPM)*100,2);

if ( $_porcientoOPM == 100 ){
	$_pinturitasOPM = "progress-bar-success progress-bar-striped";
} elseif ($_porcientoOPM > 50.00 && $_porcientoOPM < 99.99) {
	 $_pinturitasOPM = "progress-bar-warning progress-bar-striped";
}elseif ($_porcientoOPM < 50.00) {
	 $_pinturitasOPM = "progress-bar-danger progress-bar-striped";
}else
{
	$_pinturitasOPM = "progress-bar-danger progress-bar-striped";
}
?>

<?php 
$_pinturitasDWH = "";
$_porcientoDWH = number_format(($_sumaDWH/$_total_DWH)*100,2);

if ( $_porcientoDWH == 100 ){
	$_pinturitasDWH = "progress-bar-success progress-bar-striped";
} elseif ($_porcientoDWH > 50.00 && $_porcientoDWH < 99.99) {
	 $_pinturitasDWH = "progress-bar-warning progress-bar-striped";
}elseif ($_porcientoDWH < 50.00) {
	 $_pinturitasDWH = "progress-bar-danger progress-bar-striped";
}else
{
	$_pinturitasDWH = "progress-bar-danger progress-bar-striped";
}
?>

<?php 
$_pinturitasFAC = "";
$_porcientoFAC = number_format(($_sumaFAC/$_total_FAC)*100,2);

if ( $_porcientoFAC == 100 ){
	$_pinturitasFAC = "progress-bar-success progress-bar-striped";
} elseif ($_porcientoFAC > 50.00 && $_porcientoFAC < 99.99) {
	 $_pinturitasFAC = "progress-bar-warning progress-bar-striped";
}elseif ($_porcientoFAC < 50.00) {
	 $_pinturitasFAC = "progress-bar-danger progress-bar-striped";
}else
{
	$_pinturitasFAC = "progress-bar-danger progress-bar-striped";
}
?>

<?php 
$_pinturitasFAL = "";
$_porcientoFAL = number_format(($_sumaFAL/$_total_FAL)*100,2);

if ( $_porcientoFAL == 100 ){
	$_pinturitasFAL = "progress-bar-success progress-bar-striped";
} elseif ($_porcientoFAL > 50.00 && $_porcientoFAL < 99.99) {
	 $_pinturitasFAL = "progress-bar-warning progress-bar-striped";
}elseif ($_porcientoFAL < 50.00) {
	 $_pinturitasFAL = "progress-bar-danger progress-bar-striped";
}else
{
	$_pinturitasFAL = "progress-bar-danger progress-bar-striped";
}

$_texto = '';
if($selregion == 0){
	$_texto = 'INTERFACES GENERADAS DEL ' .$_hasta;
}
else{
	$_texto = 'INTERFACES GENERADAS DEL '.$_hasta.' - REGION '.$_reg;
}





?>

	<table class="table table-hover table-bordered table-condensed">
<thead>
	<tr>
		<th class="text-center" colspan="5" bgcolor ="#005fa9"><small><font color="#FFFFFF"><?php echo $_texto; ?></font></small></th>
	</tr>
	<tr>
		<th class="text-center" bgcolor ="#005fa9" width="10%"><small><font color="#FFFFFF">INTERFAZ</font></small></th>		
		<th class="text-center" bgcolor ="#005fa9" width="10%"><small><font color="#FFFFFF">TOTAL</font></small></th>
		<th colspan="" ="" class="text-center" bgcolor ="#005fa9" width="10%"><small><font color="#FFFFFF">TRANSMITIDAS</font></small></th>		
		<th class="text-center" bgcolor ="#005fa9" width="10%"><small><font color="#FFFFFF">PENDIENTES</font></small></th>
		<th class="text-center" bgcolor ="#005fa9" ><small><font color="#FFFFFF">AVANCE</font></small></th>
	</tr>
	<tr>
		<th class="text-center" bgcolor ="#005fa9" width="10%"><small><font color="#FFFFFF">AR</font></small></th>	
		<td class="text-center" ><font color=""><?php echo $_total_AR; ?></font></td>
		<td class="text-center" ><font color=""><?php echo $_sumaAR; ?></font></td>
		<td class="text-center" ><font color=""><?php echo $_faltantesAR; ?></font></td>
		<td class="text-center" >

  <div class="progress progress-bar <?php echo $_pinturitasAR; ?>  " role="progressbar" style="margin-bottom: 3px; width: <?php echo number_format(($_sumaAR/$_total_AR)*100,2); ?>%;" aria-valuenow="<?php echo number_format(($_sumaAR/$_total_AR)*100,2); ?>" aria-valuemin="0" aria-valuemax="100"><font color="#060606"><?php echo number_format(($_sumaAR/$_total_AR)*100,2); ?>%</font></div>

	</td>
		

	</tr>

	<tr>
		<th class="text-center" bgcolor ="#005fa9" width="10%"><small><font color="#FFFFFF">GL</font></small></th>	
		<td class="text-center" ><font color=""><?php echo $_total_GL; ?></font></td>
		<td class="text-center" ><font color=""><?php echo $_sumaGL; ?></font></td>
		<td class="text-center" ><font color=""><?php echo $_faltantesGL; ?></font></td>
		<td class="text-center" >

  <div class="progress progress-bar <?php echo $_pinturitasGL; ?>  " role="progressbar" style="margin-bottom: 3px; width: <?php echo number_format(($_sumaGL/$_total_GL)*100,2); ?>%;" aria-valuenow="<?php echo number_format(($_sumaGL/$_total_GL)*100,2); ?>" aria-valuemin="0" aria-valuemax="100"><font color="#060606"><?php echo number_format(($_sumaGL/$_total_GL)*100,2); ?>%</font></div>

	</td>
		
	</tr>


	<tr>
		<th class="text-center" bgcolor ="#005fa9" width="10%"><small><font color="#FFFFFF">OPM</font></small></th>	
		<td class="text-center" ><font color=""><?php echo $_total_OPM; ?></font></td>
		<td class="text-center" ><font color=""><?php echo $_sumaOPM; ?></font></td>
		<td class="text-center" ><font color=""><?php echo $_faltantesOPM; ?></font></td>
		<td class="text-center" >

  <div class="progress progress-bar <?php echo $_pinturitasOPM; ?>  " role="progressbar" style="margin-bottom: 3px; width: <?php echo number_format(($_sumaOPM/$_total_OPM)*100,2); ?>%;" aria-valuenow="<?php echo number_format(($_sumaOPM/$_total_OPM)*100,2); ?>" aria-valuemin="0" aria-valuemax="100"><font color="#060606"><?php echo number_format(($_sumaOPM/$_total_OPM)*100,2); ?>%</font></div>

	</td>
		
	</tr>


<tr>
		<th class="text-center" bgcolor ="#005fa9" width="10%"><small><font color="#FFFFFF">DWH</font></small></th>	
		<td class="text-center" ><font color=""><?php echo $_total_DWH; ?></font></td>
		<td class="text-center" ><font color=""><?php echo $_sumaDWH; ?></font></td>
		<td class="text-center" ><font color=""><?php echo $_faltantesDWH; ?></font></td>
		<td class="text-center" >

  <div class="progress progress-bar <?php echo $_pinturitasDWH; ?>  " role="progressbar" style="margin-bottom: 3px; width: <?php echo number_format(($_sumaDWH/$_total_DWH)*100,2); ?>%;" aria-valuenow="<?php echo number_format(($_sumaDWH/$_total_DWH)*100,2); ?>" aria-valuemin="0" aria-valuemax="100"><font color="#060606"><?php echo number_format(($_sumaDWH/$_total_DWH)*100,2); ?>%</font></div>

	</td>
		
	</tr>


<tr>
		<th class="text-center" bgcolor ="#005fa9" width="10%"><small><font color="#FFFFFF">FAC</font></small></th>	
		<td class="text-center" ><font color=""><?php echo $_total_FAC; ?></font></td>
		<td class="text-center" ><font color=""><?php echo $_sumaFAC; ?></font></td>
		<td class="text-center" ><font color=""><?php echo $_faltantesFAC; ?></font></td>
		<td class="text-center" >

  <div class="progress progress-bar <?php echo $_pinturitasFAC; ?>  " role="progressbar" style="margin-bottom: 3px; width: <?php echo number_format(($_sumaFAC/$_total_FAC)*100,2); ?>%;" aria-valuenow="<?php echo number_format(($_sumaFAC/$_total_FAC)*100,2); ?>" aria-valuemin="0" aria-valuemax="100"><font color="#060606"><?php echo number_format(($_sumaFAC/$_total_FAC)*100,2); ?>%</font></div>

	</td>
		
	</tr>

	<tr>
		<th class="text-center" bgcolor ="#005fa9" width="10%"><small><font color="#FFFFFF">FAL</font></small></th>	
		<td class="text-center" ><font color=""><?php echo $_total_FAL; ?></font></td>
		<td class="text-center" ><font color=""><?php echo $_sumaFAL; ?></font></td>
		<td class="text-center" ><font color=""><?php echo $_faltantesFAL; ?></font></td>
		<td class="text-center" >

  <div class="progress progress-bar <?php echo $_pinturitasFAL; ?>  " role="progressbar" style="margin-bottom: 3px; width: <?php echo number_format(($_sumaFAL/$_total_FAL)*100,2); ?>%;" aria-valuenow="<?php echo number_format(($_sumaFAL/$_total_FAL)*100,2); ?>" aria-valuemin="0" aria-valuemax="100"><font color="#060606"><?php echo number_format(($_sumaFAL/$_total_FAL)*100,2); ?>%</font></div>
	</td>
	</tr>
</thead>

<?php
if ( $_faltantesAR == 0 && $_faltantesGL == 0 && $_faltantesOPM == 0 && $_faltantesDWH == 0 && $_faltantesFAC == 0 && $_faltantesFAL == 0 && $_filtrar_faltantes == 2) {?>

<div class="jumbotron text-center" >
  <h1>&#161;FELICIDADES!</h1>
  <p>No hay pendientes</p>
</div>
<?php
}?>
	<div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<?php include('./modal/MON_Modal_info.php'); ?>	
    </div>
</form>
<script>
$(function () {
	$.datepicker.setDefaults($.datepicker.regional["es"]);
	$("#datepicker").datepicker({
	 closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sab'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
	});
});
</script>


<script>
$(function () {
	$.datepicker.setDefaults($.datepicker.regional["es"]);
	$("#datepicker1").datepicker({
	 closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sab'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
	});
});
</script>



<script>
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<script language="javascript">
    function CargaBodegas() {
        document.form1.submit();
    }


$(document).on("click", ".edit", function (e) {
	e.preventDefault();
	var _self = $(this);
	var myBookId = _self.data('id');
	
	$("#bookid").val(myBookId);
	var bodega = myBookId; 
 // alert("Ejemplo de alerta con JavaScript" + bodega);
$("#contenedor").load("./modal/MON_Modal_info.php?bodega=",{bodega: bodega});

	alert(test);
	$(_self.attr('href')).modal('show');
	if ($.browser.version > 9){
    modal.removeClass('fade');
}
});

</script>



<?php
// Free the statement identifier when closing the connection
		oci_free_statement($stid);
		oci_close($conn);
		oci_close($conn_msio);
?>

</body>
</html>