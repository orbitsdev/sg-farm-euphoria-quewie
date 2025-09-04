
# 🎢 Amusement Park Database Schema — Final Team Presentation
**Generated:** September 04, 2025  

This document contains:  
- ✅ Migrations (Laravel style)  
- ✅ Example Data (realistic)  
- ✅ Table Explanations (what each table stores)  
- ✅ Relationships Overview  

---

# ⚙️ Data Type Standards
- **IDs / FKs:** `BIGINT UNSIGNED` — supports billions of rows.
- **Codes/Numbers:** `VARCHAR(255)` unique + indexed (e.g., `TX-20250904-000000123`, `QE-MN28Q5RL`).
- **Prices:** stored as `UNSIGNED BIGINT` in cents (₱150.00 → 15000).
- **Statuses:** `VARCHAR(50)` (safe instead of ENUM).
- **Timestamps:** `TIMESTAMP NULL`.

---

# 👤 users
**What it stores:** Staff/admin accounts. Each cashier may hold a draft transaction.  

### Migration
```php
$table->id();
$table->string('name');
$table->string('email')->unique();
$table->string('password');
$table->foreignId('transaction_id')->nullable()->constrained('transactions');
$table->timestamps();
```

### Example Data
| id | name        | email             | password   | transaction_id |
|----|-------------|------------------|------------|----------------|
| 1  | Cashier One | cashier1@park.com | hashed_pw  | 1              |

---

# 🎟️ packages
**What it stores:** Sellable products (entry tickets or bundles).  

### Migration
```php
$table->id();
$table->string('name');
$table->string('code')->unique();
$table->decimal('price', 12, 2);
$table->text('description')->nullable();
$table->boolean('is_active')->default(true);
$table->timestamps();
```

### Example Data
| id | name        | code     | price | description            | is_active |
|----|-------------|----------|-------|------------------------|-----------|
| 1  | Entrance    | ENT-150  | 150.00 | Park gate entry only   | true      |
| 2  | Go Kart 1x  | KART-1X  | 150.00 | 1 ride on Go Kart      | true      |
| 3  | Adventure A | ADV-A    | 300.00 | Luge + Kart bundle     | true      |

---

# 🎁 promos
**What it stores:** Discount definitions (senior, raffle, marketing).  

### Migration
```php
$table->id();
$table->string('name');
$table->string('promo_code')->unique();
$table->string('discount_type'); // percent or fixed
$table->decimal('discount_value', 12, 2);
$table->unsignedInteger('max_usage')->nullable();
$table->timestamp('valid_from')->nullable();
$table->timestamp('valid_until')->nullable();
$table->boolean('is_active')->default(true);
$table->timestamps();
```

### Example Data
| id | name           | promo_code | discount_type | discount_value | max_usage | valid_from | valid_until | is_active |
| -- | -------------- | ----------- | -------------- | --------------- | ---------- | ----------- | ------------ | ---------- |
| 1  | Senior Citizen | SENIOR20    | percent        | 20.00           | null       | 2025-01-01  | 2025-12-31   | true       |
| 2  | Opening Promo  | OPEN100     | fixed          | 10.00         | 50        | 2025-09-01  | 2025-09-30   | true       |



---

# 🧾 transactions
**What it stores:** One payment receipt. One transaction has many tickets.  

### Migration
```php
$table->id();
$table->string('transaction_number')->unique();
$table->string('transaction_code')->unique();
$table->string('name')->nullable();
$table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
$table->string('status')->default('paid');
$table->decimal('tender',12, 2)->default(0);
$table->decimal('change',12, 2)->default(0);
$table->decimal('original_total',12, 2)->default(0);
$table->decimal('final_total',12, 2)->default(0);
$table->timestamp('completed_at')->nullable();
$table->timestamps();
```

### Example Data
| id | transaction_number | transaction_code | name           | user_id | status | tender | change | original_total | final_total | completed_at       |
|----|--------------------|------------------|----------------|---------|--------|--------|--------|----------------|-------------|--------------------|
| 1  | 000000001          | TX-8C7D2A9Q      | Juan Dela Cruz | 1       | paid   | 200.00 | 50.00   | 195.00         | 160.00      | 2025-09-04 10:30:00 |


---

# 🎫 tickets
**What it stores:** Guest passes (QR-coded). May contain packages.  

### Migration
```php
$table->id();
$table->foreignId('transactions_id')->constrained('transactions')->onDelete('cascade');
$table->string('ticket_number')->unique();
$table->string('ticket_code')->unique();
$table->boolean('is_active')->default(true);
$table->string('tag')->nullable();
$table->string('type')->default('regular');
$table->unsignedInteger('max_uses')->nullable();
$table->unsignedInteger('usage_count')->default(0);
$table->timestamp('valid_from')->nullable();
$table->timestamp('valid_until')->nullable();
$table->string('status')->default('not validated');
$table->string('sponsor')->nullable();
$table->decimal('original_total',12, 2)->default(0);
$table->decimal('final_total',12, 2)->default(0);
$table->timestamps();
```

### Example Data
| id | transactions_id | ticket_number | ticket_code | is_active | tag     | type     | max_uses | usage_count | valid_from           | valid_until           | status        | sponsor | original_total | final_total |
|----|-----------------|---------------|-------------|-----------|---------|----------|----------|-------------|----------------------|----------------------|---------------|---------|----------------|-------------|
| 1  | 1               | 099268000001  | QE-HQW9922X | true      |         | regular  | null     | 0           | 2025-09-04 08:00:00  | 2025-09-04 20:00:00  | validated     |         | 150.00        | 150.00    |
| 2  | 1               | 099268000002  | QE-9XY1WZ2T | true      | senior  | regular  | null     | 0           | 2025-09-04 08:00:00  | 2025-09-04 20:00:00  | validated     |         | 150.00        | 120.00    |
---

# 🏞️ rides
**What it stores:** The attractions.  

### Migration
```php
$table->id();
$table->string('name');
$table->boolean('is_active')->default(true);
$table->text('description')->nullable();
$table->timestamps();
```

### Example Data
| id | name       | is_active | description               |
|----|------------|-----------|---------------------------|
| 1  | Grass Luge | true      | Downhill ride with wheels |
| 2  | Go Kart    | true      | Outdoor karting circuit   |

---

# 📦 package_rides
**What it stores:** Which rides are included in each package.  

### Migration
```php
$table->id();
$table->foreignId('ride_id')->constrained('rides')->onDelete('cascade');
$table->foreignId('package_id')->constrained('packages')->onDelete('cascade');
$table->timestamps();
$table->unique(['package_id','ride_id']);
```

### Example Data
| id | ride_id | package_id |
|----|---------|------------|
| 1  | 1       | 3          |
| 2  | 2       | 3          |


---

# 🎟️ ticket_packages
**What it stores:** Packages linked to tickets.  

### Migration
```php
$table->id();
$table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade');
$table->foreignId('package_id')->constrained('packages')->onDelete('cascade');
$table->timestamps();
$table->unique(['ticket_id','package_id']);
```

### Example Data
| id | ticket_id | package_id | 
|----|-----------|------------|
| 1  | 1         | 1          |
| 2  | 2         | 3          |

---

# 🎟️ ticket_package_ride_accesses
**What it stores:** Ride entitlements per ticket.  

### Migration
```php
$table->id();
$table->foreignId('ticket_package_id')->constrained('ticket_packages')->onDelete('cascade');
$table->foreignId('ride_id')->constrained('rides')->onDelete('cascade');
$table->unsignedInteger('max_uses')->nullable();
$table->unsignedInteger('usage_count')->default(0);
$table->timestamps();
$table->unique(['ticket_package_id','ride_id']);


```

### Example Data
| id | ticket_package_id | ride_id | max_uses | usage_count |
| -- | ------------------- | -------- | --------- | ------------ |
| 1  | 2                   | 1        | 1         | 0            |
| 2  | 2                   | 2        | 1         | 0            |
---

# 🛂 applied_promos
**What it stores:** Which promos were applied to tickets or transactions.  

### Migration
```php
$table->id();
$table->foreignId('promo_id')->constrained('promos')->onDelete('cascade');
$table->morphs('promotable');
$table->decimal('applied_amount',12,2)->default(0); // actual discount applied in cents
$table->timestamps();
```

### Example Data
| id | promo_id | promotable_id | promotable_type | applied_amount |
| -- | --------- | -------------- | ---------------- | --------------- |
| 1  | 1         | 2              | tickets          | 3000.00         |
| 2  | 2         | 1              | transactions     | 1000.00         |
---


# 🚪 gates
**What it stores:** Physical flap-barrier devices.  

### Migration
```php
$table->id();
$table->string('device_name');
$table->foreignId('ride_id')->constrained('rides')->onDelete('cascade');
$table->unsignedInteger('reader_no')->default(1);
$table->ipAddress('ip_address')->nullable();
$table->string('username')->nullable();
$table->string('password')->nullable();
$table->string('location')->nullable();
$table->boolean('is_active')->default(true);
$table->timestamps();
```

### Example Data
| id | device_name | ride_id | reader_no | ip_address    | username | password | location    | is_active |
|----|-------------|---------|-----------|---------------|----------|----------|-------------|-----------|
| 1  | Gate A      | 1       | 1         | 192.168.1.10  | admin    | ******   | Luge Entry  | true      |
| 2  | Gate B      | 2       | 1         | 192.168.1.11  | admin    | ******   | Kart Entry  | true      |


---

# 📡 ride_scans
**What it stores:** Ticket scans per ride.  

### Migration
```php
$table->id();
$table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade');
$table->foreignId('ride_id')->constrained('rides')->onDelete('cascade');
$table->foreignId('gate_id')->nullable()->constrained('gates');
$table->ipAddress('ip_address')->nullable();
$table->timestamp('scanned_at')->nullable();
$table->timestamps();
```

### Example Data
| id | ticket_id | ride_id | gate_id | ip_address    | scanned_at          |
|----|-----------|---------|---------|---------------|---------------------|
| 1  | 2         | 1       | 1       | 192.168.1.10  | 2025-09-04 11:00:00 |


# 📝 gate_logs
**What it stores:** Raw hardware logs for debugging.  

### Migration
```php
$table->id();
$table->string('card_number')->nullable();
$table->string('event_type')->nullable();
$table->unsignedBigInteger('ticket_id')->nullable();
$table->unsignedBigInteger('gate_id')->nullable();
$table->unsignedBigInteger('ride_id')->nullable();
$table->timestamp('scanned_at')->nullable();
$table->ipAddress('ip_address')->nullable();
$table->text('raw_payload')->nullable();
$table->text('messages')->nullable();
$table->timestamps();
```

### Example Data
| id | card_number | event_type | ticket_id | gate_id | ride_id | scanned_at          | ip_address   | raw_payload                         | messages        |
|----|-------------|------------|-----------|---------|---------|---------------------|--------------|--------------------------------------|----------------|
| 1  | QE-9XY1WZ2T | ENTRY      | 2         | 1       | 1       | 2025-09-04 11:00:00 | 192.168.1.10 | `{'status': 'ok', 'result': 'pass'}` | Validated OK   |

---

---

# 🔗 Relationships Overview

```
users ──< transactions ──< tickets ──< ticket_packages ──< ticket_package_ride_accesses >── rides
                                                   │
                                                   └─< applied_promos >── promos

packages ──< package_rides >── rides
tickets ──< ride_scans >── rides
gates ──< ride_scans
gates ──< gate_logs
```

---

# ✅ Final Notes
- `transaction_number` and `ticket_number` should be padded (`000000001`, `099268000001`) for scale.  
- `transaction_code` and `ticket_code` are **public unique codes** safe to print on QR bands.  
- `applied_promos` allows promos at both **ticket-level** and **transaction-level**.  
- `gate_logs` are verbose logs for debugging, while `ride_scans` are lean operational records.
