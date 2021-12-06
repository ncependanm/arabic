<?php
class donasi extends CI_Controller{
    
    var $folder =   "donasi";
    var $tables =   "tbl_donasi";
    var $pk     =   "donasi_id";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $data['desc'] = "";
        $data['info'] = "";
        $data['menu'] = "donasi";
        $data['judulHalaman'] = "Donasi - Kursus B.Arab";
		
		$sqlDataMedsos = "SELECT * FROM tbl_medsos";
		$dataMedsos = $this->db->query($sqlDataMedsos)->result();
		$urlFB = '';
		$urlIG = '';
		foreach($dataMedsos as $m){
			if($m->medsos_nama == 'Facebook'){
				$urlFB = $m->medsos_url;
			} else {
				$urlIG = $m->medsos_url;				
			}
		}
		$data['urlFB'] = $urlFB;
		$data['urlIG'] = $urlIG;
		
		$this->template->load('template', $this->folder.'/index',$data);
    }	
	
	function save()
	{
		$nama = $this->input->post('donasi_nama');
		$fileName = $this->input->post('file', TRUE);

		$config['upload_path'] = './assets/images/donasi/'; 
		$config['file_name'] = 'donasi'.time();
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);
		$this->upload->initialize($config); 
			  
		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('msgUpload',$this->upload->display_errors()); 
			redirect('donasi'); 
		} else {
			$media = $this->upload->data();
			$inputFileName = 'assets/images/donasi/'.$media['file_name'];
			
			$data = array(
				'donasi_nama' => $nama,
				'donasi_bukti' => $inputFileName,
			);			
			$this->db->insert($this->tables,$data);			
			$this->session->set_flashdata('msgUpload','Bukti Donasi Sudah Terkirim'); 
			redirect('donasi'); 
		}  
	}
}