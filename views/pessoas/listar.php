<div class="container mt-3">
    <h1> Cadastro de Pessoas - FDS <a class="btn btn-success" href="./pessoa/cadastrar"> Cadastrar </a> </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($listaPessoas)): ?>
                <?php foreach($listaPessoas as $pessoa): ?>
                    <tr>
                        <td> <?= $pessoa['id'] ?> </td>
                        <td> <?= $pessoa['name'] ?> </td>
                        <td> <?= $pessoa['email'] ?> </td>
                        <td> <a class="btn btn-primary"href="pessoa/editar/<?= $pessoa['id'] ?>"> Editar </a> </td>
                        <td> <a class="btn btn-danger"href="pessoa/excluir/<?= $pessoa['id'] ?>"> Excluir </a> </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>