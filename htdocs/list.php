<?
	session_start();
?>
<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>homepage</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
	<style>
    #cont{width: 100%; height: 700px;}
	
</style>
  </head>
  
 <body>

 <? include "top_main.php"; ?>

<div id="cont">
<div class="sub">
            <ul>
            <li><a href="scool.php">교내 활동</a></li>
            <li><a href="other.php">교내 외 활동</a></li>
        </ul>
        </div>
        
<?php
include "db.php";

$page_size=5;    

$page_list_size = 5;
$no = $_GET[no];

if (!$no || $no < 0) $no=0;

$query = "select * from board order by id desc limit $no, $page_size";
$result = mysql_query($query, $db);

$result_count=mysql_query("select count(*) from board",$db);
$result_row=mysql_fetch_row($result_count);
$total_row = $result_row[0]; 
    
if ($total_row <= 0) $total_row = 0; 

$total_page = floor(($total_row - 1) / $page_size); 


$current_page = floor($no/$page_size);

?>
<center>
<br>
<!-- 게시판 타이틀 -->
    <h1>게시판 타이틀</h1>
<br>
<br>
<br>

<!-- 게시물 리스트를 보이기 위한 테이블 -->
<table width=1000 border=0  cellpadding=2 cellspacing=1 bgcolor=#777777>
<!-- 리스트 타이틀 부분 -->
<tr height=20 bgcolor=#999999>
    <td width=30 align=center>
        <font color=white>번호</font>
    </td>
    <td width=250  align=center>
        <font color=white>제 목</font>    </td>
    <td width=50 align=center>
        <font color=white>글쓴이</font>
    </td>        
    <td width=150 align=center>
        <font color=white>날 짜</font>    </td>
    <td width=150 align=center>
        <font color=white>IP 주소</font>    </td>
    <td width=60 align=center>
        <font  color=white>조회수</font>    </td>     
</tr>
<!-- 리스트 타이틀 끝 -->
<!-- 리스트 부분 시작 -->
<?php
while($row=mysql_fetch_array($result))
{

?>
<!-- 행 시작 -->
<tr>
    <!-- 번호 -->
    <td height=20  bgcolor=white align=center>
        <a class="hello" href=dbread.php?id=<?=$row[id]?>&no=<?=$no?>><?=$row[id]?></a>
    </td>
    <!-- 번호 끝 -->
    <!-- 제목 -->
    <td width="250" height=20  bgcolor=white align=center>&nbsp;
        <a  class="hello" href=dbread.php?id=<?=$row[id]?>&no=<?=$no?>><?=strip_tags($row[title], '<b><i>');?></a>    </td>
    <!-- 제목 끝 -->
    <!-- 이름 -->
    <td align=center height=20 bgcolor=white>
        <font  color=black>
            <?=$row[name]?>
        </font>
    </td>
    <!-- 이름 끝 -->
    <!-- 날짜 -->
    <td width="150" height=20 align=center bgcolor=white>
        <font  color=black><?=$row[wdate]?></font>    </td>
    <!-- 날짜 끝 -->

    <!-- IP -->
    <td width="150" height=20 align=center bgcolor=white>
        <font  color=black><?=$row[ip]?></font>    </td>
    <!-- IP 끝 -->

    <!-- 조회수 -->
    <td width="60" height=20 align=center bgcolor=white>
        <font  color=black><?=$row[view]?></font>    </td>
    <!-- 조회수 끝 -->
</tr>
<!-- 행 끝 -->
<?php
} // end While

//데이터베이스와의 연결을 끝는다.
mysql_close($db);
?>
</table>
<!-- 게시물 리스트를 보이기 위한 테이블 끝-->

<!-- 페이지를 표시하기 위한 테이블 -->
<table border=0>
<tr>
<td width=600 height=20 align=center rowspan=4>
<font  color=gray>
&nbsp;


<?php
$page = $_GET[page];

$start_page = (int)($current_page / $page_list_size) * $page_list_size;


$end_page = $start_page + $page_list_size - 1;
if ($total_page < $end_page) $end_page = $total_page;



if ($start_page >= $page_list_size) {

    $prev_list = ($start_page - 1)*$page_size;
    echo  "<a  class='hello' href=\"$PHP_SELF?no=$prev_list\">◀</a>\n";
}

for ($i=$start_page;$i <= $end_page;$i++) {

$page=$page_size*$i; 
$page_num = $i+1; 
    
    if ($no!=$page){ 
        echo "<a class='hello'  href=\"$PHP_SELF?no=$page\">";
     }
    echo " $page_num "; 
    
    if ($no!=$page){
        echo "</a>";
    }
}

if($total_page > $end_page)
{
    $next_list = ($end_page + 1)* $page_size;
    echo " <a class='hello' href=$PHP_SELF?no=$next_list>▶</a><p>";
}
?>

</font>
</td>
</tr>
</table>
 <?
	if(!$_SESSION['userid'])
	{
 
	}
  else
  {
  ?>
<a  class="hello" href=write.php>글쓰기</a>
<?php
  }
?>

    </center>
    </div>
    <div id="footer">
        <p>Copyright &copy; 2020.04 Programed by LeeSangMin. All Rights Reserved.</p>
    </div>
</body>
</html>