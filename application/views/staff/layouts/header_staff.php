<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php
		if($this->session->has_userdata('dashboard')) {
			echo 'Dashboard';
		} else {
			echo 'Login';
		}
	 ?></title>
	<link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>public/css/font-awesome.min.css">
	 <!-- Plugin CSS -->
    <link href="<?= base_url() ?>public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/buttons.dataTables.min.css"/ > -->

    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>public/css/sb-admin.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/jquery.datetimepicker.min.css"/ >
