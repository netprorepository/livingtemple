<?php
class pagination
{
public function Pages($tbl_name,$limit,$path,$where)
{
	$query = "SELECT COUNT(*) as num FROM $tbl_name $where ";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	$adjacents = "2";
	$page = @$_GET['page'];
	if($page)
	$start = ($page - 1) * $limit;
	else
	$start = 0;

$sql = "SELECT * FROM $tbl_name $where LIMIT $start, $limit";
$result = mysql_query($sql);

	if ($page == 0) $page = 1;
	$prev = $page - 1;
	$next = $page + 1;
	$lastpage = ceil($total_pages/$limit);
	$lpm1 = $lastpage - 1;

	$pagination = "";
if($lastpage > 1)
{   
	$pagination .= "<div class='pagination'>";
if ($page > 1)
	$pagination.= "<a href='".$path."page=$prev' class='pagination_arraw'><i class='fa fa-chevron-circle-left'></i></a>";
else
	$pagination.= "<span class='disabled' class='pagination_arraw'><i class='fa fa-chevron-circle-left'></i></span>";   

if ($lastpage < 7 + ($adjacents * 2))
{   
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
	$pagination.= "<span class='current'>$counter</span>";
else
	$pagination.= "<a href='".$path."page=$counter'>$counter</a>";                   
}
}
elseif($lastpage > 5 + ($adjacents * 2))
{
if($page < 1 + ($adjacents * 2))       
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
	$pagination.= "<span class='current'>$counter</span>";
else
	$pagination.= "<a href='".$path."page=$counter'>$counter</a>";                   
}
	$pagination.= "...";
	$pagination.= "<a href='".$path."page=$lpm1'>$lpm1</a>";
	$pagination.= "<a href='".$path."page=$lastpage'>$lastpage</a>";       
}
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
	$pagination.= "<a href='".$path."page=1'>1</a>";
	$pagination.= "<a href='".$path."page=2'>2</a>";
	$pagination.= "...";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
	$pagination.= "<span class='current'>$counter</span>";
else
	$pagination.= "<a href='".$path."page=$counter'>$counter</a>";                   
}
	$pagination.= "..";
	$pagination.= "<a href='".$path."page=$lpm1'>$lpm1</a>";
	$pagination.= "<a href='".$path."page=$lastpage'>$lastpage</a>";       
}
else
{
	$pagination.= "<a href='".$path."page=1'>1</a>";
	$pagination.= "<a href='".$path."page=2'>2</a>";
	$pagination.= "..";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
if ($counter == $page)
	$pagination.= "<span class='current'>$counter</span>";
else
	$pagination.= "<a href='".$path."page=$counter'>$counter</a>";                   
}
}
}

if ($page < $counter - 1)
	$pagination.= "<a href='".$path."page=$next' class='pagination_arraw'><i class='fa fa-chevron-circle-right'></i></a>";
else
	$pagination.= "<span class='disabled'><i class='fa fa-chevron-circle-right'></i></span>";
	$pagination.= "</div>\n";       
}


return $pagination;
}
}