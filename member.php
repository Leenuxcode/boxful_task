<link rel="stylesheet" href="../css/member/member.css" />
<h1>회원가입</h1><br>
<form action="sign_up.php" method="POST" class="sign_up_form_wrap" >
    <input type="text" name="sign_id" placeholder="아이디" />
    <input type="text" name="sign_pw" placeholder="비밀번호" />
    <input type="text" name="sign_name" placeholder="닉네임" /> 
    <input type="text" name="gender" placeholder="성별" />
    <input type="text" name="address" placeholder="주소" />
    <input type="text" name="birthday" placeholder="생년월일" /> 
    <input type="submit" name="submit" value="회원가입" />
</form>
<a href="./login.php" class="sign_up_page_login_btn">로그인</a><br>
<?php

include "variable.php";
    if(isset($_POST['submit'])){
        $new_id = $_POST['sign_id'];
        $new_pw = $_POST['sign_pw'];
        $new_name = $_POST['sign_name'];

        echo "id : ".$new_id."<br>";
        echo "pw : ".$new_pw."<br>";
        echo "name : ".$new_name."<br>";
        
        $conn = mysqli_connect('localhost', 'root', 'autoset', 'lee');
        if(mysqli_connect_errno()){
            echo "DB 접속 실패<br>";
        }else{
            echo "DB 접속 성공<br>";
            
        }

        $sql = "INSERT INTO info (name, member_id, member_pw) VALUES ('$new_name', '$new_id', '$new_pw')";
        if(mysqli_query($conn, $sql)){
            echo "회원가입 완료";
        }else{
            echo "회원가입 실패";
        }
    }else{

    }
    mysqli_close($conn);
?>