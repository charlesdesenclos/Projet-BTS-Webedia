#include <iostream>
#include <windows.h>
#include <string>
#include <vector>


std::vector<std::wstring> getAvailablePorts()
{
    std::vector<std::wstring> ports;

    // Enumération des ports série disponibles
    DWORD numPorts = 0;
    TCHAR lpTargetPath[MAX_PATH];
    for (DWORD i = 0; i < 255; ++i)
    {
        std::wstring portName = L"COM" + std::to_wstring(i);
        DWORD res = QueryDosDevice(portName.c_str(), lpTargetPath, sizeof(lpTargetPath));
        if (res != 0)
        {
            ports.push_back(portName);
        }
    }

    return ports;
}

HANDLE connectToArduino(const std::wstring& portName)
{
    std::wstring portPrefix = L"\\\\.\\";
    std::wstring fullPortName = portPrefix + portName;

    HANDLE hSerial = CreateFile(fullPortName.c_str(), GENERIC_READ | GENERIC_WRITE, 0, NULL, OPEN_EXISTING, FILE_ATTRIBUTE_NORMAL, NULL);
    if (hSerial == INVALID_HANDLE_VALUE)
    {
        std::wcerr << L"Impossible de se connecter au port " << portName << std::endl;
        return INVALID_HANDLE_VALUE;
    }

    // Configuration du port série
    DCB dcbSerialParams = { 0 };
    dcbSerialParams.DCBlength = sizeof(dcbSerialParams);
    if (!GetCommState(hSerial, &dcbSerialParams))
    {
        std::wcerr << L"Erreur lors de la recuperation de la configuration du port serie." << std::endl;
        CloseHandle(hSerial);
        return INVALID_HANDLE_VALUE;
    }

    dcbSerialParams.BaudRate = CBR_9600;  // Définissez la vitesse de communication souhaitée ici
    dcbSerialParams.ByteSize = 8;
    dcbSerialParams.StopBits = ONESTOPBIT;
    dcbSerialParams.Parity = NOPARITY;
    if (!SetCommState(hSerial, &dcbSerialParams))
    {
        std::wcerr << L"Erreur lors de la configuration du port serie." << std::endl;
        CloseHandle(hSerial);
        return INVALID_HANDLE_VALUE;
    }

    // Configuration des timeouts
    COMMTIMEOUTS timeouts = { 0 };
    timeouts.ReadIntervalTimeout = 50;
    timeouts.ReadTotalTimeoutConstant = 50;
    timeouts.ReadTotalTimeoutMultiplier = 10;
    timeouts.WriteTotalTimeoutConstant = 50;
    timeouts.WriteTotalTimeoutMultiplier = 10;
    if (!SetCommTimeouts(hSerial, &timeouts))
    {
        std::wcerr << L"Erreur lors de la configuration des timeouts." << std::endl;
        CloseHandle(hSerial);
        return INVALID_HANDLE_VALUE;
    }

    return hSerial;
}



void readSerialData(HANDLE hSerial) {
    const int bufferSize = 256;
    char buffer[bufferSize];
    DWORD bytesRead;
    std::string receivedData;

    if (ReadFile(hSerial, buffer, bufferSize - 1, &bytesRead, NULL)) {
        buffer[bytesRead] = '\0';
        receivedData = buffer;

        // Extraction des valeurs des potentiomètres
        size_t commaPos = receivedData.find(",");
        if (commaPos != std::string::npos) {
            std::string value1 = receivedData.substr(0, commaPos);
            std::string value2 = receivedData.substr(commaPos + 1);

            std::cout << "Valeur du potentiometre 1 : " << value1 << std::endl;
            std::cout << "Valeur du potentiometre 2 : " << value2 << std::endl;
        }
    }
}

void handleSerialData(HANDLE hSerial) {
    const int bufferSize = 256;
    char buffer[bufferSize];
    DWORD bytesRead;
    std::string receivedData;

    if (ReadFile(hSerial, buffer, bufferSize - 1, &bytesRead, NULL)) {
        buffer[bytesRead] = '\0';
        receivedData = buffer;

        if (receivedData.find('1') != std::string::npos) {
            std::cout << "Bouton poussoir appuye !" << std::endl;
            // Faites ce que vous voulez lorsque le bouton est appuyé
        }
    }
}

int main()
{
    std::vector<std::wstring> ports = getAvailablePorts();

    if (ports.empty())
    {
        std::wcerr << L"Aucun port serie disponible." << std::endl;
        return 1;
    }

    std::wcout << L"Ports disponibles : " << std::endl;
    for (const auto& port : ports)
    {
        std::wcout << port << std::endl;
    }

    std::wstring selectedPort = ports[0];  // Utilisez le premier port disponible par défaut
    std::wcout << L"Connexion au port : " << selectedPort << std::endl;

    HANDLE hSerial = connectToArduino(selectedPort);
    if (hSerial == INVALID_HANDLE_VALUE)
    {
        std::wcerr << L"echec de la connexion à l'Arduino." << std::endl;
        return 1;
    }

    std::wcout << L"Connecte a l'Arduino !" << std::endl;

    



    while (true) {
        readSerialData(hSerial);
        handleSerialData(hSerial);
        // Ajoutez d'autres traitements ou logique selon vos besoins
    }




    // Fermeture de la connexion
    CloseHandle(hSerial);

    return 0;
}
