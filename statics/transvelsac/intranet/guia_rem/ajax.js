function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp; 
}
function cargaVentas(nIdVentasCab)
{
    var vIdVentasCab=nIdVentasCab;
    var divid = "cargarventasdiv"; // el div que quieres!
  	  var ajax=nuevoAjax();
      ajax.onreadystatechange=function(){
        if(ajax.readyState==4){
          window.opener.document.getElementById(divid).innerHTML=ajax.responseText;
    	  window.close();
        }
      }
	  ajax.open("GET", "agregaVentas.php?IdVentasCab="+nIdVentasCab,true);
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	  ajax.send(null);
}


function BorraContenido(idProducto)
{
    var vcalculoMargen=document.getElementById('calculoMargen').value;
    var vcalculoIGV=document.getElementById('calculoIGV').value;
    var divid = "productodiv"; // el div que quieres!
	var ajax=nuevoAjax();
    ajax.onreadystatechange=function(){
      if(ajax.readyState==4){
        document.getElementById(divid).innerHTML=ajax.responseText;
      }
    }
	ajax.open("GET", "borracar.php?idProducto="+idProducto+"&calculoMargen="+vcalculoMargen+"&calculoIGV="+vcalculoIGV,true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null);
	document.agregacar.IdSerie.value = "";
	document.agregacar.NroSerie.value = "";
	document.agregacar.codProd.value = "";
    document.agregacar.idProducto.value = "";
	document.agregacar.nomProducto.value = "";
	document.agregacar.canProd.value = "";
	document.agregacar.costoUnit.value = "";
	document.agregacar.costoU.value = "";
	document.agregacar.importe.value = "";
}
function numeroCuotas()
{
    var divid = "numerocuotas"; // el div que quieres!
    var vTipoVenta=document.getElementById('TipoVenta').value;
	var ajax=nuevoAjax();
    ajax.onreadystatechange=function(){
      if(ajax.readyState==4){
        document.getElementById(divid).innerHTML=ajax.responseText;
      }
    }
    if (vTipoVenta=='1') {	
	  ajax.open("GET", "blank.htm",true);
	}
    if (vTipoVenta=='2') {	
	  ajax.open("GET", "numeroCuotas.php?TipoVenta="+vTipoVenta,true);
	}
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null);
}
function numeroCuotas1()
{
    var divid = "numerocuotas"; // el div que quieres!
    var vTipoVenta=document.getElementById('TipoVenta').value;
	var ajax=nuevoAjax();
    ajax.onreadystatechange=function(){
      if(ajax.readyState==4){
        document.getElementById(divid).innerHTML=ajax.responseText;
      }
    }
    if (vTipoVenta=='1') {	
	  ajax.open("GET", "blank.htm",true);
	}
    if ((vTipoVenta=='2') || (vTipoVenta=='3')) {	
	  var nidCliente = document.getElementById('idCliente').value;
	  var nidVendedor = document.getElementById('idVendedor').value;
	  var vcalculoIGV = document.getElementById('calculoIGV').value
	  var vcalculoMargen = document.getElementById('calculoMargen').value
	  ajax.open("GET", "numeroCuotas1.php?idCliente="+nidCliente+"&idVendedor="+nidVendedor+"&calculoIGV="+vcalculoIGV+"&calculoMargen="+vcalculoMargen+"&TipoVenta="+vTipoVenta,true);
	}
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null);
}
function numeroCuotas2()
{
    var divid = "numerocuotas"; // el div que quieres!
    var vTipoVenta=document.getElementById('TipoVenta').value;
	var ajax=nuevoAjax();
    ajax.onreadystatechange=function(){
      if(ajax.readyState==4){
        document.getElementById(divid).innerHTML=ajax.responseText;
      }
    }
    if (vTipoVenta=='1') {	
	  ajax.open("GET", "blank.htm",true);
	}
    if ((vTipoVenta=='2') || (vTipoVenta=='3')) {	
	  var nidCliente = document.getElementById('idCliente').value;
	  var nidVendedor = document.getElementById('idVendedor').value;
	  var vcalculoIGV = document.getElementById('calculoIGV').value
	  var vcalculoMargen = document.getElementById('calculoMargen').value
	  ajax.open("GET", "numeroCuotas2.php?idCliente="+nidCliente+"&idVendedor="+nidVendedor+"&calculoIGV="+vcalculoIGV+"&calculoMargen="+vcalculoMargen+"&TipoVenta="+vTipoVenta,true);
	}
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null);
}

