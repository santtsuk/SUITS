<div class="col-lg-6 col-12 mt-4 mt-lg-0">
  <div class="card shadow h-100">
    <div class="card-header pb-0 p-3">
      <h6 class="mb-0">Minhas Estatísticas</h6>
    </div>
    <div class="card-body p-4">
      <ul class="list-group">
        
        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-3">
          <div class="w-100">
            <div class="d-flex justify-content-between mb-2">
              <span class="text-sm font-weight-bold text-dark">Tarefas Pendentes</span>
              <span class="text-sm font-weight-bold"><?php echo tarefasPendentesbyID() ?></span>
            </div>
            <div class="progress progress-md rounded">
              <div class="progress-bar bg-warning" role="progressbar"
                style="width: <?php echo $pendentesPercent; ?>%;"
                aria-valuenow="<?php echo $pendentesPercent; ?>" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
          </div>
        </li>

        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-3">
          <div class="w-100">
            <div class="d-flex justify-content-between mb-2">
              <span class="text-sm font-weight-bold text-dark">Tarefas Atrasadas</span>
              <span class="text-sm font-weight-bold"><?php echo tarefasAtrasadas(); ?></span>
            </div>
            <div class="progress progress-md rounded">
              <div class="progress-bar bg-danger" role="progressbar"
                style="width: <?php echo $atrasadasPercent; ?>%;"
                aria-valuenow="<?php echo $atrasadasPercent; ?>" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
          </div>
        </li>


        
        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-3">
          <div class="w-100">
            <div class="d-flex justify-content-between mb-2">
              <span class="text-sm font-weight-bold text-dark">Tarefas Concluídas</span>
              <span class="text-sm font-weight-bold"><?php echo tarefasConcluidasbyID() ?></span>
            </div>
            <div class="progress progress-md rounded">
              <div class="progress-bar bg-success" role="progressbar"
                style="width: <?php echo $concluidasPercent; ?>%;"
                aria-valuenow="<?php echo $concluidasPercent; ?>" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
          </div>
        </li>

        
        <li class="list-group-item border-0 d-flex align-items-center px-0">
          <div class="w-100">
            <div class="d-flex justify-content-between mb-2">
              <span class="text-sm font-weight-bold text-dark">Eficiência</span>
              <span class="text-sm font-weight-bold"><?php echo $eficienciaPercent . '%' ?></span>
            </div>
            <div class="progress progress-md rounded">
              <div class="progress-bar bg-info" role="progressbar"
                style="width: <?php echo $eficienciaPercent; ?>%;"
                aria-valuenow="<?php echo $eficienciaPercent; ?>" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>