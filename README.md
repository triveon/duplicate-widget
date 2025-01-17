# Duplicate Widget Magento 2

The Duplicate Widget is a Magento 2 extension designed to streamline the process of duplicating widgets within your e-commerce store. Instead of manually recreating widgets, this plugin allows you to clone existing widgets with all their configurations intact, saving time and effort for developers and store administrators.

#### Key Features:
**Effortless Duplication:** Duplicate any widget in Magento 2 with a single click.

**Retain Configurations:** Preserve all widget settings, including layout and display rules.

**Time-Saving Tool:** Ideal for stores with multiple similar widgets across different pages or layouts.

## How does it work?

1. Go in the admin to Content -> Widgets
2. Click on an existing widget
3. Click on "Save and duplicate"
4. The widget is duplicated

## Installation

### Installation using composer (recommended)
To install the extension login to your environment using SSH. Then navigate to the Magento 2 root directory and run the following commands in the same order as described:

Enable maintenance mode:
~~~~shell
php bin/magento maintenance:enable
~~~~

1. Install the extension:
~~~~shell
composer require triveon/duplicate-widget
~~~~

2. Enable the Translate Custom Variables Magento 2 plugin
~~~~shell
php bin/magento module:enable Triveon_DuplicateWidget
~~~~

3. Update the Magento 2 environment:
~~~~shell
php bin/magento setup:upgrade
~~~~

When your Magento environment is running in production mode, you also need to run the following comands:

4. Compile DI:
~~~~shell
php bin/magento setup:di:compile
~~~~

5. Deploy static content:
~~~~shell
php bin/magento setup:static-content:deploy
~~~~

6. Disable maintenance mode:
~~~~shell
php bin/magento maintenance:disable
~~~~

### Installation manually
1. Download the extension directly from [github](https://github.com/triveon/duplicate-widget) by clicking on *Code* and then *Download ZIP*.
2. Create the directory *app/code/Triveon/DuplicateWidget* (Case-sensitive)
3. Extract the zip and upload the code into *app/code/Triveon/DuplicateWidget*
4. Enable the Duplicate Widget Magento 2 plugin
~~~~shell
php bin/magento module:enable Triveon_DuplicateWidget
~~~~

5. Update the Magento 2 environment:
~~~~shell
php bin/magento setup:upgrade
~~~~

## Update
To update the Duplicate Widget Extension run the following commands:
~~~~shell
composer update triveon/duplicate-widget
php bin/magento setup:upgrade
~~~~ 
