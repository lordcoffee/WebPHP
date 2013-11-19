<?php 

	// Building up the array
	class CantonModel{
	
		private $cantons = array (
		  0 => 
		  array (
		    'Kürzel' => 'ZH',
		    'Kanton' => 'Zürich',
		    'Standesstimme' => '1',
		    'Beitritt' => 1351,
		    'Hauptort' => 'Zürich',
		    'Einwohner 1' => '1392396',
		    'Ausländer 2' => '24,9 %',
		    'Fläche 3' => '1729',
		    'Dichte 4' => '805',
		    'Gemeinden 6' => 171,
		    'Amtssprache' => 'deutsch',
		  ),
		  1 => 
		  array (
		    'Kürzel' => 'BE',
		    'Kanton' => 'Bern',
		    'Standesstimme' => '1',
		    'Beitritt' => 1353,
		    'Hauptort' => 'Bern',
		    'Einwohner 1' => '985046',
		    'Ausländer 2' => '13,7 %',
		    'Fläche 3' => '5959',
		    'Dichte 4' => '165',
		    'Gemeinden 6' => 382,
		    'Amtssprache' => 'deutsch, französisch',
		  ),
		  2 => 
		  array (
		    'Kürzel' => 'LU',
		    'Kanton' => 'Luzern ',
		    'Standesstimme' => '1',
		    'Beitritt' => 1332,
		    'Hauptort' => 'Luzern',
		    'Einwohner 1' => '381966',
		    'Ausländer 2' => '16,8 %',
		    'Fläche 3' => '1493',
		    'Dichte 4' => '256',
		    'Gemeinden 6' => 87,
		    'Amtssprache' => 'deutsch',
		  ),
		  3 => 
		  array (
		    'Kürzel' => 'UR',
		    'Kanton' => 'Uri ',
		    'Standesstimme' => '1',
		    'Beitritt' => 1291,
		    'Hauptort' => 'Altdorf',
		    'Einwohner 1' => '35382',
		    'Ausländer 2' => '10,6 %',
		    'Fläche 3' => '1077',
		    'Dichte 4' => '33',
		    'Gemeinden 6' => 20,
		    'Amtssprache' => 'deutsch',
		  ),
		  4 => 
		  array (
		    'Kürzel' => 'SZ',
		    'Kanton' => 'Schwyz ',
		    'Standesstimme' => '1',
		    'Beitritt' => 1291,
		    'Hauptort' => 'Schwyz',
		    'Einwohner 1' => '147904',
		    'Ausländer 2' => '19,3 %',
		    'Fläche 3' => '908',
		    'Dichte 4' => '163',
		    'Gemeinden 6' => 30,
		    'Amtssprache' => 'deutsch',
		  ),
		  5 => 
		  array (
		    'Kürzel' => 'OW',
		    'Kanton' => 'Obwalden',
		    'Standesstimme' => '0,5',
		    'Beitritt' => 1291,
		    'Hauptort' => 'Sarnen',
		    'Einwohner 1' => '35878',
		    'Ausländer 2' => '13,8 %',
		    'Fläche 3' => '491',
		    'Dichte 4' => '73',
		    'Gemeinden 6' => 7,
		    'Amtssprache' => 'deutsch',
		  ),
		  6 => 
		  array (
		    'Kürzel' => 'NW',
		    'Kanton' => 'Nidwalden ',
		    'Standesstimme' => '0,5',
		    'Beitritt' => 1291,
		    'Hauptort' => 'Stans',
		    'Einwohner 1' => '41311',
		    'Ausländer 2' => '12,4 %',
		    'Fläche 3' => '276',
		    'Dichte 4' => '150',
		    'Gemeinden 6' => 11,
		    'Amtssprache' => 'deutsch',
		  ),
		  7 => 
		  array (
		    'Kürzel' => 'GL',
		    'Kanton' => 'Glarus ',
		    'Standesstimme' => '1',
		    'Beitritt' => 1352,
		    'Hauptort' => 'Glarus',
		    'Einwohner 1' => '39217',
		    'Ausländer 2' => '21,6 %',
		    'Fläche 3' => '685',
		    'Dichte 4' => '57',
		    'Gemeinden 6' => 3,
		    'Amtssprache' => 'deutsch',
		  ),
		  8 => 
		  array (
		    'Kürzel' => 'ZG',
		    'Kanton' => 'Zug ',
		    'Standesstimme' => '1',
		    'Beitritt' => 1352,
		    'Hauptort' => 'Zug',
		    'Einwohner 1' => '115104',
		    'Ausländer 2' => '25,5 %',
		    'Fläche 3' => '239',
		    'Dichte 4' => '482',
		    'Gemeinden 6' => 11,
		    'Amtssprache' => 'deutsch',
		  ),
		  9 => 
		  array (
		    'Kürzel' => 'FR',
		    'Kanton' => 'Freiburg ',
		    'Standesstimme' => '1',
		    'Beitritt' => 1481,
		    'Hauptort' => 'Freiburg',
		    'Einwohner 1' => '284668',
		    'Ausländer 2' => '20,5 %',
		    'Fläche 3' => '1671',
		    'Dichte 4' => '170',
		    'Gemeinden 6' => 165,
		    'Amtssprache' => 'französisch, deutsch',
		  ),
		  10 => 
		  array (
		    'Kürzel' => 'SO',
		    'Kanton' => 'Solothurn ',
		    'Standesstimme' => '1',
		    'Beitritt' => 1481,
		    'Hauptort' => 'Solothurn',
		    'Einwohner 1' => '257393',
		    'Ausländer 2' => '20,0 %',
		    'Fläche 3' => '791',
		    'Dichte 4' => '325',
		    'Gemeinden 6' => 120,
		    'Amtssprache' => 'deutsch',
		  ),
		  11 => 
		  array (
		    'Kürzel' => 'BS',
		    'Kanton' => 'Basel-Stadt ',
		    'Standesstimme' => '0,5',
		    'Beitritt' => 1501,
		    'Hauptort' => 'Basel',
		    'Einwohner 1' => '194661',
		    'Ausländer 2' => '34,1 %',
		    'Fläche 3' => '37',
		    'Dichte 4' => '5034',
		    'Gemeinden 6' => 3,
		    'Amtssprache' => 'deutsch',
		  ),
		  12 => 
		  array (
		    'Kürzel' => 'BL',
		    'Kanton' => 'Basel-Landschaft',
		    'Standesstimme' => '0,5',
		    'Beitritt' => 1501,
		    'Hauptort' => 'Liestal',
		    'Einwohner 1' => '277614',
		    'Ausländer 2' => '19,9 %',
		    'Fläche 3' => '518',
		    'Dichte 4' => '532',
		    'Gemeinden 6' => 86,
		    'Amtssprache' => 'deutsch',
		  ),
		  13 => 
		  array (
		    'Kürzel' => 'SH',
		    'Kanton' => 'Schaffhausen ',
		    'Standesstimme' => '1',
		    'Beitritt' => 1501,
		    'Hauptort' => 'Schaffhausen',
		    'Einwohner 1' => '77139',
		    'Ausländer 2' => '24,2 %',
		    'Fläche 3' => '298',
		    'Dichte 4' => '259',
		    'Gemeinden 6' => 27,
		    'Amtssprache' => 'deutsch',
		  ),
		  14 => 
		  array (
		    'Kürzel' => 'AR',
		    'Kanton' => 'Appenzell Ausserrhoden',
		    'Standesstimme' => '0,5',
		    'Beitritt' => 1513,
		    'Hauptort' => 'Herisau, Trogen5',
		    'Einwohner 1' => '53313',
		    'Ausländer 2' => '14,5 %',
		    'Fläche 3' => '243',
		    'Dichte 4' => '219',
		    'Gemeinden 6' => 20,
		    'Amtssprache' => 'deutsch',
		  ),
		  15 => 
		  array (
		    'Kürzel' => 'AI',
		    'Kanton' => 'Appenzell Innerrhoden',
		    'Standesstimme' => '0,5',
		    'Beitritt' => 1513,
		    'Hauptort' => 'Appenzell',
		    'Einwohner 1' => '15789',
		    'Ausländer 2' => '9,9 %',
		    'Fläche 3' => '173',
		    'Dichte 4' => '91',
		    'Gemeinden 6' => 6,
		    'Amtssprache' => 'deutsch',
		  ),
		  16 => 
		  array (
		    'Kürzel' => 'SG',
		    'Kanton' => 'St. Gallen',
		    'Standesstimme' => '1',
		    'Beitritt' => 1803,
		    'Hauptort' => 'St. Gallen',
		    'Einwohner 1' => '483156',
		    'Ausländer 2' => '22,6 %',
		    'Fläche 3' => '2026',
		    'Dichte 4' => '239',
		    'Gemeinden 6' => 85,
		    'Amtssprache' => 'deutsch',
		  ),
		  17 => 
		  array (
		    'Kürzel' => 'GR',
		    'Kanton' => 'Graubünden',
		    'Standesstimme' => '1',
		    'Beitritt' => 1803,
		    'Hauptort' => 'Chur',
		    'Einwohner 1' => '193388',
		    'Ausländer 2' => '17,1 %',
		    'Fläche 3' => '7105',
		    'Dichte 4' => '27',
		    'Gemeinden 6' => 176,
		    'Amtssprache' => 'deutsch, rätoromanisch, italienisch',
		  ),
		  18 => 
		  array (
		    'Kürzel' => 'AG',
		    'Kanton' => 'Aargau',
		    'Standesstimme' => '1',
		    'Beitritt' => 1803,
		    'Hauptort' => 'Aarau',
		    'Einwohner 1' => '627893',
		    'Ausländer 2' => '22,9 %',
		    'Fläche 3' => '1404',
		    'Dichte 4' => '440',
		    'Gemeinden 6' => 219,
		    'Amtssprache' => 'deutsch',
		  ),
		  19 => 
		  array (
		    'Kürzel' => 'TG',
		    'Kanton' => 'Thurgau',
		    'Standesstimme' => '1',
		    'Beitritt' => 1803,
		    'Hauptort' => 'Frauenfeld',
		    'Einwohner 1' => '251973',
		    'Ausländer 2' => '23,0 %',
		    'Fläche 3' => '991',
		    'Dichte 4' => '254',
		    'Gemeinden 6' => 80,
		    'Amtssprache' => 'deutsch',
		  ),
		  20 => 
		  array (
		    'Kürzel' => 'TI',
		    'Kanton' => 'Tessin',
		    'Standesstimme' => '1',
		    'Beitritt' => 1803,
		    'Hauptort' => 'Bellinzona',
		    'Einwohner 1' => '336943',
		    'Ausländer 2' => '27,3 %',
		    'Fläche 3' => '2812',
		    'Dichte 4' => '120',
		    'Gemeinden 6' => 147,
		    'Amtssprache' => 'italienisch',
		  ),
		  21 => 
		  array (
		    'Kürzel' => 'VD',
		    'Kanton' => 'Waadt',
		    'Standesstimme' => '1',
		    'Beitritt' => 1803,
		    'Hauptort' => 'Lausanne',
		    'Einwohner 1' => '729971',
		    'Ausländer 2' => '32,2 %',
		    'Fläche 3' => '3212',
		    'Dichte 4' => '226',
		    'Gemeinden 6' => 326,
		    'Amtssprache' => 'französisch',
		  ),
		  22 => 
		  array (
		    'Kürzel' => 'VS',
		    'Kanton' => 'Wallis',
		    'Standesstimme' => '1',
		    'Beitritt' => 1815,
		    'Hauptort' => 'Sitten',
		    'Einwohner 1' => '317022',
		    'Ausländer 2' => '22,0 %',
		    'Fläche 3' => '5224',
		    'Dichte 4' => '61',
		    'Gemeinden 6' => 141,
		    'Amtssprache' => 'französisch, deutsch',
		  ),
		  23 => 
		  array (
		    'Kürzel' => 'NE',
		    'Kanton' => 'Neuenburg ',
		    'Standesstimme' => '1',
		    'Beitritt' => 1815,
		    'Hauptort' => 'Neuenburg',
		    'Einwohner 1' => '173183',
		    'Ausländer 2' => '24,4 %',
		    'Fläche 3' => '803',
		    'Dichte 4' => '216',
		    'Gemeinden 6' => 53,
		    'Amtssprache' => 'französisch',
		  ),
		  24 => 
		  array (
		    'Kürzel' => 'GE',
		    'Kanton' => 'Genf',
		    'Standesstimme' => '1',
		    'Beitritt' => 1815,
		    'Hauptort' => 'Genf',
		    'Einwohner 1' => '473941',
		    'Ausländer 2' => '37,0 %',
		    'Fläche 3' => '282',
		    'Dichte 4' => '1633',
		    'Gemeinden 6' => 45,
		    'Amtssprache' => 'französisch',
		  ),
		  25 => 
		  array (
		    'Kürzel' => 'JU',
		    'Kanton' => 'Jura',
		    'Standesstimme' => '1',
		    'Beitritt' => 1979,
		    'Hauptort' => 'Delsberg',
		    'Einwohner 1' => '70542',
		    'Ausländer 2' => '13,0 %',
		    'Fläche 3' => '838',
		    'Dichte 4' => '84',
		    'Gemeinden 6' => 64,
		    'Amtssprache' => 'französisch',
		  ),
		);
		
		public function CantonsModel() {
		}
		
		public function getAllCantons(){
			return $this->cantons;
		}
		
		public function getCantonBy($attr, $val){
		
			$obj = new ArrayObject($this->cantons);
			$iterator = $obj->getIterator();
			
			$result = array();
			
			// using iterator pattern
			while( $iterator->valid() )
			{
			   	$current = $iterator->current();
			    if($current[$attr] === $val || @strtolower($current[$attr]) === @strtolower($val)){
			   		$result[] = $iterator->current();
			   	}
			    $iterator->next();
			}
			return $result;
		}	
	}
	
	// using factory pattern
	class CantonsModelFactory
	{
		public static function getAllCantons(){
			$cantonsModFac = new CantonsModel();        
			return $cantonsModFac->getAllCantons();
		}
		    
		public static function getCantonBy($attr, $val){
			$cantonsModFac = new CantonsModel();
			return $cantonsModFac->getCantonBy($attr, $val);		
		}
	}
 ?>