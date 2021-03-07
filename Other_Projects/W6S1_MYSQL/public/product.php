<?php

use App\Entity\CheckIn;
use App\Entity\Product;


require_once '../src/setup.php';

$productId = $_GET['productId'];

$stmt = $dbh->prepare(
    'SELECT product.id, product.title, AVG(checkin.rating) AS average_rating
    FROM product
    LEFT JOIN checkin ON checkin.product_id = product.id
    WHERE product.id = :id
    GROUP BY product.id'
);

$stmt->execute([
    'id' => $productId
]);

//$hydrator = new EntityHydrator();

$product = $stmt->fetchObject(App\Entity\Product::class);

$stmt = $dbh->prepare('SELECT * FROM checkin WHERE product_id = :product_id');

$stmt->execute(['product_id' => $product->id]);


//This statement fetches the checkIns public array and hydrates from the Checkin class
$checkIns = $stmt->fetchAll(PDO::FETCH_CLASS, Checkin::class);


//cannot access the public function of checkIn anymore as made private and so we need to
//access the function we made in the product and loop around
foreach ($checkIns as $checkIn) {
    $product->addCheckin($checkIn);
}
?>

<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product-css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Product Detail</title>
</head>
<body class="p-4">
<div class="container">
    <!-- Carousel Script Below -->
    <div style="height: 0px;"></div>
    <div class="h-15 d-inline-block" style="width: 20px;"></div>

    <div class ="container">

        <div class="row justify-content-start">
            <div class="col";>

                <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox" style=" width:100%; height: 320px !important;">
                        <div class="carousel-item active" data-interval="100000">
                            <img src="cat4.jpeg" class="d-block w-100" alt="cat1">
                        </div>
                        <div class="carousel-item" data-interval="2000">
                            <img src="cat3.jpeg" class="d-block w-100" alt="cat2">
                        </div>
                        <div class="carousel-item">
                            <img src="cat2.jpeg" class="d-block w-100" alt="cat3">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>


            <!-- Lorem Ipsum next to the carousel on the right -->

            <div class="col">


                <h1><?= $product->title ?></h1>
                <p class="main-text">
                    Lorem ipsum natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.</p>
                <div class="container">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Check In
                        </button>
                        <form class="dropdown-menu p-4">
                            <div class="form-group">
                                <label for="DropdownFormName">Name</label>
                                <input type="name" class="form-control" id="DropdownFormName" placeholder="Insert Name">
                            </div>
                            <div class="form-group">
                                <label for="DropdownFormRating">Rating</label>
                                <input type="rating" class="form-control" id="DropdownFormRating" placeholder="Insert Rating 0/10">
                            </div>
                            <div class="form-group">
                                <label for="txtarea">Review</label><br>
                                <textarea id="txtarea" spellcheck="false" placeholder="Write a Review..."></textarea>
                            </div>

                            <form action="" method="post">
                                <input type="submit" name="submit" value="Submit" />
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2 class="my-4">Additional Information</h2>
    <div class ="card p-4 my-4">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>Average Rating</th>
                <td><?= $product->average_rating ?><img src="stars.png" class="stars" alt="Stars"></td>
            </tr>
            <tr>
                <th>Another Statistic</th>
                <td>78/100</td>
            </tr>
            <tr>
                <th>Yet Another Statistic</th>
                <td>Something Else</td>
            </tr>
            </tbody>
        </table>
    </div>
    <h2 class="my-4">Recent Checkins</h2>

    <div id="checkins">
        <?php foreach($product->getCheckins() as $checkIn): ?>
        <div class="card p-4 my-4">
        <h3><?= $checkIn->name ?></h3>
        <div class="star-rating"><div style="width:<?= $checkIn->rating * 20; ?>%;"><div><?= $checkIn->rating ?></div></div>
        <p><?= $checkIn->review ?></p>
        </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
<script src="W5E1_Exercise_Initech.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
