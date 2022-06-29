<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";
$table_name = 'pharmacy_info';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM ${table_name}";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
  <div class="container">
    <div class="notification is-light">
      <h2 class="is-flex is-justify-content-center has-text-weight-bold is-size-4">Pharmacy Management System</h2>
    </div>

    <div class="panel is-danger">
      <p class="panel-tabs">
        <a href="index.php" class="is-active">List</a>
        <a href="add.php">Add</a>
      </p>

      <div class="panel-block">
        <table class="table is-fullwidth">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>company</th>
              <th>category</th>
              <th>price</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <th><?php echo $row["id"] ?></th>
                  <td><?php echo $row["name"] ?></td>
                  <td><?php echo $row["company"] ?></td>
                  <td><?php echo $row["category"] ?></td>
                  <td><?php echo $row["price"] ?></td>
                  <td>
                    <a href="edit.php?id=<?php echo $row["id"] ?>" class="button is-info">Edit</a>
                    <a href="delete.php?id=<?php echo $row["id"] ?>" class="button is-danger">Delete</a>
                  </td>

                </tr>
              <?php }
            } else { ?>
              <tr>
                <td colspan="5" class="has-background-danger has-text-light p-4" style="text-align: center;">No data found</td>
              </tr>
            <?php }
            ?>

          </tbody>

        </table>
      </div>


    </div>
  </div>
</body>

</html>
