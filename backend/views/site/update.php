<?php
$this->title = 'Create'

?>

<div class="content-body">
  <h2 style="margin-top: 20px; margin-left: 20px;">Cập Nhật Tin</h2>
 </div>

 <?php 
  echo $this->render('_form',[
    'model' => $model,
    'list_category' => $list_category,
    'category_name' => $category_name
  ]);

?>