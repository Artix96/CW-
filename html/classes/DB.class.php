&lt;?php

class DB {
	
	protected $db_name = 'DB';
	protected $db_user = 'root';
	protected $db_pass = 'Fakinhatem96';
	protected $db_host = 'http://ec2-52-18-157-0.eu-west-1.compute.amazonaws.com';
	
	public function connect() {
		$connection = mysql_connect($this-&gt;db_host, $this-&gt;db_user, $this-&gt;db_pass);
		mysql_select_db($this-&gt;db_name);
		
		return true;
	}
	
	public function processRowSet($rowSet, $singleRow=false)
	{
		$resultArray = array();
		while($row = mysql_fetch_assoc($rowSet))
		{
			array_push($resultArray, $row);
		}
		
		if($singleRow == true)
			return $resultArray[0];
		
		return $resultArray;
	}
	
	public function select($table, $where){
		$sql = "SELECT * FROM $table WHERE $where";
		$result = mysql_query($sql);
		if(mysql_num_rows($result) == 1)
			return $this-&gt;processRowSet($result,true);
		
		return $this-&gt;processRowSet($result);
	}
	
	public function update($sdata, $table, $where){
		foreach ($sdata as $column =&gt; $value){
			$sql = "UPDATE $table SET $column = $value WHERE $where";
			mysql_quert($sql) or die(mysql_error());
		}
		return true;
	}
	
	public function insert($data, $table) {
		$columns = "";
		$values = "";
		
		foreach ($data as column =&gt; $value) {
			$columns .= ($columns == "") ? "" : ", ";
			$columns .= $column;
			$values .= ($values == "") ? "" : ", ";
			$values .=$value;
		}
		
		$sql = "insert intp $table ($columns) values ($values)";
		
		mysql_query($sql) or die(mysql_error());
		
		return mysql_insert_id();
	}
}

?&gt;