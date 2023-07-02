
<div class="col-md-8" style="margin: 0 auto;">
    <div class="card">
        <div class="card-body">
            <h3 class="badge badge-light-primary mb-1 font-100 p-50"><i data-feather="unlock" class="mr-50"></i>Cập nhật danh mục</h3>
            <?php

            use yii\bootstrap\ActiveForm;
            use yii\helpers\ArrayHelper;
            use yii\helpers\Html;

            $form = ActiveForm::begin(); ?>
                <?= $form->field($category, 'name', ['template' => '{label}<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i data-feather="home"></i></span></div>{input}</div>{error}', 'options' => ['class' => 'form-group']])->textInput(['autocomplete' => 'off', 'placeholder' => 'Tên danh mục'])->label('Tên danh mục' . ' <span class="color-required">(*)</span>') ?>
                <?= $form->field($category, 'category_child')->dropDownList(ArrayHelper::map($list_category, function ($app) {
                        return (string) $app->name;
                    }, 'name'), ['class' => 'select2 form-control', 'multiple' => true])->label('Danh mục con') ?>
       
            <div class="form-group text-right">
                <?= Html::submitButton('<i data-feather="save" class="mr-50"></i>' . Yii::t('app', 'Update'), ['class' => 'btn btn-primary btn-submit-form']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#category-category_child').select2();
    });
    
</script>