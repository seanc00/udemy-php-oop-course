<?php 

include("includes/header.php"); 

if(!$session->isSignedIn()) {
    redirect("login.php");
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
    <?php include(__DIR__ . "/includes/admin_content.php"); ?>
</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>