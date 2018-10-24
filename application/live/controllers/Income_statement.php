<?php
class Income_statement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_report_laba_rugi');
        $this->load->helper('text');
    }

    public function index() {
        $this->load->view('admin/consolidation/v_report_laba_rugi');
    }
    
    public function get_company() {
        $data = $this->M_report_laba_rugi->get_company();
        echo json_encode($data);
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
        $dt = number_format($h3[1], 0, '.', ',');
        $s3 = ', "val1":" ' . $dt;
        $dwn = "<td>$dt</td>";
        for ($n = 2; $n <= 10; $n++) {
            if ($n == 4 or $n == 5 or $n == 9 or $n == 10) {
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
                $nilai = number_format($h3[$n], 0, '.', ',');
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

    public function gift_per($pertama, $kedua) {
        if ($pertama[1] == 0 or $kedua[1] == 0) {
            $h6[1] = 0;
            $s6 = ', "val1":" ';
            $dwn = "<td></td>";
        } else {
            $h6[1] = ($pertama[1] / $kedua[1]) * 100;
            $dt = number_format($h6[1], 2, '.', ',');
            $s6 = ', "val1":" ' . $dt . '%';
            $dwn = "<td>$dt%</td>";
        }
        for ($n = 2; $n <= 10; $n++) {
            if ($n == 4 or $n == 5 or $n == 9 or $n == 10) {
                $h6[$n] = 0;
                $show = '';
            } else {
                if ($pertama[$n] == 0 or $kedua[$n] == 0) {
                    $h6[$n] = 0;
                    $show = '';
                } else {
                    $h6[$n] = ($pertama[$n] / $kedua[$n]) * 100;
                    $show = number_format($h6[$n], 2, '.', ',') . '%';
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
            $dt = number_format($h6[1], 2, '.', ',');
            $s6 = ', "val1":" ' . $dt;
            $dwn = "<td>$dt</td>";
        }
        for ($n = 2; $n <= 10; $n++) {
            if ($n == 4 or $n == 5 or $n == 9 or $n == 10) {
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
                    $show = number_format($h6[$n], 2, '.', ',');
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

    public function shw($data, $gl_account, $dis) {
        $h1 = $this->get($data, $gl_account);
        $dt = number_format($h1[1], 0, '.', ',');
        $s1 = ', "val1":" ' . $dt;
        $dwn = "<td>$dt</td>";
        for ($n = 2; $n <= 10; $n++) {
            //jika data persentase
            if ($n == 4 or $n == 5 or $n == 9 or $n == 10) {
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
                $nilai = number_format($h1[$n], 0, '.', ',');
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

    public function get($data, $gl_account) {
        //[-------------BULAN INI-----------------]         [-------------SAMPAI DENGAN---------------]
        //[BUD]   [ACT]     [ACT LALU]      [%]             [BUD]   [ACT]   [ACT LALU]       [%]         <--
        // [1]     [2]         [3]      [2:1]   [2:3]        [4]     [5]        [6]      [5:4]  [5:6]    <-- URUTAN DALAM TAMPILAN
        // [1]     [2]         [3]      [4]      [5]         [6]     [7]        [8]       [9]    [10]    <-- PENGELOMPOKAN ARRAY
        //1. BUD 
        $a_p[1] = isset($data["BUD"][$gl_account]) ? $data["BUD"][$gl_account] : 0;
        //2. ACT 
        $a_p[2] = isset($data["ACT"][$gl_account]) ? $data["ACT"][$gl_account] : 0;
        //3. ACT LALU
        $a_p[3] = isset($data["ACT_LALU"][$gl_account]) ? $data["ACT_LALU"][$gl_account] : 0;
        //2:1
        if ($a_p[1] == 0) {
            $a_p[4] = 0;
        } else {
            $a_p[4] = ($a_p[2] / $a_p[1]) * 100;
        }
        //2:3
        if ($a_p[3] == 0) {
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
        if ($a_p[6] == 0) {
            $a_p[9] = 0;
        } else {
            $a_p[9] = ($a_p[7] / $a_p[6]) * 100;
        }
        //5:6
        if ($a_p[8] == 0) {
            $a_p[10] = 0;
        } else {
            $a_p[10] = ($a_p[7] / $a_p[8]) * 100;
        }
        return $a_p;
    }

    public function coba_getdata($time,$comp)
    {
        $dt = $this->M_report_laba_rugi->get_data($time, $comp);
        echo "<pre>";
        print_r($dt);
    }

    public function show($act) {
        $time = isset($_POST['time']) ? $_POST['time'] : null;
        $comp = isset($_POST['comp']) ? $_POST['comp'] : null;
		
        $tipe = '';
		// if($act == 'tampil'){
		// 	$tipe = $_POST['etipe'];
		// }

        $comp = "7000";
        $time = "2017.11";
        $etipe = "true";

        $time2 = explode (".",$time);

        $dt = $this->M_report_laba_rugi->get_data($time, $comp);
       // echo "<pre>"; print_r($dt); exit;
        //penjualan 
        $h0 = $this->shw($dt, "PL_VLP", 'downred');
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
        $dte = number_format($h10[1], 0, '.', ',');
        $s10 = ', "val1":" ' . $dte;
        $dwn10 = "<td>$dte</td>";
        for ($n = 2; $n <= 10; $n++) {
            if ($n == 4 or $n == 5 or $n == 9 or $n == 10) {
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
                $nilai = number_format($h10[$n], 0, '.', ',');
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
        $dtes = number_format($h17[1], 0, '.', ',');
        $s17 = ', "val1":" ' . $dtes;
        $dwn17 = "<td>$dtes</td>";
        for ($n = 2; $n <= 10; $n++) {
			
            if ($n == 4 or $n == 5 or $n == 9 or $n == 10) {
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
                $nilai = number_format($h17[$n], 0, '.', ',');
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
        
        $cek2       = $this->M_report_laba_rugi->cek_subsidiary($comp);
        $tambahan   = ""; $tambahan2 = ""; $table = ""; $table2 = ""; $no1 = 16; $no2 = 17; $no3 = 18;
        $space      = "&nbsp;&nbsp;";
        if($comp == 'G400'){
            $tambahan   = '{"desc":" 16. Pendapatan Bunga"' . $h36[0] . '"},';
            $arrtambahan = array("pendapatan_bunga"=>$h36[0]);
            $table      = "<tr><td>&nbsp;16. Pendapatan Bunga</td><td></td></tr>";
            $no1 = 17;
            $tambahan2  = '{"desc":" 17. Biaya Administrasi"' . $h35[0] . '"},
                          {"desc":" 18. Biaya Pendanaan"' . $h37[0] . '"},';
            $arrtambahan2 = array("biaya_administrasi"=>$h35[0],"biaya_pendanaan"=>$h37[0]);
            $table2     = "<tr><td>&nbsp;17. Biaya Administrasi</td><td></td></tr>
                          <tr><td>&nbsp;18. Biaya Pendanaan</td><td></td></tr>";
            $no2 = 19;
        }
        
        if($comp == '2720'){
            $tambahan   = '{"desc":"  16. <span class=\"change_lang_eng\">Other Expense</span><span class=\"change_lang_ina hidden\">Beban Lain - Lain</span>"' . $h38[0] . '"},';
            $table      = "<tr><td colspan='2'>$space 16. Beban Lain - Lain</td>$h38[99]</tr>";
            $no1 = $no1+1; $no2 = $no2+1; $no3 = $no3+1;
            $arrtambahan = array("other_expense"=>$h38[0]);
        }
//        if($cek2 != "iGCEMENT"){
//            $tambahan = '{"desc":" &nbsp;19. Taksiran Pajak Penghasilan"' . $h33[0] . '"},
//                        {"desc":" &nbsp;20. Laba Setelah Pajak"' . $h18[0] . '"},';
//        }

        // $arrini = array("volume"            =>array("sales"=>$h0[0])
        //                 ,"profit_or_loss total"=>array("gross_sales_results"=>$h1[0]
        //                                             ,"freight_cost"=>$h2[0]
        //                                             ,"sales_results"=>$h3[0]
        //                                             ,"cost_of_goods_sold"=>$h4[0]
        //                                             ,"gross_profit"=>$h5[0]
        //                                             ,"gross_profit_margin"=>$h6[0]
        //                                             ,"general_and_administration_expense"=>$h7[0]
        //                                             ,"sales_or_order_expense"=>$h8[0]
        //                                             ,"total_expense"=>$h9[0]
        //                                             ,"operating_profit"=>$h10[0]
        //                                             ,"operating_profit_margin"=>$h11[0]
        //                                             ,"ebitda"=>$h12[0]
        //                                             ,"ebitda_margin"=>$h13[0]
        //                                             ,"loan_interest"=>$h14[0]
        //                                             ,"profit_loss_exchange_rate_gap"=>$h15[0]
        //                                             ,"other_income"=>$h16[0]
        //                                             ,"profit_before_tax"=>$h17[0]
        //                                             ,"profit_before_tax_margin"=>$h18[0]
        //                                             ,"pendapatan_bunga"=>$h36[0]
        //                                             ,"biaya_administrasi"=>$h35[0]
        //                                             ,"biaya_pendanaan"=>$h37[0]
        //                                             ,"other_expense"=>$h38[0]
        //                                             )
        //                 );
        $ini = '{"total":28,"rows":[
                    {"desc":" <b>A. VOLUME</b> "},
                    {"desc":" &nbsp;1. <span class=\"change_lang_eng\">Sales</span><span class=\"change_lang_ina hidden\">Penjualan</span>"' . $h0[0] . '"},
                    {"desc":" <b>B. <span class=\"change_lang_eng\">PROFIT/LOSS TOTAL</span><span class=\"change_lang_ina hidden\">LABA/RUGI TOTAL</span></b> "},
                    {"desc":" &nbsp;1. <span class=\"change_lang_eng\">Gross Sales Results</span><span class=\"change_lang_ina hidden\">Hasil Penjualan Bruto</span>"' . $h1[0] . '"},
                    {"desc":" &nbsp;2. <span class=\"change_lang_eng\">Freight Cost</span><span class=\"change_lang_ina hidden\">Ongkos Angkut</span>"' . $h2[0] . '"},
                    {"desc":" &nbsp;3. <span class=\"change_lang_eng\">Sales Results</span><span class=\"change_lang_ina hidden\">Hasil Penjualan</span>"' . $h3[0] . '"},
                    {"desc":" &nbsp;4. <span class=\"change_lang_eng\">Cost of Goods Sold</span><span class=\"change_lang_ina hidden\">Beban Pokok Penjualan</span>"' . $h4[0] . '"},
                    {"desc":" &nbsp;5. <span class=\"change_lang_eng\">Gross Profit</span><span class=\"change_lang_ina hidden\">Laba Kotor</span>"' . $h5[0] . '"},
                    {"desc":" &nbsp;6. <span class=\"change_lang_eng\">Gross Profit Margin</span><span class=\"change_lang_ina hidden\">Margin Laba Kotor</span>"' . $h6[0] . '"},
                    {"desc":" &nbsp;7. <span class=\"change_lang_eng\">General & Administration Expense</span><span class=\"change_lang_ina hidden\">Beban Umum & Administrasi</span>"' . $h7[0] . '"},
                    {"desc":" &nbsp;8. <span class=\"change_lang_eng\">Sales/Order Expense</span><span class=\"change_lang_ina hidden\">Beban Penjualan/Pemesanan</span>"' . $h8[0] . '"},
                    {"desc":" &nbsp;9. <span class=\"change_lang_eng\">Total Expense</span><span class=\"change_lang_ina hidden\">Total Beban</span>"' . $h9[0] . '"},
                    {"desc":" &nbsp;10. <span class=\"change_lang_eng\">Operating Profit</span><span class=\"change_lang_ina hidden\">Laba Usaha</span>"' . $sh10 . '"},
                    {"desc":" &nbsp;11. <span class=\"change_lang_eng\">Operating Profit Margin</span><span class=\"change_lang_ina hidden\">Margin Laba Usaha</span>"' . $h11[0] . '"},
                    {"desc":" &nbsp;12. EBITDA"' . $h12[0] . '"},
                    {"desc":" &nbsp;13. <span class=\"change_lang_eng\">EBITDA Margin</span><span class=\"change_lang_ina hidden\">Margin EBITDA</span>"' . $h13[0] . '"},
                    {"desc":" &nbsp;14. <span class=\"change_lang_eng\">Loan Interest</span><span class=\"change_lang_ina hidden\">Bunga Pinjaman</span>"' . $h14[0] . '"},
                    {"desc":" &nbsp;15. <span class=\"change_lang_eng\">Profit(Loss) Exchange Rate Gap</span><span class=\"change_lang_ina hidden\">Laba(Rugi) Selisih Kurs</span>"' . $h15[0] . '"},
                    '.$tambahan.'
                    {"desc":" &nbsp;'. $no1 .'. <span class=\"change_lang_eng\">Other Income</span><span class=\"change_lang_ina hidden\">Pendapatan Lain-lain</span>"' . $h16[0] . '"},
                    '.$tambahan2.'
                    {"desc":" &nbsp;'. $no2 .'. <span class=\"change_lang_eng\">Profit Before Tax</span><span class=\"change_lang_ina hidden\">Laba Sebelum Pajak</span>"' . $sh17 . '"},
                    {"desc":" &nbsp;'. ($no2+1) .'. <span class=\"change_lang_eng\">Profit Before Tax Margin</span><span class=\"change_lang_ina hidden\">Margin Laba Sebelum Pajak</span>"' . $h18[0] . '"},
                    {"desc":" <b>C. <span class=\"change_lang_eng\">PROFIT/LOSS</span><span class=\"change_lang_ina hidden\">LABA/RUGI</span> PER TON (RP 1)</b> "},
                    {"desc":" &nbsp;1. <span class=\"change_lang_eng\">Gross Sales Results</span><span class=\"change_lang_ina hidden\">Hasil Penjualan Bruto</span>"' . $h19[0] . '"},
                    {"desc":" &nbsp;2. <span class=\"change_lang_eng\">Freight Cost</span><span class=\"change_lang_ina hidden\">Ongkos Angkut</span>"' . $h20[0] . '"},
                    {"desc":" &nbsp;3. <span class=\"change_lang_eng\">Sales Results</span><span class=\"change_lang_ina hidden\">Hasil Penjualan</span>"' . $h21[0] . '"},
                    {"desc":" &nbsp;4. <span class=\"change_lang_eng\">Cost of Goods Sold</span><span class=\"change_lang_ina hidden\">Beban Pokok Penjualan</span>"' . $h22[0] . '"},
                    {"desc":" &nbsp;5. <span class=\"change_lang_eng\">Gross Profit Margin</span><span class=\"change_lang_ina hidden\">Margin Laba Kotor</span>"' . $h23[0] . '"},
                    {"desc":" &nbsp;6. <span class=\"change_lang_eng\">General & Administration Expense</span><span class=\"change_lang_ina hidden\">Beban Umum & Administrasi</span>"' . $h24[0] . '"},
                    {"desc":" &nbsp;7. <span class=\"change_lang_eng\">Sales/Order Expense</span><span class=\"change_lang_ina hidden\">Beban Penjualan/Pemesanan</span>"' . $h25[0] . '"},
                    {"desc":" &nbsp;8. <span class=\"change_lang_eng\">Total Expense</span><span class=\"change_lang_ina hidden\">Total Beban</span>"' . $h26[0] . '"},
                    {"desc":" &nbsp;9. <span class=\"change_lang_eng\">Operating Profit</span><span class=\"change_lang_ina hidden\">Laba Usaha</span>"' . $h27[0] . '"},
                    {"desc":" &nbsp;10. EBITDA"' . $h28[0] . '"},
                    {"desc":" &nbsp;11. <span class=\"change_lang_eng\">Loan Interest</span><span class=\"change_lang_ina hidden\">Bunga Pinjaman</span>"' . $h29[0] . '"},
                    {"desc":" &nbsp;12. <span class=\"change_lang_eng\">Profit(Loss) Exchange Rate Gap</span><span class=\"change_lang_ina hidden\">Laba(Rugi) Selisih Kurs</span>"' . $h30[0] . '"},
                    {"desc":" &nbsp;13. <span class=\"change_lang_eng\">Other Income</span><span class=\"change_lang_ina hidden\">Pendapatan Lain-lain</span>"' . $h31[0] . '"},
                    {"desc":" &nbsp;14. <span class=\"change_lang_eng\">Profit Before Tax</span><span class=\"change_lang_ina hidden\">Laba Sebelum Pajak</span>"' . $h32[0] . '"}
	]}';
        $tmp1 = "";
        $year = substr($time, 0, 4);
        $year_lalu = $year - 1;
        $month1 = substr($time, -2);
        $date_change = new DateTime("$year-$month1-01");
        $month = $date_change->format('F');
        for ($i = 1; $i <= 10; $i++) {
            $td = "<td></td>$tmp1";
            $tmp1 = $td;
        }
		
        /*if ($comp == "2000") {
            $img = "si.png";
        } elseif ($comp == "3000") {
            $img = "semen_padang.png";
        } elseif ($comp == "4000") {
            $img = "semen_tonasa.png";
        } elseif ($comp == "5000") {
            $img = "semen_gresik.png";
        } elseif ($comp == "7000") {
            $img = "si.png";
        } elseif ($comp == "SI") {
            $img = "all_group.png";
        } elseif ($comp == "G300") {
            $img = "sisi.png";
        } elseif ($comp == "G100") {
			$img = "sep.png";
		} else {
			$img = "swadaya.png";
		}*/
		if($comp == "SI"){
			$img= "asset/easyui/themes/all_group.png";
		}else{
			$data = $this->M_report_laba_rugi->get_logo('(CASE WHEN LONG_LOGO IS NULL THEN \'KOSONG\' ELSE LONG_LOGO END) AS LOGO',$comp);
			if($data[0]['LOGO']=='KOSONG'){
				$logo = 'LOGO';
			}else{
				$logo = 'LONG_LOGO';
			}
			$logo_comp = $this->M_report_laba_rugi->get_logo($logo, $comp);
			$img = $logo_comp[0][$logo];
		}
        $color_th = "bgcolor='#1B007D' width='70px'";
        $download = "
           <table border='1'>
                <tr>
                    <td width='100px'><center><img height='50px' src='http:" . base_url() . "$img'></center></td>
                    <td width='1000px' colspan='11'><center><b>PROFIT AND LOST REPORT</b><br>$month $year</center></td>
                </tr>
            </table>
            <table>
                <tr><td></td></tr>
                <tr><td></td></tr>
            </table>
           <table border='1'>
            <tr style='color:white'>
                <th bgcolor='#1B007D' colspan='2' rowspan='3'>Description</th>
                <th $color_th colspan='5'>BULAN INI</th>
                <th $color_th colspan='5'>S/D BULAN INI</th>
            </tr>
            <tr style='color:white'>
                <th $color_th rowspan='2'>BUD $year<br>[1]</th>
                <th $color_th rowspan='2'>ACT $year<br>[2]</th>
                <th $color_th rowspan='2'>ACT $year_lalu<br>[3]</th>
                <th $color_th colspan='2'>%</th>
                <th $color_th rowspan='2'>BUD $year<br>[4]</th>
                <th $color_th rowspan='2'>ACT $year<br>[5]</th>
                <th $color_th rowspan='2'>ACT $year_lalu<br>[6]</th>
                <th $color_th colspan='2'>%</th>
            </tr>
            <tr style='color:white'>
                <th $color_th>[2:1]</th>
                <th $color_th>[2:3]</th>
                <th $color_th>[5:4]</th>
                <th $color_th>[5:6]</th>
            </tr>
            <tr><td colspan='2'><b>A. Volume</b></td>$td</tr>
            <tr><td colspan='2'>$space 1. Penjualan</td>$h0[99]</tr>
            <tr><td colspan='2'><b>B. Laba/Rugi Total</b></td>$td</tr>
            <tr><td colspan='2'>$space 1. Hasil Penjualan Bruto</td>$h1[99]</tr>
            <tr><td colspan='2'>$space 2. Ongkos Angkut</td>$h2[99]</tr>
            <tr><td colspan='2'>$space 3. Hasil Penjualan</td>$h3[99]</tr>
            <tr><td colspan='2'>$space 4. Beban Pokok Penjualan</td>$h4[99]</tr>
            <tr><td colspan='2'>$space 5. Laba Kotor</td>$h5[99]</tr>
            <tr><td colspan='2'>$space 6. Margin Laba Kotor</td>$h6[99]</tr>
            <tr><td colspan='2'>$space 7. Beban Umum & Administrasi</td>$h7[99]</tr>
            <tr><td colspan='2'>$space 8. Beban Penjualan/Pemesanan</td>$h8[99]</tr>
            <tr><td colspan='2'>$space 9. Total Beban</td>$h9[99]</tr>
            <tr><td colspan='2'>$space 10. Laba Usaha</td>$dwn10</tr>
            <tr><td colspan='2'>$space 11. Margin Laba Usaha</td>$h11[99]</tr>
            <tr><td colspan='2'>$space 12. Ebitda</td>$h12[99]</tr>
            <tr><td colspan='2'>$space 13. Margin Ebitda</td>$h13[99]</tr>
            <tr><td colspan='2'>$space 14. Bunga Pinjaman</td>$h14[99]</tr>
            <tr><td colspan='2'>$space 15. Laba(Rugi) Selisih Kurs</td>$h15[99]</tr>
            $table
            <tr><td colspan='2'>$space $no1. Pendapatan Lain-lain</td>$h16[99]</tr>
            <tr><td colspan='2'>$space $no2. Laba Sebelum Pajak</td>$dwn17</tr>
            <tr><td colspan='2'>$space $no3. Margin Laba Sebelum Pajak</td>$h18[99]</tr>
            <tr><td colspan='2'><b>C. LABA/RUGI PER TON (RP 1)</b></td>$td</tr>
            <tr><td colspan='2'>$space 1. Hasil Penjualan Bruto</td>$h19[99]</tr>
            <tr><td colspan='2'>$space 2. Ongkos Angkut</td>$h20[99]</tr>
            <tr><td colspan='2'>$space 3. Hasil Penjualan</td>$h21[99]</tr>
            <tr><td colspan='2'>$space 4. Beban Pokok Penjualan</td>$h22[99]</tr>
            <tr><td colspan='2'>$space 5. Laba Kotor</td>$h23[99]</tr>
            <tr><td colspan='2'>$space 6. Beban Umum & Administrasi</td>$h24[99]</tr>
            <tr><td colspan='2'>$space 7. Beban Penjualan/Pemasaran</td>$h25[99]</tr>
            <tr><td colspan='2'>$space 8. Total Beban</td>$h26[99]</tr>
            <tr><td colspan='2'>$space 9. Laba Usaha</td>$h27[99]</tr>
            <tr><td colspan='2'>$space 10. EBITDA</td>$h28[99]</tr>
            <tr><td colspan='2'>$space 11. Bunga Pinjaman</td>$h29[99]</tr>
            <tr><td colspan='2'>$space 12. Laba(Rugi) Selisih Kurs</td>$h30[99]</tr>
            <tr><td colspan='2'>$space 13. Pendapatan Lain-lain</td>$h31[99]</tr>
            <tr><td colspan='2'>$space 14. Laba Sebelum Pajak</td>$h32[99]</tr>
	</table>";
        if ($act == "tampil") {
            echo "<pre>";
            echo $ini;
            // echo "<pre>";
            // print_r($arrini);
        } else {
            error_reporting(0);
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=Profit_and_Lost_Report($time).xls");
            echo $download;
        }
    }
}

?>