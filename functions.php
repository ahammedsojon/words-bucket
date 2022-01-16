<?php 
include_once "config.php";
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
if(!$connection){
    throw new Exception("cannot connect to database");
}
function getStatusMessage($statusCode=0){
    $status=[
        '0' => '',
        '1'=>'Duplicate Eamil Found',
        '2' => 'Username or Password is empty',
        '3' => 'You\'ve successfully registerd',
        '4' => 'Password didn\'t match',
        '5' => 'Please register first'
    ];
    return $status[$statusCode];
}

function getWords($user_id, $search=null){
    global $connection;
    if($search){
        $query = "SELECT * FROM words WHERE user_id ='{$user_id}' AND word LIKE '%{$search}%' ORDER BY word";
    }else{
        $query = "SELECT * FROM words WHERE user_id ='{$user_id}' ORDER BY word";
    }
  
    $result = mysqli_query($connection,$query);
    $data = [];
    while($_data = mysqli_fetch_assoc($result)){
        array_push($data, $_data);
    }
    return $data;
}