<div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="<?php echo base_url();?>"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <?php
                            if($this->session->userdata('status') == "login"){ ?>
                                <li><a href="<?php echo base_url(); ?>pelanggan/transaksi"><i class="notika-icon notika-mail"></i> Transaksi</a>
                                </li>
                            <?php }
                        ?>
                        <li class="active"><a href="<?php echo base_url(); ?>pelanggan/kritiksaran"><i class="notika-icon notika-edit"></i> Kritik & Saran</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <section style="min-height:800px;position:relative;top:-60px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> 
                                Anda dapat mengajukan <span class="alert-link"> kritik ataupun saran </span> untuk kepentingan bersama di halaman ini.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-xs-12 col-md-12">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_kritiksaran">Ajukan Kritik / Saran</button>&nbsp;
                </div>
            </div>
        </div>
        <br/>
        <!-- <div class="data-table-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="data-table-list">
                                <div class="table-responsive">
                                    <table id="table_kritiksaran" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Nama Konsumen</th>
                                                <th>Jenis</th>
                                                <th>Saran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $i = 0;
                                                foreach($keluhan as $list){
                                                    $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $list->nama_konsumen; ?></td>
                                                            <td>
                                                                
                                                                <?php 
                                                            if($list->tipe == 'saran'){ ?>
                                                                <div class="alert alert-success" role="alert"><?php echo $list->tipe; ?></div>
                                                            <?php }else { ?>
                                                                <div class="alert alert-danger" role="alert"><?php echo $list->tipe; ?></div>
                                                            <?php } 
                                                            
                                                            ?>
                                                            </td>
                                                            <td><?php echo $list->pesan; ?></td>
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
        </div> -->
        <div class="container">
            <?php

                    foreach($keluhan as $list){ ?>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="view-mail-list sm-res-mg-t-30" style="border:1px solid #ddd;">
                                        <div class="view-mail-hd">
                                            <div class="view-mail-hrd">
                                                <div style="display:flex;">
                                                    <img style="position:relative;top:-1px;width:26px;border-radius:50px;border:1px solid #bbb;" src="https://s.kaskus.id/r60x60/user/avatar/2008/10/23/avatar571042_1.gif">&nbsp;&nbsp;&nbsp;<h2><?php echo $list->nama_konsumen; ?></h2>
                                                </div>
                                            </div>
                                            <div class="view-ml-rl">
                                                <div style="display:flex;">
                                                    <?php
                                                    if($list->tipe == 'saran'){ ?>
                                                        <button class="btn btn-success btn-xs"><i class="notika-icon notika-next"></i> Saran</button>&nbsp;&nbsp;
                                                    <?php }else { ?>
                                                        <button class="btn btn-danger btn-xs"><i class="notika-icon notika-next"></i> Kritik</button>&nbsp;&nbsp;
                                                    <?php } ?>
                                                    <p><?php echo $list->tanggal; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mail-ads mail-vw-ph">
                                          
                                        </div>
                                        <div class="view-mail-atn" style="border:1px solid #e9e9e9;    padding: 20px 20px 3px 20px;">
                                            <p><?php echo $list->pesan; ?></p>
                                        </div>
                                        <div class="file-download-system">
                                        </div>
                                        <div class="vw-ml-action-ls text-right mg-t-10">
                                            <div class="btn-group ib-btn-gp active-hook nk-email-inbox">
                                                <button class="btn btn-default btn-sm waves-effect"><i class="notika-icon notika-next"></i> Komentar</button>
                                                <button class="btn btn-default btn-sm waves-effect"><i class="notika-icon notika-next"></i> Balas</button>
                                                <!-- <button class="btn btn-default btn-sm waves-effect"><i class="notika-icon notika-right-arrow"></i> Forward</button>
                                                <button class="btn btn-default btn-sm waves-effect"><i class="notika-icon notika-print"></i> Print</button>
                                                <button class="btn btn-default btn-sm waves-effect"><i class="notika-icon notika-trash"></i> Remove</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                   <?php }
            
            ?>
        </div>
    </section>


    <!-- modal goes here -->
    <div class="modal fade" id="add_kritiksaran" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h2>Tambah Produk</h2>
                        <br/>
                        <br/>
                        <div class="nk-form">
                            <div class="input-group mg-t-15">
                                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                <div class="nk-int-st">
                                    <select class="selectpicker form-control" id="jenis_saran">
                                        <option value='saran'>Saran</option>
                                        <option value='kritik'>Kritik</option>
                                    </select>
                                    <input type="hidden" value="<?php echo $this->session->userdata('id_konsumen'); ?>" class="form-control"  id="id_konsumen"></textarea>
                                </div>
                            </div>
                            <div class="input-group mg-t-15">
                                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-phone"></i></span>
                                <!-- <div class="nk-int-st">
                                    <input type="text" class="form-control" placeholder="Spesifikasi" name="p_spesifikasi"  id="p_spesifikasi"  required>
                                </div> -->
                                <div class="form-group">
                                    <div class="form-single nk-int-st widget-form">
                                        <textarea name="message" class="form-control" placeholder="Detail Kritik / Saran" name="p_spesifikasi"  id="detail_kritiksaran"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <div class="modal-footer">
                        <button type="button" id="submit_kritiksaran" class="btn btn-default">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>