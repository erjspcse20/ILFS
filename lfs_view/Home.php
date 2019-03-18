<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=$this->config->item('title');?></title>
    <script src="<?=base_url('lfs_view/')?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url('lfs_view/')?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=base_url('lfs_view/')?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('lfs_view/')?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url('lfs_view/')?>assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" href="<?=base_url('lfs_view/')?>assets/vendors/iCheck/skins/flat/green.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('lfs_view/')?>assets/assets/vendors/bootstrap-daterangepicker/daterangepicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url('lfs_view/')?>assets/build/css/custom.min.css"/>
<style type="text/css">
    .required{
        color: red;
    }
</style>
</head>

<body>
<div class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php
            $this->load->view('pages/leftMenu.php');
            $this->load->view('pages/header.php');
            $this->load->view('pages/'.$pageName);
            $this->load->view('pages/footer.php');
            ?>
        </div>
    </div>
</div>
</body>
</html>


<script src="<?=base_url('lfs_view/')?>assets/vendors/DateJS/build/date.js"></script>
<script src="<?=base_url('lfs_view/')?>assets/build/js/custom.min.js"></script>
<script src="<?=base_url('lfs_view/')?>assets/build/js/rocket-loader.min.js"></script>
