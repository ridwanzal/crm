<div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url()?>assets/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <?php
                        
                            if(!$this->session->userdata('status') == "login"){
                                    ?>
                                <ul class="nav navbar-nav notika-top-nav">
                                    <li class="nav-item" style="">
                                        <a href="<?php echo base_url()?>register"><button class="btn btn-success notika-btn-success">Register</button></a>
                                    </li>
                                    <li class="nav-item">   
                                        <a href="<?php echo base_url()?>login"><button class="btn btn-primary notika-btn-primary">Login</button></a>
                                    </li>
                                </ul>
                            <?php }else { ?>
                                <ul class="nav navbar-nav notika-top-nav">
                                    <li class="nav-item" style="">
                                        <a href="<?php echo base_url()?>admin/profile"><button class="btn btn-warning notika-btn-warning">Profile</button></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url()?>logout"><button class="btn btn-primary notika-btn-primary">Logout</button></a>
                                    </li>
                                </ul>
                            <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="slider single-item" style="margin-top:20px;cursor:pointer;border-radius:10px;">
                    <div>
                        <a href="<?= base_url()?>/login"><img style="border-radius:10px;"  src="<?php echo base_url();?>/assets/img/banner/2.png"/></a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
