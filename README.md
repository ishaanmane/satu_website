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
├── wordpress/              WordPress core + themes + plugins + uploads (wp-config.php excluded)
├── satu_db.sql              Database dump
├── docker-compose.yml      Container setup for WordPress + MariaDB
├── .env.example             Template for required environment variables
├── .gitignore
└── README.md
```

**Not included in this repo** (sent separately):
- `.env` — actual database credentials (sent directly, not committed)
- `wordpress/wp-config.php` — generated fresh on setup from `.env` values

Everything else — including the database dump and media uploads — is tracked in this repository.

## Setup Instructions

1. Clone this repository:
   ```bash
   git clone https://github.com/ishaanmane/satu_website.git
   cd satu_website
   ```

2. You'll receive a file named `satu_env.txt` separately (sent outside of git since it contains database credentials). Rename it to `.env` and place it in the project root (same level as `docker-compose.yml`):
   ```bash
   mv satu_env.txt .env
   ```
   Use `.env.example` as reference for the expected variables.

3. Start the containers:
   ```bash
   docker compose up -d
   ```

   The database dump (`satu_db.sql`) is automatically imported on first container startup via the MariaDB entrypoint.

4. The site will be available at `http://localhost:8080` (or the configured port).

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
