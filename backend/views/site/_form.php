<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

?>

<div class="card card-company-table">
    <div class="card-body p-0 m-2">
        <div class="col-8">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'news-form']); ?>

            <?= $form->field($model, 'title', ['template' => '{label}<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i data-feather="home"></i></span></div>{input}</div>{error}', 'options' => ['class' => 'form-group']])->textInput(['autocomplete' => 'off', 'placeholder' => 'Tiêu đề'])->label(Yii::t('app', 'Tiêu đề') . ' <span class="color-required">(*)</span>') ?>

            <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map($list_category, function($app) {return (string)$app->_id;}, 'name'), [
                'prompt' => 'Chọn danh mục',
                'class' => 'form-control',
                'value' => isset($category_name) && $category_name ?: ''
            ])->label('Chọn danh mục <span class="color-required">(*)</span>') ?>

            <?= $form->field($model, 'image', ['template' => '{label}<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text btn btn-warning btn-choose-file"><i data-feather="upload"></i>&nbsp;' . Yii::t('app', 'Choose image') . '</span><input class="img-upload-notif" type="file" accept="image/*" id="inputImageBanner"/></div>{input}</div>{error}', 'options' => ['class' => 'form-group']])->textInput(['class' => 'form-control pl-50', 'autocomplete' => 'off', 'placeholder' => Yii::t('app', 'Enter image link here')])->label(Yii::t('app', 'Ảnh')) ?>

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



<script>
	$('#news-category').select2();
    $('.btn-submit-form').click(function() {
        $('#news-form').submit();
    });
</script> 