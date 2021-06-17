<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		//$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

	public function index() {
		$data['num_rows'] = $this->db->get('PROBAR')->num_rows();

		$this->load->view('excel_import', $data);
	}

	public function import_data() {
		$config = array(
			'upload_path'   => FCPATH.'uploads/',
			'allowed_types' => 'csv|xls'
		);

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) {
			$data = $this->upload->data();
			@chmod($data['full_path'], 0777);

			$this->load->library('Spreadsheet_Excel_Readerr');
			$this->spreadsheet_excel_readerr->setOutputEncoding('CP1251');

			$this->spreadsheet_excel_readerr->read($data['full_path']);
			$sheets = $this->spreadsheet_excel_readerr->sheets[0];
			error_reporting(0);

			$data_excel = array();
			for ($i = 2; $i <= $sheets['numRows']; $i++) {
				if ($sheets['cells'][$i][1] == '') break;

				$data_excel[$i - 1]['NOMBRE']    = $sheets['cells'][$i][1];
				$data_excel[$i - 1]['APELLIDO']   = $sheets['cells'][$i][2];
			}

			$this->db->insert_batch('PROBAR', $data_excel);
			@unlink($data['full_path']);
			redirect('tablas/#estudiantes');
			
		}else
		{
			redirect('usuarios');
		}
		//redirect('tablas');
		
	}

}

/* End of file Excel_import.php */
/* Location: ./application/controllers/Excel_import.php */