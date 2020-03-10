<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {

    public function index()
    {
        $this->form_validation->set_rules('title','Title','required',[
                'required' =>"Judul Halaman tidak boleh kosong!"
        ]);
        $this->form_validation->set_rules('url','Url','required',[
                'required' =>"Nama Controller tidak boleh kosong!"
        ]);
        $this->form_validation->set_rules('icon','Icon','required',[
                'required' =>"Ikon Menu Halaman tidak boleh kosong!"
        ]);

        if ($this->form_validation->run() == false) {

            $data['publish_pages'] = $this->db->get_where('pages',['publish' => 1])->result_array();
            $data['pages'] = $this->db->get('pages')->result_array();
            $data['title'] = "Pengelola Halaman";
            $this->load->view('layout/sidebar',$data);
            $this->load->view('layout/topbar');
            $this->load->view('halaman/index',$data);
            $this->load->view('layout/footer');
        }else {
            $data = [
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'date_created' => date("Y-m-d H:i:s"),
                'publish' => $this->input->post('publish')
                ];
            $this->db->insert('pages',$data);
            $this->session->set_flashdata('message','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Halaman Berhasil ditambahkan</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
            redirect('halaman');
        }
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
