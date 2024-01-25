<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Review 2</title>
    <link rel="stylesheet" href="movie.css">

</head>
<body>
    <header class="main-header">
            <nav class="nav main-nav">
                <ul>
                    <form action="movie.php" method="GET">
                    Search Movie: <input type="text" name="film">
                    <input type="submit">
                    <!-- variables are defined using loadMovieVariables below-->
                    <?php loadMovieVariables($title, $year, $rating, $reviewCount, $imagePath, $overviewPath)?>
                    <li><a href="../index.html">HOME</a></li>
                    <li><a href="../Week1/pie.html">PIE</a></li>
                    <li><a href="../Week2/moviereview.html">MOVIE</a></li>
                    <li><a href="movie.php">REVIEWS</a></li>
                    <hr>
                </ul>
            </nav>
            <link rel="stylesheet" href="movie.css">
    </header>
    <?php if (empty($movie)) : ?>
        <h1 class= noMovie>Enter a movie name above to get started!</h1>
    <? else: ?>
    <section class="title-section"> 
        <span class= "title main-title"><?php echo $title?></span>
        <figure>
                <img class= "title mainpicture" src="<?= $imagePath ?>">
                <figcaption><?php echo $year?> &emsp; &#11088;<?php echo $rating?>/10</figcaption>
        </figure>
    </section>
    <section class="content-section">
        <span class="title info-title">MOVIE INFO &#11163;</span>
        <div class="info">
        <?php if (!empty($overviewPath)){
            include($overviewPath);
            }
        ?>
        </div>
        <span class="title review-title">REVIEWS &#11163;</span>
        <div class="reviews">
            <?php printReviews($reviewCount)?>
        </div>
    </section>
    <?php endif; ?>
</body>
</html>

<!-- functions-->
<?php 
    function loadPath(){
        $movie = "";
        //PATH TO MOVIE VIA USER INPUT IN FORM
        $movieNames = array('avatar', 'fightclub', 'mortalkombat', 'princessbride', 'tmnt', 'tmnt2'); //movies in DB
        if (isset($_GET['film'])) {
            // collect value of input field
            $movie = strtolower($_REQUEST['film']); //to lower input
            if (!in_array($movie, $movieNames)) {   //if movie in array list
                echo "Movie not found"; //not found
            }
            else {
                $path = './m/' . $_GET["film"]; //set path to movie info
                return $path;
            }
        }
    }
    function loadMovieVariables(&$title, &$year, &$rating, &$reviewCount, &$imagePath, &$overviewPath){
        if (isset($_GET['film'])) { //if film name provided
            $path = loadPath();
        }
        if (!empty($path)){
            //GET INFO.TXT VARS
            $infoPath = $path . '/info.txt';
            $info = file_get_contents($infoPath);
            $lines = explode("\n", $info);
            $title = $lines[0];
            $year = $lines[1];
            $rating = $lines[2] / 10; //convert to x/10 scale
            $reviewCount = $lines[3];

            //GET IMAGE OVERVIEW.PNG
            $imagePath = $path . '/overview.png';
            
            //ECHO OVERVIEW.TXT
            $overviewPath = $path . '/overview.txt';      
        }
    }
    function printReviews($reviewCount){
        if (isset($_GET['film'])){ 
            $path = loadPath();
        }
        //Print reviews
        for($i = 1; $i <= $reviewCount; $i++){
             $reviewpath = $path . '/review' . $i . '.txt';
            if(file_exists($reviewpath)){
                include($reviewpath);
            }
            echo "<br><br>";
        }
    }
?>