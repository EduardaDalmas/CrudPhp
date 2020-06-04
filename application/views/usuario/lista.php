<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inicio</title>

</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Lista de usuários</h3>
        </div>
        <div class="row">
            <h4> <?= $usuarios->num_rows(); ?> registro(s) </h4>
        </div>
        <li class="nav-item">
            <a class="nav-link" href=" <?=base_url('/usuario/novo'); ?>">Adicionar Usuario</a>
        </li>
        <?php if ($usuarios->num_rows() > 0) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id </th>
                        <th>Nome </th>
                        <th>Email </th>
                        <th>Aniversário </th>
                        <th>Cpf </th>
                        <th>Gênero </th>
                        <th>Criado em </th>
                        <th>Ações </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios -> result() as $cadastro) { ?>
                    <tr>
                        <td><?= $cadastro->id ?></td>
                        <td><?= $cadastro->nome ?> </td>
                        <td><?= $cadastro->email ?> </td>
                        <td><?= $cadastro->aniversario ?> </td>
                        <td><?= $cadastro->cpf ?> </td>
                        <td><?= $cadastro->genero ?> </td>
                        <td><?= $cadastro->criado ?> </td>
                        <td><?= anchor("usuario/editar/$cadastro->id", "Editar") ?>
                        |       <a href="#" class='confirma_exclusao' 
                                data-id="<?= $cadastro->id ?>"
                                data-nome="<?= $cadastro->nome ?>"> Excluir </a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        <?php }  ?>
    </div>
    
    <div class="modal fade" id="modal_confirmation">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmação de exclusão</h4>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente deletar o registro <strong><span id="nome_exclusao"></span></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Agora não</button>
                    <button type="button" class="btn btn-danger" id="btn_excluir"> Sim, tenho certeza</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js');?>" ></script>

    <script>

        var base_url = "<?=base_url();?>";

        $(function(){
            $('.confirma_exclusao').on('click', function(e) {
                e.preventDefault();

                var nome = $(this).data('nome');
                var id = $(this).data('id');

                $('#modal_confirmation').data('nome', nome);
                $('#modal_confirmation').data('id', id);
                $('#modal_confirmation').modal('show');
            });

            $('#modal_confirmation').on('show.bs.modal', function () {
                var nome = $(this).data('nome');
                $('#nome_exclusao').text(nome);
            });

            $('#btn_excluir').click(function() {
                var id = $('#modal_confirmation').data('id');
                document.location.href = base_url + "/usuario/excluir/"+id;
            });
        });

    </script>

</body>
</html>