<?php require_once('headerlogin.php');?>
<div class="container" style="margin-top:60px">
<!--
    
-->
</div>
<div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="memarea">
            <h3><b>Update Client</b></h3>  
        </div>  
      </div> 
     </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
<!--                <p>Please Complete the form Below</p>-->
<!--                <p style="color:red">* marked fields are mendatory</p>-->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="margin-top:30px">
            <!--update operation starts here -->
            <?php
// include to get database connection
include_once 'phpprocess/dbconfig.php';
 
// PDO select all query
$query = "SELECT clientid,adc, cmpnyname, email,isactive,bulkdiscount,iscredit,add1,add2,city,province,zipcode,contactname,pphone,sphone,faxno,adrslocstate,mailstate FROM client ORDER BY clientid desc";
$stmt = $db_con->prepare($query);
$stmt->execute();
 
//this is how to get number of rows returned
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // start table
    echo "<table class='table  table-hover' style='border:1px solid #663300'>";
     
        // creating our table heading
        echo "<tr style='border:1px solid #663300;background:#428BCA;color:white'>";
            echo "<th >With Firm</th>";
            echo "<th '>Company</th>";
            echo "<th>Contact</th>";
            echo "<th>Email</th>";
            echo "<th>Phone</th>";
            echo "<th>Status</th>";
            
            
            echo "<th style='text-align:center;'>Action</th>";
        echo "</tr>";
         
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
             
            // creating new table row per record
            echo "<tr>";
                
                echo "<td>{$adc}</td>";
                echo "<td>{$cmpnyname}</td>";
                echo "<td>{$contactname}</td>";
                echo "<td>{$email}</td>";
                echo "<td>{$pphone}</td>";
                echo "<td>{$mailstate}</td>";
                
                
                
                echo "<td style='text-align:center'>";
                    // add the record id here, it is used for editing and deleting products
                    echo "<div class='product-id display-none' style='visibility:hidden'>{$clientid}</div>";
                     
                    // edit button
                    echo "<div class='btn btn-info edit-btn margin-right-1em'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</div>";
                     
                    // delete button
                    echo "<div class='btn btn-danger delete-btn'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</div>";
                echo "</td>";
            echo "</tr>";
        }
         
    //end table
    echo "</table>";
     
}
 
// tell the user if no records found
else{
    echo "<div class='noneFound'>No records found.</div>";
}
 
?>
            <!--update operation ends here-->
            
        </div>
            </div>
    </div>



    <div class="container">
<?php include_once('footer.php')?>
</div>
