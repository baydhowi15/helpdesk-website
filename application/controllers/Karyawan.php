<?php  

class Karyawan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

	public function index(){
        
        // library pagination

         $this->load->library('pagination');

        $config['base_url']     = 'http://localhost/helpdesk/karyawan/index';
        $config['total_row']    = $this->M_karyawan->countAllKaryawan();
        $config['per_page']     = 5;

        //intialize
        $this->pagination->initialize($config);

        $data['start']          = $this->uri->segment(3);

		$data['karyawan'] = $this->M_karyawan->getkaryawan($config['per_page'], $data['start']);
		$this->template->load('back/template','back/karyawan/data_karyawan', $data);
	}

	function add_karyawan(){
		$data['jabatan'] = $this->M_jabatan->get_jabatan();
		$data['divisi'] = $this->M_divisi->get_divisi();

		$this->template->load('back/template','back/karyawan/form_karyawan', $data);
	}

	function save_karyawan(){
		$this->form_validation->set_rules('nip','Nip','trim|is_unique[users.nip]|required');
		$this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('email','Email','valid_email|is_unique[users.email]|required');
        $this->form_validation->set_rules('divisi','Divisi','trim|required');
        $this->form_validation->set_rules('jabatan','Jabatan','trim|required');
        $this->form_validation->set_rules('password','Password','trim|min_length[5]|required');
        $this->form_validation->set_rules('confirm_password','Confirm Password','trim|matches[password]|required');

        $this->form_validation->set_message('required','{field} Harus Terisi');
        $this->form_validation->set_message('valid_email','{field} Anda Harus Benar');
        $this->form_validation->set_message('min_length','{field} Harus 5 Karakter');
        $this->form_validation->set_message('matches','{field} Harus Sama');


        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

        if ($this->form_validation->run() == TRUE){
            $data = array(
            	'nip' => $this->input->post('nip'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'divisi' => $this->input->post('divisi'),
                'jabatan' => $this->input->post('jabatan'),
                'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT),
                'level_user' => 1,
                'status_user' => 1,
                
            );
            // var_dump($data);

            $this->M_karyawan->insert($data);
            $this->session->set_flashdata('message','<div class="alert alert-info">Data Berhasil di Simpan</div>');
            redirect('karyawan','refresh');

        } else{
            $this->add_karyawan();

        }
	}

    function edit_karyawan($id){
        $this->form_validation->set_rules('nip','Nip','trim|is_unique[users.nip]|required');
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('email','Email','valid_email|is_unique[users.email]|required');
        $this->form_validation->set_rules('divisi','Divisi','trim|required');
        $this->form_validation->set_rules('jabatan','Jabatan','trim|required');
        $this->form_validation->set_rules('password','Password','trim|min_length[5]|required');
        $this->form_validation->set_rules('confirm_password','Confirm Password','trim|matches[password]|required');

        $this->form_validation->set_message('required','{field} Harus Terisi');
        $this->form_validation->set_message('valid_email','{field} Anda Harus Benar');
        $this->form_validation->set_message('min_length','{field} Harus 5 Karakter');
        $this->form_validation->set_message('matches','{field} Harus Sama');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

        $data['users'] = $this->M_karyawan->get_id_users($id);
        if($data['users']){
            $data['jabatan'] = $this->M_jabatan->get_jabatan();
            $data['divisi'] = $this->M_divisi->get_divisi();
            $this->template->load('back/template','back/karyawan/edit_karyawan', $data);
        } else{
            $this->session->set_flashdata('message','<div class="alert alert-danger">Data Tidak Ada </div>');
            redirect('karyawan','refresh');
        }
    }

    function update_karyawan(){
       
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('email','Email','valid_email|is_unique[users.email]|required');

        $this->form_validation->set_message('required','{field} Harus Terisi');
        $this->form_validation->set_message('valid_email','{field} Anda Harus Benar');
        

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

        if ($this->form_validation->run() == TRUE){
            $data = array(
                'nip' => $this->input->post('nip'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'divisi' => $this->input->post('divisi'),
                'jabatan' => $this->input->post('jabatan'),
                'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT),
                'status_user' => $this->input->post('status_user'),
                'level_user' => $this->input->post('level_user'),
               
                
            );
            // var_dump($data);
 
            $this->M_karyawan->update($this->input->post('id_users'),$data);
            $this->session->set_flashdata('message','<div class="alert alert-info">Data Berhasil di Ubah</div>');
            redirect('karyawan','refresh');

        } else{
            $this->add_karyawan();

        }
    }

    function delete_karyawan($id)
    {
        $delete = $this->M_karyawan->get_id_users($id);

        if($delete){
            $this->M_karyawan->delete($id);
            $this->session->set_flashdata('message','<div class="alert alert-danger">Data Berhasil Di Hapus </div>');
            redirect('karyawan','refresh');
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger">Data Tidak Ada </div>');
            redirect('karyawan','refresh');
        }
    }

    function profile($id)
    {
        $data['karyawan'] = $this->M_karyawan->get_id_karyawan($id);

        if($data['karyawan']){
            $data['title'] = 'Profile User';
            $data['jabatan'] = $this->M_jabatan->get_jabatan();
            $data['divisi'] = $this->M_divisi->get_divisi();
            $this->template->load('back/template','back/profile', $data);
        } else {
            redirect('dashboard','refresh');
        }
    }

    function update_profile()
    {
        $this->form_validation->set_rules('username','Username','trim|required');

        $this->form_validation->set_message('required','{field} Harus Terisi');
        $this->form_validation->set_message('valid_email','{field} Anda Harus Benar');
        

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

        if ($this->form_validation->run() == TRUE){
            $data = array(
                'nip' => $this->input->post('nip'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'divisi' => $this->input->post('divisi'),
                'jabatan' => $this->input->post('jabatan'),
                // 'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT),
                // 'status_user' => $this->input->post('status_user'),
                // 'level_user' => $this->input->post('level_user'),
               
                
            );
            // var_dump($data);
 
            $this->M_karyawan->update($this->input->post('id_users'),$data);
            $this->session->set_flashdata('message','<div class="alert alert-info">Data Berhasil di Ubah</div>');
            redirect('karyawan/profile/' . $this->session->id_users);

        } else{
            $this->add_karyawan();

        }
    }
}

?>