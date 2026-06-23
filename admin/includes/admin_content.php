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

            // $resultSet = User::findAllUsers();
            // while($row = mysqli_fetch_array($resultSet)) {
            //     echo $row['username'] . "<br>";
            // }


            // $result = User::findUserById(2);
            // $user = User::instantiation($result);
            // echo $user->username;


            // $users = User::findAllUsers();

            // foreach ($users as $user) {
            //     echo $user->username . "<br>";
            // }


            $foundUser = User::findUserById(1);
            echo $foundUser->username;

            ?>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->