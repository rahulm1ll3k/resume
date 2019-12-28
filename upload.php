<?php
//print_r($_POST);
$targetPath3 = dirname(__FILE__)."/upload/";
//echo $targetPath;
if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = $targetPath3.$_FILES['userImage']['name'];
$targetPath2 = "upload/".$_FILES['userImage']['name'];

//echo $targetPath;

if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<img src="<?php echo $targetPath2; ?>" width="100px" height="100px" />
<?php
}
}
}
?>