<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="#">
        <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
        <meta name="author" content="#">
        <!-- Favicon icon -->
        <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico');?>" type="image/x-icon">
        <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bower_components/bootstrap/css/bootstrap.min.css');?>">
        <!-- themify-icons line icon -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/icon/themify-icons/themify-icons.css');?>">
        <!-- ico font -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/icon/icofont/css/icofont.css');?>">
        <!-- feather Awesome -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/icon/feather/css/feather.css');?>">
        <!-- jpro forms css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/pages/j-pro/css/demo.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/pages/j-pro/css/font-awesome.min.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/pages/j-pro/css/j-pro-modern.css');?>">
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
        <!-- Google reCaptcha -->
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.mCustomScrollbar.css');?>">
    </head>
    <body>
    <div class="card">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                <img src="<?php echo base_url('assets/img/logo_rki_new 1.png');?>">
                <br>
                <h5>Selamat Datang</h5>
                <span>Silahkan masukkan akun Anda</span>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="card-block" style="display: flex; flex-direction:row;">
            <div class="col-md-6">
                <form action="login/action.php" method="post" class="j-pro" id="j-pro" novalidate="">
                    <div class="j-content">
                        <div class="j-unit">
                            <div class="j-input">
                                <label class="j-icon-right" for="login">
                                    <i class="icofont icofont-ui-user"></i>
                                </label>
                                <input type="text" id="login" name="login" placeholder="login anda...">
                            </div>
                        </div>
                        <div class="j-unit">
                            <div class="j-input">
                                <label class="j-icon-right" for="password">
                                    <i class="icofont icofont-lock"></i>
                                </label>
                                <input type="password" id="password" name="password" placeholder="password anda...">
                            </div>
                        </div>
                        <div class="j-unit">
                            <div class="j-input">
                                <input type="checkbox" id="ingat" name="ingat" value="1">&nbsp;Ingat password saya
                                <span><a href="#" class="j-link" style="position:absolute;right:0px;"><i class="fa fa-question-circle"></i>&nbsp;Reset password & lupa NIS/username</a></span>
                            </div>
                        </div>
                        <div class="j-unit">
                            <div class="g-recaptcha" data-sitekey="6LeV7gwUAAAAAKOX-B12lNcg1ids8dFylMP6XihO"></div>
                        </div>
                        <div class="j-response"></div>
                    </div>
                    <div class="j-footer">
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6" style="background:#06A3DE;opacity:0.7;">
                <img src="<?php echo base_url('assets/img/bglogin.png');?>" style="width: 100%;height:100%;object-fit:cover;opacity:1;">
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                <span style="position:absolute;right:250px;">Copyright&copy;<?php echo date('Y');?></span>
                </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>