<?php Controller::view('includes/header')?>

<div class="container mt-5">
    <form method="POST">
        <?php if ($row): ?>
            <div class="card d-flex justify-content-center mb-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Realmente deseja excluir?</h5>

                    <a href="<?= ROOT ?>/users" class="btn btn-danger">Cancelar</a>

                    <input type="hidden" name="id">
                    <input class="btn btn-success" type="submit" value="Excluir">
                </div>
            </div>
        <?php endif ?>
    </form>
</div>

<?php Controller::view('includes/footer')?>
