<?php
/**
 * App Core Class
 * Creates URL and loads core controller
 * URL FORMAT - /controller/methods/params
 */
class Core 
{
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct() 
  {
      $url = $this->getUrl();

      // Look into controller for controller (first value)
      if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
        // If exists, set as current controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);
      }

      // Require the controller
      require_once '../app/controllers/' . $this->currentController . '.php';

      // Instaniate the controller class
      $this->currentController = new $this->currentController;

      // Check for second part of URL
      if(isset($url[1])) {
        // Check to see if method exists in controller
        if(method_exists($this->currentController, $url[1])) {
          // Set the currentmethod 
          $this->currentMethod = $url[1];
          // Unset 1 Index
          unset($url[1]);
        }
      }

      // Get params
      // array_values() returns all the values from the array and indexes the array numerically.
      $this->params = $url ? array_values($url) : [];

      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  // Get the current url
  public function getUrl() 
  {
      if(isset($_GET['url'])) {
        // Remove ending slash
        $url = rtrim($_GET['url'], '/');
        // Sanitize
        $url = filter_var($url, FILTER_SANITIZE_URL);
        // Break it into an array
        $url = explode('/', $url);
        return $url;
      } 
  }
}