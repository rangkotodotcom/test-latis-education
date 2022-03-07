<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function index()
	{
		$this->load->model('Welcome_model', 'Wmodel');

		$data['presensi'] = $this->Wmodel->getPresensi();

		// echo json_encode($data['presensi']);
		// die;

		$this->load->view('presensi', $data);
	}
}
