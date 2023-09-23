@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist C:\Users\ok\Desktop\Metaverse\APM\hypersonic\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\server\hsql-sample-database\scripts\ctl.bat START)
if exist C:\Users\ok\Desktop\Metaverse\APM\ingres\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\ingres\scripts\ctl.bat START)
if exist C:\Users\ok\Desktop\Metaverse\APM\mysql\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\mysql\scripts\ctl.bat START)
if exist C:\Users\ok\Desktop\Metaverse\APM\postgresql\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\postgresql\scripts\ctl.bat START)
if exist C:\Users\ok\Desktop\Metaverse\APM\apache\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\apache\scripts\ctl.bat START)
if exist C:\Users\ok\Desktop\Metaverse\APM\openoffice\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\openoffice\scripts\ctl.bat START)
if exist C:\Users\ok\Desktop\Metaverse\APM\apache-tomcat\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\apache-tomcat\scripts\ctl.bat START)
if exist C:\Users\ok\Desktop\Metaverse\APM\resin\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\resin\scripts\ctl.bat START)
if exist C:\Users\ok\Desktop\Metaverse\APM\jetty\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\jetty\scripts\ctl.bat START)
if exist C:\Users\ok\Desktop\Metaverse\APM\subversion\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist C:\Users\ok\Desktop\Metaverse\APM\lucene\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\lucene\scripts\ctl.bat START)
if exist C:\Users\ok\Desktop\Metaverse\APM\third_application\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist C:\Users\ok\Desktop\Metaverse\APM\third_application\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\third_application\scripts\ctl.bat STOP)
if exist C:\Users\ok\Desktop\Metaverse\APM\lucene\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist C:\Users\ok\Desktop\Metaverse\APM\subversion\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\subversion\scripts\ctl.bat STOP)
if exist C:\Users\ok\Desktop\Metaverse\APM\jetty\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\jetty\scripts\ctl.bat STOP)
if exist C:\Users\ok\Desktop\Metaverse\APM\hypersonic\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist C:\Users\ok\Desktop\Metaverse\APM\resin\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\resin\scripts\ctl.bat STOP)
if exist C:\Users\ok\Desktop\Metaverse\APM\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT C:\Users\ok\Desktop\Metaverse\APM\apache-tomcat\scripts\ctl.bat STOP)
if exist C:\Users\ok\Desktop\Metaverse\APM\openoffice\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\openoffice\scripts\ctl.bat STOP)
if exist C:\Users\ok\Desktop\Metaverse\APM\apache\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\apache\scripts\ctl.bat STOP)
if exist C:\Users\ok\Desktop\Metaverse\APM\ingres\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\ingres\scripts\ctl.bat STOP)
if exist C:\Users\ok\Desktop\Metaverse\APM\mysql\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\mysql\scripts\ctl.bat STOP)
if exist C:\Users\ok\Desktop\Metaverse\APM\postgresql\scripts\ctl.bat (start /MIN /B C:\Users\ok\Desktop\Metaverse\APM\postgresql\scripts\ctl.bat STOP)

:end

