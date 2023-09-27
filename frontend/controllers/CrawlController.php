<?php

namespace frontend\controllers;

use Yii;
use common\helper\Tools;
use common\models\CategoryMedicine;
use common\models\Hospital;
use common\models\Medicine;
use common\models\Province;
use common\models\Sick;
use yii\data\Pagination;
use frontend\controllers\MainController;
/**
 * Site controller
 */
class CrawlController extends MainController
{
    public function actionMedicine() {
        $slug = Yii::$app->request->get('slug');
        $category_slug = CategoryMedicine::findOne(['slug' => $slug]);
        $category_name = $category_slug->name;
        Yii::$app->params['category'] = Tools::subWord($category_name .' - Tận tâm chăm sóc sức khỏe, Thông tin sức khỏe, dinh dưỡng, hỗ trợ tư vấn điều trị bệnh, thông tin thuốc, chăm sóc làm đẹp tin cậy cho người Việt', 33);
        $model = Medicine::find()->where(['category' => $category_name]);   
        $pages= new Pagination(['totalCount' => $model->count(),'pageSize' => '20']);
        $medicine = Medicine::find()->where(['category' => $category_name])->offset($pages->offset)->limit($pages->limit)->all();
        $categories = CategoryMedicine::find()->all();
        return $this->render('medicine', [
            'medicine' => $medicine,
            'pages' => $pages,
            'categories' => $categories,
            'name' => $category_name
        ]);
    }

    public function actionMedicineDetail() {
        $slug = Yii::$app->request->get('slug');
        $detail = Medicine::findOne(['slug' => $slug]);
        $category = $detail->category;
        $categories = Medicine::find()->where(['category' => $category])->orderBy(['created_at' => SORT_ASC])->limit(10)->all();
    
        return $this->render("medicineDetail",[
            'detail' => $detail,
            'categories' => $categories
        ]);
    }

    public function actionFullMedicine() {
        $medicines = CategoryMedicine::find()->all();
        return $this->render('fullMedicine', [
            'medicines' => $medicines
        ]);
    }

    public function actionFullProvince() {
        $provinces = Province::find()->all();
        return $this->render('province', [
            'provinces' => $provinces
        ]);
    }

    public function actionHospital() {
        $slug = Yii::$app->request->get('slug');
        $province = Province::findOne(['slug' => $slug]);
        $name_category = $province->name;
        // $hospital = Hospital::findAll(['slug_category' => $slug]);
        $model = Hospital::find()->where(['slug_category' => $slug, 'type' => '1']);
        $pages= new Pagination(['totalCount' => $model->count(),'pageSize' => '20']);
        $hospital = Hospital::find()->where(['slug_category' => $slug, 'type' => '1'])->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('hospital', [
            'hospital' => $hospital,
            'pages' => $pages,
            'name_category' => $name_category
        ]);
    }

    public function actionHospitalDetail() {
        $slug = Yii::$app->request->get('slug');
        $slug_category = Yii::$app->request->get('slug-category');
        $detail = Hospital::findOne(['slug' => $slug, 'slug_category' => $slug_category,'type' => '1']);
        $address = $detail->address;
        $categories = Hospital::find()->where(['address' => $address, 'type' => '1'])->orderBy(['created_at' => SORT_ASC])->limit(10)->all();
    
        return $this->render("hospitalDetail",[
            'detail' => $detail,
            'categories' => $categories
        ]);
    }

    public function actionDrugStoreDetail() {
        $slug = Yii::$app->request->get('slug');
        $slug_category = Yii::$app->request->get('slug-category');
        $detail = Hospital::findOne(['slug' => $slug, 'slug_category' => $slug_category, 'type' => '2']);
        $address = $detail->address;
        $categories = Hospital::find()->where(['address' => $address, 'type' => '2'])->orderBy(['created_at' => SORT_ASC])->limit(10)->all();
    
        return $this->render("hospitalDetail",[
            'detail' => $detail,
            'categories' => $categories
        ]);
    }

    public function actionFullSick() {
        $a = Sick::find()->where(['alphabet' => 'a', 'type'=> '1'])->all();
        $b = Sick::find()->where(['alphabet' => 'b', 'type'=> '1'])->all();
        $c = Sick::find()->where(['alphabet' => 'c', 'type'=> '1'])->all();
        $d = Sick::find()->where(['alphabet' => 'd', 'type'=> '1'])->all();
        $đ = Sick::find()->where(['alphabet' => 'đ', 'type'=> '1'])->all();
        $g = Sick::find()->where(['alphabet' => 'g', 'type'=> '1'])->all();
        $h = Sick::find()->where(['alphabet' => 'h', 'type'=> '1'])->all();
        $j = Sick::find()->where(['alphabet' => 'j', 'type'=> '1'])->all();
        $k = Sick::find()->where(['alphabet' => 'k', 'type'=> '1'])->all();
        $l = Sick::find()->where(['alphabet' => 'l', 'type'=> '1'])->all();
        $m = Sick::find()->where(['alphabet' => 'm', 'type'=> '1'])->all();
        $n = Sick::find()->where(['alphabet' => 'n', 'type'=> '1'])->all();
        $p = Sick::find()->where(['alphabet' => 'p', 'type'=> '1'])->all();
        $q = Sick::find()->where(['alphabet' => 'q', 'type'=> '1'])->all();
        $r = Sick::find()->where(['alphabet' => 'r', 'type'=> '1'])->all();
        $s = Sick::find()->where(['alphabet' => 's', 'type'=> '1'])->all();
        $t = Sick::find()->where(['alphabet' => 't', 'type'=> '1'])->all();
        $u = Sick::find()->where(['alphabet' => 'u', 'type'=> '1'])->all();
        $v = Sick::find()->where(['alphabet' => 'v', 'type'=> '1'])->all();
        $x = Sick::find()->where(['alphabet' => 'x', 'type'=> '1'])->all();
        $value = [
        'a' => $a,
        'b' => $b,
        'c' => $c,
        'd' => $d,
        'đ' => $đ,
        'g' => $g,
        'h' => $h,
        'j' => $j,
        'k' => $k,
        'l' => $l,
        'm' => $m,
        'n' => $n,
        'p' => $p,
        'q' => $q,
        'r' => $r,
        's' => $s,
        't' => $t,
        'u' => $u,
        'v' => $v,
        'x' => $x
    ];
        return $this->render('sick',[
            'value' => $value
        ]);
    }

    public function actionSickDetail() {
        $slug = Yii::$app->request->get('slug');
        $contents = Sick::findOne(['slug' => $slug]);
        $categories = Sick::find()->where(['type' => '1'])->orderBy(['created_at' => SORT_ASC])->limit(20)->all();
        return $this->render("sickDetail",[
            'contents' => $contents,
            'categories' => $categories
        ]);
    }

    public function actionFullDrugstore() {
        $provinces = Province::find()->all();
        return $this->render('drugstoreProvince', [
            'provinces' => $provinces
        ]);
    }

    public function actionDrugstore() {
        $slug = Yii::$app->request->get('slug');
        $province = Province::findOne(['slug' => $slug]);
        $name_category = $province->name;
        // $hospital = Hospital::findAll(['slug_category' => $slug]);
        $model = Hospital::find()->where(['slug_category' => $slug, 'type' => '2']);
        $pages= new Pagination(['totalCount' => $model->count(),'pageSize' => '20']);
        $drugstore = Hospital::find()->where(['slug_category' => $slug, 'type' => '2'])->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('drugstore', [
            'drugstore' => $drugstore,
            'pages' => $pages,
            'name_category' => $name_category
        ]);
    }

    public function actionFullDrug() {
        $a = Sick::find()->where(['alphabet' => 'A', 'type'=> '2'])->all();
        $b = Sick::find()->where(['alphabet' => 'B', 'type'=> '2'])->all();
        $c = Sick::find()->where(['alphabet' => 'C', 'type'=> '2'])->all();
        $d = Sick::find()->where(['alphabet' => 'D', 'type'=> '2'])->all();
        $đ = Sick::find()->where(['alphabet' => 'Đ', 'type'=> '2'])->all();
        $g = Sick::find()->where(['alphabet' => 'G', 'type'=> '2'])->all();
        $h = Sick::find()->where(['alphabet' => 'H', 'type'=> '2'])->all();
        $k = Sick::find()->where(['alphabet' => 'K', 'type'=> '2'])->all();
        $l = Sick::find()->where(['alphabet' => 'L', 'type'=> '2'])->all();
        $m = Sick::find()->where(['alphabet' => 'M', 'type'=> '2'])->all();
        $n = Sick::find()->where(['alphabet' => 'N', 'type'=> '2'])->all();
        $o = Sick::find()->where(['alphabet' => 'O', 'type'=> '2'])->all();
        $i = Sick::find()->where(['alphabet' => 'I', 'type'=> '2'])->all();
        $p = Sick::find()->where(['alphabet' => 'P', 'type'=> '2'])->all();
        $q = Sick::find()->where(['alphabet' => 'Q', 'type'=> '2'])->all();
        $r = Sick::find()->where(['alphabet' => 'R', 'type'=> '2'])->all();
        $s = Sick::find()->where(['alphabet' => 'S', 'type'=> '2'])->all();
        $t = Sick::find()->where(['alphabet' => 'T', 'type'=> '2'])->all();
        $u = Sick::find()->where(['alphabet' => 'U', 'type'=> '2'])->all();
        $v = Sick::find()->where(['alphabet' => 'V', 'type'=> '2'])->all();
        $x = Sick::find()->where(['alphabet' => 'X', 'type'=> '2'])->all();
        $value = [
        'a' => $a,
        'b' => $b,
        'c' => $c,
        'd' => $d,
        'đ' => $đ,
        'g' => $g,
        'h' => $h,
        'k' => $k,
        'l' => $l,
        'm' => $m,
        'n' => $n,
        'o' => $o,
        'i' => $i,
        'p' => $p,
        'q' => $q,
        'r' => $r,
        's' => $s,
        't' => $t,
        'u' => $u,
        'v' => $v,
        'x' => $x
    ];
        return $this->render('fullDrug',[
            'value' => $value
        ]);
    }

    public function actionDrugDetail() {
        $slug = Yii::$app->request->get('slug');
        $contents = Sick::findOne(['slug' => $slug]);
        $categories = Sick::find()->where(['type' => '2'])->orderBy(['created_at' => SORT_ASC])->limit(20)->all();
        return $this->render("drugDetail",[
            'contents' => $contents,
            'categories' => $categories
        ]);
    }

    public function actionFullActive() {
        $a = Sick::find()->where(['alphabet' => 'a', 'type'=> '3'])->all();
        $b = Sick::find()->where(['alphabet' => 'b', 'type'=> '3'])->all();
        $c = Sick::find()->where(['alphabet' => 'c', 'type'=> '3'])->all();
        $d = Sick::find()->where(['alphabet' => 'd', 'type'=> '3'])->all();
        $e = Sick::find()->where(['alphabet' => 'e', 'type'=> '3'])->all();
        $g = Sick::find()->where(['alphabet' => 'g', 'type'=> '3'])->all();
        $h = Sick::find()->where(['alphabet' => 'h', 'type'=> '3'])->all();
        $k = Sick::find()->where(['alphabet' => 'k', 'type'=> '3'])->all();
        $l = Sick::find()->where(['alphabet' => 'l', 'type'=> '3'])->all();
        $m = Sick::find()->where(['alphabet' => 'm', 'type'=> '3'])->all();
        $n = Sick::find()->where(['alphabet' => 'n', 'type'=> '3'])->all();
        $o = Sick::find()->where(['alphabet' => 'o', 'type'=> '3'])->all();
        $i = Sick::find()->where(['alphabet' => 'i', 'type'=> '3'])->all();
        $p = Sick::find()->where(['alphabet' => 'p', 'type'=> '3'])->all();
        $q = Sick::find()->where(['alphabet' => 'q', 'type'=> '3'])->all();
        $r = Sick::find()->where(['alphabet' => 'r', 'type'=> '3'])->all();
        $s = Sick::find()->where(['alphabet' => 's', 'type'=> '3'])->all();
        $t = Sick::find()->where(['alphabet' => 't', 'type'=> '3'])->all();
        $u = Sick::find()->where(['alphabet' => 'u', 'type'=> '3'])->all();
        $v = Sick::find()->where(['alphabet' => 'v', 'type'=> '3'])->all();
        $x = Sick::find()->where(['alphabet' => 'x', 'type'=> '3'])->all();
        $value = [
        'a' => $a,
        'b' => $b,
        'c' => $c,
        'd' => $d,
        'e' => $e,
        'g' => $g,
        'h' => $h,
        'k' => $k,
        'l' => $l,
        'm' => $m,
        'n' => $n,
        'o' => $o,
        'i' => $i,
        'p' => $p,
        'q' => $q,
        'r' => $r,
        's' => $s,
        't' => $t,
        'u' => $u,
        'v' => $v,
        'x' => $x
    ];
        return $this->render('fullActive',[
            'value' => $value
        ]);
    }

    public function actionActiveDetail() {
        $slug = Yii::$app->request->get('slug');
        $contents = Sick::findOne(['slug' => $slug]);
        $categories = Sick::find()->where(['type' => '3'])->orderBy(['created_at' => SORT_ASC])->limit(20)->all();
        return $this->render("activeDetail",[
            'contents' => $contents,
            'categories' => $categories
        ]);
    }

    // public function actionSearch() {
    //     $find = Yii::$app->request->get('s');
    //     $resl = 
    // }
}

