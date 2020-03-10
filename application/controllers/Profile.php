
                        <?php
                        defined("BASEPATH") OR exit("No direct script access allowed");
                        class Profile extends CI_Controller 
                        {
                
                        public function index()
                        {
                        $data["url"] = $this->uri->segment(1);
                        $data["publish_pages"] = $this->db->get_where("pages",["publish" => 1])->result_array();
                        $data["pages"] = $this->db->get("pages")->result_array();
                        $data["title"] = "Profile";
                        $this->load->view("layout/sidebar.php",$data);
                        $this->load->view("layout/topbar.php");
                        $this->load->view("Profile/index.php",$data);
                        $this->load->view("layout/footer.php");
                        }
                }