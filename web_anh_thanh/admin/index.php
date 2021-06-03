<?php
session_start();
unset ($_SESSION['username']);
unset ($_SESSION['loginadmin']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng nhập Quản trị</title>
</head>
<body>
<h3 class="tbltitle">Quản trị Admin</h3>
<?php 
	$u="";
if(isset($_POST['Submit']))
{
	if(strlen($_POST['txtuser'])>0)
	{
		$u=$_POST['txtuser'];
	}
	else
	{
		?>
			<script language="javascript">
			window.alert("Bạn chưa nhập Username");
			</script>
		<?php
	}
	if(strlen($_POST['txtpass'])>0)
	{
		$p=$_POST['txtpass'];
	}
	else
	{
		?>
			<script language="javascript">
			window.alert("Bạn chưa nhập password");
			</script>
		<?php
	}
}
	if($u&&$p)
	{
		require("../dbconnect.inc");
		$sql= "select username from account where (username='$u' && password=MD5('$p'))";
		$q = $pdo->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		if($row = $q->fetch()==0)
		{
		?>
			<script language="javascript">
			window.alert("Sai thông tin tài khoản quản trị");
			</script>
		<?php
		}
		else
		{
			?>
			<script language="javascript">
			window.alert("Đăng nhập thành công");
			window.location="admin_page.php"
			</script>
		<?php
			$_SESSION['username']= $u;
			$_SESSION['loginadmin']=TRUE;
			exit();
			
		}
	}
		


?>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="302" border="1">
      <tr>
        <td width="124">Tên đăng nhập</td>
        <td width="162"><label>
          <input type="text" name="txtuser" />
        </label></td>
      </tr>
      <tr>
        <td>Mật Khẩu</td>
        <td><input type="password" name="txtpass" /></td>
      </tr>
      <tr>
        <td colspan="2"><label>
          <input type="submit" class="button-red muatiep"  name="Submit" value="Đăng nhập" />
        </label></td>
      </tr>
      </table>
  </div>
</form>

</body>
</html>
