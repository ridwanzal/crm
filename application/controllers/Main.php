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

			$query2 = "SELECT * FROM produk";
			
			$query_result = $this->db->query($query)->result();
			$query_result2 = $this->db->query($query2)->result();

			$data['profile'] = $query_result;
			$data['produk'] = $query_result2;
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

			$query2 = "SELECT * FROM produk";

			$query_result = $this->db->query($query)->result();
			$query_result2 = $this->db->query($query2)->result();

			$data['profile'] = $query_result;
			$data['produk'] = $query_result2;
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
   
  
}