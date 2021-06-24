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

			$yearr=date('y');
			$carnet='';
			$carnet='';
			$size=1;
			//$fecha=$yearr->format('y');

			$data_excel = array();
			$data_usuario = array();
			$contra = sha1('ues'.date("Y"));
			for ($i = 2; $i <= $sheets['numRows']; $i++) {
				if ($sheets['cells'][$i][1] == '') break;

				$nombre = $sheets['cells'][$i][2];
				$apellido = $sheets['cells'][$i][3];

				substr($nombre,0,1);
				substr($apellido,0,1);
				$codigo=substr($nombre,0,1).substr($apellido,0,1);
				$codigos=strtoupper($codigo);
				
				$codigoc=$codigos.date('y');
				

				$contador= $this->db->query("SELECT * FROM ESTUDIANTES WHERE CARNETESTU LIKE '".$codigo.date('y')."%'");
				foreach ($contador->result() as $dc){
					$size++;
				}
				//$size = $row['COUNT(*)'];
				

					if($cont<10){
						$carnet=$codigo.date('y').'00'.$size;
					}else if($contador<100){
						$carnet=$codigo.date('y').'0'.$size;
					}else if($contador<1000){
						$carnet=$codigo.date('y').$size;
					}
				
				
				$correo=strtolower($carnet);
				$correo=$correo.'@ues.edu.sv';


				$data_excel[$i - 1]['IDCARRERA']    = $sheets['cells'][$i][1];
				$data_excel[$i - 1]['NOMESTUDIANTE']   = $sheets['cells'][$i][2];
				$data_excel[$i - 1]['APELESTUDIANTE']   = $sheets['cells'][$i][3];
				$data_excel[$i - 1]['CARNETESTU']   = $carnet;
				$data_excel[$i - 1]['CORREOESTU']   = $correo;
				$data_excel[$i - 1]['TELESTUDIANTE']   = $sheets['cells'][$i][4];
				$data_excel[$i - 1]['ESTADOESTU']   = 'A';
				$data_usuario[$i - 1]['USUARIO'] = $correo;
				$data_usuario[$i - 1]['PASSWORD'] = $contra;
				$data_usuario[$i - 1]['TIPOUSUAIRO'] = 'ESTUDIANTE';
				$data_usuario[$i - 1]['ESTADOUSUARIO'] = 'A';
				$data_usuario[$i - 1]['INTENTOS'] = 0;
				$size=1;
				
			}

			$this->db->insert_batch('ESTUDIANTES', $data_excel);
			$this->db->insert_batch('USUARIO', $data_usuario);
			@unlink($data['full_path']);
			redirect('tablas/#estudiantes');
			
		}else
		{
			//edirect('usuarios');
		}
		redirect('tablas');
		
	}


	public function import_doc() {
		$config = array(
			'upload_path'   => FCPATH.'uploads/',
			'allowed_types' => 'pdf|doc|docx'
		);

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) {
			$data = $this->upload->data();
			@chmod($data['full_path'], 0777);

			redirect('horassociales');
			
		}
		//redirect('tablas');
		
	}

}

/* End of file Excel_import.php */
/* Location: ./application/controllers/Excel_import.php */