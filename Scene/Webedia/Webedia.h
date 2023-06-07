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

class Webedia : public QMainWindow
{
    Q_OBJECT

public:
    Webedia(QWidget *parent = nullptr);
    ~Webedia();

private:
    Ui::WebediaClass *ui;
	DMX * dmx;

  

public slots : 

    QSqlDatabase ConnexionBDD();
    void onButtonClickedScene();
    void RequeteInsertScene(QSqlDatabase db, QString nom);
	/*void RequeteSelectScene(QSqlDatabase& db);
    void onListSceneClicked();*/
    void RequeteAfficherParametreScene(QSqlDatabase db, QString id, QString valeur, QString adress, QString idCanaux);
    void RequeteUpdateCanaux(QSqlDatabase db, QString id, QString valeur);
    void onButtonClickedParametreScene();
    void RequeteSceneListeDeroulante(QSqlDatabase db, QComboBox* scenecomboBox, QComboBox* CanauxcomboBox);
    void onButtonSceneDeroulante();
    void updateChannelComboBox(QSqlDatabase db, const QString& sceneName, QComboBox* CanauxcomboBox);
    //void updateChannelComboBox(const QString& sceneName, QComboBox* CanauxcomboBox)
};
