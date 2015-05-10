<?php

/**
 * PHP Helper class to compute german (movable) holidiays, i.e. christian holidays
 * 
 * @author maxmeffert
 *
 */
class Feiertage {
	
	/**
	 * The Gaussian Easter Algorithm (Gauss'sche Osterformel)
	 * 
	 * @link http://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel
	 * @param int $X Year, e.g. 2015, 2016, etc.
	 * @return The date of easter sunday as day of march, i.e. 32.March == 1.April
	 */
	static public function GaussianEasterAlgorithm ($X) {
		
		$K = intval( $X / 100 );
		$M = intval( 15 + (3 * $K + 3) / 4 - (8 * $K + 13) / 25 );
		$S = intval( 2 - (3 * $K + 3) / 4 );
		$A = intval( X % 19 );
		$D = intval( (19*$A + M) % 30 );
		$R = intval( ($D + $A / 11) / 29 );
		$OG = intval( 21 + $D - $R );
		$SZ = intval( 7 - ($X + $X / 4 + $S) % 7 );
		$OE = intval( 7 - ($OG - $SZ) % 7 );
		$OS = intval( $OG + $OE );
				
		return $OS;
		
	}
	
}

?>