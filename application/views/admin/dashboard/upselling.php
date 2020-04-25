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
                        <li class="active"><a href="<?php echo base_url(); ?>admin/produk/upselling"><i class="notika-icon notika-edit"></i> Up Selling</a>
                        </li>
                        <li><a href="#"><i class="notika-icon notika-edit"></i> Cross Selling</a>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_product">Tambah Upselling Produk</button>&nbsp;
                <div class="modal fade" id="add_product" role="dialog">
                    <div class="modal-dialog modals-default">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2>Tambah Produk Upselling</h2>
                                <br/>
                                <div class="nk-form">
                                    <div class="input-group mg-t-15">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                        <div class="nk-int-st">
                                            <select class="selectpicker form-control" id="id_produk1">
                                                <option value=''> -- Pilih Produk bundler</option>
                                                <?php 
                                                    foreach($produk as $list){ ?>
                                                        <option value='<?php echo $list->id_produk; ?>'><?php echo $list->nama_produk; ?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group mg-t-15">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                        <div class="nk-int-st">
                                            <select class="selectpicker form-control" id="id_produk2">
                                                <option value=''> -- Pilih Produk upselling</option>
                                                <?php 
                                                    foreach($produk as $list){ ?>
                                                        <option value='<?php echo $list->id_produk; ?>'><?php echo $list->nama_produk; ?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group mg-t-15">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                        <div class="nk-int-st">
                                            <select class="selectpicker form-control" id="jumlah_upselling">
                                                <option value=''> -- Jumlah </option>
                                                <?php 
                                                    for($x=1; $x <= 50; $x++){ 
                                                        $i++;
                                                        ?>
                                                        <option value='<?php echo $x; ?>'><?php echo $x; ?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div class="modal-footer">
                                <button type="button" id="submit_upselling" class="btn btn-default">Simpan</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                                                <th>Nama Kategori</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $i = 0;
                                                foreach($kategori as $list){
                                                    $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $list->nama_kategori; ?></td>
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
                                        <th>Nama Produk Bundler</th>
                                        <th>Nama Produk Upselling</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 0;
                                        foreach($upselling2 as $list){
                                            $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $list->nama_produk1; ?></td>
                                                    <td><?php echo $list->nama_produk2; ?></td>
                                                    <td><?php echo $list->jumlah; ?></td>
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