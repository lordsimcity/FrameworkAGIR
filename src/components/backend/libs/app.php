<?php
$upOne = dirname(__DIR__,1);
require_once $upOne . '/controllers/errorShown.php';
class App{
   function __construct(){
      $upOne = dirname(__DIR__,1);
      // echo "<p>New app</p>";
      //check if the url exists
      $url =isset($_GET['url']) ? $_GET['url']:null;
      $url = rtrim($url, '/');
      $url = explode('/', $url);
      //if url is empty
      if(empty($url[0])){
         $controllerArchive = $upOne . '/controllers/main.php'; 
         require_once $controllerArchive;
         $controller = new Main();
         $controller->loadModel('Main');
         return false;
      }
      //var_dump($url);
      //controller loading options based on the urls
      $controllerArchive = $upOne . '/controllers/' . $url[0] . '.php';
      if ($url[0]=="newModelController" && isset($url[1])==0){  //special for login page except all other pages
         require_once $controllerArchive;
         $controller = new $url[0];
         $controller->defaultView();
         if (isset($url[1])){
            $controller->{$url[1]}();
         }
      } elseif ($url[0]=="myBlogPtController" && isset($url[1])==0) { //for displaying my blogs
         require_once $controllerArchive;
         $controller = new $url[0];
         $controller->defaultView();
         if (isset($url[1])){
            $controller->{$url[1]}();
           // echo '123';
         }
      }elseif($url[0]=="crteBlogController" && isset($url[1])==0){ //creating blog controller
         require_once $controllerArchive;
         $controller = new $url[0];
         $controller->defaultView();
         $controller->loadModel($url[0]);
         //echo "123";
         // if( (isset($url[1]))){
         //     $controller->{$url[1]}();
         // }
      }elseif($url[0]=="homeModlController" && isset($url[1])==0){
         require_once $controllerArchive;
         $controller = new $url[0];
         $controller->loadModel($url[0]);
         $controller->defaultView();
        
      }else{
         if (file_exists($controllerArchive)){
            require_once $controllerArchive;
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            //using the parameters of the array
            $nparam =sizeof($url);
            if($nparam>1){
               if($nparam>2){
                  $param=[]; 
                  for($i=2; $i<$nparam; $i++){
                     array_push($param,$url[$i]);
                  }
                  $controller->{$url[1]}($param);
               }else{
                  $controller->{$url[1]}();
               }
            }else{
               $controller->render();
            }
         }else{
            $controller = new ErrorShown();
         }
      }
      
   }
}
?>