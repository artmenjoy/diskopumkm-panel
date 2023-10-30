<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_announcement extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!($this->session->userdata('logged_in'))){
            redirect('login');
        }

        if(!in_array("content-announcement", $this->session->userdata['logged_in']['permissions'])){
            $this->session->set_flashdata('error',"Maaf! Anda tidak punya akses.");
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->load->model('content/table_announcement');
    }

    public function index()
    {
        $title['display']   = "Pengumuman";
        $title['parent']    = "Pengumuman";
        $title['level'][0]  = "Konten";
        $title['href'][0]   = "";
        $title['level'][1]  = "Pengumuman";
        $title['href'][1]   = "";

        $this->load->view(
            'content/announcement',
            compact(
                'title'
            )
        );
    }

    public function data()
    {
        $post = $this->table_announcement->all();
        $no = 1;
        foreach ($post as $d) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $d->title;

            $photo = base_url('assets/uploads/images/announcement/').$d->image;
            if(is_file(('./assets/uploads/images/announcement/').$d->image)){
                $tbody[] = "<img alt='image' class='mr-3' height='80' alt='Thumbnail image' src='".$photo."'>";
            }else{
                $tbody[] = "<img alt='image' class='mr-3' height='80' alt='Thumbnail image' src='".base_url()."assets/img/news/img10.jpg'>";
            }

            if($d->status == 0){
                $tbody[] = "<button class='btn btn-light btn-block row-activate' id='id' data-toggle='modal' data-id=".$d->id.">Inactive</button>";
            }else{
                $tbody[] = "<button class='btn btn-success btn-block row-inactivate' id='id' data-toggle='modal'>Active</button>";
            }

            if($d->website && $d->website != ""){
				$tbody[] = "<a href='".$d->website."' target='_blank'>".substr($d->website,0,20)."...</a>";
            }else{
                $tbody[] = "";
            }
			$tbody[] = date("Y-m-d H:i:s",($d->created))." WITA";

            $aksi = "<button class='btn btn-light row-edit' data-toggle='modal' data-id=".$d->id."><i class='fas fa-pen mr-2'></i> Ubah</button>";
            $aksi .= " <button class='btn btn-warning row-image' id='id' data-toggle='modal' data-id=".$d->id."><i class='fas fa-image mr-2'></i> Ubah Gambar</button>";
            $aksi .= " <button class='btn btn-primary row-delete' id='id' data-toggle='modal' data-id=".$d->id."><i class='fas fa-times mr-2'></i> Hapus</button>";
            $tbody[] = $aksi;
            $data[] = $tbody; 
        }

        if ($post) {
            echo json_encode(array('data'=> $data));
        }else{
            echo json_encode(array('data'=>0));
        }
    }

    public function create()
    {
        $config['upload_path'] = './assets/uploads/images/announcement';
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

        $data['title']              = $this->input->post('title');
        $data['description']        = $this->input->post('description');
        $data['status']             = 0;
        $data['website']           	= $this->input->post('website');
        $data['created']           	= time();
        
        $result = $this->table_announcement->add($data);
        echo json_encode($result);
        
    }

    public function get()
    {
        $id['id'] = $this->input->post('id');

        $data = $this->table_announcement->get($id);
        echo json_encode($data);
    }

    public function update()
    {
        $id['id']                   = $this->input->post('e_id');
        $data['title']              = $this->input->post('e_title');
        $data['description']        = $this->input->post('e_description');
        $data['website']        	= $this->input->post('e_website');

        $result = $this->table_announcement->update($id, $data);
        echo json_encode($result);
    }

    public function update_image()
    {
        $config['upload_path'] = './assets/uploads/images/announcement';
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
                $result = $this->table_announcement->update($id,$data);

                $photo1 = './assets/uploads/images/announcement/'.$this->input->post("i_image_old");
                $photo2 = './assets/uploads/images/announcement/thumbnail/'.$this->input->post("i_image_old");

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
        $result = $this->table_announcement->delete($id);
        echo json_encode($result);
    }

    public function resizeImage($filename)
    {
       $source_path = './assets/uploads/images/announcement/' . $filename;
       $target_path = './assets/uploads/images/announcement/thumbnail';
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

	public function activate()
	{
		$par1['status']	= 1;
		$par2['status']	= 0;
        $this->table_announcement->update($par1, $par2);
		
		$id['id']		= $this->input->post('id');
		$data['status']	= 1;
        $result = $this->table_announcement->update($id, $data);
        echo json_encode($result);

	}

	public function inactivate()
	{
		$par1['status']	= 1;
		$par2['status']	= 0;
        $result = $this->table_announcement->update($par1, $par2);
        echo json_encode($result);

	}

}
