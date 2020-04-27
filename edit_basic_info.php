<?php
session_start();
require("includes/connect.inc.php");
require("includes/classes.inc.php");

if(!isset($_SESSION['logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$fullname= $email= $phone= $maritalStatus= $dob_day= $dob_month= $dob_year= $nationality= $placeOfBirth= $languages= $state= "";
$nextOfKin= $nextOfKinAddress= $localGovernment= $address= $hobbies= "";

$response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data_check = new DataValidation();
	
	$fullname = $data_check->validate($_POST['name']);
	$email = $data_check->validate($_POST['email']);
	$phone = $data_check->validate($_POST['phone']);
	$maritalStatus = $data_check->validate($_POST['maritalStatus']);
	$dob_day = $data_check->validate($_POST['dob_day']);
	$dob_month = $data_check->validate($_POST['dob_month']);
	$dob_year = $data_check->validate($_POST['dob_year']);
	$nationality = $data_check->validate($_POST['nationality']);
	$placeOfBirth = $data_check->validate($_POST['pob']);
	$languages = $data_check->validate($_POST['languages']);
	$state = $data_check->validate($_POST['state']);
	$nextOfKin = $data_check->validate($_POST['next']);
	$nextOfKinAddress = $data_check->validate($_POST['nextAddress']);
	$localGovernment = $data_check->validate($_POST['local']);
	$address = $data_check->validate($_POST['home']);
	$hobbies = $data_check->validate($_POST['hobbies']);
	
	if($data_check->emptyCheck($fullname, $email)){
		if($db->query("UPDATE users SET fullname='$fullname', phone='$phone', email='$email', maritalStatus='$maritalStatus', dob_day='$dob_day', dob_month='$dob_month', dob_year='$dob_year', nationality='$nationality', placeOfBirth='$placeOfBirth', languages='$languages', state='$state', nextOfKin='$nextOfKin', nextOfKinAddress='$nextOfKinAddress', localGovernment='$localGovernment', homeAddress='$address', hobbies='$hobbies' WHERE username='$user'")){
			$response = "<div class=\"w3-panel w3-green w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> Updated Successfully</h6>
						</div>";
		}else{
			$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> System unable to update information</h6>
						</div>";
		}
	}else{
		$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
						<h6><i class=\"fa fa-times\"></i> Name and email cannot be left empty</h6>
					</div>";
	}
	
}

$query = $db->query("SELECT * FROM users WHERE username='$user'");
$row = $query->fetch_array();

?>
<!DOCTYPE html>
<html>
<title>Edit Basic Information</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/account_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
<h1>Edit Your Basic Information</h1>
<?php echo $response; ?>
	<div class="w3-section w3-twothird">
	<form action="" method="POST">
		<div class="w3-section">      
			<input class="w3-input" type="text" name="name" placeholder="Full Name" value="<?php echo $row['fullname']; ?>" >
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="phone" placeholder="Phone Number" value="<?php echo $row['phone']; ?>" >
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="email" name="email" placeholder="Email Address" value="<?php echo $row['email']; ?>" >
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="home" placeholder="Home Address" value="<?php echo $row['homeAddress']; ?>" >
		</div>
		<div class="w3-section">      
			<select class="w3-select" name="maritalStatus">
				<option value="">Marital Status</option>	
				<option value='Single' <?php echo $row['maritalStatus'] == "Single"?"selected":""; ?> >Single</option>
				<option value='Married' <?php echo $row['maritalStatus'] == "Married"?"selected":""; ?> >Married</option>
			</select>
		</div>
		<div class="w3-section">   
			<label>Date of Birth</label>
			<select name="dob_day" id="in">
					<option value="">Day</option>
					<option value="1" <?php echo $row['dob_day'] == "1"?"selected":"";  ?>>1</option>
					<option value="2" <?php echo $row['dob_day'] == "2"?"selected":"";  ?>>2</option>
					<option value="3" <?php echo $row['dob_day'] == "3"?"selected":"";  ?>>3</option>
					<option value="4" <?php echo $row['dob_day'] == "4"?"selected":"";  ?>>4</option>
					<option value="5" <?php echo $row['dob_day'] == "5"?"selected":"";  ?>>5</option>
					<option value="6" <?php echo $row['dob_day'] == "6"?"selected":"";  ?>>6</option>
					<option value="7" <?php echo $row['dob_day'] == "7"?"selected":"";  ?>>7</option>
					<option value="8" <?php echo $row['dob_day'] == "8"?"selected":"";  ?>>8</option> 
					<option value="9" <?php echo $row['dob_day'] == "9"?"selected":"";  ?>>9</option>
					<option value="10" <?php echo $row['dob_day'] == "10"?"selected":"";  ?>>10</option>
					<option value="11" <?php echo $row['dob_day'] == "11"?"selected":"";  ?>>11</option>
					<option value="12" <?php echo $row['dob_day'] == "12"?"selected":"";  ?>>12</option>
					<option value="13" <?php echo $row['dob_day'] == "13"?"selected":"";  ?>>13</option>
					<option value="14" <?php echo $row['dob_day'] == "14"?"selected":"";  ?>>14</option>
					<option value="15" <?php echo $row['dob_day'] == "15"?"selected":"";  ?>>15</option>
					<option value="16" <?php echo $row['dob_day'] == "16"?"selected":"";  ?>>16</option>
					<option value="17" <?php echo $row['dob_day'] == "17"?"selected":"";  ?>>17</option>
					<option value="18" <?php echo $row['dob_day'] == "18"?"selected":"";  ?>>18</option>
					<option value="19" <?php echo $row['dob_day'] == "19"?"selected":"";  ?>>19</option>
					<option value="20" <?php echo $row['dob_day'] == "20"?"selected":"";  ?>>20</option>
					<option value="21" <?php echo $row['dob_day'] == "21"?"selected":"";  ?>>21</option>
					<option value="22" <?php echo $row['dob_day'] == "22"?"selected":"";  ?>>22</option>
					<option value="23" <?php echo $row['dob_day'] == "23"?"selected":"";  ?>>23</option>
					<option value="24" <?php echo $row['dob_day'] == "24"?"selected":"";  ?>>24</option>
					<option value="25" <?php echo $row['dob_day'] == "25"?"selected":"";  ?>>25</option>
					<option value="26" <?php echo $row['dob_day'] == "26"?"selected":"";  ?>>26</option>
					<option value="27" <?php echo $row['dob_day'] == "27"?"selected":"";  ?>>27</option>
					<option value="28" <?php echo $row['dob_day'] == "28"?"selected":"";  ?>>28</option>
					<option value="29" <?php echo $row['dob_day'] == "29"?"selected":"";  ?>>29</option>
					<option value="30" <?php echo $row['dob_day'] == "30"?"selected":"";  ?>>30</option>
					<option value="31" <?php echo $row['dob_day'] == "31"?"selected":"";  ?>>31</option>
					</select> 
					
					<select name="dob_month" id="in">
					<option value=''>Month</option>
					<option value='January' <?php echo $row['dob_month'] == "January"?"selected":""; ?>>January</option>
					<option Value='February' <?php echo $row['dob_month'] == "February"?"selected":""; ?>>February</option>
					<option value='March' <?php echo $row['dob_month'] == "March"?"selected":""; ?>>March</option>
					<option value='April' <?php echo $row['dob_month'] == "April"?"selected":""; ?>>April</option>
					<option value='May' <?php echo $row['dob_month'] == "May"?"selected":""; ?>>May</Option>
					<option value='June' <?php echo $row['dob_month'] == "June"?"selected":""; ?>>June</option>
					<option value='July' <?php echo $row['dob_month'] == "July"?"selected":""; ?>>July</option>
					<Option value='August' <?php echo $row['dob_month'] == "August"?"selected":""; ?>>August</option>
					<option value='September' <?php echo $row['dob_month'] == "September"?"selected":""; ?>>September</option>
					<option value='October' <?php echo $row['dob_month'] == "October"?"selected":""; ?>>October</option>
					<option value='November' <?php echo $row['dob_month'] == "November"?"selected":""; ?>>November</option>
					<option value='December' <?php echo $row['dob_month'] == "December"?"selected":""; ?>>December</option>
					</select> 
					
					<select name="dob_year" id="in">
					<option value="">Year</option>
					<option value="1950" <?php echo $row['dob_year'] == "1950"?"selected":""; ?>>1950</option>
					<option value="1951" <?php echo $row['dob_year'] == "1951"?"selected":""; ?>>1951</option>
					<option value="1952" <?php echo $row['dob_year'] == "1952"?"selected":""; ?>>1952</option>
					<option value="1953" <?php echo $row['dob_year'] == "1953"?"selected":""; ?>>1953</option>
					<option value="1954" <?php echo $row['dob_year'] == "1954"?"selected":""; ?>>1954</option>
					<option value="1955" <?php echo $row['dob_year'] == "1955"?"selected":""; ?>>1955</option>
					<option value="1956" <?php echo $row['dob_year'] == "1956"?"selected":""; ?>>1956</option>
					<option value="1957" <?php echo $row['dob_year'] == "1957"?"selected":""; ?>>1957</option>
					<option value="1958" <?php echo $row['dob_year'] == "1958"?"selected":""; ?>>1958</option>
					<option value="1959" <?php echo $row['dob_year'] == "1959"?"selected":""; ?>>1959</option>
					<option value="1960" <?php echo $row['dob_year'] == "1960"?"selected":""; ?>>1960</option>
					<option value="1961" <?php echo $row['dob_year'] == "1961"?"selected":""; ?>>1961</option>
					<option value="1962" <?php echo $row['dob_year'] == "1962"?"selected":""; ?>>1962</option>
					<option value="1963" <?php echo $row['dob_year'] == "1963"?"selected":""; ?>>1963</option>
					<option value="1964" <?php echo $row['dob_year'] == "1964"?"selected":""; ?>>1964</option>
					<option value="1965" <?php echo $row['dob_year'] == "1965"?"selected":""; ?>>1965</option>
					<option value="1966" <?php echo $row['dob_year'] == "1966"?"selected":""; ?>>1966</option>
					<option value="1967" <?php echo $row['dob_year'] == "1967"?"selected":""; ?>>1967</option>
					<option value="1968" <?php echo $row['dob_year'] == "1968"?"selected":""; ?>>1968</option>
					<option value="1969" <?php echo $row['dob_year'] == "1969"?"selected":""; ?>>1969</option>
					<option value="1970" <?php echo $row['dob_year'] == "1970"?"selected":""; ?>>1970</option>
					<option value="1971" <?php echo $row['dob_year'] == "1971"?"selected":""; ?>>1971</option>
					<option value="1972" <?php echo $row['dob_year'] == "1972"?"selected":""; ?>>1972</option>
					<option value="1973" <?php echo $row['dob_year'] == "1973"?"selected":""; ?>>1973</option>
					<option value="1974" <?php echo $row['dob_year'] == "1974"?"selected":""; ?>>1974</option>
					<option value="1975" <?php echo $row['dob_year'] == "1975"?"selected":""; ?>>1975</option>
					<option value="1976" <?php echo $row['dob_year'] == "1976"?"selected":""; ?>>1976</option>
					<option value="1977" <?php echo $row['dob_year'] == "1977"?"selected":""; ?>>1977</option>
					<option value="1978" <?php echo $row['dob_year'] == "1978"?"selected":""; ?>>1978</option>
					<option value="1979" <?php echo $row['dob_year'] == "1979"?"selected":""; ?>>1979</option>
					<option value="1980" <?php echo $row['dob_year'] == "1980"?"selected":""; ?>>1980</option>
					<option value="1981" <?php echo $row['dob_year'] == "1981"?"selected":""; ?>>1981</option>
					<option value="1982" <?php echo $row['dob_year'] == "1982"?"selected":""; ?>>1982</option>
					<option value="1983" <?php echo $row['dob_year'] == "1983"?"selected":""; ?>>1983</option>
					<option value="1984" <?php echo $row['dob_year'] == "1984"?"selected":""; ?>>1984</option>
					<option value="1985" <?php echo $row['dob_year'] == "1985"?"selected":""; ?>>1985</option>
					<option value="1986" <?php echo $row['dob_year'] == "1986"?"selected":""; ?>>1986</option>
					<option value="1987" <?php echo $row['dob_year'] == "1987"?"selected":""; ?>>1987</option>
					<option value="1988" <?php echo $row['dob_year'] == "1988"?"selected":""; ?>>1988</option>
					<option value="1989" <?php echo $row['dob_year'] == "1989"?"selected":""; ?>>1989</option>
					<option value="1990" <?php echo $row['dob_year'] == "1990"?"selected":""; ?>>1990</option>
					<option value="1991" <?php echo $row['dob_year'] == "1991"?"selected":""; ?>>1991</option>
					<option value="1992" <?php echo $row['dob_year'] == "1992"?"selected":""; ?>>1992</option>
					<option value="1993" <?php echo $row['dob_year'] == "1993"?"selected":""; ?>>1993</option>
					<option value="1994" <?php echo $row['dob_year'] == "1994"?"selected":""; ?>>1994</option>
					<option value="1995" <?php echo $row['dob_year'] == "1995"?"selected":""; ?>>1995</option>
					<option value="1996" <?php echo $row['dob_year'] == "1996"?"selected":""; ?>>1996</option>
					<option value="1997" <?php echo $row['dob_year'] == "1997"?"selected":""; ?>>1997</option>
					<option value="1998" <?php echo $row['dob_year'] == "1998"?"selected":""; ?>>1998</option>
					<option value="1999" <?php echo $row['dob_year'] == "1999"?"selected":""; ?>>1999</option>
					<option value="2000" <?php echo $row['dob_year'] == "2000"?"selected":""; ?>>2000</option>
					<option value="2001" <?php echo $row['dob_year'] == "2001"?"selected":""; ?>>2001</option>
					<option value="2002" <?php echo $row['dob_year'] == "2002"?"selected":""; ?>>2002</option>
					<option value="2003" <?php echo $row['dob_year'] == "2003"?"selected":""; ?>>2003</option>
					<option value="2004" <?php echo $row['dob_year'] == "2004"?"selected":""; ?>>2004</option>
					<option value="2005" <?php echo $row['dob_year'] == "2005"?"selected":""; ?>>2005</option>
					<option value="2006" <?php echo $row['dob_year'] == "2006"?"selected":""; ?>>2006</option>
					<option value="2007" <?php echo $row['dob_year'] == "2007"?"selected":""; ?>>2007</option>
					<option value="2008" <?php echo $row['dob_year'] == "2008"?"selected":""; ?>>2008</option>
					<option value="2009" <?php echo $row['dob_year'] == "2009"?"selected":""; ?>>2009</option>
					<option value="2010" <?php echo $row['dob_year'] == "2010"?"selected":""; ?>>2010</option>
					</select>
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="nationality" placeholder="Nationality" value="<?php echo $row['nationality']; ?>" >
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="pob" placeholder="Place Of Birth" value="<?php echo $row['placeOfBirth']; ?>" >
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="languages" placeholder="Languages Spoken" value="<?php echo $row['languages']; ?>" >
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="state" placeholder="State" value="<?php echo $row['state']; ?>" >
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="next" placeholder="Next of Kin" value="<?php echo $row['nextOfKin']; ?>" >
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="nextAddress" placeholder="Next of Kin Address" value="<?php echo $row['nextOfKinAddress']; ?>" >
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="local" placeholder="Local Government" value="<?php echo $row['localGovernment']; ?>" >
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="hobbies" placeholder="Hobbies" value="<?php echo $row['hobbies']; ?>" >
		</div>
		<button type="submit" class="w3-button w3-right w3-theme-d3" title="Update">Update</button>
		</form>
	</div>
</div>


<?php include("includes/quote_of_the_day.inc.php"); ?>

<?php include("includes/footer.inc.php"); ?>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>