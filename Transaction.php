<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Details</title>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" type="text/css" href="Transaction.css">
  <style type="text/css">
    /*  Style sheet */
    table {

      border-collapse: collapse;
      margin-top: 5%;
      margin-left: 185px;
      text-align: center;
      color: whitesmoke;
      font-family: sans-serif;

    }

    td:first-child {
      padding-bottom: 5px;
      padding-top: 5px;

    }

    td:nth-child(even) {
      padding-bottom: 5px;
      padding-top: 5px;

    }

    th {
      border: 1px;
       background-color: #f1eebb;
      color: black;
      padding: 25px;
      height: 50px;
      border: 1px;
    }

    tr:first-child {
      margin-bottom: 5px;
      background-color: #0066cc;
    }

    tr:nth-child(even) {
      background-color: #acf0ce;
      color: black;
    }
  </style>

</head>



<body>

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
        <a class="nav-link" href="index.html">Dashboard</a>
        <a class="nav-link" href="Transaction.php">Get Started</a>

      </ul>
    </div>

  </nav>

  <div class="my-info text-center">
    <button class="btn sendMoney" data-toggle="modal" data-target="#sendMoney"><a href="transfer.php ">Send Money</a></button>
    <button class="btn Transaction" href="" data-toggle="modal" data-target="#transactionHistory"><a href="history.php ">Transaction History</a></a>
  </div>


  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>E-Mail ID</th>
        <th>Saving A/C Balance</th>
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

      //sql query to display all
      $sql = "SELECT * FROM customer_details";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["Customer_ID"] . "</td><td>" . $row["Customer_Name"] . "</td><td>" . $row["E-Mail_ID"] . "</td><td>" . $row["Balance"] . "</td></tr>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
    </tbody>
  </table>
</body>

</html>