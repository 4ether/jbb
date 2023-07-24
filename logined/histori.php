<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="histori.css">
  <link rel="icon" href="../img/1.png" type ="image/x-icon">

  <title>MidnightCoder</title>
</head>

<body>
  <?php
    if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {
      $idPengguna = $_SESSION['id'];
    }

    include "../connect.php";
  ?>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
      <a class="navbar-brand" href="../index.php">
        <img src="../img/1.png" alt="" width="50" height="50" class="me-2">
        Midnight <strong>Store</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://wa.me/+628886964888">Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../us.html">About Us</a>
          </li> 
          <?php
              if (isset($_SESSION['id_jenis']) && $_SESSION['id_jenis'] == TRUE) {
                $jenis = $_SESSION['id_jenis'];
                if ($jenis == 2) {
                  echo "
                          <a class='nav-link' href='#' style='color: lightblue;'>Histori</a>
                        ";
                } else if ($jenis == 3) {
                  echo "
                          <a class='nav-link' href='#' style='color: lightblue;'>Bisnis Anda</a>
                        ";
                }
              }
            ?>
        </ul>
        <ul class="navbar-nav ms-auto">    
          <li class="nav-item">
              <?php
                if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {
                  $email = $_SESSION['email'];
                  echo '
                    <li class="nav-item">
                      <img src="userimg/user-' .$idPengguna. '.jpg" class="rounded-circle" onError="this.src = \'../img/1.png\'" style="width:40px; height:40px">
                    </li> 
                    <li class="nav-item">
                      <a href="../logined/profile.php" class="nav-link">'.$email.'</a>
                    </li>
                    <li class="nav-item">
                      <a href="../logout.php" class="nav-link" style="color: red;">Logout</a>
                    </li>
                    ';
                } else {
                  echo "
                    <li class='nav-item'>
                      <a class='nav-link fa-solid fa-user' href='../register.php'> Daftar</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link fa-solid fa-right-to-bracket' href='../login.php'> Masuk</a>
                    </li>
                    ";
                 }
              ?>   
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <br>

  <!-- Isi -->

    <div class="container bg-light mt-5 mb-5 pt-4 pb-4">
      <?php
      if (isset($_SESSION['id_jenis']) && $_SESSION['id_jenis'] == TRUE) {
        $jenis = $_SESSION['id_jenis'];
        if ($jenis == 3) {
          echo '
          <div class="pb-4">
          <form action="uploadBisnis.php">
            <button type="submit" class="buttonP">Jual Bisnis</button>
          </div>
          </form>
          <div class="card-header">
            <h2 style="text-align: center;">Bisnis Anda</h2>
            <hr>
          </div>
          '; 
        } else if ($jenis == 2) {
          echo '
          <div class="card-header">
            <h2 style="text-align: center;">Histori Penawaran</h2>
            <hr>
          </div>
          ';
        } 
      }
      ?>            
      <table>
    </div>

        <?php
        // Pengusaha or Investor
        // 2 investor, 3 pengusaha
        if (isset($_SESSION['id_jenis']) && $_SESSION['id_jenis'] == TRUE) {
          $jenis = $_SESSION['id_jenis'];
          $idInvestor = $_SESSION['id'];
          $sqlInv = "SELECT * FROM penawaran WHERE id_penawar = $idInvestor";
          $hasilInv = mysqli_query($conn, $sqlInv);
          if ($jenis == 2) {
            echo "
                <thead>
                  <tr>
                    <td>Id Tawar</td>
                    <td>Id Bisnis</td>
                    <td>Id Penawar</td>
                    <td>Nama Bisnis</td>
                    <td>Harga Asli</td>
                    <td>Harga Tawaran</td>
                    <td></td> 
                  </tr>
                </thead>
                  ";
                  while ($row = mysqli_fetch_assoc($hasilInv)) {
                    $idTawar = $row['id'];
                    $idBisnis = $row['id_bisnis'];
                    $idPenawar = $row['id_penawar'];
                    $namaBisnis = $row['namaBisnis'];
                    $hargaAsli = number_format($row['hargaAsli'], 0, ',', '.');
                    $hargaTawar = number_format($row['hargaTawar'], 0, ',', '.');
                    echo '
                    <tbody>
                      <tr>
                        <td>'.$idTawar.'</td>
                        <td>'.$idBisnis.'</td>
                        <td>'.$idPenawar.'</td>
                        <td>'.$namaBisnis.'</td>
                        <td>Rp '.$hargaAsli.'</td>
                        <td>Rp '.$hargaTawar.'</td>
                        <td><a href="../product.php?id='.$idBisnis.'">Detail Bisnis</td>
                      </tr> 
                    </tbody>
                        ';
                }
          } else if ($jenis == 3) {
            $idPengusaha = $_SESSION['id'];
            $sql = "SELECT * FROM bisnis WHERE idPengusaha = $idPengusaha";
            $hasil = mysqli_query($conn, $sql);
            echo "
                <thead>
                <tr>
                  <td>Id Bisnis</td>
                  <td>Gambar</td>
                  <td>Nama</td>
                  <td>Deskripsi</td>
                  <td>Harga</td>
                  <td>Bentuk</td>
                  <td>Didirikan</td>
                  <td>Status</td>
                  <td>Jenis</td>
                  <td>Alamat</td>
                  <td></td>
                  <td></td>
                </tr>
              </thead>
                  ";
              while ($row = mysqli_fetch_assoc($hasil)) {
                
                $idBisnis = $row['id'];
                $nama = $row['nama'];
                $deskripsi = $row['deskripsi'];
                $harga = $row['harga'];
                $bentuk = $row['bentuk'];
                $didirikan = $row['didirikan'];
                $status = $row['status'];
                $jenis = $row['jenis'];
                $alamat = $row['alamat'];
                echo '
                <tbody>
                  <tr>
                    <td>'.$idBisnis.'</td>
                    <td>img.png</td>
                    <td>'.$nama.'</td>
                    <td>'.$deskripsi.'</td>
                    <td>Rp '.number_format($harga, 0, ',', '.').'</td>
                    <td>'.$bentuk.'</td>
                    <td>'.$didirikan.'</td>
                    <td>'.$status.'</td>
                    <td>'.$jenis.'</td>
                    <td>'.$alamat.'</td>
                    <td><a href="../product.php?id='.$idBisnis.'">Detail</a></td>
                    <td><a href="hapusbisnis.php?id='.$idBisnis.'">Hapus Bisnis</td>
                  </tr> 
                </tbody>
                    ';
            }
          }
        }
        ?> 
        
        
      </table>
    </div>  

    <div class="container bg-light mt-5 mb-5 pt-4 pb-4">
      <?php
      if (isset($_SESSION['id_jenis']) && $_SESSION['id_jenis'] == TRUE) {
        $jenis = $_SESSION['id_jenis'];
        if ($jenis == 3) {
          echo '
          <div class="card-header">
            <h2 style="text-align: center;">Pemberitahuan Penawaran Bisnis Anda</h2>
            <hr>
          </div>
          '; 
        } 
      }
      ?>            
      <table>
        <?php
        // Pengusaha or Investor
        // 2 investor, 3 pengusaha
        if (isset($_SESSION['id_jenis']) && $_SESSION['id_jenis'] == TRUE) {
          $jenis = $_SESSION['id_jenis'];
          $idInvestor = $_SESSION['id'];
          $sqlInv = "SELECT *, pg.nama AS namaInvestor, pg.notelp AS notelpInvestor FROM penawaran p JOIN bisnis b ON p.id_bisnis = b.id JOIN pengguna pg ON p.id_penawar = pg.id WHERE b.idPengusaha = $idInvestor";
          $hasilInv = mysqli_query($conn, $sqlInv);
          $idTawar = 1;
          if ($jenis == 3) {
            echo "
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Id Bisnis</td>
                    <td>Nama Penawar</td>
                    <td>No.Telp Penawar</td>
                    <td>Nama Bisnis</td>
                    <td>Harga Asli</td>
                    <td>Harga Tawaran</td>
                    <td></td>
                  </tr>
                </thead>
                  ";
                  while ($row = mysqli_fetch_assoc($hasilInv)) {
                    $idBisnis = $row['id_bisnis'];
                    $idPenawar = $row['id_penawar'];
                    $namaPenawar = $row['namaInvestor'];
                    $notelpPenawar = $row['notelpInvestor'];
                    $namaBisnis = $row['namaBisnis'];
                    $hargaAsli = $row['hargaAsli'];
                    $hargaTawar = $row['hargaTawar'];
                    echo '
                    <tbody>
                      <tr>
                        <td>'.$idTawar++.'</td>
                        <td>'.$idBisnis.'</td>
                        <td>'.$namaPenawar.'</td>
                        <td>'.$notelpPenawar.'</td>
                        <td>'.$namaBisnis.'</td>
                        <td>Rp '.number_format($hargaAsli, 0, ',', '.').'</td>
                        <td>Rp '.number_format($hargaTawar, 0, ',', '.').'</td>
                        <td><a href="../product.php?id='.$idBisnis.'">Detail Bisnis</td>
                      </tr> 
                    </tbody>
                        ';
                }
          } 
        }
        ?> 
        
        
      </table>
    </div>
  <!-- isi -->

  <!-- Footer -->
  <footer class="bg-black p-5 position-sticky top-100">
    <div class="container">
      <div class="row">
        <div class="col" style="text-align: center;">
          <img src="../img/1.png" style="width: 30px;">
          <span style="color: white;">Copyright &copy; 2022 Midnightcoder</span>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>