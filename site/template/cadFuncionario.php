<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cadastro Funcionarios</h4>
                <a href="dashboard.php?r=telaFuncionarios">Buscar Funcionarios</a>
            </div>
            <div class="card-body">
                <form class="row g-3" method="POST" action="">
                    <div class="col-md-12">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" required name="nome" id="nome" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" required id="cpf" name="cpf" class="form-control" placeholder="000.000.000-00" maxlength="11">
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="opcao" class="form-label">Perfil</label>
                        <select required name="perfil" class="form-control" id="opcao" onchange="habilitarCampo()">
                            <option value=""> Selecione um perfil </option>
                            <option value="advogado">Advogado</option>
                            <option value="secretaria">Secretaria</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="numOAB" class="form-label">Número da OAB</label>
                        <input type="num" id="numOAB" required name="numeroOAB" class="form-control" disabled placeholder="000000/UF">
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="especializacao" class="form-label">Especialização </label>
                        <select required name="especializacao" class="form-control" id="especializacao" disabled>
                            <option value="">Selecione uma Especialização</option>
                            <option value="direito_civil">Direito Civil</option>
                            <option value="direito_penal">Direito Penal</option>
                            <option value="direito_trabalhista">Direito Trabalhista</option>
                            <option value="direito_tributario">Direito Tributário</option>
                            <option value="direito_empresarial">Direito Empresarial</option>
                            <option value="direito_administrativo">Direito Administrativo</option>
                            <option value="direito_ambiental">Direito Ambiental</option>
                            <option value="direito_familia">Direito de Família</option>
                            <option value="direito_internacional">Direito Internacional</option>
                            <option value="direito_consumidor">Direito do Consumidor</option>
                            <option value="direito_imobiliario">Direito Imobiliário</option>
                            <option value="direito_digital">Direito Digital</option>
                            <option value="direito_bancario">Direito Bancário</option>
                            <option value="direito_previdenciario">Direito Previdenciário</option>
                            <option value="direito_propriedade_intelectual">Direito de Propriedade Intelectual</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" required name="email" id="email" class="form-control">
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite sua senha" required>
                        <i class="fas fa-eye position-absolute toggle-password" style="right: 15px; top: 45px; cursor: pointer;"></i>
                    </div>
                    <div class="col-md-6">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" id="telefone" required name="telefone" class="form-control" placeholder="(00)00000-0000">
                    </div>
                    <div class="col-md-6">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" id="cep" required name="cep" class="form-control" placeholder="00000-000" onblur="pesquisacep(this.value)" required>
                    </div>
                    <div class="col-md-6">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" required name="numero" id="numero" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="rua" class="form-label">Rua</label>
                        <input type="text" required name="rua" id="rua" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" required name="bairro" id="bairro" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" required name="cidade" id="cidade" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="estado" class="form-label">Estado</label>
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

<script>
    function habilitarCampo() {
        const select = document.getElementById("opcao");
        const imput = document.getElementById("numOAB");
        const imputEsp = document.getElementById("especializacao");
        if (select.value === "advogado") {
            imput.disabled = false;
            imputEsp.disabled = false;
        } else {
            imput.disabled = true;
            imputEsp.disabled = true;
        }
    }
</script>

<script>
    document.querySelector('.toggle-password').addEventListener('click', function(e) {
        const passwordInput = document.getElementById('senha');
        const icon = e.target;

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
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
    include "../site/scripts/config.php";

    $nome = $mysqli->real_escape_string($_POST['nome']);
    $cpf = $mysqli->real_escape_string($_POST['cpf']);
    $perfil = $mysqli->real_escape_string($_POST['perfil']);
    $numeroOAB = $mysqli->real_escape_string($_POST['numeroOAB']);
    $especializacao = $mysqli->real_escape_string($_POST['especializacao']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $telefone = $mysqli->real_escape_string($_POST['telefone']);
    $cep = $mysqli->real_escape_string($_POST['cep']);
    $rua = $mysqli->real_escape_string($_POST['rua']);
    $bairro = $mysqli->real_escape_string($_POST['bairro']);
    $cidade = $mysqli->real_escape_string($_POST['cidade']);
    $numero = $mysqli->real_escape_string($_POST['numero']);
    $estado = $mysqli->real_escape_string($_POST['estado']);
    $status = "Ativo";

    $sql = "INSERT INTO funcionarios (nome, cpf, perfil, numero_oab,especializacao,email,  senha, telefone, cep, rua, bairro, cidade,numero, estado, status) 
                VALUES ('$nome', '$cpf', '$perfil','$numeroOAB','$especializacao','$email', '$senha', '$telefone', '$cep', '$rua', '$bairro', '$cidade','$numero', '$estado','$status')";
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
            }).then(okay => {
                if (okay) {
                    window.location.href = 'dashboard.php?r=cadFuncionario';
                }
            });
        </script>";
<?php }
} ?>
