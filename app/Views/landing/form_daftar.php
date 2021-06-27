<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SipKe-Mas Surakarta</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>/assets/img/logo_pms.png" rel="icon">
    <link href="<?= base_url(); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: OnePage - v2.2.2
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <!-- Sweat Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-lg-8">
                <!-- <h3 class="mb-3 text-center">Formulir Pendaftaran</h3> -->
                <div class="card o-hidden border-0 shadow-lg mb-2">
                    <div class="card-header text-white bg-primary text-center">
                        <strong>Formulir Pendaftaran</strong>
                    </div>
                    <div class="card-body">
                        <!-- Form Pendafaran -->
                        <div id="alertError" class="row" style="display: none;">
                            <div class="col-12">
                                <div class="alert alert-warning errortext" role="alert">
                                </div>
                            </div>
                        </div>
                        <?= form_open("/pemohon/proses_daftar", ['class' => 'formdaftar']); ?>
                        <?= csrf_field(); ?>
                        <!-- NIK -->
                        <div class="form-group row">
                            <label for="NIK" class="col-sm-4 col-form-label">NIK</label>
                            <div class="col-sm-8">
                                <input type="text" name="NIK" class="form-control" id="NIK">
                                <div class="invalid-feedback invalidNIK text-center"></div>
                            </div>
                        </div>
                        <!-- Nama Lengkap -->
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama" class="form-control" id="nama" required>
                            </div>
                        </div>
                        <!-- Tempat Lahir -->
                        <div class="form-group row">
                            <label for="tempatlahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" required>
                            </div>
                        </div>
                        <!-- Tanggal Lahir -->
                        <div class="form-group row">
                            <label for="tgLahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="date" name="tgLahir" class="form-control" id="tgLahir" required>
                            </div>
                        </div>
                        <!-- Jenis Kelamin -->
                        <div class="form-group row">
                            <label for="jenkel" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="alertGender" class="row" style="display: none;">
                            <div class="col-12">
                                <div class="alert alert-danger errorGender" role="alert">
                                </div>
                            </div>
                        </div>
                        <!-- Alamat -->
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" name="alamat" class="form-control" id="alamat" required>
                            </div>
                        </div>
                        <!-- Kecamatan -->
                        <div class="form-group row">
                            <label for="kecamatan" class="col-sm-4 col-form-label">Kecamatan</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="kecamatan" name="kecamatan" required onchange="getKec(this);">
                                    <option value="" selected disabled>Pilih Kecamatan</option>
                                    <?php foreach ($kecamatan as $kec) { ?>
                                        <option value="<?= $kec['idKec']; ?>"><?= $kec['Kecamatan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- Kelurahan -->
                        <div class="form-group row">
                            <label for="kelurahan" class="col-sm-4 col-form-label">Kelurahan</label>
                            <div class="col-sm-8">
                                <select class="form-control kelurahan" id="kelurahan" name="kelurahan" required>
                                    <option selected disabled value="">Pilih Kelurahan</option>
                                </select>
                            </div>
                        </div>
                        <!-- Agama -->
                        <div class="form-group row">
                            <label for="agama" class="col-sm-4 col-form-label">Agama</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="agama" name="agama" required>
                                    <option>--Pilih Agama--</option>
                                    <option value="1">Islam</option>
                                    <option value="2">Protestan</option>
                                    <option value="3">Katolik</option>
                                    <option value="4">Hindu</option>
                                    <option value="5">Buddha</option>
                                    <option value="6">Konghucu</option>
                                    <option value="7">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telepon" class="col-sm-4 col-form-label">Telepon</label>
                            <div class="col-sm-8">
                                <input type="text" name="telepon" class="form-control" id="telepon" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">E-mail<span class="req">*</span></label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="perhitungan" class="col-sm-4 col-form-label"><?= $text; ?></label>
                            <div class="col-sm-8">
                                <input type="number" name="jawabCpt" class="form-control" id="perhitungan">
                                <input type="hidden" name="hslbenar" value="<?= md5($hasil); ?>">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <p class="small"><i><span class="req">*</span>boleh kosong jika tidak ada</i></p>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-auto">
                                <a href="/home/index" type="button" class="btn btn-warning">Batal</a>
                                <button type="submit" role="button" class="btn btn-primary btndaftar">Daftar</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6 footer-contact">
                        <h4>Sekretariat Daerah Bidang Kesejahteraan Rakyat</h4>
                        <p>
                            Komp. Balai Kota,
                            JL. Jend. Sudirman, No. 2 <br>
                            Kp. Baru, Kec. Ps. Kliwon<br>
                            Kota Surakarta, Jawa Tengah 57133 <br><br>
                            <strong>Phone:</strong> (0271) 644315<br>
                            <!-- <strong>Email:</strong> info@example.com<br> -->
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright">
                    &copy; Copyright <strong><span>Puslogin UMS</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/counterup/counterup.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/venobox/venobox.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>/assets/js/main.js"></script>

    <script>
        // Load Kelurahan
        function getKec(sel) {
            var idKec = sel.value;
            $.ajax({
                url: "<?= site_url('home/load_kelurahan'); ?>",
                type: "POST",
                dataType: "json",
                data: {
                    idKec: idKec
                },
                success: function(response) {
                    $('.kelurahan').html(response.data);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });

        }

        $(document).ready(function() {
            $('.formdaftar').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('.btndaftar').prop('disabled', true);
                        $('.btndaftar').html('<i class="fa fa-spin fa-spinner"></i>');
                    },
                    complete: function() {
                        $('.btndaftar').prop('disabled', false);
                        $('.btndaftar').html('Daftar');
                    },
                    success: function(response) {
                        if (response.error) {
                            if (response.error.Nik) {
                                swal("Mohon Maaf!", response.error.Nik, "error");
                                // $('.errortext').html(response.error.Nik);
                            } else {
                                $('#alertError').css("display", "none");
                                $('.errortext').html('');
                            }
                            if (response.error.gender) {
                                swal("Mohon Maaf!", response.error.gender, "error");
                                // $('.errorGender').html(response.error.gender);
                            } else {
                                $('#alertGender').css("display", "none");
                                $('.errorGender').html('');
                            }
                        }
                        if (response.a) {
                            if (response.a.b) {
                                swal("Mohon Maaf!", response.a.b, "error");
                                $('.errortext').html(response.a.b);
                            } else {
                                $('#alertError').css("display", "none");
                                $('.errortext').html('');
                            }
                        }
                        if (response.berhasil) {
                            swal({
                                title: response.berhasil.no,
                                text: "Selamat Anda berhasil terdaftar. Silahkan konfirmasi dengan kelurahan setempat dengan no pendaftaran diatas",
                                icon: "success",
                                button: "Ok",
                            }).then((value) => {
                                window.location = response.berhasil.cetak;
                            });
                            // window.location = response.berhasil.link;
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });

                return false;
            });
        });
    </script>




</body>

</html>