<?php include_once 'include_admin/header.php' ?>
	<?php include_once 'include_admin/nav.php' ?>
		
	<?php include_once 'include_admin/side_bar.php' ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Posts</li>
        </ol>
    </div><!--/.row-->
		
        <div class="row">
               
                <?php 
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    }else{
                        $source = '';
                    }

                    switch ($source) {
                        case 'item_insert':
                            include_once "include_admin/item_insert.php";
                            break;  
                        case 'edit_post':
                            include_once "include_admin/edit_post.php";                  
                            break; 

                        default;
                        include_once "include_admin/view_all_post.php";               
                    }
                ?>
                </div>								
		
	<?php include_once 'include_admin/footer.php' ?>