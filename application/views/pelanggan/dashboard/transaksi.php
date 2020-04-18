<div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="<?php echo base_url();?>"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <?php
                            if($this->session->userdata('status') == "login"){ ?>
                                <li class="active"><a href="<?php echo base_url()?>pelanggan/transaksi"><i class="notika-icon notika-mail"></i> Transaksi</a>
                                </li>
                                <li><a href="<?php echo base_url()?>pelanggan/kritiksaran"><i class="notika-icon notika-edit"></i> Kritik & Saran</a>
                                </li>
                            <?php }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="table3" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id. Transaksi </th>
                                        <th>Id. Produk </th>
                                        <th>Nama Produk</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($data_transaksi as $list){
                                            ?>
                                                <tr>
                                                    <td><?php echo $list->id_transaksi; ?></td>
                                                    <td><?php echo $list->id_produk; ?></td>
                                                    <td><?php echo $list->nama_produk; ?></td>
                                                    <td><?php echo $list->tanggal; ?></td>
                                                    <td><?php echo $list->harga; ?></td>
                                                    <td><?php echo $list->jumlah; ?></td>
                                                    <td><?php echo $list->total_bayar; ?></td>
                                                    <td><a href="#" class="btn btn-success btn-xs">Lihat Detail Transaksi</a>&nbsp;<a href="<?php echo base_url()?>main/detail_produk/<?php echo $list->id_produk?>" class="btn btn-primary btn-xs">Lihat Detail Produk</a></td>
                                                </aLihat>
                                        <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
