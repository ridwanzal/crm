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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url()?>assets/js/main.js"></script>
    <script>
      var slideIndex = 1;
      showSlides(slideIndex);

      // Next/previous controls
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      // Thumbnail image controls
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
      }
    </script>
    <script>
            var BASE_URL = 'http://umarhafidh.online/';
            $(document).ready(function(){
                // console.log('bagusnye');
                // submit_kategori();
                // submit_produk();
                use_datatable();
                submit_kritiksaran();
            });

            function reply_toggle(id){
              $('#reply_container'+id).toggle();
            }

            function reply_thread(id, id_keluhan, id_konsumen){
                $('#reply_container'+id).toggle();
                let id_elem = id;
                let id_keluhans = id_keluhan;
                let tanggal = printDateResult(2);
                let pesan = $('#reply_text_'+id).val();

                json_pack = {
                    'id_keluhan' : '' + id_keluhan, 
                    'id_konsumen' : '' + id_konsumen,
                    'tanggal' : '' + tanggal, 
                    'pesan' : '' + pesan
                };

                console.log(json_pack);

                $.ajax({
                    url: "" + BASE_URL + '/pelanggan/add_komentar/',
                    type: "post",
                    data: json_pack,
                    success: function (response) {
                      let res = JSON.parse(response);
                      console.log(res);
                      let adapter = `<div id="user_comment_container_`+id+`_`+i+`">
                                        <hr/>
                                        <div class="view-mail-hd">
                                            <div class="view-mail-hrd">
                                                <div style="display:flex;">
                                                    <img style="position:relative;top:-1px;width:26px;border-radius:50px;border:1px solid #bbb;" src="https://s.kaskus.id/r60x60/user/avatar/2008/10/23/avatar571042_1.gif">&nbsp;&nbsp;&nbsp;<h2>`+res[0].nama_konsumen+`</h2>
                                                </div>
                                            </div>
                                            <div class="view-ml-rl">
                                                <div style="display:flex;">
                                                    <p>`+res[0].tanggal+`</p>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="view-mail-atn" style="border:1px solid #e9e9e9;    padding: 20px 20px 3px 20px;">
                                              <p style="text-align:left;">`+res[0].pesan+`</p>
                                        </div>
                                    </div
                                    `;

                          $('#comment_container_'+id_keluhan+'_' + id).append(adapter);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                    }
                });
            }


            function show_comment(id, id_keluhan){
                json_pack = {
                    'id_keluhan' : '' + id_keluhan, 
                };

                $.ajax({
                    url: "" + BASE_URL + '/pelanggan/show_komentar/',
                    type: "post",
                    data: json_pack,
                    success: function (response) {
                      let res = JSON.parse(response);
                      console.log(res);
                      for(i = 0; i < res.length; i++){
                        let adapter = `<div id="user_comment_container_`+id+`_`+i+`">
                                          <br/>
                                          <div class="view-mail-hd">
                                              <div class="view-mail-hrd">
                                                  <div style="display:flex;">
                                                      <img style="position:relative;top:-1px;width:26px;border-radius:50px;border:1px solid #bbb;" src="https://s.kaskus.id/r60x60/user/avatar/2008/10/23/avatar571042_1.gif">&nbsp;&nbsp;&nbsp;<h2>`+res[i].nama_konsumen+`</h2>
                                                  </div>
                                              </div>
                                              <div class="view-ml-rl">
                                                  <div style="display:flex;">
                                                      <p>`+res[i].tanggal+`</p>
                                                  </div>
                                              </div>
                                          </div>
                                          <br/>
                                          <div class="view-mail-atn" style="border:1px solid #e9e9e9;    padding: 20px 20px 3px 20px;">
                                                <p style="text-align:left;">`+res[i].pesan+`</p>
                                          </div>
                                      </div
                                      `;
                        let selector  = $('#user_comment_container_'+id+'_'+i+'');
                        if(selector.length == 0){
                          $('#comment_container_'+id_keluhan+'_' + id).append(adapter);
                        }
                      }
                      let selector1 = $('#line_'+id+'_'+i+'');
                      let selector2 = $('#comment_count_'+id+'_'+i+'');
                      if(selector1.length == 0 && selector2.length == 0 ){
                          $('#comment_container_'+id_keluhan+'_' + id).prepend(`<hr id="line_`+id+`_`+i+`" />`);
                          $('#comment_container_'+id_keluhan+'_' + id).prepend(`<div id="comment_count_`+id+`_`+i+`" style="text-align:left;font-weight:bold;font-size:18px;">`+res.length+` Komentar</div>`);
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                    }
                });
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