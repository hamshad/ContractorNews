<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Home extends BaseController
{
  /**
   * This is default constructor of the class
   */
  public function __construct()
  {
    parent::__construct();
    $this->load->library("pagination");
    $this->load->model('home_model');
  }

  /**
   * This function used to load the first screen of the user
   */
  public function index()
  {
    $allActiveCoverStroyArticles = $this->home_model->getAllActiceCategoryUploadData();
    $allActiveArticles = $this->home_model->getAllActicleArticleData();
    $allActiveUpdateArticles = $this->home_model->getAllActicleUpdateeArticleData();
    $allActiveEventData = $this->home_model->getAllEventsForCalendarHome();
    $this->load->view('includes/header_web');
    $this->load->view('home', ["allActiveCoverStroyArticles" => $allActiveCoverStroyArticles, "allActiveArticles" => $allActiveArticles, "allActiveUpdateArticles" => $allActiveUpdateArticles, "allEventData" => $allActiveEventData]);
    $this->load->view('includes/footer_web');
  }

  public function addContact()
  {
    $name = $this->security->xss_clean($this->input->post('name'));
    $email = $this->security->xss_clean($this->input->post('email'));
    $phone = $this->security->xss_clean($this->input->post('phone'));
    $type = $this->security->xss_clean($this->input->post('type'));
    $description = $this->security->xss_clean($this->input->post('description'));
    $date = date("Y-m-d");

    $data = array(
      'name' => $name,
      'email' => $email,
      'phone' => $phone,
      'type' => $type,
      'description' => $description,
      'created_at' => $date
    );
    $result = $this->home_model->addContactData($data);
    if (!empty($result)) {
      echo json_encode(["st" => 1, "data" => "Thanks ! We Will Connect You Soon"]);
    } else {
      echo json_encode(["st" => 0, "data" => "category not available"]);
    }
  }


  public function addSubscriber()
  {

    $email = $this->security->xss_clean($this->input->post('email'));
    $date = date("Y-m-d");

    $data = array(
      'email' => $email,
      'created_at' => $date
    );
    $result = $this->home_model->addSubscriber($data);
    if (!empty($result)) {
      echo json_encode(["st" => 1, "data" => "Thanks ! We Will Connect You Soon"]);
    } else {
      echo json_encode(["st" => 0, "data" => "Something Went available"]);
    }
  }

  public function loadSearchPage()
  {

    $getData = $this->security->xss_clean($this->input->get());

    $config = array();
    $config["base_url"] = base_url() . "search/";
    $config["total_rows"] = $this->home_model->get_count($getData);
    $config["per_page"] = 10;
    $config['reuse_query_string'] = true;

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
    $data["links"] = $this->pagination->create_links();
    $data['student'] = $this->home_model->get_Search_Articles($config["per_page"], $page, $getData);

    $data['search_data'] = !empty($getData) ? $getData : "";
    $this->load->view('includes/header_web');
    $this->load->view('search', ["data" => $data]);
    $this->load->view('includes/footer_web');
  }

  public function loadCategoryLandingPage()
  {

    $data = $this->security->xss_clean($this->input->get());
    $category_name = preg_replace('/[-]+/', ' ', $this->uri->segment(2));
    $config = array();
    $config["base_url"] = base_url() . "category/" . $this->uri->segment(2);
    $config["total_rows"] = $this->home_model->get_count($data);
    $config["per_page"] = 10;
    $config["uri_segment"] = 3;

    // echo '<pre>';print_r($config);die;
    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    //echo $page;die;
    $data["links"] = $this->pagination->create_links();

    $data['student'] = $this->home_model->get_articles($config["per_page"], $page, $category_name, $data);
    $data['search_data'] = !empty($data) ? $data : "";
    $this->load->view('includes/header_web');
    $this->load->view('category_landing', ["category_name" => $category_name, "data" => $data, "cat_name" => $this->uri->segment(2)]);
    $this->load->view('includes/footer_web');
  }

  public function loadArticleDetailPage()
  {
    $article_id = $this->uri->segment(1);
    $articleDetailData = $this->home_model->getArticleDetailsByID($article_id);
    $contractor_cat_id = $articleDetailData[0]->contractor_cat_id;
    $section = $articleDetailData[0]->section;
    $getrelateddata = $this->home_model->getRelateddata($article_id, $contractor_cat_id, $section);
    // echo '<pre>';print_r($articleDetailData);die;
    // $this->load->view('includes/header_web');
    $this->load->view('landing', ["article_data" => $articleDetailData, "retaled_data" => $getrelateddata]);
    $this->load->view('includes/footer_web');
  }

  public function loadAllActiveCalendarEvents()
  {
    $event_result = json_encode($this->home_model->getAllEventsForCalendar());
    $this->load->view('includes/header_web');
    $this->load->view('event_calendar', ["event_result" => $event_result]);
    $this->load->view('includes/footer_web');
  }

  public function getEventDataFromEventId()
  {
    $event_id = $this->uri->segment(2);
    $result = $this->home_model->getEventDataFromDatabase($event_id);
    echo json_encode(["st" => 1, "data" => $result]);
  }

  // by jaidev

  public function feed()
  {
    $result = $this->home_model->getallfeed();
    // echo "<pre>";print_r($result);

    $web_url = base_url();

    $str = "<?xml version='1.0' encoding='UTF-8' ?>";
    $str .= "<rss version='2.0'>";
    $str .= "<channel>";
    $str .= "<title>Contractor News</title>";
    $str .= "<description>" . htmlspecialchars("Business news & in-depth insight for contractors and small and disadvantaged entrepreneurs in public works. In today's fast changing world we report on topics relevant to the construction, small business, and public works community. We aim to inform our readers about pressing issues facing American small businesses, contractors, subcontractors, emergent entrepreneurs, and their employees. We also report on the role of government in public works and in promoting public-private partnerships and outreach efforts. Subscribe for FREE to our weekly newsletter and contact us with any ideas or suggestions.") . "</description>";
    $str .= "<language>en-US</language>";
    $str .= "<link>$web_url</link>";
    $str .= "<block>";
    foreach ($result as $row) {
      $title_url_rel = strtolower(preg_replace('/[ ]+/', '-', $row->title));
      $str .= "<item>";
      $str .= "<title>" . htmlspecialchars($row->title) . "</title>";
      $str .= "<description>" . htmlspecialchars($row->small_description) . "</description>";
      $str .= "<link>" . htmlspecialchars($web_url . $row->id . '/' . $title_url_rel) . "</link>";
      $str .= "</item>";
    }
    $str .= "</block>";
    $str .= "</channel>";
    $str .= "</rss>";
    file_put_contents("rss.xml", $str);
    // echo $str;
    header("Location: rss.xml");
  }

  public function aboutUs()
  {
    $this->load->view('includes/header_web');
    $this->load->view('aboutUs');
    $this->load->view('includes/footer_web');
  }


  public function contactUs()
  {
    $this->load->view('includes/header_web');
    $this->load->view('contactUs');
    $this->load->view('includes/footer_web');
  }
}
