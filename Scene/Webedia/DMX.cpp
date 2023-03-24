﻿#include "DMX.h"
#include <qt_windows.h>

DMX::DMX()
{
	//Chargement de la DLL
	g_dasusbdll = LoadLibrary(L"DasHard2006.dll");
	//Verification du chargement
	if (g_dasusbdll)
	DasUsbCommand = (DASHARDCOMMAND)::GetProcAddress((HMODULE)g_dasusbdll, "DasUsbCommand");
		//Initialisation de la DLL
		interface_open = DasUsbCommand(DHC_INIT, 0, NULL);
	//On affiche la version de la DLL qui est retourn�e par DasUSBCommand DHC INIT
	
	//On ouvre la liaison avec l'interface USB -1 si on ne trouve pas le port USB
	//retourn DHC-OK = 1 si USB connect�
	interface_open = DasUsbCommand(DHC_OPEN, 0, 0);
	
	//Envoi D'une Trame DMX
	//pour test je force USB meme si pas branch�
	//interface_open = 1;
	if (interface_open > 0)
	{
		// Param�tre : Commande DHC_DMXOUT, Taille Block 512 , Trame dmxbloc Pointeur
		// dmxBlock[512] est d�clar� en global dans le .h
		// Mais il faut creer la trame
		int i;
		for (i = 0; i < DMX_MAXCHANNEL + 1; i++) {
			dmxBlock[i] = 255;
		}

		DasUsbCommand(DHC_DMXOUT, DMX_MAXCHANNEL, dmxBlock);
	}
}
/*
//---------------------------------------------------------------------------
void __fastcall TForm1::SendTrame() {
	if (interface_open > 0)
	{
		try {
			DasUsbCommand(DHC_DMXOUT, DMX_MAXCHANNEL, dmxBlock);
		}
		catch (int x)
		{
		}
	}
}
void __fastcall TForm1::FormClose(TObject *Sender, TCloseAction &Action)
{
	//Fermeture du DMX � l'arret du programme
	if (interface_open > 0) {
		DasUsbCommand(DHC_CLOSE, 0, 0);
		DasUsbCommand(DHC_EXIT, 0, NULL);
	}
	if (g_dasusbdll != NULL)
		FreeLibrary(g_dasusbdll);
}
//---------------------------------------------------------------------------
void __fastcall TForm1::Timer1Timer(TObject *Sender)
{
	SendTrame();
}
//---------------------------------------------------------------------------
void __fastcall TForm1::btnForceUSBClick(TObject *Sender)
{
	interface_open = 1;
}
//---------------------------------------------------------------------------
void __fastcall TForm1::TrackBar1Change(TObject *Sender)
{
	dmxBlock[1] = TrackBar1->Position;
}
//---------------------------------------------------------------------------
*/
void DMX::SendTrame()
{
}
