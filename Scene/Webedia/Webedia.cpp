#include "Webedia.h"
#include "ui_Webedia.h"


Webedia::Webedia(QWidget *parent)
    : QMainWindow(parent),
    ui(new Ui::WebediaClass)
    
   
{
    ui->setupUi(this);

	dmx = new DMX();
}

Webedia::~Webedia()
{

}

QSqlDatabase Webedia::ConnexionBDD()
{
    QString Host = "192.168.64.157";
    QString Name = "Webedia";
    QString User = "root";
    QString Pass = "root";


    QSqlDatabase db = QSqlDatabase::addDatabase("QMYSQL");
    db.setHostName(Host);
    db.setDatabaseName(Name);
    db.setUserName(User);
    db.setPassword(Pass);

    return db;

    
    
}

void Webedia::RequeteInsertScene(QSqlDatabase db, QString nom)
{
    if (db.open())
    {
        ui->label_bdd->setText("Database: connection ok");


        QSqlQuery query;

        query.prepare("INSERT INTO `scene`(`nom`) VALUES (:nom)");
        query.bindValue(":nom", nom);
        query.exec();
        db.close();

    }
    else
    {
        ui->label_bdd->setText("Error INSERT MODULE: connection with database fail");

    }
}

void Webedia::onButtonClickedScene()
{
    QString nom = ui->lineEdit_nom_scene->text();
    ui->label_console->setText(nom);
    

    RequeteInsertScene(ConnexionBDD(), nom);

}


void Webedia::RequeteInsertCanaux(QSqlDatabase db, QString valeur){
	if (db.open())
	{
		ui->label_bdd->setText("Database: connection ok");


		QSqlQuery query;
		query.prepare("INSERT INTO `canaux`(`valeur`,`idmodule`,`idscene`) VALUES (:nom, :idmodule,:idscene)");
		query.bindValue(":valeur", valeur);
		query.exec();
		db.close;
	}
	else
	{
		ui->label_bdd->setText("Error INSERT MODULE: connection with database fail");

	}
}


/*void Webedia::RequeteSelectScene(QSqlDatabase& db) {

	ui->label_bdd->setText("Database: connection ok");
	QSqlQuery query;

	if (db.open()) {
		query.exec("SELECT nom FROM scene");

		while (query.next()) {
			QString nom = query.value(1).toString();
		}

		db.close();
	}
	else {
		ui->label_bdd->setText("Error SELECT SCENE: connection with database fail");
	}
}


void Webedia::onListSceneClicked() {

}
*/
/*
void Webedia::RequeteSelectModule(QSqlDatabase db) {
	ui->label_bdd->setText("Database: connection ok");
	QSqlQuery query;


}


*/