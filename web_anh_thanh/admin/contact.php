<?php
include ("header.php");
//ini_set('display_errors',0);
if (!empty($_SESSION['username'])) {
    ?>
    <div class="main-content">
        <h1>Chỉnh sửa liên hệ</h1>
        <div id="content-box">
      <?php			
			
            if (isset($_GET['action']) && $_GET['action'] == 'add') {
			
				$update=mysqli_query($con,"update contact set content='".$_POST['content']."' where id = 1 ");
				?>
			<div class = "container">Cập nhật thành công</div>
            
				
            <?php }
	
			else
			 {  
				
				$result=mysqli_query($con,"select content from contact where id =1");
				
			?>
               
                <form id="product-form" method="POST" action="contact.php?action=add" enctype="multipart/form-data">
                    <input type="submit" title="Lưu sản phẩm" value="" />
                    <div class="wrap-field">
                        <label>Nội dung: </label>
                        <textarea name="content" id="product-content"><?php
							while($row = mysqli_fetch_array($result))
							  {   
							  echo  $row['content'];
							  echo "<br>";
							  }	
						?></textarea>
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