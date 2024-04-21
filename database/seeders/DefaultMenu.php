<?php

namespace Database\Seeders;

use App\Models\menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultMenu extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $adminSidebar = [
        //     'vi' => [
        //         [
        //             'name' => ['vi' => 'Bảng Điều Khiển'],
        //             'icon' => 'pi pi-home',
        //             'linkTo' => '/dashboard',
        //             'child' => []
        //         ],
        //         [
        //             'name' => ['vi' => 'Quản Lý Sản Phẩm'],
        //             'icon' => "pi pi-th-large",
        //             'linkTo' => "#",
        //             'status' => false,
        //             'child' => []
        //         ],
        //         [
        //             'name' => ['vi' => 'Quản Lý Danh Mục'],
        //             'icon' => "pi pi-list",
        //             'linkTo' => "#",
        //             'status' => false,
        //             'child' => []
        //         ],
        //         [
        //             'name' => ['vi' => 'Quản Lý Khách Hàng'],
        //             'icon' => "pi pi-users",
        //             'linkTo' => "#",
        //             'status' => false,
        //             'child' => []
        //         ],
        //         [
        //             'name' => ['vi' => 'Quản Lý Đơn Hàng'],
        //             'icon' => "pi pi-receipt",
        //             'linkTo' => "#",
        //             'status' => false,
        //             'child' => []
        //         ],
        //         [
        //             'name' => ['vi' => 'Quản Trị'],
        //             'icon' => "pi pi-microchip",
        //             'linkTo' => "#",
        //             'status' => false,
        //             'child' => [
        //                 [
        //                     'name' => ['vi' => 'Quản Lý Tài Khoản'],
        //                     'linkTo' => "/user-management",
        //                     'status' => false
        //                 ],
        //                 [
        //                     'name' => ['vi' => 'Cộng Tác Viên'],
        //                     'linkTo' => "#",
        //                     'status' => false
        //                 ],
        //                 [
        //                     'name' => ['vi' => 'Vai Trò & Quyền'],
        //                     'linkTo' => "#",
        //                     'status' => false
        //                 ],
        //             ]
        //         ],
        //         [
        //             'name' => ['vi' => 'Cài đặt'],
        //             'icon' => "pi pi-cog",
        //             'linkTo' => "#",
        //             'status' => false,
        //             'child' => [
        //                 [
        //                     'name' => ['vi' => 'Cài đặt chung'],
        //                     'linkTo' => "#",
        //                     'status' => false
        //                 ],
        //             ]
        //         ],
        //     ],
        //     'en' => [
        //         [
        //             'name' => ['en' => 'Dashboard'],
        //             'icon' => 'pi pi-home',
        //             'linkTo' => '/dashboard',
        //             'child' => []
        //         ],
        //         [
        //             'name' => ['en' => 'Product Management'],
        //             'icon' => "pi pi-th-large",
        //             'linkTo' => "#",
        //             'status' => false,
        //             'child' => []
        //         ],
        //         [
        //             'name' => ['en' => 'Category Management'],
        //             'icon' => "pi pi-list",
        //             'linkTo' => "#",
        //             'status' => false,
        //             'child' => []
        //         ],
        //         [
        //             'name' => ['en' => 'Customer Management'],
        //             'icon' => "pi pi-users",
        //             'linkTo' => "#",
        //             'status' => false,
        //             'child' => []
        //         ],
        //         [
        //             'name' => ['en' => 'Order Management'],
        //             'icon' => "pi pi-receipt",
        //             'linkTo' => "#",
        //             'status' => false,
        //             'child' => []
        //         ],
        //         [
        //             'name' => ['en' => 'Administration'],
        //             'icon' => "pi pi-microchip",
        //             'linkTo' => "#",
        //             'status' => false,
        //             'child' => [
        //                 [
        //                     'name' => ['en' => 'User Management'],
        //                     'linkTo' => "/user-management",
        //                     'status' => false
        //                 ],
        //                 [
        //                     'name' => ['en' => 'Collaborators'],
        //                     'linkTo' => "#",
        //                     'status' => false
        //                 ],
        //                 [
        //                     'name' => ['en' => 'Role & Permission'],
        //                     'linkTo' => "#",
        //                     'status' => false
        //                 ],
        //             ]
        //         ],
        //         [
        //             'name' => ['en' => 'Settings'],
        //             'icon' => "pi pi-cog",
        //             'linkTo' => "#",
        //             'status' => false,
        //             'child' => [
        //                 [
        //                     'name' => ['en' => 'General Settings'],
        //                     'linkTo' => "#",
        //                     'status' => false
        //                 ],
        //             ]
        //         ],
        //     ],
        // ];

        // foreach ($adminSidebar as $locale => $menus) {
        //     foreach ($menus as $menu) {
        //         $parentMenu = menu::create([
        //             'icon' => $menu['icon'],
        //             'linkTo' => $menu['linkTo'],
        //         ]);
        //         foreach ($menu['name'] as $lang => $name) {
        //             $parentMenu->setTranslation('name', $lang, $name);
        //         }
        //         $parentMenu->save();
        //         if (!empty($menu['child'])) {
        //             foreach ($menu['child'] as $childMenu) {
        //                 $parentMenu->children()->create([
        //                     'linkTo' => $childMenu['linkTo'],
        //                 ]);
        //             }
        //             foreach ($menu['child'] as $childMenu) {
        //                 $child = $parentMenu->children()->create([
        //                     'linkTo' => $childMenu['linkTo'],
        //                 ]);

        //                 foreach ($childMenu['name'] as $lang => $name) {
        //                     $child->setTranslation('name', $lang, $name);
        //                 }
        //                 $child->save();
        //             }
        //         }
        //     }
        // }


        $menuData = [
            [
                'name' => [
                    'vi' => 'Bảng Điều Khiển',
                    'en' => 'Dashboard'
                ],
                'icon' => 'pi pi-home',
                'linkTo' => '/dashboard',
                'child' => []
            ],
            [
                'name' => [
                    'vi' => 'Quản Lý Sản Phẩm',
                    'en' => 'Product Management'
                ],
                'icon' => "pi pi-th-large",
                'linkTo' => "#",
                'status' => false,
                'child' => []
            ],
            [
                'name' => [
                    'vi' => 'Quản Lý Danh Mục',
                    'en' => 'Category Management'
                ],
                'icon' => "pi pi-list",
                'linkTo' => "#",
                'status' => false,
                'child' => []
            ],
            [
                'name' => [
                    'vi' => 'Quản Lý Khách Hàng',
                    'en' => 'Customer Management'
                ],
                'icon' => "pi pi-users",
                'linkTo' => "#",
                'status' => false,
                'child' => []
            ],
            [
                'name' => [
                    'vi' => 'Quản Lý Đơn Hàng',
                    'en' => 'Order Management'
                ],
                'icon' => "pi pi-receipt",
                'linkTo' => "#",
                'status' => false,
                'child' => []
            ],
            [
                'name' => [
                    'vi' => 'Quản Trị',
                    'en' => 'Administration'
                ],
                'icon' => "pi pi-microchip",
                'linkTo' => "#",
                'status' => false,
                'child' => [
                    [
                        'name' => [
                            'vi' => 'Quản Lý Tài Khoản',
                            'en' => 'User Management'
                        ],
                        'linkTo' => "/user-management",
                        'status' => false
                    ],
                    [
                        'name' => [
                            'vi' => 'Cộng Tác Viên',
                            'en' => 'Collaborators'
                        ],
                        'linkTo' => "#",
                        'status' => false
                    ],
                    [
                        'name' => [
                            'vi' => 'Vai Trò & Quyền',
                            'en' => 'Role & Permission'
                        ],
                        'linkTo' => "#",
                        'status' => false
                    ],
                ]
            ],
            [
                'name' => [
                    'vi' => 'Cài đặt',
                    'en' => 'Settings'
                ],
                'icon' => "pi pi-cog",
                'linkTo' => "#",
                'status' => false,
                'child' => [
                    [
                        'name' => [
                            'vi' => 'Cài đặt chung',
                            'en' => 'General Settings'
                        ],
                        'linkTo' => "#",
                        'status' => false
                    ],
                ]
            ]
        ];
        foreach ($menuData as $parentMenu) {
            $parent = menu::create([
                'name' => $parentMenu['name'],
                'icon' => $parentMenu['icon'],
                'linkTo' => $parentMenu['linkTo'],
            ]);
            // $parent->setTranslations('name', $parentMenu['name']);
            // $parent->save();
            if (!empty($parentMenu['child'])) {
                foreach ($parentMenu['child'] as $childMenu) {
                    $child = $parent->children()->create([
                        'name' => $childMenu['name'],
                        'linkTo' => $childMenu['linkTo'],
                    ]);

                    // $child->setTranslation('name', $childMenu['name']);
                    // $child->save();
                }
            }
        }
    }
}
