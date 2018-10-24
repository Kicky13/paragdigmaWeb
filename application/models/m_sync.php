<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_sync extends CI_Model
	{
		function M_user_employee(){
			$hris = $this->load->database('hris', TRUE);
			$postgresql = $this->load->database('psqlsatu', TRUE);
				$Qhris = $hris->query("Select mk_nopeg,muk_kode,mjab_kode,mk_nama,mk_eselon_code,mk_email,company from v_user_employee where company in (2000,3000,7000,4000,5000) ");
					$postgresql->query("truncate table v_user_employee");
					
						foreach($Qhris->result() as $rows){
							$Data []= $postgresql->query("insert into v_user_employee
							(mk_nopeg,muk_kode,mjab_kode,mk_nama,mk_esselon_kode,mk_email,company) Values 
							('".$rows->mk_nopeg."','".$rows->muk_kode."','".$rows->mjab_kode."','".str_replace(array("'", "\"", "&quot;"), "",htmlspecialchars($rows->mk_nama) )."','".$rows->mk_eselon_code."','".str_replace(array("'", "\"", "&quot;"), "",htmlspecialchars(strtolower($rows->mk_email)) )."','".$rows->company."')");
						}
				$hris->close();
				echo count($Data);
				exit;
				}
		function M_unit_kerja(){
			$hris = $this->load->database('hris', TRUE);
				$Qhris = $hris->query("select muk_kode,muk_nama,muk_level,company from v_unit_kerja where company in (3000,7000)");
					$this->db->query("TRUNCATE TABLE  V_UNIT_KERJA");
						foreach($Qhris->result() as $rows){
							$Data []= $this->db->query("INSERT INTO V_UNIT_KERJA 
							(MUK_KODE,MUK_NAMA,MUK_LEVEL,COMPANY) Values 
							(".$rows->muk_kode.",'".$rows->muk_nama."','".$rows->muk_level."',".$rows->company.")");
						}
				$hris->close();
				echo count($Data);
				}
		function M_atasan(){
			$hris = $this->load->database('hris', TRUE);
				$Qhris = $hris->query("SELECT
										mk_nopeg,
										mk_unit,
										muk_kode,
										mjab_kode,
										company,
										atasan1_level,
										atasan1_unit,
										atasan1_jabat,
										atasan1_nopeg,
										atasan1_pgs,
										atasan2_level,
										atasan2_unit,
										atasan2_jabat,
										atasan2_nopeg,
										atasan2_pgs
									FROM
										v_atasan
									WHERE
										company in (3000,7000)");
					$this->db->query("TRUNCATE TABLE V_ATASAN");
						foreach($Qhris->result() as $rows){
							$Data []= $this->db->query("INSERT INTO V_ATASAN
								(MK_NOPEG,MK_UNIT,MUK_KODE,MJAB_KODE,COMPANY,ATASAN1_LEVEL,ATASAN1_UNIT,ATASAN1_JABAT,
								ATASAN1_NOPEG,ATASAN1_PGS,ATASAN2_LEVEL,ATASAN2_UNIT,ATASAN2_JABAT,ATASAN2_NOPEG,ATASAN2_PGS
								) Values 
								('".$rows->mk_nopeg."',
								".$rows->mk_unit.",
								".$rows->muk_kode.",
								".$rows->mjab_kode.",
								".$rows->company.",
								'".$rows->atasan1_level."',
								".$rows->atasan1_unit.",
								".$rows->atasan1_jabat.",
								".$rows->atasan1_nopeg.",
								'".$rows->atasan1_pgs."',
								'".$rows->atasan2_level."',
								".$rows->atasan2_unit.",
								".$rows->atasan2_jabat.",
								".$rows->atasan2_nopeg.",
								'".$rows->atasan2_pgs."'
								)");
						}
				$hris->close();
				echo count($Data);
				}
		function M_jabatan(){ 
			$hris = $this->load->database('hris', TRUE);
				$Qhris = $hris->query("select mjab_kode, mjab_nama,company,muk_kode,mjab_emp_subgroup,mjab_emp_subgroup_txt from v_jabatan where company=3000");
					$this->db->query("TRUNCATE TABLE  V_JABATAN");
						foreach($Qhris->result() as $rows){
							$Data []= $this->db->query("INSERT INTO V_JABATAN
							(MJAB_KODE,
								MJAB_NAMA,
								COMPANY,
								MUK_KODE,
								MJAB_EMP_SUBGROUP,
								MJAB_EMP_SUBGROUP_TXT
							) Values 
							(	".$rows->mjab_kode.",
								'".$rows->mjab_nama."',
								".$rows->company.",
								".$rows->muk_kode.",
								0".$rows->mjab_emp_subgroup.",
								'".$rows->mjab_emp_subgroup_txt."')");
						}
				$hris->close();
				echo count($Data);
				}
	
	}