<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    include 'main.php';
    ?>
    
    <?php
    //DB연결하기
    include 'db.php';
    
    #LIST 설정
    # 1. 한 페이지에 보여질 게시물의 수
    $page_size=5;
    
    # 2. 페이지 나누기에 표시될 페이지의 수
    $page_list_size = 5;
    $no = $_GET[no];
    
    if(!$no || $no < 0) $no = 0;//$no값이 안넘어 오거나 잘못된(음수)값이 넘어오는 경우 0으로 처리
    
    //DB에서 페이지의 첫번째 글($no)부터 $page_size 마큼의 글을 가져온다.
    $query = "select * from board order by id desc limit $no, $page_size";
    $result = mysql_query($query, $db);
    
    //총 게시물 수를 구한다.
    // count를 통해 구할 수 있는데 count(항목)과 같은 방법으로 사용한다. *은 모든 항목을 뜻한다.
    //총 해당 항목의 값을 가지는 게시물의 개수가 얼마인가를 묻는 것이다.
    
    $result_count=mysql_query("select count(*) from board",$db);
    $result_row=mysql_fetch_row($result_count);
    $total_row = $result_row[0];
    //결과의 첫번째 열이 count(*)의 결과이다.
    
    #총 페이지 계산
    if($total_row <= 0)$total_row = 0;//총 게시물의 값이 없거나 할 경우 기본값으로 세팅
    
    $total_page = floor(($total_row - 1)/$page_size);//총 게시물을 페이지 사이즈로 나눈뒤 내림을 한다.
    
    #총 페이지는 총 게시물의 수를 $page_size로 나누면 알수있다.
    #(floor는 내림을 하는 수학함수이다.)
    
    #현재 페이지 계산
    $current_page = floor($no/$page_size);
    ?>
    <div id="cont">
        <h3>게시판</h3>
        <div class="list">
        <table width="580" border="0" cellpadding="2" cellspacing="1" bgcolor="#777777">
            <tr height="20" bgcolor="#999999">
                <td width="50" align="center"><font color="white">번호</font></td>
                <td width="250" align="center"><font color="white">제목</font></td>
                <td width="130" align="center"><font color=white>글쓴이</font></td>
                <td width="150" align="center"><font color=white>날짜</font></td>
                <td width="150" align="center"><font color=white>IP주소</font></td>
                <td width="80" align="center"><font color=white>조회수</font></td>
            </tr>
            
            <?php
            while($row=mysql_fetch_array($result)){
            ?>
            <tr>
                <!-- 번호 -->
                <td height=20  bgcolor=white align=center>
                    <a class="hello" href=dbread.php?id=<?=$row[id]?>&no=<?=$no?>><?=$row[id]?></a>
                </td>
                <!-- 번호 끝 -->
                <!-- 제목 -->
                <td width="250" height=20  bgcolor=white>&nbsp;
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
            <?php
            }
            //DB와의 연결을 끝는다.
            mysql_close($db);
            ?>
        </table>
        
        <!-- 페이지를 표시하기 위한 테이블 -->
        <table border="0">
            <tr>
                <td width=600 height=20 align=center rowspan=4>
                    <font color=gray>
                        &nbsp;
                        <?php
                        $page = $_GET[page];
                        #페이지 리스트
                        $start_page = (int)($current_page/$page_list_size) * $page_list_size;
                        
                        #페이지 리스트의 마지막 페이지가 몇번째 페이지인지 구하는 부분이다.
                        $end_page = $start_page + $page_list_size - 1;
                        if($total_page<$end_page) $end_page = $total_page;
                        
                        #이전 페이지 리스트 보여주기
                        if($start_page >= $page_list_size){
                            $prev_list = ($start_page - 1)*$page_size;
                            echo "<a class='hello' href=\"$PHP_SELF?no=$prev_list\">◀</a>\n";
                        }
                        #페이지 리스트를 출력
                        for($i=$start_page; $i<=$end_page; $i++){
                            $page=$page_size*$i; //페이지값을 no값으로 변환.
                            $page_num = $i+1; //실제 페이지 값이 0부터 시작하므로 표시할때는 1을 더해준다. 페이지 0->1
                            
                            if($no!=$page){//현재 페이지가 아닐 경우만 링크를 표시
                                echo "<a class='hello' href=\"$PHP_SELF?no=$page\">";
                            }
                            echo " $page_num ";//페이지를 표시
                            
                            if ($no!=$page){
                                echo "</a>";
                            }
                        }
                        
                        if($total_page > $end_page){
                            #다음 페이지 리스트는 마지막 리스트 페이지보다 한 페이지 증가하면 된다.
                            $next_list = ($end_page + 1)*$page_size;
                            echo "<a class='hello' href=$PHP_SELF?no=$next_list>▶</a><p>";
                        }
                        ?>
                    </font>
                </td>
            </tr>
        </table>
        <?php
        if(!$_SESSION['userid']){
            
        }else{
        ?>
        <center>
        <a href="write.php" class="hello">글쓰기</a>
        </center>
        <?php
        }
        ?>
        </div>
    </div>
</body>
</html>