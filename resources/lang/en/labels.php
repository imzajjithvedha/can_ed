<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all' => 'All',
        'yes' => 'Yes',
        'no' => 'No',
        'copyright' => 'Copyright',
        'custom' => 'Custom',
        'actions' => 'Actions',
        'active' => 'Active',
        'buttons' => [
            'save' => 'Save',
            'update' => 'Update',
        ],
        'hide' => 'Hide',
        'inactive' => 'Inactive',
        'none' => 'None',
        'show' => 'Show',
        'toggle_navigation' => 'Toggle navigation',
        'create_new' => 'Create new',
        'toolbar_btn_groups' => 'Toolbar with button groups',
        'more' => 'More',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Create role',
                'edit' => 'Edit role',
                'management' => 'Role management',

                'table' => [
                    'number_of_users' => 'Number of users',
                    'permissions' => 'Permissions',
                    'role' => 'Role',
                    'sort' => 'Sort',
                    'total' => 'role total|roles total',
                ],
            ],

            'users' => [
                'active' => 'Active users',
                'all_permissions' => 'All permissions',
                'change_password' => 'Change password',
                'change_password_for' => 'Change password for :user',
                'create' => 'Create user',
                'deactivated' => 'Deactivated users',
                'deleted' => 'Deleted users',
                'edit' => 'Edit user',
                'management' => 'User management',
                'no_permissions' => 'No permissions',
                'no_roles' => 'No roles to set.',
                'permissions' => 'Permissions',
                'user_actions' => 'User actions',

                'table' => [
                    'confirmed' => 'Confirmed',
                    'created' => 'Created',
                    'email' => 'Email',
                    'id' => 'ID',
                    'last_updated' => 'Last updated',
                    'name' => 'Name',
                    'first_name' => 'First name',
                    'last_name' => 'Last name',
                    'no_deactivated' => 'No deactivated users',
                    'no_deleted' => 'No deleted users',
                    'other_permissions' => 'Other permissions',
                    'permissions' => 'Permissions',
                    'abilities' => 'Abilities',
                    'roles' => 'Roles',
                    'social' => 'Social',
                    'total' => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history' => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => 'Confirmed',
                            'created_at' => 'Created at',
                            'deleted_at' => 'Deleted at',
                            'email' => 'Email',
                            'last_login_at' => 'Last login At',
                            'last_login_ip' => 'Last login IP',
                            'last_updated' => 'Last updated',
                            'name' => 'Name',
                            'first_name' => 'First name',
                            'last_name' => 'Last name',
                            'status' => 'Status',
                            'timezone' => 'Timezone',
                        ],
                    ],
                ],

                'view' => 'View user',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'login_with' => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember me',
        ],

        'contact' => [
            'box_title' => 'Contact us',
            'button' => 'Send information',
        ],

        'passwords' => [
            'expired_password_box_title' => 'Your password has expired.',
            'forgot_password' => 'Forgot your password?',
            'reset_password_box_title' => 'Reset password',
            'reset_password_button' => 'Reset password',
            'update_password_button' => 'Update password',
            'send_password_reset_link_button' => 'Send password reset link',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change password',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Created at',
                'edit_information' => 'Edit information',
                'email' => 'Email',
                'last_updated' => 'Last updated',
                'name' => 'Name',
                'first_name' => 'First name',
                'last_name' => 'Last name',
                'update_information' => 'Update information',
            ],
        ],
    ],
];
