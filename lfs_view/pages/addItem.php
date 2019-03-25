<?php
$Itemid=isset($UserData["uuid"])?$UserData["uuid"]:"";
$Partyid=isset($UserData["uuid"])?$UserData["uuid"]:"";
$Hsnid=isset($UserData["uuid"])?$UserData["uuid"]:"";
$Typeid=isset($UserData["uuid"])?$UserData["uuid"]:"";
$Category=isset($UserData["uuid"])?$UserData["uuid"]:"";
$Igst=isset($UserData["uuid"])?$UserData["uuid"]:"";
$Cgst=isset($UserData["uuid"])?$UserData["uuid"]:"";
$Sgst=isset($UserData["uuid"])?$UserData["uuid"]:"";
$PaymentMode=isset($UserData["uuid"])?$UserData["uuid"]:"";
$FirstName=isset($UserData["f_name"])?$UserData["f_name"]:"";
$LastName=isset($UserData["l_name"])?$UserData["l_name"]:"";
$Mobile=isset($UserData["mobile"])?$UserData["mobile"]:"";
$Email=isset($UserData["email"])?$UserData["email"]:"";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="<?=base_url('lfs_view/')?>assets/select2/select2.css" rel="stylesheet">
    <script src="<?=base_url('lfs_view/')?>assets/select2/select2.js"></script>
    <style>
        .selectdropdown{
            width: 100%;
        }
    </style>
</head>
<body>
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
                                    <div class="col-md-6">
                                        <select name="party" id="party" class="selectdropdown">
                                        </select>
                                        <span id="agent-error" style="color:#F00;"><?=form_error('party')?></span>
                                    </div>
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
                                        <input type="text" id="partymobile" name="partymobile"  disabled class="form-control col-md-7 col-xs-12">
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
                                        <span id="product-error" style="color:#F00;"><?=form_error('product')?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="Type" id="Type" class="selectdropdown">
                                        </select>
                                        <span id="Type-error" style="color:#F00;"><?=form_error('Type')?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Quantity">Quantity <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="Quantity" name="Quantity" required="required" placeholder="Qty/M.T /CUM/SQM/TRIP/NUM" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rate <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="Rate" name="Rate" required="required" placeholder="Rate" class="form-control numpoint col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">CalculatedAmount<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="Calculated" name="Calculated" disabled required="required" placeholder="Calculated Amount" class="form-control numpoint col-md-7 col-xs-12">
                                        <input type="hidden" id="CalculatedAmount" name="CalculatedAmount" required="required" placeholder="Calculated Amount" class="form-control numpoint col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" id="Category" name="Category" class="selectdropdown">
                                            <option>SELECT CATEGORY</option>
                                            <option value="SandSubTitute" <?=($Category=="SandSubTitute")?"selected='selected'":""?>>Sand Substitute</option>
                                            <option value="BSB" <?=($Category=="BSB")?"selected='selected'":""?>>BSB</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="TransportCharge">TransportCharge<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="TransportCharge" name="TransportCharge" required="required" placeholder="Transport Charge" class="form-control numpoint col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SGST<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" id="Sgst" name="Sgst" class="selectdropdown">
                                            <option value="" <?=($Sgst=="")?"selected='selected'":""?>>SELECT SGST</option>
                                            <?php
                                            for($i=0;$i<=28;$i++) {
                                                ?>
                                                <option value="<?=$i?>" <?=($i == $Sgst) ? "selected='selected'" : "" ?>>
                                                    <?=$i?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">CGST <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="CgstShow" disabled="disabled" name="CgstShow" value="<?=$Cgst?>" class="form-control col-md-7 col-xs-12">
                                        <input type="hidden" id="Cgst" disabled="disabled" name="Cgst" value="<?=$Cgst?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">IGST <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" id="Igst" name="Igst" class="selectdropdown">
                                            <option value="" <?=($Igst=="")?"selected='selected'":""?>>SELECT IGST</option>
                                            <?php
                                            for($i=0;$i<=28;$i++) {
                                                ?>
                                                <option value="<?=$i?>" <?=($i == $Igst) ? "selected='selected'" : "" ?>>
                                                    <?=$i?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AmountWithTax">Amount with tax <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" disabled="disabled" id="AmountWithTaxShow" name="AmountWithTaxShow" class="form-control col-md-7 col-xs-12">
                                        <input type="hidden" id="AmountWithTax" name="AmountWithTax" class="form-control col-md-7 col-xs-12">
                                        <input type="hidden" id="SgstCalculated" name="SgstCalculated" class="form-control col-md-7 col-xs-12">
                                        <input type="hidden" id="IgstCalculated" name="IgstCalculated" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Dimension">DIMENSION/DMC<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="Dimension" name="Dimension" placeholder="DIMENSION/DMC" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="VehicleNo">vehicle no<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="VehicleNo" name="VehicleNo" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="GPNO">GP No. <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="GPNO" name="GPNO" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">PartyGSTNumber<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="PartyGSTNumber" name="PartyGSTNumber" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="StateOfSupply">State of Supply<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="StateOfSupply" name="StateOfSupply" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">ModeOfPayment<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="PaymentMode" name="PaymentMode" class="selectdropdown">

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ReceivedAmount">ReceivedAmount<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="ReceivedAmount" name="ReceivedAmount" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Rest Amount
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="RestAmount" name="RestAmount" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <p align="center"><button type="submit" name="addItem" id="addItem" class="btn btn-success">Submit</button></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    let typedata='[{"uuid":"MT","name":"M.T"},{"uuid":"CUM","name":"CUM"},{"uuid":"SQM","name":"SQM"},{"uuid":"NUM","name":"NUM"},{"uuid":"TRIP","name":"TRIP"}]';
    let paymentmode='[{"uuid":"Cash","name":"Cash"},{"uuid":"CreditCard","name":"Credit Card"},{"uuid":"DebitCard","name":"Debit card"},{"uuid":"Paytm","name":"Paytm"},{"uuid":"Cheque","name":"Cheque"},{"uuid":"BhimUpi","name":"Bhim upi"},{"uuid":"PhonePay","name":"Phone Pay"},{"uuid":"Other","name":"Other"}]';
    $(document).ready(function() {
        let jsontype = $.parseJSON(typedata);
        let jsonpayment = $.parseJSON(paymentmode);
        $('#Type').append('<option value="">Select Type</option>');
        $('#PaymentMode').append('<option value="">Select Payment Mode</option>');
        for(let j=0;j<jsontype.length;j++){

            if(jsontype[j].uuid.toUpperCase()=="<?=$Typeid?>")
            {
                $('#Type').append('<option value="'+json[j].jsontype+'" selected="selected">'+jsontype[j].name+'</option>');

            }else
            {
                $('#Type').append('<option value="'+jsontype[j].uuid+'">'+jsontype[j].name+'</option>');
            }
        }
        $('#Type').select2();
        for(let k=0;k<jsonpayment.length;k++){
            if(jsonpayment[k].uuid.toUpperCase()=="<?=$PaymentMode?>")
            {
                $('#PaymentMode').append('<option value="'+jsonpayment[k].uuid+'" selected="selected">'+jsonpayment[k].name+'</option>');

            }else
            {
                $('#PaymentMode').append('<option value="'+jsonpayment[k].uuid+'">'+jsonpayment[k].name+'</option>');
            }
        }
        $('#PaymentMode').select2();
        var qry="";
        $.ajax({
            type:"POST",
            url:'<?php echo base_url()?>' + "ilfs-Data-Dropdown/partyList",
            dataType: 'html',
            data:qry,
            success: function(res){

                if (res)
                {
                    $('#party').html("");
                    var json = $.parseJSON(res);
                    $('#party').append('<option value="">Select Party</option>');
                    for (var i=0;i<json.length;++i)
                    {
                        if(json[i].uuid.toUpperCase()=="<?=$Partyid?>")
                        {
                            $('#party').append('<option value="'+json[i].uuid+'" selected="selected">'+json[i].name+'</option>');

                        }
                        else
                        {
                            $('#party').append('<option value="'+json[i].uuid+'">'+json[i].name+'</option>');
                        }
                    }
                    $('#party').select2();
                }
            }
        });
        var qryhsn="";
        $.ajax({
            type:"POST",
            url:'<?php echo base_url()?>' + "ilfs-Data-Dropdown/hsnList",
            dataType: 'html',
            data:qryhsn,
            success: function(res){
                // console.log(res)
                if (res)
                {
                    $('#hsn').html("");
                    var json = $.parseJSON(res);
                    $('#hsn').append('<option value="">Select Hsn</option>');
                    for (var i=0;i<json.length;++i)
                    {
                        if(json[i].uuid.toUpperCase()=="<?=$Hsnid?>")
                        {
                            $('#hsn').append('<option value="'+json[i].uuid+'" selected="selected">'+json[i].name+'</option>');
                        }
                        else
                        {
                            $('#hsn').append('<option value="'+json[i].uuid+'">'+json[i].name+'</option>');
                        }
                    }
                    $('#hsn').select2();

                }
            }
        });
    });
    $("#party").change(function () {
        let partyid=$("#party").val();
        var qry = "Party="+partyid;
        $.ajax({
            type: "POST",
            url: '<?php echo base_url()?>' + "ilfs-Data-Dropdown/partyDetail",
            dataType: 'html',
            data: qry,
            success: function (res) {
                if (res) {
                    var json = $.parseJSON(res);
                            $("#partyaddress").val(json.address);
                            $("#partymobile").val(json.mobile);
                            $("#partyemail").val(json.email);
                }
            }
        });
    });
    $("#hsn").change(function () {
        let hsnid=$("#hsn").val();
        changeProduct(hsnid);
    });
    function  changeProduct(hsnid) {
        var qryproduct="hsn="+hsnid;
        $.ajax({
            type:"POST",
            url:'<?php echo base_url()?>' + "ilfs-Data-Dropdown/productList",
            dataType: 'html',
            data:qryproduct,
            success: function(res){
                // console.log(res)
                if (res)
                {
                    $('#product').html("");
                    var json = $.parseJSON(res);
                    $('#product').append('<option value="">Select Product</option>');
                    for (var i=0;i<json.length;++i)
                    {
                        if(json[i].uuid.toUpperCase()=="<?=$Hsnid?>")
                        {
                            $('#product').append('<option value="'+json[i].uuid+'" selected="selected">'+json[i].name+'</option>');
                        }
                        else
                        {
                            $('#product').append('<option value="'+json[i].uuid+'">'+json[i].name+'</option>');
                        }
                    }
                    $('#product').select2();
                }
            }
        });
    }
    $("#flashfeed").fadeIn(1000);
    $("#flashfeed").fadeOut(10000);
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
    $(".numpoint").keypress(function(e) {
        var num=$(this).val();
        if(num.length>7)
        {
            return false;
        }
        if(e.charCode<46 || e.charCode>58)
        {
            return false;
        }
    });
    $("#Quantity").onkeyup(function () {
        let qty=$("#Quantity").val();
        let rate=$("#Rate").val();
        let calamt=rate*qty;
        $("#CalculatedAmount").val(calamt);
        $("#Calculated").val(calamt);
    });
    $("#TransportCharge").onkeyup(function () {
        let qty=$("#Quantity").val();
        let rate=$("#Rate").val();
        let transport=$("#TransportCharge").val();
        let caltotamt=(rate*qty)+transport;
        let sgst=$("#Sgst").val();
        let igst=$("#Igst").val();
        let amountwithtax=0;
        if(sgst>0){
            let sgstcal=(caltotamt*sgst/100);
            amountwithtax=caltotamt+(2*sgstcal);
            $("#AmountWithTax").val(amountwithtax);
            $("#SgstCalculated").val(sgstcal);
            $("#IgstCalculated").val("0");
        }else if(igst>0){
            let igstcal=(caltotamt*igst/100);
            amountwithtax=caltotamt+igstcal;
            $("#AmountWithTax").val(amountwithtax);
            $("#SgstCalculated").val("0");
            $("#IgstCalculated").val(igstcal);
        }
    });

</script>