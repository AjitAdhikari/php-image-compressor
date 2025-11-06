*** Begin Patch
*** Update File: Readme.md
@@
-Fix Steps (Depending on Your Setup)
-1. Check if GD is installed
-
-Run this command in your terminal:
-
-php -m | grep gd
-
-
-If you don’t see gd, it means GD isn’t installed/enabled.
-
-2. Enable GD on your system
-
-🪟 For Windows (XAMPP, WAMP, or manual PHP install):
-
-Open your php.ini file — often located at:
-
-C:\xampp\php\php.ini
-
-
-Search for this line:
-
-;extension=gd
-
-
-Remove the ; at the start so it becomes:
-
-extension=gd
-
-
-or in newer PHP versions:
-
-extension=gd2
-
-
-Save the file.
-
-Restart Apache (via XAMPP Control Panel or command line):
-
-net stop apache2.4
-net start apache2.4
-
-
-or simply restart XAMPP.
-
-🐧 For Linux (Ubuntu/Debian):
-
-sudo apt update
-sudo apt install php-gd
-sudo systemctl restart apache2
-
-
-For PHP-FPM (Nginx setup):
-
-sudo systemctl restart php-fpm
-
-
-🍎 For macOS (Homebrew PHP):
-
-brew install gd
-brew reinstall php
-
-
-Then restart your server.
-
-3. Verify GD is enabled
-
-Run:
-
-php -i | grep GD
-
-
-You should see output like:
-
-GD Support => enabled
-GD Version => bundled (2.1.0 compatible)
-
-4. Update folder path 
-$folder = "test_images";  //in place of test_images change your path
+## Fix Steps (Depending on Your Setup)
+
+Below are concise steps to check and enable the PHP GD extension on common platforms.
+
+### 1) Check if GD is installed
+
+Run this command in your terminal:
+
+```bash
+php -m | grep gd
+```
+
+If nothing is printed, GD is not installed or not enabled.
+
+### 2) Enable GD on your system
+
+**Windows (XAMPP, WAMP, or manual PHP install)**
+
+1. Open your `php.ini` file — commonly found at:
+
+```
+C:\\xampp\\php\\php.ini
+```
+
+2. Locate the line:
+
+```ini
+;extension=gd
+```
+
+3. Remove the leading semicolon so it becomes:
+
+```ini
+extension=gd
+```
+
+> In newer PHP versions it may appear as:
+
+```ini
+extension=gd2
+```
+
+4. Save `php.ini` and restart Apache:
+
+```powershell
+# Stop and start Apache (example service name)
+net stop apache2.4
+net start apache2.4
+```
+
+Or restart XAMPP through its control panel.
+
+**Linux (Ubuntu / Debian)**
+
+```bash
+sudo apt update
+sudo apt install php-gd
+sudo systemctl restart apache2
+```
+
+If you're using PHP-FPM with Nginx:
+
+```bash
+sudo systemctl restart php-fpm
+```
+
+**macOS (Homebrew PHP)**
+
+```bash
+brew install gd
+brew reinstall php
+# Then restart your web server or PHP-FPM
+```
+
+### 3) Verify GD is enabled
+
+Run:
+
+```bash
+php -i | grep GD
+```
+
+You should see output like:
+
+```
+GD Support => enabled
+GD Version => bundled (2.1.0 compatible)
+```
+
+### 4) Update your folder path in the script
+
+If your script expects an image folder, update the `$folder` variable:
+
+```php
+$folder = "test_images"; // change this to your actual images folder path
+```
+
+After enabling GD and restarting your server, your PHP image optimization script will run successfully.
*** End Patch
