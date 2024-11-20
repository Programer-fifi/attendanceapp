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
$c="create table student_details
(
    id int auto_increment primary key,
    roll_no varchar(20) unique,
    name varchar(50)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>student_details created");
}
catch(PDOException $o)
{
echo("<br>student_details not created");
}

$c="create table course_details
(
    id int auto_increment primary key,
    code varchar(20) unique,
    title varchar(50),
    credit int
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>course_details created");
}
catch(PDOException $o)
{
echo("<br>course_details not created");
}


$c="create table faculty_details
(
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>faculty_details created");
}
catch(PDOException $o)
{
echo("<br>faculty_details not created");
}


$c="create table session_details
(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique (year,term)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>session_details created");
}
catch(PDOException $o)
{
echo("<br>session_details not created");
}



$c="create table course_registration
(
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id,course_id,session_id)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>course_registration created");
}
catch(PDOException $o)
{
echo("<br>course_registration not created");
}

$c="create table course_allotment
(
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id,course_id,session_id)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>course_allotment created");
}
catch(PDOException $o)
{
echo("<br>course_allotment not created");
}

$c="create table attendance_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id,course_id,session_id,student_id,on_date)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>attendance_details created");
}
catch(PDOException $o)
{
echo("<br>attendance_details not created");
}

$c="insert into student_details
(id,roll_no,name)
values
(1, 'CS1', 'Bushra'), 
(2, 'CS2', 'Fabiha Farooq'), 
(3, 'CS3', 'Fatima Nasir'), 
(4, 'CS4', 'Amna Iftikhar'), 
(5, 'CS5', 'Manahil Nadeem'), 
(6, 'CS6', 'Wareesha Javed'), 
(7, 'CS7', 'Syeda Tasbiha Batool'), 
(8, 'CS8', 'Bushra'), 
(9, 'CS9', 'Maham'), 
(10, 'CS10', 'Maryam Arif'), 
(11, 'CS11', 'Wisal'), 
(12, 'CS12', 'Sana Fatima'), 
(13, 'CS13', 'Fatima Mashkoor'), 
(14, 'CS14', 'Hooria Khan'), 
(15, 'CS15', 'Atiya Shakir'), 
(16, 'CS16', 'Aamna Ali'), 
(17, 'CS17', 'Sahiqua Majid'), 
(18, 'CS18', 'Maliha Siddiqui'), 
(19, 'CS19', 'Zunaira Yousuf'), 
(20, 'CS20', 'Warisha Nadeem'), 
(21, 'CS21', 'Maryam Moazzama'), 
(22, 'CS22', 'Kinza Baig'), 
(23, 'CS23', 'Nabeeha Faraz'), 
(24, 'CS24', 'Aneesa Ali Abbasi'), 
(25, 'CS25', 'Roumesa Ali Khan'), 
(26, 'CS26', 'Aliza Ahmed Khan'), 
(27, 'CS27', 'Alisha'), 
(28, 'CS28', 'Kanza Bint e Khalid'), 
(29, 'CS29', 'Maham Mazhar'), 
(30, 'CS30', 'Kassabira Ali'), 
(31, 'CS31', 'Aisha Mughal'), 
(32, 'CS32', 'Hooria Rauf'), 
(33, 'CS33', 'Taleaa Shah'), 
(34, 'CS34', 'Areeba Muneeb'), 
(35, 'CS35', 'Huba Arif'), 
(36, 'CS36', 'Mehwish Khan'), 
(37, 'CS37', 'Uqba Rafiq'), 
(38, 'CS38', 'Alishba Jaffer'), 
(39, 'CS39', 'Javeria Ali'), 
(40, 'CS40', 'Aminah Fahim Jilani'), 
(41, 'CS41', 'Habiba Munir'), 
(42, 'CS42', 'Rumaisa Naseem'), 
(43, 'CS43', 'Omaima Khan'), 
(44, 'CS44', 'Hadiqa Razzaq'), 
(45, 'CS45', 'Hooriya Baigum'), 
(46, 'CS46', 'Aisha Atif'), 
(47, 'CS47', 'Anamta Mrtaza'), 
(48, 'CS48', 'Syeda Arooba Azam'), 
(49, 'CS49', 'Imran Sajid'), 
(50, 'CS50', 'Maliha Tariq Rao'), 
(51, 'CS51', 'Lubaina Kauser'), 
(52, 'CS52', 'Zuhaa Zafar'), 
(53, 'CS53', 'Aena Amir'), 
(54, 'CS54', 'Dua Shamim'), 
(55, 'CS55', 'Hafsa Khan'), 
(56, 'CS56', 'Zulekha Hussain'), 
(57, 'CS57', 'Rohina Maryam'), 
(58, 'CS58', 'Mubashira Asif'), 
(59, 'CS59', 'Natalia Fatima Abbasi'), 
(60, 'CS60', 'Bisma Hashmi'), 
(61, 'CS61', 'Zainab Malik'), 
(62, 'CS62', 'Hafsa Bint e Arif'), 
(63, 'CS63', 'Yousma Siddiqui'), 
(64, 'CS64', 'Neha Maryam'), 
(65, 'CS65', 'Safia Baig'), 
(66, 'CS66', 'Waniya Khan'), 
(67, 'CS67', 'Ghulam Fatima'), 
(68, 'CS68', 'Nida Naeem'), 
(69, 'CS69', 'Arshma Ghufran'), 
(70, 'CS70', 'Syeda Tasbiha Batool'), 
(71, 'CS71', 'Eman Jilani'), 
(72, 'CS72', 'Musfirah Fatima'), 
(73, 'CS73', 'Ghulam Sakina'), 
(74, 'CS74', 'Sheeba Maryam'), 
(75, 'CS75', 'Yashra Fatima'), 
(76, 'CS76', 'Rameesha'), 
(77, 'CS77', 'Syeda Baneen Zehra'), 
(78, 'CS78', 'Mehak Binish'), 
(79, 'CS79', 'Muskan Erum'), 
(80, 'CS80', 'Abi Jaeil'), 
(81, 'CS81', 'Amna Rehan'), 
(82, 'CS82', 'Ayesha Khan'), 
(83, 'CS83', 'Hoor Noman'), 
(84, 'CS84', 'Hafeeza'), 
(85, 'CS85', 'Ashba'), 
(86, 'CS86', 'Eman Mirza'), 
(87, 'CS87', 'Syeda Yashab Zehra Kazmi'), 
(88, 'CS88', 'Syeda Hafsa Sohail'), 
(89, 'CS89', 'Zainab Minhas'), 
(90, 'CS90', 'Noorain'), 
(91, 'CS91', 'Fakaiha Faheem'), 
(92, 'CS92', 'Abeeha'), 
(93, 'CS93', 'Maryam'), 
(94, 'CS94', 'Adeeba Bilal'), 
(95, 'CS95', 'Iqra Wali'), 
(96, 'CS96', 'Syeda Meerab Hassan Jaffri'), 
(97, 'CS97', 'Abiha Khalid'), 
(98, 'CS98', 'Areeba Faisal'), 
(99, 'CS99', 'Syeda Maheen Zahra Zaidi'), 
(100, 'CS100', 'Huda Khurram'), 
(101, 'CS101', 'Nayab Fatima Gohar'), 
(102, 'CS102', 'Memona Bhatti'), 
(103, 'CS103', 'Roumesa Ali Khan'), 
(104, 'CS104', 'Ume Hani'), 
(105, 'CS105', 'Gul Nida')
";

  $s=$dbo->conn->prepare($c);
  try{
    $s->execute();
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }


  $c="insert into faculty_details
(id,user_name,password,name)
values
(1, 'paras', 'gdgc', 'paras gul'), 
(2, 'shazia', 'gdgc', 'shazia'), 
(3, 'asma', 'gdgc', 'asma'), 
(4, 'fifi', 'gdgc', 'fatima gohar')";

  $s=$dbo->conn->prepare($c);
  try{
    $s->execute();
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }


  $c="insert into session_details
(id,year,term)
values
(1, 2024, 'sep-dec'),
(2, 2025, 'jan-may')";

  $s=$dbo->conn->prepare($c);
  try{
    $s->execute();
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }


  $c="insert into course_details
(id,title,code,credit)
values
  (1, 'Computer', 'CS101', 76), 
(2, 'Math', 'MTH102', 83), 
(3, 'English', 'ENG103', 94), 
(4, 'Urdu', 'URD104', 70), 
(5, 'PST', 'PST105', 65), 
(6, 'Physics', 'PHY106', 85)";
  $s=$dbo->conn->prepare($c);
  try{
    $s->execute();
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }

  //if any record already there in the table delete them
  clearTable($dbo,"course_registration");
  $c="insert into course_registration
  (student_id,course_id,session_id)
  values
  (:sid,:cid,:sessid)";
  $s=$dbo->conn->prepare($c);
  //iterate over all the 105 students
  //for each of them chose max 6 random courses, from 1 to 6

  for($i=1;$i<=105;$i++)   
  {
    for($j=0;$j<=6;$j++)  
    {
        $cid=rand(1,6); // 6 is actually no. of courses
        //insert the selected course into course_registration table for 
        //session 1 and student_id $i
        try{
           $s->execute([":sid"=>$i,":cid"=>$cid,":sessid"=>1]); 
        }
        catch(PDOException $pe)
        {

        }

        //repeat for session 2
        $cid=rand(1,6);
        //insert the selected course into course_registration table for 
        //session 2 and student_id $i
        try{
           $s->execute([":sid"=>$i,":cid"=>$cid,":sessid"=>2]); 
        }
        catch(PDOException $pe)
        {

        }
    }
  }


  //if any record already there in the table delete them
  clearTable($dbo,"course_allotment");
  $c="insert into course_allotment
  (faculty_id,course_id,session_id)
  values
  (:fid,:cid,:sessid)";
  $s=$dbo->conn->prepare($c);
  //iterate over all the 4 teachers
  //for each of them chose max 6 random courses, from 1 to 6

  for($i=1;$i<=4;$i++)
  {
    for($j=0;$j<=6;$j++)

    {
        $cid=rand(1,6);
        //insert the selected course into course_allotment table for 
        //session 1 and fac_id $i
        try{
           $s->execute([":fid"=>$i,":cid"=>$cid,":sessid"=>1]); 
        }
        catch(PDOException $pe)
        {

        }

        //repeat for session 2
        $cid=rand(1,6);
        //insert the selected course into course_allotment table for 
        //session 2 and student_id $i
        try{
           $s->execute([":fid"=>$i,":cid"=>$cid,":sessid"=>2]); 
        }
        catch(PDOException $pe)
        {

        }
    }
  }