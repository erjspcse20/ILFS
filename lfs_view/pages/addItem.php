<?php
$Itemid=isset($ItemData["uuid"])?$ItemData["uuid"]:"";
$Partyid=isset($ItemData["party_id"])?$ItemData["party_id"]:"";
$Hsnid=isset($ItemData["hsn_id"])?$ItemData["hsn_id"]:"";
$Productid=isset($ItemData["product_id"])?$ItemData["product_id"]:"";
$Typeid=isset($ItemData["type"])?$ItemData["type"]:"";
$Quantity=isset($ItemData["quantity"])?$ItemData["quantity"]:"";
$Category=isset($ItemData["category"])?$ItemData["category"]:"";
$GstType=isset($ItemData["gst_type"])?$ItemData["gst_type"]:"";
$Rate=isset($ItemData["rate"])?$ItemData["rate"]:"";
$CalculatedAmount=isset($ItemData["calculated_amount"])?$ItemData["calculated_amount"]:"";
$Gst=isset($ItemData["gst_type"])?(($ItemData["gst_type"]==1)?$ItemData["igst"]:($ItemData["cgst"]+$ItemData["sgst"])):"";
$TransportCharge=isset($ItemData["transport_charge"])?$ItemData["transport_charge"]:"";
$PaymentMode=isset($ItemData["mode_of_payment"])?$ItemData["mode_of_payment"]:"";
$RestAmmount=isset($ItemData["rest_amount"])?$ItemData["rest_amount"]:"";
$RecivedAmmount=isset($ItemData["recived_amount"])?$ItemData["recived_amount"]:"";
$StateOfSupply=isset($ItemData["state_of_supply"])?$ItemData["state_of_supply"]:"";
$PartyGstNo=isset($ItemData["party_gst_no"])?$ItemData["party_gst_no"]:"";
$GPNo=isset($ItemData["gp_no"])?$ItemData["gp_no"]:"";
$VehicleNo=isset($ItemData["vahical_no"])?$ItemData["vahical_no"]:"";
$Dimension=isset($ItemData["dimension"])?$ItemData["dimension"]:"";
$TotalAmountWithTax=isset($ItemData["amount_with_tax"])?$ItemData["amount_with_tax"]:"";
$TotalTax=isset($ItemData["total_gst"])?$ItemData["total_gst"]:"";
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
    <?php
   /* echo "<pre>";
    print_r($ItemData);
    echo "<pre>";*/
    ?>
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

                    <form  id="addItem" method="post" name="addItem" action="<?=($Itemid=="")?base_url('welcome-to-ilfs-add-item.jsp'):base_url('welcome-to-ilfs-update-item.jsp')?>" class="form-horizontal form-label-left">
                        <input type="hidden" name="itm" id="itm" value="<?=$Itemid?>"/>
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
                                        <input type="text" id="Quantity" name="Quantity" value="<?=$Quantity?>" required="required" placeholder="Qty/M.T /CUM/SQM/TRIP/NUM" class="form-control col-md-7 col-xs-12">
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
                                        <input type="text" id="Rate" name="Rate" value="<?=$Rate?>" required="required" placeholder="Rate" class="form-control numpoint col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">CalculatedAmount<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="Calculated" name="Calculated" value="<?=$CalculatedAmount?>" disabled required="required" placeholder="Calculated Amount" class="form-control numpoint col-md-7 col-xs-12">
                                        <input type="hidden" id="CalculatedAmount" name="CalculatedAmount" value="<?=$CalculatedAmount?>" required="required" placeholder="Calculated Amount" class="form-control numpoint col-md-7 col-xs-12">
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
                                        <input type="text" id="TransportCharge" name="TransportCharge" value="<?=$TransportCharge?>" required="required" placeholder="Transport Charge" class="form-control numpoint col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="GstType">GST Type<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" id="GstType" name="GstType" class="selectdropdown">
                                            <option value="" <?=($GstType=="")?"selected='selected'":""?>>SELECT GST Type</option>
                                            <option value="1" <?=($GstType==1)?"selected='selected'":""?>>IGST</option>
                                            <option value="2" <?=($GstType==2)?"selected='selected'":""?>>SGST & CGST</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">GST<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" id="Gst" name="Gst" class="selectdropdown">
                                            <option value="" <?=($Gst=="")?"selected='selected'":""?>>SELECT Total GST</option>
                                            <?php
                                            for($i=0;$i<=28;$i++) {
                                                ?>
                                                <option value="<?=$i?>" <?=($i == $Gst) ? "selected='selected'" : "" ?>>
                                                    <?=$i?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Dimension">Total Tax<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="TaxCalculatedShow" disabled name="TaxCalculatedShow" value="<?=$TotalTax?>" placeholder="TaxCalculated" class="form-control col-md-7 col-xs-12">
                                        <input type="hidden" id="TaxCalculated" name="TaxCalculated" value="<?=$TotalTax?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="VehicleNo">Ammount With Tax<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="AmountWithTaxShow" value="<?=$TotalAmountWithTax?>" disabled name="AmountWithTaxShow" class="form-control col-md-7 col-xs-12">
                                        <input type="hidden" id="AmountWithTax" value="<?=$TotalAmountWithTax?>" name="AmountWithTax" class="form-control col-md-7 col-xs-12">
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
                                        <input type="text" id="Dimension" name="Dimension" value="<?=$Dimension?>" placeholder="DIMENSION/DMC" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="VehicleNo">vehicle no<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="VehicleNo" value="<?=$VehicleNo?>" name="VehicleNo" class="form-control col-md-7 col-xs-12">
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
                                        <input type="text" id="GPNO" name="GPNO" value="<?=$GPNo?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="PartyGSTNumber">PartyGSTNumber<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="PartyGSTNumberShow" value="<?=$PartyGstNo?>" disabled name="PartyGSTNumberShow" class="form-control col-md-7 col-xs-12">
                                        <input type="hidden" id="PartyGSTNumber" value="<?=$PartyGstNo?>" name="PartyGSTNumber" class="form-control col-md-7 col-xs-12">
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
                                        <input type="text" id="StateOfSupply" value="<?=$StateOfSupply?>" name="StateOfSupply" class="form-control col-md-7 col-xs-12">
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ReceivedAmount">ReceivedAmount
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="ReceivedAmount" value="<?=$RecivedAmmount?>" name="ReceivedAmount" class="form-control numpoint col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Rest Amount
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="RestAmountShow" value="<?=$RestAmmount?>" disabled name="RestAmountShow" class="form-control numpoint col-md-7 col-xs-12">\
                                        <input type="hidden" id="RestAmount" value="<?=$RestAmmount?>" name="RestAmount" class="form-control numpoint col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <p align="center"><button type="submit" name="addItem" id="addItem" class="btn btn-success"><?=(($Itemid=="")?"Save":"update")?></button></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>

    let partyid="<?=$Partyid?>";
    let hsnid="<?=$Hsnid?>";
    if(partyid!=""){
        partydetail(partyid);
    }
    if(hsnid!=""){
        changeProduct(hsnid);
    }

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
                $('#Type').append('<option value="'+jsontype[j].uuid+'" selected="selected">'+jsontype[j].name+'</option>');

            }else
            {
                $('#Type').append('<option value="'+jsontype[j].uuid+'">'+jsontype[j].name+'</option>');
            }
        }
        $('#Type').select2();
        for(let k=0;k<jsonpayment.length;k++){
            if(jsonpayment[k].uuid.toUpperCase()=="<?=strtoupper($PaymentMode)?>")
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
                        if(json[i].uuid.toUpperCase()==partyid.toUpperCase())
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
                        if(json[i].uuid.toUpperCase()=="<?=strtoupper($Hsnid)?>")
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
        partyid=$("#party").val();
        partydetail(partyid);
    });
    function partydetail(partyid){
        if((partyid!="") && partyid!=undefined){
            var qry = "Party="+partyid;
            $.ajax({
                type: "POST",
                url: '<?php echo base_url()?>' + "ilfs-Data-Dropdown/partyDetail",
                dataType: 'html',
                data: qry,
                success: function (res) {
                    //console.log(res);
                    if (res) {
                        var json = $.parseJSON(res);
                        $("#partyaddress").val(json.address);
                        $("#partymobile").val(json.mobile);
                        $("#partyemail").val(json.email);
                        $("#PartyGSTNumberShow").val(json.gst_no);
                        $("#PartyGSTNumber").val(json.gst_no);
                    }
                }
            });
        }
    }
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
                        if(json[i].uuid.toUpperCase()=="<?=strtoupper($Productid)?>")
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
    $("#ReceivedAmount").keyup(function () {
        let totalamountwithtax=parseFloat($("#AmountWithTax").val());
        let reciveamount=parseFloat($("#ReceivedAmount").val());
        let calamtrest=isNaN((totalamountwithtax-reciveamount))?0:(totalamountwithtax-reciveamount);
        $("#RestAmount").val(calamtrest);
        $("#RestAmountShow").val(calamtrest);
    });
    $("#Quantity").keyup(function () {
        let qty=parseFloat($("#Quantity").val());
        let rate=parseFloat($("#Rate").val());
        let calamt=isNaN(rate*qty)?0:(rate*qty);
        $("#CalculatedAmount").val(calamt);
        $("#Calculated").val(calamt);
        let transport=isNaN(parseFloat($("#TransportCharge").val()))?0:parseFloat($("#TransportCharge").val());
        let caltotamt=calamt+transport;
        let gst=parseFloat($("#Gst").val());
        let gstcal=isNaN((caltotamt*gst/100))?0:(caltotamt*gst/100);
        let amountwithtax=isNaN((caltotamt+gstcal))?0:(caltotamt+gstcal);
        $("#AmountWithTax").val(amountwithtax);
        $("#AmountWithTaxShow").val(amountwithtax);
        $("#TaxCalculated").val(gstcal);
        $("#TaxCalculatedShow").val(gstcal);
    });
    $("#Rate").keyup(function () {
        let qty=parseFloat($("#Quantity").val());
        let rate=parseFloat($("#Rate").val());
        let calamt=isNaN(rate*qty)?0:(rate*qty);
        $("#CalculatedAmount").val(calamt);
        $("#Calculated").val(calamt);
        let transport=isNaN(parseFloat($("#TransportCharge").val()))?0:parseFloat($("#TransportCharge").val());
        let caltotamt=calamt+transport;
        let gst=parseFloat($("#Gst").val());
        let gstcal=isNaN((caltotamt*gst/100))?0:(caltotamt*gst/100);
        let amountwithtax=isNaN((caltotamt+gstcal))?0:(caltotamt+gstcal);
        $("#AmountWithTax").val(amountwithtax);
        $("#AmountWithTaxShow").val(amountwithtax);
        $("#TaxCalculated").val(gstcal);
        $("#TaxCalculatedShow").val(gstcal);
    });
    $("#TransportCharge").keyup(function () {
        let qty=parseFloat($("#Quantity").val());
        let rate=parseFloat($("#Rate").val());
        let calamt=isNaN(rate*qty)?0:(rate*qty);
        $("#CalculatedAmount").val(calamt);
        $("#Calculated").val(calamt);
        let transport=isNaN(parseFloat($("#TransportCharge").val()))?0:parseFloat($("#TransportCharge").val());
        let caltotamt=calamt+transport;
        let gst=parseFloat($("#Gst").val());
        let gstcal=isNaN((caltotamt*gst/100))?0:(caltotamt*gst/100);
        let amountwithtax=isNaN((caltotamt+gstcal))?0:(caltotamt+gstcal);
        $("#AmountWithTax").val(amountwithtax);
        $("#AmountWithTaxShow").val(amountwithtax);
        $("#TaxCalculated").val(gstcal);
        $("#TaxCalculatedShow").val(gstcal);
    });
    $("#Gst").change(function () {
        let qty=parseFloat($("#Quantity").val());
        let rate=parseFloat($("#Rate").val());
        let calamt=isNaN(rate*qty)?0:(rate*qty);
        $("#CalculatedAmount").val(calamt);
        $("#Calculated").val(calamt);
        let transport=isNaN(parseFloat($("#TransportCharge").val()))?0:parseFloat($("#TransportCharge").val());
        let caltotamt=calamt+transport;
        let gst=parseFloat($("#Gst").val());
        let gstcal=isNaN((caltotamt*gst/100))?0:(caltotamt*gst/100);
        let amountwithtax=isNaN((caltotamt+gstcal))?0:(caltotamt+gstcal);
        $("#AmountWithTax").val(amountwithtax);
        $("#AmountWithTaxShow").val(amountwithtax);
        $("#TaxCalculated").val(gstcal);
        $("#TaxCalculatedShow").val(gstcal);
    });
    $("#addItem").click(function () {
        if($("#hsn").val()==""){
            alert("please Select Hsn Code");
            return false;
        }
        if($("#party").val()==""){
            alert("please Select party");
            return false;
        }
        if($("#product").val()==""){
            alert("please Select product");
            return false;
        }
    });

</script>