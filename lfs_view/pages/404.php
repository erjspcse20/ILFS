<div class="right_col" role="main">
    <div class="row">
            <h1>Opps! The Page you are looking for is Not Found</h1>
    </div>
</div>



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