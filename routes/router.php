<?php

use App\Models\AttributesValues;
use App\Models\Products;
use App\Models\Status;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class Router
{
  const components = [
    'catalogo' => [
      'component' => 'Catalogo.jsx',
      'adminto-instance' => true,
      'compact' => [
        'minPrice' => [
          'query' => Products::min('descuento'),
        ],
        'maxPrice' => [
          'query' => Products::max('descuento'),
        ],
        'brands' => [
          'class' => AttributesValues::class,
          'filter' => [
            'attribute_id' => 1,
            'status' => true
          ]
        ],
        'colors' => [
          'class' => AttributesValues::class,
          'filter' => [
            'attribute_id' => 2,
            'status' => true
          ]
        ],
        'sizes' => [
          'class' => AttributesValues::class,
          'filter' => [
            'attribute_id' => 3,
            'status' => true
          ]
        ]
      ]
    ],
    'ofertas' => [
      'component' => 'Ofertas.jsx',
      'adminto-instance' => true,
      'compact' => [
        'minPrice' => [
          'query' => Products::min('descuento'),
        ],
        'maxPrice' => [
          'query' => Products::max('descuento'),
        ],
        'brands' => [
          'class' => AttributesValues::class,
          'filter' => [
            'attribute_id' => 1,
            'status' => true
          ]
        ],
        'colors' => [
          'class' => AttributesValues::class,
          'filter' => [
            'attribute_id' => 2,
            'status' => true
          ]
        ],
        'sizes' => [
          'class' => AttributesValues::class,
          'filter' => [
            'attribute_id' => 3,
            'status' => true
          ]
        ]
      ]
    ],
    // 'home' => [
    //   'component' => 'Home.jsx',
    //   'adminto-instance' => true
    // ],
    // 'clients' => [
    //   'component' => 'Clients.jsx',
    //   'adminto-instance' => true,
    //   'compact' => [
    //     'statuses' => [
    //       'class' => Status::class,
    //       'filter' => [
    //         'table_id' => 1, // Projects
    //         'status' => true
    //       ]
    //     ]
    //   ]
    // ],
    // 'projects' => [
    //   'component' => 'Projects.jsx',
    //   'adminto-instance' => true,
    //   'compact' => [
    //     'statuses' => [
    //       'class' => Status::class,
    //       'filter' => [
    //         'table_id' => 1, // Projects
    //         'status' => true
    //       ]
    //     ]
    //   ]
    // ],
    // 'leads' => [
    //   'component' => 'Leads.jsx',
    //   'adminto-instance' => true,
    //   'compact' => [
    //     'statuses' => [
    //       'class' => Status::class,
    //       'filter' => [
    //         'table_id' => 2, // Leads
    //         'status' => true
    //       ]
    //     ]
    //   ]
    // ],
    // 'types' => [
    //   'component' => 'Types.jsx',
    //   'adminto-instance' => true
    // ],
    // 'tables' => [
    //   'component' => 'Tables.jsx',
    //   'adminto-instance' => true
    // ],
    // 'statuses' => [
    //   'component' => 'Statuses.jsx',
    //   'adminto-instance' => true
    // ],
    // 'users' => [
    //   'component' => 'Users.jsx',
    //   'adminto-instance' => true
    // ],
    // 'roles' => [
    //   'component' => 'Roles.jsx',
    //   'adminto-instance' => true,
    //   'compact' => [
    //     'permissions' => [
    //       'class' => Permission::class,
    //       'select' => ['id', 'name', 'description']
    //     ]
    //   ]
    // ],
    // 'permissions' => [
    //   'component' => 'Permissions.jsx',
    //   'adminto-instance' => true
    // ],
    // 'profile' => [
    //   'component' => 'Profile.jsx',
    //   'adminto-instance' => true
    // ],
    // 'account' => [
    //   'component' => 'Account.jsx',
    //   'adminto-instance' => true
    // ],
    // 'settings' => [
    //   'component' => 'Settings.jsx',
    //   'adminto-instance' => true
    // ],
  ];
}
