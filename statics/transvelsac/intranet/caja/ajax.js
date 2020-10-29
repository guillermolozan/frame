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
function cargaCuentasxcobrar()
{
    var vidVendedor=document.getElementById('idVendedor').value;
    var divid = "detallecuentasxcobrardiv"; // el div que quieres!
	var ajax=nuevoAjax();
    ajax.onreadystatechange=function(){
      if(ajax.readyState==4){
        document.getElementById(divid).innerHTML=ajax.responseText;
      }
    }
	ajax.open("GET", "agregacuentasxcobrar.php?idVendedor="+vidVendedor,true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null);
}
