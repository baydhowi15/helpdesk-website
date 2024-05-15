<?php  

class Jabatan extends CI_Controller
{
	 public function __construct()
    {
        parent::__construct();
        cek_login();
    }
	public function index()
	{
		
		$data['jabatan'] = $this->M_jabatan->get_jabatan();
		$this->template->load('back/template','back/jabatan/jabatan', $data);
	}

	function save_jabatan()
	{
		$this->form_validation->set_rules('jabatan','Jabatan','trim|required');
		$this->form_validation->set_message('required','{field} Harus Terisi');
		//$this->session->set_flashdata('message','<div class="alert alert-info">Data Berhasil di Simpan</div>');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

		if($this->form_validation->run() == TRUE){
			$data = [
				'jabatan' => $this->input->post('jabatan')
			];

			$this->M_jabatan->insert($data);
            $this->session->set_flashdata('message','<div class="alert alert-info">Data Berhasil di Simpan</div>');
            redirect('jabatan','refresh');
		} else {
			$this->index();
			$this->session->set_flashdata('message','<div class="alert alert-info">Data Berhasil di Simpan</div>');
		}
	}

	function edit_jabatan($id)
	{
		$data['jbt'] = $this->M_jabatan->get_id_jabatan($id);
		if($data['jbt']){
			$data['jabatan'] = $this->M_jabatan->get_jabatan();
			$this->template->load('back/template','back/jabatan/edit_jabatan', $data);
		} else{
			$this->session->set_flashdata('message','<div class="alert alert-danger">Data Tidak Ada </div>');
            redirect('jabatan','refresh');
		}
	}

	function update_jabatan()
	{
		$data = [
			'jabatan' => $this->input->post('jabatan')
		];

		$this->M_jabatan->update($this->input->post('id_jabatan'), $data);
		$this->session->set_flashdata('message','<div class="alert alert-success">Data Berhasil Di Simpan </div>');
            redirect('jabatan','refresh');
	}

	function delete_jabatan($id)
	{
		$delete = $this->M_jabatan->get_id_jabatan($id);

		if($delete){
			$this->M_jabatan->delete($id);
			$this->session->set_flashdata('hapus','<div class="alert alert-infor">Data Berhasil Di Hapus </div>');
            redirect('jabatan','refresh');
		} else {
			$this->session->set_flashdata('hapus','<div class="alert alert-danger">Data Tidak Ada </div>');
            redirect('jabatan','refresh');
		}
	}
}

?>