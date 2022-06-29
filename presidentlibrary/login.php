<?php
    session_start();
    require 'conn.php';
    if (isset($_SESSION['user'])) {
        echo "<script>window.location='user/index.php'</script>";
    } else if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $check_sql = "SELECT * FROM student WHERE student_email = '$email'";
        /** @var mysqli $conn */
        $result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($result) === 1) {
            $line = mysqli_fetch_assoc($result);
            if (password_verify($password, $line['student_password'])) {
                $_SESSION['user'] = $line['student_id'];
                echo "<script>
                        alert('Login success!');
                        window.location = 'user/index.php';
                        </script>";
                die;
            } else {
                $error = true;
            }
        }
    }
?>
<div class="container py-4 py-lg-5">
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Log in</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg></div>
                            <form class="text-center" method="post">
                                <div class="mb-3"><input class="form-control" type="email" name="email" id="email" placeholder="Email"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" id="password" placeholder="Password"></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="login" id="login">Login</button></div>
                                <?php 
                                    if (isset($error)) {
                                        echo "<p style='color: red;'>Invalid email or password!</p>";
                                    } 
                                ?>
                                <p class="text-muted">Don't have an Account?<br><a href="index.php?page=register">Register here</a></p><br></p> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>