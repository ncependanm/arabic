<?php
class kelasBiaya extends CI_Controller{
    
    var $folder =   "kelasBiaya";
    var $tables =   "";
    var $pk     =   "";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $data['desc'] = "";
        $data['info'] = "";
        $data['menu'] = "kelasBiaya";
        $data['judulHalaman'] = "Pilihan Kelas dan Biaya - Kursus B.Arab";
		
		$sqlDataKelasBiaya = "SELECT * FROM tbl_kelasbiaya";
		$dataKelasBiaya = $this->db->query($sqlDataKelasBiaya)->result();
		$data['dataKelasBiaya'] = $dataKelasBiaya;
		
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
		
	function auth()
	{
		$username   =  $this->input->post('user_username');
        $password   =  $this->input->post('user_password');
        $login=  $this->db->get_where('tbl_user',array('user_username'=>$username,'user_password'=>  md5($password)));
        if($login->num_rows()>0)
        {
            $r=  $login->row_array();
			$userId = $r['user_id'];
			$username = $r['user_username'];
			$nama = $r['user_nama'];
			
            $data=array('user_id' => $userId,
                            'user_username' => $username,
                            'user_nama' => $nama
			);
            $this->session->set_userdata($data);
			echo json_encode(array("status" => TRUE, "msg" => "Sukses"));
        } else {
			echo json_encode(array("status" => FALSE, "msg" => "Username atau password salah"));
		}
		
	}
	
	function logout()
    {
        $this->session->sess_destroy();
        redirect('backend/login');
    }
	
}