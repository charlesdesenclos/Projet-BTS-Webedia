#include "DMX.h"


DMX::DMX()
{
	g_dasusbdll = LoadLibrary(L"DasHard2006.dll");

	if (g_dasusbdll) {
		DasUsbCommand = (DASHARDCOMMAND)::GetProcAddress((HMODULE)g_dasusbdll, "DasUsbCommand");
	}

	interface_open = DasUsbCommand(DHC_INIT, 0, NULL);
	interface_open = DasUsbCommand(DHC_OPEN, 0, 0);

	if (interface_open > 0)
	{
		for (int i = 0; i < DMX_MAXCHANNEL + 1; i++) {
			dmxBlock[i] = 0;
		}
		DasUsbCommand(DHC_DMXOUT, DMX_MAXCHANNEL, dmxBlock);
	}

}

void DMX::test(int adress, int couleur_rouge, int couleur_bleu, int couleur_vert)
{
	QString nb2 = QString::number(255);
	dmxBlock[adress] = couleur_rouge;
	dmxBlock[adress] = couleur_bleu;
	dmxBlock[adress] = couleur_vert;
	DasUsbCommand(DHC_DMXOUT, DMX_MAXCHANNEL, dmxBlock);
}