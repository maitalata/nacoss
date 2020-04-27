<?php

for($i = 1950; $i < 2018; $i++){
	echo "<option value='".$i."' <?php echo \$row['fromD'] == \"$i\"?\"selected\":\"\"; ?> >".$i."</option>\n";
}
?>