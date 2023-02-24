<?php

include('config/connection.php');

if (isset($_POST['delete'])) {

  $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

  $sql = "DELETE FROM medicineweb.medicines WHERE m_id= $id_to_delete";

  if (mysqli_query($conn, $sql)) {
      // succes

      
  } else {
      echo "quary error" . mysqli_error($conn);
  }

}

// write query for all 
$sql = 'SELECT m_id,med_name, med_manufac, med_supplier,med_supplier,med_ndc,med_exp,med_quantity,med_uprice,med_id FROM medicineweb.medicines ORDER BY created_at';

// make quary and get result
$result = mysqli_query($conn, $sql);

//fetching the resulting rows as an array
$meds = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="/resources/style.css">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <title>Pharmacy Inventory</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-md">
      <a class="navbar-brand" href="#">Logo</a>
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Pharmacy Name
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><a class="dropdown-item" href="#">Log Out</a></li>
        </ul>
      </div>
    </div>

  </nav>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-primary" href="add-drug.php">Add New Drug</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        <th scope="col">Handle</th>
        <th scope="col">Handle</th>
        <th scope="col">Handle</th>
        <th scope="col">Handle</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>


      <?php foreach ($meds as $med) { ?>


        <tr>

          <td><?php echo htmlspecialchars($med['med_id']); ?></td>
          <td><?php echo htmlspecialchars($med['med_name']); ?></td>
          <td><?php echo htmlspecialchars($med['med_manufac']); ?></td>
          <td><?php echo htmlspecialchars($med['med_supplier']); ?></td>
          <td><?php echo htmlspecialchars($med['med_ndc']); ?></td>
          <td><?php echo htmlspecialchars($med['med_exp']); ?></td>
          <td><?php echo htmlspecialchars($med['med_quantity']); ?></td>
          <td><?php echo htmlspecialchars($med['med_uprice']); ?></td>
          <td>
            <form action="invent.php" method="POST">
              <input type="hidden" name="id_to_delete" value="<?php echo $med['m_id'] ?>">
              <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
            </form>
          </td>
        </tr>
      <?php } ?>






    </tbody>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>