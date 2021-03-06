<script src="<?php echo base_url(); ?>application/resources/admin_resources/js/lib/summernote/summernote.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>application/resources/admin_resources/css/lib/summernote/summernote.css"/>
<div id="addNews" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- modal content start -->
		<div class="modal-content">
			<div class="modal-header bg-gray">
				<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
					<i class="font-icon-close-2"></i>
				</button>
				<h3 class="modal-title text-center">Добавить новость</h3>
			</div>
			<form class="form-horizontal mt25 ml50" action="<?php echo base_url(); ?>admin_panel/news" method="POST"   enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="name" class="control-label">Заголовок</label>
						<input type="text" class='form-control' name="name" value="" placeholder="название">
					</div>
					<div class="form-group">
						<label>Предисловие</label>
						<div class="summernote-theme-1">
							<textarea class="summernote" name='caption'></textarea>
						</div>
					</div>
					<div class="form-group">
						<label>Содержание</label>
						<div class="summernote-theme-1">
							<textarea class="summernote" name='content'></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="control-label">Изображение</label>
						<input type="file" class='form-control' name="img" value="">
					</div>
					<div class="form-group option_category">
						<div class="radio">
							<input type="radio" name="status" id="radio-1" value="1" checked="">
							<label for="radio-1">Активно </label>
						</div>
						<div class="radio">
							<input type="radio" name="status" id="radio-2" value="0">
							<label for="radio-2">Не активно </label>
						</div>
					</div>
					<div class="form-group">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn ">
								<input type="checkbox" name='on_main' value="1">На главную
							</label>
							<label class="btn ">
								<input type="checkbox" name='post' value="1"> Опубликовать
							</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input id="<?php echo $csrf_token_name; ?>" type="hidden" value="<?php echo $csrf_hash; ?>" name="<?php echo $csrf_token_name; ?>">                	
					<button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Закрыть</button>
					<button type="submit"  class="btn btn-rounded btn-primary">Сохранить</button>
				</div>
			</form>
		</div>
		<!-- modal content end -->

	</div>
</div>
<div class="page-content">
	<div class="container-fluid">
		<button class='btn btn-inline btn-primary-outline' data-toggle='modal' data-target='#addNews'>Добавить новость</button>
		<section class="box-typical">
			
			<header class="box-typical-header">
				<div class="tbl-row">
					<div class="tbl-cell tbl-cell-title">
						<h3>Список новостей</h3>
					</div>
				</div>
			</header>
			<div class="box-typical-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>№</th>
								<th>Имя</th>
								<th>Описание</th>
								<th>Дата</th>
								<th class="table-icon-cell" style="width: 40px;"></th>
								<th class="table-icon-cell" style="width: 40px;"></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							foreach($data['news'] AS $article) { ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $article['title']; ?></td>
									<td class="color-blue-grey-lighter"><?php echo $article['content']; ?></td>
									<td class="table-date"><i class="font-icon font-icon-clock"></i> <?php echo date('Y-m-d', strtotime($article['date'])); ?> </td>
									<td class="table-icon-cell">
										<a href="<?php echo base_url() ?>admin_panel/edit_article/<?php echo $article['id'] ?>"><i class="font-icon font-icon-pencil"></i></a>
									</td>
									<td class="table-icon-cell">
										<a href="<?php echo base_url(); ?>admin_panel/delete_article/<?php echo $article['id']; ?>" onclick="return window.confirm('Вы уверены?')"><i class="font-icon font-icon-trash"></i></a>
									</td>
								</tr>

								<?php
								$i++;
							} ?>
						</tbody>
					</table>
				</div>
			</div><!--.box-typical-body-->
		</section><!--.box-typical-->

	</div><!--.container-fluid-->
</div><!--.page-content-->
<script>
	$(document).ready(function() {
		$('.summernote').summernote({
			height: 300
		});
		$('.selectpicker').selectpicker({
			style: 'btn-info',
			size: 4
		});

	});

</script>