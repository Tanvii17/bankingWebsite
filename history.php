<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="Transaction.css">

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <style type="text/css">
        /* Style sheet */
        

        table {
            margin-top: 5%;
            border-radius: 5px;
            margin-left: 27.5%;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            max-width: 100%;
            white-space: nowrap;

        }

        .bg-light {
            background-color: #6ef1b0 !important;
            height: 45px;
        }

        .sendMoney {
            text-decoration: none;
            padding: 1rem 1.2rem;
            background-color: rgb(154, 240, 233) !important;
            color: rgb(15, 15, 15) !important;
            margin-left: 5px;
            padding: 0.75rem;
            transition: all 0.3s;
        }

        .sendMoney:hover {
            background-color: rgba(248, 246, 246, 0) !important;
            color: rgb(72, 233, 219) !important;
        }

        th {
            text-align: center;
            padding: 8px;
            color: #0c0d0d;
            /*background: #ffcda3;*/
            background-color: #f77777;
        }

        tr:nth-child(odd) {
            text-align: center;
            background-color: #50c4cc !important;

            text-align: center;
            padding: 8px;
            font-size: 15px;
        }

        tr:nth-child(even) {

            text-align: center;
            background-color: #f0f0ce !important;
            color: #0c0d0d;
            text-align: center;
            padding: 8px;
            font-size: 15px;
        }



        /* Responsive */

        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }

            .fl-table thead,
            .fl-table tbody,
            .fl-table thead th {
                display: block;
            }


            .fl-table thead {
                float: left;
            }

            .fl-table tbody {
                width: auto;
                position: relative;
                overflow-x: auto;
            }


            .fl-table th {
                padding: 20px .625em .625em .625em;
                height: 60px;
                vertical-align: middle;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
                width: 120px;
                font-size: 13px;
                text-overflow: ellipsis;
            }

            .fl-table thead th {
                text-align: center;

            }

            .fl-table tbody tr {
                display: table-cell;
            }


        }
    </style>
</head>

<body>
    <!-- Navigation Bar code starts here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="homePage.html">T D</a>
        <img src="Images/Bank.jpg" width="26px" height="26px" alt="">
        <a class="navbar-brand"></a>
        <a class="navbar-brand">B A N K</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <a class="nav-link" href="index.html">Dashboard</a>
                <a class="nav-link" href="Transaction.php">Get Started</a>

            </ul>
        </div>

    </nav>

    <div class="my-info text-center">
        <button class="btn sendMoney" data-toggle="modal" data-target="#sendMoney"><a href="transfer.php ">Send Money</a></button>
        <button class="btn sendMoney" data-toggle="modal" data-target="#sendMoney"><a href="Transaction.php ">Customer Details</a></button>

    </div>
    <!-- Navigation Bar code ends here -->
    <div class="table-wrapper">
        <table class="fl-table">

            <thead>
                <tr>
                    <th>Sender's Name</th>
                    <th>Receiver's Name</th>
                    <th>Amount</th>
                    <th>Date and Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "banking";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                ?>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "banking";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //sql query to display 
                $sql = "SELECT * FROM transaction_history ORDER BY Date_Time DESC;";
                $result = $conn->query($sql);
                error_reporting(0);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        //Output of each row
                        echo "<tr><td>" . $row["Sender"] . "</td><td>" . $row["Receiver"] . "</td><td>" . "₹ " . $row["Amount"] . "</td><td>" . $row["Date_Time"] . "</td></tr>";
                    }
                } else {
                    echo "<h2 style ='color:#1a4984;'>0 results</h3>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>