<? 
include_once("class.login.php");   
class question
 {
    //database setup
       //MAKE SURE TO FILL IN DATABASE INFO
    
//---------------------Coomment this file while deploying ---------------------------//
   var $hostname_logon = 'localhost';      //Database server LOCATION
   var $database_logon = 'IEEP';       //Database NAME
   var $username_logon = 'root';       //Database USERNAME
   var $password_logon = 'root';       //Database PASSWORD

    function dbconnect(){
        $connections = mysql_connect($this->hostname_logon, $this->username_logon, $this->password_logon) or die ('Unabale to connect to the database');
        mysql_select_db($this->database_logon) or die ('Unable to select database!');
        return;
    }
 
    //login function
    function load_question($level_id,$course_id)
    {
        //conect to DB
        $this->dbconnect();
        // $result = $this->qry("SELECT * FROM question WHERE course_id = '?' AND  level_id = '?';" , $username, $password);
        $result = mysql_query("SELECT * FROM question WHERE course_id = '".$course_id."' AND  level_id = '".$level_id."';");
        echo "<br /><br /><br />";
        echo "<form action='./include/load_question.php' method='post' align='center'>";
        while ($ques=mysql_fetch_row($result)) {
         echo $ques[2].". ";
         echo $ques[3]."<br /><br />" ;
         echo "<input type='radio' name='".$ques[2]."' value='a' />".$ques[5]."&nbsp;&nbsp;&nbsp;&nbsp;";
         echo "<input type='radio' name='".$ques[2]."' value='b' />".$ques[6]."&nbsp;&nbsp;&nbsp;&nbsp;";
         echo "<input type='radio' name='".$ques[2]."' value='c' />".$ques[7]."<br /> <br /><br />" ;
        }
        echo "<input type='hidden' name='level' value='".$level_id."' />";
        echo "<input type='hidden' name='course' value='".$course_id."' />";
        echo "<input type='submit' name='sub' value='Submit' />";
        echo "</form> <br /> ";
    }
}
// echo "ifubiu";
if (isset($_REQUEST['sub']))
{
    $log = new logmein();
    $log->encrypt = true; //set encryption
    $count = 0;
    $check = new question();
    $check->dbconnect();
    $result = mysql_query("SELECT * FROM question WHERE course_id = '".$_REQUEST['course']."' AND  level_id = '".$_REQUEST['level']."';");
    while ($ques=mysql_fetch_row($result)) {
        if ($_REQUEST[$ques[2]] == $ques[4])
        {
            echo $ques[2].". Your answer is correct !! <br />";
            $count++;
        }
        else
        {
            echo $ques[2].". The correct option is ".$ques[4]." <br />";
        }
    }
    if ($log->logincheck($_SESSION['loggedin'],"student", "password", "username") == 1)
    {
        // window.location('')   
        // echo $log->user["username"];
        $result = mysql_query("SELECT * FROM progress WHERE username = '".$log->user['username']."'");      
        $course = "course".$_REQUEST['course'];
        // echo $course;
        if (mysql_num_rows($result) > 0)
        {
            //UPDATE THE ROW!!!
            mysql_query("UPDATE progress SET ".$course."=".$course."+".$count." WHERE username ='".$log->user['username']."'") or die ('Unable to select database!');
        }
        else
        {
            // echo $course;
            mysql_query("INSERT INTO progress(username,".$course.") values('".$log->user['username']."',".$count.")") or die ('Unable to select database!'); 
        }
    }
    $_REQUEST['level']+=2;
    //echo $log->logincheck($_SESSION['loggedin'],"student", "password", "username");
    $addr= "course-".$_REQUEST['course']."-".$_REQUEST['level'].".php";
    // echo $count;
    $str = "<a href='../".$addr."'><input type='button' value='Next' /></a>";
    echo $str;
}
?>