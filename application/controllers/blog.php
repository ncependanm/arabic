<?php
class blog extends CI_Controller{
    
    var $folder =   "blog";
    var $tables =   "";
    var $pk     =   "";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $data['desc'] = "";
        $data['info'] = "";
        $data['menu'] = "blog";
        $data['judulHalaman'] = "Blog - Kursus B.Arab";
		
		$sqlDataBlog = "SELECT * FROM tbl_blog ORDER BY blog_id desc Limit 10";
		$dataBlog = $this->db->query($sqlDataBlog)->result();
		$data['dataBlog'] = $dataBlog;
		
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
	
	function readmore($id)
    {
        $data = $this->mcrud->getByID('tbl_blog',  'blog_id',$id)->row_array();
        echo json_encode($data);
    }
}