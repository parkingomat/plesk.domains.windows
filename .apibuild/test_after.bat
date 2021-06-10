@ECHO OFF
echo check if service on port 3001 is working
netstat -ano|findstr "PID :3001"
IF %ERRORLEVEL% EQU 0 (
    echo "YES"
)
::echo %ERRORLEVEL%
