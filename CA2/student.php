<?php
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '';
echo '<head>';
echo '';
echo '<meta charset="utf-8">';
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
echo '<meta name="description" content="">';
echo '<meta name="author" content="">';
echo '';
echo '<title>Attendance Taking System</title>';
echo '';
echo '<!-- Custom fonts for this template-->';
echo '<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">';
echo '';
echo '<!-- Page level plugin CSS-->';
echo '<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">';
echo '';
echo '<!-- Custom styles for this template-->';
echo '<link href="css/sb-admin.css" rel="stylesheet">';
echo '';
echo '</head>';
echo '';
echo '<body id="page-top">';
echo '';
echo '<nav class="navbar navbar-expand navbar-dark bg-dark static-top">';
echo '';
echo '<a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>';
echo '';
echo '<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">';
echo '<i class="fas fa-bars"></i>';
echo '</button>';
echo '';
echo '<!-- Navbar Search -->';
echo '<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">';
echo '<div class="input-group">';
echo '<input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">';
echo '<div class="input-group-append">';
echo '<button class="btn btn-primary" type="button">';
echo '<i class="fas fa-search"></i>';
echo '</button>';
echo '</div>';
echo '</div>';
echo '</form>';
echo '';
echo '<!-- Navbar -->';
echo '<ul class="navbar-nav ml-auto ml-md-0">';
echo '<li class="nav-item dropdown no-arrow mx-1">';
echo '<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
echo '<i class="fas fa-bell fa-fw"></i>';
echo '<span class="badge badge-danger">9+</span>';
echo '</a>';
echo '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">';
echo '<a class="dropdown-item" href="#">Action</a>';
echo '<a class="dropdown-item" href="#">Another action</a>';
echo '<div class="dropdown-divider"></div>';
echo '<a class="dropdown-item" href="#">Something else here</a>';
echo '</div>';
echo '</li>';
echo '<li class="nav-item dropdown no-arrow mx-1">';
echo '<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
echo '<i class="fas fa-envelope fa-fw"></i>';
echo '<span class="badge badge-danger">7</span>';
echo '</a>';
echo '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">';
echo '<a class="dropdown-item" href="#">Action</a>';
echo '<a class="dropdown-item" href="#">Another action</a>';
echo '<div class="dropdown-divider"></div>';
echo '<a class="dropdown-item" href="#">Something else here</a>';
echo '</div>';
echo '</li>';
echo '<li class="nav-item dropdown no-arrow">';
echo '<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
echo '<i class="fas fa-user-circle fa-fw"></i>';
echo '</a>';
echo '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">';
echo '<a class="dropdown-item" href="#">Settings</a>';
echo '<a class="dropdown-item" href="#">Activity Log</a>';
echo '<div class="dropdown-divider"></div>';
echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>';
echo '</div>';
echo '</li>';
echo '</ul>';
echo '';
echo '</nav>';
echo '';
echo '<div id="wrapper">';
echo '';
echo '<!-- Sidebar -->';
echo '<ul class="sidebar navbar-nav">';
echo '<li class="nav-item active">';
echo '<a class="nav-link" href="index.html">';
echo '<i class="fas fa-fw fa-tachometer-alt"></i>';
echo '<span>Dashboard</span>';
echo '</a>';
echo '</li>';
echo '<li class="nav-item dropdown">';
echo '<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
echo '<i class="fas fa-fw fa-folder"></i>';
echo '<span>Pages</span>';
echo '</a>';
echo '<div class="dropdown-menu" aria-labelledby="pagesDropdown">';
echo '<h6 class="dropdown-header">Login Screens:</h6>';
echo '<a class="dropdown-item" href="login.html">Login</a>';
echo '<a class="dropdown-item" href="register.html">Register</a>';
echo '<a class="dropdown-item" href="forgot-password.html">Forgot Password</a>';
echo '<div class="dropdown-divider"></div>';
echo '<h6 class="dropdown-header">Other Pages:</h6>';
echo '<a class="dropdown-item" href="404.html">404 Page</a>';
echo '<a class="dropdown-item" href="blank.html">Blank Page</a>';
echo '</div>';
echo '</li>';
echo '';
echo '</ul>';
echo '';
echo '<div id="content-wrapper">';
echo '';
echo '<div class="container-fluid">';
echo '';
echo '<!-- Breadcrumbs-->';
echo '<ol class="breadcrumb">';
echo '<li class="breadcrumb-item">';
echo '<a href="#">Dashboard</a>';
echo '</li>';
echo '<li class="breadcrumb-item active">Overview</li>';
echo '</ol>';
echo '';
echo '<!-- Icon Cards-->';
echo '<div class="row">';
echo '<div class="col-xl-3 col-sm-6 mb-3">';
echo '<div class="card text-white bg-primary o-hidden h-100">';
echo '<div class="card-body">';
echo '<div class="card-body-icon">';
echo '<i class="fas fa-fw fa-comments"></i>';
echo '</div>';
echo '<div class="mr-5">0 New Messages!</div>';
echo '</div>';
echo '<a class="card-footer text-white clearfix small z-1" href="#">';
echo '<span class="float-left">View Details</span>';
echo '<span class="float-right">';
echo '<i class="fas fa-angle-right"></i>';
echo '</span>';
echo '</a>';
echo '</div>';
echo '</div>';
echo '<div class="col-xl-3 col-sm-6 mb-3">';
echo '<div class="card text-white bg-warning o-hidden h-100">';
echo '<div class="card-body">';
echo '<div class="card-body-icon">';
echo '<i class="fas fa-fw fa-list"></i>';
echo '</div>';
echo '<div class="mr-5">0 New Tasks!</div>';
echo '</div>';
echo '<a class="card-footer text-white clearfix small z-1" href="#">';
echo '<span class="float-left">View Details</span>';
echo '<span class="float-right">';
echo '<i class="fas fa-angle-right"></i>';
echo '</span>';
echo '</a>';
echo '</div>';
echo '</div>';
echo '';
echo '</div>';
echo '';
echo '';
echo '<!-- DataTables Example -->';
echo '<div class="card mb-3">';
echo '<div class="card-header">';
echo '<i class="fas fa-table"></i>';
echo ' Student Action</div>';
echo '<div class="card-body">';
echo '<h4>Comments:</h4>';
echo "<form action=\"/button-type\" method=\"post\" onsubmit=\"funct1(event);\">\n";
echo "<script type=\"text/javascript\" src=\"js/submit.js\"></script>\n";
echo " <input id = \"comments\" type = \"text\" style = \"height: 100px; width: 500px;\" required>";
echo "<br><br>";
echo " <button type=\"submit\" id = \"submit\" class=\"submit\">Submit</button>\n";
echo "<input type=\"reset\" value=\"Reset\" />\n";
echo '</div>';
echo '</form>';
echo '<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>';
echo '</div>';
echo '';
echo '</div>';
echo '<!-- /.container-fluid -->';
echo '';
echo '<!-- Sticky Footer -->';
echo '<footer class="sticky-footer">';
echo '<div class="container my-auto">';
echo '<div class="copyright text-center my-auto">';
echo '<span>Copyright © Your Website 2019</span>';
echo '</div>';
echo '</div>';
echo '</footer>';
echo '';
echo '</div>';
echo '<!-- /.content-wrapper -->';
echo '';
echo '</div>';
echo '<!-- /#wrapper -->';
echo '';
echo '<!-- Scroll to Top Button-->';
echo '<a class="scroll-to-top rounded" href="#page-top">';
echo '<i class="fas fa-angle-up"></i>';
echo '</a>';
echo '';
echo '<!-- Logout Modal-->';
echo '<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
echo '<div class="modal-dialog" role="document">';
echo '<div class="modal-content">';
echo '<div class="modal-header">';
echo '<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>';
echo '<button class="close" type="button" data-dismiss="modal" aria-label="Close">';
echo '<span aria-hidden="true">×</span>';
echo '</button>';
echo '</div>';
echo '<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>';
echo '<div class="modal-footer">';
echo '<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>';
echo '<a class="btn btn-primary" href="login.html">Logout</a>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '';
echo '<!-- Bootstrap core JavaScript-->';
echo '<script src="vendor/jquery/jquery.min.js"></script>';
echo '<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>';
echo '';
echo '<!-- Core plugin JavaScript-->';
echo '<script src="vendor/jquery-easing/jquery.easing.min.js"></script>';
echo '';
echo '<!-- Page level plugin JavaScript-->';
echo '<script src="vendor/chart.js/Chart.min.js"></script>';
echo '<script src="vendor/datatables/jquery.dataTables.js"></script>';
echo '<script src="vendor/datatables/dataTables.bootstrap4.js"></script>';
echo '';
echo '<!-- Custom scripts for all pages-->';
echo '<script src="js/sb-admin.min.js"></script>';
echo '';
echo '<!-- Demo scripts for this page-->';
echo '<script src="js/demo/datatables-demo.js"></script>';
echo '<script src="js/demo/chart-area-demo.js"></script>';
echo '';
echo '</body>';
echo '';
echo '</html>';
echo '';
  
?>