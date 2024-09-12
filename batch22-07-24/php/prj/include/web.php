<?php
// http://localhost/BATCH_22_JULY_2024/prj/user/dashboard.php

//  server url 
const  server ="http://localhost/";


define("server2",$_SERVER["DOCUMENT_ROOT"]);


const folder = "BATCH_22_JULY_2024/prj/";


const abs_url = server . folder;

const rel_url= server2 . "/".folder;






//  dashboard url for user 
const DASHBOARD = abs_url ."user/dashboard.php";
const EDIT_FORM= abs_url ."user/edit.php";


// form action urls for form to server 
const insert_form_action =abs_url ."action/form_action.php";
const update_form_action =abs_url ."action/form_action.php";
const delete_form_action =abs_url ."action/form_action.php";


const signup_form_action =abs_url ."action/auth/signup.php";
const login_form_action =abs_url ."action/auth/login.php";

// login user
const LOGIN = abs_url ."user/auth/login.php";
const SIGNUP = abs_url ."user/auth/signup.php";
const LOGOUT = abs_url ."user/logout.php";
?>