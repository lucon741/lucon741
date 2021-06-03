
<?php
include ("header.php");
ini_set('display_errors',0);
if (!empty($_SESSION['username'])) {
    ?>
    <div class="main-content">
        <h1>Thêm sản phẩm</h1>
        <div id="content-box">
      <?php
			
			
            if (isset($_GET['action']) && $_GET['action'] == 'add') {
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
                        $result = mysqli_query($con, "INSERT INTO ".$_SESSION['table']." ( `name`, `img`,`content`, `price`) VALUES ( '" . $_POST['name'] . "','" . $image . "', '" .  $_POST['content'] . "', " . $_POST['price'] . ")");
			
                        if (!$result) {
							
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
            <?php } else { ?>
                <form id="product-form" method="POST" action="?action=add" enctype="multipart/form-data">
                    <input type="submit" title="Lưu sản phẩm" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên sản phẩm: </label>
                        <input type="text" name="name" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá sản phẩm: </label>
                        <input type="text" name="price" value="" />
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
                        <textarea name="content" id="product-content"></textarea>
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