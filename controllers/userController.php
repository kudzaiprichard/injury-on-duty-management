<?php
define('SERVICES',$_SERVER['DOCUMENT_ROOT']."/fms/services/");
require_once('connection.php');
require_once(SERVICES.'authService.php');
require_once(SERVICES.'claimService.php');
require_once(SERVICES.'claimantService.php');
require_once(SERVICES.'documentService.php');

class UserController{
    private $authService;
    private $claimService;
    private $claimantService;
    private $documentService;

    function __construct(){
        $this->authService = new AuthService();
        $this->claimService = new ClaimService();
        $this->claimantService = new ClaimantService();
        $this->documentService = new DocumentService();
    }
    
    function login($email, $password){
        return $this->authService->login($email, $password);
    }

    function createUser($firstName=null,$lastName=null,$ecNumber=null,$designation=null,$emailAddress=null,$password=null,$registering){
        return $this->authService->createUser($firstName,$lastName,$ecNumber,$designation,$emailAddress,$password,$registering);
    }

    function editUser($id,$firstName,$lastName,$ecNumber,$designation,$emailAddress){
        return $this->authService->editUser($id,$firstName,$lastName,$ecNumber,$designation,$emailAddress);
    }

    function deleteUserById($userId){
        return $this->authService->deleteUserById($userId);
    }

    function updateProfile($id, $firstName,$lastName,$email,$ecNumber,$designation,$password){
        return $this->authService->updateProfile($id,$firstName,$lastName,$email,$ecNumber,$designation,$password);
    }

    function fetchAllUsers(){
        return $this->authService->fetchAllUsers();
    }

    function checkEmail($email){
        return $this->authService->checkEmail($email);
    }

    function getLoggedInUser($email){
        return $this->authService->getLoggedInUser($email);
    }

    function getUserById($id){
        return $this->authService->getUserById($id);
    }

    function createClaim($firstName,$lastName,$nationalId,$ecNumber,$department,$type,$place,$date,$stage,$status,$reference){
        $idArray = array();
        ##if statement to check first if the claimant is create 
        ##because to create the claim we need the claimant id
        if($user = $this->claimantService->createClaimant($firstName,$lastName,$nationalId,$ecNumber,$department)){
            $this->claimService->createClaim($type,$place,$date,$stage,$status,$reference,$user->getId());
            $folderId = $this->documentService->createFolder($user->getId());
            $userId = $user->getId();
            
            array_push($idArray, $folderId);
            array_push($idArray, $userId);
        }
        
        return $idArray;
    }

    function updateClaimant($id,$firstName,$lastName,$nationalId,$ecNumber,$department){
        return $this->claimantService->updateClaimant($id,$firstName,$lastName,$nationalId,$ecNumber,$department);
    }

    function fetchAllClaims(){
        return $this->claimService->fetchAllClaims();
    }

    function fetchClaimById($id){
        return $this->claimService->fetchClaimById($id);
    }

    function deleteClaimById($claimId){
        return $this->claimService->deleteClaimById($claimId);
    }

    function fetchAllClaimants(){
        return $this->claimantService->fetchAllClaimants();
    }

    function fetchClaimantById($claimant_id){
        return $this->claimantService->fetchClaimantById($claimant_id);
    }

    function updateClaim($id,$injuryType,$place,$date,$stage,$status,$referenceId){
        return $this->claimService->updateClaim($id,$injuryType,$place,$date,$stage,$status,$referenceId);
    }

    function uploadFile($file_name,$name,$folderId){
        return $this->documentService->uploadFile($file_name,$name,$folderId);
    }

    function fetchAllFolders(){
        return $this->documentService->fetchAllFolders();
    }

    function fetchAllFilesByFolderId($folder_id=null, $claimant_id){
        return $this->documentService->fetchAllFilesByFolderId($folder_id, $claimant_id);
    }

    function getFileById($id){
        return $this->documentService->getFileById($id);
    }

    function deleteFileById($fileId){
        $this->documentService->deleteFileById($fileId);
    }

    function updateFile($id,$file_name=null,$name=null){
        return $this->documentService->updateFile($id,$file_name,$name);
    }
}
?>