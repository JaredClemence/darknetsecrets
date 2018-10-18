<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageView;

class PageViewController extends Controller {

    static public function recordPageView(Request $request) {
        $remote_addr = $_SERVER['REMOTE_ADDR'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $utm_campaign = $request->get('utm_campaign', '');
        $utm_source = $request->get('utm_source', '');
        $utm_medium = $request->get('utm_medium', '');
        $server_global = $_SERVER;
        $view = new PageView(compact('remote_addr','user_agent','utm_campaign','utm_source','utm_medium','server_global'));
        $view->save();
    }

}
