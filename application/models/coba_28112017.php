<?php


defined('BASEPATH') OR exit('No direct script access allowed');

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
		$sql = "SELECT MVR.VKBUR_TXT, '".$opco."' AS VKORG, MVR.VKBUR, (CASE WHEN SUM(MVT.REV) IS NULL THEN 0 ELSE SUM(MVT.REV)END) AS REV FROM MV_REVENUE MVR
		LEFT JOIN (
		select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN(".$opco.") AND BUDAT = TO_DATE('".$thn."/".$bln."', 'YYYY/MM') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
		) MVT
		ON MVR.VKBUR = MVT.VKBUR
		WHERE MVR.VKORG IN (".$opco.") AND MVR.VKBUR_TXT IS NOT NULL AND REV != 0 GROUP BY MVR.VKBUR_TXT, MVR.VKBUR ORDER BY REV DESC";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function get_prov_by_opco_clinker($opco,$bln,$thn){
		// $tgl = date('Y/m');
		$sql = "SELECT MVR.VKBUR_TXT, '".$opco."' AS VKORG, MVR.VKBUR, (CASE WHEN SUM(MVT.REV) IS NULL THEN 0 ELSE SUM(MVT.REV)END) AS REV FROM MV_REVENUE MVR
		LEFT JOIN (
		select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN(".$opco.") AND BUDAT = TO_DATE('".$thn."/".$bln."', 'YYYY/MM') AND MATERIAL IN('121-200') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
		) MVT
		ON MVR.VKBUR = MVT.VKBUR
		WHERE MVR.VKORG IN (".$opco.") AND MVR.VKBUR_TXT IS NOT NULL AND REV != 0 GROUP BY MVR.VKBUR_TXT, MVR.VKBUR ORDER BY REV DESC";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

    public function get_prov_by_opco_and_material($opco,$bln,$thn){
		// $tgl = date('Y/m');
		$sql = "SELECT MVR.VKBUR_TXT, '".$opco."' AS VKORG, MVR.VKBUR, (CASE WHEN SUM(MVT.REV) IS NULL THEN 0 ELSE SUM(MVT.REV)END) AS REV, MVR.material, MVR.NAMA_MATERIAL FROM MV_REVENUE MVR
		LEFT JOIN (
		select VKBUR_TXT, VKORG, VKBUR, SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN(".$opco.") AND BUDAT = TO_DATE('".$thn."/".$bln."', 'YYYY/MM') GROUP BY VKBUR_TXT, VKORG, VKBUR ORDER BY REV DESC
		) MVT
		ON MVR.VKBUR = MVT.VKBUR
		WHERE MVR.VKORG IN (".$opco.") AND MVR.VKBUR_TXT IS NOT NULL AND REV != 0 GROUP BY MVR.VKBUR_TXT, MVR.VKBUR, MVR.material, MVR.NAMA_MATERIAL ORDER BY REV DESC";
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

	public function data_prov_and_material($comp, $prov, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$data = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD') AND MATERIAL in('121-200')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD') AND MATERIAL in('121-200')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN($comp) AND VKBUR_TXT = '$prov' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD') AND MATERIAL in('121-200')");
		return $data->result_array();
	}

	// 27-11-2017
	// public function get_data_comp($comp, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
	// 	$data = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN ($comp) AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
	// 	UNION ALL
	// 	select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN ($comp) AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
	// 	UNION ALL
	// 	select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKORG IN ($comp) AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
	// 	return $data->result_array();
	// }

	public function get_data_comp($comp, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$sql = "SELECT
				(SELECT SUM (QTY) AS QTY_SCM FROM ZREPORT_SCM_REAL_SALES WHERE TAHUN = '$thn' AND BULAN = '$bln' AND HARI = '$tgl_rel' AND ORG in ($comp)) AS VOL,
				SUM(TOTAL_QTY) AS VOL2,
				SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE,
				SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA,
				SUM(REVENUE) AS REV
			FROM MV_REVENUE
			WHERE VKORG IN ($comp)
			AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
			GROUP BY BUDAT
			UNION ALL
			SELECT
				(SELECT SUM (QTY) AS QTY_SCM FROM ZREPORT_SCM_REAL_SALES WHERE TAHUN = '$thn' AND BULAN = '$bln' AND ORG in ($comp)) AS VOL,
				SUM(TOTAL_QTY) AS VOL2,
				SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE,
				SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA,
				SUM(REVENUE) AS REV from MV_REVENUE
			WHERE VKORG IN ($comp)
			AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD')
			AND BUDAT <= TO_DATE('$tgl_now', 'YYYY/MM/DD')
			GROUP BY TO_CHAR(BUDAT, 'MMYYYY')
			UNION ALL
			SELECT
				(SELECT SUM (QTY) AS QTY_SCM FROM ZREPORT_SCM_REAL_SALES WHERE TAHUN = '$thn' AND ORG in ($comp)) AS VOL,
				SUM(TOTAL_QTY) AS VOL2,
				SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE,
				SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA,
				SUM(REVENUE) AS REV
			FROM MV_REVENUE
			WHERE VKORG IN ($comp)
			AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD')
			AND BUDAT <= TO_DATE('$tgl_now', 'YYYY/MM/DD')
			GROUP BY TO_CHAR(BUDAT, 'YYYY')";
		$data = $this->db->query($sql);
		return $data->result_array();	
	}

	function get_rkap_bulanan_company_6000($opco,  $thn, $bln)
	{
		$sql = "SELECT (
							SELECT SUM (RKAP) FROM (
								SELECT SUM (quantum) AS RKAP FROM sap_t_rencana_sales_type
								WHERE CO NOT IN ('$opco')
								AND thn = '$thn'
								AND bln = '$bln'
								
								UNION ALL
								SELECT SUM (target) AS RKAP
								FROM ZREPORT_TARGET_PLANTSCO
								WHERE org = '$opco'
								AND DELETE_MARK = '0'
								AND JENIS IS NULL
								AND BULAN = '$bln'
								AND TAHUN = '$thn'
							)
						) AS RKAP_TON,
						(
							SELECT SUM (REVENUE)
							FROM sap_t_rencana_sales_type
							WHERE PROV NOT IN ('1092', '0001')
							AND thn = '$thn'
							AND bln = '$bln'
						) AS RKAP_REV 
							FROM DUAL

						UNION ALL
						SELECT (
							SELECT SUM (RKAP) FROM (
								SELECT SUM (quantum) AS RKAP FROM sap_t_rencana_sales_type
								WHERE CO NOT IN ('$opco')
								AND thn = '$thn'
								
								UNION ALL
								SELECT SUM (target) AS RKAP
								FROM ZREPORT_TARGET_PLANTSCO
								WHERE org = '$opco'
								AND DELETE_MARK = '0'
								AND JENIS IS NULL
								AND TAHUN = '$thn'
							)
						) AS RKAP_TON,
						(
							SELECT SUM (REVENUE)
							FROM sap_t_rencana_sales_type
							WHERE PROV NOT IN ('1092', '0001')
							AND thn = '$thn'
						) AS RKAP_REV 
						FROM DUAL";
				$data = $this->db->query($sql);
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

	public function total($tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$data = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')");
		return $data->result_array();
	}


		function total_bulan($tgl_now, $tgl_rel, $bln, $thn, $tgl_last)
		{
			$sql ="SELECT
				NVL((SELECT sum(\"qty\") FROM ZREPORT_REAL_ST_ADJ WHERE \"tahun\" = '$thn' AND \"bulan\" = '$bln'), 0) + 
				(SELECT SUM (QTY) AS QTY_SCM FROM ZREPORT_SCM_REAL_SALES WHERE TAHUN = '$thn' AND BULAN = '$bln') AS VOL,
				SUM(TOTAL_QTY) AS VOL2,
				SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE,
				SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA,
				SUM(REVENUE) AS REV
			FROM MV_REVENUE
			WHERE BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD')
			AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD')
			GROUP BY TO_CHAR(BUDAT, 'MMYYYY')";
			$data = $this->db->query($sql);
			return $data->result_array();
		}
	/**
	 * [total_ac_volume description] 
	 * @param  [type] $tgl_now  [description]
	 * @param  [type] $tgl_rel  [description]
	 * @param  [type] $bln      [description]
	 * @param  [type] $thn      [description]
	 * @param  [type] $tgl_last [description]
	 * @return [type]           [description]
	 */
	public function total_ac_volume($tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$sql = "select '1' as URUT,'HARIAN' as TIPE,sum(qty) as TOTAL from ZREPORT_SCM_REAL_SALES
									where tahun='".$thn."' and bulan='".$bln."' and hari='".$tgl_now."' 
									UNION
									select '2' as URUT,'BULANAN' as TIPE, sum(qty) as TOTAL from ZREPORT_SCM_REAL_SALES
									where tahun='".$thn."' and bulan='".$bln."'
									UNION
									select '3' as URUT,'TAHUNAN' as TIPE, sum(qty) as TOTAL from ZREPORT_SCM_REAL_SALES
									where tahun='".$thn."'
									order by 1 asc
									";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	function RKAP_SMIG($thn,$bln,$tgl_last)
	{
		$sql = "select '1' as URUT,'HARIAN' as TIPE,sum(QUANTUM)/".$tgl_last." as TOTAL from SAP_T_RENCANA_SALES_TYPE
				where THN='".$thn."' and BLN='".$bln."'
				UNION
				select '2' as URUT,'BULANAN' as TIPE,sum(QUANTUM) as TOTAL from SAP_T_RENCANA_SALES_TYPE
				where THN='".$thn."' and BLN='".$bln."'
				UNION
				select '3' as URUT,'TAHUNAN' as TIPE,sum(QUANTUM) as TOTAL from SAP_T_RENCANA_SALES_TYPE
				where THN='".$thn."' order by 1 asc";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function total_clinker($tgl_now, $tgl_rel, $bln, $thn, $tgl_last){
		$data = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD') AND MATERIAL IN('	')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD') AND MATERIAL IN('121-200')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD') AND MATERIAL IN('121-200')");
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
    
	public function get_rkap_bulanan_prov_and_material($comp, $prov, $thn, $bln, $material){
		$data= $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM IN($comp) and PROPINSI = '$prov' and TAHUN = '$thn' and BULAN = '$bln' and PRODUK = '$material'
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM
		order BY TAHUN,BULAN,COM DESC)
		WHERE COM IN($comp) and PROPINSI = '$prov' and TAHUN = '$thn' and PRODUK = '$material' ");
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
		$query = $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
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
		$query = $this->db->query("select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKBUR = '$prov' AND BUDAT = TO_DATE('$tgl_now', 'YYYY/MM/DD') AND MATERIAL NOT IN('121-200')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKBUR = '$prov' AND BUDAT >= TO_DATE('$thn/$bln/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_rel', 'YYYY/MM/DD') AND MATERIAL NOT IN('121-200')
		UNION ALL
		select SUM(TOTAL_QTY) AS VOL, SUM(PENJUALAN)/SUM(TOTAL_QTY) AS PRICE, SUM(PENJUALAN) AS TOTALSALES, SUM(OA) AS OA, SUM(REVENUE) AS REV from MV_REVENUE WHERE VKBUR = '$prov' AND BUDAT >= TO_DATE('$thn/01/01', 'YYYY/MM/DD') AND BUDAT <= TO_DATE('$thn/$bln/$tgl_last', 'YYYY/MM/DD') AND MATERIAL NOT IN('121-200')");
		return $query->result_array();
	}
	public function get_data_prov_rkap_bln_prov($prov, $thn, $bln){
		$query = $this->db->query("SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM WHERE TIPE IN('121-200')
		order BY TAHUN,BULAN,COM DESC)
		WHERE PROPINSI = '$prov' and TAHUN = '$thn' and BULAN = '$bln' 
		union ALL
		SELECT (case when sum(TARGET_RKAP) is null then 0 else sum(TARGET_RKAP)END) as rkap_ton, (case when sum(REVENU_RKAP) is null then 0 else sum(REVENU_RKAP) END) as rkap_rev from(select COM,PROPINSI,TIPE,(CASE TIPE WHEN '121-301' then 'ZAK' WHEN '121-302' THEN 'Curah' 
		WHEN '121-200' THEN 'Clinker' end) as PRODUK,TAHUN,BULAN,TARGET_RKAP,REVENU_RKAP FROM ZREPORT_RPTREAL_RESUM WHERE TIPE IN('121-200')
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

	function rkap_thanglong()
	{
		$sql= "SELECT SUM(target)/30 AS RKAP
			FROM ZREPORT_TARGET_PLANTSCO
			WHERE org = '6000'
			AND DELETE_MARK = '0'
			AND JENIS IS NULL
			AND BULAN = '$bln'
			AND TAHUN = '$thn'
			union 
			SELECT SUM (target) AS RKAP
						FROM ZREPORT_TARGET_PLANTSCO
						WHERE org = '6000'
						AND DELETE_MARK = '0'
						AND JENIS IS NULL
						AND BULAN = '$bln'
						AND TAHUN = '$thn'
			union
			SELECT SUM (target) AS RKAP
						FROM ZREPORT_TARGET_PLANTSCO
						WHERE org = '6000'
						AND DELETE_MARK = '0'
						AND JENIS IS NULL
						AND TAHUN = '$thn'";
		return $this->db->query($sql)->result_array();
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}