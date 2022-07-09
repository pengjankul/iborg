<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hackcomp
 * Date: 10/9/2556
 * Time: 15:19 น.
 * To change this template use File | Settings | File Templates.
 */

class Managefolder {

    public function getRootPath(){
        $str="";
        $str=str_replace("index.php","",$_SERVER['SCRIPT_FILENAME']);
        $str=str_replace("index.html","",$str);
        return $str;
//        if(!empty($_SERVER['DOCUMENT_ROOT'])){
//            $_SERVER['DOCUMENT_ROOT']=rtrim($_SERVER['DOCUMENT_ROOT']);
//            if(substr($_SERVER['DOCUMENT_ROOT'],strlen($_SERVER['DOCUMENT_ROOT'])-1,1)!="/"){
//                $_SERVER['DOCUMENT_ROOT'].="/";
//            }
//        }
//        return $_SERVER['DOCUMENT_ROOT'];
    }

    // ไม่ต้องส่ง ROOTPATH มา
    public function createfolder($_path=""){
        $rootPath=$this->getRootPath();

        $folderPath="";
        if(!empty($_path)){
            $tmp=explode("/",$_path);
            foreach($tmp as $val){
                if(!empty($val)){
                    $folderPath.=$val."/";
                    if(!is_dir($rootPath.$folderPath)){
                        @mkdir($rootPath.$folderPath, 0777);
                    }
                }
            }
        }
    }

    // ไม่ต้องส่ง ROOTPATH มา
    public function removefolder($_path=""){
        $rootPath=$this->getRootPath();

        if(!empty($_path)){
            if(is_dir($rootPath.$_path)){
                @rmdir($rootPath.$_path);
            }
        }
    }
}