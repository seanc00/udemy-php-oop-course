<?php 

    include("includes/header.php");

    if (!$session->isSignedIn()) {
        redirect("login.php");
    }

    if (empty($_GET['id'])) {
        redirect("/admin/photos.php");
    }

    $comments = Comment::find_the_comments($_GET['id']);



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
                    💬 Comments
                </h1>

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="/admin">Admin Dashboard</a>
                    </li>
                    <li class="active">
                        comments
                    </li>
                </ol>

                <div class="col-md-12">
                    <?php if ($comments): ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Body</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($comments as $comment): ?>
                                    <tr>
                                        <td><?= $comment->id ?? ''; ?></td>
                                        <td><?= $comment->author ?? ''; ?>
                                            <div class="action_links">
                                                <a href="/admin/delete_comment_photo.php?id=<?= $comment->id ?? ''; ?>">Delete</a>
                                            </div>
                                        </td>
                                        <td><?= $comment->body ?? ''; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>

                    <?= !$comments ? "<p><strong>There are currently no comments made for this photo.</strong></p>" : ''; ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>