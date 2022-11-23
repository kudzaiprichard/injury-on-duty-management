<?php
define('DOCUMENT',$_SERVER['DOCUMENT_ROOT']."/fms/models/");
require_once(DOCUMENT.'document.php');
require_once(DOCUMENT.'folder.php');
class DocumentService{
    private $db;
    function __construct(){$this->db = new Connection('localhost','root','','fms_db');}

    function uploadFile($file_name,$name,$folderId){
        $uploaded = false;
        $con = $this->db->openConnection();
        $query  = "INSERT INTO `files`(`name`, `file`, `folder_id`)
                                    VALUES('$name','$file_name','$folderId') ";
        
        if($result = mysqli_query($con, $query)){
            $uploaded = true;
        }

        return $uploaded;
    }

    function fetchAllFiles(){
        $files = array();
        $con = $this->db->openConnection();
        $query = "SELECT * FROM `files`";
        $result = mysqli_query($con, $query);
        
        while($row = $result->fetch_assoc()) {
            $query1 = "SELECT * FROM `claimant` WHERE `id` = '".$row['claimant_id']."'";
            $result1 = mysqli_query($con, $query1);

            while($row1 = $result1->fetch_assoc()) {
                $claimant = new Claimant($row1['id'],$row1['first_name'],$row1['last_name'],$row1['national_id'],$row1['ec_number'],$row1['department']);

                $file = new Document($row['id'],$row['name'],$row['file'],$row['timestamp'],$claimant);
                array_push($files, $file);
                unset($file);
            }
        }
        
        return $files;
    }

    function getFileById($id){
        $files = array();
        $con = $this->db->openConnection();
        $query = "SELECT * FROM `files` WHERE `id`='$id'";
        $result = mysqli_query($con, $query);
        
        while($row = $result->fetch_assoc()) {
            $file = new Document($row['id'],$row['name'],$row['file'],$row['timestamp'],$row['folder_id']);
            array_push($files, $file);
            unset($file);
        }
        
        return $files[0];
    }

    function createFolder($claimant_id){
        $folderId = false;
        $con = $this->db->openConnection();
        $query = "INSERT INTO `folder` (`claimant_id`) VALUES ('$claimant_id')";

        $query1 = "SELECT * FROM `folder` WHERE `claimant_id` = '$claimant_id'";
        $result1 = mysqli_query($con, $query1);
        $rows1 = mysqli_num_rows($result1);

        if ($rows1 < 1) {
            if($result = mysqli_query($con, $query)){
                $result2 = mysqli_query($con, $query1);
                $row2 = $result2->fetch_assoc();
                $folderId = $row2['id'];
            }
        }
        else{
            $result2 = mysqli_query($con, $query1);
            $row2 = $result2->fetch_assoc();
            $folderId = $row2['id'];
        }

        return $folderId;
    }

    function updateFile($id,$file_name,$name){
        $con = $this->db->openConnection();
        $isUpdated = false;
        $query = "UPDATE `files` SET `file`='$file_name', `name`='$name' WHERE `id` = '$id'";
        $query2 = "UPDATE `files` SET `name`='$name' WHERE `id` = '$id'";
        $query3 = "UPDATE `files` SET `file_name`='$file_name' WHERE `id` = '$id'";

        if($file_name == null || $file_name == " "){
            if(mysqli_query($con, $query2)){
                $isUpdated = true;
            }
        }elseif($name == null){
            if(mysqli_query($con, $query3)){
                $isUpdated = true;
            }
        }else{
            if(mysqli_query($con, $query)){
                $isUpdated = true;
            }
        }

        return $isUpdated;
    }

    function fetchAllFolders(){
        $folders = array();
        $con = $this->db->openConnection();
        $query = "SELECT * FROM `folder` ";
        $result = mysqli_query($con, $query);

        while($row = $result->fetch_assoc()) {
            $query1 = "SELECT * FROM `claimant` WHERE `id` = '".$row['claimant_id']."'";
            $result1 = mysqli_query($con, $query1);

            while($row1 = $result1->fetch_assoc()) {
                $claimant = new Claimant($row1['id'],$row1['first_name'],$row1['last_name'],$row1['national_id'],$row1['ec_number'],$row1['department']);

                $folder = new Folder($row['id'],$claimant);
                array_push($folders, $folder);
                unset($folder);
            }
        }

        return $folders;

    }

    function fetchAllFilesByFolderId($folder_id, $claimant_id){
        $files = array();
        $con = $this->db->openConnection();
        $query = "SELECT * FROM `files` WHERE `folder_id` = '$folder_id'";
        $result = mysqli_query($con, $query);

        if($folder_id == null){
            $query_ = "SELECT * FROM `folder` WHERE `claimant_id` = '$claimant_id'";
            $result_ = mysqli_query($con, $query_);

            $row_ = $result_->fetch_assoc();
            $folder_id =  $row_['id'];
        }

        while($row = $result->fetch_assoc()) {
            $query1 = "SELECT * FROM `claimant` WHERE `id` = '$claimant_id'";
            $result1 = mysqli_query($con, $query1);

            while($row1 = $result1->fetch_assoc()) {
                $claimant = new Claimant($row1['id'],$row1['first_name'],$row1['last_name'],$row1['national_id'],$row1['ec_number'],$row1['department']);

                $file = new Document($row['id'],$row['name'],$row['file'],$row['timestamp'],$claimant);
                array_push($files, $file);
                unset($file);
            }
        }
        return $files;
    }
    
    function deleteFileById($fileId){
        $isDeleted = false;
        $con = $this->db->openConnection();
        $query = "DELETE FROM `files` WHERE `id` = '$fileId'";

        if($result = mysqli_query($con, $query)){
            $isDeleted = true;
        }

        return $isDeleted;
    }
}
?>