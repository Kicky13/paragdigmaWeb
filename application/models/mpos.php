<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mpos extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('forca_pos', TRUE);
	}

	public function _line_data($bln,$thn,$kode_produk)
	{
		$tambahan="";
		if ($kode_produk!=null)
		{
			$tambahan=" and kode_produk='".$kode_produk."'";
		}

		$sql = "SELECT
					sum(s_items.quantity) quantum_pembelian_zak,
					sum(s_items.subtotal) revenue,
					'sales' AS proses,
					sales.date,
					companies_supplier. NAME distributor,
					companies_lt.cf6 area,
					products. CODE kode_produk,
					products. NAME nama_produk,
					sales.biller nama_lt,
					companies_lt.cf2 shipto_lt,
					companies_lt.cf7 custumer_id_lt,
					sales.customer nama_toko,
					companies.cf2 shipto_toko,
					companies.cf7 custumer_id_toko,
					sum(sales.id) input_transaksi
				FROM
					sma_sale_items s_items
				LEFT JOIN sma_sales sales ON sales.id = s_items.sale_id
				AND sales.warehouse_id = s_items.warehouse_id
				LEFT JOIN sma_companies companies ON companies.id = sales.customer_id
				LEFT JOIN sma_companies companies_lt ON companies_lt.id = sales.biller_id
				LEFT JOIN sma_companies companies_supplier ON companies_supplier.id = companies_lt.cf3
				LEFT JOIN sma_products products ON products.id = s_items.product_id
				WHERE
					companies_lt.cf6 != 'x'
				AND s_items.quantity != 0 
				-- and companies_supplier.name =\"MITRA MAJU MAPAN\" 
				-- and companies_lt.cf6 = 3
				and products.CODE like '121%'
				and date_format(sales.date,'%m-%Y')= '".$bln."-".$thn."'
				 ".$tambahan." 
				GROUP BY
					s_items.product_id,
					s_items.warehouse_id,
					MONTH (sales.date),
					sales.customer_id
				ORDER BY
					sales.date DESC";
				return $sql;
	}

	public function get_trend_harga($tgl,$tipe,$kode_produk,$area)
	{
		if ($tipe =="harian")
		{
			$select1 = " date_format(sales.date,'%d-%m-%Y') tanggal  ";
			$wheretgl = " and date_format(sales.date,'%Y.%m')= '".$tgl."'";
			$groupby = " date_format(sales.date,'%d-%m-%Y'), ";
		}elseif ($tipe =="bulanan") {
			$select1 = " date_format(sales.date,'%m-%Y') tanggal  ";
			$wheretgl = " and date_format(sales.date,'%Y')= '".$tgl."'";
			$groupby = " date_format(sales.date,'%m-%Y'), ";
		}
		// if ($zaktipe =="40")
		// {
		// 	$wherezak = " and products.name like '%40%'";
		// }elseif($zaktipe=="50")
		// {
		// 	$wherezak = " and products.name like '%50%'";
		// }
		/*$sql = "SELECT		
					cast(min(s_items.net_unit_price) as int) MIN,
					cast(max(s_items.net_unit_price) as int) MAX,
					cast(avg(s_items.net_unit_price) as int) AVG,
					products.code,
					products.name nama_product,
					".$select1."
				FROM
					sma_sale_items s_items
				LEFT JOIN sma_sales sales ON sales.id = s_items.sale_id
				LEFT JOIN sma_companies companies_lt ON companies_lt.id = sales.biller_id
				LEFT JOIN sma_products products ON products.id = s_items.product_id
				WHERE
					companies_lt.cf6 != 'x'
				AND 
				s_items.quantity != 0 
				and products.CODE = '".$kode_produk."'
				".$wherezak."
				".$wheretgl."
				and companies_lt.cf6='".$area."'
				GROUP BY
					".$groupby."
					products.code
				ORDER BY
					sales.date,nama_product asc";*/
			$sql = "SELECT		
					cast(min(s_items.net_unit_price) as int) MIN,
					cast(max(s_items.net_unit_price) as int) MAX,
					cast(avg(s_items.net_unit_price) as int) AVG,
					products.code,
					products.name nama_product,
					".$select1."
				FROM
					sma_sale_items s_items
				LEFT JOIN sma_sales sales ON sales.id = s_items.sale_id
				LEFT JOIN sma_companies companies_lt ON companies_lt.id = sales.biller_id
				LEFT JOIN sma_products products ON products.id = s_items.product_id
				WHERE
					companies_lt.cf6 != 'x'
				AND 
				s_items.quantity != 0 
				and products.CODE = '".$kode_produk."'
				".$wheretgl."
				and companies_lt.cf6='".$area."'
				GROUP BY
					".$groupby."
					products.code
				ORDER BY
					sales.date,nama_product asc";
			return $this->db->query($sql)->result_array();
	}

	public function getdata_penjualantokoarea($bln,$thn,$kode_produk=null)
    {
    	$sql = "SELECT 
					sum(quantum_pembelian_zak) as total_penjualan,
					kode_produk,
					nama_produk,
					area
				from (".$this->_line_data($bln,$thn,$kode_produk).") sma_penjualan_lt
				group by nama_produk,area
				ORDER BY 4,3 asc";
		return $this->db->query($sql)->result_array();
    }

    public function getProduct()
    {
    	// $sql = "select DISTINCT products.code,products.name
				// from sma_products products
				// where products.CODE like '121%'
				// and name like '%".$tipezak."%'";
		$sql = "select DISTINCT products.code as KODE,products.name as NAMA
				from sma_products products
				where products.CODE like '121%' order by products.code asc";				
		return $this->db->query($sql)->result_array();			
    }
    public function get_toppenjualantokoperarea($bln,$thn,$kode_produk=null,$area){
    	$sql = "SELECT sum(cast(quantum_pembelian_zak as INT)) as QTY_JUAL,
    					sum(cast(revenue AS INT)) AS REVENUE,
				NAMA_LT,
				sma_companies.address ADDRESS
				from (".$this->_line_data($bln,$thn,$kode_produk).") sma_penjualan_lt
					join sma_companies on sma_penjualan_lt.shipto_lt = sma_companies.cf2
				where area = '".$area."'
				GROUP BY NAMA_LT,sma_companies.address
				ORDER BY 1 desc;";
		return $this->db->query($sql)->result_array();
		// return $sql;		
    }
}