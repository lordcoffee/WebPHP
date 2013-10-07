<?php
	// initial array
	$multiCity = array(
    	array('Tokyo', 'Japan', 'Asia'),
    	array('Mexico City','Mexico', 'North America'),
    	array('New York City', 'USA', 'North America'),
    	array('Mumbai', 'India', 'Asia'),
    	array('Seoul', 'Korea', 'Asia'),
    	array('Shanghai', 'China', 'Asia'),
    	array('Lagos', 'Nigeria', 'Africa'),
    	array('Buenos Aires', 'Argentina', 'South America'),
    	array('Cairo', 'Egypt', 'Africa'),
    	array('London', 'UK','Europe')
	);

	function build_result_list($cities) {
        echo "<table><thead>";
        $titles = array('City', 'Country', 'Continent');
        // create table headline
        echo "<tr>";
        foreach ($titles as $title) {
            echo '<th>' . $title . '</th>';
        }
        echo "</tr>";
        echo "</thead><tbody>";
		// create table record
        foreach ($cities as $city) {
        	echo "<tr>";
            echo "<td>$city[0]</td><td>$city[1]</td><td>$city[2]</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
	}
?>
<!DOCTYPE html>
<html>
	<meta charset=utf-8>
	<head>
		<title>Multi-dimensional Array</title>
		<style type="text/css">
			td, th {
				width: 8em;
				border: 1px solid black;
				padding-left: 4px;
			}
			th {
				text-align:center;
			}
			table {
				border-collapse: collapse; 
				border: 1px solid black;
			}
		</style>
	</head>
 	<body>
		<h2>Auflistung Array</h2>
		<?php 
			// simply print out all entries in the array
			build_result_list($multiCity); 
		?>
		<h2>Auflistung der Städte in Asien</h2>
		<?php 
			// array_filter calls for each entry in $multiCity the funktion behind
			// which is checking if continent equals 'Asia' if so it will be printed
			build_result_list(array_filter($multiCity, function ($row) { return $row[2] == 'Asia'; })); 
		?>
		<h2>Auflistung der Kontinente, sowie die Zahl der Länder darin (im Array)<br /></h2>
		<?php
			// create array with all continents inital with 1 when it already exists simply increment
			$continents = array();
			foreach ($multiCity as $row) {
        		if (!array_key_exists($row[2], $continents)) {
                	$continents[$row[2]] = 1;
       	 		} else {
                	$continents[$row[2]]++;
        		}
			}
			// build up result table with all continents and count of their frequency
			echo "<table><thead><tr><th>Continent</th><th>Country Count</th></tr></thead></tbody>";
			foreach ($continents as $continent => $count) {
        		echo "<tr><td>$continent</td><td>$count</td></tr>";
			}
			echo "</tbody></table>";
		?>
		<h2>Auflistung nach Länder A-Z <br /></h2>
		<?php
			// prepare array with countries only
        	$countries = array_map(function ($row) {return $row[1]; }, $multiCity);
        	// get rid of duplicate entries because there could be multiple cities from a country
        	$countries = array_unique($countries);
			// sort the countries 
        	asort($countries);
			// and finaly build up the result table
        	echo "<table><thead><tr><th>Country</th></tr></thead></tbody>";
        	foreach ($countries as $country) {
                echo "<tr><td>$country</td></tr>";
        	}
        	echo "</tbody></table>";
		?>
	</body>
</html>