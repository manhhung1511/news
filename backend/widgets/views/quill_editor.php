<?php
$this->registerCssFile('@web/app-assets/vendors/css/editors/quill/katex.min.css');
$this->registerCssFile('@web/app-assets/vendors/css/editors/quill/monokai-sublime.min.css');
$this->registerCssFile('@web/app-assets/vendors/css/editors/quill/quill.snow.css');
$this->registerCssFile('@web/app-assets/vendors/css/editors/quill/quill.bubble.css');
$this->registerCssFile('@web/app-assets/css/plugins/forms/form-quill-editor.min.css');

$this->registerJsFile('@web/app-assets/vendors/js/editors/quill/katex.min.js');
$this->registerJsFile('@web/app-assets/vendors/js/editors/quill/highlight.min.js');
$this->registerJsFile('@web/app-assets/vendors/js/editors/quill/quill.min.js');
?>
<style type="text/css">
    .editor {
        height: 500px;
        background-color: white;
    }

    .ql-snow .ql-picker.ql-expanded .ql-picker-options {
        z-index: 9999;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="8px"]::before {
        content: "8";
        font-size: 8px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="9px"]::before {
        content: "9";
        font-size: 9px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="10px"]::before {
        content: "10";
        font-size: 10px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="11px"]::before {
        content: "11";
        font-size: 11px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="12px"]::before {
        content: "12";
        font-size: 12px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="13px"]::before {
        content: "13";
        font-size: 13px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="14px"]::before {
        content: "14";
        font-size: 14px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="15px"]::before {
        content: "15";
        font-size: 15px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="16px"]::before {
        content: "16";
        font-size: 16px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="17px"]::before {
        content: "17";
        font-size: 17px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="19px"]::before {
        content: "19";
        font-size: 19px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="18px"]::before {
        content: "18";
        font-size: 18px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="20px"]::before {
        content: "20";
        font-size: 20px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="22px"]::before {
        content: "22";
        font-size: 22px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="24px"]::before {
        content: "24";
        font-size: 24px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="26px"]::before {
        content: "26";
        font-size: 26px !important;
    }

    .ql-snow .ql-size .ql-picker-item[data-value="28px"]::before {
        content: "28";
        font-size: 28px !important;
    }

    /*color and background color*/
    .ql-color .ql-picker-options [data-value=custom-color],
    .ql-background .ql-picker-options [data-value=custom-color] {
        background: none !important;
        width: 100% !important;
        height: 20px !important;
        text-align: center;
    }

    .ql-color .ql-picker-options [data-value=custom-color]:before,
    .ql-background .ql-picker-options [data-value=custom-color]:before {
        content: '<?= Yii::t('app', 'Custome Color') ?>';
    }

    .ql-color .ql-picker-options [data-value=custom-color]:hover,
    .ql-background .ql-picker-options [data-value=custom-color]:hover {
        border-color: transparent !important;
    }


    .ql-snow .ql-picker-options .ql-picker-item[data-value] {
        font-family: attr(data-value);
    }

    .ql-snow .ql-picker-options .ql-picker-item[data-value]::before {
        content: attr(data-value) !important;
    }

    .ql-snow .ql-picker.ql-font .ql-picker-label::before,
    .ql-snow .ql-picker.ql-font .ql-picker-item::before {
        content: attr(data-value) !important;
    }
</style>

<div class="form-group">
    <label><?= isset($label) ? $label : '' ?></label>
    <div id="<?= isset($editor_id) ? $editor_id : 'editor' ?>" class="editor">
        <?= isset($value) ? $value : '' ?>
    </div>
</div>

<div class="modal fade text-left" id="modalEnterColor" tabindex="-1" aria-labelledby="viteexModalLabel2" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="viteexModalLabel2"><b><?= Yii::t('app', 'Custome Color') ?></b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <label><?= Yii::t('app', 'Enter Hex/RGB/RGBA') ?>: </label>
                    <div class="form-group">
                        <input type="text" placeholder="<?= Yii::t('app', 'Ex: #000000 or rgb(255, 0, 0) or rgba(255,0,0,1)') ?>" class="form-control input-enter-color">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-float waves-light btn-enter-color" data-dismiss="modal">OK</button>
                    <button type="button" class="btn btn-danger waves-effect waves-float waves-light" data-dismiss="modal"><?= Yii::t('app', 'Cancel') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        'use strict';

        var fontSizeArr = ['8px', '9px', '10px', '11px', '12px', '13px', '14px', '15px', '16px', '17px', '18px', '19px', '20px', '22px', '24px', '26px', '28px'];
        var Size = Quill.import('attributors/style/size');
        Size.whitelist = fontSizeArr;
        Quill.register(Size, true);

        var AlignClass = Quill.import('attributors/style/align');
        Quill.register(AlignClass, true);

        const FontAttributor = Quill.import('attributors/class/font');
        FontAttributor.whitelist = [
            'IRANSans',
            'roboto',
            'cursive',
            'fantasy',
            'monospace',
            'arial'
        ];
        Quill.register(FontAttributor, true);

        var list_color = ["#000000", "#e60000", "#ff9900", "#ffff00", "#008a00", "#0066cc", "#9933ff", "#ffffff", "#facccc", "#ffebcc", "#ffffcc", "#cce8cc", "#cce0f5", "#ebd6ff", "#bbbbbb", "#f06666", "#ffc266", "#ffff66", "#66b966", "#66a3e0", "#c285ff", "#888888", "#a10000", "#b26b00", "#b2b200", "#006100", "#0047b2", "#6b24b2", "#444444", "#5c0000", "#663d00", "#666600", "#003700", "#002966", "#3d1466", 'custom-color'];

        var quillEditor = new Quill('#<?= isset($editor_id) ? $editor_id : 'editor' ?>', {
            bounds: '#<?= isset($editor_id) ? $editor_id : 'editor' ?>',
            modules: {
                formula: true,
                syntax: true,
                toolbar: [
                    [{
                        size: fontSizeArr
                    }],
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    [{
                        font: ['IRANSans', 'roboto', 'cursive', 'fantasy', 'monospace','arial']
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                            color: list_color
                        },
                        {
                            background: list_color
                        }
                    ],
                    [{
                        'align': null
                    }, {
                        'align': 'center'
                    }, {
                        'align': 'right'
                    }, {
                        'align': 'justify'
                    }],
                    ['link'],
                    ['image'],
                    ['clean'],
                ]
            },
            theme: 'snow'
        });

        // customize the color tool handler
        quillEditor.getModule('toolbar').addHandler('color', (value) => {
            // if the user clicked the custom-color option, show a prompt window to get the color
            if (value == 'custom-color') {
                // value = prompt('Enter Hex/RGB/RGBA');
                $("#modalEnterColor").modal('show');
                $('.btn-enter-color').click(function() {
                    value = $('.input-enter-color').val();
                    quillEditor.format('color', value);
                });
            }
            quillEditor.format('color', value);
        });
        quillEditor.getModule('toolbar').addHandler('background', (value) => {
            if (value == 'custom-color') {
                $("#modalEnterColor").modal('show');
                $('.btn-enter-color').click(function() {
                    value = $('.input-enter-color').val();
                    quillEditor.format('background', value);
                });
            }
            quillEditor.format('background', value);
        });

        function addClassTextShake(contentChange) {
            $(contentChange).addClass('text-shake');
            setTimeout(function() {
                $(contentChange).removeClass('text-shake');
            }, 1000);
        }

        // get value
        quillEditor.on('text-change', function() {
            let justHtml = quillEditor.root.innerHTML;
            if (justHtml == '<p><br></p>' || justHtml == '<p style="text-align: center;"><br></p>') {
                justHtml = '';
            }
            $('#<?= isset($input_id) ? $input_id : '' ?>').val(justHtml);
            $('.<?= isset($class_box_change) ? $class_box_change : '' ?>').html(justHtml);
        });

        $('#<?= isset($editor_id) ? $editor_id : 'editor' ?>').focusin(function() {
            addClassTextShake('.<?= isset($class_box_change) ? $class_box_change : '' ?>');
        });

        // let html = quillEditor.root.innerHTML;
        // console.log(html);
    });
</script>