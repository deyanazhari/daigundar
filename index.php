<?php
include 'config.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
    <link href="./assets/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Gidugu&family=Nunito:wght@700;800&family=Oswald&family=Outfit&family=Roboto&family=Roboto+Condensed&family=Spectral:wght@500&display=swap"
        rel="stylesheet">

    <title>Daigundar Store</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- ***** Preloader Start **** -->
    <div id="preloader" style="background-color: #3f5a5e;">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="page-heading products-heading header-text"
        style="background-image:url(assets/images/foto.png);padding: 300px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="text-content ">
                    <h4 style="text-shadow: 1px 1px 0px black;">Daigundar</h4>
                    <h2 style="font-size:40px; text-shadow: 1px 1px 0px black; color: #11999B;">Selamat Datang Di Daigundar</h2>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
        <div class="container">
            <div class="section-heading">
                <h2 style="font-size: 20px; font-family: 'Nunito', sans-serif;font-weight:700; color:#3f5a5e;">Latest
                    Produk</h2>
                <a href="products.html">Lihat semua <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="row">
                <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
                <?php while($perproduk = $ambil->fetch_assoc()) { ?>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="produk.php"><img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt=""></a>
                        <div class="down-content">
                            <a href="#">
                                <h4 style="color:#3f5a5e;">
                                    <?php echo $perproduk['nama_produk']; ?></h4>
                            </a>
                            <h6 style="font-family: 'Nunito', sans-serif;font-weight:800; font-size:15px">Rp.
                                <?php echo  number_format($perproduk["harga_produk"]); ?></h6>
                            <p><?php echo $perproduk['deskripsi_produk']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2 style="font-family: 'Nunito', sans-serif;font-weight:700;">Tentang Daigundar</h2>
                    </div>
                </div>
                <div class=" col-md-6">
                    <div class="left-content">
                        <h4 style="color:#3f5a5e;">Apa itu Daigundar</h4>
                        <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing"
                                target="_parent">Daigundar Store adalah toko jual beli sepatu bekas yang kualitas barang nya terjamin kualitas nya</p>
                        <ul class="featured-list">
                            <!-- <li><a href="#">Tidak ada garis tengah</a></li>
                            <li><a href="#">Full Plisket</a></li>
                            <li><a href="#">Bahan kualitas terbaik</a></li>
                            <li><a href="#">Finishing jahit tepi rapih</a></li>
                            <li><a href="#">Motif printing detail premium</a></li> -->
                        </ul>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="assets/images/about.jpg" style="width: 410px; height: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include'footer.php'
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
        if (!cleared[t.id]) { // function makes it static and global
            cleared[t.id] = 1; // you could use true and false, but that's more typing
            t.value = ''; // with more chance of typos
            t.style.color = '#fff';
        }
    }
    </script>


</body>

</html>