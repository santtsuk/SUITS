
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cadastro Funcionarios</h4>
                <a href="dashboard.php?r=telaFuncionarios" >Buscar Funcionarios</a>
            </div>
            <div class="card-body">
                <form class="row g-3" method="POST" action="">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Nome</label>
                        <input type="text" required name="nome" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCep" class="form-label">CPF</label>
                        <input type="text"  required id="cpf" name="cpf" class="form-control" placeholder="000.000.000-00" maxlength="11">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPerfil" class="form-label">Perfil</label>
                        <select required name="perfil" class="form-control" id="opcao" onchange="habilitarCampo()">
                            <option value="">Selecione um perfil</option>
                            <option value="advogado">Advogado</option>
                            <option value="secretaria">Secretaria</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Número da OAB</label>
                        <input type="num" id="numOAB" required name="numeroOAB" class="form-control" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input type="text"  required name="email" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Senha</label>
                        <input type="text"  required name="senha" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Telefone</label>
                        <input type="text" id="telefone"  required name="telefone" class="form-control" placeholder="(00) 00000-0000" maxlength="11">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCep" class="form-label">CEP</label>
                        <input type="text" id="cep" required name="cep" class="form-control" placeholder="00000-000" maxlength="10" onblur="pesquisacep(this.value)">
                    </div>
                    <div class="col-md-6">
                        <label for="inputRua" class="form-label">Número</label>
                        <input type="text" required name="numero" id="numero" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="inputRua" class="form-label">Rua</label>
                        <input type="text" required name="rua" id="rua" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputBairro" class="form-label">Bairro</label>
                        <input type="text" required name="bairro" id="bairro" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCidade" class="form-label">Cidade</label>
                        <input type="text" required name="cidade" id="cidade" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEstado" class="form-label">Estado</label>
                        <input type="text" required name="estado" id="estado" class="form-control" readonly>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Salvar Cadastro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script>
function habilitarCampo(){
    const select = document.getElementById("opcao");
    const imput = document.getElementById("numOAB");
    if(select.value === "advogado"){
        imput.disabled = false;
    }else{
        imput.disabled = true;
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function limpa_formulário_cep() {
        document.getElementById('rua').value = "";
        document.getElementById('bairro').value = "";
        document.getElementById('cidade').value = "";
        document.getElementById('estado').value = "";
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('rua').value = conteudo.logradouro;
            document.getElementById('bairro').value = conteudo.bairro;
            document.getElementById('cidade').value = conteudo.localidade;
            document.getElementById('estado').value = conteudo.uf;
        } else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {
                document.getElementById('rua').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('estado').value = "...";

                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
                document.body.appendChild(script);
            } else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } else {
            limpa_formulário_cep();
        }
    }
</script>

<?php

if (!empty($_POST)) {
    include "../pages/scripts/config.php";

    $nome = $mysqli->real_escape_string($_POST['nome']);
    $cpf = $mysqli->real_escape_string($_POST['cpf']);
    $perfil = $mysqli->real_escape_string($_POST['perfil']);
    $numeroOAB = $mysqli->real_escape_string($_POST['numeroOAB']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $telefone = $mysqli->real_escape_string($_POST['telefone']);
    $cep = $mysqli->real_escape_string($_POST['cep']);
    $rua = $mysqli->real_escape_string($_POST['rua']);
    $bairro = $mysqli->real_escape_string($_POST['bairro']);
    $cidade = $mysqli->real_escape_string($_POST['cidade']);
    $estado = $mysqli->real_escape_string($_POST['estado']);

        $sql = "INSERT INTO funcionarios (nome, cpf, perfil, numeroOAB,email,senha,telefone, cep, rua, bairro, cidade, estado) 
                VALUES ('$nome', '$cpf', '$perfil','$numeroOAB','$email', '$senha', '$telefone', '$cep', '$rua', '$bairro', '$cidade', '$estado')";
        $query = $mysqli->query($sql);

        if ($query) { ?>
            <script language='javascript'>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Cadastro Salvo com Sucesso!',
                    confirmButtonText: 'OK',
                    backdrop: true
                }).then(okay => {
                    if (okay) {
                        window.location.href = 'dashboard.php?r=cadFuncionario';
                    }
                });
            </script>";
        <?php } else { ?>
            <script language='javascript'>
                Swal.fire({
                    position: 'center',
                    title: 'Error!',
                    text: 'Houve um erro ao processar seu cadastro.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    backdrop: true
                });
            </script>";
<?php }
    }
?>