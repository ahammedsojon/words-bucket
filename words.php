<?php
session_start();
require_once "functions.php";
$_user_id = $_SESSION['id'] ?? 0;
if (!$_user_id) {
    header("Location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vocabulary</title>
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body calss="home">

    <div class="sidebar">
        <h4 class="">Menu</h4>
        <ul class="menu ">
            <li><a href="#" class="menu-item" data-target="words">All Words</a></li>
            <li><a href="#" class="menu-item" data-target="wordform">Add New Words</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="container" id="main">
        <h1 class="miantime text-center">
            <i class="fas fa-language"></i> <br>My Vocabularies
        </h1>
        <div class="wordsc helement" id="words">
            <div class="row">
                <div class="col-md-7">
                    <div class="alphabets">
                        <select name="" id="alphabets" class="w-25">
                            <option value="all">All words</option>
                            <option value="A">A#</option>
                            <option value="B">B#</option>
                            <option value="C">C#</option>
                            <option value="D">D#</option>
                            <option value="F">F#</option>
                            <option value="G">G#</option>
                            <option value="P">P#</option>
                            <option value="R">R#</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                <form action="" method="POST" class="d-flex">
                <input type="search" placeholder="Search" class="form-control mr-2" name="search">
                <button class=" btn btn-primary" name="submit" value="submit">Search</button>
                </form>
                </div>
            </div>
            <br>

            <table class="words table">
                    <thead>
                        <tr>
                              <th class="w-25">Word</th>
                              <th>Definition</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(isset($_POST['submit'])){
                            $searchedText = $_POST['search'];
                            $words = getWords($_user_id, $searchedText);
                        }else{
                            $words = getWords($_user_id);
                        }
                       
                        $length = count($words);
                        if($length>0){
                            for($i=0;$i<$length;$i++){
                        
                            ?>
                            <tr>
                                <td><?php echo $words[$i]['word'];?></td>
                                <td><?php echo $words[$i]['meaning'];?></td>
                            </tr>
                        <?php 
                        }
                    }
                        ?>
                    </tbody>
            </table>
        </div>
          <div class="formc helement mx-5 " id="wordform" style="display: none;">
          <form action="tasks.php" method="POST">
              <h4 class="text-center">Add New Word</h4>
              <label for="word">Word</label>
              <input type="text" name="word" placeholder="Word" id="word" class="form-control">
              <label for="meaning">Meaning</label>
              <textarea name="meaning" id="meaning"  rows="3" placeholder="meaning" class="form-control"></textarea>
              <input type="hidden" name="action" value="addword">
              <input type="submit" class="btn btn-primary mt-2" value="Submit">
          </form>
        </div>
    </div>

</body>
<script src="./js/jquery-3.5.1.slim.min.js"></script>
<script src="./js/script.js"></script>

</html>