<?php
header("Access-Control-Allow-Origin: https://legalad.com/");   

require APPPATH . 'libraries/REST_Controller.php';
     
class Article extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       date_default_timezone_set('America/Los_Angeles');
       parent::__construct();
       $this->load->model('home_model');
       
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = '')
	{
	 
	 $secret_key = md5(date('Y-m-d').date('l').'tractor_compliance');
     $headerStringValue = $_SERVER['HTTP_X_CUSTOM_HEADER'];

	 if($headerStringValue == $secret_key){
	  
	   $data = array();
	   $data['articlelist'] = $this->home_model->getAllActicleUpdateeArticleData();
       $data['base_url'] = base_url();
        $this->response($data, REST_Controller::HTTP_OK);  
	 }
	 else{
	    
	     $this->response(array('Sorry Invalid Access!'), REST_Controller::HTTP_OK); 
	 }
      
	   
	}
	
     
   
    	
}