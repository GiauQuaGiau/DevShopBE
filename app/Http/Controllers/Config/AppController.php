<?php

namespace App\Http\Controllers\Config;

use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\Controller;
use App\Models\menu;
use Illuminate\Http\Request;


class AppController extends Controller
{
    public function setLanguage(Request $request)
    {
        try {
            if ($user = getCurrentUser()) {
                $user->lang = $request->input('lang') ? $request->input('lang') : $user->lang;
                $user->save();
                return response()->json([
                    'status' => true,
                    'message' => 'change language',
                    'user' => $user
                ]);
            }
        } catch (\Throwable $th) {
            return HttpStatusCodes::responseError(
                'Có xẩy ra lỗi khi cập nhật ngôn ngữ',
                HttpStatusCodes::INTERNAL_SERVER_ERROR,
                $th,
                __METHOD__
            );
        }
    }

    public function getMenu(Request $request)
    {
        try {
            // $lang = $request->input('lang') ? $request->input('lang') : 'vi';
            $user = getCurrentUser();
            $lang = $user ? $user->lang: 'vi';
            $data = menu::all()->toArray();
            $menu = [];
            // dd($data);
            // app()->setLocale($user->lang);
            foreach ($data as $key => $menuItem) {
                if (!array_get($menuItem, 'parent_id')) {
                    array_push($menu, [
                        'id' => array_get($menuItem, 'id'),
                        // 'name' => array_get($menuItem, 'name')[$user->lang],
                        'name' => array_get($menuItem, 'name')[$lang],
                        'icon' => array_get($menuItem, 'icon'),
                        'linkTo' => array_get($menuItem, 'linkTo'),
                        'status' => array_get($menuItem, 'status'),
                        'child' => []
                    ]);
                }
            }
            foreach ($data as $key => $childtem) {
                if (array_get($childtem, 'parent_id')) {
                    foreach ($menu as $key => $parentItem) {
                        if (array_get($parentItem, 'id') == array_get($childtem, 'parent_id')) {
                            array_push($menu[$key]['child'], [
                                'name' => array_get($childtem, 'name')[$lang],
                                // 'name' => array_get($childtem, 'name')[$user->lang],
                                'linkTo' => array_get($childtem, 'linkTo'),
                                'status' => array_get($childtem, 'status'),
                            ]);
                        }
                    }
                }
            }

            // dd($menu);
            return response()->json([
                'status' => true,
                // 'menu' => MenuResource::collection($menu)
                'language' => $lang,
                'menu' => $menu

            ]);
            // }
        } catch (\Throwable $th) {
            return HttpStatusCodes::responseError(
                'Có xẩy ra lỗi khi truy vấn Menu',
                HttpStatusCodes::INTERNAL_SERVER_ERROR,
                $th,
                __METHOD__
            );
        }
    }
}
