<?php Controller::view('includes/header')?>

<section class="vh-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 3rem;">
                    <div class="card-body p-5 text-center rounded" style="background-color: #17838F;">      
                        <form action="" method="POST">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Consulte o arquivo login.txt</p>

                            <div class="form-outline form-white mb-4">
                                <input type="text" class="form-control" placeholder="email" name="email"/>  
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" class="form-control" placeholder="senha" name="password"/>
                            </div>

                            <button class="btn btn-outline-light px-5" type="submit" name="login">Entrar</button>
                        </form>         
                    </div>
                </div>
                
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger text-center mt-3 alert-sm" role="alert">
                        <?php
                            foreach ($errors as $error) {
                                echo $error;
                            }
                        ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>

<?php Controller::view('includes/footer')?>