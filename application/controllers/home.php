<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {



	public function __construct()
	{
		parent::__construct();
		$this->load->model('servicios_model');
		$this->load->model('gift_model');
		$this->load->model('ventas_model');

		// MERCADOPAGO
		$this->config->load("mercadopago", TRUE);
    		$config = $this->config->item('mercadopago');
    		$this->load->library('Mercadopago', $config['mercadopago']);
	}



	/**
	 * Formulario para el completado de las tarjetas gifts
	 *
	 * @author 	Juan Pablo Sosa <jpasosa@gmail.com>
	 * @date 	22 de Enero del 2014
	 **/
	public function index()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$gift 	= $this->get_data_post();
			if ($gift['IdVenta'] == 0) { // PRIMER TARJETA
				$this->session->set_userdata ('cantidad_total',$gift['cantidad']);
				$this->session->set_userdata ('nombre_comprador',$gift['NombreComprador']);
				$this->session->set_userdata ('apellido_comprador',$gift['ApellidoComprador']);
				$insert_venta = $this->ventas_model->primer_insert(); // Lo va a poner en estado de espera y la fecha de creación, fecha actual.
				$gift['IdVenta']	= $insert_venta;
				$insert_gift 	= $this->gift_model->insert($gift);
			} else {
				$insert_gift 	= $this->gift_model->insert($gift); // Puede ser el segundo voucher que inserta.
			}

			if ( $insert_gift > 0) // Insertó correctamente los datos del voucher.
			{
				$gift['cantidad']--;
				$gift = $this->_limpiar_gift($gift); // borra los datos que tiene que volver a completar en el siguiente voucher, por ejemplo nombre agasajado, mensaje, etc.
				if ( $gift['cantidad'] == 0) // Llegó al último Voucher debe enviar el email y cambiar los estados.
				{

					// Cargo para mercadopago
					$data['compra_confirmada'] 	= TRUE;
					$preference = array(
									"items" => array(
										array(
												"title" 		=> "sdk-php",
												"quantity" 	=> 1,
												"currency_id" => "ARS",
												"unit_price" => 2
												)
										),
									"external_reference" => 23,
									"back_urls" => array(
														"success" => 'http://front_gift/home/gracias'
														)
										);

					$this->mercadopago->sandbox_mode('TRUE');

					$preferenceResult = $this->mercadopago->create_preference($preference);
					//Obtenemos el access_token
					$accessToken = $this->mercadopago->get_access_token();

					//
					// Debagueo un objeto / arreglo / variable
					//
					echo ' <br/> <div style="font-weight: bold; color: green;"> $accessToken: </div> <pre>' ;
					echo '<div style="color: #3741c6;">';
					if(is_array($accessToken)) {
					    print_r($accessToken);
					}else {
					var_dump($accessToken);
					}
					echo '</div>';
					echo '</pre>';
					// die('--FIN--DEBUGEO----');

					$data['preferenceResult'] = $preferenceResult;
					// FIN mercadopago


					// Debe capturar el estado que devuelve mercado pago y completarlo en el estado de la venta.
					// $status_mp = 3; // harckodeo estado, le pongo ACEPTADO.
					// $estado_mp = $this->ventas_model->set_estado_mp($gift['IdVenta'], $status_mp);
					// $send_mails = $this->_send_mails( $gift['IdVenta'] );
					// if ( $send_mails ) {
					// 	$this->session->set_flashdata('success','Los Vouchers se han cargado y enviado con éxito');
					// 	redirect('home/gracias');
					// } else {
					// 	$this->session->set_flashdata('success','Los Vouchers no se pudieron enviar.');
					// }
					// redirect('home');
				}
			}

		} else { // GET
			$gift = array();
		}

		$data['gift'] 		= $gift;
		$data['fecha_venc']= date('d-m-Y', strtotime("+90 days"));
		$data['servicios'] 	= $this->servicios_model->get_all();


		$this->load->view('home', $data);
	}

	/**
	 * Recibo los datos que devuelve mercadopago
	 **/
	public function mp()
	{


		$this->config->load("mercadopago", TRUE);
    		$config = $this->config->item('mercadopago');
    		$this->load->library('Mercadopago', $config['mercadopago']);


		// header("Content-type: text/plain");




		$payment_info = $this->mercadopago->get_payment_info ($_GET["id"]);

		// $mp = new MP("8657008936637658", "hB12jYmvfVSFVYd5SLgA7JNfGtNQzc2B");

		// Get the payment reported by the IPN. Glossary of attributes response in https://developers.mercadopago.com
		// $payment_info = $mp->get_payment_info($_GET["id"]);

		// Show payment information
		if ($payment_info["status"] == 200)
		{
			print_r($payment_info["response"]);

			$data_mp['id_pago']          			= $payment_info["response"]["collection"]["id"];
			$data_mp['fecha_pago']       		= $payment_info["response"]["collection"]["date_created"];
			$data_mp['fecha_estatus']    		= $payment_info["response"]["collection"]["last_modified"];
			$data_mp['cod_carrit']     			= $payment_info["response"]["collection"]["order_id"];
			$data_mp['estatus']          			= $payment_info["response"]["collection"]["status"];
			$data_mp['monto']            			= $payment_info["response"]["collection"]["transaction_amount"];
			$data_mp['email']            			= $payment_info["response"]["collection"]["payer"]["email"];
			$data_mp['ci']               			= $payment_info["response"]["collection"]["payer"]["identification"]["number"];
			//$objcarrito->insertar_pago() ;
		}

		log_message('error',  'pruebo si entra aca');
		// header ("", true, $paymentInfo["status"]);
		$error_pay = print_r($payment_info, TRUE);
		log_message('error',  $error_pay);

		if ( $data_mp['estatus'] == 'approved') {
			log_message('error',  'seteo las bases está aprobada la transacción. . ');
		}
		// print_r ($paymentInfo);



		//Respuesta: {"protocolVersion":{"major":1,"minor":1,"protocol":"HTTP"},"reasonPhrase":"OK","statusCode":200}

		// if($this->input->server('REQUEST_METHOD') == 'POST')
		// {
		// 	$paymentInfo = $this->mercadopago->get_payment_info ($_GET["id"]);
		// 	header ("", true, $paymentInfo["status"]);
		// 	print_r ($paymentInfo);


		// }
		// // error_reporting(E_ALL);

		// $id = $this->input->post("id");

		// log_message('error', $id);

		// $paymentInfo = $this->mercadopago->get_payment_info($id);







	}

	public function test_log()
	{


		log_message('info',  'testeo que entre correctamente en los logs. . ');
		die();

	}

	public function viene_mp()
	{
		die('datos de mp');
	}

	public function gracias()
	{
		$data = array();

		$data_mp['collection_id'] = $this->input->get('collection_id');
		$data_mp['collection_status'] = $this->input->get('collection_status');
		$data_mp['preference_id'] = $this->input->get('preference_id');
		$data_mp['external_reference'] = $this->input->get('external_reference');
		$data_mp['payment_type'] = $this->input->get('payment_type');

		//
		// Debagueo un objeto / arreglo / variable
		//
		echo ' <br/> <div style="font-weight: bold; color: green;"> $data_mp: </div> <pre>' ;
		echo '<div style="color: #3741c6;">';
		if(is_array($data_mp)) {
		    print_r($data_mp);
		}else {
		var_dump($data_mp);
		}
		echo '</div>';
		echo '</pre>';
		die('--FIN--DEBUGEO----');


		$this->session->unset_userdata('cantidad_total');
		$this->load->view('gracias', $data);
	}

	public function mailing()
	{
		$data = array();
		$this->load->view('template_gift', $data);
	}

	/**
	 * Envía los mails con los Vouchers.
	 *
	 * @author 	Juan Pablo Sosa <jpasosa@gmail.com>
	 * @date 	02-feb-2015
	 *
	 * @param      int 			idVenta
	 * @return      boolean		true si envío todos los mails correctamente | false si falló por algún lado.
	 **/
	private function _send_mails( $id_venta )
	{
		try {


			$gift = $this->gift_model->get_all_gifts($id_venta);

			foreach ($gift AS $gif)
			{
				$gif['fecha_venc']= date('d-m-Y', strtotime("+90 days"));
				$message = $this->load->view('template_gift',$gif,TRUE);

				$this->load->library('email');
				$this->load->config('data_mail');
				$config = array(
						    'protocol' 	=> $this->config->item('mail_protocol'),
						    'smtp_host' 	=> $this->config->item('mail_smtp_host'),
						    'smtp_port' 	=> $this->config->item('mail_smtp_port'),
						    'smtp_user' 	=> $this->config->item('mail_smtp_user'),
						    'smtp_pass' 	=> $this->config->item('mail_smtp_pass'),
						    'smtp_timeout' => $this->config->item('mail_smtp_timeout'),
						    'mailtype'  	=> $this->config->item('mail_mailtype'),
						    'charset'   	=>$this->config->item('mail_charset')
						);
				$this->email->initialize($config);
				$this->email->from('recepcion@spabelgrano.com');
				$this->email->to($gif['EmailComprador']);
				$this->email->subject('Spa Belgrano - Gift Certificate');
				$this->email->message($message);

				$this->email->send();
				//echo $this->email->print_debugger();
				sleep(1);
				$this->email->clear();
			}

			return true;

		} catch (Exception $e) {
			echo $e->getMessage();
			exit(1);
		}

	}







	/**
	 * Agarro datos por POST()
	 **/
	private function get_data_post()
	{

		$gift = array();

		if($this->input->post('IdVenta') != 0)
		{
			$gift['IdVenta'] = $this->input->post('IdVenta');
		} else {
			$gift['IdVenta'] = 0;
		}

		if($this->input->post('cantidad'))
		{
			$gift['cantidad'] = $this->input->post('cantidad');
		} else {
			$gift['cantidad'] = -1;
		}

		if($this->input->post('IdServicio'))
		{
			$gift['IdServicio'] = $this->input->post('IdServicio');
		} else {
			$gift['IdServicio'] = 1;
		}

		if($this->input->post('NombreComprador'))
		{
			$gift['NombreComprador'] = $this->input->post('NombreComprador');
		} else {
			$gift['NombreComprador'] = '';
		}

		if($this->input->post('ApellidoComprador'))
		{
			$gift['ApellidoComprador'] = $this->input->post('ApellidoComprador');
		} else {
			$gift['ApellidoComprador'] = '';
		}

		if($this->input->post('EmailComprador'))
		{
			$gift['EmailComprador'] = $this->input->post('EmailComprador');
		} else {
			$gift['EmailComprador'] = '';
		}

		if($this->input->post('TelefonoComprador'))
		{
			$gift['TelefonoComprador'] = $this->input->post('TelefonoComprador');
		} else {
			$gift['TelefonoComprador'] = '';
		}

		if($this->input->post('NombreAgasajado'))
		{
			$gift['NombreAgasajado'] = $this->input->post('NombreAgasajado');
		} else {
			$gift['NombreAgasajado'] = '';
		}

		if($this->input->post('ApellidoAgasajado'))
		{
			$gift['ApellidoAgasajado'] = $this->input->post('ApellidoAgasajado');
		} else {
			$gift['ApellidoAgasajado'] = '';
		}

		if($this->input->post('MensajePersonalizado'))
		{
			$gift['MensajePersonalizado'] = $this->input->post('MensajePersonalizado');
		} else {
			$gift['MensajePersonalizado'] = '';
		}

		return $gift;
	}



	/**
	 * Vacia el array gift para pasarselo a la siguiente vista,
	 * así puede continuar enviandos gifts, pero mantiene el id_venta
	 * el nombre, apellido, email y teléfono del comprador
	 *
	 * @author 	Juan Pablo Sosa <jpasosa@gmail.com>
	 * @date 	22 de Enero del 2014
	 *
	 * @param       int
	 * @return      array()
	 **/
	private function _limpiar_gift( $gift )
	{
		unset($gift['MensajePersonalizado'], $gift['IdServicio'], $gift['ApellidoAgasajado'], $gift['NombreAgasajado']);

		return $gift;
	}







}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
