<?php

class mtrend_harga_tebus extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('devsd', TRUE);
	}

	function get_trend_7000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm)
	{
			// $sql="select cast(sum(harga)/nvl(sum(kwmeng),1) as INTEGER)HARGA,ITEM_NO,PRODUK,nm_kota,PROPINSI_TO,incoterm,to_char(TGL_CMPLT,'YYYYMM') TGL
			// 		from ZREPORT_RPT_REAL
			// 		where to_char(TGL_CMPLT,'YYYY') = '$tahun'
			// 		and ( (order_type <>'ZNL' and
			// 		(item_no like '121-301%' and item_no not in ('121-301-0240','121-301-0350','121-301-0351') )) ) and (plant <>'2490' or plant <>'7490') 
			// 		and com in (7000,5000) and no_polisi <> 'S11LO'
			// 		and sold_to like '0000000%'
			// 		and ITEM_NO = '$kode_produk'
			// 		and PROPINSI_TO='$kdpropinsi'
			// 		and kota = '$kdkota'
			// 		and harga<>0 and harga is not null
			// 		and incoterm = '$incoterm'
			// 		GROUP BY ITEM_NO,PRODUK,nm_kota,PROPINSI_TO,incoterm,to_char(TGL_CMPLT,'YYYYMM')
			// 		order by TGL asc
			// 	";
				$sql = "SELECT
							cast(
								SUM (A1.harga) / NVL (SUM(A1.kwmeng), 1) AS INTEGER
							) HARGA,
							A1.ITEM_NO,
							A2.ARKTX PRODUK,
							A1.nm_kota,
							A1.PROPINSI_TO,
							A1.incoterm,
							TO_CHAR (A1.TGL_CMPLT, 'YYYYMM') TGL
						FROM
							ZREPORT_RPT_REAL A1
							LEFT JOIN ZREPORT_M_MATERIAL A2 on A1.ITEM_NO=A2.MATNR
						WHERE
							TO_CHAR (A1.TGL_CMPLT, 'YYYY') = '$tahun'
						AND (
							(
								A1.order_type <> 'ZNL'
								AND (
									A1.item_no LIKE '121-301%'
									AND A1.item_no NOT IN (
										'121-301-0240',
										'121-301-0350',
										'121-301-0351'
									)
								)
							)
						)
						AND (
							A1.plant <> '2490'
							OR A1.plant <> '7490'
						)
						AND A1.com IN (7000, 5000)
						AND A1.no_polisi <> 'S11LO'
						AND A1.sold_to LIKE '0000000%'
						AND A1.ITEM_NO = '$kode_produk'
						AND A1.PROPINSI_TO = '$kdpropinsi'
						AND A1.kota = '$kdkota'
						AND A1.harga <> 0
						AND A1.harga IS NOT NULL
						AND A1.incoterm = '$incoterm'
						GROUP BY
							A1.ITEM_NO,
							A2.ARKTX,
							A1.nm_kota,
							A1.PROPINSI_TO,
							A1.incoterm,
							TO_CHAR (A1.TGL_CMPLT, 'YYYYMM')
						ORDER BY
							TGL ASC";
				return $this->db->query($sql)->result_array();
	}

	function get_min_7000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm)
	{
		$sql = "select MIN(HARGA) HARGA,ITEM_NO,PRODUK,NM_KOTA,PROPINSI_TO,INCOTERM,SUBSTR(TGL, 0,6) TGL
					from (SELECT 
						CAST(((SUM (A1.harga) / NVL (SUM(A1.kwmeng), 1))*10/11) as INTEGER)
					 HARGA,
					 A1.ITEM_NO,
					 A2.ARKTX PRODUK,
					 A1.nm_kota,
					 A1.PROPINSI_TO,
					 A1.incoterm,
					 TO_CHAR (A1.TGL_CMPLT, 'YYYYMMDD') TGL
					FROM
						ZREPORT_RPT_REAL A1
					LEFT JOIN ZREPORT_M_MATERIAL A2 ON A1.ITEM_NO = A2.MATNR
					WHERE
						TO_CHAR (A1.TGL_CMPLT, 'YYYY') = '$tahun'
					AND (
						(
							A1.order_type <> 'ZNL'
							AND (
								A1.item_no LIKE '121-301%'
								AND A1.item_no NOT IN (
									'121-301-0240',
									'121-301-0350',
									'121-301-0351'
								)
							)
						)
					)
					AND (
						A1.plant <> '2490'
						OR A1.plant <> '7490'
					)
					AND A1.com IN (7000, 5000)
					AND A1.no_polisi <> 'S11LO'
					AND A1.sold_to LIKE '0000000%'
					AND A1.ITEM_NO = '$kode_produk'
					AND A1.PROPINSI_TO = '$kdpropinsi'
					AND A1.kota = '$kdkota'
					AND A1.harga <> 0
					AND A1.harga IS NOT NULL
					AND A1.incoterm = '$incoterm'
					GROUP BY
						A1.ITEM_NO,
						A2.ARKTX,
						A1.nm_kota,
						A1.PROPINSI_TO,
						A1.incoterm,
						TO_CHAR (A1.TGL_CMPLT, 'YYYYMMDD')
					ORDER BY
						TGL ASC)
					GROUP BY 
					ITEM_NO,PRODUK,NM_KOTA,PROPINSI_TO,INCOTERM,SUBSTR(TGL, 0,6)
					ORDER BY TGL ASC";
					return $this->db->query($sql)->result_array();
	}

	function get_max_7000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm)
	{
		$sql = "select MAX(HARGA) HARGA,ITEM_NO,PRODUK,NM_KOTA,PROPINSI_TO,INCOTERM,SUBSTR(TGL, 0,6) TGL
					from (SELECT 
						CAST(((SUM (A1.harga) / NVL (SUM(A1.kwmeng), 1))*10/11) as INTEGER)
					 HARGA,
					 A1.ITEM_NO,
					 A2.ARKTX PRODUK,
					 A1.nm_kota,
					 A1.PROPINSI_TO,
					 A1.incoterm,
					 TO_CHAR (A1.TGL_CMPLT, 'YYYYMMDD') TGL
					FROM
						ZREPORT_RPT_REAL A1
					LEFT JOIN ZREPORT_M_MATERIAL A2 ON A1.ITEM_NO = A2.MATNR
					WHERE
						TO_CHAR (A1.TGL_CMPLT, 'YYYY') = '$tahun'
					AND (
						(
							A1.order_type <> 'ZNL'
							AND (
								A1.item_no LIKE '121-301%'
								AND A1.item_no NOT IN (
									'121-301-0240',
									'121-301-0350',
									'121-301-0351'
								)
							)
						)
					)
					AND (
						A1.plant <> '2490'
						OR A1.plant <> '7490'
					)
					AND A1.com IN (7000, 5000)
					AND A1.no_polisi <> 'S11LO'
					AND A1.sold_to LIKE '0000000%'
					AND A1.ITEM_NO = '$kode_produk'
					AND A1.PROPINSI_TO = '$kdpropinsi'
					AND A1.kota = '$kdkota'
					AND A1.harga <> 0
					AND A1.harga IS NOT NULL
					AND A1.incoterm = '$incoterm'
					GROUP BY
						A1.ITEM_NO,
						A2.ARKTX,
						A1.nm_kota,
						A1.PROPINSI_TO,
						A1.incoterm,
						TO_CHAR (A1.TGL_CMPLT, 'YYYYMMDD')
					ORDER BY
						TGL ASC)
					GROUP BY 
					ITEM_NO,PRODUK,NM_KOTA,PROPINSI_TO,INCOTERM,SUBSTR(TGL, 0,6)
					ORDER BY TGL ASC";
					return $this->db->query($sql)->result_array();
	}

	function get_median_7000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm)
	{
		$sql = "select MEDIAN(HARGA) HARGA,ITEM_NO,PRODUK,NM_KOTA,PROPINSI_TO,INCOTERM,SUBSTR(TGL, 0,6) TGL
					from (SELECT 
						CAST(((SUM (A1.harga) / NVL (SUM(A1.kwmeng), 1))*10/11) as INTEGER)
					 HARGA,
					 A1.ITEM_NO,
					 A2.ARKTX PRODUK,
					 A1.nm_kota,
					 A1.PROPINSI_TO,
					 A1.incoterm,
					 TO_CHAR (A1.TGL_CMPLT, 'YYYYMMDD') TGL
					FROM
						ZREPORT_RPT_REAL A1
					LEFT JOIN ZREPORT_M_MATERIAL A2 ON A1.ITEM_NO = A2.MATNR
					WHERE
						TO_CHAR (A1.TGL_CMPLT, 'YYYY') = '$tahun'
					AND (
						(
							A1.order_type <> 'ZNL'
							AND (
								A1.item_no LIKE '121-301%'
								AND A1.item_no NOT IN (
									'121-301-0240',
									'121-301-0350',
									'121-301-0351'
								)
							)
						)
					)
					AND (
						A1.plant <> '2490'
						OR A1.plant <> '7490'
					)
					AND A1.com IN (7000, 5000)
					AND A1.no_polisi <> 'S11LO'
					AND A1.sold_to LIKE '0000000%'
					AND A1.ITEM_NO = '$kode_produk'
					AND A1.PROPINSI_TO = '$kdpropinsi'
					AND A1.kota = '$kdkota'
					AND A1.harga <> 0
					AND A1.harga IS NOT NULL
					AND A1.incoterm = '$incoterm'
					GROUP BY
						A1.ITEM_NO,
						A2.ARKTX,
						A1.nm_kota,
						A1.PROPINSI_TO,
						A1.incoterm,
						TO_CHAR (A1.TGL_CMPLT, 'YYYYMMDD')
					ORDER BY
						TGL ASC)
					GROUP BY 
					ITEM_NO,PRODUK,NM_KOTA,PROPINSI_TO,INCOTERM,SUBSTR(TGL, 0,6)
					ORDER BY TGL ASC";
					return $this->db->query($sql)->result_array();
	}

	function get_trend_4000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm)
	{
		// $sql="select cast(sum(harga)/nvl(sum(kwmeng),1) as INTEGER)HARGA,ITEM_NO,PRODUK,nm_kota,PROPINSI_TO,incoterm,to_char(TGL_CMPLT,'YYYYMM') TGL
		// 		from ZREPORT_RPT_REAL_ST
		// 		where to_char(TGL_CMPLT,'YYYY') = '$tahun'
		// 		and ( (order_type <>'ZNL' and
		// 		(item_no like '121-301%' and item_no not in ('121-301-0240','121-301-0350','121-301-0351') )) ) 
		// 		and com = '4000' 
		// 		and no_polisi <> 'S11LO'
		// 		and sold_to like '0000000%'
		// 		and harga<>0 and harga is not null
		// 		and PROPINSI_TO='$kdpropinsi'
		// 		and kota = '$kdkota'
		// 		and ITEM_NO = '$kode_produk'
		// 		and incoterm = '$incoterm'
		// 		GROUP BY ITEM_NO,PRODUK,nm_kota,PROPINSI_TO,incoterm,to_char(TGL_CMPLT,'YYYYMM')
		// 		order by to_char(TGL_CMPLT,'YYYYMM') asc";  
				$sql = "SELECT
							cast(
								SUM (A1.harga) / NVL (SUM(A1.kwmeng), 1) AS INTEGER
							) HARGA,
							A1.ITEM_NO,
							A2.ARKTX PRODUK,
							A1.nm_kota,
							A1.PROPINSI_TO,
							A1.incoterm,
							TO_CHAR (A1.TGL_CMPLT, 'YYYYMM') TGL
						FROM
							ZREPORT_RPT_REAL_ST A1
							LEFT JOIN ZREPORT_M_MATERIAL A2 on A1.ITEM_NO=A2.MATNR
						WHERE
							TO_CHAR (A1.TGL_CMPLT, 'YYYY') = '$tahun'
						AND (
							(
								A1.order_type <> 'ZNL'
								AND (
									A1.item_no LIKE '121-301%'
									AND A1.item_no NOT IN (
										'121-301-0240',
										'121-301-0350',
										'121-301-0351'
									)
								)
							)
						)
						AND A1.com IN (4000)
						AND A1.no_polisi <> 'S11LO'
						AND A1.sold_to LIKE '0000000%'
						AND A1.ITEM_NO = '$kode_produk'
						AND A1.PROPINSI_TO = '$kdpropinsi'
						AND A1.kota = '$kdkota'
						AND A1.harga <> 0
						AND A1.harga IS NOT NULL
						AND A1.incoterm = '$incoterm'
						GROUP BY
							A1.ITEM_NO,
							A2.ARKTX,
							A1.nm_kota,
							A1.PROPINSI_TO,
							A1.incoterm,
							TO_CHAR (A1.TGL_CMPLT, 'YYYYMM')
						ORDER BY
							TGL ASC";
		return $this->db->query($sql)->result_array();   			
	}
	
	function get_min_4000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm)
	{
		$sql="SELECT  MIN(HARGA) HARGA,ITEM_NO,NM_KOTA,PROPINSI_TO,INCOTERM,SUBSTR(TGL, 0,6) TGL from (
				SELECT		
											CAST(((SUM (A1.harga) / NVL (SUM(A1.kwmeng), 1))*10/11) as INTEGER) HARGA,
											A1.ITEM_NO,
											--A2.ARKTX PRODUK,
											A1.PRODUK,
											A1.nm_kota,
											A1.KOTA,
											A1.PROPINSI_TO,
											A1.incoterm,
											TO_CHAR (A1.TGL_CMPLT, 'YYYYMMDD') TGL
										FROM
											ZREPORT_RPT_REAL_TLCC A1
											--LEFT JOIN ZREPORT_M_MATERIAL A2 on A1.ITEM_NO=A2.MATNR
										WHERE
											TO_CHAR (A1.TGL_CMPLT, 'YYYY') = '$tahun'
										AND (
											(
												A1.order_type <> 'ZNL'
												AND (
													A1.item_no LIKE '121-301%'
													AND A1.item_no NOT IN (
														'121-301-0240',
														'121-301-0350',
														'121-301-0351'
													)
												)
											)
										)
										AND A1.com IN (6000)
										AND A1.no_polisi <> 'S11LO'
				-- 						AND A1.sold_to LIKE '0000000%'
										AND A1.ITEM_NO = '$kode_produk'
										AND A1.PROPINSI_TO = '$kdpropinsi'
										AND A1.kota = '$kdkota'
										AND A1.harga <> 0
										AND A1.harga IS NOT NULL
										AND A1.incoterm = '$incoterm'
										GROUP BY
											A1.ITEM_NO,
											--A2.ARKTX,
											A1.PRODUK,
											A1.nm_kota,
											A1.KOTA,
											A1.PROPINSI_TO,
											A1.incoterm,
											TO_CHAR (A1.TGL_CMPLT, 'YYYYMMDD')
										ORDER BY
											TGL ASC
				)
				GROUP BY 
				ITEM_NO,NM_KOTA,PROPINSI_TO,INCOTERM,SUBSTR(TGL, 0,6)
				ORDER BY TGL ASC";
	}

	function get_max_4000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm)
	{
		$sql="SELECT  MAX(HARGA) HARGA,ITEM_NO,NM_KOTA,PROPINSI_TO,INCOTERM,SUBSTR(TGL, 0,6) TGL from (
				SELECT		
											CAST(((SUM (A1.harga) / NVL (SUM(A1.kwmeng), 1))*10/11) as INTEGER) HARGA,
											A1.ITEM_NO,
											--A2.ARKTX PRODUK,
											A1.PRODUK,
											A1.nm_kota,
											A1.KOTA,
											A1.PROPINSI_TO,
											A1.incoterm,
											TO_CHAR (A1.TGL_CMPLT, 'YYYYMMDD') TGL
										FROM
											ZREPORT_RPT_REAL_TLCC A1
											--LEFT JOIN ZREPORT_M_MATERIAL A2 on A1.ITEM_NO=A2.MATNR
										WHERE
											TO_CHAR (A1.TGL_CMPLT, 'YYYY') = '$tahun'
										AND (
											(
												A1.order_type <> 'ZNL'
												AND (
													A1.item_no LIKE '121-301%'
													AND A1.item_no NOT IN (
														'121-301-0240',
														'121-301-0350',
														'121-301-0351'
													)
												)
											)
										)
										AND A1.com IN (6000)
										AND A1.no_polisi <> 'S11LO'
				-- 						AND A1.sold_to LIKE '0000000%'
										AND A1.ITEM_NO = '$kode_produk'
										AND A1.PROPINSI_TO = '$kdpropinsi'
										AND A1.kota = '$kdkota'
										AND A1.harga <> 0
										AND A1.harga IS NOT NULL
										AND A1.incoterm = '$incoterm'
										GROUP BY
											A1.ITEM_NO,
											--A2.ARKTX,
											A1.PRODUK,
											A1.nm_kota,
											A1.KOTA,
											A1.PROPINSI_TO,
											A1.incoterm,
											TO_CHAR (A1.TGL_CMPLT, 'YYYYMMDD')
										ORDER BY
											TGL ASC
				)
				GROUP BY 
				ITEM_NO,NM_KOTA,PROPINSI_TO,INCOTERM,SUBSTR(TGL, 0,6)
				ORDER BY TGL ASC";
	}

	function get_median_4000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm)
	{
		$sql="SELECT  MEDIAN(HARGA) HARGA,ITEM_NO,NM_KOTA,PROPINSI_TO,INCOTERM,SUBSTR(TGL, 0,6) TGL from (
				SELECT		
											CAST(((SUM (A1.harga) / NVL (SUM(A1.kwmeng), 1))*10/11) as INTEGER) HARGA,
											A1.ITEM_NO,
											--A2.ARKTX PRODUK,
											A1.PRODUK,
											A1.nm_kota,
											A1.KOTA,
											A1.PROPINSI_TO,
											A1.incoterm,
											TO_CHAR (A1.TGL_CMPLT, 'YYYYMMDD') TGL
										FROM
											ZREPORT_RPT_REAL_TLCC A1
											--LEFT JOIN ZREPORT_M_MATERIAL A2 on A1.ITEM_NO=A2.MATNR
										WHERE
											TO_CHAR (A1.TGL_CMPLT, 'YYYY') = '$tahun'
										AND (
											(
												A1.order_type <> 'ZNL'
												AND (
													A1.item_no LIKE '121-301%'
													AND A1.item_no NOT IN (
														'121-301-0240',
														'121-301-0350',
														'121-301-0351'
													)
												)
											)
										)
										AND A1.com IN (6000)
										AND A1.no_polisi <> 'S11LO'
				-- 						AND A1.sold_to LIKE '0000000%'
										AND A1.ITEM_NO = '$kode_produk'
										AND A1.PROPINSI_TO = '$kdpropinsi'
										AND A1.kota = '$kdkota'
										AND A1.harga <> 0
										AND A1.harga IS NOT NULL
										AND A1.incoterm = '$incoterm'
										GROUP BY
											A1.ITEM_NO,
											--A2.ARKTX,
											A1.PRODUK,
											A1.nm_kota,
											A1.KOTA,
											A1.PROPINSI_TO,
											A1.incoterm,
											TO_CHAR (A1.TGL_CMPLT, 'YYYYMMDD')
										ORDER BY
											TGL ASC
				)
				GROUP BY 
				ITEM_NO,NM_KOTA,PROPINSI_TO,INCOTERM,SUBSTR(TGL, 0,6)
				ORDER BY TGL ASC";
	}

	function get_trend_6000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm)
	{
		// $sql="select cast(sum(harga)/nvl(sum(kwmeng),1) as INTEGER)HARGA,ITEM_NO,PRODUK,nm_kota,PROPINSI_TO,incoterm,to_char(TGL_CMPLT,'YYYYMM') TGL
		// 		from ZREPORT_RPT_REAL_TLCC
		// 		where to_char(TGL_CMPLT,'YYYY') = '$tahun'
		// 		and ( (order_type <>'ZNL' and
		// 		(item_no like '121-301%' and item_no not in ('121-301-0240','121-301-0350','121-301-0351') )) ) 
		// 		and com = '6000' 
		// 		and no_polisi <> 'S11LO'
		// 		and sold_to like '0000000%'
		// 		and harga<>0 and harga is not null
		// 		and PROPINSI_TO='$kdpropinsi'
		// 		and kota = '$kdkota'
		// 		and ITEM_NO = '$kode_produk'
		// 		and incoterm = '$incoterm'
		// 		GROUP BY ITEM_NO,PRODUK,nm_kota,PROPINSI_TO,incoterm,to_char(TGL_CMPLT,'YYYYMM')
		// 		order by to_char(TGL_CMPLT,'YYYYMM') asc";  
					$sql = "SELECT
							cast(
								SUM (A1.harga) / NVL (SUM(A1.kwmeng), 1) AS INTEGER
							) HARGA,
							A1.ITEM_NO,
							--A2.ARKTX PRODUK,
							A1.nm_kota,
							A1.PROPINSI_TO,
							A1.incoterm,
							TO_CHAR (A1.TGL_CMPLT, 'YYYYMM') TGL
						FROM
							ZREPORT_RPT_REAL_TLCC A1
							--LEFT JOIN ZREPORT_M_MATERIAL A2 on A1.ITEM_NO=A2.MATNR
						WHERE
							TO_CHAR (A1.TGL_CMPLT, 'YYYY') = '$tahun'
						AND (
							(
								A1.order_type <> 'ZNL'
								AND (
									A1.item_no LIKE '121-301%'
									AND A1.item_no NOT IN (
										'121-301-0240',
										'121-301-0350',
										'121-301-0351'
									)
								)
							)
						)
						AND A1.com IN (6000)
						AND A1.no_polisi <> 'S11LO'
						-- AND A1.sold_to LIKE '0000000%'
						AND A1.ITEM_NO = '$kode_produk'
						AND A1.PROPINSI_TO = '$kdpropinsi'
						AND A1.kota = '$kdkota'
						AND A1.harga <> 0
						AND A1.harga IS NOT NULL
						AND A1.incoterm = '$incoterm'
						GROUP BY
							A1.ITEM_NO,
							--A2.ARKTX,
							A1.nm_kota,
							A1.PROPINSI_TO,
							A1.incoterm,
							TO_CHAR (A1.TGL_CMPLT, 'YYYYMM')
						ORDER BY
							TGL ASC";
		return $this->db->query($sql)->result_array();			
	}

	function get_trend_3000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm)
	{
		// $sql="select cast(sum(harga)/nvl(sum(kwmeng),1) as INTEGER)HARGA,ITEM_NO,PRODUK,nm_kota,PROPINSI_TO,incoterm,to_char(TGL_CMPLT,'YYYYMM') TGL
		// 		from ZREPORT_RPT_REAL_TLCC
		// 		where to_char(TGL_CMPLT,'YYYY') = '$tahun'
		// 		and ( (order_type <>'ZNL' and
		// 		(item_no like '121-301%' and item_no not in ('121-301-0240','121-301-0350','121-301-0351') )) ) 
		// 		and com = '3000' 
		// 		and no_polisi <> 'S11LO'
		// 		and sold_to like '0000000%'
		// 		and harga<>0 and harga is not null
		// 		and PROPINSI_TO='$kdpropinsi'
		// 		and kota = '$kdkota'
		// 		and ITEM_NO = '$kode_produk'
		// 		and incoterm = '$incoterm'
		// 		GROUP BY ITEM_NO,PRODUK,nm_kota,PROPINSI_TO,incoterm,to_char(TGL_CMPLT,'YYYYMM')
		// 		order by to_char(TGL_CMPLT,'YYYYMM') asc";  
		$sql = "SELECT
							cast(
								SUM (A1.harga) / NVL (SUM(A1.kwmeng), 1) AS INTEGER
							) HARGA,
							A1.ITEM_NO,
							A2.ARKTX PRODUK,
							A1.nm_kota,
							A1.PROPINSI_TO,
							A1.incoterm,
							TO_CHAR (A1.TGL_CMPLT, 'YYYYMM') TGL
						FROM
							ZREPORT_RPT_REAL_SP A1
							LEFT JOIN ZREPORT_M_MATERIAL A2 on A1.ITEM_NO=A2.MATNR
						WHERE
							TO_CHAR (A1.TGL_CMPLT, 'YYYY') = '$tahun'
						AND (
							(
								A1.order_type <> 'ZNL'
								AND (
									A1.item_no LIKE '121-301%'
									AND A1.item_no NOT IN (
										'121-301-0240',
										'121-301-0350',
										'121-301-0351'
									)
								)
							)
						)
						AND A1.com IN (3000)
						AND A1.no_polisi <> 'S11LO'
						AND A1.sold_to LIKE '0000000%'
						AND A1.ITEM_NO = '$kode_produk'
						AND A1.PROPINSI_TO = '$kdpropinsi'
						AND A1.kota = '$kdkota'
						AND A1.harga <> 0
						AND A1.harga IS NOT NULL
						AND A1.incoterm = '$incoterm'
						GROUP BY
							A1.ITEM_NO,
							A2.ARKTX,
							A1.nm_kota,
							A1.PROPINSI_TO,
							A1.incoterm,
							TO_CHAR (A1.TGL_CMPLT, 'YYYYMM')
						ORDER BY
							TGL ASC";
		return $this->db->query($sql)->result_array();			
	}

	function get_data_prop($comp)
	{
		if ($comp=="7000")
		{
			$table="ZREPORT_RPT_REAL";
		}elseif($comp=="4000")
		{
			$table="ZREPORT_RPT_REAL_ST";
		}elseif($comp=="6000")
		{
			$table="ZREPORT_RPT_REAL_TLCC";
		}elseif($comp=="3000")
		{
			$table="ZREPORT_RPT_REAL_SP";
		}
		$tahun = date('Y');
		$tahunlist = $tahun.",".($tahun-1);
		$sql = "select DISTINCT propinsi_to KODE_PROP,initcap(nama_prop_to) NAMA_PROP from $table
				where propinsi_to is not null and nama_prop_to is not null and com in ($comp) and ( (order_type <>'ZNL' and
				(item_no like '121-301%' and item_no not in ('121-301-0240','121-301-0350','121-301-0351') )) ) 
				and TO_CHAR (TGL_CMPLT, 'YYYY') IN ($tahunlist)
				ORDER BY 1 asc";
		return $this->db->query($sql)->result_array();
	}

	function get_data_produk_7000($kdpropinsi,$kdkota)
	{
		$sql="select DISTINCT A1.ITEM_NO KODE_PRODUK,A2.ARKTX NAMA_PRODUK
				from ZREPORT_RPT_REAL A1 left join ZREPORT_M_MATERIAL A2 on A1.ITEM_NO=A2.MATNR 
				where ((A1.order_type <>'ZNL' and
				(A1.item_no like '121-301%' and A1.item_no not in ('121-301-0240','121-301-0350','121-301-0351','121-301-0360') )) ) and (A1.plant <>'2490' or A1.plant <>'7490') 
				and A1.com in (7000,5000) and A1.no_polisi <> 'S11LO'
				and A1.sold_to like '0000000%' and A1.PROPINSI_TO='$kdpropinsi' and A1.kota = '$kdkota' ORDER BY 2 ASC";
		return $this->db->query($sql)->result_array;
	}

	function get_data_produk_4000($kdpropinsi,$kdkota){
		$sql = "select DISTINCT A1.ITEM_NO KODE_PRODUK,A2.ARKTX NAMA_PRODUK
				from ZREPORT_RPT_REAL_ST A1 left join ZREPORT_M_MATERIAL A2 on A1.ITEM_NO=A2.MATNR 
				where ( (A1.order_type <>'ZNL' and
				(A1.item_no like '121-301%' and A1.item_no not in ('121-301-0240','121-301-0350','121-301-0351') )) ) 
				and A1.com = '4000' 
				and A1.no_polisi <> 'S11LO'
				and A1.sold_to like '0000000%'
				and A1.harga<>0 and A1.PROPINSI_TO='$kdpropinsi' and A1.kota = '$kdkota' ORDER BY 2 ASC";
		return $this->db->query($sql)->result_array();
	}

	function get_data_produk_6000($kdpropinsi,$kdkota){
		$sql = "select DISTINCT A1.PRODUK NAMA_PRODUK,A1.ITEM_NO KODE_PRODUK
				from ZREPORT_RPT_REAL_TLCC A1 
				--left join ZREPORT_M_MATERIAL A2 on A1.ITEM_NO=A2.MATNR 
				where ( (A1.order_type <>'ZNL' and
				(A1.item_no like '121-301%' and A1.item_no not in ('121-301-0240','121-301-0350','121-301-0351') )) ) 
				and A1.com = '6000' 
				and A1.no_polisi <> 'S11LO'
				--and A1.sold_to like '0000000%'
				and A1.harga<>0 and A1.PROPINSI_TO='$kdpropinsi' and A1.kota = '$kdkota' ORDER BY 2 ASC";
		return $this->db->query($sql)->result_array();
	}

	function get_data_produk_3000($kdpropinsi,$kdkota){
		$sql = "select DISTINCT A1.ITEM_NO KODE_PRODUK,A2.ARKTX NAMA_PRODUK
				from ZREPORT_RPT_REAL_SP A1 left join ZREPORT_M_MATERIAL A2 on A1.ITEM_NO=A2.MATNR 
				where ( (A1.order_type <>'ZNL' and
				(A1.item_no like '121-301%' and A1.item_no not in ('121-301-0240','121-301-0350','121-301-0351') )) ) 
				and A1.com = '3000' 
				and A1.no_polisi <> 'S11LO'
				and A1.sold_to like '00000%'
				and A1.harga<>0 and A1.PROPINSI_TO='$kdpropinsi' and A1.kota = '$kdkota' ORDER BY 2 ASC";
		return $this->db->query($sql)->result_array();
	}
	function get_data_kota($kodeprop,$comp)
	{
		$comp2="";
		$tambahan="";
		$tahun = date('Y');
		$tahunlist = $tahun.",".($tahun-1);
		$sold_to = "and A1.sold_to like '0000000%'";
		$join = "right JOIN ZREPORT_M_KOTA A2 on A1.KOTA=A2.KD_KOTA";
		if ($comp=="7000")
		{
			$comp2="7000,5000";
			$table="ZREPORT_RPT_REAL";
			$tambahan="and (plant <>'2490' or plant <>'7490')";
		}elseif($comp=="4000")
		{
			$comp2="4000";
			$table="ZREPORT_RPT_REAL_ST";
		}elseif ($comp=="6000") {
			$comp2="6000";
			$table="ZREPORT_RPT_REAL_TLCC";
			$sold_to="";
			$join="";
		}
		elseif ($comp=="3000") {
			$comp2="3000";
			$table="ZREPORT_RPT_REAL_SP";
			$sold_to = "AND A1.sold_to LIKE '00000%'";
		} 
		// $sql = "select DISTINCT kota,nm_kota,PROPINSI_TO
		// 		from $table
		// 		where to_char(TGL_CMPLT,'YYYY') in ($tahunlist)
		// 		and ( (order_type <>'ZNL' and
		// 		(item_no like '121-301%' and item_no not in ('121-301-0240','121-301-0350','121-301-0351') )) ) 
		// 		$tambahan 
		// 		and com in ($comp2) and no_polisi <> 'S11LO'
		// 		and sold_to like '0000000%'
		// 		and PROPINSI_TO='$kodeprop' order by 2";
		$sql = "select DISTINCT A1.kota,
				 A1.nm_kota,
				 A1.PROPINSI_TO
				FROM
					$table A1 
				WHERE
					TO_CHAR (A1.TGL_CMPLT, 'YYYY') IN ($tahunlist)
				AND (
					(
						A1.order_type <> 'ZNL'
						AND (
							A1.item_no LIKE '121-301%'
							AND A1.item_no NOT IN (
								'121-301-0240',
								'121-301-0350',
								'121-301-0351'
							)
						)
					)
				)
				AND A1.com IN ($comp2)
				AND A1.no_polisi <> 'S11LO'
				$tambahan 
				$sold_to
				AND A1.PROPINSI_TO = '$kodeprop'
				ORDER BY 2";
		return $this->db->query($sql)->result_array();
	}

	function getallprovtlcc()
	{
		$sql = "select DISTINCT A2.KD_PROV,A2.NM_PROV
				from ZREPORT_M_PROVINSITLCC A2 where A2.KD_PROV not in 0001";
		return $this->db->query($sql)->result_array();
	}
}
?>