# Project Overview: OJT Timesheet System

The OJT Timesheet System (often referred to as OJT Timetracker) is a specialized web application designed to automate the logging, tracking, and reporting of internship hours. It replaces traditional paper-based logs with a centralized digital platform, ensuring accuracy for both students and supervisors.

## Core Functional Modules

+ User Authentication: Secure login for Interns (to log hours) and Supervisors/Admins (to review and approve).
+ Time Logging Engine: Features for "Clock In" and "Clock Out" that automatically calculate daily durations and running totals.
+ Task Documentation: A mandatory "Accomplishments" field for each entry to provide context for the hours rendered.
+ Dashboard Analytics: Real-time visualization of total hours completed versus the target hours required by the academic curriculum.
+ PDF/CSV Export: Generation of formal weekly or monthly reports ready for submission to educational institutions.

## 📁 Directory and File Structures
<pre>
./
|   📄 README.md
|
+---📁 classes
|       🐘 database.class.php
|
+---📁 dist
|   |   🐘 index.php
|   |   🐘 migrations.php
|   |
|   +---📁 assets
|   |       🖼️ omegalogo.png
|   |
|   +---📁 css
|   |      🎨 style.css
|   |
|   +---📄 js
|   |       main.js
|   |
|   +---📁 views
|           🌐 index.html
|
\---📁 includes
        ⚙️ config.php
        🐘 connection.php
        🐘 migrate_controller.php
        🐘 sample_interns.php
</pre>

* 📂 **classes/** - Source files for all the PHP classes
* 📂 **dist/** - The document root. The index file is located here.
* 📂 **dist/assets** - All icons and images will be stored here
* 📂 **dist/css** - All CSS files
* 📂 **dist/js** - All Javascript files
* 📂 **dist/views** - All pages that renders display/views
* 📄 **README.md** - Project Overview
