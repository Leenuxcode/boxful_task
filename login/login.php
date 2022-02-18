<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/login/login.css" type="text/css" />
    </head>
    <body>
        <header>
            <div class="logo"></div>
        </header>
        <div class="login_form_wrap">
            <form action="./login.php" method="POST" class="form">
                <div class="id_pw_wrap">
                    <input type="text" name="user_id" placeholder="ID를 입력하세요" class="input_id"/>
                    <input type="text" name="user_pw" placeholder="PW를 입력하세요" class="input_pw"/>
                </div>
                <div class="submit_wrap">
                    <input type="submit" name="submit" value="로그인" class="input_submit"/>
                </div>
            </form>
            <form action="./member.php" method="POST" class="member_form">
                <input type="submit" name="member_submit" class="member_submit" value="회원가입"/>
            </form>
        </div>
    </body>
</html>
<?php
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];

if( isset($_POST['submit']) ){
    echo "<script>console.log('로그인 클릭');</script>";
    // DB 연결
    $conn = mysqli_connect('localhost', 'root', 'autoset' ,'boxful');
    if($conn){
        echo "<script>console.log('DB 연결 완료');</script>";
    }else{
        echo "<script>console.log('DB 연결 실패');</script>";
    }

    // Table 선택
    $select_table = "SELECT * FROM member";
    $select_table_query = mysqli_query($conn, $select_table);
    if($select_table_query){
        echo "<script>console.log('Table 선택 완료');</script>";
    }else{
        echo "<script>console.log('Table 선택 실패');</script>";
    }

    // 아이디와 패스워드 비교
    if( mysqli_num_rows($select_table_query) > 0 ){
        while( $row = mysqli_fetch_array($select_table_query) ){
            if($user_id == $row['member_id'] && $user_pw == $row['member_pw']){
                //echo "<script>location.href = './login_ok.php';</script>";
                echo $row["name"]."님 반갑습니다.<br>";
                // echo "<script>console.log('{$row["name"]}님 반갑습니다.');</script>";
            }else{
                echo "아이디와 비밀번호를 확인해주세요.<br>";
            }
        }
    }

    
}else{

}
?>
