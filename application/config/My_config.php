<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hackcomp
 * Date: 10/10/2013
 * Time: 22:29 PM
 * To change this template use File | Settings | File Templates.
 */
$config['title']="IRP";
$config['headerName'] = array( 'eas'=>'ระบบควบคุมสิทธิ์ผู้ใช้งาน',
                                'project'=>'ระบบบริหารโครงการ',
                                'inventory'=>'ระบบจัดซื้อจัดจ้าง',
                                'finance'=>'ระบบบัญชีและการเงิน');


$config['application']['th'] = array(   'eas' =>'ระบบควบคุมสิทธิ์ผู้ใช้งาน',
                                        'project'=>'ระบบบริหารโครงการ',
                                        'inventory'=>'ระบบงานพัสดุ',
                                        'finance'=>'ระบบบริหารการเงิน',
                                        'registration'=>'ระบบงานทะเบียน');

$config['permission_table'] = array( 'eas' => 'eas_permission_user',
                                     'project' => 'eas_permission_project',
                                     'inventory'=>'eas_permission_inventory',
                                    'finance'=>'eas_permission_finance',
                                    'registration'=>'eas_permission_registration');

$config['permission']['eas'] = array( 'access' => 'สามารถเข้าใช้ระบบ' ,
                                        'add_org' => 'เพิ่มหน่วยงาน',
                                        'edit_org' => 'แก้ไขข้อมูลหน่วยงาน',
                                        'del_org' => 'ลบหน่วยงาน',
                                        'user_org' => 'จัดการผู้ใช้งานของหน่วยงาน',
                                        'add_user' => 'เพิ่มผู้ใช้งาน',
                                        'edit_user' => 'แก้ไขข้อมูลผู้ใช้งาน',
                                        'del_user' => 'ลบใช้งาน',
                                        'set_permission' => 'กำหนดสิทธิ์ผู้ใช้งาน');

$config['permission']['project'] = array( 'access' => 'สามารถเข้าใช้ระบบ' );

$config['permission']['inventory'] = array( 'access' => 'สามารถเข้าใช้ระบบ' );

$config['permission']['finance'] = array( 'access' => 'สามารถเข้าใช้ระบบ' );

$config['permission']['registration'] = array( 'access' => 'สามารถเข้าใช้ระบบ' );

$config['upload']="uploads/";
$config['tempUploadPath']=$config['upload']."temp/";
$config['sizeImageMinWidth']=400;   // Pixel
$config['sizeFile']=2;  // MB
$config['thumbnail'][0]=512;
$config['thumbnail'][1]=256;
$config['thumbnail'][3]=128;
$config['thumbnail'][5]=64;
$config['thumbnail'][6]=40;

$config['icons']['save']='glyphicon-floppy-disk';
$config['icons']['back']='glyphicon-chevron-left';
$config['icons']['delete']='glyphicon-trash';
$config['icons']['search']='glyphicon-search';
$config['icons']['clear']='glyphicon-remove-circle';
$config['icons']['close']='glyphicon-remove-circle';
$config['icons']['add']='glyphicon-plus';
