<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {

	public function index()
	{
        $data['publish_pages'] = $this->db->get_where('pages',['publish' => 1])->result_array();
        $data['pages'] = $this->db->get('pages')->result_array();
		$data['title'] = "Pengelola Halaman";
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/topbar');
        $this->load->view('halaman/index',$data);
        $this->load->view('layout/footer');
	}
}
