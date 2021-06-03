<?php
	require_once 'dbconnect.inc';
		$sql = "SELECT * FROM ".$_GET['table']." ORDER BY name";
		$q = $pdo->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		$result1= mysqli_query($con, "SELECT * FROM ".$_GET['table']." where id=".$_GET['id']);
		$data = $result1->fetch_assoc();
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html;" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Cửa hàng Thuận Thành</title>
</head>

<body>
	<div id="wrapper">		
		<?php include("inc/header.php") ?>	
		<div id="container">
			<?php include("inc/nav_menu.php") ?>	
			
			<div class="list_items">					
				<ul>
					<h3>
					<?php if($_GET['table']=='product'){
						echo htmlspecialchars("Danh mục sản phẩm");
						}
						else {
						echo htmlspecialchars("Danh mục dịch vụ");
						}
					?>
					</h3>
					<?php while ($row = $q->fetch()): ?>
					<li><a href="detail.php?table=<?=$_GET['table']?>&id=<?=$row['id'] ?>"><?php echo htmlspecialchars($row['name']); ?></a></li>                        
					<?php endwhile; ?>		
				</ul>

			</div>
			<div class="content">
				<div class="detail">					
					<p><img src=".<?= (!empty($data) ? $data['img'] : "") ?>"/></p>
					<h2><?= (!empty($data) ? $data['name'] : "") ?></h4>
					<p><?= (!empty($data) ? $data['content'] : "") ?></p>
				</div>
			</div>		
			
		</div>	
		<div class="clear-both"></div>
		<?php include("inc/footer.php")?>
	</div>
</body>
</html>