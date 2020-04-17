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
}