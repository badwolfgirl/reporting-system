<?php
  class Functions {
		
		public function months(){
			
			$resutls =	array(
				'01' 	=> "January",
				'02' 	=> "February",
				'03' 	=> "March",
				'04' 	=> "April",
				'05' 	=> "May",
				'06' 	=> "June",
				'07' 	=> "July",
				'08' 	=> "August",
				'09' 	=> "September",
				'10' 	=> "October",
				'11' 	=> "November",
				'12' 	=> "December"
			);
			
			return $resutls;
		}
		
		public function years(){
			
			$resutls =	array(
				date('Y')-1,
				date('Y'),
				date('Y')+1,
				date('Y')+2,
				date('Y')+3,
				date('Y')+4,
				date('Y')+5,
			);
			
			return $resutls;
		}
		
		public function check_in_range($sd, $ed, $t)
		{
			// Convert to timestamp
			$start_ts 	= strtotime($sd);
			$end_ts 		= strtotime($ed);
			$user_ts 		= strtotime($t);
		
			// Check that user date is between start & end
			if (($user_ts >= $start_ts) && ($user_ts <= $end_ts))
				return true;
			else
				return false;
		}
		public function available_in($t, $sd){
			
			$future 			= strtotime($sd); //Future date.
			$timefromdb 	= strtotime($t);
			$timeleft 		= $future-$timefromdb;
			$ttlLeft 			= round((($timeleft/24)/60)/60); 
			
			return $ttlLeft;
		
		}
		function available_for($t, $ed){
				
			$future 		= strtotime($ed); //Future date.
			$timefromdb = strtotime($t);
			$timeleft 	= $future-$timefromdb;
			$ttlLeft 			= round((($timeleft/24)/60)/60); 
			
			return $ttlLeft;
		
		}
		
		
    public static function debug($array){
      echo "<pre>";
      print_r($array);
      echo "</pre>";
    }  

		
		
		public function isValidEmail($email) {
				// First, we check that there's one @ symbol, and that the lengths are right
				if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
						// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
						return false;
				}
				// Split it into sections to make life easier
				$email_array = explode("@", $email);
				$local_array = explode(".", $email_array[0]);
				for ($i = 0; $i < sizeof($local_array); $i++) {
						if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
								return false;
						}
				}
				if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
						$domain_array = explode(".", $email_array[1]);
						if (sizeof($domain_array) < 2) {
								return false; // Not enough parts to domain
						}
						for ($i = 0; $i < sizeof($domain_array); $i++) {
								if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
										return false;
								}
						}
				}
		
				return true;
		}
	}
?>