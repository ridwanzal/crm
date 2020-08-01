<div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a href="<?php echo base_url();?>"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li><a href="<?php echo base_url();?>admin/produk"><i class="notika-icon notika-mail"></i> Kategori & Produk</a>
                        </li>
                        <li><a href="<?php echo base_url();?>admin/daftar_pelanggan"><i class="notika-icon notika-mail"></i> Pelanggan</a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>admin/transaksi"><i class="notika-icon notika-edit"></i>Transaksi</a>
                        </li>
                        <li><a href="<?php echo base_url();?>admin/produk/upselling"><i class="notika-icon notika-edit"></i> Up Selling</a>
                        </li>
                        <li class=""><a href="<?php echo base_url();?>admin/kritiksaran"><i class="notika-icon notika-edit"></i> Kritik dan Saran</a>
                        </li>
                    </ul>
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
                                        <?php 
                                            $i = 0;
                                            foreach($penjualan as $list){
                                                $i = $i + $list->total_terjual;
                                                ?>
                                                <?php
                                            }
                                            ?>
                                        
										<h2>Total Item terjual : <span>&nbsp;<?php echo $i;?></span></h2>
                                        <p><span style="font-weight:bold;">
                                        </span>Kami menyediakan ayam yang sehat dan harga terbaik.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <section style="position:relative;top:0px;">
        <div class="container">
            <div class="row">
                <br/>
                <br/>
                <?php 
                    foreach($penjualan as $list){?>
                            <!-- <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                                <div class="blog-img">
                                </div>
                                <div class="blog-ctn">
                                    <div class="blog-hd-sw">
                                        <p style="color:#444;font-size:20px; font-weight:bold;text-transform: uppercase;"><?php echo $list->nama_kategori; ?></p>
                                        <p style="color:#444;font-size:30px;font-weight:bold;"><?php echo $list->total_terjual; ?></p>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30" style="padding:45px;">
                                    <div class="website-traffic-ctn">
                                        <h2><span class="counter"><?php echo $list->total_terjual; ?></span></h2>
                                        <p><?php echo $list->nama_kategori; ?></p>
                                    </div>
                                    <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                                </div>
                            </div>
                    <?php }
                ?>
            </div>
        </div>
    </section>
    <section>
     <div class="container">
      <div class="row" style="margin-top:20px;margin-bottom:40px;">
        <div class="col-lg-12 col-md-12">
            <canvas id="myChart" width="400" height="150"></canvas>
        </div>
      </div>
     </div>
    </section>