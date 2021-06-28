<?php
    $d = $_GET["district"];
    require_once($_SERVER['DOCUMENT_ROOT']."/Soulbank/DBCONFIG/dbconfig.php");

if (class_exists('DATABASE_CONNECT'))
{

    $obj_conn  = new DATABASE_CONNECT;
    
    $host = $obj_conn->connect[0];
    $user = $obj_conn->connect[1];
    $pass = $obj_conn->connect[2];
    $db   = $obj_conn->connect[3];


    $conn = new mysqli($host,$user,$pass,$db);
    
    if ($conn->connect_error)
    {
        die ("Cannot connect " .$conn->connect_error);
    }
    else 
    {
    
    $sql = "select distinct * from branches where district = \"$d\" ORDER BY Branch;";
    
    $result=mysqli_query($conn,$sql);
    $resultnum = mysqli_num_rows($result);
    // echo "<option>".$resultnum." </option>";
    $count = 0;
    // echo "<option value=".$stt."> hello </option>";
    if($resultnum>0){
            while($row=mysqli_fetch_assoc($result)){
                echo "<div class=\"col my-4\">
                        <div class=\"card h-100\" style=\"\">
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">".++$count.". ".ucfirst(strtolower($row['Branch']))." Branch</h5>
                                <p class=\"card-text\">Branch Incharge: ".$row['BranchIncharge']."
                                <br>
                                IFSCode: ".$row['IFSCcode']."
                                <br>
                                Contact Num: ".$row['ContactNum']."
                                </p>
                            </div>
                        </div>
                    </div>"; 
            }
    }
}
}

?>