<?php
session_start();
require("includes/connect.inc.php");
require("includes/classes.inc.php");

if(!isset($_SESSION['logged'])){
	header("Location: login.php");
}

if(!isset($_GET['id'])){
	header("Location: institutions.php");
}

$id = $_GET['id'];

$user = $_SESSION['user'];

$position= $place= $from= $to= $response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data_check = new DataValidation();
	
	$position = $data_check->validate($_POST['position']);
	$place = $data_check->validate($_POST['place']);
	$from = $data_check->validate($_POST['from']);
	$to = $data_check->validate($_POST['to']);
	
	
	if($data_check->emptyCheck($position, $place, $from, $to)){
		if($db->query("UPDATE work SET position='$position', fromD='$from', toD='$to', placeOfWork='$place' WHERE id='$id'")){
			header("Location: work.php");
		}else{
			$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> System unable to update</h6>
						</div>";
		}
	}else{
		$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
						<h6><i class=\"fa fa-times\"></i> All Fields must be filled</h6>
					</div>";
	}
	
}

$query = $db->query("SELECT * FROM work WHERE id='$id'");
$row = $query->fetch_array();

?>
<!DOCTYPE html>
<html>
<title>Edit Work</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/account_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
<h1>Edit Work</h1>
<?php echo $response; ?>
	<div class="w3-section w3-twothird">
	<form action="" method="POST">
		<div class="w3-section">      
			<input class="w3-input" type="text" name="position" placeholder="Position" value="<?php echo $row['position']; ?>" >
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="place" placeholder="Place of Work" value="<?php echo $row['placeOfWork']; ?>" >
		</div>
		<div class="w3-section">
			<select class="w3-select" name="from">
				<option value="">From</option>	
				<option value='1950' <?php echo $row['fromD'] == "1950"?"selected":""; ?> >1950</option>
				<option value='1951' <?php echo $row['fromD'] == "1951"?"selected":""; ?> >1951</option>
				<option value='1952' <?php echo $row['fromD'] == "1952"?"selected":""; ?> >1952</option>
				<option value='1953' <?php echo $row['fromD'] == "1953"?"selected":""; ?> >1953</option>
				<option value='1954' <?php echo $row['fromD'] == "1954"?"selected":""; ?> >1954</option>
				<option value='1955' <?php echo $row['fromD'] == "1955"?"selected":""; ?> >1955</option>
				<option value='1956' <?php echo $row['fromD'] == "1956"?"selected":""; ?> >1956</option>
				<option value='1957' <?php echo $row['fromD'] == "1957"?"selected":""; ?> >1957</option>
				<option value='1958' <?php echo $row['fromD'] == "1958"?"selected":""; ?> >1958</option>
				<option value='1959' <?php echo $row['fromD'] == "1959"?"selected":""; ?> >1959</option>
				<option value='1960' <?php echo $row['fromD'] == "1960"?"selected":""; ?> >1960</option>
				<option value='1961' <?php echo $row['fromD'] == "1961"?"selected":""; ?> >1961</option>
				<option value='1962' <?php echo $row['fromD'] == "1962"?"selected":""; ?> >1962</option>
				<option value='1963' <?php echo $row['fromD'] == "1963"?"selected":""; ?> >1963</option>
				<option value='1964' <?php echo $row['fromD'] == "1964"?"selected":""; ?> >1964</option>
				<option value='1965' <?php echo $row['fromD'] == "1965"?"selected":""; ?> >1965</option>
				<option value='1966' <?php echo $row['fromD'] == "1966"?"selected":""; ?> >1966</option>
				<option value='1967' <?php echo $row['fromD'] == "1967"?"selected":""; ?> >1967</option>
				<option value='1968' <?php echo $row['fromD'] == "1968"?"selected":""; ?> >1968</option>
				<option value='1969' <?php echo $row['fromD'] == "1969"?"selected":""; ?> >1969</option>
				<option value='1970' <?php echo $row['fromD'] == "1970"?"selected":""; ?> >1970</option>
				<option value='1971' <?php echo $row['fromD'] == "1971"?"selected":""; ?> >1971</option>
				<option value='1972' <?php echo $row['fromD'] == "1972"?"selected":""; ?> >1972</option>
				<option value='1973' <?php echo $row['fromD'] == "1973"?"selected":""; ?> >1973</option>
				<option value='1974' <?php echo $row['fromD'] == "1974"?"selected":""; ?> >1974</option>
				<option value='1975' <?php echo $row['fromD'] == "1975"?"selected":""; ?> >1975</option>
				<option value='1976' <?php echo $row['fromD'] == "1976"?"selected":""; ?> >1976</option>
				<option value='1977' <?php echo $row['fromD'] == "1977"?"selected":""; ?> >1977</option>
				<option value='1978' <?php echo $row['fromD'] == "1978"?"selected":""; ?> >1978</option>
				<option value='1979' <?php echo $row['fromD'] == "1979"?"selected":""; ?> >1979</option>
				<option value='1980' <?php echo $row['fromD'] == "1980"?"selected":""; ?> >1980</option>
				<option value='1981' <?php echo $row['fromD'] == "1981"?"selected":""; ?> >1981</option>
				<option value='1982' <?php echo $row['fromD'] == "1982"?"selected":""; ?> >1982</option>
				<option value='1983' <?php echo $row['fromD'] == "1983"?"selected":""; ?> >1983</option>
				<option value='1984' <?php echo $row['fromD'] == "1984"?"selected":""; ?> >1984</option>
				<option value='1985' <?php echo $row['fromD'] == "1985"?"selected":""; ?> >1985</option>
				<option value='1986' <?php echo $row['fromD'] == "1986"?"selected":""; ?> >1986</option>
				<option value='1987' <?php echo $row['fromD'] == "1987"?"selected":""; ?> >1987</option>
				<option value='1988' <?php echo $row['fromD'] == "1988"?"selected":""; ?> >1988</option>
				<option value='1989' <?php echo $row['fromD'] == "1989"?"selected":""; ?> >1989</option>
				<option value='1990' <?php echo $row['fromD'] == "1990"?"selected":""; ?> >1990</option>
				<option value='1991' <?php echo $row['fromD'] == "1991"?"selected":""; ?> >1991</option>
				<option value='1992' <?php echo $row['fromD'] == "1992"?"selected":""; ?> >1992</option>
				<option value='1993' <?php echo $row['fromD'] == "1993"?"selected":""; ?> >1993</option>
				<option value='1994' <?php echo $row['fromD'] == "1994"?"selected":""; ?> >1994</option>
				<option value='1995' <?php echo $row['fromD'] == "1995"?"selected":""; ?> >1995</option>
				<option value='1996' <?php echo $row['fromD'] == "1996"?"selected":""; ?> >1996</option>
				<option value='1997' <?php echo $row['fromD'] == "1997"?"selected":""; ?> >1997</option>
				<option value='1998' <?php echo $row['fromD'] == "1998"?"selected":""; ?> >1998</option>
				<option value='1999' <?php echo $row['fromD'] == "1999"?"selected":""; ?> >1999</option>
				<option value='2000' <?php echo $row['fromD'] == "2000"?"selected":""; ?> >2000</option>
				<option value='2001' <?php echo $row['fromD'] == "2001"?"selected":""; ?> >2001</option>
				<option value='2002' <?php echo $row['fromD'] == "2002"?"selected":""; ?> >2002</option>
				<option value='2003' <?php echo $row['fromD'] == "2003"?"selected":""; ?> >2003</option>
				<option value='2004' <?php echo $row['fromD'] == "2004"?"selected":""; ?> >2004</option>
				<option value='2005' <?php echo $row['fromD'] == "2005"?"selected":""; ?> >2005</option>
				<option value='2006' <?php echo $row['fromD'] == "2006"?"selected":""; ?> >2006</option>
				<option value='2007' <?php echo $row['fromD'] == "2007"?"selected":""; ?> >2007</option>
				<option value='2008' <?php echo $row['fromD'] == "2008"?"selected":""; ?> >2008</option>
				<option value='2009' <?php echo $row['fromD'] == "2009"?"selected":""; ?> >2009</option>
				<option value='2010' <?php echo $row['fromD'] == "2010"?"selected":""; ?> >2010</option>
				<option value='2011' <?php echo $row['fromD'] == "2011"?"selected":""; ?> >2011</option>
				<option value='2012' <?php echo $row['fromD'] == "2012"?"selected":""; ?> >2012</option>
				<option value='2013' <?php echo $row['fromD'] == "2013"?"selected":""; ?> >2013</option>
				<option value='2014' <?php echo $row['fromD'] == "2014"?"selected":""; ?> >2014</option>
				<option value='2015' <?php echo $row['fromD'] == "2015"?"selected":""; ?> >2015</option>
				<option value='2016' <?php echo $row['fromD'] == "2016"?"selected":""; ?> >2016</option>
				<option value='2017' <?php echo $row['fromD'] == "2017"?"selected":""; ?> >2017</option>
				<option value='2018' <?php echo $row['fromD'] == "2018"?"selected":""; ?> >2018</option>
				<option value='to date' <?php echo $row['fromD'] == "to date"?"selected":""; ?> >to date</option>
			</select>
		</div>
		<div class="w3-section">
			<select class="w3-select" name="to">
				<option value="">To</option>	
				<option value='1950' <?php echo $row['toD'] == "1950"?"selected":""; ?> >1950</option>
				<option value='1951' <?php echo $row['toD'] == "1951"?"selected":""; ?> >1951</option>
				<option value='1952' <?php echo $row['toD'] == "1952"?"selected":""; ?> >1952</option>
				<option value='1953' <?php echo $row['toD'] == "1953"?"selected":""; ?> >1953</option>
				<option value='1954' <?php echo $row['toD'] == "1954"?"selected":""; ?> >1954</option>
				<option value='1955' <?php echo $row['toD'] == "1955"?"selected":""; ?> >1955</option>
				<option value='1956' <?php echo $row['toD'] == "1956"?"selected":""; ?> >1956</option>
				<option value='1957' <?php echo $row['toD'] == "1957"?"selected":""; ?> >1957</option>
				<option value='1958' <?php echo $row['toD'] == "1958"?"selected":""; ?> >1958</option>
				<option value='1959' <?php echo $row['toD'] == "1959"?"selected":""; ?> >1959</option>
				<option value='1960' <?php echo $row['toD'] == "1960"?"selected":""; ?> >1960</option>
				<option value='1961' <?php echo $row['toD'] == "1961"?"selected":""; ?> >1961</option>
				<option value='1962' <?php echo $row['toD'] == "1962"?"selected":""; ?> >1962</option>
				<option value='1963' <?php echo $row['toD'] == "1963"?"selected":""; ?> >1963</option>
				<option value='1964' <?php echo $row['toD'] == "1964"?"selected":""; ?> >1964</option>
				<option value='1965' <?php echo $row['toD'] == "1965"?"selected":""; ?> >1965</option>
				<option value='1966' <?php echo $row['toD'] == "1966"?"selected":""; ?> >1966</option>
				<option value='1967' <?php echo $row['toD'] == "1967"?"selected":""; ?> >1967</option>
				<option value='1968' <?php echo $row['toD'] == "1968"?"selected":""; ?> >1968</option>
				<option value='1969' <?php echo $row['toD'] == "1969"?"selected":""; ?> >1969</option>
				<option value='1970' <?php echo $row['toD'] == "1970"?"selected":""; ?> >1970</option>
				<option value='1971' <?php echo $row['toD'] == "1971"?"selected":""; ?> >1971</option>
				<option value='1972' <?php echo $row['toD'] == "1972"?"selected":""; ?> >1972</option>
				<option value='1973' <?php echo $row['toD'] == "1973"?"selected":""; ?> >1973</option>
				<option value='1974' <?php echo $row['toD'] == "1974"?"selected":""; ?> >1974</option>
				<option value='1975' <?php echo $row['toD'] == "1975"?"selected":""; ?> >1975</option>
				<option value='1976' <?php echo $row['toD'] == "1976"?"selected":""; ?> >1976</option>
				<option value='1977' <?php echo $row['toD'] == "1977"?"selected":""; ?> >1977</option>
				<option value='1978' <?php echo $row['toD'] == "1978"?"selected":""; ?> >1978</option>
				<option value='1979' <?php echo $row['toD'] == "1979"?"selected":""; ?> >1979</option>
				<option value='1980' <?php echo $row['toD'] == "1980"?"selected":""; ?> >1980</option>
				<option value='1981' <?php echo $row['toD'] == "1981"?"selected":""; ?> >1981</option>
				<option value='1982' <?php echo $row['toD'] == "1982"?"selected":""; ?> >1982</option>
				<option value='1983' <?php echo $row['toD'] == "1983"?"selected":""; ?> >1983</option>
				<option value='1984' <?php echo $row['toD'] == "1984"?"selected":""; ?> >1984</option>
				<option value='1985' <?php echo $row['toD'] == "1985"?"selected":""; ?> >1985</option>
				<option value='1986' <?php echo $row['toD'] == "1986"?"selected":""; ?> >1986</option>
				<option value='1987' <?php echo $row['toD'] == "1987"?"selected":""; ?> >1987</option>
				<option value='1988' <?php echo $row['toD'] == "1988"?"selected":""; ?> >1988</option>
				<option value='1989' <?php echo $row['toD'] == "1989"?"selected":""; ?> >1989</option>
				<option value='1990' <?php echo $row['toD'] == "1990"?"selected":""; ?> >1990</option>
				<option value='1991' <?php echo $row['toD'] == "1991"?"selected":""; ?> >1991</option>
				<option value='1992' <?php echo $row['toD'] == "1992"?"selected":""; ?> >1992</option>
				<option value='1993' <?php echo $row['toD'] == "1993"?"selected":""; ?> >1993</option>
				<option value='1994' <?php echo $row['toD'] == "1994"?"selected":""; ?> >1994</option>
				<option value='1995' <?php echo $row['toD'] == "1995"?"selected":""; ?> >1995</option>
				<option value='1996' <?php echo $row['toD'] == "1996"?"selected":""; ?> >1996</option>
				<option value='1997' <?php echo $row['toD'] == "1997"?"selected":""; ?> >1997</option>
				<option value='1998' <?php echo $row['toD'] == "1998"?"selected":""; ?> >1998</option>
				<option value='1999' <?php echo $row['toD'] == "1999"?"selected":""; ?> >1999</option>
				<option value='2000' <?php echo $row['toD'] == "2000"?"selected":""; ?> >2000</option>
				<option value='2001' <?php echo $row['toD'] == "2001"?"selected":""; ?> >2001</option>
				<option value='2002' <?php echo $row['toD'] == "2002"?"selected":""; ?> >2002</option>
				<option value='2003' <?php echo $row['toD'] == "2003"?"selected":""; ?> >2003</option>
				<option value='2004' <?php echo $row['toD'] == "2004"?"selected":""; ?> >2004</option>
				<option value='2005' <?php echo $row['toD'] == "2005"?"selected":""; ?> >2005</option>
				<option value='2006' <?php echo $row['toD'] == "2006"?"selected":""; ?> >2006</option>
				<option value='2007' <?php echo $row['toD'] == "2007"?"selected":""; ?> >2007</option>
				<option value='2008' <?php echo $row['toD'] == "2008"?"selected":""; ?> >2008</option>
				<option value='2009' <?php echo $row['toD'] == "2009"?"selected":""; ?> >2009</option>
				<option value='2010' <?php echo $row['toD'] == "2010"?"selected":""; ?> >2010</option>
				<option value='2011' <?php echo $row['toD'] == "2011"?"selected":""; ?> >2011</option>
				<option value='2012' <?php echo $row['toD'] == "2012"?"selected":""; ?> >2012</option>
				<option value='2013' <?php echo $row['toD'] == "2013"?"selected":""; ?> >2013</option>
				<option value='2014' <?php echo $row['toD'] == "2014"?"selected":""; ?> >2014</option>
				<option value='2015' <?php echo $row['toD'] == "2015"?"selected":""; ?> >2015</option>
				<option value='2016' <?php echo $row['toD'] == "2016"?"selected":""; ?> >2016</option>
				<option value='2017' <?php echo $row['toD'] == "2017"?"selected":""; ?> >2017</option>
				<option value='2018' <?php echo $row['toD'] == "2018"?"selected":""; ?> >2018</option>
				<option value='to date' <?php echo $row['toD'] == "to date"?"selected":""; ?> >to date</option>
			</select>
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