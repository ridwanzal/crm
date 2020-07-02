<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Main extends CI_Controller { 

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
	}
	
	public function index()
	{
		$check_level = $this->session->userdata('level');
		if($check_level == 'admin'){
			$data['title_bar'] = "";
			$data['header_page'] = "";

			$id_user = $this->session->userdata('id_user');
			
			$query = "SELECT 
			a.*, b.*
			FROM 
			user a , 
			konsumen b 
			where a.id_konsumen = b.id_konsumen AND
			a.id_user = '$id_user' ";
			

			$query2 = "SELECT * FROM produk where stok > 0";

			$query3 = "SELECT * FROM kategori";

			$query4=  "SELECT a.id_kategori, a.nama_kategori, COUNT(c.id_transaksi) as total_terjual
						FROM
						kategori a LEFT JOIN produk b ON a.id_kategori = b.id_kategori LEFT JOIN
						detail_transaksi c ON c.id_produk = b.id_produk LEFT JOIN
						transaksi_produk d ON d.id_transaksi = c.id_transaksi
						GROUP BY a.id_kategori";
			$query_result3 = $this->db->query($query3)->result();
			$query_result = $this->db->query($query)->result();
			$query_result2 = $this->db->query($query2)->result();
			$query_result4 = $this->db->query($query4)->result();

			$data['profile'] = $query_result;
			$data['produk'] = $query_result2;
			$data['kategori'] = $query_result3;
			$data['penjualan'] = $query_result4;
			$this->load->view('admin/header', $data);
			$this->load->view('admin/navbar', $data);
			$this->load->view('admin/dashboard/index', $data);
			$this->load->view('admin/footer', $data);
		}else {
			$data['title_bar'] = "";
			$data['header_page'] = "";

			$id_user = $this->session->userdata('id_user');
			
			$query = "SELECT 
			a.*, b.*
			FROM 
			user a , 
			konsumen b 
			where a.id_konsumen = b.id_konsumen AND
			a.id_user = '$id_user' ";

			$query2 = "SELECT * FROM produk where stok > 0 ";

			$query_result = $this->db->query($query)->result();
			$query_result2 = $this->db->query($query2)->result();


			$query3 = "SELECT * FROM kategori";
			$query_result3 = $this->db->query($query3)->result();

			$data['profile'] = $query_result;
			$data['produk'] = $query_result2;
			$data['kategori'] = $query_result3;
			$this->load->view('pelanggan/header', $data);
			$this->load->view('pelanggan/navbar', $data);
			$this->load->view('pelanggan/dashboard/index', $data);
			$this->load->view('pelanggan/footer', $data);
		}
  }

  public function profile(){
		$id_user = $this->session->userdata('id_user');
		$query = "SELECT 
		a.*, b.*
		FROM 
		user a , 
		konsumen b 
		where a.id_konsumen = b.id_konsumen AND
		a.id_user = '$id_user' ";
		$query_result = $this->db->query($query)->result();
		
		$data['title_bar'] = "";
		$data['header_page'] = "";
		$data['profile'] = $query_result;
		$this->load->view('pelanggan/header', $data);
		$this->load->view('pelanggan/navbar', $data);
		$this->load->view('pelanggan/dashboard/profile', $data);
		$this->load->view('pelanggan/footer', $data);
  }

  public function detail_produk($id_produk){
		$query = "SELECT * FROM produk where id_produk = $id_produk";
		
		$id_user = $this->session->userdata('id_user');
		$query2  = "SELECT 
		a.*, b.*
		FROM 
		user a , 
		konsumen b 
		where a.id_konsumen = b.id_konsumen AND
		a.id_user = '$id_user' ";
		$query_result = $this->db->query($query)->result();


		$result = $this->db->query($query)->result();
		$result2 = $this->db->query($query2)->result();

		$query3 = "SELECT * FROM kategori";
		$query_result3 = $this->db->query($query3)->result();

		// retrive daftar upselling produk
		$query4 = "SELECT
					b.id_upselling,
					b.jumlah,
					a1.id_produk as id_produk1,
					a1.harga as harga_produk1,
					a2.id_produk as id_produk2,
					a2.harga as harga_produk2,
					a2.spesifikasi as spesifikasi_produk2,
					a2.nama_produk as nama_produk2,
					a1.nama_produk as nama_produk1
					FROM
					produk as a1,
					produk as a2,
					upselling as b
					where a1.id_produk = b.id_produk
					and a2.id_produk = b.id_produk2
					and a1.id_produk = $id_produk ";
		
		$query_result4 = $this->db->query($query4)->result();


		$query5 = "SELECT * FROM produk where id_produk != $id_produk and stok > 0";
		$query_result5 = $this->db->query($query5)->result();

		// retrieve daftar cross selling product
		
		$data['produk'] = $result;
		$data['profile'] = $result2;
		$data['kategori'] = $query_result3;
		$data['produk_upselling'] = $query_result4;
		$data['produk_crosselling'] = $query_result5;
		$this->load->view('pelanggan/header', $data);
		$this->load->view('pelanggan/navbar', $data);
		$this->load->view('pelanggan/dashboard/produkdetail', $data);
		$this->load->view('pelanggan/footer', $data);
  }
   
}