<?php
include('course.php');

$greeting = $_GET['greeting'];
if(trim($greeting) == "") {
    $greeting = "Hello, Wildcats!";
}

$numberOfCourses = 0;
$numberOfCoursesStr = $_GET['count'];
if(trim($numberOfCoursesStr) == "") {
    $numberOfCourses = 5;
} else {
    $numberOfCourses = intval($numberOfCoursesStr);
}

$courses = array();
for($x = 0; $x < $numberOfCourses; $x++) {
    array_push($courses, new Course("Course{$x}", $x, "CSCV"));
}


function doSomething() {
    echo "I guess I did something...  nothing to see here.";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>HTML -> PHP Example</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CSCV337 Example</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>
    <h1><?php echo $greeting ?></h1>


    <p>Here is some content in my HTML page.</p>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Program</th>
          <th scope="col">Number</th>
          <th scope="col">Name</th>
          <th scope="col">Full Name</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach($courses as $course) {
            ?>
            <tr>
                <td><?= $course->program ?></td>
                <td><?= $course->courseNumber ?></td>
                <td><?= $course->courseName ?></td>
                <td><?= $course->getFullName() ?></td>
          </tr>
            <?php
          }
          ?>
      </tbody>
    </table>

    <?php
        doSomething();
        ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>