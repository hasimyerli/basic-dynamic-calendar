<?php
class calendar {

   private $month;
   private $year;
   private $hour;
   private $munite;
   private $second;
   private $day_name;
   private $month_name;
   private $week;
   private $last_day;
   private $count_week = 6;

   function __construct($_month,$_year) {
     $this->month = $_month;
     $this->year = $_year;
     $this->hour = date("H");
     $this->minute =date("i");
     $this->second = date("s");
     $this->day_name = array("Pzt","Sal","Çar","Per","Cum","Cmt","Paz");
     $this->month_name = array('OCAK','ŞUBAT','MART','NİSAN','MAYIS','HAZİRAN','TEMMUZ','AĞUSTOS','EYLÜL','EKİM','KASIM','ARALIK');
   }

   public function get_month_name($month){
     return $this->month_name[$month-1];
   }

   public function get_day_name(){
     return $this->day_name;
   }

   private function dateFormController () {
      if ($this->month == date("m") && $this->year == date("Y")) {
        $this->week = date("N",mktime(0,0,0,date("m"),1,date("Y")));//baz alınan tarihteki ayın 1.günü haftanın kaçıncı günü
        $this->last_day = date("t");//ayın son gününü sayısal olarak verir
      }
      else {
        $this->week = date("N",mktime($this->hour,$this->minute,$this->second,$this->month,1,$this->year));//baz alınan tarihteki ayın 1.günü haftanın kaçıncı günü
        $this->last_day = date("t",mktime($this->hour,$this->minute,$this->second,$this->month,1,$this->year));//ayın son gününü sayısal olarak verir
      }
  }

  private function previousMonth() {
     $this->dateFormController();
     for ($i=1; $i < $this->week; $i++) { // ayın 1.günü haftanın kaçıncı günüyse o günden öncesine boşluk koyar çünkü geçen ayın günlerine denk gelen kısımlardır.
       $this->count_week--;
       echo "<td></td>";
     }
  }

  public function get_day_of_week() {
    $this->previousMonth();
 		for ($i=1; $i <= $this->last_day; $i++) { // döngü ayın 1.gününden son gününe kadar çalışır.
 				if ($this->count_week < 0) { //hafta bitmişe takvim bi alt satırdan yazmaya devam eder.
 					echo "</tr><tr>";
 					$this->count_week = 6;// hafta bittiğinde bir sonraki satır haftanın başı olacağı için değişkeni tekrar 6 dan başlatıyoruz.
 				}
 				if ($i == date('d')) { // bugün ayın kaçıncı günüyse onu belirgin olarak seçer.
 					echo '<td style="background:#555;color:white;" class="calendar-day">'.$i.'</td>';
 				}
 				else {
          echo '<td class="calendar-day">'.$i.'</td>';
 				}
					$this->count_week--;
 		}
  }

}
?>
