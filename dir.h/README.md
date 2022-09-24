#

## Post
```jquery
$.ajax({
type: "POST",
url: 'url_here',
data: {
auth
},
beforeSend: function() {
$("#btn_login").addClass("disabled").html("Loading<i class='fas ml-2 fa-spinner fa-pulse fa-lg bold'></i>");
},
success: function(data) {
if (data.startsWith("1,")) {


}
if (data.startsWith("0,")) {


}
},
complete: function(data) {
$("#btn_login").removeClass("disabled").html(preHtml);
}
});
```

## OnClick
``` jquery
$("#ic_loc").click(function() {

});
```

## OnReady
``` jquery
$(document).ready(function() {

});
```

## FileUpload
``` html
<form action="/admin/action/rec_upload_album.php"
  class="dropzone"
  id="myDropzoneUpToAlbum">
</form>
```

``` jquery
Dropzone.options.myDropzoneUpToAlbum = {
   acceptedFiles: 'image/*',
   maxFiles: 10
};
```

``` php
<?php                                                                                         
include('../../php/myPHP.php');
//("dsfh.txt","Open\n");
$uploadDir = '../../files/images';
include("../../php/db_con.php");
if (!empty($_FILES)) {
    //("dsfh.txt","File available to upload\n");
    $tmpFile = $_FILES['file']['tmp_name'];
    $filename = $uploadDir.'/'.time().'-'. $_FILES['file']['name'];
    $filenameForDb=str_replace("../..","",$filename);
    if (move_uploaded_file($tmpFile, $filename) == true) {
        //("dsfh.txt","F moved\n");
        $sql = "INSERT INTO table_files (finid,local,path,reference,type,dt,tm,additional)
VALUES (UUID(), '1', '$filenameForDb', 'carousel_1', 'img', CURDATE(),CURTIME(),'')";
//("dsfh.txt","$sql\n");
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
            //("dsfh.txt","Entry\n");
        } else {
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            //("dsfh.txt",mysqli_error($conn)."\n");
        }
    }
    else
    {
        //("dsfh.txt","Not Moved\n");
    }

}
else {;
}
?>
```
