@ECHO OFF
echo check if nodejs is existing and working well
node --version
IF %ERRORLEVEL% EQU 0 (
    echo "YES"
)
::echo %ERRORLEVEL%
