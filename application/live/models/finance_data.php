<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class finance_data extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->db = $this->load->database('bpc', true);
    }
    
    public function get_data_Opco(){
        $sql = "SELECT COMPANY, DESCRIPTION FROM M_COMPANY WHERE PARENTH2='GCEMENT'
                ORDER BY COMPANY ASC";
        $result = $this->db->query($sql);
		return $result->result_array();                
    }
    
    public function get_data_bank_smig($tgl){
        /*$sql = "SELECT DATA.DESCRIPTION, SUM(DATA.JUMLAH) AS JUMLAH_DATA,DATA.HKONT FROM (SELECT
                	 KA.DESCRIPTION, SUM(KA.JUMLAH) * NVL(MER.UKURS,1) AS JUMLAH,  MB.HKONT
                FROM
                	(
                		SELECT
                			BNKKO,
                			MG.DESCRIPTION,
                			DISPW,
                			--EBENE,
                			DATUM AS TANGGAL,
                			SUM (WRSHB) AS JUMLAH
                		FROM
                			FDSB FB
                		LEFT JOIN M_GL_ACCOUNT MG ON MG.GL_ACCOUNT = SUBSTR(FB.BNKKO, -8, 8)
                		WHERE
                			DATUM <= '".$tgl."'
                		--AND EBENE = 'RG'
                		--AND BUKRS = '5000'
                		--AND DISPW = 'IDR'
                		GROUP BY
                			BNKKO,
                			MG.DESCRIPTION,
                			DISPW,
                			--EBENE,
                			DATUM
                		--ORDER BY
                			--EBENE
                	) KA
                  
                INNER JOIN M_BANK MB ON MB.HKONT = SUBSTR(KA.BNKKO, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON KA.DISPW = MER.FCURR
                AND KA.TANGGAL = MER.GDATU
                GROUP BY  KA.DESCRIPTION, MER.UKURS, MB.HKONT) DATA
                GROUP BY DATA.DESCRIPTION,DATA.HKONT
                ORDER BY DATA.HKONT ASC";*/
                
                
                //==========CARI GROUP ID BANK
        $sql = "SELECT  SUM(DATA.JUMLAH) AS JUMLAH_DATA, DATA.HBKID FROM (SELECT
                	 KA.DESCRIPTION, SUM(KA.JUMLAH) * NVL(MER.UKURS,1) AS JUMLAH,  MB.HKONT, MB.HBKID
                FROM
                	(
                		SELECT
                			BNKKO,
                			MG.DESCRIPTION,
                			DISPW,
                			--EBENE,
                			DATUM AS TANGGAL,
                			SUM (WRSHB) AS JUMLAH
                		FROM
                			FDSB FB
                		LEFT JOIN M_GL_ACCOUNT MG ON MG.GL_ACCOUNT = SUBSTR(FB.BNKKO, -8, 8)
                		WHERE
                			DATUM <= '".$tgl."'
                		GROUP BY
                			BNKKO,
                			MG.DESCRIPTION,
                			DISPW,
                			DATUM
                	) KA
                  
                INNER JOIN M_BANK MB ON MB.HKONT = SUBSTR(KA.BNKKO, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON KA.DISPW = MER.FCURR
                AND KA.TANGGAL = MER.GDATU
                GROUP BY  KA.DESCRIPTION, MER.UKURS, MB.HKONT, MB.HBKID) DATA
                GROUP BY  DATA.HBKID";
        $result = $this->db->query($sql);
		return $result->result_array();
    }
    
    
    public function get_data_bank_opco($tgl,$org){
        /*$sql = "SELECT DATA.DESCRIPTION, SUM(DATA.JUMLAH) AS JUMLAH_DATA,DATA.HKONT FROM (SELECT
                	 KA.DESCRIPTION, SUM(KA.JUMLAH) * NVL(MER.UKURS,1) AS JUMLAH,  MB.HKONT
                FROM
                	(
                		SELECT
                			BNKKO,
                			MG.DESCRIPTION,
                			DISPW,
                			--EBENE,
                			DATUM AS TANGGAL,
                			SUM (WRSHB) AS JUMLAH
                		FROM
                			FDSB FB
                		LEFT JOIN M_GL_ACCOUNT MG ON MG.GL_ACCOUNT = SUBSTR(FB.BNKKO, -8, 8)
                		WHERE
                			DATUM <= '".$tgl."'
                		--AND EBENE = 'RG'
                		AND BUKRS = '".$org."'
                		GROUP BY
                			BNKKO,
                			MG.DESCRIPTION,
                			DISPW,
                			--EBENE,
                			DATUM
                		--ORDER BY
                			--EBENE
                	) KA
                  
                INNER JOIN M_BANK MB ON MB.HKONT = SUBSTR(KA.BNKKO, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON KA.DISPW = MER.FCURR
                AND KA.TANGGAL = MER.GDATU
                GROUP BY  KA.DESCRIPTION, MER.UKURS, MB.HKONT) DATA
                GROUP BY DATA.DESCRIPTION,DATA.HKONT
                ORDER BY DATA.HKONT ASC";*/
        $sql    = "SELECT  SUM(DATA.JUMLAH) AS JUMLAH_DATA, DATA.HBKID FROM (SELECT
                	 KA.DESCRIPTION, SUM(KA.JUMLAH) * NVL(MER.UKURS,1) AS JUMLAH,  MB.HKONT, MB.HBKID
                FROM
                	(
                		SELECT
                			BNKKO,
                			MG.DESCRIPTION,
                			DISPW,
                			--EBENE,
                			DATUM AS TANGGAL,
                			SUM (WRSHB) AS JUMLAH
                		FROM
                			FDSB FB
                		LEFT JOIN M_GL_ACCOUNT MG ON MG.GL_ACCOUNT = SUBSTR(FB.BNKKO, -8, 8)
                		WHERE
                			DATUM <= '".$tgl."'
                		AND BUKRS = '".$org."'
                		GROUP BY
                			BNKKO,
                			MG.DESCRIPTION,
                			DISPW,
                			DATUM
                	) KA
                  
                INNER JOIN M_BANK MB ON MB.HKONT = SUBSTR(KA.BNKKO, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON KA.DISPW = MER.FCURR
                AND KA.TANGGAL = MER.GDATU
                GROUP BY  KA.DESCRIPTION, MER.UKURS, MB.HKONT, MB.HBKID) DATA
                GROUP BY DATA.HBKID";
        $result = $this->db->query($sql);
		return $result->result_array();
    }
    
    public function get_CashOnHandSmig($tgl_now,$bln,$thn){
        $sql="SELECT SUM(DATA.JUMLAH) AS CASH_ON_HAND, DATA.JENIS, DATA.FLAG FROM (
                SELECT SUM(PK.HSL) AS CASH, PK.RWCUR, TO_DATE(PK.BUDAT,'dd-mm-yyyy') AS TGL, pk.budat, MER.GDATU, MER.FCURR,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, MER.UKURS, 'TO DAY' AS JENIS, '1' AS FLAG
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND 
                PK.BUDAT BETWEEN TO_DATE('".$tgl_now."','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                GROUP BY PK.RWCUR, PK.BUDAT, MER.GDATU, MER.FCURR,MER.UKURS, MER.UKURS  
                ) DATA
                GROUP BY DATA.JENIS, DATA.FLAG
                
                UNION
                SELECT SUM(DATA.JUMLAH) AS CASH_ON_HAND, DATA.JENIS, DATA.FLAG FROM (
                SELECT SUM(PK.HSL) AS CASH, PK.RWCUR, TO_DATE(PK.BUDAT,'dd-mm-yyyy') AS TGL, pk.budat, MER.GDATU, MER.FCURR,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, MER.UKURS, 'TO MONTH' AS JENIS, '2' AS FLAG
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND 
                PK.BUDAT BETWEEN TO_DATE('01-$bln-$thn','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                GROUP BY PK.RWCUR, PK.BUDAT, MER.GDATU, MER.FCURR,MER.UKURS, MER.UKURS  
                ) DATA
                GROUP BY DATA.JENIS, DATA.FLAG
                
                UNION
                SELECT SUM(DATA.JUMLAH) AS CASH_ON_HAND, DATA.JENIS, DATA.FLAG FROM (
                SELECT SUM(PK.HSL) AS CASH, PK.RWCUR, TO_DATE(PK.BUDAT,'dd-mm-yyyy') AS TGL, pk.budat, MER.GDATU, MER.FCURR,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, MER.UKURS, 'TO YEAR' AS JENIS, '3' AS FLAG
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND 
                PK.BUDAT BETWEEN TO_DATE('01-01-$thn','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                GROUP BY PK.RWCUR, PK.BUDAT, MER.GDATU, MER.FCURR,MER.UKURS, MER.UKURS  
                ) DATA
                GROUP BY DATA.JENIS, DATA.FLAG";
        $result = $this->db->query($sql);
		return $result->result_array();
    }
    
    public function get_CashOnHandOpco($tgl_now,$bln,$thn){
        $sql="SELECT SUM(DATA.JUMLAH) AS CASH_ON_HAND, DATA.JENIS, DATA.FLAG FROM (
                SELECT SUM(PK.HSL) AS CASH, PK.RWCUR, TO_DATE(PK.BUDAT,'dd-mm-yyyy') AS TGL, pk.budat, MER.GDATU, MER.FCURR,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, MER.UKURS, 'TO DAY' AS JENIS, '1' AS FLAG
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND PK.RBUKRS = '".$org."' AND
                PK.BUDAT BETWEEN TO_DATE('".$tgl_now."','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                GROUP BY PK.RWCUR, PK.BUDAT, MER.GDATU, MER.FCURR,MER.UKURS, MER.UKURS  
                ) DATA
                GROUP BY DATA.JENIS, DATA.FLAG
                
                UNION
                SELECT SUM(DATA.JUMLAH) AS CASH_ON_HAND, DATA.JENIS, DATA.FLAG FROM (
                SELECT SUM(PK.HSL) AS CASH, PK.RWCUR, TO_DATE(PK.BUDAT,'dd-mm-yyyy') AS TGL, pk.budat, MER.GDATU, MER.FCURR,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, MER.UKURS, 'TO MONTH' AS JENIS, '2' AS FLAG
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND PK.RBUKRS = '".$org."' AND
                PK.BUDAT BETWEEN TO_DATE('01-$bln-$thn','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                GROUP BY PK.RWCUR, PK.BUDAT, MER.GDATU, MER.FCURR,MER.UKURS, MER.UKURS  
                ) DATA
                GROUP BY DATA.JENIS, DATA.FLAG
                
                UNION
                SELECT SUM(DATA.JUMLAH) AS CASH_ON_HAND, DATA.JENIS, DATA.FLAG FROM (
                SELECT SUM(PK.HSL) AS CASH, PK.RWCUR, TO_DATE(PK.BUDAT,'dd-mm-yyyy') AS TGL, pk.budat, MER.GDATU, MER.FCURR,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, MER.UKURS, 'TO YEAR' AS JENIS, '3' AS FLAG
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND PK.RBUKRS = '".$org."' AND
                PK.BUDAT BETWEEN TO_DATE('01-01-$thn','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                GROUP BY PK.RWCUR, PK.BUDAT, MER.GDATU, MER.FCURR,MER.UKURS, MER.UKURS  
                ) DATA
                GROUP BY DATA.JENIS, DATA.FLAG";
        $result = $this->db->query($sql);
		return $result->result_array();
    }
    
    public function get_data_AR_smig($tgl_now,$bln,$thn){
        $sql = "SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG FROM (Select AR.currency_key,MER.FCURR,SUM( AR.amount_lcl_2) * NVL(MER.UKURS,1) AS JUMLAH,
                'TO DAY' AS JENIS, '1' AS FLAG
                from zcfi0015 AR 
                LEFT JOIN M_EXCHANGE_RATE MER ON AR.currency_key = MER.FCURR
                AND to_date(AR.net_due_date,'yyyymmdd') = to_date(MER.GDATU,'YYYYMMDD')
                where to_date(AR.net_due_date,'yyyymmdd') between to_date('".$tgl_now."','yyyymmdd')
                and to_date('".$tgl_now."','yyyymmdd')
                GROUP BY  AR.currency_key,MER.FCURR, MER.UKURS)
                DATA
                GROUP BY DATA.JENIS, DATA.FLAG
                
                UNION
                SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG FROM (Select AR.currency_key,MER.FCURR,SUM( AR.amount_lcl_2) * NVL(MER.UKURS,1) AS JUMLAH,
                'TO MONTH' AS JENIS, '2' AS FLAG
                from zcfi0015 AR 
                LEFT JOIN M_EXCHANGE_RATE MER ON AR.currency_key = MER.FCURR
                AND to_date(AR.net_due_date,'yyyymmdd') = to_date(MER.GDATU,'YYYYMMDD')
                where to_date(AR.net_due_date,'yyyymmdd') between to_date('".$thn.$bln."01','yyyymmdd')
                and to_date('".$tgl_now."','yyyymmdd')
                GROUP BY  AR.currency_key,MER.FCURR, MER.UKURS)
                DATA
                GROUP BY DATA.JENIS, DATA.FLAG
                
                UNION
                SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG FROM (Select AR.currency_key,MER.FCURR,SUM( AR.amount_lcl_2) * NVL(MER.UKURS,1) AS JUMLAH,
                'TO YEAR' AS JENIS, '3' AS FLAG
                from zcfi0015 AR 
                LEFT JOIN M_EXCHANGE_RATE MER ON AR.currency_key = MER.FCURR
                AND to_date(AR.net_due_date,'yyyymmdd') = to_date(MER.GDATU,'YYYYMMDD')
                where to_date(AR.net_due_date,'yyyymmdd') between to_date('".$thn."0101','yyyymmdd')
                and to_date('".$thn."','yyyymmdd')
                GROUP BY  AR.currency_key,MER.FCURR, MER.UKURS)
                DATA
                GROUP BY DATA.JENIS, DATA.FLAG";
        $result = $this->db->query($sql);
		return $result->result_array();
        
    }
    
    
    public function get_data_AR_Opco(){
        $sql = "SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG FROM (Select AR.currency_key,MER.FCURR,SUM( AR.amount_lcl_2) * NVL(MER.UKURS,1) AS JUMLAH,
                'TO DAY' AS JENIS, '1' AS FLAG
                from zcfi0015 AR 
                LEFT JOIN M_EXCHANGE_RATE MER ON AR.currency_key = MER.FCURR
                AND to_date(AR.net_due_date,'yyyymmdd') = to_date(MER.GDATU,'YYYYMMDD')
                where to_date(AR.net_due_date,'yyyymmdd') between to_date('20171115','yyyymmdd')
                and to_date('20171116','yyyymmdd')
                GROUP BY  AR.currency_key,MER.FCURR, MER.UKURS)
                DATA
                GROUP BY DATA.JENIS, DATA.FLAG
                
                UNION
                SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG FROM (Select AR.currency_key,MER.FCURR,SUM( AR.amount_lcl_2) * NVL(MER.UKURS,1) AS JUMLAH,
                'TO MONTH' AS JENIS, '2' AS FLAG
                from zcfi0015 AR 
                LEFT JOIN M_EXCHANGE_RATE MER ON AR.currency_key = MER.FCURR
                AND to_date(AR.net_due_date,'yyyymmdd') = to_date(MER.GDATU,'YYYYMMDD')
                where to_date(AR.net_due_date,'yyyymmdd') between to_date('20171101','yyyymmdd')
                and to_date('20171116','yyyymmdd')
                GROUP BY  AR.currency_key,MER.FCURR, MER.UKURS)
                DATA
                GROUP BY DATA.JENIS, DATA.FLAG
                
                UNION
                SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG FROM (Select AR.currency_key,MER.FCURR,SUM( AR.amount_lcl_2) * NVL(MER.UKURS,1) AS JUMLAH,
                'TO YEAR' AS JENIS, '3' AS FLAG
                from zcfi0015 AR 
                LEFT JOIN M_EXCHANGE_RATE MER ON AR.currency_key = MER.FCURR
                AND to_date(AR.net_due_date,'yyyymmdd') = to_date(MER.GDATU,'YYYYMMDD')
                where to_date(AR.net_due_date,'yyyymmdd') between to_date('20170101','yyyymmdd')
                and to_date('20171116','yyyymmdd')
                GROUP BY  AR.currency_key,MER.FCURR, MER.UKURS)
                DATA
                GROUP BY DATA.JENIS, DATA.FLAG";
        $result = $this->db->query($sql);
		return $result->result_array();
        
    }
    
    public function get_data_AR_trend_opco($tgl_now,$bln,$thn,$opco)
    {
        $sql = "  SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG, DATA.COMPANY, DATA.TANGGAL
                  FROM (SELECT AR.CURRENCY_KEY,MER.FCURR,SUM( AR.AMOUNT_LCL_2) * NVL(MER.UKURS,1) AS JUMLAH,
            'TO MONTH' AS JENIS, '2' AS FLAG, AR.COMPANY,AR.NET_DUE_DATE AS TANGGAL
            FROM ZCFI0015 AR 
            LEFT JOIN M_EXCHANGE_RATE MER ON AR.CURRENCY_KEY = MER.FCURR
            AND TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
            WHERE TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD') BETWEEN TO_DATE('".$thn.$bln."01','YYYYMMDD')
            AND TO_DATE('".$tgl_now."','YYYYMMDD')
                        AND AR.COMPANY='".$opco."'
            GROUP BY  AR.CURRENCY_KEY,MER.FCURR, MER.UKURS,AR.COMPANY,AR.NET_DUE_DATE)
            DATA
            GROUP BY DATA.JENIS, DATA.FLAG, DATA.COMPANY, DATA.TANGGAL
            
            UNION
            SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG, DATA.COMPANY, DATA.TANGGAL
                        FROM (SELECT AR.CURRENCY_KEY,MER.FCURR,SUM( AR.AMOUNT_LCL_2) * NVL(MER.UKURS,1) AS JUMLAH,
            'TO YEAR' AS JENIS, '3' AS FLAG, AR.COMPANY,SUBSTR(AR.NET_DUE_DATE,0,6) AS TANGGAL
            FROM ZCFI0015 AR 
            LEFT JOIN M_EXCHANGE_RATE MER ON AR.CURRENCY_KEY = MER.FCURR
            AND TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
            WHERE TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD')  BETWEEN TO_DATE('".$thn.$bln."01','YYYYMMDD')
            AND TO_DATE('".$tgl_now."','YYYYMMDD')
                        AND AR.COMPANY='".$opco."'
            GROUP BY  AR.CURRENCY_KEY,MER.FCURR, MER.UKURS, AR.COMPANY,SUBSTR(AR.NET_DUE_DATE,0,6))
            DATA
            GROUP BY DATA.JENIS, DATA.FLAG, DATA.COMPANY,DATA.TANGGAL ORDER BY 3,5 asc";
            $result = $this->db->query($sql);
            return $result->result_array();    
    }

    public function get_data_AR_trend_smig($tgl_now,$bln,$thn)
    {
        $sql = "SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG, DATA.TANGGAL
                        FROM (SELECT AR.CURRENCY_KEY,MER.FCURR,SUM( AR.AMOUNT_LCL_2) * NVL(MER.UKURS,1) AS JUMLAH,
            'TO MONTH' AS JENIS, '2' AS FLAG, AR.NET_DUE_DATE AS TANGGAL
            FROM ZCFI0015 AR 
            LEFT JOIN M_EXCHANGE_RATE MER ON AR.CURRENCY_KEY = MER.FCURR
            AND TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
           WHERE TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD') BETWEEN TO_DATE('".$thn.$bln."01','YYYYMMDD')
            AND TO_DATE('".$tgl_now."','YYYYMMDD')
            GROUP BY  AR.CURRENCY_KEY,MER.FCURR, MER.UKURS,AR.NET_DUE_DATE)
            DATA
            GROUP BY DATA.JENIS, DATA.FLAG, DATA.TANGGAL
            
            UNION
            SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG, DATA.TANGGAL
                        FROM (SELECT AR.CURRENCY_KEY,MER.FCURR,SUM( AR.AMOUNT_LCL_2) * NVL(MER.UKURS,1) AS JUMLAH,
            'TO YEAR' AS JENIS, '3' AS FLAG, SUBSTR(AR.NET_DUE_DATE,0,6) AS TANGGAL
            FROM ZCFI0015 AR 
            LEFT JOIN M_EXCHANGE_RATE MER ON AR.CURRENCY_KEY = MER.FCURR
            AND TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
            WHERE TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD')  BETWEEN TO_DATE('".$thn.$bln."01','YYYYMMDD')
            AND TO_DATE('".$tgl_now."','YYYYMMDD')
            GROUP BY  AR.CURRENCY_KEY,MER.FCURR, MER.UKURS, AR.COMPANY,SUBSTR(AR.NET_DUE_DATE,0,6))
            DATA
            GROUP BY DATA.JENIS, DATA.FLAG, DATA.TANGGAL
                        ORDER BY 3,4 asc";
            $result = $this->db->query($sql);
            return $result->result_array();    
            // return $sql;    
    }

    public function get_data_AR_Per_Opco($tgl_now,$bln,$thn){
        $sql = "SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG, DATA.COMPANY
            FROM (SELECT AR.CURRENCY_KEY,MER.FCURR,SUM( AR.AMOUNT_LCL_2) * NVL(MER.UKURS,1) AS JUMLAH,
            'TO DAY' AS JENIS, '1' AS FLAG, AR.COMPANY
            FROM ZCFI0015 AR 
            LEFT JOIN M_EXCHANGE_RATE MER ON AR.CURRENCY_KEY = MER.FCURR
            AND TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
            WHERE TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD') BETWEEN TO_DATE('".$tgl_now."','YYYYMMDD')
            AND TO_DATE('".$tgl_now."','YYYYMMDD')
            GROUP BY  AR.CURRENCY_KEY,MER.FCURR, MER.UKURS,AR.COMPANY)
            DATA
            GROUP BY DATA.JENIS, DATA.FLAG, DATA.COMPANY
            
            UNION
            SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG, DATA.COMPANY FROM (SELECT AR.CURRENCY_KEY,MER.FCURR,SUM( AR.AMOUNT_LCL_2) * NVL(MER.UKURS,1) AS JUMLAH,
            'TO MONTH' AS JENIS, '2' AS FLAG, AR.COMPANY
            FROM ZCFI0015 AR 
            LEFT JOIN M_EXCHANGE_RATE MER ON AR.CURRENCY_KEY = MER.FCURR
            AND TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
            WHERE TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD') BETWEEN TO_DATE('".$thn.$bln."01','YYYYMMDD')
            AND TO_DATE('".$tgl_now."','YYYYMMDD')
            GROUP BY  AR.CURRENCY_KEY,MER.FCURR, MER.UKURS,AR.COMPANY)
            DATA
            GROUP BY DATA.JENIS, DATA.FLAG, DATA.COMPANY
            
            UNION
            SELECT SUM(DATA.JUMLAH) TOTAL, DATA.JENIS, DATA.FLAG, DATA.COMPANY FROM (SELECT AR.CURRENCY_KEY,MER.FCURR,SUM( AR.AMOUNT_LCL_2) * NVL(MER.UKURS,1) AS JUMLAH,
            'TO YEAR' AS JENIS, '3' AS FLAG, AR.COMPANY
            FROM ZCFI0015 AR 
            LEFT JOIN M_EXCHANGE_RATE MER ON AR.CURRENCY_KEY = MER.FCURR
            AND TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
            WHERE TO_DATE(AR.NET_DUE_DATE,'YYYYMMDD') BETWEEN TO_DATE('".$thn."0101','YYYYMMDD')
            AND TO_DATE('".$tgl_now."','YYYYMMDD')
            GROUP BY  AR.CURRENCY_KEY,MER.FCURR, MER.UKURS, AR.COMPANY)
            DATA
            GROUP BY DATA.JENIS, DATA.FLAG, DATA.COMPANY";
        $result = $this->db->query($sql);
		return $result->result_array();
    }
    
    
    
    public function get_data_Ap_Per_Opco($tgl_now,$tgl_end,$bln,$thn){
        $sql = "SELECT SUM(DATA.JUMLAH) AS TOTAL, DATA.BUKRS, DATA.JENIS, DATA.FLAG FROM
                (SELECT SUM(AP.DMBTR) AS TOTAL, AP.DATECOL, AP.WAERS,  SUM(AP.DMBTR) * NVL(MER.UKURS,1) AS JUMLAH, AP.BUKRS, 
                'TO DAY' AS JENIS, '1' AS FLAG
                FROM ZCFI3015 AP
                LEFT JOIN M_EXCHANGE_RATE MER ON AP.WAERS = MER.FCURR
                AND TO_DATE(AP.DATECOL,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
                WHERE DATECOL >= '".$tgl_end."' AND DATECOL <= '".$tgl_end."' 
                GROUP BY AP.DATECOL, AP.WAERS, MER.UKURS,  AP.BUKRS) DATA
                GROUP BY DATA.BUKRS, DATA.JENIS, DATA.FLAG
                
                UNION
                SELECT SUM(DATA.JUMLAH) AS TOTAL, DATA.BUKRS, DATA.JENIS, DATA.FLAG FROM
                (SELECT SUM(AP.DMBTR) AS TOTAL, AP.DATECOL, AP.WAERS,  SUM(AP.DMBTR) * NVL(MER.UKURS,1) AS JUMLAH, AP.BUKRS, 
                'TO MONTH' AS JENIS, '2' AS FLAG
                FROM ZCFI3015 AP
                LEFT JOIN M_EXCHANGE_RATE MER ON AP.WAERS = MER.FCURR
                AND TO_DATE(AP.DATECOL,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
                WHERE DATECOL >= '".$tgl_now."' AND DATECOL <= '".$tgl_end."' 
                GROUP BY AP.DATECOL, AP.WAERS, MER.UKURS,  AP.BUKRS) DATA
                GROUP BY DATA.BUKRS, DATA.JENIS, DATA.FLAG
                
                UNION
                SELECT SUM(DATA.JUMLAH) AS TOTAL, DATA.BUKRS, DATA.JENIS, DATA.FLAG FROM
                (SELECT SUM(AP.DMBTR) AS TOTAL, AP.DATECOL, AP.WAERS,  SUM(AP.DMBTR) * NVL(MER.UKURS,1) AS JUMLAH, AP.BUKRS, 
                'TO YEAR' AS JENIS, '3' AS FLAG
                FROM ZCFI3015 AP
                LEFT JOIN M_EXCHANGE_RATE MER ON AP.WAERS = MER.FCURR
                AND TO_DATE(AP.DATECOL,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
                WHERE DATECOL >= '".$thn."0101' AND DATECOL <= '".$tgl_end."' 
                GROUP BY AP.DATECOL, AP.WAERS, MER.UKURS,  AP.BUKRS) DATA
                GROUP BY DATA.BUKRS, DATA.JENIS, DATA.FLAG";
        $result = $this->db->query($sql);
		return $result->result_array();
        
    }
    
    public function get_trend_AP_param_opco($tgl_now,$tgl_end,$bln,$thn,$opco)
    {
        $sql = "SELECT SUM(DATA.JUMLAH) AS TOTAL, DATA.BUKRS, DATA.JENIS, DATA.FLAG,DATA.DATECOL AS TANGGAL FROM
(SELECT SUM(AP.DMBTR) AS TOTAL, AP.DATECOL, AP.WAERS,  SUM(AP.DMBTR) * NVL(MER.UKURS,1) AS JUMLAH, AP.BUKRS, 
'TO MONTH' AS JENIS, '2' AS FLAG
    FROM ZCFI3015 AP
    LEFT JOIN M_EXCHANGE_RATE MER ON AP.WAERS = MER.FCURR
     AND TO_DATE(AP.DATECOL,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
     WHERE DATECOL >= '".$thn.$bln."01' AND DATECOL <= '".$tgl_now."' 
     GROUP BY AP.DATECOL, AP.WAERS, MER.UKURS,  AP.BUKRS) DATA
            WHERE DATA.BUKRS='".$opco."'
     GROUP BY DATA.BUKRS, DATA.JENIS, DATA.FLAG,DATA.DATECOL
                                UNION
                SELECT SUM(DATA.JUMLAH) AS TOTAL, DATA.BUKRS, DATA.JENIS, DATA.FLAG,SUBSTR(DATA.DATECOL,0,6) AS TANGGAL FROM
                (SELECT SUM(AP.DMBTR) AS TOTAL, AP.DATECOL, AP.WAERS,  SUM(AP.DMBTR) * NVL(MER.UKURS,1) AS JUMLAH, AP.BUKRS, 
                'TO YEAR' AS JENIS, '3' AS FLAG
                FROM ZCFI3015 AP
                LEFT JOIN M_EXCHANGE_RATE MER ON AP.WAERS = MER.FCURR
                AND TO_DATE(AP.DATECOL,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
                WHERE DATECOL >= '".$thn."0101' AND DATECOL <= '".$tgl_now."' 
                GROUP BY AP.DATECOL, AP.WAERS, MER.UKURS,  AP.BUKRS) DATA
                                WHERE DATA.BUKRS='".$opco."'
                GROUP BY DATA.BUKRS, DATA.JENIS, DATA.FLAG,SUBSTR(DATA.DATECOL,0,6)
                                ORDER BY 4,5 asc";
            $result = $this->db->query($sql);
            return $result->result_array();
    }

    public function get_trend_AP_smig($tgl_now,$tgl_end,$bln,$thn)
    {
        $sql = "SELECT SUM(DATA.JUMLAH) AS TOTAL, DATA.JENIS, DATA.FLAG,SUBSTR(DATA.DATECOL,7,2)|| '-' ||TO_CHAR(TO_NUMBER(SUBSTR(DATA.DATECOL,5,2))+1)|| '-' ||SUBSTR(DATA.DATECOL,0,4) AS TANGGAL FROM
                (SELECT SUM(AP.DMBTR) AS TOTAL, AP.DATECOL, AP.WAERS,  SUM(AP.DMBTR) * NVL(MER.UKURS,1) AS JUMLAH, 
                'TO MONTH' AS JENIS, '2' AS FLAG
                    FROM ZCFI3015 AP
                    LEFT JOIN M_EXCHANGE_RATE MER ON AP.WAERS = MER.FCURR
                     AND TO_DATE(AP.DATECOL,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
                     WHERE DATECOL >= '".$thn.$bln."01' AND DATECOL <= '".$tgl_now."' 
                     GROUP BY AP.DATECOL, AP.WAERS, MER.UKURS) DATA
                     GROUP BY DATA.JENIS, DATA.FLAG,SUBSTR(DATA.DATECOL,7,2)|| '-' ||TO_CHAR(TO_NUMBER(SUBSTR(DATA.DATECOL,5,2))+1)|| '-' ||SUBSTR(DATA.DATECOL,0,4)
                UNION
                    SELECT SUM(DATA.JUMLAH) AS TOTAL, DATA.JENIS, DATA.FLAG,TO_CHAR(TO_NUMBER(SUBSTR(DATA.DATECOL,5,2))+1)|| '-' ||SUBSTR(DATA.DATECOL,0,4) AS TANGGAL FROM
                    (SELECT SUM(AP.DMBTR) AS TOTAL, AP.DATECOL, AP.WAERS,  SUM(AP.DMBTR) * NVL(MER.UKURS,1) AS JUMLAH, 
                    'TO YEAR' AS JENIS, '3' AS FLAG
                    FROM ZCFI3015 AP
                    LEFT JOIN M_EXCHANGE_RATE MER ON AP.WAERS = MER.FCURR
                    AND TO_DATE(AP.DATECOL,'YYYYMMDD') = TO_DATE(MER.GDATU,'YYYYMMDD')
                    WHERE DATECOL >= '".$thn."0101' AND DATECOL <= '".$tgl_now."' 
                    GROUP BY AP.DATECOL, AP.WAERS, MER.UKURS) DATA
                    GROUP BY DATA.JENIS, DATA.FLAG,TO_CHAR(TO_NUMBER(SUBSTR(DATA.DATECOL,5,2))+1)|| '-' ||SUBSTR(DATA.DATECOL,0,4)
          ORDER BY 2,3 asc";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    /**
     * [get_trend_CashOnHand_per_Opco description]
     * @param  [type] $tgl_now [description]
     * @param  [type] $bln     [description]
     * @param  [type] $thn     [description]
     * @param  [type] $opco    [description]
     * @return [type]          [description]
     */
    public function get_trend_CashOnHand_per_Opco($tgl_now,$bln,$thn,$opco){
        $sql = "  SELECT TO_char(PK.BUDAT,'DD-MM-YYYY') AS TGL,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, 'TO MONTH' AS JENIS, '2' AS FLAG,PK.RBUKRS
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND 
                PK.BUDAT BETWEEN TO_DATE('01/".$bln."/".$thn."','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                                and PK.RBUKRS = '".$opco."'
                GROUP BY PK.BUDAT,MER.UKURS,PK.RBUKRS  
                UNION
                SELECT TO_CHAR(PK.BUDAT,'MM-YYYY') AS TGL,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, 'TO YEAR' AS JENIS, '3' AS FLAG,PK.RBUKRS
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND 
                PK.BUDAT BETWEEN TO_DATE('01/01/".$thn."','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                                and PK.RBUKRS = '".$opco."'
                GROUP BY TO_CHAR(PK.BUDAT,'MM-YYYY'), MER.UKURS,PK.RBUKRS 
                                ORDER BY 4,1 asc";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_trend_CashOnHand_smig($tgl_now,$bln,$thn){
        $sql = "  select DATA.TGL, sum(DATA.JUMLAH) AS TOTAL, DATA.JENIS,DATA.FLAG 
                    from (
                    SELECT TO_char(PK.BUDAT,'DD-MM-YYYY') AS TGL,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, 'TO MONTH' AS JENIS, '2' AS FLAG
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND 
                PK.BUDAT BETWEEN TO_DATE('01/".$bln."/".$thn."','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                GROUP BY PK.BUDAT,MER.UKURS
                                ) DATA
                                GROUP BY DATA.TGL, DATA.JENIS,DATA.FLAG 
                UNION
                select DATA.TGL, sum(DATA.JUMLAH) AS TOTAL, DATA.JENIS,DATA.FLAG 
                                from (
                                SELECT TO_CHAR(PK.BUDAT,'MM-YYYY') AS TGL,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, 'TO YEAR' AS JENIS, '3' AS FLAG
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND 
                PK.BUDAT BETWEEN TO_DATE('01/01/".$thn."','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')                             
                GROUP BY TO_CHAR(PK.BUDAT,'MM-YYYY'),MER.UKURS
                                ) DATA
                                GROUP BY DATA.TGL, DATA.JENIS,DATA.FLAG 
                                ORDER BY 4,1 asc";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_CashOnHand_per_Opco($tgl_now,$bln,$thn){
        $sql = "SELECT SUM(DATA.JUMLAH) AS TOTAL, DATA.JENIS, DATA.FLAG,DATA.RBUKRS FROM (
                SELECT SUM(PK.HSL) AS CASH, PK.RWCUR, TO_DATE(PK.BUDAT,'dd-mm-yyyy') AS TGL, pk.budat, MER.GDATU, MER.FCURR,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, MER.UKURS, 'TO DAY' AS JENIS, '1' AS FLAG, PK.RBUKRS
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND 
                PK.BUDAT BETWEEN TO_DATE('".$tgl_now."','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                GROUP BY PK.RWCUR, PK.BUDAT, MER.GDATU, MER.FCURR,MER.UKURS, MER.UKURS,PK.RBUKRS  
                ) DATA
                GROUP BY DATA.JENIS, DATA.FLAG, DATA.RBUKRS
                
                UNION
                SELECT SUM(DATA.JUMLAH) AS TOTAL, DATA.JENIS, DATA.FLAG,DATA.RBUKRS FROM (
                SELECT SUM(PK.HSL) AS CASH, PK.RWCUR, TO_DATE(PK.BUDAT,'dd-mm-yyyy') AS TGL, pk.budat, MER.GDATU, MER.FCURR,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, MER.UKURS, 'TO MONTH' AS JENIS, '2' AS FLAG,PK.RBUKRS
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND 
                PK.BUDAT BETWEEN TO_DATE('01/$bln/$thn','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                GROUP BY PK.RWCUR, PK.BUDAT, MER.GDATU, MER.FCURR,MER.UKURS, MER.UKURS,PK.RBUKRS  
                ) DATA
                GROUP BY DATA.JENIS, DATA.FLAG,DATA.RBUKRS
                
                UNION
                SELECT SUM(DATA.JUMLAH) AS TOTAL, DATA.JENIS, DATA.FLAG,DATA.RBUKRS FROM (
                SELECT SUM(PK.HSL) AS CASH, PK.RWCUR, TO_DATE(PK.BUDAT,'dd-mm-yyyy') AS TGL, pk.budat, MER.GDATU, MER.FCURR,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, MER.UKURS, 'TO YEAR' AS JENIS, '3' AS FLAG,PK.RBUKRS
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND 
                PK.BUDAT BETWEEN TO_DATE('01/01/$thn','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                GROUP BY PK.RWCUR, PK.BUDAT, MER.GDATU, MER.FCURR,MER.UKURS, MER.UKURS,PK.RBUKRS  
                ) DATA
                GROUP BY DATA.JENIS, DATA.FLAG, DATA.RBUKRS";
        $result = $this->db->query($sql);
		return $result->result_array();
        
    }
    
    
    public function get_CashOnHand_per_Opco_harian($tgl_now,$bln,$thn){
        $sql = "SELECTs SUM(DATA.JUMLAH) AS TOTAL, DATA.JENIS, DATA.FLAG,DATA.RBUKRS FROM (
                SELECT SUM(PK.HSL) AS CASH, PK.RWCUR, TO_DATE(PK.BUDAT,'dd-mm-yyyy') AS TGL, pk.budat, MER.GDATU, MER.FCURR,
                SUM(PK.HSL) * NVL(MER.UKURS,1) AS JUMLAH, MER.UKURS, 'TO DAY' AS JENIS, '1' AS FLAG, PK.RBUKRS
                FROM POSISI_KEUANGAN PK 
                INNER JOIN M_BANK  MB ON MB.HKONT = SUBSTR(PK.RACCT, -8, 8)
                LEFT JOIN M_EXCHANGE_RATE MER ON PK.RWCUR = MER.FCURR
                AND PK.BUDAT = to_date(MER.GDATU,'YYYYMMDD')
                WHERE PK.BLART = 'SAKIR' AND 
                PK.BUDAT BETWEEN TO_DATE('".$tgl_now."','DD-MM-YYYY') AND TO_DATE ('".$tgl_now."','DD-MM-YYYY')
                GROUP BY PK.RWCUR, PK.BUDAT, MER.GDATU, MER.FCURR,MER.UKURS, MER.UKURS,PK.RBUKRS  
                ) DATA
                GROUP BY DATA.JENIS, DATA.FLAG, DATA.RBUKRS";
        $result = $this->db->query($sql);
		return $result->result_array();
        
    }


}

?>