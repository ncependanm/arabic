<?php
class konfirmasiPembayaran extends CI_Controller{
    
    var $folder =   "konfirmasiPembayaran";
    var $tables =   "tbl_konfirmasi_pembayaran";
    var $pk     =   "konfirmasi_id";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $data['desc'] = "";
        $data['info'] = "";
        $data['menu'] = "konfirmasiPembayaran";
        $data['judulHalaman'] = "Konfirmasi Pembayaran - Kursus B.Arab";
		
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
		$nama = $this->input->post('konfirmasi_nama');
		$email = $this->input->post('konfirmasi_email');
		$fileName = $this->input->post('file', TRUE);

		$config['upload_path'] = './assets/images/konfirmasi/'; 
		$config['file_name'] = 'konfirmasi'.time();
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);
		$this->upload->initialize($config); 
			  
		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('msgUpload',$this->upload->display_errors()); 
			redirect('konfirmasiPembayaran'); 
		} else {
			$media = $this->upload->data();
			$inputFileName = 'assets/images/konfirmasi/'.$media['file_name'];
			
			$data = array(
				'konfirmasi_nama' => $nama,
				'konfirmasi_email' => $email,
				'konfirmasi_bukti' => $inputFileName,
			);			
			$this->db->insert($this->tables,$data);			
			$this->session->set_flashdata('msgUpload','Sukses Konfirmasi Pembayaran'); 
			redirect('konfirmasiPembayaran'); 
		}  
	}
}