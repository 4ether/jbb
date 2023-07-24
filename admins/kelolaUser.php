<?php 
session_start();

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../img/1.png" type ="image/x-icon">
        
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- jsGrid -->
        <link rel="stylesheet" href="plugins/jsgrid/jsgrid.min.css">
        <link rel="stylesheet" href="plugins/jsgrid/jsgrid-theme.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">

        <title>Admin Dashboard</title>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
        <!-- Navbar -->
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
        <!-- /.navbar -->

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
                                <a href="admin.php" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Beranda</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="kelolaUser.php" class="nav-link active">
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengelola Akun Pengguna</h1>
                </div>
                </div>
            </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title w-100">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cari</span>
                        </div>
                        <input type="text" id="searchInput" class="form-control" aria-label="Cari" aria placeholder="...">
                    </div>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis</th>
                    <th>No.Telp</th>
                    <th>ID Akun</th>
                    <th>Hapus Akun</th>      
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    require "../connect.php";

                    $sql = mysqli_query($conn, "SELECT *, j.nama AS namaJenis, pg.nama AS namaPengguna FROM pengguna pg JOIN jenis j ON pg.id_jenis = j.id_jenis WHERE pg.id_jenis IN (2, 3)");
                    $count = mysqli_num_rows($sql);
                    $no = 0;
                    
                    if($count > 0) {
                      while ($fetchData =  mysqli_fetch_array($sql)) {
                        $no++;
                        $idP = $fetchData['id'];
                        $jenisP = $fetchData['namaJenis'];
                        $namaP = $fetchData['namaPengguna'];
                        $emailP = $fetchData['email'];
                        $notelpP = $fetchData['notelp'];
                        echo "
                        <tr>
                          <td>$no</td>
                          <td>$namaP</td>
                          <td>$emailP</td>
                          <td>$jenisP</td>
                          <td>$notelpP</td>
                          <td>$idP</td>
                          <td><a href='hapusAkun.php?id=$idP' class='delete-btn btn btn-danger' data-id='$idP'>Hapus</a></td>       
                        </tr>
                        ";
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="plugins/jszip/jszip.min.js"></script>
        <script src="plugins/pdfmake/pdfmake.min.js"></script>
        <script src="plugins/pdfmake/vfs_fonts.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- Page specific script -->
        <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
        </script>
        <script>
            $(document).ready(function () {
                $("#searchInput").keyup(function () {
                    var value = $(this).val().toLowerCase();
                    $("#example2 tbody tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });

                $(".delete-btn").click(function () {
                    var idToDelete = $(this).data("id");
                    alert("Hapus akun dengan id: " + idToDelete);
                });
            });
        </script>
    </body>
</html>