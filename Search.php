
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeShine - Welcome</title>
    <link rel="stylesheet" type="text/css" href="Style.css">

    <style>
        .search-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .search-container input[type="text"]{
            margin:auto;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-container button {
            padding: 10px 15px;
            background-color: #2F5846;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #0062cc;
        }

        .search-container button i {
            margin-left: 5px;
        }

        @media (max-width: 600px) {
            .search-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-container input[type="text"]{
                margin-bottom: 10px;
                width: 100%;
            }

            .search-container button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<?php include('navbar.php'); ?>
<div class="content">
<!-- Main Content -->

    <form class="search-container" action="Search.php" method="GET">
        <!-- Search Value Input -->
        <input type="text" name="query" placeholder="Enter value to search" required>

        <!-- Search Button -->
        <button type="submit">
            Search <i class="fas fa-search"></i>
        </button>
    </form>

    <!-- Add FontAwesome for search icon -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<div class="product">
    <h2>Select a Service</h2>
    <div class="ServiceCon">
    <?php
        include("ConnectDB.php");
            $serachItem = $_GET["query"];
        
            $sql = "SELECT * FROM service WHERE ServiceName LIKE '%$serachItem%'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
               $name = $row["ServiceName"];
               $price =  $row["Price"];
               $ServiceID = $row["ServiceID"];
               $Des = $row["Description"];
               $Photo = $row["ServicePhoto"];
            echo "

        <div class = 'Service'>
        <form action='ServiceDetails.php' method='POST'>
            <input type='hidden' name='serviceType' value='$name'>
            <input type='hidden' name='basePrice' value='$price'>
            <input type='hidden' name='ServiceID' value='$ServiceID'>
            <input type='hidden' name='Des' value='$Des'>
            <button type='submit' class='service-button'>
                <img src='$Photo' alt='$name'>
                <p>$name</p>
            </button>
        </form>
        </div>";

        }
                    } else {
                        echo "0 results";
                    }?>





    </div>
</body>
</div>

   
</body>
</html>