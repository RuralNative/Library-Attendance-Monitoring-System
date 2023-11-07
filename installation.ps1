$sourceFolder = "C:\xampp\htdocs\Library"
$destinationFolder = "C:\Users\HP-PC\Documents\New folder"

# Show initial message
Write-Host "Starting the copying operation in 5 seconds..."
Start-Sleep -Seconds 5

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
Write-Host "Copying operation completed successfully!"