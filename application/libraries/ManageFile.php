<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Top
 * Date: 10/20/16 AD
 * Time: 12:15 PM
 * To change this template use File | Settings | File Templates.
 */
include ("Uploadfile.php");

class ManageFile
{

    private $folder = null;
    private $path = null;
    private $uploadFile;

    public function __construct()
    {
        $this->uploadFile = new uploadfile();
    }

    function setFolder($folderName) {
        $this->folder = $folderName;
        $this->path = $folderName.'/';
    }

    function getFilePath($fileName) {
        return $this->uploadFile->getSourceFilePath().$this->path.$fileName;
    }

    function createFolder( $path ) {
        $rootPath = explode('system',$this->uploadFile->getRootPath());
        $rootPath = $rootPath[0];

        $path = str_replace($rootPath, '', $path);
        $this->uploadFile->createfolder($path);
    }

    function download($fileName) {
        $path = $this->getFilePath($fileName);

        if(is_file($path)){
            return file_get_contents($path);
        } else {
            return '';
        }
    }

    function upload( $fileName, $file ){
        $uploadFile = $this->uploadFile;

        set_time_limit(0);
        $fileName = str_replace(' ','_',$fileName);
        $file_name = date("Ymd")."_".$fileName;
        $path = $uploadFile->getSourceFilePath().$this->path;
        $this->createfolder($path);
        $result = move_uploaded_file($file['tmp_name'], $path.$file_name);
/*        $result = $uploadFile->upload($file_name, $this->folder);
        unlink($uploadFile->getSourceFilePath().$file_name);

        return array( 'error'=>$result['error'],
            'path'=>$result['path'],
            'message'=>$result['message'],
            'test'=>$uploadFile->getSourceFilePath().$file_name
        );*/
        if($result){
            return array( 'error'=>false,
                'path'=>$this->path,
                'fileName'=>$fileName,
                'tmpFileName'=>$file_name,
                'message'=>''
            );
        } else {
            return array( 'error'=>true,
                'path'=>$this->path,
                'fileName'=>$fileName,
                'tmpFileName'=>'',
                'message'=>'"'.$fileName.'"'.' is not a valid upload file.'
            );
        }

    }

    function delete( $fileName ){
        $uploadFile = $this->uploadFile;
        $path = $uploadFile->getSourceFilePath().$this->path;

        if(is_file($path.$fileName)){
            unlink($path.$fileName);
            return array('error'=>false,'path'=>$path,'message'=>'');
        } else {
            return array('error'=>true,'path'=>$path,'message'=>'file not found');
        }
    }
}
