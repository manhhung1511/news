<?php

use yii\helpers\Html;

$this->title = 'Tin Tức';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="content-body">
    <section class="app-user-list">
        <div class="card">
            <div class="card-header py-1">
                <div class="form-group mb-0">
                    <label class="w-90"><?= Yii::t('app', 'Keyword') ?>:</label>
                    <input type="text" value="<?= $keyword ?? '' ?>" class="form-control input-search-news" placeholder="<?= Yii::t('app', 'Enter keyword') ?>...">
                </div>
                <div class="form-group mb-0">
                    <label class="w-90"><?= Yii::t('app', 'Status') ?>:</label>
                    <select class="form-control w-150 status-news">
                        <option value=""><?= Yii::t('app', 'All') ?></option>
                        <option value="1" <?= Yii::$app->request->get('status') && Yii::$app->request->get('status') ==  1 ? 'selected' : '' ?>>Hoạt động</option>
                        <option value="2" <?= Yii::$app->request->get('status') && Yii::$app->request->get('status') ==  0 ? 'selected' : '' ?>>Tạm dừng</option>
                    </select>
                </div>

                <button type="button" class="btn btn-danger btn-filter-news">
                    <i data-feather="filter"></i>
                    <span><?= Yii::t('app', 'Tra cứu') ?></span>
                </button>

                <div class="breadcrumb-right" style="margin-left:400px;">
                    <button type="button" class="btn btn-primary new-app">
                        <?= Html::a("<i data-feather='plus-circle' style='color:white;'></i> <span style='color:white;'>Tạo tin mới</span>", Yii::$app->urlManager->createAbsoluteUrl(['site/create'])); ?>
                    </button>
                </div>
            </div>
            <div class="card-body p-2">
                <div class="card-datatable table-responsive pt-0">
                    <table id="table-notif" class="table table-bordered vertical-top">
                        <thead>
                            <tr>
                                <td>Tiêu đề</td>
                                <td>Danh mục</td>
                                <td>Danh mục con</td>
                                <td>Hình ảnh</td>
                                <td>Nội dung</td>
                                <td>Trạng thái</td>
                                <td>Người biên tập</td>
                                <td>Updated_at</td>
                                <td>Hành động</td>
                            </tr>
                        </thead>
                        <tbody class="font-13">
                            <?php if (!empty($news)) : ?>
                                <?php foreach ($news->getModels() as $data) : ?>
                                    <tr id="tr-<?= (string) $data['_id'] ?>">
                                        <td>
                                            <?= $data['title'] ? substr($data['title'].'...', 0, 70) : '' ?>
                                        </td>
                                        <td>
                                            <?= $data['category'] ?  $data['category'] : '' ?>
                                        </td>
                                        <td>
                                            <?= $data['category_child'] ?  $data['category_child'] : '' ?>
                                        </td>
                                        <td>
                                            <div class="d-md-flex d-block">
                                                <img class="w-120 h-100 mr-1" src=" <?= str_contains($data['image'], 'http') ? $data['image'] : 'https://storage.songxanh24h.vn/images'. $data['image'] ?>">
                                            </div>
                                        </td>
                                        <td>
                                            <?= $data['content'] ? substr($data['content'], 0, 200).'...' : '' ?>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-control-primary custom-switch">
                                                <input id="<?= (string) $data['_id'] ?>" type="checkbox" <?= ($data->status == 1 ? 'checked' : '') ?> class="custom-control-input btn-update-status">
                                                <label class="custom-control-label" for="<?= (string) $data['_id'] ?>" data-id="<?= (string) $data['_id'] ?>"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $data['author'] ?  $data['author'] : '' ?>
                                        </td>
                                        <td>
                                            <?= $data['updated_at'] ?  $data['updated_at'] : '' ?>
                                        </td>

                                        <td class="w-120">
                                            <?= Html::a('<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-hover hover-success font-medium-2" data-toggle="tooltip" title="" data-original-title="'.Yii::t('app', 'Update').'"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> ', Yii::$app->urlManager->createAbsoluteUrl(['site/update', 'id' => (string) $data->_id]), ['data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Update')]); ?>

                                            <?= Html::a('<svg viewBox="0 0 1024 1024" width="14" height="14" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M128 192v640h768V320H485.76L357.504 192H128zm-32-64h287.872l128.384 128H928a32 32 0 0 1 32 32v576a32 32 0 0 1-32 32H96a32 32 0 0 1-32-32V160a32 32 0 0 1 32-32zm370.752 448-90.496-90.496 45.248-45.248L512 530.752l90.496-90.496 45.248 45.248L557.248 576l90.496 90.496-45.248 45.248L512 621.248l-90.496 90.496-45.248-45.248L466.752 576z"/></svg>', Yii::$app->urlManager->createAbsoluteUrl(['site/delete', 'id' => (string) $data->_id]), ['data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Delete'), 'data-method' => 'POST', 'data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?')]); ?>
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
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .card .card-header {
        align-items: end;
        justify-content: start;
        gap: 15px;
    }

    th {
        vertical-align: middle !important;
    }

    .swal2-popup {
        width: 40em;
    }

    .flatpickr-range {
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 1px;
        opacity: 0;
        z-index: -1;
        visibility: hidden;
    }

    @media (max-width: 1024px) {
        .btn-filter {
            margin-top: 1rem;
        }
    }

    @media (max-width: 575px) {
        #select-date {
            width: 100%;
        }
    }
</style>

<script>
    $(function() {
        $(document).on('click', '.btn-update-status', function() {
            let id = $(this).attr('id');
            $.ajax({
                url: '/index.php?r=site%2Fupdate-status',
                dataType: 'json',
                data: {
                    id
                },
                success: function(result) {
                    if (result) {
                        if (result.err_code == 0) {
                            toastr['success']('', 'Cập nhật thành công', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                                rtl: false
                            });
                        } else {
                            $(this).closest('td').html($(this).closest('td').html());
                        }
                    }
                },
                error: function(data) {
                    $(this).closest('td').html($(this).closest('td').html());
                    console.log('An error occurred.');
                    console.log(data);
                }
            });
        });

        function showLoading() {
            $('.bg-overlay').addClass('loading');
            $('#spin-loading').addClass('loading');
        }

        function hideLoading() {
            $('.bg-overlay').removeClass('loading');
            $('#spin-loading').removeClass('loading');

        }

        function searchNews() {
            let keyword = $('.input-search-news').val().replace(/<script>|<\/script>|"/g, "");
            $('.input-search-news').val(keyword);
            let category = $('.category').val();
            let status = $('.status-news').val();

            let param = keyword != '' ? `&keyword=${keyword}` : '';
            if (param != '') {
                if (status != '') param += `&status=${status}`;
            } else {
                param += `&status=${status}`;
            }

            let url = window.location.href + param;

            $.ajax({
                url,
                beforeSend: showLoading(),
                success: function(result) {
                    setTimeout(function() {
                        hideLoading();
                        if (result) {
                            $('.card-body .table-responsive').html(result);
                            window.history.pushState({
                                path: url
                            }, '', url)
                        }
                    }, 500);
                }
            });
            url = window.location.href;
        }
        $('.btn-filter-news').click(searchNews);
        $('.input-search-news').on('keypress', function(e) {
            if (e.which == 13) {
                searchNews();
            }
        });

    });
</script>