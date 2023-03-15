<?php
    class libraryFile{
        function Upfile($nameInput){
            //upload ảnh lên host
            $filename = $_FILES[$nameInput]['tmp_name'];
            //lấy tên ảnh
            $tenfile = $_FILES[$nameInput]['name'];
            //lấy phần mở rộng ảnh
            $tmp = explode(".", $tenfile);
            $file_ext = end($tmp);
            //tạo tên file mới khi upload lên host
            $tenfilemoi = "vne-" . time() . "." . $file_ext;
            //tạo đường dẫn upload file
            $destination = $_SERVER['DOCUMENT_ROOT'] . "/files/{$tenfilemoi}";
            $resultUpload =  move_uploaded_file($filename,$destination);
            return $resultUpload;

        }
         function deleteFile($tenfile){
             return unlink($_SERVER['DOCUMENT_ROOT'] . "/files/$tenfile");
         }
    }
    