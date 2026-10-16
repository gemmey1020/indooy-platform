# Indooy Local Discovery and Business Platform

## Overview
A legacy Laravel platform with local search, map/location views, business profiles, product/program listings, sales workflows, and landing-page/site-creation features.

## Problem / Context
The source brings discovery and business publishing workflows together with administrative and sales operations.

## Core Capabilities
- Search and autocomplete routes for local listings.
- Location/map pages and business profile/landing-page routes.
- Product, category, provider, location, sales, inquiry, and website-creation code.
- Separate administrative and site-creation authentication workflows.

## Architecture
Laravel 5.5/PHP monolith with Eloquent models, web/API routes, Blade views, and a JavaScript/CSS frontend. This publication uses the root app; nested copies and legacy backup directories are excluded.

## Tech Stack
Laravel 5.5, PHP, Eloquent, Blade, Composer, JavaScript, Webpack.

## Main Workflows
Visitors search listings and view profiles; authenticated users manage site/landing-page content; administrative and sales areas manage records and inquiries.

## Domain Model
Locations, products, categories, providers, sales, inquiries, landing pages, website creations, and related user roles appear in the source.

## Integrations
Map and mail-related code is present. External credentials and live integrations are not included or verified.

## Engineering Highlights
The code combines multilingual discovery routes, listing search, and site-creation workflows.

## Setup
Install PHP and Composer dependencies, copy `.env.example` to a local `.env` and generate an application key, generate an application key, and use a disposable local database.

## Configuration
Set database, mail, and application values locally. No credentials are included.

## Testing
PHP syntax and Composer manifest validation are performed for this sanitized snapshot.

## Security & Privacy
Environment files, SQL exports, backups, logs, archives, nested copies, legacy media, and contact details were excluded or normalized.

## Limitations
This is a legacy snapshot with duplicate copies removed. Client artwork rights are not asserted. Hosting, search quality, analytics, and current service status were not verified.

## Project Status
Legacy platform source published for engineering review; current operational status is unknown.

## Ownership / Provenance
Source supplied by Mohamed Gamal, who confirms authority to publish his work. No Git history existed at the supplied path; this repo starts with a clean history.

## License / Usage
The supplied Composer manifest declares MIT; its exact project scope was not independently established. Dependency and retained third-party notices remain applicable.
