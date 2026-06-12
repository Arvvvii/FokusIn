<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

foreach ([3, 4, 5] as $id) {
    Auth::loginUsingId($id);
    $c = new DashboardController();
    echo "ID " . $id . " Dashboard:\n";
    echo $c->studentDashboard()->getContent() . "\n";
    echo "ID " . $id . " AI Insights:\n";
    echo $c->aiInsights()->getContent() . "\n\n";
}
