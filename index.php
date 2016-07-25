<?php
include_once(dirname(__FILE__) . '/util/SimpleRouter.php');

use \mainword\util\SimpleRouter;

//set url base string.
$urlBasePath  = '/githubs';

//get instance for SimpleRouter class
$router       = new SimpleRouter($urlBasePath);

//route settings
$router->route('/SimpleRouter/index.php/blog/config', config);
$router->route('/SimpleRouter/index.php/blog/(\d+)/(\w+)',
  function($id, $word){
    echo "get blog edit $id, $word";
  });

//run.
$result = $router->execute($_SERVER['REQUEST_URI']);

//Define the functions what you want.
function config() {
  echo "get config";
  return true;
}















