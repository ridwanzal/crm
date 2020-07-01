<div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="<?php echo base_url();?>"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li><a href="<?php echo base_url()?>admin/produk"><i class="notika-icon notika-mail"></i> Kategori & Produk</a>
                        </li>
                        <li><a href="<?php echo base_url();?>admin/daftar_pelanggan"><i class="notika-icon notika-support"></i> Pelanggan</a>
                        </li>
                        <li class="active"><a href="<?php echo base_url(); ?>admin/transaksi"><i class="notika-icon notika-edit"></i>Transaksi</a>
                        </li>
                        <li class=""><a href="<?php echo base_url(); ?>admin/produk/upselling"><i class="notika-icon notika-edit"></i> Up Selling</a>
                        </li>
                        <li class=""><a href="<?php echo base_url();?>admin/kritiksaran"><i class="notika-icon notika-edit"></i> Kritik dan Saran</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="header-top-menu">
                <div class="modal fade" id="add_upselling" role="dialog">
                    <div class="modal-dialog modals-default">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2>Tambah Kategori</h2>
                                <br/>
                                <br/>
                                <div class="nk-form">
                                    <div class="input-group">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                        <div class="nk-int-st">
                                            <input id="p_nama_kategori" type="text" class="form-control" placeholder="Nama Kategori" name="p_nama_kategori" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div class="modal-footer">
                                <button id="submit_add_category" type="button" class="btn btn-default">Save changes</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" class="close_modal">Close</button>
                            </div>
                               
                            <div class="data-table-list">
                                <div class="table-responsive">
                                    <table id="table2" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>ID Transaksi</th>
                                                <th>ID Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Tanggal</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Subtotal</th>
                                                <th>Total Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $i = 0;
                                                foreach($transaksi as $list){
                                                    $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $list->id_transaksi; ?></td>
                                                            <td><?php echo $list->id_produk; ?></td>
                                                            <td><?php echo $list->nama_produk; ?></td>
                                                            <td><?php echo $list->tanggal; ?></td>
                                                            <td><?php echo $list->harga; ?></td>
                                                            <td><?php echo $list->jumlah; ?></td>
                                                            <td><?php echo $list->subtotal; ?></td>
                                                            <td><?php echo $list->total_bayar; ?></td>
                                                        </tr>
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
        </div>
    </div>
</div>
<br/>
<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>ID Transaksi</th>
                                        <th>ID Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Tanggal</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Total Bayar</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 0;
                                        foreach($transaksi as $list){
                                            $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $list->id_transaksi; ?></td>
                                                    <td><?php echo $list->id_produk; ?></td>
                                                    <td><?php echo $list->nama_produk; ?></td>
                                                    <td><?php echo $list->tanggal; ?></td>
                                                    <td><?php echo $list->harga; ?></td>
                                                    <td><?php echo $list->jumlah; ?></td>
                                                    <td><?php echo $list->subtotal; ?></td>
                                                    <td><?php echo $list->total_bayar; ?></td>
                                                    <td>
                                                        <?php 
                                                            if($list->bukti != ""){
                                                                ?>
                                                                    <img style="cursor" width="60" src='<?php echo base_url('assets/transaction/proof/'.$list->bukti);?>'>
                                                                <?php
                                                            }else{
                                                                echo '<span style="color:red;">Belum ada bukti</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?
                                                            if($list->status == ''){
                                                                echo '<span style="color:#d58512">Inprogress</span>';
                                                            }else{
                                                                echo '<span style="color:#4cae4c">Confirmed</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?
                                                            if($list->status == ''){
                                                                ?>
                                                                    <?php echo form_open_multipart('admin/konfirmasi/'.$list->id_transaksi); ?>
                                                                        <input type="submit" value="Konfirmasi" style="background:#337ab7;color:#fff;border:1px solid #337ab7;" name="submit">
                                                                    <?php echo form_close();?>
                                                                <?php
                                                            }else{
                                                                echo '<span style="color:#4cae4c">Confirmed</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
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