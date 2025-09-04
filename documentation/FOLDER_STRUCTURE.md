# QUEWIE Euphoria SG - Project Folder Structure

## Overview
This document outlines the key folder structure of the QUEWIE Euphoria SG amusement park management system built with Laravel 12 and Vue.js using Inertia.

## Key Directories Tree Structure

```
quewie-euphoria-sg/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   │   ├── AppliedPromo.php
│   │   ├── Gate.php
│   │   ├── GateLog.php
│   │   ├── Package.php
│   │   ├── PackageRide.php
│   │   ├── Promo.php
│   │   ├── Ride.php
│   │   ├── RideScan.php
│   │   ├── Ticket.php
│   │   ├── TicketPackage.php
│   │   └── User.php
│   ├── Providers/
│   │   └── AppServiceProvider.php
│   └── Traits/
│       ├── AppliedPromo/
│       │   ├── AppliedPromoCustomAttributes.php
│       │   ├── AppliedPromoFunctions.php
│       │   └── AppliedPromoRelationships.php
│       ├── Gate/
│       │   ├── GateCustomAttributes.php
│       │   ├── GateFunctions.php
│       │   └── GateRelationships.php
│       ├── Package/
│       │   ├── PackageCustomAttributes.php
│       │   ├── PackageFunctions.php
│       │   └── PackageRelationships.php
│       ├── Ride/
│       │   ├── RideCustomAttributes.php
│       │   ├── RideFunctions.php
│       │   └── RideRelationships.php
│       └── Ticket/
│           ├── TicketCustomAttributes.php
│           ├── TicketFunctions.php
│           └── TicketRelationships.php
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 2025_09_04_112132_create_rides_table.php
│   │   ├── xxxx_xx_xx_xxxxxx_create_packages_table.php
│   │   └── xxxx_xx_xx_xxxxxx_create_package_rides_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── PackageRideSeeder.php
│       └── PackageSeeder.php
├── resources/
│   ├── css/
│   └── js/
│       ├── components/
│       ├── composables/
│       ├── layouts/
│       └── Pages/
│           ├── Admin/
│           ├── Cashier/
│           └── Dashboard/
└── routes/
    ├── admin.php
    ├── api.php
    ├── auth.php
    ├── cashier.php
    ├── gate.php
    └── web.php
```

## Notes
This structure is designed to organize the codebase for an amusement park management system with different user roles (admin, cashier) and features like ride management, ticket sales, packages, and promotions.
