<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
  <title>Order food & drinks</title>
</head>

<body>
  <div class="container">
    <h1>Order food in restaurant "the Personal Ham Processors"</h1>
    <div>
      <?php

      // if (!empty($errors['email'])) {
      //   echo '<span class="alert alert-danger">' . $errors['email'] . '</span>';
      // }
      // if (!empty($errors['street'])) {
      //   echo '<span class="alert alert-danger">' . $errors['street'] . '</span>';
      // }
      // if (!empty($errors['streetnumber'])) {
      //   echo '<span class="alert alert-danger">' . $errors['streetnumber'] . '</span>';
      // }
      // if (!empty($errors['city'])) {
      //   echo '<span class="alert alert-danger">' . $errors['city'] . '</span>';
      // }
      // if (!empty($errors['zipcode'])) {
      //   echo '<span class="alert alert-danger">' . $errors['zipcode'] . '</span>';
      // }

      foreach ($errors as $field => $error) {
        if (!empty($field)) {
          echo '<span class="alert alert-danger">' . $error . '</span>';
        }
      }
      ?></div>
    <nav>
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link active" href="?food=1">Order food</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?food=0">Order drinks</a>
        </li>
      </ul>
    </nav>
    <?php
    if (empty($_POST) || !empty($errors)) {
      ?>
      <form method="post" location="index.php">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" class="form-control" value="<?php
                                                                                      if (!empty($_POST['email'])) {
                                                                                        echo $_POST['email'];
                                                                                      } elseif (!empty($_SESSION['email'])) {
                                                                                        echo $_SESSION['email'];
                                                                                      }
                                                                                      ?>">

          </div>
          <div>
          </div>
        </div>

        <fieldset>
          <legend>Address</legend>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="street">Street:</label>
              <input type="text" name="street" id="street" class="form-control" value="<?php
                                                                                          if (!empty($_POST['street'])) {
                                                                                            echo $_POST['street'];
                                                                                          } elseif (!empty($_SESSION['street'])) {
                                                                                            echo $_SESSION['street'];
                                                                                          }
                                                                                          ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="streetnumber">Street number:</label>
              <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?php
                                                                                                      if (!empty($_POST['streetnumber'])) {
                                                                                                        echo $_POST['streetnumber'];
                                                                                                      } elseif (!empty($_SESSION['streetnumber'])) {
                                                                                                        echo $_SESSION['streetnumber'];
                                                                                                      }
                                                                                                      ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="city">City:</label>
              <input type="text" id="city" name="city" class="form-control" value="<?php
                                                                                      if (!empty($_POST['city'])) {
                                                                                        echo $_POST['city'];
                                                                                      } elseif (!empty($_SESSION['city'])) {
                                                                                        echo $_SESSION['city'];
                                                                                      }
                                                                                      ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="zipcode">Zipcode</label>
              <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php
                                                                                            if (!empty($_POST['zipcode'])) {
                                                                                              echo $_POST['zipcode'];
                                                                                            } elseif (!empty($_SESSION['zipcode'])) {
                                                                                              echo $_SESSION['zipcode'];
                                                                                            }
                                                                                            ?>">
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>Products</legend>
          <?php
            foreach ($products as $i => $product) : ?>
            <label>
              <input type="checkbox" value="1" name="products[<?php echo $i ?>]" /> <?php echo $product['name'] ?> -
              &euro; <?php echo number_format($product['price'], 2) ?></label><br />
          <?php endforeach; ?>
        </fieldset>

        <button type="submit" class="btn btn-primary">Order!</button>
      </form>
    <?php
    } else {
      echo "<p>Bedankt voor je bestelling! Je bestelling wordt geleverd om $deliveryTime</p>";
    }
    ?>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
  </div>

  <style>
    footer {
      text-align: center;
    }
  </style>
</body>

</html>