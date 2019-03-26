<html">

<head>
</head>

<body>
<table width="1100" style="border:1px solid #333333;" cellspacing="0" cellpadding="0" align="center" >


    <tr>
        <td style="height:30px; border-bottom:1px solid;" valign="top">
            <h1 style="text-align:center; font-weight:bolder; text-transform:uppercase; margin-top:3px; margin-bottom:3px;"><b>Tax Invoice</b></h1>
        </td>
    </tr>

    <tr>
        <td style="float:right;"><p style="margin:2px; padding:2px;"><strong>INVOICE No. :</strong> <?=$InvoiceNo?></p>
            <p style="margin:2px; padding:2px;"><strong>DATE OF ISSUE :</strong> <?=date("d-m-Y")?></p>
            <p style="margin:2px; padding:2px;"><strong>GSTIN No. :</strong>07AABC173770R1ZX</p>
        </td>

    </tr>
    <tr>

        <td style="height:30px; border-bottom:1px solid;" valign="top">
            <p><img height="80" width="648"  src="<?=base_url('lfs_view/assets/img/logo.png')?>" alt="logo"/></p>
        </td>



    </tr>

    <tr>
        <td valign="top">

            <table width="1100px" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="550" style="height:60px; border-right:1px solid;">
                        <p style="font-size:15px; font-weight:bolder; text-align:center; margin:5px; padding:5px;">RECEIVER ( BILL TO )</p>
                        <p style="margin:5px; padding:5px;"><strong><?=$PartyData["name"]?></strong></p>
                        <p style="margin:5px; padding:5px;"><?=$PartyData["address"]."/ ".$PartyData["mobile"]."/ ".$PartyData["email"]?></P>
                        <p style="margin:5px; padding:5px;"><strong>GSTIN No. :</strong><span><?=$PartyData["gst_no"]?></span></p>

                    </td>
                    <td width="550" style="height:60px; border-right:1px solid;">
                        <p style="font-size:15px; font-weight:bolder; text-align:center; margin:5px; padding:5px;">CONSIGNEE(DELIVERED TO)</p>
                        <p style="margin:5px; padding:5px;"><strong><?=$PartyData["name"]?></strong></p>
                        <p style="margin:5px; padding:5px;"><?=$PartyData["address"]."/ ".$PartyData["mobile"]."/ ".$PartyData["email"]?></P>
                        <p style="margin:5px; padding:5px;"><strong>GSTIN No. :</strong><span><?=$PartyData["gst_no"]?></span></p>

                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td width="1100">
            <table cellspacing="2" cellpadding="2" width="1100">
                <tr>
                    <td style="border-top:1px solid; border-right:1px solid; height:20px; text-align:center;"><strong>Sr.</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>HSN/</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>Name of Goods/ Survices Supplied</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>UOM</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>QTY</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>Rate</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>Amount</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>Tax%</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>SGST Value</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>Tax%</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>CGST</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>Tax%</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>IGST</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>Amount With Tax</strong></td>

                </tr>
                <?php
                $totalamount=0;
                $totalamountwithoutTax=0;
                $totalSgst=0;
                $totalCgst=0;
                $totalIgst=0;
                for($i=0;$i<count($ItemData);$i++) {
                    $totalamount=$totalamount+$ItemData[$i]["amount_with_tax"];
                    $totalIgst=$totalIgst+$ItemData[$i]["total_igst_calculated"];
                    $totalCgst=$totalCgst+$ItemData[$i]["total_cgst_calculated"];
                    $totalSgst=$totalSgst+$ItemData[$i]["total_sgst_calculated"];
                    $totalamountwithoutTax=$totalamountwithoutTax+($ItemData[$i]["calculated_amount"]+$ItemData[$i]["transport_charge"]);
                    ?>
                    <tr>
                        <td style="border-top:1px solid; border-right:1px solid; height:20px; text-align:center;">1</td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">
                            <?=$ItemData[$i]["hsnCode"]?>
                        </td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">
                            <?=$ItemData[$i]["productName"]?>
                        </td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><?=$ItemData[$i]["type"]?>
                        </td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><?=$ItemData[$i]["quantity"]?>
                        </td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">
                            <?=$ItemData[$i]["rate"]?>
                        </td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">
                            <?=($ItemData[$i]["calculated_amount"]+$ItemData[$i]["transport_charge"])?>
                        </td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><?=$ItemData[$i]["sgst"]?>
                            %
                        </td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">
                            <?=$ItemData[$i]["total_sgst_calculated"]?>
                        </td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><?=$ItemData[$i]["cgst"]?>
                            %
                        </td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">
                            <?=$ItemData[$i]["total_cgst_calculated"]?>
                        </td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><?=$ItemData[$i]["igst"]?>%
                        </td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">
                            <?=$ItemData[$i]["total_igst_calculated"]?>
                        </td>
                        <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">
                            <?=$ItemData[$i]["amount_with_tax"]?>
                        </td>

                    </tr>
                    <?php
                }
                if(count($ItemData)<10)
                {
                    for($j=count($ItemData);$j<10;$j++)
                    {
                      ?>
                        <tr>
                            <td style="border-top:1px solid; border-right:1px solid; height:20px; text-align:center;"><?=($j+1)?></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                            <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>

                        </tr>
                        <?php
                    }
                }
                ?>
                <tr>
                    <td style="border-top:1px solid; border-right:1px solid; height:20px; text-align:center;">.</td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>

                </tr>
                <tr>
                    <td style="border-top:1px solid; border-right:1px solid; height:20px; text-align:center;">.</td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><strong>TOTAL</strong></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><?=$totalamountwithoutTax?></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><?=$totalSgst?></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><?=$totalCgst?></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><?=$totalIgst?></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"><?=$totalamount?></td>

                </tr>
                <tr>
                    <td style="border-top:1px solid; border-right:1px solid; height:20px; text-align:center;">.</td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>
                    <td style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;"></td>

                </tr>


            </table>
        </td>
    </tr>
    <?php
    $this->load->helper("markup");
    $EndUserIp = numberTowords($totalamount);
    ?>
    <tr>
        <td style="border:1px solid #000000; padding:10px;">
            <table>
                <tr>
                    <td style="border:1px solid #000000; padding:10px; width:800px;"><strong><?=$EndUserIp?></strong></td>
                    <td style="border:1px solid #000000; padding:10px; width:300px;">INR <strong>  <?=$totalamount?></strong></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td style="height:50px;"></td></tr>

    <tr>
        <td width="1100">
            <table width="1100px" cellspacing="0" cellpadding="0" border="1">
                <tr>
                    <td width="550" style="height:60px;">
                        .

                    </td>
                    <td width="550" style="height:60px; border-right:1px solid;">
                        <p style="font-size:15px; font-weight:bolder; text-align:center; margin:5px; padding:5px;">For IL & FS Environmental Infrastructure & Services Ltd.</p>
                        <p style=" padding:5px; margin:30px 5px 5px 5px;">Authorised Signatory</p>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="1100">
            <table width="1100px" cellspacing="0" cellpadding="0" border="1">
                <tr>
                    <td width="550" style="height:60px;">
                        <p style="font-size:15px; text-align:left; margin:5px; padding:5px;">Benficiary Name : IL & FS Environmental Infrasrtucture & Services Limited.	</p>
                        <p style="font-size:15px; text-align:left; margin:5px; padding:5px;">Current  Account No. : 00880350000129</p>
                        <p style="font-size:15px; text-align:left; margin:5px; padding:5px;">Bank : HDFC BANK NODIA</p>
                        <p style="font-size:15px; text-align:left; margin:5px; padding:5px;">IFSC : Code HDFC000088</p>
                    </td>
                    <td width="550" style="height:60px; border-right:1px solid;">
                        <p style="font-size:15px; font-weight:bolder; text-align:center; margin:5px; padding:5px;">NOTE.</p>
                        <p>Cheque should be in favour of </p>
                        <p><strong>IL & FS Environmental Infrasrtucture & Services Limited.	</strong></p>


                    </td>
                </tr>
            </table>
        </td>
    </tr>








    <tr>
        <td>
            <table>
                <td>
                    <tr>
                        <p align="center">Regisitered Office : 217-A, Ground Floor, Okhla , Phase -3, New Delhi - 110020</p>
                        <p align="center">CIN No. : U90001DL2007PLC166554</p>
                    </tr>
                </td>
            </table>
        </td>
    </tr>

</table>



</body>

</html>
