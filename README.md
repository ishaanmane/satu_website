# SATU Presidents' Forum Website

WordPress site for the SATU Presidents' Forum, built for the Dean (International Relations) Office, IIT Bombay. Modeled after [satu.ncku.edu.tw](https://satu.ncku.edu.tw), the original NCKU-hosted website.

## Stack

- WordPress 7.0
- PHP 8.4
- MariaDB 11.8
- Apache 2.4
- Theme: Hello Elementor (parent) + `hello-elementor-child-satu` (custom child theme)
- Page builder: Elementor (free)

## Repository Contents

```
satu_website/
├── wordpress/              WordPress core + themes + plugins (uploads/ and wp-config.php excluded)
├── docker-compose.yml      Container setup for WordPress + MariaDB
├── .env.example            Template for required environment variables
├── .gitignore
└── README.md
```

**Not included in this repo** (sent separately):
- `.env` — actual database credentials
- `satu_db.sql` — database dump
- `wordpress/wp-content/uploads/` — media files (sent as `uploads.zip`)
- `wordpress/wp-config.php` — generated fresh on setup

## Setup Instructions

1. Clone this repository:
   ```bash
   git clone https://github.com/ishaanmane/satu_website.git
   cd satu_website
   ```

2. Place the `.env` file (sent separately) in the project root. Use `.env.example` as reference for required variables.

3. Place `satu_db.sql` (sent separately) in the project root.

4. Extract `uploads.zip` (sent separately) into:
   ```
   wordpress/wp-content/uploads/
   ```

5. Start the containers:
   ```bash
   docker compose up -d
   ```

6. The site will be available at `http://localhost:8080` (or the configured port).

## Theme Structure

The custom child theme `hello-elementor-child-satu` contains:

```
hello-elementor-child-satu/
├── style.css
├── functions.php
├── header.php              Header markup + nav bar (8 tabs)
├── footer.php               Footer markup
└── assets/
    ├── css/
    │   ├── satu-header.css  Header + nav styling
    │   └── satu-footer.css  Footer styling
    └── js/
```

Header navigation, dropdown templates, and editing instructions are documented as inline comments inside `header.php`.

## Pages

- Home
- About SATU (History, Objectives, Organization, Membership Guidelines — with in-page jump menu)
- Constitution
- Members
- Steering Committee
- General Assembly (table managed via TablePress plugin)
- Activities
- Member Application

## Notes for Maintainers

- Page content blocks (HTML/text editor) and their corresponding CSS are documented with inline comments where non-technical edits are expected (e.g. nav tabs, footer links).
- The General Assembly page table is managed via the **TablePress** plugin, editable from WP Admin without touching code.
- Security hardening (CORS, CSP, clickjacking headers, robots.txt) to be applied based on Burp Suite findings — pending report for this deployment.

## Contact

Built by Ishaan Mane, IEOR, IIT Bombay, for the Office of the Dean (International Relations).
