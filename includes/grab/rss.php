<?php

if (!$user->is_logged_in())
	{ echo "http://rss.cnn.com/rss/cnn_topstories.rss"; }
  else
	{
	require ('includes/dbconnect.php');

        $sql = sprintf("SELECT newsource FROM members WHERE memberID = '%s'",
                  mysql_real_escape_string($memid));
        $res=mysql_query($sql);
	$userRow = mysql_fetch_row($res);
	print_r($userRow[0]);
	}

?>