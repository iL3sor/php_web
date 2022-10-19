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
    </nav>
</head>

<body style="background-color:beige">
</body>
<section class="vh-100 gradient-custom" style="margin-top: -40px;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                    <form action="/?controller=pages&action=login" method="POST">
                    <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="" id="typeEmailX" class="form-control form-control-lg" name="username"/>
                                <label class="form-label">Username</label>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password"/>
                                <label class="form-label" for="typePasswordX">Password</label>
                            </div>
                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</html>