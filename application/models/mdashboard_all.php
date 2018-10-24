<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdashboard_all extends CI_Model {

    // <editor-fold defaultstate="collapsed" desc="Get Total Produksi 1 Tahun">
    function getProdUpToGresik($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                    SUM (KL1_PROD) + SUM (KL2_PROD) + SUM (KL3_PROD) + SUM (KL4_PROD) AS clinker,
                    SUM (FM1_PROD) + SUM (FM2_PROD) + SUM (FM3_PROD) + SUM (FM4_PROD) + SUM (FM5_PROD) + SUM (FM6_PROD) + SUM (FM7_PROD) + SUM (FM8_PROD) + SUM (FM9_PROD) + SUM (FMA_PROD) + SUM (FMB_PROD) + SUM (FMC_PROD) AS cement
            FROM
                    PIS_SG_PRODMONTH
            WHERE MONTH_PROD LIKE '%$thn%'");
        $data = $query->result_array();
        return $data;
    }
    
    function getProdUpToPadang($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                        SUM (KL2_PROD) + SUM (KL3_PROD) + SUM (KL4_PROD) + SUM (KL5_PROD) + SUM (KL6_PROD) AS CLINKER,
                        SUM (FM2_PROD) + SUM (FM3_PROD) + SUM (FM41_PROD) + SUM (FM42_PROD) + SUM (FM51_PROD) + SUM (FMDM_PROD) + SUM (FM52_PROD) + SUM (FM61_PROD) AS CEMENT
                FROM
                        PIS_SP_PRODMONTH
                WHERE
                        MONTH_PROD LIKE '%$thn%'");
        $data = $query->result_array();
        return $data;
    }

    function getProdUpToTonasa($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                        SUM (KL2_PROD) + SUM (KL3_PROD) + SUM (KL4_PROD) + SUM (KL5_PROD) AS clinker,
                        SUM (FM2_PROD) + SUM (FM3_PROD) + SUM (FM41_PROD) + SUM (FM42_PROD) + SUM (FM51_PROD) + SUM (FM52_PROD) AS cement
                FROM
                        PIS_ST_PRODMONTH
                WHERE MONTH_PROD LIKE '%$thn%'");
        $data = $query->result_array();
        return $data;
    }

    function getProdUpToTLCC($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                        SUM (KL1_PROD) AS clinker,
                        SUM (FMMP_PROD) + SUM (FMHCM_PROD) AS cement
                FROM
                        PIS_TLCC_PRODMONTH
                WHERE MONTH_PROD LIKE '%$thn%'");
        $data = $query->result_array();
        return $data;
    }
    
    function getProdUpToRembang($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                                            SUM (KL1_PROD) AS clinker,
                                            SUM (FM1_PROD) + SUM (FM2_PROD) AS cement
                                    FROM
                                            PIS_SGR_PRODMONTH
                                    WHERE
                                            MONTH_PROD LIKE '%$thn%'");
        $data = $query->result_array();
        return $data;
    }
    
    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="Get RKAP Total 1 Tahun">
    function getProdRKAPGresik($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                        SUM (CEMENT) AS SEMEN,
                        SUM (CLINKER) AS KLINKER
                FROM
                        PIS_RKAP_TOTAL
                WHERE
                        TAHUN = $thn
                AND COMPANY = 7000");
        $klin = $query->result_array();
        return $klin;
    }

    function getProdRKAPPadang($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                        SUM (CEMENT) AS SEMEN,
                        SUM (CLINKER) AS KLINKER
                FROM
                        PIS_RKAP_TOTAL
                WHERE
                        TAHUN = $thn
                AND COMPANY = 3000");
        $klin = $query->result_array();
        return $klin;
    }

    function getProdRKAPTonasa($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                        SUM (CEMENT) AS SEMEN,
                        SUM (CLINKER) AS KLINKER
                FROM
                        PIS_RKAP_TOTAL
                WHERE
                        TAHUN = $thn
                AND COMPANY = 4000");
        $klin = $query->result_array();
        return $klin;
    }

    function getProdRKAPTLCC($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                        SUM (CEMENT) AS SEMEN,
                        SUM (CLINKER) AS KLINKER
                FROM
                        PIS_RKAP_TOTAL
                WHERE
                        TAHUN = $thn
                AND COMPANY = 6000");
        $klin = $query->result_array();
        return $klin;
    }
    
    function getProdRKAPRembang($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                        SUM (CEMENT) AS SEMEN,
                        SUM (CLINKER) AS KLINKER
                FROM
                        PIS_RKAP_TOTAL
                WHERE
                        TAHUN = $thn
                AND COMPANY = 5000");
        $klin = $query->result_array();
        return $klin;
    }
    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="Get Produksi Bulanan :: Cement">
    function getDBAllCementSG($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                        MONTH_PROD,
                        SUM (FM1_PROD) + SUM (FM2_PROD) + SUM (FM3_PROD) + SUM (FM4_PROD) + SUM (FM5_PROD) + SUM (FM6_PROD) + SUM (FM7_PROD) + SUM (FM8_PROD) + SUM (FM9_PROD) + SUM (FMA_PROD) + SUM (FMB_PROD) + SUM (FMC_PROD) AS SG
                FROM
                        PIS_SG_PRODMONTH
                WHERE
                        MONTH_PROD LIKE '%$thn%'
                GROUP BY
                        MONTH_PROD
                ORDER BY
                        MONTH_PROD ASC");

        $Q = $query->result_array();
        if (!empty($Q)) {
            foreach ($query->result_array() as $value) {
                $data[$value["MONTH_PROD"]] = array(
                    'sg' => $value["SG"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    function getDBAllCementSP($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                        MONTH_PROD,
                        SUM (FM2_PROD) + SUM (FM3_PROD) + SUM (FM41_PROD) + SUM (FM42_PROD) + SUM (FM51_PROD) + SUM (FMDM_PROD) + SUM (FM52_PROD)+ SUM (FM61_PROD) AS SP
                FROM
                        PIS_SP_PRODMONTH
                WHERE
                        MONTH_PROD LIKE '%$thn%'
                GROUP BY
                        MONTH_PROD
                ORDER BY
                        MONTH_PROD ASC");
        $Q = $query->result_array();
        if (!empty($Q)) {
            foreach ($query->result_array() as $value) {
                $data[$value["MONTH_PROD"]] = array(
                    'sp' => $value["SP"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    function getDBAllCementST($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                                    MONTH_PROD,
                                    SUM (FM2_PROD) + SUM (FM3_PROD) + SUM (FM41_PROD) + SUM (FM42_PROD) + SUM (FM51_PROD) + SUM (FM52_PROD) AS ST
                            FROM
                                    PIS_ST_PRODMONTH
                            WHERE
                                    MONTH_PROD LIKE '%$thn%'
                            GROUP BY
                                    MONTH_PROD
                            ORDER BY
                                    MONTH_PROD ASC");
        $Q = $query->result_array();
        if (!empty($Q)) {
            foreach ($query->result_array() as $value) {
                $data[$value["MONTH_PROD"]] = array(
                    'st' => $value["ST"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    function getDBAllCementTLCC($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                                    MONTH_PROD,
                                    SUM (FMMP_PROD) + SUM (FMHCM_PROD) AS TLCC
                            FROM
                                    PIS_TLCC_PRODMONTH
                            WHERE
                                    MONTH_PROD LIKE '%$thn%'
                            GROUP BY
                                    MONTH_PROD
                            ORDER BY
                                    MONTH_PROD ASC");
        $Q = $query->result_array();
        if (!empty($Q)) {
            foreach ($query->result_array() as $value) {
                $data[$value["MONTH_PROD"]] = array(
                    'tlcc' => $value["TLCC"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }
    
    function getDBAllCementRembang($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                                            MONTH_PROD,
                                            SUM (FM1_PROD) + SUM (FM2_PROD) AS REMBANG
                                    FROM
                                            PIS_SGR_PRODMONTH
                                    WHERE
                                            MONTH_PROD LIKE '%$thn%'
                                    GROUP BY
                                            MONTH_PROD
                                    ORDER BY
                                            MONTH_PROD ASC");
        $Q = $query->result_array();
        if (!empty($Q)) {
            foreach ($query->result_array() as $value) {
                $data[$value["MONTH_PROD"]] = array(
                    'rembang' => $value["REMBANG"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }
    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="Get Produksi Bulanan :: Clinker">
    function getDBAllClinkerSG($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                        MONTH_PROD,
                        SUM (KL1_PROD) + SUM (KL2_PROD) + SUM (KL3_PROD) + SUM (KL4_PROD) AS SG
                FROM
                        PIS_SG_PRODMONTH
                WHERE
                        MONTH_PROD LIKE '%$thn%'
                GROUP BY
                        MONTH_PROD
                ORDER BY
                        MONTH_PROD ASC");
        $Q = $query->result_array();
        if (!empty($Q)) {
            foreach ($query->result_array() as $value) {
                $data[$value["MONTH_PROD"]] = array(
                    'sg' => $value["SG"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    function getDBAllClinkerSP($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                        MONTH_PROD,
                        SUM (KL2_PROD) + SUM (KL3_PROD) + SUM (KL4_PROD) + SUM (KL5_PROD) + SUM (KL6_PROD) AS SP
                FROM
                        PIS_SP_PRODMONTH
                WHERE
                        MONTH_PROD LIKE '%$thn%'
                GROUP BY
                        MONTH_PROD
                ORDER BY
                        MONTH_PROD ASC");
        $Q = $query->result_array();
        if (!empty($Q)) {
            foreach ($query->result_array() as $value) {
                $data[$value["MONTH_PROD"]] = array(
                    'sp' => $value["SP"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    function getDBAllClinkerST($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                                    MONTH_PROD,
                                    SUM (KL2_PROD) + SUM (KL3_PROD) + SUM (KL4_PROD) + SUM (KL5_PROD) AS ST
                            FROM
                                    PIS_ST_PRODMONTH
                            WHERE
                                    MONTH_PROD LIKE '%$thn%'
                            GROUP BY
                                    MONTH_PROD
                            ORDER BY
                                    MONTH_PROD ASC");
        $Q = $query->result_array();
        if (!empty($Q)) {
            foreach ($query->result_array() as $value) {
                $data[$value["MONTH_PROD"]] = array(
                    'st' => $value["ST"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    function getDBAllClinkerTLCC($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                                    MONTH_PROD,
                                    SUM (KL1_PROD) AS TLCC
                            FROM
                                    PIS_TLCC_PRODMONTH
                            WHERE
                                    MONTH_PROD LIKE '%$thn%'
                            GROUP BY
                                    MONTH_PROD
                            ORDER BY
                                    MONTH_PROD ASC");
        $Q = $query->result_array();
        if (!empty($Q)) {
            foreach ($query->result_array() as $value) {
                $data[$value["MONTH_PROD"]] = array(
                    'tlcc' => $value["TLCC"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }
    
    function getDBAllClinkerRembang($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                                            MONTH_PROD,
                                            SUM (KL1_PROD) AS REMBANG
                                    FROM
                                            PIS_SGR_PRODMONTH
                                    WHERE
                                            MONTH_PROD LIKE '%$thn%'
                                    GROUP BY
                                            MONTH_PROD
                                    ORDER BY
                                            MONTH_PROD ASC");
        $Q = $query->result_array();
        if (!empty($Q)) {
            foreach ($query->result_array() as $value) {
                $data[$value["MONTH_PROD"]] = array(
                    'rembang' => $value["REMBANG"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Get RKAP Opco per Bulan">
    function getProdRKAPPadangDetail($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                                        TO_NUMBER (BULAN) AS BULAN,
                                        CEMENT AS SEMEN,
                                        CLINKER AS KLINKER
                                FROM
                                        PIS_RKAP_TOTAL
                                WHERE
                                        TAHUN = $thn
                                AND COMPANY = 3000");
        $klin = $query->result_array();
        return $klin;
    }
    
    function getProdRKAPGresikDetail($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                                        TO_NUMBER (BULAN) AS BULAN,
                                        CEMENT AS SEMEN,
                                        CLINKER AS KLINKER
                                FROM
                                        PIS_RKAP_TOTAL
                                WHERE
                                        TAHUN = $thn
                                AND COMPANY = 7000");
        $klin = $query->result_array();
        return $klin;
    }
    
    function getProdRKAPTonasaDetail($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                                        TO_NUMBER (BULAN) AS BULAN,
                                        CEMENT AS SEMEN,
                                        CLINKER AS KLINKER
                                FROM
                                        PIS_RKAP_TOTAL
                                WHERE
                                        TAHUN = $thn
                                AND COMPANY = 4000");
        $klin = $query->result_array();
        return $klin;
    }
    
    function getProdRKAPTLCCDetail($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                                        TO_NUMBER (BULAN) AS BULAN,
                                        CEMENT AS SEMEN,
                                        CLINKER AS KLINKER
                                FROM
                                        PIS_RKAP_TOTAL
                                WHERE
                                        TAHUN = $thn
                                AND COMPANY = 6000");
        $klin = $query->result_array();
        return $klin;
    }
    
    function getProdRKAPRembangDetail($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $query = $postgresql->query("SELECT
                                        TO_NUMBER (BULAN) AS BULAN,
                                        CEMENT AS SEMEN,
                                        CLINKER AS KLINKER
                                FROM
                                        PIS_RKAP_TOTAL
                                WHERE
                                        TAHUN = $thn
                                AND COMPANY = 5000");
        $klin = $query->result_array();
        return $klin;
    }
    // </editor-fold>
    
    // RKAP Total dibagi per Bulan
    function getRKAPAll($thn) {
        $postgresql = $this->load->database('oramso', TRUE);
        $Query = $postgresql->query("SELECT
                            TO_NUMBER(BULAN) AS BULAN,
                            SUM (CEMENT) AS cement,
                            SUM (CLINKER) AS CLINKER
                    FROM
                            PIS_RKAP_TOTAL
                    WHERE
                            TAHUN = $thn
                    GROUP BY
                            BULAN
                    ORDER BY
                            BULAN");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[$value["BULAN"]] = array(
                    'CEMENT' => $value["CEMENT"],
                    'CLINKER' => $value["CLINKER"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }
}

