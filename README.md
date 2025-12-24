# Moodle Landing Page Plugin (local_depan)

A modern, responsive landing page plugin for Moodle that creates an attractive entry point for your learning platform.

![Moodle Version](https://img.shields.io/badge/Moodle-4.0%2B-blue)
![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-green)
![License](https://img.shields.io/badge/License-GPL%20v3-orange)

## 🌟 Features

- **Modern Landing Page**: Responsive design with attractive hero section
- **Multi-language**: Support for English and Indonesian
- **Easy Configuration**: Customizable settings through admin panel
- **Responsive Design**: Optimal display on desktop, tablet, and mobile
- **Auto Redirect**: Non-logged visitors are redirected to landing page

## 📸 Screenshots

*Screenshots will be added soon*

## 🚀 Demo

*Live demo coming soon*

## 🛠️ Installation

### Method 1: Download from GitHub

1. Download the latest release from [Releases page](https://github.com/toosa/moodle-local_depan/releases)
2. Extract and upload the `depan` folder to `/local/` directory in your Moodle installation
3. Visit Site Administration > Notifications to install the plugin
4. Or run: `php admin/cli/upgrade.php --non-interactive`

### Method 2: Git Clone

```bash
cd /path/to/your/moodle/local/
git clone https://github.com/toosa/moodle-local_depan.git depan
cd depan
php ../../admin/cli/upgrade.php --non-interactive
```

## 🎨 Landing Page Components

1. **Hero Section**: Main section with title, subtitle, and call-to-action buttons
2. **Features Section**: Highlights of your platform's key features
3. **Statistics Section**: Course and user statistics (for logged-in users)
4. **Courses Section**: Preview of available courses

## ⚙️ Configuration

After installation, configure the plugin through:

**Site Administration → Plugins → Local plugins → Landing Page**

### Available Settings:

| Setting | Description | Default |
|---------|-------------|---------|
| **Enable Landing Page** | Enable/disable landing page redirect | ✅ Enabled |
| **Custom Welcome Title** | Main title in hero section | "Welcome to Our Learning Platform" |
| **Custom Welcome Subtitle** | Subtitle in hero section | "Discover, Learn, and Grow with Us" |
| **Custom Hero Description** | Description text in hero section | Default description text |

## 🔄 How It Works

1. 🚪 **Non-logged visitors** access your Moodle site's homepage
2. 🔀 **Plugin redirects** them to `/local/depan/index.php`
3. 🎨 **Landing page displays** with attractive interface and login/register buttons
4. ✅ **Logged-in users** see the normal Moodle interface

## 🎨 Customization

### 🎨 Styling
Edit [`styles.css`](styles.css) to customize colors, fonts, and layout.

### 🌐 Languages
Add new language files in the `lang/` folder. Currently supports:
- 🇺🇸 English (`lang/en/`)
- 🇮🇩 Indonesian (`lang/id/`)

### 📝 Content
Modify [`index.php`](index.php) to change structure and content of the landing page.

## 📁 File Structure

```
local/depan/
├── 📄 version.php              # Plugin version and metadata
├── 🔧 lib.php                 # Core plugin functions and hooks
├── ⚙️ settings.php            # Admin configuration panel
├── 🎨 index.php               # Main landing page
├── 💄 styles.css              # Custom CSS styling
├── 🌐 lang/
│   ├── 🇺🇸 en/
│   │   └── local_depan.php     # English language strings
│   └── 🇮🇩 id/
│       └── local_depan.php     # Indonesian language strings
├── 🚫 .gitignore              # Git ignore rules
└── 📖 README.md               # This documentation
```

## 📋 Requirements

- 🎓 **Moodle**: 4.0+ (tested on Moodle 4.5)
- 🐘 **PHP**: 7.4+
- 🌐 **Web Server**: Apache/Nginx

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 🐛 Bug Reports & Feature Requests

Please use the [GitHub Issues](https://github.com/toosa/moodle-local_depan/issues) page to report bugs or request features.

## 📞 Support

For help and questions:
- 📧 Create an [Issue](https://github.com/toosa/moodle-local_depan/issues)
- 💬 [Discussions](https://github.com/toosa/moodle-local_depan/discussions)
- 📖 Check the [Wiki](https://github.com/toosa/moodle-local_depan/wiki)

## ⭐ Show Your Support

Give a ⭐️ if this project helped you!

## 📝 License

This project is licensed under the [GNU GPL v3](LICENSE) - see the LICENSE file for details.

## 👨‍💻 Author

**Toosa**
- GitHub: [@toosa](https://github.com/toosa)
- Website: [openstat.toosa.id](https://openstat.toosa.id)


---

<p align="center">Made with ❤️ for the Moodle community</p>