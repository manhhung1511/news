<?php
$this->title = 'Update';

function create_slug($string)
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        'A',
        'E',
        'I',
        'O',
        'U',
        'Y',
        'D',
        '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
    }

?>


<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$list_author = [
    [
        'name' => 'DS.Oanh'
    ],
    [
        'name' => 'DS.Ngọc'
    ],
];

?>

<style>
    .hidden {
        display: none;
    }

    .show {
        display: block;
    }

  
</style>

<div class="content-body">
  <h2 style="margin-top: 20px; margin-left: 20px;">Cập Nhật Tin</h2>
 </div>


<div class="card card-company-table">
    <div class="card-body p-0 m-2">
        <div class="col-8">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'news-form']); ?>
            
            <?= $form->field($model, 'author')->dropDownList(ArrayHelper::map($list_author, function($app) {return $app['name'];}, 'name'), [
                'prompt' => 'Tên tác giả',
                'class' => 'form-control'
            ])->label('Tên tác giả') ?>
            
            <?= $form->field($model, 'title', ['template' => '{label}<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i data-feather="home"></i></span></div>{input}</div>{error}', 'options' => ['class' => 'form-group']])->textInput(['autocomplete' => 'off', 'placeholder' => 'Tiêu đề'])->label(Yii::t('app', 'Tiêu đề') . ' <span class="color-required">(*)</span>') ?>

            <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map($list_category, function($app) {return (string)$app->_id;}, 'name'), [
                'prompt' => 'Chọn danh mục',
                'class' => 'form-control',
                'value' => isset($category_id) ? $category_id : ''
            ])->label('Chọn danh mục <span class="color-required">(*)</span>') ?>
            <div class="form-group category_child">
                <label class="w-50">Chọn danh mục con: </label>
                <select id="category_child" class="form-control select2" name="category-child">
                  <option value="">Chọn danh mục con</option>  
                  <?php if(isset($list_curr) && $list_curr): ?>  
                  <?php foreach($list_curr as $item): ?>
                    <option value="<?= $item ?>" <?php if ($category_child === $item) echo 'selected'; ?>><?= $item ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
                </div>
            <hr class="mt-2 mb-2">

            <?= $form->field($model, 'image')->fileInput() ?>
            <hr class="mt-2 mb-2">
            <?= $form->field($model, 'content')->hiddenInput(['autocomplete' => 'off', 'class' => 'form-control pt-50 pb-50'])->label(false) ?>
            <!-- quill editor -->
                            <?= backend\widgets\QuillEditorWidget::widget([
                                'label' => Yii::t('app', 'Description'),
                                'value' => isset($model->content) ? $model->content : '',
                                'input_id' => 'news-content',
                                'editor_id' => 'editor-desc',
                                'class_box_change' => 'viteex-form__group__description-id'
                            ]) ?>
            
            <?= Html::submitButton('<i data-feather="save" class="mr-50"></i>' . 'Save', ['class' => 'btn btn-primary btn-submit-form']) ?>
           
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


<div class="bg-overlay"></div>
<div id="spin-loading" class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$('#news-category').select2();
    $('.btn-submit-form').click(function() {
        $('#news-form').submit();
    });

    const fileInput = document.querySelector('input[type="file"]');
    const value = document.querySelector('input[type="file"]').getAttribute("value");
    const myFile = new File([value],value, {
        type: 'text/plain',
        lastModified: new Date(),
    });

    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(myFile);
    fileInput.files = dataTransfer.files;
    
    $("#news-category").on('change', function(e) {
        let category_id = $("#news-category option:selected").val();
        $.ajax({
                    url: '/index.php?r=site%2Fcategory-child',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        category_id 
                    },
                    success: function(response) {
                        let elements = document.querySelectorAll('.child');
                          if(elements) {
                            elements.forEach((element) => {
                            element.remove();
                          });
                        }
                        if(response != '') {
                            let data = JSON.parse(JSON.stringify(response));
                            for (const key in data) {
                                $('#category_child').append(`<option class="child" value='${data[key]}'>${data[key]}</option>`);
                                $('.category_child').removeClass('hidden').addClass('show');
                            }
                        }
                  },
              });
          });
</script>