@extends('layouts.app')

@section('title', 'iSHOP - Uprav Produkt')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/admin_edit/styles.css') }}">
@endsection

@section('content')
	<div class="container my-5 px-3 px-sm-5">
		<form class="row g-4" enctype="multipart/form-data">
			<!-- Left Column -->
			<div class="col-md-6">
				<input type="text" class="form-control mb-3 rounded-pill" placeholder="Meno produktu">
				<textarea class="form-control rounded-4" rows="6" placeholder="Popis produktu"></textarea>
			</div>

			<!-- Right Column -->
			<div class="col-md-6">
				<!-- Dropdowns -->
				<select class="form-select mb-3 rounded-pill">
					<option selected disabled>Kategória</option>
					<option value="notebook">Notebook</option>
					<option value="telefon">Telefón</option>
					<option value="tablet">Tablet</option>
					<option value="prislusenstvo">Príslušenstvo</option>
				</select>

				<select class="form-select mb-3 rounded-pill">
					<option selected disabled>Farba</option>
					<option value="cierna">Čierna</option>
					<option value="biela">Biela</option>
					<option value="modra">Modrá</option>
					<option value="cervena">Červená</option>
					<option value="zlata">Zlatá</option>
				</select>

				<select class="form-select mb-3 rounded-pill">
					<option selected disabled>Značka</option>
					<option value="apple">Apple</option>
					<option value="samsung">Samsung</option>
					<option value="xiaomi">Xiaomi</option>
					<option value="hp">HP</option>
					<option value="dell">Dell</option>
				</select>

				<!-- File Input -->
				<div class="mb-3">
					<label for="productPhotos" class="btn btn-outline-dark rounded-pill">Pridať nové fotky</label>
					<input type="file" class="form-control d-none" id="productPhotos" accept="image/*" multiple>
				</div>

				<!-- Image Previews -->
				<div id="previewContainer" class="d-flex flex-wrap gap-2 mb-3"></div>

				<!-- Submit -->
				<div class="text-end">
					<button type="submit" class="btn btn-primary rounded-pill button_color">Upraviť produkt</button>
				</div>
			</div>
		</form>
	</div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/admin_edit/scripts.js') }}"></script>
@endsection