Browser
  ↓
public/index.php
  ↓
bootstrap/app.php
  ↓
App\Http\Kernel.php
  ↓
Global Middleware
  ↓
Route Middleware
  ↓
routes/web.php or routes/api.php
  ↓
Controller
  ↓
Model (Eloquent)
  ↓
Database
  ↑
Response
  ↑
Middleware (after)
  ↑
Browser


Laravel Request Lifecycle (File by File)
Step File / Class What Happens
1 public/index.php                   Entry point. Loads Composer autoload and bootstraps Laravel.
2 bootstrap/app.php                  Creates Application instance and binds kernel.
3 app/Http/Kernel.php                Handles HTTP request and runs middleware stack.
4 app/Http/Middleware/*              Request filtering (auth, CSRF, etc.).
5 routes/web.php / api.php           Route matching happens here.
6 app/Http/Controllers/*             Controller method executes business logic.
7 app/Models/*                       Eloquent interacts with database.
8 resources/views/*                  Blade renders HTML (web routes).
9 Response                           Response object created.
10 Middleware (Response)             Response passes back through middleware.
11 Browser                           Final response sent to user.





Browser
 ↓
public/index.php
 ↓
bootstrap/app.php
 ↓
Service Providers (register & boot)
 ↓
Service Container (resolve dependencies)
 ↓
Request → Controller → Response
