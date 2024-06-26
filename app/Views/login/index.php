<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/node_modules/@fortawesome\fontawesome-free\css\all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- CSS Libraries -->
    <!-- <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/node_modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assets/css/components.css">
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                         <img src="<?= base_url() ?>/assets/assets/img/avatar/logo.svg" alt="logo" width="120">
                        <h4 class="text-dark font-weight-bold">Aplikasi Seminar Proposal</h4>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Login</h4></div>
                        <div class="card-body">
                                <?= form_open('login/cekUser'); ?>
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <?php
                                    $isInvalidUser = (session()->getFlashdata('errIdUser')) ? 'is-invalid' : '';
                                    ?>
                                    <label for="email">Username</label>
                                    <input id="email" type="text" class="form-control <?= $isInvalidUser ?>"  name="username_user" >
                                    <?php
                                    if (session()->getFlashdata('errIdUser')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback">
                                            ' . session()->getFlashdata('errIdUser') . '
                                        </div>';
                                    }
                                    ?>
                                </div>

                                <div class="form-group">
                                    <?php
                                        $isInvalidPassword = (session()->getFlashdata('errPassword')) ? 'is-invalid' : '';
                                    ?>
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control <?= $isInvalidPassword ?>" name="password_user" >
                                    <?php
                                    if (session()->getFlashdata('errPassword')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback">
                                            ' . session()->getFlashdata('errPassword') . '
                                        </div>';
                                    }
                                    ?>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
<!--                            </form>-->
                            <?=form_close()?>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Setyo Adi Sasono 2024
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
<!-- <script src="../assets/js/stisla.js"></script> -->
<script src="<?= base_url() ?>/assets/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="<?= base_url() ?>/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<!-- <script src="../assets/js/scripts.js"></script>
<script src="../assets/js/custom.js"></script> -->
<script src="<?= base_url() ?>/assets/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/assets/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
</body>
</html>

