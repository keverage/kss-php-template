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
            // Path to your styles directory eg: "../styles/modules"
        ],
        "options": {
            "title": "Style guide",
            "css": [
                // Add css from your theme
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