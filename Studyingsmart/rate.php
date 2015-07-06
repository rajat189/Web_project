<?php
header("Cache-Control: no-cache");
header("Pragma: nocache");
include("settings.php");
$id_sent = preg_replace("/[^0-9]/","",$_REQUEST['id']);
$vote_sent = preg_replace("/[^0-9]/","",$_REQUEST['stars']);
$ip =$_SERVER['REMOTE_ADDR'] ;
connect();
$q=mysql_num_rows(mysql_query("select id from ratings where id=$id_sent"));
if(!$q)mysql_query("insert into ratings (id,date) values ($id_sent,curdate())");
if ($vote_sent > $units) die("Sorry, vote appears to be invalid.");

$query = mysql_query("SELECT total_votes, total_value, used_ips FROM $rating_dbname.$rating_tableName WHERE id='$id_sent' ")or die(" Error: ".mysql_error());
$numbers = mysql_fetch_assoc($query);
$checkIP = unserialize($numbers['used_ips']);
$count = $numbers['total_votes'];
$current_rating = $numbers['total_value'];
$sum = $vote_sent+$current_rating;
$tense = ($count==1) ? "vote" : "votes";
($sum==0 ? $added=0 : $added=$count+1);
((is_array($checkIP)) ? array_push($checkIP,$ip) : $checkIP=array($ip));
$insertip=serialize($checkIP);
if(!isset($_COOKIE['rating_'.$id_sent])){
$voted=mysql_num_rows(mysql_query("SELECT used_ips FROM $rating_dbname.$rating_tableName WHERE used_ips LIKE '%".$ip."%' AND id='".$id_sent."' "));
									}
else $voted=1;
if(!$voted) {

	if (($vote_sent >= 1 && $vote_sent <= $units)) {

		$update = "UPDATE $rating_tableName SET total_votes='".$added."', total_value='".$sum."', used_ips='".$insertip."' WHERE id='$id_sent'";
		$result = mysql_query($update);
		if($result)	setcookie("rating_".$id_sent,1, time()+ 2592000);
	}
}
$newtotals = mysql_query("SELECT total_votes, total_value, used_ips FROM $rating_tableName WHERE id='$id_sent' ")or die(" Error: ".mysql_error());
$numbers = mysql_fetch_assoc($newtotals);
$count = $numbers['total_votes'];
$current_rating = $numbers['total_value'];
$tense = ($count==1) ? "vote" : "votes";

if($voted){$sum=$current_rating; $added=$count;}
$new_back = array();
for($i=0;$i<5;$i++){
	$j=$i+1;
	if($i<@number_format($current_rating/$count,1)-0.5) $class="ratings_stars ratings_vote";
	else $class="ratings_stars";
$new_back[] .= '<div class="star_'.$j.' '.$class.'"></div>';
                      }

$new_back[] .= ' <div class="total_votes"><p class="voted"> Rating: <strong>'.@number_format($sum/$added,1).'</strong>/'.$units.' ('.$count.' '.$tense.' cast) ';
if(!$voted)$new_back[] .= '<span class="thanks">Thanks for voting!</span></p>';
else {$new_back[] .= '<span class="invalid">Already voted for this item</span></p></div>';}
$allnewback = join("\n", $new_back);

$output = $allnewback;
echo $output;
?>
