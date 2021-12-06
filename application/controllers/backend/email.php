<?php
class email extends CI_Controller{
    
    var $folder =   "backend/email";
    var $tables =   "";
    var $pk     =   "";
    var $title  =   "Data Email";
    var $titleInputan  =   "Form Email";
    
    function __construct() {
        parent::__construct();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }
    
    function index()
    {    
        $data['judulHalaman'] = "Kirim Email - Kursus B.Arab";
        $data['menu'] = "email";
        $data['subMenu'] = "";
		
        $data['titlePage'] = 'Kirim Email';
        $data['titlePageSmall'] = '';
        $data['titleInputan'] = $this->titleInputan;
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
			
	function send()
	{
		$judul = $this->input->post('email_judul');
		echo json_encode(array("status" => TRUE, "msg" => "Data Sukses", "judul" => $judul));
	}
	
	function sending()
	{
		$judul = $this->input->post('email_judul');
		$jenis = $this->input->post('email_jenis');
		$isi = $this->input->post('editor');
		$emailTujuan = '';
		$ind = '';
		if($jenis == 'B'){			
			$sqlDataPendaftar = "SELECT * FROM tbl_pendaftar WHERE pendaftar_email LIKE '%@%'";
			$dataPendaftar = $this->db->query($sqlDataPendaftar)->result();
			foreach($dataPendaftar as $p){
				if ($this->mcrud->sendMail($p->pendaftar_email, $judul, $isi))
				{
				} else {
					$ind = $ind . $p->pendaftar_email . ' | ' ;
				}
			}
			if($ind == ''){
				echo json_encode(array("status" => TRUE));
			} else {
				echo json_encode(array("status" => FALSE, "msg" => "Pesan tidak terkirim ke email : " . $ind));
			}
		} else {
			$emailTujuan = $this->input->post('email_tujuan'); 
			if ($this->mcrud->sendMail($emailTujuan, $judul, $isi))
			{
				echo json_encode(array("status" => TRUE));
			} else {
				echo json_encode(array("status" => FALSE, "msg" => "Pesan Tidak Terkirim !!"));
			}			
		}
	}
}
