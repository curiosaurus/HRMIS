for /f "delims=" %%i in (kk.txt) do set c=%%i
start mongoimport --db companydb --collection user --type csv --file %c% --headerline && exit