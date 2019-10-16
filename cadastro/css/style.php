<?php
	header('content-type: text/css; charset: UTF-8');
?>	
body
{
	margin:0px;
	padding: 0px;
	background: url("back2.jpg")no-repeat;
	webkit-background-size:cover;
	background-size: cover;
	font-family: Tahoma, sans-serif;
}

.form-area
{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 400px;
	height: 500px;
	box-sizing: border-box;
	background:rgba(0,0,0,0,5);
	padding:40px;
}

h2
{
	margin:0px;
	padding:0 0 20px;
	font-wwight: bold;
	color: #00BFFF;
}

.form-area p
{
	margin:0px;
	padding:0px;
	font-weight: bold;
	color: #DAA520;
}

.forn-area input
{
	margin-bottom:20px;
	widht: 100%;
}
.form-area input[type=email],
.form-area input[type=password]
{
	border: none;
	border-bottom: 1px solid #00BFFF;
	outline: none;
	height: 40px;
	color: #DAA520;
	display: 16px;
}