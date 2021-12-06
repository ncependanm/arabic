<?php
class galery extends CI_Controller{
    
    var $folder =   "galery";
    var $tables =   "";
    var $pk     =   "";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $data['desc'] = "";
        $data['info'] = "";
        $data['menu'] = "galery";
        $data['judulHalaman'] = "Galery - Kursus B.Arab";
		
		$sqlDataGalery = "SELECT * FROM tbl_galery";
		$dataGalery = $this->db->query($sqlDataGalery)->result();
		$data['dataGalery'] = $dataGalery;
		
		
		
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
	
}