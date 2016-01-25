<?php
/**
 * timehelper.inc.php
 * 
 * @author 		Dan King (dan@designelemental.net)
 * @copyright 	Copyright 2008
 * @version 	1.0 (PHP5)
 * 
 */



  
	
	/**
	 * Calculates the start and ending week dates
	 *
	 * @param int $weeks_ago
	 * @param bool $append_time
	 * @return array
	 */
	function getWeekStartEnd($weeks_ago = 0, $append_time = false){
    	
		$day_num = date('w', time()-(604800 * $weeks_ago));
		
		$start = date('Y-m-d', time()-($day_num * 86400)-(604800 * $weeks_ago));
		$end = date('Y-m-d', time()+((6-$day_num) * 86400)-(604800 * $weeks_ago));
		
		if($append_time)
			return array('start'=>$start . ' 00:00:00', 'end'=>$end . ' 23:59:59');
		else 
			return array('start'=>$start, 'end'=>$end);
	}
	
	/**
	 * Test if $test is between $st and $en
	 *
	 * @param unknown_type $st
	 * @param unknown_type $en
	 * @param unknown_type $test
	 * @return bool
	 */
    function inRange($st, $en, $test){
        $start = strtotime($st);
        $end = strtotime($en);
        $itest = strtotime($test);
        
        if($itest > $start && $itest < $end)
        	return true;
        else 
        	return false;
    }
		
	/**
	  * Creates a friendly date format. ie. "22 hours", or "3 months"
	  *
	  * @param string $t
	  * @return string
	  */
	function friendlyTime($t){
	  	$time = (!is_numeric($t)) ? strtotime($t) : $t;
	  	$gap = abs(time() - $time);
	  	if($gap < 60) return 'Less than a minute';
	  	elseif($gap < 3600) return round($gap/60) . ' minutes';
	  	elseif($gap < 86400) {
	  		$num = round($gap / 3600);
	  		$units = ($num > 1) ? 'hours' : 'hour';
	  		return $num . ' ' . $units;
	  	}
	  	elseif($gap < 2592000){
	  		$num = round($gap / 86400);
	  		$units = ($num > 1) ? 'days' : 'day';
	  		return $num . ' ' . $units;
	  	}
	  	elseif($gap < 31536000){
	  		$num = round($gap / 2592000);
	  		$units = ($gap > 1) ? 'months' : 'month';
	  		return $num . ' ' . $units;
	  	}
	  	else{
	  		$num = round($gap / 31536000);
	  		$units = ($gap > 1) ? 'years' : 'year';
	  		return $num . ' ' . $units;
		}
	}
    

