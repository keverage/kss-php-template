# KSS PHP Template

A template ready to use for generate style guide from [Knyle Style Sheets PHP](https://github.com/kss-php/kss-php) (KSS).


# Config

The template does not work by default. You must do edit **config.json** file:

```json
{
    "name": "Project name",
    "version": "1.0.0",
    "date": "",
    "author": "Styleguide author",
    "kss": {
        "source": [
            // Add relative path to your styles directory, e.g. "../styles/modules"
        ],
        "options": {
            "title": "Style guide",
            "css": [
                // Add css from your theme, e.g. "../styles/dist/theme.css"
                "template/assets/css/override.css"
            ]
        },
        "kssphpmarkup": {
            "urlPrefix": "",
            "cache": false
        }
    }
}
```