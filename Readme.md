Fix Steps (Depending on Your Setup)
1. Check if GD is installed

Run this command in your terminal:

php -m | grep gd


If you don’t see gd, it means GD isn’t installed/enabled.

2. Enable GD on your system

🪟 For Windows (XAMPP, WAMP, or manual PHP install):

Open your php.ini file — often located at:

C:\xampp\php\php.ini


Search for this line:

;extension=gd


Remove the ; at the start so it becomes:

extension=gd


or in newer PHP versions:

extension=gd2


Save the file.

Restart Apache (via XAMPP Control Panel or command line):

net stop apache2.4
net start apache2.4


or simply restart XAMPP.

🐧 For Linux (Ubuntu/Debian):

sudo apt update
sudo apt install php-gd
sudo systemctl restart apache2


For PHP-FPM (Nginx setup):

sudo systemctl restart php-fpm


🍎 For macOS (Homebrew PHP):

brew install gd
brew reinstall php


Then restart your server.

3. Verify GD is enabled

Run:

php -i | grep GD


You should see output like:

GD Support => enabled
GD Version => bundled (2.1.0 compatible)

4. Update folder path 
<<<<<<< HEAD
$folder = "test_images";  //in place of test_images change your path 
=======
$folder = "test_images";  //in place of test_images change your path 
>>>>>>> aeff86d67c743d1d3a17939c6c7b8293de5a6ce6
