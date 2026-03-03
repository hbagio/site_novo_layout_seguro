@echo off
:: Se o script não foi iniciado minimizado, ele reinicia a si mesmo minimizado
if not "%1" == "min" start /min "" "%~0" min & exit

TITLE Servidor Laravel - Bagio Seguros

echo ==============================================
echo   INICIANDO AMBIENTE (Apache + MySQL + PHP)
echo ==============================================

:: 1. Iniciar Apache e MySQL em segundo plano (sem abrir janelas extras)
echo [1/3] Ativando servicos do XAMPP...
start /b "" "C:\xampp\apache\bin\httpd.exe"
start /b "" "C:\xampp\mysql\bin\mysqld.exe"

:: 2. Aguardar o banco de dados estabilizar
timeout /t 8 /nobreak > NUL

:: 3. Abrir o navegador
echo [2/3] Abrindo aplicacao no navegador...
start http://127.0.0.1:8000

:: 4. Rodar o Laravel na mesma janela
echo [3/3] Iniciando PHP Artisan Serve...
echo.
echo Mantenha esta janela aberta para manter o site online.
echo.

:: ALTERE O CAMINHO ABAIXO PARA A PASTA DO SEU PROJETO
cd /d "C:\caminho\para\seu\projeto\laravel"
php artisan serve