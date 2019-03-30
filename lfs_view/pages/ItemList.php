<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="<?=base_url('lfs_view/assets/datatables/dataTables.min.css')?>" rel="stylesheet" type="text/css"/>
    <script src="<?=base_url('lfs_view/assets/datatables/dataTables.min.js')?>" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.12/css/bootstrap/zebra_datepicker.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.12/zebra_datepicker.src.js"></script>
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
                <div class="row" style="padding-bottom: 4%;">

                    <form method="post" action="<?=base_url('welcome-to-ilfs-item-list.jsp')?>" class="valida" autocomplete="off" novalidate="novalidate" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <label for="field-1-2">From Date </label>
                                <div class="form-group">
                                    <input type='text' class="datepick form-control" value="<?=date("d-m-Y",strtotime($FromDate))?>" name="fromdate" id="fromdate"/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <label for="field-1-2">To Date </label>
                                <div class="form-group">
                                    <input type='text' class="datepick form-control" value="<?=date("d-m-Y",strtotime($ToDate))?>" name="todate" id="todate"/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <label for="field-1-2">Party<span class="required">*</span></label>
                                <div class="form-group">
                                    <select name="party" id="party" class="selectdropdown">
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <label for="field-1-2"></label>
                                <div class="form-group">
                                    <input type='submit' style="margin-top: 9%;" class="btn btn-primary" value="Show" name="showdata" id="showdata"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="x_title">
                    <h2>Item List<small></small></h2>
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
                    <table id="statedata" style="width:3000px!important;" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="width25">S.No.</th>
                            <th class="width100">Invoice No</th>
                            <th class="width100">Recived Amount</th>
                            <th class="width100">Rest Amount</th>
                            <th class="width200">Party Name & Address</th>
                            <th class="width100">Created Date</th>
                            <th class="width100">Party Gst No</th>
                            <th class="width100">State Of Supply </th>
                            <th class="width100">Product</th>
                            <th class="width100">HSN CODE</th>
                            <th class="width100"> Qty M.T /NUM </th>
                            <th class="width50"> RATE </th>
                            <th class="width50"> AMOUNT  </th>
                            <th class="width150"> Transport Charge</th>
                            <th class="width100">State Code </th>
                            <th class="width50">Amount</th>
                            <th class="width50"> SGST% </th>
                            <th class="width50">SGST</th>
                            <th class="width50"> CGST%  </th>
                            <th class="width50">CGST</th>
                            <th class="width50"> IGST% </th>
                            <th class="width50">IGST</th>
                            <th class="width150"> Amount with tax </th>
                            <th class="width50"> CATEGORY </th>
                            <th class="width100"> DIMENSION/DMC </th>
                            <th class="width100"> vehicle no </th>
                            <th class="width100"> GP No. </th>
                            <th class="width100"> Created By </th>
                            <th class="width25">Edit </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for($i=0;$i<count($ItemData);$i++) {
                            ?>
                            <tr class="<?=($ItemData[$i]["bill_status"]==1)?"success":""?>">
                                <td class="width25"><?=($i+1);?></td>
                                <td class="width100"><?=$ItemData[$i]["item_published_id"];?></td>
                                <td class="width100"><?=$ItemData[$i]["recived_amount"];?></td>
                                <td class="width100"><?=$ItemData[$i]["rest_amount"];?></td>
                                <td class="width200"><?=$ItemData[$i]["PartyName"]." ".$ItemData[$i]["PartyAddress"];?></td>
                                <td class="width100"><?=date("d-M-Y",strtotime($ItemData[$i]["custom_created_at"]));?></td>
                                <td class="width100"><?=$ItemData[$i]["party_gst_no"];?></td>
                                <td class="width100"><?=$ItemData[$i]["state_of_supply"];?></td>
                                <td class="width100"><?=$ItemData[$i]["ProductName"];?></td>
                                <td class="width100"><?=$ItemData[$i]["HsnCode"];?></td>
                                <td class="width100"><?=$ItemData[$i]["quantity"];?></td>
                                <td class="width50"><?=$ItemData[$i]["rate"];?></td>
                                <td class="width50"><?=($ItemData[$i]["quantity"]*$ItemData[$i]["rate"]);?></td>
                                <td class="width150"><?=$ItemData[$i]["transport_charge"];?></td>
                                <td class="width150"><?=$ItemData[$i]["state_code"];?></td>
                                <td class="width50"><?=(($ItemData[$i]["quantity"]*$ItemData[$i]["rate"])+$ItemData[$i]["transport_charge"]);?></td>
                                <td class="width50"><?=$ItemData[$i]["sgst"];?></td>
                                <td class="width50"><?=$ItemData[$i]["total_sgst_calculated"];?></td>
                                <td class="width50"><?=$ItemData[$i]["cgst"];?></td>
                                <td class="width50"><?=$ItemData[$i]["total_cgst_calculated"];?></td>
                                <td class="width50"><?=$ItemData[$i]["igst"];?></td>
                                <td class="width50"><?=$ItemData[$i]["total_igst_calculated"];?></td>
                                <td class="width150"><?=$ItemData[$i]["amount_with_tax"];?></td>
                                <td class="width50"><?=$ItemData[$i]["category"];?></td>
                                <td class="width100"><?=$ItemData[$i]["dimension"];?></td>
                                <td class="width100"><?=$ItemData[$i]["vahical_no"];?></td>
                                <td class="width100"><?=$ItemData[$i]["gp_no"];?></td>
                                <td class="width100"><?=$ItemData[$i]["full_name"];?></td>
                                <td class="width25"><?php if($ItemData[$i]["bill_status"]==2 or $this->session->userdata('type')==0){?><a href="<?=base_url('welcome-to-ilfs-edit-item.jsp/'.$ItemData[$i]["uuid"])?>" style="font-size:20px;" name="ed"><i class="fa fa-pencil-square-o fa-fw"></i></i></a><?php }?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        let partyid="<?=$PartyId?>";
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
        $("#statedata").DataTable({
            dom: "<'row'<'col-sm-3'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [[30, 60, 100, -1], [30, 60, 100, "All"]],
            scrollX : true,
            buttons: [
                {extend: 'copy', className: 'btn-sm'},
                {extend: 'csv', title: 'CountryList', className: 'btn-sm'},
                {extend: 'excel', title: 'CountryList', className: 'btn-sm'},
                {extend: 'pdf', title: 'CountryList', className: 'btn-sm'},
                {extend: 'print', className: 'btn-sm'}
            ]
        });
        $('.datepick').Zebra_DatePicker({
            format: 'd-m-Y'
        });
    </script>