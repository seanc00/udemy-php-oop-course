<?php 

    include("includes/header.php");

    if (!$session->isSignedIn()) {
        redirect("login.php");
    }

    $photos = Photo::findAll();

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
                    🌇 Photos
                </h1>

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Photos
                    </li>
                </ol>

                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Id</th>
                                <th>Filename</th>
                                <th>Title</th>
                                <th>Size</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($photos as $photo): ?>
                                <tr>
                                    <td>
                                        <img src="<?= $photo->picture_path() ?? ''; ?>" alt="Placeholder" style="width: 200px; height: 100%; object-fit: cover;">
                                        <div class="picture_link">
                                            <a href="/admin/delete_photo.php/?id=<?= $photo->id ?? ''; ?>">Delete</a>
                                            <a href="edit_photo.php">Edit</a>
                                            <a href="">View</a>
                                        </div>
                                    </td>
                                    <td><?= $photo->id ?? ''; ?></td>
                                    <td><?= $photo->filename ?? ''; ?></td>
                                    <td><?= $photo->title ?? ''; ?></td>
                                    <td><?= $photo->size ?? ''; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>