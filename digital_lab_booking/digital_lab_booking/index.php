<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Digital Lab Equipment Booking System</title>

    <style>

        

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f8fc;
            color: #222;
        }

        header {
            background-color: #0b3d91;
            color: white;
            padding: 18px 60px;

            display: flex;
            justify-content: space-between;
            align-items: center;
           
        }

        .operations {
            padding: 40px 60px;
            text-align: center;
        }
        .cards {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }
        .card {
            background-color: white;
            width: 240px;
            

            padding: 25px;

            border-radius: 10px;            
        }

        .card:hover {
            transform: translateY(-5px);
        }
        
    </style>

</head>


<body>

<section>

   <center> <h1>Digital Lab Equipment Booking System</h1></center>

</section>
<hr>
 <center><img src ="sensor.jpg"> </center>
<hr>
<section class="operations">

    

    <div class="cards">

        <div class="card">

            <div class="number">1</div>
            

            <a href="add_equipment.php">
                Add Equipment →
            </a>

        </div>

        <div class="card">

            <div class="number">2</div>

            <a href="equipment.php">
                View Equipment →
            </a>

        </div>

        <div class="card">

            <div class="number">3</div>

            <a href="book.php">
                Book Now →
            </a>

        </div>

        <div class="card">

            <div class="number">4</div>

            <a href="bookings.php">
                View Bookings →
            </a>

        </div>

    </div>

</section>

</body>

</html>