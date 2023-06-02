<?php
use yii\helpers\Html;
?>

<table id="list-category" class="table">
    <thead>
        <tr>
            <th>Tên danh mục</th>
            <th>Created_at</th>
            <th class="w-120">Action</th>
        </tr>
    </thead>
    <tbody class="font-13">
        <?php if (isset($list_category)) : ?>
            <?php foreach ($list_category->getModels() as $data) : ?>

                <tr data-app-id="<?= $data->_id ?>">
                    <td>
                        <?= $data->name ?>
                    </td>
                    <td class="w-120"><?= $data->created_at ? \DateTime::createFromFormat('Y-m-d H:i:s', trim($data->created_at))->format('d/m/Y') : '' ?>

                    </td>
                    <td class="w-120">
                        <?= Html::a('<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-hover hover-success font-medium-2" data-toggle="tooltip" title="" data-original-title="' . Yii::t('app', 'Update') . '"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>', 'javascript:void(0)', ['class' => 'edit-app', 'data-id' => $data->_id, 'data-name' => $data->name, 'data-toggle' => 'modal', 'data-target' => '#viteexModal']) ?>
                        <?= Html::a('<i data-feather="trash-2" class="icon-hover hover-danger font-medium-2"></i> ', Yii::$app->urlManager->createAbsoluteUrl(['category/delete', 'id' => (string) $data->_id]), ['data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Delete'), 'data-method' => 'POST', 'data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?')]);?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?= \justinvoelker\separatedpager\LinkPager::widget([
    'pagination' => $list_category->pagination,
    'maxButtonCount' => 8,
    'prevPageLabel' => '',
    'nextPageLabel' => '',
    'prevPageCssClass' => 'page-item prev',
    'nextPageCssClass' => 'page-item next',
    'activePageCssClass' => 'page-item active',
    'options' => [
        'class' => 'pagination mt-2 pl-1 pr-1',
        'id' => '',
        'style' => 'float: right;',
        'to' => '.card-body .table-responsive'
    ]
]); ?>