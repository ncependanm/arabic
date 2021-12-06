<?php
class donasi extends CI_Controller{
    
    var $folder =   "backend/donasi";
    var $tables =   "tbl_donasi";
    var $pk     =   "donasi_id";
    var $title  =   "Data Donasi";
    var $titleInputan  =   "Form Donasi";
    
    function __construct() {
        parent::__construct();
		$this->load->model('donasi_model','donasiModel');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }
    
    function index()
    {    
        $data['judulHalaman'] = "Donasi - Kursus B.Arab";
        $data['menu'] = "laporan";
        $data['subMenu'] = "donasi";
        $data['titleInputan'] = $this->titleInputan;
		
        $data['titlePage'] = 'Laporan';
        $data['titlePageSmall'] = 'Donasi';
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->donasiModel->get_datatables();
		$data = array();
		$no = 0;
		
		foreach ($list as $p) {
			$row = array();
			$no++;
			$row[] = $no;
			$row[] = $p->donasi_nama;
			$row[] = '<a href="'.base_url().$p->donasi_bukti.'" target="_blank" title="Download" ><img src ='.base_url().$p->donasi_bukti.' width=100%></a>';
			//add html for action
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->donasiModel->count_all(),
						"recordsFiltered" => $this->donasiModel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
}
