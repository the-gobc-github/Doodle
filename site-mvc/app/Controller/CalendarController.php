<?php

namespace App\Controller;
use Core\Controller\Controller;
use App\Controller\AppController;
use \Datetime;

class CalendarController extends AppController{

	private $days_arr = ['Mon'=>0,'Tue'=>1,'Wed'=>2,'Thu'=>3,'Fri'=>4,'Sat'=>5,'Sun'=>6];
	private $month_arr = ['January'=>0,'February'=>1,'March'=>2,'April'=>3,'May'=>4,'June'=>5,'July'=>6,
							'August'=>7,'September'=>8,'October'=>9,'November'=>10,'December'=>11];
	public $year;
	public $month;
	public $ddate;

	public function init(){

		echo '<br>';
		$this->month = date('m',time());
		var_dump($_GET);
		echo '<br>';
		if (isset($_GET['a']) && isset($_GET['m'])) {
			$m = $_GET['m'];
			$y_shift = 0;
			if ($_GET['a']=='prev') {
				if ($m=='January') {
					$this->month = 12;
					$y_shift = -1;
				} else {
					$this->month = $this->month_arr[$m];
				}
			}
			if ($_GET['a']=='next') {
				if ($m=='December') {
					$this->month = 1;
					var_dump($this->month);
					$y_shift = 1;
				} else {
					$this->month = $this->month_arr[$m]+2;
					var_dump($this->month);
				}
			}
		}

		$this->year = date('Y',time());
		if (isset($_GET['y'])) {
			$y = $_GET['y'];
			$this->year = $y + $y_shift;
		}

		$this->ddate = $this->year . '-' . $this->month . '-01';

		return array($this->year,$this->month,$this->ddate);
	}

	public function show(){

		list($this->year,$this->month,$this->ddate) = $this->init();
		list($first_day,$nb_days,$nb_weeks) = $this->calendar_init();
		//GET WEEKDAYS
		$weekdays = $this->get_weekdays();
		//GET CALENDAR
		$calendar = $this->get_calendar($nb_weeks,$first_day,$nb_days);

		$year = $this->year;
		$month = array_search($this->month-1,$this->month_arr);
		$this->render('users/calendar',compact('year','month','calendar','weekdays'));
	}

	public function calendar_init(){
		$date = new DateTime($this->ddate);

		//GET FIRST DAY OF MONTH
		$first_day = $date->format('l');
		$first_day = $first_day[0] . $first_day[1] . $first_day[2];
		//GET NB DAYS IN MONTH
		$nb_days = $date->format('t');
		//GET NB WEEKS IN MONTH
		$endddate = $this->year . '-' . $this->month . '-' . $nb_days;
		$enddate = new DateTime($endddate);

		$last_week_nb = $enddate->format('W');
		$first_week_nb = $date->format("W");
		$nb_weeks = $last_week_nb - ($first_week_nb-1);

		return array($first_day, $nb_days, $nb_weeks);
	}

	public function get_weekdays() {

		$weekdays ='<ul class="weekdays">';

		foreach ($this->days_arr as $key=>$value) {
			$weekdays .= '<li>' . $key . '</li>';
		}
		$weekdays .= '</ul>';
		return $weekdays;
	}

	public function get_calendar($nb_weeks,$first_day,$nb_days) {

		$d_per_w = 7;
		$cpt_day = 0;
		$start = False;
		$calendar = '<ul class="days">';
		for ($i = 1; $i <= $nb_weeks*$d_per_w; $i++) {
			if ($start==False) {
				$start = ($i == $this->days_arr[$first_day]);
				$calendar .= '<li><p></p></li>';
			}
			if ($start==True) {
				$cpt_day += 1;
				if ($cpt_day <=$nb_days) {
					$calendar .= '<li>'.$cpt_day.'</li>';
				} else {
					$start = False;
				}
			}
		}
		$calendar .= '</ul>';
		return $calendar;
	}


}

?>
