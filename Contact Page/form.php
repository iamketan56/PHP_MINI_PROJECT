<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php
//Connection Part
 if(isset($_POST['submit']))
 {
     $name = $_POST['name'];
     $tele = $_POST['telephone'];
     $email = $_POST['email'];
     $subject = $_POST['Subject'];
     $message = $_POST['message'];
     $ques = $_POST['query'];

     $db['db_host'] = "localhost";
    $db['db_user'] = "root";    
    $db['db_pass'] = "";
    $db['db_name'] = "contactpage";
     
    foreach($db as $key => $value)
    {
         define(strtoupper($key), $value);
    }
     $connection = mysqli_connect(DB_HOST , DB_USER , DB_PASS ,DB_NAME);

     //Insert Data in database
     $query = "INSERT INTO query (Name,Mobile,Email,Sujbect,Message,Query) VALUES ('$name','$tele','$email','$subject','$message','$ques')";
     
     if(mysqli_query($connection, $query))
     {
        echo "<h1 style = 'color:green;text-align:center;padding:10px;margin-top:100px'>Your Query Sent Successfully.<br> Our Team Will Contact You Soon.</h2>";
        echo"<h1>Here is your details</h1>";
        $data = mysqli_query($connection,"SELECT * FROM query WHERE Mobile = '$tele'");
   
    //Fetch data from database
        if($row = mysqli_fetch_array($data))
    {
        echo"<div id = 'contact'>   
        <form>
        <label>Name:</label><br>
        <input disabled value={$row['Name']}><br>
         <label>Mobile-No:</label><br>
         <input disabled value={$row['Mobile']}><br>
        <label>Email:</label> <br>
        <input disabled value = {$row['Email']}><br>
        <label >Subject:</label><br>
        <textarea disabled>{$row['Sujbect']}</textarea>   <br>   
         <label >Message:</label><br>
        <textarea disabled>{$row['Message']}</textarea>  <br>
      <label >Query:</label><br>
        <textarea disabled>{$row['Query']}</textarea>
        <br>
        </form>
        </div>";
    }
    }
}  
?>
</body>
</html>