    <!-- Login Register area End-->
    <!-- jquery
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/counterup/waypoints.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>assets/js/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url()?>assets/js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/knob/jquery.knob.js"></script>
    <script src="<?php echo base_url()?>assets/js/knob/jquery.appear.js"></script>
    <script src="<?php echo base_url()?>assets/js/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/chat/jquery.chat.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/wave/waves.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/wave/wave-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/icheck/icheck.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/icheck/icheck-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/todo/jquery.todo.js"></script>
    <!-- Login JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/login/login-action.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url()?>assets/js/data-table/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/data-table/data-table-act.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/main.js"></script>
    <script>
            var BASE_URL = 'http://localhost/crm';
            $(document).ready(function(){
                // console.log('bagusnye');
                // submit_kategori();
                // submit_produk();
                use_datatable();
                submit_kritiksaran();
            });

            function submit_transaksi(id_produk, id_konsumen){
                let id_produk_data  = id_produk;
                let id_konsumen_data = id_konsumen;
                let quantity = $('#quantity').val();
            } 
            

            function use_datatable(){
              // $('#data-table-basic').DataTable();
              $('#table_kritiksaran').DataTable();
              $('#table3').DataTable();
            }
            
            
            function printDateResult(type){
              var dateg = new Date();
              var result = "";
              var dates = dateg.getDate();
              var months = dateg.getMonth()+1;
              var year = dateg.getFullYear();
              var hour = dateg.getHours();
              var minutes = dateg.getMinutes();
              var second = dateg.getSeconds();
              switch(type){
                case 1 : 
                  result = year + "-" + months + "-" + dates;
                break;
                case 2 : 
                  result = year + "-" + months + "-" + dates + " " + hour + ":" + minutes  +  ":" + second;
                  console.log(result);
                break;
              }

              return result;
            }


            function submit_kritiksaran(){
              var jenis = $('#jenis_saran');
              var isi_saran = $('#detail_kritiksaran');
              var id_konsumen = $('#id_konsumen')
              $('#submit_kritiksaran').on('click', function(){
                  let c1 = jenis.val() !== '' ? true : false;
                  let c2 = isi_saran.val() !== '' ? true : false;
                  if(c1 && c2){
                    // submit jika semua berisi
                    json_pack = {
                      'id_konsumen' : '' + id_konsumen.val(), 
                      'tanggal' : '' + printDateResult(2),
                      'tipe' : '' + jenis.val(), 
                      'pesan' : '' + isi_saran.val()
                    };

                    console.log(json_pack);

                    $.ajax({
                          url: "" + BASE_URL + '/pelanggan/add_kritiksaran/',
                          type: "post",
                          data: json_pack,
                          success: function (response) {
                            let res = JSON.parse(response);
                            if(res.status == 'success'){
                              setTimeout(function(){
                                $('#add_kritiksaran').modal('hide');
                                location.reload();
                              }, 500);
                            }
                          },
                          error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                          }
                      });
                  }else{
                    alert('Masih ada data yang kosong');
                  }
              }); 
            }

            function submit_kategori(){
              var get_nama_kategori = $('#p_nama_kategori');
              var nama_kategori = '';
              get_nama_kategori.on('change', function(){
                  nama_kategori = get_nama_kategori.val();
                  $('#submit_add_category').on('click', function(){
                    if(nama_kategori != '' || nama_kategori != null){
                        $.ajax({
                            url: "" + BASE_URL + '/admin/category_add/',
                            type: "post",
                            data: {
                              'p_nama_kategori' : '' + nama_kategori
                            } ,
                            success: function (response) {
                              let res = JSON.parse(response);
                              if(res.status == 'success'){
                                setTimeout(function(){
                                  $('#add_category').modal('hide');
                                  location.reload();
                                }, 500);
                              }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                              console.log(textStatus, errorThrown);
                            }
                        });
                      }
                  });
              });
            }

            function submit_produk(){
                let produk = $('#p_nama_produk');
                let harga = $('#p_harga');
                let stok = $('#p_stok');
                let spesifikasi = $('#p_spesifikasi');
                let id_kategori = $('#id_kategori');

                $('#submit_add_product').on('click', function(){
                  let c1 = produk.val() !== '' ? true : false;
                  let c2 = harga.val() !== '' ? true : false;
                  let c3 = stok.val() !== '' ? true : false;
                  let c4 = spesifikasi.val() !== '' ? true : false;
                  let c5 = id_kategori.val() !== '' ? true : false;
                    if(c1 && c2 && c3 && c4 && c5){
                        $.ajax({
                            url: "" + BASE_URL + '/admin/product_add/',
                            type: "post",
                            data: {
                              'p_nama_produk' : '' + produk.val(),
                              'p_harga' : '' + harga.val(),
                              'p_stok' : '' + stok.val(),
                              'p_spesifikasi' : '' + spesifikasi.val(),
                              'p_kategori' : '' + id_kategori.val(),
                            } ,
                            success: function (response) {
                              let res = JSON.parse(response);
                              if(res.status == 'success'){
                                setTimeout(function(){
                                  $('#add_category').modal('hide');
                                  location.reload();  
                                }, 500);
                              }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                              console.log(textStatus, errorThrown);
                            }
                        });
                    }else{
                      alert('Masih ada data yang kosong');
                    }
                });

            }
      </script>
</body>
</html>