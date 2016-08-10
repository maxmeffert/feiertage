<?php

namespace iwz\feiertage {
	
	class Feiertage {
		
		const COUNTRY_GERMANY = "COUNTRY_GERMANY";
		
		/**
		 * 
		 * @param int $year
		 * @param string $country
		 * @return Holidays
		 */
		static public function create ($year, $country=Feiertage::COUNTRY_GERMANY) {
			
			switch ($country) {
				
				case self::COUNTRY_GERMANY:
					return new HolidaysGermany($year);
				
			}
			
		}
		
	}
	
}

?>