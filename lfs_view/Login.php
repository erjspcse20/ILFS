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
    <?php
    $this->load->view('pages/'.$pageName);
    ?>

</div>
</body>
</html>
