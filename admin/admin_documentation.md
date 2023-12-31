# DOCUMENTATION FILE

**Admin Page**

## Introduction

This Markdown document will serve as the official documentation of the Admin component page of the system. This is to ensure that future maintenance shall be implemented with convenience and ease. It shall also serve as the basis for future IT staff to properly diagnose and troubleshoot the system if problems occur during the proper functioning of the system.

## Author

Documentation author is provided by John Berlin Leonor with a nickname of RuralNative in his GitHub account. The documentation is created with supervision to the lead developer at the time of this writing, Sir Charlie Pelingon, and documentation begun in the 27th of October, 2023.
Refer to them for any concerns/inquiries.

## List of Components

- [Database Connection Script](includes\conn.php) - Serves as a CRITICAL script that ensures that the Admin Web Application is properly connected to the database.
- [Home Page Component](home.php) - Serves as the entry page of the Admin component of the system, showing relevant statistical data and navigational components to different subcomponents of the Admin.
- [Students Page Component](1index.php) - Serves as the page that provides the following functions: (1) show list of registered students in the database, (2) search functinonality for students, (3) options to add, edit, or delete a student's information to the database, and (4) option to import students' information by bulk to the database through a CSV/Excel file
- [Add Modal Component](add_modal.php) - Serves as the modal component that allows admin to add students to the database. All input fields inside the modal are required by default. Accessible by clicking the 'New' button as shown in the page produced by the [Students Page Component](1index.php)
- [Add PHP Script](add.php) - Serves as the PHP script for adding a student's information to the database.
- [Student Info Bulk Importation Panel PHP Script](add.php) - Serves as the PHP script for showing UI where admin can import student information by bulk through a customized CSV file provided by developers.
- [Footer Script](includes\footer.php) - Serves as the PHP script responsible for the content of the footer located at the bottom part of the web page, containing COPYRIGHT DISCLAIMER and DEVELOPERS' NAMES
- [Header Script](includes\header.php) - Serves as the PHP script responsible for the necessary dependencies usually located at the Header Tag of used for the Admin Web Pages, containing HTML script for the tab title description and necessary CSS and JS importations.
- [CSV Bulk Importation Script](includes\import.php) - Serves as the PHP script responsible for the bulk importation of student data through a compatible CSV format.
- [Menu Bar Script](includes\menubar.php) - Serves as the PHP script responsible for the responsive menubar providing links to the different web pages of the web application.
- [Navigation Bar Script](includes\navbar.php) - Serves as the PHP script responsible for the responsive navigation bar that shows the top section of the web page.
- [Profile Modal Script](includes\profile_modal.php) - Serves as the PHP script responsible for the responsive modal that shows upon clicking the profile button at the top right side of the web page.
- [Session Script](includes\session.php) - Serves as a CRITICAL PHP script responsible for managing the sessions of the web application.
- [Scripts PHP Script](includes\scripts.php) - Serves as a CRITICAL PHP script responsible for the JS script importations for the web application.
