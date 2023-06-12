#pragma once

#include <QtWidgets/QMainWindow>
#include "ui_Webedia.h"

#include <qtcpsocket.h>
#include <QtSql>

#include <QSqlDatabase>
#include <QSqlQuery>
#include <QtSql>

#include <QString>
#include "DMX.h"
#include <QWebSocketServer>
#include <QWebSocket>

class Webedia : public QMainWindow
{
    Q_OBJECT

public:
    Webedia(QWidget *parent = nullptr);
    ~Webedia();

   

private:
    Ui::WebediaClass *ui;
	DMX * dmx;
    QSqlDatabase db;
    QWebSocketServer* server;
    QWebSocket* socket = nullptr;

signals:
    void sceneIdReceived(int sceneId);

public slots : 

    QSqlDatabase ConnexionBDD();
    void onButtonClickedScene();
    void afficherScene(QSqlDatabase db, QComboBox* comboBox_scene);
    void onbuttonAfficherScene();
    void lectureSite(const QString& message);
    void RequeteInsertScene(QSqlDatabase db, QString nom);
    void RequeteUpdateCanaux(QSqlDatabase db, QString valeur, QComboBox* CanauxcomboBox);
    void RequeteSceneListeDeroulante(QSqlDatabase db, QComboBox* scenecomboBox, QComboBox* CanauxcomboBox, QString valeur);
    void onButtonSceneDeroulante();
    void updateChannelComboBox(QSqlDatabase db, const QString& sceneName, QComboBox* CanauxcomboBox);
    void supprimerScene(QSqlDatabase db, QComboBox* supprimer_scene);
    void AffichersupprimerScene(QSqlDatabase db, QComboBox* supprimer_scene);
    void OnbuttonAfficherScene_supprimer();
    void OnbuttonSupprimerScene();
    void onClickedCanal();
    void RequeteInsertCanaux(QSqlDatabase db, QString valeur, QComboBox* scenecomboBox);
    void onButtonClickedCanal();
    void wSocketConnected();
    void wSocketDeconnected();
    //void updateChannelComboBox(const QString& sceneName, QComboBox* CanauxcomboBox)
};
