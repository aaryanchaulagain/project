<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;


/*
|-----------------------------------
| Public Pages
|-----------------------------------
*/
$publicPages = [
    '/' => [
        'name' => 'home',
        'title' => 'Integrated advice for every stage',
        'eyebrow' => 'Welcome',
        'summary' => 'Explore accounting, advisory, financial planning, investment, and retirement support from one coordinated team.',
        'layout' => 'layouts.site',
        'brandName' => 'Advisory Group',
        'brandTagline' => 'Business and wealth advice, connected.',
        'cards' => [
            [
                'title' => 'Associates',
                'description' => 'Tax lodgement, accounting, and business advisory services for individuals and organisations.',
                'href' => '/associates',
            ],
            [
                'title' => 'Wealth',
                'description' => 'Financial planning, investment, and retirement guidance built around long-term goals.',
                'href' => '/wealth',
            ],
        ],
    ],
    '/about' => [
        'name' => 'about',
        'title' => 'About our advisory team',
        'eyebrow' => 'About',
        'summary' => 'We bring together specialists across tax, accounting, business strategy, and wealth advice so clients receive joined-up support.',
        'layout' => 'layouts.site',
        'brandName' => 'Advisory Group',
        'brandTagline' => 'Business and wealth advice, connected.',
        'cards' => [
            [
                'title' => 'Practical guidance',
                'description' => 'Advice is shaped around clear next steps, current obligations, and future plans.',
            ],
            [
                'title' => 'Connected expertise',
                'description' => 'Our brand streams work together when clients need support across multiple areas.',
            ],
        ],
    ],
    '/services' => [
        'name' => 'services',
        'title' => 'Services',
        'eyebrow' => 'What we do',
        'summary' => 'Choose a service stream below to find the right support for your tax, business, wealth, or retirement needs.',
        'layout' => 'layouts.site',
        'brandName' => 'Advisory Group',
        'brandTagline' => 'Business and wealth advice, connected.',
        'cards' => [
            [
                'title' => 'Tax and accounting',
                'description' => 'Compliance and reporting support through the Associates brand.',
                'href' => '/associates/accounting',
            ],
            [
                'title' => 'Business advisory',
                'description' => 'Planning, structure, and performance guidance for growing organisations.',
                'href' => '/associates/business-advisory',
            ],
            [
                'title' => 'Financial planning',
                'description' => 'Advice for wealth creation, protection, retirement, and future decisions.',
                'href' => '/wealth/financial-planning',
            ],
        ],
    ],
    '/contact' => [
        'name' => 'contact',
        'title' => 'Contact us',
        'eyebrow' => 'Start a conversation',
        'summary' => 'Tell us what you are working through and we will connect you with the right advisory team.',
        'layout' => 'layouts.site',
        'brandName' => 'Advisory Group',
        'brandTagline' => 'Business and wealth advice, connected.',
        'cards' => [
            [
                'title' => 'General enquiries',
                'description' => 'Use this page as the entry point for all brand and service enquiries.',
            ],
            [
                'title' => 'Specialist referrals',
                'description' => 'We can direct tax, business, investment, and retirement questions to the relevant team.',
            ],
        ],
    ],
];

foreach ($publicPages as $uri => $page) {
    Route::view($uri, 'pages.marketing', $page)->name('public.' . $page['name']);
}

Route::prefix('associates')->name('associates.')->group(function () {
    $associatePages = [
        '/' => [
            'name' => 'index',
            'title' => 'Associates',
            'eyebrow' => 'Tax and business advice',
            'summary' => 'Support for lodgements, accounting, reporting, and practical business advisory needs.',
            'layout' => 'layouts.associates',
            'brandName' => 'Associates',
            'brandTagline' => 'Tax, accounting, and business advisory.',
            'cards' => [
                [
                    'title' => 'Tax lodgement',
                    'description' => 'Clear support for individual, company, trust, and compliance lodgements.',
                    'href' => '/associates/tax-lodgement',
                ],
                [
                    'title' => 'Accounting',
                    'description' => 'Accounting services that keep records, reporting, and decisions aligned.',
                    'href' => '/associates/accounting',
                ],
                [
                    'title' => 'Business advisory',
                    'description' => 'Guidance for business structure, performance, and sustainable growth.',
                    'href' => '/associates/business-advisory',
                ],
            ],
        ],
        '/tax-lodgement' => [
            'name' => 'tax_lodgement',
            'title' => 'Tax lodgement',
            'eyebrow' => 'Associates',
            'summary' => 'Prepare and lodge tax obligations with a team focused on accuracy, clarity, and deadlines.',
            'layout' => 'layouts.associates',
            'brandName' => 'Associates',
            'brandTagline' => 'Tax, accounting, and business advisory.',
            'cards' => [
                [
                    'title' => 'Compliance support',
                    'description' => 'Coordinate records, documentation, and lodgement requirements.',
                ],
                [
                    'title' => 'Year-round guidance',
                    'description' => 'Plan ahead instead of treating tax as a once-a-year event.',
                ],
            ],
        ],
        '/accounting' => [
            'name' => 'accounting',
            'title' => 'Accounting',
            'eyebrow' => 'Associates',
            'summary' => 'Accounting services for reporting, visibility, and better operational decisions.',
            'layout' => 'layouts.associates',
            'brandName' => 'Associates',
            'brandTagline' => 'Tax, accounting, and business advisory.',
            'cards' => [
                [
                    'title' => 'Reliable reporting',
                    'description' => 'Keep financial information current, accurate, and decision-ready.',
                ],
                [
                    'title' => 'Practical systems',
                    'description' => 'Improve the way records, reconciliations, and reporting workflows operate.',
                ],
            ],
        ],
        '/business-advisory' => [
            'name' => 'business_advisory',
            'title' => 'Business advisory',
            'eyebrow' => 'Associates',
            'summary' => 'Advice for owners and leaders who need better structure, planning, and performance insight.',
            'layout' => 'layouts.associates',
            'brandName' => 'Associates',
            'brandTagline' => 'Tax, accounting, and business advisory.',
            'cards' => [
                [
                    'title' => 'Planning and structure',
                    'description' => 'Align business goals with operating models, reporting, and obligations.',
                ],
                [
                    'title' => 'Performance insight',
                    'description' => 'Use financial information to identify opportunities and risks sooner.',
                ],
            ],
        ],
    ];

    foreach ($associatePages as $uri => $page) {
        Route::view($uri, 'pages.marketing', $page)->name($page['name']);
    }
});

Route::prefix('wealth')->name('wealth.')->group(function () {
    $wealthPages = [
        '/' => [
            'name' => 'index',
            'title' => 'Wealth',
            'eyebrow' => 'Financial wellbeing',
            'summary' => 'Financial planning, investment, and retirement advice shaped around long-term outcomes.',
            'layout' => 'layouts.wealth',
            'brandName' => 'Wealth',
            'brandTagline' => 'Financial planning for the future.',
            'cards' => [
                [
                    'title' => 'Financial planning',
                    'description' => 'Personal advice that turns goals into structured financial decisions.',
                    'href' => '/wealth/financial-planning',
                ],
                [
                    'title' => 'Investment',
                    'description' => 'Investment guidance that balances risk, objectives, and time horizon.',
                    'href' => '/wealth/investment',
                ],
                [
                    'title' => 'Retirement',
                    'description' => 'Plan retirement income, superannuation, and lifestyle choices with confidence.',
                    'href' => '/wealth/retirement',
                ],
            ],
        ],
        '/financial-planning' => [
            'name' => 'financial_planning',
            'title' => 'Financial planning',
            'eyebrow' => 'Wealth',
            'summary' => 'Build a clear plan across income, protection, investments, superannuation, and future goals.',
            'layout' => 'layouts.wealth',
            'brandName' => 'Wealth',
            'brandTagline' => 'Financial planning for the future.',
            'cards' => [
                [
                    'title' => 'Goal-based advice',
                    'description' => 'Translate personal priorities into financial actions and review points.',
                ],
                [
                    'title' => 'Coordinated decisions',
                    'description' => 'Connect planning decisions with tax, business, and retirement considerations.',
                ],
            ],
        ],
        '/investment' => [
            'name' => 'investment',
            'title' => 'Investment',
            'eyebrow' => 'Wealth',
            'summary' => 'Investment advice that considers objectives, risk tolerance, diversification, and time horizon.',
            'layout' => 'layouts.wealth',
            'brandName' => 'Wealth',
            'brandTagline' => 'Financial planning for the future.',
            'cards' => [
                [
                    'title' => 'Portfolio guidance',
                    'description' => 'Structure investments around risk, return, liquidity, and purpose.',
                ],
                [
                    'title' => 'Review discipline',
                    'description' => 'Monitor strategy as markets, circumstances, and objectives change.',
                ],
            ],
        ],
        '/retirement' => [
            'name' => 'retirement',
            'title' => 'Retirement',
            'eyebrow' => 'Wealth',
            'summary' => 'Retirement planning support for superannuation, income strategy, and lifestyle confidence.',
            'layout' => 'layouts.wealth',
            'brandName' => 'Wealth',
            'brandTagline' => 'Financial planning for the future.',
            'cards' => [
                [
                    'title' => 'Income strategy',
                    'description' => 'Plan how retirement income may be drawn, reviewed, and sustained.',
                ],
                [
                    'title' => 'Transition planning',
                    'description' => 'Prepare for retirement decisions before and after leaving full-time work.',
                ],
            ],
        ],
    ];

    foreach ($wealthPages as $uri => $page) {
        Route::view($uri, 'pages.marketing', $page)->name($page['name']);
    }
});

Route::get('/dog', [RoomController::class, 'servicePage'])->name('service.rooms');

Route::view('/login', 'pages.log')->name('login');
Route::view('/register', 'pages.register')->name('register');

/*
|-----------------------------------
| Registration
|-----------------------------------
*/
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');

/*
|-----------------------------------
| Login
|-----------------------------------
*/
Route::post('/login', [SigninController::class, 'signin'])->name('user.signin');
Route::post('/logout', [SigninController::class, 'logout'])->name('logout');

/*
|-----------------------------------
| Protected Dashboards
|-----------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('/owner/dashboard', function() {
    return view('owner.dashboard');
     })->name('owner.dashboard');
     Route::get('/tenant/dashboard', function() { return 'Tenant Dashboard'; })->name('tenant.dashboard');
});

Route::middleware(['auth'])->group(function () {

    // Owner room upload
    Route::get('/owner/room/create', [RoomController::class, 'create'])->name('owner.room.create');
    Route::post('/owner/room/store', [RoomController::class, 'store'])->name('owner.room.store');

    // Owner view rooms
    Route::get('/owner/rooms', [RoomController::class, 'index'])->name('owner.room.index');

    //room status
    Route::get('/owner/rooms/status', [RoomController::class, 'status'])->name('owner.room.status');

    // Edit room
    Route::get('/owner/room/{id}/edit', [RoomController::class, 'edit'])->name('owner.room.edit');
    Route::put('/owner/room/{id}', [RoomController::class, 'update'])->name('owner.room.update');

        // Delete room
    Route::delete('/owner/room/{id}', [RoomController::class, 'destroy'])->name('owner.room.destroy');

});
/*
|-----------------------------------
| admin Dashboards
|-----------------------------------
*/


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::post('/admin/room/{id}/approve', [AdminController::class, 'approveRoom'])
        ->name('admin.room.approve');

    Route::delete('/admin/room/{id}', [AdminController::class, 'deleteRoom'])
        ->name('admin.room.delete');
});

