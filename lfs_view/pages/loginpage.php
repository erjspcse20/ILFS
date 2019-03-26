<div class="animate form login_form">
    <section class="login_content">
        <p align="center" style="color:#F00;">
            <?php if($msg=$this->session->flashdata('feedback')): ?>

                <strong style="color:#F00">
                    <?=$msg?>
                </strong>

            <?php endif; ?>
        </p>
        <form action="<?=base_url('ilfs-login.jsp')?>" method="post" enctype="multipart/form-data">
            <h1>Login Form</h1>
            <div>
                <input type="text" class="form-control" name="Username" id="Username" placeholder="Username" required="" />
            </div>
            <div>
                <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" required="" />
            </div>
            <div>
                <input type="submit" id="login" name="login" class="register" value="Login">
            </div>
            <div class="clearfix"></div>
            <div class="separator">
                <h1><i class="fa fa-paw"></i> If & Ls</h1>
                <p>©2016 All Rights Reserved. If & Ls. Design & Develop by <a href="http://www.hindustanweb.com/" target="_blank">Hindustan Web</a></p>
            </div>

        </form>
    </section>
</div>