#include "DMX.h"


void DMX::initDMX()
{
	g_dasusbdll = LoadLibrary(L"DasHard2006.dll");

	interface_open = DasUsbCommand(DHC_INIT, 0, NULL);


	interface_open = DasUsbCommand(DHC_OPEN, 0, 0);
	
	if (interface_open > 0)
	{
		int i;
		for (i = 0; i < DMX_MAXCHANNEL + 1; i++) 
		{
			dmxBlock[i] = 0;
		}
	}

	DasUsbCommand(DHC_DMXOUT, DMX_MAXCHANNEL, dmxBlock);

}