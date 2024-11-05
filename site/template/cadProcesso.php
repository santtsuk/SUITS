<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cadastro de Processos
                <a href="dashboard.php?r=telaProcesso">(Dados do Processo)</a>
                </h4>
            </div>
            <div class="card-body">
                <form class="row g-3" method="post" action="../_scripts/salvarProcesso.php">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Cliente</label>
                        <input type="text" name="cliente" required class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Data</label>
                        <input type="text" name="data" required class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Horário</label>
                        <input type="text" name="horario" required class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Número do Processo</label>
                        <input type="text" id="numeroProcesso" name="cpf" required class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Vara</label>
                        <input type="text" id="vara" required name="telefone" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Salvar Processo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
