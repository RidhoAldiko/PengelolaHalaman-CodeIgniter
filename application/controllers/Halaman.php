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
    
    public function changePublish(){
        $is_publish = $this->input->post('is_publish');
        $id = $this->input->post('id');

        if ($is_publish == 1) {
                        $this->db->set('publish',0);
                        $this->db->where('id',$id);
                        $this->db->update('pages');
        } else {
                        $this->db->set('publish',1);
                        $this->db->where('id',$id);
                        $this->db->update('pages');
    }
        if ($is_publish == 1) {
                $this->session->set_flashdata('message','
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Halaman disembunyikan</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>');
        } else{
                $this->session->set_flashdata('message','
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Halaman diterbitkan</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>');
        }
    }
}
