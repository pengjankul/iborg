<?php

/**
 * Created by PhpStorm.
 * User: sanitkeawtawan
 * Date: 11/23/15 AD
 * Time: 9:18 PM
 */
class Uploadfile
{
    private $path = '';
    private $dir = 'uploads/';

    public function __construct()
    {
        @$this->path = FCPATH . $this->dir;
    }

    function getRootPath()
    {
        return FCPATH;
    }

    function getSourceFilePath() {
        $uploaddir = explode('system',$this->getRootPath());
        $uploaddir = $uploaddir[0].$this->dir;

        return $uploaddir;
    }

    public function createfolder($_path = "")
    {
//        $rootPath = $this->getRootPath();
        $rootPath = explode('system',$this->getRootPath());
        $rootPath = $rootPath[0];

        $folderPath = "";
        if (!empty($_path)) {
            $tmp = explode("/", $_path);
            foreach ($tmp as $val) {
                if (!empty($val)) {
                    $folderPath .= $val . "/";
                    if (!is_dir($rootPath . $folderPath)) {
                        @mkdir($rootPath .$folderPath, 0777);
                    }
                }
            }
        }
    }

    public function removefolder($_path = "")
    {
        $rootPath = $this->getRootPath();
        if (!empty($_path)) {
            if (is_dir($rootPath . $_path)) {
                @rmdir($rootPath . $_path);
            }
        }
    }
    public function getRandName($prefix=""){
        return $prefix."_".date("YmdHis")."_".rand(100000,999999);
    }
    function genFolder($folder){
         return "{$folder}/".date("Y/m").'/';
    }
    function upload($file,$folder="newfolder"){

        $uploaddir = explode('system',$this->getRootPath());
        $uploaddir = $uploaddir[0];
        $from=$uploaddir.$file;
        if(is_file($from)){
            $arr=explode('/',$file);
            $fname=array_pop($arr);
            $folder=$this->dir.$this->genFolder($folder);
            $this->createfolder($folder);
            $to=$uploaddir.$folder.$fname;
            $path=$folder.$fname;
            @copy($from, $to);
            if(is_file($to)){
                return array('error'=>false,'path'=>$path, 'message'=>'');
            }else{
                return array('error'=>true,'path'=>$file,'message'=>'copy error');
            }
        }else{
            return array('error'=>true,'path'=>$file,'message'=>'file not found');
        }
    }

}