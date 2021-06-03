
<?php
include("header.php");
ini_set('display_errors',0);
if (!empty($_SESSION['username'])) {
	$_SESSION['table']=$_GET['table'];
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($con, "SELECT * FROM ".$_GET['table']);
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    $products = mysqli_query($con, "SELECT * FROM ".$_GET['table']." ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    mysqli_close($con);
    ?>
    <div class="main-content">
        <h3><?php if($_SESSION['table']=='product'){
		echo htmlspecialchars("DANH SÁCH SẢN PHẨM");
		}
		else {
		echo htmlspecialchars("DANH SÁCH DỊCH VỤ");
		}
	?></h3>
        <div class="product-items">
            <div class="buttons">
                <a href="./add.php">Thêm</a>
            </div>
            <ul>
                <li class="product-item-heading">
                    <div class="product-prop product-img">Ảnh</div>
                    <div class="product-prop product-name">Tên sản phẩm</div>
                    <div class="product-prop product-button">
                        Xóa
                    </div>
                    <div class="product-prop product-button">
                        Sửa
                    </div>
                    
                    
                    <div class="clear-both"></div>
                </li>
                <?php
                while ($row = mysqli_fetch_array($products)) {
                    ?>
                    <li>
						
                        <div class="product-prop product-img"><img src="..<?= $row['img'] ?>" alt="<?= $row['name'] ?>" title="<?= $row['name'] ?>" /></div>
                        <div class="product-prop product-name"><?= $row['name'] ?></div>
                        <div class="product-prop product-button">
                            <a href="./delete.php?id=<?= $row['id'] ?>">Xóa</a>
                        </div>
                        <div class="product-prop product-button">
                            <a href="./edit.php?id=<?= $row['id'] ?>">Sửa</a>
                        </div>
                        
                        
                        <div class="clear-both"></div>
                    </li>
                <?php } ?>
            </ul>
            <?php
            include './pagination.php';
            ?>
            <div class="clear-both"></div>
        </div>
    </div>
    <?php
}
	include 'footer.php';
	
?>