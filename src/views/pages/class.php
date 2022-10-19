<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý lớp học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="/" style="margin-left:20px; ">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/Google_Classroom_Logo.png" width="70" height="70" class="d-inline-block align-top" alt="" style="margin-right:10px;">
            <b style="font-size: 200%">Classroom</b>
        </a>
        <div style="margin-right: 20px ;">
            <button type="button" class="btn btn-outline-secondary" style="margin-right: 10px ; color:white; width: 120px;" onclick="login()">Login</button>
        </div>
    </nav>
</head>

<body style="background-color:beige">
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" style="font-family:Georgia, 'Times New Roman', Times, serif; color: white ; background-color: rgb(147, 64, 0); margin-top:-1px; ">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    <div class="d-flex justify-content-around" ; style="margin-top: 30px">
        <div style="border-color:black">
            <h1 style="color:rebeccapurple; font-family:Georgia, 'Times New Roman', Times, serif; ">Student in class</h1>
        </div>
    </div>
</body>

</html>
<script>
    function login() {
        window.location = "/index.php?controller=pages&action=login"
    }
</script>