<?php

use yii\helpers\Html;
?>

<table id="table-notif" class="table table-sm">
    <thead class="thead-light">
        <tr>
            <td>Tiêu đề</td>
            <td>Danh mục</td>
            <td>Hình ảnh</td>
            <td>Nội dung</td>
            <td>Trạng thái</td>
            <td>Created_at</td>
            <td>Updated_at</td>
            <td>Hành động</td>
        </tr>
    </thead>
    <tbody class="font-13">
        <?php if (!empty($news)) : ?>
            <?php foreach ($news->getModels() as $data) : ?>
                <tr id="tr-<?= (string) $data['_id'] ?>">
                    <td>
                        <?= $data['title'] ? substr($data['title'] . '...', 0, 70) : '' ?>
                    </td>
                    <td>
                        <?= $data['category'] ?  $data['category'] : '' ?>
                    </td>
                    <td>
                        <div class="d-md-flex d-block">
                            <img class="w-120 h-100 mr-1" src="<?= $data['image'] ?  $data['image'] : '' ?>">
                        </div>
                    </td>
                    <td>
                        <?= $data['content'] ? substr($data['content'], 0, 200) . '...' : '' ?>
                    </td>
                    <td>
                        <div class="custom-control custom-control-primary custom-switch">
                            <input id="<?= (string) $data['_id'] ?>" type="checkbox" <?= ($data->status == 1 ? 'checked' : '') ?> class="custom-control-input btn-update-status">
                            <label class="custom-control-label" for="<?= (string) $data['_id'] ?>" data-id="<?= (string) $data['_id'] ?>"></label>
                        </div>
                    </td>
                    <td>
                        <?= $data['created_at'] ?  $data['created_at'] : '' ?>
                    </td>
                    <td>
                        <?= $data['updated_at'] ?  $data['updated_at'] : '' ?>
                    </td>

                    <td class="w-120">
                        <?= Html::a('<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-hover hover-success font-medium-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>', Yii::$app->urlManager->createAbsoluteUrl(['site/update', 'id' => (string) $data->_id]), ['data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Update')]); ?>

                        <?= Html::a('<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-hover hover-danger font-medium-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>', Yii::$app->urlManager->createAbsoluteUrl(['site/delete', 'id' => (string) $data->_id]), ['data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Delete'), 'data-method' => 'POST', 'data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?')]); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?= \justinvoelker\separatedpager\LinkPager::widget([
    'pagination' => $news->pagination,
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