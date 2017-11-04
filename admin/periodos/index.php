<?php include_once '../layout/_topo.php'; ?>
<?php require_once '../../include/data/database-periodos.php'; ?>
<?php verificarLogin() ?>


<div class="cointainer">

	<div class="page-header">
		<h2>Gerenciar <small>Períodos</small></h2>		
	</div>	

	<table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Período</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach (lista_periodos() as $periodo) : ?>

            <tr>
                <th scope="row"><?php echo $periodo['id']; ?></th>
                <td><?php echo $periodo['descricao']; ?></td>
                <td>
                	<a class="btn btn-info" href="/DexterEscola/admin/periodos/edit.php?id=<?php echo $periodo['id']; ?>" role="button"><span class="glyphicon glyphicon-edit"></span> Editar Período</a>
                	<form action="/DexterEscola/admin/periodos/delete.php" method="post" class="action-delete">
                        <input type="hidden" name="id" value="<?php echo $periodo['id']; ?>">
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Excluir Período</button>
                    </form>
                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>

	<div class="pull-right">
    	<a class="btn btn-primary" href="/DexterEscola/admin/periodos/new.php" role="button"><span class="glyphicon glyphicon-plus"></span> Novo Período</a>
	</div>
	
	<div class="clearfix"></div>
	
</div>

<?php include_once '../layout/_rodape.php'; ?>