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
                    <h2>Reset Password <small></small></h2>
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

                    <div class="grids-heading gallery-heading signup-heading">

                    </div>
                    <p align="center" style="color:#F00;">
                        <?php if($msg=$this->session->flashdata('feedback')): ?>

                            <strong style="color:#F00">
                                <?=$msg?>
                            </strong>

                        <?php endif; ?>
                    </p>
                    <form action="<?=base_url('welecome-to-ilfs-change-password-start.jsp')?>" method="post">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" name="OldPassword" id="OldPassword" placeholder="Old Password">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password">
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password">
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            <span id="matcherr"></span>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-5">
                                <button type="submit" name="changepassword" id="changepassword"  class="btn btn-success">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function checkPasswordMatch() {
        //alert(1);
        var password = $("#NewPassword").val();
        var confirmPassword = $("#ConfirmPassword").val();
        if (password != confirmPassword)
        {
            $("#matcherr").html("Passwords do not match!");
            $("#matcherr").css("color", "red");
            $("#ConfirmPassword").css("color", "red");
            return false;
        }
        else
        {
            $("#matcherr").css("color", "green");
            $("#matcherr").html("Passwords match.");
            $("#ConfirmPassword").css("color", "green");
        }
    }
    $("#ConfirmPassword").keyup(checkPasswordMatch);
    $("#changeUserPassword").click(function()
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
</script>