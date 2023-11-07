$sourceFolder = "C:\xampp\htdocs\Library"
$destinationFolder = "C:\Users\HP-PC\Documents\New folder"

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
Write-Host "------------------------------------------------------------------------------------------------------"
Write-Host "Developed by the College of Computer Studies - Moises Padilla Dev Team"
Write-Host "Software Developer I: CHARLIE PELINGON"
Write-Host "Software Developer I: JOHN BERLIN LEONOR"
Write-Host "------------------------------------------------------------------------------------------------------"
Write-Host "Please wait as we tinker the installation process for you"
Start-Sleep -Seconds 10

# Copy files from the source folder to the destination folder
$files = Get-ChildItem -Path $sourceFolder -File
$fileCount = $files.Count
$progress = 0

foreach ($file in $files) {
    $destinationPath = Join-Path -Path $destinationFolder -ChildPath $file.Name
    Copy-Item -Path $file.FullName -Destination $destinationPath -Verbose
    $progress++
    $percentComplete = ($progress / $fileCount) * 100
    Write-Progress -Activity "Copying Files" -Status "Progress" -PercentComplete $percentComplete
    Write-Host "Copying file: $($file.Name)"
}

# Copy folders and their contents from the source folder to the destination folder
$folders = Get-ChildItem -Path $sourceFolder -Directory
$folderCount = $folders.Count
$progress = 0

foreach ($folder in $folders) {
    $destinationPath = Join-Path -Path $destinationFolder -ChildPath $folder.Name
    Copy-Item -Path $folder.FullName -Destination $destinationPath -Recurse -Verbose
    $progress++
    $percentComplete = ($progress / $folderCount) * 100
    Write-Progress -Activity "Copying Folders" -Status "Progress" -PercentComplete $percentComplete
    Write-Host "Copying folder: $($folder.Name)"
}

# Show congratulatory message
Write-Host ""
Write-Host "------------------------------------------------------------------------------------------------------"
Write-Host "Installation Process COMPLETE"
Write-Host "Do not forget to bring us a CUP OF COFFEE ;-)"
Write-Host "------------------------------------------------------------------------------------------------------"