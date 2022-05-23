<?php
session_start();
require 'index.php';
require 'db.php';
$message='';
$Searchmessage='';
?>
<?php
if(isset($_POST['btnSearch'])){
    $txt= $_POST['searck_key'];
    if(empty($_POST['searck_key'])){
            $message='Search key content can not be null';
    }else if(!(empty($_POST['searck_key']))){     
        ?>

<?php 
            //$Searchmessage='Your Search key content is : ' .$txt;
        $sql=$connection->prepare("SELECT * FROM people WHERE regno LIKE :1");
			$sql->execute(array(
				':1'=>'%'.$txt.'%',
            
			));
        if($row= $sql->fetch()){
			do{
                ?>
<div class="container"> 
<div class="table-contents">
	<table>
        <div class="card-body">
            
            <table class="table table-bordered">
            <th colspan="10"><h4>Student record match with search key <?php echo  "<b style='color:darkblue;'>". $txt ."</b>"?></h4></th>

		<tr>
			<th>ID</th>
            <th>Name</th>
			<th>Email</th>
			<th>Reg No</th>
			<th>Class</th>
			<th>Phone</th>
			<th>Material</th>
			<th>Price</th>
		</tr>
    <tr>
			<td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name'];?></td>
			<td><?php echo $row['email'];?></td>
			<td><?php echo $row['regno'];?></td>
			<td><?php echo $row['class'];?></td>
			<td><?php echo $row['phone'];?></td>
			<td><?php echo $row['material'];?></td>
			<td><?php echo $row['price'];?></td>
    </tr>
    		<?php
	}while($row= $sql->fetch());
              }
        	else{
                $message='No student record found about ' ."<b>".$txt."</b>"." in our database";
		        echo"</td></tr></table>";
	}
}  
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>student information status</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="js/bootstrap.min.js">
    
    <style>
        .forming{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        #searchSize{
            width: 950px;
        }
    </style>
    </head>
    <body>
        <div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h4>Use Your Registration Number For Searching</h4>
        </div>
        <div class="card-body">
            <?php if (!empty($message)): ?>
            <div class="alert alert-danger">
                <?= $message; ?>
            </div>
            <?php endif; ?>
            
             <?php if (!empty($Searchmessage)): ?>
            <div class="alert alert-success">
                <?= $Searchmessage; ?>
            </div>
            <?php endif; ?>
            <div class="forming">
            <form  class="d-flex" method="post" action="student_search.php">
            <input class="form-control me-2" type="text" placeholder="student quick search..." aria-label="Search" name="searck_key" id="searchSize">
            <button class="btn btn-outline-success" type="submit" name="btnSearch">Student Search</button>
        </form>
            </div>
        
        </div>
            </div>
        </div>
    </body>
</html>