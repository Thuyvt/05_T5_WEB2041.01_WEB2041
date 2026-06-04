<?php
    class ProductModel extends BaseModel {
        // Lấy danh sách sản phẩm
        public function getAll() {
            $sql = "SELECT pro.id, pro.image, pro.name as pro_name, pro.price,
            pro.quantity, pro.description, cat.name as cat_name
            FROM products as pro 
            JOIN categories as cat
            ON pro.category_id = cat.id
            ORDER BY pro.id DESC";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // Lấy sản phẩm theo id
        public function getByID($id) {
            $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        }

        // Thêm sản phẩm mới
        public function insert($data) {
            $sql = "INSERT INTO products (name, image, price, description, quantity, is_hot, viewcount, category_id)
                    VALUES (:name, :image, :price, :description, :quantity, :is_hot, :viewcount, :category_id)";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':name' => $data['name'] ?? '',
                ':image' => $data['image'] ?? '',
                ':price' => $data['price'] ?? 0,
                ':description' => $data['description'] ?? '',
                ':quantity' => $data['quantity'],
                ':is_hot' =>  $data['is_hot'] ?? 0,
                ':viewcount' => $data['viewcount'] ?? 0,
                ':category_id' => $data['category_id'] ?? 0,
            ]);
        }

        // Cập nhật sản phẩm theo id
        public function update($data, $id) {
            $sql = "UPDATE products
                    SET name = :name,
                        image = :image,
                        price = :price,
                        description = :description,
                        quantity = :quantity,
                        is_hot = :is_hot,
                        viewcount = :viewcount,
                        category_id = :category_id
                    WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':id' => $id,
                ':name' => $data['name'] ?? '',
                ':image' => $data['image'] ?? '',
                ':price' =>  ($data['price'] ?? 0),
                ':description' => $data['description'] ?? '',
                ':quantity' => ($data['quantity'] ?? 0),
                ':is_hot' =>  ($data['is_hot'] ?? 0),
                ':viewcount' => ($data['viewcount'] ?? 0),
                ':category_id' => ($data['category_id'] ?? 0),
            ]);
        }

        // Xóa sản phẩm theo id
        public function delete($id) {
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([':id' => (int) $id]);
        }

        // Top 4 sản phẩm hot mới nhất
        public function getTop4Hot() {
            $sql = "SELECT id,image,name,price FROM products WHERE is_hot = 1 ORDER BY id DESC LIMIT 4";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        }
    }
?>