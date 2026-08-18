@echo off
:: Cambia esta ruta por la carpeta real de tu proyecto
cd /d "D:\xampp\htdocs\Optimus"
: Cambio a la cuenta optimusecuador
git config credential.username optimusecuador

:loop
echo [%date% %time%] Verificando y subiendo cambios a GitHub...

:: Agrega todos los cambios
git add .

:: Guarda los cambios con un mensaje que incluye la fecha y hora
git commit -m "Actualizacion Automatica: %date% %time%"

:: Envía los cambios a la rama principal
git push origin main

echo Subida finalizada. Esperando 1 hora...
echo.

:: Espera 3600 segundos (1 hora) y vuelve a iniciar el bucle
timeout /t 3600 /nobreak > nul
goto loop