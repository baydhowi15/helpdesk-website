<?php 
class Auth extends CI_Controller{
    public function index()
    {
        $data['judul'] = 'Auth';
    }
    function login(){
        // $data['jabatan'] = $this->M_jabatan->get_jabatan();
        // $data['divisi'] = $this->M_divisi->get_divisi();
        
        $this->load->view('back/login');
    }
    function register()  {
        $data['jabatan'] = $this->M_jabatan->get_jabatan();
        $data['divisi'] = $this->M_divisi->get_divisi();

        $this->load->view('back/register', $data);
    }
    function proses_register(){
        
        $this->form_validation->set_rules('nip','NIP','trim|is_unique[users.email]|required');
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

            $this->M_auth->insert($data);
            $this->session->set_flashdata('message','<div class="alert alert-info">Data Berhasil di Simpan</div>');
            redirect('auth/login','refresh');

        } else{
            $this->load->view('back/register');

        }
    }

    function proses_login(){

        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

         if ($this->form_validation->run() == TRUE){
            $users = $this->M_auth->get_username_user($this->input->post('username'));
            if(!$users){
                $this->session->set_flashdata('message','<div class="alert alert-danger">Username dan Password Anda Salah</div>');
                redirect('auth/login','refresh');
            } else if ($users->status_user == '0') {
                $this->session->set_flashdata('message','<div class="alert alert-danger">User Tidak Aktif, Silahkan Hubungi Admin</div>');
                redirect('auth/login','refresh');
            } elseif (!password_verify($this->input->post('password'), $users->password)) {
                $this->session->set_flashdata('message','<div class="alert alert-danger">Password Anda Salah</div>');
                 //var_dump($users);
                redirect('auth/login','refresh');
            } else {
                $session = array(
                    'id_users'      => $users->id_users,
                    'username'      => $users->username,
                    'email'         => $users->email,
                    'jabatan'       => $users->jabatan,
                    'divisi'        => $users->divisi,
                    'level_user'    => $users->level_user,
                );
                //var_dump($session);
                $this->session->set_userdata($session);
                redirect('dashboard');
            }
         } else {
            $data['title'] ='Login Pages';
            $this->load->view('back/register', $data);

         }
    }

    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('message','<div class="alert alert-danger"> Anda Berhasil Logout</div>');
        redirect('auth/login');
    }

}