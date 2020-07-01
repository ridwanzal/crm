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
                                        <th>Produk</th>
                                        <th>Tanggal</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 0;
                                        foreach($data_transaksi as $list){
                                            $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $list->id_transaksi; ?></td>
                                                    <td><?php echo $list->id_produk; ?></td>
                                                    <td><?php echo $list->nama_produk; ?></td>
                                                    <td><?php echo $list->tanggal; ?></td>
                                                    <td><?php echo $list->harga; ?></td>
                                                    <td><?php echo $list->jumlah; ?></td>
                                                    <td><?php echo $list->total_bayar; ?></td>
                                                    <td>
                                                    <?php 
                                                        if($list->bukti != ""){
                                                            ?>
                                                                <img style="cursor" width="60" src='<?php echo base_url('assets/transaction/proof/'.$list->bukti);?>'>
                                                            <?php
                                                        }else{
                                                               ?>  
                                                               <?php echo form_open_multipart('pelanggan/upload_bukti/'.$list->id_transaksi); ?>
                                                                   <input type="file" name="upload_image" id="upload_bukti_<?php echo $i;?>" required style="width:137px;">
                                                                   <input type="submit" value="Upload" style="background:#337ab7;color:#fff;border:1px solid #337ab7;" name="submit">
                                                               <?php echo form_close();?>
                                                            <?php
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
