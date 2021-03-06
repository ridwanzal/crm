    <!-- Login Register area End-->
    <!-- jquery
		============================================ -->
    <!-- <script src="<?php echo base_url()?>assets/js/vendor/jquery-1.12.4.min.js"></script> -->
    <script
      src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous"></script>
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
        <!-- flot JS
		============================================ -->
    <!-- <script src="<?php echo base_url()?>assets/js/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>assets/js/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url()?>assets/js/flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url()?>assets/js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/flot/analtic-flot-active.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
</body>
<script>
        var BASE_URL = 'http://localhost/crm';
        $(document).ready(function(){
          // console.log('bagusnye');
          submit_kategori();
          submit_produk();
          use_datatable();
          // submit_transaksi();
          submit_upselling();
          var ctx = document.getElementById('myChart');
          // var myLineChart = new Chart(ctx, {
          //   type: 'line',
          //   data: ['10', '20'],
          // });
          let ARR_DATA_CHART = [];
          $.ajax({
            url : '<?= base_url();?>/admin/chart_penjualan',
            success : function(res){
              console.log(res);
              console.log('ini mantap jiwa')
              let resp = JSON.parse(res); 
              console.log(resp);
              let i = 0;
              for(i; i < resp.length; i++){
                ARR_DATA_CHART.push(Object.values(resp[i]));
              }
              console.log(ARR_DATA_CHART)
              var myLineChart = new Chart(
              document.getElementById("myChart"),
                {"type":"line",
                  "data":
                      {
                      "labels":
                        ["January","February","March","April","May","June","July","Agustus", "September", "Oktober", "November", "Desember"],
                      "datasets":[
                                    {"label":"My First Dataset","data":ARR_DATA_CHART[0],"fill":false,"borderColor":"rgb(75, 192, 192)","lineTension":0.01}
                                  ]
                      },"options":{
                            title: {
                              display: true,
                              text: 'Total Penjualan Ayam PT Tiga Raja'
                          }
                      }
                }); 
            },
          });

          

        });

        function use_datatable(){
          $('#data-table-basic').DataTable();
          $('#table2').DataTable();
        }

        function submit_upselling(){
          $('#submit_upselling').on('click', function(){
              var get_id_produk = $('#id_produk1').val();
              var get_id_produk2 = $('#id_produk2').val();
              var get_jumlah = $('#jumlah_upselling').val();
              if(get_id_produk && get_id_produk2 && get_jumlah){
                  $.ajax({
                        url: "" + BASE_URL + '/admin/upselling_add/',
                        type: "post",
                        data: {
                          'id_produk' : '' + get_id_produk,
                          'id_produk2' : '' + get_id_produk2,
                          'jumlah' : '' + get_jumlah,
                        } ,
                        success: function (response) {
                          let res = JSON.parse(response);
                          if(res.status == 'success'){
                            setTimeout(function(){
                              $('#add_upselling').modal('hide');
                              location.reload();  
                            }, 500);
                          }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                          console.log(textStatus, errorThrown);
                        }
                    });
              }else{
                alert('Masih ada yang kosong');
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

        function submit_transaksi(a, b){
          alert(a + b);
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
</html>