<div class="review-section">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="control-label">{{__("Categoria:")}}</label>
                    <select
                        class="form-control dungdt-select2-field"
                        data-options='{"ajax":{"url":"/admin/module/product/product_category/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Selecione a categoria --"}'
                        name="category_id"
                    >
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="control-label">{{__("Descrição:")}}</label>
                    <input type="text" name="description" class="form-control" required>
                </div>
            </div>
        </div>
    </div>
</div>
