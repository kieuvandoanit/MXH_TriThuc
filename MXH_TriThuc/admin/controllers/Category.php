<?php
class Category extends Controller{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = $this->ModelAdmin('CategoryModel');
    }
    public function SayHi(){
        $this->redirect('/admin/category/categoryPage');
    }
    //Chức năng tạo
    
    //Get
    public function createCategory(){
        $this->viewAdmin('inc/header');
        $this->viewAdmin('pages/addCategory_page');
        $this->viewAdmin('inc/footer');
    }
    //Post
    public function handleCreateCategory()
    {
        # code...
        /**
         * lấy thông tin từ post
         * kiểm tra thông tin
         * insert vào db
         * kiểm tra kết quả trả về
         */
        if(isset($_POST['btn_create'])){
            $categoryName=$_POST['categoryName'];
            $Description=$_POST['Description'];
            $results= $this->categoryModel->setNewCategory($categoryName,$Description);
            $message=$results==1?1:'Tên danh mục đã tồn tại';
            // echo $message;
            header('Location: '.HEADERLINK.'/admin/category/categoryPage');
            $this->viewAdmin('inc/header');
            $this->viewAdmin('pages/addCategory_page',$message);
            $this->viewAdmin('inc/footer');
        }
        else{
            $this->redirect('/admin/category/categoryPage');
            $this->categoryPage();
        }

    }
    //Chức năng xem toàn bộ
    public function categoryPage($sort='ASC'){
        $sort= $sort==2?'DESC': 'ASC';
        $cateList= $this->categoryModel->getAllCategory($sort);
        $data['page_title'] = 'Quản lý category';
        $this->viewAdmin('inc/header');
        $this->viewAdmin('pages/category_page',$cateList);
        $this->viewAdmin('inc/footer');
    }
    // Chức năng xem một danh mục
    //Get
    public function detailCategory($id=-1)
    {
        if($id!=-1){
            $data= $this->categoryModel->getCategoryById($id);
            $this->viewAdmin('inc/header');
            $this->viewAdmin('pages/detailCategory_page',$data);
            $this->viewAdmin('inc/footer');
        }
        # code...
    }
    //Post
    public function handleUpdateCategory()
    {
        # code...
        
        if(isset($_POST['btn_update'])){
            // echo 'co<br>';
            $id=$_POST['idCategory'];
            $categoryName=$_POST['categoryName'];
            $Description=$_POST['Description'];
            $results= $this->categoryModel->updateCategory($id,$categoryName,$Description);
            // $message=$results==1?1:'Tên danh mục đã tồn tại';
            // echo $message;
            // echo 'pages/detailCategory/'.$id;
            header('Location: '.HEADERLINK.'/admin/category/detailCategory/'.$id);
            $this->viewAdmin('inc/header');
            $this->viewAdmin('pages/detailCategory_page');
            $this->viewAdmin('inc/footer');
        }
        else{
            $this->redirect('/admin/category/categoryPage');
        }
    }
    //Chức năng xóa
    public function delete($id=-1)
    {
        # code...
        if($id==-1){

        }
        else{
            $results= $this->categoryModel->deleteCategory($id);
        }
        header('Location: '.HEADERLINK.'/admin/category/categoryPage');
        $this->categoryPage();
    }
    //Chức năng sửa

}
?>