<?php
$Productid=isset($ProductData["uuid"])?$ProductData["uuid"]:"";
$Hsnid=isset($ProductData["hsn_id"])?$ProductData["hsn_id"]:"";
$Name=isset($ProductData["name"])?$ProductData["name"]:"";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="<?=base_url('lfs_view/')?>assets/select2/select2.css" rel="stylesheet">
    <script src="<?=base_url('lfs_view/')?>assets/select2/select2.js"></script>
</head>
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
                    <h2>Add Product <small></small></h2>
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

                    <form class="form-horizontal form-label-left input_mask" name="usrform" id="usrform" method="post" action="<?=(($Productid=="")?base_url('welcome-to-ilfs-add-product.jsp'):base_url('welcome-to-ilfs-update-product.jsp'))?>" enctype="multipart/form-data">
                        <input type="hidden" name="productid" id="productid" value="<?=$Productid?>" />
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <label for="country" class="col-md-4 col-form-label">Hsn</label>
                            <div class="col-md-8">
                                <select name="hsn" id="hsn" class="selectdropdown">
                                </select>
                                <span id="agent-error" style="color:#F00;"><?=form_error('hsn')?></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control" id="Name" value="<?=$Name?>" name="Name" placeholder="Product Name">
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-5">
                                <button type="submit" name="addProduct" id="addProduct"  class="btn btn-success"><?=($Productid=="")?"Save":"Update"?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $("#addProduct").click(function()
    {
        if($("#hsn").val()=="")
        {
            alert("Hsn code is mendetory");
            return false;
        }
        if($("#Name").val()=="")
        {
            alert("product Name is mendetory");
            return false;
        }


    });
    var qryw="";
    $.ajax({
        type:"POST",
        url:'<?php echo base_url("welcome-to-ilfs-select-hsn.jsp")?>',
        dataType: 'html',
        data:qryw,
        success: function(res){
            if (res)
            {
                $('#hsn').html("");
                var json = $.parseJSON(res);
                $('#hsn').append('<option value="">Select Hsn</option>');
                for (var i=0;i<json.length;++i)
                {
                    if(json[i].uuid.toUpperCase()=="<?=strtoupper($Hsnid)?>")
                    {
                        $('#hsn').append('<option value="'+json[i].uuid+'" selected="selected">'+json[i].name+'</option>');
                    }
                    else
                    {
                        $('#hsn').append('<option value="'+json[i].uuid+'">'+json[i].name+'</option>');
                    }
                }
                $("#hsn").select2();

            }
        }
    });
</script>