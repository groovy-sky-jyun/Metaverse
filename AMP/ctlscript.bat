@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist D:\AMP\hypersonic\scripts\ctl.bat (start /MIN /B D:\AMP\server\hsql-sample-database\scripts\ctl.bat START)
if exist D:\AMP\ingres\scripts\ctl.bat (start /MIN /B D:\AMP\ingres\scripts\ctl.bat START)
if exist D:\AMP\mysql\scripts\ctl.bat (start /MIN /B D:\AMP\mysql\scripts\ctl.bat START)
if exist D:\AMP\postgresql\scripts\ctl.bat (start /MIN /B D:\AMP\postgresql\scripts\ctl.bat START)
if exist D:\AMP\apache\scripts\ctl.bat (start /MIN /B D:\AMP\apache\scripts\ctl.bat START)
if exist D:\AMP\openoffice\scripts\ctl.bat (start /MIN /B D:\AMP\openoffice\scripts\ctl.bat START)
if exist D:\AMP\apache-tomcat\scripts\ctl.bat (start /MIN /B D:\AMP\apache-tomcat\scripts\ctl.bat START)
if exist D:\AMP\resin\scripts\ctl.bat (start /MIN /B D:\AMP\resin\scripts\ctl.bat START)
if exist D:\AMP\jetty\scripts\ctl.bat (start /MIN /B D:\AMP\jetty\scripts\ctl.bat START)
if exist D:\AMP\subversion\scripts\ctl.bat (start /MIN /B D:\AMP\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist D:\AMP\lucene\scripts\ctl.bat (start /MIN /B D:\AMP\lucene\scripts\ctl.bat START)
if exist D:\AMP\third_application\scripts\ctl.bat (start /MIN /B D:\AMP\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist D:\AMP\third_application\scripts\ctl.bat (start /MIN /B D:\AMP\third_application\scripts\ctl.bat STOP)
if exist D:\AMP\lucene\scripts\ctl.bat (start /MIN /B D:\AMP\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist D:\AMP\subversion\scripts\ctl.bat (start /MIN /B D:\AMP\subversion\scripts\ctl.bat STOP)
if exist D:\AMP\jetty\scripts\ctl.bat (start /MIN /B D:\AMP\jetty\scripts\ctl.bat STOP)
if exist D:\AMP\hypersonic\scripts\ctl.bat (start /MIN /B D:\AMP\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist D:\AMP\resin\scripts\ctl.bat (start /MIN /B D:\AMP\resin\scripts\ctl.bat STOP)
if exist D:\AMP\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT D:\AMP\apache-tomcat\scripts\ctl.bat STOP)
if exist D:\AMP\openoffice\scripts\ctl.bat (start /MIN /B D:\AMP\openoffice\scripts\ctl.bat STOP)
if exist D:\AMP\apache\scripts\ctl.bat (start /MIN /B D:\AMP\apache\scripts\ctl.bat STOP)
if exist D:\AMP\ingres\scripts\ctl.bat (start /MIN /B D:\AMP\ingres\scripts\ctl.bat STOP)
if exist D:\AMP\mysql\scripts\ctl.bat (start /MIN /B D:\AMP\mysql\scripts\ctl.bat STOP)
if exist D:\AMP\postgresql\scripts\ctl.bat (start /MIN /B D:\AMP\postgresql\scripts\ctl.bat STOP)

:end

