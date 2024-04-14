<?php  

function cek_login()
{
	$CI = &get_instance();
	$username = $CI->session->username;

	if ($username == Null) {
		$CI->session->set_flashdata('message', '<div class="alert alert-danger">Anda Harus Login!!!</div>');


		redirect('auth/login');
	}
} 

function is_it()
{
	$CI = &get_instance();

	$tipeuser = $CI->session->level_user;

	if ($tipeuser == '2')
	{
		return $tipeuser;
	}

	return null;
}
?>