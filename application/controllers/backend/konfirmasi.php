<?php
class konfirmasi extends CI_Controller{
    
    var $folder =   "backend/konfirmasi";
    var $tables =   "tbl_konfirmasi_pembayaran";
    var $pk     =   "konfirmasi_id";
    var $title  =   "Data Konfirmasi Pembayaran";
    var $titleInputan  =   "Form Konfirmasi Pembayaran";
    
    function __construct() {
        parent::__construct();
		$this->load->model('konfirmasi_model','konfirmasiModel');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }
    
    function index()
    {    
        $data['judulHalaman'] = "Konfirmasi Pembayaran - Kursus B.Arab";
        $data['menu'] = "laporan";
        $data['subMenu'] = "konfirmasi";
        $data['titleInputan'] = $this->titleInputan;
		
        $data['titlePage'] = 'Laporan';
        $data['titlePageSmall'] = 'Konfirmasi Pendaftaran';
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->konfirmasiModel->get_datatables();
		$data = array();
		$no = 0;
		$thn_ajaran_status = '';
		$thn_ajaran_reg_status = '';
		
		foreach ($list as $p) {
			$row = array();
			$no++;
			$row[] = $no;
			$row[] = $p->konfirmasi_nama;
			$row[] = $p->konfirmasi_email;
			$row[] = '<a href="'.base_url().$p->konfirmasi_bukti.'" target="_blank" title="Download" ><img src ='.base_url().$p->konfirmasi_bukti.' width=100%></a>';
			//add html for action
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->konfirmasiModel->count_all(),
						"recordsFiltered" => $this->konfirmasiModel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
}
