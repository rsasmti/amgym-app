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
                                <input type="date" class="form-control" id="presence_date" name="presence_date" placeholder="-">
                                <label for="presence_date">Presence Date</label>
                                <span class="text-danger error-text presence_date_error"></span>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="end_of_membership" name="end_of_membership" placeholder="-" readonly>
                                <label for="end_of_membership">Tanggal Berakhir Member</label>
                                <!-- <input type="date" class="form-control" id="end_of_membership" name="end_of_membership" placeholder="-" readonly>
                                <label for="end_of_membership">Tanggal Berakhir Member </label>
                                <span class="text-danger error-text end_of_membership_error"></span> -->
                            </div>
                        </div>
                    </div>

                    <div class="row g-2 mt-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="customer_name" name="customer_name">
                                    <option readonly value="" selected>Choose...</option>
                                    @foreach ($customers as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectGrid">Customer Name</label>
                                <span class="text-danger error-text customer_name_error"></span>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="-" readonly>
                                <label for="nama_product">Nama Produk</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="price" name="price" placeholder="-" readonly>
                                <label for="price">Price</label>
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