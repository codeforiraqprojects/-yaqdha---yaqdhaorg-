<?php
require_once ('connectdb.php') ;

if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "
    SELECT activity.activity_id, activity.activity_desc,
    date_format(activity.activity_date,'%Y/%m/%d, %h:%i%p')
    as activity_date FROM activity
    WHERE 
	(activity_desc LIKE '%".$search."%'
	OR activity_date LIKE '%".$search."%')
	";

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_array($result))
	{
        echo'<a for="result" href="activity/'. $row['activity_id'].'" class="list-group-item list-group-item-action">
		<h5 id="bookres" class="activitytext">'.$row['activity_desc'].'</h5>
		<span id="auth">'.$row['activity_date'].'</span>
		</a>';
	}
}
else
{
	echo '<i class="list-group-item list-group-item-action text-right">لا توجد نتائج...</i>';
}
}

?>
