<?php 
// Include the database connection file
require_once(LIB_PATH . DS . 'database.php');

class ServiceProvider {
	
	// Define the table name as a static property
	protected static $tbl_name = "tblserviceprovider";
	
	// Method to get the fields of the table
	function db_fields() {
		global $mydb;
		return $mydb->getFieldsOnOneTable(self::$tbl_name);
	}
	
	// Method to find all service providers with a specific service name
	function find_all_provider($code = "") {
		global $mydb;
		// Set the query to select all records with the specified service name
		$mydb->setQuery("SELECT * 
						 FROM " . self::$tbl_name . " 
						 WHERE `ServiceName` = '{$code}'");
		$cur = $mydb->executeQuery();
		// Get the number of rows returned
		$row_count = $mydb->num_rows($cur);
		return $row_count;
	}

	// Method to get a list of all service providers
	function listOfprovider() {
		global $mydb;
		// Set the query to select all records from the table
		$mydb->setQuery("SELECT * 
						 FROM " . self::$tbl_name);
		$cur = $mydb->loadResultList();
		return $cur;
	}

	// Method to get a single service provider by ID
	function single_provider($id = 0) {
		global $mydb;
		// Set the query to select a single record with the specified ID
		$mydb->setQuery("SELECT * FROM " . self::$tbl_name . " WHERE ServiceID = {$id} LIMIT 1");
		$cur = $mydb->loadSingleResult();
		return $cur;
	}

	// Method to authenticate a service provider by username and password
	static function spAuthentication($email, $h_pass) {
		global $mydb;
		// Set the query to select a record with the specified username and password
		$mydb->setQuery("SELECT * FROM `tblserviceprovider` WHERE `spUsername` = '". $email ."' and `spPassword` = '". $h_pass ."'");
		$cur = $mydb->executeQuery();
		if ($cur == false) {
			die(mysql_error());
		}
		// Get the number of rows returned
		$row_count = $mydb->num_rows($cur);
		if ($row_count == 1) {
			// Load the result into a session if authentication is successful
			$user_found = $mydb->loadSingleResult();
			$_SESSION['ServiceID'] = $user_found->ServiceID;
			$_SESSION['ServiceName'] = $user_found->ServiceName;
			$_SESSION['ServiceContact'] = $user_found->ServiceContact;
			$_SESSION['ServiceAddress'] = $user_found->ServiceAddress;
			$_SESSION['spUsername'] = $user_found->spUsername;
			$_SESSION['lat'] = $user_found->lat;
			$_SESSION['lng'] = $user_found->lng;
			return true;
		} else {
			return false;
		}
	}

	// Method to instantiate an object dynamically from a record
	static function instantiate($record) {
		$object = new self;

		// Assign values to the object properties based on the record
		foreach ($record as $attribute => $value) {
			if ($object->has_attribute($attribute)) {
				$object->$attribute = $value;
			}
		}
		return $object;
	}
	
	// Method to check if an attribute exists
	private function has_attribute($attribute) {
		// Check if the attribute key exists in the attributes array
		return array_key_exists($attribute, $this->attributes());
	}

	// Method to get the object's attributes
	protected function attributes() { 
		global $mydb;
		$attributes = array();
		// Iterate over the database fields and add them to the attributes array if they exist as properties
		foreach ($this->db_fields() as $field) {
			if (property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}
	
	// Method to get sanitized attributes
	protected function sanitized_attributes() {
		global $mydb;
		$clean_attributes = array();
		// Sanitize each attribute value to prevent SQL injection
		foreach ($this->attributes() as $key => $value) {
			$clean_attributes[$key] = $mydb->escape_value($value);
		}
		return $clean_attributes;
	}
	
	// Method to save the object to the database
	public function save() {
		// Determine whether to create a new record or update an existing one
		return isset($this->id) ? $this->update() : $this->create();
	}
	
	// Method to create a new record in the database
	public function create() {
		global $mydb;
		$attributes = $this->sanitized_attributes();
		// Construct the SQL query for inserting a new record
		$sql = "INSERT INTO " . self::$tbl_name . " (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		echo $mydb->setQuery($sql);
		
		// Execute the query and check for success
		if ($mydb->executeQuery()) {
			$this->id = $mydb->insert_id(); // Get the last inserted ID
			return true;
		} else {
			return false;
		}
	}

	// Method to update an existing record in the database
	public function update($id = 0) {
		global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		// Construct the key-value pairs for the update query
		foreach ($attributes as $key => $value) {
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		// Construct the SQL query for updating the record
		$sql = "UPDATE " . self::$tbl_name . " SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE ServiceID=" . $id;
		$mydb->setQuery($sql);
		
		// Execute the query and check for success
		if (!$mydb->executeQuery()) return false;
	}

	// Method to delete a record from the database
	public function delete($id = 0) {
		global $mydb;
		// Construct the SQL query for deleting the record
		$sql = "DELETE FROM " . self::$tbl_name;
		$sql .= " WHERE ServiceID=" . $id;
		$sql .= " LIMIT 1 ";
		$mydb->setQuery($sql);
		
		// Execute the query and check for success
		if (!$mydb->executeQuery()) return false;
	}
}
?>
