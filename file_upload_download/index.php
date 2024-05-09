<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File upload and download</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<style>
        html, body {
            height: 100%;
        }

        .custom-footer {
            background-color: #333; /* Change to your desired color */
            color: #fff; /* Change text color if needed */
        }
    </style>
</head>
<body class="d-flex flex-column">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">File Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="download.php">View Uploaded Files</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<body>
    <div class="container mt-5">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="files" class="form-label">Select file(s)</label>
                <input type="file" class="form-control" name="files[]" id="files" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Upload file(s)</button>
        </form>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
  <div class="container text-center">
    IT Cooperate - Benji.ltd
  </div>
</footer>

</body>
</html>
