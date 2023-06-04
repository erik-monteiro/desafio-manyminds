<?php Controller::view('includes/header')?>

<section>
    <div class="container text-center container-fluid mt-5">
    <?php foreach ($dataUser as $infoUser): ?>
        <h3 class="text-white">Informações sobre usuários</h3>
        <ul class="list-group mt-2">
            <li class="list-group-item">Usuário novo criado em <?= date('d/m/Y H:i:s', strtotime($infoUser->created_at ));?></li>
            <li class="list-group-item">Usuário editado em <?= date('d/m/Y H:i:s', strtotime($infoUser->updated_at)); ?>
        </ul>
    <?php endforeach ?>
    <div class="container text-center container-fluid mt-5">
        <h3 class="text-white">Informações sobre logins</h3>
        <?php foreach ($logs as $log): ?>
            <ul class="list-group mt-2">
                <li class="list-group-item">Endereço IP: <?= $log->ip_address ?></li>
                <li class="list-group-item">Hora da tentativa: <?= date('d/m/Y H:i:s', strtotime($log->attempt_time)); ?></li>
            </ul>
        <?php endforeach ?>
    </div>
    </div>
</section>

<?php Controller::view('includes/footer')?>