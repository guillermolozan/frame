
$().ready(function() {
	
	$("#frmLogeo").validate({
		rules: {
				txtCodUsuario: "required",
				contrasena: "required"
				
				},
				
		messages: {
				txtCodUsuario: "Requerido",
				contrasena: "Requerido"
				}
	}); 
	
	
	$("#frmEditMarca").validate({
		rules: {
				nomMarca: "required",
				imgMarca: {accept: "jpe?g|png|gif" }
				},
				
		messages: {
			
				nomMarca: "Requerido",
				imgMarca: {accept: "solo imagenes jpg, gif o png" }
				}
	}); 
	
	$("#frmNewMarca").validate({
		rules: {
				nomMarca: "required",
				imgMarca: {accept: "jpe?g|png|gif" }
				},
				
		messages: {
			
				nomMarca: "Requerido",
				imgMarca: {accept: "solo imagenes jpg, gif o png" }
				}
	}); 
	
	$("#frmNewTipoProd").validate({
		rules: {
				nomTipoProd: "required",
				imgTipoProd: {accept: "jpe?g|png|gif" }
				},
				
		messages: {
			
				nomTipoProd: "Requerido",
				imgTipoProd: {accept: "solo imagenes jpg, gif o png" }
				}
	}); 
	
	$("#frmEditTipoProd").validate({
		rules: {
				nomTipoProd: "required",
				imgTipoProd: {accept: "jpe?g|png|gif" }
				},
				
		messages: {
			
				nomTipoProd: "Requerido",
				imgTipoProd: {accept: "solo imagenes jpg, gif o png" }
				}
	}); 
	
	$("#frmNewModelo").validate({
		rules: {
				nomModelo: "required",
				idTipoProd:{required: true, min: 1}
				},
				
		messages: {
			
				nomModelo: "Requerido",
				idTipoProd: "Seleccione un tipo"
				}
	}); 
	
	$("#frmEditModelo").validate({
		rules: {
				nomModelo: "required",
				idTipoProd:{required: true, min: 1}
				},
				
		messages: {
			
				nomModelo: "Requerido",
				idTipoProd: "Seleccione un tipo"
				}
	}); 
	
	$("#frmNewProv").validate({
		rules: {
				nomProv: {required: true },
				rucProv:{required: true, minlength: 11, digits: true},
				dirProv: {required: true },
				telef1Prov: {minlength: 6, digits: true},
				telef2Prov: {minlength: 6, digits: true},
				modoPagoProv: {required: true, equalTo: "#modoPagoProv"},
				webProv: {url: true },
				//ctaProv: {digits: true, cta:true },
				celProv: {minlength: 7, digits: true },
				emailProv: {email: true }
				},
				
		messages: {
			
				nomProv: "Requerido",
				rucProv: { required: "Requerido", minlength: "Ingrese un numero valido", digits: "Ingrese un numero valido" },
				dirProv: "Requerido",
				telef1Prov: { minlength: "Ingrese un numero valido", digits: "Ingrese un numero valido" },
				telef2Prov: { minlength: "Ingrese un numero valido", digits: "Ingrese un numero valido" },
				modoPagoProv: { required: "Requerido", equalTo: "Seleccione"},
				webProv: "Ingrese una url valida",
				//ctaProv: "Ingrese un numero de cuenta correcta",
				celProv: "Ingrese un numero valido",
				emailProv: "Ingrese un email valido"
				}
	}); 
	
	$("#frmEditProv").validate({
		rules: {
				nomProv: {required: true },
				rucProv:{required: true, minlength: 11, digits: true},
				dirProv: {required: true },
				telef1Prov: {minlength: 6, digits: true},
				telef2Prov: {minlength: 6, digits: true},
				modoPagoProv: {required: true, equalTo: "#modoPagoProv"},
				webProv: {url: true },
				//ctaProv: {digits: true, cta:true },
				celProv: {minlength: 7, digits: true },
				emailProv: {email: true }
				},
				
		messages: {
			
				nomProv: "Requerido",
				rucProv: { required: "Requerido", minlength: "Ingrese un numero valido", digits: "Ingrese un numero valido" },
				dirProv: "Requerido",
				telef1Prov: { minlength: "Ingrese un numero valido", digits: "Ingrese un numero valido" },
				telef2Prov: { minlength: "Ingrese un numero valido", digits: "Ingrese un numero valido" },
				modoPagoProv: { required: "Requerido", equalTo: "Seleccione"},
				webProv: "Ingrese una url valida",
				//ctaProv: "Ingrese un numero de cuenta correcta",
				celProv: "Ingrese un numero valido",
				emailProv: "Ingrese un email valido"
				}
	}); 
	
		$("#frmNewProd").validate({
		rules: {
				nomProd: {required: true },
				descCorta: {required: true },
				stockMinimo: {required: true, digits:true },
				idTipoProd: {required: true, min: 1},
				idModelo: {required: true, min: 1},
				idMarca: {required: true, min: 1},
				imgProd: {accept: "jpe?g|png|gif" }
				
				},
				
		messages: {
			
				nomProd: "Requerido",
				descCorta: "Requerido",
				stockMinimo: { required:"Requerido", digits: "Ingrese un numero valido" },
				idTipoProd: "Seleccione un tipo",
				idModelo: "Seleccione un modelo",
				idMarca: "Seleccione una marca",
				imgProd: {accept: "solo imagenes jpg, gif o png" }
				
				}
	}); 
	
	$("#frmEditProd").validate({
		rules: {
				nomProd: {required: true },
				descCorta: {required: true },
				stockMinimo: {required: true, digits:true },
				idTipoProd: {required: true, min: 1},
				idModelo: {required: true, min: 1},
				idMarca: {required: true, min: 1},
				idProv: {required: true, min: 1},
				imgProd: {accept: "jpe?g|png|gif" }
				
				},
				
		messages: {
			
				nomProd: "Requerido",
				descCorta: "Requerido",
				stockMinimo: { required:"Requerido", digits: "Ingrese un numero valido" },
				idTipoProd: "Seleccione un tipo",
				idModelo: "Seleccione un modelo",
				idMarca: "Seleccione una marca",
				idProv: "Seleccione un proveedor",
				imgProd: {accept: "solo imagenes jpg, gif o png" }
				
				}
	}); 
	
	$("#frmNewOrdenC").validate({
		rules: {
				proveedorDestino: {required: true }
				
				},
				
		messages: {
			
				proveedorDestino: "Requerido"
				
				
				}
	}); 
	
		$("#frmNewEntradaA").validate({
		rules: {
				almacenDestino: {required: true }
				
				},
				
		messages: {
			
				almacenDestino: "Requerido"
				
				
				}
	}); 
	
		$("#frmbuscarFactProv").validate({
		rules: {
				codComp: {required: true }
				},
				
		messages: {
				codComp: "Requerido"
				}
	});
	
	
	
	
	
			$("#frmNewSalidaA").validate({
		rules: {
				almacenDestino: {required: true }
				
				},
				
		messages: {
			
				almacenDestino: "Requerido"
				
				
				}
	});
	
		$("#frmNewEntradaC").validate({
		rules: {
				/*tipoComp: {required: true, min: 1},*/
				codComp:  {required: true},
				//tipoComp: {equalTo: "Boleta", equalTo: "Factura"},
				proveedor: {required: true, min: 1}
				},
				
		messages: {
/*				tipoComp: "Seleccione un tipo",*/
				codComp: "Requerido",
				//tipoComp: "Seleccione un comprobante",
				proveedor: "Seleccione un proveedor"
				}
	});
		
	$("#frmNewCliente").validate({
		rules: {
				nomCliente:  {required: true},
				ruc:  {required: true, minlength: 8, digits: true},
				direccion:  {required: true}
				},
				
		messages: {
				nomCliente: "Requerido",
				ruc: { required: "Requerido", minlength: "Ingrese un numero valido", digits: "Ingrese un numero valido" },
				direccion: "Requerido"
				}
	});
		
	$("#frmEditCliente").validate({
		rules: {
				nomCliente:  {required: true},
				ruc:  {required: true, minlength: 8, digits: true},
				direccion:  {required: true}
				},
				
		messages: {
				nomCliente: "Requerido",
				ruc: { required: "Requerido", minlength: "Ingrese un numero valido", digits: "Ingrese un numero valido" },
				direccion: "Requerido"
				}
	});
	
	$("#frmEditAdmin").validate({
		rules: {
				nomUsuario:  {required: true},
				codUsuario:  {required: true},
				contrasena2:  {equalTo: "#contrasena"}
				},
				
		messages: {
				nomUsuario:  "Requerido",
				codUsuario:  "Requerido",
				contrasena2:  { required: "Requerido", equalTo: "Los passwords no coinciden"}
				}
	});
	
	$("#frmEditEmpresa").validate({
		rules: {
				nomEmpresa:  {required: true},
				dirEmpresa:  {required: true},
				rucEmpresa:  {required: true}
				},
				
		messages: {
				nomEmpresa:  "Requerido",
				dirEmpresa:  "Requerido",
				rucEmpresa:  "Requerido"
				}
	});
	
	$("#frmEditSucursal").validate({
		rules: {
				nomSucursal:  {required: true},
				dirSucursal:  {required: true},
				telefSucursal:  {required: true},
				webSucursal: {url:true},
				imgSucursal: {accept: "jpe?g|gif" }
				},
				
		messages: {
				nomSucursal:  "Requerido",
				dirSucursal:  "Requerido",
				telefSucursal:  "Requerido",
				webSucursal: "Ingrese una url valida",
				imgProd: {accept: "solo imagenes jpg o gif" }
				}
	});
	
	$("#frmNewUsuario").validate({
		rules: {
				nomUsuario:  {required: true},
				idSucursal:  {required: true, min: 1},
				idRol:  {required: true, min: 1},
				codUsuario: {required: true},
				contrasena: {required: true}
				},
				
		messages: {
				nomUsuario:  "Requerido",
				idSucursal:  "Seleccione una sucursal",
				idRol:  "Seleccione un rol",
				codUsuario: "Requerido",
				contrasena: "Requerido"
				}
	});
	
	$("#frmEditUsuario").validate({
		rules: {
				nomUsuario:  {required: true},
				idSucursal:  {required: true, min: 1},
				idRol:  {required: true, min: 1},
				codUsuario: {required: true},
				contrasena: {required: true}
				},
				
		messages: {
				nomUsuario:  "Requerido",
				idSucursal:  "Seleccione una sucursal",
				idRol:  "Seleccione un rol",
				codUsuario: "Requerido",
				contrasena: "Requerido"
				}
	});
});

