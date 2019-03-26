<?php
$Userid=isset($UserData["uuid"])?$UserData["uuid"]:"";
$FirstName=isset($UserData["f_name"])?$UserData["f_name"]:"";
$LastName=isset($UserData["l_name"])?$UserData["l_name"]:"";
$Mobile=isset($UserData["mobile"])?$UserData["mobile"]:"";
$Email=isset($UserData["email"])?$UserData["email"]:"";
$UserType=isset($UserData["type"])?$UserData["type"]:"";
?>
<link href="<?=base_url('lfs_view/')?>assets/select2/select2.css" rel="stylesheet">
<script src="<?=base_url('lfs_view/')?>assets/select2/select2.js"></script>
<div class="right_col" role="main">
<div class="row">
    <p align="center" style="color:#F00;">
        <?php if($msg=$this->session->flashdata('feedback')): ?>

            <strong style="color:#F00">
                <?=$msg?>
            </strong>

        <?php endif; ?>
        <?=(isset($ErrorMsg)?$ErrorMsg:"");?>
    </p>

    <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add User <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br />

                <form class="form-horizontal form-label-left input_mask" name="usrform" id="usrform" method="post" action="<?=(($Userid=="")?base_url('welcome-to-ilfs-add-user.jsp'):base_url('welcome-to-ilfs-update-user.jsp'))?>" enctype="multipart/form-data">
                    <input type="hidden" name="userid" id="userid" value="<?=$Userid?>" />
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" value="<?=$FirstName?>" name="FirstName" id="FirstName" placeholder="First Name">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="LastName" value="<?=$LastName?>" name="LastName" placeholder="Last Name">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" value="<?=$Email?>" name="Email" id="Email" placeholder="Email">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="Phone" value="<?=$Mobile?>" name="Phone" placeholder="Phone">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                    </div>

                    <?php
                    if($Userid=="") {
                        ?>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" name="UserName" id="UserName"
                                   placeholder="User Name(unique)">

                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" name="NewPassword"
                                   id="NewPassword" placeholder="password">

                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control" name="ConfirmPassword" id="ConfirmPassword"
                                   placeholder="Confirm Password">
                            <span id="matcherr"></span>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="first-name">User Type</label>
                        <div class="col-md-9">
                            <select name="UserType" id="UserType" class="selectdropdown">
                                <option value="1" <?=($UserType==1)?"selected='selected'":""?>>Staff</option>
                                <option value="0" <?=($UserType==0)?"selected='selected'":""?>>Administrator</option>
                            </select>
                        </div>

                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-5">
                            <button type="submit" name="addUser" id="addUser"  class="btn btn-success"><?=($Userid=="")?"Save":"Update"?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>

    $("#addUser").click(function()
    {
        var password = $("#NewPassword").val();
        var confirmPassword = $("#ConfirmPassword").val();
        if(password != confirmPassword)
        {
            $("#matcherr").html("Passwords do not match!");
            $("#ConfirmPassword").css("color", "red");
            return false;
        }
        if($("#NewPassword").val().length <4)
        {
            $("#NewPassword").css("border", "1px solid #1db464");
            $("#matcherr").html("Passwords length must be greater then 4!");
            $("#NewPassword").focus();
            return false;
        }

    });
    $('#UserType').select2();
</script>