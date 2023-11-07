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

$author = @"




 __ \                  |                      |  |             ___|  ___|  ___|           \  |      _)                  _ \           |_) | |        __ \                  |                                  |   __ __|                      
 |   |  _ \\ \   / _ \ |  _ \  __ \   _ \  _` |  __ \  |   |  |     |    \___ \          |\/ |  _ \  |  __|  _ \  __|  |   | _` |  _` | | | |  _` |  |   |  _ \\ \   / _ \ |  _ \  __ \  __ `__ \   _ \ __ \  __|    |  _ \  _` | __ `__ \ _) 
 |   |  __/ \ \ /  __/ | (   | |   |  __/ (   |  |   | |   |  |     |          | _____|  |   | (   | |\__ \  __/\__ \  ___/ (   | (   | | | | (   |  |   |  __/ \ \ /  __/ | (   | |   | |   |   |  __/ |   | |      |  __/ (   | |   |   |   
____/ \___|  \_/ \___|_|\___/  .__/ \___|\__,_| _.__/ \__, | \____|\____|_____/         _|  _|\___/ _|____/\___|____/ _|   \__,_|\__,_|_|_|_|\__,_| ____/ \___|  \_/ \___|_|\___/  .__/ _|  _|  _|\___|_|  _|\__|   _|\___|\__,_|_|  _|  _|_) 
                              _|                      ____/                                                                                                                       _|                                                          
   \     ___| |                |_)        _ \      |_)                         
\    /  |     __ \   _` |  __| | |  _ \  |   | _ \ | | __ \   _` |  _ \  __ \  
 _  _\  |     | | | (   | |    | |  __/  ___/  __/ | | |   | (   | (   | |   | 
  \/   \____|_| |_|\__,_|_|   _|_|\___| _|   \___|_|_|_|  _|\__, |\___/ _|  _| 
                                                            |___/              
   \        |       |            __ )            |_)        |                                 
\    /      |  _ \  __ \  __ \   __ \   _ \  __| | | __ \   |      _ \  _ \  __ \   _ \   __| 
 _  _\  \   | (   | | | | |   |  |   |  __/ |    | | |   |  |      __/ (   | |   | (   | |    
  \/   \___/ \___/ _| |_|_|  _| ____/ \___|_|   _|_|_|  _| _____|\___|\___/ _|  _|\___/ _|    
                                                                                                        
"@

Write-Host $header
Write-Host $header
Write-Host $author


Write-Host "Please wait as we prepare the installation process"
Start-Sleep -Seconds 10

# Copy files from the source folder to the destination folder
$fileCount = (Get-ChildItem -Path $sourceFolder -File).Count
$progress = 0

Get-ChildItem -Path $sourceFolder -File | ForEach-Object {
    $destinationPath = Join-Path -Path $destinationFolder -ChildPath $_.Name
    Copy-Item -Path $_.FullName -Destination $destinationPath -Verbose
    $progress++
    $percentComplete = ($progress / $fileCount) * 100
    Write-Progress -Activity "Copying Files" -Status "Progress" -PercentComplete $percentComplete
}

# Copy folders and their contents from the source folder to the destination folder
$folderCount = (Get-ChildItem -Path $sourceFolder -Directory).Count
$progress = 0

Get-ChildItem -Path $sourceFolder -Directory | ForEach-Object {
    $destinationPath = Join-Path -Path $destinationFolder -ChildPath $_.Name
    Copy-Item -Path $_.FullName -Destination $destinationPath -Recurse -Verbose
    $progress++
    $percentComplete = ($progress / $folderCount) * 100
    Write-Progress -Activity "Copying Folders" -Status "Progress" -PercentComplete $percentComplete
}

# Show congratulatory message
Write-Host "Installation Process COMPLETE"