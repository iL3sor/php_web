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
            <b style="font-size: 200%">Edit Message</b>
        </a>
    </nav>
</head>

<body style="background-color:beige">
    <section class="vh-100 bg-image" style="margin-top: -80px">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <form action="/?controller=pages&action=alter" method="POST">
                            <div class="form-group">
                                <label for="comment">Edit Message:</label>
                                <?php
                                    echo "<textarea class=\"form-control\" rows=\"5\" id=\"comment\" name=\"message\">$mess</textarea>
                                    <input name=\"to\" type=\"hidden\" value='$to' ></input>";
                                ?>
                            </div>
                            <button type="submit" class="btn btn-success" style="margin-top:10px; width:80px; margin-left: 85%">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>