<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tax Slab</title>
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
</head>

<body class="bg-light">
  <div class="container bg-white my-3 py-3 rounded-3">
  <form action="menuItems.php" method="POST">

    <div class="row">
      <div class="col-4">
          <label class="form-label">
            Tax Type
          </label>
      </div>
      <div class="col-8">
          <label class="form-label">
            Tax Percentage
          </label>
      </div>
    </div>
    
    <div class="row">
      <div class="col">
        
        <input class="form-control" type="text" name="tax-name">
      </div>
      <div class="col">
        
        <input class="form-control" type="text" name="tax-percent">
      </div>
      <div class="col d-grid">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
  </div>
</body>
</html>