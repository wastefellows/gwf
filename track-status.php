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
    <title>Track Status</title>
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
                        <!--<a class="navbar-brand" href="#"><img class="img-responsive" src="img/Logo.png" alt="Logo"></a>-->
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
            <div class="index-banner">
                <img src="img/Gopuram.png" />
                <div class="logo-banner">
                    <img src="img/Logo.png" />
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="mem-main-wrap">
                    <?php
                    include 'api/db.php';
                    error_reporting(0);
                    $registration_id = $_REQUEST['id'];
                    $select_query = mysqli_query($con,"SELECT * FROM tbl_member_details WHERE registration_id='$registration_id'");
                    while($fetch_query = mysqli_fetch_array($select_query)){
                       $payment_status_string = $fetch_query['payment_status']== 0 ? 'Pending':'Approved';
                       echo "
                       <div class='row'> 
                        <div class='col-md-6'> Name </div>
                        <div class='col-md-6'> ".$fetch_query['name']." </div>
                       </div>
                       <div class='row'> 
                        <div class='col-md-6'> Transaction ID </div>
                        <div class='col-md-6'> ".$fetch_query['transaction_id']." </div>
                       </div>
                       <div class='row'> 
                        <div class='col-md-6'> Email Address </div>
                        <div class='col-md-6'> ".$fetch_query['email']." </div>
                       </div>
                       <div class='row'> 
                        <div class='col-md-6'> Phone </div>
                        <div class='col-md-6'> ".$fetch_query['phone']." </div>
                       </div>
                       <div class='row'> 
                        <div class='col-md-6'> Registration Status </div>
                        <div class='col-md-6'> ".$payment_status_string." </div>
                       </div>
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
    </script>

</body>

</html>