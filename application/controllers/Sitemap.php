<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sitemap extends CI_Controller
{

  public function index()
  {
    // Set XML header
    header('Content-Type: application/xml; charset=utf-8');

    // Read raw XML file and output it directly
    $sitemap_content = @file_get_contents(APPPATH . 'controllers/sitemap.xml');

    if ($sitemap_content !== false) {
      echo $sitemap_content;
    } else {
      show_404();
    }
    exit;
  }
}
