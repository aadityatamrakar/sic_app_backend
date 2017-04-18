<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'dealers' => [		'title' => 'Dealers',		'created_at' => 'Time',		'fields' => [			'shop-name' => 'Shop name',			'first-name' => 'First name',			'last-name' => 'Last name',			'mobile' => 'Mobile',			'phone' => 'Phone',			'city' => 'City',			'password' => 'Password',		],	],
		'calls' => [		'title' => 'Calls',		'created_at' => 'Time',		'fields' => [			'type' => 'Type',			'brand' => 'Brand',			'product' => 'Product',			'model' => 'Model',			'serial-no' => 'Serial no',			'customer-name' => 'Customer name',			'customer-mobile' => 'Customer mobile',			'customer-phone' => 'Customer phone',			'customer-address' => 'Customer address',			'complain' => 'Complain',			'remarks' => 'Remarks',			'bill' => 'Bill',			'dealer' => 'Dealer',		],	],
	'custom_controller_index' => 'Персонализиран контролер.',
	'quickadmin_title' => 'Sagar IceCream',
];