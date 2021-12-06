<?php
class testimoni extends CI_Controller{
    
    var $folder =   "backend/testimoni";
    var $tables =   "tbl_testimoni";
    var $pk     =   "testimoni_id";
    var $title  =   "Data Testimoni";
    var $titleInputan  =   "Form Testimoni";
    
    function __construct() {
        parent::__construct();
		$this->load->model('testimoni_model','testimoniModel');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }
    
    function index()
    {    
        $data['judulHalaman'] = "Testimoni - Kursus B.Arab";
        $data['menu'] = "testimoni";
        $data['subMenu'] = "";
        $data['titleInputan'] = $this->titleInputan;
		
        $data['titlePage'] = 'Testimoni';
        $data['titlePageSmall'] = '';
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->testimoniModel->get_datatables();
		$data = array();
		$no = 0;
		$thn_ajaran_status = '';
		$thn_ajaran_reg_status = '';
		
		foreach ($list as $p) {
			$row = array();
			$no++;
			$row[] = $no;
			$row[] = $p->testimoni_nama;
			$row[] = $p->testimoni_email;
			$row[] = $p->testimoni_pekerjaan;
			$row[] = $p->testimoni_testimoni;
			if($p->testimoni_ind == 'Y'){
				$row[] = 'Ya';
			} else {
				$row[] = 'Tidak';
			}
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$p->testimoni_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$p->testimoni_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->testimoniModel->count_all(),
						"recordsFiltered" => $this->testimoniModel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
		
	function save()
	{
		$data = array(
			'testimoni_nama' => ($this->input->post('testimoni_nama')),
			'testimoni_email' => ($this->input->post('testimoni_email')),
			'testimoni_pekerjaan' => ($this->input->post('testimoni_pekerjaan')),
			'testimoni_testimoni' => ($this->input->post('testimoni_testimoni')),
			'testimoni_ind' => ($this->input->post('testimoni_ind')),
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
			'testimoni_nama' => ($this->input->post('testimoni_nama')),
			'testimoni_email' => ($this->input->post('testimoni_email')),
			'testimoni_pekerjaan' => ($this->input->post('testimoni_pekerjaan')),
			'testimoni_testimoni' => ($this->input->post('testimoni_testimoni')),
			'testimoni_ind' => ($this->input->post('testimoni_ind')),
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
				'testimoni_nama' => ($rowData[0][0]),
				'testimoni_email' => ($rowData[0][1]),
				'testimoni_testimoni' => ($rowData[0][2])
			);
			$this->db->insert($this->tables,$data);
		   } 
		   redirect('backend/pendaftar'); 
		  }  
	} 
}
