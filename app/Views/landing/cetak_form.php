<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SipKe-Mas Surakarta</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>/assets/img/favicon.png" rel="icon">
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

    <!-- Google ReCaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Sweat Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-lg-9">
                <div class="card shadow mb-4">
                    <div class="card-header bg-info py-3 d-sm-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">Data Pemohon</h6>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                            <i class="ri-printer-line text-white m-0"></i>
                            <span class="text-white m-0"> Cetak</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row bg-white darker">
                            <div class="col-md-6">
                                <label for="">
                                    <b>Nomor Formulir</b>
                                    <br>
                                    <span class="text-primary">
                                        <i>Form Number</i>
                                    </span></label>
                            </div>
                            <div class="col-md-6">
                                <b><?= $pemohon['noFormulir']; ?></b>
                            </div>
                        </div>
                        <hr class="m-0 p-1">
                        <div class="row bg-white darker">
                            <div class="col-md-6">
                                <label for="">
                                    <b>Nomor Induk Kependudukan (NIK)</b>
                                    <br>
                                    <span class="text-primary">
                                        <i>National Identification Number</i>
                                    </span></label>
                            </div>
                            <div class="col-md-6">
                                <?= $pemohon['NIK']; ?>
                            </div>
                        </div>
                        <hr class="m-0 p-1">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">
                                    <b>Nama Lengkap</b>
                                    <br>
                                    <span class="text-primary">
                                        <i>Full Name</i>
                                    </span></label>
                            </div>
                            <div class="col-md-6">
                                <?= $pemohon['Nama']; ?>
                            </div>
                        </div>
                        <hr class="m-0 p-1">
                        <div class="row bg-white darker">
                            <div class="col-md-6">
                                <label for="">
                                    <b>Tempat, Tanggal Lahir</b>
                                    <br>
                                    <span class="text-primary">
                                        <i>Place, Date of Birth</i>
                                    </span></label>
                            </div>
                            <?php
                            $tgl = explode('-', $pemohon['tgLahir']);
                            $bulan = array(
                                1 =>   'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember'
                            );
                            ?>
                            <div class="col-md-6">
                                <?= $pemohon['tempatLahir']; ?>, <?= $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0]; ?>
                            </div>
                        </div>
                        <hr class="m-0 p-1">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">
                                    <b>Jenis Kelamin</b>
                                    <br>
                                    <span class="text-primary">
                                        <i>Gender</i>
                                    </span></label>
                            </div>
                            <div class="col-md-6">
                                <?= ($pemohon['gender'] == 1) ? 'Laki-laki' : 'Perempuan' ?>
                            </div>
                        </div>
                        <hr class="m-0 p-1">
                        <div class="row bg-white darker">
                            <div class="col-md-6">
                                <label for="">
                                    <b>Alamat</b>
                                    <br>
                                    <span class="text-primary">
                                        <i>Address</i>
                                    </span></label>
                            </div>
                            <div class="col-md-6">
                                <?= $pemohon['Alamat']; ?>
                            </div>
                        </div>
                        <hr class="m-0 p-1">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">
                                    <b>Kelurahan</b>
                                    <br>
                                    <span class="text-primary">
                                        <i>Sub-district</i>
                                    </span></label>
                            </div>
                            <div class="col-md-6">
                                <?= $pemohon['idKel']; ?>
                            </div>
                        </div>
                        <hr class="m-0 p-1">
                        <div class="row bg-white darker">
                            <div class="col-md-6">
                                <label for="">
                                    <b>Kecamatan</b>
                                    <br>
                                    <span class="text-primary">
                                        <i>Districts</i>
                                    </span></label>
                            </div>
                            <div class="col-md-6">
                                Serengan
                            </div>
                        </div>
                        <hr class="m-0 p-1">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">
                                    <b>Agama</b>
                                    <br>
                                    <span class="text-primary">
                                        <i>Religion</i>
                                    </span></label>
                            </div>
                            <div class="col-md-6">
                                <?= $pemohon['Agama']; ?>
                            </div>
                        </div>
                        <hr class="m-0 p-1">
                        <div class="row bg-white darker">
                            <div class="col-md-6">
                                <label for="">
                                    <b>Telepon</b>
                                    <br>
                                    <span class="text-primary">
                                        <i>Telephone</i>
                                    </span></label>
                            </div>
                            <div class="col-md-6">
                                <?= $pemohon['telepon']; ?>
                            </div>
                        </div>
                        <hr class="m-0 p-1">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">
                                    <b>E-mail</b>
                                    <br>
                                    <span class="text-primary">
                                        <i>E-mail</i>
                                    </span></label>
                            </div>
                            <div class="col-md-6">
                                <?= $pemohon['email']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6 footer-contact">
                        <h4>Forum Kesejahteraan Rakyat Kota Surakarta</h4>
                        <p>
                            JL. Jend. Sudirman, No. 2 <br>
                            Kp. Baru, Kec. Ps. Kliwon<br>
                            Kota Surakarta, Jawa Tengah 57133 <br><br>
                            <strong>Phone:</strong> (0271) 644308<br>
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
                                window.location = 'http://sipkemas.puslogin.com/';
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