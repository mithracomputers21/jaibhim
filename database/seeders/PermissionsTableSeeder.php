<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'setting_access',
            ],
            [
                'id'    => 18,
                'title' => 'district_create',
            ],
            [
                'id'    => 19,
                'title' => 'district_edit',
            ],
            [
                'id'    => 20,
                'title' => 'district_show',
            ],
            [
                'id'    => 21,
                'title' => 'district_delete',
            ],
            [
                'id'    => 22,
                'title' => 'district_access',
            ],
            [
                'id'    => 23,
                'title' => 'block_create',
            ],
            [
                'id'    => 24,
                'title' => 'block_edit',
            ],
            [
                'id'    => 25,
                'title' => 'block_show',
            ],
            [
                'id'    => 26,
                'title' => 'block_delete',
            ],
            [
                'id'    => 27,
                'title' => 'block_access',
            ],
            [
                'id'    => 28,
                'title' => 'member_create',
            ],
            [
                'id'    => 29,
                'title' => 'member_edit',
            ],
            [
                'id'    => 30,
                'title' => 'member_show',
            ],
            [
                'id'    => 31,
                'title' => 'member_delete',
            ],
            [
                'id'    => 32,
                'title' => 'member_access',
            ],
            [
                'id'    => 33,
                'title' => 'panchayat_create',
            ],
            [
                'id'    => 34,
                'title' => 'panchayat_edit',
            ],
            [
                'id'    => 35,
                'title' => 'panchayat_show',
            ],
            [
                'id'    => 36,
                'title' => 'panchayat_delete',
            ],
            [
                'id'    => 37,
                'title' => 'panchayat_access',
            ],
            [
                'id'    => 38,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 39,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 40,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 41,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 42,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 43,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 44,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 45,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 46,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 47,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 48,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 49,
                'title' => 'expense_create',
            ],
            [
                'id'    => 50,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 51,
                'title' => 'expense_show',
            ],
            [
                'id'    => 52,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 53,
                'title' => 'expense_access',
            ],
            [
                'id'    => 54,
                'title' => 'income_create',
            ],
            [
                'id'    => 55,
                'title' => 'income_edit',
            ],
            [
                'id'    => 56,
                'title' => 'income_show',
            ],
            [
                'id'    => 57,
                'title' => 'income_delete',
            ],
            [
                'id'    => 58,
                'title' => 'income_access',
            ],
            [
                'id'    => 59,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 60,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 61,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 62,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 63,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 64,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
