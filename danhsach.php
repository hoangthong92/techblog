 <?php
$conn = mysqli_connect('localhost', 'root', '', 'newspaper');
$conn->set_charset("utf8");
 
$sql = 'SELECT * FROM cat';
 
$result = mysqli_query($conn, $sql);
 
$categories = array();
 
while ($row = mysqli_fetch_assoc($result)){
    $categories[] = $row;
}
function showCategories($categories, $parent_id = 0, $level = 1,$char = '', &$listcategories)
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            $cate_child[] = $item;
            $item->level = $level;
            unset($categories[$key]);
        }
    }
     
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        echo '<ul>';
        foreach ($cate_child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo '<li>'.$item['name'];
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['cat_id'], $level + 1 , $char.'|---', $listcategories);
            echo '</li>';
        }
        echo '</ul>';
    }
}
showCategories($categories); 
?>
<?php
    echo"<pre>";
    print_r($categories);
    echo"<pre>";
?>
