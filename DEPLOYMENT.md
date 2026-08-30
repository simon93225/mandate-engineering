# Editing and Deploying the WordPress Site

## Edit content in WordPress

- Homepage copy: `Appearance -> Customize -> Homepage Content`
- Projects: `Projects` in the WordPress dashboard
- Menus: `Appearance -> Menus`
- Images uploaded through WordPress: `Media`
- Contact enquiries: delivered to `info@mandateengineering.com`

The Customizer values are stored in the WordPress database. They are not stored in Git, so take a database backup before moving the site to another server.

## Push theme/code updates

Theme and plugin code is versioned in Git. From the local project:

```bash
git pull --ff-only origin main
git status
git add wp-content/themes/mandate-engineering
git commit -m "Describe the website update"
git push origin main
```

On cPanel, update only the code after taking a backup. If SSH and Git are available:

```bash
cd ~/public_html
git pull --ff-only origin main
```

Do not replace the production `wp-config.php`, database, or `wp-content/uploads` when updating theme code. Those contain server credentials, WordPress settings, and uploaded media.

## Database and media backups

Before importing a database or performing a migration, back up:

- The complete WordPress database
- `wp-content/uploads/`
- `wp-config.php`
- Any cPanel cron jobs and server-specific configuration

Theme assets committed in Git are safe to deploy with the theme. Media Library files must be backed up separately.
