# Set source folder to the folder where the script is located
$sourceFolder = Get-Location
$destinationFolder = "C:\xampp\htdocs\Library"

# Show initial message
$header = @"
  _____ _____   _____ _    _            __  __       _                 _____          _ _ _ _       
 / ____|  __ \ / ____| |  | |          |  \/  |     (_)               |  __ \        | (_) | |      
| |    | |__) | (___ | |  | |  ______  | \  / | ___  _ ___  ___  ___  | |__) |_ _  __| |_| | | __ _ 
| |    |  ___/ \___ \| |  | | |______| | |\/| |/ _ \| / __|/ _ \/ __| |  ___/ _` |/ _` | | | |/ _` |
| |____| |     ____) | |__| |          | |  | | (_) | \__ \  __/\__ \ | |  | (_| | (_| | | | | (_| |
 \_____|_|    |_____/ \____/           |_|  |_|\___/|_|___/\___||___/ |_|   \__,_|\__,_|_|_|_|\__,_|
                                       
"@

$subheader = @"
 _      _ _                             _____           _                 
| |    (_) |                           / ____|         | |                
| |     _| |__  _ __ __ _ _ __ _   _  | (___  _   _ ___| |_ ___ _ __ ___  
| |    | | '_ \| '__/ _` | '__| | | |  \___ \| | | / __| __/ _ \ '_ ` _ \ 
| |____| | |_) | | | (_| | |  | |_| |  ____) | |_| \__ \ ||  __/ | | | | |
|______|_|_.__/|_|  \__,_|_|   \__, | |_____/ \__, |___/\__\___|_| |_| |_|
                                __/ |          __/ |                      
                               |___/          |___/                                   
"@

Write-Host $header
Write-Host $subheader
Write-Host " "
Write-Host "<---------------------------------------------------------------------------------------------------->"
Write-Host "Developed by the College of Computer Studies - Moises Padilla Dev Team"
Write-Host "Software Developer I: CHARLIE PELINGON"
Write-Host "Software Developer I: JOHN BERLIN LEONOR"
Write-Host "<---------------------------------------------------------------------------------------------------->"
Write-Host " "
Write-Host "Please wait as we tinker the installation process for you"
Start-Sleep -Seconds 5

# Retrieve files and folders from the source folder
$files = Get-ChildItem -Path $sourceFolder -File
$folders = Get-ChildItem -Path $sourceFolder -Directory

# Calculate total count of items to be copied
$totalItems = ($files.Count + $folders.Count)
$progress = 0

# Copy files from the source folder to the destination folder
foreach ($file in $files) {
    $destinationPath = Join-Path -Path $destinationFolder -ChildPath $file.Name
    Copy-Item -Path $file.FullName -Destination $destinationPath -Force
    $progress++
    $percentComplete = ($progress / $totalItems) * 100
    Write-Progress -Activity "Copying Files" -Status "Copying file: $($file.Name)" -PercentComplete $percentComplete
}

# Copy folders and their contents from the source folder to the destination folder
foreach ($folder in $folders) {
    $destinationPath = Join-Path -Path $destinationFolder -ChildPath $folder.Name
    Copy-Item -Path $folder.FullName -Destination $destinationPath -Recurse -Force
    $progress++
    $percentComplete = ($progress / $totalItems) * 100
    Write-Progress -Activity "Copying Folders" -Status "Copying folder: $($folder.Name)" -PercentComplete $percentComplete
}

# Show congratulatory message
Write-Host " "
Write-Host "<---------------------------------------------------------------------------------------------------->"
Write-Host "Installation Process COMPLETE"
Write-Host "Do not forget to bring us a CUP OF COFFEE ;-)"
Write-Host "<----------------------------------------------------------------------------------------------------> "