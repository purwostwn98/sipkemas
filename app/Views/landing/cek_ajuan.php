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
    <div class="container mt-5">
        <div class="row justify-content-md-center mb-3">
            <div class="col-lg-7 col-md-9">
                <div class="card o-hidden shadow-lg border-bottom-info mb-2">
                    <div class="card-header bg-info text-white text-center">
                        <strong>Cek Ajuan</strong>
                    </div>
                    <div class="card-body">
                        <!-- Form Pendafaran -->
                        <div id="alertError" class="row" style="display: none;">
                            <div class="col-12">
                                <div class="alert alert-warning errortext" role="alert">
                                </div>
                            </div>
                        </div>
                        <?= form_open("/home/prosesCekAjuan", ['class' => 'cekAjuan']); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" id="gocode" name="gocode" value="">
                        <!-- No Ajuan -->
                        <div class="form-group row">
                            <label for="noAjuan" class="col-sm-4 col-form-label">Masukkan No. Ajuan</label>
                            <div class="col-sm-8">
                                <input type="text" name="noAjuan" class="form-control" id="noAjuan" placeholder="Nomor Ajuan">
                                <div class="invalid-feedback invalidNIK text-center"></div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="g-recaptcha" data-sitekey="6LdlXhwbAAAAACTiuY1WoMackLIWSIVG6FDH6Do8"></div>
                            <span class="text-danger" id="captcha_error"></span>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-auto">
                                <a href="/home/index" role="button" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-info">Cek Ajuan</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
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
                                $('#alertError').css("display", "block");
                                $('.errortext').html(response.error.Nik);
                            } else {
                                $('#alertError').css("display", "none");
                                $('.errortext').html('');
                            }
                            if (response.error.gender) {
                                $('#alertGender').css("display", "block");
                                $('.errorGender').html(response.error.gender);
                            } else {
                                $('#alertGender').css("display", "none");
                                $('.errorGender').html('');
                            }
                        }
                        if (response.a) {
                            if (response.a.b) {
                                $('#alertError').css("display", "block");
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