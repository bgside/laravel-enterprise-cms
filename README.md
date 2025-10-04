# Laravel Enterprise CMS 🏢

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat-square&logo=laravel)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?style=flat-square&logo=php)](https://php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat-square&logo=mysql)](https://mysql.com/)
[![Vue.js](https://img.shields.io/badge/Vue.js-3.0+-4FC08D?style=flat-square&logo=vue.js)](https://vuejs.org/)
[![Redis](https://img.shields.io/badge/Redis-7.0+-DC382D?style=flat-square&logo=redis)](https://redis.io/)

> **Enterprise Content Management System** - Modern, scalable CMS built with Laravel 11, featuring full Arabic/English bilingual support, advanced user management, and government-grade security for enterprise organizations.

---

## 🚀 **Features**

### **📝 Content Management**
- **Rich Text Editor**: Advanced WYSIWYG with Arabic/English support
- **Media Library**: Advanced file management with S3/local storage
- **Page Builder**: Drag-and-drop page construction
- **SEO Optimization**: Meta tags, sitemaps, and SEO analytics
- **Version Control**: Content versioning and rollback capabilities
- **Scheduled Publishing**: Time-based content publication

### **🌍 Multilingual Support**
- **Arabic & English**: Full RTL/LTR language support
- **Dynamic Translations**: Real-time language switching
- **Localized Content**: Language-specific content management
- **Translation Management**: Built-in translation interface
- **Unicode Support**: Full Arabic character set support
- **Date Formatting**: Hijri and Gregorian calendar support

### **👥 User Management**
- **Role-Based Access Control**: Granular permissions system
- **Multi-Factor Authentication**: SMS/Email 2FA support
- **Active Directory Integration**: LDAP/AD authentication
- **User Profiles**: Comprehensive user management
- **Activity Logging**: Full audit trail of user actions
- **Session Management**: Advanced session security

### **🏛️ Government Features**
- **Document Management**: Official document handling
- **Approval Workflows**: Multi-level content approval
- **Digital Signatures**: PKI-based document signing
- **Compliance Reporting**: Government audit trails
- **Access Logs**: Comprehensive activity monitoring
- **Data Protection**: GDPR/local privacy compliance

### **📊 Analytics & Reporting**
- **Usage Analytics**: Comprehensive site statistics
- **Content Performance**: Page view and engagement metrics
- **User Analytics**: User behavior and access patterns
- **Custom Reports**: Flexible reporting system
- **Export Capabilities**: PDF, Excel, CSV exports
- **Real-time Dashboard**: Live performance metrics

---

## 🏗️ **Architecture**

### **Backend (Laravel 11)**
- **MVC Architecture**: Clean separation of concerns
- **Service Layer**: Business logic abstraction
- **Repository Pattern**: Data access abstraction
- **Event-Driven**: Asynchronous processing
- **Queue System**: Background job processing
- **API-First Design**: RESTful API with GraphQL

### **Frontend (Vue.js 3)**
- **Component-Based**: Reusable UI components
- **State Management**: Pinia for global state
- **Real-time Updates**: WebSocket integration
- **Progressive Enhancement**: SEO-friendly rendering
- **Mobile Responsive**: Bootstrap 5 grid system
- **Accessibility**: WCAG 2.1 AA compliance

### **Database Design**
- **Multi-tenant**: Organization-based isolation
- **Optimized Queries**: Database indexing and optimization
- **Caching Layer**: Redis for performance
- **Backup Strategy**: Automated daily backups
- **Migration System**: Version-controlled schema changes
- **Soft Deletes**: Data recovery capabilities

---

## 🛠️ **Technology Stack**

### **Backend Development**
- **🐘 PHP 8.3+**: Modern PHP with type declarations
- **🌟 Laravel 11**: Latest framework features
- **📡 Laravel Sanctum**: API authentication
- **⚡ Laravel Octane**: High-performance application server
- **📋 Laravel Nova**: Administrative interface
- **🔄 Laravel Horizon**: Queue monitoring

### **Frontend Development**
- **💚 Vue.js 3**: Composition API and modern features
- **🎨 Tailwind CSS**: Utility-first CSS framework
- **📱 Alpine.js**: Lightweight reactive framework
- **⚡ Vite**: Fast build tool and development server
- **🌐 Inertia.js**: Modern monolithic SPA
- **📊 Chart.js**: Data visualization

### **Database & Storage**
- **🗄️ MySQL 8.0+**: Primary database
- **⚡ Redis 7.0+**: Caching and session storage
- **☁️ AWS S3**: File storage and CDN
- **🔍 Elasticsearch**: Full-text search
- **📂 MinIO**: Self-hosted object storage
- **💾 SQLite**: Testing database

### **DevOps & Infrastructure**
- **🐳 Docker**: Containerized development
- **☸️ Kubernetes**: Production orchestration
- **🔄 GitHub Actions**: CI/CD pipeline
- **📊 Prometheus**: Monitoring and metrics
- **📈 Grafana**: Visualization and alerting
- **🔒 Let's Encrypt**: SSL certificate automation

---

## 🚀 **Quick Start**

### **Prerequisites**
- **PHP 8.3+** with required extensions
- **Composer 2.0+** for dependency management
- **Node.js 18+** and npm/yarn
- **MySQL 8.0+** or **PostgreSQL 14+**
- **Redis 7.0+** for caching

### **Installation**

```bash
# Clone the repository
git clone https://github.com/bgside/laravel-enterprise-cms.git
cd laravel-enterprise-cms

# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure database in .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=enterprise_cms
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Run database migrations
php artisan migrate --seed

# Build frontend assets
npm run build

# Start the development server
php artisan serve
```

### **Default Admin Access**
- **URL**: http://localhost:8000/admin
- **Username**: admin@example.com
- **Password**: admin123
- **Language**: English/العربية

---

## 📖 **API Documentation**

### **Authentication Endpoints**

```php
POST   /api/auth/login          # User login
POST   /api/auth/register       # User registration
POST   /api/auth/logout         # User logout
POST   /api/auth/refresh        # Token refresh
POST   /api/auth/forgot         # Password reset
```

### **Content Management Endpoints**

```php
GET    /api/pages               # List all pages
POST   /api/pages               # Create new page
GET    /api/pages/{id}          # Get specific page
PUT    /api/pages/{id}          # Update page
DELETE /api/pages/{id}          # Delete page
POST   /api/pages/{id}/publish  # Publish page
```

### **Multilingual Endpoints**

```php
GET    /api/translations        # Get all translations
POST   /api/translations        # Add translation
PUT    /api/translations/{key}  # Update translation
GET    /api/languages           # Available languages
POST   /api/languages           # Add new language
```

### **User Management Endpoints**

```php
GET    /api/users               # List users
POST   /api/users               # Create user
PUT    /api/users/{id}          # Update user
DELETE /api/users/{id}          # Delete user
POST   /api/users/{id}/roles    # Assign roles
```

---

## 🌍 **Multilingual Configuration**

### **Arabic Language Setup**

```php
// config/app.php
'locale' => 'ar',
'fallback_locale' => 'en',
'supported_locales' => ['ar', 'en'],

// Arabic RTL Support
'rtl_languages' => ['ar', 'fa', 'he'],
```

### **Translation Files Structure**

```
resources/lang/
├── ar/
│   ├── auth.php
│   ├── cms.php
│   ├── validation.php
│   └── messages.php
└── en/
    ├── auth.php
    ├── cms.php
    ├── validation.php
    └── messages.php
```

### **Database Multilingual Schema**

```php
// Migration for multilingual content
Schema::create('page_translations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('page_id')->constrained()->onDelete('cascade');
    $table->string('locale', 2);
    $table->string('title');
    $table->longText('content');
    $table->text('meta_description')->nullable();
    $table->string('slug');
    $table->timestamps();
    
    $table->unique(['page_id', 'locale']);
    $table->index(['locale', 'slug']);
});
```

---

## 🔧 **Configuration Examples**

### **Environment Configuration**

```env
# Application
APP_NAME="Enterprise CMS"
APP_ENV=production
APP_KEY=base64:your-app-key
APP_DEBUG=false
APP_URL=https://your-domain.com

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=enterprise_cms
DB_USERNAME=cms_user
DB_PASSWORD=secure_password

# Cache & Session
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls

# File Storage
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your-access-key
AWS_SECRET_ACCESS_KEY=your-secret-key
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-cms-bucket

# Redis Configuration
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# Security
SESSION_LIFETIME=120
SANCTUM_STATEFUL_DOMAINS=localhost,127.0.0.1,your-domain.com
```

### **Role-Based Permissions**

```php
// User Roles and Permissions
$roles = [
    'super_admin' => [
        'users.create', 'users.read', 'users.update', 'users.delete',
        'content.create', 'content.read', 'content.update', 'content.delete',
        'settings.read', 'settings.update',
        'analytics.read', 'reports.generate'
    ],
    'content_manager' => [
        'content.create', 'content.read', 'content.update',
        'media.upload', 'media.manage',
        'translations.manage'
    ],
    'editor' => [
        'content.read', 'content.update',
        'media.upload'
    ],
    'viewer' => [
        'content.read'
    ]
];
```

---

## 🔒 **Security Features**

### **Authentication & Authorization**
- **Multi-Factor Authentication**: SMS/Email OTP
- **Role-Based Access Control**: Granular permissions
- **Session Security**: Secure session handling
- **Password Policies**: Strength requirements
- **Login Attempts**: Brute force protection
- **IP Whitelisting**: Restrict admin access

### **Data Protection**
- **Encryption**: Database field encryption
- **HTTPS Enforcement**: SSL/TLS required
- **CSRF Protection**: Cross-site request forgery
- **XSS Prevention**: Input sanitization
- **SQL Injection**: Prepared statements
- **File Upload Security**: MIME type validation

### **Compliance & Auditing**
- **Activity Logging**: All user actions logged
- **Data Retention**: Configurable retention policies
- **Privacy Controls**: GDPR compliance tools
- **Backup Encryption**: Encrypted backups
- **Access Logs**: Detailed access tracking
- **Security Headers**: Comprehensive HTTP headers

---

## 📊 **Performance Optimization**

### **Caching Strategy**
- **Application Cache**: Route and config caching
- **Database Cache**: Query result caching
- **Page Cache**: Full page caching
- **Object Cache**: Redis-based object storage
- **CDN Integration**: CloudFront/CloudFlare
- **Image Optimization**: Automatic compression

### **Database Optimization**
- **Query Optimization**: Efficient database queries
- **Indexing Strategy**: Optimized database indexes
- **Connection Pooling**: Efficient connection management
- **Read Replicas**: Database scaling
- **Query Monitoring**: Slow query detection
- **Database Maintenance**: Automated optimization

---

## 🏢 **Enterprise Integration**

### **Single Sign-On (SSO)**
- **SAML 2.0**: Enterprise SSO integration
- **OAuth 2.0**: Third-party authentication
- **Active Directory**: LDAP integration
- **Azure AD**: Microsoft integration
- **Google Workspace**: G Suite integration

### **Third-Party Services**
- **Payment Gateways**: Stripe, PayPal integration
- **Analytics**: Google Analytics, Adobe Analytics
- **Email Services**: SendGrid, Mailgun, SES
- **Storage Services**: AWS S3, Azure Blob, GCP
- **CDN Services**: CloudFront, CloudFlare
- **Monitoring**: New Relic, DataDog

---

## 📈 **Business Value**

### **Government Sector Benefits**
- **🏛️ Compliance Ready**: Government security standards
- **📋 Audit Trail**: Complete activity logging
- **🌍 Multilingual**: Arabic/English citizen services
- **🔒 Data Security**: Government-grade encryption
- **📊 Transparency**: Public information management
- **♿ Accessibility**: WCAG 2.1 AA compliance

### **Enterprise Benefits**
- **💰 Cost Effective**: Reduced development time
- **⚡ High Performance**: Optimized for scale
- **🔧 Customizable**: Modular architecture
- **🛡️ Secure**: Enterprise security features
- **📱 Mobile Ready**: Responsive design
- **🔄 Integrable**: API-first architecture

---

## 🤝 **Contributing**

We welcome contributions! Please see our [Contributing Guidelines](CONTRIBUTING.md) for details.

### **Development Setup**

```bash
# Install development dependencies
composer install --dev
npm install --dev

# Run tests
php artisan test
npm run test

# Code quality checks
./vendor/bin/phpstan analyse
./vendor/bin/php-cs-fixer fix

# Generate API documentation
php artisan api:generate
```

---

## 📄 **License**

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 📞 **Support**

- **📧 Email**: support@enterprise-cms.com
- **🐛 Issues**: [GitHub Issues](https://github.com/bgside/laravel-enterprise-cms/issues)
- **📚 Documentation**: [Official Docs](https://docs.enterprise-cms.com)
- **💬 Community**: [Discord Server](https://discord.gg/enterprise-cms)

---

<div align="center">

**🏢 Enterprise Content Management Made Modern**

*Built with ❤️ for government agencies and enterprise organizations*

[⭐ Star this repo](https://github.com/bgside/laravel-enterprise-cms) • [🍴 Fork it](https://github.com/bgside/laravel-enterprise-cms/fork) • [📢 Share it](https://twitter.com/intent/tweet?text=Check%20out%20this%20amazing%20Laravel%20Enterprise%20CMS!)

</div>