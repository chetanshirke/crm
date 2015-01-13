<?php
class Database {
//
	var $_DB;
	var $_dbName;
	var $_dbHost;
	var $_dbUser;
	var $_dbPass;
	var $_lastHandle=false;

	// Constructor /////////
	function Database($DB='mysql', $dbHost=false, $dbName=false, $dbUser=false, $dbPass=false) {
		$this->_DB = $DB?$DB:'mysql';
		$this->_dbName = $dbName?$dbName:$GLOBALS['dbName'];
		$this->_dbHost = $dbHost?$dbHost:$GLOBALS['dbHost'];
		$this->_dbUser = $dbUser?$dbUser:$GLOBALS['dbUser'];
		$this->_dbPass = $dbPass?$dbPass:$GLOBALS['dbPass'];
		switch ($this->_DB) {
		case 'mysql':
			@mysql_connect($this->_dbHost, $this->_dbUser, $this->_dbPass)
 				or die("Database connection error!");
			@mysql_select_db($this->_dbName)
 				or die("Could not locate database!");
 			break;
 		default: die("Database system unknown!");
		}
	}

	// Performs a generic SQL query.
	function Query($query) {
	
		switch ($this->_DB) {
			case 'mysql':
				@mysql_query("SET NAMES 'latin1'");
				$handle = mysql_query($query);
				break;
		}
		$this->_lastHandle = $handle;
		return $handle;
	}

	// Gets next row of a query. Returns false when finished.
	function GetRow($handle=false) {
		if ($handle) $handle = $this->_lastHandle;
		switch ($this->_DB) {
			case 'mysql':
				$row = mysql_fetch_assoc($handle);
				break;
		}
		return $row;
	}

	// Returns the database error for a specific query
	function Error($handle=false) {
		switch ($this->_DB) {
			case 'mysql':
				$err = ($handle)?mysql_error($handle):mysql_error();
				break;
		}
		return $err;
	}

	// Returns the database error # for a specific query
	function ErrorNo($handle=false) {
		switch ($this->_DB) {
			case 'mysql':
				$err_no = ($handle)?mysql_errno($handle):mysql_errno();
				break;
		}
		return $err_no;
	}

	// Returns all the info from a query
	function GetAllRows($handle=false) {
		if ($handle) $handle = $this->_lastHandle;
		$ret = array();
		switch ($this->_DB) {
			case 'mysql':
				while ($row = mysql_fetch_assoc($handle)) {
					$ret[] = $row;
				}
				break;
		}
		return $ret;
	}
	
	
	// Inserts a row into database
	function Insert($data, $table) {
		$names = "";
		$values = "";
		foreach ($data as $name=>$value) {
			$names .= "`$name`, ";
			$values .= "'".addslashes($value)."', ";
		}
		$names = substr($names, 0, strlen($names)-2);
		$values = substr($values, 0, strlen($values)-2);
		$query = "INSERT INTO `$table` ($names) VALUES ($values)";
//print $query."<br>";
		return $this->Query($query);
	}

	// Updates the database
	function Update($data, $table, $conditions=false) {
		$query = "UPDATE `$table` SET ";
		foreach ($data as $name=>$value) {
			$query .= "`$name` = '".addslashes($value)."', ";
		}
		$query = substr($query, 0, strlen($query)-2);
		if ($conditions) $query .= " WHERE $conditions";
//print $query."<br>";
		return $this->Query($query);
	}

	// Delete from the database
	function Delete($table, $conditions=false) {
			$query = "DELETE FROM `$table`";
			if ($conditions) $query .= " WHERE $conditions";
			return $this->Query($query);
	}

	function Free($res)
	{
		if ($res) {
			mysql_free_result($res);
		}
	}

	function Nrows($res)
	{
		$numrows=mysql_num_rows($res);
		return $numrows;
	}


	function Maxid($lookid,$table)
	{
		$query="select max($lookid) from `$table`";
		$res=$this->Query($query);
		list($lastid)=mysql_fetch_row($res);
		$this->Free($res);
		$lastid=$lastid+1;
		return $lastid;
	}

	function LastInsert($table)
	{
		$query="select LAST_INSERT_ID() from `$table`";
		$res=$this->Query($query);
		list($lastid)=mysql_fetch_row($res);
		$this->Free($res);
		$lastid=$lastid+1;
		return $lastid;
	}

	function LastInsert2($table)
	{
		$query="select LAST_INSERT_ID() from `$table`";
		$res=$this->Query($query);
		list($lastid)=mysql_fetch_row($res);
		$this->Free($res);
		$lastid=$lastid;
		return $lastid;
	}
	
	function get_data($table,$fields = "*", $conditions=" 1 ")
	{
		$result = array();

	 	$sql = "select $fields from $table where $conditions ";
		$res = $this->query($sql);
		if(mysql_num_rows($res) <= 0)
		{
			return false;
		}
		else
		{
			while( $row = mysql_fetch_assoc($res))
			{
				$result[]=array_map("stripslashes",$row);
			}
		}
		return $result;
	}
	
	function myArray($sql)
	{
		@mysql_query("SET NAMES 'latin1'");
		if($result = mysql_query($sql))
		{
			while($record = mysql_fetch_assoc($result))
			{
				$result_arr[] = $record;
			}
			return $result_arr;
		}else
		{
			echo mysql_error();
			exit;
		}
	}
	
	
	function selectQuery($tbTable,$tbFields,$tbCondition="",$tbShowQuery="")
	{
		$result_arr = array();
		if($tbCondition != "")
		{
			$sql = "SELECT ".$tbFields." From ".$tbTable." WHERE ".$tbCondition."";
			
		}else
		{
			$sql = "SELECT ".$tbFields." From ".$tbTable."";
		}	
		if($tbShowQuery==1)
		{
			return $sql;
		}
		$result = $this->Query($sql);
		while($record = mysql_fetch_assoc($result))
		{
			$result_arr[] = $record;
		}
		return $result_arr;
	}
 }
?>