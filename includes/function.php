<?php
	// Function to remove marked zeros from a date string
	function strip_zeros_from_date($marked_string="") {
		// First remove the marked zeros
		$no_zeros = str_replace('*0', '', $marked_string);
		// Remove any remaining marked zeros
		$cleaned_string = str_replace('*0', '', $no_zeros);
		return $cleaned_string;
	}

	// Function to redirect to a specified location
	function redirect_to($location = NULL) {
		if($location != NULL) {
			// Send an HTTP header to redirect to the specified location
			header("Location: {$location}");
			exit; // Ensure the script stops executing after the redirect
		}
	}

	// Function to redirect using JavaScript
	function redirect($location = NULL) {
		if($location != NULL) {
			echo "<script>
					window.location='{$location}';
				  </script>";
		} else {
			echo 'error location'; // Error message if no location is specified
		}
	}

	// Function to output a message wrapped in a paragraph tag with class "message"
	function output_message($message = "") {
		if(!empty($message)) {
			return "<p class=\"message\">{$message}</p>";
		} else {
			return ""; // Return an empty string if no message is provided
		}
	}

	// Function to convert a datetime string to a formatted text representation
	function date_toText($datetime = "") {
		$nicetime = strtotime($datetime); // Convert the datetime string to a Unix timestamp
		return strftime("%B %d, %Y at %I:%M %p", $nicetime); // Format the timestamp
	}

	// Function to autoload classes from the LIB_PATH directory
	function autoload_classes($class_name) {
		$class_name = strtolower($class_name); // Convert class name to lowercase
		$path = LIB_PATH . DS . "{$class_name}.php"; // Construct the file path
		if(file_exists($path)) {
			require_once($path); // Include the class file if it exists
		} else {
			die("The file {$class_name}.php could not be found."); // Display an error message if the file doesn't exist
		}
	}

	// Register the autoload function
	spl_autoload_register('autoload_classes');

	// Function to get the current page name for admin
	function currentpage_admin() {
		$this_page = $_SERVER['SCRIPT_NAME']; // Get the script name
		$bits = explode('/', $this_page); // Split the script name by '/'
		$this_page = $bits[count($bits)-1]; // Get the last part of the path (the script name)
		return $bits[4]; // Return the 5th part of the path (index 4)
	}

	// Function to get the current page name
	function curPageName() {
		// Extract the current page name from the REQUEST_URI
		return substr($_SERVER['REQUEST_URI'], 21, strrpos($_SERVER['REQUEST_URI'], '/')-24);
	}

	// Function to get the current page name (alternative)
	function currentpage() {
		$this_page = $_SERVER['SCRIPT_NAME']; // Get the script name
		$bits = explode('/', $this_page); // Split the script name by '/'
		$this_page = $bits[count($bits)-1]; // Get the last part of the path (the script name)
		return $bits[3]; // Return the 4th part of the path (index 3)
	}

	// Function to get the current sub-page name
	function subcurrentpage() {
		$this_page = $_SERVER['SCRIPT_NAME']; // Get the script name
		$bits = explode('/', $this_page); // Split the script name by '/'
		$this_page = $bits[count($bits)-1]; // Get the last part of the path (the script name)
		return $bits[4]; // Return the 5th part of the path (index 4)
	}

	// Function to get the current public page name
	function publiccurrentpage() {
		$this_page = $_SERVER['SCRIPT_NAME']; // Get the script name
		$bits = explode('/', $this_page); // Split the script name by '/'
		$this_page = $bits[count($bits)-1]; // Get the last part of the path (the script name)
		return $bits[2]; // Return the 3rd part of the path (index 2)
	}

	// Function to format a date string into a specified format
	function dateFormat($date = "", $format = "") {
		return date_format(date_create($date), $format); // Create a DateTime object and format it
	}
?>
