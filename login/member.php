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
        
        public function id_check_func(){
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
                                $id_check_count + 1;
                                //echo "<script>document.getElementById('id_check_result').innerHTML = '이미 사용중인 아이디입니다.';</script>";
                                echo "<script>alert('이미 사용중인 아이디입니다.');</script>";
                                break;
                            }else{
                                echo "<script>document.getElementById('id_check_result').innerHTML = '사용가능한 아이디입니다.';</script>";
                            }
                        }
                        
                    }else{
                        echo "Table 선택 실패";
                    }
                    return $id_check_count;
                }
                echo "DB 접속 성공<br>";
                $select_table_sql = "SELECT * FROM member";
                $select_table_query = mysqli_query($conn, $select_table_sql);
                if($select_table_query){
                    echo "Table 선택 성공<br>";
                    id_check($select_table_query, $this -> new_id, $this -> id_check_count);
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
                                $name_check_count + 1;
                                echo "<script>document.getElementById('name_check_result').innerHTML = '이미 사용중인 닉네임입니다.';</script>";
                                break;
                            }else{
                                echo "<script>document.getElementById('name_check_result').innerHTML = '사용가능한 닉네임입니다.';</script>";
                            }
                        }
                        
                    }else{
                        echo "Table 선택 실패";
                    }
                    return $name_check_count;
                }
                echo "DB 접속 성공<br>";
                $select_table_sql = "SELECT * FROM member";
                $select_table_query = mysqli_query($conn, $select_table_sql);
                if($select_table_query){
                    echo "Table 선택 성공<br>";
                    $name_check_return = name_check($select_table_query, $this -> new_name, $this -> name_check_count);
                }else{

                }
                
            }else{
                echo "DB 접속 실패";
            }
            //echo "<script>console.log({$name_check_return});</script>";
            return $name_check_return;
        }
        
        public function join_func(){
            // DB 연결
            $conn = mysqli_connect('localhost', 'root', 'autoset', 'boxful');
            if($conn){
                echo "<script>console.log('회원가입 - DB접속완료');</script>";
            }else{
                echo "<script>console.log('회원가입 - DB접속실패');</script>";
            }
            
            // TABLE 선택
            $select_table = "SELECT * FROM member";
            $select_table_query = mysqli_query($conn, $select_table);
            if($select_table_query){
                echo "<script>console.log('회원가입 - Table 선택완료');</script>";
            }else{
                echo "<script>console.log('회원가입 - Table 선택실패');</script>";
            }

            // TABLE에 DATA 추가
            $add_data_table = "INSERT INTO member (name, member_id, member_pw, gender, address, birthday) VALUES ('{$this -> new_name}', '{$this -> new_id}', '{$this -> new_pw}', '{$this -> new_gender}', '{$this -> new_address}', '{$this -> new_birthday}')";
            $add_data_table_query = mysqli_query($conn, $add_data_table);

            if($add_data_table_query){
                echo "<script>console.log('회원가입 - Table DATA 추가 완료');</script>";
            }else{
                echo "<script>console.log('회원가입 - Table DATA 추가 실패');</script>";
            }
    
    
        }
    }

if( array_key_exists('id_check',$_POST) ){
    $id_check_class = new Member();
    $id_check_class -> id_check_func();
}else if( array_key_exists('name_check',$_POST) ){
    $name_check_class = new Member();
    $name_check_class -> name_check_func();
}else if(array_key_exists('submit',$_POST)){
    $join = new Member();
    $join -> join_func();
}else{}
    
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
    
?>



