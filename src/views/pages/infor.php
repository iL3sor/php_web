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
            <b style="font-size: 200%">Detail Information</b>
        </a>
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
                                <h2 class="text-uppercase text-center mb-5">View Profile</h2>
                                <ul style="padding-left:60px">
                                    <?php
                                    if (@$role == 'student') {
                                        if (@$info) {
                                            $html = "";
                                            $i = 1;
                                            foreach ($info as $p) {
                                                $html .= "<label class=\"form-label\">Name</label>";
                                                $html .= "<strong style=\"color:red\"><li class=\"list-group-item\">$p[0]</li> </strong>";
                                                $html .= "<label class=\"form-label\">Email</label>";
                                                $html .= "<strong style=\"color:blue\"><li class=\"list-group-item\">$p[1]</li> </strong>";
                                                $html .= "<label class=\"form-label\">Phone</label>";
                                                $html .= "<strong style=\"color:green\"><li class=\"list-group-item\">$p[2]</li> </strong>";
                                            }
                                            echo $html;
                                        }
                                        if (@$mess) {
                                            $html = "<br><label class=\"form-label\">Your messages to this person</label>";
                                            $i = 1;
                                            foreach ($mess as $p) {
                                                $html .= "<form action=\"/?controller=pages&action=alter\" method='POST'> <strong style=\"color:brown\"><li class=\"list-group-item\" id='$i' name='mess'>$p[0]</li> </strong> <button type=\"submit\" class=\"btn btn-danger btn-sm\" name=\"delete\" value='$p[0]'>Delete</button> &nbsp;&nbsp;&nbsp;
                                                    <button type=\"submit\" class=\"btn btn-warning btn-sm\" name=\"edit\" value='$p[0]'>Edit</button></form>";
                                                $i = $i + 1;
                                            }
                                            echo $html;
                                            
                                        }
                                        if (@$rev) {
                                            $html = "<br><label class=\"form-label\">Your received messages</label>";
                                            foreach ($rev as $p) {
                                                $html .= "<strong style=\"color:brown\"><li class=\"list-group-item\"name='mess'>$p[0] : $p[1]</li> </strong>";
                                            }
                                            echo $html;
                                        }
                                    } else {
                                        if (@$info) {
                                            $html = "";
                                            $i = 1;
                                            foreach ($info as $p) {
                                                $html .= "<form action=\"/?controller=pages&action=alter\" method='POST'> <button type=\"submit\" class=\"btn btn-danger btn-sm\" name=\"deleteuser\" style=\"width:210px\" value='$p[3]'>Delete</button> &nbsp;&nbsp;&nbsp;
                                                <button type=\"submit\" class=\"btn btn-warning btn-sm\" style=\"width:210px\" name=\"editinfo\" value='$p[3]'>Edit</button></form>";
                                                $html .= "<label class=\"form-label\">Username</label>";
                                                $html .= "<strong style=\"color:green\"><li class=\"list-group-item\">$p[3]</li> </strong>";
                                                $html .= "<label class=\"form-label\">Password</label>";
                                                $html .= "<strong style=\"color:green\"><li class=\"list-group-item\">$p[4]</li> </strong>";
                                                $html .= "<label class=\"form-label\">Name</label>";
                                                $html .= "<strong style=\"color:red\"><li class=\"list-group-item\">$p[0]</li> </strong>";
                                                $html .= "<label class=\"form-label\">Email</label>";
                                                $html .= "<strong style=\"color:blue\"><li class=\"list-group-item\">$p[1]</li> </strong>";
                                                $html .= "<label class=\"form-label\">Phone</label>";
                                                $html .= "<strong style=\"color:green\"><li class=\"list-group-item\">$p[2]</li> </strong>";
                                            }
                                            echo $html;
                                        }
                                        if (@$mess) {
                                            $html = "<br><label class=\"form-label\">Your messages to this person</label>";
                                            $i = 1;
                                            foreach ($mess as $p) {
                                                $html .= "<form action=\"/?controller=pages&action=alter\" method='POST'> <strong style=\"color:brown\"><li class=\"list-group-item\" id='$i' name='mess'>$p[0]</li> </strong> <button type=\"submit\" class=\"btn btn-danger btn-sm\" name=\"delete\" value='$p[0]'>Delete</button> &nbsp;&nbsp;&nbsp;
                                                    <button type=\"submit\" class=\"btn btn-warning btn-sm\" name=\"edit\" value='$p[0]'>Edit</button></form>";
                                                $i = $i + 1;
                                            }
                                            echo $html;
                                        }
                                        if (@$rev) {
                                            $html = "<br><label class=\"form-label\">Your received messages</label>";
                                            foreach ($rev as $p) {
                                                $html .= "<strong style=\"color:brown\"><li class=\"list-group-item\"name='mess'>$p[0] : $p[1]</li> </strong>";
                                            }
                                            echo $html;
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <form action="/?controller=pages&action=message" method="POST">
                            <div class="form-group">
                                <label for="comment">Leave Message:</label>
                                <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
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