@echo off

set base=base_urltemp

set login_type=Maker
:Retryy
	echo 1) For Maker (Sachiv)
	echo 2) For Checker (Pradhan)
	set /p login_type_number=Enter login Type Number 1 Or 2=
	if "%login_type_number%" == "1"  (
		set login_type=Maker
	) else (
		if "%login_type_number%" == "2"  (
			set login_type=Checker
		) else (
			cls
			goto :Retryy
		)
	)

echo %login_type%

:Retry
	set /p gram_sachiwalaya_id=Enter Gram Sachiwalaya Id=
	curl -k -o response.txt -X GET %base%/checkGramSachiwalayaId/%gram_sachiwalaya_id%/%login_type_number%
	set /p response=<response.txt
	del response.txt
	echo %response%
    if NOT "%response%" == "OK" (
        goto :Retry
    )

echo Getting System Information.

echo ##START GramSachiwalayaId## > tempfile.txt
echo GramSachiwalayaId : %gram_sachiwalaya_id% >> tempfile.txt
echo ##END GramSachiwalayaId## >> tempfile.txt

echo ##START GramSachiwalayaType## >> tempfile.txt
echo GramSachiwalayaType : %login_type_number% >> tempfile.txt
echo ##END GramSachiwalayaType## >> tempfile.txt


echo ##START MACADDRESS## >> tempfile.txt
powershell -Command "Get-WmiObject Win32_NetworkAdapterConfiguration | Where {$_.IPEnabled -eq 'True' -AND $_.DHCPEnabled -eq 'True'} | Select Description,MACAddress,IPAddress  | Format-list *" >> tempfile.txt
echo ##END MACADDRESS## >> tempfile.txt



echo ##START ComputerSystemProduct## >> tempfile.txt
powershell -Command "Get-WmiObject -Class Win32_ComputerSystemProduct | Format-List *" >> tempfile.txt
echo ##END ComputerSystemProduct## >> tempfile.txt

echo ##START BIOS## >> tempfile.txt
powershell -Command "Get-WmiObject -Class Win32_BIOS | Format-List *" >> tempfile.txt
echo ##END BIOS## >> tempfile.txt

echo ##START ComputerSystem## >> tempfile.txt
powershell -Command "Get-WmiObject -Class Win32_ComputerSystem | Format-List *" >> tempfile.txt
echo ##END ComputerSystem## >> tempfile.txt

echo ##START OperatingSystem## >> tempfile.txt
powershell -Command "Get-WmiObject -Class Win32_OperatingSystem | Format-List *" >> tempfile.txt
echo ##END OperatingSystem## >> tempfile.txt



echo ##START DigitalSignerService## >> tempfile.txt
powershell -Command "ps | Select Handles,NPM,PM,WS,CPU,Id,SI,ProcessName,starttime,@{Name = 'Timestamp'; Expression = ({(Get-Date)})} | Where {$_.ProcessName -Like 'DigitalSignerService*'}" >> tempfile.txt
echo ##END DigitalSignerService## >> tempfile.txt


echo ##START PUBLIC IP## >> tempfile.txt
nslookup myip.opendns.com resolver1.opendns.com >> tempfile.txt
echo ##END PUBLIC IP## >> tempfile.txt


echo ##START IPCONFIG## >> tempfile.txt
ipconfig/all >> tempfile.txt
echo ##END IPCONFIG## >> tempfile.txt

echo ##START Processor## >> tempfile.txt
powershell -Command "Get-WmiObject -Class Win32_Processor | Format-List *" >> tempfile.txt
echo ##END Processor## >> tempfile.txt

echo ##START BaseBoard## >> tempfile.txt
powershell -Command "Get-WmiObject -Class Win32_BaseBoard | Format-List *" >> tempfile.txt
echo ##END BaseBoard## >> tempfile.txt

echo ##START NetworkAdapterConfiguration## >> tempfile.txt
powershell -Command "Get-WmiObject -Class Win32_NetworkAdapterConfiguration | Format-List *" >> tempfile.txt
echo ##END NetworkAdapterConfiguration## >> tempfile.txt

echo ##START LogicalDisk## >> tempfile.txt
powershell -Command "Get-WmiObject -Class Win32_LogicalDisk | Format-List *" >> tempfile.txt
echo ##END LogicalDisk## >> tempfile.txt

echo ##START PhysicalMemory## >> tempfile.txt
powershell -Command "Get-WmiObject -Class Win32_PhysicalMemory | Format-List *" >> tempfile.txt
echo ##END PhysicalMemory## >> tempfile.txt

echo ##START DiskDrive## >> tempfile.txt
powershell -Command "Get-WmiObject -Class Win32_DiskDrive | Format-List *" >> tempfile.txt
echo ##END DiskDrive## >> tempfile.txt

echo ##START PnpDeviceUsbCdrom## >> tempfile.txt
powershell -Command " Get-PnpDevice -PresentOnly | Where-Object {  $_.InstanceId -match '^USB' -and $_.Class -match '^CDROM'  } | Format-list -property *" >> tempfile.txt
echo ##END PnpDeviceUsbCdrom## >> tempfile.txt


:RetryDsc
	echo Checking %login_type% DSC.     
	powershell -Command "Get-ChildItem Cert:\CurrentUser\My | Where { ($_.Subject -like '*O=Personal*' -or $_.Subject -like '*O=MAHATMA GANDHI NATIONAL RURAL EMPLOYMENT GUARANTEE ACT*' -or $_.Subject -like '*O=RURAL DEVELOPMENT*' -or $_.Subject -like '*O=PANCHAYAT RAJ DEPARTMENT*' -or $_.Subject -like '*O=PANCHAYATI RAJ UP*' -or $_.Subject -like '*O=BLOCK DEVELOPMENT OFFICE*' -or $_.Subject -like '*O=GRAM VIKAS VIBHAG*' -or $_.Subject -like '*O=ZILA PANCHAYAT BIDAR*' -or $_.Subject -like '*O=UTTAR PRADESH PANCHAYAT AURAIYA*' -or $_.Subject -like '*O=PANCHAYTI RAJ VIBHAG*' -or $_.Subject -like '*O=ZILA VIKAS ADHIKARI*') } | Select PSPath,PSDrive,NotAfter,NotBefore,HasPrivateKey,SerialNumber,Thumbprint,Version,Handle,Issuer,Subject  | Format-list -Property *" > dsctempfile.txt
	for /f %%i in ("dsctempfile.txt") do set size=%%~zi
	if %size% lss 1 (
		set /p dsc_insert=%login_type% DSC Not Found. Please Insert %login_type% DSC and hit enter!
		goto :RetryDsc
	)
	echo ##START DSC## >> tempfile.txt
	type dsctempfile.txt >> tempfile.txt
	echo ##END DSC## >> tempfile.txt
	del dsctempfile.txt

echo ##START PnpDeviceWPD## >> tempfile.txt
powershell -Command "Get-PnpDevice -PresentOnly | Where {$_.Class -eq 'WPD'} | Format-list -property *" >> tempfile.txt
echo ##END PnpDeviceWPD## >> tempfile.txt











curl -k -o response.txt -X POST -H "Content-Type: multipart/form-data" -F "fileToUpload=@tempfile.txt" -F "gram_sachiwalaya_id=%gram_sachiwalaya_id%" -F "login_type_number=%login_type_number%" %base%
set /p response=<response.txt
del response.txt
set substr=%base%/settoken?t=
call set replaced=%%response:%substr%=%%

if NOT "%replaced%"=="%response%" ( 
	rem echo OK 
) else ( 
	rem echo error
	echo %response%
    set /p enter=!
	goto :eof
)

echo Checking Browser.
%SystemRoot%\System32\reg.exe query "HKLM\Software\Microsoft\Windows\CurrentVersion\App Paths\chrome.exe" >nul 2>&1
if not errorlevel 1 ( start "chrome.exe" %response% ) else ( start "" %response% )

rem set /p input=Enter Any Key For Exit.
del tempfile.txt
del gram_sachiwalaya.bat 



