<div class="container mt-3">
    <h1>Excluir Pessoa</h1>
    <h3>Deseja realmente excluir <?= $name ?> ?</h3>

    <a class="btn btn-success" href="<?=base_url('pessoa/excluir/'.$id.'/checked')?>"> Quero Excluir! </a>
    <a class="btn btn-danger" href="<?=base_url()?>"> Cancelar </a>
</div>