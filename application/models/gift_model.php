<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Gift_model extends CI_Model
{

	public function __contruct()
	{
		parent::__construct();
	}


	/**
	 * Get all servicios
	 **/
	public function insert($gift)
	{

		try {

			$this->load->helper('my_string_helper');
			unset($gift['cantidad']);

			do { // Genera un código aleatorio y comprueba que no exista.
				$gift['code'] = generate_code();
				$exist_code = $this->_check_code_exist($gift['code']);
			} while($exist_code);

			$gift['FechaCreacion'] = date('Y-m-d');
			$insert_gift = $this->db->insert('Voucher', $gift);

			if ( $insert_gift )
			{
				return $this->db->insert_id();
			} else {
				return 0;
			}



		} catch (Exception $e) {
			echo $e->getMessage();
			exit(1);
		}

	}


	/**
	 * Nos devuelve un array que necesita mercadopago para controlar por producto
	 *
	 * @team 	Allytech
	 * @author 	Juan Pablo Sosa <jpasosa@gmail.com>
	 * @date 	12-feb-2015
	 *
	 * @param       int  		id_venta
	 * @return      array 	que necesita mercadopago para contabilizar todo.
	 **/
	public function get_gifts_for_mc( $id_venta )
	{
		try {

			$gifts = $this->get_all_gifts($id_venta);


			foreach ($gifts AS $k=>$gift_mp)
			{
				$gifts[$k]['title'] = $gift_mp['Nombre'];
				$gifts[$k]['quantity'] = 1;
				$gifts[$k]['currency_id'] = 'ARS';
				$gifts[$k]['unit_price'] = (float)$gift_mp['Valor'];
				unset($gifts[$k]['IdVoucher'], $gifts[$k]['IdServicio'], $gifts[$k]['IdVenta'], $gifts[$k]['NombreComprador'], $gifts[$k]['ApellidoComprador'], $gifts[$k]['EmailComprador'], $gifts[$k]['TelefonoComprador'],
						$gifts[$k]['NombreAgasajado'], $gifts[$k]['ApellidoAgasajado'], $gifts[$k]['MensajePersonalizado'], $gifts[$k]['Log'], $gifts[$k]['FechaCreacion'], $gifts[$k]['Code'], $gifts[$k]['Nombre'], $gifts[$k]['Valor'] );
			}

			// foreach ($gifts AS $k=>$evaluate) {
			// 	if ( (empty($evaluate)) ) {
			// 		unset($gifts[$k]);
			// 	}
			// }



			return $gifts;


		} catch (Exception $e) {
			echo $e->getMessage();
			exit(1);
		}
	}
	public function get_all_gifts( $id_venta )
	{
		try {

			$this->db->select('*');
                       $this->db->from('Voucher');
                       $this->db->join('Servicio', 'Voucher.IdServicio = Servicio.IdServicio');
                       $this->db->where('Voucher.IdVenta', $id_venta);
                       $this->db->order_by("Voucher.IdVoucher", "desc");
                       $q                                 = $this->db->get();
                       $gifts         = $q->result_array();

			return $gifts;

		} catch (Exception $e) {
			echo $e->getMessage();
			exit(1);
		}
	}


	/**
	 * Comprueba en todos los registros de los Vouchers
	 * que no exista el código enviado como parámetro.
	 ******
	 * @author 	Juan Pablo Sosa <jpasosa@gmail.com>
	 * @date 	29-enero-2015
	 * @param  	string 		código generado.
	 * @return      	boolean  	true si el código existe | false si no existe.
	 **/
	public function _check_code_exist($code)
	{
		try {

			$q 		= $this->db->get_where('Voucher', array('Code'=>$code));
			$result 	= $q->result_array();

			if ( isset ($result[0])) {
				return true;
			} else {
				return false;
			}

		} catch (Exception $e) {
			echo $e->getMessage();
			exit(1);
		}
	}



}


?>
