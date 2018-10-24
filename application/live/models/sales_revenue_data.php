<?php
class sales_revenue_data extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->bpc = $this->load->database('bpc', TRUE);
		$this->devsd = $this->load->database('devsd', TRUE);
	}
    
    
    public function get_company_company($thn){
		$query = $this->devsd->query("SELECT (case when VKORG = '2000' then '2000 - Semen Indonesia' when VKORG = '3000' then '3000 - Semen Padang' when VKORG = '4000' then '4000 - Semen Tonasa' when VKORG = '5000' then '5000 - Semen Gresik' when VKORG = '6000' then '6000 - TLCC' when VKORG = '7000' then '7000 - KSO' else VKORG END) as VKORG  FROM MV_REVENUE
		WHERE REVENUE IS NOT NULL
		AND BUDAT = TO_DATE ('$thn', 'YYYY')
		GROUP BY VKORG ORDER BY VKORG");
		return $query->result_array();
	}
    
	public function get_company($company){
		$tgl = date('Y/m/d');
		$data = $this->devsd->query("SELECT MVR.VKBUR_TXT, MVR.VKORG, MVR.VKBUR, (CASE WHEN MVT.REV IS NULL THEN 0 ELSE MVT.REV END) AS REV FROM MV_REVENUE MVR
		LEFT JOIN (
		select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($company) AND BUDAT = TO_DATE('$tgl', 'YYYY/MM/DD') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
		) MVT
		ON MVR.VKBUR = MVT.VKBUR
		WHERE MVR.VKORG IN ($company) AND MVR.VKBUR_TXT IS NOT NULL GROUP BY MVR.VKBUR_TXT, MVT.REV, MVR.VKORG, MVR.VKBUR ORDER BY REV DESC");
		return $data->result_array();
	}
	public function get_company_all(){
		$tgl = date('Y/m/d');
		$data = $this->devsd->query("SELECT MVR.VKBUR_TXT, '3000,4000,5000,7000' AS VKORG, MVR.VKBUR, (CASE WHEN SUM(MVT.REV) IS NULL THEN 0 ELSE SUM(MVT.REV)END) AS REV FROM MV_REVENUE MVR
		LEFT JOIN (
		select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN(2000, 3000, 4000, 5000, 6000, 7000) AND BUDAT = TO_DATE('$tgl', 'YYYY/MM/DD') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
		) MVT
		ON MVR.VKBUR = MVT.VKBUR
		WHERE MVR.VKORG IN (2000, 3000,4000,5000, 6000, 7000) AND MVR.VKBUR_TXT IS NOT NULL AND REV != 0 GROUP BY MVR.VKBUR_TXT, MVR.VKBUR ORDER BY REV DESC");
		return $data->result_array();
	}
	public function get_last_date(){
		$data = $this->devsd->query("select LAST_UPDATE from ZREPORT_REAL_PENJUALAN WHERE LAST_UPDATE = (select max(LAST_UPDATE) from ZREPORT_REAL_PENJUALAN) GROUP BY LAST_UPDATE");
		return $data->result_array();
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function bbc($comp, $prov, $tipe, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$data = $this->devsd->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $data->result_array();
	}
	public function data_prov($comp, $prov, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$data = $this->devsd->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $data->result_array();
	}
	public function get_data_comp($comp, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$data = $this->devsd->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN ($comp) AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN ($comp) AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN ($comp) AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $data->result_array();
	}
	
	public function total($tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$data = $this->devsd->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
                
		return $data->result_array();
	}
	public function get_rkap_bulanan($comp, $prov, $produk, $thn, $bln){
		$data= $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM = '$comp' and PROPINSI = '$prov' and PRODUK = '$produk' and TAHUN = '$thn' and BULAN = '$bln'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM = '$comp' and PROPINSI = '$prov' and PRODUK = '$produk' and TAHUN = '$thn'");
		return $data->result_array();
	}
	public function get_rkap_bulanan_prov($comp, $prov, $thn, $bln){
		$data= $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM IN($comp) and PROPINSI = '$prov' and TAHUN = '$thn' and BULAN = '$bln'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM IN($comp) and PROPINSI = '$prov' and TAHUN = '$thn'");
		return $data->result_array();
	}
	public function get_rkap_bulanan_company($comp,$thn,$bln){
		$data = $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM IN($comp) and TAHUN = '$thn' and BULAN = '$bln'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM IN($comp) and TAHUN = '$thn'");
		return $data->result_array();
	}
	public function get_rkap_bulanan_bbc($tipe, $thn, $bln){
		$data = $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE PRODUK = '$tipe' and TAHUN = '$thn' and BULAN = '$bln'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE PRODUK = '$tipe' and TAHUN = '$thn'");
		return $data->result_array();
	}
	public function get_rkap_bulanan_total($thn,$bln){
		$data = $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE TAHUN = '$thn' and BULAN = '$bln'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE TAHUN = '$thn'");
		return $data->result_array();
	}
	public function get_rkap_harian_comp($comp, $thn, $bln, $tgl){
		$data = $this->devsd->query("SELECT SUM(RKAP_VOLUME) AS RKAP_VOL, SUM(RKAP_REVENUE) AS RKAP_REV FROM(SELECT tb1.co as COM,
		substr(tb2.budat,0,4) as TAHUN,
		substr(tb2.budat,5,2) as BULAN,
		substr(tb2.budat,7,2) as TANGGAL,
		((
		(SELECT sum(porsi) as porsi_harian from zreport_porsi_sales_region WHERE 
		budat = tb2.budat and vkorg = tb1.co and region = 5
		)/(
		SELECT sum(porsi) as total_porsi from zreport_porsi_sales_region WHERE 
		substr(budat,0,6) = substr(tb2.budat,0,6) and vkorg = tb1.co and region = 5
		))*(
		SELECT sum(quantum) from sap_t_rencana_sales_type WHERE co=tb1.co and 
		concat(THN,BLN) = substr(tb2.budat,0,6) AND prov NOT IN ('1092', '0001')
		)) as RKAP_VOLUME
		,
		((
		(SELECT sum(porsi) as porsi_harian from zreport_porsi_sales_region WHERE 
		budat = tb2.budat and vkorg = tb1.co and region = 5
		)/(
		SELECT sum(porsi) as total_porsi from zreport_porsi_sales_region WHERE 
		substr(budat,0,6) = substr(tb2.budat,0,6) and vkorg = tb1.co and region = 5
		))*(
		SELECT sum(revenue) from sap_t_rencana_sales_type WHERE co=tb1.co and concat(THN,BLN) = substr(tb2.budat,0,6) AND prov NOT IN ('1092', '0001')
		)) as RKAP_REVENUE
		FROM
		sap_t_rencana_sales_type tb1
		LEFT JOIN
		(
		select porsi,region,vkorg,budat,tipe from zreport_porsi_sales_region
		) tb2
		ON
		tb2.region = 5
		AND tb2.vkorg = tb1.co
		AND substr(tb2.budat,0,6) = CONCAT(tb1.thn,tb1.bln)
		AND tb2.tipe = tb1.tipe

		where 
		--tb1.co = '7000' AND
		--concat(tb1.THN,tb1.BLN) = '201701' AND 
		prov NOT IN ('1092', '0001')
		GROUP BY
		co,budat
		ORDER BY co,budat asc)
		WHERE TAHUN = '$thn' AND COM IN ($comp) AND BULAN = '$bln' AND TANGGAL = '$tgl'");
		return $data->result_array();
	}
	public function get_rkap_harian_total($thn, $bln, $tgl){
		$data = $this->devsd->query("SELECT SUM(RKAP_VOLUME) AS RKAP_VOL, SUM(RKAP_REVENUE) AS RKAP_REV FROM(SELECT tb1.co as COM,
		substr(tb2.budat,0,4) as TAHUN,
		substr(tb2.budat,5,2) as BULAN,
		substr(tb2.budat,7,2) as TANGGAL,
		((
		(SELECT sum(porsi) as porsi_harian from zreport_porsi_sales_region WHERE 
		budat = tb2.budat and vkorg = tb1.co and region = 5
		)/(
		SELECT sum(porsi) as total_porsi from zreport_porsi_sales_region WHERE 
		substr(budat,0,6) = substr(tb2.budat,0,6) and vkorg = tb1.co and region = 5
		))*(
		SELECT sum(quantum) from sap_t_rencana_sales_type WHERE co=tb1.co and 
		concat(THN,BLN) = substr(tb2.budat,0,6) AND prov NOT IN ('1092', '0001')
		)) as RKAP_VOLUME
		,
		((
		(SELECT sum(porsi) as porsi_harian from zreport_porsi_sales_region WHERE 
		budat = tb2.budat and vkorg = tb1.co and region = 5
		)/(
		SELECT sum(porsi) as total_porsi from zreport_porsi_sales_region WHERE 
		substr(budat,0,6) = substr(tb2.budat,0,6) and vkorg = tb1.co and region = 5
		))*(
		SELECT sum(revenue) from sap_t_rencana_sales_type WHERE co=tb1.co and concat(THN,BLN) = substr(tb2.budat,0,6) AND prov NOT IN ('1092', '0001')
		)) as RKAP_REVENUE
		FROM
		sap_t_rencana_sales_type tb1
		LEFT JOIN
		(
		select porsi,region,vkorg,budat,tipe from zreport_porsi_sales_region
		) tb2
		ON
		tb2.region = 5
		AND tb2.vkorg = tb1.co
		AND substr(tb2.budat,0,6) = CONCAT(tb1.thn,tb1.bln)
		AND tb2.tipe = tb1.tipe

		where 
		--tb1.co = '7000' AND
		--concat(tb1.THN,tb1.BLN) = '201701' AND 
		prov NOT IN ('1092', '0001')
		GROUP BY
		co,budat
		ORDER BY co,budat asc)
		WHERE TAHUN = '$thn' AND BULAN = '$bln' AND TANGGAL = '$tgl'");
		return $data->result_array();
	}
	////////----------TIPE----------////////
	public function get_company_tipe($tipe, $thn){
		$query = $this->devsd->query("SELECT (case when VKORG = '2000' then '2000 - Semen Indonesia' when VKORG = '3000' then '3000 - Semen Padang' when VKORG = '4000' then '4000 - Semen Tonasa' when VKORG = '5000' then '5000 - Semen Gresik' when VKORG = '6000' then '6000 - TLCC' when VKORG = '7000' then '7000 - KSO' else VKORG END) as VKORG  FROM MV_REVENUE
		WHERE NAMA_MATERIAL = '$tipe'
		AND REVENUE IS NOT NULL
		AND BUDAT = TO_DATE('$thn', 'YYYY')
		GROUP BY VKORG ORDER BY VKORG");
		return $query->result_array();
	}
	public function get_prov_tipe($tipe, $comp){
		$tgl = date('Y/m/d');
		$query = $this->devsd->query("select VKBUR_TXT, VKBUR
									from MV_REVENUE
									WHERE VKORG = '$comp'
									AND VKBUR IS NOT NULL
									GROUP BY VKBUR_TXT, VKBUR, VKORG
									ORDER BY VKBUR_TXT");
		return $query->result_array();
	}
	//-------------GET_DATA_TYPE----------//
	public function get_data_type_prov($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $comp, $prov, $tipe){
		$query = $this->devsd->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $query->result_array();
	}
	public function get_data_type_rkap_bln_prov($comp, $prov, $produk, $thn, $bln){
		$query = $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM = '$comp' and PROPINSI = '$prov' and PRODUK = '$produk' and TAHUN = '$thn' and BULAN = '$bln'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM = '$comp' and PROPINSI = '$prov' and PRODUK = '$produk' and TAHUN = '$thn'");
		return $query->result_array();
	}
	public function get_data_type_comp($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $comp, $tipe){
		$query = $this->devsd->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND NAMA_MATERIAL = '$tipe' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD' )");
		return $query->result_array();
	}
	public function get_data_type_rkap_bln_comp($comp, $produk, $thn, $bln){
		$query = $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM = '$comp' and PRODUK = '$produk' and TAHUN = '$thn' and BULAN = '$bln'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM = '$comp' and PRODUK = '$produk' and TAHUN = '$thn'");
		return $query->result_array();
	}
	//////----------PROV----------////////
	public function get_prov_prov(){
		$tgl = date('Y/m/d');
		$query= $this->devsd->query("	select VKBUR_TXT, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS 	TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV
			from MV_REVENUE
			GROUP BY VKBUR_TXT, VKBUR
			ORDER BY VKBUR_TXT");
		return $query->result_array();
	}
	public function get_comp_prov($prov){
		$tgl = date('Y');
		$query = $this->devsd->query("SELECT (case when VKORG = '2000' then '2000 - Semen Indonesia' when VKORG = '3000' then '3000 - Semen Padang' when VKORG = '4000' then '4000 - Semen Tonasa' when VKORG = '5000' then '5000 - Semen Gresik' when VKORG = '6000' then '6000 - TLCC' when VKORG = '7000' then '7000 - KSO' else VKORG END) as VKORG  FROM MV_REVENUE
		WHERE VKBUR = '$prov'
		AND REVENUE IS NOT NULL
		AND BUDAT >= TO_DATE('$tgl/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$tgl/12/31', 'YYYY/MM/DD')
		GROUP BY VKORG ORDER BY VKORG");
		return $query->result_array();
	}
	public function get_data_prov_bbc($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $comp, $prov, $tipe){
		$query = $this->devsd->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $query->result_array();
	}
	public function get_data_prov_rkap_bln_bbc($comp, $prov, $tipe, $thn, $bln){
		$query = $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM = '$comp' and PROPINSI = '$prov' and PRODUK = '$tipe' and TAHUN = '$thn' and BULAN = '$bln'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM = '$comp' and PROPINSI = '$prov' and PRODUK = '$tipe' and TAHUN = '$thn'");
		return $query->result_array();
	}
	public function get_data_prov_comp($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $comp, $prov){
		$query = $this->devsd->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $query->result_array();
	}
	public function get_data_prov_rkap_bln_comp($comp, $prov, $thn, $bln){
		$query = $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM = '$comp' and PROPINSI = '$prov' and TAHUN = '$thn' and BULAN = '$bln'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM = '$comp' and PROPINSI = '$prov' and TAHUN = '$thn'");
		return $query->result_array();
	}
	public function get_data_prov_prov($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $prov){
		$query = $this->devsd->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKBUR = '$prov' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKBUR = '$prov' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKBUR = '$prov' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $query->result_array();
	}
	public function get_data_prov_rkap_bln_prov($prov, $thn, $bln){
		$query = $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE PROPINSI = '$prov' and TAHUN = '$thn' and BULAN = '$bln'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE PROPINSI = '$prov' and TAHUN = '$thn'");
		return $query->result_array();
	}
    
    public function get_data(){
        $sql = "SELECT MVR.VKBUR_TXT, MVR.VKORG, MVR.VKBUR, (CASE WHEN MVT.REV IS NULL THEN 0 ELSE MVT.REV END) AS REV,
            MVT.NAMA_MATERIAL, MVT.PRICE
            FROM MV_REVENUE MVR
            		LEFT JOIN (
            		select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, 
                SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV, NAMA_MATERIAL from MV_REVENUE WHERE VKORG IN('2000','5000') 
                AND BUDAT = TO_DATE('2017/11/10', 'YYYY/MM/DD') GROUP BY VKBUR_TXT, VKORG, VKBUR, NAMA_MATERIAL ORDER BY REV DESC
            		) MVT
            		ON MVR.VKBUR = MVT.VKBUR
            		WHERE MVR.VKORG IN ('5000') AND MVR.VKBUR_TXT IS NOT NULL GROUP BY MVR.VKBUR_TXT, MVT.REV, MVR.VKORG, 
                MVR.VKBUR, MVT.NAMA_MATERIAL, MVT.PRICE ORDER BY REV DESC";
        $query = $this->devsd->query($sql);
        return $query->result_array();
    }
    
    public  function get_wilayah(){
        $sql = "select distinct(mp.id_region) as region
                from zreport_m_provinsi mp, zreport_m_region mr where mp.id_region = mr.id_region";
        $query = $this->devsd->query($sql);
        return $query->result_array();
    }
    
    
    public function get_data_bbc_total_wilayah($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $tipe, $org){
		$data = $this->devsd->query("SELECT SUM(V.TOTAL_QTY) AS VOL, SUM(V.PENJUALAN)/SUM(V.TOTAL_QTY) AS PRICE, SUM(V.PENJUALAN) AS TOTALSALES, 
        SUM(V.OA) AS OA, SUM(V.REVENUE) AS REV, MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'TO DAY' AS JENIS, '1' AS FLAG
        FROM MV_REVENUE V, ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        WHERE V.NAMA_MATERIAL = '$tipe'  AND  MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = V.VKBUR AND V.VKORG in ($org)
        AND V.BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD') GROUP BY  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION
        
		UNION ALL
        
		SELECT SUM(V.TOTAL_QTY) AS VOL, SUM(V.PENJUALAN)/SUM(V.TOTAL_QTY) AS PRICE, SUM(V.PENJUALAN) AS TOTALSALES, SUM(V.OA) AS OA, 
        SUM(V.REVENUE) AS REV,  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'MONTH TO DAY' AS JENIS, '2' AS FLAG 
        FROM MV_REVENUE V, ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        WHERE V.NAMA_MATERIAL = '$tipe' AND  MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = V.VKBUR AND V.VKORG in ($org)
        AND V.BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND V.BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD') GROUP BY  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION  
		
        UNION ALL
        
		SELECT SUM(V.TOTAL_QTY) AS VOL, SUM(V.PENJUALAN)/SUM(V.TOTAL_QTY) AS PRICE, SUM(V.PENJUALAN) AS TOTALSALES, 
        SUM(V.OA) AS OA, SUM(V.REVENUE) AS REV,  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'YEAR TO DAY' AS JENIS, '3' AS FLAG
        FROM MV_REVENUE V, ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        WHERE V.NAMA_MATERIAL = '$tipe' AND  MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = V.VKBUR AND V.VKORG in ($org)
        AND V.BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND V.BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD') GROUP BY  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION
         ") ;
		return $data->result_array();
	}
    
    public function get_rkap_bulanan_bbc_wilayah($tipe, $thn, $bln, $org){
		$data = $this->devsd->query("SELECT (CASE WHEN SUM(R.TARGET_RKAP) IS NULL THEN 0 ELSE SUM(R.TARGET_RKAP)END) AS RKAP_TON, 
        (CASE WHEN SUM(R.REVENU_RKAP) IS NULL THEN 0 ELSE SUM(R.REVENU_RKAP) END) AS RKAP_REV,
        MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'MONTH TO DAY' AS JENIS, '2' AS FLAG
        FROM(SELECT COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' THEN 'ZAK' WHEN '121-302' THEN 'CURAH' 
        		WHEN '121-200' THEN 'CLINKER' END) AS PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP
            FROM ZREPORT_RPTREAL_RESUM  
        		ORDER BY TAHUN,BULAN,COM DESC) R,
            ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        		WHERE PRODUK = '$tipe' AND TAHUN = '$thn' AND BULAN = '$bln' AND COM in ($org)
            AND  MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = R.PROPINSI
            GROUP BY MP.ID_REGION, MR.NM_REGION, MR.ID_REGION
             
            
        		UNION ALL
        		SELECT (CASE WHEN SUM(R.TARGET_RKAP) IS NULL THEN 0 ELSE SUM(R.TARGET_RKAP)END) AS RKAP_TON, 
            (CASE WHEN SUM(R.REVENU_RKAP) IS NULL THEN 0 ELSE SUM(R.REVENU_RKAP) END) AS RKAP_REV,
            MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'YEAR TO DAY' AS JENIS, '3' AS FLAG
            FROM(SELECT COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' THEN 'ZAK' WHEN '121-302' THEN 'CURAH' 
        		WHEN '121-200' THEN 'CLINKER' END) AS PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
        		ORDER BY TAHUN,BULAN,COM DESC) R,
            ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        		WHERE PRODUK = '$tipe' AND TAHUN = '$thn'  AND COM in ($org)
            AND  MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = R.PROPINSI
            GROUP BY MP.ID_REGION, MR.NM_REGION, MR.ID_REGION
             ") ;
		return $data->result_array();
	}
    
    public function get_data_bbc_opco_total($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $tipe, $org){
		$data = $this->devsd->query("SELECT SUM(V.TOTAL_QTY) AS VOL, SUM(V.PENJUALAN)/SUM(V.TOTAL_QTY) AS PRICE, SUM(V.PENJUALAN) AS TOTALSALES, 
        SUM(V.OA) AS OA, SUM(V.REVENUE) AS REV, MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'TO DAY' AS JENIS, '1' AS FLAG
        FROM MV_REVENUE V, ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        WHERE V.NAMA_MATERIAL = 'ZAK'  AND  MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = V.VKBUR AND V.VKORG='$org'
        AND V.BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD') GROUP BY  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION
        
		UNION ALL
        
		SELECT SUM(V.TOTAL_QTY) AS VOL, SUM(V.PENJUALAN)/SUM(V.TOTAL_QTY) AS PRICE, SUM(V.PENJUALAN) AS TOTALSALES, SUM(V.OA) AS OA, 
        SUM(V.REVENUE) AS REV,  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'MONTH TO DAY' AS JENIS, '2' AS FLAG 
        FROM MV_REVENUE V, ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        WHERE V.NAMA_MATERIAL = 'ZAK' AND  MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = V.VKBUR AND V.VKORG='$org'
        AND V.BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND V.BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD') GROUP BY  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION  
		
        UNION ALL
        
		SELECT SUM(V.TOTAL_QTY) AS VOL, SUM(V.PENJUALAN)/SUM(V.TOTAL_QTY) AS PRICE, SUM(V.PENJUALAN) AS TOTALSALES, 
        SUM(V.OA) AS OA, SUM(V.REVENUE) AS REV,  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'YEAR TO DAY' AS JENIS, '3' AS FLAG
        FROM MV_REVENUE V, ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        WHERE V.NAMA_MATERIAL = 'ZAK' AND  MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = V.VKBUR AND V.VKORG='$org'
        AND V.BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND V.BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')
        GROUP BY  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION)");
		return $data->result_array();
	}
    
    public function get_rkap_opco_bulanan_bbc($tipe, $thn, $bln, $org){
		$data = $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE PRODUK = '$tipe' and TAHUN = '$thn' and BULAN = '$bln' AND COM in ($org)
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE PRODUK = '$tipe' and TAHUN = '$thn' AND COM in ($org)");
		return $data->result_array();
	}
    
    public function get_data_wilayah(){
		$data = $this->devsd->query("SELECT DISTINCT (MP.ID_REGION) FROM ZREPORT_M_PROVINSI MP,
         ZREPORT_M_REGION MR WHERE MP.ID_REGION = MR.ID_REGION ORDER BY ID_REGION ASC");
		return $data->result_array();
	}
    
    public function get_data_opco_bbc_total($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $tipe, $org){
		$data = $this->devsd->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE NAMA_MATERIAL = '$tipe' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD') AND VKORG in ($org)
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD') AND VKORG in ($org)
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD') AND VKORG in ($org)");
		return $data->result_array();
	}
    
    public function get_data_bbc_total_wilayah_noType($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $org){
		$data = $this->devsd->query("SELECT SUM(V.TOTAL_QTY) AS VOL, SUM(V.PENJUALAN)/SUM(V.TOTAL_QTY) AS PRICE, SUM(V.PENJUALAN) AS TOTALSALES, 
        SUM(V.OA) AS OA, SUM(V.REVENUE) AS REV, MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'TO DAY' AS JENIS, '1' AS FLAG
        FROM MV_REVENUE V, ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        WHERE  MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = V.VKBUR AND V.VKORG='$org'
        AND V.BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD') GROUP BY  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION
        
		UNION ALL
        
		SELECT SUM(V.TOTAL_QTY) AS VOL, SUM(V.PENJUALAN)/SUM(V.TOTAL_QTY) AS PRICE, SUM(V.PENJUALAN) AS TOTALSALES, SUM(V.OA) AS OA, 
        SUM(V.REVENUE) AS REV,  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'MONTH TO DAY' AS JENIS, '2' AS FLAG 
        FROM MV_REVENUE V, ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        WHERE MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = V.VKBUR AND V.VKORG='$org'
        AND V.BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND V.BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD') GROUP BY  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION  
		
        UNION ALL
        
		SELECT SUM(V.TOTAL_QTY) AS VOL, SUM(V.PENJUALAN)/SUM(V.TOTAL_QTY) AS PRICE, SUM(V.PENJUALAN) AS TOTALSALES, 
        SUM(V.OA) AS OA, SUM(V.REVENUE) AS REV,  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'YEAR TO DAY' AS JENIS, '3' AS FLAG
        FROM MV_REVENUE V, ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        WHERE MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = V.VKBUR AND V.VKORG='$org'
        AND V.BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND V.BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD') GROUP BY  MP.ID_REGION, MR.NM_REGION, MR.ID_REGION
         ") ;
		return $data->result_array();
	}
    
    public function get_rkap_bulanan_bbc_wilayah_noType($thn, $bln, $org){
		$data = $this->devsd->query("SELECT (CASE WHEN SUM(R.TARGET_RKAP) IS NULL THEN 0 ELSE SUM(R.TARGET_RKAP)END) AS RKAP_TON, 
        (CASE WHEN SUM(R.REVENU_RKAP) IS NULL THEN 0 ELSE SUM(R.REVENU_RKAP) END) AS RKAP_REV,
        MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'MONTH TO DAY' AS JENIS, '2' AS FLAG
        FROM(SELECT COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' THEN 'ZAK' WHEN '121-302' THEN 'CURAH' 
        		WHEN '121-200' THEN 'CLINKER' END) AS PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP
            FROM ZREPORT_RPTREAL_RESUM  
        		ORDER BY TAHUN,BULAN,COM DESC) R,
            ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        		WHERE TAHUN = '$thn' AND BULAN = '$bln' AND COM='$org'
            AND  MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = R.PROPINSI
            GROUP BY MP.ID_REGION, MR.NM_REGION, MR.ID_REGION
             
            
        		UNION ALL
        		SELECT (CASE WHEN SUM(R.TARGET_RKAP) IS NULL THEN 0 ELSE SUM(R.TARGET_RKAP)END) AS RKAP_TON, 
            (CASE WHEN SUM(R.REVENU_RKAP) IS NULL THEN 0 ELSE SUM(R.REVENU_RKAP) END) AS RKAP_REV,
            MP.ID_REGION, MR.NM_REGION, MR.ID_REGION, 'YEAR TO DAY' AS JENIS, '3' AS FLAG
            FROM(SELECT COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' THEN 'ZAK' WHEN '121-302' THEN 'CURAH' 
        		WHEN '121-200' THEN 'CLINKER' END) AS PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
        		ORDER BY TAHUN,BULAN,COM DESC) R,
            ZREPORT_M_PROVINSI MP, ZREPORT_M_REGION MR
        		WHERE TAHUN = '$thn'  AND COM='$org'
            AND  MP.ID_REGION = MR.ID_REGION AND MP.KD_PROV = R.PROPINSI
            GROUP BY MP.ID_REGION, MR.NM_REGION, MR.ID_REGION
             ") ;
		return $data->result_array();
	}
    
    function get_detail_rkap_bulanan_smig_where_bulan($thn,$bulan)
	{		
		$sql = "SELECT
				BULAN,
				SUM(RKAP_VOLUME) as RKAP_VOLUME,
				SUM(RKAP_REVENUE) AS RKAP_REVENUE
				FROM
					(
						SELECT
							tb1.co AS COM,
							SUBSTR (tb2.budat, 0, 4) AS TAHUN,
							SUBSTR (tb2.budat, 5, 2) AS BULAN,
							SUBSTR (tb2.budat, 7, 2) AS TANGGAL,
							(
								(
									(
										SELECT
											SUM (porsi) AS porsi_harian
										FROM
											zreport_porsi_sales_region
										WHERE
											budat = tb2.budat
										AND vkorg = tb1.co
										AND region = 5
									) / (
										SELECT
											SUM (porsi) AS total_porsi
										FROM
											zreport_porsi_sales_region
										WHERE
											SUBSTR (budat, 0, 6) = SUBSTR (tb2.budat, 0, 6)
										AND vkorg = tb1.co
										AND region = 5
									)
								) * (
									SELECT
										SUM (quantum)
									FROM
										sap_t_rencana_sales_type
									WHERE
										co = tb1.co
									AND CONCAT (THN, BLN) = SUBSTR (tb2.budat, 0, 6)
									AND prov NOT IN ('1092', '0001')
								)
							) AS RKAP_VOLUME,
							(
								(
									(
										SELECT
											SUM (porsi) AS porsi_harian
										FROM
											zreport_porsi_sales_region
										WHERE
											budat = tb2.budat
										AND vkorg = tb1.co
										AND region = 5
									) / (
										SELECT
											SUM (porsi) AS total_porsi
										FROM
											zreport_porsi_sales_region
										WHERE
											SUBSTR (budat, 0, 6) = SUBSTR (tb2.budat, 0, 6)
										AND vkorg = tb1.co
										AND region = 5
									)
								) * (
									SELECT
										SUM (revenue)
									FROM
										sap_t_rencana_sales_type
									WHERE
										co = tb1.co
									AND CONCAT (THN, BLN) = SUBSTR (tb2.budat, 0, 6)
									AND prov NOT IN ('1092', '0001')
								)
							) AS RKAP_REVENUE
						FROM
							sap_t_rencana_sales_type tb1
						LEFT JOIN (
							SELECT
								porsi,
								region,
								vkorg,
								budat,
								tipe
							FROM
								zreport_porsi_sales_region
						) tb2 ON tb2.region = 5
						AND tb2.vkorg = tb1.co
						AND SUBSTR (tb2.budat, 0, 6) = CONCAT (tb1.thn, tb1.bln)
						AND tb2.tipe = tb1.tipe
						WHERE
							--tb1.co = '7000' AND
							--concat(tb1.THN,tb1.BLN) = '201701' AND 
							prov NOT IN ('1092', '0001')
							and SUBSTR (tb2.budat, 0, 6) = '".$thn.$bulan."'
						GROUP BY
							co,
							budat
						ORDER BY
							co,
							budat ASC
					)
				GROUP BY 
				BULAN
				ORDER BY BULAN"; 
				$data = $this->devsd->query($sql);
				return $data->result_array();
	}
    
    public function get_Sum_actual_rkap_bulanan_smig_where_bulan($thn,$bulan){
		$sql = "SELECT
					TO_CHAR(BUDAT, 'MM') as BULAN,
					SUM (TOTAL_QTY) AS VOL,
					SUM (PENJUALAN) / SUM (TOTAL_QTY) AS PRICE,
					SUM (PENJUALAN) AS TOTALSALES,
					SUM (OA) AS OA,
					SUM (REVENUE) AS REV
				FROM
					MV_REVENUE
				WHERE
					BUDAT >= TO_DATE ('".$thn."/01/01', 'YYYY/MM/DD')
				AND BUDAT <= TO_DATE (
					'".$thn."/12/31',
					'YYYY/MM/DD'                   
				)
                AND TO_CHAR(BUDAT, 'MM') = '".$bulan."'  
				GROUP BY 
					TO_CHAR(BUDAT, 'MM')
				ORDER BY TO_CHAR(BUDAT, 'MM') asc";
		$data = $this->devsd->query($sql);
		return $data->result_array();
	}
    
    public function get_detail_actual_rkap_tahuan_smig_where_tahun($thn){
		$sql = "SELECT
					TO_CHAR(BUDAT, 'MM') as BULAN,
					SUM (TOTAL_QTY) AS VOL,
					SUM (PENJUALAN) / SUM (TOTAL_QTY) AS PRICE,
					SUM (PENJUALAN) AS TOTALSALES,
					SUM (OA) AS OA,
					SUM (REVENUE) AS REV
				FROM
					MV_REVENUE
				WHERE
					BUDAT >= TO_DATE ('".$thn."/01/01', 'YYYY/MM/DD')
				AND BUDAT <= TO_DATE (
					'".$thn."/12/31',
					'YYYY/MM/DD'                   
				)
                GROUP BY 
					TO_CHAR(BUDAT, 'MM')
				ORDER BY TO_CHAR(BUDAT, 'MM') asc";
		$data = $this->devsd->query($sql);
		return $data->result_array();
	}
    
    public function get_detail_actual_rkap_tahuan_opco_where_tahun($thn,$org){
		$sql = "SELECT
					TO_CHAR(BUDAT, 'MM') as BULAN,
					SUM (TOTAL_QTY) AS VOL,
					SUM (PENJUALAN) / SUM (TOTAL_QTY) AS PRICE,
					SUM (PENJUALAN) AS TOTALSALES,
					SUM (OA) AS OA,
					SUM (REVENUE) AS REV
				FROM
					MV_REVENUE
				WHERE
					BUDAT >= TO_DATE ('".$thn."/01/01', 'YYYY/MM/DD')
				AND BUDAT <= TO_DATE (
					'".$thn."/12/31',
					'YYYY/MM/DD'                   
				)
                AND VKORG = '".$org."' 
                GROUP BY 
					TO_CHAR(BUDAT, 'MM')
				ORDER BY TO_CHAR(BUDAT, 'MM') asc";
		$data = $this->devsd->query($sql);
		return $data->result_array();
	}
    
    public function get_actual_rkap_bulanan_smig_where_bulan($thn,$bulan){
		$sql = "SELECT
					BUDAT as TANGGAL,
					SUM (TOTAL_QTY) AS VOL,
					SUM (PENJUALAN) / SUM (TOTAL_QTY) AS PRICE,
					SUM (PENJUALAN) AS TOTALSALES,
					SUM (OA) AS OA,
					SUM (REVENUE) AS REV
				FROM
					MV_REVENUE
				WHERE
					BUDAT >= TO_DATE ('".$thn."/01/01', 'YYYY/MM/DD')
				AND BUDAT <= TO_DATE (
					'".$thn."/12/31',
					'YYYY/MM/DD'                   
				)
                AND TO_CHAR(BUDAT, 'MM') = '".$bulan."'  
				GROUP BY BUDAT
                ORDER BY BUDAT ASC";
		$data = $this->devsd->query($sql);
		return $data->result_array();
	}
    
    public function get_total_actual_rkap_tahunan_smig_where_tahun($thn){
		$sql = "SELECT
					SUM (TOTAL_QTY) AS VOL,
					SUM (PENJUALAN) / SUM (TOTAL_QTY) AS PRICE,
					SUM (PENJUALAN) AS TOTALSALES,
					SUM (OA) AS OA,
					SUM (REVENUE) AS REV
				FROM
					MV_REVENUE
				WHERE
					BUDAT >= TO_DATE ('".$thn."/01/01', 'YYYY/MM/DD')
				AND BUDAT <= TO_DATE (
					'".$thn."/12/31',
					'YYYY/MM/DD'                   
				)
                ";
		$data = $this->devsd->query($sql);
		return $data->result_array();
	}
    
    public function get_total_actual_rkap_tahunan_opco_where_tahun($thn,$org){
		$sql = "SELECT
					SUM (TOTAL_QTY) AS VOL,
					SUM (PENJUALAN) / SUM (TOTAL_QTY) AS PRICE,
					SUM (PENJUALAN) AS TOTALSALES,
					SUM (OA) AS OA,
					SUM (REVENUE) AS REV
				FROM
					MV_REVENUE
				WHERE
					BUDAT >= TO_DATE ('".$thn."/01/01', 'YYYY/MM/DD')
				AND BUDAT <= TO_DATE (
					'".$thn."/12/31',
					'YYYY/MM/DD'                   
				)
                AND VKORG = '".$org."' 
                ";
		$data = $this->devsd->query($sql);
		return $data->result_array();
	}
    
    public function get_all_produk_rkap_bulanan($thn, $bln){
		$data = $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_volume, (case when sum(REVENU_RKAP) is null then 0 else 
        sum(REVENU_RKAP) END) as rkap_revenue, BULAN from(select COM,PROPINSI, 
        TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE  TAHUN = '$thn' and BULAN = '$bln'
        GROUP BY BULAN");
		return $data->result_array();
	}
    
    
    public function get_all_produk_rkap_per_bulanan($thn){
		$data = $this->devsd->query("SELECT (
              CASE
                WHEN SUM(TARGET_RKAP) IS NULL
                THEN 0
                ELSE SUM(TARGET_RKAP)
              END) AS rkap_volume,
              (
              CASE
                WHEN SUM(REVENU_RKAP) IS NULL
                THEN 0
                ELSE SUM(REVENU_RKAP)
              END) AS rkap_revenue,
              BULAN
            FROM
              (SELECT COM,
                PROPINSI,
                TAHUN,
                BULAN,
                TARGET_RKAP,
                REVENU_RKAP
              FROM ZREPORT_RPTREAL_RESUM
              ORDER BY TAHUN,
                BULAN,
                COM DESC
              )
            WHERE TAHUN = '".$thn."'
            GROUP BY BULAN
            ORDER BY BULAN ASC");
		return $data->result_array();
	}
    
    public function get_all_produk_rkap_per_bulanan_by_opco($thn,$org){
		$data = $this->devsd->query("SELECT (
              CASE
                WHEN SUM(TARGET_RKAP) IS NULL
                THEN 0
                ELSE SUM(TARGET_RKAP)
              END) AS rkap_volume,
              (
              CASE
                WHEN SUM(REVENU_RKAP) IS NULL
                THEN 0
                ELSE SUM(REVENU_RKAP)
              END) AS rkap_revenue,
              BULAN
            FROM
              (SELECT COM,
                PROPINSI,
                TAHUN,
                BULAN,
                TARGET_RKAP,
                REVENU_RKAP
              FROM ZREPORT_RPTREAL_RESUM
              ORDER BY TAHUN,
                BULAN,
                COM DESC
              )
            WHERE TAHUN = '".$thn."'
            AND COM ='".$org."'
            GROUP BY BULAN
            ORDER BY BULAN ASC");
		return $data->result_array();
	}
    
    
    public function get_all_produk_rkap_bulanan_by_opco($thn, $bln, $org){
		$data = $this->devsd->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_volume, (case when sum(REVENU_RKAP) is null then 0 else 
        sum(REVENU_RKAP) END) as rkap_revenue, BULAN from(select COM,PROPINSI, 
        TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE  TAHUN = '$thn' and BULAN = '$bln' and COM='$org'
        GROUP BY BULAN");
		return $data->result_array();
	}
    
    public function get_Sum_actual_rkap_bulanan_by_opco_where_bulan($thn,$bulan,$org){
		$sql = "SELECT
					TO_CHAR(BUDAT, 'MM') as BULAN,
					SUM (TOTAL_QTY) AS VOL,
					SUM (PENJUALAN) / SUM (TOTAL_QTY) AS PRICE,
					SUM (PENJUALAN) AS TOTALSALES,
					SUM (OA) AS OA,
					SUM (REVENUE) AS REV
				FROM
					MV_REVENUE
				WHERE
					BUDAT >= TO_DATE ('".$thn."/01/01', 'YYYY/MM/DD')
				AND BUDAT <= TO_DATE (
					'".$thn."/12/31',
					'YYYY/MM/DD'                   
				)
                AND TO_CHAR(BUDAT, 'MM') = '".$bulan."'
                AND VKORG = '".$org."'  
				GROUP BY 
					TO_CHAR(BUDAT, 'MM')
				ORDER BY TO_CHAR(BUDAT, 'MM') asc";
		$data = $this->devsd->query($sql);
		return $data->result_array();
	}
    
    public function get_actual_rkap_bulanan_by_opco_where_bulan($thn,$bulan,$org){
		$sql = "SELECT
					BUDAT as TANGGAL,
					SUM (TOTAL_QTY) AS VOL,
					SUM (PENJUALAN) / SUM (TOTAL_QTY) AS PRICE,
					SUM (PENJUALAN) AS TOTALSALES,
					SUM (OA) AS OA,
					SUM (REVENUE) AS REV
				FROM
					MV_REVENUE
				WHERE
					BUDAT >= TO_DATE ('".$thn."/01/01', 'YYYY/MM/DD')
				AND BUDAT <= TO_DATE (
					'".$thn."/12/31',
					'YYYY/MM/DD'                   
				)
                AND TO_CHAR(BUDAT, 'MM') = '".$bulan."'
                AND VKORG = '".$org."'   
				GROUP BY BUDAT
                ORDER BY BUDAT ASC";
		$data = $this->devsd->query($sql);
		return $data->result_array();
	}

}
?>