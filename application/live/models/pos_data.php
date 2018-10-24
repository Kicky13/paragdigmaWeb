<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pos_data extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('forca_pos', TRUE);
	}
    
    
    public function get_data(){
        $sql = "select * from sma_products";
        $data = $this->db->query($sql);
		return $data->result_array();
    }
    
    public function get_data_penjualan_lt(){
        /*$sql = "select sum(quantum_pembelian_zak) as jumlah_jual, distributor, kode_produk, nama_produk 
        from sma_penjualan_lt where date like '2017%' group by distributor, kode_produk, nama_produk
        order by area asc";*/
        $sql = "select sum(s_items.quantity) jumlah_jual,'sales' as proses,
        companies_supplier.name distributor, products.code kode_produk,products.name nama_produk from sma_sale_items s_items 
        LEFT JOIN sma_sales sales ON sales.id = s_items.sale_id and sales.warehouse_id = s_items.warehouse_id 
        LEFT JOIN sma_companies companies ON companies.id = sales.customer_id 
        LEFT JOIN sma_companies companies_lt ON companies_lt.id = sales.biller_id 
        LEFT JOIN sma_companies companies_supplier ON companies_supplier.id = companies_lt.cf3 
        LEFT JOIN sma_products products ON products.id = s_items.product_id 
        where companies_lt.cf6 !='x' and s_items.quantity != 0 and sales.date like '2017%' 
        and products.code like '121%'
        GROUP BY s_items.product_id, companies_supplier.name order by sales.date desc ";
        $data = $this->db->query($sql);
		return $data->result_array();
    }
    
    public function get_data_penjualan_lt_where_tgl($thn,$bln){
        /*$sql = "select sum(quantum_pembelian_zak) as jumlah_jual, distributor, kode_produk, nama_produk 
        from sma_penjualan_lt where date like '2017%' group by distributor, kode_produk, nama_produk
        order by area asc";*/
        $sql = "select sum(s_items.quantity) jumlah_jual,'sales' as proses,
        companies_supplier.name distributor, products.code kode_produk,products.name nama_produk from sma_sale_items s_items 
        LEFT JOIN sma_sales sales ON sales.id = s_items.sale_id and sales.warehouse_id = s_items.warehouse_id 
        LEFT JOIN sma_companies companies ON companies.id = sales.customer_id 
        LEFT JOIN sma_companies companies_lt ON companies_lt.id = sales.biller_id 
        LEFT JOIN sma_companies companies_supplier ON companies_supplier.id = companies_lt.cf3 
        LEFT JOIN sma_products products ON products.id = s_items.product_id 
        where companies_lt.cf6 !='x' and s_items.quantity != 0 and sales.date like '".$thn.'-'.$bln."%' 
        and products.code like '121%'
        GROUP BY s_items.product_id, companies_supplier.name order by sales.date,products.name asc ";
        $data = $this->db->query($sql);
		return $data->result_array();
    }
    
    public function get_data_pembelian_LT(){
        $sql = "select sum(p_items.quantity) qty_zak, 'purchases' as proses,month(purchases.date) as bulan,
					purchases.status,
					companies_supplier.name distributor,companies_lt.cf6 area,
					products.code kode_produk,products.name nama_produk,
					companies_lt.company nama_lt,companies_lt.cf2 shipto_lt,companies_lt.cf7 custumer_id_lt,
					count(purchases.id) input_transaksi
				from sma_purchase_items p_items
				LEFT JOIN sma_purchases purchases ON purchases.id = p_items.purchase_id and purchases.warehouse_id= p_items.warehouse_id
				LEFT JOIN sma_users users ON users.id = purchases.created_by and users.warehouse_id = purchases.warehouse_id
				LEFT JOIN sma_companies companies_lt ON companies_lt.id = users.biller_id
				LEFT JOIN sma_companies companies_supplier ON companies_supplier.id = companies_lt.cf3
				LEFT JOIN sma_products products ON products.id = p_items.product_id
				where companies_lt.cf6 !='x' 
				GROUP BY p_items.product_id,purchases.warehouse_id,purchases.status
				ORDER BY bulan desc";
        $data = $this->db->query($sql);
        return $data->result_array();
    }
    
    public function get_data_pembelian_toko(){
        $sql = "select 		sum(s_items.quantity) quantum_pembelian_zak,'sales' as proses,sales.date ,companies_supplier.name distributor,companies_lt.cf6 area,
					products.code kode_produk,products.name nama_produk,
					sales.biller nama_lt,companies_lt.cf2 shipto_lt,companies_lt.cf7 custumer_id_lt,
					sales.customer nama_toko,companies.cf2 shipto_toko,companies.cf7 custumer_id_toko,
					 sum(sales.id) input_transaksi
				from sma_sale_items  s_items 
				LEFT JOIN sma_sales sales ON sales.id = s_items.sale_id and sales.warehouse_id = s_items.warehouse_id
				LEFT JOIN sma_companies companies ON companies.id = sales.customer_id
				LEFT JOIN sma_companies companies_lt ON companies_lt.id = sales.biller_id
				LEFT JOIN sma_companies companies_supplier ON companies_supplier.id = companies_lt.cf3
				LEFT JOIN sma_products products ON products.id = s_items.product_id
				where companies_lt.cf6 !='x' 
				GROUP BY s_items.product_id,s_items.warehouse_id,month(sales.date),sales.customer_id
				order by sales.date desc";
        $data = $this->db->query($sql);
        return $data->result_array();
                
    }
    
    public function get_stok_lt(){
        $sql = "select	
						warehouse.product_code,
                        w.code,
                        w.name,
                        w.address,
                        p.code as kode_produk,
                        p.name as nama_produk,
                        companies_lt.cf6 area,
                        sum(gudang.qty) quantity  from (	
							select sum(case when a_items.type='addition' then cast(a_items.quantity as INT)
													 when a_items.type='subtraction' then cast(a_items.quantity as INT)*(-1)
													 end) as qty, a_items.product_id,a_items.warehouse_id, 'adjustment' as proses
									from sma_adjustment_items  a_items
										GROUP BY a_items.product_id,a_items.warehouse_id
							UNION
								select sum(CAST(s_items.quantity AS int))*(-1) qty,s_items.product_id,s_items.warehouse_id,  'sales' as proses 
									from sma_sale_items  s_items 
									LEFT JOIN sma_sales sales ON sales.id = s_items.sale_id
										 where sales.sale_status !='canceled' 
									GROUP BY s_items.product_id,warehouse_id
							UNION
								select sum(CAST(p_items.quantity_received as INT)) qty ,p_items.product_id,p_items.warehouse_id, 'purchases' as proses 
									from sma_purchase_items p_items
										
										where     p_items.status  !='canceled' 
										-- (p_items.status ='received' or p_items.status ='partial')
										GROUP BY p_items.product_id,p_items.warehouse_id
					) gudang
					LEFT JOIN sma_warehouses_products warehouse 
								ON warehouse.product_id = gudang.product_id 
									and warehouse.warehouse_id = gudang.warehouse_id
					LEFT JOIN `sma_users` on sma_users.warehouse_id = warehouse.id
                    LEFT JOIN sma_warehouses w on w.id =  gudang.warehouse_id
                    LEFT JOIN sma_products p on p.code = warehouse.product_code
                    LEFT JOIN sma_users users ON  users.warehouse_id = gudang.warehouse_id
				    LEFT JOIN sma_companies companies_lt ON companies_lt.id = users.biller_id
				
						where gudang.product_id in (1,6,7) and  warehouse.id is not null and warehouse.id != 0
                        and warehouse.warehouse_id is not null and warehouse.warehouse_id != 0 and w.code is not null
					GROUP BY gudang.product_id ,gudang.warehouse_id
                    order by	area asc
						";
        $data = $this->db->query($sql);
        return $data->result_array();
    }
    
    public function get_stok_lt_where_area_produk($material,$area){
        if($material != null){
            $query_material = 'and warehouse.product_code = "'.$material.'"';
        }
        else{
            $query_material = '';
        }
        if($area != null){
            $query_area = 'and companies_lt.cf6 = "'.$area.'"';
        }
        else{
            $query_area = '';
        }
        
        $sql = "select	
						warehouse.product_code,
                        w.code,
                        w.name,
                        w.address,
                        p.code as kode_produk,
                        p.name as nama_produk,
                        companies_lt.cf6 area,
                        sum(gudang.qty) quantity  from (	
							select sum(case when a_items.type='addition' then cast(a_items.quantity as INT)
													 when a_items.type='subtraction' then cast(a_items.quantity as INT)*(-1)
													 end) as qty, a_items.product_id,a_items.warehouse_id, 'adjustment' as proses
									from sma_adjustment_items  a_items
										GROUP BY a_items.product_id,a_items.warehouse_id
							UNION
								select sum(CAST(s_items.quantity AS int))*(-1) qty,s_items.product_id,s_items.warehouse_id,  'sales' as proses 
									from sma_sale_items  s_items 
									LEFT JOIN sma_sales sales ON sales.id = s_items.sale_id
										 where sales.sale_status !='canceled' 
									GROUP BY s_items.product_id,warehouse_id
							UNION
								select sum(CAST(p_items.quantity_received as INT)) qty ,p_items.product_id,p_items.warehouse_id, 'purchases' as proses 
									from sma_purchase_items p_items
										
										where     p_items.status  !='canceled' 
										-- (p_items.status ='received' or p_items.status ='partial')
										GROUP BY p_items.product_id,p_items.warehouse_id
					) gudang
					LEFT JOIN sma_warehouses_products warehouse 
								ON warehouse.product_id = gudang.product_id 
									and warehouse.warehouse_id = gudang.warehouse_id
					LEFT JOIN `sma_users` on sma_users.warehouse_id = warehouse.id
                    LEFT JOIN sma_warehouses w on w.id =  gudang.warehouse_id
                    LEFT JOIN sma_products p on p.code = warehouse.product_code
                    LEFT JOIN sma_users users ON  users.warehouse_id = gudang.warehouse_id
				    LEFT JOIN sma_companies companies_lt ON companies_lt.id = users.biller_id
				
						where gudang.product_id in (1,6,7) and  warehouse.id is not null and warehouse.id != 0
                        and warehouse.warehouse_id is not null and warehouse.warehouse_id != 0 and w.code is not null
                        $query_area $query_material
					GROUP BY gudang.product_id ,gudang.warehouse_id
                    order by	area asc
						";
        $data = $this->db->query($sql);
        return $data->result_array();
    }
    
    public function getProduct()
    {
    	$sql = "select DISTINCT products.code as KODE,products.name as NAMA
				from sma_products products
				where products.CODE like '121%'
                order by products.CODE asc";
		return $this->db->query($sql)->result_array();			
    }
}

?>