<?php
include'php/editarticle.php';
  ?>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Galbinita Sebastian, and Bootstrap contributors">
    <title>IFood Add Article</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="css/floating-labels.css" rel="stylesheet">
    <link href="css/add-image.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body> 
<?php
$id=$_GET['id'];
$data=simplexml_load_file('article/articledata.xml');
foreach($data->date as $date){
    if($date->id==$id){
?>
    <form class="form-signin" method="post" enctype="multipart/form-data">
        <input type = "hidden" name = "id" value="<?php echo $date->id; ?>"> 
        <div class="text-center mb-4">
            <img class="mb-4" src="images/icon.png" alt="" width="122" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Add article</h1>
        </div>
                
        <div class="form-label-group">
            <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $date->title; ?>"required autofocus>
            <label for="inputUsername">Title</label>
        </div>
                
        <div class="form-label-group">                   
            <textarea type="text" class="form-control" placeholder="Overview" name="overview" rows="4" value="<?php echo $date->overview; ?>" cols="40" required autofocus></textarea>      
            <label for="inputOverview"></label>
        </div>
        <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
        <div class="image-upload-wrap">
            <input class="file-upload-input" type='file' onchange="readURL(this);" name="image">
            <div class="drag-text">
                <h3>Drag and drop an Image</h3>
            </div>
        </div>

        <div class="file-upload-content">
            <img class="file-upload-image" src="<?php echo $date->image; ?>" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>                             </div>
        </div>                  
        <br>

        <button class="file-upload-btn" type="submit" name="submit" value="Update" >Submit</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; Galbinita Sebastian 2020</p>
</form>
<?php
    }
}
?>
<script type="text/javascript" src="javascript/addimagebutton.js"></script>
</body>
</html>