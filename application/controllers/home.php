<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {



	public function __construct()
	{
		parent::__construct();
		$this->load->model('servicios_model');
		$this->load->model('gift_model');
		$this->load->model('ventas_model');
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
					// Debe capturar el estado que devuelve mercado pago y completarlo en el estado de la venta.
					$status_mp = 3; // harckodeo estado, le pongo ACEPTADO.
					$estado_mp = $this->ventas_model->set_estado_mp($gift['IdVenta'], $status_mp);
					$send_mails = $this->_send_mails( $gift['IdVenta'] );
					if ( $send_mails ) {
						$this->session->set_flashdata('success','Los Vouchers se han cargado y enviado con éxito');
						redirect('home/gracias');
					} else {
						$this->session->set_flashdata('success','Los Vouchers no se pudieron enviar.');
					}
					redirect('home');
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


	public function gracias()
	{
		$data = array();
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
			var_dump ($gift);
			die;
			foreach ($gift AS  $gif)
			{
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
				$this->email->from('Spa Belgrano');
				$this->email->to($gif['EmailComprador']);
				$this->email->subject('Spa Belgrano - Gift Certificate');
				$this->email->message($message);

				$this->email->send();
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
