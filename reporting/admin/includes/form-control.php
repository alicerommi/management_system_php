<?php 
include "session-check.php"; 
include "../../includes/config.php";
if(isset($_POST['hidden-survey'])){
    $title=test_input($_POST['survey-title']);
    $startdate=test_input($_POST['start-date']);
    $enddate=test_input($_POST['end-date']);
    $query=mysqli_query($con,"INSERT INTO survey_new(survey_title, survey_start, survey_End) VALUES('$title','$startdate','$enddate')");
    $select=mysqli_query($con,"SELECT survey_id FROM survey_new order by survey_id desc limit 1");
    $data=mysqli_fetch_array($select);
    $id=$data['survey_id'];
    $insert=mysqli_query($con, "INSERT INTO questions(survey_id) VALUES('$id')");
    if(!$query){
        echo "Error: " . mysqli_error($con);
    }
    else
        header("Location: ../existing-surveys.php?v=successfully created new survey");
}
elseif(isset($_POST['hidden-que'])){
    $question=test_input($_POST['plan-que']);
    $id=test_input($_POST['survey-id']);
    $select=mysqli_query($con,"SELECT * FROM questions where survey_id='$id'");
    $data=mysqli_fetch_array($select);
    $array=array($data['q1'],$data['q2'],$data['q3'],$data['q4'],$data['q5'],$data['q6'],$data['q7'],$data['q8'],$data['q9'],$data['q10'],$data['q11'],$data['q12'],$data['q13'],$data['q14'],$data['q15'],$data['q16'],$data['q17'],$data['q18'],$data['q19'],$data['q20']);
        $count=0;
        
        foreach($array as $value){
            $count++;
            //echo $value;
            if(empty($value)){
                break;            
            }
        }
    /*    $query=mysqli_query($con,"SELECT * FROM questions where survey_id='$id' limit $count");
        $data=mysqli_fetch_array($query);
        echo $data[$count]; */
        $update=mysqli_query($con,"UPDATE questions set q$count='$question' where survey_id = '$id'");
    if(!$update){
        echo "Error: " . mysqli_error($con);
    }
    else
        header("Location: ../add-questions.php?id=$id&&v=success");

       /* $variable=$array['$count'];
        $update=mysqli_query($con,"UPDATE questions SET column_a = 25 WHERE column_a IS NULL ORDER BY id ASCLIMIT 1";
            break; */
}
elseif(isset($_POST['hidden-mcq'])){
    $mc_que=test_input($_POST['mc-que']);
    $ans1=test_input($_POST['a1']);
    $ans2=test_input($_POST['a2']);
    $ans3=test_input($_POST['a3']);
    $ans4=test_input($_POST['a4']);
    $id=test_input($_POST['survey-id']);
    $insert=mysqli_query($con,"INSERT INTO mcq(survey_id, question, ans1, ans2, ans3, ans4) VALUES('$id','$mc_que','$ans1','$ans2','$ans3','$ans4')");
    $mcselect=mysqli_query($con,"SELECT mcq_id from mcq where survey_id='$id' order by mcq_id desc limit 1");
    $mcdata=mysqli_fetch_array($mcselect);
    $mcid=$mcdata['mcq_id'];
    $select=mysqli_query($con,"SELECT * FROM questions where survey_id='$id'");
    $data=mysqli_fetch_array($select);
    $array=array($data['q1'],$data['q2'],$data['q3'],$data['q4'],$data['q5'],$data['q6'],$data['q7'],$data['q8'],$data['q9'],$data['q10'],$data['q11'],$data['q12'],$data['q13'],$data['q14'],$data['q15'],$data['q16'],$data['q17'],$data['q18'],$data['q19'],$data['q20']);
        $count=0;
        
        foreach($array as $value){
            $count++;
            //echo $value;
            if(empty($value)){
                break;            
            }
        }
    /*    $query=mysqli_query($con,"SELECT * FROM questions where survey_id='$id' limit $count");
        $data=mysqli_fetch_array($query);
        echo $data[$count]; */
        $update=mysqli_query($con,"UPDATE questions set q$count='mcq$mcid' where survey_id = '$id'");
    if(!$update){
        echo "Error: " . mysqli_error($con);
    }
    else
        header("Location: ../add-questions.php?id=$id&&v=success");

       /* $variable=$array['$count'];
        $update=mysqli_query($con,"UPDATE questions SET column_a = 25 WHERE column_a IS NULL ORDER BY id ASCLIMIT 1";
            break; */
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>