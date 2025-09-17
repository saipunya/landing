# Coop Landing Page

This project is a simple landing page for a cooperative organization built using PHP. It allows for basic configuration by an admin and hides the `.php` extension from the URLs for a cleaner look.

## Project Structure

```
coop-landing-page
├── public
│   ├── index.php          # Main entry point of the landing page
│   ├── .htaccess          # Apache server configuration to hide .php extension
│   └── assets
│       ├── css            # CSS files for styling
│       └── js             # JavaScript files for client-side functionality
├── src
│   ├── config.php         # Configuration settings for the application
│   ├── admin
│   │   └── settings.php    # Admin settings for the landing page
│   └── templates
│       └── landing.php     # HTML structure and PHP code for the landing page
└── README.md              # Documentation for the project
```

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/coop-landing-page.git
   ```

2. Navigate to the project directory:
   ```
   cd coop-landing-page
   ```

3. Set up a web server with PHP support (e.g., Apache, Nginx).

4. Configure your web server to point to the `public` directory.

5. Update the configuration settings in `src/config.php` as needed.

## Usage

- Access the landing page via your web browser at the configured URL.
- Admin settings can be modified in `src/admin/settings.php`.

## Features

- Clean URLs without `.php` extensions.
- Basic admin configuration for site settings.
- Responsive design with CSS and JavaScript support.

## Contributing

Feel free to submit issues or pull requests for improvements or bug fixes.