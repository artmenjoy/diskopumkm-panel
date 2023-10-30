<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_service extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!($this->session->userdata('logged_in'))){
            redirect('login');
        }

        if(!in_array("content-service", $this->session->userdata['logged_in']['permissions'])){
            $this->session->set_flashdata('error',"Maaf! Anda tidak punya akses.");
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->load->model('content/table_service');
    }

    public function index()
    {
        $title['display']   = "Layanan";
        $title['parent']    = "Layanan";
        $title['level'][0]  = "Konten";
        $title['href'][0]   = "";
        $title['level'][1]  = "Layanan";
        $title['href'][1]   = "";

        $this->load->view(
            'content/service',
            compact(
                'title'
            )
        );
    }

    public function data()
    {
        $data = $this->table_service->all();
        $no =1;
        foreach ($data as $d) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $d->title;

			$photo = base_url('assets/uploads/images/service/').$d->thumbnail;
            if(is_file(('./assets/uploads/images/service/').$d->thumbnail)){
                $tbody[] = "<img alt='image' class='mr-3' height='50' alt='Thumbnail image' src='".$photo."'>";
            }else{
                $tbody[] = "<img alt='image' class='mr-3' height='50' alt='Thumbnail image' src='".base_url()."assets/img/news/img10.jpg'>";
            }
			
            $tbody[] = $d->start." - ".$d->end;
            $tbody[] = number_format($d->view);
            $tbody[] = date("Y-m-d H:i:s",$d->edited);
            if($d->status == 0){
                $tbody[] = "<button class='btn btn-light btn-block'>Draft</button>";
            }else{
                $tbody[] = "<button class='btn btn-success btn-block'>Publish</button>";
            }
            $aksi = "<button class='btn btn-light row-edit' data-toggle='modal' data-id=".$d->id."><i class='fas fa-pen mr-2'></i> Ubah</button>";
            $aksi .= " <button class='btn btn-warning row-image' id='id' data-toggle='modal' data-id=".$d->id."><i class='fas fa-image mr-2'></i> Ubah Foto</button>";
            $aksi .= " <button class='btn btn-primary row-delete' id='id' data-toggle='modal' data-id=".$d->id."><i class='fas fa-times mr-2'></i> Hapus</button>";
            $tbody[] = $aksi;
            $table[] = $tbody; 
        }

        if ($data) {
            echo json_encode(array('data'=> $table));
        }else{
            echo json_encode(array('data'=>0));
        }
    }

    public function create()
    {
        $config['upload_path'] = './assets/uploads/images/service';
  		$config['allowed_types'] = 'jpg|jpeg|png|gif';

  		$this->load->library('upload', $config);
  		$this->upload->initialize($config);

  		if($this->upload->do_upload('thumbnail')){
  			$size = $this->upload->data('file_size');
  			$name = $this->upload->data('file_name');
  			if ($size < 2048) {
                $uploadedImage = $this->upload->data();
                $this->resizeImage($uploadedImage['file_name']);

                $data['thumbnail']   = $name;
            }
  		}

        $data['title']  		= $this->input->post('title');
        $data['slug']			= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('title'))));
        $data['content']  		= $this->input->post('content');
        $data['start']  		= $this->input->post('start');
        $data['end']  			= $this->input->post('end');
        $data['contact']  		= $this->input->post('contact');
        $data['website']  		= $this->input->post('website');
        $data['status']  		= $this->input->post('status');
        $data['view']  			= 0;
        $data['edited']  		= time();
		$result = $this->table_service->add($data);
		echo json_encode($result);
        
    }

    public function get()
    {
        $id['id'] = $this->input->post('id');

        $data = $this->table_service->get($id);
        echo json_encode($data);
    }

    public function update()
    {
        $id['id']  				= $this->input->post('e_id');
        $data['title']  		= $this->input->post('e_title');
        $data['slug']			= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('e_title'))));
        $data['content']  		= $this->input->post('e_content');
        $data['start']  		= $this->input->post('e_start');
        $data['end']  			= $this->input->post('e_end');
        $data['contact']  		= $this->input->post('e_contact');
        $data['website']  		= $this->input->post('e_website');
        $data['status']  		= $this->input->post('e_status');
        $data['edited']  		= time();
		
		$result = $this->table_service->update($id, $data);
		echo json_encode($result);
    }

    public function update_image()
    {
        $config['upload_path'] = './assets/uploads/images/service';
  		$config['allowed_types'] = 'jpg|jpeg|png|gif';

  		$this->load->library('upload', $config);
  		$this->upload->initialize($config);

  		if($this->upload->do_upload('i_thumbnail')){
  			$size = $this->upload->data('file_size');
  			$name = $this->upload->data('file_name');
  			if ($size < 2048) {
                $uploadedImage = $this->upload->data();
                $this->resizeImage($uploadedImage['file_name']);

                $id['id']   = $this->input->post("i_id");
                $data['thumbnail']   = $name;
                $result = $this->table_service->update($id,$data);

                $photo1 = './assets/uploads/images/service/'.$this->input->post("i_thumbnail_old");
                $photo2 = './assets/uploads/images/service/thumbnail/'.$this->input->post("i_thumbnail_old");

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
        $result = $this->table_service->delete($id);
        echo json_encode($result);
    }

    public function resizeImage($filename)
    {
       $source_path = './assets/uploads/images/service/' . $filename;
       $target_path = './assets/uploads/images/service/thumbnail';
       $config_manip = array(
           'image_library' => 'gd2',
           'source_image' => $source_path,
           'new_image' => $target_path,
           'contenttain_ratio' => TRUE,
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
