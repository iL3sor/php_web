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
            <b style="font-size: 200%">Profile</b>
        </a>
        <?php
        if (@$_SESSION['user']) {
            echo '<div style="margin-right: 20px ;">
            <button type="button" class="btn btn-outline-secondary" style="margin-right: 10px ; color:white; width: 120px;" onclick="logout()">Logout</button>
        </div>';
        }
        ?>
    </nav>
</head>

<body style="background-color:beige">
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Edit your profile</h2>
                                <h5 class="text-uppercase text-center mb-5" style="color:red"><?php echo $info[0] ?></h5>
                                <?php
                                echo '<form action="?controller=pages&action=profile" method="POST">
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg"';
                                echo "value='" . $info[2] . "'";
                                echo 'name="phone"/>
                                        <label class="form-label" for="form3Example1cg">Your Phone Number</label>
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg"';
                                echo "value='" . $info[1] . "'";
                                echo 'name="email"/>
                                        <label class="form-label" for="form3Example3cg">Your Email Address </label>
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="passwd" required/>
                                        <label class="form-label" for="form3Example4cg" >Your Password (*)</label>
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="newpasswd" />
                                        <label class="form-label" for="form3Example4cg" >Your New Password</label>
                                        <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Modify Info</button>
                                        </div>
                                </form>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<script>
    function logout() {
        window.location = "/index.php?controller=pages&action=logout"
    }
</script>