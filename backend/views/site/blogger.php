<?php
$this->title = 'Blogger'

?>

<div class="content-body">
    <h2 style="margin-top: 20px; margin-left: 20px;">Blogger</h2>
</div>

<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>

<div class="card card-company-table">
    <div class="card-body p-0 m-2">
        <div class="col-8">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'blogger-form']); ?>

            <?= $form->field($model, 'title')->dropDownList(ArrayHelper::map($list_news, function ($app) {
                return (string)$app->_id;
            }, 'title'), [
                'prompt' => 'Chọn bài viết',
                'class' => 'form-control',
                'id' => 'dropdown-id',
            ])->label('Chọn danh mục <span class="color-required">(*)</span>') ?>
            <hr class="mt-2 mb-2">

            <select id="blogger" class="form-control select2" name="blogger">
                <option value="">Chọn Blog</option>
                <option value="2999981601943680674">Bệnh</option>
            </select>

            <hr class="mt-2 mb-2">

            <?php ActiveForm::end(); ?>

            <?= Html::submitButton('Post', ['class' => 'btn btn-primary btn-submit-form']) ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#dropdown-id').select2();

        $('.btn-submit-form').click(function() {
            let blogger = $("#blogger option:selected").val();
            let post = $('#dropdown-id').val();

            $.ajax({
                url: '/index.php?r=site%2Fsend-blog',
                type: 'POST',
                dataType: 'json',
                data: {
                    blogger,
                    post
                },
                success: function(response) {
                    if(response)  {
                        alert("Success");
                    }
                },
                error: function(error) {
                    alert('error');
                }
            });
        });
    });
</script>