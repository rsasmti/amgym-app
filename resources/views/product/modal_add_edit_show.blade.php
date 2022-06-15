<!-- Modal -->
<div class="modal fade" id="modal_add_edit_show" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- modal-header -->
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- modal-body -->
            <div class="modal-body">
                <form id="form-modal_add_edit_show" name="form-modal_add_edit_show" enctype="multipart/form-data">
                    <div class="divId">
                        <input class="form-control" type="hidden" id="id" name="id">
                    </div>

                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="jenis_product" name="jenis_product" placeholder="-">
                                <label for="jenis_product">Jenis Product</label>
                                <span class="text-danger error-text jenis_product_error"></span>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="tipe_product" name="tipe_product">
                                    <option selected disabled>Choose...</option>
                                    <option value="Harian">Harian</option>
                                    <option value="Bulanan">Bulanan</option>
                                </select>
                                <label for="floatingSelectGrid">Tipe Product</label>
                                <span class="text-danger error-text tipe_product_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="price" name="price" placeholder="-">
                                <label for="price">Harga</label>
                                <span class="text-danger error-text price_error"></span>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <!-- modal-footer -->
            <div class="modal-footer">
                <button id="closeBtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="saveBtn" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>