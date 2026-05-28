<div class="row mb-3">
    <div class="col">
        <a href="<?= BASE_URL_ADMIN . '&action=product-create' ?>" class="btn btn-primary">Thêm mới</a>
    </div>
</div>

<div class="row">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
        <?php foreach($data as $pro) :?>
        <tr>
            <td><?= $pro["id"]?></td>
            <td>
                <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $pro["image"]?>" width="100px">
            </td>
            <td><?= $pro["pro_name"]?></td>
            <td><?= $pro["cat_name"]?></td>
            <td><?= $pro["price"]?></td>
            <td><?= $pro["quantity"]?></td>
            <td><?= $pro["description"]?></td>
            <td>
                <a href="<?= BASE_URL_ADMIN . '&action=product-show&id=' . $pro['id'] ?>"
                    class="btn btn-info">Xem</a>

                <a href="<?= BASE_URL_ADMIN . '&action=product-edit&id=' . $pro['id'] ?>"
                    class="btn btn-warning ms-1 me-1 mb-1 mt-1">Sửa</a>

                <a href="<?= BASE_URL_ADMIN . '&action=product-delete&id=' . $pro['id'] ?>"
                    onclick="return confirm('Có chắc xóa không?')"
                    class="btn btn-danger">Xóa</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</div>