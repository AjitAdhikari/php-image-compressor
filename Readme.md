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


# webp.php — Batch convert JPG/PNG to WebP

A small, single-file PHP script to convert JPG/JPEG/PNG images to WebP using the GD extension. The script is intentionally simple so you can run it from the CLI or place it behind a controlled web UI.

---

## Features

- Finds files with extensions: `jpg`, `jpeg`, `png` (non-recursive).
- Converts images to WebP using `imagewebp()`.
- Preserves PNG alpha transparency by converting palette PNGs to truecolor and enabling alpha saving.
- Skips conversion if output WebP already exists.
- Saves results by default to `output_webp_images`.

## Files

- `webp.php` — main script to run.

## Requirements

- PHP 7.x or 8.x installed on your machine.
- PHP GD extension with WebP support enabled.

Check GD and WebP support with:

```powershell
php -r "var_export(gd_info());"
```

Look for entries indicating WebP support (key names vary by PHP version).

## Quick start (Windows PowerShell)

1. Open PowerShell and change to the folder containing the script:

```powershell
cd d:\webp
```

2. Edit `webp.php` and set the input/output paths at the top of the file. Example:

```php
$input_dir = 'D:\input_images'; //replace it with your input directory path
$output_dir = 'output_webp_images'; //replace it with your desired output directory path
```

3. Run the script:

```powershell
php webp.php
```

The script prints status messages to the console. Converted files are placed into the `output_webp_images` folder (created automatically if needed).

## Behavior details

- Quality: the script uses `imagewebp(..., 80)` by default — change the `80` to any integer `0-100` to adjust quality vs. file size.
- PNG alpha preservation: the script calls `imagepalettetotruecolor()`, `imagealphablending($image, true)`, and `imagesavealpha($image, true)` for PNGs to keep transparency.
- Existing output files are not overwritten; the script reports and skips those files.
- Basic error messages are printed on load/convert failures.

## Troubleshooting

- imagewebp() undefined or errors: install/enable PHP GD with WebP support. On Windows, use a PHP distribution that includes GD with WebP (for example, recent builds from windows.php.net).
- imagecreatefromjpeg()/imagecreatefrompng() returns false: check file integrity and read permissions.
- Permission denied when creating output folder: run PowerShell as an administrator or choose an output folder where your user has write permission.

## Security notes

- Do not expose this script on the public internet without validation and access controls. It reads and writes arbitrary files based on configured paths.
- Prefer running it from CLI for batch jobs.

## Suggestions / Next steps

- Add CLI arguments (input path, output path, quality) so the script can be used without editing the file.
- Make directory traversal recursive with optional depth or pattern filters.
- Add logging and a dry-run mode.
- Parallelize conversions using multiple processes to speed up large batches.

---

If you'd like, I can implement CLI arguments and a recursive mode now and add a tiny self-test that verifies conversion on a small sample image.
