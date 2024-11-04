<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Lista de Funcionarios</h4>
            </div>
            <div class="card-body">
                <table id="tableFunci" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;"> Nome</th>
                            <th style="text-align: center;">CPF</th>
                            <th style="text-align: center;">Perfil</th>
                            <th style="text-align: center;">Número da OAB</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Telefone</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = dadosFunc();
                        while ($dados = $query->fetch_array()) {
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $dados['nome']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['cpf']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['perfil']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['numeroOAB']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['email']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['telefone']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['status']; ?></td>
                                <td style="text-align: center;">
                                    <a href="#" class="data-table-edit">
                                        <i class="fa-solid fa-pencil btn btn-primary" data-toggle="modal" data-target="#myModalFunci"></i>
                                    </a>
                                    <a href="../site/scripts/del_funci.php?id=<?php echo $dados['id']; ?>">
                                        <i class="fa-solid fa-trash-can btn btn-danger"></i>
                                    </a>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th style="text-align: center;"> Nome</th>
                            <th style="text-align: center;">CPF</th>
                            <th style="text-align: center;">Perfil</th>
                            <th style="text-align: center;">Número da OAB</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Telefone</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Editar</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>