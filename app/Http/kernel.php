protected $middlewareGroups = [
'web' => [
// Middleware lainnya
],

'api' => [
'throttle:api',
\Illuminate\Routing\Middleware\SubstituteBindings::class,
\App\Http\Middleware\CorsMiddleware::class,
],
];