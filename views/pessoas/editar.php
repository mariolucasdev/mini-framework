<div class="container mt-3">
    <h1> Editar <a class="btn btn-success" href="<?=base_url()?>"> Voltar </a> </h1>

    <form class="form" action="" method="post">
        <input class="form-control" value="<?= $pessoa['id'] ?>" type="hidden" name="id">
        
        <label for="nome"> Nome: </label>
        <input class="form-control" value="<?= $pessoa['name'] ?>" type="text" name="nome">
        
        <label for="email"> E-mail: </label>
        <input class="form-control" value="<?= $pessoa['email'] ?>" type="email" name="email">

        <input type="submit" value="Enviar!">
    </form>
</div>