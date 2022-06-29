<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";
$table_name = 'pharmacy_info';
$inserted = false;
$something_wrong = false;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if ($_POST && isset($_POST['submit'])) {
  $name = $_POST['name'] ? $_POST['name'] : '';
  $company = $_POST['company'] ? $_POST['company'] : '';
  $category = $_POST['category'] ? $_POST['category'] : '';
  $price = $_POST['price'] ? $_POST['price'] : '';



  $sql = "INSERT INTO {$table_name} (name,company,category,price)
   VALUES ('{$name}', '{$company}', '{$category}', '{$price}')";

  if (mysqli_query($conn, $sql)) {
    $inserted = true;
  } else {
    $something_wrong = true;
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
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
        <a href="index.php">List</a>
        <a href="add.php" class="is-active">Add</a>
      </p>

      <?php
      if ($inserted) { ?>.
      <div class="columns mt-4">
        <div class="column is-6 is-offset-3">
          <article class="message is-success">
            <div class="message-body">
              Data insertion successful.
            </div>
          </article>
        </div>
      </div>
    <?php } ?>

    <?php
    if ($something_wrong) { ?>.
    <div class="columns mt-4">
      <div class="column is-6 is-offset-3">
        <article class="message is-danger">
          <div class="message-body">
            Something wrong in insertion.
          </div>
        </article>
      </div>
    </div>
  <?php } ?>



  <div class="columns mt-4">

    <div class="column is-6 is-offset-3">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input required class="input" name="name" type="text" placeholder="Drug  Name">
          </div>
        </div>

        <div class="field">
          <label class="label">company</label>
          <div class="control">
            <input required class="input" name="company" type="text" placeholder="Company">
          </div>
        </div>

        <div class="field">
          <label class="label">category</label>
          <div class="control">
            <input required class="input" name="category" type="text" placeholder="category">
          </div>
        </div>

        <div class="field">
          <label class="label">price</label>
          <div class="control">
            <input required class="input" name="price" type="text" placeholder="price">
          </div>
        </div>

        <div class="field is-grouped">
          <div class="control">
            <input type="submit" class="button is-link" name="submit" value="Submit">
          </div>
        </div>
      </form>
    </div>
  </div>


    </div>
  </div>
</body>

</html>
