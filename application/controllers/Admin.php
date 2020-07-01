<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('form_validation');
    	      date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
	}
	
	public function produk(){
            $data['title_bar'] = "Produk | ayampreneur";
            $data['header_page'] = "";

            $id_user = $this->session->userdata('id_user');
            
            $query = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND
            a.id_user = '$id_user' ";

            $query2 = "SELECT * FROM kategori";

            $query3 = "SELECT * FROM produk";

            $query_result = $this->db->query($query)->result();
            $query_result2 = $this->db->query($query2)->result();
            $query_result3 = $this->db->query($query3)->result();

            $data['profile'] = $query_result;
            $data['kategori'] = $query_result2;
            $data['produk'] = $query_result3;
            $this->load->view('admin/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/dashboard/product', $data);
            $this->load->view('admin/footer', $data);
      }

      public function pelanggan(){
            $data['title_bar'] = "Pelanggan | ayampreneur";
            $data['header_page'] = "";

            $id_user = $this->session->userdata('id_user');
            
            $query = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND
            a.id_user = '$id_user' ";

            $query2 = "SELECT * FROM kategori";

            $query3 = "SELECT * FROM produk";

            $query4 = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND a.level = 'konsumen' ";

            $query_result = $this->db->query($query)->result();
            $query_result2 = $this->db->query($query2)->result();
            $query_result3 = $this->db->query($query3)->result();
            $query_result4 = $this->db->query($query4)->result();

            $data['profile'] = $query_result;
            $data['kategori'] = $query_result2;
            $data['produk'] = $query_result3;
            $data['pelanggan'] = $query_result4;
            $this->load->view('admin/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/dashboard/pelanggan', $data);
            $this->load->view('admin/footer', $data);
      }


      public function transaksi(){
            $data['title_bar'] = "Pelanggan | ayampreneur";
            $data['header_page'] = "";

            $id_user = $this->session->userdata('id_user');
            
            $query = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND
            a.id_user = '$id_user' ";

            $query2 = "SELECT * FROM kategori";

            $query3 = "SELECT * FROM produk";

            $query4 = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND a.level = 'konsumen' ";

            $query5 = "SELECT
            a.id_transaksi, a.bukti, a.status, c.id_produk, c.nama_produk, a.tanggal, c.harga, b.jumlah, b.subtotal, a.total_bayar
            FROM
            transaksi_produk a,
            detail_transaksi b,
            produk c
            WHERE
            a.id_transaksi = b.id_transaksi AND
            b.id_produk = c.id_produk";

            $query_result = $this->db->query($query)->result();
            $query_result2 = $this->db->query($query2)->result();
            $query_result3 = $this->db->query($query3)->result();
            $query_result4 = $this->db->query($query4)->result();
            $query_result5 = $this->db->query($query5)->result();

            $data['profile'] = $query_result;
            $data['kategori'] = $query_result2;
            $data['produk'] = $query_result3;
            $data['pelanggan'] = $query_result4;
            $data['transaksi'] = $query_result5;
            $this->load->view('admin/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/dashboard/transaksi', $data);
            $this->load->view('admin/footer', $data);
      }


      public function kritiksaran(){
            $data['title_bar'] = "Kritik dan Saran | ayampreneur";
            $data['header_page'] = "";
            
            $id_user = $this->session->userdata('id_user');
                
            $query = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND
            a.id_user = '$id_user' ";
    
            $query2 = "SELECT * FROM kategori";
    
            $query3 = "SELECT * FROM produk";
    
            $query4 = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND a.level = 'konsumen' ";
    
            $query5 = "SELECT a.*, b.nama_konsumen FROM keluhan a, konsumen b WHERE a.id_konsumen = b.id_konsumen ";
    
            $query_result = $this->db->query($query)->result();
            $query_result2 = $this->db->query($query2)->result();
            $query_result3 = $this->db->query($query3)->result();
            $query_result4 = $this->db->query($query4)->result();
            $query_result5 = $this->db->query($query5)->result();
    
            $data['profile'] = $query_result;
            $data['kategori'] = $query_result2;
            $data['produk'] = $query_result3;
            $data['pelanggan'] = $query_result4;
            $data['keluhan'] = $query_result5;
            $this->load->view('admin/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/dashboard/kritiksaran', $data);
            $this->load->view('pelanggan/footer', $data);
        }


      public function upselling(){
            $data['title_bar'] = "Upselling | ayampreneur";
            $data['header_page'] = "";

            $id_user = $this->session->userdata('id_user');
            
            $query = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND
            a.id_user = '$id_user' ";

            $query2 = "SELECT * FROM kategori";

            $query3 = "SELECT * FROM produk";

            $query4 = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND a.level = 'konsumen' ";

            $query5 = "SELECT * FROM upselling";

            $query6 = "SELECT
                        b.id_upselling,
                        b.jumlah,
                        a1.id_produk as id_produk1,
                        a2.id_produk as id_produk2,
                        a2.nama_produk as nama_produk1,
                        a1.nama_produk as nama_produk2
                        FROM
                        produk as a1,
                        produk as a2,
                        upselling as b
                        where a1.id_produk = b.id_produk
                        and a2.id_produk = b.id_produk2";

            $query_result = $this->db->query($query)->result();
            $query_result2 = $this->db->query($query2)->result();
            $query_result3 = $this->db->query($query3)->result();
            $query_result4 = $this->db->query($query4)->result();
            $query_result5 = $this->db->query($query5)->result();
            $query_result6 = $this->db->query($query6)->result();

            $data['profile'] = $query_result;
            $data['kategori'] = $query_result2;
            $data['produk'] = $query_result3;
            $data['pelanggan'] = $query_result4;
            $data['upselling'] = $query_result5;
            $data['upselling2'] = $query_result6;
            $this->load->view('admin/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/dashboard/upselling', $data);
            $this->load->view('admin/footer', $data);
      }

        
        // submit menggunakan ajax 
      public function category_add(){
            $nama_kategori = $this->input->post('p_nama_kategori', TRUE);
            $data = array(
                  'nama_kategori' => $nama_kategori,
            );

            $this->db->insert('kategori', $data);
            $affect_row = $this->db->affected_rows();
            if($affect_row > 0){
                  $data2 = array(
                        'status' => 'success'
                  );
                  $result = json_encode($data2);
                  echo $result;
            }else{
                  $data3 = array(
                        'status' => 'failed'
                  );
                  $result = json_encode($data3);
                  echo $result;
            }
      }

      // submit menggunakan ajax 
      public function product_add(){
            $nama_produk = $this->input->post('p_nama_produk', TRUE);
            $harga = $this->input->post('p_harga', TRUE);
            $stok = $this->input->post('p_stok', TRUE);
            $spesifikasi = $this->input->post('p_spesifikasi', TRUE);
            $id_kategori = $this->input->post('p_kategori', TRUE);
            $data = array(
                  'nama_produk' => $nama_produk,
                  'harga' => $harga,
                  'stok' => $stok,
                  'spesifikasi' => $spesifikasi,
                  'id_kategori' => $id_kategori
            );

            $this->db->insert('produk', $data);
            $affect_row = $this->db->affected_rows();
            if($affect_row > 0){
                  $data2 = array(
                        'status' => 'success'
                  );
                  $result = json_encode($data2);
                  echo $result;
            }else{
                  $data3 = array(
                        'status' => 'failed'
                  );
                  $result = json_encode($data3);
                  echo $result;
            }
      }

      public function upselling_add(){
            $id_produk = $this->input->post('id_produk', TRUE);
            $id_produk2 = $this->input->post('id_produk2', TRUE);
            $jumlah = $this->input->post('jumlah', TRUE);
            $data = array(
                  'id_produk' => $id_produk,
                  'id_produk2' => $id_produk2,
                  'jumlah' => $jumlah
            );

            $this->db->insert('upselling', $data);
            $affect_row = $this->db->affected_rows();
            if($affect_row > 0){
                  $data2 = array(
                        'status' => 'success'
                  );
                  $result =json_encode($data2);
                  echo $result;
            }else{
                  $data3 = array(
                        'status' => 'failed'
                  );
                  $result = json_encode($data3);
                  echo $result;
            }
      }

      public function upload_bukti($param){
            $foto = $_FILES['upload_image'];
            $image_path = "";
            $config['upload_path'] = './assets/transaction/proof/';
            $config['allowed_types'] = 'jpg|png|gif|pdf';
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('upload_image')){
                  echo 'Gagal upload';
            }else{
                  $image_path = $this->upload->data('file_name');
            }
            $data = array(
                  'bukti' => $image_path,
            );
            $this->db->where('id_transaksi', $param);
            $this->db->update('transaksi_produk', $data);
            $affect_row = $this->db->affected_rows();
            if($affect_row > 0){
                  redirect(base_url("pelanggan/transaksi"));
            }
      }
      
      public function konfirmasi($param){
            $data = array(
                  'status' => 'confirmed',
            );
            $this->db->where('id_transaksi', $param);
            $this->db->update('transaksi_produk', $data);
            $affect_row = $this->db->affected_rows();
            if($affect_row > 0){
                  redirect(base_url("admin/transaksi"));
            }
      }
}