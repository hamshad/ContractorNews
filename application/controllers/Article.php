<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Article extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this
            ->load
            ->model('article_model');
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {

    }

    function addArticle()
    {
        $this
            ->load
            ->library('form_validation');
        if(isset($_FILES['articleimage'])){ $files = $_FILES['articleimage'];} else { $files=''; }
        if(isset($_REQUEST['Source'])){ $source = $_REQUEST['Source'];} else { $source=''; }
        
        // echo '<pre>'; print_r($this->session->userdata('name')); die;

        $title = $this
            ->security
            ->xss_clean($this
            ->input
            ->post('title'));
        $description = $this
            ->security
            ->xss_clean($this
            ->input
            ->post('description'));
        $status = $this
            ->security
            ->xss_clean($this
            ->input
            ->post('status'));
            
        $category_id = $this
            ->security
            ->xss_clean($this
            ->input
            ->post('category_id'));
            
        $section = $this
            ->security
            ->xss_clean($this
            ->input
            ->post('section'));
            
        $Video = $this
            ->security
            ->xss_clean($this
            ->input
            ->post('Video'));
        $small_description = $this
            ->security
            ->xss_clean($this
            ->input
            ->post('small_description'));
            
       $location = $this
            ->security
            ->xss_clean($this
            ->input
            ->post('location'));
            
       $alt_tag = $this
            ->security
            ->xss_clean($this
            ->input
            ->post('alt_tag'));
      $meta_title = $this
            ->security
            ->xss_clean($this
            ->input
            ->post('meta_title'));
      $meta_keywords = $this
            ->security
            ->xss_clean($this
            ->input
            ->post('meta_keywords'));
      $meta_descripion = $this
            ->security
            ->xss_clean($this
            ->input
            ->post('meta_descripion'));
            
        $post_by = $this->security->xss_clean($this->input->post('post_by'));
        $published_date = $this->security->xss_clean($this->input->post('published_date'));
        
            if($category_id == ""){
              echo json_encode(["st" => 0, "msg" => "Please Select Category "]);
               return false;
            }
            if($title == ""){
              echo json_encode(["st" => 0, "msg" => "Please Select Title"]);
               return false;
            }
        
        // echo $published_date;die;    
        //$title_url = strtolower(str_replace(' ', '-', $title));
        $date = date('Y-m-d h:i:s');
        $data = array(
            'contractor_cat_id' =>$category_id,
            'section' =>$section,
            'location'=>$location,
            'video_url' =>$Video,
            'title' => $title,
            'description' => $description,
            'post_by' => $post_by,
            'small_description'=>$small_description,
            'alt_tag'=>$alt_tag,
            'meta_title'=>$meta_title,
            'meta_keywords'=>$meta_keywords,
            'meta_descripion'=>$meta_descripion,
            'published_date'=>$published_date,
            'status' => $status,
            'created_at'=>$date
        );
       
        //echo '<pre>';print_r($data);die;
        if (!empty($files))
        {
            if (count($files['name']) < 6)
            {
                $err_upload = array();
                for ($i = 0;$i < count($_FILES['articleimage']);$i++)
                {

                    if (!empty($_FILES['articleimage']['name'][$i]))
                    {

                        $_FILES['files']['name'] = $_FILES['articleimage']['name'][$i];
                        $_FILES['files']['type'] = $_FILES['articleimage']['type'][$i];
                        $_FILES['files']['tmp_name'] = $_FILES['articleimage']['tmp_name'][$i];
                        $_FILES['files']['error'] = $_FILES['articleimage']['error'][$i];
                        $_FILES['files']['size'] = $_FILES['articleimage']['size'][$i];
                        
                        $fileExt = pathinfo($_FILES["articleimage"]["name"][$i], PATHINFO_EXTENSION);
                        
                        
                         if ( $fileExt == 'jpg' || $fileExt == 'jpeg' || $fileExt == 'png')
                            {
                            //   echo "coming jpg"; 

                            }
                           else 
                            {
                                // echo "not comming";
                                $aar = array('msg'=>"All Images must be png,jpeg or jpg format");
                                array_push($err_upload,$aar);

                            }
                            
                            
                            

                    }
                }
                
                // echo '<pre>'; print_r($err_upload); die;
                if(empty($err_upload)){
                    //upload_image
                $result = $this->article_model->addArticleData($data);
                    
                     $this->load->library('upload');
                    for ($i = 0;$i < count($files['name']);$i++)
                    {


                        $_FILES['file']['name'] = $_FILES['articleimage']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['articleimage']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['articleimage']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['articleimage']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['articleimage']['size'][$i];
                        
                        $user_folder = 'assets/images/uploads/'.$result;
                        
                    
                  
                    
                        if(!is_dir($user_folder)){
                         mkdir($user_folder, 0777);
                        }
                        
                        $config['upload_path']       = $user_folder;
                        $config['allowed_types']     = 'gif|jpg|jpeg|png';
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                
                if ($this->upload->do_upload('file'))
                {
                    $data['upload_data'] = $this->upload->data('file_name');
                    $companyLogo = $data['upload_data'];
                    $dataimage[] = array(
                    'image_name' => $companyLogo,
                    'created_at'=>date('Y-m-d'),
                    'article_id'=>$result,
                    'source' =>$source,
                    'image_url'=>$user_folder
                );
                   
                }
                    }
                
                $this->db->insert_batch('contractor_article_images', $dataimage); 
                echo json_encode(["st" => 1, "msg" => "Article Created Successfully"]);
                }
                else {
                    echo json_encode(["st" => 0, "msg" => "All Images Must be png,jpeg or jpg format"]);
                }
            }
                else
                    {
                        echo json_encode(["st" => 0, "msg" => "You have select up to 5 images"]);
                    }

        }
        else {
            $result = $this->article_model->addArticleData($data);
            if(!empty($result)){
                echo json_encode(["st" => 1, "msg" => "Article Updated Successfully"]);
            }
            else {
                echo json_encode(["st" => 0, "msg" => "Article Not Updated "]);
            }
        }
    }
    
    
    function getCategory(){
        $result = $this->article_model->getCategory();
        if(!empty($result)){
            echo json_encode(["st" => 1, "data" => $result]);
        }
        else {
            echo json_encode(["st" => 0, "data" => "category not available"]);
        }
    }
    
    function deletearticle(){
        //echo '<pre>'; print_r($_REQUEST); die;
        $article_id = $this->security->xss_clean($this->input->post('article_id'));
        $result = $this->article_model->deleteArticle($article_id);
        echo json_encode(["st" => 1, "msg" =>"Article deleted Successfully"]);
    }
    
     function deletesubscriber(){
        //echo '<pre>'; print_r($_REQUEST); die;
        $subscriber_id = $this->security->xss_clean($this->input->post('subscriber_id'));
        $result = $this->article_model->deletesubscriber($subscriber_id);
        echo json_encode(["st" => 1, "msg" =>"Subscriber deleted Successfully"]);
    }
    
    function getArticleById(){
        $article_id = $this->security->xss_clean($this->input->post('articleId'));
        $category = $this->article_model->getCategory();
        $state_data = $this->article_model->getAllStates();
        $article = $this->article_model->getArticleById($article_id);
        $selectedcate = $this->article_model->getcategoriesName($article_id);
        $images = $this->article_model->getImagesByArticleId($article_id);
        if(!empty($images)){
            $image_path = $images;
        }
        else {
            $image_path = '';
        }
        if(!empty($article)){
        echo json_encode(["st" => 1, "category" =>$category,"article"=>$article, 'images'=>$image_path ,"selectedcategory"=>$selectedcate, "state_data" => $state_data]);
        }
        else {
           echo json_encode(["st" =>0, "msg"=>"Article Not Exits" ]); 
        }
        
    }
    
    function updateArticleValue(){
        $this->load->library('form_validation');
        $article_id = $this->security->xss_clean($this->input->post('article_id'));
        $title = $this->security->xss_clean($this->input->post('title'));
        $description = $this->security->xss_clean($this->input->post('description'));
        $category_id = $this->security->xss_clean($this->input->post('category_id'));
        $section = $this->security->xss_clean($this->input->post('section'));
        $Video = $this->security->xss_clean($this->input->post('Video'));
        $small_description = $this->security->xss_clean($this->input->post('small_description'));
        $location = $this->security->xss_clean($this->input->post('location'));
        $update_post_by = $this->security->xss_clean($this->input->post('update_post_by'));
        $update_published_date = $this->security->xss_clean($this->input->post('update_published_date'));
        $alt_tag = $this->security->xss_clean($this->input->post('alt_tag'));
        $meta_title = $this->security->xss_clean($this->input->post('meta_title'));
        $meta_keywords = $this->security->xss_clean($this->input->post('meta_keywords'));
        $meta_descripion = $this->security->xss_clean($this->input->post('meta_descripion'));
        
        // echo $update_post_by;die;
        
        if(isset($_FILES['articleimage'])){ $files = $_FILES['articleimage'];} else { $files=''; }
        if(isset($_REQUEST['Source'])){ $source = $_REQUEST['Source'];} else { $source=''; }
        
        $data = array(
            'contractor_cat_id' =>$category_id,
            'title' => $title,
            'description' => $description,
            'section' => $section,
            'location'=>$location,
            'small_description' =>$small_description,
            'alt_tag'=>$alt_tag,
            'meta_title'=>$meta_title,
            'meta_keywords'=>$meta_keywords,
            'meta_descripion'=>$meta_descripion,
            'video_url' => $Video,
            'post_by' => $update_post_by,
            'published_date' => $update_published_date
        );
        
        //echo '<pre>'; print_r($data); die;
        
        //echo '<pre>'; print_r($result); die;
        
        if (!empty($files))
        {
            
            
            if (count($files['name']) < 6)
            {
                $err_upload = array();
                for ($i = 0;$i < count($_FILES['articleimage']);$i++)
                {

                    if (!empty($_FILES['articleimage']['name'][$i]))
                    {

                        $_FILES['files']['name'] = $_FILES['articleimage']['name'][$i];
                        $_FILES['files']['type'] = $_FILES['articleimage']['type'][$i];
                        $_FILES['files']['tmp_name'] = $_FILES['articleimage']['tmp_name'][$i];
                        $_FILES['files']['error'] = $_FILES['articleimage']['error'][$i];
                        $_FILES['files']['size'] = $_FILES['articleimage']['size'][$i];
                        
                        $fileExt = pathinfo($_FILES["articleimage"]["name"][$i], PATHINFO_EXTENSION);
                        
                        
                         if ( $fileExt == 'jpg' || $fileExt == 'jpeg' || $fileExt == 'png')
                            {
                            //   echo "coming jpg"; 

                            }
                           else 
                            {
                                // echo "not comming";
                                $aar = array('msg'=>"All Images must be png,jpeg or jpg format");
                                array_push($err_upload,$aar);

                            }

                    }
                }
                
                if(empty($err_upload)){
                    $image = $this->article_model->deleteImagesById($article_id);
                    $result = $this->article_model->updateArticleData($data,$article_id);
                    
                     $this->load->library('upload');
                    for ($i = 0;$i < count($files['name']);$i++)
                    {


                        $_FILES['file']['name'] = $_FILES['articleimage']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['articleimage']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['articleimage']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['articleimage']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['articleimage']['size'][$i];
                        
                        $user_folder = 'assets/images/uploads/'.$article_id;
                        
                    
                  
                    
                        if(!is_dir($user_folder)){
                         mkdir($user_folder, 0777);
                        }
                        
                        $config['upload_path']       = $user_folder;
                        $config['allowed_types']     = 'gif|jpg|jpeg|png';
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                
                if ($this->upload->do_upload('file'))
                {
                    $data['upload_data'] = $this->upload->data('file_name');
                    $companyLogo = $data['upload_data'];
                    $dataimage[] = array(
                    'image_name' => $companyLogo,
                    'created_at'=>date('Y-m-d'),
                    'article_id'=>$article_id,
                    'source'=>$source,
                    'image_url'=>$user_folder
                );
                   
                }
                    }
                
                $this->db->insert_batch('contractor_article_images', $dataimage); 
                echo json_encode(["st" => 1, "msg" => "Article Updated Successfully"]);
                }
                else {
                    echo json_encode(["st" => 0, "msg" => "All Images Must be png,jpeg or jpg format"]);
                }
            }
                else
                    {
                        echo json_encode(["st" => 0, "msg" => "You have select up to 5 images"]);
                    }

        }
        else {
            $result = $this->article_model->updateArticleData($data,$article_id);
            if(!empty($result)){
                echo json_encode(["st" => 1, "msg" => "Article Updated Successfully"]);
            }
            else {
                echo json_encode(["st" => 0, "msg" => "Article Not Updated "]);
            }
            
        }
    }
    
    
    function updateStatus(){
        $article_id = $this->security->xss_clean($this->input->post('articleId'));
        $status = $this->security->xss_clean($this->input->post('status'));
        $result = $this->article_model->updateStatus($article_id,$status);
        
        if(!empty($result)){
            echo json_encode(["st" => 1, "msg" => "Status Updated Successfully"]);
        }
        else {
            echo json_encode(["st" => 0, "msg" => "Status Not Updated"]);
        }
        
    }
    
    
}

