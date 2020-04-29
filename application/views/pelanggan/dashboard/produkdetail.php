
<style>
.custom-menu-content ul.notika-main-menu-dropdown li a{
    padding: 20px 7px 20px 4px;
}

.kategori_chooser{
    padding-left: 20px;
}
</style>
<div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <?php
                            if($this->session->userdata('status') == "login"){ ?>
                                <li><a href="<?php echo base_url(); ?>pelanggan/transaksi"><i class="notika-icon notika-mail"></i> Transaksi</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>pelanggan/kritiksaran"><i class="notika-icon notika-edit"></i> Kritik & Saran</a>
                                </li>
                            <?php }
                        ?>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li class="kategori_chooser"><a>Pilih Daftar Kategori berikut :</a></li>
                                <?php
                                    foreach($kategori as $list){?>
                                    <li><a href="<?php echo base_url();?>pelanggan/kategori_produk/<?php echo $list->id_kategori; ?>"><span class="btn btn-default"><?php echo $list->nama_kategori; ?></span></a></li>
                                    <?php }
                                
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section style="position:relative;top:-80px;">
        <div class="container">
            <br/>
            <br/>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <?php
                        if($this->session->flashdata('message')){ ?>
                            <div class="alert alert-success alert-dismissible"><?php echo $this->session->flashdata('message') ?>
                                <a href="<?php echo base_url()?>pelanggan/transaksi">&nbsp;&nbsp; Lihat Daftar Transaksi</a>
                                <a href="<?php echo base_url()?>"><span></span></a><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                            <?php   }else if($this->session->flashdata('error')){ ?>
                                <div class="alert alert-danger alert-dismissible"><?php echo $this->session->flashdata('error') ?>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                                <?php
                            }
                    ?>
                </div>
            </div>
            <div class="row">
                <?php 
                    foreach($produk as $list){?>
                        <div class="col-lg-5 col-md-5 col-xs-4">
                            <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                                <img src="<?php echo base_url()?>assets/img/post/ayam.jpg" style="height:100%;width:100%;height:100%;background-size:auto;"/>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6">
                            <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds" style="height:342px !important;">
                                    <form method="POST" action="<?php echo base_url('pelanggan/submit_transaksi'); ?>">
                                        <div class="blog-ctn">
                                            <div class="blog-hd-sw">
                                                <p style="color:#444;font-size:20px; font-weight:bold;"><?php echo $list->nama_produk; ?></p>
                                                <p style="color:#444;font-size:18px;"><?php echo 'Rp. '. $list->harga; ?></p>
                                            </div>
                                            <p><?php echo $list->spesifikasi; ?></p>
                                            <a class="vw-at" href="#"><?php echo 'Stok tersedia : ' .$list->stok; ?></a>
                                            <div class="input-group mg-t-15">
                                                <span class="input-group-addon"><i class="notika-icon notika-edit"></i></span>
                                                <div class="nk-int-st">
                                                    <select class="selectpicker form-control" name="jumlah" required> 
                                                        <?php 
        
                                                            for($i =0; $i < $list->stok; $i++){ ?>
                                                                <option  value='<?php echo $i+1; ?>'><?php echo $i+1; ?></option>
                                                            <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_konsumen" value="<?php echo $this->session->userdata('id_konsumen');?>">
                                            <input type="hidden" name="id_produk" value="<?php echo $list->id_produk?>">
                                            <input type="hidden" name="harga" value="<?php echo $list->harga?>">
                                            <input style="background:#3C6E71; color:#fff ;width:100%; border:1px solid #000;padding:10px;border-radius:4px;margin-top:15px;font-weight:bold;" type="submit" class="" value="Beli">
                                        </div>
                                </form>
                            </div>
                        </div>
                    <?php }
                ?>
            </div>
        </section>
        <section style="position:relative; top:-80px;">
            <div class="container">
                <div class="row">
                    <?php 
                        if(!sizeof($produk_upselling) > 0){ ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds" >
                                        <form method="POST" action="<?php echo base_url('pelanggan/submit_transaksi'); ?>">
                                            <div class="blog-ctn">
                                                <p style="color:#888;font-size:20px; font-weight:bold;">Tidak ada Produk Upselling</p>    
                                            </div>
                                    </form>
                                </div>
                            </div>
                        
                        <?php  }else{
                            foreach($produk_upselling as $list){?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds" >
                                            <form method="POST" action="<?php echo base_url('pelanggan/submit_transaksi'); ?>">
                                                <div class="blog-ctn">
                                                    <p style="color:#888;font-size:20px; font-weight:bold;">Produk Upselling</p>    
                                                    <div class="blog-hd-sw">
                                                        <hr>
                                                        <p style="color:#444;font-size:20px; font-weight:600;"><?php echo $list->nama_produk2; ?></p>
                                                        <p style="color:#444;font-size:18px;"><?php echo 'Rp. '. $list->harga_produk2; ?></p>
                                                    </div>
                                                    <p><?php echo $list->spesifikasi_produk2; ?></p>
                                                    <!-- <a class="vw-at" href="#"><?php echo 'Stok tersedia : ' .$list->stok; ?></a> -->
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            <?php }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section style="position:relative;top:-80px;">
        <div class="container">
            <div class="row">
                <br/>
                <br/>
                <div class="col-lg-12">
                    <p style="color:#888;font-size:20px; font-weight:bold;">Produk Crosselling</p>    
                    <hr/>
                </div>
                <?php 
                    foreach($produk_crosselling as $list){?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                                <div class="blog-img">
                                    <img src="<?php echo base_url()?>assets/img/post/ayam.jpg" alt="" />
                                </div>
                                <div class="blog-ctn">
                                    <div class="blog-hd-sw">
                                        <p style="color:#444;font-size:20px; font-weight:bold;"><?php echo $list->nama_produk; ?></p>
                                        <p style="color:#444;font-size:18px;"><?php echo 'Rp. '. $list->harga; ?></p>
                                    </div>
                                    <p><?php echo $list->spesifikasi; ?></p>
                                    <a class="vw-at" href="#"><?php echo 'Stok tersedia : ' .$list->stok; ?></a>
                                    <?php 
                                        if($this->session->userdata('status') == "login"){
                                            ?>
                                        <a href="<?php echo site_url('main/detail_produk').'/'.$list->id_produk;?>"><input style="background:#3C6E71; color:#fff ;width:100%; border:1px solid #000;padding:10px;border-radius:4px;margin-top:15px;font-weight:bold;" type="submit" class="" value="Beli" onclick="function getdate()"></a>
                                        <?php }else{ ?>
                                            <a href="<?php echo base_url();?>login"><button style="background:#000; color:#fff;width:100%; border:1px solid #000;padding:10px;border-radius:4px;margin-top:15px;font-weight:bold;">Login untuk membeli</button></a>
                                        <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                ?>
            </div>
        </div>
    </section>
