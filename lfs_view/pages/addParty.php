<?php
$Partyid=isset($UserData["uuid"])?$UserData["uuid"]:"";
$Name=isset($UserData["name"])?$UserData["name"]:"";
$Mobile=isset($UserData["mobile"])?$UserData["mobile"]:"";
$Email=isset($UserData["email"])?$UserData["email"]:"";
?>
<div class="right_col" role="main">
    <div class="row">
        <p align="center" style="color:#29b313;">
            <?php if($msg=$this->session->flashdata('feedback')): ?>

                <strong style="color:#29b313">
                    <?=$msg?>
                </strong>

            <?php endif; ?>
            <?=(isset($ErrorMsg)?$ErrorMsg:"");?>
        </p>

        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Pary <small></small></h2>
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

                    <form class="form-horizontal form-label-left input_mask" name="usrform" id="usrform" method="post" action="<?=(($Partyid=="")?base_url('welcome-to-ilfs-add-party.jsp'):base_url('welcome-to-ilfs-update-party.jsp'))?>" enctype="multipart/form-data">
                        <input type="hidden" name="partyid" id="partyid" value="<?=$Partyid?>" />
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" value="<?=$Name?>" name="Name" id="Name" placeholder="First Name">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" value="<?=$Email?>" name="Email" id="Email" placeholder="Email">
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control" id="Phone" value="<?=$Mobile?>" name="Phone" placeholder="Phone">
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-5">
                                <button type="submit" name="addUser" id="addUser"  class="btn btn-success"><?=($Partyid=="")?"Save":"Update"?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>