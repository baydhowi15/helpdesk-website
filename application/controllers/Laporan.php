<?php  

class Laporan extends CI_Controller 
{
	 public function __construct()
    {
        parent::__construct();
        cek_login();
    }
	public function index()
	{
		
		$data['title'] = "Laporan";
		$this->template->load('back/template','back/laporan/laporan');
	}

	function print_laporan()
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');

		$data['get_laporan'] = $this->M_laporan->get_periode_laporan($tgl_awal, $tgl_akhir)->result();

		$this->load->view('back/laporan/print_laporan', $data);
	}
}