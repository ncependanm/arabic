<?php
class kelasBiaya extends CI_Controller{
    
    var $folder =   "backend/kelasBiaya";
    var $tables =   "tbl_kelasbiaya";
    var $pk     =   "kelasbiaya_id";
    var $title  =   "Data Kelas dan Biaya";
    var $titleInputan  =   "Form Kelas dan Biaya";
    
    function __construct() {
        parent::__construct();
		$this->load->model('kelas_biaya_model','kelasBiayaModel');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }
    
    function index()
    {    
        $data['judulHalaman'] = "Kelas dan Biaya - Kursus B.Arab";
        $data['menu'] = "master";
        $data['subMenu'] = "kelasBiaya";
        $data['titleInputan'] = $this->titleInputan;
		
        $data['titlePage'] = 'Master';
        $data['titlePageSmall'] = 'Kelas dan Biaya';
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->kelasBiayaModel->get_datatables();
		$data = array();
		$no = 0;
		
		foreach ($list as $p) {
			$row = array();
			$no++;
			$row[] = $no;
			$row[] = $p->kelasbiaya_nama;
			$row[] = $p->kelasbiaya_ket;
			$row[] = $p->kelasbiaya_biaya;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$p->kelasbiaya_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$p->kelasbiaya_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kelasBiayaModel->count_all(),
						"recordsFiltered" => $this->kelasBiayaModel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
		
	function save()
	{
		$data = array(
			'kelasbiaya_nama' => $this->input->post('kelasbiaya_nama'),
			'kelasbiaya_ket' => $this->input->post('kelasbiaya_ket'),
			'kelasbiaya_biaya' => $this->input->post('kelasbiaya_biaya')
		);
		$this->db->insert($this->tables,$data);
		echo json_encode(array("status" => TRUE, "msg" => "Data Sukses"));
	}
	
	function prepareEdit($id)
    {
        $data = $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
        echo json_encode($data);
    }
	
    function update()
	{
		$id = $this->input->post('id');
		$data = array(
			'kelasbiaya_nama' => $this->input->post('kelasbiaya_nama'),
			'kelasbiaya_ket' => $this->input->post('kelasbiaya_ket'),
			'kelasbiaya_biaya' => $this->input->post('kelasbiaya_biaya')
		);
		$this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE, "msg" => "Data Sukses"));
	}
	
    function delete($id)
    {
        $chekid = $this->db->get_where($this->tables,array($this->pk=>$id));
        if($chekid>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $id);
        }
        echo json_encode(array("status" => TRUE));
    }
	
	public function upload(){
		  $fileName = $this->input->post('file', TRUE);

		  $config['upload_path'] = './assets/upload/'; 
		  $config['file_name'] = $fileName;
		  $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
		  $config['max_size'] = 10000;

		  $this->load->library('upload', $config);
		  $this->upload->initialize($config); 
		  
		  if (!$this->upload->do_upload('file')) {
		   $error = array('error' => $this->upload->display_errors());
		   $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
		   redirect('backend/unit'); 
		  } else {
		   $media = $this->upload->data();
		   $inputFileName = 'assets/upload/'.$media['file_name'];
		   
		   try {
			$inputFileType = IOFactory::identify($inputFileName);
			$objReader = IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		   } catch(Exception $e) {
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		   }

		   $sheet = $objPHPExcel->getSheet(0);
		   $highestRow = $sheet->getHighestRow();
		   $highestColumn = $sheet->getHighestColumn();

		   for ($row = 2; $row <= $highestRow; $row++){  
			 $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
			   NULL,
			   TRUE,
			   FALSE);
			 $data = array(
			'kelasbiaya_nama' => $rowData[0][0],
			'kelasbiaya_ket' => $rowData[0][1],
			'kelasbiaya_biaya' => $rowData[0][2],
			);
			$this->db->insert($this->tables,$data);
		   } 
		   redirect('backend/kelasBiaya'); 
		  }  
	} 
}
