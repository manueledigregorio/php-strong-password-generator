<?php
$msg = '';
$method = $_SERVER['REQUEST_METHOD'];

if ($method === "POST") {
  $password = $_POST['password_length'];
  $integer = intval($password);
  if ($integer < 8 ) {
     $msg = 'in numero che hai inserito è meno di 8';
  }
  elseif ($integer > 32) {
    $msg = 'il tuo numero è maggiore di 32 ';
  }
  else {
    $generated_password = generateRandomPassword($integer);
  }
  
}


function generateRandomPassword($integer){
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randPass = '';

  for ($i=0; $i < $integer; $i++){ 
    $randomIndex = mt_rand(0 ,strlen($characters) -1);
    $randPass .= $characters[$randomIndex];
  }
  return $randPass;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="row my-5 justify-content-center ">
      <div class="col-4 text-center ">
        <h1>Genera una password sicura</h1>
        <form action="index.php" method="POST">
          <input type="number"  name="password_length" id="password_length">
          <button type="submit" class="btn btn-primary">Invia</button>
          <button type="button" class="btn btn-secondary">Annulla</button>
        </form>
        <p><?php echo $msg?></p>
        <h4><?php
        if (isset($generated_password)) {
          echo "La tua password e': " . $generated_password;
        }
        ?></h4>
      </div>
    </div>
  </div>
</body>
</html>