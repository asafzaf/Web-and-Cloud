<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/css_pack.css">
    <title>Thank you!</title>
    <?php 
        $color = $_GET["color"];
    ?>
</head>
<body <?php echo "style='background-color: $color;'"; ?>>
    <!-- <?php 
        $color = $_GET["color"];
    ?> -->
    <main>
        <div class="container">
            <h1>Hello there,</h1>
            <?php
                $fac = $_GET["faculty"];
                $sati = $_GET["satisfaction"];
                $color = $_GET["color"];
            echo "<h2>You great " . $fac . "!</h2>";
            if ($sati < 6) 
                echo "<p>We are sorry to hear that you are so unhappy with the college (it must be because of the yard)</p>";
            else echo "<p>We are happy to hear that you are satisfied with the college, of course there are still many things to improve!</p>";
            ?>
            <?php
            // if(empty($_GET["suggests"])){
            //     echo "<h3>You didn't select any suggestions for making shenkar yard better...</h3>";
            // // } else {
                if (isset($_GET['suggests'])) {
                    $selected_suggests = $_GET['suggests'];
                    echo "<h3>Your suggests to improve the yard are:</h3>";
                    foreach ($selected_suggests as $suggest) {
                        echo $suggest . "<br>";
                    }
                } else {
                    echo "<section>You didn't select any suggestions for making shenkar yard better...</section>";
                }
            // }
            ?>
        </div>
    </main>
</body>
</html>