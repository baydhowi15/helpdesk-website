<?php 
class Dashboard extends CI_Controller{
     public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        
        $data['tiket_wait'] = $this->M_tiket->tiket_wait();
        $data['tiket_proses'] = $this->M_tiket->tiket_proses();
        $data['tiket_close'] = $this->M_tiket->tiket_close();
        $data['user'] = $this->M_karyawan->jumlah_user();
        $data['tiket_user_wait'] = $this->M_tiket->tiket_user_wait();
        $data['tiket_user_respon'] = $this->M_tiket->tiket_user_respon();
        $data['tiket_user_solved'] = $this->M_tiket->tiket_user_solved();

        $this->template->load('back/template','back/dashboard', $data);
    }

}