<?php
	//Calculate ROI - BACKEND
	$rate = 0.53; //Set mileage rate constant
	if(isset($_POST['departSelect']))
	{
		$roi=0;
		/*Jones Macon Campus */
		if ($_POST['departSelect'] == 'JonesMaconDepart' && $_POST['destinationSelect'] == 'SLCMaconArrive' ){
			$mileage = 0;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'JonesMaconDepart' && $_POST['destinationSelect'] == 'JonesMaconArrive' ){
			$mileage = 0;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'JonesMaconDepart' && $_POST['destinationSelect'] == 'AldermanCochranArrive'){
			$mileage = 48;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'JonesMaconDepart' &&$_POST['destinationSelect'] == 'MemorialCochranArrive'){
			$mileage = 48;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'JonesMaconDepart' && $_POST['destinationSelect'] == 'DublinArrive') {
			$mileage = 60;
			$roi = $mileage * $rate;
			//echo $roi;
		}

		elseif ($_POST['departSelect'] == 'JonesMaconDepart' && $_POST['destinationSelect'] == 'EastmanArrive'){
			$mileage = 68;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'JonesMaconDepart' && $_POST['destinationSelect'] == 'WarnerRobinsArrive') {
			$mileage = 22;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		/*SLC Macon */
		elseif ($_POST['departSelect'] == 'SLCMaconDepart' && $_POST['destinationSelect'] == 'JonesMaconArrive' ){
			$mileage = 0;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'SLCMaconDepart' && $_POST['destinationSelect'] == 'SLCMaconArrive' ){
			$mileage = 0;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'SLCMaconDepart' && $_POST['destinationSelect'] == 'AldermanCochranArrive'){
			$mileage = 48;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'SLCMaconDepart' &&$_POST['destinationSelect'] == 'MemorialCochranArrive'){
			$mileage = 48;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'JonesMaconDepart' && $_POST['destinationSelect'] == 'DublinArrive') {
			$mileage = 60;
			$roi = $mileage * $rate;
			//echo $roi;
		}

		elseif ($_POST['departSelect'] == 'SLCMaconDepart' && $_POST['destinationSelect'] == 'EastmanArrive'){
			$mileage = 68;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'SLCMaconDepart' && $_POST['destinationSelect'] == 'WarnerRobinsArrive') {
			$mileage = 22;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		/*Ebenezer Cochran*/

		elseif ($_POST['departSelect'] == 'AldermanCochranDepart' && $_POST['destinationSelect'] == 'JonesMaconArrive'){
			$mileage = 48;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'AldermanCochranDepart' && $_POST['destinationSelect'] == 'SLCMaconArrive'){
			$mileage = 48;
			$roi = $mileage * $rate;
			//echo $roi;
			
		}
		elseif ($_POST['departSelect'] == 'AldermanCochranDepart' && $_POST['destinationSelect'] == 'AldermanCochranArrive'){
			$mileage = 0;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'AldermanCochranDepart' &&$_POST['destinationSelect'] == 'MemorialCochranArrive'){
			$mileage = 0;
			$roi = $mileage * $rate;
			//echo $roi;
			
		}
		elseif ($_POST['departSelect'] == 'AldermanCochranDepart' && $_POST['destinationSelect'] == 'DublinArrive'){
			$mileage = 32;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'AldermanCochranDepart' && $_POST['destinationSelect'] == 'EastmanArrive'){
			$mileage = 20;
			$roi = $mileage * $rate;
			//echo $roi;
			
		}
		elseif ($_POST['departSelect'] == 'AldermanCochranDepart' && $_POST['destinationSelect'] == 'WarnerRobinsArrive'){
			$mileage = 30;
			$roi = $mileage * $rate;
			//echo $roi;
			
		}
		/*Anderson Cochran*/
		elseif ($_POST['departSelect'] == 'MemorialCochranDepart' && $_POST['destinationSelect'] == 'JonesMaconArrive'){
			$mileage = 48;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'MemorialCochranDepart'&& $_POST['destinationSelect'] == 'SLCMaconArrive'){
			$mileage = 48;
			$roi = $mileage * $rate;
			//echo $roi;
			
		}
		elseif ($_POST['departSelect'] == 'MemorialCochranDepart' && $_POST['destinationSelect'] == 'AldermanCochranArrive'){
			$mileage = 0;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'MemorialCochranDepart' &&$_POST['destinationSelect'] == 'MemorialCochranArrive'){
			$mileage = 0;
			$roi = $mileage * $rate;
			//echo $roi;
			
		}
		elseif ($_POST['departSelect'] == 'MemorialCochranDepart' && $_POST['destinationSelect'] == 'DublinArrive'){
			$mileage = 32;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'MemorialCochranDepart' && $_POST['destinationSelect'] == 'EastmanArrive'){
			$mileage = 20;
			$roi = $mileage * $rate;
			//echo $roi;
			
		}
		elseif ($_POST['departSelect'] == 'MemorialCochranDepart' && $_POST['destinationSelect'] == 'WarnerRobinsArrive'){
			$mileage = 30;
			$roi = $mileage * $rate;
			//echo $roi;
			
		}
		/*Dublin*/
		elseif ($_POST['departSelect'] == 'DublinDepart' && $_POST['destinationSelect'] == 'JonesMaconArrive'){
			$mileage = 60;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		elseif ($_POST['departSelect'] == 'DublinDepart' && $_POST['destinationSelect'] == 'SLCMaconArrive'){
			$mileage = 60;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'DublinDepart' && $_POST['destinationSelect'] == 'AldermanCochranArrive') {
			$mileage = 32;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'DublinDepart' &&$_POST['destinationSelect'] == 'MemorialCochranArrive') {
			$mileage = 32;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'DublinDepart' && $_POST['destinationSelect'] == 'DublinArrive'){
			$mileage = 0;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		elseif ($_POST['departSelect'] == 'DublinDepart' && $_POST['destinationSelect'] == 'EastmanArrive'){
			$mileage = 34;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		elseif ($_POST['departSelect'] == 'DublinDepart' && $_POST['destinationSelect'] == 'WarnerRobinsArrive'){
			$mileage = 50;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		/*Eastman*/
		elseif ($_POST['departSelect'] == 'EastmanDepart' && $_POST['destinationSelect'] == 'JonesMaconArrive'){
			$mileage = 68;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		elseif ($_POST['departSelect'] == 'EastmanDepart' && $_POST['destinationSelect'] == 'SLCMaconArrive'){
			$mileage = 68;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		elseif ($_POST['departSelect'] == 'EastmanDepart' && $_POST['destinationSelect'] == 'AldermanCochranArrive') {
			$mileage = 20;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'DublinDepart' &&$_POST['destinationSelect'] == 'MemorialCochranArrive') {
			$mileage = 20;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'EastmanDepart' && $_POST['destinationSelect'] == 'EastmanArrive'){
			$mileage = 0;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		elseif ($_POST['departSelect'] == 'EastmanDepart' && $_POST['destinationSelect'] == 'DublinArrive'){
			$mileage = 34;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		elseif ($_POST['departSelect'] == 'DublinDepart' && WarnerRobins.isSelected()){
			$mileage = 50;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		/*WarnerRobins*/
		elseif ($_POST['departSelect'] == 'WarnerRobinsDepart' && $_POST['destinationSelect'] == 'JonesMaconArrive'){
			$mileage = 22;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		elseif ($_POST['departSelect'] == 'WarnerRobinsDepart' && $_POST['destinationSelect'] == 'SLCMaconArrive'){
			$mileage = 22;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		elseif ($_POST['departSelect'] == 'WarnerRobinsDepart' && $_POST['destinationSelect'] == 'AldermanCochranArrive') {
			$mileage = 30;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'WarnerRobinsDepart' &&$_POST['destinationSelect'] == 'MemorialCochranArrive') {
			$mileage = 30;
			$roi = $mileage * $rate;
			//echo $roi;
		}
		elseif ($_POST['departSelect'] == 'WarnerRobinsDepart' && $_POST['destinationSelect'] == 'EastmanArrive'){
			$mileage = 50;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		elseif ($_POST['departSelect'] == 'WarnerRobinsDepart' && $_POST['destinationSelect'] == 'DublinArrive'){
			$mileage = 50;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		elseif ($_POST['departSelect'] == 'WarnerRobinsDepart' && $_POST['destinationSelect'] == 'WarnerRobinsArrive'){
			$mileage = 0;
			$roi = $mileage * $rate;
			//echo $roi;

		}
		else{
			echo "Please choose a starting location and an ending location";
		}
			
	}
?>