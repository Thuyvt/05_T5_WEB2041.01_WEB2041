<?php
    class ProductController {
        private $productModel;
        private $categoryModel;

        public function __construct() {
            $this->productModel = new ProductModel();
            $this->categoryModel = new CategoryModel();
        }

        // Chuyển trang về trang danh sách sản phẩm
        private function redirectToList() {
            header('Location: ' . BASE_URL_ADMIN . '&action=/');
            exit;
        }

        private function getProductId($id = null) {
            return (int) ($id ?? $_GET['id'] ?? $_POST['id'] ?? 0);
        }


        private function collectData() {
            $data = [
                'name' => $_POST['name'] ?? '',
                'price' => (float) ($_POST['price'] ?? 0),
                'description' => $_POST['description'] ?? '',
                'quantity' => (int) ($_POST['quantity'] ?? 0),
                'is_hot' => !empty($_POST['is_hot']) ? 1 : 0,
                'viewcount' => (int) ($_POST['viewcount'] ?? 0),
                'category_id' => (int) ($_POST['category_id'] ?? 0),
            ];

            if (!empty($_FILES['image']['name'])) {
                $data['image'] = upload_file('products', $_FILES['image']);
            } else {
                $data['image'] = $_POST['old_image'] ?? '';
            }

            return $data;
        }

        public function index() {
            $view = 'product/index';
            $title = 'Quản lý sản phẩm';
            $data = $this->productModel->getAll();
            require_once PATH_VIEW_MAIN_ADMIN;
        }

        public function create() {
            $view = 'product/create';
            $title = 'Thêm mới sản phẩm';
            $list_cat = $this->categoryModel->getAll();
            require_once PATH_VIEW_MAIN_ADMIN;
        }

        public function store() {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                $this->redirectToList();
            }

            $this->productModel->insert($this->collectData());
            $this->redirectToList();
        }

        public function edit($id = null) {
            $id = $this->getProductId($id);
            $product = $this->productModel->getByID($id);

            if (!$product) {
                $this->redirectToList();
            }

            $view = 'product/edit';
            $title = 'Cập nhật sản phẩm';
            $data = $product;
            $list_cat = $this->categoryModel->getAll();
            require_once PATH_VIEW_MAIN_ADMIN;
        }

        public function update($id = null) {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                $this->redirectToList();
            }

            $id = $this->getProductId($id);
            $this->productModel->update($this->collectData(), $id);
            $this->redirectToList();
        }

        // Xóa sản phẩm
        public function delete($id = null) {
            $id = $_GET['id'];
            try {
                if (isset($id)) {
                    $this->productModel->delete($id);
                    $this->redirectToList();
                } else {
                    throw new Exception("ID không tồn tại");
                }
                
            } catch(Exception $ex) {
                throw new Exception ("Có lỗi xảy ra" . $ex->getmessage());
            }
        }

        public function show($id = null) {
            $id = $this->getProductId($id);
            $product = $this->productModel->getByID($id);

            if (!$product) {
                $this->redirectToList();
            }

            $view = 'product/show';
            $title = 'Chi tiết sản phẩm';
            $data = $product;
            require_once PATH_VIEW_MAIN_ADMIN;
        }
    }
?>