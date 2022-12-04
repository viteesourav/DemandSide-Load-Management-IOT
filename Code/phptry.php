<?php
$var1= 'example1';
$var2= '5';
echo "before calling";
$command=escapeshellcmd("try2.py .$var1 .$var2");
$output=exec($command);
echo $output;

?>