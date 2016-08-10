<?php

namespace iwz\feiertage {
	
	abstract class Holidays implements \Serializable, \Iterator, \Countable {
		
		/**
		 *
		 * @param string $key
		 * @return \DateTimeInterface
		 */
		abstract public function getHoliday ($key);
	
		/**
		 *
		 * @param \DateTimeInterface $d
		 * @return boolean
		 */
		abstract public function check (\DateTimeInterface $d);
	
		/**
		 * 
		 * @param \DateTimeInterface $d
		 */
		abstract public function which (\DateTimeInterface $d);
	
		/**
		 * @return array
		 */
		abstract public function toArray ();
	
		/**
		 * 
		 * @param array $array
		 */
		abstract public function fromArray (array $array);
		
		private $year;
		
		/**
		 * 
		 * @param unknown $year
		 */
		public function __construct ($year) {
			
			$this->setYear($year);
			
		}
		
		/**
		 * @return int
		 */
		final public function getYear () {
			
			return $this->year;
			
		}
		
		/**
		 *
		 * @param int $year
		*/
		final public function setYear ($year) {
			
			$this->year = intval($year);
			
		}
		
		/**
		 * @retrun string
		 */
		final public function serialize () {
			
			return serialize($this->toArray());
			
		}
		
		/**
		 * 
		 * @param string $str
		 */
		final public function unserialize ($str) {
			
			$array = unserialize($str);
			
			if (is_array($array)) {
				
				$this->fromArray($array);
				
			}
			
		}
		
		
		
	}
	
}



?>