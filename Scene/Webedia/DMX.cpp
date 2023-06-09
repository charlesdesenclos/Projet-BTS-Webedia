#include "DMX.h"
#include "Webedia.h"
#include <qt_windows.h>
#include <iostream>
#include <vector>
#include <QTimer>
#include <QDebug>
#include <QObject>
#include <QCoreApplication>

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
	QTimer* timer = new QTimer();

	timer->setInterval(500);

	// Connectez le signal timeout() du QTimer à la fonction slot qui contient votre code
	connect(timer, &QTimer::timeout, this, &DMX::SendTrame);
		// Placez votre code ici

		

	// Démarrez le timer
	timer->start();


}

void DMX::SendTrame()
{
	if (interface_open > 0)
	{
		int* tableau_resultatAdress = nullptr;
		int taille_tableau_resultatAdress = 0;
		tableau_resultatAdress = RequeteselectAdress(ConnexionBDD(), taille_tableau_resultatAdress);

		int* tableau_resultatValeurs = nullptr;
		int taille_tableau_resultatValeurs = 0;
		tableau_resultatValeurs = RequeteselectValeur(ConnexionBDD(), taille_tableau_resultatValeurs);

		qDebug() << tableau_resultatAdress;
		qDebug() << tableau_resultatValeurs;

		for (int i = 0; i < taille_tableau_resultatAdress; i++)
		{
			int adresse = tableau_resultatAdress[i];
			if (adresse >= 1 && adresse <= DMX_MAXCHANNEL)
			{
				if (i < taille_tableau_resultatValeurs)
				{
					int valeur = tableau_resultatValeurs[i];
					dmxBlock[adresse - 1] = valeur;
					qInfo() << "Adresse :" << adresse << ", Valeur :" << valeur;
				}
				else
				{
					dmxBlock[adresse - 1] = 0; // Valeur par défaut si aucune valeur associée
				}
			}
			else
			{
				qWarning() << "Adresse DMX hors limite : " << adresse;
			}
		}

		DasUsbCommand(DHC_DMXOUT, DMX_MAXCHANNEL, dmxBlock);
	}
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
		if (query.exec("SELECT canaux.valeur FROM champs, canaux WHERE champs.idCanaux = canaux.id")) {
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


