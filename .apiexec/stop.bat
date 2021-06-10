#!/bin/bash
echo "I will stop the nodejs application ..."
::taskkill /im node.exe
::forever start server.js
taskkill /f /im node.exe
