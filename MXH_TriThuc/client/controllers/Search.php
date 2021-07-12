<?php
    class Search extends Controller{
        protected $postModel;
        public function __construct(){
            $this->postModel = $this->ModelClient('PostModel');
        }
        public function SayHi(){
            /**
             * 1.Lấy thông tin cần tìm kiếm
             * 2.Xác định thông tin tìm kiếm là gì
             * - Hashtag: Có dấu # ở đầu, không tồn tại
             * - Nhiều Hashtag
             * - Nội dung
             * Cách xác định: 
             * -Cắt string thàng chuỗi từ.
             * - Phần tử đầu tiên không có #=> tìm kiếm content (2)
             * -Xác định phần tử đầu tiên có # ở đầu không=> hashtag
             *      +Xác định số lượng phần tử, nếu >1 và các phần tử sau đều có # => tìm kiếm theo chuỗi hashtag (2)
             *      +Nếu >1 và không có # hết => thông tin tìm kiếm là content.(0)
             *      +Nếu =1 => tìm kiếm theo 1 hashtag (1)
             * 3. Tìm kiếm theo từng loại
             * trả về kết quả theo sắp xếp tăng dần.
             */
            header('Cache-Control: no cache'); //no cache
                if(isset($_POST['searchInput']) and strlen($_POST['searchInput'])!=0){
                    $data=[];
                    $isHashTag = TRUE;
                    $searchInput=$_POST['searchInput'];
                    $searchArray=preg_split("/[\s,]+/",$searchInput,0,PREG_SPLIT_NO_EMPTY);
                    // print_r($searchArray);
                    // $isHashTag=TRUE;
                    foreach($searchArray as $item){
                        if($item[0] != '#' or substr_count($item,'#') != 1){
                            $isHashTag= false;
                            break;
                        }
                    };
                    $isNHashTag= (count($searchArray)>1 and $isHashTag==TRUE)? true: false;
                    if($isHashTag==false){
                        //full-text search theo content=$searchInput
                        $data['resultValue']=$this->postModel->getPostByContent($searchInput);
                        $data['resultType']='Nội dung';
                        // $data['resultByContent']=$this->postModel->getPostByContent('Content',$searchInput);
                            /* echo '<pre>';
                            // print_r($data['resultByTitle']) ;
                            // echo '<br><br><br>';
                            // print_r($data['resultByContent']) ;
                             echo '</pre>';*/
                        }
                    else{
                        //search theo 1 hashtag $searchArray
                        $data['resultValue']=$this->postModel->getPostByHashTag($searchArray);
                        $data['resultType']='HashTag';
                    };
                    $data['liked'] = $this->postModel->getLiked($_SESSION['userID']);
                    // echo '<pre>';
                    // print_r($data) ;
                    // echo '<br><br><br>';
                    // echo '</pre>';
                    // header('Cache-Control: no cache'); //no cache
                    // session_cache_limiter('private_no_expire'); // works
                    // //session_cache_limiter('public'); // works too
                    // session_start();
                    $this->ViewClient('inc/header');
                    $this->ViewClient('pages/search_page',$data);
                    $this->ViewClient('inc/footer');
                }
                else{
                    
                    $this->ViewClient('inc/header');
                    $this->ViewClient('pages/search_page');
                    $this->ViewClient('inc/footer');
                }

            // $string=['#this###','#this###','#this###','#this###'];

            // echo substr($string[0], 1);
        }

        public function SearchCategory($category){
            $data['category'] = $this->postModel->SearchCategory($category);
            $this->ViewClient('inc/header');
            $this->ViewClient('pages/search_page_1',$data);
            $this->ViewClient('inc/footer');
        }

        public function SearchViewMost(){
            $data['category'] = $this->postModel->getPostSortView('DESC');
            $this->ViewClient('inc/header');
            $this->ViewClient('pages/search_page_1',$data);
            $this->ViewClient('inc/footer');
        }

        public function SearchNewMost(){
            $data['category'] = $this->postModel->getPostSortID('DESC');
            $this->ViewClient('inc/header');
            $this->ViewClient('pages/search_page_1',$data);
            $this->ViewClient('inc/footer');
        }
    }
?>