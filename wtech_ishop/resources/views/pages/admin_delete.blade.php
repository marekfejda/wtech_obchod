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
            <input type="text" class="form-control form-control-lg text-center rounded-pill" placeholder="UID">
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
                    <h5 class="modal-title text-center #" id="confirmDeleteLabel">Potvrdenie odstránenia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zavrieť"></button>
                </div>
                
                <!-- Body -->
                <div class="modal-body text-center py-3 fs-5">🗑️ Naozaj chcete odstrániť tento produkt?</div>

                <!-- Footer -->
                <div class="modal-footer border-0 d-flex justify-content-between px-4 pb-4">
                    <button type="button" class="btn btn-outline-secondary px-4 py-2 rounded-pill"
                    data-bs-dismiss="modal">Zrušiť</button>
                    <button type="button" class="btn btn-danger px-4 py-2 rounded-pill"
                    id="confirmDeleteBtn">Odstrániť</button>
                </div>
                
            </div>
        </div>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/admin_delete/scripts.js') }}"></script>
@endsection