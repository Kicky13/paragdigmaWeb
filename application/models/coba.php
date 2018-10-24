<?php

class coba extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('devsd', TRUE);
	}
    
    
    public function get_company_company($thn){
		$query = $this->db->query("SELECT (case when VKORG = '2000' then '2000 - Semen Indonesia' when VKORG = '3000' then '3000 - Semen Padang' when VKORG = '4000' then '4000 - Semen Tonasa' when VKORG = '5000' then '5000 - Semen Gresik' when VKORG = '6000' then '6000 - TLCC' when VKORG = '7000' then '7000 - KSO' else VKORG END) as VKORG  FROM MV_REVENUE
		WHERE REVENUE IS NOT NULL
		AND BUDAT = TO_DATE ('$thn', 'YYYY')
		GROUP BY VKORG ORDER BY VKORG");
		return $query->result_array();
	}
    
	public function get_company($company){
		$tgl = date('Y/m/d');
		$data = $this->db->query("SELECT MVR.VKBUR_TXT, MVR.VKORG, MVR.VKBUR, (CASE WHEN MVT.REV IS NULL THEN 0 ELSE MVT.REV END) AS REV FROM MV_REVENUE MVR
		LEFT JOIN (
		select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($company) AND BUDAT = TO_DATE('$tgl', 'YYYY/MM/DD') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
		) MVT
		ON MVR.VKBUR = MVT.VKBUR
		WHERE MVR.VKORG IN ($company) AND MVR.VKBUR_TXT IS NOT NULL GROUP BY MVR.VKBUR_TXT, MVT.REV, MVR.VKORG, MVR.VKBUR ORDER BY REV DESC");
		return $data->result_array();
	}
	public function get_company_all(){
		$tgl = date('Y/m/d');
		$data = $this->db->query("SELECT MVR.VKBUR_TXT, '3000,4000,5000,7000' AS VKORG, MVR.VKBUR, (CASE WHEN SUM(MVT.REV) IS NULL THEN 0 ELSE SUM(MVT.REV)END) AS REV FROM MV_REVENUE MVR
		LEFT JOIN (
		select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN(2000, 3000, 4000, 5000, 6000, 7000) AND BUDAT = TO_DATE('$tgl', 'YYYY/MM/DD') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
		) MVT
		ON MVR.VKBUR = MVT.VKBUR
		WHERE MVR.VKORG IN (2000, 3000,4000,5000, 6000, 7000) AND MVR.VKBUR_TXT IS NOT NULL AND REV != 0 GROUP BY MVR.VKBUR_TXT, MVR.VKBUR ORDER BY REV DESC");
		return $data->result_array();
	}

	public function get_prov_by_opco($opco,$bln,$thn){
		// $tgl = date('Y/m');
        
        $date_now = date('Y/m/d');
		/*$sql = "SELECT MVR.VKBUR_TXT, '".$opco."' AS VKORG, MVR.VKBUR, (CASE WHEN SUM(MVT.REV) IS NULL THEN 0 ELSE SUM(MVT.REV)END) AS REV FROM MV_REVENUE MVR
		LEFT JOIN (
		select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN(".$opco.") AND BUDAT = TO_DATE('".$thn."/".$bln."', 'YYYY/MM') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
		) MVT
		ON MVR.VKBUR = MVT.VKBUR
		WHERE MVR.VKORG IN (".$opco.") AND MVR.VKBUR_TXT IS NOT NULL AND REV != 0 GROUP BY MVR.VKBUR_TXT, MVR.VKBUR ORDER BY REV DESC";*/
        
        //#####perbaikan query yang awalnya ambil where bulan diganti between to_date 'faisol'
        /*$sql = "SELECT MVR.VKBUR_TXT, '".$opco."' AS VKORG, MVR.VKBUR, (CASE WHEN SUM(MVT.REV) IS NULL THEN 0 ELSE SUM(MVT.REV)END) AS REV FROM MV_REVENUE MVR
		LEFT JOIN (
		select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN(".$opco.") AND BUDAT  between TO_DATE('".$thn."/".$bln."/01', 'YYYY/MM/DD') and TO_DATE('".$date_now."', 'YYYY/MM/dd') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
		) MVT
		ON MVR.VKBUR = MVT.VKBUR
		WHERE MVR.VKORG IN (".$opco.") AND MVR.VKBUR_TXT IS NOT NULL AND REV != 0 GROUP BY MVR.VKBUR_TXT, MVR.VKBUR ORDER BY REV DESC";
		*/
        
        //perbaikan ambil data group by rtp_real_resum
        /*$sql = "
        SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton,
        (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev,propinsi, DATA2.VKBUR AS KD_KOTA, 
        DATA2.REV, DATA2.VKBUR_TXT AS KOTA,
        DATA3.KD_KOTA AS VKBUR, DATA3.KOTA AS VKBUR_TXT, '".$opco."' AS VKORG
        from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
        		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
        		order BY TAHUN,BULAN,COM DESC) DATA
        LEFT JOIN 
        (
        SELECT MVR.VKBUR_TXT, '".$opco."' AS VKORG, MVR.VKBUR, (CASE WHEN SUM(MVT.REV) IS NULL THEN 0 ELSE SUM(MVT.REV)END) 
        AS REV FROM MV_REVENUE MVR
        		LEFT JOIN (
            
            
        		select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) 
            AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($opco) 
           --AND BUDAT = TO_DATE('2017/11', 'YYYY/MM') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
            AND BUDAT between TO_DATE('$opco/$bln/01', 'YYYY/MM/dd') and TO_DATE('".$date_now."', 'YYYY/MM/dd') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
        		) MVT
        		ON MVR.VKBUR = MVT.VKBUR
        		WHERE MVR.VKORG IN ($opco) AND MVR.VKBUR_TXT IS NOT NULL AND REV != 0 GROUP BY MVR.VKBUR_TXT, MVR.VKBUR ORDER BY REV DESC
        
        ) DATA2
        
        ON DATA2.VKORG = COM AND DATA2.VKBUR = PROPINSI
        
        LEFT JOIN 
        (
        SELECT VKBUR AS KD_KOTA, VKBUR_TXT AS KOTA FROM MV_REVENUE WHERE VKORG = '".$opco."'
        GROUP BY VKBUR, VKBUR_TXT 
        ) DATA3
        
        ON 
         DATA3.KD_KOTA = PROPINSI
        
        		WHERE COM IN($opco) and TAHUN = '$thn' and BULAN = '$bln'
            group by propinsi,  DATA2.VKBUR, DATA2.REV , DATA2.VKBUR_TXT, DATA3.KD_KOTA, DATA3.KOTA, VKORG
            
        ";
        */
        $sql ="
        SELECT MVR.VKBUR_TXT, MVR.VKORG, MVR.VKBUR, (CASE WHEN MVT.REV IS NULL THEN 0 ELSE MVT.REV END) AS REV FROM MV_REVENUE MVR
			LEFT JOIN (
		select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($opco) 
        AND BUDAT  between TO_DATE('".$thn."/".$bln."/01', 'YYYY/MM/DD') and TO_DATE('".$date_now."', 'YYYY/MM/dd') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
		) MVT
		ON MVR.VKBUR = MVT.VKBUR
		WHERE MVR.VKORG IN ($opco) AND MVR.VKBUR_TXT IS NOT NULL GROUP BY MVR.VKBUR_TXT, MVT.REV, MVR.VKORG, MVR.VKBUR ORDER BY REV DESC
        ";        
        $data = $this->db->query($sql);
		return $data->result_array();
	}

	public function get_last_date(){
		$data = $this->db->query("select LAST_UPDATE from ZREPORT_REAL_PENJUALAN WHERE LAST_UPDATE = (select max(LAST_UPDATE) from ZREPORT_REAL_PENJUALAN) GROUP BY LAST_UPDATE");
		return $data->result_array();
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function bbc($comp, $prov, $tipe, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$data = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $data->result_array();
	}

	public function data_prov($comp, $prov, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$data = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $data->result_array();
	}

	#################################################################### CLINKER ###################################################################
		public function data_prov_clinker($comp, $prov, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
			$sql = "select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD') and MATERIAL = '121-200'
			UNION ALL
			select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD') and MATERIAL = '121-200'
			UNION ALL
			select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD') and MATERIAL = '121-200'";

			$data = $this->db->query($sql);
			return $data->result_array();
		}
		public function data_prov_bulk($comp, $prov, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
			$sql = "select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD') and MATERIAL = '121-200'
			UNION ALL
			select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD') and MATERIAL = '121-200'
			UNION ALL
			select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD') and MATERIAL = '121-200'";

			$data = $this->db->query($sql);
			return $data->result_array();
		}
		public function get_prov_by_opco_clinker($opco,$bln,$thn){
	        $date_now = date('Y/m/d');
	        $sql ="
	        SELECT MVR.VKBUR_TXT, MVR.VKORG, MVR.VKBUR, (CASE WHEN MVT.REV IS NULL THEN 0 ELSE MVT.REV END) AS REV FROM MV_REVENUE MVR
				LEFT JOIN (
			select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($opco) and MATERIAL = '121-200'
	        AND BUDAT  between TO_DATE('".$thn."/".$bln."/01', 'YYYY/MM/DD') and TO_DATE('".$date_now."', 'YYYY/MM/dd') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
			) MVT
			ON MVR.VKBUR = MVT.VKBUR
			WHERE MVR.VKORG IN ($opco) AND MVR.VKBUR_TXT IS NOT NULL and MATERIAL = '121-200' GROUP BY MVR.VKBUR_TXT, MVT.REV, MVR.VKORG, MVR.VKBUR ORDER BY REV DESC
	        ";        
	        $data = $this->db->query($sql);
			return $data->result_array();
		}
		public function get_prov_by_opco_bulk($opco,$bln,$thn){
	        $date_now = date('Y/m/d');
	        $sql ="
	        SELECT MVR.VKBUR_TXT, MVR.VKORG, MVR.VKBUR, (CASE WHEN MVT.REV IS NULL THEN 0 ELSE MVT.REV END) AS REV FROM MV_REVENUE MVR
				LEFT JOIN (
			select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($opco) and MATERIAL = '121-302'
	        AND BUDAT  between TO_DATE('".$thn."/".$bln."/01', 'YYYY/MM/DD') and TO_DATE('".$date_now."', 'YYYY/MM/dd') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
			) MVT
			ON MVR.VKBUR = MVT.VKBUR
			WHERE MVR.VKORG IN ($opco) AND MVR.VKBUR_TXT IS NOT NULL and MATERIAL = '121-200' GROUP BY MVR.VKBUR_TXT, MVT.REV, MVR.VKORG, MVR.VKBUR ORDER BY REV DESC
	        ";        
	        $data = $this->db->query($sql);
			return $data->result_array();
		}
	##################################################################### END OF CLINKER ###################################################################
	public function get_data_comp($comp, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$data = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN ($comp) AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN ($comp) AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN ($comp) AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $data->result_array();
	}
	public function get_data_bbc_total($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $tipe){
		$data = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE NAMA_MATERIAL = '$tipe' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $data->result_array();
	}
        
	############################################# SMIG CLINKER ##############################################################
	public function get_prov_prov_clinker(){
		$tgl = date('Y/m/d');
		$query= $this->db->query("	select VKBUR_TXT, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS 	TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV
			from MV_REVENUE
			where MATERIAL = '121-200'
			GROUP BY VKBUR_TXT, VKBUR
			ORDER BY VKBUR_TXT");
		return $query->result_array();
	}
	public function get_prov_prov_bulk(){
		$tgl = date('Y/m/d');
		$query= $this->db->query("	select VKBUR_TXT, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS 	TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV
			from MV_REVENUE
			where MATERIAL = '121-302'
			GROUP BY VKBUR_TXT, VKBUR
			ORDER BY VKBUR_TXT");
		return $query->result_array();
	}
	############################################# CLINKER ##############################################################

	public function total($tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$data = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $data->result_array();
	}	

	public function get_rkap_bulanan($comp, $prov, $produk, $thn, $bln){
		$data= $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
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
		$data= $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
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
		$data = $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
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
		$data = $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
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
    //perbaikan terhadap target tlcc
    public function get_rkap_bulanan_bbc_revisi($tipe, $thn, $bln, $kdtipe){
		$data = $this->db->query("
        SELECT
				NVL(sum(TARGET_RKAP),0) +
				(SELECT NVL(SUM(TARGET),0) AS SUM_SCO FROM ZREPORT_TARGET_PLANTSCO WHERE org = '6000' AND DELETE_MARK = '0' AND JENIS IS NULL AND TAHUN = '$thn' AND BULAN = '$bln' and TIPE='$kdtipe')
				as rkap_ton,
				NVL(sum(REVENU_RKAP),0) as rkap_rev
			FROM (
				SELECT
					COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP
				FROM
					ZREPORT_RPTREAL_RESUM
				order BY TAHUN,BULAN,COM DESC
			)
			WHERE TAHUN = '$thn' and BULAN = '$bln' AND COM != '6000' AND TIPE = '$kdtipe'
			GROUP BY TAHUN, BULAN
			
			union ALL
			SELECT
				NVL(sum(TARGET_RKAP),0) +
				(SELECT NVL(SUM(TARGET),0) AS SUM_SCO FROM ZREPORT_TARGET_PLANTSCO WHERE org = '6000' AND DELETE_MARK = '0' AND JENIS IS NULL AND TAHUN = '$thn'  and TIPE='$kdtipe')
				as rkap_ton,
				NVL(sum(REVENU_RKAP),0) as rkap_rev
			FROM(
				SELECT
					COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP
				FROM
					ZREPORT_RPTREAL_RESUM
				order BY TAHUN,BULAN,COM DESC
			)
			WHERE TAHUN = '$thn' AND COM != '6000' AND TIPE = '$kdtipe'
			GROUP BY TAHUN
        
        ");
		return $data->result_array();
	}
	public function get_rkap_bulanan_total($thn,$bln){
	$data = $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
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
    //perbaikan dari query tlcc 'by faisol'
    public function get_rkap_bulanan_total_revisi($thn,$bln){
        $data = $this->db->query("
        SELECT
				NVL(sum(TARGET_RKAP),0) +
				(SELECT nvl(SUM (TARGET),0) AS SUM_SCO FROM ZREPORT_TARGET_PLANTSCO WHERE org = '6000' AND DELETE_MARK = '0' AND JENIS IS NULL AND TAHUN = '$thn' AND BULAN = '$bln')
				as rkap_ton,
				NVL(sum(REVENU_RKAP),0) as rkap_rev
			FROM (
				SELECT
					COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP
				FROM
					ZREPORT_RPTREAL_RESUM
				order BY TAHUN,BULAN,COM DESC
			)
			WHERE TAHUN = '$thn' and BULAN = '$bln' AND COM != '6000'
			GROUP BY TAHUN, BULAN
			
			union ALL
			SELECT
				NVL(sum(TARGET_RKAP),0) +
				(SELECT nvl(SUM (TARGET),0) AS SUM_SCO FROM ZREPORT_TARGET_PLANTSCO WHERE org = '6000' AND DELETE_MARK = '0' AND JENIS IS NULL AND TAHUN = '$thn')
				as rkap_ton,
				NVL(sum(REVENU_RKAP),0) as rkap_rev
			FROM(
				SELECT
					COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP
				FROM
					ZREPORT_RPTREAL_RESUM
				order BY TAHUN,BULAN,COM DESC
			)
			WHERE TAHUN = '$thn' AND COM != '6000'
			GROUP BY TAHUN
        ");
		return $data->result_array();
    }
    
    
	public function get_rkap_harian_comp($comp, $thn, $bln, $tgl){
		$data = $this->db->query("SELECT SUM(RKAP_VOLUME) AS RKAP_VOL, SUM(RKAP_REVENUE) AS RKAP_REV FROM(SELECT tb1.co as COM,
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
    
    //perbaikan nilai target harian di grafik sales volume     
    public function get_data_type_rkap_harian_comp($comp, $thn, $bln, $tgl, $kdtipe){
		$data = $this->db->query("SELECT SUM(RKAP_VOLUME) AS RKAP_VOL, SUM(RKAP_REVENUE) AS RKAP_REV FROM(SELECT tb1.co as COM,
		substr(tb2.budat,0,4) as TAHUN,
		substr(tb2.budat,5,2) as BULAN,
		substr(tb2.budat,7,2) as TANGGAL,
		((
		(SELECT sum(porsi) as porsi_harian from zreport_porsi_sales_region WHERE 
		budat = tb2.budat and vkorg = tb1.co and region = 5 and tipe = '$kdtipe'
		)/(
		SELECT sum(porsi) as total_porsi from zreport_porsi_sales_region WHERE 
		substr(budat,0,6) = substr(tb2.budat,0,6) and vkorg = tb1.co and region = 5 and tipe = '$kdtipe'
		))*(
		SELECT sum(quantum) from sap_t_rencana_sales_type WHERE co=tb1.co and 
		concat(THN,BLN) = substr(tb2.budat,0,6) AND prov NOT IN ('1092', '0001') and tipe = '$kdtipe'
		)) as RKAP_VOLUME
		,
		((
		(SELECT sum(porsi) as porsi_harian from zreport_porsi_sales_region WHERE 
		budat = tb2.budat and vkorg = tb1.co and region = 5 and tipe = '$kdtipe'
		)/(
		SELECT sum(porsi) as total_porsi from zreport_porsi_sales_region WHERE 
		substr(budat,0,6) = substr(tb2.budat,0,6) and vkorg = tb1.co and region = 5 and tipe = '$kdtipe'
		))*(
		SELECT sum(revenue) from sap_t_rencana_sales_type WHERE co=tb1.co and concat(THN,BLN) = substr(tb2.budat,0,6) AND prov NOT IN ('1092', '0001') and tipe = '$kdtipe'
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
    
    
    //get data rkap harian 'faisol'
    public function get_data_type_rkap_harian_smig( $thn, $bln, $tgl, $kdtipe){
		/*$data = $this->db->query("SELECT SUM(RKAP_VOLUME) AS RKAP_VOL, SUM(RKAP_REVENUE) AS RKAP_REV FROM(SELECT tb1.co as COM,
		substr(tb2.budat,0,4) as TAHUN,
		substr(tb2.budat,5,2) as BULAN,
		substr(tb2.budat,7,2) as TANGGAL,
		((
		(SELECT sum(porsi) as porsi_harian from zreport_porsi_sales_region WHERE 
		budat = tb2.budat and vkorg = tb1.co and region = 5 and tipe = '$kdtipe'
		)/(
		SELECT sum(porsi) as total_porsi from zreport_porsi_sales_region WHERE 
		substr(budat,0,6) = substr(tb2.budat,0,6) and vkorg = tb1.co and region = 5 and tipe = '$kdtipe'
		))*(
		SELECT sum(quantum) from sap_t_rencana_sales_type WHERE co=tb1.co and 
		concat(THN,BLN) = substr(tb2.budat,0,6) AND prov NOT IN ('1092', '0001') and tipe = '$kdtipe'
		)) as RKAP_VOLUME
		,
		((
		(SELECT sum(porsi) as porsi_harian from zreport_porsi_sales_region WHERE 
		budat = tb2.budat and vkorg = tb1.co and region = 5 and tipe = '$kdtipe'
		)/(
		SELECT sum(porsi) as total_porsi from zreport_porsi_sales_region WHERE 
		substr(budat,0,6) = substr(tb2.budat,0,6) and vkorg = tb1.co and region = 5 and tipe = '$kdtipe'
		))*(
		SELECT sum(revenue) from sap_t_rencana_sales_type WHERE co=tb1.co and concat(THN,BLN) = substr(tb2.budat,0,6) AND prov NOT IN ('1092', '0001') and tipe = '$kdtipe'
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
		WHERE TAHUN = '$thn' AND BULAN = '$bln' AND TANGGAL = '$tgl'");*/
		$data = $this->db->query("SELECT SUM(RKAP_VOLUME) AS RKAP_VOL, SUM(RKAP_REVENUE) AS RKAP_REV FROM(SELECT tb1.co as COM,
		substr(tb2.budat,0,4) as TAHUN,
		substr(tb2.budat,5,2) as BULAN,
		substr(tb2.budat,7,2) as TANGGAL,
		((
		(SELECT sum(porsi) as porsi_harian from zreport_porsi_sales_region WHERE 
		budat = tb2.budat and vkorg = tb1.co and region = 5 and tipe = '$kdtipe'
		)/(
		SELECT sum(porsi) as total_porsi from zreport_porsi_sales_region WHERE 
		substr(budat,0,6) = substr(tb2.budat,0,6) and vkorg = tb1.co and region = 5 and tipe = '$kdtipe'
		))*(
		SELECT sum(quantum) from sap_t_rencana_sales_type WHERE co=tb1.co and 
		concat(THN,BLN) = substr(tb2.budat,0,6) AND prov NOT IN ('1092', '0001') and tipe = '$kdtipe'
		)) as RKAP_VOLUME
		,
		((
		(SELECT sum(porsi) as porsi_harian from zreport_porsi_sales_region WHERE 
		budat = tb2.budat and vkorg = tb1.co and region = 5 and tipe = '$kdtipe'
		)/(
		SELECT sum(porsi) as total_porsi from zreport_porsi_sales_region WHERE 
		substr(budat,0,6) = substr(tb2.budat,0,6) and vkorg = tb1.co and region = 5 and tipe = '$kdtipe'
		))*(
		SELECT sum(revenue) from sap_t_rencana_sales_type WHERE co=tb1.co and concat(THN,BLN) = substr(tb2.budat,0,6) AND prov NOT IN ('1092', '0001') and tipe = '$kdtipe'
		)) as RKAP_REVENUE
		FROM
		sap_t_rencana_sales_type tb1
		LEFT JOIN
		(
		select porsi,region,vkorg,budat,tipe from zreport_porsi_sales_region WHERE tipe = '$kdtipe' 
		) tb2
		ON
		tb2.region = 5
		AND tb2.vkorg = tb1.co
		AND substr(tb2.budat,0,6) = CONCAT(tb1.thn,tb1.bln)
		AND tb2.tipe = tb1.tipe
    
		where 
		prov NOT IN ('1092', '0001')
		GROUP BY
		co,budat
		ORDER BY co,budat asc)
		WHERE TAHUN = '$thn' AND BULAN = '$bln' AND TANGGAL = '$tgl'");
		return $data->result_array();
	}        

	public function get_rkap_harian_total($thn, $bln, $tgl){
		$data = $this->db->query("SELECT SUM(RKAP_VOLUME) AS RKAP_VOL, SUM(RKAP_REVENUE) AS RKAP_REV FROM(SELECT tb1.co as COM,
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
		$query = $this->db->query("SELECT (case when VKORG = '2000' then '2000 - Semen Indonesia' when VKORG = '3000' then '3000 - Semen Padang' when VKORG = '4000' then '4000 - Semen Tonasa' when VKORG = '5000' then '5000 - Semen Gresik' when VKORG = '6000' then '6000 - TLCC' when VKORG = '7000' then '7000 - KSO' else VKORG END) as VKORG  FROM MV_REVENUE
		WHERE NAMA_MATERIAL = '$tipe'
		AND REVENUE IS NOT NULL
		AND BUDAT = TO_DATE('$thn', 'YYYY')
		GROUP BY VKORG ORDER BY VKORG");
		return $query->result_array();
	}
	public function get_prov_tipe($tipe, $comp){
		$tgl = date('Y/m/d');
		$query = $this->db->query("select VKBUR_TXT, VKBUR
									from MV_REVENUE
									WHERE VKORG = '$comp'
									AND VKBUR IS NOT NULL
									GROUP BY VKBUR_TXT, VKBUR, VKORG
									ORDER BY VKBUR_TXT");
		return $query->result_array();
	}
	//-------------GET_DATA_TYPE----------//
	public function get_data_type_prov($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $comp, $prov, $tipe){
		$query = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $query->result_array();
	}
	public function get_data_type_rkap_bln_prov($comp, $prov, $produk, $thn, $bln){
		$query = $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
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
		$query = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND NAMA_MATERIAL = '$tipe' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD' )");
		return $query->result_array();
	}
	public function get_data_type_rkap_bln_comp($comp, $produk, $thn, $bln){
		/*$query = $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM = '$comp' and PRODUK = '$produk' and TAHUN = '$thn' and BULAN = '$bln'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM = '$comp' and PRODUK = '$produk' and TAHUN = '$thn'");*/
        $query = $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM in ($comp) and PRODUK = '$produk' and TAHUN = '$thn' and BULAN = '$bln'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM in ($comp) and PRODUK = '$produk' and TAHUN = '$thn'");
		return $query->result_array();
	}
	//////----------PROV----------////////
	public function get_prov_prov(){
		$tgl = date('Y/m/d');
		$query= $this->db->query("	select VKBUR_TXT, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS 	TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV
			from MV_REVENUE
			GROUP BY VKBUR_TXT, VKBUR
			ORDER BY VKBUR_TXT");
		return $query->result_array();
	}
	public function get_comp_prov($prov){
		$tgl = date('Y');
		$query = $this->db->query("SELECT (case when VKORG = '2000' then '2000 - Semen Indonesia' when VKORG = '3000' then '3000 - Semen Padang' when VKORG = '4000' then '4000 - Semen Tonasa' when VKORG = '5000' then '5000 - Semen Gresik' when VKORG = '6000' then '6000 - TLCC' when VKORG = '7000' then '7000 - KSO' else VKORG END) as VKORG  FROM MV_REVENUE
		WHERE VKBUR = '$prov'
		AND REVENUE IS NOT NULL
		AND BUDAT >= TO_DATE('$tgl/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$tgl/12/31', 'YYYY/MM/DD')
		GROUP BY VKORG ORDER BY VKORG");
		return $query->result_array();
	}
	public function get_data_prov_bbc($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $comp, $prov, $tipe){
		$query = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND NAMA_MATERIAL = '$tipe' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $query->result_array();
	}
	public function get_data_prov_rkap_bln_bbc($comp, $prov, $tipe, $thn, $bln){
		$query = $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
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
		$query = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR = '$prov' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $query->result_array();
	}
	public function get_data_prov_rkap_bln_comp($comp, $prov, $thn, $bln){
		$query = $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
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
		$query = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKBUR = '$prov' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKBUR = '$prov' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKBUR = '$prov' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $query->result_array();
	}
	public function get_data_prov_rkap_bln_prov($prov, $thn, $bln){
		$query = $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
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

	////////////////////////////////////////////////////////////////////////////////// NEW ///////////////////////////////////////////////////////////////////////////////
	
	/**
	 * [get_actual_rkap_harian_opco description]
	 * @param  [type] $tgl_now  [description]
	 * @param  [type] $tgl_rel  [description]
	 * @param  [type] $bln      [description]
	 * @param  [type] $thn      [description]
	 * @param  [type] $tgl_last [description]
	 * @return [type]           [description]
	 */
	public function get_actual_rkap_harian_opco($tgl_rel, $bln, $thn, $opco){
		$data = $this->db->query("
		select VKORG,TO_CHAR(BUDAT,'DD-MM-YYYY'),SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD') and VKORG='".$opco."' GROUP BY VKORG,TO_CHAR(BUDAT,'DD-MM-YYYY') ORDER BY 1,2");
		return $data->result_array();
	}

	/**
	 * [get_actual_rkap_harian_opco description]
	 * @param  [type] $tgl_now [description]
	 * @param  [type] $tgl_rel [description]
	 * @param  [type] $bln     [description]
	 * @param  [type] $thn     [description]
	 * @param  [type] $opco    [description]
	 * @return [type]          [description]
	 */
	public function get_actual_rkap_bulanan_opco($thn, $opco){
		$sql = "SELECT
					VKORG,
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
				and VKORG=".$opco."
				GROUP BY 
				VKORG,
					TO_CHAR(BUDAT, 'MM')
				ORDER BY TO_CHAR(BUDAT, 'MM') asc";
		$data = $this->db->query($sql);
		return $data->result_array();
	}


	/**
	 * [get_detail_rkap_harian description]
	 * @param  [type] $thn  [description]
	 * @param  [type] $bln  [description]
	 * @param  [type] $opco [description]
	 * @return [type]       [description]
	 */
	function get_detail_rkap_harian_opco($bln, $thn,$tgl_rel, $opco)
	{
		
		$sql = "SELECT
					*
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
						GROUP BY
							co,
							budat
						ORDER BY
							co,
							budat ASC
					)
				WHERE
					TAHUN = '".$thn."'
				AND BULAN = '".$bln."' and TANGGAL<='".$tgl_rel."' and COM = '".$opco."'";
				$data = $this->db->query($sql);
				return $data->result_array();
	}


	function get_detail_rkap_harian_smig($bln, $thn,$tgl_rel)
	{
		
		$sql = "SELECT
					TANGGAL,
					BULAN,
					TAHUN,
					SUM(RKAP_VOLUME) as RKAP_VOLUME,
					SUM(RKAP_REVENUE) as RKAP_REVENUE
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
						GROUP BY
							co,
							budat
						ORDER BY
							co,
							budat ASC
					)
				WHERE
					TAHUN = '".$thn."'
				AND BULAN = '".$bln."' and TANGGAL<='".$tgl_rel."'
GROUP BY
					TANGGAL,
					BULAN,
					TAHUN
ORDER BY TANGGAL";
				$data = $this->db->query($sql);
				return $data->result_array();
				// return $sql;
	}

	public function get_actual_rkap_harian_smig($tgl_rel, $bln, $thn){
		$sql = "
		select BUDAT,SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD') GROUP BY BUDAT ORDER BY 1,2";
		$data = $this->db->query($sql);
		return $data->result_array();
	}


	/**
	 * [get_detail_rkap_bulanan_opco description]
	 * @param  [type] $thn  [description]
	 * @param  [type] $opco [description]
	 * @return [type]       [description]
	 */
	function get_detail_rkap_bulanan_opco($thn,$opco)
	{
		
		// $sql = "SELECT
				// COM,
				// BULAN,
				// SUM(RKAP_VOLUME) as RKAP_VOLUME,
				// SUM(RKAP_REVENUE) AS RKAP_REVENUE
				// FROM
					// (
						// SELECT
							// tb1.co AS COM,
							// SUBSTR (tb2.budat, 0, 4) AS TAHUN,
							// SUBSTR (tb2.budat, 5, 2) AS BULAN,
							// SUBSTR (tb2.budat, 7, 2) AS TANGGAL,
							// (
								// (
									// (
										// SELECT
											// SUM (porsi) AS porsi_harian
										// FROM
											// zreport_porsi_sales_region
										// WHERE
											// budat = tb2.budat
										// AND vkorg = tb1.co
										// AND region = 5
									// ) / (
										// SELECT
											// SUM (porsi) AS total_porsi
										// FROM
											// zreport_porsi_sales_region
										// WHERE
											// SUBSTR (budat, 0, 6) = SUBSTR (tb2.budat, 0, 6)
										// AND vkorg = tb1.co
										// AND region = 5
									// )
								// ) * (
									// SELECT
										// SUM (quantum)
									// FROM
										// sap_t_rencana_sales_type
									// WHERE
										// co = tb1.co
									// AND CONCAT (THN, BLN) = SUBSTR (tb2.budat, 0, 6)
									// AND prov NOT IN ('1092', '0001')
								// )
							// ) AS RKAP_VOLUME,
							// (
								// (
									// (
										// SELECT
											// SUM (porsi) AS porsi_harian
										// FROM
											// zreport_porsi_sales_region
										// WHERE
											// budat = tb2.budat
										// AND vkorg = tb1.co
										// AND region = 5
									// ) / (
										// SELECT
											// SUM (porsi) AS total_porsi
										// FROM
											// zreport_porsi_sales_region
										// WHERE
											// SUBSTR (budat, 0, 6) = SUBSTR (tb2.budat, 0, 6)
										// AND vkorg = tb1.co
										// AND region = 5
									// )
								// ) * (
									// SELECT
										// SUM (revenue)
									// FROM
										// sap_t_rencana_sales_type
									// WHERE
										// co = tb1.co
									// AND CONCAT (THN, BLN) = SUBSTR (tb2.budat, 0, 6)
									// AND prov NOT IN ('1092', '0001')
								// )
							// ) AS RKAP_REVENUE
						// FROM
							// sap_t_rencana_sales_type tb1
						// LEFT JOIN (
							// SELECT
								// porsi,
								// region,
								// vkorg,
								// budat,
								// tipe
							// FROM
								// zreport_porsi_sales_region
						// ) tb2 ON tb2.region = 5
						// AND tb2.vkorg = tb1.co
						// AND SUBSTR (tb2.budat, 0, 6) = CONCAT (tb1.thn, tb1.bln)
						// AND tb2.tipe = tb1.tipe
						// WHERE
							// --tb1.co = '7000' AND
							// --concat(tb1.THN,tb1.BLN) = '201701' AND 
							// prov NOT IN ('1092', '0001')
							// and SUBSTR (tb2.budat, 0, 4) = '".$thn."' and tb1.co = '".$opco."'
						// GROUP BY
							// co,
							// budat
						// ORDER BY
							// co,
							// budat ASC
					// )
				// GROUP BY 
				// COM, 
				// BULAN
				// ORDER BY BULAN"; 
	$sql = "
		SELECT TB_DATA.BULAN,
			TB_DATA.trkap as RKAP_VOLUME,
			TB_DATA.revrkap AS RKAP_REVENUE
		FROM(SELECT SALES_BULANAN.TAHUN,
			SALES_BULANAN.BULAN,
			SALES_BULANAN.trkap,
			SALES_BULANAN.trealto,
			REV_BULANAN.revreal,
			SALES_BULANAN.revrkap,
			SALES_BULANAN.prreal,
			SALES_BULANAN.prrkap
		FROM(
			  SELECT 
			  tahun,
			  bulan,
			  SUM (target_rkap) trkap,
			  SUM (realto)    trealto,
			  SUM (revenu_real) revreal,
			  SUM (revenu_rkap) revrkap,
			  SUM (price_real) prreal,
			  SUM (price_rkap) prrkap
			  FROM zreport_rptreal_resum
			  WHERE   tahun = '".$thn."' and com = '".$opco."' and tipe != '121-200' 
			  GROUP BY  tahun, bulan
			  ORDER BY bulan
			  )SALES_BULANAN 
		LEFT JOIN (
		SELECT TAHUN,
			  BULAN,
			  SUM(REV_REAL) AS revreal
		FROM(
			  SELECT TO_CHAR (budat, 'yyyy') AS TAHUN,
			  TO_CHAR (budat, 'mm') AS BULAN,
			  SUM(REVENUE) AS REV_REAL 
			  FROM MV_REVENUE 
			  WHERE TO_CHAR (budat, 'yyyy') = '".$thn."' GROUP BY BUDAT ORDER BY BUDAT ASC
			  ) GROUP BY TAHUN, BULAN ORDER BY BULAN ASC
			  )REV_BULANAN
		ON SALES_BULANAN.TAHUN = REV_BULANAN.TAHUN 
		AND SALES_BULANAN.BULAN = REV_BULANAN.BULAN)TB_DATA
		LEFT JOIN (
			  SELECT TAHUN,
			  BULAN,
			  SUM(VOL_REAL) AS trealto
		FROM(
			  SELECT TO_CHAR (budat, 'yyyy') AS TAHUN,
			  TO_CHAR (budat, 'mm') AS BULAN,
			  SUM(TOTAL_QTY) AS VOL_REAL 
			  FROM MV_REVENUE 
			  WHERE TO_CHAR (budat, 'yyyy') = '".$thn."' GROUP BY BUDAT ORDER BY BUDAT ASC
			  ) GROUP BY TAHUN, BULAN ORDER BY BULAN ASC
		)VOL_BULANAN 
		ON TB_DATA.TAHUN = VOL_BULANAN.TAHUN 
		AND TB_DATA.BULAN = VOL_BULANAN.BULAN
	";
				$data = $this->db->query($sql);
				return $data->result_array();
	}


	function get_detail_rkap_bulanan_smig($thn)
	{		
		// $sql = "SELECT
				// BULAN,
				// SUM(RKAP_VOLUME) as RKAP_VOLUME,
				// SUM(RKAP_REVENUE) AS RKAP_REVENUE
				// FROM
					// (
						// SELECT
							// tb1.co AS COM,
							// SUBSTR (tb2.budat, 0, 4) AS TAHUN,
							// SUBSTR (tb2.budat, 5, 2) AS BULAN,
							// SUBSTR (tb2.budat, 7, 2) AS TANGGAL,
							// (
								// (
									// (
										// SELECT
											// SUM (porsi) AS porsi_harian
										// FROM
											// zreport_porsi_sales_region
										// WHERE
											// budat = tb2.budat
										// AND vkorg = tb1.co
										// AND region = 5
									// ) / (
										// SELECT
											// SUM (porsi) AS total_porsi
										// FROM
											// zreport_porsi_sales_region
										// WHERE
											// SUBSTR (budat, 0, 6) = SUBSTR (tb2.budat, 0, 6)
										// AND vkorg = tb1.co
										// AND region = 5
									// )
								// ) * (
									// SELECT
										// SUM (quantum)
									// FROM
										// sap_t_rencana_sales_type
									// WHERE
										// co = tb1.co
									// AND CONCAT (THN, BLN) = SUBSTR (tb2.budat, 0, 6)
									// AND prov NOT IN ('1092', '0001')
								// )
							// ) AS RKAP_VOLUME,
							// (
								// (
									// (
										// SELECT
											// SUM (porsi) AS porsi_harian
										// FROM
											// zreport_porsi_sales_region
										// WHERE
											// budat = tb2.budat
										// AND vkorg = tb1.co
										// AND region = 5
									// ) / (
										// SELECT
											// SUM (porsi) AS total_porsi
										// FROM
											// zreport_porsi_sales_region
										// WHERE
											// SUBSTR (budat, 0, 6) = SUBSTR (tb2.budat, 0, 6)
										// AND vkorg = tb1.co
										// AND region = 5
									// )
								// ) * (
									// SELECT
										// SUM (revenue)
									// FROM
										// sap_t_rencana_sales_type
									// WHERE
										// co = tb1.co
									// AND CONCAT (THN, BLN) = SUBSTR (tb2.budat, 0, 6)
									// AND prov NOT IN ('1092', '0001')
								// )
							// ) AS RKAP_REVENUE
						// FROM
							// sap_t_rencana_sales_type tb1
						// LEFT JOIN (
							// SELECT
								// porsi,
								// region,
								// vkorg,
								// budat,
								// tipe
							// FROM
								// zreport_porsi_sales_region
						// ) tb2 ON tb2.region = 5
						// AND tb2.vkorg = tb1.co
						// AND SUBSTR (tb2.budat, 0, 6) = CONCAT (tb1.thn, tb1.bln)
						// AND tb2.tipe = tb1.tipe
						// WHERE
							// --tb1.co = '7000' AND
							// --concat(tb1.THN,tb1.BLN) = '201701' AND 
							// prov NOT IN ('1092', '0001')
							// and SUBSTR (tb2.budat, 0, 4) = '".$thn."' 
						// GROUP BY
							// co,
							// budat
						// ORDER BY
							// co,
							// budat ASC
					// )
				// GROUP BY 
				// BULAN
				// ORDER BY BULAN"; 
				$sql = "
					SELECT TB_DATA.BULAN,
						TB_DATA.trkap as RKAP_VOLUME,
						TB_DATA.revrkap AS RKAP_REVENUE
					FROM(SELECT SALES_BULANAN.TAHUN,
						SALES_BULANAN.BULAN,
						SALES_BULANAN.trkap,
						SALES_BULANAN.trealto,
						REV_BULANAN.revreal,
						SALES_BULANAN.revrkap,
						SALES_BULANAN.prreal,
						SALES_BULANAN.prrkap
					FROM(
						  SELECT 
						  tahun,
						  bulan,
						  SUM (target_rkap) trkap,
						  SUM (realto)    trealto,
						  SUM (revenu_real) revreal,
						  SUM (revenu_rkap) revrkap,
						  SUM (price_real) prreal,
						  SUM (price_rkap) prrkap
						  FROM zreport_rptreal_resum
						  WHERE   tahun = '".$thn."' and com in ('7000','3000','4000','6000', '5000') and tipe != '121-200' 
						  GROUP BY  tahun, bulan
						  ORDER BY bulan
						  )SALES_BULANAN 
					LEFT JOIN (
					SELECT TAHUN,
						  BULAN,
						  SUM(REV_REAL) AS revreal
					FROM(
						  SELECT TO_CHAR (budat, 'yyyy') AS TAHUN,
						  TO_CHAR (budat, 'mm') AS BULAN,
						  SUM(REVENUE) AS REV_REAL 
						  FROM MV_REVENUE 
						  WHERE TO_CHAR (budat, 'yyyy') = '".$thn."' GROUP BY BUDAT ORDER BY BUDAT ASC
						  ) GROUP BY TAHUN, BULAN ORDER BY BULAN ASC
						  )REV_BULANAN
					ON SALES_BULANAN.TAHUN = REV_BULANAN.TAHUN 
					AND SALES_BULANAN.BULAN = REV_BULANAN.BULAN)TB_DATA
					LEFT JOIN (
						  SELECT TAHUN,
						  BULAN,
						  SUM(VOL_REAL) AS trealto
					FROM(
						  SELECT TO_CHAR (budat, 'yyyy') AS TAHUN,
						  TO_CHAR (budat, 'mm') AS BULAN,
						  SUM(TOTAL_QTY) AS VOL_REAL 
						  FROM MV_REVENUE 
						  WHERE TO_CHAR (budat, 'yyyy') = '".$thn."' GROUP BY BUDAT ORDER BY BUDAT ASC
						  ) GROUP BY TAHUN, BULAN ORDER BY BULAN ASC
					)VOL_BULANAN 
					ON TB_DATA.TAHUN = VOL_BULANAN.TAHUN 
					AND TB_DATA.BULAN = VOL_BULANAN.BULAN
				";
				$data = $this->db->query($sql);
				return $data->result_array();
	}

	public function get_actual_rkap_bulanan_smig($thn){
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
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	function rkap_volume_thanglong($comp,$thn,$bln,$tgl)
	{
		$sql= "SELECT
				NVL (
					 (SELECT
							SUM (porsi)
						FROM
							zreport_porsi_sales_region
						WHERE
							vkorg = '$comp'
						AND budat LIKE '$thn$bln$tgl'
						AND region = 5)/ (
						SELECT
							SUM (porsi)
						FROM
							zreport_porsi_sales_region
						WHERE
							vkorg = '$comp'
						AND budat LIKE '$thn$bln%'
						AND region = 5
					)*SUM (target),
					0
				) AS RKAP_TON
			FROM
				ZREPORT_TARGET_PLANTSCO
			WHERE
				org = '$comp'
			AND DELETE_MARK = '0'
			AND JENIS IS NULL
			AND BULAN = '$bln'
			AND TAHUN = '$thn'
			GROUP BY
				TAHUN,
				BULAN
			union 
			SELECT SUM (target) AS RKAP_TON
						FROM ZREPORT_TARGET_PLANTSCO
						WHERE org = '6000'
						AND DELETE_MARK = '0'
						AND JENIS IS NULL
						AND BULAN = '$bln'
						AND TAHUN = '$thn'
			union
			SELECT SUM (target) AS RKAP_TON
						FROM ZREPORT_TARGET_PLANTSCO
						WHERE org = '6000'
						AND DELETE_MARK = '0'
						AND JENIS IS NULL
						AND TAHUN = '$thn'";
		return $this->db->query($sql)->result_array();
		// return $sql;
	}

	function rkap_volume_thanglong_2($comp,$thn,$bln,$tgl)
	{
		$sql = "SELECT
				NVL (
					 (SELECT
							nvl(SUM (porsi),0)
						FROM
							zreport_porsi_sales_region
						WHERE
							vkorg = '$comp'
						AND budat LIKE '$thn$bln$tgl'
						AND region = 5)/ (
						SELECT
							nvl(SUM (porsi),1)
						FROM
							zreport_porsi_sales_region
						WHERE
							vkorg = '$comp'
						AND budat LIKE '$thn$bln%'
						AND region = 5
					)*nvl(SUM (target),0),
					0
				) AS RKAP_TON,'HARIAN' as TIPE 
			FROM
				ZREPORT_TARGET_PLANTSCO
			WHERE
				org = '$comp'
			AND DELETE_MARK = '0'
			AND JENIS IS NULL
			AND BULAN = '$bln'
			AND TAHUN = '$thn'
			GROUP BY
				BULAN,
				TAHUN
			union 
			SELECT nvl(SUM (target),0) AS RKAP_TON,'BULANAN' as TIPE
						FROM ZREPORT_TARGET_PLANTSCO
						WHERE org = '$comp'
						AND DELETE_MARK = '0'
						AND JENIS IS NULL
						AND BULAN = '$bln'
						AND TAHUN = '$thn'
			union
			SELECT nvl(SUM (target),0) AS RKAP_TON,'TAHUNAN' as TIPE
						FROM ZREPORT_TARGET_PLANTSCO
						WHERE org = '$comp'
						AND DELETE_MARK = '0'
						AND JENIS IS NULL
						AND TAHUN = '$thn'
			";
			return $this->db->query($sql)->result_array();
	}

	function rkap_volume_thanglong_harian_tipe($opco,$tgl,$bln,$thn,$tipe)
	{
		$sql = "SELECT
					CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' WHEN '121-200' THEN 'Clinker' end TIPE,
					NVL (
						(
							SELECT
								nvl(SUM (porsi),0)
							FROM
								zreport_porsi_sales_region
							WHERE
								vkorg = '$opco'
							AND budat LIKE '$thn$bln$tgl'
							AND region = 5
							and tipe = '$tipe'
						) / (
							SELECT
								nvl(SUM (porsi),1)
							FROM
								zreport_porsi_sales_region
							WHERE
								vkorg = '$opco'
							AND budat LIKE '$thn$bln%'
							AND region = 5
							and tipe = '$tipe'
						) * SUM (target),
						0
					) AS RKAP_TON
				FROM
					ZREPORT_TARGET_PLANTSCO
				WHERE
					org = '$opco'
				AND DELETE_MARK = '0'
				AND JENIS IS NULL
				AND BULAN = '$bln'
				AND TAHUN = '$thn'
				AND TIPE = '$tipe'
				GROUP BY
					TIPE,
					TAHUN,
					BULAN";
			return $this->db->query($sql)->result_array();
	} 

	function rkap_volume_thanglong_bulanan_tipe($opco,$bln,$thn,$tipe)
	{
		$sql = "SELECT
				CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' WHEN '121-200' THEN 'Clinker' end TIPE,
				nvl(SUM (target),0) AS RKAP_TON
			FROM
				ZREPORT_TARGET_PLANTSCO
			WHERE
				org = '$opco'
			AND DELETE_MARK = '0'
			AND JENIS IS NULL
			AND BULAN = '$bln'
			AND TAHUN = '$thn'
			AND TIPE = '$tipe'
			GROUP BY TIPE";
			return $this->db->query($sql)->result_array();
	}

	function rkap_volume_thanglong_tahunan_tipe($opco,$thn,$tipe)
	{
		$sql = "SELECT
					CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' WHEN '121-200' THEN 'Clinker' end TIPE,
					SUM (target) AS RKAP_TON
				FROM
					ZREPORT_TARGET_PLANTSCO
				WHERE
					org = '$opco'
				AND DELETE_MARK = '0'
				AND JENIS IS NULL
				AND TAHUN = '$thn'
				AND TIPE = '$tipe'
				GROUP BY TIPE";
				return $this->db->query($sql)->result_array();
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * 
	 */
	function getplantbyopco($opco)
	{
		$sql = "SELECT * from ZREPORT_M_PLANT
				WHERE org = '$opco'
				and KD_PLANT like '_4%'";
		return $this->db->query($sql)->result_array();

	}

	function get_rkap_sales_bulanan_opco_plant($kdplant,$tahun)
	{
		$sql = "SELECT
				    nvl(tb1.target,0) AS target_vol,
				    tb2.bulan
				FROM
				    (
				        SELECT
				            nvl(SUM(z2.target),0) AS target,
				            z2.kd_plant,
				            z2.bulan,
				            z2.tahun
				        FROM
				            zreport_target_plant z2
				        WHERE
				            z2.kd_plant LIKE '$kdplant'
				        AND
				            z2.tahun = '$tahun'
				        GROUP BY
				            z2.kd_plant,
				            z2.bulan,
				            z2.tahun
				    ) tb1
				RIGHT JOIN
				    (
				        SELECT
				            '01' AS bulan
				        FROM
				            dual
				        UNION
				        SELECT
				            '02' AS bulan
				        FROM
				            dual
				        UNION
				        SELECT
				            '03' AS bulan
				        FROM
				            dual
				        UNION
				        SELECT
				            '04' AS bulan
				        FROM
				            dual
				        UNION
				        SELECT
				            '05' AS bulan
				        FROM
				            dual
				        UNION
				        SELECT
				            '06' AS bulan
				        FROM
				            dual
				        UNION
				        SELECT
				            '07' AS bulan
				        FROM
				            dual
				        UNION
				        SELECT
				            '08' AS bulan
				        FROM
				            dual
				        UNION
				        SELECT
				            '09' AS bulan
				        FROM
				            dual
				        UNION
				        SELECT
				            '10' AS bulan
				        FROM
				            dual
				        UNION
				        SELECT
				            '11' AS bulan
				        FROM
				            dual
				        UNION
				        SELECT
				            '12' AS bulan
				        FROM
				            dual
				    ) tb2
				ON tb2.bulan = tb1.bulan
				order by 2";
		return $this->db->query($sql)->result_array();
	}

	public function get_actual_rkap_bulanan_opco_plant($kdplant,$tahun){
		$sql = "SELECT 
					TB2.BULAN,
					NVL(TB1.VOL,0) VOL,
					NVL(TB1.PRICE,0) PRICE,
					NVL(TB1.TOTALSALES,0) TOTALSALES,
					NVL(TB1.OA,0) OA,
					NVL(TB1.REV,0) REV
					FROM 
					(
					 SELECT   
					    TO_CHAR(BUDAT, 'MM') as BULAN,
					    SUM (TOTAL_QTY) AS VOL,
					    SUM (PENJUALAN) / SUM (TOTAL_QTY) AS PRICE,
					    SUM (PENJUALAN) AS TOTALSALES,
					    SUM (OA) AS OA,
					    SUM (REVENUE) AS REV
					FROM
					    MV_REVENUE
					WHERE
					    TO_CHAR(BUDAT, 'YYYY') = '$tahun'
					    AND WERKS = '$kdplant'
					GROUP BY
					TO_CHAR(BUDAT, 'MM')
					) TB1
					RIGHT JOIN
					(
					    SELECT
					        '01' AS bulan
					    FROM
					        dual
					    UNION
					    SELECT
					        '02' AS bulan
					    FROM
					        dual
					    UNION
					    SELECT
					        '03' AS bulan
					    FROM
					        dual
					    UNION
					    SELECT
					        '04' AS bulan
					    FROM
					        dual
					    UNION
					    SELECT
					        '05' AS bulan
					    FROM
					        dual
					    UNION
					    SELECT
					        '06' AS bulan
					    FROM
					        dual
					    UNION
					    SELECT
					        '07' AS bulan
					    FROM
					        dual
					    UNION
					    SELECT
					        '08' AS bulan
					    FROM
					        dual
					    UNION
					    SELECT
					        '09' AS bulan
					    FROM
					        dual
					    UNION
					    SELECT
					        '10' AS bulan
					    FROM
					        dual
					    UNION
					    SELECT
					        '11' AS bulan
					    FROM
					        dual
					    UNION
					    SELECT
					        '12' AS bulan
					    FROM
					        dual
					) tb2
					ON TB1.BULAN=TB2.BULAN
					ORDER BY 1 ASC ";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	function get_rkap_sales_harian_opco_plant($kdplant,$tgl,$bulan,$tahun)
	{
		$sql ="SELECT distinct
		        ( (
		            SELECT
		                SUM(porsi) AS porsi_harian
		            FROM
		                zreport_porsi_sales_region
		            WHERE
		                budat = tbporsi.budat
		            AND
		                region = 5
		        ) / (
		            SELECT
		                SUM(porsi) AS porsi_harian
		            FROM
		                zreport_porsi_sales_region
		            WHERE
		                substr(budat,0,6) = tb1.tahun ||  tb1.bulan
		            AND
		                region = 5
		        ) ) * (
		            SELECT
		                SUM(target) AS jumlah_target
		            FROM
		                zreport_target_plant
		            WHERE
		                kd_plant = tb1.kd_plant
		            AND
		                bulan = tb1.bulan
		            AND
		                tahun = tb1.tahun
		        ) AS target_vol_harian,
		        tbporsi.budat
		    FROM
		        zreport_target_plant tb1
		        join zreport_porsi_sales_region tbporsi on substr(tbporsi.budat,0,6) = tb1.TAHUN||tb1.BULAN
		    WHERE
		        tb1.kd_plant = '$kdplant'
		    AND
		        tb1.bulan = '$bulan'
		    AND
		        tb1.tahun = '$tahun'
		        order by 2 ";
			 $data = $this->db->query($sql);
			return $data->result_array();
	}

	function get_actual_rkap_harian_opco_plant($kdplant,$bulan,$tahun)
	{
		$sql="SELECT
			    WERKS,
			    TO_CHAR(budat,'DD-MM-YYYY') as TANGGAL,
			    SUM(total_qty) AS vol,
			    SUM(penjualan) / SUM(total_qty) AS price,
			    SUM(penjualan) AS totalsales,
			    SUM(oa) AS oa,
			    SUM(revenue) AS rev
			FROM
			    mv_revenue
			WHERE
			    to_char(budat,'MM-YYYY') = '$bulan-$tahun'
			AND WERKS = '$kdplant'
			GROUP BY
			    WERKS,
			    TO_CHAR(budat,'DD-MM-YYYY')
			ORDER BY 1,2";
			$data = $this->db->query($sql);
			return $data->result_array();
	}


    public function get_reportperplant($tahunf,$bulanf,$datenow,$org){
    	$datenowf = $tahunf.$bulanf.$datenow;
        $tgl_prev = (int) $datenow - 1;
        if($tgl_prev<=9){
            $tgl_prev = '0'.$tgl_prev;
        }
    	$datekemarenf = $tahunf.$bulanf.$tgl_prev;

		$sql = "select tb19.*,tb20.TARGETMOUNTZAK from (
				select tb17.*,tb18.TARGETZAK from (
				select tb15.*,tb16.REALMOUNTCUR from (
					select tb13.*,tb14.REALMOUNTZAK from (
					select tb3.*,tb4.realcur from (
					select tb1.*,tb2.realzak from
					(
							select KD_PLANT,NAME from ZREPORT_M_PLANT where ORG in (select orgin from ZREPORT_M_INCOM where orgm='$org' and delete_mark=0 group by orgin) AND
							KD_PLANT IN ('7401','7402','7403','7404','7405','7406','7407','7408','7409','7410','7412','7415','7416')             
					)tb1 left join(
							select PLANT,sum(kwantumx) as realzak from zreport_rpt_real where
							TGL_SPJ=to_date('$datenowf','yyyymmdd')
							and order_type <>'ZNL' 
							and item_no like '121-301%' 
							and item_no <> '121-301-0240'
							and com in (select orgin from ZREPORT_M_INCOM where orgm='$org' and delete_mark=0 group by orgin) 
							and no_polisi <> 'S11LO'
							and sold_to like '0000000%'
							group by PLANT
					)tb2 on(KD_PLANT=PLANT)
					)tb3 left join(
							 select PLANT as PLANTC,sum(kwantumx) as realcur from zreport_rpt_real where
							 TGL_SPJ=to_date('$datenowf','yyyymmdd')
							 and item_no like '121-302%' 
							 and order_type <>'ZNL'
							 and com in (select orgin from ZREPORT_M_INCOM where orgm='$org' and delete_mark=0 group by orgin) 
							 and no_polisi <> 'S11LO'
							 and sold_to like '0000000%'
							 group by PLANT                        
					)tb4 on(KD_PLANT=PLANTC)
					)tb13 left join(
							select PLANT,sum(kwantumx) as realmountzak from zreport_rpt_real where
							to_char(TGL_SPJ,'YYYYMM') like '$tahunf$bulanf%'
							and order_type <>'ZNL' 
							and item_no like '121-301%' 
							and item_no <> '121-301-0240'
							and com in (select orgin from ZREPORT_M_INCOM where orgm='$org' and delete_mark=0 group by orgin) 
							and no_polisi <> 'S11LO'
							and sold_to like '0000000%'
							group by PLANT
					)tb14 on(tb13.KD_PLANT=tb14.PLANT)
					)tb15 left join(
							 select PLANT as PLANTC,sum(kwantumx) as realmountcur from zreport_rpt_real where
							 to_char(TGL_SPJ,'YYYYMM') like '$tahunf$bulanf%'
							 and item_no like '121-302%' 
							 and order_type <>'ZNL'
							 and com in (select orgin from ZREPORT_M_INCOM where orgm='$org' and delete_mark=0 group by orgin) 
							 and no_polisi <> 'S11LO'
							 and sold_to like '0000000%'
							 group by PLANT                        
					)tb16 on(tb15.KD_PLANT=tb16.PLANTC)
					)tb17 left join(
							 select tb1a.*,(tb1a.TARGET*tb2a.PORSIV) as TARGETZAK  from (
								select KD_PLANT as PLANT,ITEM_NO,SUM(TARGET) as TARGET from ZREPORT_TARGET_PLANT where 
								BULAN='$bulanf' and TAHUN='$tahunf' and BRAN12 is null and KODE_DA is null
							  and ITEM_NO like '121-301%' 
								and (KD_PLANT like '7%')
								group by KD_PLANT,ITEM_NO
								)tb1a left join (    
										select c.TIPE, SUM(PORSI/total_porsi) as PORSIV from (
												select region,TIPE,PORSI from zreport_porsi_sales_region
												where vkorg= '$org' and region=5
												and BUDAT='$datenowf'
										)c left join(
												select region, tipe, sum(porsi) as total_porsi 
												from zreport_porsi_sales_region 
												where budat like '$tahunf$bulanf%' and vkorg= '$org' group by region, tipe 
										)d on(c.TIPE=d.TIPE and c.REGION=d.REGION)
										group by c.TIPE
								)tb2a on (tb1a.ITEM_NO=tb2a.TIPE)                       
					)tb18 on(tb17.KD_PLANT=tb18.PLANT)
					)tb19 left join(
							 select tb1b.*,(tb1b.TARGET*tb2b.PORSIV) as TARGETMOUNTZAK  from (
								select KD_PLANT as PLANT,ITEM_NO,SUM(TARGET) as TARGET from ZREPORT_TARGET_PLANT where 
								BULAN='$bulanf' and TAHUN='$tahunf' and BRAN12 is null and KODE_DA is null
							  and ITEM_NO like '121-301%' 
								and (KD_PLANT like '7%')
								group by KD_PLANT,ITEM_NO
								)tb1b left join (    
										select c.TIPE, SUM(PORSI/total_porsi) as PORSIV from (
												select region,TIPE,PORSI from zreport_porsi_sales_region
												where vkorg= '$org' and region=5
												and BUDAT like '$tahunf$bulanf%'
										)c left join(
												select region, tipe, sum(porsi) as total_porsi 
												from zreport_porsi_sales_region 
												where budat like '$tahunf$bulanf%' and vkorg= '$org' group by region, tipe 
										)d on(c.TIPE=d.TIPE and c.REGION=d.REGION)
										group by c.TIPE
								)tb2b on (tb1b.ITEM_NO=tb2b.TIPE)                       
					)tb20 on(tb19.KD_PLANT=tb20.PLANT)
					order by KD_PLANT asc
		";
		$data = $this->db->query($sql);
		return $data->result_array();
	}
    


}