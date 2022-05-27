<?php 
namespace Graph\Classes;
use AltoRouter;

class Router {
    /**
     * @var $autorouter instance of Altorouter
     */
    private $altorouter;
    
    /**
     * initialise instance of Altorouter in var altorouter
     * @param $path directory of file to call if roote not exist errors 404
     * @return void
     */
    public function __construct($path=null)
    {
     $this->altorouter=new AltoRouter();
   
    }
    /**
     * map route with Altorouter method
     * @param $method GET/POST HTTP methods
     * @param $url ex "/",/[*:slug]
     * @param $target controller and method to call if roote find
     * @param $name page name
     * @return sefl
     */
    public function routes(string $method, string $url, string $target, string $name=null){
        $this->altorouter->map($method,$url, $target,$name);

        return $this;
    }
    /**
     * use AltoRouter method to match root and call good controller with params
     * @param $namespace controller namespace 
     * @return void
     */
    public function run(string $namespace){
        $match=$this->altorouter->match();
        if(is_array($match)){
         $target=explode("/",$match["target"]);
         $controller_name=$namespace."\\".ucfirst($target[0]);
         $controller=new $controller_name;
         
         $target=array(
            $controller,
           $target[1]
         );
         $params= $match["params"];
         call_user_func_array($target,$params);
         
        }else{
            
               require VIEW_PATH."Errors/404.php";
              
            
           
        }
    }
}