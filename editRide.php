
<!-- EDIT TRIP FORM -->	  
	<div id="editTripModal" class="modal fade" role="dialog">
        <div class="modal-dialog modalDriver">
          <div class="modal-content">
            <div class="modal-header" id="newTripModalHeader">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

              <h1 class="text-center">Trip Details:</h1><br>
              <form id="newTripForm" action="driver.php" method="post">
                <div class="row">
                  <div class="col-sm-4 col-xs-2"></div>
                  <div class="col-sm-4 col-xs-8">
                    <div>
                        <p class="text-center"> Please click Schedule Trip when finished.</p>
                        <br> 
                    </div>
                    <div>
					<?php
					require ('mysqli_connect.php');
						echo $vehicle;
						$query =   "SELECT users.first_name,users.last_name,ride.trip_date, ride.trip_time,ride.trip_repeat, ride.repeat_day, ride.location_start, ride.location_end,vehicle.vehicle_year,vehicle.vehicle_make,vehicle.vehicle_model,vehicle.seats_total, vehicle.smoke_description,vehicle.package_able,ride.roi
						FROM ride INNER JOIN vehicle ON vehicle.vehicle_id=ride.vehicle_id INNER JOIN users ON ride.user_id = users.user_id WHERE vehicle.vehicle_id = $vehicle ";
	
						
						$result = mysqli_query($conn, $query);
						if (mysqli_num_rows($result)>0)
							{															
								while ($row = mysqli_fetch_assoc($result)){
								
						?>
                      <div class="text-center">Departure Date &amp; Time</div>
                      <input id="newTripDate" type="date" class="form-control" name="newTripDateInput" value ="<?php echo $row['trip_date']?>" required>
                      <input id="newDepartTime" type="time" class="form-control" name="tripdeparttime" value ="<?php echo $row['trip_time']?>" required>
<!--                       <div class="input-group bootstrap-timepicker timepicker">
                        <input id="newTripTime" type="text" class="form-control" name="newTripLnameInput" required> -->
                      </div><br>
	
                      <div class="text-center">
                        <div>Is this a repeat trip?</div>
                        <label class="radio-inline">
					
                          <input id="newTripRepeatBooleanYes" type="radio" value="yes"<?php if ($row['trip_repeat'] == 'yes'){echo "checked";} ?> name="oneOrRepeatTrip">
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripRepeatBooleanNo" type="radio" value="no"<?php if ($row['trip_repeat'] == 'no'){echo "checked";} ?> name="oneOrRepeatTrip" >
                          No
                        </label>
						
                      </div>

                      <div class="repeatTripFromTo">
                        <select class="selectpicker orangeDropdown form-control" data-width="100%" name ="repeatTripFromTo">
                          <option selected disabled >Repeats On:</option>
						  <option value="none" hidden <?php if ($row['repeat_day'] == 'none'){echo "selected";} ?>></option> <!-- necessary to display none and act as a default -->			  		  
                          <option value="Sundays"  <?php if ($row['repeat_day'] == 'Sundays'){echo "selected";} ?>>Sundays</option>
                          <option value="Mondays" <?php if ($row['repeat_day'] == 'Mondays'){echo "selected";} ?>>Mondays</option>
                          <option value="Tuesdays" <?php if ($row['repeat_day'] == 'Tuesdays'){echo "selected";} ?>>Tuesdays</option>
                          <option value="Wednesdays" <?php if ($row['repeat_day'] == 'Wednesdays'){echo "selected";} ?>>Wednesdays</option>
                          <option value="Thursdays" <?php if ($row['repeat_day'] == 'Thursdays'){echo "selected";} ?>>Thursdays</option>
                          <option value="Fridays" <?php if ($row['repeat_day'] == 'Fridays'){echo "selected";} ?>>Fridays</option>
                          <option value="Saturdays" <?php if ($row['repeat_day'] == 'Saturdays'){echo "selected";} ?>>Saturdays</option>
                        </select>
                        <div class="text-center">End Date</div>
                        <input id="newTripRepeatDate" type="date" class="form-control" name="newTripDateInputRepeat">
                      </div>

                      <br>
                      <select class="selectpicker orangeDropdown form-control" data-width="100%" name = "departSelect">
                        <option selected="selected" value="none">Departing From:</option>
                        <option value="AldermanCochranDepart"<?php if ($row['location_start'] == 'AldermanCochranDepart'){echo "selected";} ?>>Alderman, Cochran</option>
                        <option value="MemorialCochranDepart"<?php if ($row['location_start'] == 'MemorialCochranDepart'){echo "selected";} ?>>Memorial Hall, Cochran</option>
                        <option value="DublinDepart"<?php if ($row['location_start'] == 'DublinDepart'){echo "selected";} ?>>Dublin Center Annex Building, Dublin</option>
                        <option value="EastmanDepart"<?php if ($row['location_start'] == 'EastmanDepart'){echo "selected";} ?>>Corporate Hangar, Eastman</option>
                        <option value="JonesMaconDepart"<?php if ($row['location_start'] == 'JonesMaconDepart'){echo "selected";} ?>>Charles H. Jones Building, Macon</option>
                        <option value="SLCMaconDepart"<?php if ($row['location_start'] == 'SLCMaconDepart'){echo "selected";} ?>>Student Life Center, Macon</option>
                        <option value="WarnerRobinsDepart"<?php if ($row['location_start'] == 'WarnerRobinsDepart'){echo "selected";} ?>>Oak Hall, Warner Robins</option>
                      </select>
                      <select class="selectpicker orangeDropdown form-control" data-width="100%" name = "destinationSelect">
                        <option selected="selected" value = "none">Destination:</option>
                        <option value="AldermanCochranArrive"<?php if ($row['location_end'] == 'AldermanCochranArrive'){echo "selected";} ?>>Alderman, Cochran</option>
                        <option value="MemorialCochranArrive"<?php if ($row['location_end'] == 'MemorialCochranArrive'){echo "selected";} ?>>Memorial Hall, Cochran</option>
                        <option value="DublinArrive"<?php if ($row['location_end'] == 'DublinArrive'){echo "selected";} ?>>Dublin Center Annex Building, Dublin</option>
                        <option value="EastmanArrive"<?php if ($row['location_end'] == 'none'){echo "selected";} ?>>Corporate Hangar, Eastman</option>
                        <option value="JonesMaconArrive"<?php if ($row['location_end'] == 'EastmanArrive'){echo "selected";} ?>>Charles H. Jones Building, Macon</option>
                        <option value="SLCMaconArrive"<?php if ($row['location_end'] == 'SLCMaconArrive'){echo "selected";} ?>>student Life Center, Macon</option>
                        <option value="WarnerRobinsArrive"<?php if ($row['location_end'] == 'WarnerRobinsArrive'){echo "selected";} ?>>Oak Hall, Warner Robins</option>
                      </select><br><br>
                      
                      <input id="driverCarYear" type="text" class="form-control" name="driverCarYear" placeholder="Car Year" value ="<?php echo $row['vehicle_year']?>" required>
                      <input id="driverCarMake" type="text" class="form-control" name="driverCarMake" placeholder="Car Make" value ="<?php echo $row['vehicle_make']?>"required>
                      <input id="driverCarModel" type="text" class="form-control" name="driverCarModel" placeholder="Car Model" value="<?php echo $row['vehicle_model']?>" required><br>

                      <select class="selectpicker orangeDropdown form-control" data-width="100%" name = "seatSelect">
                        <option selected disabled>Number of Seats:</option>
                        <option value="1"<?php if ($row['seats_total'] == '1'){echo "selected";} ?>>1</option>
                        <option value="2"<?php if ($row['seats_total'] == '2'){echo "selected";} ?>>2</option>
                        <option value="3"<?php if ($row['seats_total'] == '3'){echo "selected";} ?>>3</option>
                        <option value="4"<?php if ($row['seats_total'] == '4'){echo "selected";} ?>>4</option>
                        <option value="5"<?php if ($row['seats_total'] == '5'){echo "selected";} ?>>5</option>
                        <option value="6"<?php if ($row['seats_total'] == '6'){echo "selected";} ?>>6</option>
                        <option value="7"<?php if ($row['seats_total'] == '7'){echo "selected";} ?>>7</option>
                        <option value="8"<?php if ($row['seats_total'] == '8'){echo "selected";} ?>>8</option>
                      </select><br>

                      <div class="text-center"><br>
                        <div>Is your vehicle<br>smoke-free?</div>
                        <label class="radio-inline">
                          <input id="newTripSmokeFreeBooleanYes" type="radio" name="smokeFreeYesOrNo" value="yes" <?php if ($row['smoke_description'] == 'yes'){echo "checked";} ?>>
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripSmokeFreeBooleanNo" type="radio" name="smokeFreeYesOrNo" value="no"<?php if ($row['smoke_description'] == 'no'){echo "checked";} ?>>
                          No
                        </label>
                      </div><br>

                      <div class="text-center">
                        <div>Are you willing<br>to deliver a package?</div>
                        <label class="radio-inline">
                          <input id="newTripPackageBooleanYes" type="radio" name="packageYesOrNo" value="yes"<?php if ($row['package_able'] == 'yes'){echo "checked";} ?>>
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripPackageBooleanNo" type="radio" name="packageYesOrNo" value="no" <?php if ($row['package_able'] == 'no'){echo "checked";} ?>>
                          No
                        </label><br><br>
                      </div>

                      <div class="packageNotice">
                        <p class="text-center textbold">
                          Please note all packages must be smaller than a<br>10&quot; x 13&quot; envelope
                        </p>
                      </div>

                      <div class="text-center">
                        <div>Would you like to leave a note for potential passengers?</div>
                        <label class="radio-inline">
                          <input id="newTripMessageBooleanYes" type="radio" name="messageYesOrNo" value="yes"<?php if ($row['smoke_description'] == 'yes'){echo "checked";} ?>>
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input id="newTripMessageBooleanNo" type="radio" name="messageYesOrNo" value="no"<?php if ($row['smoke_description'] == 'yes'){echo "checked";} ?>>
                          No
                        </label>
                      </div>

                      <div class="messageToPassengers">
                        <br>
                        <textarea class="form-control" rows="3" id="messageToPassengers" name = "messageToPassengers"value = "none">Leave your message here.</textarea>
                      </div>

                      <div class="text-center">
                        <br>
                        <input type="submit" class="btn btn-primary" name="submitNewTripButton" value="Schedule Trip">
						<?php }
							} ?>
                      </div><br>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
