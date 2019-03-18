<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=$this->config->item('title');?></title>
    <style>
        .error-red{
            color: red;
        }
    </style>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="<?=base_url('lfs_view/')?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('lfs_view/')?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url('lfs_view/')?>assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" href="<?=base_url('lfs_view/')?>assets/vendors/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?=base_url('lfs_view/')?>assets/build/css/custom.min.css">
</head>

<body  class="login">
<div class="login_wrapper">
    <p align="center" style="color:#F00;">
        <?php if($msg=$this->session->flashdata('feedback')): ?>

            <strong style="color:#F00">
                <?=$msg?>
            </strong>

        <?php endif; ?>
    </p>
    <div class="animate form login_form">
        <section class="login_content">
            <form action="<?=base_url('ilfs-login.jsp')?>" method="post" enctype="multipart/form-data">
                <h1>Login Form</h1>
                <div>
                    <input type="text" class="form-control" name="Username" id="Username" placeholder="Username" required="" />
                </div>
                <div>
                    <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" required="" />
                </div>
                <div>
                    <input type="submit" id="login" name="login" class="register" value="Login">
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                        <h1><i class="fa fa-paw"></i> If & Ls</h1>
                        <p>©2016 All Rights Reserved. If & Ls. Design & Develop by <a href="http://www.hindustanweb.com/" target="_blank">Hindustan Web</a></p>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
</body>
</html>
