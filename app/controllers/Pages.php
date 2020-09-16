<?php

class Pages extends Controller
{
  public function __construct()
  {
    
  }

  public function index()
  {
    $data = [
      'title' => 'SharePosts',
      'description' => 'Simple social network build on the PHP MVC-Framework'
    ];

    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = [
      'title' => 'About us',
      'description' => 'App to share posts with other users'
    ];
    $this->view('pages/about', $data); 
  }
}