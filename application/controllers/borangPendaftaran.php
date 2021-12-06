<?php
class borangPendaftaran extends CI_Controller{
    
    var $folder =   "borangPendaftaran";
    var $tables =   "tbl_pendaftar";
    var $pk     =   "pendaftar_id";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $data['desc'] = "";
        $data['info'] = "";
        $data['menu'] = "borangPendaftaran";
        $data['judulHalaman'] = "Borang Pendaftaran - Kursus B.Arab";
		
		$sqlDataKelasBiaya = "SELECT * FROM tbl_kelasbiaya";
		$dataKelasBiaya = $this->db->query($sqlDataKelasBiaya)->result();
		$data['dataKelasBiaya'] = $dataKelasBiaya;
		
		
		
		$sqlDataJadwal = "SELECT * FROM tbl_jadwal WHERE jadwal_mulai > '" . date("d-m-Y"). "'";
		$dataJadwal = $this->db->query($sqlDataJadwal)->result();
		$data['dataJadwal'] = $dataJadwal;
				
		
		
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
		$email = $this->input->post('pendaftar_email'); 
		$subject = 'Konfirmasi Pendaftaran';
		$message = 'Kepada User,<br /><br />
				Terima Kasih karena telah mendaftar.<br />
				Kami akan hubungi Tuan / Puan untuk maklumat Pembayaran & Tarikh Pendaftaran
				<br /><br /> 
				Jazakallahukhair<br />
				My Arabic Class Admin
				<br />
				cetege.id';
		if ($this->mcrud->sendMail($email, $subject, $message))
		{
			$data = array(
				'pendaftar_nama' => $this->input->post('pendaftar_nama'),
				'pendaftar_email' => $email,
				'pendaftar_no_telp' => $this->input->post('pendaftar_no_telp'),
				'pendaftar_kelas' => $this->input->post('pendaftar_kelas'),
				'pendaftar_jadwal' => $this->input->post('pendaftar_jadwal'),
				'pendaftar_alamat' => $this->input->post('pendaftar_alamat'),
				'pendaftar_ket_lain' => $this->input->post('pendaftar_ket_lain'),
			);
			$this->db->insert($this->tables,$data);
			echo json_encode(array("status" => TRUE, "msg" => "Data Sukses"));			
		} else {
			echo json_encode(array("status" => FALSE, "msg" => "Email Pendaftaran Tidak Terkirim"));						
		}
	}
}