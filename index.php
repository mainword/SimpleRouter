<?php
include_once(dirname(__FILE__) . '/util/SimpleRouter.php');
include_once(dirname(__FILE__) . '/util/Actions.php');

use \mainword\util\SimpleRouter;
use \mainword\util\Actions;


/**
 * set url base string. please set to '' if you don't need base path
 * @var string
 */
$urlBasePath  = '/~mainword/githubs';

//get instance for SimpleRouter class
$router       = new SimpleRouter($urlBasePath);

//get instance for Actions class
$actions      = new Actions();

/**
 * route settings
 *   current setting for url route example :
 *   http://127.0.0.1/githubs/SimpleRouter/index.php/blog/callFunction
 *   http://127.0.0.1/githubs/SimpleRouter/index.php/blog/callClassFunction/10
 *   http://127.0.0.1/githubs/SimpleRouter/index.php/blog/callAnonymousFunction/10/edit
 */
$router->route('/SimpleRouter/index.php/blog/callFunction', config);
$router->route('/SimpleRouter/index.php/blog/callClassFunction/(\d+)', array($actions,'action'));
$router->route('/SimpleRouter/index.php/blog/callAnonymousFunction/(\d+)/(\w+)',
  function($id, $word){
    echo "get blog edit $id, $word";
  });


//run it.
$result = $router->execute($_SERVER['REQUEST_URI']);

//Define the functions what you want.
function config() {
  echo "call config function in index.php";
  return true;
}

