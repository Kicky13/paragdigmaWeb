<?php

if (!defined('BASEPATH'))
    exit('Anda tidak masuk dengan benar');

class mcost_sheet extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('devsi', true);
    }

    public function get_detail_material($mat) {
        $dt = $this->db->select("M1.PRODUCT, M2.DESCRIPTION AS DESC1, M1.MATERIAL, M1.DESCRIPTION AS DESC2")
                ->from("M_INGREDIENT M1")
                ->join('M_MATERIAL M2', 'M1.PRODUCT = M2.MATERIAL', 'left')
                ->where_in('M1.PRODUCT', $mat)
                ->order_by('PRODUCT, MATERIAL')
                ->get();

        $data['DATA_PRODUCT'] = array();
        $data['DATA_MATERIAL'] = array();
        foreach ($dt->result() as $d) {
            $data['DATA_PRODUCT'][$d->PRODUCT] = $d->DESC1;
            $data['DATA_MATERIAL'][$d->PRODUCT][$d->MATERIAL] = $d->DESC2;
        }
        return $data;
    }

    public function get_category() {
        $data = $this->db->SELECT('CATEGORY,DESCRIPTION')
                        ->FROM('M_CATEGORY')
                        ->WHERE('VERSION_PARENT', '1')
                        ->get()->result();

        foreach ($data as $k => $v) {
            if ($v->CATEGORY == 'BUD') {
                $ret[] = array('CATEGORY' => 'BUD', 'DESCRIPTION' => 'Budget', 'selected' => true);
            } else {
                $ret[] = array('CATEGORY' => $v->CATEGORY, 'DESCRIPTION' => $v->DESCRIPTION);
            }
        }
        return $ret;
    }

    function get_column($comp, $mat) {
        return $this->db->distinct()
                        ->select("MWM.PLANT, DESCRIPTION")
                        ->from("M_WORKCENTER_MATERIAL MWM")
                        ->join("M_PLANT MP", "MWM.PLANT = MP.PLANT", "left")
                        ->where("MWM.COMPANY", $comp)
                        ->where("MATERIAL_PRODUCT", $mat)
                        ->order_by("MWM.PLANT")->get()->result();
    }

    public function get_parent($parent) {
        return $this->db->select("M1.PRODUCT, M2.DESCRIPTION AS DESC1, M1.MATERIAL, M1.DESCRIPTION AS DESC2")
                        ->from("M_INGREDIENT M1")
                        ->join('M_MATERIAL M2', 'M1.PRODUCT = M2.MATERIAL', 'left')
                        ->where_in('M1.PRODUCT', $parent)
                        ->order_by('PRODUCT, MATERIAL')
                        ->get()
                        ->result();
    }

    function get_material($comp) {
        $dt = $this->db->distinct()
                        ->select("MATERIAL_PRODUCT AS MATERIAL, DESCRIPTION")
                        ->from("M_WORKCENTER_MATERIAL MWM")
                        ->join("M_MATERIAL MM", "MWM.MATERIAL_PRODUCT = MM.MATERIAL")
                        ->where("MWM.COMPANY", $comp)
                        ->order_by("MATERIAL_PRODUCT")->get()->result_array();
        $data = array();
        foreach ($dt as $k => $v) {
            $data[$k] = $v;
            if ($k == 0) {
                $data[$k]['selected'] = true;
            }
        }
        return $data;
    }

    //IWAN EDIT
    public function get_val_act($post) {
        $year = substr($post['eyear'], 0, 4);
        $month = substr($post['eyear'], 5, 2) * 1;
        return $this->db->query("
            ----------------------- Material Consumption ----------------------------
            SELECT
                'MC' AS TTL,
                MATERIAL AS ID,
                PLANT_TO,
                SUM(CN_BEWER) * SUM(CN_QTY) AS COST,
                SUM(CN_QTY) AS QTY 
            FROM
                PRODUCTION A
                LEFT JOIN CKM3N B ON A .MATERIAL = B.MATNR
                AND A .PLANT = B.BWKEY
                AND BDATJ = '$year'
                AND POPER = $month
            WHERE
                SUBSTR(PLANT_TO, 0, 1) = '" . substr($post['ecomp'], 0, 1) . "'
                AND FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
                AND MATERIAL_PRODUCT = '" . $post['emat'] . "'
            GROUP BY
                MATERIAL,
                PLANT_TO
            --------------------------------------------------------------------------
        UNION ALL
            SELECT
                TTL,
                ID,
                PLANT,
                SUM (TOTAL) AS COST,
                0 AS QTY
            FROM(
            ----------------------- Operational Cost ----------------------------------
		SELECT 'OC' AS TTL, '0' AS ID, 'CEG03' AS FS_STRUCTURE2 FROM dual UNION
                SELECT 'OC' AS TTL, '1' AS ID, 'CEG01' AS FS_STRUCTURE2 FROM dual UNION
                SELECT 'OC' AS TTL, '2' AS ID, 'CEG02' AS FS_STRUCTURE2 FROM dual UNION
		SELECT 'OC' AS TTL, '3' AS ID, 'CEG10' AS FS_STRUCTURE2 FROM dual UNION
		SELECT 'OC' AS TTL, '4' AS ID, 'CEG04' AS FS_STRUCTURE2 FROM dual UNION
		SELECT 'OC' AS TTL, '5' AS ID, 'CEG11' AS FS_STRUCTURE2 FROM dual UNION
            ----------------------- Cost Fixed ----------------------------------------
                SELECT 'CF' AS TTL, '0' AS ID, 'CEG07' AS FS_STRUCTURE2 FROM dual UNION
                SELECT 'CF' AS TTL, '1' AS ID, 'CEG14' AS FS_STRUCTURE2 FROM dual UNION ----------- IWOP (BELUM DITEMTUKAN)
                SELECT 'CF' AS TTL, '2' AS ID, 'CEG09' AS FS_STRUCTURE2 FROM dual UNION
		SELECT 'CF' AS TTL, '3' AS ID, 'CEG06' AS FS_STRUCTURE2 FROM dual UNION
		SELECT 'CF' AS TTL, '4' AS ID, 'CEG05' AS FS_STRUCTURE2 FROM dual UNION
		SELECT 'CF' AS TTL, '5' AS ID, 'CEG08' AS FS_STRUCTURE2 FROM dual

            ) UNIN LEFT JOIN (
            SELECT
		MG.STRUCTURE_COSTING AS FS_STRUCTURE,
		MWK.PLANT,
		F.AMOUNT + NVL (KA.ALLOCATION, 0) AS TOTAL
            FROM
		FINANCIAL F
                JOIN M_COSTCENTER C ON F.COSTCENTER = C.COST_CENTER
                JOIN M_GL_ACCOUNT MG ON F.GL_ACCOUNT = MG.GL_ACCOUNT
                LEFT JOIN (
                    SELECT
			MG.GL_ACCOUNT,
			ACE.COSTCENTER_RECEIVER AS COSTCENTER,
			ROUND ((F.AMOUNT * PERCENTAGE) / 100) AS ALLOCATION
                    FROM
			ASSESSMENT_CYCLE ACE
                        JOIN M_GL_ACCOUNT MG ON ACE.COST_ELEMENT_GROUP = MG.GROUP_CYCLE
                        JOIN M_COSTCENTER MC ON ACE.COSTCENTER_SENDER = MC.COST_CENTER
                        JOIN (
                            SELECT
                                COSTCENTER,
                                GL_ACCOUNT,
                                AMOUNT
                            FROM
                                FINANCIAL
                            WHERE
                                FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
                                AND CATEGORY = 'ACT'
                                AND AUDITTRAIL = 'FINPROCESS'
                                AND FLOW = 'CLOSING'
                                AND COMPANY = '" . $post['ecomp'] . "'
                        ) F ON ACE.COSTCENTER_SENDER = F.COSTCENTER
                        AND MG.GL_ACCOUNT = F.GL_ACCOUNT
                ) KA ON F.COSTCENTER = KA.COSTCENTER
                AND F.GL_ACCOUNT = KA.GL_ACCOUNT
                JOIN (
                    SELECT
			MWM.PLANT,
			MWK.WORKCENTER,
			MWK.DESCRIPTION,
			MWM.MATERIAL_PRODUCT,
			MWP.COSTCENTER
                    FROM
			M_WORKCENTER MWK
                        JOIN M_WORKCENTER_MATERIAL MWM ON MWK.WORKCENTER = MWM.WORKCENTER
                        JOIN M_WORKCENTER_PLANT MWP ON MWM.PLANT = MWP.PLANT
                        AND MWK.WORKCENTER = MWP.WORKCENTER
                    WHERE
			MWM.COMPANY = '" . $post['ecomp'] . "'
                        AND MWM.MATERIAL_PRODUCT = '" . $post['emat'] . "'
                ) MWK ON F.COSTCENTER = MWK.COSTCENTER
                WHERE
                    F.GL_ACCOUNT LIKE '6%'
                    AND F.COMPANY = '" . $post['ecomp'] . "'
                    AND F. CATEGORY = 'ACT'
                    AND F.FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
                    AND C.COSTCENTER_CATEGORY = 'CC1'
                    AND F.AUDITTRAIL = 'FINPROCESS'
                    AND F.FLOW = 'CLOSING'
            ) HAS ON UNIN.FS_STRUCTURE2 = HAS.FS_STRUCTURE
            GROUP BY TTL, ID, PLANT");
    }

    public function get_val_nonact($post) {
        $year = substr($post['eyear'], 0, 4);
        $month = substr($post['eyear'], 5, 2) * 1;
        return $this->db->query("
            ----------------------- Material Consumption -----------------------
            SELECT
                'MC' AS TTL,
                MATERIAL,
                PLANT,
                SUM (COST) AS COST,
                SUM (QTY) AS QTY
            FROM
                (
                    SELECT
                        P .MATERIAL,
                        P .PLANT,
                        P .AMOUNT AS QTY,
                        P .AMOUNT * O.AMOUNT AS COST
                    FROM
                        PRODUCTION P
                        JOIN OPEX O ON P .MATERIAL = O.MATERIAL
                    WHERE
                        P .MATERIAL IS NOT NULL
                        AND P .FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
                        AND P .COMPANY = '" . $post['ecomp'] . "'
                        AND P .CATEGORY = '" . $post['ecat'] . "'
                        AND P .GL_ACCOUNT = 'PRD_QTY'
                        AND P .MATERIAL_PRODUCT = '" . $post['emat'] . "'
                        AND O.FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
                        AND O.COMPANY = '" . $post['ecomp'] . "_GP'
                        AND O. CATEGORY = '" . $post['ecat'] . "'
                        AND O. ACCOUNT = 'UP1'
                )
            GROUP BY
                MATERIAL,
                PLANT
            --------------------------------------------------------------------
        UNION ALL
            ----- COGM BAHAN PENOLONG -----
            SELECT
                'OC' AS TTL,
                '2' AS ID,
                DT.PLANT,
                SUM (DT.VAL) AS COST,
                0 AS QTY
            FROM
                (
                    SELECT
			O.COSTCENTER,
			O.MATERIAL,
			O.QUAN,
			O.VAL,
			WP.PLANT,
			WM.MATERIAL_PRODUCT
                    FROM
			(
                            SELECT
				COSTCENTER,
				MATERIAL,
				QUAN,
				AMOUNT AS VAL
                            FROM
				OPEX OV
				JOIN (
					SELECT
                                            COSTCENTER AS ID_C,
                                            MATERIAL AS ID_M,
                                            AMOUNT AS QUAN
					FROM
                                            OPEX O
                                            JOIN M_GL_ACCOUNT G ON O.GL_ACCOUNT = G .GL_ACCOUNT
					WHERE
                                            FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
                                            AND CATEGORY = '" . $post['ecat'] . "'
                                            AND ACCOUNT = 'Q1'
                                            AND COMPANY = '" . $post['ecomp'] . "_GP'
                                            AND G .FS_STRUCTURE IN ('CEG03','CEG05','CEG07','CEG08','CEG09') --- except CEG03 BATU BARA
                                            AND O.GL_ACCOUNT NOT LIKE '6211%' --- except CEG05 GAJI
                                            AND O.GL_ACCOUNT NOT LIKE '631%'
                                    )
                                    OQ ON OV.COSTCENTER = OQ.ID_C
                                    AND OV.MATERIAL = OQ.ID_M
				JOIN M_GL_ACCOUNT G ON OV.GL_ACCOUNT = G .GL_ACCOUNT
                            WHERE
				OV.FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
				AND OV. CATEGORY = '" . $post['ecat'] . "'
				AND OV. ACCOUNT = 'V1'
				AND OV.COMPANY = '" . $post['ecomp'] . "_GP'
				AND G .FS_STRUCTURE IN ('CEG03','CEG05','CEG07','CEG08','CEG09') --- except CEG03 BATU BARA ---
				AND OV.GL_ACCOUNT NOT LIKE '6211%' --- except CEG05 GAJI ---
				AND OV.GL_ACCOUNT NOT LIKE '631%'
			UNION
                            SELECT
				COSTCENTER,
				MATERIAL,
				QUAN,
				AMOUNT AS VAL
                            FROM
				MAINTENANCE MV
				JOIN (
                                        SELECT
                                            COSTCENTER AS ID_C,
                                            MATERIAL AS ID_M,
                                            AMOUNT AS QUAN
                                        FROM
                                            MAINTENANCE
                                        WHERE
                                            FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
                                            AND CATEGORY = '" . $post['ecat'] . "'
                                            AND ACCOUNT = 'Q1'
                                            AND COMPANY = '" . $post['ecomp'] . "'
                                    ) MQ ON MV.COSTCENTER = MQ.ID_C
                                    AND MV.MATERIAL = MQ.ID_M
                            WHERE
				MV.FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
				AND MV. CATEGORY = '" . $post['ecat'] . "'
				AND MV. ACCOUNT = 'V1'
				AND MV.COMPANY = '" . $post['ecomp'] . "'
			) O
                        JOIN ASSESSMENT_CYCLE A ON O.COSTCENTER = A .COSTCENTER_SENDER
                        JOIN M_WORKCENTER_PLANT WP ON A .COSTCENTER_RECEIVER = WP.COSTCENTER
                        JOIN M_WORKCENTER_MATERIAL WM ON WP.PLANT = WM.PLANT
                ) DT
            WHERE
                DT.MATERIAL_PRODUCT = '" . $post['emat'] . "'
            GROUP BY
                DT.PLANT
        UNION ALL
            ----- COGM PACKER -----
            SELECT
		'OC' AS TTL,
		'3' AS ID,
		DT.PLANT,
		SUM (DT.VAL) AS COST,
                0 AS QTY
            FROM
		(
                    SELECT
			O.COSTCENTER,
			O.MATERIAL,
			O.QUAN,
			O.VAL,
			WP.PLANT,
			WM.MATERIAL_PRODUCT
                    FROM
			(
                            SELECT
				COSTCENTER,
				MATERIAL,
				QUAN,
				AMOUNT AS VAL
                            FROM
				OPEX OV
				JOIN (
					SELECT
                                            COSTCENTER AS ID_C,
                                            MATERIAL AS ID_M,
                                            AMOUNT AS QUAN
                                        FROM
                                            OPEX O
                                            JOIN M_GL_ACCOUNT G ON O.GL_ACCOUNT = G .GL_ACCOUNT
					WHERE
                                            FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
                                            AND CATEGORY = '" . $post['ecat'] . "'
                                            AND ACCOUNT = 'Q1'
                                            AND COMPANY = '" . $post['ecomp'] . "_GP'
                                            AND G .FS_STRUCTURE = 'CEG10'
                                    ) OQ ON OV.COSTCENTER = OQ.ID_C
                                    AND OV.MATERIAL = OQ.ID_M
				JOIN M_GL_ACCOUNT G ON OV.GL_ACCOUNT = G .GL_ACCOUNT
                            WHERE
				OV.FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
				AND OV. CATEGORY = '" . $post['ecat'] . "'
				AND OV. ACCOUNT = 'V1'
				AND OV.COMPANY = '" . $post['ecomp'] . "_GP'
				AND G .FS_STRUCTURE = 'CEG10'
			) O
			JOIN ASSESSMENT_CYCLE A ON O.COSTCENTER = A .COSTCENTER_SENDER
			JOIN M_WORKCENTER_PLANT WP ON A .COSTCENTER_RECEIVER = WP.COSTCENTER
			JOIN M_WORKCENTER_MATERIAL WM ON WP.PLANT = WM.PLANT
		) DT
            WHERE
		DT.MATERIAL_PRODUCT = '" . $post['emat'] . "'
            GROUP BY
		DT.PLANT
	UNION ALL
            ----- COGM ELECTRICITY -----
            SELECT
		'OC' AS TTL,
		'4' AS ID,
		DT.PLANT,
		SUM (DT.VAL) AS COST,
                0 AS QTY
            FROM
		(
                    SELECT
			O.COSTCENTER,
			O.MATERIAL,
			O.QUAN,
			O.VAL,
			WP.PLANT,
			WM.MATERIAL_PRODUCT
                    FROM
			(
                            SELECT
				COSTCENTER,
				MATERIAL,
				QUAN,
				AMOUNT AS VAL
                            FROM
				OPEX OV
				JOIN (
					SELECT
                                            COSTCENTER AS ID_C,
                                            MATERIAL AS ID_M,
                                            AMOUNT AS QUAN
					FROM
                                            OPEX O
                                            JOIN M_GL_ACCOUNT G ON O.GL_ACCOUNT = G .GL_ACCOUNT
					WHERE
                                            FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
                                            AND CATEGORY = '" . $post['ecat'] . "'
                                            AND ACCOUNT = 'Q1'
                                            AND COMPANY = '" . $post['ecomp'] . "_GP'
                                            AND G .FS_STRUCTURE = 'CEG04'
                                    ) OQ ON OV.COSTCENTER = OQ.ID_C
                                    	AND OV.MATERIAL = OQ.ID_M
				JOIN M_GL_ACCOUNT G ON OV.GL_ACCOUNT = G .GL_ACCOUNT
                            WHERE
				OV.FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
				AND OV. CATEGORY = '" . $post['ecat'] . "'
				AND OV. ACCOUNT = 'V1'
				AND OV.COMPANY = '" . $post['ecomp'] . "_GP'
				AND G .FS_STRUCTURE = 'CEG04'
			) O
                    JOIN ASSESSMENT_CYCLE A ON O.COSTCENTER = A .COSTCENTER_SENDER
                    JOIN M_WORKCENTER_PLANT WP ON A .COSTCENTER_RECEIVER = WP.COSTCENTER
                    JOIN M_WORKCENTER_MATERIAL WM ON WP.PLANT = WM.PLANT
                ) DT
            WHERE
                DT.MATERIAL_PRODUCT = '" . $post['emat'] . "'
            GROUP BY
                DT.PLANT

        UNION ALL
            ----- COGM DISTRIBUTION -----
            SELECT
		'OC' AS TTL,
		'5' AS ID,
		DT.PLANT,
		SUM (DT.VAL)  AS COST,
                0 AS QTY
            FROM
		(
                    SELECT
			O.COSTCENTER,
			O.MATERIAL,
			O.QUAN,
			O.VAL,
			WP.PLANT,
			WM.MATERIAL_PRODUCT
                    FROM
			(
                            SELECT
				COSTCENTER,
				MATERIAL,
				QUAN,
				AMOUNT AS VAL
                            FROM
				OPEX OV
				JOIN (
					SELECT
                                            COSTCENTER AS ID_C,
                                            MATERIAL AS ID_M,
                                            AMOUNT AS QUAN
					FROM
                                            OPEX O
                                            JOIN M_GL_ACCOUNT G ON O.GL_ACCOUNT = G .GL_ACCOUNT
                                        WHERE
                                            FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
                                            AND CATEGORY = '" . $post['ecat'] . "'
                                            AND ACCOUNT = 'Q1'
                                            AND COMPANY = '" . $post['ecomp'] . "_GP'
                                            AND G .FS_STRUCTURE IN ('CEG11', 'CEG12', 'CEG13')
                                    ) OQ ON OV.COSTCENTER = OQ.ID_C
                                    AND OV.MATERIAL = OQ.ID_M
				JOIN M_GL_ACCOUNT G ON OV.GL_ACCOUNT = G .GL_ACCOUNT
                            WHERE
				OV.FISCAL_YEAR_PERIOD = '" . $post['eyear'] . "'
				AND OV. CATEGORY = '" . $post['ecat'] . "'
				AND OV. ACCOUNT = 'V1'
				AND OV.COMPANY = '" . $post['ecomp'] . "_GP'
				AND G .FS_STRUCTURE IN ('CEG11', 'CEG12', 'CEG13')
			) O
			JOIN ASSESSMENT_CYCLE A ON O.COSTCENTER = A .COSTCENTER_SENDER
			JOIN M_WORKCENTER_PLANT WP ON A .COSTCENTER_RECEIVER = WP.COSTCENTER
			JOIN M_WORKCENTER_MATERIAL WM ON WP.PLANT = WM.PLANT
		) DT
            WHERE
		DT.MATERIAL_PRODUCT = '" . $post['emat'] . "'
            GROUP BY
		DT.PLANT
            ");
    }

    public function get_val($post, $clm, $mate) {

        if ($post['ecat'] == "ACT") {
            $dt = $this->get_val_act($post);
        } else {
            $dt = $this->get_val_nonact($post);
        }
        //default value
        foreach ($clm as $key => $val) {
            foreach ($mate as $kk => $vv) {
                $data['MC']['COS'][$val->PLANT][$kk] = 0;
                $data['MC']['PRC'][$val->PLANT][$kk] = 0;
                $data['MC']['QTY'][$val->PLANT][$kk] = 0;
            }
            for ($i = 0; $i <= 5; $i++) {
                $data['CF']['PRC'][$val->PLANT][$i] = 0;
                $data['OC']['PRC'][$val->PLANT][$i] = 0;
            }
        }
        foreach ($dt->result() as $k => $v) {

            $data[$v->TTL]['COS'][$v->PLANT][$v->ID] = $v->COST;
            $data[$v->TTL]['PRC'][$v->PLANT][$v->ID] = $v->COST;
            $data[$v->TTL]['QTY'][$v->PLANT][$v->ID] = $v->QTY;
            if ($v->QTY != 0) {
                $data[$v->TTL]['COS'][$v->PLANT][$v->ID] = $v->COST;
                $data[$v->TTL]['PRC'][$v->PLANT][$v->ID] = $v->COST / $v->QTY;
            }
        }
        return $data;
    }

}

?>