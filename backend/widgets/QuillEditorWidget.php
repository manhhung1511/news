<?php 
namespace backend\widgets;

use Yii;
use yii\base\Widget;

class QuillEditorWidget extends Widget
{
	public $label;
	public $value;
	public $input_id;
	public $editor_id;
    public $class_box_change;

    public function run()
    {
        return $this->render('quill_editor', [
        	'label' => $this->label,
            'value' => $this->value,
            'input_id' => $this->input_id,
            'editor_id' => $this->editor_id,
            'class_box_change' => $this->class_box_change
        ]);
    }
}