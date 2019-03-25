<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?=base_url('welcome-to-ilfs-item-list.jsp')?>" class="site_title"><img style="    background: aliceblue;
    width: 219px;
    height: 41px;" src="<?=base_url('lfs_view/assets/img/logo.png')?>"></a>
        </div>
        <div class="clearfix"></div>

        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?=base_url('lfs_view/')?>assets/img/awtar.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
            </div>
        </div>

        <br />

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=base_url('welcome-to-ilfs-dashboard.jsp')?>">Dashboard</a></li>
                            <li><a href="<?=base_url('add-ilfs-user.jsp')?>">Add User</a></li>
                            <li><a href="<?=base_url('welcome-to-ilfs-user-list.jsp')?>">User List</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Party <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=base_url('add-ilfs-party.jsp')?>">Add Party</a></li>
                            <li><a href="<?=base_url('welcome-to-ilfs-party-list.jsp')?>">Party List</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> Hsn Code <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=base_url('add-ilfs-hsn.jsp')?>">Add Hsn Code</a></li>
                            <li><a href="<?=base_url('welcome-to-ilfs-hsn-list.jsp')?>">Hsn Code List</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Product <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=base_url('add-ilfs-product.jsp')?>">Add Product</a></li>
                            <li><a href="<?=base_url('welcome-to-ilfs-product-list.jsp')?>">Product List</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bar-chart-o"></i> Item <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=base_url('add-ilfs-item.jsp')?>">Add Item</a></li>
                            <li><a href="<?=base_url('welcome-to-ilfs-item-list.jsp')?>">Item List</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-paw"></i> Bill <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=base_url('ilfs-bill-list.jsp')?>">Genarate Bill</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</div>