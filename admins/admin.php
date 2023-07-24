<?php 
session_start();

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link rel="icon" href="../img/1.png" type ="image/x-icon">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar Atas -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Selamat Datang, <?php echo $_SESSION['email']?></a>
                    </li>
                </ul>
            </nav>

            <!-- Sidebar Kiri -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="#" class="brand-link">
                    <img src="img/dlogo.png" alt="Dashboard Logo" class="brand-image img-circle elevation-2">
                    <span class="brand-text font-weight-light">MidnightCoder</span>
                </a>
                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="img/profil.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?php echo $_SESSION['nama']?></a>
                        </div>
                    </div>
                    

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="admin.php" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Beranda</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="kelolaUser.php" class="nav-link">
                                    <i class="nav-icon fas fa-user-cog"></i>
                                    <p>Pengelola Akun</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="kelolaPenawaran.php" class="nav-link">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Pengelola Penawaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="kelolaBisnis.php" class="nav-link">
                                    <i class="nav-icon fas fa-store-alt"></i>
                                    <p>Pengelola Bisnis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="logout.php" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-4 col-5">
                                <!-- Total Akun -->
                                <?php
                                    require "../connect.php";
                                    $sql = mysqli_query($conn, "SELECT id FROM pengguna ORDER BY id");
                                    $row1 = mysqli_num_rows($sql);
                                ?>
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3><?php echo $row1-1?></h3>
                                        <p>Total Akun Terdaftar</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="kelolaUser.php" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-5">
                                <!-- Total Penawaran -->
                                <?php
                                    require "../connect.php";
                                    $sq2 = mysqli_query($conn, "SELECT id FROM penawaran ORDER BY id");
                                    $row2 = mysqli_num_rows($sq2);
                                ?>
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3><?php echo $row2?></h3>
                                        <p>Total Penawaran</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-clipboard"></i>
                                    </div>
                                    <a href="kelolaPenawaran.php" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-5">
                                <!-- Total Bisnis -->
                                <?php
                                    require "../connect.php";
                                    $sql3 = mysqli_query($conn, "SELECT * FROM bisnis ORDER BY id");
                                    $row3 = mysqli_num_rows($sql3);              
                                ?>
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3><?php echo $row3?></h3>
                                        <p>Total Bisnis</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-3">
                                <!-- Total Akun Investor -->
                                <?php
                                    require "../connect.php";
                                    $sql4 = mysqli_query($conn, "SELECT id FROM pengguna WHERE id_jenis = 2 ORDER BY id");
                                    $row4 = mysqli_num_rows($sql4);
                                ?>
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3><?php echo $row4?></h3>
                                        <p>Total Akun Investor</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-stalker"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-3">
                                <!-- Total Akun Pengusaha -->
                                <?php
                                    require "../connect.php";
                                    $sql5 = mysqli_query($conn, "SELECT id FROM pengguna WHERE id_jenis = 3 ORDER BY id");
                                    $row5 = mysqli_num_rows($sql5);
                                ?>
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3><?php echo $row5?></h3>
                                        <p>Total Akun Pengusaha</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-stalker"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-5">
                                <div class="card card-danger">
                                    <div class="card-header">
                                    <h3 class="card-title">Perbandingan Jenis Akun</h3>
                                        <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- LINE CHART -->
                            <div class="col-lg-4 col-5">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Pengajuan Penawaran Bisnis (Rupiah)</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-5">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Statistik Bentuk Bisnis</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; MidnightCoder 2023</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="plugins/chart.js/Chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Sparkline -->
        <script src="plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.js"></script>

        <?php
        // Ambil data penawaran dari database
            require "../connect.php";
            $sumPerMonth = array();
            
            for ($month = 1; $month <= 12; $month++) {
      
                $sqlMonth = mysqli_query($conn, "SELECT SUM(hargaTawar) AS total FROM penawaran WHERE MONTH(tanggal) = $month");
            
                if ($sqlMonth) {
                    if (mysqli_num_rows($sqlMonth) > 0) {
                        $row = mysqli_fetch_assoc($sqlMonth);
            
                        $sumHargaTawar = $row['total'];
            
                        $sumPerMonth[$month] = $sumHargaTawar;
                    } else {
                        // Jika tidak ada data bulan itu total menjadi 0
                        $sumPerMonth[$month] = 0;
                    }
                } else {
                    echo "Query Error: " . mysqli_error($conn);
                }
            }
            mysqli_close($conn);
        ?>

        <?php 
        // Ambil data bentuk bisnis dari database
            require "../connect.php";
            $dbs = "SELECT Bentuk, COUNT(*) AS count FROM bisnis GROUP BY Bentuk";
            $result = $conn->query($dbs);
            
            $labels = [];
            $data = [];
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $labels[] = $row['Bentuk'];
                    $data[] = $row['count'];
                }
            }
            
            // Konversi data ke format JSON untuk chart
            $labels_json = json_encode($labels);
            $data_json = json_encode($data);
        ?>

        <script>
            //---------------
            //- DONUT CHART -
            //---------------
            document.addEventListener("DOMContentLoaded", function () {
                // Parsing data JSON dari PHP
                var labels = <?php echo $labels_json; ?>;
                var data = <?php echo $data_json; ?>;
                var backgroundColors = [
                    "#007bff",
                    "#28a745",
                    "#dc3545",
                    "#ffc107",
                    "#17a2b8"
                ];

                var donutChart = new Chart("donutChart", {
                    type: "doughnut",
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: backgroundColors
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: true,
                            position: "right",
                        },
                        title: {
                            display: true,
                            text: "Donut Chart - Bentuk Distribution"
                        }
                    }
                });
            });
        </script>

        <script>
            $(function () {  
                var areaChartData = {
                    labels  : ['Perbandingan Akun'],
                    datasets: [
                        {
                        label               : 'Akun Investor',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [<?php echo $row4?>, 0]
                        },
                        {
                        label               : 'Akun Pengusaha',
                        backgroundColor     : 'rgba(210, 214, 222, 1)',
                        borderColor         : 'rgba(210, 214, 222, 1)',
                        pointRadius         : false,
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : [<?php echo $row5?>, 0]
                        },
                    ]
                }

                // Panggil data total penawaran per bulan nya
                var sumPerMonth = <?php echo json_encode($sumPerMonth)?>

                var sumJanuari = sumPerMonth[1];
                console.log(sumJanuari);

                var sumFebruari = sumPerMonth[2];
                console.log(sumFebruari);

                var sumMaret = sumPerMonth[3];
                console.log(sumMaret);

                var sumApril = sumPerMonth[4];
                console.log(sumApril);

                var sumMei = sumPerMonth[5];
                console.log(sumMei);

                var sumJuni = sumPerMonth[6];
                console.log(sumJuni);

                var sumJuli = sumPerMonth[7];
                console.log(sumJuli);

                var sumAgustus = sumPerMonth[8];
                console.log(sumAgustus);

                var sumSeptember = sumPerMonth[9];
                console.log(sumSeptember);

                var sumOktober = sumPerMonth[10];
                console.log(sumOktober);

                var sumNovember = sumPerMonth[11];
                console.log(sumNovember);

                var sumDesember = sumPerMonth[12];
                console.log(sumDesember);

                var areaChartData2 = {
                    labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    datasets: [
                        {
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [ sumJanuari,
                                                sumFebruari,
                                                sumMaret,
                                                sumApril,
                                                sumMei,
                                                sumJuni,
                                                sumJuli,
                                                sumAgustus,
                                                sumSeptember,
                                                sumOktober,
                                                sumNovember,
                                                sumDesember]
                        },
                        {

                        backgroundColor     : 'rgba(210, 214, 222, 1)',
                        borderColor         : 'rgba(210, 214, 222, 1)',
                        pointRadius         : false,
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                        },
                    ]
                };

                var areaChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }],
                        yAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }]
                    }
                };
                
                //-------------
                //- BAR CHART -
                //-------------
                var barChartCanvas = $('#barChart').get(0).getContext('2d')
                var barChartData = $.extend(true, {}, areaChartData)
                var temp0 = areaChartData.datasets[0]
                var temp1 = areaChartData.datasets[1]
                barChartData.datasets[0] = temp1
                barChartData.datasets[1] = temp0

                var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
                }

                new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
                });

                //-------------
                //- LINE CHART -
                //--------------
                var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
                var lineChartOptions = $.extend(true, {}, areaChartOptions)
                var lineChartData = $.extend(true, {}, areaChartData2)
                lineChartData.datasets[0].fill = false;
                lineChartData.datasets[1].fill = false;
                lineChartOptions.datasetFill = false

                var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
                });
     
            })
        </script>
    </body>
</html>