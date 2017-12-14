<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Admin Center</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="gwf">
        <header>
            <div class="header">

                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                        <a class="navbar-brand" href="#"><img class="img-responsive" src="img/Logo.png" alt="Logo"></a>
                    </div>
                    <!-- Collection of nav links and other content for toggling -->
                    <div class="container">
                        <div id="navbarCollapse" class="collapse navbar-collapse">

                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="index.html">Home</a></li>
                                <!--                                <li><a href="members.html">Charity</a></li>-->
                                <li><a href="members.html">Members</a></li>

                            </ul>
                            <ul class="nav navbar-nav navbar-right">

                                <li><a href="boardmembers.html">Board Members</a></li>
                                <li><a href="convention.html">Convention 2018</a></li>

                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
        </header>
        <section>
            <div class="container">
                <div class="mem-main-wrap">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        if($username=='admin' && $password=='admin'){
                            setcookie('session', 'true', time() + (86400 * 30), "/"); // 86400 = 1 day
                            header('location:admin-center.php');
                        }
                    }
                    if(isset($_COOKIE['session'])){
                        ?>
                        <div class="row">
                            <div class="pull-right col-md-2">
                                <button class="btn btn-block btn-warning" onclick="logout()">Logout</button>
                            </div>
                        </div>
                        <?php
                        include 'api/db.php';
                        echo "
                            <div>
                                <ul class='nav nav-tabs nav-justified' role='tablist'>
                                    <li role='presentation' class='active'><a href='#home' role='tab' data-toggle='tab'>Pending</a></li>
                                    <li role='presentation'><a href='#profile' aria-controls='profile' role='tab' data-toggle='tab'>Approved</a></li>
                                </ul>

                                <div class='tab-content'>

                        ";
                        $select_query = mysqli_query($con,"SELECT * FROM tbl_member_details WHERE payment_status='0'");
                        echo "
                        <div role='tabpanel' class='tab-pane active' id='home'>
                        <table class='table table-striped'> 
                        <thead> <tr> <th> Name </th> <th> Phone </th> <th> Payment Mode </th> <th> Amount Paid </th> <th> Transaction ID</th> <th> Action </th> </tr> </thead>
                        <tbody>
                        ";
                        if(mysqli_num_rows($select_query)==0){
                            echo "
                            <tr> <td class='text-center' colspan='6'> No records found </td> </tr>
                            ";
                        }
                        else{
                            while($fetch_query = mysqli_fetch_array($select_query)){
                            $byCash = $fetch_query['by_cash'] == 1 ? 'Cash' : 'Online';
                            $payment_status_string = $fetch_query['payment_status']== 0 ? 'Pending':'Approved';
                            echo "
                            <tr> 
                            <td> ".$fetch_query['name']." </td> 
                            <td> ".$fetch_query['phone']." </td>
                            <td> ".$byCash." </td>
                            <td> ".$fetch_query['amount']." </td>
                            <td> ".$fetch_query['transaction_id']." </td>
                            <td> <button class='btn btn-sm btn-success' onclick=askConfirm('". $fetch_query['transaction_id']."','". $fetch_query['registration_id']."')>Approve</button></td>
                            </tr>
                            ";
                            }
                        }
                        
                        echo "</tbody></table>
                            
                            </div>";

                        $select_query = mysqli_query($con,"SELECT * FROM tbl_member_details WHERE payment_status='1'");
                        echo "
                        <div role='tabpanel' class='tab-pane fade' id='profile'>
                        <table class='table table-striped'> 
                        <thead> <tr> <th> Name </th> <th> Phone </th> <th> Payment Mode </th> <th> Amount Paid </th> <th> Transaction ID</th> <th> Status </th> </tr> </thead>
                        <tbody>
                        ";
                        if(mysqli_num_rows($select_query)==0){
                            echo "
                            <tr> <td class='text-center' colspan='6'> No records found </td> </tr>
                            ";
                        }
                        else{
                            while($fetch_query = mysqli_fetch_array($select_query)){
                            $byCash = $fetch_query['by_cash'] == 1 ? 'Cash' : 'Online';
                            echo "
                            <tr> 
                            <td> ".$fetch_query['name']." </td> 
                            <td> ".$fetch_query['phone']." </td>
                            <td> ".$byCash." </td>
                            <td> ".$fetch_query['amount']." </td>
                            <td> ".$fetch_query['transaction_id']." </td>
                            <td> Approved </td>
                            </tr>
                            ";
                            }
                        }
                            
                            echo "</tbody></table></div>
                            
                            </div>";
                    } else {
                        echo "
                            <form class='col-md-4 col-md-offset-4' action='admin-center.php' method='post'>
                                <div class='form-group'>
                                    <label>Username</label>
                                    <input type='text' class='form-control' id='username' name='username' aria-describedby='emailHelp' placeholder='Enter username' required>
                                </div>
                                <div class='form-group'>
                                    <label>Password</label>
                                    <input type='password' class='form-control' id='password' name='password' placeholder='Password' required>
                                </div>
                                <button type='submit' class='btn btn-primary'>Login</button>
                            </form>
                        ";
                    }
                    ?>
                </div>
            </div>
        </section>
        <footer>
            <div class="footer-wrap">
                <div class="container">
                    <p>&copy; Copyright 2017 - 2018 &nbsp; Giants groups of Madurai</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/lightbox.js"></script>
    <script src="js/main.js"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })

        function askConfirm(tid, rid) {
            var response = window.confirm('Are you sure to approve this transaction ' + tid);
            if (response)
                window.location.href="api/admin/member-payment-approval.php?tid=" + tid + "&rid=" + rid;
        }

        function logout() {
            document.cookie = 'session=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            window.location.reload();
        }
    </script>

</body>

</html>