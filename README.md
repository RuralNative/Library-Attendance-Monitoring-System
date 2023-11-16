# Library Attendance Monitoring System

**Central Philippines State University - Moises Padilla Campus**

## Overview

The Library Attendance Monitoring System is designed for the Central Philippines State University - Moises Padilla Campus to streamline the attendance tracking process in the library.

It aims to act as a comprehensive tool to achieve the following objectives:

- Allow students to conveniently check in / check out from the Library whenever using the facilities and resources provided by our Campus Library.
- Allow the administrators of the Library to conveniently and efficiently manage/record/track the use of the Library by the students through insightful reports.

Developed by the University's local IT development team - Charlie Pelingon and John Berlin Leonor (RuralNative)- this system is built specifically for the needs of our University's Library and the students who use them.

## Installation Instructions

_This Library Attendance Monitoring System requires the following dependencies to be installed first:_

- XAMPP Local Server
- Web Browser (Brave/Chrome/Edge/Firefox/Opera/Safari)

_If the following dependencies are successfully installed, you may be able to proceed to the system installation by doing either of the following methods:_

- Copy entire project to the 'htdocs' subdirectory of the XAMPP directory found in the C: Drive. Make sure to rename the project folder to 'Library'.
- Run the 'installation.ps1' present in the project directory in Windows Powershell which will automatically setup the system for your local machine. Note that you have to run the Powershell in administrator mode and allow the scripts to run in your local machine, achieved by running this command 'Set-ExecutionPolicy unrestricted' in the Powershell prompt.

_Upon successful installation, turn on the Apache and MySQL modules inside your XAMPP Control Panel and open your default web browser. Input the following URLs to open the described components:_

- **Check-in/Check-Out Page** (localhost/Library/)
- **Administrator Page** (localhost/Library/admin/)

## Features

- QR Code attendance for efficient check-in/check-out.
- Comprehensive admin panel to manage the system.
- Data modification and maintenance capabilities.
- Report generation with customizable date ranges.

## Technologies Used

- Frontend components are developed using HTML, CSS, and vanilla JavaScript.
- Backend components are developed mainly by PHP with limited implementation of JavaScript.
- Database developed with SQL.
- Server hosted locally with XAMPP.

## License

This project is licensed under the MIT License.

## Contact

For any questions or inquiries, please contact John Berlin at my work email, jbleonor@outlook.com.

## Acknowledgments

Special thanks to Sir Charlie Pelingon, our faculty instructor responsible for the original codebase, and my alma matter Central Philippines State University - Moises Padilla for the opportunity given to develop my personal skills with this comprehensive project.
