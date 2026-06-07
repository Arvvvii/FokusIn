<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    
    // ✅ Tambahkan langsung URL lokal dan Vercel di array ini agar juri/tim tidak terkena CORS
    'allowed_origins' => [
        'http://localhost:5173', 
        'https://fokus-in-fmas.vercel.app',
        'https://fokusin.vercel.app'
    ],
    
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 86400, // ✅ Optimasi: Cache preflight selama 24 jam biar performa API di lomba lebih cepat
    'supports_credentials' => true,
];