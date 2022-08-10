<?php
session_start();
//koneksi database
include 'config.php';
include 'navbar.php';



if (!isset($_SESSION["pelanggan"]))
{
    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location='login.php';</script>";
}
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('Anda Belum Memilih Barang')</script>";
    echo "<script>location='index.php'</script>";
}
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

    <title>Checkout</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/table.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader" style="background-color: #3f5a5e;">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->

    <!-- Header -->
    

    <!-- Page Content -->
    <div class="page-heading products-heading header-text"
        style="background-image:url(assets/images/foto.png);padding: 300px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="text-content ">
                    <h4 style="text-shadow: 1px 1px 0px black;">Halaman Chechkout</h4>
                    <!-- <h2 style="font-size:40px; text-shadow: 1px 1px 0px black; color: #11999B;">Selamat Datang Di Daigundar</h2> -->
                </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <section>
        <div class="container">
        <h3 style="font-family: 'Nunito', sans-serif;font-weight:700; color:#11999B;font-size:25px;">Checkout
                Belanja</h3>
        <hr>
        <table class="table table-dark table-striped" style="background-color: #11999B;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            <?php $nomor=1;?>
                <?php $totalberat = 0; ?>
                <?php $totalbelanja = 0; ?>
                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                <!-- menampilkan roduk yang sedang diperulangkan berdasarkan id_produk -->
                    <?php
                    $ambil = $koneksi->query ("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah["harga_produk"] * $jumlah;
                    //subberat diperoleh dari berat produk x jumlah
                    $subberat = $pecah["berat_produk"] * $jumlah;
                    //totalberat
                    $totalberat+=$subberat;

                    //echo "<pre>";
                    //print_r ($pecah);
                    //echo "</pre>";
                    ?>

                <tr class="">
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["nama_produk"]; ?></td>
                    <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp. <?php echo number_format($subharga);?></td>
                </tr>
                <?php $nomor++; ?>
                <?php $totalbelanja+=$subharga; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr style="color: #A2EEAE">
                    <th colspan="4">Total Belanja</th>
                    <th>Rp. <?php echo number_format($totalbelanja) ?> </th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']?>"
                            class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan']?>"
                            class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Alamat Lengkap Pengiriman</label>
                <textarea class="form-control" name="alamat_pengiriman"
                    placeholder="Masukkan Alamat Lengkap"></textarea>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select class="form-control" name="nama_provinsi">
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Kota/Kabupaten</label>
                        <select class="form-control" name="nama_kota">
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Ekspedisi</label>
                        <select class="form-control" name="nama_ekspedisi"> 
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Paket</label>
                        <select class="form-control" name="nama_paket"> 
                            
                        </select>
                    </div>
                </div>
            </div>
            <input type="text" name="total_berat" value="<?php echo $totalberat; ?>">
            <input type="text" name="provinsi">
            <input type="text" name="kota">
            <input type="text" name="tipe">
            <input type="text" name="kodepos">
            <input type="text" name="ekspedisi">
            <input type="text" name="paket">
            <input type="text" name="ongkir">
            <input type="text" name="estimasi">

            <button name="checkout" class="btn" style="background-color: #11999B; color:white;">Checkout
        </button>
        </form>
        <?php  
            if (isset ($_POST["checkout"]))
            {
                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                $tanggal_pembelian = date("Y-m-d");
                $alamat_pengiriman = $_POST['alamat_pengiriman'];
                $totalberat = $_POST["total_berat"];
                $provinsi = $_POST["provinsi"];
                $kota = $_POST["kota"];
                $tipe = $_POST["tipe"];
                $kodepos = $_POST["kodepos"];
                $ekspedisi = $_POST["ekspedisi"];
                $paket = $_POST["paket"];
                $ongkir = $_POST["ongkir"];
                $estimasi = $_POST["estimasi"];

                $total_pembelian = $totalbelanja + $ongkir;
                // menyimpan data ke tabel pembelian
               $koneksi->query("INSERT INTO pembelian 
               (id_pelanggan,tanggal_pembelian,total_pembelian,alamat_pengiriman,totalberat,provinsi,kota,tipe,kodepos,ekspedisi,paket,ongkir,
               estimasi) 
               VALUES ('$id_pelanggan','$tanggal_pembelian','$total_pembelian','$alamat_pengiriman','$totalberat','$provinsi','$kota','$tipe','$kodepos','$ekspedisi','$paket','$ongkir','$estimasi')");
                
                
                //menadapatkan id_pembelian baru
               $id_pembelian_barusan = $koneksi->insert_id;

               foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
               {
                   //mendapatkan data produk berdasarkan id_produk
                $ambil = $koneksi -> query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $perproduk = $ambil -> fetch_assoc();

                $nama = $perproduk['nama_produk'];
                $harga = $perproduk['harga_produk'];
                $berat = $perproduk['berat_produk'];

                $subberat = $perproduk['berat_produk']*$jumlah;
                $subharga = $perproduk['harga_produk']*$jumlah;
                   $koneksi -> query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");

                // skrip update stok
                $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah
                    WHERE id_produk='$id_produk'");
               }
               //mengkosongkan keranjang belanja
               unset ($_SESSION["keranjang"]);
               //tampilan dialihkan ke halaman nota
               echo "<script>alert('pembelian succes');</script>";
               echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
            }
            ?>
        </div>
    </section>
    
    <?php 
    include 'footer.php';
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

<script>
        $(document).ready(function(){
            $.ajax({ 
                type:'post',
                url:'dataprovinsi.php',
                success:function(hasil_provinsi)
                {
                    $("select[name=nama_provinsi]").html(hasil_provinsi);
                }
            });

            $("select[name=nama_provinsi]").on("change",function(){
                //ambil id_provinsi yang dipilih
                var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
                $.ajax({
                    type:'post',
                    url:'datakota.php',
                    data:'id_provinsi='+id_provinsi_terpilih,
                    success:function(hasil_kota)
                    {
                        $("select[name=nama_kota]").html(hasil_kota);
                    }
                });
            });

            $.ajax({ 
                type:'post',
                url:'dataekspedisi.php',
                success:function(hasil_ekspedisi)
                {
                    $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
                }
            });

            $("select[name=nama_ekspedisi]").on("change",function(){
                //mendapatkan data ongkos kirim

                //mendapatkan ekspedisi yang dipilih
                var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
                //mendapatkan id_kota yang dipilih customer
                var kota_terpilih = $("option:selected","select[name=nama_kota]").attr("id_kota");
                //mendapatkan total_berat dari inputan
                var total_berat = $("input[name=total_berat]").val();
                $.ajax({    
                    type:'post',
                    url:'datapaket.php',
                    data:'ekspedisi='+ekspedisi_terpilih+'&kota='+kota_terpilih+'&berat='+total_berat,
                    success:function(hasil_paket)
                    {
                        // console.log(hasil_paket);
                        $("select[name=nama_paket]").html(hasil_paket);

                        //letakkan nama ekspedisi terpilih di input ekspedisi
                        $("input[name=ekspedisi]").val(ekspedisi_terpilih);
                    }
                })
            }); 
            $("select[name=nama_kota]").on("change",function(){
                var prov = $("option:selected",this).attr("nama_provinsi");
                var kota = $("option:selected",this).attr("nama_kota");
                var tipe = $("option:selected",this).attr("tipe_kota");
                var kodepos = $("option:selected",this).attr("kodepos");

                $("input[name=provinsi]").val(prov);
                $("input[name=kota]").val(kota);
                $("input[name=tipe]").val(tipe);
                $("input[name=kodepos]").val(kodepos);
            });

            $("select[name=nama_paket]").on("change",function(){
                var paket = $("option:selected",this).attr("paket");
                var ongkir = $("option:selected",this).attr("ongkir");
                var etd = $("option:selected",this).attr("etd");
                $("input[name=paket]").val(paket);
                $("input[name=ongkir]").val(ongkir);
                $("input[name=estimasi]").val(etd);
            })
        });
</script>