# XAMPP Setup Guide for Laravel Enterprise CMS 🚀

This guide will help you set up the Laravel Enterprise CMS on XAMPP for local development.

## 📋 Prerequisites

- **XAMPP 8.1+** with PHP 8.1 or higher
- **Composer** installed globally
- **Node.js 16+** and npm

## 🔧 XAMPP Configuration

### 1. PHP Configuration (php.ini)

Open `xampp/php/php.ini` and ensure these settings:

```ini
; Basic PHP Settings
max_execution_time = 300
max_input_time = 300
memory_limit = 512M
post_max_size = 100M
upload_max_filesize = 100M
max_file_uploads = 20

; Required Extensions
extension=curl
extension=fileinfo
extension=gd
extension=intl
extension=mbstring
extension=openssl
extension=pdo_mysql
extension=tokenizer
extension=xml
extension=zip

; Arabic Language Support
default_charset = "UTF-8"
```

### 2. Apache Configuration

In `xampp/apache/conf/httpd.conf`, ensure:

```apache
# Enable mod_rewrite for Laravel
LoadModule rewrite_module modules/mod_rewrite.so

# Directory permissions for Laravel
<Directory "C:/xampp/htdocs">
    AllowOverride All
    Require all granted
</Directory>
```

### 3. MySQL Configuration

In `xampp/mysql/bin/my.ini`:

```ini
[mysql]
default-character-set = utf8mb4

[mysqld]
character-set-server = utf8mb4
collation-server = utf8mb4_unicode_ci
sql_mode = ""
```

## 🚀 Installation Steps

### Step 1: Clone the Project

```bash
cd C:\xampp\htdocs
git clone https://github.com/bgside/laravel-enterprise-cms.git
cd laravel-enterprise-cms
```

### Step 2: Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### Step 3: Environment Setup

```bash
# Copy environment file
copy .env.example .env

# Generate application key
php artisan key:generate

# Create storage link
php artisan storage:link
```

### Step 4: Database Setup

1. **Start XAMPP** and ensure MySQL is running
2. **Open phpMyAdmin** (http://localhost/phpmyadmin)
3. **Create database**:
   ```sql
   CREATE DATABASE enterprise_cms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

4. **Update .env file**:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=enterprise_cms
   DB_USERNAME=root
   DB_PASSWORD=
   ```

### Step 5: Run Migrations

```bash
# Run database migrations with sample data
php artisan migrate:fresh --seed
```

### Step 6: Build Frontend Assets

```bash
# Build CSS and JavaScript
npm run build

# Or for development with watch
npm run dev
```

### Step 7: Set Directory Permissions

Ensure these directories are writable:
- `storage/`
- `bootstrap/cache/`
- `public/storage/`

## 🌐 Access the Application

- **Frontend**: http://localhost/laravel-enterprise-cms/public
- **Admin Panel**: http://localhost/laravel-enterprise-cms/public/admin
- **API Documentation**: http://localhost/laravel-enterprise-cms/public/api/docs

### Default Admin Credentials

- **Email**: admin@enterprise-cms.local
- **Password**: admin123
- **Language**: English / العربية

## 🛠️ Development Commands

### Useful Artisan Commands

```bash
# Clear all caches
php artisan optimize:clear

# Seed database with sample data
php artisan db:seed

# Create new admin user
php artisan make:user --admin

# Generate API documentation
php artisan api:generate

# Run queue workers (if needed)
php artisan queue:work

# Clear logs
php artisan log:clear
```

### Frontend Development

```bash
# Start development server with hot reload
npm run dev

# Build for production
npm run build

# Run tests
npm run test

# Lint code
npm run lint
```

## 🌍 Arabic Language Setup

### Enable Arabic Language

1. **Update .env**:
   ```env
   APP_LOCALE=ar
   SUPPORTED_LOCALES=en,ar
   ```

2. **Publish language files**:
   ```bash
   php artisan lang:publish
   ```

3. **Clear config cache**:
   ```bash
   php artisan config:clear
   ```

### RTL Support

The CMS automatically detects Arabic locale and applies RTL layout.

## 🔧 Troubleshooting

### Common Issues

1. **Composer Memory Issues**:
   ```bash
   php -d memory_limit=-1 composer install
   ```

2. **Permission Errors**:
   ```bash
   # Windows (Run as Administrator)
   icacls storage /grant Users:F /t
   icacls bootstrap\cache /grant Users:F /t
   ```

3. **Database Connection Error**:
   - Ensure MySQL is running in XAMPP
   - Check database credentials in `.env`
   - Verify database exists in phpMyAdmin

4. **404 Errors**:
   - Ensure mod_rewrite is enabled
   - Check `.htaccess` file exists in `public/`

### Performance Optimization for XAMPP

```bash
# Optimize Laravel for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Clear optimization (for development)
php artisan optimize:clear
```

## 📊 File Structure

```
laravel-enterprise-cms/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Services/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   └── index.php
├── resources/
│   ├── js/
│   ├── css/
│   └── views/
└── storage/
```

## 🔒 Security Notes

For XAMPP development:

1. **Change default passwords** in production
2. **Disable debug mode** (`APP_DEBUG=false`) in production
3. **Use HTTPS** in production environments
4. **Regular backups** of database and files

## 📞 Support

If you encounter issues:

1. **Check logs**: `storage/logs/laravel.log`
2. **Enable debug mode**: Set `APP_DEBUG=true` in `.env`
3. **Clear caches**: Run `php artisan optimize:clear`

For additional help, check the main [README.md](README.md) file.

---

**Happy Coding! 🎉**