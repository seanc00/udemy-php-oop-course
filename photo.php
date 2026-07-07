<?php
    require_once("admin/includes/init.php");

    if (empty($_GET['id'])) {
        redirect("/");
    }

    $photo = Photo::findById($_GET['id']);

    if (isset($_POST['submit'])) {
        // echo "Comment submission works";

        $author = trim($_POST['author']);
        $body = trim($_POST['body']);

        $new_comment = Comment::create_comment($photo->id, $author, $body);

        if ($new_comment && $new_comment->save()) {
            redirect("photo.php?id={$photo->id}");
        } else {
            $message = "There was some problems saving";
        }
    } else {
        $author = "";
        $body = "";
    }

    $comments = Comment::find_the_comments($photo->id);
?>

<?php include("includes/header.php"); ?>

<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8"></div>

            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>Blog Post Title</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Image -->
                <img src="<?= "/admin/images/" . $photo->filename; ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php foreach ($comments as $comment): 
                    $day = random_int(1,31);
                    $month = random_int(1,12);
                    $year = random_int(1900,2026);
                ?>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img style="width: 32px; height: 32px;" class="media-object" src="/admin/images/placeholder.webp" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?= $comment->author ?? ''; ?>
                                <small><?= $day . "/" . $month . "/" . $year; ?></small>
                            </h4>
                            <?= $comment->body ?? ''; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
    <?php include("includes/sidebar.php"); ?>
</div>
<!-- /.row -->

<?php include("includes/footer.php"); ?>