<?php

use yii\helpers\Html;
use common\helper\Tools;

$this->title = Yii::t('app', 'All Category');
?>
<div class="content-body">
  <h2 style="margin-top: 20px; margin-left: 20px;">Danh Mục</h2>
 </div>

<div class="content-body">
  <div class="card card-company-table">
    <div class="card-header py-1">
      <div class="form-group d-flex align-items-center mb-0">
        <label class="w-90"><?= Yii::t('app', 'Search') ?>:</label>
        <input type="text" class="form-control input-search-category" value="<?= Yii::$app->request->get('text_search') ? str_replace('"', '', strip_tags(Yii::$app->request->get('text_search'))) : '' ?>" placeholder="<?= Yii::t('app', 'Enter keyword') ?>...">
      </div>
      <div class="form-group breadcrumb-right">
        <button type="button" class="btn btn-primary new-app" data-toggle="modal" data-target="#viteexModal">
          <i data-feather='plus-circle' class="font-medium-1"></i>
          <span>Tạo danh mục</span>
        </button>
    </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <div class="col-8">
          <table id="list-category" class="table">
            <thead>
              <tr>
                <th>Tên danh mục</th>
                <th>Danh mục con</th>
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
                    <td>
                      <?php if(isset($data->category_child) && $data->category_child): ?>
                       <?php foreach($data->category_child as $item_child): ?>
                          <?= $item_child?>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </td>  
                    <td class="w-120"><?= $data->created_at ? \DateTime::createFromFormat('Y-m-d H:i:s', trim($data->created_at))->format('d/m/Y') : '' ?>
                  
                    </td>
                    <td class="w-120">
                      <?= Html::a('<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-hover hover-success font-medium-2" data-toggle="tooltip" title="" data-original-title="'.Yii::t('app', 'Update').'"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>', 'javascript:void(0)', ['class' => 'edit-app', 'data-id' => $data->_id, 'data-name' => $data->name ,'data-toggle' => 'modal', 'data-target' => '#viteexModal']) ?>
  
                     <?= Html::a('<i data-feather="trash-2" class="icon-hover hover-danger font-medium-2"></i> ', Yii::$app->urlManager->createAbsoluteUrl(['category/delete', 'id' => (string) $data->_id]), ['data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Delete'), 'data-method' => 'POST', 'data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?')]);?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        <?= \justinvoelker\separatedpager\LinkPager::widget([
            'pagination' => $list_category->pagination ,
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
</div>

<!-- Modal Setting -->
<div class="scrolling-inside-modal">
  <div class="modal fade" id="viteexModalSettings" tabindex="-1" role="dialog" aria-labelledby="viteexModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
      </div>
    </div>
  </div>
</div>

<?php
$this->registerJsFile('@web/app-assets/js/paginate.js');
$this->registerCssFile('@web/app-assets/vendors/css/forms/wizard/bs-stepper.min.css');
$this->registerCssFile('@web/app-assets/css/plugins/forms/form-wizard.min.css');
$this->registerJsFile('@web/app-assets/vendors/js/forms/wizard/bs-stepper.min.js');
?>

<script>
        const debounce = (func, wait, immediate)=> {
        let timeout;
        return function executedFunction() {
            let context = this;
            let args = arguments;
            let later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            let callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };

    function showLoading() {
        $('.bg-overlay').addClass('loading');
        $('#spin-loading').addClass('loading');
        }
    function hideLoading() {
            $('.bg-overlay').removeClass('loading');
                    $('#spin-loading').removeClass('loading');
        }

      function searchApplication() {
        let text_search = $('.input-search-category').val().replace(/<script>|<\/script>|"/g, "");
        $('.input-search-category').val(text_search);
        let param = text_search != '' ? `&text_search=${text_search}` : '';
        let url = window.location.href + param;
        $.ajax({
            url,
            beforeSend: showLoading(),
            success: function (result) {
                setTimeout(function () {
                    hideLoading();
                    if (result) {
                        $('.card-body .table-responsive').html(result);
                        window.history.pushState({
                            path: url
                        }, '', url)
                    }
                }, 1000);
            }
        });
        url = window.location.href;
    }
    $('.input-search-category').on('input', debounce(searchApplication, 1000));
    $(function () {
        // new event
    $('.new-app').click(function () {
        $.ajax({
            url: '/index.php?r=category%2Fcreate',
            success: function (result) {
                $("#viteexModal .modal-content").html(result);
            }
        });
    });

     // edit event
     $(document).on('click', '.edit-app', function () {
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        $.ajax({
            url: '/index.php?r=category%2Fcreate',
            type: 'GET',
            dataType: 'html',
            data: {
                id,
                name
            },
            success: function (result) {
                if (result) {
                    $("#viteexModal .modal-content").html(result);
                }
            }
        });
    });

        $('.btn-delete-app').click(function () {
            let app_id = $(this).data('app-id')
            //http://version3.local/application/delete?id=63949adf7b7a201cb4002d9e
            Swal.fire({
                title: "<?= Yii::t('app', 'Xóa ứng dụng') ?>",
                text: "<?= Yii::t('app', 'Are you sure you want to delete this item?') ?>",
                icon: 'question',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false,
                showCloseButton: true
            }).then(result => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/index.php?r=category%2Fdelete',
                        type: 'POST',
                        data: {app_id},
                        beforeSend: showLoading(),
                        success: function (result) {
                            hideLoading()
                            if (result.status == 200) {
                                toastr['success']('', result.message, {
                                    closeButton: true,
                                    tapToDismiss: false,
                                    progressBar: true,
                                    rtl: false
                                });
                                setTimeout(function () {
                                    window.location.reload()
                                }, 1000)
                            } else {
                                Swal.fire({
                                    title: 'Cảnh báo',
                                    text: result.message,
                                    icon: 'error',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    showClass: {
                                        popup: 'animate__animated animate__tada'
                                    },
                                    buttonsStyling: false,
                                    showCloseButton: true
                                });
                            }
                        },
                        error: function (err) {
                            hideLoading()
                            toastr['error']('', 'Đã có lỗi xảy ra', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                                rtl: false
                            });
                        }
                    });
                }
            });
        })
    });
</script>