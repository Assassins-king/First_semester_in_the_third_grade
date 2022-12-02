echo CREATE DATABASE `tpadmin`; > ____data.sql
echo SET PASSWORD FOR 'root'@'localhost'='123456'; >> ____data.sql
..\..\bin\mysql\mysql5.7.24\bin\mysql -uroot < ____data.sql
del ____data.sql
..\..\bin\php\php7.2.14\php.exe think migrate:run
..\..\bin\php\php7.2.14\php.exe think seed:run
echo ²Ù×÷Íê³É
pause
