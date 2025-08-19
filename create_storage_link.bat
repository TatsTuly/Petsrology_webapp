@echo off
echo Creating storage link for Windows...
cd /d "c:\xampp\htdocs\Petsrology_webapp"

REM Create storage directory in public if it doesn't exist
if not exist "public\storage" (
    mkdir "public\storage"
    echo Created public\storage directory
)

REM Create vet_profiles directory in public\storage
if not exist "public\storage\vet_profiles" (
    mkdir "public\storage\vet_profiles"
    echo Created public\storage\vet_profiles directory
)

REM Copy files from storage\app\public to public\storage
xcopy /E /Y "storage\app\public\*" "public\storage\"
echo Copied files to public storage

echo Done!
pause
