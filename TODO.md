# Task: Create login APIs with todos CRUD

## Steps from approved plan (Laravel + Sanctum for API auth):

- [x] 1. Install Laravel Sanctum (`composer require laravel/sanctum`)
- [x] 2. Publish Sanctum config/migration (`php artisan vendor:publish --provider="Laravel\\Sanctum\\SanctumServiceProvider"`)
- [x] 3. Run migrations (`php artisan migrate`)
- [x] 4. Generate Todo migration (`php artisan make:migration create_todos_table`)\n- [x] 5. Edit Todo migration (add fields: title, description, completed, user_id FK)
- [x] 6. Generate Todo model (`php artisan make:model Todo`)\n- [x] 7. Edit Todo model (fillable, casts, belongsTo User)\n- [x] 8. Update User model (add hasMany Todos)
- [x] 9. Create `routes/api.php`\n- [x] 10. Create `app/Http/Controllers/AuthController.php` (login, register, logout)\n- [x] 11. Create `app/Http/Controllers/TodoController.php` (CRUD for authenticated user)
- [x] 12. Edit `config/auth.php` (add 'api' => ['driver' => 'sanctum', ...])\n- [x] 13. Edit `bootstrap/providers.php` (add Sanctum to API middleware group)
- [x] 14. Test APIs (login, create/fetch todos with token)

Current progress: Starting step 1.

**Next action:** Install Sanctum."

