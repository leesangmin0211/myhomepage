<meta charset="utf-8">
  <?php
   $db_name = 'sangmin';
   $db_user = 'root';
   $db_pw = 'apmsetup';
   $dbconn = @mysql_connect('localhost', $db_user, $db_pw) or die("MySQL에 연결할 수 없습니다.");
   mysql_select_db($db_name, $dbconn) or die("DB에 연결할 수 없습니다.");
   mysql_query('set names utf8');
   $query = "create table board
        (id int not null auto_increment,
         name varchar(20) character set utf8 collate utf8_general_ci not null,
         nick varchar(20),
         pass varchar(20),
         title varchar(70),
         content text,
         wdate datetime null,
         ip varchar(16) null,
         view int(11) null,
         primary key (id)
    )";
	 
   $result = mysql_query($query, $dbconn);
   if(!$result)
   {
      echo "테이블 생성에 실패하였습니다.";
   }
   else
   {
      echo "테이블 생성에 성공하였습니다.";
   }
?>
   