<?php
    $host = 'database-2.c1oejtbxtjeo.ap-northeast-2.rds.amazonaws.com';
    $user = 'tester3';
    $pw = 'tester!234';
    $db_name = 'boxful_test';

    $conn = mysqli_connect($host, $user, $pw, $db_name);
    if($conn){
        
        echo "DB 접속 완료<br>";
        
    }else{
        echo "DB 접속 실패";

    }
    
$sql = 'CREATE TABLE member(
id tinyint NOT NULL AUTO_INCREMENT PRIMARY KEY,
name char(4) NOT NULL,
member_id varchar(20) NOT NULL,
member_pw varchar(20) NOT NULL,
gender enum("남자", "여자") NOT NULL,
address varchar(50) NOT NULL,
birthday datetime NOT NULL);';
        
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "테이블 생성 완료";
    }else{
        echo mysqli_error($result);
        echo "테이블 생성 실패";
    }
?>