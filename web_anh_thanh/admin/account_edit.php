<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Đổi thông tin thành viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px;
            }
            #edit_user form{
                width: 200px;
                margin: 40px auto;
            }
            #edit_user form input{
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <?php
        
        if (isset($_GET['action']) && $_GET['action'] == 'edit') {
			
            if (isset($_POST['user_name']) && !empty($_POST['user_name']) && isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['new_password']) && !empty($_POST['new_password'])
            ) {
				$u=$_POST['user_name'];
				$op=$_POST['old_password'];
				$np=$_POST['new_password'];
				require('../dbconnect.inc') ;
				$sql1= "select * from account where (username = '$u' && password =md5('$op'))";
				$q1 = $pdo->query($sql1);
				$q1->setFetchMode(PDO::FETCH_ASSOC);
				
                $row1 = $q1->fetch();
                if ($row1 > 0) {
                    $sql2="UPDATE account SET password = MD5('$np'), date=" . time() . " WHERE username ='$u' && password =    md5('$op') ";
				    $q2 = $pdo->query($sql2);
					$q2->setFetchMode(PDO::FETCH_ASSOC);	
					$error = false;
                    if (!$q2) {
                        $error = "Không thể cập nhật tài khoản";
                    }
                } else {
                    $error = "Mật khẩu cũ không đúng.";
                }
              
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h1>Thông báo</h1>
                        <h4><?= $error ?></h4>
                        <a href="./account_edit.php">Đổi lại mật khẩu</a>
                    </div>
                <?php } else { ?>
                    <div id="edit-notify" class="box-content">
                        <h1><?= ($error !== false) ? $error : "Sửa tài khoản thành công" ?></h1>
                        <a href="./index.php">Quay lại tài khoản</a>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div id="edit-notify" class="box-content">
                    <h1>Vui lòng nhập đủ thông tin để sửa tài khoản</h1>
                    <a href="./account_edit.php">Quay lại sửa tài khoản</a>
                </div>
                <?php
            }
        } else {
            session_start();
           
            if (!empty($_SESSION['loginadmin'])) {
                ?>
                <div id="edit_user" class="box-content">
                    <h1>Xin chào <?php echo htmlspecialchars($_SESSION['username']) ; ?>. Bạn đang thay đổi mật khẩu</h1>
                    <form action="./account_edit.php?action=edit" method="Post" autocomplete="off">
                        <input type="hidden" name="user_name" value="<?= $_SESSION['username'] ?>">
                        <label>Password cũ</label></br>
                        <input type="password" name="old_password" value="" /></br>
                        <label>Password mới</label></br>
                        <input type="password" name="new_password" value="" /></br>
                        <br><br>
                        <input type="submit" value="Save" />
						<input type="submit" value="Exit" formaction="admin_page.php" />
                    </form>
                </div>
                <?php
            }
        }
        ?>
    </body>
</html>
