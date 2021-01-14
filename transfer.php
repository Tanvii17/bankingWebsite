<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Money Transfer</title>
    <link rel="stylesheet" href="Transaction.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" type="text/css" href="Transaction.css">
    <style>
        /* Internal Style sheet */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .bg-light {
            background-color: #6ef1b0 !important;
            height: 45px;
        }

        .wrapper {
            margin: auto;
            margin-top: 90px;
            width: 30%;
            height: 400px;
            box-shadow: 0 27px 87px rgba(256, 256, 256, 5);
            padding: 10px;
            background-color: #98e3d6;
            border-radius: 5px;
            font-family: sans-serif;
        }

        .tab {
            margin-right: -18px;
            display: inline-block;
            font-family: "serif";
        }

        .para {
            margin-left: 15%;
            font-family: "serif";
            color: #fbfaff;
        }

        .value {
            margin-left: 15%;
            font-family: "serif";
            color: #fbfaff;
        }



        .my-info {
            margin-top: -7%;
            font-family: 'serif', sans-serif;
            text-decoration: none;
        }

        .transact {

            margin-top: 10%;
            padding: 12px 20px;
            background-color: rgb(154, 240, 233) !important;
            color: rgb(15, 15, 15) !important;
            margin-left: 1px;
            padding: 0.50rem;
            transition: all 0.3s;
            text-decoration: none;
            font-size: 15px;
            font-family: "Sans-serif";
            cursor: pointer;
            text-align: center;
        }

        .transact:hover {
            background-color: rgba(248, 246, 246, 0) !important;
            color: rgb(72, 233, 219) !important;
            text-decoration: none;
        }

        .transferButton {
            margin-top: 5%;
            padding: 10px 17px;
            border-radius: 4px;
            background: #fff;
            color: #0d0c0d;
            font-size: 15px;
            font-family: "Roboto";
            cursor: pointer;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar code starts here -->
    <nav class="navbar navbar-expand-lg  bg-light">
        <a class="navbar-brand">T D</a>
        <img src="Images/Bank.jpg" width="26px" height="26px" alt="">
        <a class="navbar-brand"></a>
        <a class="navbar-brand">B A N K</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.html">Dashboard</a>
                    <a class="nav-link" href="Transaction.php">Get Started</a>

                </li>
            </ul>
        </div>
    </nav>
    <div class="my-info text-center">
        <button class="btn transact" data-toggle="modal" data-target="#sendMoney"><a class="transact" href="Transaction.php">Customer Details</a></button>
        <button class="btn transact" data-toggle="modal" data-target="#sendMoney"><a class="transact" href="history.php">Transaction History</a>
        </button>
    </div>
    <script type="text/javascript">
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('a');
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) {
                menuItem[i].className = "active"
            }
        }
    </script>
    <!-- Navigation Bar code ends here -->
    <div class="wrapper">
        <p>&nbsp</p>
        <p><span class="tab"></span><strong style="margin-left: 35%; font-size : 125%;">Transfer Money</strong></p>
        <div>
            <form method="post" name='tcredit'>
                <p class="para"><b>Sender-</b> <span class="tab">
                        <select style="margin-left:20px;width:200px" name="Sender" class="form-control" required>
                            <option value="" disabled selected>Select Name</option>
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

                            $sql = "SELECT * FROM customer_details ORDER BY Customer_Name ASC";
                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                echo "Error " . $sql . "<br>" . mysqli_error($conn);
                            }
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <option class="table" value="<?php echo $rows['Customer_ID']; ?>">

                                    <?php echo $rows['Customer_Name']; ?> (Balance:
                                    <?php echo "₹ " . $rows['Balance']; ?> )

                                </option>
                            <?php
                            }
                            ?>
                            </option>
                        </select>
                </p>
                <p class="para"><b>Receiver-</b> <span style="margin-left:40px;width:200px;" class="tab">
                        <select name="Receiver" class="form-control" required>
                            <option value="" disabled selected>Select Name</option>
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

                            $sql = "SELECT * FROM customer_details ORDER BY Customer_Name ASC";
                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                echo "Error " . $sql . "<br>" . mysqli_error($conn);
                            }

                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <option class="table" value="<?php echo $rows['Customer_ID']; ?>">

                                    <?php echo $rows['Customer_Name']; ?>

                                </option>
                            <?php
                            }
                            ?>
                            </option>
                        </select>
                </p>
                <label for="Amount" class="value"><b>Amount-</b> <span class="tab"></span></label>


                <input type="number" name="amount" required>
                <div class="text-center">
                    <button class="transferButton" type="submit" name="submit" id="myBtn">Transfer</button>
                </div>
            </form>
        </div>
    </div>
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
    if (isset($_POST['submit'])) {
        $from = $_POST['Sender'];
        $to = $_POST['Receiver'];
        $amount = $_POST['amount'];

        $sql = "SELECT * from customer_details where Customer_ID=$from";
        $query = mysqli_query($conn, $sql);
        $sql1 = mysqli_fetch_array($query);

        $sql = "SELECT * from customer_details where Customer_ID=$to";
        $query = mysqli_query($conn, $sql);
        $sql2 = mysqli_fetch_array($query);
        // constraint to check if both the sender and receiver are same
        if ($sql1 == $sql2) {
            echo "<script> alert('Sender and Receiver name cannot be same.Please Check.');
                      window.location='transfer.php';</script>";
        }
        // constraint to check input of negative value or zero by user
        if (($amount) <= 0) {
            echo '<script type="text/javascript">';
            echo ' alert("Please Enter a valid Amount")';
            echo '</script>';
        }

        // constraint to check insufficient balance.
        else if ($amount > $sql1['Balance']) {
            echo '<script type="text/javascript">';
            echo ' alert("Insufficient Balance For Transaction.")';
            echo '</script>';
        } 
        else {
            // deducting amount from sender's account
            $newbalance = $sql1['Balance'] - $amount;
            $sql = "UPDATE customer_details set Balance=$newbalance where Customer_ID=$from";
            mysqli_query($conn, $sql);

            // adding amount to reciever's account
            $newbalance = $sql2['Balance'] + $amount;
            $sql = "UPDATE customer_details set Balance=$newbalance where Customer_ID=$to";
            mysqli_query($conn, $sql);

            $sender = $sql1['Customer_Name'];
            $receiver = $sql2['Customer_Name'];
            date_default_timezone_set("Asia/Kolkata");
            $t = time();
            $time = (date("Y-m-d H:i:s", $t));
            $sql = "INSERT INTO transaction_history VALUES ('" . $sender . "','" . $receiver . "','" . $amount . "','" . $time . "')";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo "<script> alert('Transaction Successful!!');
                      window.location='history.php';</script>";
            }
            $newbalance = 0;
            $amount = 0;
        }
    }
    ?>
</body>

</html>