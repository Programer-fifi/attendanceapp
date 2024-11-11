<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
function clearTable($dbo,$tabName)
{
    $c="delete from :tabname";
    $s=$dbo->conn->prepare($c);
    try{
        $s->execute([":tabname"=>$tabName]);
    }
    catch(PDOException $oo)
    {

    }
}
$dbo=new Database();

//student details
$c = "create table if not exists student_details(
    id int auto_increment primary key,
    student_id int unique,
    roll_no varchar(20) unique,
    name varchar(50)
)";
$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>student_details created");
} catch(PDOException $o) {
    echo ("<br>Error: " . $o->getMessage());
}

//course details
$c = "create table course_details(
    id int auto_increment primary key,
    code varchar(20) unique,
    title varchar(50),
    credit int
)";
$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>course_details created");
} catch(PDOException $o) {
    echo ("<br>course_details not created". $o->getMessage());
}

//faculty details
$c = "create table faculty_details(
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";
$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>faculty_details created");
} catch(PDOException $o) {
    echo ("<br>faculty_details not created". $o->getMessage());
}

//session details
$c = "create table session_details(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique(year,term)
)";
$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>session_details created");
} catch(PDOException $o) {
    echo ("<br>session_details not created". $o->getMessage());
}
//course registration
$c = "create table course_registration(
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id,course_id,session_id)
)";
$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>course_registration created");
} catch(PDOException $o) {
    echo ("<br>course_registration not created". $o->getMessage());
}
//course allotment
$c = "create table course_allotment(
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id,course_id,session_id)
)";
$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>course_allotment created");
} catch(PDOException $o) {
    echo ("<br>course_allotment not created". $o->getMessage());
}
//attendance details
$c = "create table attendance_details(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id,course_id,session_id,student_id)
)";
$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>attendance_details created");
} catch(PDOException $o) {
    echo ("<br>attendance_details not created". $o->getMessage());
}

$c = "insert ignore into student_details
(roll_no, name)
 values
('CS1', 'Bushra'), 
('CS2', 'Fabiha Farooq'), 
('CS3', 'Fatima Nasir'), 
('CS4', 'Amna Iftikhar'), 
('CS5', 'Manahil Nadeem'), 
('CS6', 'Wareesha Javed'), 
('CS7', 'Syeda Tasbiha Batool'), 
('CS8', 'Bushra'), 
('CS9', 'Maham'), 
('CS10', 'Maryam Arif'), 
('CS11', 'Wisal'), 
('CS12', 'Sana Fatima'), 
('CS13', 'Fatima Mashkoor'), 
('CS14', 'Hooria Khan'), 
('CS15', 'Atiya Shakir'), 
('CS16', 'Aamna Ali'), 
('CS17', 'Sahiqua Majid'), 
('CS18', 'Maliha Siddiqui'), 
('CS19', 'Zunaira Yousuf'), 
('CS20', 'Warisha Nadeem'), 
('CS21', 'Maryam Moazzama'), 
('CS22', 'Kinza Baig'), 
('CS23', 'Nabeeha Faraz'), 
('CS24', 'Aneesa Ali Abbasi'), 
('CS25', 'Roumesa Ali Khan'), 
('CS26', 'Aliza Ahmed Khan'), 
('CS27', 'Alisha'), 
('CS28', 'Kanza Bint e Khalid'), 
('CS29', 'Maham Mazhar'), 
('CS30', 'Kassabira Ali'), 
('CS31', 'Aisha Mughal'), 
('CS32', 'Hooria Rauf'), 
('CS33', 'Taleaa Shah'), 
('CS34', 'Areeba Muneeb'), 
('CS35', 'Huba Arif'), 
('CS36', 'Mehwish Khan'), 
('CS37', 'Uqba Rafiq'), 
('CS38', 'Alishba Jaffer'), 
('CS39', 'Javeria Ali'), 
('CS40', 'Aminah Fahim Jilani'), 
('CS41', 'Habiba Munir'), 
('CS42', 'Rumaisa Naseem'), 
('CS43', 'Omaima Khan'), 
('CS44', 'Hadiqa Razzaq'), 
('CS45', 'Hooriya Baigum'), 
('CS46', 'Aisha Atif'), 
('CS47', 'Anamta Mrtaza'), 
('CS48', 'Syeda Arooba Azam'), 
('CS49', 'Imran Sajid'), 
('CS50', 'Maliha Tariq Rao'), 
('CS51', 'Lubaina Kauser'), 
('CS52', 'Zuhaa Zafar'), 
('CS53', 'Aena Amir'), 
('CS54', 'Dua Shamim'), 
('CS55', 'Hafsa Khan'), 
('CS56', 'Zulekha Hussain'), 
('CS57', 'Rohina Maryam'), 
('CS58', 'Mubashira Asif'), 
('CS59', 'Natalia Fatima Abbasi'), 
('CS60', 'Bisma Hashmi'), 
('CS61', 'Zainab Malik'), 
('CS62', 'Hafsa Bint e Arif'), 
('CS63', 'Yousma Siddiqui'), 
('CS64', 'Neha Maryam'), 
('CS65', 'Safia Baig'), 
('CS66', 'Waniya Khan'), 
('CS67', 'Ghulam Fatima'), 
('CS68', 'Nida Naeem'), 
('CS69', 'Arshma Ghufran'), 
('CS70', 'Syeda Tasbiha Batool'), 
('CS71', 'Eman Jilani'), 
('CS72', 'Musfirah Fatima'), 
('CS73', 'Ghulam Sakina'), 
('CS74', 'Sheeba Maryam'), 
('CS75', 'Yashra Fatima'), 
('CS76', 'Rameesha'), 
('CS77', 'Syeda Baneen Zehra'), 
('CS78', 'Mehak Binish'), 
('CS79', 'Muskan Erum'), 
('CS80', 'Abi Jaeil'), 
('CS81', 'Amna Rehan'), 
('CS82', 'Ayesha Khan'), 
('CS83', 'Hoor Noman'), 
('CS84', 'Hafeeza'), 
('CS85', 'Ashba'), 
('CS86', 'Eman Mirza'), 
('CS87', 'Syeda Yashab Zehra Kazmi'), 
('CS88', 'Syeda Hafsa Sohail'), 
('CS89', 'Zainab Minhas'), 
('CS90', 'Noorain'), 
('CS91', 'Fakaiha Faheem'), 
('CS92', 'Abeeha'), 
('CS93', 'Maryam'), 
('CS94', 'Adeeba Bilal'), 
('CS95', 'Iqra Wali'), 
('CS96', 'Syeda Meerab Hassan Jaffri'), 
('CS97', 'Abiha Khalid'), 
('CS98', 'Areeba Faisal'), 
('CS99', 'Syeda Maheen Zahra Zaidi'), 
('CS100', 'Huda Khurram'),
('CS101', 'Nayab Fatima Gohar'),
('CS102', 'Memona Bhatti'),
('CS103', 'Roumesa Ali Khan'),
('CS104', 'Ume Hani'),
('CS105', 'Gul Nida')
";
$s = $dbo->conn->prepare($c);
try{
    $s->execute();
    echo("<br>no duplicate entry");
}
 catch(PDOException $o) 
 {
    echo("<br>duplicate entry". $o->getMessage());
 }
 $c = "insert ignore into faculty_details
 (id, user_name, password, name) 
 values
(1, 'paras', 'gdgc', 'paras gul'), 
(2, 'shazia', 'gdgc', 'shazia'), 
(3, 'asma', 'gdgc', 'asma'), 
(4, 'fifi', 'gdgc', 'fatima gohar')";
$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>No duplicate entry");
} catch(PDOException $o) {
    echo ("<br>duplicate entry: " . $o->getMessage());
}
$c = "insert ignore into session_details 
(id, year, term) 
values
(1, 2024, 'sep - dec'), 
(2, 2025, 'jan - may')";
$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>No duplicate entry");
} catch(PDOException $o) {
    echo ("<br>duplicate entry: " . $o->getMessage());
}
$c = "insert into course_details
(id, title, code, credit) 
values
(1, 'Computer', 'CS101', 80), 
(2, 'Math', 'MTH102', 95), 
(3, 'English', 'ENG103', 88), 
(4, 'Urdu', 'URD104', 76), 
(5, 'PST', 'PST105', 85), 
(6, 'Physics', 'PHY106', 90)";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>course_details inserted");
} catch(PDOException $o) {
    echo ("<br>duplicate entry: " . $o->getMessage());
}

//iterate over all the 105 students
//for each of them choose max 6 random courses, from 1 to 6

for($i=1;$i<=105;$i++)
?>
