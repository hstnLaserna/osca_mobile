<?php
    session_start();
    include ( "conn.php" );
    $oscaID = (int) $_POST["oscaID"];
    $password = $_POST["password"];

    $qry="call `login_member`($oscaID, '$password')";
    // $qry='call `login_member`(20200001, "17e3fe30f46ca4df7c67db07b174475d")';
    $result=mysqli_query($conn, $qry);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 1){
        $picture = "../resources/members/".$row["picture"];
        echo json_encode($row);
    }else{
        echo "Account does not exist";
    }
?>
