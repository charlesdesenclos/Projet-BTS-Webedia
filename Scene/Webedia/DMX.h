#pragma once

#include <qwindowdefs_win.h>
#include <Windows.h>
#include <DasHard.h>
#include <QtSql>

#include <QSqlDatabase>
#include <QSqlQuery>

#define DMX_MAXCHANNEL 512

class DMX
{
private :
	HINSTANCE g_dasusbdll;
	typedef int(*DASHARDCOMMAND)(int, int, unsigned char*);
	DASHARDCOMMAND DasUsbCommand;
	int interface_open;
	unsigned char dmxBlock[DMX_MAXCHANNEL];
public : 
	DMX();
	QSqlDatabase ConnexionBDD();
	void SendTrame();
	/*int Requeteselect(QSqlDatabase db);*/
	/*QVector<int> Requeteselect(QSqlDatabase db);*/
	int* RequeteselectAdress(QSqlDatabase db, int& taille_tableau_resultat);
	int* RequeteselectValeur(QSqlDatabase db, int& taille_tableau_resultat);
	

};

