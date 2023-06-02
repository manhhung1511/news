<?php

use yii\widgets\ActiveForm;
?>

<div class="modal-header">
    <h4 class="modal-title" id="adminModalLabel1"><b><?= $id ? 'Cập nhật' : 'Tạo danh mục' ?></b></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <?php $form = ActiveForm::begin(['id' => 'app-event'], ['options' => ['class' => 'needs-validation', 'novalidate' => '']]); ?>
        <?= $form->field($model, 'name', ['template' => '{label}<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></span></div>{input}</div>{error}', 'options' => ['class' => 'form-group']])->textInput(['value' => $name ?: '', 'autocomplete' => 'off', 'placeholder' => 'Tạo mới danh mục'])->label('Danh Mục'.' <span class="color-required">(*)</span>') ?>
        <?= $form->field($model, 'category_child', ['template' => '{label}<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></span></div>{input}</div>{error}', 'options' => ['class' => 'form-group']])->textInput(['value' => $category_child ?: '', 'autocomplete' => 'off', 'placeholder' => 'Tạo danh mục con'])->label('Danh Mục Con (các danh mục con cách nhau bằng dấu ,)') ?>
    <?php ActiveForm::end(); ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary btn-save d-flex align-items-center">
        <div class="box-spin" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <span><?= Yii::t('app', $id ? 'Update' : 'New') ?></span>
    </button>
    <button type="button" class="btn btn-danger btn-cancel-modal" data-dismiss="modal"><?= Yii::t('app', 'Cancel') ?></button>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $('.btn-save').click(function () {
        let name = $('#category-name').val();
        let frm = $('#app-event');
        $('.box-spin').addClass('spinner-border mr-50');
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {      
                $('.box-spin').removeClass('spinner-border mr-50');
                if (data.error_code === 1) {
                    console.log('An error occurred.');
                } else {
                    $('.btn-cancel-modal').click();
                    location.reload();
                }
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            }
        });
    });
</script>