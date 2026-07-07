<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Dashboard
            </h1>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">4</div>
                            <div>New Views</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span> 
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-photo fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">7</div>
                            <div>Photos</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Total Photos in Gallery</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">8

                            </div>

                            <div>Users</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Total Users</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">8</div>
                            <div>Comments</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Total Comments</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        </div>
            <?php 
                // =============================
                // USERS - CREATE USER ADD TO DB
                // $user = new User();
                
                // $user->username = "New user";
                // $user->password = "password";
                // $user->first_name = "SOL";
                // $user->last_name = "Solo";
                
                // $user->create();
                // $user->save();
                // =============================



                // =============================
                // USERS - HOW TO UPDATE USER
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
                // USERS - HOW TO DELETE USER
                // if(User::findUserById(17)) {
                //     $user = User::findUserById(17);
                //     $user->delete();
                // }
                // =============================



                // =============================
                // USERS - USING SAVE METHOD TO UPDATE NAME/PASSWORD
                // $user = User::findUserById(17);

                // $user->password = "password";

                // $user->save();

                // USING SAVE METHOD TO CREATE USER
                // $user = new User();

                // $user->username = "WHATEVER2000";

                // $user->save();
                // =============================



                // =============================
                // USERS - FIND AND ECHO USER INFO TO ADMIN DASHBOARD
                // $foundUser = User::findById(3);
                // echo $foundUser->username;
                // =============================



                // =============================
                // USERS - FIND ALL
                // $users = User::findAll();
                
                // foreach($users as $user) {
                //     echo $user->username . "<br>";
                // }
                // =============================



                // =============================
                // FIND ALL - PHOTOS
                // $photos = Photo::findAll();
                
                // foreach($photos as $photo) {
                //     echo $photo->title . "<br>";
                // }
                // =============================



                // =============================
                // USERS - CREATE USER ADD TO DB
                // $photo = new Photo();
                
                // $photo->title = "Sun Roof";
                // $photo->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
                // $photo->filename = "sunroof.png";
                // $photo->type = "image";
                // $photo->size = 20;
                
                // $photo->create();
                // =============================
            ?>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>

</div>
<!-- /.container-fluid -->