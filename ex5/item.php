<?php 
    include 'db.php';
    include 'config.php';

    session_start();//on logout session_destroy();

?>

<?php
    if(!empty($_GET["id"])) {
        $query = "SELECT * FROM tbl_93_books WHERE id = "
        . $_GET["id"];
    }

    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/css_pack.css">
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    <title><?php echo $row["name"] ?></title>
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
    <div class="container-fluid">
        <div class="container text-start">
            <div class="row" id="item-row">
              <div class="col-4">
                <img src=" <?php echo $row["url"] ?> " class="rounded float-start" alt="  <?php echo $row["name"] . " image"; ?> ">
            </div>
              <div class="col-8">
                <div class="row">
                    <div class="col-1">
                        <img class="icon" src="./images/open-book.png">
                    </div>
                    <div class="col-5 text-start"><b>
                        <?php echo $row["name"]; ?>
                    </b></div>
                    <div class="col-1">
                        <img class="icon" src="./images/feather-pen.png">
                    </div>
                    <div class="col-3 text-start">
                        <?php echo $row["author_name"]; ?>
                    </div>
                    <div class="col-1">
                        <img class="icon" src="./images/calendar.png">
                    </div>
                    <div class="col-1">
                        <?php echo $row["publication_year"]; ?>
                    </div>
                </div>
                <div class="col">
                    <article>
                        <?php echo $row["desc"]; ?>
                    </article>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-4 text-start">
                    <div class="col">
                        <?php 
                            $checked_stars = $row["rating"];
                            $empty_stars = 5 - $checked_stars;

                            for($i = 0 ; $i < $checked_stars ; $i++) {
                                echo '<span class="fa fa-star checked"></span>';
                            }

                            for($i = 0 ; $i < $empty_stars ; $i++) {
                                echo '<span class="fa fa-star"></span>';

                            }
                        ?>
                    </div>
                    <span class="badge bg-secondary"> <?php echo $row["category"]; ?> </span>
                </div>
            </div>
          </div>
      </div>
      <script src="./js/getbookscategories.js"></script>
</body>
</html>