@echo off
pushd .
cd %~dp0
cd "../vendor/behat/behat/bin"
set BIN_TARGET=%CD%\behat
popd
php "%BIN_TARGET%" %*
