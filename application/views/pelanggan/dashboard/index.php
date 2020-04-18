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
                                <li><a>Pilih Daftar Kategori berikut :</a></li>
                                <?php

                                    foreach($kategori as $list){?>
                                    <li><a href="<?php echo base_url();?>pelanggan/kategori_produk/<?php echo $list->id_kategori; ?>"><span class="btn btn-default"><?php echo $list->nama_kategori; ?></span></a></li>
                                    <?php }
                                
                                ?>
                                <!-- <li><a href="index.html"><span class="btn btn-xs btn-default">Kecil 0 - 1 (kg)</span></a>
                                </li>
                                <li><a href="index.html"><span class="btn btn-xs btn-default">Sedang 1 - 2 (kg)</span></a>
                                </li>
                                <li><a href="index.html"><span class="btn btn-xs btn-default">Besar 2 - 3 (kg)</span></a>
                                </li>
                                <li><a href="index.html"><span class="btn btn-xs btn-default">Super 3 - 4 (kg)</span></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcomb-area" style="position:relative;top:-20px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-house"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Daftar Katalog</h2>
                                        <p><span style="font-weight:bold;">
                                        <?php 
                                          if($this->session->userdata('status') == "login"){
                                              echo $profile[0]->nama_konsumen; 
                                              ?>
                                              <?php
                                              ?>
                                              </span> selamat berbelanja.</p>
                                          <?php }else{?>
                                              </span> Kami menyediakan ayam yang sehat dan harga terbaik.</p>
                                          <?php }
                                        ?>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
                                    <form method='GET' action='<?php echo base_url()?>/pelanggan/search'>
                                    <div style="display:flex;">
                                            <input type="text" class="form-control"  name="keyword" placeholder="Cari produk disini ...">&nbsp;
                                            <input type="submit" style="border-radius:4px;padding-right:15px; padding-left:15px;background-color:#00c292;border:1px solid #00c292;color:#fff;">
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <section style="min-height:800px;position:relative;top:-60px;">
        <div class="container">
            <div class="row">
                <?php 
                    foreach($produk as $list){?>
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
