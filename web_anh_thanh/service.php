<?php
	require_once 'dbconnect.inc';
		$sql = 'SELECT * FROM service ORDER BY name';
		$q = $pdo->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
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
					<h3>Danh mục dịch vụ</h3>
					<?php while ($row = $q->fetch()): ?>
					<li><a href="detail.php?table=service&id=<?=$row['id'] ?>">
						<?php echo htmlspecialchars($row['name']); ?></a></li>                        
					<?php endwhile; ?>			
				</ul>

			</div>
			<div class="content">
					<?php 
					$q = $pdo->query($sql);
					while ($row1 = $q->fetch()): ?>
				<a href="detail.php?table=service&id=<?=$row1['id'] ?>">	
					<div class="product">
						<div class="product_img"><img src=".<?php echo htmlspecialchars($row1['img']); ?>"></div>
						<p>	<?php echo htmlspecialchars($row1['name']); ?></p>
						<p>	<?php echo htmlspecialchars($row1['price']); ?></p>
					</div>
				</a>
					<?php endwhile; ?>	
			</div>		
			
		</div>		
		<?php include("inc/footer.php")?>
		
		
	</div>
</body>
</html>