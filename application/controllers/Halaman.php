<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {

	public function index()
	{
		$data['title'] = "Pengelola Halaman";
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/topbar');
        $this->load->view('halaman/index',$data);
        $this->load->view('layout/footer');
	}
}
