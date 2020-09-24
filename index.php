<?php
require_once('include/mysqli_connect.php');
require_once('include/trimscape.php');
header('content-type:application/json');

$actionName = htmlvalidation($_GET["actionName"]);

//http://127.0.0.1/crud-rest-api/index.php?actionName=selectPost
//OU 
//http://127.0.0.1/crud-rest-api/index?actionName=selectPost
if($actionName == "selectPost"){
	$seachKey = htmlvalidation(isset($_GET["id"]) ? $_GET["id"] : '');
 
	if(!empty($seachKey))
		$query = "SELECT * FROM cliente where id ={$seachKey}";
	else
		$query = "SELECT * FROM  cliente ORDER BY id DESC";
	$result = mysqli_query($con, $query);

	$rowCount = mysqli_num_rows($result);

	if($rowCount > 0){
		$postData = array();
	    while($row = mysqli_fetch_assoc($result)){
	    	$postData[] = $row;
	    }
	    $resultData = array('status' => true, 'postData' => $postData);
    }else{
    	$resultData = array('status' => false, 'message' => 'No Post(s) Found...');
    }

    echo json_encode($resultData);
}

//URL para teste:
//http://127.0.0.1/crud-rest-api/index.php?actionName=insertPost&postName=carlos&cpf=879879&end=rua%20almirante&email=karla@gmail.com
if($actionName == "insertPost"){

	$postName = htmlvalidation(isset($_GET["postName"]) ? $_GET["postName"] : '');
	$postCpf  = htmlvalidation(isset($_GET["cpf"]) ? $_GET["cpf"] : '');
	$postEnd  = htmlvalidation(isset($_GET["end"]) ? $_GET["end"] : '');
	$postEmail= htmlvalidation(isset($_GET["email"]) ? $_GET["email"] : '');

	if(!empty($postName) && !empty($postCpf) && !empty($postEnd) && !empty($postEmail)  ){
		$query = "INSERT INTO cliente(nome, cpf, endereco, email) VALUES('$postName', '$postCpf','$postEnd','$postEmail')";
		$result = mysqli_query($con, $query);
		if($result){
		    $resultData = array('status' => true, 'message' => 'New Post Inserted Successfully...');
	    }else{
	    	$resultData = array('status' => false, 'message' => 'Can\'t able to insert new post...');
	    }
	}else{
    	$resultData = array('status' => false, 'message' => '(insert)Please enter post details...');
    }

    echo json_encode($resultData);
}

//http://127.0.0.1/crud-rest-api/index.php?actionName=updatePost&postName=maria01&cpf=99987745&end=rua%20almirante&email=maria@gmail.com&id=63
if($actionName == "updatePost"){

	$postId   = htmlvalidation(isset($_GET["id"]) ? $_GET["id"] : '');
	$postName = htmlvalidation(isset($_GET["postName"]) ? $_GET["postName"] : '');
	$postCpf  = htmlvalidation(isset($_GET["cpf"]) ? $_GET["cpf"] : '');
	$postEnd  = htmlvalidation(isset($_GET["end"]) ? $_GET["end"] : '');
	$postEmail= htmlvalidation(isset($_GET["email"]) ? $_GET["email"] : '');	
	
	if(!empty($postName) && !empty($postCpf)  && !empty($postEnd) && !empty($postEmail)  ){
		$query = "UPDATE cliente SET nome='$postName', cpf='$postCpf', endereco ='$postEnd' , email ='$postEmail'  WHERE id=$postId";
	
		$result = mysqli_query($con, $query);
		if($result){
		    $resultData = array('status' => true, 'message' => 'Post Updated Successfully...');
	    }else{
	    	$resultData = array('status' => false, 'message' => 'Can\'t able to update a post details...');
	    }
	}else{
    	$resultData = array('status' => false, 'message' => '(update)Please enter post details...');
    }

    echo json_encode($resultData);
}

if($actionName == "deletePost"){

	$postId   = htmlvalidation(isset($_GET["postId"]) ? $_GET["postId"] : '');
	
	if(!empty($postId)){
		$query = "DELETE FROM cliente WHERE id=$postId";
		$result = mysqli_query($con, $query);
		if($result){
		    $resultData = array('status' => true, 'message' => 'Post Deleted Successfully...');
	    }else{
	    	$resultData = array('status' => false, 'message' => 'Can\'t able to delete a post details...');
	    }
	}
	else{
    	$resultData = array('status' => false, 'message' => 'Please enter post details...');
    }

    echo json_encode($resultData);
}

?>
