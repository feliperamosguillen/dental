<?php

return [

    /*
    |--------------------------------------------------------------------------
    | English Application App Specific Resources
    |--------------------------------------------------------------------------
    */

    'article' => [
        'create' => 'Create article',
        'edit'   => 'Edit article',
        'fields' => [
            'category_id'  => 'Category',
            'content'      => 'Content',
            'description'  => 'Description',
            'published_at' => 'Published At',
            'title'        => 'Article Title'
        ],
        'index'  => 'Articles',
        'show'   => 'Show article'
    ],
    'category' => [
        'create' => 'Create category',
        'edit'   => 'Edit category',
        'fields' => [
            'article_count' => 'Article Count',
            'description'   => 'Description',
            'title'         => 'Category Title'
        ],
        'index'  => 'Categories',
        'show'   => 'Show category'
    ],
    'dashboard' => [
        'fields' => [
            'alexa_local'     => 'Alexa Local',
            'alexa_world'     => 'Alexa World',
            'average_time'    => 'Average Time',
            'bounce_rate'     => 'Bounce Rate',
            'browsers'        => 'Browsers',
            'chart_country'   => 'Country',
            'chart_region'    => 'Region',
            'chart_visitors'  => 'Visitors',
            'entrance_pages'  => 'Entrance',
            'exit_pages'      => 'Exit',
            'keywords'        => 'Keywords',
            'os'              => 'OS',
            'page_visits'     => 'Page Visits',
            'pages'           => 'Pages',
            'region_visitors' => 'Region Visitors',
            'time_pages'      => 'Time',
            'total_visits'    => 'Total Visits',
            'traffic_sources' => 'Traffic Sources',
            'unique_visits'   => 'Unique Visits',
            'visitors'        => 'Visitors',
            'visits'          => 'Visits',
            'visits_today'    => 'Visits Today',
            'world_visitors'  => 'World Visitor Distribution'
        ],
        'index' => 'Dashboard'
    ],
    'elfinder' => [
        'index' => 'File Manager',
    ],
    'page' => [
        'create' => 'Create page',
        'edit'   => 'Edit page',
        'fields' => [
            'content'      => 'Content',
            'description'  => 'Description',
            'parent_id'    => 'Parent',
            'title'        => 'Title',
        ],
        'index'  => 'Pages',
        'show'   => 'Show page'
    ],
    'parent' => [
        'fields' => [
            'title' => 'Parent Page',
        ]
    ],
    'user' => [
        'create' => 'Create user',
        'edit'   => 'Edit user',
        'fields' => [
            'email'                 => 'Email',
            'ip_address'            => 'IP',
            'logged_in_at'          => 'Login At',
            'logged_out_at'         => 'Logout At',
            'password'              => 'Password',
            'password_confirmation' => 'Password Confirm'
        ],
        'index'  => 'Users',
        'show'   => 'Show user'
    ],
    'patient' => [
        'create' => 'Create a Patient',
        'edit'   => 'Edit a Patient',
        'fields' => [
            'content'     => 'Content',
            'description' => 'Description',
            'title'       => 'Title',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'ages' => 'Age',
            'picture' => 'Picture',
        ],
        'index'  => 'Patients',
        'show'   => 'Show a Patient'
    ],
    'doctor' => [
        'create' => 'Create a Doctor',
        'edit'   => 'Edit a Doctor',
        'fields' => [
          'content'     => 'Content',
          'description' => 'Description',
          'title'       => 'Title',
          'name' => 'Name',
          'speciality' => 'Speciality',
          'picture' => 'Picture'
        ],
        'index'  => 'Doctors',
        'show'   => 'Show a Doctor'
    ],
    'schedule' => [
        'create' => 'Create a Schedule',
        'edit'   => 'Edit a Schedule',
        'fields' => [
          'content'     => 'Content',
          'description' => 'Description',
          'title'       => 'Title',
          'doctor' => 'Doctor',
          'patient' => 'Patient',
          'selected_datetime' => 'Date and time',
          'selected_date' => 'Date',
          'selected_hour' => 'Time',
          'doctor_id' => 'Doctor',
          'patient_id' => 'Patient',
          'id' => 'ID',
          'doctor' => [
            'name' => 'Doctor Name'
          ],
          'patient' => [
            'name' => 'Patient Name',
            'lastname' => 'Patient Lastname',
            'ages' => 'Age'
          ]
        ],
        'index'  => 'Schedules',
        'show'   => 'Show a Schedule'
    ]
];
