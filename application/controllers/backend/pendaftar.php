<?php
class pendaftar extends CI_Controller{
    
    var $folder =   "backend/pendaftar";
    var $tables =   "tbl_pendaftar";
    var $pk     =   "pendaftar_id";
    var $title  =   "Data Pendaftar";
    var $titleInputan  =   "Form Pendaftar";
    
    function __construct() {
        parent::__construct();
		$this->load->model('pendaftar_model','pendaftarModel');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }
    
    function index()
    {    
        $data['judulHalaman'] = "Pendaftar - Kursus B.Arab";
        $data['menu'] = "master";
        $data['subMenu'] = "pendaftar";
        $data['titleInputan'] = $this->titleInputan;
		
        $data['titlePage'] = 'Master';
        $data['titlePageSmall'] = 'Pendaftar';
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->pendaftarModel->get_datatables();
		$data = array();
		$no = 0;
		$thn_ajaran_status = '';
		$thn_ajaran_reg_status = '';
		
		foreach ($list as $p) {
			$row = array();
			$no++;
			$row[] = $no;
			$row[] = $p->pendaftar_nama;
			$row[] = $p->pendaftar_email;
			$row[] = $p->pendaftar_no_telp;
			$row[] = $p->kelasbiaya_nama;
			$row[] = $p->pendaftar_alamat;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$p->pendaftar_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$p->pendaftar_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pendaftarModel->count_all(),
						"recordsFiltered" => $this->pendaftarModel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
		
	function save()
	{
		$data = array(
			'pendaftar_nama' => ($this->input->post('pendaftar_nama')),
			'pendaftar_email' => ($this->input->post('pendaftar_email')),
			'pendaftar_no_telp' => ($this->input->post('pendaftar_no_telp')),
			'pendaftar_alamat' => ($this->input->post('pendaftar_alamat')),
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
			'pendaftar_nama' => ($this->input->post('pendaftar_nama')),
			'pendaftar_email' => ($this->input->post('pendaftar_email')),
			'pendaftar_no_telp' => ($this->input->post('pendaftar_no_telp')),
			'pendaftar_alamat' => ($this->input->post('pendaftar_alamat')),
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
				'pendaftar_nama' => ($rowData[0][0]),
				'pendaftar_email' => ($rowData[0][1]),
			'pendaftar_no_telp' => ($rowData[0][2]),
			'pendaftar_alamat' => ($rowData[0][3]),
			);
			$this->db->insert($this->tables,$data);
		   } 
		   redirect('backend/pendaftar'); 
		  }  
	} 
}
