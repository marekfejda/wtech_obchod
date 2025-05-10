@extends('layouts.app')

@section('title', 'iSHOP - Odstráň Produkt')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/admin_delete/styles.css') }}">
@endsection

@section('content')
    <!-- Delete Product by UID -->
    <div class="container d-flex justify-content-center align-items-center flex-grow-1 flex-column">
        <!-- Title -->
        <h4 class="mb-4" style="color: #45503B;">Zadaj UID produktu pre jeho odstránenie</h4>

        <!-- UID Input -->
        <div class="mb-3 w-100" style="max-width: 400px;">
            <input type="text" class="form-control form-control-lg text-center rounded-pill" id="productUidInput" placeholder="UID">
        </div>

        <!-- Delete Button -->
        <button class="btn btn-danger px-4 py-2 rounded-pill" data-bs-toggle="modal"
            data-bs-target="#confirmDeleteModal">Odstrániť produkt</button>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">

                <!-- Header -->
                <div class="modal-header border-0 pb-0 text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zavrieť"></button>
                </div>
                
                <!-- Body -->
                <!-- <div class="modal-body text-center py-3 fs-5">Naozaj chcete natrvalo odstrániť tento produkt?</div> -->

                <div class="modal-body text-center py-3 fs-5">
                    <div id="productPreview" class="mb-3 d-none">
                        <img id="previewImage" src="" alt="Preview" style="max-width: 150px;" class="mb-2 rounded shadow-sm">
                        <div id="previewName" class="fw-bold"></div>
                    </div>
                    <div>Naozaj chcete natrvalo odstrániť tento produkt?</div>
                </div>

                <form method="POST" action="{{ route('admin.delete.product') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="product_id" id="deleteProductId">

                    <!-- Footer -->
                    <div class="modal-footer border-0 d-flex justify-content-between px-4 pb-4">
                        <button type="button" class="btn btn-outline-secondary px-4 py-2 rounded-pill"
                            data-bs-dismiss="modal">Zrušiť</button>
                        <button type="submit" class="btn btn-danger px-4 py-2 rounded-pill">Odstrániť</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection


@section('page-js')
<script src="{{ asset('pages/admin_delete/scripts.js') }}"></script>
<script>
    document.querySelector('[data-bs-target="#confirmDeleteModal"]').addEventListener('click', async () => {
        const uid = document.getElementById('productUidInput').value;
        document.getElementById('deleteProductId').value = uid;

        const preview = document.getElementById('productPreview');
        const imageEl = document.getElementById('previewImage');
        const nameEl = document.getElementById('previewName');
        preview.classList.add('d-none');

        if (!uid) return;

        try {
            const response = await fetch(`/admin/product-info/${uid}`);
            if (!response.ok) throw new Error('Produkt nenájdený');
            const data = await response.json();

            nameEl.textContent = data.name ?? 'Bez názvu';
            imageEl.src = data.image ?? '';
            preview.classList.remove('d-none');
        } catch (err) {
            nameEl.textContent = 'Produkt nenájdený';
            imageEl.src = '';
            preview.classList.remove('d-none');
        }
    });
</script>
@endsection