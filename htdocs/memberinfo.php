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
	<!--
    td  { font-size : 9pt;   }
    .hello:link  { font: 9pt; color: #999999; text-decoration: none;    font-family : 굴림;font-size: 9pt;  }
    .hello:visited  {   text-decoration : none; color :  #444444;    font-size : 9pt;  }
    .hello:hover  {     text-decoration : underline; color : black; font-size : 9pt;  }
	-->    
</style>
  </head>
  
 <body>

 <? include "top_main.php"; ?>
<div id="cont">
<?
include "db.php";

$page_size=5;    


$page_list_size = 5;
$no = $_GET[no];

if (!$no || $no < 0) $no=0; //$no 값이 안넘어 오거나 잘못된(음수)값이 넘어오는 경우 0으로 처리


// 데이터베이스에서 페이지의 첫번째 글($no)부터 $page_size 만큼의 글을 가져온다.
$query = "select * from login order by id desc limit $no, $page_size";
$result = mysql_query($query, $db);

// 총 게시물 수 를 구한다.
// count 를 통해 구할 수 있는데 count(항목) 과 같은 방법으로 사용한다. * 는 모든 항목을 뜻한다.
// 총 해당 항목의 값을 가지는 게시물의 개수가 얼마인가를 묻는 것이다.

$result_count=mysql_query("select count(*) from login",$db);
$result_row=mysql_fetch_row($result_count);
$total_row = $result_row[0]; 
//결과의 첫번째 열이 count(*) 의 결과다.

# 총 페이지 계산

if ($total_row <= 0) $total_row = 0; // 총게시물의 값이 없거나 할경우 기본값으로 세팅

$total_page = floor(($total_row - 1) / $page_size); // 총게시물을 페이지 사이즈로 나눈뒤 내림을 한다.

# 총페이지는 총 게시물의 수를 $page_size 로 나누면 알수있다.
# 총페이지는 총 게시물의 수를 $page_size 로 나누면 알수있다.

# ( floor 는 내림을 하는 수학함수이다.)

# 현재 페이지 계산

$current_page = floor($no/$page_size);

?>

<!-- 게시판 타이틀 -->
   <br>
    <h1 align=center>회원정보보기</h1><br>
<br>
<br>

<!-- 게시물 리스트를 보이기 위한 테이블 -->
<table width=800 border=0  cellpadding=2 cellspacing=1 bgcolor=#777777>
<!-- 리스트 타이틀 부분 -->
<tr height=20 bgcolor=#999999>
    <td width=30 align=center>
        <font color=white>아이디</font>    </td>
    <td width=250  align=center>
        <font color=white>비밀번호</font>    </td>
    <td width=250  align=center>
        <font color=white>닉네임</font>    </td>
    <td width=150 align=center>
        <font color=white>이름</font>    </td>
    <td width=150 align=center>
        <font color=white>성별</font>    </td>
    <td width=60 align=center>
        <font  color=white>혈액형</font>    </td>
    <td width=60 align=center>
        <font  color=white>회원삭제</font>   </td>          
</tr>
<!-- 리스트 타이틀 끝 -->
<!-- 리스트 부분 시작 -->
<?
while($row=mysql_fetch_array($result))
{
?>
<!-- 행 시작 -->
<tr>

    <td width="150" height=20 align=center bgcolor=white>
        <font  color=black><?=$row[id]?></font>    </td>
    <td width="150" height=20 align=center bgcolor=white>
        <font  color=black><?=$row[pass]?></font>    </td>
    <td align=center height=20 bgcolor=white>
        <font  color=black><?=$row[nick]?></font>    </td>
    <td width="150" height=20 align=center bgcolor=white>
        <font  color=black><?=$row[name]?></font>    </td>
    <td width="150" height=20 align=center bgcolor=white>
        <font  color=black><?=$row[sex]?></font>    </td>
    <td width="150" height=20 align=center bgcolor=white>
        <font  color=black><?=$row[bt]?></font>    </td>
    <td width="150" height=20  bgcolor=white align=center>
        <a class="hello" href=memberout.php?id=<?=$row[id]?>&no=<?=$no?>>회원삭제</a> </td>
</tr>
<!-- 행 끝 -->
<?
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


<?
$page = $_GET[page];
# 페이지 리스트
$start_page = (int)($current_page / $page_list_size) * $page_list_size;

# 페이지 리스트의 마지막 페이지가 몇번째 페이지인지 구하는 부분이다.
$end_page = $start_page + $page_list_size - 1;
if ($total_page < $end_page) $end_page = $total_page;

# 이전 페이지 리스트 보여주기

if ($start_page >= $page_list_size) {

    $prev_list = ($start_page - 1)*$page_size;
    echo  "<a  class='hello' href=\"$PHP_SELF?no=$prev_list\">◀</a>\n";
}
# 페이지 리스트를 출력
for ($i=$start_page;$i <= $end_page;$i++) {

$page=$page_size*$i; // 페이지값을 no 값으로 변환.
$page_num = $i+1; // 실제 페이지 값이 0부터 시작하므로 표시할때는 1을 더해준다. 페이지 0 -> 1
    
    if ($no!=$page){ //현재 페이지가 아닐 경우만 링크를 표시
        echo "<a class='hello'  href=\"$PHP_SELF?no=$page\">";
     }
    echo " $page_num "; //페이지를 표시
    
    if ($no!=$page){
        echo "</a>";
    }
}

if($total_page > $end_page)
{
    # 다음 페이지 리스트는 마지막 리스트 페이지보다 한 페이지 증가하면 된다.
    $next_list = ($end_page + 1)* $page_size;
    echo " <a class='hello' href=$PHP_SELF?no=$next_list>▶</a><p>";
}
?>

</font>
</td>
</tr>
</table>
   </div>
    <div id="footer">
        <p>Copyright &copy; 2020.04 Programed by LeeSangMin. All Rights Reserved.</p>
    </div>
</body>
</html>