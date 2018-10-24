<?php
class harga_tebus_data extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->bpc = $this->load->database('bpc', TRUE);
		$this->devsd = $this->load->database('devsd', TRUE);
	}
    
    
    public function get_data_harga_tebus_SP($thn,$distrik,$material,$propinsi,$org,$incoterm){
        $date = date('Y');
        //$org='7000';
        if($thn==null || $thn ==''){
            $thn1="AND TO_CHAR(MOD.FKDAT,'YYYY') = '$date'";
        }
        else{
            $thn1="AND TO_CHAR(MOD.FKDAT,'YYYY') = '$thn'";
        }
        if($distrik==null || $distrik == ''){
            $distrik1="";
        }
        else{
            $distrik1="AND MOD.BZIRK = '$distrik'";
        }
        if($material==null || $material==''){
            $material1="";
        }
        else{
            $material1="AND MOD.MATNR = '$material'";
        }
        if($propinsi==null || $propinsi==''){
            $propinsi1="";
        }
        else{
            $propinsi1="AND MOD.VKBUR='$propinsi'";
        }
        if($org==null || $org==''){
            $org1="AND MOD.VKORG in ('3000')";
        }
        else{
            $org1="AND MOD.VKORG in ('$org')";
        }
        
		$query = $this->devsd->query("SELECT CAST(SUM(MOD.NET)/NVL(SUM(MOD.LFIMG),1) AS INTEGER)HARGA,MOD.MATNR AS ITEM_NO,MOD.ARKTX AS PRODUK,MOD.BZIRK,
                    MOD.BZTXT AS NAMA_KOTA,MOD.VKBUR AS KD_PROPINSI,MOD.INCO1 AS INCOTERM,TO_CHAR(MOD.FKDAT,'YYYYMM') AS BULAN, KT.KD_KOTA, KT.NM_KOTA
                    FROM ZREPORT_ONGKOSANGKUT_MOD MOD
                    LEFT JOIN ZREPORT_M_KOTA KT ON KT.KD_KOTA = MOD.BZIRK
                    WHERE ( (MOD.LFART <>'ZNL' AND
                    (MOD.MATNR LIKE '121-301%' AND MOD.MATNR NOT IN ('121-301-0240','121-301-0350','121-301-0351') )) ) 
                    AND MOD.KUNAG LIKE '00000%'
                    AND MOD.NETWR<>0
                    AND MOD.INCO1 = '$incoterm'
                    $thn1 $distrik1 $material1 $propinsi1 $org1
                    GROUP BY MOD.MATNR,MOD.ARKTX,MOD.BZIRK,MOD.BZTXT,MOD.VKBUR,MOD.INCO1,
                    TO_CHAR(MOD.FKDAT,'YYYYMM'), KT.KD_KOTA, KT.NM_KOTA
                    ");
		return $query->result_array();
	}
    
    public function get_material_SP($thn,$org,$propinsi){
        $thn = date('Y');
        //$org = '7000';
		$query = $this->devsd->query("SELECT DISTINCT MOD.MATNR, M.MATNR AS KODE_PRODUK, M.ARKTX AS NAMA_PRODUK FROM ZREPORT_ONGKOSANGKUT_MOD MOD
                    LEFT JOIN ZREPORT_M_MATERIAL M ON M.MATNR = MOD.MATNR
                    WHERE ( (MOD.LFART <>'ZNL' AND
                    (MOD.MATNR LIKE '121-301%' AND MOD.MATNR NOT IN ('121-301-0240','121-301-0350','121-301-0351') )) ) 
                    --AND MOD.ADD01 <> 'S11LO'
                    AND MOD.KUNAG LIKE '00000%'
                    AND MOD.NETWR<>0
                    AND MOD.VKBUR='$propinsi'
                    AND MOD.VKORG in ('$org')
                    AND TO_CHAR(MOD.FKDAT,'YYYY') = '$thn'
                    ");
		return $query->result_array();
	}
    
    public function get_kota_SP($thn,$org,$propinsi){
        $thn = date('Y');
        //$org = '7000';
        if($propinsi==null || $propinsi==''){
            $propinsi1="";
        }
        else{
            $propinsi1="AND MOD.VKBUR='$propinsi'";
        }
		$query = $this->devsd->query("SELECT MOD.VKBUR
                AS
                KD_PROPINSI, KT.KD_KOTA AS KOTA, KT.NM_KOTA
                FROM ZREPORT_ONGKOSANGKUT_MOD MOD 
                LEFT JOIN ZREPORT_M_KOTA KT ON KT.KD_KOTA = MOD.BZIRK 
                
                WHERE ( (MOD.LFART <>'ZNL' AND (MOD.MATNR LIKE '121-301%' 
                AND MOD.MATNR NOT IN ('121-301-0240','121-301-0350','121-301-0351') )) ) 
                AND 
                MOD.KUNAG LIKE '00000%' 
                AND MOD.NETWR<>0 
                $propinsi1
                AND TO_CHAR(MOD.FKDAT,'YYYY') = '$thn' AND MOD.VKORG IN ('$org')  and MOD.NETWR != 0 
                and MOD.NETWR is not null
                GROUP BY MOD.VKBUR, KT.KD_KOTA, KT.NM_KOTA");
		return $query->result_array();
	}
    
    public function get_province_SP($thn,$org){
        $thn = date('Y');
        //$org = '7000';
		$query = $this->devsd->query("SELECT MOD.VKBUR AS KD_PROPINSI, INITCAP(MP.KD_PROV) AS KODE_PROP, INITCAP(MP.NM_PROV_1) AS NAMA_PROP
            FROM ZREPORT_ONGKOSANGKUT_MOD MOD 
            LEFT JOIN ZREPORT_M_PROVINSI MP ON MP.KD_PROV = MOD.VKBUR 
            WHERE ( (MOD.LFART <>'ZNL' AND (MOD.MATNR LIKE '121-301%' AND MOD.MATNR NOT IN ('121-301-0240','121-301-0350','121-301-0351') )) ) 
            AND MOD.KUNAG LIKE '00000%' AND MOD.NETWR<>0  
            AND TO_CHAR(MOD.FKDAT,'YYYY') = '$thn' 
            AND MOD.VKORG IN ('$org') and MOD.NETWR != 0 and MOD.NETWR is not null GROUP BY MOD.VKBUR, MP.KD_PROV, MP.NM_PROV_1");
		return $query->result_array();
	}
    
    public function get_MIN_data_harga_tebus_SP($thn,$distrik,$material,$propinsi,$org,$incoterm){
        $date = date('Y');
        //$org='7000';
        if($thn==null || $thn ==''){
            $thn1="AND TO_CHAR(MOD.FKDAT,'YYYY') = '$date'";
        }
        else{
            $thn1="AND TO_CHAR(MOD.FKDAT,'YYYY') = '$thn'";
        }
        if($distrik==null || $distrik == ''){
            $distrik1="";
        }
        else{
            $distrik1="AND MOD.BZIRK = '$distrik'";
        }
        if($material==null || $material==''){
            $material1="";
        }
        else{
            $material1="AND MOD.MATNR = '$material'";
        }
        if($propinsi==null || $propinsi==''){
            $propinsi1="";
        }
        else{
            $propinsi1="AND MOD.VKBUR='$propinsi'";
        }
        if($org==null || $org==''){
            $org1="AND MOD.VKORG in ('3000')";
        }
        else{
            $org1="AND MOD.VKORG in ('$org')";
        }
        
		$query = $this->devsd->query("SELECT MIN(DATA.HARGA) AS HARGA, DATA.ITEM_NO, DATA.PRODUK,DATA.KD_PROPINSI, DATA.INCOTERM,
                    TO_CHAR(TO_DATE(DATA.BULAN,'YYYYMMDD'),'YYYYMM') AS BULAN, DATA.KD_KOTA, DATA.NM_KOTA
                    FROM(
                    SELECT CAST(SUM(MOD.NET)/NVL(SUM(MOD.LFIMG),1) AS INTEGER)HARGA,MOD.MATNR AS ITEM_NO,MOD.ARKTX AS PRODUK,MOD.BZIRK,
                    MOD.BZTXT AS NAMA_KOTA,MOD.VKBUR AS KD_PROPINSI,MOD.INCO1 AS INCOTERM,TO_CHAR(MOD.FKDAT,'YYYYMM') AS BULAN, KT.KD_KOTA, KT.NM_KOTA
                    FROM ZREPORT_ONGKOSANGKUT_MOD MOD
                    LEFT JOIN ZREPORT_M_KOTA KT ON KT.KD_KOTA = MOD.BZIRK
                    WHERE ( (MOD.LFART <>'ZNL' AND
                    (MOD.MATNR LIKE '121-301%' AND MOD.MATNR NOT IN ('121-301-0240','121-301-0350','121-301-0351') )) ) 
                    AND MOD.KUNAG LIKE '00000%'
                    AND MOD.NETWR<>0
                    AND MOD.INCO1 = '$incoterm'
                    $thn1 $distrik1 $material1 $propinsi1 $org1
                    GROUP BY MOD.MATNR,MOD.ARKTX,MOD.BZIRK,MOD.BZTXT,MOD.VKBUR,MOD.INCO1,
                    TO_CHAR(MOD.FKDAT,'YYYYMM'), KT.KD_KOTA, KT.NM_KOTA) DATA
                    
                    GROUP BY
                    DATA.ITEM_NO, DATA.PRODUK,
                    DATA.KD_PROPINSI, DATA.INCOTERM,
                    TO_CHAR(TO_DATE(DATA.BULAN,'YYYYMMDD'),'YYYYMM'), DATA.KD_KOTA, DATA.NM_KOTA
                    ");
		return $query->result_array();
	}
    
    public function get_MAX_data_harga_tebus_SP($thn,$distrik,$material,$propinsi,$org,$incoterm){
        $date = date('Y');
        //$org='7000';
        if($thn==null || $thn ==''){
            $thn1="AND TO_CHAR(MOD.FKDAT,'YYYY') = '$date'";
        }
        else{
            $thn1="AND TO_CHAR(MOD.FKDAT,'YYYY') = '$thn'";
        }
        if($distrik==null || $distrik == ''){
            $distrik1="";
        }
        else{
            $distrik1="AND MOD.BZIRK = '$distrik'";
        }
        if($material==null || $material==''){
            $material1="";
        }
        else{
            $material1="AND MOD.MATNR = '$material'";
        }
        if($propinsi==null || $propinsi==''){
            $propinsi1="";
        }
        else{
            $propinsi1="AND MOD.VKBUR='$propinsi'";
        }
        if($org==null || $org==''){
            $org1="AND MOD.VKORG in ('3000')";
        }
        else{
            $org1="AND MOD.VKORG in ('$org')";
        }
        
		$query = $this->devsd->query("SELECT MAX(DATA.HARGA) AS HARGA, DATA.ITEM_NO, DATA.PRODUK,DATA.KD_PROPINSI, DATA.INCOTERM,
                    TO_CHAR(TO_DATE(DATA.BULAN,'YYYYMMDD'),'YYYYMM') AS BULAN, DATA.KD_KOTA, DATA.NM_KOTA
                    FROM(
                    SELECT CAST(SUM(MOD.NET)/NVL(SUM(MOD.LFIMG),1) AS INTEGER)HARGA,MOD.MATNR AS ITEM_NO,MOD.ARKTX AS PRODUK,MOD.BZIRK,
                    MOD.BZTXT AS NAMA_KOTA,MOD.VKBUR AS KD_PROPINSI,MOD.INCO1 AS INCOTERM,TO_CHAR(MOD.FKDAT,'YYYYMM') AS BULAN, KT.KD_KOTA, KT.NM_KOTA
                    FROM ZREPORT_ONGKOSANGKUT_MOD MOD
                    LEFT JOIN ZREPORT_M_KOTA KT ON KT.KD_KOTA = MOD.BZIRK
                    WHERE ( (MOD.LFART <>'ZNL' AND
                    (MOD.MATNR LIKE '121-301%' AND MOD.MATNR NOT IN ('121-301-0240','121-301-0350','121-301-0351') )) ) 
                    AND MOD.KUNAG LIKE '00000%'
                    AND MOD.NETWR<>0
                    AND MOD.INCO1 = '$incoterm'
                    $thn1 $distrik1 $material1 $propinsi1 $org1
                    GROUP BY MOD.MATNR,MOD.ARKTX,MOD.BZIRK,MOD.BZTXT,MOD.VKBUR,MOD.INCO1,
                    TO_CHAR(MOD.FKDAT,'YYYYMM'), KT.KD_KOTA, KT.NM_KOTA) DATA
                    
                    GROUP BY
                    DATA.ITEM_NO, DATA.PRODUK,
                    DATA.KD_PROPINSI, DATA.INCOTERM,
                    TO_CHAR(TO_DATE(DATA.BULAN,'YYYYMMDD'),'YYYYMM'), DATA.KD_KOTA, DATA.NM_KOTA
                    ");
		return $query->result_array();
	}
    
    public function get_MEDIAN_data_harga_tebus_SP($thn,$distrik,$material,$propinsi,$org,$incoterm){
        $date = date('Y');
        //$org='7000';
        if($thn==null || $thn ==''){
            $thn1="AND TO_CHAR(MOD.FKDAT,'YYYY') = '$date'";
        }
        else{
            $thn1="AND TO_CHAR(MOD.FKDAT,'YYYY') = '$thn'";
        }
        if($distrik==null || $distrik == ''){
            $distrik1="";
        }
        else{
            $distrik1="AND MOD.BZIRK = '$distrik'";
        }
        if($material==null || $material==''){
            $material1="";
        }
        else{
            $material1="AND MOD.MATNR = '$material'";
        }
        if($propinsi==null || $propinsi==''){
            $propinsi1="";
        }
        else{
            $propinsi1="AND MOD.VKBUR='$propinsi'";
        }
        if($org==null || $org==''){
            $org1="AND MOD.VKORG in ('3000')";
        }
        else{
            $org1="AND MOD.VKORG in ('$org')";
        }
        
		$query = $this->devsd->query("SELECT MEDIAN(DATA.HARGA) AS HARGA, DATA.ITEM_NO, DATA.PRODUK,DATA.KD_PROPINSI, DATA.INCOTERM,
                    TO_CHAR(TO_DATE(DATA.BULAN,'YYYYMMDD'),'YYYYMM') AS BULAN, DATA.KD_KOTA, DATA.NM_KOTA
                    FROM(
                    SELECT CAST(SUM(MOD.NET)/NVL(SUM(MOD.LFIMG),1) AS INTEGER)HARGA,MOD.MATNR AS ITEM_NO,MOD.ARKTX AS PRODUK,MOD.BZIRK,
                    MOD.BZTXT AS NAMA_KOTA,MOD.VKBUR AS KD_PROPINSI,MOD.INCO1 AS INCOTERM,TO_CHAR(MOD.FKDAT,'YYYYMM') AS BULAN, KT.KD_KOTA, KT.NM_KOTA
                    FROM ZREPORT_ONGKOSANGKUT_MOD MOD
                    LEFT JOIN ZREPORT_M_KOTA KT ON KT.KD_KOTA = MOD.BZIRK
                    WHERE ( (MOD.LFART <>'ZNL' AND
                    (MOD.MATNR LIKE '121-301%' AND MOD.MATNR NOT IN ('121-301-0240','121-301-0350','121-301-0351') )) ) 
                    AND MOD.KUNAG LIKE '00000%'
                    AND MOD.NETWR<>0
                    AND MOD.INCO1 = '$incoterm'
                    $thn1 $distrik1 $material1 $propinsi1 $org1
                    GROUP BY MOD.MATNR,MOD.ARKTX,MOD.BZIRK,MOD.BZTXT,MOD.VKBUR,MOD.INCO1,
                    TO_CHAR(MOD.FKDAT,'YYYYMM'), KT.KD_KOTA, KT.NM_KOTA) DATA
                    
                    GROUP BY
                    DATA.ITEM_NO, DATA.PRODUK,
                    DATA.KD_PROPINSI, DATA.INCOTERM,
                    TO_CHAR(TO_DATE(DATA.BULAN,'YYYYMMDD'),'YYYYMM'), DATA.KD_KOTA, DATA.NM_KOTA
                    ");
		return $query->result_array();
	}



}

?>