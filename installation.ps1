$sourceFolder = "C:\xampp\htdocs\Library"
$destinationFolder = "C:\Users\HP-PC\Documents\New folder"

# Get all files in the source folder
$files = Get-ChildItem -Path $sourceFolder -File

# Move each file to the destination folder
foreach ($file in $files) {
    Move-Item -Path $file.FullName -Destination $destinationFolder
}