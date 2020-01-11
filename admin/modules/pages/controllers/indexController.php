<?php
    function construct()
    {
        load_model('index');
    }
    
    function listAction(){
        $page = show_page();
        foreach ($page as &$item){
            $item['url_update'] = "?mod=pages&action=update&id={$item['page_id']}";
        }
        $data['page'] = $page;
        load_view('list',$data);
    }
    function updateAction(){

        $id = (int) $_GET['id'];
        global $error, $detail, $title, $slug,$success;
        if(isset($_POST['btn_update_page'])){
            $error = array();
            if(empty($_POST['title'])){
                $error['title'] = "Không để trống trường này";
            }else{
                $title = $_POST['title'];
            }
            // if(empty($_POST['slug'])){
            //     $error['slug'] = "Không để trống trường này";
            // }else{
            //     $slug = $_POST['slug'];
            // }
            if(empty($_POST['detail'])){
                $error['detail'] = "Không để trống trường này";
            }else{
                $detail = $_POST['detail'];
            }
            
            if(empty($error)){
                $data = array(
                    'page_title' => $title,
                    // 'page_slug' => $slug,
                    'page_detail' => $detail,
                );
                update_page($data,$id);
                $success = "Đã chỉnh sửa thành công";
            }
        }else{
            print_r($error);
        }
        $data['item'] = get_page_by_id($id);
        load_view('update',$data);
    }

?>