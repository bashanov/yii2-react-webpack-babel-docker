CREATE USER 'newuser'@'%' IDENTIFIED BY 'newpassword';
GRANT ALL ON *.* TO 'newuser'@'%' WITH GRANT OPTION;