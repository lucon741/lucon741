<?php session_start(); ?>
<?php
		
		if(!isset($_SESSION['loginadmin'])){
		?>
			<script>
			alert('Bạn không có quyền truy cập trang');
			window.location="../index.php";
			</script>
		<?php	
		}
		?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html;" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/admin_style.css">
<script src="../resources/ckeditor/ckeditor.js"></script>
<title>TRANG QUẢN TRỊ ADMIN</title>
</head>
	
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
        <?php
		require("../dbconnect.inc");
		include '../function.php';
		
        if (!empty($_SESSION['username'])) { //Kiểm tra xem đã đăng nhập chưa?
            ?>
            <div id="admin-heading-panel">
                <div class="container">
                    <div class="left-panel">
                        Xin chào <a href="account_edit.php"><span>Admin</span></a>
						
                    </div>
                    <div class="right-panel">
                        <img height="24" src="../images/home.png" />
                        <a href="../index.php">Trang chủ</a>
                        <img height="24" src="../images/logout.png" />
                        <a href="index.php">Đăng xuất</a>
                    </div>
                </div>
            </div>
            <div id="content-wrapper">
                <div class="container">
                    <div class="left-menu">
                        <div class="menu-heading">Admin Menu</div>
                        <div class="menu-items">
                            <ul>
                                <li><a href="contact.php">Liên hệ</a></li>
                                <li><a href="#">Bảng Giá</a></li>
                                <li><a href="listing.php?table=product">Sản phẩm</a></li>
                                <li><a href="listing.php?table=service">Dịch vụ</a></li>
                            </ul>
                        </div>
                    </div>
					
                <?php 
			
		} ?>