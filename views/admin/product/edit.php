<form action="<?= BASE_URL_ADMIN . '&action=product-update&id=' . ($data['id'] ?? 0) ?>" method="post" enctype="multipart/form-data" class="w-100">
    <input type="hidden" name="id" value="<?= (int) ($data['id'] ?? 0) ?>">
    <input type="hidden" name="old_image" value="<?= htmlspecialchars($data['image'] ?? '') ?>">
    <div class="mb-3">
        <label class="form-label">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($data['name'] ?? '') ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Giá</label>
        <input type="number" name="price" class="form-control" min="0" step="0.01" value="<?= htmlspecialchars($data['price'] ?? 0) ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Số lượng</label>
        <input type="number" name="quantity" class="form-control" min="0" value="<?= htmlspecialchars($data['quantity'] ?? 0) ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Danh mục (category_id)</label>
        <select name="category_id" class="form-control">
            <?php foreach ($list_cat as $cat) : 
                if ($cat['id'] == $data['category_id']) {?>
                    <option value="<?= $cat['id'] ?>" selected><?= $cat['name'] ?></option>
                <?php }
                else { ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                <?php }?>
            <?php endforeach;?>
        </select>
        <!-- <input type="number" name="category_id" class="form-control" min="1" value="<?= htmlspecialchars($data['category_id'] ?? 0) ?>" required> -->
    </div>
    <div class="mb-3">
        <label class="form-label">Ảnh mới</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($data['description'] ?? '') ?></textarea>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="is_hot" value="1" class="form-check-input" id="is_hot" <?= !empty($data['is_hot']) ? 'checked' : '' ?>>
        <label class="form-check-label" for="is_hot">Sản phẩm hot</label>
    </div>
    <!-- <div class="mb-3">
        <label class="form-label">Lượt xem</label>
        <input type="number" name="viewcount" class="form-control" min="0" value="<?= htmlspecialchars($data['viewcount'] ?? 0) ?>">
    </div> -->
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="<?= BASE_URL_ADMIN . '&action=/' ?>" class="btn btn-secondary">Quay lại</a>
</form>
