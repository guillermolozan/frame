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
function cargaContenido()
{
    var vCantidad=document.getElementById('cantidad').value;
    var vPrecio=document.getElementById('precio').value;
    var vidProducto=document.getElementById('idProducto').value;
    var vidUniMed=document.getElementById('idunimed').value;
    var vNomProducto=document.getElementById('nomProducto').value;
    var divid = "productodiv"; // el div que quieres!
  	  var ajax=nuevoAjax();
      ajax.onreadystatechange=function(){
        if(ajax.readyState==4){
          document.getElementById(divid).innerHTML=ajax.responseText;
        }
      }
	  ajax.open("GET", "agregacar.php?idProducto="+vidProducto+"&Cantidad="+vCantidad+"&Precio="+vPrecio+"&IdUniMed="+vidUniMed+"&NomProducto="+vNomProducto,true);
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	  ajax.send(null);
	  document.agregacar.cantidad.value = "";
	  document.agregacar.precio.value = "";
	  document.agregacar.idProducto.value = "";
	  document.agregacar.nomProducto.value = "";
	  document.agregacar.idunimed.value = "0";
	  document.agregacar.importe.value = "";
}


function BorraContenido(idProducto)
{
    var divid = "productodiv"; // el div que quieres!
	var ajax=nuevoAjax();
    ajax.onreadystatechange=function(){
      if(ajax.readyState==4){
        document.getElementById(divid).innerHTML=ajax.responseText;
      }
    }
	ajax.open("GET", "borracar.php?idProducto="+idProducto,true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null);
	  document.agregacar.cantidad.value = "";
	  document.agregacar.precio.value = "";
	  document.agregacar.idProducto.value = "";
	  document.agregacar.nomProducto.value = "";
	  document.agregacar.idunimed.value = "0";
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
