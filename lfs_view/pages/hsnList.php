<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
                    <h2>Hsn List<small></small></h2>
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
                    <table id="datatable" class="table table-striped table-bordered table-hover table-responsive t">
                        <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Edit </th>
                            <th>Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for($i=0;$i<count($UserData);$i++) {
                            ?>
                            <tr>
                                <td><?=($i+1);?></td>
                                <td><a href="<?=base_url('welcome-to-ilfs-edit-hsn.jsp/'.$UserData[$i]["uuid"])?>" style="font-size:20px;" name="ed"><i class="fa fa-pencil-square-o fa-fw"></i></i></a></td>
                                <td><?=$UserData[$i]["name"];?></td>
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
        $("#datatable").DataTable({
            dom: "<'row'<'col-sm-3'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [[30, 60, 100, -1], [30, 60, 100, "All"]],
            buttons: [
            ]
        });
    </script>