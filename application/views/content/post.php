<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('part/head'); ?>

<body>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">
			<?php $this->load->view('part/topbar'); ?>
			<?php $this->load->view('part/sidebar'); ?>

			<div class="main-content">
				<section class="section">
					<?php $this->load->view('part/title'); ?>
					<?php $this->load->view('part/alert'); ?>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>Table</h4>
									<div class="card-header-action">
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Tambah Data <i class="fas fa-plus"></i></button type="button">
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped" id="data-table">
											<thead>
												<tr>
													<th>#</th>
													<th>Tanggal</th>
													<th>Judul</th>
													<th>Kategori</th>
													<th>Gambar</th>
													<th>Dilihat</th>
													<th>Status</th>
													<th>Tinjau</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<?php $this->load->view('part/foot'); ?>

		</div>
	</div>

	<?php $this->load->view('part/script'); ?>

	<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Data Baru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form-add" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Kategori</label>
							<div class="col-sm-10">
								<select name="post_category_id" id="post_category_id" class="form-control">
									<?php foreach ($category as $c) : ?>
										<option value="<?= $c->id; ?>"><?= $c->title; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Tanggal</label>
							<div class="col-sm-10">
								<input type="text" class="form-control datepicker" name="date" id="date" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Judul</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="title" id="title" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Gambar</label>
							<div class="col-sm-10">
								<input type="file" class="form-control" name="thumbnail" id="thumbnail" required>
								<span class="text-danger font-italic">(Ukuran File Max. 2000kb)</span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Isi Konten</label>
							<div class="col-sm-10">
								<textarea name="content" id="content"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
								<select name="status" id="status" class="form-control">
									<option value="0">Draft</option>
									<option value="1">Publish</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form-edit" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Kategori</label>
							<div class="col-sm-10">
								<select name="e_post_category_id" id="e_post_category_id" class="form-control">
									<?php foreach ($category as $c) : ?>
										<option value="<?= $c->id; ?>"><?= $c->title; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Tanggal</label>
							<div class="col-sm-10">
								<input type="text" class="form-control datepicker" name="e_date" id="e_date" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Judul</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="e_id" id="e_id" hidden>
								<input type="text" class="form-control" name="e_title" id="e_title" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Isi Konten</label>
							<div class="col-sm-10">
								<textarea name="e_content" id="e_content"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
								<select name="e_status" id="e_status" class="form-control">
									<option value="0">Draft</option>
									<option value="1">Publish</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ubah Gambar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form-image" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Gambar Saat Ini</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_id" id="i_id" hidden>
								<input type="text" class="form-control" name="i_thumbnail_old" id="i_thumbnail_old" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Gambar Baru</label>
							<div class="col-sm-10">
								<input type="file" class="form-control" name="i_thumbnail" id="i_thumbnail" required>
								<span class="text-danger font-italic">(Ukuran File Max. 2000kb)</span>

							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<script>
		$(document).ready(function() {

			var tabledata = $('#data-table').DataTable({
				"processing": true,
				"ajax": "<?= base_url("content/post/data") ?>",
				stateSave: true,
				"order": []
			})

			$("form#form-add").submit(function(e) {
				e.preventDefault();
				var formData = new FormData(this);

				$.ajax({
					url: "<?= base_url('content/post/create') ?>",
					type: 'POST',
					beforeSend: function() {
						swal({
							title: 'Memproses',
							html: 'Memuat Data',
							onOpen: () => {
								swal.showLoading()
							}
						})
					},
					data: formData,
					success: function(data) {
						tabledata.ajax.reload(null, false);
						swal({
							title: 'Sukses',
							text: 'Data telah ditambahkan!',
							icon: "success",
							timer: 3000,
						})

						$('#modal-add').modal('hide');
					},
					error: function(jqXHR, textStatus, errorThrown) {
						swal({
							title: 'Gagal',
							text: 'Judul sudah terpakai!',
							icon: "error",
							timer: 3000,
						})

						$('#modal-add').modal('hide');
					},
					cache: false,
					contentType: false,
					processData: false
				})
				return false;
			});

			$('#data-table').on('click', '.row-edit', function() {
				$.ajax({
					type: "POST",
					url: "<?= base_url('content/post/get') ?>",
					dataType: "JSON",
					beforeSend: function() {
						swal({
							title: 'Memproses',
							html: 'Memuat Data',
							onOpen: () => {
								swal.showLoading()
							}
						})
					},
					data: {
						id: $(this).data('id')
					},
					success: function(data) {
						swal.close();

						$('[name="e_id"]').val(data.id);
						$('[name="e_post_category_id"]').val(data.post_category_id);
						$('[name="e_date"]').val(data.date);
						$('[name="e_title"]').val(data.title);
						$('[name="e_content"]').summernote('code', data.content);
						$('[name="e_status"]').val(data.status);

						$('#modal-edit').modal('show');
					}
				});
			});

			$('#form-edit').on('submit', function() {

				$.ajax({
					type: "POST",
					url: "<?= base_url('content/post/update') ?>",
					beforeSend: function() {
						swal({
							title: 'Memproses',
							html: 'Memuat Data',
							onOpen: () => {
								swal.showLoading()
							}
						})
					},
					data: {
						id: $('#e_id').val(),
						post_category_id: $('#e_post_category_id').val(),
						date: $('#e_date').val(),
						title: $('#e_title').val(),
						content: $('#e_content').val(),
						status: $('#e_status').val()
					},
					dataType: "JSON",
					success: function(data) {
						tabledata.ajax.reload(null, false);
						swal({
							title: 'Sukses',
							text: 'Data telah diubah!',
							icon: "success",
							timer: 3000
						})
						$('#modal-edit').modal('hide');

					},
					error: function(jqXHR, textStatus, errorThrown) {
						swal({
							title: 'Gagal',
							text: 'Terjadi kesalahan!',
							icon: "error",
							timer: 3000,
						})

						$('#modal-edit').modal('hide');
					}
				})
				return false;
			});
			$('#data-table').on('click', '.row-image', function() {
				$.ajax({
					type: "POST",
					url: "<?= base_url('content/post/get') ?>",
					dataType: "JSON",
					beforeSend: function() {
						swal({
							title: 'Memproses',
							html: 'Memuat Data',
							onOpen: () => {
								swal.showLoading()
							}
						})
					},
					data: {
						id: $(this).data('id')
					},
					success: function(data) {
						swal.close();

						$('[name="i_id"]').val(data.id);
						$('[name="i_thumbnail_old"]').val(data.thumbnail);

						$('#modal-image').modal('show');
					}
				});
			});
			$("form#form-image").submit(function(e) {
				e.preventDefault();
				var formData = new FormData(this);

				$.ajax({
					url: "<?= base_url('content/post/update_image') ?>",
					type: 'POST',
					beforeSend: function() {
						swal({
							title: 'Memproses',
							html: 'Memuat Data',
							onOpen: () => {
								swal.showLoading()
							}
						})
					},
					data: formData,
					success: function(data) {
						tabledata.ajax.reload(null, false);
						swal({
							title: 'Sukses',
							text: 'Data telah diubah!',
							icon: "success",
							timer: 3000,
						})

						$('#modal-image').modal('hide');
					},
					error: function(jqXHR, textStatus, errorThrown) {
						swal({
							title: 'Gagal',
							text: errorThrown,
							icon: "error",
							timer: 3000,
						})

						$('#modal-image').modal('hide');
					},
					cache: false,
					contentType: false,
					processData: false
				})
				return false;
			});

			$('#data-table').on('click', '.row-delete', function() {
				swal({
					title: 'Apa anda yakin?',
					text: "Setelah dihapus, data tidak dapat dikembalikan!! ",
					icon: 'warning',
					buttons: {
						cancel: "Cancel",
						catch: {
							text: "OK",
							value: "catch",
						},
					}
				}).then((value) => {
					switch (value) {
						case "catch":
							$.ajax({
								url: "<?= base_url('content/post/delete') ?>",
								method: "POST",
								beforeSend: function() {
									swal({
										title: 'Memproses',
										html: 'Memuat Data',
										onOpen: () => {
											swal.showLoading()
										}
									})
								},
								data: {
									id: $(this).data('id')
								},
								dataType: "JSON",
								success: function(data) {
									swal({
										title: 'Sukses',
										text: 'Data telah dihapus!',
										icon: "success",
										timer: 3000,
									})
									tabledata.ajax.reload(null, false)
								}
							})
							break;

						default:
							swal({
								title: 'Dibatalkan',
								text: 'Tidak ada perubahan!',
								icon: "info",
								timer: 3000,
							});
					}
				})
			});

		});
	</script>




</body>

</html>