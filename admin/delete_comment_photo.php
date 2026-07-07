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
        redirect("/admin/comment_photo.php?id={$comment->photo_id}");
    } else {
        redirect("/admin/comment_photo.php?id={$comment->photo_id}");
    }
?>