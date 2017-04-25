For MGA KnightRiders'

Bug List
Registration verification is currently a placebo, the email for verification is sent out does not perform true authentication, and token authentication, or some other method should be inputted. Users can currently click “register” and immediately access the site.

Passwords are stored in the database as plaintext, and can be viewed by anyone with access to the database.

Delete method on the driver page needs to be updated; possibly repositioned, so that a page refresh is not needed for deletion verification.

Edit method on the driver/passenger page is non-functional.

Passenger and Driver pages both need a visual overhaul. Tables aren’t resized dynamically enough to properly display the information on the tables, and are prone to pushing into other parts of the table.

On some pages, the container does not seem to stretch far enough down.

Driver and Passenger pages display all text from the raw data in the database. 

Profile Page:
	FOREWORD:
		The Profile page requires three documents to function correctly: profile.php, ajaxValidation.php, ajaxValidation.js.
		Due to learning at the last minute that file uploads (for the profile pictures) would not be allowed, a hasty decision was made to attempt to use a BLOB type approach.
		The profileBlob.php document is meant to replace profile.php, and as such, it is the most current version of the page.
	BUGS:
		The change password form does not hash passwords (they are stored as plaintext).
		The BLOB type storage and recall for the profile pictures turned out to be more complicated than expected, and is not currently working. (The file upload version works, and is available in profile.php)
		Prepared statements are not utilized.

Recommendations:

Truncate the databases.
Create a “Forgot Password” feature.

