<?php
return [
  'paths' => ['api/*', 'login/google', 'sanctum/csrf-cookie', 'localhost'],
  'allowed_methods' => ['*'],
  'allowed_origins' => [env('APP_FE_URL'), '*'],
  'allowed_origins_patterns' => [],
  'allowed_headers' => ['*'],
  'exposed_headers' => [],
  'max_age' => 0,
  'supports_credentials' => true,
];
