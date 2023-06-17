<?php 
    include 'db.php';
    include 'config.php';

    session_start();//on logout session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/css_pack.css">
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    <title>Asaf's Books Shop</title>
</head>
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php"><b>Asaf's Book Shop</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Select Category
          </a>
          <ul class="dropdown-menu" id="nav-place">
          </ul>
        </li>
        <li class="nav-item">
          <?php
            if(!empty($_GET["category"])) {
              echo '<a class="nav-link" href="./index.php" >All</a>';
            } else {
              echo '<a class="nav-link disabled">All</a>';
            }
          ?>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" name="value" placeholder="Search For Book" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</header>
<body>  
    <div class="container">
      <h1>
        <?php
          if(!empty($_GET["category"])) {
            echo $_GET["category"] . " Books";
          } else if(!empty($_GET["value"])) {
            echo "Search Results for \"" . $_GET["value"] . '"';
          } else {
            echo "All Books";
          }
        ?>
      </h1>
        <div class="container wrap">
            <div class="row row-cols-2">
                <?php
                    if(empty($_GET["category"])) {

                      if(!empty($_GET["value"])) {
                        $query = "SELECT * FROM tbl_93_books WHERE name like \"%" . $_GET["value"] . "%\"";
                      } else
                        $query = "SELECT * FROM tbl_93_books";
                
                    }
                
                    if(!empty($_GET["category"])) {

                        $query  = "SELECT * FROM tbl_93_books WHERE category='" 
                
                        . $_GET["category"] 
                
                        ."'";
        
                    }

                    $result = mysqli_query($connection, $query);
                
                        if($result->num_rows > 0) {
                            while($row = mysqli_fetch_array($result)) {
                              echo '  
                                        <a class="card mb-3" style="max-width: 400px;" href="./item.php?id=' . $row["id"] . '">
                                          <div class="row g-0">
                                            <div class="col-md-4">
                                              <img src="' . $row["url"] . '" class="card-img-top" alt="' . $row["name"] . ' image">
                                            </div>
                                              <div class="col-md-8">
                                                <div class="card-body">
                                                  <h5 class="card-title">' . $row["name"] . '</h5>
                                                  <p class="card-text">' . $row["desc"] . '</p>
                                                </div>
                                              </div>
                                            </div>
                                          </a>
                                       
                                      ';
                            }
                        } else {
                          echo '<div class="container d-flex justify-content-center"><div class="col"><img src="./images/no-education.png"><h3>No books found :(</h3></div></div>';
                        }
                ?>
            </div>
          </div>
    </div>
    <script src="./js/getbookscategories.js"></script>
</body>
</html>