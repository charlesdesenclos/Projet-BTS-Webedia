#pragma once
#include <Windows.h>
#include "DasHard.h"

#include <QString>

#define DMX_MAXCHANNEL 512
class DMX
{

private: 


public :

	DMX();
	HINSTANCE g_dasusbdll;

	typedef int (*DASHARDCOMMAND)(int, int, unsigned char*);
	DASHARDCOMMAND DasUsbCommand;
	int interface_open;
	unsigned char dmxBlock[512];

	

	void test(int adress, int coleur_rouge, int couleur_bleu, int couleur_vert);

	
};


