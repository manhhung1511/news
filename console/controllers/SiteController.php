<?php
namespace console\controllers;

use common\models\Auth;
use common\models\Category;
use common\models\CategoryMedicine;
use common\models\Hospital;
use common\models\Medicine;
use common\models\News;
use common\models\Province;
use common\models\Sick;
use Exception;
use Google_Client;
use Google_Service;
use Yii;
use yii\console\Controller;
use Google\Service\Blogger;
use Google\Service\Blogger\Post;
use MongoDb\BSON\ObjectId;

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
            $pr = '0.90';
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
                    $pr = '0.90';
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
            $pr = '0.90';
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
            $pr = '0.90';
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
    
    public function actionWriteFile() {
        $filename = Yii::getAlias('@console').'/file/index1.csv';
        // //get data
        $news = News::find()->andWhere(['>=','created_at',date('Y-m-d').' 00:00:00'])->andWhere(['<=','created_at',date('Y-m-d').'23:59:59'])->all();
        $data = [];
        foreach($news as $new) {
            $data[] = ['https://songxanh24h.vn/'.$new->slug];
        }
        
        $file = fopen($filename, 'w'); 

        foreach ($data as $row) {
            fputcsv($file, $row); 
        }
        fclose($file); 
    }

    public function actionWriteFile1() {
        $filename = Yii::getAlias('@console').'/file/index1.csv';
        // //get data
        $news = Medicine::find()->all();
        $data = [];
        foreach($news as $new) {
            $data[] = ['https://songxanh24h.vn/thuoc/'.$new->slug];
        }
        
        $file = fopen($filename, 'w'); 

        foreach ($data as $row) {
            fputcsv($file, $row); 
        }
        fclose($file); 
    }

    public function actionReadFile() {
        // Read URLs from CSV file
        $filename = Yii::getAlias('@console').'/file/index1.csv';
        $urls = array();
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $urls[] = $data[0];
             }
            fclose($handle);
        } 

        $ok_responses = array();
        $other_responses = array();
        foreach ($urls as $url) {
                    
        $client = new Google_Client();
                
        // service_account_file.json is the private key that you created for your service account.
        $fileKey = Yii::getAlias('@console').'/file/service_account.json';
        $client->setAuthConfig($fileKey);
        $client->addScope('https://www.googleapis.com/auth/indexing');
                
        // Get a Guzzle HTTP Client
        $httpClient = $client->authorize();
        $endpoint = 'https://indexing.googleapis.com/v3/urlNotifications:publish';
                
        $content = json_encode(array("url" => $url, "type" => "URL_UPDATED"));
            
        $response = $httpClient->post($endpoint, ['body' => $content]);
        $status_code = $response->getStatusCode();
            
         // Store response and URL for checking and printing later
        $decoded_response = json_decode($response->getBody(), true);
        if ($status_code == 200) {
            $ok_responses[] = array("url" => $url, "response" => $decoded_response);
        } else {
            $other_responses[] = array("url" => $url, "response" => $decoded_response);
        }
        }
    }

    public function actionTest1() {
        Hospital::deleteAll();
    }

}
?>