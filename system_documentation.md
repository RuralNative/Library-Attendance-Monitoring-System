# DOCUMENTATION FILE

**User Page**

## Introduction

This Markdown document will serve as the official documentation of the Admin component page of the system. This is to ensure that future maintenance shall be implemented with convenience and ease. It shall also serve as the basis for future IT staff to properly diagnose and troubleshoot the system if problems occur during the proper functioning of the system.

It is important to note that this documentation are for the DEVELOPER/s use for maintenance and troubleshooting purposes

## Author

Documentation author is provided by John Berlin Leonor with a nickname of RuralNative in his GitHub account. The documentation is created with supervision to the lead developer at the time of this writing, Sir Charlie Pelingon, and documentation begun in the 11th of November, 2023.
Refer to them for any concerns/inquiries.

## List of Components

### [Database Connection Script](conn.php) -

**Serves as a CRITICAL script that ensures that the CHECK-IN/CHECK-OUT Web Application is properly connected to the database.**
If in the scenario where upon diagnosis, the page is not properly connecting to the database - refer to this file. In the event where any of the following - hostname, username, password, and database - have been modified, ensure that this script is modified to adapt with the changes.
The error message that is shown upon database connection failure originates from this script. You may modify to suit your needs, as it is constructed in default (force kill web application and show stack trace of error.)
Important to note that there are 2 database connection scripts for the CHECK-IN/CHECK-OUT page and the ADMIN page. Refer to the other one for Admin-related connection problems.
