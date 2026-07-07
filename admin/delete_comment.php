<?php
    include("includes/init.php");

    if (!$session->isSignedIn()) {
        redirect("login.php");
    }

    if (empty($_GET['id'])) {
        redirect("/admin/comments.php");
    }

    $comment = Comment::findById($_GET['id']);

    if ($comment) {
        $comment->delete();
        redirect("/admin/comments.php");
    } else {
        redirect("/admin/comments.php");
    }
?>