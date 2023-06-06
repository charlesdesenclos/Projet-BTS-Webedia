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

		// V�rifier si le nom de la sc�ne est d�j� pr�sent en BDD
		query.prepare("SELECT COUNT(*) FROM `scene` WHERE `nom` = :nom");
		query.bindValue(":nom", nom);
		query.exec();

		if (query.next()) {
			int count = query.value(0).toInt();
			if (count > 0) {
				// Le nom de la sc�ne est d�j� pr�sent en BDD, afficher une erreur
				ui->label_bdd->setText("Error: Scene name already exists");
				db.close();
				return;
			}
		}

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

/*
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

void Webedia::onButtonClickedCanal()
{
	QString nom = ui->lineEdit_valeur_canal->text();
	ui->label_console->setText(nom);


	RequeteInsertCanaux(ConnexionBDD(), nom);

}
*/

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
void Webedia::RequeteUpdateCanaux(QSqlDatabase db, QString id, QString valeur)
{
	if (db.open()) {
		QSqlQuery query;
		ui->label_bdd->setText("Database: connection ok");

		query.prepare("UPDATE canaux SET valeur=:valeur WHERE id =:id ");
		query.bindValue(":id", id);
		query.bindValue(":valeur", valeur);
		query.exec();
		db.close();
	}
	else {
		ui->label_bdd->setText("Error UPDATE CANAUX: connection with database fail");
	}
}

/*void Webedia::onClickedCanal()
{
	QString id = ui->lineEdit_id->text();
	QString valeur = ui->lineEdit_valeur->text();

	RequeteUpdateCanaux(ConnexionBDD(), id, valeur);
}
*/

void Webedia::RequeteAfficherParametreScene(QSqlDatabase db, QString id, QString valeur, QString adress, QString idCanaux){
	QVector<QString> result;

	QSqlQuery query;
	if (db.open()) {
		ui->label_bdd->setText("Database: connection ok");

		query.exec("SELECT nom FROM scene");
		while (query.next()) {
			QString nom = query.value(0).toString();
			result.append(nom);
		}

		QComboBox* comboBox_nom_scene = new QComboBox(this);

		foreach(const QString & nom, result) {
			comboBox_nom_scene->addItem(nom);
		}

		query.prepare("SELECT valeur, idCanaux, adress FROM scene, canaux, champs WHERE scene.id = canaux.idscene AND canaux.id = champs.idCanaux AND nom=:nom ");
		query.prepare("SELECT id FROM scene");
		query.bindValue("id", id);
		query.bindValue("valeur", valeur);
		query.bindValue("adress", adress);
		query.bindValue("idCanaux", idCanaux);
		query.exec();
		db.close();
		ui->label_valeur_canaux->setText(valeur);
	}
	else {
		ui->label_bdd->setText("Error Affichage des param�tres de la sc�ne: connection with database fail");
	}
}

void Webedia::onButtonClickedParametreScene(){
	QString id = ui->label_idscene->text();
	QString valeur = ui->label_valeur_canaux->text();
	QString adress = ui->label_addresse_champs->text();
	QString idCanaux = ui->label_idCanaux->text();

	RequeteAfficherParametreScene(ConnexionBDD(),id , valeur, adress, idCanaux);

}

/*void Webedia::RequeteSceneListeDeroulante(QSqlDatabase db, QComboBox* scenecomboBox) {
	QSqlQuery query;
	if (query.exec("SELECT nom FROM scene")) {
		qDebug() << "Requ�te ex�cut�e avec succ�s";
		scenecomboBox->clear();

		while (query.next()) {
			QString sceneName = query.value(0).toString();
			qDebug() << "Nom de la sc�ne : " << sceneName;
			scenecomboBox->addItem(sceneName);
		}
	}
	else {
		// G�rer les erreurs de requ�te
		qDebug() << "Erreur lors de l'ex�cution de la requ�te SQL :" << query.lastError().text();
	}
}
*/

void Webedia::RequeteSceneListeDeroulante(QSqlDatabase db) {

}

void onButtonClickedListederoulante() {
	QString scene = ui->scenecomboBox->addItem("");
}
/*
void Webedia::updateChannelComboBox(const QString& sceneName, QComboBox* CanauxcomboBox) {
	CanauxcomboBox->clear();

	// Ex�cuter la requ�te pour r�cup�rer les canaux associ�s � la sc�ne s�lectionn�e
	QSqlQuery query;
	query.prepare("SELECT id FROM canaux WHERE idscene = ?");
	query.addBindValue(sceneName);
	query.exec();

	while (query.next()) {
		QString channelId = query.value(0).toString();
		CanauxcomboBox->addItem(channelId);
	}
}
*/