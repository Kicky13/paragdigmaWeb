<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class master_data extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->library('plant_link');
        $this->load->model('m_master', 'master');
        $this->load->helper(array('form', 'url'));
    }
    
    // <editor-fold defaultstate="collapsed" desc="Upload Excel Unfinished">
    
    public function upload_files_excel($files) {
        $this->load->library('upload');

        $config['upload_path'] = './upload/uploaded/';
        $config['file_name'] = $files;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
        $config['overwrite'] = true;
        $config['remove_spaces'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($files['error'] == 0) {
            if ($this->upload->do_upload('file_excel')) {
                echo 'File uploaded successfully';
            } else {
                $this->upload->display_errors();
            }
        }
    }

    public function upload_excel_prognose() {
        $this->load->library('Excel');
        $this->load->library('IOFactory');

        $files = $_FILES['file_excel'];
        if (!empty($files['name'])) {
            $this->upload_files_excel($files);
        } else {
            echo 'Failed to upload file';
        }
//        $media = $this->upload->data('file');
//        $inputFile = './upload/uploaded/'.$fileName;
//        
//        try {
//            $inputFileType = IOFactory::identify($inputFile);
//            $objReader = IOFactory::createReader($inputFileType);
//            $objPHPExcel = $objReader->load($inputFile);
//        } catch (Exception $ex) {
//            die('Error loading file "'.pathinfo($inputFile, PATHINFO_BASENAME).'": '.$ex->getMessage());
//        }
//        
//        $sheet = $objPHPExcel->getSheet(0);
//        $highestRow = $sheet->getHighestRow();
//        $highestColumn = $sheet->getHighestColumn();
//        
//        for($row = 2; $row <= $highestRow; $row++) {
//            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
//            $data = array (
//                'ID'            => '',
//                'COMPANY'       => $rowData[0][1],
//                'PLANT'         => $rowData[0][2],
//                'TAHUN'         => $rowData[0][3],
//                'BULAN'         => $rowData[0][4],
//                'CEMENT'        => $rowData[0][5],
//                'CLINKER'       => $rowData[0][6],
//                'PLANT_DESC'    => $rowData[0][7]
//            );
//            $this->master->excel_insert_prognose($data);
//        }
//        
//        delete_files($media['file_path']);
//        echo '<script>alert("File uploaded successfully");</script>';
    }

    public function upload_excel_capacity() {
        $this->load->library('Excel');
        $this->load->library('IOFactory');

        $fileName = $_FILES['file'];

        $config['upload_path'] = './upload/uploaded';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
        $config['overwrite'] = true;
        $config['remove_spaces'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file'))
            $this->upload->display_errors();

        $media = $this->upload->data('file');
        $inputFile = './upload/' . $media['file_name'];

        try {
            $inputFileType = IOFactory::identify($inputFile);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFile);
        } catch (Exception $ex) {
            die('Error loading file "' . pathinfo($inputFile, PATHINFO_BASENAME) . '": ' . $ex->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            $data = array(
                'ID' => '',
                'COMPANY' => $rowData[0][1],
                'PLANT' => $rowData[0][2],
                'BULAN' => $rowData[0][3],
                'TAHUN' => $rowData[0][4],
                'CEMENT' => $rowData[0][5],
                'CLINKER' => $rowData[0][6],
                'RKAP_CEMENT' => $rowData[0][7],
                'RKAP_CLINKER' => $rowData[0][8]
            );
            $this->master->excel_insert_capacity($data);
        }
        delete_files($media['file_path']);
        echo '<script>alert("File uploaded successfully");</script>';
    }

    public function upload_excel_rkapplant() {
        $this->load->library('Excel');
        $this->load->library('IOFactory');

        $fileName = $_FILES['file'];

        $config['upload_path'] = './upload/uploaded';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
        $config['overwrite'] = true;
        $config['remove_spaces'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file'))
            $this->upload->display_errors();

        $media = $this->upload->data('file');
        $inputFile = './upload/' . $media['file_name'];

        try {
            $inputFileType = IOFactory::identify($inputFile);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFile);
        } catch (Exception $ex) {
            die('Error loading file "' . pathinfo($inputFile, PATHINFO_BASENAME) . '": ' . $ex->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            $data = array(
                'ID' => '',
                'COMPANY' => $rowData[0][1],
                'TAHUN' => $rowData[0][2],
                'BULAN' => $rowData[0][3],
                'CEMENT' => $rowData[0][4],
                'CLINKER' => $rowData[0][5],
                'LIMESTONE' => $rowData[0][6],
                'FINECOAL' => $rowData[0][7],
                'RAWMIX' => $rowData[0][8],
                'SILICA' => $rowData[0][9],
                'PLANT' => $rowData[0][10]
            );
            $this->master->check_insert_rkapplant($data);
        }
        delete_files($media['file_path']);
        echo '<script>alert("File uploaded successfully");</script>';
    }
    
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Export Excel">
    public function xls_SG($bulan, $tahun) {
        $data = $this->master->excel_SG($bulan, $tahun);
        $kiln1 = $this->master->ops_kiln_7000_tb1($bulan, $tahun);
        $kiln2 = $this->master->ops_kiln_7000_tb2($bulan, $tahun);
        $kiln3 = $this->master->ops_kiln_7000_tb3($bulan, $tahun);
        $kiln4 = $this->master->ops_kiln_7000_tb4($bulan, $tahun);
        $this->exporting_excel_SG($data, $kiln1, $kiln2, $kiln3, $kiln4, $bulan, $tahun);
    }

    public function xls_SP($bulan, $tahun) {
        $data = $this->master->excel_SP($bulan, $tahun);
        $kiln1 = $this->master->ops_kiln_3000_ind2($bulan, $tahun);
        $kiln2 = $this->master->ops_kiln_3000_ind3($bulan, $tahun);
        $kiln3 = $this->master->ops_kiln_3000_ind4($bulan, $tahun);
        $kiln4 = $this->master->ops_kiln_3000_ind5($bulan, $tahun);
        $this->exporting_excel_SP($data, $kiln1, $kiln2, $kiln3, $kiln4, $bulan, $tahun);
    }

    public function xls_ST($bulan, $tahun) {
        $data = $this->master->excel_ST($bulan, $tahun);
        $kiln1 = $this->master->ops_kiln_4000_tns2($bulan, $tahun);
        $kiln2 = $this->master->ops_kiln_4000_tns3($bulan, $tahun);
        $kiln3 = $this->master->ops_kiln_4000_tns4($bulan, $tahun);
        $kiln4 = $this->master->ops_kiln_4000_tns5($bulan, $tahun);
        $this->exporting_excel_ST($data, $kiln1, $kiln2, $kiln3, $kiln4, $bulan, $tahun);
    }

    public function xls_TLCC($bulan, $tahun) {
        $data = $this->master->excel_TLCC($bulan, $tahun);
        $kiln = $this->master->ops_kiln_6000_mp($bulan, $tahun);
        $this->exporting_excel_TLCC($data, $kiln, $bulan, $tahun);
    }

    public function exporting_excel_SG($data, $kiln1, $kiln2, $kiln3, $kiln4, $tanggal, $tahun) {
        $this->load->library('Excel');
        $this->load->library('ExportExcel');

        if (!$data)
            return FALSE;

        $timestamp = date("F", mktime(0, 0, 0, $tanggal + 1, 0));
        $rowCount = 6;
        $rowKilntb1 = 43;
        $rowKilntb2 = 80;
        $rowKilntb3 = 117;
        $rowKilntb4 = 154;

        $obj = PHPExcel_IOFactory::createReader('Excel2007');
        $obj = $obj->load('media/templateSG.xlsx');
        $obj->setActiveSheetIndex(0);
        $sheet = $obj->getActiveSheet();

        foreach ($data as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowCount, $row['RM1_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowCount, $row['RM1_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowCount, $row['RM2_PROD']);
            $sheet->setCellValueByColumnAndRow(5, $rowCount, $row['RM2_JOP']);
            $sheet->setCellValueByColumnAndRow(6, $rowCount, $row['RM3_PROD']);
            $sheet->setCellValueByColumnAndRow(7, $rowCount, $row['RM3_JOP']);
            $sheet->setCellValueByColumnAndRow(8, $rowCount, $row['RM4_PROD']);
            $sheet->setCellValueByColumnAndRow(9, $rowCount, $row['RM4_JOP']);
            $sheet->setCellValueByColumnAndRow(10, $rowCount, $row['FM1_PROD']);
            $sheet->setCellValueByColumnAndRow(11, $rowCount, $row['FM1_JOP']);
            $sheet->setCellValueByColumnAndRow(12, $rowCount, $row['FM2_PROD']);
            $sheet->setCellValueByColumnAndRow(13, $rowCount, $row['FM2_JOP']);
            $sheet->setCellValueByColumnAndRow(14, $rowCount, $row['FM3_PROD']);
            $sheet->setCellValueByColumnAndRow(15, $rowCount, $row['FM3_JOP']);
            $sheet->setCellValueByColumnAndRow(16, $rowCount, $row['FM4_PROD']);
            $sheet->setCellValueByColumnAndRow(17, $rowCount, $row['FM4_JOP']);
            $sheet->setCellValueByColumnAndRow(18, $rowCount, $row['FM5_PROD']);
            $sheet->setCellValueByColumnAndRow(19, $rowCount, $row['FM5_JOP']);
            $sheet->setCellValueByColumnAndRow(20, $rowCount, $row['FM6_PROD']);
            $sheet->setCellValueByColumnAndRow(21, $rowCount, $row['FM6_JOP']);
            $sheet->setCellValueByColumnAndRow(22, $rowCount, $row['FM7_PROD']);
            $sheet->setCellValueByColumnAndRow(23, $rowCount, $row['FM7_JOP']);
            $sheet->setCellValueByColumnAndRow(24, $rowCount, $row['FM8_PROD']);
            $sheet->setCellValueByColumnAndRow(25, $rowCount, $row['FM8_JOP']);
            $sheet->setCellValueByColumnAndRow(34, $rowCount, $row['FM9_PROD']);
            $sheet->setCellValueByColumnAndRow(35, $rowCount, $row['FM9_JOP']);
            $sheet->setCellValueByColumnAndRow(26, $rowCount, $row['FMA_PROD']);
            $sheet->setCellValueByColumnAndRow(27, $rowCount, $row['FMA_JOP']);
            $sheet->setCellValueByColumnAndRow(28, $rowCount, $row['FMB_PROD']);
            $sheet->setCellValueByColumnAndRow(29, $rowCount, $row['FMB_JOP']);
            $sheet->setCellValueByColumnAndRow(30, $rowCount, $row['FMC_PROD']);
            $sheet->setCellValueByColumnAndRow(31, $rowCount, $row['FMC_JOP']);
            $rowCount++;
        }

        foreach ($kiln1 as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKilntb1, $row['KL1_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKilntb1, $row['KL1_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKilntb1, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKilntb1, $row['STOP_DESC']);
            $rowKilntb1++;
        }

        foreach ($kiln2 as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKilntb2, $row['KL2_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKilntb2, $row['KL2_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKilntb2, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKilntb2, $row['STOP_DESC']);
            $rowKilntb2++;
        }

        foreach ($kiln3 as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKilntb3, $row['KL3_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKilntb3, $row['KL3_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKilntb3, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKilntb3, $row['STOP_DESC']);
            $rowKilntb3++;
        }

        foreach ($kiln4 as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKilntb4, $row['KL4_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKilntb4, $row['KL4_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKilntb4, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKilntb4, $row['STOP_DESC']);
            $rowKilntb4++;
        }

        $objWriter = PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ProductionGresik_' . $timestamp . '-' . $tahun . '.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
    }

    public function exporting_excel_SP($data, $kiln1, $kiln2, $kiln3, $kiln4, $tanggal, $tahun) {
        $this->load->library('Excel');
        $this->load->library('ExportExcel');

        if (!$data)
            return FALSE;

        $timestamp = date("F", mktime(0, 0, 0, $tanggal + 1, 0));
        $rowCount = 6;
        $rowKilnind1 = 44;
        $rowKilnind2 = 81;
        $rowKilnind3 = 119;
        $rowKilnind4 = 157;
        $obj = PHPExcel_IOFactory::createReader('Excel2007');
        $obj = $obj->load('media/templateSP.xlsx');
        $obj->setActiveSheetIndex(0);
        $sheet = $obj->getActiveSheet();

        foreach ($data as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowCount, $row['RM2_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowCount, $row['RM2_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowCount, $row['RM3_PROD']);
            $sheet->setCellValueByColumnAndRow(5, $rowCount, $row['RM3_JOP']);
            $sheet->setCellValueByColumnAndRow(6, $rowCount, $row['RM41_PROD']);
            $sheet->setCellValueByColumnAndRow(7, $rowCount, $row['RM41_JOP']);
            $sheet->setCellValueByColumnAndRow(8, $rowCount, $row['RM42_PROD']);
            $sheet->setCellValueByColumnAndRow(9, $rowCount, $row['RM42_JOP']);
            $sheet->setCellValueByColumnAndRow(10, $rowCount, $row['RM51_PROD']);
            $sheet->setCellValueByColumnAndRow(11, $rowCount, $row['RM51_JOP']);
            $sheet->setCellValueByColumnAndRow(12, $rowCount, $row['RM52_PROD']);
            $sheet->setCellValueByColumnAndRow(13, $rowCount, $row['RM52_JOP']);
            $sheet->setCellValueByColumnAndRow(14, $rowCount, $row['FM2_PROD']);
            $sheet->setCellValueByColumnAndRow(15, $rowCount, $row['FM2_JOP']);
            $sheet->setCellValueByColumnAndRow(16, $rowCount, $row['FM3_PROD']);
            $sheet->setCellValueByColumnAndRow(17, $rowCount, $row['FM3_JOP']);
            $sheet->setCellValueByColumnAndRow(18, $rowCount, $row['FM41_PROD']);
            $sheet->setCellValueByColumnAndRow(19, $rowCount, $row['FM41_JOP']);
            $sheet->setCellValueByColumnAndRow(20, $rowCount, $row['FM42_PROD']);
            $sheet->setCellValueByColumnAndRow(21, $rowCount, $row['FM42_JOP']);
            $sheet->setCellValueByColumnAndRow(22, $rowCount, $row['FM51_PROD']);
            $sheet->setCellValueByColumnAndRow(23, $rowCount, $row['FM51_JOP']);
            $sheet->setCellValueByColumnAndRow(24, $rowCount, $row['FM52_PROD']);
            $sheet->setCellValueByColumnAndRow(25, $rowCount, $row['FM52_JOP']);
            $sheet->setCellValueByColumnAndRow(26, $rowCount, $row['FMDM_PROD']);
            $sheet->setCellValueByColumnAndRow(27, $rowCount, $row['FMDM_JOP']);
            $rowCount++;
        }

        foreach ($kiln1 as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKilnind1, $row['KL2_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKilnind1, $row['KL2_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKilnind1, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKilnind1, $row['STOP_DESC']);
            $rowKilnind1++;
        }

        foreach ($kiln2 as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKilnind2, $row['KL3_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKilnind2, $row['KL3_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKilnind2, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKilnind2, $row['STOP_DESC']);
            $rowKilnind2++;
        }

        foreach ($kiln3 as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKilnind3, $row['KL4_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKilnind3, $row['KL4_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKilnind3, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKilnind3, $row['STOP_DESC']);
            $rowKilnind3++;
        }

        foreach ($kiln4 as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKilnind4, $row['KL5_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKilnind4, $row['KL5_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKilnind4, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKilnind4, $row['STOP_DESC']);
            $rowKilnind4++;
        }

        $objWriter = PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ProductionPadang_' . $timestamp . '-' . $tahun . '.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
    }

    public function exporting_excel_ST($data, $kiln1, $kiln2, $kiln3, $kiln4, $tanggal, $tahun) {
        $this->load->library('Excel');
        $this->load->library('ExportExcel');

        if (!$data)
            return FALSE;

        $timestamp = date("F", mktime(0, 0, 0, $tanggal + 1, 0));
        $rowCount = 6;
        $rowKilntns1 = 44;
        $rowKilntns2 = 82;
        $rowKilntns3 = 120;
        $rowKilntns4 = 158;
        $obj = PHPExcel_IOFactory::createReader('Excel2007');
        $obj = $obj->load('media/templateST.xlsx');
        $obj->setActiveSheetIndex(0);
        $sheet = $obj->getActiveSheet();

        foreach ($data as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowCount, $row['RM2_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowCount, $row['RM2_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowCount, $row['RM3_PROD']);
            $sheet->setCellValueByColumnAndRow(5, $rowCount, $row['RM3_JOP']);
            $sheet->setCellValueByColumnAndRow(6, $rowCount, $row['RM41_PROD']);
            $sheet->setCellValueByColumnAndRow(7, $rowCount, $row['RM41_JOP']);
            $sheet->setCellValueByColumnAndRow(8, $rowCount, $row['RM42_PROD']);
            $sheet->setCellValueByColumnAndRow(9, $rowCount, $row['RM42_JOP']);
            $sheet->setCellValueByColumnAndRow(10, $rowCount, $row['RM5_PROD']);
            $sheet->setCellValueByColumnAndRow(11, $rowCount, $row['RM5_JOP']);
            $sheet->setCellValueByColumnAndRow(14, $rowCount, $row['FM2_PROD']);
            $sheet->setCellValueByColumnAndRow(15, $rowCount, $row['FM2_JOP']);
            $sheet->setCellValueByColumnAndRow(16, $rowCount, $row['FM3_PROD']);
            $sheet->setCellValueByColumnAndRow(17, $rowCount, $row['FM3_JOP']);
            $sheet->setCellValueByColumnAndRow(18, $rowCount, $row['FM41_PROD']);
            $sheet->setCellValueByColumnAndRow(19, $rowCount, $row['FM41_JOP']);
            $sheet->setCellValueByColumnAndRow(20, $rowCount, $row['FM42_PROD']);
            $sheet->setCellValueByColumnAndRow(21, $rowCount, $row['FM42_JOP']);
            $sheet->setCellValueByColumnAndRow(22, $rowCount, $row['FM51_PROD']);
            $sheet->setCellValueByColumnAndRow(23, $rowCount, $row['FM51_JOP']);
            $sheet->setCellValueByColumnAndRow(24, $rowCount, $row['FM52_PROD']);
            $sheet->setCellValueByColumnAndRow(25, $rowCount, $row['FM52_JOP']);
            $rowCount++;
        }
        foreach ($kiln1 as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKilntns1, $row['KL2_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKilntns1, $row['KL2_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKilntns1, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKilntns1, $row['STOP_DESC']);
            $rowKilntns1++;
        }

        foreach ($kiln2 as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKilntns2, $row['KL3_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKilntns2, $row['KL3_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKilntns2, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKilntns2, $row['STOP_DESC']);
            $rowKilntns2++;
        }

        foreach ($kiln3 as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKilntns3, $row['KL4_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKilntns3, $row['KL4_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKilntns3, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKilntns3, $row['STOP_DESC']);
            $rowKilntns3++;
        }

        foreach ($kiln4 as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKilntns4, $row['KL5_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKilntns4, $row['KL5_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKilntns4, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKilntns4, $row['STOP_DESC']);
            $rowKilntns4++;
        }

        $objWriter = PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ProductionTonasa_' . $timestamp . '-' . $tahun . '.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
    }

    public function exporting_excel_TLCC($data, $kiln, $tanggal, $tahun) {
        $this->load->library('Excel');
        $this->load->library('ExportExcel');

        if (!$data)
            return FALSE;

        $timestamp = date("F", mktime(0, 0, 0, $tanggal + 1, 0));
        $rowCount = 6;
        $rowKiln = 44;
        $obj = PHPExcel_IOFactory::createReader('Excel2007');
        $obj = $obj->load('media/templateTLCC.xlsx');
        $obj->setActiveSheetIndex(0);
        $sheet = $obj->getActiveSheet();

        foreach ($data as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowCount, $row['RM1_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowCount, $row['RM1_JOP']);
            $sheet->setCellValueByColumnAndRow(14, $rowCount, $row['FMMP_PROD']);
            $sheet->setCellValueByColumnAndRow(15, $rowCount, $row['FMMP_JOP']);
            $sheet->setCellValueByColumnAndRow(16, $rowCount, $row['FMHCM_PROD']);
            $sheet->setCellValueByColumnAndRow(17, $rowCount, $row['FMHCM_JOP']);
            $rowCount++;
        }

        foreach ($kiln as $row) {
            $sheet->setCellValueByColumnAndRow(2, $rowKiln, $row['KL1_PROD']);
            $sheet->setCellValueByColumnAndRow(3, $rowKiln, $row['KL1_JOP']);
            $sheet->setCellValueByColumnAndRow(4, $rowKiln, $row['STOP_COUNT']);
            $sheet->setCellValueByColumnAndRow(5, $rowKiln, $row['STOP_DESC']);
            $rowKiln++;
        }

        $objWriter = PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ProductionTLCC_' . $timestamp . '-' . $tahun . '.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
    }
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="MASTER PRODUCTION">
    public function index() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        $access = $this->session->userdata('access');
        /////////////////////////////////////////////////
        $load['Title'] = "Master Data";
        if ($level == 1 and $access == 2000) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/portal_master', $load);
        } elseif ($level == 1 and $access == 7000) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/portal_master_gresik', $load);
        } elseif ($level == 1 and $access == 6000) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/portal_master_tlcc', $load);
        } elseif ($level == 1 and $access == 5000) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/portal_master_rembang', $load);
        } elseif ($level == 1 and $access == 4000) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/portal_master_tonasa', $load);
        } elseif ($level == 1 and $access == 3000) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/portal_master_padang', $load);
        } elseif ($level == 2 and $access == 2000) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/portal_master', $load);
        } elseif ($level == 2 and $access == 7000) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/portal_master_gresik', $load);
        } elseif ($level == 2 and $access == 6000) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/portal_master_tlcc', $load);
        } elseif ($level == 2 and $access == 5000) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/portal_master_rembang', $load);
        } elseif ($level == 2 and $access == 4000) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/portal_master_tonasa', $load);
        } elseif ($level == 2 and $access == 3000) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/portal_master_padang', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/master/portal_master', $load);
        }
    }

    public function tlcc() {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Master Data Production Semen Thanglong";
        $year = $this->input->get('tahun');
        $this->load->model('mplant_eksekutif');
        $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('TLCC', $year);
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/production_tlcc', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/production_tlcc', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/master/production_tlcc', $load);
        }
    }

    public function gresik() {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Master Data Production KSO SI - SG";
        $year = $this->input->get('tahun');
        $this->load->model('mplant_eksekutif');
        $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('SG', $year);
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/production_gresik', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/production_gresik', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/master/production_gresik', $load);
        }
    }

    public function padang() {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Master Data Production Semen Padang";
        $year = $this->input->get('tahun');
        $this->load->model('mplant_eksekutif');
        $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('SP', $year);
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/production_padang', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/production_padang', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/master/production_padang', $load);
        }
    }

    public function tonasa() {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Master Data Production Semen Tonasa";
        $year = $this->input->get('tahun');
        $this->load->model('mplant_eksekutif');
        $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('ST', $year);
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/production_tonasa', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/production_tonasa', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/master/production_tonasa', $load);
        }
    }
    
    public function rembang() {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Master Data Production Semen Gresik";
        $year = $this->input->get('tahun');
        $this->load->model('mplant_eksekutif');
        $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('SGR', $year);
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/production_rembang', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/production_rembang', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/master/production_rembang', $load);
        }
    }

    ///////////////produksi/////////////////
    public function get_production_tlcc($bulan, $tahun) {
        $this->master->get_production_tlcc($bulan, $tahun);
    }

    public function get_production_gresik($bulan, $tahun) {
        $this->master->get_production_gresik($bulan, $tahun);
    }

    public function get_production_padang($bulan, $tahun) {
        $this->master->get_production_padang($bulan, $tahun);
    }

    public function get_production_tonasa($bulan, $tahun) {
        $this->master->get_production_tonasa($bulan, $tahun);
    }
    
    public function get_production_rembang($bulan, $tahun) {
        $this->master->get_production_rembang($bulan, $tahun);
    }
    
    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="MASTER PROGNOSE">
    public function prognose($pemisah) {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Master Data Prognose";
        $load['pemisah'] = $pemisah;
        if ($pemisah == 2) {
            $load['a'] = "Prognose Semen Gresik";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/prognose_sg', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/prognose_sg', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/prognose_sg', $load);
            }
        } elseif ($pemisah == 3) {
            $load['a'] = "Prognose Semen Padang";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/prognose_sp', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/prognose_sp', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/prognose_sp', $load);
            }
        } elseif ($pemisah == 4) {
            $load['a'] = "Prognose Semen Tonasa";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/prognose_st', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/prognose_st', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/prognose_st', $load);
            }
        } elseif ($pemisah == 5) {
            $load['a'] = "Prognose Semen Thanglong";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/prognose_tlcc', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/prognose_tlcc', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/prognose_tlcc', $load);
            }
        }
    }

    public function get_prognose_sg($pemisah, $plant, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        if ($plant == 1) {
            $plant2 = 'tbn1';
        } if ($plant == 2) {
            $plant2 = 'tbn2';
        } if ($plant == 3) {
            $plant2 = 'tbn3';
        } if ($plant == 4) {
            $plant2 = 'tbn4';
        } if ($plant == 5) {
            $plant2 = 'tbn5';
        } if ($plant == 6) {
            $plant2 = 'tbn6';
        } if ($plant == 7) {
            $plant2 = 'tbn7';
        } if ($plant == 8) {
            $plant2 = 'tbn8';
        } if ($plant == 9) {
            $plant2 = 'tbn9';
        } if ($plant == 10) {
            $plant2 = 'tbna';
        } if ($plant == 11) {
            $plant2 = 'tbnb';
        } if ($plant == 12) {
            $plant2 = 'tbnc';
        }
        $this->master->get_prognose($company, $plant2, $tahun);
    }

    public function save_prognose_sg() {
        $company = '7000';
        $plant2 = "";
        if ($this->input->post('plant') == 1) {
            $plant2 = 'tbn1';
        } if ($this->input->post('plant') == 2) {
            $plant2 = 'tbn2';
        } if ($this->input->post('plant') == 3) {
            $plant2 = 'tbn3';
        } if ($this->input->post('plant') == 4) {
            $plant2 = 'tbn4';
        } if ($this->input->post('plant') == 5) {
            $plant2 = 'tbn5';
        } if ($this->input->post('plant') == 6) {
            $plant2 = 'tbn6';
        } if ($this->input->post('plant') == 7) {
            $plant2 = 'tbn7';
        } if ($this->input->post('plant') == 8) {
            $plant2 = 'tbn8';
        } if ($this->input->post('plant') == 9) {
            $plant2 = 'tbn9';
        } if ($this->input->post('plant') == 10) {
            $plant2 = 'tbna';
        } if ($this->input->post('plant') == 11) {
            $plant2 = 'tbnb';
        } if ($this->input->post('plant') == 12) {
            $plant2 = 'tbnc';
        }

        return json_encode($this->master->save_prognose($plant2, $company));
    }

    public function get_prognose_sp($pemisah, $plant, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        if ($plant == 1) {
            $plant2 = 'ind2';
        } elseif ($plant == 2) {
            $plant2 = 'ind3';
        } elseif ($plant == 3) {
            $plant2 = 'ind41';
        } elseif ($plant == 4) {
            $plant2 = 'ind42';
        } elseif ($plant == 5) {
            $plant2 = 'ind51';
        } elseif ($plant == 6) {
            $plant2 = 'ind52';
        } elseif ($plant == 7) {
            $plant2 = 'dmi';
        }
        $this->master->get_prognose($company, $plant2, $tahun);
    }

    public function save_prognose_sp() {
        $company = '3000';
        $plant2 = "";
        if ($this->input->post('plant') == 1) {
            $plant2 = 'ind2';
        } elseif ($this->input->post('plant') == 2) {
            $plant2 = 'ind3';
        } elseif ($this->input->post('plant') == 3) {
            $plant2 = 'ind41';
        } elseif ($this->input->post('plant') == 4) {
            $plant2 = 'ind42';
        } elseif ($this->input->post('plant') == 5) {
            $plant2 = 'ind51';
        } elseif ($this->input->post('plant') == 6) {
            $plant2 = 'ind52';
        } elseif ($this->input->post('plant') == 7) {
            $plant2 = 'dmi';
        }

        return json_encode($this->master->save_prognose($plant2, $company));
    }

    public function get_prognose_st($pemisah, $plant, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        if ($plant == 1) {
            $plant2 = 'tns2';
        } elseif ($plant == 2) {
            $plant2 = 'tns3';
        } elseif ($plant == 3) {
            $plant2 = 'tns41';
        } elseif ($plant == 4) {
            $plant2 = 'tns42';
        } elseif ($plant == 5) {
            $plant2 = 'tns51';
        } elseif ($plant == 6) {
            $plant2 = 'tns52';
        }
        $this->master->get_prognose($company, $plant2, $tahun);
    }

    public function save_prognose_st() {
        $company = '4000';
        $plant2 = "";
        if ($this->input->post('plant') == 1) {
            $plant2 = 'tns2';
        } elseif ($this->input->post('plant') == 2) {
            $plant2 = 'tns3';
        } elseif ($this->input->post('plant') == 3) {
            $plant2 = 'tns41';
        } elseif ($this->input->post('plant') == 4) {
            $plant2 = 'tns42';
        } elseif ($this->input->post('plant') == 5) {
            $plant2 = 'tns51';
        } elseif ($this->input->post('plant') == 6) {
            $plant2 = 'tns52';
        }

        return json_encode($this->master->save_prognose($plant2, $company));
    }

    public function get_prognose_tlcc($pemisah, $plant, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        if ($plant == 1) {
            $plant2 = 'mp';
        } elseif ($plant == 2) {
            $plant2 = 'hcm';
        }
        $this->master->get_prognose($company, $plant2, $tahun);
    }

    public function save_prognose_tlcc() {
        $company = '6000';
        $plant2 = "";
        if ($this->input->post('plant') == 1) {
            $plant2 = 'mp';
        } elseif ($this->input->post('plant') == 2) {
            $plant2 = 'hcm';
        }

        return json_encode($this->master->save_prognose($plant2, $company));
    }
    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="MASTER CAPACITY">
    public function capacity($pemisah) {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Master Data Capacity";
        $load['pemisah'] = $pemisah;
        if ($pemisah == 2) {
            $load['a'] = "Capacity Semen Gresik";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/capacity_sg', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/capacity_sg', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/capacity_sg', $load);
            }
        } elseif ($pemisah == 3) {
            $load['a'] = "Capacity Semen Padang";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/capacity_sp', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/capacity_sp', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/capacity_sp', $load);
            }
        } elseif ($pemisah == 4) {
            $load['a'] = "Capacity Semen Tonasa";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/capacity_st', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/capacity_st', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/capacity_st', $load);
            }
        } elseif ($pemisah == 5) {
            $load['a'] = "Capacity Semen Thanglong";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/capacity_tlcc', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/capacity_tlcc', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/capacity_tlcc', $load);
            }
        }
    }

    public function get_capacity_sg($pemisah, $plant, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        if ($plant == 1) {
            $plant2 = 'tbn1';
        } elseif ($plant == 2) {
            $plant2 = 'tbn2';
        } elseif ($plant == 3) {
            $plant2 = 'tbn3';
        } elseif ($plant == 4) {
            $plant2 = 'tbn4';
        } elseif ($plant == 5) {
            $plant2 = 'tbn5';
        } elseif ($plant == 6) {
            $plant2 = 'tbn6';
        } elseif ($plant == 7) {
            $plant2 = 'tbn7';
        } elseif ($plant == 8) {
            $plant2 = 'tbn8';
        } elseif ($plant == 9) {
            $plant2 = 'tbn9';
        } elseif ($plant == 10) {
            $plant2 = 'tbna';
        } elseif ($plant == 11) {
            $plant2 = 'tbnb';
        } elseif ($plant == 12) {
            $plant2 = 'tbnc';
        } elseif ($plant == 13) {
            $plant2 = 'tbnd';
        } elseif ($plant == 14) {
            $plant2 = 'cgd';
        } elseif ($plant == 15) {
            $plant2 = 'rmb1';
        } elseif ($plant == 16) {
            $plant2 = 'rmb2';
        }
        $this->master->get_capacity($company, $plant2, $tahun);
    }

    public function save_capacity_sg() {
        $company = '7000';
        $plant2 = "";
        if ($this->input->post('plant') == 1) {
            $plant2 = 'tbn1';
        } elseif ($this->input->post('plant') == 2) {
            $plant2 = 'tbn2';
        } elseif ($this->input->post('plant') == 3) {
            $plant2 = 'tbn3';
        } elseif ($this->input->post('plant') == 4) {
            $plant2 = 'tbn4';
        } elseif ($this->input->post('plant') == 5) {
            $plant2 = 'tbn5';
        } elseif ($this->input->post('plant') == 6) {
            $plant2 = 'tbn6';
        } elseif ($this->input->post('plant') == 7) {
            $plant2 = 'tbn7';
        } elseif ($this->input->post('plant') == 8) {
            $plant2 = 'tbn8';
        } elseif ($this->input->post('plant') == 9) {
            $plant2 = 'tbn9';
        } elseif ($this->input->post('plant') == 10) {
            $plant2 = 'tbna';
        } elseif ($this->input->post('plant') == 11) {
            $plant2 = 'tbnb';
        } elseif ($this->input->post('plant') == 12) {
            $plant2 = 'tbnc';
        } elseif ($this->input->post('plant') == 13) {
            $plant2 = 'tbnd';
        } elseif ($this->input->post('plant') == 14) {
            $plant2 = 'cgd';
        } elseif ($this->input->post('plant') == 15) {
            $plant2 = 'rmb1';
        } elseif ($this->input->post('plant') == 16) {
            $plant2 = 'rmb2';
        }

        return json_encode($this->master->save_capacity($plant2, $company));
    }

    public function get_capacity_sp($pemisah, $plant, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        if ($plant == 1) {
            $plant2 = 'ind2';
        } elseif ($plant == 2) {
            $plant2 = 'ind3';
        } elseif ($plant == 3) {
            $plant2 = 'ind41';
        } elseif ($plant == 4) {
            $plant2 = 'ind42';
        } elseif ($plant == 5) {
            $plant2 = 'ind51';
        } elseif ($plant == 6) {
            $plant2 = 'ind52';
        } elseif ($plant == 7) {
            $plant2 = 'ind6';
        } elseif ($plant == 8) {
            $plant2 = 'dmi';
        }
        $this->master->get_capacity($company, $plant2, $tahun);
    }

    public function save_capacity_sp() {
        $company = '3000';
        $plant2 = "";
        if ($this->input->post('plant') == 1) {
            $plant2 = 'ind2';
        } elseif ($this->input->post('plant') == 2) {
            $plant2 = 'ind3';
        } elseif ($this->input->post('plant') == 3) {
            $plant2 = 'ind41';
        } elseif ($this->input->post('plant') == 4) {
            $plant2 = 'ind42';
        } elseif ($this->input->post('plant') == 5) {
            $plant2 = 'ind51';
        } elseif ($this->input->post('plant') == 6) {
            $plant2 = 'ind52';
        } elseif ($this->input->post('plant') == 7) {
            $plant2 = 'ind6';
        } elseif ($this->input->post('plant') == 8) {
            $plant2 = 'dmi';
        }

        return json_encode($this->master->save_capacity($plant2, $company));
    }

    public function get_capacity_st($pemisah, $plant, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        if ($plant == 1) {
            $plant2 = 'tns2';
        } elseif ($plant == 2) {
            $plant2 = 'tns3';
        } elseif ($plant == 3) {
            $plant2 = 'tns41';
        } elseif ($plant == 4) {
            $plant2 = 'tns42';
        } elseif ($plant == 5) {
            $plant2 = 'tns51';
        } elseif ($plant == 6) {
            $plant2 = 'tns52';
        }
        $this->master->get_capacity($company, $plant2, $tahun);
    }

    public function save_capacity_st() {
        $company = '4000';
        $plant2 = "";
        if ($this->input->post('plant') == 1) {
            $plant2 = 'tns2';
        } elseif ($this->input->post('plant') == 2) {
            $plant2 = 'tns3';
        } elseif ($this->input->post('plant') == 3) {
            $plant2 = 'tns41';
        } elseif ($this->input->post('plant') == 4) {
            $plant2 = 'tns42';
        } elseif ($this->input->post('plant') == 5) {
            $plant2 = 'tns51';
        } elseif ($this->input->post('plant') == 6) {
            $plant2 = 'tns52';
        }

        return json_encode($this->master->save_capacity($plant2, $company));
    }

    public function get_capacity_tlcc($pemisah, $plant, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        if ($plant == 1) {
            $plant2 = 'mp';
        } elseif ($plant == 2) {
            $plant2 = 'hcm';
        }
        $this->master->get_capacity($company, $plant2, $tahun);
    }

    public function save_capacity_tlcc() {
        $company = '6000';
        $plant2 = "";
        if ($this->input->post('plant') == 1) {
            $plant2 = 'mp';
        } elseif ($this->input->post('plant') == 2) {
            $plant2 = 'hcm';
        }

        return json_encode($this->master->save_capacity($plant2, $company));
    }

    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="MASTER RKAP PLANT">
    public function rkap_plant($pemisah) {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "RKAP Plant";
        $load['pemisah'] = $pemisah;
        if ($pemisah == 2) {
            $load['a'] = "RKAP Plant Semen Gresik";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/rkap_plant_sg', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/rkap_plant_sg', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/rkap_plant_sg', $load);
            }
        } elseif ($pemisah == 3) {
            $load['a'] = "RKAP Plant Semen Padang";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/rkap_plant_sp', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/rkap_plant_sp', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/rkap_plant_sp', $load);
            }
        } elseif ($pemisah == 4) {
            $load['a'] = "RKAP Plant Semen Tonasa";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/rkap_plant_st', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/rkap_plant_st', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/rkap_plant_st', $load);
            }
        } elseif ($pemisah == 5) {
            $load['a'] = "RKAP Plant Thang Long Cement";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/rkap_plant_tlcc', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/rkap_plant_tlcc', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/rkap_plant_tlcc', $load);
            }
        }
    }

    public function get_rkap_plant_sg($pemisah, $plant, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        if ($plant == 1) {
            $plant2 = 'tbn1';
        } elseif ($plant == 2) {
            $plant2 = 'tbn2';
        } elseif ($plant == 3) {
            $plant2 = 'tbn3';
        } elseif ($plant == 4) {
            $plant2 = 'tbn4';
        } elseif ($plant == 5) {
            $plant2 = 'grs';
        } elseif ($plant == 6) {
            $plant2 = 'cgd';
        } elseif ($plant == 7) {
            $plant2 = 'rmb1';
        }
        $this->master->get_rkap_plant($company, $plant2, $tahun);
    }

    public function save_rkap_plant_sg() {
        $company = '7000';
        $plant2 = "";
        if ($this->input->post('plant') == 1) {
            $plant2 = 'tbn1';
        } elseif ($this->input->post('plant') == 2) {
            $plant2 = 'tbn2';
        } elseif ($this->input->post('plant') == 3) {
            $plant2 = 'tbn3';
        } elseif ($this->input->post('plant') == 4) {
            $plant2 = 'tbn4';
        } elseif ($this->input->post('plant') == 5) {
            $plant2 = 'grs';
        } elseif ($this->input->post('plant') == 6) {
            $plant2 = 'cgd';
        } elseif ($this->input->post('plant') == 7) {
            $plant2 = 'rmb1';
        }

        return json_encode($this->master->save_rkap_plant($company, $plant2));
        $this->master->update_rkaptotal_from_rkapplant();
    }

    public function get_rkap_plant_sp($pemisah, $plant, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        if ($plant == 1) {
            $plant2 = 'ind2';
        } elseif ($plant == 2) {
            $plant2 = 'ind3';
        } elseif ($plant == 3) {
            $plant2 = 'ind41';
        } elseif ($plant == 4) {
            $plant2 = 'ind42';
        } elseif ($plant == 5) {
            $plant2 = 'ind51';
        } elseif ($plant == 6) {
            $plant2 = 'ind52';
        } elseif ($plant == 7) {
            $plant2 = 'ind6';
        } elseif ($plant == 8) {
            $plant2 = 'dmi';
        }
        $this->master->get_rkap_plant($company, $plant2, $tahun);
    }

    public function save_rkap_plant_sp() {
        $company = '3000';
        $plant2 = "";
        if ($this->input->post('plant') == 1) {
            $plant2 = 'ind2';
        } elseif ($this->input->post('plant') == 2) {
            $plant2 = 'ind3';
        } elseif ($this->input->post('plant') == 3) {
            $plant2 = 'ind41';
        } elseif ($this->input->post('plant') == 4) {
            $plant2 = 'ind42';
        } elseif ($this->input->post('plant') == 5) {
            $plant2 = 'ind51';
        } elseif ($this->input->post('plant') == 6) {
            $plant2 = 'ind52';
        } elseif ($this->input->post('plant') == 7) {
            $plant2 = 'ind6';
        } elseif ($this->input->post('plant') == 8) {
            $plant2 = 'dmi';
        }

        return json_encode($this->master->save_rkap_plant($company, $plant2));
        $this->master->update_rkaptotal_from_rkapplant();
    }

    public function get_rkap_plant_st($pemisah, $plant, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        if ($plant == 1) {
            $plant2 = 'tns2';
        } elseif ($plant == 2) {
            $plant2 = 'tns3';
        } elseif ($plant == 3) {
            $plant2 = 'tns41';
        } elseif ($plant == 4) {
            $plant2 = 'tns42';
        } elseif ($plant == 5) {
            $plant2 = 'tns51';
        } elseif ($plant == 6) {
            $plant2 = 'tns52';
        }
        $this->master->get_rkap_plant($company, $plant2, $tahun);
    }

    public function save_rkap_plant_st() {
        $company = '4000';
        $plant2 = "";
        if ($this->input->post('plant') == 1) {
            $plant2 = 'tns2';
        } elseif ($this->input->post('plant') == 2) {
            $plant2 = 'tns3';
        } elseif ($this->input->post('plant') == 3) {
            $plant2 = 'tns41';
        } elseif ($this->input->post('plant') == 4) {
            $plant2 = 'tns42';
        } elseif ($this->input->post('plant') == 5) {
            $plant2 = 'tns51';
        } elseif ($this->input->post('plant') == 6) {
            $plant2 = 'tns52';
        }

        return json_encode($this->master->save_rkap_plant($company, $plant2));
        $this->master->update_rkaptotal_from_rkapplant();
    }

    public function get_rkap_plant_tlcc($pemisah, $plant, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        if ($plant == 1) {
            $plant2 = 'mp';
        } elseif ($plant == 2) {
            $plant2 = 'hcm';
        }
        $this->master->get_rkap_plant($company, $plant2, $tahun);
    }

    public function save_rkap_plant_tlcc() {
        $company = '6000';
        $plant2 = "";
        if ($this->input->post('plant') == 1) {
            $plant2 = 'mp';
        } elseif ($this->input->post('plant') == 2) {
            $plant2 = 'hcm';
        }

        return json_encode($this->master->save_rkap_plant($company, $plant2));
        $this->master->update_rkaptotal_from_rkapplant();
    }
    
    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="MASTER RKAP OPCO">
    public function rkap_total($pemisah) {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "RKAP Total";
        $load['pemisah'] = $pemisah;
        if ($pemisah == 2) {
            $load['a'] = "RKAP Total Semen Gresik";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/rkap_total_sg', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/rkap_total_sg', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/rkap_total_sg', $load);
            }
        } elseif ($pemisah == 3) {
            $load['a'] = "RKAP Total Semen Padang";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/rkap_total_sp', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/rkap_total_sp', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/rkap_total_sp', $load);
            }
        } elseif ($pemisah == 4) {
            $load['a'] = "RKAP Total Semen Tonasa";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/rkap_total_st', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/rkap_total_st', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/rkap_total_st', $load);
            }
        } elseif ($pemisah == 5) {
            $load['a'] = "RKAP Total Thang Long Cement";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/rkap_total_tlcc', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/rkap_total_tlcc', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/rkap_total_tlcc', $load);
            }
        }
    }

    public function get_rkap_total_sg($pemisah, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        $this->master->get_rkap_total($company, $tahun);
    }

    public function save_rkap_total_sg() {
        $company = '7000';

        return json_encode($this->master->save_rkap_total($company));
    }

    public function get_rkap_total_sp($pemisah, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        $this->master->get_rkap_total($company, $tahun);
    }

    public function save_rkap_total_sp() {
        $company = '3000';

        return json_encode($this->master->save_rkap_total($company));
    }

    public function get_rkap_total_st($pemisah, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        $this->master->get_rkap_total($company, $tahun);
    }

    public function save_rkap_total_st() {
        $company = '4000';

        return json_encode($this->master->save_rkap_total($company));
    }

    public function get_rkap_total_tlcc($pemisah, $tahun) {
        if ($pemisah == 2) {
            $company = 7000;
        } elseif ($pemisah == 3) {
            $company = 3000;
        } elseif ($pemisah == 4) {
            $company = 4000;
        } elseif ($pemisah == 5) {
            $company = 6000;
        }
        $this->master->get_rkap_total($company, $tahun);
    }

    public function save_rkap_total_tlcc() {
        $company = '6000';

        return json_encode($this->master->save_rkap_total($company));
    }

    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="MASTER KILN OPERATIONS">
    public function kiln_ops($pemisah) {
        $level = $this->session->userdata('level');
        $load['pemisah'] = $pemisah;
        $load['Title'] = "KILN Ops";

        if ($pemisah == 2) {
            $load['a'] = "KILN Ops Semen Gresik";
            $year = $this->input->get('tahun');
            $this->load->model('mplant_eksekutif');
            $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('SG', $year);
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/master_kiln_sg', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/master_kiln_sg', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/master_kiln_sg', $load);
            }
        } elseif ($pemisah == 3) {
            $load['a'] = "KILN Ops Semen Padang";
            $year = $this->input->get('tahun');
            $this->load->model('mplant_eksekutif');
            $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('SP', $year);
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/master_kiln_sp', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/master_kiln_sp', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/master_kiln_sp', $load);
            }
        } elseif ($pemisah == 4) {
            $load['a'] = "KILN Ops Semen Tonasa";
            $year = $this->input->get('tahun');
            $this->load->model('mplant_eksekutif');
            $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('ST', $year);
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/master_kiln_st', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/master_kiln_st', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/master_kiln_st', $load);
            }
        } elseif ($pemisah == 5) {
            $load['a'] = "KILN Ops Thang Long Cement";
            $plant = 'mp';
            $tahun = $this->input->get('input');
            $load['last_month'] = $this->master->getlast_kiln(6000, $plant, $tahun);
            $year = $this->input->get('tahun');
            $this->load->model('mplant_eksekutif');
            $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('TLCC', $year);
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/master_kiln_tlcc', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/master_kiln_tlcc', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/master_kiln_tlcc', $load);
            }
        }
    }

    public function get_kiln_sg($bulan, $tahun, $plant) {
        if ($plant == 1) {
            echo '{"mydata":' . json_encode($this->master->add_ops_kiln_7000_tb1($bulan, $tahun)) . '}';
        } elseif ($plant == 2) {
            echo '{"mydata":' . json_encode($this->master->add_ops_kiln_7000_tb2($bulan, $tahun)) . '}';
        } elseif ($plant == 3) {
            echo '{"mydata":' . json_encode($this->master->add_ops_kiln_7000_tb3($bulan, $tahun)) . '}';
        } elseif ($plant == 4) {
            echo '{"mydata":' . json_encode($this->master->add_ops_kiln_7000_tb4($bulan, $tahun)) . '}';
        }
    }
    
    public function save_kiln_sg($bulan, $tahun, $plant) {
        if ($plant == 1) {
            $this->master->save_ops_kiln_7000_tb1($bulan, $tahun);
        } elseif ($plant == 2) {
            $this->master->save_ops_kiln_7000_tb2($bulan, $tahun);
        } elseif ($plant == 3) {
            $this->master->save_ops_kiln_7000_tb3($bulan, $tahun);
        } elseif ($plant == 4) {
            $this->master->save_ops_kiln_7000_tb4($bulan, $tahun);
        }
    }

    public function get_kiln_sp($bulan, $tahun, $plant) {
        if ($plant == 1) {
            echo '{"mydata":' . json_encode($this->master->add_ops_kiln_3000_ind2($bulan, $tahun)) . '}';
        } elseif ($plant == 2) {
            echo '{"mydata":' . json_encode($this->master->add_ops_kiln_3000_ind3($bulan, $tahun)) . '}';
        } elseif ($plant == 3) {
            echo '{"mydata":' . json_encode($this->master->add_ops_kiln_3000_ind4($bulan, $tahun)) . '}';
        } elseif ($plant == 4) {
            echo '{"mydata":' . json_encode($this->master->add_ops_kiln_3000_ind5($bulan, $tahun)) . '}';
        }
    }
    
    public function save_kiln_sp($bulan, $tahun, $plant) {
        if ($plant == 1) {
            $this->master->save_ops_kiln_3000_ind2($bulan, $tahun);
        } elseif ($plant == 2) {
            $this->master->save_ops_kiln_3000_ind3($bulan, $tahun);
        } elseif ($plant == 3) {
            $this->master->save_ops_kiln_3000_ind4($bulan, $tahun);
        } elseif ($plant == 4) {
            $this->master->save_ops_kiln_3000_ind5($bulan, $tahun);
        }
    }

    public function get_kiln_st($bulan, $tahun, $plant) {
        if ($plant == 1) {
            echo '{"mydata":' . json_encode($this->master->add_ops_kiln_4000_tns2($bulan, $tahun)) . '}';
        } elseif ($plant == 2) {
            echo '{"mydata":' . json_encode($this->master->add_ops_kiln_4000_tns3($bulan, $tahun)) . '}';
        } elseif ($plant == 3) {
            echo '{"mydata":' . json_encode($this->master->add_ops_kiln_4000_tns4($bulan, $tahun)) . '}';
        } elseif ($plant == 4) {
            echo '{"mydata":' . json_encode($this->master->add_ops_kiln_4000_tns5($bulan, $tahun)) . '}';
        }
    }
    
    public function save_kiln_st($bulan, $tahun, $plant) {
        if ($plant == 1) {
            $this->master->save_ops_kiln_4000_tns2($bulan, $tahun);
        } elseif ($plant == 2) {
            $this->master->save_ops_kiln_4000_tns3($bulan, $tahun);
        } elseif ($plant == 3) {
            $this->master->save_ops_kiln_4000_tns4($bulan, $tahun);
        } elseif ($plant == 4) {
            $this->master->save_ops_kiln_4000_tns5($bulan, $tahun);
        }
    }

    public function get_kiln_tlcc($bulan, $tahun) {
        echo '{"mydata":' . json_encode($this->master->add_ops_kiln_6000_mp($bulan, $tahun)) . '}';
    }
    
    public function save_kiln_tlcc($bulan, $tahun) {
        $this->master->save_ops_kiln_6000_mp($bulan, $tahun);
    }
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="MASTER FM OPERATIONS">    
    public function fm_ops($pemisah) {
        $level = $this->session->userdata('level');
        $load['pemisah'] = $pemisah;
        $load['Title'] = "Finish Mill Ops";

        if ($pemisah == 2) {
            $load['a'] = "Finish Mill Ops Semen Gresik";
            $year = $this->input->get('tahun');
            $this->load->model('mplant_eksekutif');
            $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('SG', $year);
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/master_fm_sg', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/master_fm_sg', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/master_fm_sg', $load);
            }
        } elseif ($pemisah == 3) {
            $load['a'] = "Finish Mill Ops Semen Padang";
            $year = $this->input->get('tahun');
            $this->load->model('mplant_eksekutif');
            $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('SP', $year);
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/master_fm_sp', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/master_fm_sp', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/master_fm_sp', $load);
            }
        } elseif ($pemisah == 4) {
            $load['a'] = "Finish Mill Ops Semen Tonasa";
            $year = $this->input->get('tahun');
            $this->load->model('mplant_eksekutif');
            $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('ST', $year);
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/master_fm_st', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/master_fm_st', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/master_fm_st', $load);
            }
        } elseif ($pemisah == 5) {
            $load['a'] = "Finish Mill Ops Thang Long Cement";
            $year = $this->input->get('tahun');
            $this->load->model('mplant_eksekutif');
            $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('TLCC', $year);
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/master_fm_tlcc', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/master_fm_tlcc', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/master_fm_tlcc', $load);
            }
        }
    }
    
    public function get_fm_sg($bulan, $tahun, $plant) {
        if ($plant == 1) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_7000_tbn1($bulan, $tahun)) . '}';
        } elseif ($plant == 2) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_7000_tbn2($bulan, $tahun)) . '}';
        } elseif ($plant == 3) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_7000_tbn3($bulan, $tahun)) . '}';
        } elseif ($plant == 4) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_7000_tbn4($bulan, $tahun)) . '}';
        } elseif ($plant == 5) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_7000_tbn5($bulan, $tahun)) . '}';
        } elseif ($plant == 6) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_7000_tbn6($bulan, $tahun)) . '}';
        } elseif ($plant == 7) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_7000_tbn7($bulan, $tahun)) . '}';
        } elseif ($plant == 8) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_7000_tbn8($bulan, $tahun)) . '}';
        } elseif ($plant == 9) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_7000_tbn9($bulan, $tahun)) . '}';
        } elseif ($plant == 10) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_7000_tbna($bulan, $tahun)) . '}';
        } elseif ($plant == 11) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_7000_tbnb($bulan, $tahun)) . '}';
        } elseif ($plant == 12) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_7000_tbnc($bulan, $tahun)) . '}';
        }
    }
    
    public function save_fm_sg($bulan, $tahun, $plant) {
        if ($plant == 1) {
            $this->master->save_fm_ops_7000_tbn1($bulan, $tahun);
        } elseif ($plant == 2) {
            $this->master->save_fm_ops_7000_tbn2($bulan, $tahun);
        } elseif ($plant == 3) {
            $this->master->save_fm_ops_7000_tbn3($bulan, $tahun);
        } elseif ($plant == 4) {
            $this->master->save_fm_ops_7000_tbn4($bulan, $tahun);
        } elseif ($plant == 5) {
            $this->master->save_fm_ops_7000_tbn5($bulan, $tahun);
        } elseif ($plant == 6) {
            $this->master->save_fm_ops_7000_tbn6($bulan, $tahun);
        } elseif ($plant == 7) {
            $this->master->save_fm_ops_7000_tbn7($bulan, $tahun);
        } elseif ($plant == 8) {
            $this->master->save_fm_ops_7000_tbn8($bulan, $tahun);
        } elseif ($plant == 9) {
            $this->master->save_fm_ops_7000_tbn9($bulan, $tahun);
        } elseif ($plant == 10) {
            $this->master->save_fm_ops_7000_tbna($bulan, $tahun);
        } elseif ($plant == 11) {
            $this->master->save_fm_ops_7000_tbnb($bulan, $tahun);
        } elseif ($plant == 12) {
            $this->master->save_fm_ops_7000_tbnc($bulan, $tahun);
        }
    }
    
    public function get_fm_sp($bulan, $tahun, $plant) {
        if ($plant == 1) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_3000_ind2($bulan, $tahun)) . '}';
        } elseif ($plant == 2) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_3000_ind3($bulan, $tahun)) . '}';
        } elseif ($plant == 3) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_3000_ind41($bulan, $tahun)) . '}';
        } elseif ($plant == 4) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_3000_ind42($bulan, $tahun)) . '}';
        } elseif ($plant == 5) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_3000_ind51($bulan, $tahun)) . '}';
        } elseif ($plant == 6) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_3000_ind52($bulan, $tahun)) . '}';
        } elseif ($plant == 7) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_3000_dmi($bulan, $tahun)) . '}';
        }
    }
    
    public function save_fm_sp($bulan, $tahun, $plant) {
        if ($plant == 1) {
            $this->master->save_fm_ops_3000_ind2($bulan, $tahun);
        } elseif ($plant == 2) {
            $this->master->save_fm_ops_3000_ind3($bulan, $tahun);
        } elseif ($plant == 3) {
            $this->master->save_fm_ops_3000_ind41($bulan, $tahun);
        } elseif ($plant == 4) {
            $this->master->save_fm_ops_3000_ind42($bulan, $tahun);
        } elseif ($plant == 5) {
            $this->master->save_fm_ops_3000_ind51($bulan, $tahun);
        } elseif ($plant == 6) {
            $this->master->save_fm_ops_3000_ind52($bulan, $tahun);
        } elseif ($plant == 7) {
            $this->master->save_fm_ops_3000_dmi($bulan, $tahun);
        }
    }
    
    public function get_fm_st($bulan, $tahun, $plant) {
        if ($plant == 1) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_4000_tns2($bulan, $tahun)) . '}';
        } elseif ($plant == 2) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_4000_tns3($bulan, $tahun)) . '}';
        } elseif ($plant == 3) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_4000_tns41($bulan, $tahun)) . '}';
        } elseif ($plant == 4) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_4000_tns42($bulan, $tahun)) . '}';
        } elseif ($plant == 5) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_4000_tns51($bulan, $tahun)) . '}';
        } elseif ($plant == 6) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_4000_tns52($bulan, $tahun)) . '}';
        }
    }
    
    public function save_fm_st($bulan, $tahun, $plant) {
        if ($plant == 1) {
            $this->master->save_fm_ops_4000_tns2($bulan, $tahun);
        } elseif ($plant == 2) {
            $this->master->save_fm_ops_4000_tns3($bulan, $tahun);
        } elseif ($plant == 3) {
            $this->master->save_fm_ops_4000_tns41($bulan, $tahun);
        } elseif ($plant == 4) {
            $this->master->save_fm_ops_4000_tns42($bulan, $tahun);
        } elseif ($plant == 5) {
            $this->master->save_fm_ops_4000_tns51($bulan, $tahun);
        } elseif ($plant == 6) {
            $this->master->save_fm_ops_4000_tns52($bulan, $tahun);
        }
    }
    
    public function get_fm_tlcc($bulan, $tahun, $plant) {
        if ($plant == 1) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_6000_mp($bulan, $tahun)) . '}';
        } elseif ($plant == 2) {
            echo '{"mydata":' . json_encode($this->master->add_fm_ops_6000_hcm($bulan, $tahun)) . '}';
        }
    }
    
    public function save_fm_tlcc($bulan, $tahun, $plant) {
        if ($plant == 1) {
            $this->master->save_fm_ops_6000_mp($bulan, $tahun);
        } elseif ($plant == 2) {
            $this->master->save_fm_ops_6000_hcm($bulan, $tahun);
        }
    }
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="MASTER Prognose Per Day Per Opco">
    public function prognose_opco($pemisah) {
        $level = $this->session->userdata('level');
        $load['pemisah'] = $pemisah;
        $load['Title'] = "Prognose Per Day";

        if ($pemisah == 2) {
            $load['a'] = "Prognose Semen Gresik";
        } elseif ($pemisah == 3) {
            $load['a'] = "Prognose Semen Padang";
        } elseif ($pemisah == 4) {
            $load['a'] = "Prognose Semen Tonasa";
        } elseif ($pemisah == 5) {
            $load['a'] = "Prognose Semen Thanglong";
        }

        if ($pemisah == 2) {
            $load['a'] = "Prognose Semen Gresik";
            $year = $this->input->get('tahun');
            $this->load->model('mplant_eksekutif');
            $load['last_update'] = $this->mplant_eksekutif->get_prog_daily_update('SG', $year);
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/prognose_sg_perday', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/prognose_sg_perday', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/prognose_sg_perday', $load);
            }
        } elseif ($pemisah == 3) {
            $load['a'] = "Prognose Semen Padang";
            $year = $this->input->get('tahun');
            $this->load->model('mplant_eksekutif');
            $load['last_update'] = $this->mplant_eksekutif->get_prog_daily_update('SP', $year);
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/prognose_sp_perday', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/prognose_sp_perday', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/prognose_sp_perday', $load);
            }
        } elseif ($pemisah == 4) {
            $load['a'] = "Prognose Semen Tonasa";
            $year = $this->input->get('tahun');
            $this->load->model('mplant_eksekutif');
            $load['last_update'] = $this->mplant_eksekutif->get_prog_daily_update('ST', $year);
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/prognose_st_perday', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/prognose_st_perday', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/prognose_st_perday', $load);
            }
        } elseif ($pemisah == 5) {
            $load['a'] = "Prognose Thang Long Cement";
            $year = $this->input->get('tahun');
            $this->load->model('mplant_eksekutif');
            $load['last_update'] = $this->mplant_eksekutif->get_prog_daily_update('TLCC', $year);
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/master/prognose_tlcc_perday', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/master/prognose_tlcc_perday', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/master/prognose_tlcc_perday', $load);
            }
        }
    }
    
    public function get_prognose_day_sg($bulan, $tahun) {
        $this->master->get_prognose_sg($bulan, $tahun);
    }
    
    public function save_prognose_day_sg($bulan, $tahun) {
        $this->master->save_prognose_sg($bulan, $tahun);
    }
    
    public function get_prognose_day_sp($bulan, $tahun) {
        $this->master->get_prognose_sp($bulan, $tahun);
    }
    
    public function save_prognose_day_sp($bulan, $tahun) {
        $this->master->save_prognose_sp($bulan, $tahun);
    }
    
    public function get_prognose_day_st($bulan, $tahun) {
        $this->master->get_prognose_st($bulan, $tahun);
    }
    
    public function save_prognose_day_st($bulan, $tahun) {
        $this->master->save_prognose_st($bulan, $tahun);
    }
    
    public function get_prognose_day_tlcc($bulan, $tahun) {
        $this->master->get_prognose_tlcc($bulan, $tahun);
    }
    
    public function save_prognose_day_tlcc($bulan, $tahun) {
        $this->master->save_prognose_tlcc($bulan, $tahun);
    }
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Master Stock">
    function stock_gresik() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Master Stock KSO SI-SG";
        $load['a'] = "Master Stock KSO SI-SG";
        
        $tahun = $this->input->get('tahun');;
        $bulan = $this->input->get('bulan');;
        $comp = 'SG';
        
        $load['data'] = $this->master->get_stock_SG($tahun, $bulan);
        $load['last'] = $this->master->get_stock_update($comp);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/stock_gresik', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/stock_gresik', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/master/stock_gresik', $load);
        }
    }
    
    function stock_rembang() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Master Stock SG";
        $load['a'] = "Master Stock SG";
        
        $tahun = $this->input->get('tahun');;
        $bulan = $this->input->get('bulan');;
        $comp = 'SGR';
        
        $load['data'] = $this->master->get_stock_SGR($tahun, $bulan);
        $load['last'] = $this->master->get_stock_update($comp);
        
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/stock_rembang', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/stock_rembang', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/master/stock_rembang', $load);
        }
    }
    
    function stock_padang() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Master Stock SP";
        $load['a'] = "Master Stock SP";
        
        $tahun = $this->input->get('tahun');;
        $bulan = $this->input->get('bulan');;
        $comp = 'SP';
        
        $load['data'] = $this->master->get_stock_SP($tahun, $bulan);
        $load['last'] = $this->master->get_stock_update($comp);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/stock_padang', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/stock_padang', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/master/stock_padang', $load);
        }
    }
    
    function stock_tonasa() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Master Stock ST";
        $load['a'] = "Master Stock ST";
        
        $tahun = $this->input->get('tahun');;
        $bulan = $this->input->get('bulan');;
        $comp = 'ST';
        
        $load['data'] = $this->master->get_stock_ST($tahun, $bulan);
        $load['last'] = $this->master->get_stock_update($comp);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/stock_tonasa', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/stock_tonasa', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/master/stock_tonasa', $load);
        }
    }
    
    function stock_tlcc() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Master Stock TLCC";
        $load['a'] = "Master Stock TLCC";
        
        $tahun = $this->input->get('tahun');;
        $bulan = $this->input->get('bulan');;
        $comp = 'TLCC';
        
        $load['data'] = $this->master->get_stock_TLCC($tahun, $bulan);
        $load['last'] = $this->master->get_stock_update($comp);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/master/stock_tlcc', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/master/stock_tlcc', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/master/stock_tlcc', $load);
        }
    }
    // </editor-fold>
}
