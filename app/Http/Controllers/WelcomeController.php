<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;  
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;


use Monolog\Logger;
use Storage;
use Monolog\Handler\StreamHandler;
use Auth;
class WelcomeController extends Controller
{
    //
	function getIndex(){
		echo 991;
		//return view('test');
	}
	function anyUpload(Request $request){
		
		if ($request->isMethod('post')) {
            $file = $request->file('picture');
            // 文件是否上传成功
            if ($file->isValid()) {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                var_dump($bool);
            }

        }
		return view('upload');
	}
	function getMytest(){
	   $student=DB::select("select * from articles");  
    //返回一个二维数组  $student  
   		return view('articles',['student' => $student]);
	}
	function edit(){
	 echo 993;
	}
	
	function getMyewm(){
		$qrcode = new BaconQrCodeGenerator;
		$abc=$qrcode->size(200)->generate('http://laravelacademy.org');
		echo $abc;
	}
	public function getLog(){
		$input='xiaochao';
    	$log = new Logger('register');
$log->pushHandler(new StreamHandler('path/to/your.log',Logger::INFO) );
$log->addInfo('用户注册信息:111'.$input);
	}
	
	/*测试一个表单留言功能*/
	function anyMessage(Request $request){
		if ($request->isMethod('post')) {
			$allData = $request->all();
			DB::table('articles')->insert([
            'title' => $allData['title'],
            'body' =>  $allData['content'],
			'user_id'=>Auth::user()->id,
			'created_at' => date('Y-m-d H:i:s'),
        ]);
		 exit(var_dump('执行成功！'));
		}
		return view('message');
	}
}
