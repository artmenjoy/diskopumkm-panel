<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_post extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!($this->session->userdata('logged_in'))){
            redirect('login');
        }

        if(!in_array("content-post", $this->session->userdata['logged_in']['permissions'])){
            $this->session->set_flashdata('error',"Maaf! Anda tidak punya akses.");
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->load->model('ref/table_settings');
        $this->load->model('ref/table_post_category');
        $this->load->model('content/table_post');
    }

    public function index()
    {
        $title['display']   = "Artikel";
        $title['parent']    = "Artikel";
        $title['level'][0]  = "Konten";
        $title['href'][0]   = "";
        $title['level'][1]  = "Artikel";
        $title['href'][1]   = "";

        $category = $this->table_post_category->all();
        
        $this->load->view(
            'content/post',
            compact(
                'title',
                'category'
            )
        );
    }

    public function data()
    {
        $post = $this->table_post->all();
        $no = 1;
        foreach ($post as $d) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $d->date;

			$title_exp = explode(" ", $d->title);
			if(count($title_exp) < 10){
				$tbody[] = $d->title;
			}else{
				$tbody[] = implode(" ", array_splice($title_exp, 0, 10))."...";
			}
			
            $tbody[] = $d->category;

            $photo = base_url('assets/uploads/images/post/').$d->thumbnail;
            if(is_file(('./assets/uploads/images/post/').$d->thumbnail)){
                $tbody[] = "<img alt='image' class='mr-3' height='50' alt='Thumbnail image' src='".$photo."'>";
            }else{
                $tbody[] = "<img alt='image' class='mr-3' height='50' alt='Thumbnail image' src='".base_url()."assets/img/news/img10.jpg'>";
            }
            $tbody[] = number_format($d->view);

            if($d->status == 0){
                $tbody[] = "<button class='btn btn-light btn-block'>Draft</button>";
            }else{
                $tbody[] = "<button class='btn btn-success btn-block'>Publish</button>";
            }
            $tbody[] = "<a class='btn btn-light' href='".base_url()."content/post/preview/".$d->id."' target='_blank'><i class='fas fa-eye'></i></a>";

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
        $config['upload_path'] = './assets/uploads/images/post';
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

        $data['post_category_id']   = $this->input->post('post_category_id');
        $data['title']              = $this->input->post('title');
        $data['slug']               = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('title'))));
        $data['date']               = date("Y-m-d",strtotime($this->input->post('date')));
        $data['datetime']           = time();
        $data['status']             = $this->input->post('status');
        $data['content']            = $this->input->post('content');
        $data['user_id']            = $this->session->userdata('logged_in')['id'];
        
        $result = $this->table_post->add($data);
        echo json_encode($result);
        
    }

    public function get()
    {
        $id['content_post.id'] = $this->input->post('id');

        $data = $this->table_post->get($id);
        echo json_encode($data);
    }

    public function preview($id)
    {
        $param['content_post.id'] = $id;
        $post = $this->table_post->get($param);
		$settings = $this->table_settings->array();
        $this->load->view('content/post_preview', compact('post','settings'));
    }

    public function update()
    {
        $id['id']                   = $this->input->post('id');
        $data['post_category_id']   = $this->input->post('post_category_id');
        $data['title']              = $this->input->post('title');
        $data['slug']               = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('title'))));
        $data['date']               = date("Y-m-d",strtotime($this->input->post('date')));
        $data['status']             = $this->input->post('status');
        $data['content']            = $this->input->post('content');
        $data['user_id']            = $this->session->userdata('logged_in')['id'];
        $data['edited']             = time();

        $result = $this->table_post->update($id, $data);
        echo json_encode($result);
    }

    public function update_image()
    {
        $config['upload_path'] = './assets/uploads/images/post';
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
                $result = $this->table_post->update($id,$data);

                $photo1 = './assets/uploads/images/post/'.$this->input->post("i_thumbnail_old");
                $photo2 = './assets/uploads/images/post/thumbnail/'.$this->input->post("i_thumbnail_old");

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
        $result = $this->table_post->delete($id);
        echo json_encode($result);
    }

    public function resizeImage($filename)
    {
       $source_path = './assets/uploads/images/post/' . $filename;
       $target_path = './assets/uploads/images/post/thumbnail';
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
