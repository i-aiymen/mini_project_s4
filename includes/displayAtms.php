<?php
    $d = $_GET["district"];
    require_once('dbconfig.inc.php');
    
    $sql = "select distinct * from atms where district = \"$d\" ORDER BY ATMname;";
    
    $result=mysqli_query($conn,$sql);
    $resultnum = mysqli_num_rows($result);
    // echo "<option>".$resultnum." </option>";
    $count = 0;
    // echo "<option value=".$stt."> hello </option>";
    if($resultnum>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<div class=\"col my-4\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">".++$count.". ".ucfirst(strtolower($row['ATMname']))." ATM</h5>
                            <p class=\"card-text\">ATM Branch: ".$row['Branch']."
                            <br>
                            TerminalID: ".$row['TerminalID']."
                            <br>
                            Address: ".$row['Address']."
                            <br>
                            ".$row['District']."
                            <br>
                            ".$row['State']."
                            <br>
                            Contact Num: ".$row['ContactNum']."
                            </p>
                        </div>
                    </div>
                </div>"; 
        }
    }