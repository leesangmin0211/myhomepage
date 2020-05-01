<?
	session_start();
?>
<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>homepage</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
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

<?
//데이터 베이스 연결하기
include "db.php";

/* 조회수 업데이트
$result=mysql_query("update board set see=see+1 where id=$_GET['id']", $conn);  */

// 글 정보 가져오기
$result=mysql_query("select * from board where id = $_GET[id]", $db);
$row=mysql_fetch_array($result);

?>
<h3><?=$row[title]?></h3>
<br><br><br><br>
<table width=600 border=0  cellpadding=2 cellspacing=1 bgcolor=#777777>
<tr>
    <td height=20 colspan=4 align=center bgcolor=#999999>
        <font color=white><B><?=$row[title]?></B></font>
    </td>
</tr>
<tr>
    <td width=50 height=20 align=center bgcolor=#EEEEEE>글쓴이</td><td width=240 bgcolor=white><?=$row[name]?></td>
    <td width=50 height=20 align=center bgcolor=#EEEEEE>닉네임</td><td width=240 bgcolor=white><?=$row[nick]?></td>
</tr>
<tr>
    <td width=50 height=20 align=center bgcolor=#EEEEEE>날&nbsp;&nbsp;&nbsp;짜</td><td width=240 bgcolor=white><?=$row[wdate]?></td>
    <td width=50 height=20 align=center bgcolor=#EEEEEE>조회수</td><td width=240 bgcolor=white><?=$row[view]?></td>
</tr>
<tr>
    <td bgcolor=#EEEEEE>  IP 주소  </td>
    <td bgcolor=white colspan=3>
        <font color=black>
            <pre><?=$row[ip]?></pre>
        </font>
    </td>                
</tr>
<tr>
    <td bgcolor=white colspan=4>
        <font color=black>
            <pre><?=$row[content]?></pre>
        </font>
    </td>                
</tr>
<!-- 기타 버튼 들 -->
<tr>
    <td colspan=4 bgcolor=#999999>
        <table width=100%>
            <tr>
                <td width=400 align=left height=20>
                    <a href=list.php?no=<?=$no?>><font color=white>[목록보기]&nbsp;&nbsp; </font></a>
<?
	if(!$_SESSION['userid'])
	{
 
	}
  else
  {
  ?>
                    <a href=write.php><font color=white>[글쓰기]&nbsp;&nbsp;</font></a>
                    <a href=edit.php?id=<?=$_GET[id]?>><font color=white>[수정]&nbsp;&nbsp;</font></a>
                    <a href=predel.php?id=<?=$_GET[id]?>><font color=white>[삭제]</font></a>
<?
  }
?>


                    
                </td>
    
<!-- 기타 버튼 끝 -->

<!-- 이전 다음 표시 -->
                <td align=right>
                <?php

                //  현재 글보다 id 값이 큰 글 중 가장 작은 것을 가져온다. 
                $query=mysql_query("select id from board where id > $_GET[id] limit 1", $db);
                $prev_id=mysql_fetch_array($query);

                    if ($prev_id[id]) // 이전 글이 있을 경우
                    {
                         echo "<a href=dbread.php?id=$prev_id[id]><font color=white>[이전] </font></a>&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                    else 
                    {
                        echo "[이전]&nbsp;&nbsp;&nbsp;&nbsp;";
                    }

                $query=mysql_query("select id from board where id < $_GET[id] order by id desc limit 1", $db);
                $next_id=mysql_fetch_array($query);

                    if ($next_id[id])
                    {
                         echo "<a href=dbread.php?id=$next_id[id]><font color=white>[다음]</font></a>&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                    else 
                    {
                        echo "[다음]&nbsp;&nbsp;&nbsp;&nbsp;";
                    }

                ?>
                </td>
            </tr>
        </table>
</td>
</tr>
</table>
</div>
<div id="footer">
        <p>Copyright &copy; 2020.04 Programed by LeeSangMin. All Rights Reserved.</p>
    </div>
</body>
</html>
<?php
  // 조회수 업데이트
  
    $result = mysql_query("update board set view=view+1 where id = $_GET[id]", $db);
	mysql_close($db);
?>