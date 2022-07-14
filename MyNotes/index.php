<?php

// DELETE FROM `notes` WHERE `notes`.`sno` = 21;




$servername = "localhost";
$username = "root";
$password = "";
$database = "mynotes";



$conn = mysqli_connect($servername , $username , $password , $database);

if(!$conn) {
    // echo "Error";
}
else {
    // echo "Success";

}



if($_SERVER['REQUEST_METHOD'] === 'POST') {



    $noteTitle = $_POST['noteTitle'];
    $noteDesc = $_POST['noteDesc'];




    if(isset($_POST['submit'])) {


        if(empty($_POST['noteTitle']) || empty($_POST['noteDesc'])) {
            echo "Please fill in the blanks";
        }
       else {
     $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$noteTitle' , '$noteDesc')";
     $result = mysqli_query($conn , $sql);

     if($result) {

        ?>
        <script>alert("Note Successfully Created");</script>
        <?php

     }
     else {
        ?>
        <script>alert("Unsuccessfull To Create Note");</script>
        <?php

     }
    }

    }
  

//     if(isset($_POST['update'])) {
       
// if(isset($_GET['UpdId'])) {

//    $updateId = $_GET['UpdId'];
// echo $updateId;
// }
//     }
//     else {
    
//     }
    // if(isset($_POST['delete'])) {

    //     $id = $_POST['GetId'];
    //     echo $id;

    //     // $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$noteTitle' , '$noteDesc')";
    //     // $result = mysqli_query($conn , $sql);
    // }
    // else {
    //     echo "not deleted";
    // }


    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding:0;
            font-family: sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            background-color: rgb(231, 231, 231);

        }
        header {
            background-color: blue;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
            position:sticky;
            top: 0px;
            z-index: 99;
        }
        header .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            /* background:yellow; */
            /* padding: 10px 10px; */
        }
        header .logo h1 {
            font-size: 20px;
            color: white;
            letter-spacing: 1px;
        }
        header .nav {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        header .nav ul {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            /* border: 1px solid white; */
            width: 30vw;
        }
        header .nav ul li {
            list-style: none;
        }
        header .nav ul li a{
            text-decoration:none;
            color: white;
        }
        header .searchContainer {
            width: 20vw;
            display: flex;
            justify-content: center;
            align-items: center;

        }
        header .searchContainer #searchBox {
            padding: 7px 10px;
            color: purple;
            outline: none;
            border: none;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;

        }

        header .searchContainer #searchBtn {
            padding: 5px 5px;
            color: white;
            background-color: transparent;
            outline: none;
            border: 2px solid white;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }


     

        main {
            height: 70vh;
            /* border: 1px solid blue; */
            padding: 10px 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgb(231, 231, 231);
            
        }
        main form {
            display: flex;
            justify-content: space-evenly;
            align-items: flex-start;
            padding: 10px 20px;
            /* border: 1px solid blue; */
            width: 60vw;
            flex-direction: column;
            height: 60vh;
            background-color: rgb(231, 231, 231);

        }
        main form h1 {
            font-size: 23px;
        }
        main form label {
            font-size: 13px;
        }
        main form #noteTitle , textarea{
            width: 58vw;
           padding: 5px 0px;
           outline: none;
        padding:10px 0px;
         
        }

        main form .buttons #addNoteBtn , #updateNoteBtn , #deleteNoteBtn{
            background-color: blue;
            color: white;
            border: none;
            outline: none;
            padding: 6px 10px;
            border-radius: 3px;
        }

        .container {
            background-color: rgb(231, 231, 231);
            min-height: 50vh;
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
            align-items: center;
        }

        .container .noteContainer {
            background-color: white;
            height: 15vh;
            width: 25vw;
            overflow: hidden;
            margin: 10px 10px;
            padding: 15px 15px;
            border-radius: 10px;
        }

        .container .noteContainer button {
            background-color: red;
            margin-bottom: 5px;
            padding: 2px 10px;
            border:none;
            color: white;
            border-radius: 50%;


        }

        .container .noteContainer h5 {
            display:none;
        }

        .container .noteContainer h2 {
            font-size: 15px;
            margin-bottom: 5px;
        }

        .container .noteContainer p {
            font-size: 10px;
            margin-top: 5px;

        }

        footer {
            padding: 23px 30px;
            background-color: purple;
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        footer .socialContainer {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            width: 15vw;
        }

        footer .socialContainer img {
            background-color: white;
            border-radius: 50%;
            width: 25px;
            border: 1px solid yellow;
        }
      

        footer .copyrightContainer p {
            color: white;
            font-weight: 400;
            letter-spacing: 1px;
            font-size:11px;

        }
    </style>
</head>
<body>
    <header>
        <div class="logo"> <a href="index.php" style="text-decoration: none;"><h1>My Notes</h1></a></div>
        <div class="nav">
            <ul>
                <li> <a href="index.php" > Home</a></li>
                <li> <a href="#" > About</a></li>
                <li> <a href="#" > Contact</a></li>
            </ul>
        </div>
        <div class="searchContainer">
            <input type="search" name="searchBox" placeholder="Search Title Of Note..." id="searchBox"><input type="button" id="searchBtn" value="Search">
        </div>
    </header>

    <main>
        <form action="index.php" method="POST" >
         <h1>Add a Note to MyNotes</h1>
         <label for="noteTitle">Note Title</label>
         <input type="text" name="noteTitle" id="noteTitle">
         <label for="noteDesc">Note Description</label>
          <textarea name="noteDesc" id="noteDesc" cols="30" rows="10"></textarea>
          <div class="buttons">
         <input type="submit" value="Add Note" name="submit" id="addNoteBtn">
         <input type="submit" value="Update" name="update" id="updateNoteBtn">
        



         </div>
       
       
    
        </form>
   
    </main> 

   <div class="container"><?php
 $sql = "SELECT * FROM `notes`";
$result = mysqli_query($conn , $sql);
$num = mysqli_num_rows($result);
$count = 1;



if($num > 0) {
while($row = mysqli_fetch_assoc($result)) {
echo "<div id=". $row['sno'] ." class='noteContainer'>
   <button id=". $row['sno'] ." class='delBtn'>x</button>     
   <hr>
   <h5> ". $count ."</h5>
<h2 class='titleHeading'>". $row['title'] ."</h2>
<hr>
<p>". $row['description'] ."</p>
</div>";



$count += 1;
}
}
   ?>



    <!-- <div class="noteContainer">
      
        <h2>my first note</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi perspiciatis id, iste earum voluptas ullam beatae? Explicabo, eius quidem voluptate doloremque quae nihil itaque. Culpa in ullam modi maiores eos?</p>
    </div> -->
    
</div>

   <footer>
    <div class="socialContainer">
      <a href="https://www.facebook.com/aditya.mahajan.5070276">  <img src="images/fbLogo.png" width="30px" alt="facebook"> </a>
      <a href="https://www.linkedin.com/in/adityacm65">  <img src="images/linkLogo.png" width="30px" alt="linkedin"> </a>
      <a href="https://www.instagram.com/aditya_cm_65/">  <img src="images/instaLogo.png" width="30px" alt="instagram"> </a>
      <a href="https://twitter.com/AdityaCM65">  <img src="images/twitterLogo.png" width="30px" alt="twitter"> </a>

    </div>

    <div class="copyrightContainer">
        <p>Copyright &copy; Aditya C Mahajan. All Rights Reserved</p>
    </div>
   </footer>



<script>

let notes = document.getElementsByClassName('noteContainer');
let delBtn = document.getElementsByClassName('delBtn');
let updBtn = document.getElementById('updateNoteBtn');

let noteTitle = document.getElementById('noteTitle');
let noteDesc = document.getElementById('noteDesc');

Array.from(notes).forEach((note) => {
    

note.addEventListener('click' , (e) => {

   let id = note.getElementsByTagName('h5')[0].innerHTML;
    let title = note.getElementsByTagName('h2')[0].innerHTML;
    let desc = note.getElementsByTagName('p')[0].innerHTML;

     noteTitle.value = title;
noteDesc.value = desc;

updateGetId = e.target.id;



updBtn.addEventListener('click',() => {


    window.location = `/MyNotes/index.php?updid=${updateGetId}`;

  
var idGet = e.target.id;
document.cookie="cid="+idGet;

var titleGet= noteTitle.value;
document.cookie="ctitle="+titleGet;

var DescGet= noteDesc.value;
document.cookie="cdesc="+DescGet;


});




});










 });

 Array.from(delBtn).forEach((del) => {

 del.addEventListener('click' , (e) => {


noteid = e.target.id;

// console.log(noteid);


if(confirm("You Want To Delete!")) {
    // console.log("yes");
    window.location = `/MyNotes/index.php?GetId=${noteid}`;
    


}
else {
    // console.log("no");
}








});

});


</script>
<?php
   
if(isset($_POST['update'])) {

    $cookid = $_COOKIE['cid'];
   $cookt = $_COOKIE['ctitle'];
$cookd = $_COOKIE['cdesc'];

$sql = "UPDATE `notes` SET `title` = '" . $cookt . "' , `description` = '" . $cookd . "' WHERE `sno`='". $cookid ."'";

 $result = mysqli_query($conn , $sql);

if($result) {
         ?>
 <script>
    // alert("Successfully Updated");
   window.location.href = 'index.php';
 </script>
 <?php
 }
 else {

}
}

       
 
//  if(isset($_GET['updid'])) {

//     $updateId = $_GET['updid'];

// $cookt = $_COOKIE['ctitle'];
// $cookd = $_COOKIE['cdesc'];

 
// $sql = "UPDATE `notes` SET `title` = '" . $cookt . "' , `description` = '" . $cookd . "' WHERE `sno`='". $updateId ."'";

//  $result = mysqli_query($conn , $sql);

// if($result) {
//
  
//     alert("Successfully Updated");
//    window.location.href = 'index.php';
// 
//  
//  }
//  else {

// }

 

//  }
  
       
     

//    $updateId = $_GET['UpdId'];

// if(isset($_POST['update'])) {





//   echo $updateId;
   

   






 if(isset($_GET['GetId'])) {


    $id = $_GET['GetId'];

    $sql = "DELETE FROM `notes` WHERE `sno`='". $id ."'";
    $result = mysqli_query($conn , $sql);

// DELETE FROM `notes` WHERE `notes`.`sno` = 21;

    if($result) {

        ?>
        <script>
          window.location.href = 'index.php';
        </script>
        <?php

     }
     else {
  

     }




 }


?>



<script>

const searchBox = document.getElementById('searchBox');
const searchBtn = document.getElementById('searchBtn');
const titleHeading = document.getElementsByClassName('titleHeading');


searchBtn.addEventListener('click' , () => {

    let s = searchBox.value.toUpperCase();

    Array.from(titleHeading).forEach((element) => {
       

        let t = element.innerHTML.toUpperCase();

        if(t.indexOf(s) > -1) {
     element.parentNode.style.display = "";
        }
        else {
     element.parentNode.style.display = "none";
           
        }
        
      

    });

});




</script>

</body>
</html>
