<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_page extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!($this->session->userdata('logged_in'))){
            redirect('login');
        }

        if(!in_array("content-pages", $this->session->userdata['logged_in']['permissions'])){
            $this->session->set_flashdata('error',"Maaf! Anda tidak punya akses.");
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->load->model('content/table_page');
    }

    public function index()
    {
        $title['display']   = "Halaman";
        $title['parent']    = "Halaman";
        $title['level'][0]  = "Konten";
        $title['href'][0]   = "";
        $title['level'][1]  = "Halaman";
        $title['href'][1]   = "";

        
        $this->load->view(
            'content/page',
            compact(
                'title'
            )
        );
    }

    public function data()
    {
        $page = $this->table_page->all();
        $no = 1;
        foreach ($page as $d) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $d->title;
            $tbody[] = $d->parent;
            $tbody[] = number_format($d->view);
            $tbody[] = "<a class='btn btn-light' href='".base_url()."content/page/preview/".$d->id."' target='_blank'><i class='fas fa-eye'></i></a>";
            $tbody[] = date("Y-m-d H:i:s",$d->edited);

            if($d->status == 0){
                $tbody[] = "<button class='btn btn-light btn-block'>Draft</button>";
            }else{
                $tbody[] = "<button class='btn btn-success btn-block'>Publish</button>";
            }
            $aksi = "<button class='btn btn-light row-edit' data-toggle='modal' data-id=".$d->id."><i class='fas fa-pen mr-2'></i> Ubah</button>";
            $aksi .= " <button class='btn btn-primary row-delete' id='id' data-toggle='modal' data-id=".$d->id."><i class='fas fa-times mr-2'></i> Hapus</button>";
            $tbody[] = $aksi;
            $data[] = $tbody; 
        }

        if ($page) {
            echo json_encode(array('data'=> $data));
        }else{
            echo json_encode(array('data'=>0));
        }
    }

    public function create()
    {

        $data['title']              = $this->input->post('title');
        $data['parent']             = $this->input->post('parent');
        $data['slug']               = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('title'))));
        $data['content']            = $this->input->post('content');
        $data['status']             = $this->input->post('status');
        
        $result = $this->table_page->add($data);
        echo json_encode($result);
        
    }

    public function get()
    {
        $id['id'] = $this->input->post('id');
        $data = $this->table_page->get($id);
        echo json_encode($data);
    }

    public function update()
    {
        $id['id']                   = $this->input->post('e_id');
        $data['title']              = $this->input->post('e_title');
        $data['parent']             = $this->input->post('e_parent');
        $data['slug']               = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('e_title'))));
        $data['content']            = $this->input->post('e_content');
        $data['status']             = $this->input->post('e_status');
        $data['edited']             = time();

        $result = $this->table_page->update($id, $data);
        echo json_encode($result);
    }

    public function delete()
    {
        $id['id'] = $this->input->post('id');
        $result = $this->table_page->delete($id);
        echo json_encode($result);
    }

    public function preview($slug)
    {
        $id['slug'] = $slug;
        $page = $this->table_page->get($id);

        $title['display']   = $page->title;
        $title['parent']    = "Page";
        $title['level'][0]  = "content";
        $title['href'][0]   = "";
        $title['level'][1]  = "Page";
        $title['href'][1]   = "content/page";
        $title['level'][2]  = $page->title;
        $title['href'][2]   = "";

        $this->load->view(
            'content/page_preview',
            compact(
                'title',
                'page'
            )
        );
    }

}
