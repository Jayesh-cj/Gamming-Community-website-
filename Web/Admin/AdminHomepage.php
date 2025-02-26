<?php
  include("../Assets/Connection/Connection.php");
  session_start();

  $selCC="SELECT COUNT(*) AS c_count FROM tbl_community";
  $resCC=$con->query($selCC);
  $dataCC=$resCC->fetch_assoc();

  $selU="SELECT COUNT(*) AS u_count FROM tbl_user";
  $resU=$con->query($selU);
  $dataU=$resU->fetch_assoc();

  $selC="SELECT COUNT(*) AS com_count FROM tbl_complaint WHERE complaint_status=0";
  $resC=$con->query($selC);
  $dataC=$resC->fetch_assoc();

  $selFB="SELECT COUNT(*) AS fb_count FROM tbl_feedback";
  $resFB=$con->query($selFB);
  $dataFB=$resFB->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../Assets/Templates/Admin/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <!-- Libraries Stylesheet -->
    <link href="../Assets/Templates/Admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../Assets/Templates/Admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Assets/Templates/Admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Assets/Templates/Admin/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Game Hive</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../Assets/File/User/no-avatar.webp" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['aname']?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Data Enteries</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="District.php" class="dropdown-item">District</a>
                            <a href="Place.php" class="dropdown-item">Place</a>
                            <a href="Category.php" class="dropdown-item">Game Category</a>
                        </div>
                    </div>
                    <a href="CommunityList.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Community Lists</a>
                    <a href="UsersList.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Users Lists</a>
                    <a href="AdminShowComplaints.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Complaints</a>
                    <a href="ShowFeedBack.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>FeedBacks</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <div class="navbar-nav align-items-center ms-auto">
                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../Assets/File/User/no-avatar.webp" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['aname']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <!-- <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a> -->
                            <a href="Logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Communities</p>
                                <h6 class="mb-0"><?php echo $dataCC['c_count']?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Users</p>
                                <h6 class="mb-0"><?php echo $dataU['u_count']?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Complaints</p>
                                <h6 class="mb-0"><?php echo $dataC['com_count']?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">FeedBacks</p>
                                <h6 class="mb-0"><?php echo $dataFB['fb_count']?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Container Start -->
            <!-- <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    
                </div>
            </div> -->
            <!-- Container End -->


            


           
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Templates/Admin/lib/chart/chart.min.js"></script>
    <script src="../Assets/Templates/Admin/lib/easing/easing.min.js"></script>
    <script src="../Assets/Templates/Admin/lib/waypoints/waypoints.min.js"></script>
    <script src="../Assets/Templates/Admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../Assets/Templates/Admin/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../Assets/Templates/Admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../Assets/Templates/Admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../Assets/Templates/Admin/js/main.js"></script>
</body>

</html>