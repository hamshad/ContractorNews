<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
    
    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     */
    function addContactData($data)
    {
        $this->db->trans_start();
        $this->db->insert('contractor_contact', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addSubscriber($data)
    {
        $this->db->trans_start();
        $this->db->insert('contractor_subscriber', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function getAllActiceCategoryUploadData(){
        $this->db->select('art.*, img.image_url, img.image_name');
        $this->db->from('contractor_article as art');
        $this->db->join('contractor_article_images as img', 'img.article_id = art.id');
        $this->db->where('art.status', '1');
        $this->db->where('art.section', 'Cover Story');
        $this->db->order_by('art.published_date', 'desc');
        $query = $this->db->get();
        $result = $query->result();
        
        if(!empty($result)){
            return $result;
        }
    }
    
    public function getAllActicleArticleData(){
        $this->db->select('art.*, img.image_url, img.image_name');
        $this->db->from('contractor_article as art');
        $this->db->join('contractor_article_images as img', 'img.article_id = art.id', 'left');
        $this->db->where('art.status', '1');
        $this->db->where('art.section', 'Article');
        $this->db->order_by('art.published_date', 'desc');
        $this->db->limit(50);
        $query = $this->db->get();
        $result = $query->result();
        
        if(!empty($result)){
            return $result;
        }
    }
    
    public function getAllActicleUpdateeArticleData(){
        $this->db->select('art.*, img.image_url, img.image_name, es.state_short_name');
        $this->db->from('contractor_article as art');
        $this->db->join('contractor_article_images as img', 'img.article_id = art.id', 'left');
        $this->db->join('event_states as es', 'es.id = art.location', 'left');
        $this->db->where('art.status', '1');
        $this->db->where('art.section', 'Update');
        $this->db->order_by('art.published_date', 'desc');
        $this->db->limit(50);
        $query = $this->db->get();
        $result = $query->result();
        
        if(!empty($result)){
            return $result;
        }
    }
    
    public function getAllActiveArticleByCategoryWiseData($category_name){
        $this->db->select('id,category_name');
        $this->db->from('contractor_category');
        $this->db->like('category_name', $category_name);
        $query = $this->db->get();
        $result = $query->result();
        
        if(!empty($result)){
            $this->db->select('art.*, img.image_url, img.image_name');
            $this->db->from('contractor_article as art');
            $this->db->join('contractor_article_images as img', 'img.article_id = art.id', 'left');
            $this->db->like('contractor_cat_id	', $result[0]->id);
            $this->db->where('art.status', '1');
            $query = $this->db->get();
            $data = $query->result();
            
            if(!empty($data)){
                return $data;
            }
        }
    }
    
    public function getArticleDetailsByID($article_id){
        $this->db->select('art.*, img.image_url, img.image_name, img.source');
        $this->db->from('contractor_article as art');
        $this->db->join('contractor_article_images as img', 'img.article_id = art.id', 'left');
        $this->db->where('art.id', $article_id);
        $query = $this->db->get();
        $result = $query->result();
        
        if(!empty($result)){
            // return $result;
            // echo $result[0]->contractor_cat_id;die;
            $sql = "SELECT GROUP_CONCAT(category_name) as category_name FROM contractor_category WHERE id IN (".$result[0]->contractor_cat_id.")";
            $query = $this->db->query($sql);
            $category_name = $query->result();
            
            $finalArr = array_merge($result, $category_name);
            return $finalArr;
            //echo '<pre>';print_r($finalArr);die;
        }
    }
    
    public function getAllEventsForCalendar(){
        $this->db->select("*");
        $this->db->where('event_start_date >=', date('Y-m-d'));
        $this->db->from('compliance_news_event_calendar');
    
        $query = $this->db->get();
        $result = $query->result();
            
        if(!empty($result)){
            foreach($result as $key => $value){
                $finalArr[$key]['groupId'] = $value->id;
                $finalArr[$key]['title'] = $value->event_title;
                $finalArr[$key]['start'] = $value->event_start_date;
                $finalArr[$key]['end'] = $value->event_end_date;
            }
            return $finalArr;
        }
    }
    
    public function getAllEventsForCalendarHome(){
        $this->db->select("ce.*, es.state_name, es.state_short_name");
        $this->db->where('ce.event_start_date >=', date('Y-m-d'));
        $this->db->from('compliance_news_event_calendar as ce');
        $this->db->join('event_states as es', 'es.id = ce.event_location', 'left');
        $this->db->order_by('event_start_date', 'asc');
        $this->db->limit(20);
        $query = $this->db->get();
        $result = $query->result();
            
        if(!empty($result)){
            return $result;
        }
    }
    
    public function getEventDataFromDatabase($event_id){
        $this->db->select("ce.*, es.state_name, es.state_short_name");
        $this->db->where('ce.id', $event_id);
        $this->db->from('compliance_news_event_calendar as ce');
        $this->db->join('event_states as es', 'es.id = ce.event_location', 'left');
        $query = $this->db->get();
        $result = $query->row();
        //echo '<pre>';print_r($result);die;
        return $result;
    }
    
    public function get_count($getData){
        if(!empty($getData)){
            $this->db->select('art.*, img.image_url, img.image_name');
            $this->db->from('contractor_article as art');
            $this->db->join('contractor_article_images as img', 'img.article_id = art.id', 'left');
            //$this->db->like('contractor_cat_id', $result[0]->id);
            if(!empty($getData['title'])){
                $this->db->like('art.title', $getData['title']);
                $this->db->or_like('art.description', $getData['title']);
            } if (!empty($getData['section']) && $getData['section'] != 'Select Section'){
                $this->db->where('art.section', $getData['section']);
            } if (!empty($getData['date'])){
                $this->db->where('art.published_date', $getData['date']);
            } if (!empty($getData['category']) && $getData['category'] != '0'){
                //$this->db->where("art.contractor_cat_id IN (".$getData['category'].")", NULL, false);
                $this->db->where("find_in_set(".$getData['category'].",art.contractor_cat_id)<> 0", NULL, false);
            }
            // $this->db->order_by('art.created_at','desc');
            $query = $this->db->get();
            $data = $query->num_rows();
            
            if(!empty($data)){
                return $data;
            }
        } else{
            $this->db->select('art.*, img.image_url, img.image_name');
            $this->db->from('contractor_article as art');
            $this->db->join('contractor_article_images as img', 'img.article_id = art.id', 'left');
            //$this->db->like('contractor_cat_id	', $result[0]->id);
            $this->db->where('art.status', '1');
            $this->db->order_by('art.created_at','desc');
            $query = $this->db->get();
            $data = $query->num_rows();
            
            if(!empty($data)){
                return $data;
            } 
        }
    }

    public function get_Search_Articles($limit, $start, $getData){
        //echo $limit.'---'.$start;die;
        // echo '<pre>';print_r($getData);
        if(!empty($getData)){
            $this->db->select('art.*, img.image_url, img.image_name');
            $this->db->from('contractor_article as art');
            $this->db->join('contractor_article_images as img', 'img.article_id = art.id', 'left');
            //$this->db->like('contractor_cat_id', $result[0]->id);
            if(!empty($getData['title'])){
                $this->db->like('art.title', $getData['title']);
                $this->db->or_like('art.description', $getData['title']);
            } if (!empty($getData['section']) && $getData['section'] != 'Select Section'){
                $this->db->where('art.section', $getData['section']);
            } if (!empty($getData['date'])){
                $this->db->where('art.published_date', $getData['date']);
            } if (!empty($getData['category']) && $getData['category'] != '0'){
                //$this->db->where("art.contractor_cat_id IN (".$getData['category'].")", NULL, false);
                $this->db->where("find_in_set(".$getData['category'].",art.contractor_cat_id)<> 0", NULL, false);
            }
            $this->db->order_by('art.created_at','desc');
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            $data = $query->result();
            
            if(!empty($data)){
                return $data;
            }
        } else{
            $this->db->select('art.*, img.image_url, img.image_name');
            $this->db->from('contractor_article as art');
            $this->db->join('contractor_article_images as img', 'img.article_id = art.id', 'left');
            //$this->db->like('contractor_cat_id	', $result[0]->id);
            $this->db->where('art.status', '1');
            $this->db->order_by('art.created_at','desc');
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            $data = $query->result();
            
            if(!empty($data)){
                return $data;
            } 
        }
    }
    
    public function get_articles($limit, $start, $category_name, $data){
        // echo '<pre>';print_r($data);die;
        if(!empty($data)){
            $this->db->select('art.*, img.image_url, img.image_name');
            $this->db->from('contractor_article as art');
            $this->db->join('contractor_article_images as img', 'img.article_id = art.id', 'left');
            //$this->db->like('contractor_cat_id', $result[0]->id);
            if(!empty($data['title'])){
                $this->db->like('art.title', $data['title']);
                $this->db->or_like('art.description', $getData['title']);
            } if (!empty($data['section']) && $data['section'] != 'Select Section'){
                $this->db->where('art.section', $data['section']);
            } if (!empty($data['date'])){
                $this->db->where('art.created_at', $data['date']);
            } if (!empty($getData['category']) && $getData['category'] != '0'){
                //$this->db->where("art.contractor_cat_id IN (".$getData['category'].")", NULL, false);
                $this->db->where("find_in_set(".$getData['category'].",art.contractor_cat_id)<> 0", NULL, false);
            }
            // $this->db->order_by('art.created_at','desc');
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            $data = $query->result();
            
            if(!empty($data)){
                return $data;
            }
        } else{
            if(!empty($result)){
                $this->db->select('art.*, img.image_url, img.image_name');
                $this->db->from('contractor_article as art');
                $this->db->join('contractor_article_images as img', 'img.article_id = art.id', 'left');
                $this->db->like('contractor_cat_id	', $data['category']);
                $this->db->where('art.status', '1');
                $this->db->order_by('art.created_at','desc');
                $this->db->limit($limit, $start);
                $query = $this->db->get();
                $data = $query->result();
                
                if(!empty($data)){
                    return $data;
                }
            }   
        }
    }
    
    //   code by jaidev  
    public function getRelateddata($article_id,$contractor_cat_id,$section){
        
        $aary_con = explode(',',$contractor_cat_id);
        $this->db->select('art.*, img.image_url, img.image_name');
        $this->db->from('contractor_article as art');
        $this->db->join('contractor_article_images as img', 'img.article_id = art.id', 'left');
        $i = 1;
        foreach($aary_con as $value){
            if($i == 1){
             $this->db->where("find_in_set($value, art.contractor_cat_id)");
            }else{
             $this->db->or_where("find_in_set($value, art.contractor_cat_id)");   
            }
             $i++;
        }
        $this->db->where('art.status', '1');
        $this->db->where('art.section', $section);
        $this->db->where_not_in('art.id', $article_id);
        $this->db->order_by('art.created_at', 'desc');
        $this->db->limit(20);
         $query = $this->db->get();
       
        $result = $query->result();
        
        if(!empty($result)){
            return $result;
        } 
    }
    
    
    public function getallfeed(){
         $this->db->select("id,title,small_description");
        $this->db->from('contractor_article');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    
}