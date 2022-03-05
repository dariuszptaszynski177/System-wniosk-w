<?php
if($wnioski_menu_typ=="aktualne")
{
//$aktualne_start="<b>";
//$aktualne_stop="</b>";
$styl_aktualne="color:black;font-weight:bold;font-size:18px;";
}
if($wnioski_menu_typ=="archiwalne")
{
//$archiwalne_start="<b>";
//$archiwalne_stop="</b>";
$styl_archiwalne="color:black;font-weight:bold;font-size:18px;";
}
echo "$aktualne_start <a href='wnioski_aktualne.php' style='$styl_aktualne'>Aktualne wnioski</a> $aktualne_stop <br />";

echo "$archiwalne_start <a href='wnioski_archiwalne.php' style='$styl_archiwalne'>Archwialne wnioski</a> $archiwalne_stop"

?>