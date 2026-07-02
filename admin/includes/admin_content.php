<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Dashboard
            </h1>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
            </ol>

            <?php 

            // =============================
            // CREATE USER ADD TO DB
            // $user = new User();
            
            // $user->username = "seanc02";
            // $user->password = "password";
            // $user->first_name = "Sean";
            // $user->last_name = "Connolly";
            
            // $user->create();
            // =============================
            
            // =============================
            //HOW TO UPDATE USER
            $user = User::findUserById(16);
            $user->last_name = "TONY";
            $user->update();
            // =============================
            
            
            // =============================
            //FIND AND ECHO USER INFO TO ADMIN DASHBOARD
            // $foundUser = User::findUserById(1);
            // echo $foundUser->username;
            // =============================

            ?>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->