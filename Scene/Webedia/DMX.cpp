#include "DMX.h"
#include "Webedia.h"
#include <qt_windows.h>
#include <iostream>
#include <vector>


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
		int* tableau_resultatAdress = nullptr;
		int taille_tableau_resultatAdress = 0;
		tableau_resultatAdress = RequeteselectAdress(ConnexionBDD(), taille_tableau_resultatAdress);

		int* tableau_resultatValeurs = nullptr;
		int taille_tableau_resultatValeurs = 0;
		tableau_resultatValeurs = RequeteselectValeur(ConnexionBDD(), taille_tableau_resultatValeurs);


		qDebug() << tableau_resultatAdress;
		qDebug() << tableau_resultatValeurs;

		int taille_max = qMax(taille_tableau_resultatAdress, taille_tableau_resultatValeurs);

		for (int i = 1; i < taille_max; i++)
		{
			if (i < taille_tableau_resultatAdress)
			{
				int adresse = tableau_resultatAdress[i];
				if (adresse < DMX_MAXCHANNEL)
				{
					if (i < taille_tableau_resultatValeurs)
					{
						int valeur = tableau_resultatValeurs[i];
						dmxBlock[adresse] = valeur;
						qInfo() << "1;" << dmxBlock[adresse];
						qInfo() << "2 :" << valeur;
					}
					else
					{
						dmxBlock[adresse] = 0; // Valeur par défaut si aucune valeur associée
					}
				}
				else
				{
					qWarning() << "Adresse DMX hors limite : " << adresse;
				}
			}
			else
			{
				qWarning() << "Index de tableau hors limite : " << i;
			}
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



QSqlDatabase DMX::ConnexionBDD()
{
	QString Host = "192.168.64.157";
	QString Name = "Webedia";
	QString User = "arduino";
	QString Pass = "arduino";


	QSqlDatabase db = QSqlDatabase::addDatabase("QMYSQL");
	db.setHostName(Host);
	db.setDatabaseName(Name);
	db.setUserName(User);
	db.setPassword(Pass);

	return db;



}

//const int TAILLE_TABLEAU = 512;


/*int DMX::Requeteselect(QSqlDatabase db)
{
	int tableau_resultat[TAILLE_TABLEAU] = {};
	int res;
	QSqlQuery query;

	if (db.open()) {
		res = query.exec("SELECT champs.adress AS adressChamps, canaux.valeur AS valeurCanaux FROM scene, canaux, champs WHERE scene.id = canaux.idscene AND champs.idCanaux = canaux.id;");
		int index = 0;
		while ((res = query.next()) && index < TAILLE_TABLEAU) {
			QString adress = query.value(0).toString();
			QString	valeur = query.value(1).toString();

			tableau_resultat[index] = adress.toInt();
			tableau_resultat[index + 1] = valeur.toInt();
			index += 2;
		}
		db.close();
		return tableau_resultat[index];
	}
	else {
		qInfo() << "Error BDD";
	}
}
*/

/*QVector<int> DMX::Requeteselect(QSqlDatabase db)
{
	QVector<int> tableau_resultat;
	QSqlQuery query;

	if (db.open()) {
		if (query.exec("SELECT champs.adress AS adressChamps, canaux.valeur AS valeurCanaux FROM scene, canaux, champs WHERE scene.id = canaux.idscene AND champs.idCanaux = canaux.id;")) {
			while (query.next()) {
				QString adress = query.value(0).toString();
				QString valeur = query.value(1).toString();

				tableau_resultat.append(adress.toInt());
				tableau_resultat.append(valeur.toInt());
			}
		}
		else {
			qInfo() << "Error executing query:" << query.lastError().text();
		}
		db.close();
	}
	else {
		qInfo() << "Error opening database";
	}

	return tableau_resultat;
}
*/

int* DMX::RequeteselectAdress(QSqlDatabase db, int& taille_tableau_resultat)
{
	int* tableau_resultat = nullptr;
	QSqlQuery query;

	if (db.open()) {
		if (query.exec("SELECT champs.adress AS adressChamps FROM scene, canaux, champs WHERE scene.id = canaux.idscene AND champs.idCanaux = canaux.id")) {
			taille_tableau_resultat = 0;
			while (query.next()) {
				QString adress = query.value(0).toString();
				taille_tableau_resultat++;
				int* nouveau_tableau_resultat = new int[taille_tableau_resultat];
				if (tableau_resultat) {
					memcpy(nouveau_tableau_resultat, tableau_resultat, (taille_tableau_resultat - 1) * sizeof(int));
					delete[] tableau_resultat;
				}
				nouveau_tableau_resultat[taille_tableau_resultat - 1] = adress.toInt();
				tableau_resultat = nouveau_tableau_resultat;
			}
		}
		else {
			qInfo() << "Error executing query:" << query.lastError().text();
		}
		db.close();
	}
	else {
		qInfo() << "Error opening database";
	}

	return tableau_resultat;
}


int* DMX::RequeteselectValeur(QSqlDatabase db, int& taille_tableau_resultat)
{
	int* tableau_resultat = nullptr;
	QSqlQuery query;

	if (db.open()) {
		if (query.exec("SELECT canaux.valeur AS valeurCanaux FROM scene, canaux WHERE scene.id = canaux.idscene")) {
			taille_tableau_resultat = 0;
			while (query.next()) {
				QString valeur = query.value(0).toString();
				taille_tableau_resultat++;
				int* nouveau_tableau_resultat = new int[taille_tableau_resultat];
				if (tableau_resultat) {
					memcpy(nouveau_tableau_resultat, tableau_resultat, (taille_tableau_resultat - 1) * sizeof(int));
					delete[] tableau_resultat;
				}
				nouveau_tableau_resultat[taille_tableau_resultat - 1] = valeur.toInt();
				tableau_resultat = nouveau_tableau_resultat;
			}
		}
		else {
			qInfo() << "Error executing query:" << query.lastError().text();
		}
		db.close();
	}
	else {
		qInfo() << "Error opening database";
	}

	return tableau_resultat;
}


