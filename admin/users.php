<?php 

    include("includes/header.php");

    if (!$session->isSignedIn()) {
        redirect("login.php");
    }

    $users = User::findAll();

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
                    👬 Users
                </h1>

                <a style="margin-bottom: 16px;" href="add_user.php" class="btn btn-primary">Add User</a>

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> users
                    </li>
                </ol>

                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?= $user->id ?? ''; ?></td>
                                    <td><img style="width: 64px; height: 64px;" src="<?= $user->image_path_and_placeholder() ?? ''; ?>" alt="Placeholder" style="width: 200px; height: 100%; object-fit: cover;"></td>
                                    <td><?= $user->username ?? ''; ?>
                                        <div class="action_links">
                                            <a href="/admin/delete_user.php?id=<?= $user->id ?? ''; ?>">Delete</a>
                                            <a href="/admin/edit_user.php?id=<?= $user->id ?? ''; ?>">Edit</a>
                                        </div>
                                    </td>
                                    <td><?= $user->first_name ?? ''; ?></td>
                                    <td><?= $user->last_name ?? ''; ?></td>
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