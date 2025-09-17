# Zirve Multi-Tenant API

Bu proje, Laravel ile geliştirilmiş gelişmiş bir **Multi-Tenant API** örneğidir. Projede OAuth2 kimlik doğrulama, tenant bazlı veri izolasyonu ve finansal işlemler için temel API endpointleri bulunmaktadır.

---

## Kurulum

1. Depoyu klonlayın:
```bash
git clone https://github.com/kullanici_adi/zirve-multitenant-api.git
cd zirve-multitenant-api
```

2. Bağımlılıkları yükleyin:
```bash
composer install
npm install
```

3. `.env` dosyasını oluşturun:
```bash
cp .env.example .env
```
Gerekli ortam değişkenlerini doldurun. Örnek:
```
APP_NAME=ZirveMultiTenant
APP_ENV=local
APP_KEY=base64:...
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=central_db
DB_USERNAME=root
DB_PASSWORD=

PASSPORT_CLIENT_ID=your_client_id
PASSPORT_CLIENT_SECRET=your_client_secret
```

4. Uygulama anahtarını oluşturun:
```bash
php artisan key:generate
```

5. Veritabanı migrationlarını çalıştırın:
```bash
php artisan migrate
```

6. Passport için anahtarları oluşturun:
```bash
php artisan passport:install
```

7. Local development server’ı çalıştırın:
```bash
php artisan serve
```

---

## Mevcut Endpointler

- **Tenant oluşturma ve listeleme**:  
  `/tenants` (GET / POST)
  
- **FinancialTransaction ekleme**:  
  `/api/transactions` (POST)

> Not: API henüz tam olarak çalışır durumda değil, tenant ve Elasticsearch entegrasyonu tamamlanmadı.

---

## Yapılan ve Yapılacak Adımlar

### Tamamlananlar:
- Laravel projesi oluşturuldu
- Multi-Tenant paketi (stancl/tenancy) kuruldu
- OAuth2 Passport kurulumu tamamlandı
- User model ve login endpointi çalışır durumda
- Tenant routing ile `tenant1.localhost` erişimi sağlandı

### Eksik/Kısıtlı Adımlar:
- **FinancialTransactionController** ve endpointler tam olarak tamamlanmadı
- **Rate Limiting Middleware** tamamlanmadı
- Tenant migrationları ve seed işlemleri tamamlanmadı
- Çoklu tenant database yönlendirme tam test edilmedi

---

## Önemli Notlar

- `.env` dosyası GitHub’a eklenmemelidir. Bunun yerine `.env.example` dosyası bulunmalıdır.
- Proje kök dizininde `README.md` bulunur ve buraya tüm kullanım talimatları yazılmıştır.
- Endpoint testleri için Postman veya HTTP Client kullanılabilir.

---

## İletişim

Sorularınız veya proje hakkında detaylar için: **sadik-bilgin@hotmail.com**

