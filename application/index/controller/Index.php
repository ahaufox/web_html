<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
use app\index\model\Seo;

class Index extends Controller
{

    //定义seo三个字段
    public function _initialize()
    {

        $seo=Seo::getByController(CONTROLLER_NAME);
        if(empty($seo)){
            $seo=Seo::getByController('index');
            $title = $seo->title;
            $keywords = $seo->keywords;
            $description = $seo->description;
            $this->assign('keywords', $keywords);
            $this->assign('description', $description);
            $this->assign('title', $title);
        }else {
            $title = $seo->title;
            $keywords = $seo->keywords;
            $description = $seo->description;
            $this->assign('keywords', $keywords);
            $this->assign('description', $description);
            $this->assign('title', $title);
        }
    }

    public function index()
     {
         session::set('name','xxthinkphp');
		 $name = session::get('name');
		 $this->assign('name',$name);


		 return $this->fetch('./index');

     }
}