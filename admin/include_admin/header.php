<?php ob_start(); ?>
<?php include_once '../include/db.php' ?>
<?php include_once 'include_admin/function.php' ?>
<?php session_start(); ?>
<?php 
	if(!isset($_SESSION['user_role'])){
		header('Location:../index.php');
	}
	if(isset($_SESSION['user_role']))
		if($_SESSION['user_role'] == 'customer'){
			header('Location:../index.php');
		}
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Golden Dragon Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles1.css" rel="stylesheet">
<link href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<style type="text/css">
		
	table>a, table th{
	background-color: #30a5ff;
	color: #000;
	}

</style>

</head>

<body>