#pragma once
#include "DasHard.h"

#define DMX_MAXCHANNEL 512
class DMX
{

private: 


public :

	HINSTANCE g_dasusbdll;
	typedef int (*DASHARDCOMMAND)(int, int, unsigned char*);
	DASHARDCOMMAND DasUsbCommand;
	int interface_open;
	unsigned char dmxBlock[512];




};

