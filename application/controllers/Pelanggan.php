<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Pelanggan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('form_validation');
    	date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
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
        $this->load->view('pelanggan/header', $data);
        $this->load->view('pelanggan/navbar', $data);
        $this->load->view('pelanggan/dashboard/kritiksaran', $data);
        $this->load->view('pelanggan/footer', $data);
    }

    public function transaksi(){
        $data['title_bar'] = "Transaksi | ayampreneur";
        $data['header_page'] = "";

        $id_user = $this->session->userdata('id_user');
        $id_konsumen = $this->session->userdata('id_konsumen');
            
        $query = "SELECT 
        a.*, b.*
        FROM 
        user a , 
        konsumen b 
        where a.id_konsumen = b.id_konsumen AND
        a.id_user = '$id_user' ";

        $query2 = "SELECT * FROM kategori";

        $query3 = "SELECT * FROM produk where stok > 0 ";

        $query4 = "SELECT 
        a.*, b.*
        FROM 
        user a , 
        konsumen b 
        where a.id_konsumen = b.id_konsumen AND a.level = 'konsumen' ";

      
        $query5 = "SELECT
        a.id_transaksi, c.id_produk, c.nama_produk, a.tanggal, c.harga, b.jumlah, b.subtotal, a.total_bayar
        FROM
        transaksi_produk a,
        detail_transaksi b,
        produk c
        WHERE
        a.id_transaksi = b.id_transaksi AND
        b.id_produk = c.id_produk AND
        a.id_konsumen = $id_konsumen";

        $query_result = $this->db->query($query)->result();
        $query_result2 = $this->db->query($query2)->result();
        $query_result3 = $this->db->query($query3)->result();
        $query_result4 = $this->db->query($query4)->result();
        $query_result5 = $this->db->query($query5)->result();

        $data['profile'] = $query_result;
        $data['kategori'] = $query_result2;
        $data['produk'] = $query_result3;
        $data['pelanggan'] = $query_result4;
        $data['data_transaksi'] = $query_result5;

        $this->load->view('pelanggan/header', $data);
        $this->load->view('pelanggan/navbar', $data);
        $this->load->view('pelanggan/dashboard/transaksi', $data);
        $this->load->view('pelanggan/footer', $data);
    }

    public function add_kritiksaran(){
        $id_konsumen = $this->input->post('id_konsumen', TRUE);
        $tanggal = $this->input->post('tanggal', TRUE);
        $tipe = $this->input->post('tipe', TRUE);
        $pesan = $this->input->post('pesan', TRUE);
        $data = array(
              'id_konsumen' => $id_konsumen,
              'tanggal' => $tanggal,
              'tipe' => $tipe,
              'pesan' => $pesan,
        );

        $this->db->insert('keluhan', $data);
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

    public function  update_kritiksaran(){

    }

    public function remove_kritiksaran(){

    }

    public function submit_transaksi(){
      $id_konsumen = $this->input->post('id_konsumen', TRUE);
      $id_produk = $this->input->post('id_produk', TRUE);
      $jumlah = $this->input->post('jumlah', TRUE);
      $harga = $this->input->post('harga', TRUE);
      $subtotal = $jumlah * $harga;
      $query = "SELECT * FROM produk where id_produk = $id_produk";
      $query_result = $this->db->query($query)->result();

      $kurangi_stok = $query_result[0]->stok - $jumlah;

      $data = array(
            'stok' => $kurangi_stok,
      );
      
      $this->db->where('id_produk', $id_produk);
      $this->db->update('produk', $data);

      // echo '<pre>';
      // var_dump($jumlah);
      // echo '</pre>';

      $date_gen=date_create("2013-03-15");
      $date_result = date_format($date_gen,"Y-m-d");

      $data = array(
            'id_konsumen' => $id_konsumen,
            'tanggal' => $date_result,
            'total' => $subtotal,
            'via' => '',
            'status' => '',
            'total_bayar' => $subtotal
      );

      $this->db->insert('transaksi_produk', $data);
      $affect_row = $this->db->affected_rows();
      if($affect_row > 0){
            $insert_id = $this->db->insert_id();
            $data2 = array(
                  'id_transaksi' => $insert_id,
                  'id_produk' => $id_produk,
                  'jumlah' => $jumlah,
                  'harga_satuan' => $harga,
                  'subtotal' => $subtotal,
                  'diskon' => 0,
                  'keterangan' => 0,
            );
            $this->db->insert('detail_transaksi', $data2);
            $affect_row2 = $this->db->affected_rows();
            if($affect_row2){
                  $this->session->set_flashdata('message', 'Transaksi anda berhasil');
                  redirect(base_url("main/detail_produk/".$id_produk));
            }
      }else{
            $this->load->view('pelanggan/header', $data);
            $this->load->view('pelanggan/navbar', $data);
            $this->load->view('pelanggan/dashboard/transaksi', $data);
            $this->load->view('pelanggan/footer', $data);
      }

    }

    public function kategori_produk($id_kategori){

      $id_user = $this->session->userdata('id_user');
      $id_konsumen = $this->session->userdata('id_konsumen');

          
      $query = "SELECT 
      a.*, b.*
      FROM 
      user a , 
      konsumen b 
      where a.id_konsumen = b.id_konsumen AND
      a.id_user = '$id_user' ";

      $query2 = "SELECT * FROM kategori";

      $query3 = "SELECT * FROM produk where stok > 0 ";

      $query4 = "SELECT 
      a.*, b.*
      FROM 
      user a , 
      konsumen b 
      where a.id_konsumen = b.id_konsumen AND a.level = 'konsumen' ";
    
      if($id_konsumen){
            $query5 = "SELECT
            a.id_transaksi, c.id_produk, c.nama_produk, a.tanggal, c.harga, b.jumlah, b.subtotal, a.total_bayar
            FROM
            transaksi_produk a,
            detail_transaksi b,
            produk c
            WHERE
            a.id_transaksi = b.id_transaksi AND
            b.id_produk = c.id_produk AND
            a.id_konsumen = $id_konsumen";
      }else{
            $query5 = "SELECT
            a.id_transaksi, c.id_produk, c.nama_produk, a.tanggal, c.harga, b.jumlah, b.subtotal, a.total_bayar
            FROM
            transaksi_produk a,
            detail_transaksi b,
            produk c
            WHERE
            a.id_transaksi = b.id_transaksi AND
            b.id_produk = c.id_produk";
      }

      $query6 = "SELECT * FROM produk where id_kategori = $id_kategori AND stok > 0";
      
      $query_result = $this->db->query($query)->result();
      $query_result2 = $this->db->query($query2)->result();
      $query_result3 = $this->db->query($query3)->result();
      $query_result4 = $this->db->query($query4)->result();
      $query_result5 = $this->db->query($query5)->result();
      $query_result6 = $this->db->query($query6)->result();
      
      $data['profile'] = $query_result;
      $data['kategori'] = $query_result2;
      // $data['produk'] = $query_result3;
      $data['pelanggan'] = $query_result4;
      $data['data_transaksi'] = $query_result5;
      $data['produk'] = $query_result6;

      $this->load->view('pelanggan/header', $data);
      $this->load->view('pelanggan/navbar', $data);
      $this->load->view('pelanggan/dashboard/index', $data);
      $this->load->view('pelanggan/footer', $data);
    }



    public function search(){
      $keyword = $this->input->get('keyword');
      $keyword_search =str_replace("'", "", $keyword);
      $id_user = $this->session->userdata('id_user');
      $id_konsumen = $this->session->userdata('id_konsumen');

      $query = "SELECT 
      a.*, b.*
      FROM 
      user a , 
      konsumen b 
      where a.id_konsumen = b.id_konsumen AND
      a.id_user = '$id_user' ";

      $query2 = "SELECT * FROM kategori";

      $query3 = "SELECT * FROM produk where stok > 0 ";

      $query4 = "SELECT 
      a.*, b.*
      FROM 
      user a , 
      konsumen b 
      where a.id_konsumen = b.id_konsumen AND a.level = 'konsumen' ";
    
      if($id_konsumen){
            $query5 = "SELECT
            a.id_transaksi, c.id_produk, c.nama_produk, a.tanggal, c.harga, b.jumlah, b.subtotal, a.total_bayar
            FROM
            transaksi_produk a,
            detail_transaksi b,
            produk c
            WHERE
            a.id_transaksi = b.id_transaksi AND
            b.id_produk = c.id_produk AND
            a.id_konsumen = $id_konsumen";
      }else{
            $query5 = "SELECT
            a.id_transaksi, c.id_produk, c.nama_produk, a.tanggal, c.harga, b.jumlah, b.subtotal, a.total_bayar
            FROM
            transaksi_produk a,
            detail_transaksi b,
            produk c
            WHERE
            a.id_transaksi = b.id_transaksi AND
            b.id_produk = c.id_produk";
      }

      $query6 = "SELECT * FROM produk where nama_produk like '%$keyword_search%' AND stok > 0";
      
      $query_result = $this->db->query($query)->result();
      $query_result2 = $this->db->query($query2)->result();
      $query_result3 = $this->db->query($query3)->result();
      $query_result4 = $this->db->query($query4)->result();
      $query_result5 = $this->db->query($query5)->result();
      $query_result6 = $this->db->query($query6)->result();
      
      $data['profile'] = $query_result;
      $data['kategori'] = $query_result2;
      // $data['produk'] = $query_result3;
      $data['pelanggan'] = $query_result4;
      $data['data_transaksi'] = $query_result5;
      $data['produk'] = $query_result6;

      $this->load->view('pelanggan/header', $data);
      $this->load->view('pelanggan/navbar', $data);
      $this->load->view('pelanggan/dashboard/index', $data);
      $this->load->view('pelanggan/footer', $data);
    }

}