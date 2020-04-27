<?php
$db = new mysqli("localhost", "root", "123", "nacoss");

///*CLASS FOR VALIDATING USER INPUT*/
class DataValidation{
	private $link;
	public function emptyCheck(){
		$args = func_get_args();
		
		if(empty($args))
			return false;
			
		foreach($args as $arg){
			if(empty($arg))
			{
				return false;
			}
		}
		return true;
	}
	
	public function validate($value)
	{
		 $link = mysqli_connect("localhost", "root", "123", "nacoss");
		 $value = trim($value);
		 $value = stripslashes($value);
		 $value = htmlspecialchars($value);
		 $value = mysqli_real_escape_string($link, $value);
		 mysqli_close($link);
		 return $value;	 
	}
}
?>