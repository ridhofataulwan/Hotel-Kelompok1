<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Admin</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('') ?>">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Admin/list') ?>">
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">Admin</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Admin/items') ?>">
                                <i class="ni ni-istanbul text-default"></i>
                                <span class="nav-link-text">Items</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Admin/booking') ?>">
                                <i class="ni ni-collection text-blue"></i>
                                <span class="nav-link-text">Booking</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Admin/customer') ?>">
                                <i class="ni ni-circle-08 text-pink"></i>
                                <span class="nav-link-text">Customer</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Booking List</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Booking List</a></li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <ul class="navbar-nav align-items-end ml-auto ml-md-0 ">
                                <li class="nav-item dropdown">
                                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="media align-items-center">
                                            <span class="avatar avatar-sm rounded-circle">
                                                <img alt="Image placeholder" src="<?= $admin['admin_photo'] ?>">
                                            </span>
                                            <div class="media-body  ml-2  d-none d-lg-block">
                                                <span style="color:white;" class="mb-0 text-sm  font-weight-bold"><?= user()->username ?></span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu  dropdown-menu-right ">
                                        <div class="dropdown-header noti-title">
                                            <h6 class="text-overflow m-0">Welcome!</h6>
                                        </div>
                                        <span class="dropdown-item">
                                            <i class="ni ni-single-02"></i>
                                            <span><?= $admin['admin_nama'] ?></span>
                                        </span>
                                        <div class="dropdown-divider"></div>
                                        <a href="/logout" class="dropdown-item">
                                            <i class="ni ni-user-run"></i>
                                            <span>Logout</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">All Booking</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">Customer Name</th>
                                        <th scope="col" class="sort" data-sort="budget">Items Name</th>
                                        <th scope="col" class="sort" data-sort="status">Booking Start</th>
                                        <th scope="col" class="sort" data-sort="city">Booking End</th>
                                        <th scope="col" class="sort" data-sort="city">Booking Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <?php foreach ($booking as $booking) : ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm"><?= $booking['customer_name'] ?></span>
                                                </div>
                                            </th>
                                            <td class="budget">
                                                <?= $booking['items_name'] ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <span class="status"><?= $booking['booking_date_start'] ?></span>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <span class="status"><?= $booking['booking_date_stop'] ?></span>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <?php
                                                    $color = [
                                                        'pending' => 'text-yellow',
                                                        'ongoing' => 'text-blue',
                                                        'done' => 'text-red'
                                                    ]; ?>
                                                    <h3 class="status <?= $color[$booking['booking_status']] ?>"><?= $booking['booking_status'] ?></h3>
                                                </span>
                                            </td>
                                            <td>
                                                <?php
                                                $status = ['pending', 'ongoing', 'done'];
                                                $btn = [
                                                    'pending' => 'btn-warning',
                                                    'ongoing' => 'btn-primary',
                                                    'done' => 'btn-danger'
                                                ];
                                                foreach ($status as $status) :
                                                    if ($status != $booking['booking_status']) : ?>
                                                        <a class="btn <?= $btn[$status] ?>" href="<?= base_url('Admin/booking/' . $status . '/' . $booking['booking_id']) ?>"><?= $status ?></a>
                                                <?php
                                                    endif;
                                                endforeach;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->

        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>