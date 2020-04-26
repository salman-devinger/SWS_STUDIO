<?php
$dbhost = 'sql188.main-hosting.eu.';
$dbuser = 'u754512327_sws';
$dbpass = 'salman123';
$dbname = 'u754512327_sws';
$mysqldump=exec('which mysqldump');
//$file='./'
//mysqldump -hsql188.main-hosting.eu. -uu754512327_sws -psalman123 u754512327_sws -R -E --triggers --single-transaction > /SWSDB_2019_02_19.sql
$command = "mysqldump -h $dbhost -u $dbuser -p $dbpass $dbname -R -E --triggers --single-transaction > $dbname.sql";

exec($command);
echo 'Completed Backup';
?>