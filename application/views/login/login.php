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
        <!-- notify js Fremwork -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bower_components/pnotify/css/pnotify.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bower_components/pnotify/css/pnotify.brighttheme.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bower_components/pnotify/css/pnotify.buttons.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bower_components/pnotify/css/pnotify.history.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bower_components/pnotify/css/pnotify.mobile.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/pages/pnotify/notify.css');?>">
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
        <!-- Google reCaptcha 
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.mCustomScrollbar.concat.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/script.js');?>"></script>-->
    </head>
    <body>
        <div class="row">
            <div class="col-md-4" style="padding: 0px;">
                <div class="card">
                    <div class="card-header">
                        <img src="<?php echo base_url('assets/images/logo/logo_rki_new 1.png');?>">
                        <br>
                        <h5>Selamat Datang</h5>
                        <span>Silahkan masukkan akun Anda</span>
                        <?php if($this->session->flashdata('message_login_error')): ?>
			            <div class="background-warning" id="pnotify-stack-custom-top">
					    <?php echo $this->session->flashdata('message_login_error') ?>
			            </div>
		                <?php endif ?>
                    </div>
                    <form action="<?php echo base_url('login/cek_login'); ?>" method="post" class="j-pro" id="j-pro" novalidate="">
                        <div class="j-content">
                            <div class="j-unit">
                                <div class="j-input">
                                    <label class="j-icon-right" for="login">
                                        <i class="icofont icofont-ui-user"></i>
                                    </label>
                                    <input type="text" id="login" name="login" placeholder="Username/NIS">
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
                        </div>
                        <div class="j-footer" style="align-items:center; text-align:center;">
                            <br><br><br>
                            <button type="submit" class="btn btn-primary" style="display: block;margin: 10px 0;padding: 10px;width: 100%;border-radius: 5px; background: #06A3DE;">Masuk</button>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            BELUM PUNYA AKUN?<br><br><br><a href="#"><u><b>DAFTAR</b></u></a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8" style="padding: 0px;">
                <img src="<?php echo base_url('assets/images/logo/login.png');?>" style="width:100%; height:100%; object-fit:cover;">
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery/js/jquery.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery-ui/js/jquery-ui.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/popper.js/js/popper.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/bootstrap/js/bootstrap.min.js');?>"></script>
        <!-- jquery slimscroll js -->
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js');?>"></script>
        <!-- modernizr js -->
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/modernizr/js/modernizr.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/modernizr/js/css-scrollbars.js');?>"></script>
        <!-- pnotify js -->
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/pnotify/js/pnotify.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/pnotify/js/pnotify.desktop.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/pnotify/js/pnotify.buttons.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/pnotify/js/pnotify.confirm.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/pnotify/js/pnotify.callbacks.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/pnotify/js/pnotify.animate.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/pnotify/js/pnotify.history.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/pnotify/js/pnotify.mobile.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/pnotify/js/pnotify.nonblock.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/pages/pnotify/notify.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/script.js');?>"></script>
    </body>
</html>