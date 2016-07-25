<?php
namespace mainword\util;

/**
 * A class provide simple url routing in php
 */
class SimpleRouter {
 /**
   * [$routes description]
   * @var array
   */
  private $routes = array();

  private $base_path = '';
  /**
   * [__construct description]
   */
  public function __construct($base_path = '') {
    $this->routes = array();
    $this->base_path = $base_path;
  }

  /**
   * [__clone description]
   * @return [type] [description]
   */
  private function __clone() {
    ;
  }

  /**
   * [route description]
   * @param  [type] $pattern  [description]
   * @param  [type] $callback [description]
   * @return [type]           [description]
   */
  public function route($pattern, $callback) {
    $pattern = '/^' . str_replace('/', '\/', $this->base_path.$pattern) . '$/';
    $pattern = str_replace('~', '\~', $pattern) ;
    $this->routes[$pattern] = $callback;
  }

  /**
   * [execute description]
   * @param  [type] $url [description]
   * @return [type]      [description]
   */
  public function execute($url) {
    foreach ($this->routes as $pattern => $callback) {
      echo "url:[$url]";
      echo "pattern:[$pattern]";
      if (preg_match($pattern, $url, $params)) {
        array_shift($params);
        return call_user_func_array($callback, array_values($params));
      }
    }
    echo "URL dismatch, URL:[$url]";
    return false;
  }

}



