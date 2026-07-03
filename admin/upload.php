<?php
    include("includes/header.php"); 

    if (!$session->isSignedIn()) {
        redirect("login.php");
    }

    $message = "";
    $photo = "";

    if (isset($_POST['submit'])) {
        $photo = new Photo();
        $photo->title = $_POST['title'];
        $photo->set_file($_FILES['file_upload']);
        
        if ($photo->save()) {
            $message = "Photo uploaded successfully";
        } else {
            $message = join("<br>", $photo->errors);
        }
    }

?>



<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php include(__DIR__ . "/includes/topbar_nav.php"); ?>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include(__DIR__ . "/includes/sidebar_nav.php"); ?>

</nav>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    📁 Upload
                </h1>

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Upload
                    </li>
                </ol>

                <div class="col-md-6">
                    <?= $message ?? ''; ?>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="file" name="file_upload">
                        </div>

                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>