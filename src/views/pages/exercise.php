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
            <b style="font-size: 200%">Exercise Management</b>
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
                        <?php
                        if (@$role == 'teacher') {
                            $counter = 0;
                            if (@$head) {
                                foreach ($head as $p) {
                                    echo "<div class=\"card\" style=\"border-radius: 15px;\"><div class=\"card-body p-5\"><ul><h2 class=\"text-uppercase text-center mb-5\">$p[0]</h2>";
                                    foreach (@$info[$counter] as $i) {
                                        echo "<strong style=\"color:red\"><li class=\"list-group-item\"><a href='/files/students/student_$p[0]$i[0].$i[1]' download>$i[0]</a></li> </strong>";
                                    }
                                    $counter += 1;
                                    echo "</div></div></ul>";
                                }
                            }
                            echo ' <form action="index.php?controller=pages&action=exercise" method="post" enctype="multipart/form-data">
                            <label for="exampleInputPassword1">Exercise name</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="idexercise" required>
                            <label for="formFileDisabled" class="form-label">Upload Exercise</label>
                            <input type="file" class="form-control" name="exercise_content" required />
                            <button type="submit" class="btn btn-secondary " style="margin-top:-65px; margin-left:105%">Upload</button>
                        </form>';
                        } else if (@$role == 'student') {
                            foreach ($list as $p) {
                                echo "<div class=\"card\" style=\"border-radius: 15px;\"><div class=\"card-body p-5\"><ul><h2 class=\"text-uppercase text-center mb-5\"><a href='/files/teachers/teacher_$p[0].$p[2]' download>$p[0]</a></h2>";
                                echo "</div></div></ul>";
                            }
                            echo ' <form action="index.php?controller=pages&action=exercise" method="post" enctype="multipart/form-data">
                            <label for="exampleInputPassword1">Exercise name</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="idexercise" required>
                            <label for="formFileDisabled" class="form-label">Upload Exercise</label>
                            <input type="file" class="form-control" name="ans_content" required />
                            <button type="submit" class="btn btn-secondary " style="margin-top:-65px; margin-left:105%">Upload</button>
                            </form>';
                        }
                        ?>
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