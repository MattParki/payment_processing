<?php
    require_once "products.php";
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        .container { margin-top: 100px; }
        .card { width: 300px; }
        .card:hover {
            -webkit-transform: scale(1.05);
            -moz-transform: scale(1.05);
            -ms-transform: scale(1.05);
            -mo-transform: scale(1.05);
            -transform: scale(1.05);
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }
        .list-group-item {
            border: 0px;
            padding: 5px;
        }
        .price {
            font-size: 72px;
        }
        .currency {
            position: relative;
            font-size: 25px;
            top: -31px;
        }

    </style>
    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <?php
    $colNum = 1;
        foreach($products as $productID => $attributes) {
            if ($colNum == 1)
                echo '<div class="row">';
                echo '
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2 class="price"><span class="currency">£</span>'.($attributes['price']/100).'</h2>
                        </div>
                        <div class="card-body text-center">
                            <div class="card-title">
                                <h1>'.$attributes['title'].'</h1>
                            </div>
                            <ul class="list-group">
                            ';

                            foreach ($attributes['features'] as $feature)
                                echo '<li class ="list-group-item">'.$feature.'</li>';
                            echo '
                            </ul>
                        </div>
                    </div>
                </div>
                ';

            if ($colNum == 3) {
                echo '</div>';
                $colNum = 0;
            } else
                $colNum++;

        }
    ?>

</div>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>