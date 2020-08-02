<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP Generator | Login</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo base_url(); ?>assets/dist/css/toastr.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet">
    <meta name="google-signin-client_id" content="<?php echo $this->config->item('google_client_id'); ?>">
</head>
<body>
<center><h1><b>Auth Module<b></h1></center>
<br>
<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="col-md-12">
                        <center>
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger" style="margin: 10px;">
                                <button type="button" class="close" data-close="alert"></button>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('message')): ?>
                            <div class="alert alert-success" style="margin: 10px;">
                                <button type="button" class="close" data-close="alert"></button>
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                        <?php endif; ?>
                        </center>
                    </div>
                    <div class="panel-heading">
                        <br><br>
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="" method="post" role="form" style="display: block;">

                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                    <div class="form-group">
                                        <input type="text" name="identity" id="username" tabindex="1" class="form-control" placeholder="Email-Id" value="<?php echo set_value('identity'); ?>" required="">

                                        <?php echo form_error('identity', '<span class="err-msg">', '</span>') ?>

                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required="" value="<?php echo set_value('password'); ?>">

                                        <?php echo form_error('password', '<span class="err-msg">', '</span>') ?>

                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="<?php echo $facebook_auth_url; ?>">
                                                        <button class="loginBtn loginBtn--facebook" type="button">
                                                            Login with Facebook
                                                        </button>
                                                    </a>
                                                    <a href="<?php echo $google_auth_url; ?>">
                                                        <button id="login_with_google_btn" type="button" class="loginBtn loginBtn--google ">
                                                            Login with Google
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </form>

                                <form id="register-form" action="<?php echo base_url(); ?>auth/register" method="post" role="form" style="display: none;">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="form-group">
                                        <input type="text" name="name" id="reg_name" tabindex="1" class="form-control" placeholder="Full Name" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="reg_email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="reg_password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="button" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now" onclick="registration();">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <form id="forgot-form" action="" method="post" role="form" style="display: none;">

                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                    <div class="form-group">
                                        <input type="text" name="identity" id="res_username" tabindex="1" class="form-control" placeholder="Email-Id" value="<?php echo set_value('identity'); ?>" required="">
                                        <?php echo form_error('identity', '<span class="err-msg">', '</span>') ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="button" onclick="send_reset_pass()" name="forgot-submit" id="forgot-submit" tabindex="4" class="form-control btn btn-login" value="Reset Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="javascript:void(0)" tabindex="5" onclick="$('#login-form-link').click()" class="login-form-link" id="login-form-link">Login</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/dist/js/jquery-2.1.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/toastr.min.js"></script>
    <script type="text/javascript">
        $(function() {

            $('#login-form-link').click(function(e) {
                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $("#forgot-form").fadeOut(100);
                $('#forgot-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#register-form-link').click(function(e) {
                $("#register-form").delay(100).fadeIn(100);

                $("#login-form").fadeOut(100);
                $('#login-form-link').removeClass('active');

                $("#forgot-form").fadeOut(100);
                $('#forgot-form-link').removeClass('active');

                $(this).addClass('active');
                e.preventDefault();
            });

            $('#forgot-form-link').click(function(e) {
                $("#forgot-form").delay(100).fadeIn(100);
                $("#login-form").fadeOut(100);
                $('#login-form-link').removeClass('active');
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });

        });

    </script>

    <?php $this->load->view('auth/tp_auth'); ?>

    <script type="text/javascript">
        
        function registration()
        {
            $('#register-submit').attr('disabled', 'disabled');
            var password = $("#reg_password").val();
            var name = $("#reg_name").val();
            var email = $("#reg_email").val();
            var confirm_password = $("#confirm-password").val();

            if (name=="") {
                toastr.error("Please enter your Name.", "Error!!", {
                    "timeOut": "5000",
                });
                $('#register-submit').removeAttr('disabled');
                return false;
            }

            if (email=="") {
                toastr.error("Please enter your Email.", "Error!!", {
                    "timeOut": "5000",
                });
                $('#register-submit').removeAttr('disabled');
                return false;
            }

            if (password=="") {
                toastr.error("Please enter Password.", "Error!!", {
                    "timeOut": "5000",
                });
                $('#register-submit').removeAttr('disabled');
                return false;
            }

            if (confirm_password=="") {
                toastr.error("Please enter Confirm Password.", "Error!!", {
                    "timeOut": "5000",
                });
                $('#register-submit').removeAttr('disabled');
                return false;
            }

            if (confirm_password!=password) {
                toastr.error("Password and Confirm Password should be same.", "Error!!", {
                    "timeOut": "5000",
                });
                $('#register-submit').removeAttr('disabled');
                return false;
            }

            var form_data = $('#register-form').serialize();
            $.ajax({
            url:"<?php echo base_url(); ?>auth/register",
            data:form_data,
            type:"post",
            beforeSend:function() {
                
            },
            success:function(result) {
                $('#register-submit').removeAttr('disabled');
                var arr = JSON.parse(result);
                if(arr['error']!=1)
                {
                    toastr.success(arr['message'], "Success!!", {
                        "timeOut": "5000",
                    });
                    setTimeout(function(){parent.location.reload();},2000);
                }
                else
                {
                    toastr.error(arr['message'], "Error!!", {
                        "timeOut": "5000",
                    });
                }
            },
            error:function() {
                $('#register-submit').removeAttr('disabled');
            }
        });
        }

        function send_reset_pass(){
            var email = $('#res_username').val();

            if (email=='') {
                toastr.error("Please enter email.", "Error!!", {
                    "timeOut": "5000",
                });
                return false;
            }
            var form_data = $('#forgot-form').serialize();
            $.ajax({
            url:"<?php echo base_url(); ?>auth/forgot_password",
            data:form_data,
            type:"post",
            beforeSend:function() {
                
            },
            success:function(result) {
                    var arr = JSON.parse(result);
                    if(arr['error']!=1)
                    {
                        toastr.success(arr['message'], "Success!!", {
                            "timeOut": "5000",
                        });
                        setTimeout(function(){parent.location.reload();},5000);
                    }
                    else
                    {
                        toastr.error(arr['message'], "Error!!", {
                            "timeOut": "5000",
                        });
                    }
                },
                error:function() {
                }
            });
        }
    </script>

</body>
</html>