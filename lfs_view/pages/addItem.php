<?php
$Itemid=isset($UserData["uuid"])?$UserData["uuid"]:"";
$FirstName=isset($UserData["f_name"])?$UserData["f_name"]:"";
$LastName=isset($UserData["l_name"])?$UserData["l_name"]:"";
$Mobile=isset($UserData["mobile"])?$UserData["mobile"]:"";
$Email=isset($UserData["email"])?$UserData["email"]:"";
?>
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

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Party<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <select name="party" id="party" class="selectdropdown">
                                        </select>
                                        <span id="agent-error" style="color:#F00;"><?=form_error('party')?></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Party Address<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="partyaddress" name="partyaddress" disabled required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Party Mobile <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name"  disabled class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Party Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="partyemail" disabled name="partyemail" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hsn Code <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="hsn" id="hsn" class="selectdropdown">
                                        </select>
                                        <span id="hsn-error" style="color:#F00;"><?=form_error('hsn')?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Product <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="product" id="product" class="selectdropdown">
                                        </select>
                                        <span id="agent-error" style="color:#F00;"><?=form_error('product')?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <p align="center"><button type="submit" class="btn btn-success">Submit</button></p>
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
</script>