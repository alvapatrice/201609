<?php
    /**
     * Created by PhpStorm.
     * User: Nostalgie
     * Date: 22-Sep-16
     * Time: 9:29 PM
     */
    include '../include/autoloader.php';
    $data= array("email"=>"nalvapatrice@outlook.com","password"=>"123456");
    new update("users",$data,1,"user_id");

    $data2=array("a_id"=>36,"v_id"=>63,"serial"=>3,"email"=>"mutoni@gmail.com");
    new add($data2,"appointment");