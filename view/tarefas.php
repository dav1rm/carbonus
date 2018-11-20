<div class="content-wrapper">
    <div class="container">
        <div class="row">
			<div class="col-md-12">
				<h4 class="page-head-line-tarefas">Tarefas</h4>
			</div>
            <div class="col-md-6">
                <h4 class="page-head">Pendentes</h4>
				<?php if ($tarefas != null) { ?>
					<div class="row">
							<?php
							foreach ($tarefas as $t) {
									?>
									<div class="col-md-6 col-sm-6 col-xs-6">
										<a href="index.php?classe=Tarefa&acao=gerarPerguntas&idPergunta=0&id=<?= $t->getId() ?>" style="text-decoration:none">
											<div class="dashboard-div-wrapper <?= $t->getNivel() ?>">
												<i  class="fa fa-pencil-square dashboard-div-icon" ></i>
												<h5 class="h5-tarefa"><?= $t->getNome(); ?></h5>
											</div>
										</a>
									</div>
								<?php
							}
							?>
					</div>
					<?php } else { ?>
					<div class="alert alert-info" role="alert">Você não possui tarefas!</div>
				<?php } ?>
			</div>
			<div class="col-md-6">
                <h4 class="page-head">Concluidas</h4>
				<?php if ($tarefasconcluidas != null) { ?>
				<div class="row">
							<?php
						foreach ($tarefasconcluidas as $t) {
								?>
								<div class="col-md-6 col-sm-6 col-xs-6" style="opacity:0.5;">
									<a  style="text-decoration:none;">
										<div class="dashboard-div-wrapper <?= $t->getNivel() ?>">
											<i  class="fa fa-pencil-square dashboard-div-icon" ></i>
											<h5 class="h5-tarefa"><?= $t->getNome(); ?></h5>
										</div>
									</a>
								</div>
							<?php
						}
						?>
				</div>
				<?php } else { ?>
					<div class="alert alert-info" role="alert">Nenhuma tarefa concluida!</div>
				<?php } ?>
            </div>
		</div>
    </div>
</div>	