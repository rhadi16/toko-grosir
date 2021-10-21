<?php

date_default_timezone_set('Asia/Makassar');

class datetimeFormat {
	

	public function getTimeZone()
	{
		return date_default_timezone_get();
	}

    public function TanggalIndo1($date){
    
          $BulanIndo = array( 
                            "Januari", 
                            "Februari", 
                            "Maret", 
                            "April", 
                            "Mei", 
                            "Juni", 
                            "Juli", 
                            "Agustus", 
                            "September", 
                            "Oktober", 
                            "November", 
                            "Desember"
                            );

          $tgl = explode('-', $date);

          $result = $tgl[2] . " " . $BulanIndo[(int)$tgl[1]] . " ". $tgl[0];
          return($result);
    
    }

    public function getTanggal($date){
    
          $tgl   = substr($date, 8, 2);
   
          return $tgl;
    
    }

    public function getBulan($date){
    
          $bulan = substr($date, 5, 2);
   
          return $bulan;
    
    }

    public function getTahun($date){
    
          $tahun = substr($date, 0, 4);
   
          return $tahun;
    
    }

    public function tampilhari($date){
        $day = date('D', strtotime($date));
        switch($day){
        case 'Sun':
            $hari_ini = "Minggu";
        break;

        case 'Mon':         
            $hari_ini = "Senin";
        break;

        case 'Tue':
            $hari_ini = "Selasa";
        break;

        case 'Wed':
            $hari_ini = "Rabu";
        break;

        case 'Thu':
            $hari_ini = "Kamis";
        break;

        case 'Fri':
            $hari_ini = "Jumat";
        break;

        case 'Sat':
            $hari_ini = "Sabtu";
        break;
        
        default:
            $hari_ini = "Tidak di ketahui";     
        break;
        }

        return $hari_ini;
    }


}


?>