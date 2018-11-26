<?php include_once('includes/header.php') ?>
<?php include_once('includes/header.php') ?>
<?php
$db=new Database();
?>
<?php
if (isset($_POST['submit'])) {	
  $usrname = "";
  $pswd = "";
  $deponame = $_POST['depotname'];
  $stmnt=" SELECT * FROM `depot` where `depoid`= '$deponame' ";

  $details = $db->display($stmnt); 
  foreach ($details as $key => $value){
    $usrname= $value['depousername'];
    $pswd=$value['depopswd'];
    $deponame=$value['depotname'];
  }
  
	//var_dump($_POST);


  $name = $_POST['name'];
  $type = 'Station Master';
  $yr = $_POST['joiningyr'];
  $no = $_POST['contactno'];
  $submit=$_POST['submit'];
  

  $stmnt ='insert into stationmaster (name,type,joiningyear,contactno,depotname,depotusename,depotpswd) values( :name,:type,:yr,:no,:deponame,:usrname,:pswd)';

  $params=array(

    ':deponame'   =>  $deponame,
    ':name'        =>  $name,
    ':type'       =>  $type,
    ':yr'    =>  $yr,

    ':no'     =>  $no,
    ':usrname'       =>  $usrname,
    ':pswd'        =>  $pswd,

         // ':longestroute'    =>  $lngstsrc.$lngstdes,
         // ':topcollection'   =>  $tpsrc.$tpdes,
         // ':income'          =>  $income,

  );
  
  $interm = selectFromTable(' * ', ' stationmaster', " ( name = '$deponame' AND name = '$name' AND  joiningyear = '$yr') OR contactno = '$no'  " , $db);
  if ( $interm ) {
    $message[0] = 3;
    $message[1] = " already exists";



  } else {
   $istrue=$db->execute_query($stmnt,$params);
   if($istrue){ 
     $message[0] = 1;
     $message[1] ="Successfully Added";
   }
   else{
     $message[0] = "Error"; 
   }
 }







}

?>

<section>
  <div class="row bg-white mb-2"  align="center">
    <div class="offset-2  p-3 col-sm-8" align="left" >
      <h3 class="text-primary text-capitalize">Add station master</h3>
    </div>
  </div>
</section>


<section>
  <div class="row bg-white"  align="center">
    <div class="offset-2  p-3 col-sm-8" align="left" >


      <?php echo show_error($message); ?>



      <?php 





      ?>


      <form  action=""  method="post" data-parsley-validate   >


        <div class="form-group">
          <label for="depotname">Depot Name</label>

          <select name="depotname" value="select" class="form-control" id="depotname"  >


           <option value="Select" selected="selected" disabled="disabled">Select</option>
           <?php

           $sql="SELECT * FROM `depot` WHERE 1";


           $result=$db->display($sql);

           foreach ($result as $key => $value) {


                 //echo "<option value='$value[deponame]'>$value[deponame]</option>" ;


             $id = $value['depoid'];
             $name = $value['depotname'];


             $selectedMe = "";
             if(isset($_POST['depotname']))
              if($_POST['depoid'] == $id )
               $selectedMe = "  selected ";


             echo "<option value='$id'   $selectedMe>$name</option>";



           }
           ?>


         </select>
       </div>

       <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name"   placeholder="Enter Name" required="Required"> 
      </div>



      <div class="form-group">
        <label for="joiningyear">Joining Year</label> 
        <input type="text" class="form-control datetimepicker" max-date="<?php echo Date('Y-m-d'); ?>" data-date-format="YYYY-M-D" name="joiningyr" id="joiningyr" placeholder=" Event On" data-parsley-required="true"  >

      </div>





      <div class="form-group">
        <label for="contactno">Contact No</label>
        <input type="text" minlength="10" maxlength="10" name="contactno" id="contactno" class="form-control " placeholder="Enter ContactNo" required="Required">
      </div>






      <div class="form-group">

        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit" onclick="action">
      </div>  


    </form>
  </div>

</div>

</section>

<section class="mb-5"></section>
<?php include_once('includes/footer.php') ?>