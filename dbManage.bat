:start
chcp 65001
color a
title Quản Lý Server Database
set dir=%~dp0
cd %dir%
echo off
cls

:run
set "confile=./composition/dbInfor.conf"
set xamppPath=
set un=
set pw=
set dbname=
set dbPath=
for /f "tokens=1,* delims==" %%a in (%confile%) do (
    if "%%a"=="path" set xamppPath=%%b
    if "%%a"=="un" set un=%%b
    if "%%a"=="pw" set pw=%%b
    if "%%a"=="dbname" set dbname=%%b
    if "%%a"=="dbPath" set dbPath=%%b
)
echo ~THÔNG TIN HIỆN TẠI~
echo Xampp: %xamppPath%
echo Username: %un%
echo Password: %pw%
echo Database: %dbname%
echo Sql path: %dbPath%
echo --------------------------------------------------
echo -phím t để nhập truy vấn
echo -nhấn phím 1 để cài đặt cấu hình
echo -nhấn phím 2 để import file sql

choice /c t12 > nul
set "mode=%errorlevel%"
if "%mode%"=="2" goto config
if "%mode%"=="3" goto import
if "%mode%"=="1" set /p "query=Nhập query: "
set "cli=%xamppPath: =%mysql\bin\mysql.exe"

if not exist err.log echo. > err.log
set "log=err.log"
%cli% --user=%un: =% --password=%pw: =% --database=%dbname: =% --execute="%query%" 2>%log%

for /f "delims=" %%a in (%log%) do (
echo %%a
    if not "%%a"=="" (
        echo #########################################################################
        echo # truy vấn lỗi, vui lòng kiểm tra dữ liệu trong file config và câu lệnh #
        echo #########################################################################
        if exist err.log del err.log
        goto continue
    )
)
echo #######################
echo # truy vấn thành công #
echo #######################
if exist err.log del err.log
goto continue

:import
set "cli=%xamppPath: =%mysql\bin\mysqldump.exe"
echo Nhập file: %dbPath% (Y/N)?
choice /c yn > nul
set "mode=%errorlevel%"
if "%mode%"=="1" (
    %cli% --user=%un: =% --password=%pw: =% --databases=%dbname: =% < %dbPath: =%
    goto continue
)
if "%mode%"=="2" echo Bạn có muốn sửa thông tin config ^(Y/N^)?
choice /c yn > nul
set "mode=%errorlevel%"
if "%mode%"=="1" goto config
if "%mode%"=="2" goto continue

:config
echo Nhập các thông tin sau (Nhấn enter để bỏ qua):
set /p "newDbName=Nhập tên database cần truy vấn: "
set /p "newPath=Nhập đường dẫn mới tới xampp: "
set /p "newUn=Đặt username: "
set /p "newPw=Đặt password: "
set /p "newDbPath=Nhập đường dẫn mới tới sql file: "
if "%newPath%"=="" echo path^=%xamppPath% > %confile%
if not "%newPath%"=="" echo path^=%newPath% > %confile%
if "%newUn%"=="" echo un^=%un% >> %confile%
if not "%newUn%"=="" echo un^=%newUn% >> %confile%
if "%newPw%"=="" echo pw^=%pw% >> %confile%
if not "%newPw%"=="" echo pw^=%newPw% >> %confile%
if "%newDbName%"=="" echo dbname^=%dbname% >> %confile%
if not "%newDbName%"=="" echo dbname^=%newDbName% >> %confile%
if "%newDbPath%"=="" echo dbPath^=%dbPath% >> %confile%
if not "%newDbPath%"=="" echo dbPath^=%newDbPath% >> %confile%
echo Cập nhật thành công
goto run

:continue
echo #############
echo # Tiếp tục? #
echo #############
echo (Y/N):
choice /c yn > nul
set "mode=%errorlevel%"
if "%mode%"=="1" goto start
if "%mode%"=="2" goto stop
echo Nhập đúng định dạng
goto continue

:stop
exit