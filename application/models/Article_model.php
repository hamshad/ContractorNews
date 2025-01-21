<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Article (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Article_model extends CI_Model
{
    
    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     */
    function addArticleData($data)
    {
        $this->db->trans_start();
        $this->db->insert('contractor_article', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addArticleimage($data)
    {
        //echo '<pre>'; print_r($data); die;
        $this->db->trans_start();
        $this->db->insert('contractor_article_images', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function getCategory()
    {
        $this->db->select("id,category_name");
        $this->db->from('contractor_category');
        $query = $this->db->get();
        return $query->result();
    }
    
    function getArticleList()
    {
        $this->db->select('ca.id,title, section, small_description, contractor_cat_id, ca.published_date, image_name, image_url');
        $this->db->from('contractor_article as ca');
        $this->db->join('contractor_article_images as ci', 'ci.article_id=ca.id', 'left');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $result =  $query->result();
        
        if(!empty($result)){
            foreach($result as $key => $value){
                //echo '<pre>';print_r($value);die;
                // $explode = explode(",", $value->contractor_cat_id);
                $sql = "SELECT category_name FROM contractor_category WHERE id IN (".$value->contractor_cat_id.")";
                $query = $this->db->query($sql);
                $category_name = $query->result();
                
                $finalArr[$key]['article_data'] = $value;
                $finalArr[$key]['categories'] = $category_name;
            }
            // echo '<pre>';print_r($finalArr);die;
            return $finalArr;
        }
        
    }
    
    function getAllStates()
    {
        $this->db->select('*');
        $this->db->from('event_states');
        $this->db->order_by('state_name');
        $query = $this->db->get();
        return $query->result();
    }
    
    
    function deleteArticle($id)
    {
        $this->db->delete('contractor_article', array('id' => $id));
    }
    
    function getArticleById($id){
        $this->db->select("ca.*, es.state_name, es.id");
        $this->db->from('contractor_article as ca');
        $this->db->join('event_states as es', 'es.id = ca.location', 'left');
        $this->db->where('ca.id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    
    
    function getImagesByArticleId($id){
        $this->db->select("*");
        $this->db->from('contractor_article_images');
        $this->db->where('article_id',$id);
        $query = $this->db->get();
        return $query->result();
    }
    
    function updateArticleData($data,$id){
        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('contractor_article', $data);
        $this->db->trans_complete();
        return true;
    }
    
    function deleteImagesById($id)
    {
        $this->db->delete('contractor_article_images', array('article_id' => $id));
    }
    
    function updateStatus($id,$status)
    {
        $data = array('status'=>$status);
        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('contractor_article', $data);
        $this->db->trans_complete();
        return true;
    }
    
    
    function getContactList()
    {
        $this->db->select('*');
        $this->db->from('contractor_contact');
        $query = $this->db->get();
        return $query->result();
    }
    
    function getSubscriberList()
    {
        $this->db->select('*');
        $this->db->from('contractor_subscriber');
        $query = $this->db->get();
        return $query->result();
    }
    
    function deletesubscriber($id)
    {
        $this->db->delete('contractor_subscriber', array('id' => $id));
    }
    
    function getcategoriesName($id){
        $finalArr = [];
        $query = $this->db->query("SELECT f.id,f.category_name FROM contractor_article AS p INNER JOIN contractor_category AS f ON FIND_IN_SET(f.id,p.contractor_cat_id) WHERE p.id = $id");
        $data = $query->result_array();
        
        $finalArr = array_map (function($value){
            return $value['id'];
        } , $data);
        
        return $finalArr;
    }
    
}
