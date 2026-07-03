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
            $user = new User();
            
            $user->username = "Student";
            $user->password = "password";
            $user->first_name = "SOL";
            $user->last_name = "Solo";
            
            $user->create();
            // =============================
            

            // =============================
            //HOW TO UPDATE USER
            // if (User::findUserById(18)) {
            //     $user = User::findUserById(18);
            //     $user->username = "TONY";
            //     $user->password = "TONY";
            //     $user->first_name = "TONY";
            //     $user->last_name = "TONY";

            //     $user->update();
            // }
            // =============================


            // =============================
            //HOW TO DELETE USER
            // if(User::findUserById(17)) {
            //     $user = User::findUserById(17);
            //     $user->deleteUser();
            // }
            // =============================


            // =============================
            //USING SAVE METHOD TO UPDATE NAME/PASSWORD
            // $user = User::findUserById(17);

            // $user->password = "password";

            // $user->save();

            // USING SAVE METHOD TO CREATE USER
            // $user = new User();

            // $user->username = "WHATEVER2000";

            // $user->save();
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