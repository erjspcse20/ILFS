<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="<?=base_url('lfs_view/assets/datatables/dataTables.min.css')?>" rel="stylesheet" type="text/css"/>
    <script src="<?=base_url('lfs_view/assets/datatables/dataTables.min.js')?>" type="text/javascript"></script>
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
            <form action="<?=base_url('welcome-to-ilfs-gentate-bill.jsp')?>" method="post" >
            <div class="x_panel">
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
                    <button type="submit" name="genratebill" id="genratebill" class="btn btn-primary">Genrate Bill</button>
                    <table id="statedata" style="width:100%" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>S.No.</th>
                            <th><input class="checked_all" type="checkbox"> </th>
                            <th>Invoice No</th>
                            <th>Party Name & Address</th>
                            <th>Created Date</th>
                            <th>Part Gst No</th>
                            <th>State Of Supply </th>
                            <th>Product</th>
                            <th>HSN CODE</th>
                            <th> Qty M.T /NUM </th>
                            <th> RATE </th>
                            <th> AMOUNT  </th>
                            <th> TRANSPORT Charge</th>
                            <th>Amount</th>
                            <th> SGST% </th>
                            <th>SGST</th>
                            <th> CGST%  </th>
                            <th>CGST</th>
                            <th> IGST% </th>
                            <th>IGST</th>
                            <th> Amount with tax </th>
                            <th> CATEGORY </th>
                            <th> DIMENSION/DMC </th>
                            <th> vehicle no </th>
                            <th> GP No. </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for($i=0;$i<count($ItemData);$i++) {
                            ?>
                            <tr>
                                <td><?=($i+1);?></td>
                                <td><input type="checkbox" name="itemid[]" class="checkbox" value="<?=$ItemData[$i]["uuid"]?>"></td>
                                <td><?=$ItemData[$i]["item_published_id"];?></td>
                                <td><?=$ItemData[$i]["PartyName"]." ".$ItemData[$i]["PartyAddress"];?></td>
                                <td><?=date("d-M-Y",strtotime($ItemData[$i]["created_at"]));?></td>
                                <td><?=$ItemData[$i]["party_gst_no"];?></td>
                                <td><?=$ItemData[$i]["state_of_supply"];?></td>
                                <td><?=$ItemData[$i]["ProductName"];?></td>
                                <td><?=$ItemData[$i]["HsnCode"];?></td>
                                <td><?=$ItemData[$i]["quantity"];?></td>
                                <td><?=$ItemData[$i]["rate"];?></td>
                                <td><?=($ItemData[$i]["quantity"]*$ItemData[$i]["rate"]);?></td>
                                <td><?=$ItemData[$i]["transport_charge"];?></td>
                                <td><?=(($ItemData[$i]["quantity"]*$ItemData[$i]["rate"])+$ItemData[$i]["transport_charge"]);?></td>
                                <td><?=$ItemData[$i]["sgst"];?></td>
                                <td><?=$ItemData[$i]["total_sgst_calculated"];?></td>
                                <td><?=$ItemData[$i]["cgst"];?></td>
                                <td><?=$ItemData[$i]["total_cgst_calculated"];?></td>
                                <td><?=$ItemData[$i]["igst"];?></td>
                                <td><?=$ItemData[$i]["total_igst_calculated"];?></td>
                                <td><?=$ItemData[$i]["amount_with_tax"];?></td>
                                <td><?=$ItemData[$i]["category"];?></td>
                                <td><?=$ItemData[$i]["dimension"];?></td>
                                <td><?=$ItemData[$i]["vahical_no"];?></td>
                                <td><?=$ItemData[$i]["gp_no"];?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>

                    </table>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script>
        $('.checked_all').on('change', function() {
            $('.checkbox').prop('checked', $(this).prop("checked"));
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
        $('.checkbox').change(function(){ //".checkbox" change
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('.checked_all').prop('checked',true);
            }else{
                $('.checked_all').prop('checked',false);
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
    </script>