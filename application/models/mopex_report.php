<?php

if (!defined('BASEPATH'))
    exit('Anda tidak masuk dengan benar');

class mopex_report extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('devsi', TRUE);
    }
    
    public function template_coststructure($company){
        $jumlah = count($company);
        if($jumlah == 2){
            $company = $company[0]."','".$company[1];
        }
        $query = $this->db->query("SELECT * FROM M_COSTSTRUCTURE
                                    WHERE COMPANY IN ('$company','ALL')
                                    ORDER BY URUTAN");
        return $query->result();
    }
    public function cek_subsidiary($company){
        if($company == "2000','7000" || $company == "5000','7000"){
            return "";
        }else{
            $query = $this->db->query("SELECT PARENTH2
                                    FROM M_COMPANY
                                    WHERE COMPANY = '$company'
                                    ORDER BY PARENTH2, COMPANY");
        
            return $query->row()->PARENTH2;
        }
    }
    public function get_company() {
        $where = null;
        if ($_SESSION['status'] != 'ADMIN') {
            $where_s1 = null;
            $where_s2 = null;
            $comp = array_filter(explode(",", $_SESSION['company_hris'] . "," . $_SESSION['company_bpc']));
            $tmp = null;
            foreach ($comp as $k => $v) {
                $cmp = $tmp . "'$v',";
                $tmp = $cmp;
                if ($v == "7000") {
                    $where_s1 = "'2000,7000',";
                    $where_s2 = "'5000,7000',";
                } elseif ($v == "2000") {
                    $where_s1 = "'2000,7000',";
                } elseif ($v == "5000") {
                    $where_s2 = "'5000,7000',";
                }
            }
            $comp_all = substr($cmp . $where_s1 . $where_s2, 0, -1);
            $where = "WHERE COMPANY IN ($comp_all)";
        }
        return $this->db->query("SELECT COMPANY, DESCRIPTION FROM (
                                        SELECT '2000,7000' AS COMPANY, '2000 & 7000' AS DESCRIPTION, 'GCEMENT2' AS PARENTH2 FROM dual
                                    UNION
                                        SELECT '5000,7000' AS COMPANY, '5000 & 7000' AS DESCRIPTION, 'GCEMENT2' AS PARENTH2 FROM dual
                                    UNION
                                        SELECT COMPANY, DESCRIPTION, PARENTH2
                                        FROM M_COMPANY
                                        WHERE INTERCO IS NOT NULL
                                            AND COMPANY <> 'GCEMENT'
                                            AND COMPANY <> 'NO_ENTITY'
                                    )
                                    $where
                                    ORDER BY PARENTH2, COMPANY")->result();
    }
    
    public function merge_data($tabel, $array, $date, $id_user, $company){
//	$nama   = $array[1]['CATEGORY'].'_'.$array[1]['COMPANY'];
//        $cek    = $this->cek_subsidiary($company);
//        if($cek == 'iGCEMENT'){
//            
//        }
//        echopre($array); exit;
        $this->db->insert_batch($tabel,$array);
        $this->db->query("
            MERGE INTO FINANCIAL F
                USING (
                    SELECT * FROM TAMPUNG
                    WHERE UPDATE_BY = '$id_user'
                    AND COMPANY = '$company'
                    AND FISCAL_YEAR_PERIOD = '$date'
                ) TA
                ON (
                        F.CATEGORY = TA.CATEGORY AND
                        F.COMPANY = TA.COMPANY AND
                        F.FISCAL_YEAR_PERIOD = TA.FISCAL_YEAR_PERIOD AND
                        F.CURRENCY = TA.CURRENCY AND
                        F.FLOW = TA.FLOW AND
                        F.AUDITTRAIL = TA.AUDITTRAIL AND
                        F.GL_ACCOUNT = TA.GL_ACCOUNT AND
                        F.COSTCENTER = TA.COSTCENTER AND
                        F.PROFIT_CENTER = TA.PROFIT_CENTER AND
                        F.INTERCO = TA.INTERCO AND
                        F.DOCUMENT_TYPE = TA.DOCUMENT_TYPE AND
			F.CSTR_NO = TA.CSTR_NO
                )
                WHEN MATCHED THEN UPDATE SET F.AMOUNT = TA.AMOUNT, F.UPDATE_BY = TA.UPDATE_BY, F.LAST_UPDATE = SYSDATE
                WHEN NOT MATCHED THEN INSERT 
                (
                    AMOUNT, CATEGORY, COMPANY, FISCAL_YEAR_PERIOD, CURRENCY,
                    FLOW, AUDITTRAIL, GL_ACCOUNT, COSTCENTER, PROFIT_CENTER, INTERCO,
                    DOCUMENT_TYPE, POSTING_DATE, CREATE_BY, CSTR_NO
                ) 
                VALUES 
                (
                    TA.AMOUNT, TA.CATEGORY, TA.COMPANY, TA.FISCAL_YEAR_PERIOD, TA.CURRENCY,
                    TA.FLOW, TA.AUDITTRAIL, TA.GL_ACCOUNT, TA.COSTCENTER, TA.PROFIT_CENTER, TA.INTERCO,
                    TA.DOCUMENT_TYPE, SYSDATE, TA.UPDATE_BY, TA.CSTR_NO
                )
        ");
        
        $this->db->query("DELETE FROM TAMPUNG WHERE UPDATE_BY = '$id_user' AND COMPANY = '$company'");
        $this->db->query("BEGIN
                            DBMS_SNAPSHOT.REFRESH('MV_COST_REPORT_BAWAH');
                        END;");
        return 'Data is Update Succesfully';
    }
    public function data_coststructure($company, $category, $time, $time2){
        $cek = "";
        if($company != "2000','7000" || $company != "5000','7000"){
            $cek = $this->cek_subsidiary($company);
        }
        IF($cek == 'GCEMENT'){
            $nama   = $category.'_'.$company;
            $filter = "";
        }
        $data = $this->db->query("SELECT NOMOR, DESCRIPTION, CATEGORY, SUM(JUMLAH) AS JUMLAH FROM MV_COSTSTRUCTURE_$nama
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    $filter
                                    GROUP BY NOMOR, DESCRIPTION, CATEGORY
                                    ORDER BY NOMOR");
        return $data->result();
    }
    public function data_coststructure_subsidiary($company, $category, $time, $time2){
//        $nama = "MV_COSTSTRUCTURE_SUBSIDIARY2";
        IF($company == "G200" || $company == "G500"){
            $data = $this->db->query("SELECT
                                            MCT.DESC_ENGLISH,
                                            MCT.DESC_INDO,
                                            MCT.COMPANY,
                                            MCT.COST_GROUP,
                                            MCT.COST_GROUP2,
                                            MCT.GL_ACCOUNT2 AS GL_ACCOUNT,
                                            FNS. CATEGORY,
                                            CASE
                                    WHEN GL_ACCOUNT2 IS NULL THEN
                                            SUM(FNS.JUMLAH)
                                    ELSE
                                            SUM(NVL (FNS.JUMLAH, 0))
                                    END AS JUMLAH,
                                     MCT.URUTAN
                                    FROM
                                            M_COSTSTRUCTURE MCT
                                    LEFT JOIN (
                                            SELECT
                                                    COMPANY,
                                                    CATEGORY,
                                                    COST_GROUP,
                                                    COST_GROUP_C,
                                                    STRUCTURE,
                                                    AMOUNT AS JUMLAH
                                            FROM
                                                    MV_COSTSTRUCTURE_SUB
                                            WHERE
                                                    COMPANY = '$company'
                                            AND CATEGORY = '$category'
                                            AND FISCAL_YEAR_PERIOD BETWEEN '$time'
                                            AND '$time2'
                                    ) FNS ON FNS.COST_GROUP LIKE '%' || MCT.COST_GROUP2 || '%'
                                    AND FNS.COST_GROUP_C = MCT.COST_GROUP2
                                    AND MCT.GL_ACCOUNT2 = FNS. STRUCTURE
                                    WHERE
                                            MCT.COMPANY IN ('ALL', '$company')
                                    GROUP BY MCT.DESC_ENGLISH,
                                            MCT.DESC_INDO,
                                            MCT.COMPANY,
                                            MCT.COST_GROUP,
                                            MCT.COST_GROUP2,
                                            MCT.GL_ACCOUNT2,
                                            FNS. CATEGORY,
                                            GL_ACCOUNT2,
                                            MCT.URUTAN
                                    ORDER BY
                                            URUTAN");
        } ELSE{
            $data = $this->db->query("SELECT
                                            MCT.DESC_ENGLISH,
                                            MCT.DESC_INDO,
                                            MCT.COMPANY,
                                            MCT.COST_GROUP,
                                            MCT.COST_GROUP2,
                                            MCT.GL_ACCOUNT2 AS GL_ACCOUNT,
                                            FNS. CATEGORY,
                                            CASE
                                    WHEN GL_ACCOUNT2 IS NULL THEN
                                            FNS.JUMLAH
                                    ELSE
                                            NVL (FNS.JUMLAH, 0)
                                    END AS JUMLAH,
                                     MCT.URUTAN
                                    FROM
                                            M_COSTSTRUCTURE MCT
                                    LEFT JOIN (
                                            SELECT COMPANY,
                                                    CATEGORY,
                                                    COST_GROUP,
                                                    STRUCTURE,
                                                    SUM(AMOUNT) AS JUMLAH
                                                    FROM MV_COSTSTRUCTURE_SUB
                                            WHERE
                                                    COMPANY = '$company'
                                            AND CATEGORY = '$category'
                                            AND FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                            GROUP BY
                                                    COMPANY,
                                                    CATEGORY,
                                                    COST_GROUP,
                                                    STRUCTURE
                                    ) FNS ON MCT.COST_GROUP2 = FNS.COST_GROUP
                                    AND MCT.GL_ACCOUNT2 = FNS.STRUCTURE
                                    WHERE
                                            MCT.COMPANY IN ('ALL', '$company')
                                    ORDER BY
                                            URUTAN");
        }
        
        return $data->result();
    }
    public function data_coststructure_gabungan($company, $category, $time, $time2){
        $nama1 = $category.'_'.$company[0];
        $nama2 = $category.'_'.$company[1];
        $data = $this->db->query("SELECT NOMOR, DESCRIPTION, CATEGORY, SUM(JUMLAH) AS JUMLAH
                                    FROM (
                                            SELECT NOMOR, DESCRIPTION, CATEGORY, SUM(JUMLAH) AS JUMLAH FROM MV_COSTSTRUCTURE_$nama1
                                            WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                            GROUP BY NOMOR, DESCRIPTION, CATEGORY
                                            UNION
                                            SELECT NOMOR, DESCRIPTION, CATEGORY, SUM(JUMLAH) AS JUMLAH FROM MV_COSTSTRUCTURE_$nama2
                                            WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                            GROUP BY NOMOR, DESCRIPTION, CATEGORY
                                    )
                                    GROUP BY NOMOR, DESCRIPTION, CATEGORY
                                    ORDER BY NOMOR");
        return $data->result();
    }
    public function get_total_min_marketing($company, $category, $time, $time2){
        $this->db->select('SUM(AMOUNT) as JUMLAH');
        $this->db->from('FINANCIAL FN');
        $this->db->join('M_COSTCENTER MC', 'FN.COSTCENTER = MC.COST_CENTER');
        $this->db->join('M_GL_ACCOUNT MG', 'FN.GL_ACCOUNT = MG.GL_ACCOUNT');
        $this->db->join('M_DOCUMENT_TYPE MDT', 'FN.DOCUMENT_TYPE = MDT.DOC_TYPE');
        $this->db->join('M_INTERCO MI', 'FN.INTERCO = MI.INTERCO');
        $this->db->join('M_PROFIT_CENTER MPC', 'FN.PROFIT_CENTER = MPC.PROFIT_CENTER');
        
        if($category == "ACT"){
            $this->db->where_in('FN.AUDITTRAIL', array('SAP_ECC','FINANCIAL_MDL'));
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where('MDT.FI', 'Y');
            $this->db->where('MG.OA', 'Y');
            $this->db->where('MI.PARENTH1', 'TOT_INTERCO');
            $this->db->where('MPC.C1', 'Y');
            $this->db->where('FN.CATEGORY', $category);
            $this->db->where_in('MC.COST_CENTER', array('7204201000', '2105201000'));
        }else if($category == "BUD"){
            $this->db->where_in('FN.AUDITTRAIL', 'SAP_ECC');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where('MDT.FI', 'Y');
            $this->db->where('MG.OA', 'Y');
            $this->db->where('MI.PARENTH1', 'TOT_INTERCO');
            $this->db->where('MPC.C1', 'Y');
            $this->db->where('FN.CATEGORY', $category);
            $this->db->where_in('MC.COST_CENTER', array('7204201000', '2105201000'));
            $this->db->or_like('FN.AUDITTRAIL', 'MDL', 'BEFORE');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where('MDT.FI', 'Y');
            $this->db->where('MG.OA', 'Y');
            $this->db->where('MI.PARENTH1', 'TOT_INTERCO');
            $this->db->where('MPC.C1', 'Y');
            $this->db->where('FN.CATEGORY', $category);
            $this->db->where_in('MC.COST_CENTER', array('7204201000', '2105201000'));
        }
        
        //echo $this->db->get_compiled_select(); exit;
        $data = $this->db->get();
        return $data->row();
    }
    
    public function get_nc_fs($fs_structure, $company, $category, $time, $time2, $nc){
        $this->db->select('SUM(AMOUNT) as JUMLAH');
        $this->db->from('FINANCIAL FN');
        $this->db->join('M_COSTCENTER MC', 'FN.COSTCENTER = MC.COST_CENTER');
        $this->db->join('M_GL_ACCOUNT MG', 'FN.GL_ACCOUNT = MG.GL_ACCOUNT');
        
        IF($category == "ACT"){
            $this->db->where_in('FN.COSTCENTER', $nc);
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where_in('MG.FS_STRUCTURE', $fs_structure);
            $this->db->where_in('FN.AUDITTRAIL', array('SAP_ECC','FINANCIAL_MDL'));
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category); 
        }ELSE IF($category == "BUD"){
            $this->db->where_in('FN.COSTCENTER', $nc);
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where_in('MG.FS_STRUCTURE', $fs_structure);
            $this->db->where('FN.AUDITTRAIL', 'SAP_ECC');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
            $this->db->or_where_in('FN.COSTCENTER', $nc);
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where_in('MG.FS_STRUCTURE', $fs_structure);
            $this->db->like('FN.AUDITTRAIL', 'MDL', 'BEFORE');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category); 
        }
        
        //echo $this->db->get_compiled_select(); exit;
        $data = $this->db->get();
        return $data->row();
    }
    
    public function get_account_nc($account, $nc, $company, $category, $time, $time2){
        $this->db->select('SUM(AMOUNT) as JUMLAH');
        $this->db->from('FINANCIAL FN');
        
        IF($category == "ACT"){
            $this->db->where_in('FN.COSTCENTER', $nc);
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where_in('FN.GL_ACCOUNT', $account);
            $this->db->where_in('FN.AUDITTRAIL', array('SAP_ECC','FINANCIAL_MDL'));
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
        }ELSE IF($category == "BUD"){
            $this->db->where_in('FN.COSTCENTER', $nc);
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where_in('FN.GL_ACCOUNT', $account);
            $this->db->where('FN.AUDITTRAIL', 'SAP_ECC');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
            $this->db->or_where_in('FN.COSTCENTER', $nc);
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where_in('FN.GL_ACCOUNT', $account);
            $this->db->like('FN.AUDITTRAIL', 'MDL', 'BEFORE');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
        }
//        IF($account == '68260005'){
//            echo $this->db->get_compiled_select(); exit;
//        }
        $data = $this->db->get();
        return $data->row();
    }
    
    public function get_account_nc_cstru($account, $nc, $company, $category, $time, $time2){
        $this->db->select('SUM(AMOUNT) as JUMLAH');
        $this->db->from('FINANCIAL FN');
        $this->db->where_in('FN.COSTCENTER', $nc);
        $this->db->where_in('FN.COMPANY', $company);
        $this->db->where_in('FN.GL_ACCOUNT', $account);
        $this->db->where('FN.AUDITTRAIL', 'CSTRU');
        $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
        $this->db->where('FN.CATEGORY', $category);
        //echo $this->db->get_compiled_select(); exit;
        $data = $this->db->get();
        return $data->row();
    }
    
    public function get_account_cogs($account, $nc, $company, $category, $time, $time2){
        $this->db->select('SUM(AMOUNT) as JUMLAH');
        $this->db->from('FINANCIAL FN');
        $this->db->where_in('FN.COSTCENTER', $nc);
        $this->db->where_in('FN.COMPANY', $company);
        $this->db->where_in('FN.GL_ACCOUNT', $account);
        $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
        $this->db->where('FN.CATEGORY', $category);
        //echo $this->db->get_compiled_select(); exit;
        $data = $this->db->get();
        return $data->row();
    }
    
    public function get_var($fs, $company, $category, $time, $time2){
        $this->db->select('SUM(AMOUNT) as JUMLAH');
        $this->db->from('FINANCIAL FN');
        $this->db->join('M_GL_ACCOUNT MG', 'FN.GL_ACCOUNT = MG.GL_ACCOUNT');
        
        IF($category == "ACT"){
            $this->db->where_in('MG.FS_STRUCTURE', $fs);
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where_in('FN.AUDITTRAIL', array('SAP_ECC','FINANCIAL_MDL'));
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
        }ELSE IF($category == "BUD"){
            $this->db->where_in('MG.FS_STRUCTURE', $fs);
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where('FN.AUDITTRAIL', 'SAP_ECC');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
            $this->db->or_where_in('MG.FS_STRUCTURE', $fs);
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->like('FN.AUDITTRAIL', 'MDL', 'BEFORE');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
        }
        
        //echo $this->db->get_compiled_select(); exit;
        $data = $this->db->get();
        return $data->row();
    }
    
    public function get_batubara($company, $category, $time, $time_1){
//        ECHO "SELECT (SUM(AMOUNT)-(
//                                        SELECT SUM(AMOUNT) FROM PRODUCTION PR
//                                        JOIN M_MATERIAL MM
//                                        ON PR.MATERIAL = MM.MATERIAL
//                                        WHERE PR.MATERIAL = '112_100_0011'
//                                        AND PR.GL_ACCOUNT = 'CLS_INV_AMT'
//                                        AND FISCAL_YEAR_PERIOD = '$time'
//                                        AND PR.CATEGORY = '$category'
//                                        AND COMPANY = '$company'
//                                        GROUP BY PR.MATERIAL
//                                )) AS JUMLAH from PRODUCTION PR
//                                JOIN M_MATERIAL MM
//                                ON PR.MATERIAL = MM.MATERIAL
//                                WHERE PR.MATERIAL = '112_100_0011'
//                                AND PR.GL_ACCOUNT = 'CLS_INV_AMT'
//                                AND FISCAL_YEAR_PERIOD = '$time_1'
//                                AND PR.CATEGORY = '$category'
//                                AND COMPANY = '$company'
//                                GROUP BY PR.MATERIAL"; EXIT;
    	$data = $this->db->query("SELECT (NVL(SUM(AMOUNT),0)-(
                                        SELECT NVL(SUM(AMOUNT),0) FROM PRODUCTION PR
                                        JOIN M_MATERIAL MM
                                        ON PR.MATERIAL = MM.MATERIAL
                                        WHERE PR.MATERIAL = '112_100_0011'
                                        AND PR.GL_ACCOUNT = 'CLS_INV_AMT'
                                        AND FISCAL_YEAR_PERIOD = '$time'
                                        AND PR.CATEGORY = '$category'
                                        AND COMPANY = '$company'
                                        GROUP BY PR.MATERIAL
                                )) AS JUMLAH from PRODUCTION PR
                                JOIN M_MATERIAL MM
                                ON PR.MATERIAL = MM.MATERIAL
                                WHERE PR.MATERIAL = '112_100_0011'
                                AND PR.GL_ACCOUNT = 'CLS_INV_AMT'
                                AND FISCAL_YEAR_PERIOD = '$time_1'
                                AND PR.CATEGORY = '$category'
                                AND COMPANY = '$company'
                                GROUP BY PR.MATERIAL");
        return $data->row();
    }
    
    public function get_CC3000($company, $category, $time, $time2){
//        ECHO "SELECT SUM(AMOUNT) AS JUMLAH FROM (
//                                   SELECT CONNECT_BY_ROOT GL.GL_ACCOUNT AS ACCOUNT1, AMOUNT
//                                      FROM M_GL_ACCOUNT GL
//                                                        LEFT JOIN FINANCIAL F ON GL.GL_ACCOUNT = F.GL_ACCOUNT
//                                                        WHERE COMPANY = '$company'
//                                                        AND FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
//                                                        AND CURRENCY = 'LC'
//                                                        AND FLOW IN ('INCREASE','DECREASE')
//                                                        AND CATEGORY = '$category'
//                                                        START WITH PARENTH3 = 'H3_VAR_STOCK'
//                                                        CONNECT BY PRIOR GL.GL_ACCOUNT = PARENTH3 )
//                                ORDER BY ACCOUNT1"; EXIT;
    	$data = $this->db->query("SELECT SUM(AMOUNT) AS JUMLAH FROM (
                                   SELECT CONNECT_BY_ROOT GL.GL_ACCOUNT AS ACCOUNT1, AMOUNT
                                      FROM M_GL_ACCOUNT GL
                                                        LEFT JOIN FINANCIAL F ON GL.GL_ACCOUNT = F.GL_ACCOUNT
                                                        WHERE COMPANY = '$company'
                                                        AND FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                                        AND CURRENCY = 'LC'
                                                        AND FLOW IN ('INCREASE','DECREASE')
                                                        AND CATEGORY = '$category'
                                                        START WITH PARENTH3 = 'H3_VAR_STOCK'
                                                        CONNECT BY PRIOR GL.GL_ACCOUNT = PARENTH3 )
                                ORDER BY ACCOUNT1");
        return $data->row();
    }
    
    public function get_sheet1($company, $category, $time, $time2){
//        ECHO "SELECT SUM(AMOUNT) AS JUMLAH FROM FINANCIAL
//                                    WHERE GL_ACCOUNT = '61215001'
//                                    AND COMPANY = '$company'
//                                    AND FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
//                                    AND CURRENCY = 'LC'
//                                    AND FLOW IN ('INCREASE','DECREASE')
//                                    AND CATEGORY = '$category'"; EXIT;
        $data = $this->db->query("SELECT SUM(AMOUNT) AS JUMLAH FROM FINANCIAL
                                    WHERE GL_ACCOUNT = '61215001'
                                    AND COMPANY = '$company'
                                    AND FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND CURRENCY = 'LC'
                                    AND FLOW IN ('INCREASE','DECREASE')
                                    AND CATEGORY = '$category'");
        return $data->row();
    }
    
    public function ga2_7000($fs_structure, $parenth2, $parenth2cc, $account1, $account2, $company, $fiscal_year, $time2, $category){
        IF($category == "ACT"){
//            ECHO "SELECT SUM(JUMLAH) AS JUMLAH FROM
//                                (
//                                SELECT SUM(AMOUNT) as JUMLAH
//                                FROM FINANCIAL FN
//                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
//                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//                                WHERE MG.FS_STRUCTURE IN($fs_structure)
//                                AND MC.PARENTH2 IN($parenth2)
//                                AND FN.COMPANY IN($company)
//                                AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
//                                AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
//                                AND FN.CATEGORY = '$category'
//                                UNION
//                                SELECT SUM(AMOUNT) as JUMLAH
//                                FROM FINANCIAL FN
//                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
//                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//                                WHERE MG.GL_ACCOUNT IN($account1)
//                                AND MC.PARENTH2 IN($parenth2)
//                                AND FN.COMPANY IN($company)
//                                AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
//                                AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
//                                AND FN.CATEGORY = '$category'
//                                UNION
//                                SELECT SUM(AMOUNT) as JUMLAH
//                                FROM FINANCIAL FN
//                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
//                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//                                WHERE MG.GL_ACCOUNT IN($account2)
//                                AND MC.PARENTH2 IN($parenth2cc)
//                                AND FN.COMPANY IN($company)
//                                AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
//                                AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
//                                AND FN.CATEGORY = '$category'
//                                )"; EXIT;
            $data = $this->db->query("SELECT SUM(JUMLAH) AS JUMLAH FROM
                                (
                                SELECT SUM(AMOUNT) as JUMLAH
                                FROM FINANCIAL FN
                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                WHERE MG.FS_STRUCTURE IN($fs_structure)
                                AND MC.PARENTH2 IN($parenth2)
                                AND FN.COMPANY IN($company)
                                AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                AND FN.CATEGORY = '$category'
                                UNION
                                SELECT SUM(AMOUNT) as JUMLAH
                                FROM FINANCIAL FN
                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                WHERE MG.GL_ACCOUNT IN($account1)
                                AND MC.PARENTH2 IN($parenth2)
                                AND FN.COMPANY IN($company)
                                AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                AND FN.CATEGORY = '$category'
                                UNION
                                SELECT SUM(AMOUNT) as JUMLAH
                                FROM FINANCIAL FN
                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                WHERE MG.GL_ACCOUNT IN($account2)
                                AND MC.PARENTH2 IN($parenth2cc)
                                AND FN.COMPANY IN($company)
                                AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                AND FN.CATEGORY = '$category'
                                )");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT SUM(JUMLAH) AS JUMLAH FROM
                                (
                                SELECT SUM(AMOUNT) as JUMLAH
                                FROM FINANCIAL FN
                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                WHERE MG.FS_STRUCTURE IN($fs_structure)
                                AND MC.PARENTH2 IN($parenth2)
                                AND FN.COMPANY IN($company)
                                AND FN.AUDITTRAIL = 'SAP_ECC'
                                AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                AND FN.CATEGORY = '$category'
                                UNION
                                SELECT SUM(AMOUNT) as JUMLAH
                                FROM FINANCIAL FN
                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                WHERE MG.GL_ACCOUNT IN($account1)
                                AND MC.PARENTH2 IN($parenth2)
                                AND FN.COMPANY IN($company)
                                AND FN.AUDITTRAIL = 'SAP_ECC'
                                AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                AND FN.CATEGORY = '$category'
                                UNION
                                SELECT SUM(AMOUNT) as JUMLAH
                                FROM FINANCIAL FN
                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                WHERE MG.GL_ACCOUNT IN($account2)
                                AND MC.PARENTH2 IN($parenth2cc)
                                AND FN.COMPANY IN($company)
                                AND FN.AUDITTRAIL = 'SAP_ECC'
                                AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                AND FN.CATEGORY = '$category'
                                UNION
                                SELECT SUM(AMOUNT) as JUMLAH
                                FROM FINANCIAL FN
                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                WHERE MG.FS_STRUCTURE IN($fs_structure)
                                AND MC.PARENTH2 IN($parenth2)
                                AND FN.COMPANY IN($company)
                                AND FN.AUDITTRAIL LIKE '%MDL'
                                AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                AND FN.CATEGORY = '$category'
                                UNION
                                SELECT SUM(AMOUNT) as JUMLAH
                                FROM FINANCIAL FN
                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                WHERE MG.GL_ACCOUNT IN($account1)
                                AND MC.PARENTH2 IN($parenth2)
                                AND FN.COMPANY IN($company)
                                AND FN.AUDITTRAIL LIKE '%MDL'
                                AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                AND FN.CATEGORY = '$category'
                                UNION
                                SELECT SUM(AMOUNT) as JUMLAH
                                FROM FINANCIAL FN
                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                WHERE MG.GL_ACCOUNT IN($account2)
                                AND MC.PARENTH2 IN($parenth2cc)
                                AND FN.COMPANY IN($company)
                                AND FN.AUDITTRAIL LIKE '%MDL'
                                AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                AND FN.CATEGORY = '$category'
                                )");
        }
        
        return $data->row();
    }
    
    public function ga2_2000($parenth2, $fs_structure, $account, $company, $fiscal_year, $time2, $category){
        IF($category == "ACT"){
//            echo "SELECT SUM(JUMLAH) AS JUMLAH FROM
//                                    (
//                                    SELECT SUM(AMOUNT) as JUMLAH
//                                    FROM FINANCIAL FN
//                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
//                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//                                    WHERE MG.FS_STRUCTURE IN($fs_structure)
//                                    AND MC.PARENTH2 IN($parenth2)
//                                    AND FN.COMPANY IN($company)
//                                    AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
//                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
//                                    AND FN.CATEGORY = '$category'
//                                    UNION
//                                    SELECT SUM(AMOUNT) as JUMLAH
//                                    FROM FINANCIAL FN
//                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
//                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//                                    WHERE MG.GL_ACCOUNT IN($account)
//                                    AND MC.PARENTH2 IN($parenth2)
//                                    AND FN.COMPANY IN($company)
//                                    AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
//                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
//                                    AND FN.CATEGORY = '$category'
//                                    )"; exit;
            $data = $this->db->query("SELECT SUM(JUMLAH) AS JUMLAH FROM
                                    (
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.FS_STRUCTURE IN($fs_structure)
                                    AND MC.PARENTH2 IN($parenth2)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.GL_ACCOUNT IN($account)
                                    AND MC.PARENTH2 IN($parenth2)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    )");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT SUM(JUMLAH) AS JUMLAH FROM
                                    (
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.FS_STRUCTURE IN($fs_structure)
                                    AND MC.PARENTH2 IN($parenth2)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL = 'SAP_ECC'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.GL_ACCOUNT IN($account)
                                    AND MC.PARENTH2 IN($parenth2)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL = 'SAP_ECC'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.FS_STRUCTURE IN($fs_structure)
                                    AND MC.PARENTH2 IN($parenth2)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL LIKE '%MDL'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.GL_ACCOUNT IN($account)
                                    AND MC.PARENTH2 IN($parenth2)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL LIKE '%MDL'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    )");
        }
        
        return $data->row();
    }
    
    public function ga2_2000_7000($fs_structure, $fs_structure2, $parenth2, $parenth2cc, $parenth2sg, $account1, $account2, $account3, $company, $company2, $fiscal_year, $time2, $category){
        IF($category == "ACT"){
            $data = $this->db->query("SELECT SUM(JUMLAH) AS JUMLAH FROM
                                    (
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.FS_STRUCTURE IN($fs_structure)
                                    AND MC.PARENTH2 IN($parenth2)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.GL_ACCOUNT IN($account1)
                                    AND MC.PARENTH2 IN($parenth2)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.GL_ACCOUNT IN($account2)
                                    AND MC.PARENTH2 IN($parenth2cc)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.FS_STRUCTURE IN($fs_structure2)
                                    AND MC.PARENTH2 IN($parenth2sg)
                                    AND FN.COMPANY IN($company2)
                                    AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.GL_ACCOUNT IN($account3)
                                    AND MC.PARENTH2 IN($parenth2sg)
                                    AND FN.COMPANY IN($company2)
                                    AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    )");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT SUM(JUMLAH) AS JUMLAH FROM
                                    (
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.FS_STRUCTURE IN($fs_structure)
                                    AND MC.PARENTH2 IN($parenth2)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL = 'SAP_ECC'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.GL_ACCOUNT IN($account1)
                                    AND MC.PARENTH2 IN($parenth2)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL = 'SAP_ECC'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.GL_ACCOUNT IN($account2)
                                    AND MC.PARENTH2 IN($parenth2cc)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL = 'SAP_ECC'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.FS_STRUCTURE IN($fs_structure2)
                                    AND MC.PARENTH2 IN($parenth2sg)
                                    AND FN.COMPANY IN($company2)
                                    AND FN.AUDITTRAIL = 'SAP_ECC'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.GL_ACCOUNT IN($account3)
                                    AND MC.PARENTH2 IN($parenth2sg)
                                    AND FN.COMPANY IN($company2)
                                    AND FN.AUDITTRAIL = 'SAP_ECC'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.FS_STRUCTURE IN($fs_structure)
                                    AND MC.PARENTH2 IN($parenth2)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL LIKE '%MDL'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.GL_ACCOUNT IN($account1)
                                    AND MC.PARENTH2 IN($parenth2)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL LIKE '%MDL'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.GL_ACCOUNT IN($account2)
                                    AND MC.PARENTH2 IN($parenth2cc)
                                    AND FN.COMPANY IN($company)
                                    AND FN.AUDITTRAIL LIKE '%MDL'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.FS_STRUCTURE IN($fs_structure2)
                                    AND MC.PARENTH2 IN($parenth2sg)
                                    AND FN.COMPANY IN($company2)
                                    AND FN.AUDITTRAIL LIKE '%MDL'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    UNION
                                    SELECT SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MG.GL_ACCOUNT IN($account3)
                                    AND MC.PARENTH2 IN($parenth2sg)
                                    AND FN.COMPANY IN($company2)
                                    AND FN.AUDITTRAIL LIKE '%MDL'
                                    AND FN.FISCAL_YEAR_PERIOD BETWEEN '$fiscal_year' AND '$time2'
                                    AND FN.CATEGORY = '$category'
                                    )");
        }
        
        return $data->row();
    }
    
    
    //BATAS============================================================================================================================

    public function insert_data($CB, $company, $category, $time, $gl_account, $posting_date, $id_user, $nametable, $cstr_no) {
        $this->db->set('AMOUNT', $CB);
        $this->db->set('CATEGORY', "$category");
        $this->db->set('COMPANY', "$company");
        $this->db->set('FISCAL_YEAR_PERIOD', "$time");
        $this->db->set('CURRENCY', "LC");
        $this->db->set('FLOW', "CLOSING");
        $this->db->set('AUDITTRAIL', "CSTRU");
        $this->db->set('GL_ACCOUNT', "$gl_account");
        $this->db->set('COSTCENTER', "NC$company");
        $this->db->set('PROFIT_CENTER', "NPC$company");
        $this->db->set('INTERCO', "I_NONE");
        $this->db->set('DOCUMENT_TYPE', "NO_DOC");
        $this->db->set('POSTING_DATE', "to_date('$posting_date','yyyy/mm/dd hh24:mi:ss')", false);
        $this->db->set('CREATE_BY', $id_user);
        $this->db->set('CSTR_NO', $cstr_no);
        $res = $this->db->insert($nametable);
        return $res;
    }
    
    public function update_data($sql) {
        $res = $this->db->query($sql);
        return $res;
    }
    
    public function get_detail($fs, $company, $category, $time, $time2, $parent){
        $this->db->select('FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, MG.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT) AS NILAI');
        $this->db->from('FINANCIAL FN');
        $this->db->join('M_COSTCENTER MC', 'FN.COSTCENTER = MC.COST_CENTER');
        $this->db->join('M_GL_ACCOUNT MG', 'FN.GL_ACCOUNT = MG.GL_ACCOUNT');
        
        IF($category == "ACT"){
            $this->db->where_in('MC.PARENTH2', $parent);
            $this->db->where('FN.COMPANY', $company);
            $this->db->where_in('MG.FS_STRUCTURE', $fs);
            $this->db->where_in('FN.AUDITTRAIL', array('SAP_ECC','FINANCIAL_MDL'));
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
        }ELSE IF($category == "BUD"){
            $this->db->where_in('MC.PARENTH2', $parent);
            $this->db->where('FN.COMPANY', $company);
            $this->db->where_in('MG.FS_STRUCTURE', $fs);
            $this->db->where('FN.AUDITTRAIL', 'SAP_ECC');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
            $this->db->or_where_in('MC.PARENTH2', $parent);
            $this->db->where('FN.COMPANY', $company);
            $this->db->where_in('MG.FS_STRUCTURE', $fs);
            $this->db->like('FN.AUDITTRAIL', 'MDL', 'BEFORE');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
        }
        $this->db->group_by(array('FN.COSTCENTER','MC.DESCRIPTION', 'MG.GL_ACCOUNT','MG.DESCRIPTION'));
        
//        if($fs == "CEG09"){
//            echo $this->db->get_compiled_select(); exit;
//        }
        //echo $this->db->get_compiled_select(); exit;
        $data = $this->db->get();
        return $data->result();
    }
    public function get_detail_nc($fs, $company, $category, $time, $time2, $nc){
        $this->db->select('FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, MG.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT) AS NILAI');
        $this->db->from('FINANCIAL FN');
        $this->db->join('M_COSTCENTER MC', 'FN.COSTCENTER = MC.COST_CENTER');
        $this->db->join('M_GL_ACCOUNT MG', 'FN.GL_ACCOUNT = MG.GL_ACCOUNT');
        
        IF($category == "ACT"){
            $this->db->where('FN.COSTCENTER', $nc);
            $this->db->where('FN.COMPANY', $company);
            $this->db->where_in('MG.FS_STRUCTURE', $fs);
            $this->db->where_in('FN.AUDITTRAIL', array('SAP_ECC','FINANCIAL_MDL'));
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
        }ELSE IF($category == "BUD"){
            $this->db->where('FN.COSTCENTER', $nc);
            $this->db->where('FN.COMPANY', $company);
            $this->db->where_in('MG.FS_STRUCTURE', $fs);
            $this->db->where('FN.AUDITTRAIL', 'SAP_ECC');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
            $this->db->or_where('FN.COSTCENTER', $nc);
            $this->db->where('FN.COMPANY', $company);
            $this->db->where_in('MG.FS_STRUCTURE', $fs);
            $this->db->like('FN.AUDITTRAIL', 'MDL', 'BEFORE');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
        }
        $this->db->group_by(array('FN.COSTCENTER','MC.DESCRIPTION', 'MG.GL_ACCOUNT','MG.DESCRIPTION')); 
        $data = $this->db->get();
        return $data->result();
    }
    public function get_detail_nc_not($fs_structure, $company, $category, $time, $time2, $nc, $gl_not){
        $this->db->select('FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, MG.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT) AS NILAI');
        $this->db->from('FINANCIAL FN');
        $this->db->join('M_COSTCENTER MC', 'FN.COSTCENTER = MC.COST_CENTER');
        $this->db->join('M_GL_ACCOUNT MG', 'FN.GL_ACCOUNT = MG.GL_ACCOUNT');
        
        IF($category == "ACT"){
            $this->db->where_in('FN.COSTCENTER', $nc);
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where_in('MG.FS_STRUCTURE', $fs_structure);
            $this->db->where_in('FN.AUDITTRAIL', array('SAP_ECC','FINANCIAL_MDL'));
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
            $this->db->where_not_in('MG.GL_ACCOUNT', $gl_not);
        }ELSE IF($category == "BUD"){
            $this->db->where_in('FN.COSTCENTER', $nc);
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where_in('MG.FS_STRUCTURE', $fs_structure);
            $this->db->where('FN.AUDITTRAIL', 'SAP_ECC');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
            $this->db->where_not_in('MG.GL_ACCOUNT', $gl_not);
            $this->db->or_where_in('FN.COSTCENTER', $nc);
            $this->db->where_in('FN.COMPANY', $company);
            $this->db->where_in('MG.FS_STRUCTURE', $fs_structure);
            $this->db->like('FN.AUDITTRAIL', 'MDL', 'BEFORE');
            $this->db->where("FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'");
            $this->db->where('FN.CATEGORY', $category);
            $this->db->where_not_in('MG.GL_ACCOUNT', $gl_not);
        }
        $this->db->group_by(array('FN.COSTCENTER','MC.DESCRIPTION', 'MG.GL_ACCOUNT','MG.DESCRIPTION'));
        //echo $this->db->get_compiled_select(); exit;
        $data = $this->db->get();
        return $data->result();
    }
    public function get_data_c($nc, $company, $fs1, $fs2, $fs3, $time, $time2, $category, $parent1, $parent2, $parent3) {
        IF($category == "ACT"){
            $data = $this->db->query("SELECT COSTCENTER, GL_ACCOUNT, SUM(AMOUNT) AS NILAI FROM FINANCIAL FN
                              JOIN M_COSTCENTER MC
                              ON FN.COSTCENTER = MC.COST_CENTER
                              JOIN M_GL_ACCOUNT MG
                              ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                              WHERE FN.COSTCENTER != '$nc' AND
                              FN.COMPANY = '$company' AND
                              MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                              FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                              MC.PARENTH2 = '$parent1' AND
                              MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                              FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                                      MC.PARENTH2 = '$parent2' AND
                                      MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                                      FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                                      MC.PARENTH2 = '$parent3' AND
                                      MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                                      FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company'
                              GROUP BY COSTCENTER, GL_ACCOUNT");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT COSTCENTER, GL_ACCOUNT, SUM(AMOUNT) AS NILAI FROM FINANCIAL FN
                              JOIN M_COSTCENTER MC
                              ON FN.COSTCENTER = MC.COST_CENTER
                              JOIN M_GL_ACCOUNT MG
                              ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                              WHERE FN.COSTCENTER != '$nc' AND
                              FN.COMPANY = '$company' AND
                              MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                              FN.AUDITTRAIL = 'SAP_ECC' AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                              MC.PARENTH2 = '$parent1' AND
                              MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                              FN.AUDITTRAIL = 'SAP_ECC' AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                                      MC.PARENTH2 = '$parent2' AND
                                      MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                                      FN.AUDITTRAIL = 'SAP_ECC' AND
                                FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                                      MC.PARENTH2 = '$parent3' AND
                                      MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                                      FN.AUDITTRAIL = 'SAP_ECC' AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company'
                                      OR FN.COSTCENTER != '$nc' AND
                              FN.COMPANY = '$company' AND
                              MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                              FN.AUDITTRAIL LIKE '%MDL' AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                              MC.PARENTH2 = '$parent1' AND
                              MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                              FN.AUDITTRAIL LIKE '%MDL' AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                                      MC.PARENTH2 = '$parent2' AND
                                      MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                                      FN.AUDITTRAIL LIKE '%MDL' AND
                                FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                                      MC.PARENTH2 = '$parent3' AND
                                      MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                                      FN.AUDITTRAIL LIKE '%MDL' AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company'
                              GROUP BY COSTCENTER, GL_ACCOUNT");
        }
        return $data->result();
    }
    
    public function get_data_nc($nc, $company, $fs1, $fs2, $fs3, $time, $time2, $category, $parent1, $parent2, $parent3) {
        
        IF($category == "ACT"){
            $data = $this->db->query("SELECT COSTCENTER, GL_ACCOUNT, SUM(AMOUNT) AS NILAI FROM FINANCIAL FN
                              JOIN M_COSTCENTER MC
                              ON FN.COSTCENTER = MC.COST_CENTER
                              JOIN M_GL_ACCOUNT MG
                              ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                              WHERE FN.COSTCENTER = '$nc' AND
                              MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                              FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                              MC.PARENTH2 = '$parent1' AND
                              MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                              FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.COSTCENTER = '$nc' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                                      MC.PARENTH2 = '$parent2' AND
                                      MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                                      FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.COSTCENTER = '$nc' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                                      MC.PARENTH2 = '$parent3' AND
                                      MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                                      FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.COSTCENTER = '$nc' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company'
                              GROUP BY COSTCENTER, GL_ACCOUNT");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT COSTCENTER, GL_ACCOUNT, SUM(AMOUNT) AS NILAI FROM FINANCIAL FN
                              JOIN M_COSTCENTER MC
                              ON FN.COSTCENTER = MC.COST_CENTER
                              JOIN M_GL_ACCOUNT MG
                              ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                              WHERE FN.COSTCENTER = '$nc' AND
                              MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                              FN.AUDITTRAIL = 'SAP_ECC' AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                              MC.PARENTH2 = '$parent1' AND
                              MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                              FN.AUDITTRAIL = 'SAP_ECC' AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.COSTCENTER = '$nc' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                                      MC.PARENTH2 = '$parent2' AND
                                      MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                                      FN.AUDITTRAIL = 'SAP_ECC' AND
                                FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.COSTCENTER = '$nc' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                                      MC.PARENTH2 = '$parent3' AND
                                      MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                                      FN.AUDITTRAIL = 'SAP_ECC' AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.COSTCENTER = '$nc' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company'
                                      OR FN.COSTCENTER = '$nc' AND
                              MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                              FN.AUDITTRAIL LIKE '%MDL' AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                              MC.PARENTH2 = '$parent1' AND
                              MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                              FN.AUDITTRAIL LIKE '%MDL' AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.COSTCENTER = '$nc' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                                      MC.PARENTH2 = '$parent2' AND
                                      MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                                      FN.AUDITTRAIL LIKE '%MDL' AND
                                FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.COSTCENTER = '$nc' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company' OR
                                      MC.PARENTH2 = '$parent3' AND
                                      MG.FS_STRUCTURE IN ('$fs1','$fs2','$fs3') AND
                                      FN.AUDITTRAIL LIKE '%MDL' AND
                                      FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
                                      FN.COSTCENTER = '$nc' AND
                                      FN.CATEGORY = '$category' AND
                                      FN.COMPANY = '$company'
                              GROUP BY COSTCENTER, GL_ACCOUNT");
        }
        
        return $data->result();
    }
    
    //==========================QUERY 3000===========================================================================================
    public function get_value_ceg($parent, $fs_structure, $category, $time, $time2){
        IF($category == "ACT"){
//            IF($parent == 'H2_ST_BKTL'){
//                ECHO "SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
//               JOIN M_COSTCENTER MC
//               ON FN.COSTCENTER = MC.COST_CENTER
//               JOIN M_GL_ACCOUNT MG
//               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//               WHERE MC.PARENTH2 = '$parent' AND
//               MG.FS_STRUCTURE = '$fs_structure' AND
//               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
//               FN.CATEGORY = '$category' AND
//               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' "; EXIT;
//            }
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE MC.PARENTH2 = '$parent' AND
               MG.FS_STRUCTURE = '$fs_structure' AND
               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
               FN.CATEGORY = '$category' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' ");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE MC.PARENTH2 = '$parent' AND
               MG.FS_STRUCTURE = '$fs_structure' AND
               FN.AUDITTRAIL = 'SAP_ECC' AND
               FN.CATEGORY = '$category' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
               OR MC.PARENTH2 = '$parent' AND
               MG.FS_STRUCTURE = '$fs_structure' AND
               FN.AUDITTRAIL LIKE '%MDL' AND
               FN.CATEGORY = '$category' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' ");
        }
      
      return $data->row();
    }
    public function get_ceg_total_cs($parent, $fs_structure, $company, $category, $time, $time2){
        IF($category == "ACT"){
//            IF($fs_structure == "'CEG10', 'CEG11', 'CEG12', 'CEG99'" && $company == '4000'){
//                ECHO "SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
//               JOIN M_COSTCENTER MC
//               ON FN.COSTCENTER = MC.COST_CENTER
//               JOIN M_GL_ACCOUNT MG
//               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//               WHERE MG.FS_STRUCTURE IN ($fs_structure) AND
//               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
//               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
//               FN.COSTCENTER = '$parent' AND
//               FN.CATEGORY = '$category' AND
//               FN.COMPANY = '$company' "; EXIT;
//            }
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE MG.FS_STRUCTURE IN ($fs_structure) AND
               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               FN.COSTCENTER = '$parent' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE MG.FS_STRUCTURE IN ($fs_structure) AND
               FN.AUDITTRAIL = 'SAP_ECC' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               FN.COSTCENTER = '$parent' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company'
               OR MG.FS_STRUCTURE IN ($fs_structure) AND
               FN.AUDITTRAIL LIKE '%MDL' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               FN.COSTCENTER = '$parent' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }
      
      return $data->row();
    }
    public function get_in_account_nc($cc, $account, $company, $category, $time, $time2){
        IF($category == "ACT"){
//            IF($account == "'61310001', '61310003', '65210003', '65410001'" && $company == '4000'){
//                echo "SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
//               JOIN M_COSTCENTER MC
//               ON FN.COSTCENTER = MC.COST_CENTER
//               JOIN M_GL_ACCOUNT MG
//               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//               WHERE FN.COSTCENTER = '$cc' AND
//               FN.GL_ACCOUNT IN ($account) AND
//               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
//               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
//               FN.CATEGORY = '$category' AND
//               FN.COMPANY = '$company' "; exit;
//            }
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE FN.COSTCENTER = '$cc' AND
               FN.GL_ACCOUNT IN ($account) AND
               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE FN.COSTCENTER = '$cc' AND
               FN.GL_ACCOUNT IN ($account) AND
               FN.AUDITTRAIL = 'SAP_ECC' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company'
               OR FN.COSTCENTER = '$cc' AND
               FN.GL_ACCOUNT IN ($account) AND
               FN.AUDITTRAIL LIKE '%MDL' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }
    	
        return $data->row();
    }
    public function get_total_gl($gl, $company, $category, $time, $time2, $parent, $nc){
        IF($category == "ACT"){
//            ECHO "SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
//               JOIN M_COSTCENTER MC
//               ON FN.COSTCENTER = MC.COST_CENTER
//               JOIN M_GL_ACCOUNT MG
//               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//               WHERE FN.COSTCENTER = '$nc' AND
//               FN.GL_ACCOUNT = '$gl' AND
//               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
//               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
//               FN.CATEGORY = '$category' AND
//               FN.COMPANY = '$company' OR
//               FN.GL_ACCOUNT = '$gl' AND
//               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
//               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
//               MC.PARENTH2 IN ('$parent') AND
//               FN.CATEGORY = '$category' AND
//               FN.COMPANY = '$company'"; EXIT;
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE FN.COSTCENTER = '$nc' AND
               FN.GL_ACCOUNT = '$gl' AND
               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' OR
               FN.GL_ACCOUNT = '$gl' AND
               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 IN ('$parent') AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE FN.COSTCENTER = '$nc' AND
               FN.GL_ACCOUNT = '$gl' AND
               FN.AUDITTRAIL = 'SAP_ECC' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' OR
               FN.GL_ACCOUNT = '$gl' AND
               FN.AUDITTRAIL = 'SAP_ECC' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 IN ('$parent') AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company'
               OR FN.COSTCENTER = '$nc' AND
               FN.GL_ACCOUNT = '$gl' AND
               FN.AUDITTRAIL LIKE '%MDL' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' OR
               FN.GL_ACCOUNT = '$gl' AND
               FN.AUDITTRAIL LIKE '%MDL' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 IN ('$parent') AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }
      
      return $data->row();
    }
    public function get_prd_ceg($fs_structure, $company, $category, $time, $time2, $parent){
        IF($category == "ACT"){
//            IF($fs_structure == '68340002' && $company == '4000'){
//                echo "SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
//               JOIN M_COSTCENTER MC
//               ON FN.COSTCENTER = MC.COST_CENTER
//               JOIN M_GL_ACCOUNT MG
//               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//               WHERE MG.FS_STRUCTURE = '$fs_structure' AND
//               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
//               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
//               MC.PARENTH2 IN ('$parent') AND
//               FN.CATEGORY = '$category' AND
//               FN.COMPANY = '$company' "; exit;
//            }
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE MG.FS_STRUCTURE = '$fs_structure' AND
               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 IN ('$parent') AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE MG.FS_STRUCTURE = '$fs_structure' AND
               FN.AUDITTRAIL = 'SAP_ECC' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 IN ('$parent') AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company'
               OR MG.FS_STRUCTURE = '$fs_structure' AND
               FN.AUDITTRAIL LIKE '%MDL' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 IN ('$parent') AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }
      return $data->row();
    }
    public function get_value_fs_cs($fs_structure, $company, $category, $time, $time2, $cs){
        IF($category == "ACT"){
//            IF($fs_structure == 'CEG08' && $company == '3000'){
//                echo "SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
//               JOIN M_COSTCENTER MC
//               ON FN.COSTCENTER = MC.COST_CENTER
//               JOIN M_GL_ACCOUNT MG
//               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//               WHERE MG.FS_STRUCTURE = '$fs_structure' AND
//               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
//               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
//               FN.COSTCENTER = '$cs' AND
//               FN.CATEGORY = '$category' AND
//               FN.COMPANY = '$company' "; exit;
//            }
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE MG.FS_STRUCTURE = '$fs_structure' AND
               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               FN.COSTCENTER = '$cs' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE MG.FS_STRUCTURE = '$fs_structure' AND
               FN.AUDITTRAIL = 'SAP_ECC' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               FN.COSTCENTER = '$cs' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company'
               OR MG.FS_STRUCTURE = '$fs_structure' AND
               FN.AUDITTRAIL LIKE '%MDL' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               FN.COSTCENTER = '$cs' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }
      
      return $data->row();
    }
    public function get_ceg_total_PARENTH2($parent, $fs_structure, $company, $category, $time, $time2){
        IF($category == "ACT"){
//            IF($parent == 'H2_ST_BTG'){
//                ECHO "SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
//               JOIN M_COSTCENTER MC
//               ON FN.COSTCENTER = MC.COST_CENTER
//               JOIN M_GL_ACCOUNT MG
//               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//               WHERE MG.FS_STRUCTURE IN ($fs_structure) AND
//               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
//               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
//               MC.PARENTH2 = '$parent' AND
//               FN.CATEGORY = '$category' AND
//               FN.COMPANY = '$company' "; EXIT;
//            }
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE MG.FS_STRUCTURE IN ($fs_structure) AND
               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 = '$parent' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE MG.FS_STRUCTURE IN ($fs_structure) AND
               FN.AUDITTRAIL = 'SAP_ECC' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 = '$parent' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company'
               OR MG.FS_STRUCTURE IN ($fs_structure) AND
               FN.AUDITTRAIL LIKE '%MDL' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 = '$parent' AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }
      
      return $data->row();
    }
    public function get_account_prod($account, $company, $category, $time, $time2, $parent){
        IF($category == "ACT"){
//            IF($account == '62210003'){
//                echo "SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
//               JOIN M_COSTCENTER MC
//               ON FN.COSTCENTER = MC.COST_CENTER
//               JOIN M_GL_ACCOUNT MG
//               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//               WHERE FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
//               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
//               MC.PARENTH2 IN ('$parent') AND
//               FN.CATEGORY = '$category' AND
//               FN.COMPANY = '$company' AND
//               FN.GL_ACCOUNT = '$account' "; exit;
//            }
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 IN ('$parent') AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' AND
               FN.GL_ACCOUNT = '$account' ");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE FN.AUDITTRAIL = 'SAP_ECC' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 IN ('$parent') AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' AND
               FN.GL_ACCOUNT = '$account'
               OR FN.AUDITTRAIL LIKE '%MDL' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 IN ('$parent') AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' AND
               FN.GL_ACCOUNT = '$account' ");
        }
      
      return $data->row();
    }
    public function get_in_ceg_grp($fs_structure, $company, $category, $time, $time2, $parent){
        IF($category == "ACT"){
//            ECHO "SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
//               JOIN M_COSTCENTER MC
//               ON FN.COSTCENTER = MC.COST_CENTER
//               JOIN M_GL_ACCOUNT MG
//               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
//               WHERE MG.FS_STRUCTURE IN ($fs_structure) AND
//               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
//               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
//               MC.PARENTH2 IN ('$parent') AND
//               FN.CATEGORY = '$category' AND
//               FN.COMPANY = '$company' "; EXIT;
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE MG.FS_STRUCTURE IN ($fs_structure) AND
               FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 IN ('$parent') AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }ELSE IF($category == "BUD"){
            $data = $this->db->query("SELECT SUM(AMOUNT) as JUMLAH FROM FINANCIAL FN
               JOIN M_COSTCENTER MC
               ON FN.COSTCENTER = MC.COST_CENTER
               JOIN M_GL_ACCOUNT MG
               ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
               WHERE MG.FS_STRUCTURE IN ($fs_structure) AND
               FN.AUDITTRAIL = 'SAP_ECC' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 IN ('$parent') AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company'
               OR MG.FS_STRUCTURE IN ($fs_structure) AND
               FN.AUDITTRAIL LIKE '%MDL' AND
               FN.FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2' AND
               MC.PARENTH2 IN ('$parent') AND
               FN.CATEGORY = '$category' AND
               FN.COMPANY = '$company' ");
        }
      
      return $data->row();
    }
    
    public function detail_coststructure($time, $time2, $status, $name_mv, $no){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM MV_COSTSTRUCTURE_$name_mv
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    AND NOMOR = '$no'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    
    public function detail_coststructure_subsidiary($time, $time2, $no, $group, $account, $company, $category){
        if($company == 'G200' || $company == 'G500'){
            if($group == '1'){
                $groupo_in = "'1','12','13','123'";
            }else if($group == '2'){
                $groupo_in = "'2','12','23','123'";
            }else{
                $groupo_in = "'3','13','23','123'";
            }
            $data = $this->db->query("SELECT
                                            COSTCENTER,
                                            DESCRIPTION AS DESCRIPTION1,
                                            GL_ACCOUNT,
                                            DESCRIPTION2,
                                            TO_CHAR (
                                                SUM (AMOUNT),
                                                '999,999,999,999,999'
                                            ) AS NILAI
                                    FROM
                                            MV_COSTSTRUCTURE_SUB
                                    WHERE
                                            FISCAL_YEAR_PERIOD BETWEEN '$time'
                                    AND '$time2'
                                    AND COST_GROUP_C = '$group'
                                    AND COST_GROUP IN ($groupo_in)
                                    AND STRUCTURE = '$account'
                                    AND COMPANY = '$company'
                                    AND CATEGORY = '$category'
                                    GROUP BY
                                            COSTCENTER,
                                            DESCRIPTION,
                                            GL_ACCOUNT,
                                            DESCRIPTION2
                                    ORDER BY
                                            COSTCENTER, GL_ACCOUNT");
        }ELSE{
            $data = $this->db->query("SELECT GL_ACCOUNT,
                                            DESCRIPTION2,
                                            TO_CHAR ( SUM (AMOUNT), '999,999,999,999,999' ) AS NILAI
                                    FROM MV_COSTSTRUCTURE_SUB
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COST_GROUP = '$group'
                                    AND STRUCTURE = '$account'
                                    AND COMPANY = '$company'
                                    AND CATEGORY = '$category'
                                    GROUP BY GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY GL_ACCOUNT");
        }
        return $data->result();
    }
    
    public function detail_gabungan($time, $time2, $status, $name_mv, $no){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(NILAI),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, SUM(JUMLAH) AS NILAI FROM MV_COSTSTRUCTURE_$name_mv[0]
                                                                        WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                                                        AND COSTCENTER $status LIKE 'NC%'
                                                                        AND NOMOR = '$no'
                                                                        GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    UNION
                                    SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, SUM(JUMLAH) AS NILAI FROM MV_COSTSTRUCTURE_$name_mv[1]
                                                                        WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                                                        AND COSTCENTER $status LIKE 'NC%'
                                                                        AND NOMOR = '$no'
                                                                        GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    )
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    
    public function detail_variance_7000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT '13' AS NOMOR, 'Variance' AS DESCRIPTION, FN1.COMPANY, FN1.FISCAL_YEAR_PERIOD, FN1.CATEGORY, FN1.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN1.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, (NVL(SUM(AMOUNT), 0)-(SELECT NVL(SUM(AMOUNT), 0) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE FN.COSTCENTER IN('NC7000')
                                    AND FN.COMPANY IN('7000')
                                    AND MG.FS_STRUCTURE IN('CEG08')
                                    AND FN.AUDITTRAIL IN('SAP_ECC', 'FINANCIAL_MDL')
                                    AND FN.FISCAL_YEAR_PERIOD = FN1.FISCAL_YEAR_PERIOD
                                    AND FN.CATEGORY = 'ACT'
                                    AND MG.GL_ACCOUNT NOT IN('64220003', '67310001', '67520001')
                                    OR MC.PARENTH2 IN('H2_PRD_VOSMIG', 'H2_SUP_DIRECT_VOSMIG', 'H2_SUP_INDIRECT_VOSMIG', 'H2_SLS_DIST'
                                    , 'H2_GA')
                                    AND FN.COMPANY IN('7000')
                                    AND MG.FS_STRUCTURE IN('CEG08')
                                    AND FN.AUDITTRAIL IN('SAP_ECC', 'FINANCIAL_MDL')
                                    AND FN.FISCAL_YEAR_PERIOD = FN1.FISCAL_YEAR_PERIOD
                                    AND FN.CATEGORY = 'ACT')-(SELECT NVL(SUM(AMOUNT), 0) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE FN.COSTCENTER IN('NC7000')
                                    AND MG.FS_STRUCTURE IN('CEG01', 'CEG02', 'CEG03', 'CEG04', 'CEG05', 'CEG06', 'CEG07', 'CEG09', 'CEG10'
                                    , 'CEG11', 'CEG12', 'CEG13')
                                    AND FN.COMPANY IN('7000')
                                    AND FN.AUDITTRAIL IN('SAP_ECC', 'FINANCIAL_MDL')
                                    AND FN.FISCAL_YEAR_PERIOD = FN1.FISCAL_YEAR_PERIOD
                                    AND FN.CATEGORY = 'ACT'
                                    OR MG.FS_STRUCTURE IN('CEG01', 'CEG02', 'CEG03', 'CEG04', 'CEG05', 'CEG06', 'CEG07', 'CEG09', 'CEG10'
                                    , 'CEG11', 'CEG12', 'CEG13')
                                    AND MC.PARENTH2 IN('H2_PRD_VOSMIG', 'H2_SUP_DIRECT_VOSMIG', 'H2_SUP_INDIRECT_VOSMIG', 'H2_SLS_DIST'
                                    , 'H2_GA')
                                    AND FN.COMPANY IN('7000')
                                    AND FN.AUDITTRAIL IN('SAP_ECC', 'FINANCIAL_MDL')
                                    AND FN.FISCAL_YEAR_PERIOD = FN1.FISCAL_YEAR_PERIOD
                                    AND FN.CATEGORY = 'ACT')) as JUMLAH
                                    FROM FINANCIAL FN1
                                    JOIN M_COSTCENTER MC ON FN1.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN1.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE FN1.COSTCENTER IN('NC7000')
                                    AND MG.FS_STRUCTURE IN('HPP01', 'HPP02', 'HPP03')
                                    AND FN1.COMPANY IN('7000')
                                    AND FN1.AUDITTRAIL IN('SAP_ECC', 'FINANCIAL_MDL')
                                    AND FN1.CATEGORY = 'ACT'
                                    OR MG.FS_STRUCTURE IN('HPP01', 'HPP02', 'HPP03')
                                    AND MC.PARENTH2 IN('H2_PRD_VOSMIG', 'H2_SUP_DIRECT_VOSMIG', 'H2_SUP_INDIRECT_VOSMIG', 'H2_SLS_DIST'
                                    , 'H2_GA')
                                    AND FN1.COMPANY IN('7000')
                                    AND FN1.AUDITTRAIL IN('SAP_ECC', 'FINANCIAL_MDL')
                                    AND FN1.CATEGORY = 'ACT'
                                    GROUP BY FN1.COMPANY, FN1.FISCAL_YEAR_PERIOD, FN1.CATEGORY, FN1.COSTCENTER, MC.DESCRIPTION, FN1.GL_ACCOUNT, MG.DESCRIPTION
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    public function detail_general2_7000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM
                                (
                                SELECT '24' AS NOMOR, 'General & Adminitration' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, AMOUNT as JUMLAH
                                FROM FINANCIAL FN
                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                WHERE MG.FS_STRUCTURE IN('CEG08','CEG01','CEG11','CEG12','CEG13','CEG99'
)
                                AND MC.PARENTH2 IN('H2_GA_VOSMI')
                                AND FN.COMPANY IN(7000)
                                AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                AND FN.CATEGORY = 'ACT'
                                UNION
                                SELECT '24' AS NOMOR, 'General & Adminitration' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, AMOUNT as JUMLAH
                                FROM FINANCIAL FN
                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                WHERE MG.GL_ACCOUNT IN('67710004','67890001')
                                AND MC.PARENTH2 IN('H2_GA_VOSMI')
                                AND FN.COMPANY IN(7000)
                                AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                AND FN.CATEGORY = 'ACT'
                                UNION
                                SELECT '24' AS NOMOR, 'General & Adminitration' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, AMOUNT as JUMLAH
                                FROM FINANCIAL FN
                                JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                WHERE MG.GL_ACCOUNT IN('64220003','67310001','67520001')
                                AND MC.PARENTH2 IN('H2_NOCC')
                                AND FN.COMPANY IN(7000)
                                AND FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL')
                                AND FN.CATEGORY = 'ACT'
                                )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    
    public function detail_general2_3000_act($time, $time2, $status){
        $data = $this->db->query("SELECT * FROM (
                                    SELECT * FROM MV_CS_3000_ACT_GENERAL2_D
                                    UNION
                                    SELECT '24' AS NOMOR, 'General & Adminitration' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT) as JUMLAH
                                    FROM FINANCIAL FN
                                    JOIN M_COSTCENTER MC ON FN.COSTCENTER = MC.COST_CENTER
                                    JOIN M_GL_ACCOUNT MG ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                    WHERE MC.PARENTH2 IN('H2_GA_SP')
                                    AND FN.COMPANY IN('3000')
                                    AND FN.GL_ACCOUNT IN('66110001')
                                    AND FN.AUDITTRAIL IN('SAP_ECC', 'FINANCIAL_MDL')
                                    AND FN.CATEGORY = 'ACT'
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    public function detail_fuel_3000_act($time, $time2, $time3, $time4, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT * FROM MV_CS_3000_ACT_FUEL_D
                                    UNION
                                    SELECT '03' AS NOMOR, 'Fuel' AS DESCRIPTION, '3000' AS COMPANY, '' AS FISCAL_YEAR_PERIOD, 'ACT' AS CATEGORY, '' AS COSTCENTER, 'Batubara' AS DESCRIPTION1, '' AS GL_ACCOUNT, 'Batubara' AS DESCRIPTION2, JUMLAH FROM (
                                    SELECT (SUM(AMOUNT)-(
                                                                            SELECT SUM(AMOUNT) FROM PRODUCTION PR
                                                                            JOIN M_MATERIAL MM
                                                                            ON PR.MATERIAL = MM.MATERIAL
                                                                            WHERE PR.MATERIAL = '112_100_0011'
                                                                            AND PR.GL_ACCOUNT = 'CLS_INV_AMT'
                                                                            AND FISCAL_YEAR_PERIOD BETWEEN '$time3' AND '$time4'
                                                                            AND PR.CATEGORY = 'ACT'
                                                                            AND COMPANY = '3000'
                                                                            GROUP BY PR.MATERIAL
                                                                    )) AS JUMLAH from PRODUCTION PR
                                                                    JOIN M_MATERIAL MM
                                                                    ON PR.MATERIAL = MM.MATERIAL
                                                                    WHERE PR.MATERIAL = '112_100_0011'
                                                                    AND PR.GL_ACCOUNT = 'CLS_INV_AMT'
                                                                    AND FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                                                    AND PR.CATEGORY = 'ACT'
                                                                    AND COMPANY = '3000'
                                                                    GROUP BY PR.MATERIAL
                                    )
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    
    public function detail_raw_3000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT * FROM MV_CS_3000_ACT_RAW_D
                                    UNION
                                    SELECT '01' AS NOMOR, 'Raw Material' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT)*-1 as JUMLAH FROM FINANCIAL FN
                                                   JOIN M_COSTCENTER MC
                                                   ON FN.COSTCENTER = MC.COST_CENTER
                                                   JOIN M_GL_ACCOUNT MG
                                                   ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                                   WHERE MG.FS_STRUCTURE IN ('CEG04', 'CEG05', 'CEG06', 'CEG07', 'CEG08') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.COSTCENTER = 'H2_SP_BS_SCE' AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '3000' 
                                                                                            OR FN.COSTCENTER = '3102223001' AND
                                                   FN.GL_ACCOUNT IN ('67630003', '67610002') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '3000' 
                                                                                            OR MG.FS_STRUCTURE IN ('CEG04', 'CEG05', 'CEG06', 'CEG07', 'CEG08') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.COSTCENTER = 'H2_SP_BK_SCE' AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '3000' 
                                                                                            OR FN.COSTCENTER = '3102221001' AND
                                                   FN.GL_ACCOUNT IN ('67630001', '67630002', '67610002') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '3000' 
                                                                                            OR FN.COSTCENTER IN('NC3000')
                                                                                            AND FN.COMPANY IN('3000')
                                                                                            AND FN.GL_ACCOUNT IN('65310002')
                                                                                            AND FN.AUDITTRAIL IN('SAP_ECC', 'FINANCIAL_MDL')
                                                                                            AND FN.CATEGORY = 'ACT'
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    
    public function detail_raw_4000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT * FROM MV_CS_4000_ACT_RAW_D
                                    UNION
                                    SELECT '01' AS NOMOR, 'Raw Material' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT)*0.125 as JUMLAH FROM FINANCIAL FN
                                                   JOIN M_COSTCENTER MC
                                                   ON FN.COSTCENTER = MC.COST_CENTER
                                                   JOIN M_GL_ACCOUNT MG
                                                   ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                                   WHERE MG.FS_STRUCTURE IN ('CEG01', 'CEG02', 'CEG03', 'CEG04', 'CEG05', 'CEG06', 'CEG07'
                                    , 'CEG08', 'CEG10', 'CEG11', 'CEG12', 'CEG13') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.COSTCENTER = '4102100000' AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '4000' 
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    public function detail_sup_4000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT * FROM MV_CS_4000_ACT_SUP_D
                                    UNION
                                    SELECT '02' AS NOMOR, 'Supporting Material' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT)*0.875 as JUMLAH FROM FINANCIAL FN
                                                   JOIN M_COSTCENTER MC
                                                   ON FN.COSTCENTER = MC.COST_CENTER
                                                   JOIN M_GL_ACCOUNT MG
                                                   ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                                   WHERE MG.FS_STRUCTURE IN ('CEG02') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.COSTCENTER = '4102100000' AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '4000' 
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION 
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    public function detail_fuel_4000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT * FROM MV_CS_4000_ACT_FUEL_D
                                    UNION
                                    SELECT '03' AS NOMOR, 'Fuel' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT)*0.875 as JUMLAH FROM FINANCIAL FN
                                                   JOIN M_COSTCENTER MC
                                                   ON FN.COSTCENTER = MC.COST_CENTER
                                                   JOIN M_GL_ACCOUNT MG
                                                   ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                                   WHERE MG.FS_STRUCTURE IN ('CEG03') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.COSTCENTER = '4102100000' AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '4000' 
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION 
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    public function detail_elec_4000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT * FROM MV_CS_4000_ACT_ELEC_D
                                    UNION
                                    SELECT '04' AS NOMOR, 'Electricity' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT)*0.875 as JUMLAH FROM FINANCIAL FN
                                                   JOIN M_COSTCENTER MC
                                                   ON FN.COSTCENTER = MC.COST_CENTER
                                                   JOIN M_GL_ACCOUNT MG
                                                   ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                                   WHERE MG.FS_STRUCTURE IN ('CEG04') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.COSTCENTER = '4102100000' AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '4000' 
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION 
                                    UNION
                                    SELECT '04' AS NOMOR, 'Electricity' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT)*-1 as JUMLAH FROM FINANCIAL FN
                                                   JOIN M_COSTCENTER MC
                                                   ON FN.COSTCENTER = MC.COST_CENTER
                                                   JOIN M_GL_ACCOUNT MG
                                                   ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                                   WHERE FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   MC.PARENTH2 IN ('H2_PRD_ST','H2_SUP_DIRECT_ST','H2_SUP_INDIRECT_ST') AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '4000' AND
                                                   FN.GL_ACCOUNT = '62210003'
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION 
                                    ) 
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    public function detail_labor_4000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT * FROM MV_CS_4000_ACT_LABOR_D
                                    UNION
                                    SELECT '05' AS NOMOR, 'Labor' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT)*0.875 as JUMLAH FROM FINANCIAL FN
                                                   JOIN M_COSTCENTER MC
                                                   ON FN.COSTCENTER = MC.COST_CENTER
                                                   JOIN M_GL_ACCOUNT MG
                                                   ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                                   WHERE MG.FS_STRUCTURE IN ('CEG05') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.COSTCENTER = '4102100000' AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '4000' 
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    
    public function detail_maint_4000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT * FROM MV_CS_4000_ACT_MAINT_D
                                    UNION
                                    SELECT '06' AS NOMOR, 'Maintenance' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT)*0.875 as JUMLAH FROM FINANCIAL FN
                                                   JOIN M_COSTCENTER MC
                                                   ON FN.COSTCENTER = MC.COST_CENTER
                                                   JOIN M_GL_ACCOUNT MG
                                                   ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                                   WHERE MG.FS_STRUCTURE = 'CEG06' AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   MC.PARENTH2 IN ('H2_PRD_ST','H2_SUP_DIRECT_ST','H2_SUP_INDIRECT_ST') AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '4000' 
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    public function detail_depl_4000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT * FROM MV_CS_4000_ACT_DEPL_D
                                    UNION
                                    SELECT '07' AS NOMOR, 'Depl. Deprec. and Amortization' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT)*0.875 as JUMLAH FROM FINANCIAL FN
                                                   JOIN M_COSTCENTER MC
                                                   ON FN.COSTCENTER = MC.COST_CENTER
                                                   JOIN M_GL_ACCOUNT MG
                                                   ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                                   WHERE MG.FS_STRUCTURE IN ('CEG07') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.COSTCENTER = '4102100000' AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '4000'
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION 
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    public function detail_general_4000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT * FROM MV_CS_4000_ACT_GENERAL_D
                                    UNION
                                    SELECT '08' AS NOMOR, 'General & Adminitration' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT)*0.875 as JUMLAH FROM FINANCIAL FN
                                                   JOIN M_COSTCENTER MC
                                                   ON FN.COSTCENTER = MC.COST_CENTER
                                                   JOIN M_GL_ACCOUNT MG
                                                   ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                                   WHERE MG.FS_STRUCTURE IN ('CEG08') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.COSTCENTER = '4102100000' AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '4000' 
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION 
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    public function detail_pack_4000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT * FROM MV_CS_4000_ACT_PACK_D
                                    UNION
                                    SELECT '11' AS NOMOR, 'Packaging' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT)*0.875 as JUMLAH FROM FINANCIAL FN
                                                   JOIN M_COSTCENTER MC
                                                   ON FN.COSTCENTER = MC.COST_CENTER
                                                   JOIN M_GL_ACCOUNT MG
                                                   ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                                   WHERE MG.FS_STRUCTURE IN ('CEG10') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.COSTCENTER = '4102100000' AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '4000'
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION 
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
    public function detail_dist_4000_act($time, $time2, $status){
        $data = $this->db->query("SELECT COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2, TO_CHAR(SUM(JUMLAH),'999,999,999,999,999') AS NILAI FROM (
                                    SELECT * FROM MV_CS_4000_ACT_DIST_D
                                    UNION
                                    SELECT '12' AS NOMOR, 'Distribution' AS DESCRIPTION, FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION AS DESCRIPTION1, FN.GL_ACCOUNT, MG.DESCRIPTION AS DESCRIPTION2, SUM(AMOUNT)*0.875 as JUMLAH FROM FINANCIAL FN
                                                   JOIN M_COSTCENTER MC
                                                   ON FN.COSTCENTER = MC.COST_CENTER
                                                   JOIN M_GL_ACCOUNT MG
                                                   ON FN.GL_ACCOUNT = MG.GL_ACCOUNT
                                                   WHERE MG.FS_STRUCTURE IN ('CEG10', 'CEG11', 'CEG12', 'CEG99') AND
                                                   FN.AUDITTRAIL IN ('SAP_ECC','FINANCIAL_MDL') AND
                                                   FN.COSTCENTER = '4102100000' AND
                                                   FN.CATEGORY = 'ACT' AND
                                                   FN.COMPANY = '4000'
                                    GROUP BY FN.COMPANY, FN.FISCAL_YEAR_PERIOD, FN.CATEGORY, FN.COSTCENTER, MC.DESCRIPTION, FN.GL_ACCOUNT, MG.DESCRIPTION 
                                    )
                                    WHERE FISCAL_YEAR_PERIOD BETWEEN '$time' AND '$time2'
                                    AND COSTCENTER $status LIKE 'NC%'
                                    GROUP BY COSTCENTER, DESCRIPTION1, GL_ACCOUNT, DESCRIPTION2
                                    ORDER BY COSTCENTER, GL_ACCOUNT");
        return $data->result();
    }
	
    public function get_logo ($select, $comp){
            if($comp == "20007000" || $comp = "50007000"){
                $comp = "2000";
            }
            $query = $this->db->query("SELECT $select FROM M_COMPANY WHERE COMPANY = '$comp'");
            return $query->result_array();
	}
    
}

?>