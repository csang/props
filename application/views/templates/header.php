<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="<? echo base_url();?>css/main.css"/>
<link rel="stylesheet" href="<? echo base_url();?>css/smoothness/jquery-ui-1.10.0.custom.css">
<title>PROPS</title>
</head>
<body>
	<div id="wrap">
        <header>
            <a <? if($_SESSION["user_type_id"] != 1){?>href='../pages/home'<? }?> id="home" alt='Home'></a>
            <a href='../pages/logout' id="logout">Log out</a>
            <div id="headLog"></div>
        </header>
        