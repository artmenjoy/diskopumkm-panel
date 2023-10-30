<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_sliders extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!($this->session->userdata('logged_in'))){
            redirect('login');
        }

        if(!in_array("content-sliders", $this->session->userdata['logged_in']['permissions'])){
            $this->session->set_flashdata('error',"Maaf! Anda tidak punya akses.");
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->load->model('content/table_sliders');
    }

    public function index()
    {
        $title['display']   = "Slider";
        $title['parent']    = "Slider";
        $title['level'][0]  = "Content";
        $title['href'][0]   = "";
        $title['level'][1]  = "Slider";
        $title['href'][1]   = "";

        
        $this->load->view(
            'content/sliders',
            compact(
                'title'
            )
        );
    }

    public function data()
    {
        $sliders = $this->table_sliders->all();
        $no = 1;
        foreach ($sliders as $d) {
            $tbody = array();
            $tbody[] = $no++;
            $photo = base_url('assets/uploads/images/sliders/').$d->image;
            if(is_file(('./assets/uploads/images/sliders/').$d->image)){
                $tbody[] = "<img alt='image' class='mr-3' height='80' alt='Thumbnail image' src='".$photo."'>";
            }else{
                $tbody[] = "<img alt='image' class='mr-3' height='80' alt='Thumbnail image' src='".base_url()."assets/img/news/img10.jpg'>";
            }
            $tbody[] = $d->number;
            $tbody[] = $d->subtitle."<br>".$d->title;
            if($d->link || $d->link != ""){
                $tbody[] = $d->link_title." {".$d->link."}";
            }else{
                $tbody[] = "";
            }

            if($d->status == 0){
                $tbody[] = "<button class='btn btn-light btn-block'>Inactive</button>";
            }else{
                $tbody[] = "<button class='btn btn-success btn-block'>Active</button>";
            }
            $aksi = "<button class='btn btn-light row-edit' data-toggle='modal' data-id=".$d->id."><i class='fas fa-pen mr-2'></i> Ubah</button>";
            $aksi .= " <button class='btn btn-warning row-image' id='id' data-toggle='modal' data-id=".$d->id."><i class='fas fa-image mr-2'></i> Ubah Gambar</button>";
            $aksi .= " <button class='btn btn-primary row-delete' id='id' data-toggle='modal' data-id=".$d->id."><i class='fas fa-times mr-2'></i> Hapus</button>";
            $tbody[] = $aksi;
            $data[] = $tbody; 
        }

        if ($sliders) {
            echo json_encode(array('data'=> $data));
        }else{
            echo json_encode(array('data'=>0));
        }
    }

    public function create()
    {
        $config['upload_path'] = './assets/uploads/images/sliders';
  		$config['allowed_types'] = 'jpg|jpeg|png|gif';

  		$this->load->library('upload', $config);
  		$this->upload->initialize($config);

  		if($this->upload->do_upload('image')){
  			$size = $this->upload->data('file_size');
  			$name = $this->upload->data('file_name');
  			if ($size < 2048) {
                $uploadedImage = $this->upload->data();
                $this->resizeImage($uploadedImage['file_name']);

                $data['image']   = $name;
            }
  		}

        $data['title']           = $this->input->post('title');
        $data['subtitle']        = $this->input->post('subtitle');
        $data['link']            = $this->input->post('link');
        $data['link_title']      = $this->input->post('link_title');
        $data['number']			 = $this->input->post('number');
        $data['status']          = $this->input->post('status');
        
        $result = $this->table_sliders->add($data);
        echo json_encode($result);
        
    }

    public function get()
    {
        $id['id'] = $this->input->post('id');

        $data = $this->table_sliders->get($id);
        echo json_encode($data);
    }

    public function update()
    {
        $id['id']                = $this->input->post('e_id');
        $data['title']           = $this->input->post('e_title');
        $data['subtitle']        = $this->input->post('e_subtitle');
        $data['link']            = $this->input->post('e_link');
        $data['link_title']      = $this->input->post('e_link_title');
        $data['number']        	 = $this->input->post('e_number');
        $data['status']          = $this->input->post('e_status');

        $result = $this->table_sliders->update($id, $data);
        echo json_encode($result);
    }

    public function update_image()
    {
        $config['upload_path'] = './assets/uploads/images/sliders';
  		$config['allowed_types'] = 'jpg|jpeg|png|gif';

  		$this->load->library('upload', $config);
  		$this->upload->initialize($config);

  		if($this->upload->do_upload('i_image')){
  			$size = $this->upload->data('file_size');
  			$name = $this->upload->data('file_name');
  			if ($size < 2048) {
                $uploadedImage = $this->upload->data();
                $this->resizeImage($uploadedImage['file_name']);

                $id['id']   = $this->input->post("i_id");
                $data['image']   = $name;
                $result = $this->table_sliders->update($id,$data);

                $photo1 = './assets/uploads/images/sliders/'.$this->input->post("i_image_old");
                $photo2 = './assets/uploads/images/sliders/thumbnail/'.$this->input->post("i_image_old");

                if(is_file($photo1)){
                    unlink($photo1);
                }
                if(is_file($photo2)){
                    unlink($photo2);
                }
                echo json_encode($result);
            }
  		}
        
        
    }
    public function delete()
    {
        $id['id'] = $this->input->post('id');
        $detail = $this->table_sliders->get($id);
        $photo1 = './assets/uploads/images/sliders/'.$detail->image;
        $photo2 = './assets/uploads/images/sliders/thumbnail/'.$detail->image;

        if(is_file($photo1)){
            unlink($photo1);
        }
        if(is_file($photo2)){
            unlink($photo2);
        }
        $result = $this->table_sliders->delete($id);
        echo json_encode($result);
    }

    public function resizeImage($filename)
    {
       $source_path = './assets/uploads/images/sliders/' . $filename;
       $target_path = './assets/uploads/images/sliders/thumbnail';
       $config_manip = array(
           'image_library' => 'gd2',
           'source_image' => $source_path,
           'new_image' => $target_path,
           'maintain_ratio' => TRUE,
           'create_thumb' => TRUE,
           'thumb_marker' => '',
           'width' => 150,
           'height' => 150
       );
 
 
       $this->load->library('image_lib', $config_manip);
       if (!$this->image_lib->resize()) {
           echo $this->image_lib->display_errors();
       }
 
 
       $this->image_lib->clear();
    }

}
