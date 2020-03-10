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
            $publish = $this->input->post('publish');
            if ($publish == null) {
                $publish = 0; 
            } else {
                $publish = 1;
            }
            $data = [
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'date_created' => date("Y-m-d H:i:s"),
                'publish' => $publish,
                ];
            $this->db->insert('pages',$data);
            $url= $this->input->post('url');
            $title= $this->input->post('title');
            $this->addDirFile($title,$url);
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

    public function addDirFile($title,$url)
    {
                $structure = './application/views/'.$url.'/';
                if (!mkdir($structure, 0777, true)) {
                        die('Gagal membuat folder...');
                }
                $dir_views = "application/views/".$url;
                $file_views_to_write = "index.php";
                $content_views_to_write = 
                '
                        <!-- Header -->
                        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
                        <div class="container-fluid mt--8">
                        <!-- Table -->
                        <div class="row">
                        <div class="col">
                        <div class="card shadow">
                        <h2 class="mb-0 ml-4 mt-4 text-blue text-uppercase d-lg-inline-block" href="#">Halaman '.$title.'</h2>
                                <div class="card-header border-0">
                                
                                </div>
                        </div>
                        </div>
                        </div>
                ';
                $file_views = fopen($dir_views . '/' . $file_views_to_write,"w");
                fwrite($file_views, $content_views_to_write);
                fclose($file_views);
                include $dir_views . '/' . $file_views_to_write;
                $dir = "application/controllers";
                $file_to_write = ucfirst($url).".php";
                $content_to_write = 
                '
                        <?php
                        defined("BASEPATH") OR exit("No direct script access allowed");
                        class'.' '. ucfirst($url). ' '. 'extends CI_Controller 
                        {
                ';
                $content_to_write .= '
                        public function index()
                        {
                        $data["url"] = $this->uri->segment(1);
                        $data["publish_pages"] = $this->db->get_where("pages",["publish" => 1])->result_array();
                        $data["pages"] = $this->db->get("pages")->result_array();
                        $data["title"] = "'.$title.'";
                        $this->load->view("layout/sidebar.php",$data);
                        $this->load->view("layout/topbar.php");
                        $this->load->view("'. $url.'/index.php",$data);
                        $this->load->view("layout/footer.php");
                        }
                ';
                $content_to_write .= '}';
                $file = fopen($dir . '/' . $file_to_write,"w");
                fwrite($file, $content_to_write);
                fclose($file);
                include $dir . '/' . $file_to_write;
    }        
}
