<!DOCTYPE html>
<html>
  <head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="view-account">
            <section class="module">
                <div class="module-inner">
                    <div class="content-panel">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <fieldset class="fieldset">
                                <h3 class="fieldset-title">Personal Info</h3>
                                <div style="float: right;">
                                    <a href="<?php echo base_url(); ?>users">Welcome</a>
                                    <br>
                                    <a href="<?php echo base_url(); ?>auth/logout">Logout</a>
                                </div>
                                <div class="form-group avatar">
                                    <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                        <?php if (!empty($users->user_profile)) { ?>
                                            <img class="img-rounded img-responsive" src="<?php echo $users->user_profile; ?>" alt="">
                                        <?php } else { ?>
                                            <img class="img-rounded img-responsive" src="<?php echo $this->config->item('assets_url'); ?>dist/img/avatar5.png" alt="">
                                        <?php } ?>
                                    </figure>
                                    <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                        <input type="file" name="user_profile" />
                                        <input type="hidden" name="old_user_profile" value="<?php if (isset($user_profile) && $user_profile!="") { echo $user_profile; }?>" />  
                                        <?php 
                                        if(isset($user_profile_err) && !empty($user_profile_err)) 
                                        { 
                                            foreach($user_profile_err as $key => $error)
                                            {
                                                echo "<div class=\"error-msg\"></div>"; 
                                            } 
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">First Name</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="first_name" value="<?php echo set_value("first_name", html_entity_decode($users->first_name)); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Last Name</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="last_name" value="<?php echo set_value("last_name", html_entity_decode($users->last_name)); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="email" value="<?php echo set_value("email", html_entity_decode($users->email)); ?>">
                                    </div>
                                </div>
                            </fieldset>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                    <input class="btn btn-primary" type="submit" value="Update Profile">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
  </body>
</html>