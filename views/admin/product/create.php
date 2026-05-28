<form action="<?= BASE_URL_ADMIN . '&action=product-store' ?>" method="post" enctype="multipart/form-data" class="w-100">
    <div class="mb-3">
        <label class="form-label">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Giá</label>
        <input type="number" name="price" class="form-control" min="0" step="0.01" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Số lượng</label>
        <input type="number" name="quantity" class="form-control" min="0" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Danh mục (category_id)</label>
        <input type="number" name="category_id" class="form-control" min="1" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Ảnh</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="is_hot" value="1" class="form-check-input" id="is_hot">
        <label class="form-check-label" for="is_hot">Sản phẩm hot</label>
    </div>
    <div class="mb-3">
        <label class="form-label">Lượt xem</label>
        <input type="number" name="viewcount" class="form-control" min="0" value="0">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="<?= BASE_URL_ADMIN . '&action=/' ?>" class="btn btn-secondary">Quay lại</a>
</form>
