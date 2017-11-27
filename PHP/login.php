<!-- <!DOCTYPE html>
<html>
<head>
  <title>999</title>
</head>
<body>
  Hello World.
  <p></p>

 <form method="post" action="999.php" style="width:100%;margin:0 auto;">
            <div><label for="user_login">
                <input id="username" type="text" size="28" name="username" value="" />
            </label></div>
            <div><label for="user_password">
                <input id="password" type="password" size="28" name="password" value="" />
            </label></div>
            <div>
                <button type="submit" title="Pass" name=".login" value="Pass" >Pass</button>
            </div>
        </form>
 -->
<?php 
    
//設定資料庫位置
include "./DBclass.php";
$abc;
$loginID;
  $dsn = 'mysql:host='.DSN::HOST.';'.'dbname='.DSN::DBname;
//$dsn = 'mysql:host=163.30.54.10;dbname=bfdd';
//pdo連線   new PDO(dsn資料,使用者名稱,密碼);
  $pdo = new PDO($dsn,DSN::DB_UserName,DSN::DB_Password);
  $pdo->query("SET NAMES 'big5'");
  //print_r($pdo->errorInfo());
  $loginID=$_POST["username"];
  $sql="SELECT * FROM personnel WHERE ID_account=$loginID";
  $query=$pdo->query($sql);
  //$query->setFetchMode(PDO::FETCH_ASSOC);
  foreach ($query->fetchAll() as $row ) {
    $abc= $row['password'];
  }
if($_POST["password"] == $abc 
        && $_POST["username"] == $loginID){
            setcookie("login",$loginID, time()+3600);
            header("Location: ../Top/front_desk/home.html"); //網址為登入成功後要導向的頁面
    }
else  echo json_encode(array("code"=>"error"));
//array("code"=>"error",""=>"")
//["code"=>"error",""=>""]
?>
<!-- 
</body>
</html> -->