
<?php
include ("header.php");
ini_set('display_errors',0);
if (!empty($_SESSION['username'])) {
    ?>
    <div class="main-content">
        <h1>Sửa sản phẩm</h1>
        <div id="content-box">
      <?php
			
			
            if (isset($_GET['action']) && $_GET['action'] == 'edit') {
                if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['price']) && !empty($_POST['price'])) {
                    $galleryImages = array();
                    if (empty($_POST['name'])) {
                        $error = "Bạn phải nhập tên sản phẩm";
                    } elseif (empty($_POST['price'])) {
                        $error = "Bạn phải nhập giá sản phẩm";
                    } elseif (!empty($_POST['price']) && is_numeric(str_replace('.', '', $_POST['price'])) == false) {
                        $error = "Giá nhập không hợp lệ";
                    }
					
                    if (isset($_FILES['image']) && !empty($_FILES['image']['name'][0])) {
                        $uploadedFiles = $_FILES['image'];
                        $result = uploadFiles($uploadedFiles);
                        if (!empty($result['errors'])) {
                            $error = $result['errors'];
                        } else {
                            $image = $result['path'];
                        }
                    }
                    if (isset($_FILES['gallery']) && !empty($_FILES['gallery']['name'][0])) {
                        $uploadedFiles = $_FILES['gallery'];
                        $result = uploadFiles($uploadedFiles);
                        if (!empty($result['errors'])) {
                            $error = $result['errors'];
                        } else {
                            $galleryImages = $result['uploaded_files'];
                        }
                    }
                    if (!isset($error)) {
						if(!isset($image))
						{$result = mysqli_query($con, "UPDATE `".$_SESSION['table']."` SET `name` = '" . $_POST['name'] . "', `price` = " .  $_POST['price'] . ", `content` = '" . $_POST['content'] . "'	WHERE `id`= ". $_GET['id'] );}
						else{
                        $result = mysqli_query($con, "UPDATE `".$_SESSION['table']."` SET `name` = '" . $_POST['name'] . "',`img` =  '" . $image . "', `price` = " .  $_POST['price'] . ", `content` = '" . $_POST['content'] . "'	WHERE `id`= ". $_GET['id'] );
						}
                        if (!$result) {
							echo mysqli_error($con);
                            $error = "Có lỗi xảy ra trong quá trình thực hiện.";
                        }
//                       
                    }
                } else {
                    $error = "Bạn chưa nhập thông tin sản phẩm.";
                }
                ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Cập nhật thành công" ;?></div>
                    <a href = "listing.php?table=<?=$_SESSION['table']?>">Quay lại danh sách sản phẩm</a>
                </div>
            <?php } else 
			{ 
				
				$result1= mysqli_query($con, "SELECT * FROM ".$_SESSION['table']." where id=".$_GET['id']);
				$old_data = $result1->fetch_assoc();
			?>
                <form id="product-form" method="POST" action="edit.php?action=edit&id=<?= (!empty($old_data) ? $old_data['id'] : "") ?>" enctype="multipart/form-data">
                    <input type="submit" title="Lưu sản phẩm" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên sản phẩm:</label>
                        <input type="text" name="name" value="<?= (!empty($old_data) ? $old_data['name'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá sản phẩm: </label>
                        <input type="text" name="price" value="<?= (!empty($old_data) ? $old_data['price'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ảnh đại diện: </label>
                        <div class="right-wrap-field">
                            <input type="file" name="image" />
                        </div>
                        <div class="clear-both"></div>
                    </div>
                   
                    <div class="wrap-field">
                        <label>Nội dung: </label>
                        <textarea name="content" id="product-content"><?= (!empty($old_data) ? $old_data['content'] : "") ?></textarea>
                        <div class="clear-both"></div>
                    </div>
                </form>
                <div class="clear-both"></div>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('product-content');
                </script>
            <?php } ?>
        </div>
    </div>

    <?php
}
include './footer.php';

?>