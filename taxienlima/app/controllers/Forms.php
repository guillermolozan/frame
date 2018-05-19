<?php 
namespace controllers;

class Forms extends \core\controllers\Forms {

	var $admin_emails;
	
	var $fields;

	function __construct($params){

		parent::__construct($params);

		$this->admin_emails=[
					// 'informes@asiste.pe',
					'reservas@taxienlima.com',
					// 'servicios@prodiserv.com',
					'guillermolozan@gmail.com',
								 ];

	}

	function trabaja_con_nosotros(){

		$this->admin_emails=[
					'afiliacion@taxienlima.com',
					'guillermolozan@gmail.com',
								 ];

		$this->name = "Trabaja con Nosotros";

		$this->fields=[

			'nombre'=>[
				'class' =>'validate',
				'label' =>'Nombre',
			],


			'apellidos'=>[
				'class' =>'validate',
				'label' =>'Apellidos',
			],

			'curriculum'=>[
				'label' =>'Curriculum',
				'type'  =>'file',
			],	


			'email'=>[
				'class' =>'validate',
				'label' =>'Email',
				'type'  =>'email',
			],

		];


		$fields_reformated=$this->processFields();
		// prin($form);

		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				implode(',',$this->admin_emails),
				"Mensaje de Trabaje con Nosotros",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Curriculum",
					'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para administrador'
				]
			);

			if($sended){	$this->setMessage($email);		} 

			if(0)
			insert(
				array_merge(
					[
						'fecha_creacion' =>'now()',
						'fecha'          =>'now()',
					],
				$this->insertFields()
				),
				"contacto");

		}




		$this->view->render(
			
			'layout_forms',

			[
				//head
				'head_title'   => $this->name.' - '.$this->title,

				'title' 			=> $this->name,
				
				'message'		=> $this->message,

				'fields'			=> $fields_reformated,

				'banner'			=> 'trabajo_banner_bg.jpg',

				'post'=>[
					// 'name'=>'REQUISITOS PARA AFILIARSE',
					'html'=>'
					<h3>REQUISITOS PARA AFILIARSE</h3>
<p>Antes de todo, usted posible afiliado debe tener en cuenta que va a pasar por una evaluación y de cumplir con todos los requisitos se procederá a la entrevista personal y de aprobar con éxito, pertenecerá al grupo de afiliados de taxienlima.com</p>

<p>Se acepta para afiliarse, personas con vehículo propio (auto, camioneta y vans)</p>

<p>Asimismo; se hace saber que trabajamos con el 25% (ejemplo: si se le pasa un traslado de tarifa de S/. 10.00 pagado por el cliente, entonces para la empresa le pertenece S/. 2.50 y para usted afiliado S/. 7.50).</p>
<p>*Todas las comisiones serán depositadas a la cuenta de la empresa los dias lunes. En caso no cumpla con el pago, entonces se desiste de pasar clientes hasta regularizar.</p>

<p>También deberá tener en cuenta que luego de la aprobación que lo habilita para formar parte del grupo de afiliados, deberá usted abonar S/. 50.00 como pago de membresía que servirá como garantía para la empresa, solo para casos de falta a la política interna de puntualidad y compromiso en el servicio.</p>

<p>Si cumple con los siguientes requisitos, entonces podrá usted postular para pertener al grupo de afiliados de taxienlima.com:</p>

<ul>
<li>1- No tener algún tipo de antecedente o denuncia. Para la verificación se le solicitará el certificado de antecedentes policial, judicial y penal.</li>

<li>2- Contar con un vehículo que no sea mayor de 3 años de antiguedad.</li>

<li>3- El vehículo debe contar con SOAT y GPS.</li>

<li>4- Contar con Setaca/Setame</li>

<li>5- Celular RPM.</li>
</ul>

<p>En caso cuente con los requisitos anteriores, entonces deberá enviar la siguiente información adjunta:</p>
<ul>
<li>- Foto de su DNI (ambas caras)</li>
<li>- Foto de su brevete (ambas caras)</li>
<li>- Foto de su tarjeta de propiedad (ambas caras)</li>
<li>- Foto del SOAT.</li>
<li>- Certificado de operaciones.</li>
<li>- 4 fotos del vehículo (adelante, atrás, derecha e izquierda)</li>
<li>- Declaración jurada simple en la que indique donde esta viviendo con sus datos y su respectiva firma y huella digital.</li>
<li>*Luego se procederá a la verificación de su dirección domiciliaria que brinde.</li>
<ul>

<p>
Interesados, deberán enviar la información solicitada lineas arriba al correo: afiliacion@taxienlima.com, indicando en asunto (AFILIACION); así como su zona de trabajo frecuente o tipos de servicios.</p>

<p>También puede adjuntar en este formulario los datos requeridos.</p>'
				]
				//main
				// 'main_title' 	=> 'Home',

				//menu
				// 'menu_left'    => $this->elements->getMenuLeft(),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),
			]

		);		

	}	




	function haga_su_reserva(){

		$this->name = "Reserva";

		$this->fields=[

			'nombre'=>[
				'label' =>'Nombre y Apellidos',
				'class' =>'validate',
			],
			'ciudad'=>[
				'label'=>'Ciudad y Pais de Procedencia',
			],
			'fecha'=>[
				'label'=>'Fecha de servicio',
				'type'=>'date',
				'class'=>'datepicker'
			],
			'hora'=>[
				'label'=>'Hora exacta de servicio',
			],
			'desde'=>[
				'label'=>'Lugar de recojo',
				'type'  =>'select',
				'options'=>['Aeropuerto','Hotel','Domicilio']
			],			
			'desde_direccion'=>[
				'label'=>'Dirección de recojo en Lima',
			],
			'hasta_direccion'=>[
				'label'=>'Dirección de destino en Lima',
			],			
			'telefono'=>[
				'label'=>'Teléfono o Celular',
			],
			'email'=>[
				'class' =>'validate',
				'label' =>'Email',
				'type'  =>'email',
			],
			'aerolinea'=>[
				'label'=>'Aerolínea y N de vuelvo (servicio de llegada)',
			],
			'pasajeros'=>[
				'label'=>'Número de Pasajeros',
			],
			'tipo'=>[
				'label'=>'Tipo de Movilidad solicitada',
				'type'  =>'select',
				'options'=>['Auto','Van','Camioneta']
			],	

			'comentario'=>[
				'class' =>'validate',
				'label' =>'Consulta',
				'type'  =>'textarea',
			],

		];


		$fields_reformated=$this->processFields();
		// prin($form);

		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				implode(',',$this->admin_emails),
				"Mensaje de Haga su reserva",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Reserva",
					'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para administrador'
				]
			);


			if($sended){	$this->setMessage($email);		} 


			if(0)
			insert(
				array_merge(
					[
						'fecha_creacion' =>'now()',
						'fecha'          =>'now()',
					],
				$this->insertFields()
				),
				"contacto"
			);


		}


		$this->view->render(
			
			'layout_forms',

			[
				//head
				'head_title'   => $this->name.' - '.$this->title,

				'title' 			=> $this->name,
				
				'message'		=> $this->message,

				'fields'			=> $fields_reformated,

				//main
				// 'main_title' 	=> 'Home',

				//menu
				// 'menu_left'    => $this->elements->getMenuLeft(),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),
			]

		);		

	}


	function contactenos(){

		$this->name = "Contáctenos";

		$this->fields=[

			'nombre'=>[
				'label' =>'Nombre y Apellidos',
				'class' =>'validate',
			],

			'ciudad'=>[
				'label'=>'Ciudad y Pais',
			],

			'medio'=>[
				'label'=>'¿Por qué medio nos encontró?',
				'type'  =>'select',
				'options'=>['Web','Periódico','Revista','Televisión','Panel Publicitario','Un conocido nos recomendó','Otros']
			],			

			'telefono'=>[
				'label'=>'Teléfono o Celular',
			],

			'email'=>[
				'class' =>'validate',
				'label' =>'Email',
				'type'  =>'email',
			],

			'ciudad'=>[
				'label'=>'Empresa',
			],

			'comentario'=>[
				'class' =>'validate',
				'label' =>'Consulta',
				'type'  =>'textarea',
			],

		];


		$fields_reformated=$this->processFields();
		// prin($form);

		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				implode(',',$this->admin_emails),
				"Mensaje de Contáctenos",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Contacto",
					'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para administrador'
				]
			);


			if($sended){	$this->setMessage($email);		} 


			if(0)
			insert(
				array_merge(
					[
						'fecha_creacion' =>'now()',
						'fecha'          =>'now()',
					],
				$this->insertFields()
				),
				"contacto"
			);


		}

		// parent::split();
		// prin($params);


		$this->view->render(
			
			'layout_forms',

			[
				//head
				'head_title'   => $this->name.' - '.$this->title,

				'title' 			=> $this->name,

				'message'		=> $this->message,

				'fields'			=> $fields_reformated,

				//main
				// 'main_title' 	=> 'Home',

				//menu
				// 'menu_left'    => $this->elements->getMenuLeft(),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),
			]

		);		

	}

}