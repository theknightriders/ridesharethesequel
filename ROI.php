<?php
//Initialize variables
$roi = 0;
$mileage = 0;
$rate = 0.53;

//Determine Mileage
if (isset($_POST['departSelect']))
	{
		switch($_POST['departSelect']) //Select Departure
		{
			case 'Macon-Jones': //Depart Jones Building 
			{
				switch($_POST['destinationSelect']) //Select Arrival
				{
					case 'Macon-SLC':
						$mileage = 0;
						break;
						
					case 'Macon-Jones':
						$mileage = 0;
						break;
						
					case 'Cochran-Alderman':
						$mileage = 48;
						break;
					
					case 'Cochran-Memorial':
						$mileage = 48;
						break;
						
					case 'Dublin':
						$mileage = 60;
						break;
						
					case 'Eastman':
						$mileage = 68;
						break;
						
					case 'Warner Robins':
						$mileage = 22;
						break;
				}
				break;	
			}
			
			case 'Macon-SLC': //Depart Student Life Center
			{
				switch($_POST['destinationSelect'])
				{
					case 'Macon-SLC':
						$mileage = 0;
						break;
						
					case 'Macon-Jones':
						$mileage = 0;
						break;
						
					case 'Cochran-Alderman':
						$mileage = 48;
						break;
					
					case 'Cochran-Memorial':
						$mileage = 48;
						break;
						
					case 'Dublin':
						$mileage = 60;
						break;
						
					case 'Eastman':
						$mileage = 68;
						break;
						
					case 'Warner Robins':
						$mileage = 22;
						break;
				}
				break;	
			}
			
			case 'Cochran-Alderman': //Depart Alderman
			{
				switch($_POST['destinationSelect'])
				{
					case 'Macon-SLC':
						$mileage = 48;
						break;
						
					case 'Macon-Jones':
						$mileage = 48;
						break;
						
					case 'Cochran-Alderman':
						$mileage = 0;
						break;
					
					case 'Cochran-Memorial':
						$mileage = 0;
						break;
						
					case 'Dublin':
						$mileage = 32;
						break;
						
					case 'Eastman':
						$mileage = 20;
						break;
						
					case 'Warner Robins':
						$mileage = 30;
						break;
				}
				break;
			}
			
			case 'Cochran-Memorial': //Depart Memorial
			{
				switch($_POST['destinationSelect'])
				{
					case 'Macon-SLC':
						$mileage = 48;
						break;
						
					case 'Macon-Jones':
						$mileage = 48;
						break;
						
					case 'Cochran-Alderman':
						$mileage = 0;
						break;
					
					case 'Cochran-Memorial':
						$mileage = 0;
						break;
						
					case 'Dublin':
						$mileage = 32;
						break;
						
					case 'Eastman':
						$mileage = 20;
						break;
						
					case 'Warner Robins':
						$mileage = 30;
						break;
				}
				break;
			}
			
			case 'Dublin': //Depart Dublin
			{
				switch($_POST['destinationSelect'])
				{
					case 'Macon-SLC':
						$mileage = 60;
						break;
						
					case 'Macon-Jones':
						$mileage = 60;
						break;
						
					case 'Cochran-Alderman':
						$mileage = 32;
						break;
					
					case 'Cochran-Memorial':
						$mileage = 30;
						break;
						
					case 'Dublin':
						$mileage = 0;
						break;
						
					case 'Eastman':
						$mileage = 34;
						break;
						
					case 'Warner Robins':
						$mileage = 50;
						break;
				}
				break;
			}
			
			case 'Eastman': //Depart Eastman
			{
				switch($_POST['destinationSelect'])
				{
					case 'Macon-SLC':
						$mileage = 68;
						break;
						
					case 'Macon-Jones':
						$mileage = 68;
						break;
						
					case 'Cochran-Alderman':
						$mileage = 20;
						break;
					
					case 'Cochran-Memorial':
						$mileage = 20;
						break;
						
					case 'Dublin':
						$mileage = 34;
						break;
						
					case 'Eastman':
						$mileage = 0;
						break;
						
					case 'Warner Robins':
						$mileage = 50;
						break;
				}
				break;
			}
			
			case 'Warner Robins': //Depart Warner Robins
			{
				switch($_POST['destinationSelect'])
				{
					case 'Macon-SLC':
						$mileage = 32;
						break;
						
					case 'Macon-Jones':
						$mileage = 32;
						break;
						
					case 'Cochran-Alderman':
						$mileage = 20;
						break;
					
					case 'Cochran-Memorial':
						$mileage = 20;
						break;
						
					case 'Dublin':
						$mileage = 50;
						break;
						
					case 'Eastman':
						$mileage = 50;
						break;
						
					case 'Warner Robins':
						$mileage = 0;
						break;
				}
				break;
			}
		}
		//Calculate ROI
		$roi = $mileage * $rate;
		//echo $roi; //Test Purposes Only
	}
else
	{
		echo "Please choose a starting location and an ending location";
	}
?>