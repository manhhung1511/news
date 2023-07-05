<?php
namespace console\controllers;

use common\models\Category;
use common\models\News;
use common\models\User;
use Yii;
use yii\console\Controller;
use yii\web\Request;

class SiteController extends Controller {
    public static function  Slug ($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
    public function actionIndex() {
        $filePath = Yii::getAlias('@frontend').'/web/sitemap.xml';
        $data_xml = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $news = News::find()->all();
        $categories = Category::find()->where(['status' => 1])->all();
        $static_url = [
            'https://songxanh24h.vn/'
        ];

        foreach($static_url as $url) {
            $date = date('Y-m-d');
            $pr = '0.80';
            if($url == 'https://songxanh24h.vn/') $pr = '1.00';
                $data_xml.= "
                    <url>
                        <loc>$url</loc>
                        <lastmod>$date</lastmod>
                        <priority>$pr</priority>
                        <changefreq>always</changefreq>
                    </url>
                ";
        }

        foreach($categories as $slug) {
            $categories_child = $slug->category_child;
            if((isset($slug->category_child[0]) && $slug->category_child[0])) {
                foreach($categories_child as $item) {
                    $url = $slug->slug .'/'. self::Slug($item);
                    $date = date('Y-m-d');
                    $pr = '0.80';
                        $data_xml.= "
                            <url>
                                <loc>https://songxanh24h.vn/category/$url</loc>
                                <lastmod>$date</lastmod>
                                <priority>$pr</priority>
                                <changefreq>always</changefreq>
                            </url>
                        ";
                }
            }

            $url = $slug->slug;
            $date = date('Y-m-d');
            $pr = '0.80';
                $data_xml.= "
                    <url>
                        <loc>https://songxanh24h.vn/category/$url</loc>
                        <lastmod>$date</lastmod>
                        <priority>$pr</priority>
                        <changefreq>always</changefreq>
                    </url>
                ";
        }

        foreach($news as $slug) {
            $url =  self::Slug($slug->title);
            $date = date('Y-m-d');
            $pr = '0.64';
                $data_xml.= "
                    <url>
                        <loc>https://songxanh24h.vn/$url</loc>
                        <lastmod>$date</lastmod>
                        <priority>$pr</priority>
                        <changefreq>always</changefreq>
                    </url>
                ";
        }

        $data_xml .= '</urlset>';

        file_put_contents($filePath, $data_xml);
    }
}
?>