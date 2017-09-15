<?php

namespace komicho;

class formatTime
{
    
    private  $lang;
    
    public function __construct($arr = false)
    {
        if ( $arr == false) {
            $this->lang = 'ar';
        } else {
            $this->lang = $arr['lang'];
        }
    }
    
    public function langs($fun,$txt)
    {
        $lang = [
            'ar' => [
                'between' => [
                    'Ago' => 'منذ',
                    'lessMinute' => 'أقل من دقيقة',
                    'minuteAgo' => 'منذ دقيقة',
                    'twoMinutesAgo' => 'منذ دقيقتين',
                    'minute' => 'دقيقة',
                    'oneHourAgo' => 'منذ ساعة',
                    'twoHoursAgo' => 'منذ ساعتين',
                    'hours' => 'ساعات',
                    'ADayAgo' => 'منذ يوم',
                    'twoDaysAgo' => 'منذ يومين',
                    'days' => 'ايام',
                    'sinceAWeek' => 'منذ اسبوع',
                    'twoWeeksAgo' => 'منذ اسبوعين',
                    'weeks' => 'أسابيع',
                    'monthAgo' => 'منذ شهر',
                    'twoMonths' => 'منذ شهرين',
                    'months' => 'اشهر',
                    'yearAgo' => 'منذ سنة',
                    'yearsAgo' => 'منذ سنتين',
                    'years' => 'سنوات',
                ],
                'txt' => [
                    //
                    'Jan' => 'يناير',
                    'Feb' => 'فبراير',
                    'Mar' => 'مارس',
                    'Apr' => 'أبريل',
                    'May' => 'مايو',
                    'Jun' => 'يونيو',
                    'Jul' => 'يوليو',
                    'Aug' => 'أغسطس',
                    'Sep' => 'سبتمبر',
                    'Oct' => 'أكتوبر',
                    'Nov' => 'نوفمبر',
                    'Dec' => 'ديسمبر',
                    //
                    'Sat' => 'السبت',
                    'Sun' => 'الاحد',
                    'Mon' => 'الاثنين',
                    'Tue' => 'الثلاثاء',
                    'Wed' => 'الاربعاء',
                    'Thu' => 'الخميس',
                    'Fri' => 'الجمعة',
                    //
                    'AM' => 'صباحا',
                    'PM' => 'مساء',
                ]
            ],
            'en' => [
                'between' => [
                    'Ago' => 'Ago',
                    'lessMinute' => 'less than a minute',
                    'minuteAgo' => 'A minute ago',
                    'twoMinutesAgo' => 'Two minutes ago',
                    'minute' => 'Minutes',
                    'oneHourAgo' => 'one hour ago',
                    'twoHoursAgo' => 'two hours ago',
                    'hours' => 'Hours',
                    'ADayAgo' => 'A day ago',
                    'twoDaysAgo' => 'Two days ago',
                    'days' => 'days',
                    'sinceAWeek' => 'Since a week',
                    'twoWeeksAgo' => 'Two weeks ago',
                    'weeks' => 'Weeks',
                    'monthAgo' => 'A month ago',
                    'twoMonths' => 'from two months',
                    'months' => 'Months',
                    'yearAgo' => 'a year ago',
                    'yearsAgo' => 'Two years ago',
                    'years' => 'Years',
                ],
                'txt' => [
                    //
                    'Jan' => 'Jan',
                    'Feb' => 'Feb',
                    'Mar' => 'Mar',
                    'Apr' => 'Apr',
                    'May' => 'May',
                    'Jun' => 'Jun',
                    'Jul' => 'Jul',
                    'Aug' => 'Aug',
                    'Sep' => 'Sep',
                    'Oct' => 'Oct',
                    'Nov' => 'Nov',
                    'Dec' => 'Dec',
                    //
                    'Sat' => 'Sat',
                    'Sun' => 'Sun',
                    'Mon' => 'Mon',
                    'Tue' => 'Tue',
                    'Wed' => 'Wed',
                    'Thu' => 'Thu',
                    'Fri' => 'Fri',
                    //
                    'AM' => 'AM',
                    'PM' => 'PM',
                ]
            ],
        ];
        return $lang[$this->lang][$fun][$txt];
    }
    
	function between($o_time,$n_time = false)
    {
        if ( $n_time == false ) {
            $time = time();
        } else {
            $time = $n_time;
        }
		$timeall = $time-$o_time;
		if($timeall <= 60){
			$timeall = $this->langs('between','lessMinute');
		}elseif($timeall >= 60 and $timeall <= 3600){
			$timed = floor($timeall/60);
			if($timed <= 1){
				$timeall = $this->langs('between','minuteAgo');
			}else if($timed <= 2){
				$timeall = $this->langs('between','twoMinutesAgo');
			}else if($timed >= 3){
				$timeall = $this->langs('between','Ago') . ' ' . $timed . ' ' . $this->langs('between','minute');
			}
		}elseif($timeall >= 3600 and $timeall <= 86400){
			$timed = floor($timeall/3600);
			if($timed <= 1){
				$timeall = $this->langs('between','oneHourAgo');
			}else if($timed <= 2){
				$timeall = $this->langs('between','twoHoursAgo');
			}else if($timed >= 3){
				$timeall = $this->langs('between','Ago') . ' ' . $timed . ' ' . $this->langs('between','hours');
			}
		}elseif($timeall >= 86400 and $timeall <= 604800){
			$timed = floor($timeall/86400);
			if($timed <= 1){
				$timeall = $this->langs('between','ADayAgo');
			}else if($timed <= 2){
				$timeall = $this->langs('between','twoDaysAgo');
			}else if($timed >= 3){
				$timeall = $this->langs('between','Ago') . ' ' . $timed . ' ' . $this->langs('between','days');
			}
		}elseif($timeall >= 604800 and $timeall <= 2419200){
			$timed = floor($timeall/604800);
			if($timed <= 1){
				$timeall = $this->langs('between','sinceAWeek');
			}else if($timed <= 2){
				$timeall = $this->langs('between','twoWeeksAgo');
			}else if($timed >= 3){
				$timeall = $this->langs('between','Ago') . ' ' . $timed . ' ' . $this->langs('between','weeks');
			}
		}
		elseif($timeall >= 2419200 and $timeall <= 29030400){
			$timed = floor($timeall/2419200);
			if($timed <= 1){
				$timeall = $this->langs('between','monthAgo');
			}else if($timed <= 2){
				$timeall = $this->langs('between','twoMonths');
			}else if($timed >= 3){
				$timeall = $this->langs('between','Ago') . ' ' . $timed . ' ' . $this->langs('between','months');
			}
		}
		elseif($timeall >= 29030400){
			$timed = floor($timeall/29030400);
			if($timed <= 1){
				$timeall = $this->langs('between','yearAgo');
			}else if($timed <= 2){
				$timeall = $this->langs('between','yearsAgo');
			}else if($timed >= 3){
				$timeall = $this->langs('between','Ago') . ' ' . $timed . ' ' . $this->langs('between','years');
			}
		}

		return $timeall;
	}
    
    function date_time($code_time)
    {
        $month = date('M',$code_time);
        $day = date('D',$code_time);
        $ampm = date('A',$code_time);


        $Month = [
            'Jan' => $this->langs('txt','Jan'),
            'Feb' => $this->langs('txt','Feb'),
            'Mar' => $this->langs('txt','Mar'),
            'Apr' => $this->langs('txt','Apr'),
            'May' => $this->langs('txt','May'),
            'Jun' => $this->langs('txt','Jun'),
            'Jul' => $this->langs('txt','Jul'),
            'Aug' => $this->langs('txt','Aug'),
            'Sep' => $this->langs('txt','Sep'),
            'Oct' => $this->langs('txt','Oct'),
            'Nov' => $this->langs('txt','Nov'),
            'Dec' => $this->langs('txt','Dec'),
        ];
        $Day = [
            'Sat' => $this->langs('txt','Sat'),
            'Sun' => $this->langs('txt','Sun'),
            'Mon' => $this->langs('txt','Mon'),
            'Tue' => $this->langs('txt','Tue'),
            'Wed' => $this->langs('txt','Wed'),
            'Thu' => $this->langs('txt','Thu'),
            'Fri' => $this->langs('txt','Fri'),
        ];
        $Ampm = [
            'AM' => $this->langs('txt','AM'),
            'PM' => $this->langs('txt','PM'),
        ];
        return $Day["$day"].' '.date('d',$code_time).', '.$Month["$month"].' '.date('Y',$code_time).' '.date('h',$code_time).':'.date('m',$code_time).' '.$Ampm["$ampm"];
    }

}
