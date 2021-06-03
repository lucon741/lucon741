<?php
	require_once 'dbconnect.inc';
		// lay du lieu lien he
		$sql = 'SELECT * FROM contact ';
		$q = $pdo->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		// lay du lieu san pham
		$sql1 = 'SELECT * FROM product ORDER BY name';
		$q1 = $pdo->query($sql1);
		$q1->setFetchMode(PDO::FETCH_ASSOC);
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
					<h3>Danh mục sản phẩm</h3>
					<?php while ($row = $q1->fetch()): ?>
					<li><a href="detail.php?table=product&id=<?=$row['id'] ?>"><?php echo htmlspecialchars($row['name']); ?></a></li>                        
					<?php endwhile; ?>					
				</ul>

			</div>
			
			<div class="content">
					<?php 
					$q = $pdo->query($sql);
					while ($row1 = $q->fetch()): ?>
					<div class="contact">						
						<?php echo ($row1['content']); ?>
						<br>
					</div>
					<?php endwhile; ?>	

				<div class="map">					
					<ul>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.19973248835!2d106.67485181428769!3d10.872407960388962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175282b59dfa96f%3A0x4cbd12384731023a!2zNDU0IEjDoCBIdXkgR2nDoXAsIFRo4bqhbmggTOG7mWMsIFF14bqtbiAxMiwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1622020451418!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>	
					</ul>

				</div>
			</div>	
		</div>		
		<?php include("inc/footer.php")?>
	</div>
</body>
</html>