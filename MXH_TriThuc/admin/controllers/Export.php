<?php  
class Export extends Controller{
    protected $postModel;
    protected $categoryModel;


    public function __construct(){
        $this->postModel = $this->ModelAdmin('PostModel');
        $this->categoryModel = $this->ModelAdmin('Categorymodel');
    }
    public function SayHi(){
        $this->viewAdmin('inc/header');
        $this->viewAdmin('import_export/export');
        $this->viewAdmin('inc/footer');
    }

    public function ExportFileCSVPost(){
        $post = $this->postModel->getAllPost();
        
        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Transfer-Encoding: ASCII");
        header('Content-Disposition: attachment; filename=Post.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Post_id', 'Title', 'thumb', 'HashTag','Content','Status', 'LikesAmount','commentAmount','AvgRating','rateAmount','viewed','isDelete','isValid','CreatedDate','UpdatedDate','Member_id','Category_id'));

        if (count($post) > 0) {
            foreach ($post as $row) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
    }

    public function ExportFileCSVCategory(){
        $category = $this->categoryModel->getAllCategory('DESC');

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Transfer-Encoding: ASCII");
        header('Content-Disposition: attachment; filename=Category.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Category_id', 'CategoryName'));

        if (count($category) > 0) {
            foreach ($category as $row) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
    }

   


}


?>