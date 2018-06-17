<?php
/**
 * Created by PhpStorm.
 * User: ling
 * Date: 2018/6/17
 * Time: 11:00 AM
 */

namespace App\Http\Controllers\BigCat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use XS;
use XSDocument;

class IndexController extends Controller
{
    private $xs;

    function __construct()
    {
        $this->xs = new XS('big_cat_list'); // 建立 XS 对象，项目名称为：big_cat_list
    }

    function insertXS(Request $request)
    {
        $data = array(
            'id' => $request->input('id'), // 此字段为主键，是进行文档替换的唯一标识
            'category' => $request->input('category', ''),
            'title' => $request->input('title', ''),
            'create_at' => $request->input('create_at', time())
        );

        $index = $this->xs->index; // 获取 索引对象

        // 创建文档对象
        $doc = new XSDocument;
        $doc->setFields($data);

        // 更新到索引数据库中
        $index->update($doc);

    }

}