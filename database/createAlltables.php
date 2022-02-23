<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "BlogDB";
//sql to create table
$table1 = "CREATE TABLE IF NOT EXISTS BlogPosts ( post_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
post_title TEXT NOT NULL, Key_words TEXT NOT NULL, post_author VARCHAR(60) NOT NULL, author_id VARCHAR(60) NOT NULL,
post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
img_path VARCHAR(255) NULL, post_status VARCHAR(20) DEFAULT 'published' , comment_count BIGINT(20)  DEFAULT 0, 
post_modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP, comment_status VARCHAR(20) DEFAULT 'open',
post_content MEDIUMTEXT, post_publish_date DATETIME DEFAULT NOW(), post_category VARCHAR(20) NOT NULL
)";

$table2 = "CREATE TABLE IF NOT EXISTS BlogComments( comment_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, comment_post_id INT(6) NOT NULL, 
comment_author TINYTEXT NOT NULL DEFAULT 'anonymous', comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, comment_content TEXT,
comment_approval VARCHAR(20) DEFAULT 'yes', comment_author_id VARCHAR(60) NOT NULL )";

$table3 = "CREATE TABLE IF NOT EXISTS adminBlog ( userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, userName VARCHAR(60) NOT NULL, 
userSurname VARCHAR(60) NOT NULL, user_login VARCHAR(60) NOT NULL, user_pass VARCHAR(50) NOT NULL, author_id VARCHAR(30) NOT NULL )";

$tables=[$table1, $table2, $table3];
//Create Connection
foreach ($tables as $key => $sql) {
    try{
        $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
        //setting PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //use exec() because no results are returned\
        $conn->exec($sql);
        //echo "Table have been created successfully";
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null; 
}
?>
