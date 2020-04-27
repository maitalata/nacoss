<?php
session_start();
require("includes/connect.inc.php");
require("includes/classes.inc.php");

if(!isset($_SESSION['logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$position= $place= $from= $to= $response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data_check = new DataValidation();
	
	$position = $data_check->validate($_POST['position']);
	$place = $data_check->validate($_POST['place']);
	$from = $data_check->validate($_POST['from']);
	$to = $data_check->validate($_POST['to']);
	
	
	if($data_check->emptyCheck($position, $place, $from, $to)){
		if($db->query("INSERT INTO work(user, position, placeOfWork, fromD, toD) VALUES ('$user','$position','$place','$from','$to')")){
			header("Location: work.php");
		}else{
			$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> System unable to add institution</h6>
						</div>";
		}
	}else{
		$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
						<h6><i class=\"fa fa-times\"></i> All Fields must be filled</h6>
					</div>";
	}
	
}

?>
<!DOCTYPE html>
<html>
<title>Add Work</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/account_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
<h1>Add Work History</h1>
<?php echo $response; ?>
	<div class="w3-section w3-twothird">
	<form action="" method="POST">
		<div class="w3-section">      
			<input class="w3-input" type="text" name="position" placeholder="Position">
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="place" placeholder="Place of Work">
		</div>
		<div class="w3-section">
			<select class="w3-select" name="from">
				<option value="">From</option>
				<option value='1950'>1950</option>
				<option value='1951'>1951</option>
				<option value='1952'>1952</option>
				<option value='1953'>1953</option>
				<option value='1954'>1954</option>
				<option value='1955'>1955</option>
				<option value='1956'>1956</option>
				<option value='1957'>1957</option>
				<option value='1958'>1958</option>
				<option value='1959'>1959</option>
				<option value='1960'>1960</option>
				<option value='1961'>1961</option>
				<option value='1962'>1962</option>
				<option value='1963'>1963</option>
				<option value='1964'>1964</option>
				<option value='1965'>1965</option>
				<option value='1966'>1966</option>
				<option value='1967'>1967</option>
				<option value='1968'>1968</option>
				<option value='1969'>1969</option>
				<option value='1970'>1970</option>
				<option value='1971'>1971</option>
				<option value='1972'>1972</option>
				<option value='1973'>1973</option>
				<option value='1974'>1974</option>
				<option value='1975'>1975</option>
				<option value='1976'>1976</option>
				<option value='1977'>1977</option>
				<option value='1978'>1978</option>
				<option value='1979'>1979</option>
				<option value='1980'>1980</option>
				<option value='1981'>1981</option>
				<option value='1982'>1982</option>
				<option value='1983'>1983</option>
				<option value='1984'>1984</option>
				<option value='1985'>1985</option>
				<option value='1986'>1986</option>
				<option value='1987'>1987</option>
				<option value='1988'>1988</option>
				<option value='1989'>1989</option>
				<option value='1990'>1990</option>
				<option value='1991'>1991</option>
				<option value='1992'>1992</option>
				<option value='1993'>1993</option>
				<option value='1994'>1994</option>
				<option value='1995'>1995</option>
				<option value='1996'>1996</option>
				<option value='1997'>1997</option>
				<option value='1998'>1998</option>
				<option value='1999'>1999</option>
				<option value='2000'>2000</option>
				<option value='2001'>2001</option>
				<option value='2002'>2002</option>
				<option value='2003'>2003</option>
				<option value='2004'>2004</option>
				<option value='2005'>2005</option>
				<option value='2006'>2006</option>
				<option value='2007'>2007</option>
				<option value='2008'>2008</option>
				<option value='2009'>2009</option>
				<option value='2010'>2010</option>
				<option value='2011'>2011</option>
				<option value='2012'>2012</option>
				<option value='2013'>2013</option>
				<option value='2014'>2014</option>
				<option value='2015'>2015</option>
				<option value='2016'>2016</option>
				<option value='2017'>2017</option>
				<option value='2018'>2018</option>
				<option value='to date'>to date</option>
			</select>
		</div>
		<div class="w3-section">
			<select class="w3-select" name="to">
				<option value="">To</option>
				<option value='1950'>1950</option>
				<option value='1951'>1951</option>
				<option value='1952'>1952</option>
				<option value='1953'>1953</option>
				<option value='1954'>1954</option>
				<option value='1955'>1955</option>
				<option value='1956'>1956</option>
				<option value='1957'>1957</option>
				<option value='1958'>1958</option>
				<option value='1959'>1959</option>
				<option value='1960'>1960</option>
				<option value='1961'>1961</option>
				<option value='1962'>1962</option>
				<option value='1963'>1963</option>
				<option value='1964'>1964</option>
				<option value='1965'>1965</option>
				<option value='1966'>1966</option>
				<option value='1967'>1967</option>
				<option value='1968'>1968</option>
				<option value='1969'>1969</option>
				<option value='1970'>1970</option>
				<option value='1971'>1971</option>
				<option value='1972'>1972</option>
				<option value='1973'>1973</option>
				<option value='1974'>1974</option>
				<option value='1975'>1975</option>
				<option value='1976'>1976</option>
				<option value='1977'>1977</option>
				<option value='1978'>1978</option>
				<option value='1979'>1979</option>
				<option value='1980'>1980</option>
				<option value='1981'>1981</option>
				<option value='1982'>1982</option>
				<option value='1983'>1983</option>
				<option value='1984'>1984</option>
				<option value='1985'>1985</option>
				<option value='1986'>1986</option>
				<option value='1987'>1987</option>
				<option value='1988'>1988</option>
				<option value='1989'>1989</option>
				<option value='1990'>1990</option>
				<option value='1991'>1991</option>
				<option value='1992'>1992</option>
				<option value='1993'>1993</option>
				<option value='1994'>1994</option>
				<option value='1995'>1995</option>
				<option value='1996'>1996</option>
				<option value='1997'>1997</option>
				<option value='1998'>1998</option>
				<option value='1999'>1999</option>
				<option value='2000'>2000</option>
				<option value='2001'>2001</option>
				<option value='2002'>2002</option>
				<option value='2003'>2003</option>
				<option value='2004'>2004</option>
				<option value='2005'>2005</option>
				<option value='2006'>2006</option>
				<option value='2007'>2007</option>
				<option value='2008'>2008</option>
				<option value='2009'>2009</option>
				<option value='2010'>2010</option>
				<option value='2011'>2011</option>
				<option value='2012'>2012</option>
				<option value='2013'>2013</option>
				<option value='2014'>2014</option>
				<option value='2015'>2015</option>
				<option value='2016'>2016</option>
				<option value='2017'>2017</option>
				<option value='2018'>2018</option>
				<option value='to date'>to date</option>
			</select>
		</div>
		<button type="submit" class="w3-button w3-right w3-theme-d3" title="Add">Add</button>
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