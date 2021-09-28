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
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 20,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 21,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 22,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 23,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 24,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 25,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 26,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 27,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 28,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 29,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 30,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 31,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 32,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 33,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 34,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 35,
                'title' => 'global_var_access',
            ],
            [
                'id'    => 36,
                'title' => 'department_create',
            ],
            [
                'id'    => 37,
                'title' => 'department_edit',
            ],
            [
                'id'    => 38,
                'title' => 'department_show',
            ],
            [
                'id'    => 39,
                'title' => 'department_delete',
            ],
            [
                'id'    => 40,
                'title' => 'department_access',
            ],
            [
                'id'    => 41,
                'title' => 'city_create',
            ],
            [
                'id'    => 42,
                'title' => 'city_edit',
            ],
            [
                'id'    => 43,
                'title' => 'city_show',
            ],
            [
                'id'    => 44,
                'title' => 'city_delete',
            ],
            [
                'id'    => 45,
                'title' => 'city_access',
            ],
            [
                'id'    => 46,
                'title' => 'document_type_create',
            ],
            [
                'id'    => 47,
                'title' => 'document_type_edit',
            ],
            [
                'id'    => 48,
                'title' => 'document_type_show',
            ],
            [
                'id'    => 49,
                'title' => 'document_type_delete',
            ],
            [
                'id'    => 50,
                'title' => 'document_type_access',
            ],
            [
                'id'    => 51,
                'title' => 'foundation_access',
            ],
            [
                'id'    => 52,
                'title' => 'type_create',
            ],
            [
                'id'    => 53,
                'title' => 'type_edit',
            ],
            [
                'id'    => 54,
                'title' => 'type_show',
            ],
            [
                'id'    => 55,
                'title' => 'type_delete',
            ],
            [
                'id'    => 56,
                'title' => 'type_access',
            ],
            [
                'id'    => 57,
                'title' => 'organization_create',
            ],
            [
                'id'    => 58,
                'title' => 'organization_edit',
            ],
            [
                'id'    => 59,
                'title' => 'organization_show',
            ],
            [
                'id'    => 60,
                'title' => 'organization_delete',
            ],
            [
                'id'    => 61,
                'title' => 'organization_access',
            ],
            [
                'id'    => 62,
                'title' => 'donation_create',
            ],
            [
                'id'    => 63,
                'title' => 'donation_edit',
            ],
            [
                'id'    => 64,
                'title' => 'donation_show',
            ],
            [
                'id'    => 65,
                'title' => 'donation_delete',
            ],
            [
                'id'    => 66,
                'title' => 'donation_access',
            ],
            [
                'id'    => 67,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 68,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 69,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 70,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 71,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 72,
                'title' => 'project_create',
            ],
            [
                'id'    => 73,
                'title' => 'project_edit',
            ],
            [
                'id'    => 74,
                'title' => 'project_show',
            ],
            [
                'id'    => 75,
                'title' => 'project_delete',
            ],
            [
                'id'    => 76,
                'title' => 'project_access',
            ],
            [
                'id'    => 77,
                'title' => 'automatic_debt_create',
            ],
            [
                'id'    => 78,
                'title' => 'automatic_debt_edit',
            ],
            [
                'id'    => 79,
                'title' => 'automatic_debt_show',
            ],
            [
                'id'    => 80,
                'title' => 'automatic_debt_delete',
            ],
            [
                'id'    => 81,
                'title' => 'automatic_debt_access',
            ],
            [
                'id'    => 82,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 83,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 84,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 85,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 86,
                'title' => 'global_obj_create',
            ],
            [
                'id'    => 87,
                'title' => 'global_obj_edit',
            ],
            [
                'id'    => 88,
                'title' => 'global_obj_show',
            ],
            [
                'id'    => 89,
                'title' => 'global_obj_delete',
            ],
            [
                'id'    => 90,
                'title' => 'global_obj_access',
            ],
            [
                'id'    => 91,
                'title' => 'country_create',
            ],
            [
                'id'    => 92,
                'title' => 'country_edit',
            ],
            [
                'id'    => 93,
                'title' => 'country_show',
            ],
            [
                'id'    => 94,
                'title' => 'country_delete',
            ],
            [
                'id'    => 95,
                'title' => 'country_access',
            ],
            [
                'id'    => 96,
                'title' => 'event_create',
            ],
            [
                'id'    => 97,
                'title' => 'event_edit',
            ],
            [
                'id'    => 98,
                'title' => 'event_show',
            ],
            [
                'id'    => 99,
                'title' => 'event_delete',
            ],
            [
                'id'    => 100,
                'title' => 'event_access',
            ],
            [
                'id'    => 101,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 102,
                'title' => 'testimony_create',
            ],
            [
                'id'    => 103,
                'title' => 'testimony_edit',
            ],
            [
                'id'    => 104,
                'title' => 'testimony_show',
            ],
            [
                'id'    => 105,
                'title' => 'testimony_delete',
            ],
            [
                'id'    => 106,
                'title' => 'testimony_access',
            ],
            [
                'id'    => 107,
                'title' => 'featured_donation_access',
            ],
            [
                'id'    => 108,
                'title' => 'action_create',
            ],
            [
                'id'    => 109,
                'title' => 'action_edit',
            ],
            [
                'id'    => 110,
                'title' => 'action_show',
            ],
            [
                'id'    => 111,
                'title' => 'action_delete',
            ],
            [
                'id'    => 112,
                'title' => 'action_access',
            ],
            [
                'id'    => 113,
                'title' => 'action_address_create',
            ],
            [
                'id'    => 114,
                'title' => 'action_address_edit',
            ],
            [
                'id'    => 115,
                'title' => 'action_address_show',
            ],
            [
                'id'    => 116,
                'title' => 'action_address_delete',
            ],
            [
                'id'    => 117,
                'title' => 'action_address_access',
            ],
            [
                'id'    => 118,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
