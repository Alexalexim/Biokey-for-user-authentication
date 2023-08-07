NET STOP wampapache
.\bin\apache\apache2.2.8\bin\httpd.exe -k uninstall -n wampapache
NET STOP wampmysqld 
.\bin\mysql\mysql5.0.51b\bin\mysqld-nt.exe --remove wampmysqld
wampmanager.exe -quit -id={wampserver}