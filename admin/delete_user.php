<?php
    include("includes/init.php");

    if (!$session->isSignedIn()) {
        redirect("login.php");
    }

    if (empty($_GET['id'])) {
        redirect("/admin/users.php");
    }

    $user = User::findById($_GET['id']);

    if ($user) {
        $user->delete();
        redirect("/admin/users.php");
    } else {
        redirect("/admin/users.php");
    }
?>