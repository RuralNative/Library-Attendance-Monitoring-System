$sourceFolder = "C:\xampp\htdocs\Library"
$destinationFolder = "C:\Users\HP-PC\Documents\New folder"

# Copy files from the source folder to the destination folder
Get-ChildItem -Path $sourceFolder -File | Copy-Item -Destination $destinationFolder -Verbose

# Copy folders and their contents from the source folder to the destination folder
Get-ChildItem -Path $sourceFolder -Directory | ForEach-Object {
    $destinationPath = Join-Path -Path $destinationFolder -ChildPath $_.Name
    Copy-Item -Path $_.FullName -Destination $destinationPath -Recurse -Verbose
}