<?php
class kolomTestimoni extends CI_Controller{
    
    var $folder =   "kolomTestimoni";
    var $tables =   "tbl_testimoni";
    var $pk     =   "testimoni_id";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $data['desc'] = "";
        $data['info'] = "";
        $data['menu'] = "kolomTestimoni";
        $data['judulHalaman'] = "Kolom Testimoni - Kursus B.Arab";
		
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
		$data = array(
			'testimoni_nama' => $this->input->post('testimoni_nama'),
			'testimoni_email' => $this->input->post('testimoni_email'),
			'testimoni_pekerjaan' => $this->input->post('testimoni_pekerjaan'),
			'testimoni_testimoni' => $this->input->post('testimoni_testimoni'),
		);
		$this->db->insert($this->tables,$data);
		echo json_encode(array("status" => TRUE, "msg" => "Data Sukses"));
	}
}