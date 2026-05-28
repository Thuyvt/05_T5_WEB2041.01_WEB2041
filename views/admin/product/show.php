<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($data['name'] ?? '') ?></h5>
        <p class="card-text"><strong>Giá:</strong> <?= number_format($data['price'] ?? 0, 0, ',', '.') ?> VNĐ</p>
        <p class="card-text"><strong>Số lượng:</strong> <?= (int) ($data['quantity'] ?? 0) ?></p>
        <p class="card-text"><strong>Danh mục ID:</strong> <?= (int) ($data['category_id'] ?? 0) ?></p>
        <p class="card-text"><strong>Mô tả:</strong> <?= nl2br(htmlspecialchars($data['description'] ?? '')) ?></p>
        <p class="card-text"><strong>Lượt xem:</strong> <?= (int) ($data['viewcount'] ?? 0) ?></p>
        <p class="card-text"><strong>Hot:</strong> <?= !empty($data['is_hot']) ? 'Có' : 'Không' ?></p>
        <?php if (!empty($data['image'])): ?>
            <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . basename($data['image']) ?>" class="img-thumbnail" width="200" alt="">
        <?php endif; ?>
        <div class="mt-3">
            <a href="<?= BASE_URL_ADMIN . '&action=product-edit&id=' . ($data['id'] ?? 0) ?>" class="btn btn-warning">Sửa</a>
            <a href="<?= BASE_URL_ADMIN . '&action=/' ?>" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
