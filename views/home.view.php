<?php Controller::view('includes/header')?>

<section> 
    <div class="container text-center">
        <div class="row mt-5 p-4"  style="background-color: #17838F;">
            <h3 class="text-white mb-3">Bem vindo a home!</h3>

            <div class="col mb-2">
                <div class="card" style="width: 100%; height: 100%;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 25px;">Número de usuários cadastrados</h5>
                        <p class="card-text mt-4">Há um total de <b><?= $users ?></b> usuários cadastrados!</p>
                        <a href="<?= ROOT ?>/users" class="btn btn-sm btn-outline-primary radius-15">Ver todos</a>
                    </div>
                </div>
            </div>
            
            <div class="col mb-2">
                <div class="card" style="width: 100%; height: 100%;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 25px;">Suas informações</h5>
                        <p class="card-text mt-4">email: <?= $_SESSION['user'] ?></p>
                        <?php foreach ($data as $user){
                            if ($user->email == $_SESSION['user']) {
                                if ($user->status == 'active') {
                                    echo "<h4><span class='badge bg-success'>Usuário ativo</span></h4>";
                                } else {
                                    echo "<h4><span class='badge bg-danger'>Usuário inativo</span></h4>";
                                }
                            }
                        } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 p-4"  style="background-color: #17838F;">
            <div class="col mb-2">
                <div class="card" style="width: 100%; height: 100%;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 25px;">Logs do sistema</h5>
                        <p class="card-text mt-4">Veja aqui todos</p>
                        <a href="<?= ROOT ?>/users" class="btn btn-sm btn-outline-primary radius-15">Ver todos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php Controller::view('includes/footer')?>