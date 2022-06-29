<?php
    require 'conn.php';
    include 'id_generator.php';
    if (isset($_POST['submit'])) {
        $id = htmlspecialchars($_POST['customer_id']);
        $name = trim(htmlspecialchars($_POST['customer_fullname']));
        $email = trim(htmlspecialchars($_POST['customer_email']));
        $password = $_POST['customer_password'];
        $check_pass = $_POST['confirm_pass'];
        if ($password == $check_pass) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query_string = "INSERT INTO librarian VALUES ('$id', '$name', '$email', '$password')";
            $result = mysqli_query($conn, $query_string);
            if ($result) {
                echo "<script>
                    alert('Account successfully created!');
                    window.location='index.php?page=admin';
                </script>";
            } else {
                $error = true;
            }
        } else {
            $wrong = true;
        }
    }
?>
    <div class="container py-4 py-lg-5">
            <section class="position-relative py-4 py-xl-5">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 col-xl-6 text-center mx-auto">
                            <h2>Register New Admin</h2>
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
                                        <div class="mb-3"></div><input class="form-control" type="text" name="customer_id" id="id-customer" value="<?= GetAdminID($conn) ?>" readonly>
                                        <div class="mb-3"></div><input class="form-control" type="text" name="customer_fullname" id="customer_fullname" placeholder="Fullname">
                                        <div class="mb-3"></div><input class="form-control" type="email" name="customer_email" id="customer_email" placeholder="Email">
                                        <div class="mb-3"></div><input class="form-control" type="password" name="customer_password" id="customer_password" placeholder="Password">
                                        <div class="mb-3"></div><input class="form-control" type="password" name="confirm_pass" id="confirm_pass" placeholder="Retype Password">
                                        <div class="mb-3">
                                        <?php if (isset($error)) {
                                            echo "<p style='color: red;'>Gagal Login!</p>";
                                        } else if (isset($wrong)) {
                                            echo "<p style='color: red;'>Invalid email or password!</p>";
                                        }?>
                                        <div class="mb-3"></div><button class="btn btn-primary d-block w-100" type="submit" name="submit" id="submit">Sign Up</button><div class="mb-4"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </div>