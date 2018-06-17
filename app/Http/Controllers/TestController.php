<?php
/**
 * Created by PhpStorm.
 * User: ling
 * Date: 2018/6/17
 * Time: 11:28 AM
 */

namespace App\Http\Controllers;

use XS;

class TestController extends Controller
{
    function index()
    {
        echo date('Y-m-d H:i:s', time());
    }


    function testGetXS()
    {
        $xs = new XS('big_cat_list');
        $xs->search->setQuery('');
        $doc = $xs->search->search();
        dd($doc);
    }
}