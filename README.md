# Zaylora — Premium Cardamom Website

A product showcase website for **Zaylora**, a premium cardamom brand. Built with Laravel 12, Livewire v4, and Tailwind CSS v4.

---

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 12 (PHP 8.2+) |
| Reactivity | Livewire v4 |
| Styling | Tailwind CSS v4 + Vite |
| Database | MySQL (or SQLite for local dev) |
| Auth | Laravel built-in (`Auth::attempt`) |
| File storage | Laravel Storage (local `public` disk) |

---

## Features

### Frontend
- **Homepage** (`/`) — hero section with dynamic banner, product grid
- **About Us** (`/about`) — brand story, Why Choose Us, Spice Processing steps, product grid

### Admin Panel (`/admin`)
- Protected by Laravel auth (login required)
- **Products** — create, edit, delete products with image upload
- **Site Settings** — upload / replace / remove site logo and banner image

### Dynamic theming
- Logo uploaded in admin replaces the text logo in the navbar and footer
- Banner uploaded in admin replaces the hero image on the homepage and About Us page

---

## Project Structure

```
app/
├── Http/Controllers/
│   └── AdminAuthController.php      # Handles admin logout
├── Livewire/
│   ├── Products.php                 # Homepage product grid
│   └── Admin/
│       ├── Login.php                # Admin login form
│       ├── ProductList.php          # Product table with delete
│       ├── ProductForm.php          # Create / edit product + image upload
│       └── SiteSettings.php        # Logo & banner upload
├── Models/
│   ├── Product.php
│   ├── SiteSetting.php              # Singleton settings model
│   └── User.php
└── Providers/
    └── AppServiceProvider.php       # Injects $settings into all views via View Composer

resources/views/
├── layouts/
│   └── app.blade.php                # Shared frontend layout (navbar + footer)
├── welcome.blade.php                # Homepage
├── about.blade.php                  # About Us page
├── admin/
│   ├── layout.blade.php             # Admin panel layout (sidebar)
│   ├── login.blade.php
│   ├── products.blade.php
│   ├── product-form.blade.php
│   └── site-settings.blade.php
└── livewire/
    ├── products.blade.php
    └── admin/
        ├── login.blade.php
        ├── product-list.blade.php
        ├── product-form.blade.php
        └── site-settings.blade.php
```

---

## Local Setup

### 1. Clone and install dependencies

```bash
git clone <repo-url> zaylora
cd zaylora
composer install
npm install
```

### 2. Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=zaylora
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Database

```bash
php artisan migrate
```

### 4. Create admin user

```bash
php artisan tinker
```
```php
\App\Models\User::create([
    'name'     => 'Admin',
    'email'    => 'admin@zaylora.com',
    'password' => bcrypt('your-password'),
]);
```

### 5. Storage symlink

```bash
php artisan storage:link
```

### 6. Build assets and run

```bash
npm run dev
php artisan serve
```

Or use the built-in concurrent dev runner (serves, queue, logs, and vite together):

```bash
composer run dev
```

Visit `http://localhost:8000`

---

## Admin Panel

| URL | Description |
|---|---|
| `/admin/login` | Login page |
| `/admin/products` | Product list |
| `/admin/products/create` | Add new product |
| `/admin/products/{id}/edit` | Edit product |
| `/admin/settings` | Upload logo & banner |

---

## Database Schema

### `products`
| Column | Type | Notes |
|---|---|---|
| `id` | bigint | Primary key |
| `name` | string | Required |
| `image` | string | Nullable, path in `storage/products/` |
| `phone` | string | Nullable, used for Call button |
| `whatsapp` | string | Nullable, used for WhatsApp button |

### `site_settings`
| Column | Type | Notes |
|---|---|---|
| `id` | bigint | Always one row |
| `logo` | string | Nullable, path in `storage/settings/` |
| `banner` | string | Nullable, path in `storage/settings/` |

---

## Deployment

```bash
# On the production server
composer install --no-dev --optimize-autoloader
npm install && npm run build
cp .env.example .env        # then fill in real values
php artisan key:generate
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

**Required `.env` changes for production:**

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

**Storage permissions:**

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

---

## Notes

- **Filament not used** — Filament v3 requires Livewire `^3.5` which conflicts with this project's Livewire v4. The admin panel is built with custom Livewire v4 components instead.
- **`SiteSetting` singleton** — `SiteSetting::instance()` uses `firstOrCreate([])` so there is always exactly one row. No configuration needed after migration.
- **Global `$settings`** — Injected into every view automatically via a View Composer in `AppServiceProvider`, so it is available in all layouts, pages, and Livewire views without manual passing.
