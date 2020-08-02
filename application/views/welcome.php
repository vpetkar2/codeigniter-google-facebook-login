<!DOCTYPE html>
<html>
  <head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>
  <body>
    <!-- http://www.jquery2dotnet.com -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="alert alert-success">
                   <span class="glyphicon glyphicon-ok"></span> <strong>Welcome <?php echo $user_data->first_name; ?> !!</strong>
                    <hr class="message-inner-separator">
                </div>
                <br>
                <a href="<?php echo base_url(); ?>users/update_user">Update Profile</a>
                <br>
                <a href="<?php echo base_url(); ?>auth/logout">Logout</a>
            </div>
        </div>
    </div>

  </body>
</html>