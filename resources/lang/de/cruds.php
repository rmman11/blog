<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'username'                 => 'Username',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],




 'customers' =>[

   'title'          => 'Customers',
   'title_singular' => 'Customers',
   'fields'         => [
       'id'                => 'id',
       'id_helper'         => '',
       'fname'              => 'First Name',
       'lname'              => 'Last Name',
        'age'              =>'Age',
       'name_helper'       => '',
       'email'             => 'Email',
       'email_helper'      => '',
       'price_helper'      => '',
       'created_at'        => 'Created at',
       'created_at_helper' => '',
       'updated_at'        => 'Updated at',
       'updated_at_helper' => '',
       'deleted_at'        => 'Deleted at',
       'deleted_at_helper' => '',


 ],
],


'categ'           => [
    'title'          => 'Category',
    'title_singular' => 'Categories',
    'fields'         => [
        'id'                       => 'ID',
        'id_helper'                => '',
        'name'                     => 'Name',
        'created_at'               => 'Created at',
        'created_at_helper'        => '',
        'updated_at'               => 'Updated at',
        'updated_at_helper'        => '',
        'deleted_at'               => 'Deleted at',
        'deleted_at_helper'        => '',
    ],
],



    'product'        => [
        'title'          => 'Products',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'categorie'         => 'Categorie',
            'details'           => 'Details',
            'quantity'         =>  'Quantity',
            'pictures'          =>  'Pictures',
            'weight'           =>  'weight',
            'stock number'     => 'stock number',
            'name_helper'       => '',
            'price'             => 'Price',
            'description'       => 'Description',
            'price_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],




    'order'          => [
        'title'          => 'Orders',
        'title_singular' => 'Order',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'customer_name'         => 'Customer Name',
            'customer_name_helper'  => '',
            'customer_email'        => 'Customer Email',
            'customer_email_helper' => '',
            'products'              => 'Products',
            'products_helper'       => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
        ],
    ],


      'venue'          => [
        'title'          => 'Venues',
        'title_singular' => 'Venue',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'address'           => 'Address',
            'address_helper'    => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],

    'event'          => [
        'title'          => 'Events',
        'title_singular' => 'Event',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'start_time'        => 'Start Time',
            'start_time_helper' => '',
            'venue'             => 'Venue',
            'venue_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    
    'meeting'        => [
        'title'          => 'Meetings',
        'title_singular' => 'Meeting',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'attendees'         => 'Attendees',
            'attendees_helper'  => '',
            'start_time'        => 'Start Time',
            'start_time_helper' => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
];
