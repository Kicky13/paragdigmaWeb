<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Finance_report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->auth->GetSesionLogin();
        $this->load->model('mfinance_report');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function upload(){
        $time = isset($_GET['time']) ? $_GET['time'] : null;
        $comp = isset($_GET['comp']) ? $_GET['comp'] : null; 
        $time2 = explode (".",$time);
        $actual = $this->mfinance_report->get_actual_upload($comp, $time2[0]);
        $rkap = $this->mfinance_report->get_rkap_upload($comp, $time2[0]);
        $result['actual'] = $actual;
        $result['rkap'] = $rkap; 
        for($i=0;$i<count($actual);$i++){
            if($i==0){
                $upto_actual_nr[] = $actual[$i]['NET_REVENUE'];
                $upto_actual_cogs[] = $actual[$i]['COGS'];
                $upto_actual_te[] = $actual[$i]['TOTAL_EXPENSE'];
                $upto_actual_eb[] = $actual[$i]['EBITDA'];
                $upto_actual_pbt[] = $actual[$i]['PROFIT_BEFORE_TAX'];
            }else{
                $upto_actual_nr[] = $upto_actual_nr[$i-1] + $actual[$i]['NET_REVENUE'];
                $upto_actual_cogs[] = $upto_actual_cogs[$i-1] + $actual[$i]['COGS'];
                $upto_actual_te[] = $upto_actual_te[$i-1] + $actual[$i]['TOTAL_EXPENSE'];
                $upto_actual_eb[] = $upto_actual_eb[$i-1] + $actual[$i]['EBITDA'];
                $upto_actual_pbt[] = $upto_actual_pbt[$i-1] + $actual[$i]['PROFIT_BEFORE_TAX'];
            }
        }
        $result['actual_upto'] = array('NET_REVENUE'=>$upto_actual_nr,'COGS'=>$upto_actual_cogs,'TOTAL_EXPENSE'=>$upto_actual_te,'EBITDA'=>$upto_actual_eb,'PROFIT_BEFORE_TAX'=>$upto_actual_pbt); 
        
        for($i=0;$i<count($rkap);$i++){
            if($i==0){
                $upto_rkap_nr[] = $rkap[$i]['NET_REVENUE'];
                $upto_rkap_cogs[] = $rkap[$i]['COGS'];
                $upto_rkap_te[] = $rkap[$i]['TOTAL_EXPENSE'];
                $upto_rkap_eb[] = $rkap[$i]['EBITDA'];
                $upto_rkap_pbt[] = $rkap[$i]['PROFIT_BEFORE_TAX'];
            }else{
                $upto_rkap_nr[] = $upto_rkap_nr[$i-1] + $rkap[$i]['NET_REVENUE'];
                $upto_rkap_cogs[] = $upto_rkap_cogs[$i-1] + $rkap[$i]['COGS'];
                $upto_rkap_te[] = $upto_rkap_te[$i-1] + $rkap[$i]['TOTAL_EXPENSE'];
                $upto_rkap_eb[] = $upto_rkap_eb[$i-1] + $rkap[$i]['EBITDA'];
                $upto_rkap_pbt[] = $upto_rkap_pbt[$i-1] + $rkap[$i]['PROFIT_BEFORE_TAX'];
            }
        }
        $result['rkap_upto'] = array('NET_REVENUE'=>$upto_rkap_nr,'COGS'=>$upto_rkap_cogs,'TOTAL_EXPENSE'=>$upto_rkap_te,'EBITDA'=>$upto_rkap_eb,'PROFIT_BEFORE_TAX'=>$upto_rkap_pbt); 
        

        echo json_encode($result);
    }

    public function downred($data){
            if($data<100){
                    $data_r = "<font color='red'>".$data."</font>";
            }else{
                    $data_r = "<font color='blue'>".$data."</font>";
            }
            return $data_r;
    }
    
    public function upred($data){
            if($data>=100){
                    $data_r = "<font color='red'>".$data."</font>";
            }else{
                    $data_r = "<font color='blue'>".$data."</font>";
            }
            return $data_r;
    }

     public function gift_plus($pertama, $kedua, $dis) {
        $h3[1] = $pertama[1] + $kedua[1];
        $dt = number_format($h3[1], 0, '', '');
        $s3 = ', "val1":" ' . $dt;
        $dwn = "<td>$dt</td>";
        for ($n = 2; $n <= 12; $n++) {
            if ($n == 4 or $n == 5 or $n == 9 or $n == 10 or $n == 12) {
				if($n==4){
					$pembilang = $pertama[2] + $kedua[2];
					$pembagi = $pertama[1] + $kedua[1];
					if($pembagi==null){
						$h3[$n] = 0;
					}else{
						$h3[$n] = ($pembilang / $pembagi)*100;
					}
					//$h3[$n] = ($pembilang / $pembagi)*100;
				}else if($n==5){
					$pembilang = $pertama[2] + $kedua[2];
					$pembagi = $pertama[3] + $kedua[3];
					if($pembagi==null){
						$h3[$n] = 0;
					}else{
						$h3[$n] = ($pembilang / $pembagi)*100;
					}
					//$h3[$n] = ($pembilang / $pembagi)*100;
				}else if($n==9){
					$pembilang = $pertama[7] + $kedua[7];
					$pembagi = $pertama[6] + $kedua[6];
					if($pembagi==null){
						$h3[$n] = 0;
					}else{
						$h3[$n] = ($pembilang / $pembagi)*100;
					}
					//$h3[$n] = ($pembilang / $pembagi)*100;
				}else if($n==10){
					$pembilang = $pertama[7] + $kedua[7];
					$pembagi = $pertama[8] + $kedua[8];
					if($pembagi==null){
						$h3[$n] = 0;
					}else{
						$h3[$n] = ($pembilang / $pembagi)*100;
					}
					//$h3[$n] = ($pembilang / $pembagi)*100;
				}else if($n==12){
                    $pembilang = $pertama[2] + $kedua[2];
                    $pembagi = $pertama[11] + $kedua[11];
                    if($pembagi==null){
                        $h3[$n] = 0;
                    }else{
                        $h3[$n] = ($pembilang / $pembagi)*100;
                    }
                    //$h3[$n] = ($pembilang / $pembagi)*100;
                }
                //$h3[$n] = $pertama[$n] + $kedua[$n];
                if ($h3[$n] == 0) {
                    $nilai = '0%';
                } else {
                    //$nilai = number_format($h3[$n], 2, '.', ',');
					$nilai = round($h3[$n]).'%';
                }
				if($dis=='downred'){
					$nilai = $this->downred($nilai);
				}else{
					$nilai = $this->upred($nilai);
				}
            } else {
                $h3[$n] = $pertama[$n] + $kedua[$n];
                $nilai = number_format($h3[$n], 0, '', '');
            }
            $sh3 = $s3 . '", "val' . $n . '":" ' . $nilai;
            $s3 = $sh3;
            $down = $dwn . "<td>$nilai</td>";
            $dwn = $down;
        }
        $h3[0] = $sh3;
        $h3[99] = $dwn;
        return $h3;
    }

    public function gift_plus_monthly($pertama, $kedua, $dis) {
        $h3[1] = $pertama[1] + $kedua[1];
        $dt = number_format($h3[1], 0, '', '');
        $s3 = ', "val1":" ' . $dt;
        $dwn = "<td>$dt</td>";
        for ($n = 2; $n <= 8; $n++) {
            $h3[$n] = $pertama[$n] + $kedua[$n];
            $nilai = number_format($h3[$n], 0, '', '');
            $sh3 = $s3 . '", "val' . $n . '":" ' . $nilai;
            $s3 = $sh3;
            $down = $dwn . "<td>$nilai</td>";
            $dwn = $down;
        }
        $h3[0] = $sh3;
        $h3[99] = $dwn;
        return $h3;
    }
    public function gift_per($pertama, $kedua) {
        if ($pertama[1] == 0 or $kedua[1] == 0) {
            $h6[1] = 0;
            $s6 = ', "val1":" ';
            $dwn = "<td></td>";
        } else {
            $h6[1] = ($pertama[1] / $kedua[1]) * 100;
            $dt = number_format($h6[1], 2, '', '');
            $s6 = ', "val1":" ' . $dt . '%';
            $dwn = "<td>$dt%</td>";
        }
        for ($n = 2; $n <= 12; $n++) {
            if ($n == 4 or $n == 5 or $n == 9 or $n == 10 or $n == 12) {
                $h6[$n] = 0;
                $show = '';
            } else {
                if ($pertama[$n] == 0 or $kedua[$n] == 0) {
                    $h6[$n] = 0;
                    $show = '';
                } else {
                    $h6[$n] = ($pertama[$n] / $kedua[$n]) * 100;
                    $show = number_format($h6[$n], 2, '', '') . '%';
                }
            } 
            $sh6 = $s6 . '", "val' . $n . '":" ' . $show;
            $s6 = $sh6;
            $down = $dwn . "<td>$show</td>";
            $dwn = $down;
        }
        $h6[0] = $sh6;
        $h6[99] = $dwn;
        return $h6;
    }

    public function gift_c($pertama, $kedua, $dis) {
        if ($pertama[1] == 0 or $kedua[1] == 0) {
            $h6[1] = 0;
            $s6 = ', "val1":" ';
            $dwn = "<td></td>";
        } else {
            $h6[1] = ($pertama[1] / $kedua[1]);
            $dt = number_format($h6[1], 2, '', '');
            $s6 = ', "val1":" ' . $dt;
            $dwn = "<td>$dt</td>";
        }
        for ($n = 2; $n <= 12; $n++) {
            if ($n == 4 or $n == 5 or $n == 9 or $n == 10 or $n == 12) {
                //kurang persentasi
                if ($n == 4 or $n == 9) {
                    //jika nilai penyebut dan pembilang ==0
                    if ($h6[$n - 3] == 0) {
                        $h6[$n] = 0;
                    } else {
                        $h6[$n] = ($h6[$n - 2] / $h6[$n - 3]) * 100;
                    }
                } else {
                    if ($h6[$n - 2]== 0) {
                        $h6[$n] = 0;
                    } else {
                        $h6[$n] = ($h6[$n - 3] / $h6[$n - 2]) * 100;
                    }
                }
                if ($h6[$n] == 0) {
                    $show = "0%";
                } else {
                    $show = round($h6[$n]) . "%";
                }
				if($dis=='downred'){
					$show=$this->downred($show);
				}else{
					$show=$this->upred($show);
				}
            } else {
                if ($pertama[$n] == 0 or $kedua[$n] == 0) {
                    $h6[$n] = 0;
                    $show = '';
                } else {
                    $h6[$n] = $pertama[$n] / $kedua[$n];
                    $show = number_format($h6[$n], 2, '', '');
                }
            }
            $sh6 = $s6 . '", "val' . $n . '":" ' . $show;
            $s6 = $sh6;
            $down = $dwn . "<td>$show</td>";
            $dwn = $down;
        }
        $h6[0] = $sh6;
        $h6[99] = $dwn;
        return $h6;
    }


    public function gift_c_monthly($pertama, $kedua, $dis) {
        if ($pertama[1] == 0 or $kedua[1] == 0) {
            $h6[1] = 0;
            $s6 = ', "val1":" ';
            $dwn = "<td></td>";
        } else {
            $h6[1] = ($pertama[1] / $kedua[1]);
            $dt = number_format($h6[1], 2, '', '');
            $s6 = ', "val1":" ' . $dt;
            $dwn = "<td>$dt</td>";
        }
        for ($n = 2; $n <= 8; $n++) {
            if ($pertama[$n] == 0 or $kedua[$n] == 0) {
                $h6[$n] = 0;
                $show = '';
            } else {
                $h6[$n] = $pertama[$n] / $kedua[$n];
                $show = number_format($h6[$n], 2, '', '');
            }
            $sh6 = $s6 . '", "val' . $n . '":" ' . $show;
            $s6 = $sh6;
            $down = $dwn . "<td>$show</td>";
            $dwn = $down;
        }
        $h6[0] = $sh6;
        $h6[99] = $dwn;
        return $h6;
    }

    public function shw($data, $gl_account, $dis) {
        $h1 = $this->get($data, $gl_account);
        $dt = number_format($h1[1], 0, '', '');
        $s1 = ', "val1":" ' . $dt;
        $dwn = "<td>$dt</td>";
        for ($n = 2; $n <= 12; $n++) {
            //jika data persentase
            if ($n == 4 or $n == 5 or $n == 9 or $n == 10 or $n == 12) {
                if ($h1[$n] == 0) {
                    $nilai = '0%';
                } else {
                    //$nilai = number_format($h1[$n], 2, '.', ',');
					$nilai = round($h1[$n]).'%';
                }
				if($dis=='downred'){
					$nilai = $this->downred($nilai);
				}else{
					$nilai = $this->upred($nilai);
				}
            } else {
                $nilai = number_format($h1[$n], 0, '', '');
            }
            $sh1 = $s1 . '", "val' . $n . '":" ' . $nilai;
            $s1 = $sh1;
            $down = $dwn . "<td>$nilai</td>";
            $dwn = $down;
        }
        $h1[0] = $sh1;
        $h1[99] = $dwn;
        return $h1;
    }

    public function shw_monthly($data, $gl_account, $dis) {
        $h1 = $this->get($data, $gl_account);
        $dt = number_format($h1[1], 0, '', '');
        $s1 = ', "val1":" ' . $dt;
        $dwn = "<td>$dt</td>";
        for ($n = 2; $n <= 8; $n++) {
            $nilai = number_format($h1[$n], 0, '', '');
            $sh1 = $s1 . '", "val' . $n . '":" ' . $nilai;
            $s1 = $sh1;
            $down = $dwn . "<td>$nilai</td>";
            $dwn = $down;
        }
        $h1[0] = $sh1;
        $h1[99] = $dwn;
        return $h1;
    }

    public function get($data, $gl_account) {
        //[-------------BULAN INI-----------------]         [-------------SAMPAI DENGAN---------------]
        //[BUD]   [ACT]     [ACT TAHUN LALU]      [%]             [BUD]   [ACT]   [ACT LALU]       [%]         [ACT BULAN LALU]    [%]            <--
        // [1]     [2]           [3]          [2:1]   [2:3]        [4]     [5]        [6]      [5:4]  [5:6]           [11]        [2:11]          <-- URUTAN DALAM TAMPILAN
        // [1]     [2]           [3]          [4]      [5]         [6]     [7]        [8]       [9]    [10]           [11]         [12]           <-- PENGELOMPOKAN ARRAY
        //1. BUD 
        $a_p[1] = isset($data["BUD"][$gl_account]) ? $data["BUD"][$gl_account] : 0;
        //2. ACT 
        $a_p[2] = isset($data["ACT"][$gl_account]) ? $data["ACT"][$gl_account] : 0;
        //3. ACT LALU
        $a_p[3] = isset($data["ACT_LALU"][$gl_account]) ? $data["ACT_LALU"][$gl_account] : 0;
        //2:1
        if ($a_p[1] == 0 || $a_p[2] == 0) {
            $a_p[4] = 0;
        } else {
            $a_p[4] = ($a_p[2] / $a_p[1]) * 100;
        }
        //2:3
        if ($a_p[3] == 0 || $a_p[2] == 0) {
            $a_p[5] = 0;
        } else {
            $a_p[5] = ($a_p[2] / $a_p[3]) * 100;
        }

        //4. BUD SAMPAI DENGAN
        $a_p[6] = isset($data["BUD1"][$gl_account]) ? $data["BUD1"][$gl_account] : 0;
        //5. ACT SAMPAI DENGAN
        $a_p[7] = isset($data["ACT1"][$gl_account]) ? $data["ACT1"][$gl_account] : 0;
        //6. ACT TAHUN LALU SAMPAI DENGAN
        $a_p[8] = isset($data["ACT_LALU1"][$gl_account]) ? $data["ACT_LALU1"][$gl_account] : 0;

        //5:4
        if ($a_p[6] == 0 || $a_p[7] == 0) {
            $a_p[9] = 0;
        } else {
            $a_p[9] = ($a_p[7] / $a_p[6]) * 100;
        }
        //5:6
        if ($a_p[8] == 0 || $a_p[7] == 0) {
            $a_p[10] = 0;
        } else {
            $a_p[10] = ($a_p[7] / $a_p[8]) * 100;
        }

        //11. ACT BULAN LALU
        $a_p[11] = isset($data["ACT_BLALU"][$gl_account]) ? $data["ACT_BLALU"][$gl_account] : 0;

        //2:11
        if ($a_p[2] == 0 || $a_p[11] == 0) {
            $a_p[12] = 0;
        } else {
            $a_p[12] = ($a_p[2] / $a_p[11]) * 100;
        }

        return $a_p;
    }

    public function monthly($act) {
        $year = isset($_GET['year']) ? $_GET['year'] : null;
        $month = isset($_GET['month']) ? $_GET['month'] : null;
        $comp = isset($_GET['comp']) ? $_GET['comp'] : null; 
        $cat = isset($_GET['cat']) ? $_GET['cat'] : null; 
        $tipe = '';
        if($act == 'tampil'){
            $tipe = true;
        }

        $viewMonth=array();

        $selmonth = $month;
        $nl='0';
        for($i=$selmonth+1;$i<=12;$i++){
            if($i>9){
                $nl='';
            }
            $viewMonth[] = ($year-1).'.'.$nl.$i;
        }
        $nl='0';
        for($i=1;$i<=$selmonth;$i++){
            if($i>9){
                $nl='';
            }
            $viewMonth[] = $year.'.'.$nl.$i;
        }
        
        $dt=array();
        $rslt=array();
        foreach($viewMonth as $months => $value){
            $dt = $this->mfinance_report->get_data($value, $comp);
            $h0 = $this->shw_monthly($dt, "PL_VLP", 'downred');

            $h1 = $this->shw_monthly($dt, "PL_HPB", 'downred');
            //2 ===
            $h2 = $this->shw_monthly($dt, "PL_OA", 'upred');
            //4 ===
            IF($comp == "7000" && $tipe == "true" || $comp == "5000" && $tipe == "true" || $comp == "2000,7000" && $tipe == "true" || $comp == "5000,7000" && $tipe == "true"){
                $h4 = $this->shw_monthly($dt, "PL_BPP1", 'upred');
            }else{
                $h4 = $this->shw_monthly($dt, "PL_BPP", 'upred');
            }
            //7 ===
            $h7 = $this->shw_monthly($dt, "PL_BUA", 'upred');
            //8 ===
            $h8 = $this->shw_monthly($dt, "PL_BPE", 'upred');
            //12 ===
            IF($comp == "5000" && $tipe == "true"){
                $h12 = $this->shw_monthly($dt, "PL_E1", 'downred');
            }ELSE{
                $h12 = $this->shw_monthly($dt, "PL_E", 'downred');

            }
            //14 ===
            $h14 = $this->shw_monthly($dt, "PL_BP", 'upred');
            
            if($comp == "5000" && $tipe == "false" && $time2[0] == "2017" && (int)$time2[1] >= 1 && (int)$time2[1] <= 3){
                //15 ===
                $h15 = $this->shw_monthly($dt, "PL_LRSK1", 'upred');
                //16 ===
                $h16 = $this->shw_monthly($dt, "PL_PLL1", 'upred');
            }else{
                //15 ===
                $h15 = $this->shw_monthly($dt, "PL_LRSK", 'upred');
                //16 ===
                $h16 = $this->shw_monthly($dt, "PL_PLL", 'upred');
            }

            //3 ===
            $h3 = $this->gift_plus_monthly($h1, $h2, 'downred');
            //5 ===
            $h5 = $this->gift_plus_monthly($h3, $h4, 'downred');
            //9 ===
            $h9 = $this->gift_plus_monthly($h7, $h8, 'upred');

            //10 ====
            $p = 10;
            $h10[1] = $h5[1] + $h7[1] + $h8[1];
            $dte = number_format($h10[1], 0, '', '');
            $s10 = ', "val1":" ' . $dte;
            $dwn10 = "<td>$dte</td>";
            for ($n = 2; $n <= 8; $n++) {
                $h10[$n] = $h5[$n] + $h7[$n] + $h8[$n];
                $nilai = number_format($h10[$n], 0, '', '');
                $sh10 = $s10 . '", "val' . $n . '":" ' . $nilai;
                $s10 = $sh10;
                $down10 = $dwn10 . "<td>$nilai</td>";
                $dwn10 = $down10;
            }
            
            //TAMBAHAN KHUSUS KSI====================================================================
            $h35 = $this->shw_monthly($dt, "", 'upred');
            $h36 = $this->shw_monthly($dt, "", 'downred');
            $h37 = $this->shw_monthly($dt, "", 'upred');
            $h38 = $this->shw_monthly($dt, "", 'upred');
            if($comp == 'G400'){
                //35 ===
                $h35 = $this->shw_monthly($dt, "PL_BA", 'upred');
                //36 ===
                $h36 = $this->shw_monthly($dt, "PL_PB", 'downred');
                //37 ===
                $h37 = $this->shw_monthly($dt, "PL_BPD", 'upred');
            }
            IF($comp == "2720"){
                //38 ===
                $h38 = $this->shw_monthly($dt, "PL_BLL", 'upred');
            }
            //17 ====
            $p = 17;
    //        $h17[1] = $h10[1] + $h14[1] + $h15[1] + $h16[1];
            $h17[1] = $h10[1] + $h14[1] + $h15[1] + $h16[1] + $h35[1] + $h36[1] + $h37[1] + $h38[1];
            $dtes = number_format($h17[1], 0, '', '');
            $s17 = ', "val1":" ' . $dtes;
            $dwn17 = "<td>$dtes</td>";
            for ($n = 2; $n <= 8; $n++) {
                
            $h17[$n] = $h10[$n] + $h14[$n] + $h15[$n] + $h16[$n] + $h35[$n] + $h36[$n] + $h37[$n] + $h38[$n];
                    $nilai = number_format($h17[$n], 0, '', '');

                $sh17 = $s17 . '", "val' . $n . '":" ' . $nilai;
                $s17 = $sh17;
                $down17 = $dwn17 . "<td>$nilai</td>";
                $dwn17 = $down17;
            }
            
            //19 ===
            $h33 = $this->shw_monthly($dt, "PL_TPP", 'upred');
            
            //20 ===
            $h34 = $h33[0];

            // //6 ===
            // $h6 = $this->gift_per($h5, $h3);
            // //11 ===
            // $h11 = $this->gift_per($h10, $h3);
            // //13 ===
            // $h13 = $this->gift_per($h12, $h3);
            // //18 ===
            // $h18 = $this->gift_per($h17, $h3);

            //c1 === 
            $h19 = $this->gift_c_monthly($h1, $h0, 'downred');
            //c2 === 
            $h20 = $this->gift_c_monthly($h2, $h0, 'upred');
            //c3 === 
            $h21 = $this->gift_c_monthly($h3, $h0, 'downred');
            //c4 === 
            $h22 = $this->gift_c_monthly($h4, $h0, 'upred');
            //c5 === 
            $h23 = $this->gift_c_monthly($h5, $h0, 'downred');
            //c6 === 
            $h24 = $this->gift_c_monthly($h7, $h0, 'upred');
            //c7 === 
            $h25 = $this->gift_c_monthly($h8, $h0, 'upred');
            //c8 === 
            $h26 = $this->gift_c_monthly($h9, $h0, 'upred');
            //c9 === 
            $h27 = $this->gift_c_monthly($h10, $h0, 'downred');
            //c10
            $h28 = $this->gift_c_monthly($h12, $h0, 'downred');
            //c11
            $h29 = $this->gift_c_monthly($h14, $h0, 'upred');
            //c12
            $h30 = $this->gift_c_monthly($h15, $h0, 'upred');
            //c13
            $h31 = $this->gift_c_monthly($h16, $h0, 'upred');
            //c14
            $h32 = $this->gift_c_monthly($h17, $h0, 'downred');
            
            $cek2       = $this->mfinance_report->cek_subsidiary($comp);
            $tambahan   = ""; $tambahan2 = ""; $table = ""; $table2 = ""; $no1 = 16; $no2 = 17; $no3 = 18;
            $space      = "&nbsp;&nbsp;";
            if($comp == 'G400'){
                $tambahan   = '{"desc":" 16. Pendapatan Bunga"' . $h36[0] . '"},';
                $table      = "<tr><td>&nbsp;16. Pendapatan Bunga</td><td></td></tr>";
                $no1 = 17;
                $tambahan2  = '{"desc":" 17. Biaya Administrasi"' . $h35[0] . '"},
                              {"desc":" 18. Biaya Pendanaan"' . $h37[0] . '"},';
                $table2     = "<tr><td>&nbsp;17. Biaya Administrasi</td><td></td></tr>
                              <tr><td>&nbsp;18. Biaya Pendanaan</td><td></td></tr>";
                $no2 = 19;
            }
            
            if($comp == '2720'){
                $tambahan   = '{"desc":"  16. <span class=\"change_lang_eng\">Other Expense</span><span class=\"change_lang_ina hidden\">Beban Lain - Lain</span>"' . $h38[0] . '"},';
                $table      = "<tr><td colspan='2'>$space 16. Beban Lain - Lain</td>$h38[99]</tr>";
                $no1 = $no1+1; $no2 = $no2+1; $no3 = $no3+1;
            }

            if($cat==3 or $cat==10){
                $rsltx1 = $h3;
                $rsltx2 = $h21;
            }elseif($cat==4 or $cat==11){
                $rsltx1 = $h4;
                $rsltx2 = $h22;
            }elseif($cat==5 or $cat==12){
                $rsltx1 = $h9;
                $rsltx2 = $h26;
            }elseif($cat==6 or $cat==13){
                $rsltx1 = $h12;
                $rsltx2 = $h28;
            }elseif($cat==7 or $cat==14){
                $rsltx1[0] = $sh17;
                $rsltx2 = $h32;
            }

            $rsltx1[0] = "{".substr($rsltx1[0],2,strlen($rsltx1[0])).'"}';
            $rsltx1[0] = json_decode($rsltx1[0], true);
            $rslt['total'][] = $rsltx1;

            $rsltx2[0] = "{".substr($rsltx2[0],2,strlen($rsltx2[0])).'"}';
            $rsltx2[0] = json_decode($rsltx2[0], true);
            $rslt['perton'][] = $rsltx2;
        }

        echo json_encode($rslt);

    }

    public function show($act) {
        $time = isset($_GET['time']) ? $_GET['time'] : null;
        $comp = isset($_GET['comp']) ? $_GET['comp'] : null; 
		$tipe = '';
		if($act == 'tampil'){
			// $tipe = $_POST['etipe'];
			$tipe = true;
		}
        $time2 = explode (".",$time);

        $dt = $this->mfinance_report->get_data($time, $comp);
        // print_r($dt);exit;
//        echopre($dt); exit;
        //penjualan 
        $h0 = $this->shw($dt, "PL_VLP", 'downred');
        // print_r($h0[0]);exit;
        //1 ===
        $h1 = $this->shw($dt, "PL_HPB", 'downred');
        //2 ===
        $h2 = $this->shw($dt, "PL_OA", 'upred');
        //4 ===
        IF($comp == "7000" && $tipe == "true" || $comp == "5000" && $tipe == "true" || $comp == "2000,7000" && $tipe == "true" || $comp == "5000,7000" && $tipe == "true"){
            $h4 = $this->shw($dt, "PL_BPP1", 'upred');
        }else{
            $h4 = $this->shw($dt, "PL_BPP", 'upred');
        }
        //7 ===
        $h7 = $this->shw($dt, "PL_BUA", 'upred');
        //8 ===
        $h8 = $this->shw($dt, "PL_BPE", 'upred');
        //12 ===
        IF($comp == "5000" && $tipe == "true"){
            $h12 = $this->shw($dt, "PL_E1", 'downred');
        }ELSE{
            $h12 = $this->shw($dt, "PL_E", 'downred');

        }
        //14 ===
        $h14 = $this->shw($dt, "PL_BP", 'upred');
        
        if($comp == "5000" && $tipe == "false" && $time2[0] == "2017" && (int)$time2[1] >= 1 && (int)$time2[1] <= 3){
            //15 ===
            $h15 = $this->shw($dt, "PL_LRSK1", 'upred');
            //16 ===
            $h16 = $this->shw($dt, "PL_PLL1", 'upred');
        }else{
            //15 ===
            $h15 = $this->shw($dt, "PL_LRSK", 'upred');
            //16 ===
            $h16 = $this->shw($dt, "PL_PLL", 'upred');
        }

        //3 ===
        $h3 = $this->gift_plus($h1, $h2, 'downred');
        //5 ===
        $h5 = $this->gift_plus($h3, $h4, 'downred');
        //9 ===
        $h9 = $this->gift_plus($h7, $h8, 'upred');

        //10 ====
        $p = 10;
        $h10[1] = $h5[1] + $h7[1] + $h8[1];
        $dte = number_format($h10[1], 0, '', '');
        $s10 = ', "val1":" ' . $dte;
        $dwn10 = "<td>$dte</td>";
        for ($n = 2; $n <= 12; $n++) {
            if ($n == 4 or $n == 5 or $n == 9 or $n == 10 or $n == 12) {
                //$h10[$n] = $h5[$n] + $h7[$n] + $h8[$n];
				if($n==4){
					$pembilang = $h5[1] + $h7[1] + $h8[1];
					$pembagi = $h5[2] + $h7[2] + $h8[2];
					if($pembilang==null){
						$h10[$n]=0;
					}else{
						$h10[$n]=($pembagi/$pembilang)*100;
					}
				}else if($n==5){
					$pembilang = $h5[3] + $h7[3] + $h8[3];
					$pembagi = $h5[2] + $h7[2] + $h8[2];
					if($pembilang==null){
						$h10[$n]=0;
					}else{
						$h10[$n]=($pembagi/$pembilang)*100;
					}
				}else if($n==9){
					$pembilang = $h5[6] + $h7[6] + $h8[6];
					$pembagi = $h5[7] + $h7[7] + $h8[7];
					if($pembilang==null){
						$h10[$n]=0;
					}else{
						$h10[$n]=($pembagi/$pembilang)*100;
					}
				}else if($n==10){
                    $pembilang = $h5[8] + $h7[8] + $h8[8];
                    $pembagi = $h5[7] + $h7[7] + $h8[7];
                    if($pembilang==null){
                        $h10[$n]=0;
                    }else{
                        $h10[$n]=($pembagi/$pembilang)*100;
                    }
                }else if($n==12){
                    $pembilang = $h5[2] + $h7[2] + $h8[2];
                    $pembagi = $h5[11] + $h7[11] + $h8[11];
                    if($pembilang==null){
                        $h10[$n]=0;
                    }else{
                        $h10[$n]=($pembagi/$pembilang)*100;
                    }
                }
                if ($h10[$n] == 0) {
                    $nilai = '0%';
                } else {
                    //$nilai = number_format($h10[$n], 2, '.', ',');
					$nilai = round($h10[$n]).'%';
                }
				$nilai=$this->downred($nilai);
            } else {
                $h10[$n] = $h5[$n] + $h7[$n] + $h8[$n];
                $nilai = number_format($h10[$n], 0, '', '');
            }
            $sh10 = $s10 . '", "val' . $n . '":" ' . $nilai;
            $s10 = $sh10;
            $down10 = $dwn10 . "<td>$nilai</td>";
            $dwn10 = $down10;
        }
        
        //TAMBAHAN KHUSUS KSI====================================================================
        $h35 = $this->shw($dt, "", 'upred');
        $h36 = $this->shw($dt, "", 'downred');
        $h37 = $this->shw($dt, "", 'upred');
        $h38 = $this->shw($dt, "", 'upred');
        if($comp == 'G400'){
            //35 ===
            $h35 = $this->shw($dt, "PL_BA", 'upred');
            //36 ===
            $h36 = $this->shw($dt, "PL_PB", 'downred');
            //37 ===
            $h37 = $this->shw($dt, "PL_BPD", 'upred');
        }
        IF($comp == "2720"){
            //38 ===
            $h38 = $this->shw($dt, "PL_BLL", 'upred');
        }
        //17 ====
        $p = 17;
//        $h17[1] = $h10[1] + $h14[1] + $h15[1] + $h16[1];
        $h17[1] = $h10[1] + $h14[1] + $h15[1] + $h16[1] + $h35[1] + $h36[1] + $h37[1] + $h38[1];
        $dtes = number_format($h17[1], 0, '', '');
        $s17 = ', "val1":" ' . $dtes;
        $dwn17 = "<td>$dtes</td>";
        for ($n = 2; $n <= 12; $n++) {
			
            if ($n == 4 or $n == 5 or $n == 9 or $n == 10 or $n == 12) {
				if($n==4){
					$pembagi = $h10[1] + $h14[1] + $h15[1] + $h16[1] + $h35[1] + $h36[1] + $h37[1] + $h38[1];
					$pembilang = $h10[2] + $h14[2] + $h15[2] + $h16[2] + $h35[2] + $h36[2] + $h37[2] + $h38[2];
					if($pembagi==null){
						$h17[$n]=0;
					}else{
						$h17[$n]=($pembilang/$pembagi)*100;
					}
				}else if($n==5){
					$pembagi = $h10[3] + $h14[3] + $h15[3] + $h16[3] + $h35[3] + $h36[3] + $h37[3] + $h38[3];
					$pembilang = $h10[2] + $h14[2] + $h15[2] + $h16[2] + $h35[2] + $h36[2] + $h37[2] + $h38[2];
					if($pembagi==null){
						$h17[$n]=0;
					}else{
						$h17[$n]=($pembilang/$pembagi)*100;
					}
				}else if($n==9){
					$pembagi = $h10[6] + $h14[6] + $h15[6] + $h16[6] + $h35[6] + $h36[6] + $h37[6] + $h38[6];
					$pembilang = $h10[7] + $h14[7] + $h15[7] + $h16[7] + $h35[7] + $h36[7] + $h37[7] + $h38[7];
					if($pembagi==null){
						$h17[$n]=0;
					}else{
						$h17[$n]=($pembilang/$pembagi)*100;
					}
				}else if($n==10){
					$pembagi = $h10[9] + $h14[9] + $h15[9] + $h16[9] + $h35[9] + $h36[9] + $h37[9] + $h38[9];
					$pembilang = $h10[7] + $h14[7] + $h15[7] + $h16[7] + $h35[7] + $h36[7] + $h37[7] + $h38[7];
					if($pembagi==null){
						$h17[$n]=0;
					}else{
						$h17[$n]=($pembilang/$pembagi)*100;
					}
				}else if($n==12){
                    $pembagi = $h10[2] + $h14[2] + $h15[2] + $h16[2] + $h35[2] + $h36[2] + $h37[2] + $h38[2];
                    $pembilang = $h10[11] + $h14[11] + $h15[11] + $h16[11] + $h35[11] + $h36[11] + $h37[11] + $h38[11];
                    if($pembagi==null){
                        $h17[$n]=0;
                    }else{
                        $h17[$n]=($pembilang/$pembagi)*100;
                    }
                }
                if ($h17[$n] == 0) {
                    $nilai = '0%';
                } else {
                    //$nilai = number_format($h17[$n], 2, '.', ',');
					$nilai = round($h17[$n]).'%';
                }
				$nilai=$this->downred($nilai);
            } else {
		$h17[$n] = $h10[$n] + $h14[$n] + $h15[$n] + $h16[$n] + $h35[$n] + $h36[$n] + $h37[$n] + $h38[$n];
                $nilai = number_format($h17[$n], 0, '', '');
            }

            $sh17 = $s17 . '", "val' . $n . '":" ' . $nilai;
            $s17 = $sh17;
            $down17 = $dwn17 . "<td>$nilai</td>";
            $dwn17 = $down17;
        }
        
        //19 ===
        $h33 = $this->shw($dt, "PL_TPP", 'upred');
        
        //20 ===
        $h34 = $h33[0];

        //6 ===
        $h6 = $this->gift_per($h5, $h3);
        //11 ===
        $h11 = $this->gift_per($h10, $h3);
        //13 ===
        $h13 = $this->gift_per($h12, $h3);
        //18 ===
        $h18 = $this->gift_per($h17, $h3);

        //c1 === 
        $h19 = $this->gift_c($h1, $h0, 'downred');
        //c2 === 
        $h20 = $this->gift_c($h2, $h0, 'upred');
        //c3 === 
        $h21 = $this->gift_c($h3, $h0, 'downred');
        //c4 === 
        $h22 = $this->gift_c($h4, $h0, 'upred');
        //c5 === 
        $h23 = $this->gift_c($h5, $h0, 'downred');
        //c6 === 
        $h24 = $this->gift_c($h7, $h0, 'upred');
        //c7 === 
        $h25 = $this->gift_c($h8, $h0, 'upred');
        //c8 === 
        $h26 = $this->gift_c($h9, $h0, 'upred');
        //c9 === 
        $h27 = $this->gift_c($h10, $h0, 'downred');
        //c10
        $h28 = $this->gift_c($h12, $h0, 'downred');
        //c11
        $h29 = $this->gift_c($h14, $h0, 'upred');
        //c12
        $h30 = $this->gift_c($h15, $h0, 'upred');
        //c13
        $h31 = $this->gift_c($h16, $h0, 'upred');
        //c14
        $h32 = $this->gift_c($h17, $h0, 'downred');
        
        $cek2       = $this->mfinance_report->cek_subsidiary($comp);
        $tambahan   = ""; $tambahan2 = ""; $table = ""; $table2 = ""; $no1 = 16; $no2 = 17; $no3 = 18;
        $space      = "&nbsp;&nbsp;";
        if($comp == 'G400'){
            $tambahan   = '{"desc":" 16. Pendapatan Bunga"' . $h36[0] . '"},';
            $table      = "<tr><td>&nbsp;16. Pendapatan Bunga</td><td></td></tr>";
            $no1 = 17;
            $tambahan2  = '{"desc":" 17. Biaya Administrasi"' . $h35[0] . '"},
                          {"desc":" 18. Biaya Pendanaan"' . $h37[0] . '"},';
            $table2     = "<tr><td>&nbsp;17. Biaya Administrasi</td><td></td></tr>
                          <tr><td>&nbsp;18. Biaya Pendanaan</td><td></td></tr>";
            $no2 = 19;
        }
        
        if($comp == '2720'){
            $tambahan   = '{"desc":"  16. <span class=\"change_lang_eng\">Other Expense</span><span class=\"change_lang_ina hidden\">Beban Lain - Lain</span>"' . $h38[0] . '"},';
            $table      = "<tr><td colspan='2'>$space 16. Beban Lain - Lain</td>$h38[99]</tr>";
            $no1 = $no1+1; $no2 = $no2+1; $no3 = $no3+1;
        }

        $ini = '{"result":[
                    {"desc":"Revenue"' . $h0[0] . '"},
                    {"desc":"Gross Sales Results"' . $h1[0] . '"},
                    {"desc":"Freight Cost"' . $h2[0] . '"},
                    {"desc":"Sales Results"' . $h3[0] . '"},
                    {"desc":"Cost of Goods Sold"' . $h4[0] . '"},
                    {"desc":"Total Expense"' . $h9[0] . '"},
                    {"desc":"EBITDA"' . $h12[0] . '"},
                    {"desc":"Profit Before Tax"' . $sh17 . '"},
                    {"desc":"Revenue / Ton"' . $h19[0] . '"},
                    {"desc":"Gross Sales Results / Ton"' . $h20[0] . '"},
                    {"desc":"Sales Results / Ton"' . $h21[0] . '"},
                    {"desc":"Cost of Goods Sold / Ton"' . $h22[0] . '"},
                    {"desc":"Total Expense / Ton"' . $h26[0] . '"},
                    {"desc":"EBITDA / Ton"' . $h28[0] . '"},
                    {"desc":"Profit Before Tax / Ton"' . $h32[0] . '"}
				]}';
    echo $ini;
    }
}
?>
