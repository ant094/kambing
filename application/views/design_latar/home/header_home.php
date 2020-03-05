<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Untuk Chrome & Opera -->
	<meta name="theme-color" content="#2196f3cc" />
	<!-- Untuk Windows Phone -->
	<!-- <meta name="msapplication-navbutton-color" content="#2196f3cc" /> -->
	<!-- Untuk Safari iOS -->
	<!-- <meta name="apple-mobile-web-app-status-bar-style" content="#2196f3cc" /> -->
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/961bbfbf3f.js" crossorigin="anonymous"></script>
	<style>
		html,
		body {
			max-width: 100%;
			overflow-x: hidden;
		}

		.input-field-with-icon {
			display: inline-block;
			padding: 2em;
			padding-bottom: 0px;
		}

		.input-field-with-icon label {
			color: #333;
			/* Warna: Purple */
			display: block;
			font-size: 12px;
			font-weight: bold;
			letter-spacing: 0.05em;
			margin-bottom: 5px;
		}

		.input-field-with-icon input[type="text"],
		.input-field-with-icon input[type="password"] {
			border: none;
			border-bottom: 1px solid #4dabf5;
			color: #333;
			font-size: 14px;
			margin-bottom: 15px;
			margin-left: 10px;
			padding: 0.5em 1em 0.5em 0;
		}

		.input-field-with-icon input[type="text"]:focus,
		.input-field-with-icon input[type="password"]:focus {
			border-bottom: 1px solid #FFFFFF;
			outline: none;
		}

		.input-field-with-icon .icon {
			color: #3998B3;
			/* Warna: Blue */
		}

		.input-field-with-icon .icon-envelope:before {
			display: inline-block;
			font-family: "Ionicons";
			content: "\f2eb";
		}

		.input-field-with-icon .icon-lock:before {
			display: inline-block;
			font-family: "Ionicons";
			content: "\f392";
		}

		input#email {
			background: #4dabf5;
			color: #FFFFFF;
			border-bottom: 1px solid #FFFFFF;
		}

		input#password {
			background: #4dabf5;
			color: #FFFFFF;
		}

		.hijau {
			color: #FFFFFF;
			background-color: #008005;
			border-color: #008005;
		}

		.merah {
			color: #FFFFFF;
			background-color: #de1528;
			border-color: #de1528;
		}

		.validasi {
			color: red;
		}

		.box {
			width: 300px;
			height: 80px;
			background-color: pink;
			border: 2px solid black;
		}

		.danger {
			border: 1px solid #dc354585;
			background: linen;
		}

		.sukses {
			border: 1px solid #28a745b8;
			background: #28a7452b;
		}

		.dasar {
			border: 1px solid #6c757d9e;
			background: #6c757d1a;
		}

		.radius {
			border-bottom-right-radius: 10px;
			border-bottom-left-radius: 10px;
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
		}

		.border-success {
			border: 1px solid var(--success);
		}
	</style>
</head>

<body class="">
