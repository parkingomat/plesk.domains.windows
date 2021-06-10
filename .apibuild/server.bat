@ECHO OFF
echo I will start NODEJS serverfor this project ...
WHERE node
IF %ERRORLEVEL% NEQ 0 (
    echo nodejs is not installed on this system!
) else (
    ::node server.js
    forever start server.js
)
