# AGENTS.md

Laravel 9 footwear e-commerce app: Laravel UI auth, security-question password reset, Paystack checkout, and an admin panel. `README.md` is the stock Laravel readme; use `routes/web.php` and this file as the real project guide.

## Commands

- Setup: `composer install`; create `.env` (`copy .env.example .env`), create the MySQL database named in `DB_DATABASE` (`ecommerce_site`), then `php artisan key:generate` and `php artisan migrate`.
- Dev server: `php artisan serve`.
- Route check: `php artisan route:list --except-vendor`.
- Single test: `php artisan test tests/Feature/Auth/AuthenticationTest.php --filter=test_login_screen_can_be_rendered`.
- Format PHP: `php vendor/bin/pint`.
- `npm run build` is only needed for unused Breeze/Vite scaffolding; live pages load CSS/JS directly from `public/assets` and `public/css`.

## Tests hit the real database

- `phpunit.xml` leaves the SQLite override commented out, so tests use the `.env` MySQL database (`ecommerce_site`). Any test using `RefreshDatabase` drops and recreates that database's tables. Point `DB_DATABASE` at a dedicated test DB before running the suite.
- Known stale failures (not app regressions): the Breeze-era auth tests request unregistered routes (`/forgot-password`, `/reset-password/{token}`, `/confirm-password`, `/verify-email`), and `RegistrationTest::test_new_users_can_register` omits the required `security_ques` field.
- `UserFactory` does not define the non-null `security_ques` column, so factory-created users fail unless the factory is updated.
- Reliable smoke tests: login and registration screen-render tests.

## Auth and routes

- Active auth is `Auth::routes()` (Laravel UI) plus custom `GET /password/forget` and `POST /password/new` in `routes/web.php`.
- Password reset verifies a user-supplied `security_ques` answer, not an emailed token. Registration requires `security_ques`.
- Breeze-style files are dead code: `Auth/RegisteredUserController`, `NewPasswordController`, `PasswordResetLinkController`, `ConfirmablePasswordController`, and `resources/views/auth/{forgot-password,reset-password,confirm-password,verify-email}.blade.php` (the `<x-guest-layout>` views). Editing them has no effect.
- Admin auth is separate: `GET/POST /admin/login`, requires `role === 'admin'`, enforced by `AdminMiddleware`. Admin pages extend `layouts.app`.

## Frontend

- Two stacks coexist. Live storefront and admin pages use legacy Colorlib/Ace assets from `public/assets` plus custom `public/css/*.css`; Vite, Tailwind, npm Bootstrap, and `layouts/guest.blade.php` belong to unused Breeze scaffolding.
- Auth/profile pages (`auth/login`, `auth/register`, `auth/for_pass`, `edit_profile`) are standalone Blade documents loading `public/css/reg_log.css`. Use `{{ asset('css/reg_log.css') }}` instead of a relative path: relative URLs break on nested routes like `/password/forget`.
- `layouts/app.blade.php` is the shared storefront/admin layout; several pages use inline `<style>` blocks rather than external CSS.

## Implementation notes

- Active footwear model is `App\Models\Footwears` (plural); `App\Models\Footwear` is an unused duplicate.
- Category strings must stay exact: `Male Shoe`, `Female Shoe`, `Casual Wear`, `Sandal`.
- `GET /checkout` is defined twice; the later `showcheckout` route is active and supplies `$user`/`$sum`. Editing only `CheckoutController::CheckoutForm()` has no effect.
- Paystack public key is hardcoded in `checkoutForm.blade.php`; server verification needs `PAYSTACK_SECRET_KEY` in `.env` (missing in the current env).
- `DatabaseSeeder::run()` only runs `FootwearsSeeder`. Create the admin account explicitly with `php artisan db:seed --class=AdminUserSeeder`.
- Entrypoints: web `public/index.php`; Vercel routes everything through `api/index.php`; Docker serves Apache with `public/` as DocumentRoot.
