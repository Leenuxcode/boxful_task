<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/member/member.css" />
    </head>
    <body>
        <div class="header_wrap">
            <div class="logo"></div><div class="title">회원가입</div>
        </div>
        <br>
        <form action="./member.php" method="POST" class="sign_up_form_wrap" >
            <div class="id_wrap">
                <input type="text" name="user_id" placeholder="아이디(20자이하)" class="input_id" size="20" maxlength="20"/>
                <input type="submit" name="id_check" class="id_check_btn" value="중복확인" />
            </div>
            <input type="text" name="user_pw" placeholder="비밀번호(20자이하)" size="20" maxlength="20"/>
            <input type="text" name="user_name" placeholder="닉네임" /> 
            <input type="text" name="user_gender" placeholder="성별(남자, 여자)" />
            <input type="text" name="user_address" placeholder="주소" />
            <input type="text" name="user_birthday" placeholder="생년월일" />
            <input type="submit" name="submit" value="회원가입" class="submit_text"/>
            <a href="./login.php" class="login_btn">로그인</a><br>
        </form>
        <script language="javascript">
            const my_a = 0;
            <?php
            
            // html - script - <?php
            include "variable.php";

            // Table에 DATA를 삽입하는 함수
            function inser_into(){
                $new_id = $_POST['user_id'];
                $new_pw = $_POST['user_pw'];
                $new_name = $_POST['user_name'];
                $new_gender = $_POST['user_gender'];
                $new_address = $_POST['user_address'];
                $new_birthday = $_POST['user_birthday'];
                $conn = mysqli_connect('localhost', 'root', 'autoset', 'boxful');
                $sql = "INSERT INTO member (name, member_id, member_pw, gender, address, birthday) VALUES ('$new_name', '$new_id', '$new_pw', '$new_gender', '$new_address', '$new_birthday')";
                if(mysqli_query($conn, $sql)){
                    echo '<script>alert("회원가입 완료");</script>';
                    mysqli_close($conn);
                }else{
                    echo '<script>alert("회원가입 실패");</script>';
                    mysqli_close($conn);
                }
            }


            function id_check(){
                echo "<script>alert(1);</script>";
                
                $check_count = 0;
                $search_value = $_POST['member_id'];
                $conn = mysqli_connect('localhost', 'root', 'autoset', 'boxful');
                if(mysqli_connect_errno()){
                    echo "DB 접속 실패<br>";
                }else{
                    echo "DB 접속 성공<br>";
                    
                }
                
                // 테이블을 조회해서 name이랑 member_id가 겹치면 회원가입 실패
                $table_info = "SELECT*FROM `member`";
                $table_info_query = mysqli_query($conn, $table_info);
                if($table_info_query){
                    echo "테이블 조회 성공<br>";
                }else{
                    echo "테이블 조회 실패<br>";
                }
                $new_id = $_POST['user_id'];
                // 테이블 전체 개수를 구한다.
                $table_row_count = mysqli_num_rows($table_info_query);
                echo "Table(member) row 개수 : ".$table_row_count."<br>";

                // 아이디의 중복을 확인하기 위해 테이블내의 이름을 전부 가져와서 넣는다.
                $table_info_array = array();

                while($table_row_value = mysqli_fetch_assoc($table_info_query)){
                    array_push($table_info_array, $table_row_value['member_id']);
                }
                // table의 전체 아이디를 입력한 아이디와 비교한다.
                foreach($table_info_array as $value){
                    if($value == $new_id){
                        // 아이디가 중복이라면
                        $check_count += 1;
                    }else{  
                        // 아이디 중복이 없다면
                    }
                }
                if($check_count == 0){
                    // 아이디 중복이 없다면
                    inser_into();
                }else{
                    // 아이디 중복이라면
                    // echo "<script>alert('.$new_id.는 이미 존재합니다.');</script>";
                    echo $new_id;
                }
                echo $check_count;
                
            }

            if(array_key_exists('id_check', $_POST)) {
                id_check();
            }
            if(isset($_POST['submit'])){

            }else{

            }
            ?>

        </script>
    </body>
</html>


<?php

// html - script - <?php
include "variable.php";

// Table에 DATA를 삽입하는 함수
/*
function inser_into(){
    $new_id = $_POST['user_id'];
    $new_pw = $_POST['user_pw'];
    $new_name = $_POST['user_name'];
    $new_gender = $_POST['user_gender'];
    $new_address = $_POST['user_address'];
    $new_birthday = $_POST['user_birthday'];
    $conn = mysqli_connect('localhost', 'root', 'autoset', 'boxful');
    $sql = "INSERT INTO member (name, member_id, member_pw, gender, address, birthday) VALUES ('$new_name', '$new_id', '$new_pw', '$new_gender', '$new_address', '$new_birthday')";
    if(mysqli_query($conn, $sql)){
        echo '<script>alert("회원가입 완료");</script>';
        mysqli_close($conn);
    }else{
        echo '<script>alert("회원가입 실패");</script>';
        mysqli_close($conn);
    }
}
*/
/*
function id_check(){
    $check_count = 0;
    $conn = mysqli_connect('localhost', 'root', 'autoset', 'boxful');
    if(mysqli_connect_errno()){
        echo "DB 접속 실패<br>";
    }else{
        echo "DB 접속 성공<br>";
        
    }
    
    // 테이블을 조회해서 name이랑 member_id가 겹치면 회원가입 실패
    $table_info = "SELECT*FROM `member`";
    $table_info_query = mysqli_query($conn, $table_info);
    if($table_info_query){
        echo "테이블 조회 성공<br>";
    }else{
        echo "테이블 조회 실패<br>";
    }
    $new_id = $_POST['user_id'];
    // 테이블 전체 개수를 구한다.
    $table_row_count = mysqli_num_rows($table_info_query);
    echo "Table(member) row 개수 : ".$table_row_count."<br>";

    // 아이디의 중복을 확인하기 위해 테이블내의 이름을 전부 가져와서 넣는다.
    $table_info_array = array();

    while($table_row_value = mysqli_fetch_assoc($table_info_query)){
        array_push($table_info_array, $table_row_value['member_id']);
    }
    // table의 전체 아이디를 입력한 아이디와 비교한다.
    foreach($table_info_array as $value){
        if($value == $new_id){
            // 아이디가 중복이라면
            $check_count += 1;
        }else{  
            // 아이디 중복이 없다면
        }
    }
    if($check_count == 0){
        // 아이디 중복이 없다면
        inser_into();
    }else{
        // 아이디 중복이라면
        echo "<script>alert('.$new_id.'는 이미 존재합니다.');</script>";
    }
    echo $check_count;
}
*/
if(array_key_exists('id_check', $_POST)) {
    id_check();
}
/*
if($select_table_query){
    echo "Table 선택 완료<br>";
    $table_rows = mysqli_num_rows($select_table_query);
    echo "Table 개수 : ".$table_rows."<br>";
    // table의 row수만큼 반복하며 table의 member_id에 해당하는 값을 배열에 넣는다.
    $table_info_array = array();
    while($table_row_value = mysqli_fetch_array($select_table_query)){
        array_push($table_info_array, $table_row_value['member_id']);
    }
    // 반복문이 끝나면 $table_info_array에는 모든 member_id가 저장되어있다.
    foreach($table_info_array as $value){
        if($value === $this -> new_id){
            $this -> id_check_count = 'false';
        }else{
            $this -> id_check_count = 'true';
        }
    }
    echo $this -> id_check_count;
    if($this -> id_check_count === 'true'){
        echo "<script>document.getElementById('id_check_result').innerHTML = '사용가능한 아이디입니다.';</script>";
    }else{
        echo "<script>document.getElementById('id_check_result').innerHTML = '이미 사용중인 아이디입니다.';</script>";
    }
    
}else{
    echo "Table 선택 실패";
}
*/
/*

    <!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/member/member.css" />
    </head>
    <body>
        <div class="header_wrap">
            <div class="logo"></div><div class="title">회원가입</div>
        </div>
        <br>
        <form action="./member.php" method="POST" class="sign_up_form_wrap" >
            <div class="id_wrap">
                <input type="text" name="user_id" placeholder="아이디(20자 이하)" class="input_id" size="20" maxlength="20"/>
                <input type="submit" name="id_check" class="id_check_btn" value="중복확인" />
                <p id="id_check_result" class="id_check_result"></p>
            </div>
            <input type="text" name="user_pw" placeholder="비밀번호(20자 이하)" size="20" maxlength="20"/>
            <div class="name_wrap">
                <input type="text" name="user_name" placeholder="닉네임(20자 이하)" class="input_name" size="20" maxlength="20"/>
                <input type="submit" name="name_check" class="name_check_btn" value="중복확인" />
                <p id="name_check_result" class="name_check_result"></p>
            </div>
            <input type="text" name="user_gender" placeholder="성별(남자, 여자)" />
            <input type="text" name="user_address" placeholder="주소" class="input_address"/>
            <input type="text" name="user_birthday" placeholder="생년월일" />
            <input type="submit" name="submit" value="회원가입" class="submit_text"/>
            <a href="./login.php" class="login_btn">로그인</a><br>
        </form>
        <script>
        </script>
    </body>
</html>
<?php
    include "./variable.php";
    class Member{

        function __construct() {
            $this -> new_id = $_POST['user_id'];
            $this -> new_pw = $_POST['user_pw'];
            $this -> new_name = $_POST['user_name'];
            $this -> new_gender = $_POST['user_gender'];
            $this -> new_address = $_POST['user_address'];
            $this -> new_birthday = $_POST['user_birthday'];
            $this -> id_check_count = 0;
            $this -> name_check_count = 0;
        }
        
        public function member_func(){
            echo "<script>document.getElementById('id_check_result').innerHTML = '';</script>";
            $conn = mysqli_connect('localhost', 'root', 'autoset', 'boxful');
            if($conn){

                function id_check($select_table_query, $new_id, $id_check_count){
                    if($select_table_query){
                        echo "Table 선택 완료<br>";
                        $table_rows = mysqli_num_rows($select_table_query);
                        echo "Table 개수 : ".$table_rows."<br>";
                        // table의 row수만큼 반복하며 table의 member_id에 해당하는 값을 배열에 넣는다.
                        $table_info_array = array();
                        while($table_row_value = mysqli_fetch_array($select_table_query)){
                            array_push($table_info_array, $table_row_value['member_id']);
                        }
                        // 반복문이 끝나면 $table_info_array에는 모든 member_id가 저장되어있다.
                        foreach($table_info_array as $value){
                            echo $value."----".$new_id."<br>";
                            if($value == $new_id){
                                $this -> id_check_count + 1;
                                echo "<script>document.getElementById('id_check_result').innerHTML = '이미 사용중인 아이디입니다.';</script>";
                                break;
                            }else{
                                echo "<script>document.getElementById('id_check_result').innerHTML = '사용가능한 아이디입니다.';</script>";
                            }
                        }
                        
                    }else{
                        echo "Table 선택 실패";
                    }
                    return $this -> id_check_count;
                }
                function name_check($select_table_query, $new_name, $name_check_count){
                    if($select_table_query){
                        echo "Table 선택 완료<br>";
                        $table_rows = mysqli_num_rows($select_table_query);
                        echo "Table 개수 : ".$table_rows."<br>";
                        // table의 row수만큼 반복하며 table의 name에 해당하는 값을 배열에 넣는다.
                        $table_info_array = array();
                        while($table_row_value = mysqli_fetch_array($select_table_query)){
                            array_push($table_info_array, $table_row_value['name']);
                        }
                        // 반복문이 끝나면 $table_info_array에는 모든 name이 저장되어있다.
                        foreach($table_info_array as $value){
                            echo $value."----".$new_name."<br>";
                            if($value == $new_name){
                                $this -> name_check_count + 1;
                                echo "<script>document.getElementById('name_check_result').innerHTML = '이미 사용중인 닉네임입니다.';</script>";
                                break;
                            }else{
                                echo "<script>document.getElementById('name_check_result').innerHTML = '사용가능한 닉네임입니다.';</script>";
                            }
                        }
                        
                    }else{
                        echo "Table 선택 실패";
                    }
                    return $this -> id_check_count;
                }
                echo "DB 접속 성공<br>";
                $select_table_sql = "SELECT * FROM member";
                $select_table_query = mysqli_query($conn, $select_table_sql);
                if($select_table_query){
                    echo "Table 선택 성공<br>";
                    if( id_check($select_table_query, $this -> new_id, $this -> id_check_count) == 0 && array_key_exists('name_check',$_POST)){
                        name_check($select_table_query, $this -> new_name, $this -> name_check_count);
                    }else{

                    }
                }else{

                }
                
            }else{
                echo "DB 접속 실패";
            }
        }
        public function name_check_func(){
            echo "<script>document.getElementById('id_check_result').innerHTML = '';</script>";
            $conn = mysqli_connect('localhost', 'root', 'autoset', 'boxful');
            if($conn){

                function name_check($select_table_query, $new_name, $name_check_count){
                    if($select_table_query){
                        echo "Table 선택 완료<br>";
                        $table_rows = mysqli_num_rows($select_table_query);
                        echo "Table 개수 : ".$table_rows."<br>";
                        // table의 row수만큼 반복하며 table의 name에 해당하는 값을 배열에 넣는다.
                        $table_info_array = array();
                        while($table_row_value = mysqli_fetch_array($select_table_query)){
                            array_push($table_info_array, $table_row_value['name']);
                        }
                        // 반복문이 끝나면 $table_info_array에는 모든 name이 저장되어있다.
                        foreach($table_info_array as $value){
                            echo $value."----".$new_name."<br>";
                            if($value == $new_name){
                                $this -> name_check_count + 1;
                                echo "<script>document.getElementById('name_check_result').innerHTML = '이미 사용중인 닉네임입니다.';</script>";
                                break;
                            }else{
                                echo "<script>document.getElementById('name_check_result').innerHTML = '사용가능한 닉네임입니다.';</script>";
                            }
                        }
                        
                    }else{
                        echo "Table 선택 실패";
                    }
                    return $this -> id_check_count;
                }
                echo "DB 접속 성공<br>";
                $select_table_sql = "SELECT * FROM member";
                $select_table_query = mysqli_query($conn, $select_table_sql);
                if($select_table_query){
                    echo "Table 선택 성공<br>";
                    name_check($select_table_query, $this -> new_name, $this -> name_check_count);
                }else{

                }
                
            }else{
                echo "DB 접속 실패";
            }
        }
    }
    function temp(){

        $new_id = $_POST['user_id'];
        $new_pw = $_POST['user_pw'];
        $new_name = $_POST['user_name'];
        $new_gender = $_POST['user_gender'];
        $new_address = $_POST['user_address'];
        $new_birthday = $_POST['user_birthday'];

        $conn = mysqli_connect('localhost', 'root', 'autoset', 'boxful');
        if($conn){
            echo "DB 접속 완료 <br>";
            $table_select_sql = "SELECT * FROM member";
            $table_select = mysqli_query($conn, $table_select_sql);
            if( $table_select ){
                echo "Table 선택 완료<br>";

            }else{
                echo "Table 선택 실패<br>";
            }
        }else{
            echo "DB 접속 실패 <br>";
        }
    }
    
    if(array_key_exists('id_check',$_POST)){
        $first_class = new Member();
        $first_class -> member_func();
    }else if(array_key_exists('name_check',$_POST)){
        $second_class = new Member();
        $second_class -> name_check_func();
    }
    
    
?>

*/
?>
