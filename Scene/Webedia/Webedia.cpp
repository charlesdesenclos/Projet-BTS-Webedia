#include "Webedia.h"
#include "ui_Webedia.h"


Webedia::Webedia(QWidget *parent)
    : QMainWindow(parent),
    ui(new Ui::WebediaClass)
    
   
{
    ui->setupUi(this);

	dmx = new DMX();
	server = new QWebSocketServer(QStringLiteral("Server WebSocket"), QWebSocketServer::NonSecureMode);

	if (this->server->listen(QHostAddress::AnyIPv4, 12345)) {
		QObject::connect(server, SIGNAL(newConnection()), this, SLOT(wSocketConnected()));
		QObject::connect(this, SIGNAL(sceneIdReceived()), dmx, SLOT(RequeteID()));
		qDebug() << "Server WebSocket: Debut d'ecoute sur le port" << 12345;
	}
	else {
		qDebug() << "Server WebSocket: Erreur d'ecoute sur le port" << 12345;
	}
}

Webedia::~Webedia()
{

}

void Webedia::wSocketConnected()
{
	socket = this->server->nextPendingConnection();
	connect(socket, &QWebSocket::textMessageReceived, this, &Webedia::lectureSite);
	socket->sendTextMessage("Bonjour Client, bienvenu sur l'application C++");
	qDebug("Nouveau client connecte");
}

void Webedia::wSocketDeconnected()
{
	qDebug("Client deconnecte");
}

QSqlDatabase Webedia::ConnexionBDD()
{
    QString Host = "192.168.64.157";
    QString Name = "Webedia";
    QString User = "root";
    QString Pass = "root";


    db = QSqlDatabase::addDatabase("QMYSQL");
    db.setHostName(Host);
    db.setDatabaseName(Name);
    db.setUserName(User);
    db.setPassword(Pass);

    return db;    
}

void Webedia::lectureSite(const QString& message)
{
    QWebSocket* sender = qobject_cast<QWebSocket*>(QObject::sender());
    qDebug() << "Message received from client:" << message;

    // Convertir le message en entier (ID de la scène)
    bool conversionOk;
    int sceneId = message.toInt(&conversionOk);
    if (conversionOk) {
        // Émettre le signal pour informer l'application C++
        emit sceneIdReceived(sceneId);
        // Construire le message de réponse avec l'ID de scène
        QString responseMessage = "Voici la scène : " + QString::number(sceneId);

        // Répondre au client avec le message contenant l'ID de scène
        sender->sendTextMessage(responseMessage);
    }
    else {
        qDebug() << "Invalid scene ID received";
    }

    // Répondre au client
    sender->sendTextMessage("Message received by server");
}

void Webedia::RequeteInsertScene(QSqlDatabase db, QString nom)
{
    if (db.open())
    {
        ui->label_bdd->setText("Database: connection ok");


        QSqlQuery query;

		// Vérifier si le nom de la scène est déjà présent en BDD
		query.prepare("SELECT COUNT(*) FROM `scene` WHERE `nom` = :nom");
		query.bindValue(":nom", nom);
		query.exec();

		if (query.next()) {
			int count = query.value(0).toInt();
			if (count > 0) {
				// Le nom de la scène est déjà présent en BDD, afficher une erreur
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


void Webedia::afficherScene(QSqlDatabase db, QComboBox* comboBox_scene){
	QSqlQuery query;
	int selectedSceneIndex = comboBox_scene->currentIndex();
	if (db.open()) {
		if (!query.exec("SELECT nom FROM scene")) {
			qDebug() << "Erreur lors de l'exécution de la requête SQL :" << query.lastError().text();
		}
		while (query.next()) {
			QString sceneName = query.value(0).toString();
			comboBox_scene->addItem(sceneName);
		}
		if (selectedSceneIndex >= 0 && selectedSceneIndex < comboBox_scene->count()) {
			comboBox_scene->setCurrentIndex(selectedSceneIndex);
		}
	}
	db.close();
}

void Webedia::onbuttonAfficherScene() {

	afficherScene(ConnexionBDD(), ui->comboBox_scene);
}

void Webedia::RequeteInsertCanaux(QSqlDatabase db, QString valeur, QComboBox* comboBox_scene){
	QSqlQuery query;
	int selectedSceneIndex = comboBox_scene->currentIndex();
	if (db.open()) {

		if (db.open()) {
			if (!query.exec("SELECT nom FROM scene")) {
				qDebug() << "Erreur lors de l'exécution de la requête SQL :" << query.lastError().text();
			}
			while (query.next()) {
				QString sceneName = query.value(0).toString();
				comboBox_scene->addItem(sceneName);
			}
			if (selectedSceneIndex >= 0 && selectedSceneIndex < comboBox_scene->count()) {
				comboBox_scene->setCurrentIndex(selectedSceneIndex);
			}
		}
		QString sceneName = comboBox_scene->currentText();
		query.prepare("INSERT INTO canaux (valeur, idscene) "
			"VALUES (:valeur, (SELECT id FROM scene WHERE nom = :sceneName))");
		query.bindValue(":sceneName", sceneName);
		query.bindValue(":valeur", valeur);
		if (query.exec()) {
			qDebug() << "Nouveau canal inséré avec succès.";
		}
		else {
			qDebug() << "Erreur lors de l'exécution de la requête SQL :" << query.lastError().text();
		}
	}
	db.close();
}

void Webedia::onButtonClickedCanal()
{
	QString valeur = ui->lineEdit_ajout_canal->text();

	RequeteInsertCanaux(ConnexionBDD(), valeur, ui->comboBox_scene);

}



void Webedia::RequeteSceneListeDeroulante(QSqlDatabase db, QComboBox* scenecomboBox, QComboBox* CanauxcomboBox, QString valeur) {
	QSqlQuery query;
	int selectedSceneIndex = scenecomboBox->currentIndex();
	int selectCanauxIndex = CanauxcomboBox->currentIndex();
	scenecomboBox->clear();
	CanauxcomboBox->clear();

	if (db.open()) {
		if (!query.exec("SELECT nom FROM scene")) {
			qDebug() << "Erreur lors de l'exécution de la requête SQL :" << query.lastError().text();
		}
		while (query.next()) {
			QString sceneName = query.value(0).toString();
			scenecomboBox->addItem(sceneName);
		}
		if (selectedSceneIndex >= 0 && selectedSceneIndex < scenecomboBox->count()) {
			scenecomboBox->setCurrentIndex(selectedSceneIndex);
		}

		QString sceneName = scenecomboBox->currentText();

		query.prepare("SELECT canaux.id FROM canaux INNER JOIN scene ON canaux.idscene = scene.id WHERE scene.nom = :sceneName");
		query.bindValue(":sceneName", sceneName);

		if (query.exec()) {
			CanauxcomboBox->clear();
			while (query.next()) {
				int channelId = query.value(0).toInt();
				CanauxcomboBox->addItem(QString::number(channelId));
			}
			if (selectCanauxIndex >= 0 && selectCanauxIndex < CanauxcomboBox->count()) {
				CanauxcomboBox->setCurrentIndex(selectCanauxIndex);
			}

		}
		QString selectedChannel = CanauxcomboBox->currentText();

		query.prepare("SELECT valeur FROM canaux WHERE id = :channelId");
		query.bindValue(":channelId", selectedChannel);

		if (query.exec() && query.next()) {
			QString channelValue = query.value(0).toString();
			ui->lineEdit_valeur->setText(channelValue);
		}

		else {
			qDebug() << "Erreur lors de l'exécution de la requête SQL :" << query.lastError().text();
		}


		db.close();
	}
}

void Webedia::onButtonSceneDeroulante() {

	QString valeur = ui->lineEdit_valeur->text();

	RequeteSceneListeDeroulante(ConnexionBDD(),ui->scenecomboBox, ui->CanauxcomboBox, valeur);
}

void Webedia::RequeteUpdateCanaux(QSqlDatabase db, QString valeur, QComboBox* CanauxcomboBox)
{
	if (db.open()) {
		QSqlQuery query;
		ui->label_bdd->setText("Database: connection ok");

		int canauxId = CanauxcomboBox->currentText().toInt();

		query.prepare("UPDATE canaux SET valeur=:valeur WHERE id=:id");
		query.bindValue(":valeur", valeur);
		query.bindValue(":id", canauxId);

		if (query.exec()) {
			// La requête s'est exécutée avec succès
			db.commit();
			ui->label_bdd->setText("Update successful");
		}
		else {
			// Erreur lors de l'exécution de la requête
			db.rollback();
			ui->label_bdd->setText("Error updating canal");
		}
		db.close();
	}
	else {
		ui->label_bdd->setText("Error UPDATE CANAUX: connection with database fail");
	}
}

void Webedia::onClickedCanal()
{

	QString valeur = ui->lineEdit_valeur->text();

	RequeteUpdateCanaux(ConnexionBDD(), valeur, ui->CanauxcomboBox);
}



void Webedia::updateChannelComboBox(QSqlDatabase db,const QString& sceneName, QComboBox* CanauxcomboBox) {
	CanauxcomboBox->clear();
	if (db.open()) {
		// Exécuter la requête pour récupérer les canaux associés à la scène sélectionnée
		QSqlQuery query;
		query.prepare("SELECT id FROM canaux WHERE idscene = ?");
		query.addBindValue(sceneName);
		query.exec();

		while (query.next()) {
			QString channelId = query.value(0).toString();
			CanauxcomboBox->addItem(channelId);
		}
	}
	
}
